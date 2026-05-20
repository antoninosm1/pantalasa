package com.pantalasa.mudanzas.bd

import android.util.Log
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.withContext
import org.json.JSONArray
import org.json.JSONObject
import java.text.SimpleDateFormat
import java.util.Locale
import com.pantalasa.mudanzas.clases.Print

/**
 * Clase Singleton para manejar operaciones en la tabla "paquetes".
 * Proporciona métodos para interactuar con la tabla "paquetes" a través de PaquetesDao.
 * Implementa el patrón Singleton para asegurar una única instancia en toda la aplicación.
 */

class PaquetesTabla private constructor(private val paquetesDao: PaquetesDao) {

    // Variables de instancia

    private val impresora = Print.getInstance() // Instancia única

    var total: Int = 0 // Almacena la cantidad de registros en la tabla
    var retorno: Int = 0
    var retornoLista: MutableList<Any> = mutableListOf() // Almacena una lista de posibles respuestas
    var resultadoCombo: List<ComboItem> = emptyList()
        private set
    // Variables para manejar la fuente de datos
    var tipoFuente: Int = 0 // 0 = no hay fuente, 1 = objeto JSON, 2 = arreglo de objetos JSON, 3 = arreglo de arreglos de objetos JSON
    var resumenFuente: Boolean = false // Indica si la fuente incluye un objeto de resumen
    var statusFuente: Boolean = false // Indica si la fuente se aplicó como actualización

    // Lista de campos de la entidad Paquetes
    var campos: MutableList<CamposEstructura> = mutableListOf()

    /**
     * Subclase para definir la estructura de los campos de la entidad Paquetes.
     */
    class CamposEstructura {
        var nombreCampo: String = "" // Nombre del campo en la entidad
        var tipoCampo: Int = 0 // 0 = no hay tipo, 1 = String, 2 = Int, 3 = Long, 4 = Date
        var fuenteConcatenacion: Int = 1 // 0 = no hay concatenación, 1 = concatenación de strings, 2 = suma de ints
        var fuenteValores: MutableList<MutableList<Any>> = mutableListOf() // Lista de valores fuente
    }

    ///////////////////////////////////////////////////////////////
// BLOQUE init - INICIALIZACIÓN DE PAQUETESTABLA
// Descripción:
// - Configura la instancia de Print para logs
// - Inicializa la estructura de campos de la tabla
// - Registra el evento de creación en LogCat
    init {
        ///////////////////////////////////////////////////////////////
        // CONFIGURACIÓN DE IMPRESORA (LOGS)
        impresora.ruta[3] = "PaquetesTabla.kt"
        impresora.ruta[4] = "init"
        impresora.ruta[5] = ""

        impresora.print(mutableListOf(
            mutableListOf(2, "INICIANDO PAQUETESTABLA", true),
            mutableListOf(3, "Configurando sistema de logs", false),
            mutableListOf(5, "Instancia ID: ${this.hashCode()}", false)
        ))

        ///////////////////////////////////////////////////////////////
        // INICIALIZACIÓN DE ESTRUCTURA DE CAMPOS
        try {
            inicializarCampos()
            impresora.print(mutableListOf(
                mutableListOf(3, "Estructura de campos inicializada", false),
                mutableListOf(5, "Total de campos: ${campos.size}", false)
            ))
        } catch (e: Exception) {
            impresora.print(mutableListOf(
                mutableListOf(8, "ERROR EN INICIALIZACIÓN: ${e.message}", true)
            ))
            throw e
        }

        ///////////////////////////////////////////////////////////////
        // REGISTRO FINAL DE INICIALIZACIÓN
        impresora.print(mutableListOf(
            mutableListOf(2, "INICIALIZACIÓN DE PAQUETESTABLA COMPLETA", true),
            mutableListOf(3, "Instancia lista para uso", false)
        ))
    }

    companion object {
        @Volatile
        private var INSTANCE: PaquetesTabla? = null

        /**
         * Método para obtener la instancia única de PaquetesTabla.
         *
         * @param paquetesDao DAO de la tabla paquetes
         * @return Instancia única de PaquetesTabla
         */
        fun getInstance(paquetesDao: PaquetesDao): PaquetesTabla {
            return INSTANCE ?: synchronized(this) {
                val instance = PaquetesTabla(paquetesDao).also { INSTANCE = it }
                Log.d("PaquetesTabla", "🚀 Instancia de PaquetesTabla creada: ${instance.hashCode()}")
                instance
            }
        }
    }

    /**
     * Método para inicializar la lista de campos con valores predeterminados.
     */
    private fun inicializarCampos() {
        campos.add(CamposEstructura().apply {
            nombreCampo = "ID"
            tipoCampo = 3 // Long
            fuenteValores.add(mutableListOf(1, 0)) // Autoincremental
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "ambito"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(2, 1)) // Valor directo
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "idWeb"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_01")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "referencia"
            tipoCampo = 1 // String
            fuenteValores.add(mutableListOf(3, "dato_02")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "descripcion"
            tipoCampo = 1 // String
            fuenteValores.add(mutableListOf(3, "dato_03")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "fecha"
            tipoCampo = 4 // Date
            fuenteValores.add(mutableListOf(3, "dato_04")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "fechastatus"
            tipoCampo = 4 // Date
            fuenteValores.add(mutableListOf(3, "dato_05")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "fechastatus"
            tipoCampo = 4 // Date
            fuenteValores.add(mutableListOf(3, "dato_06")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "status"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_07")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "comentario"
            tipoCampo = 1 // String
            fuenteValores.add(mutableListOf(3, "dato_08")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "origen"
            tipoCampo = 1 // String
            fuenteValores.add(mutableListOf(3, "dato_09")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "destino"
            tipoCampo = 1 // String
            fuenteValores.add(mutableListOf(3, "dato_10")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "internos"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_11")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "total"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_12")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "total"
            tipoCampo = 2 // Int
            fuenteValores.add(mutableListOf(3, "dato_13")) // Valor JSON
        })
        campos.add(CamposEstructura().apply {
            nombreCampo = "fechaaccion"
            tipoCampo = 4 // Date
            fuenteValores.add(mutableListOf(3, "dato_14")) // Valor JSON
        })

    }

    /**
     * Método para mostrar la estructura de los campos en el log.
     */
    fun mostrarEstructura() {
        Log.d("PaquetesTabla", "📌 Mostrando estructura de campos:")
        for (campo in campos) {
            Log.d("PaquetesTabla", "   - Nombre: ${campo.nombreCampo}, Tipo: ${campo.tipoCampo}, Concatenación: ${campo.fuenteConcatenacion}, Valores: ${campo.fuenteValores}")
        }
    }

    /**
     * Método para contar registros en la tabla "paquetes".
     * Actualiza la variable `total` con la cantidad de registros.
     */
    suspend fun contar() {
        try {
            Log.d("PaquetesTabla", "📌 Iniciando consulta SELECT COUNT(*) FROM paquetes")

            // Ejecutar la consulta y obtener el conteo
            total = paquetesDao.obtenerConteo()

            // Mostrar el resultado en el log
            Log.d("PaquetesTabla", "✅ Conteo de registros en la tabla 'paquetes': $total")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("PaquetesTabla", "❌ Error al ejecutar la consulta SELECT COUNT(*)", e)
        }
    }

    /**
     * Método para obtener todos los registros de la tabla "paquetes".
     */
    suspend fun obtenerTodos() {
        try {
            Log.d("PaquetesTabla", "📌 Iniciando consulta SELECT * FROM paquetes")

            // Ejecutar la consulta y obtener los registros
            val registros = paquetesDao.obtenerPaquetes()

            // Mostrar el resultado en el log
            Log.d("PaquetesTabla", "✅ Registros obtenidos: ${registros}")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("PaquetesTabla", "❌ Error al ejecutar la consulta SELECT *", e)
        }
    }

    /**
     * Método para insertar un registro en la tabla "paquetes".
     *
     * @param registro Registro a insertar.
     */
    suspend fun insertarRegistro(registro: Paquetes) {
        try {
            Log.d("PaquetesTabla", "📌 Insertando registro en la tabla 'Paquetes'")

            // Insertar el registro
            paquetesDao.insertar(registro)

            // Mostrar confirmación en el log
            Log.d("PaquetesTabla", "✅ Registro insertado correctamente")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("PaquetesTabla", "❌ Error al insertar registro", e)
        }
    }

    /**
     * Método para eliminar un registro de la tabla "paquetes" por su ID.
     *
     * @param ID ID del registro a eliminar.
     */
    suspend fun eliminarRegistro(ID: Int) {
        try {
            Log.d("PaquetesTabla", "📌 Eliminando registro con ID: $ID")

            // Eliminar el registro
            paquetesDao.eliminar(ID.toLong())

            // Mostrar confirmación en el log
            Log.d("PaquetesTabla", "✅ Registro eliminado correctamente")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("PaquetesTabla", "❌ Error al eliminar registro", e)
        }
    }

    /**
     * Método para vaciar la tabla "paquetes" y reiniciar el contador de ID autoincremental.
     */
    suspend fun vaciarTabla() {
        try {
            Log.d("PaquetesTabla", "📌 Vaciando tabla 'paquetes'")

            // Vaciar tabla
            paquetesDao.vaciar()

            // Reiniciar el contador de ID autoincremental
            paquetesDao.reiniciarContadorId()
            this.statusFuente = false
            // Mostrar confirmación en el log
            Log.d("PaquetesTabla", "✅ Tabla vaciada y contador de ID reiniciado correctamente")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("PaquetesTabla", "❌ Error al vaciar tabla", e)
        }
    }

    /**
     * Método para eliminar registros de la tabla "paquetes" donde el campo "ambito" sea igual a 1.
     */
    suspend fun borrarWeb() {
        try {
            Log.d("PaquetesTabla", "📌 Eliminando registros con ambito = 1")

            // Ejecutar la consulta para eliminar registros
            paquetesDao.eliminarPorAmbito(1)

            // Mostrar confirmación en el log
            Log.d("PaquetesTabla", "✅ Registros eliminados correctamente")
            this.statusFuente = false
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("PaquetesTabla", "❌ Error al eliminar registros", e)
        }
    }

    /**
     * Método para volcar registros desde una fuente JSON.
     *
     * @param jsonSource Fuente de datos en formato JSON (puede ser JSONObject, JSONArray o String).
     */
    suspend fun volcarRegistros(jsonSource: Any) {
        try {
            Log.d("PaquetesTabla", "📌 Iniciando proceso de volcado de registros")

            // Validar tipo de fuente
            val tipoFuenteDetectado = when (jsonSource) {
                is JSONObject -> 1
                is JSONArray -> if (jsonSource.length() > 0 && jsonSource[0] is JSONArray) 3 else 2
                else -> -1
            }

            if (tipoFuenteDetectado != tipoFuente) {
                Log.e("PaquetesTabla", "❌ Tipo de fuente no coincide. Esperado: $tipoFuente, Detectado: $tipoFuenteDetectado")
                return
            }

            // Validar la estructura de campos antes de continuar
            if (!validarEstructuraCampos()) {
                Log.e("PaquetesTabla", "❌ Estructura de campos no válida. No se pueden volcar registros.")
                return
            }

            // Procesar según el tipo de fuente
            when (tipoFuente) {
                1 -> {
                    if (resumenFuente) {
                        Log.w("PaquetesTabla", "⚠️ resumenFuente=true no tiene efecto con tipoFuente=1")
                    }
                    procesarObjetoJSON(jsonSource as JSONObject)
                }
                2 -> procesarArregloJSON(jsonSource as JSONArray)
                3 -> procesarArregloDeArreglosJSON(jsonSource as JSONArray)
            }
            this.statusFuente = true
            Log.d("PaquetesTabla", "✅ Proceso de volcado de registros completado")
        } catch (e: Exception) {
            Log.e("PaquetesTabla", "❌ Error inesperado durante el volcado de registros", e)
            throw e
        }
    }
    private suspend fun validarEstructuraCampos(): Boolean {
        try {
            Log.d("PaquetesTabla", "📌 Validando estructura de campos")

            // Obtener los nombres de los campos de la entidad Paquetes en el orden declarado
            val nombresCamposEntidad = listOf(
                "ID", "ambito", "idWeb", "referencia", "descripcion", "fecha",
                "fechastatus", "status", "comentario", "origen", "destino",
                "internos", "total", "responsable", "fechaaccion"
            )

            // 1. Contar los elementos de la subclase CamposEstructura
            val cantidadCamposEstructura = campos.size
            val cantidadCamposEntidad = nombresCamposEntidad.size

            // 2. Comparar los resultados
            if (cantidadCamposEstructura != cantidadCamposEntidad) {
                Log.e("PaquetesTabla", "❌ Número de campos no coincide: CamposEstructura ($cantidadCamposEstructura) != Paquetes ($cantidadCamposEntidad)")
                return false
            }

            // 3. Hacer un ciclo sobre los elementos de CamposEstructura
            for (i in campos.indices) {
                val campoEstructura = campos[i]
                val nombreCampoEstructura = campoEstructura.nombreCampo
                val nombreCampoEntidad = nombresCamposEntidad[i]

                // 4. Verificar si el nombre del campo coincide
                if (nombreCampoEstructura != nombreCampoEntidad) {
                    Log.e("PaquetesTabla", "❌ Nombre de campo no coincide en la posición $i: $nombreCampoEstructura != $nombreCampoEntidad")
                    return false
                }
            }

            Log.d("PaquetesTabla", "✅ Estructura de campos válida")
            return true
        } catch (e: Exception) {
            Log.e("PaquetesTabla", "❌ Error al validar la estructura de campos", e)
            return false
        }
    }

    /**
     * Método para procesar un objeto JSON.
     *
     * @param json Objeto JSON a procesar.
     */
    private suspend fun procesarObjetoJSON(json: JSONObject) {
        Log.d("PaquetesTabla", "📌 Procesando objeto JSON")
        insertarRegistroDesdeJSON(json)
    }

    /**
     * Método para procesar un arreglo de objetos JSON.
     *
     * @param jsonArray Arreglo de objetos JSON a procesar.
     */
    private suspend fun procesarArregloJSON(jsonArray: JSONArray) {
        Log.d("PaquetesTabla", "📌 Procesando arreglo de objetos JSON")

        try {
            // Verificar si hay un objeto de resumen
            resumenFuente = jsonArray.length() > 0 && jsonArray.optJSONObject(0)?.has("registros") == true

            Log.d("PaquetesTabla", "✅ ResumenFuente: $resumenFuente")

            // Determinar el índice de inicio
            val startIndex = if (resumenFuente) {
                Log.d("PaquetesTabla", "📌 Ignorando objeto de resumen en posición 0")
                1
            } else {
                0
            }

            // Contador de registros insertados
            var registrosInsertados = 0

            // Recorrer los objetos JSON
            for (i in startIndex until jsonArray.length()) {
                val json = jsonArray.optJSONObject(i) ?: continue

                // Insertar solo si no es un objeto de resumen
                if (!(resumenFuente && i == startIndex && json.has("registros"))) {
                    insertarRegistroDesdeJSON(json)
                    registrosInsertados++

                    // Log cada 1000 registros para seguimiento
                    if (registrosInsertados % 1000 == 0) {
                        Log.d("PaquetesTabla", "📌 Registros insertados: $registrosInsertados")
                    }
                } else {
                    Log.d("PaquetesTabla", "📌 Objeto de resumen ignorado en posición $i")
                }
            }

            Log.d("PaquetesTabla", "✅ Total de registros insertados: $registrosInsertados")
        } catch (e: Exception) {
            Log.e("PaquetesTabla", "❌ Error al procesar arreglo JSON", e)
            throw e
        }
    }
    /**
     * Método para procesar un arreglo de arreglos de objetos JSON (tipoFuente = 3).
     * Para este tipo de fuente con resumen, cada arreglo interno comienza con un objeto de resumen.
     *
     * @param jsonArray Arreglo principal que contiene arreglos de objetos JSON
     */
    private suspend fun procesarArregloDeArreglosJSON(jsonArray: JSONArray) {
        Log.d("PaquetesTabla", "📌 [ProcesarArregloDeArreglos] Iniciando procesamiento de JSON tipo 3")

        try {
            // 1. Validación inicial de estructura
            if (jsonArray.length() == 0) {
                Log.d("PaquetesTabla", "⚠️ [ProcesarArregloDeArreglos] JSONArray principal vacío")
                return
            }

            // 2. Detección automática de resumen si no fue establecido
            if (resumenFuente) {
                Log.d("PaquetesTabla", "✅ [ProcesarArregloDeArreglos] Modo con resumen activado")
            }

            // 3. Contadores para estadísticas
            var totalArreglosProcesados = 0
            var totalRegistrosInsertados = 0
            var totalResumenesIgnorados = 0

            // 4. Procesar cada arreglo interno
            for (i in 0 until jsonArray.length()) {
                val innerArray = jsonArray.optJSONArray(i) ?: continue
                totalArreglosProcesados++

                Log.d("PaquetesTabla", "📦 [ProcesarArregloDeArreglos] Procesando arreglo interno #$i con ${innerArray.length()} elementos")

                // 5. Validar que el arreglo interno tenga elementos
                if (innerArray.length() == 0) {
                    Log.d("PaquetesTabla", "⚠️ [ProcesarArregloDeArreglos] Arreglo interno #$i vacío")
                    continue
                }

                // 6. Determinar el índice de inicio (ignorar primer elemento si hay resumen)
                val startIndex = if (resumenFuente) {
                    // Verificar si el primer elemento es un objeto de resumen
                    val posibleResumen = innerArray.optJSONObject(0)
                    if (posibleResumen?.has("registros") == true) {
                        totalResumenesIgnorados++
                        Log.d("PaquetesTabla", "📌 [ProcesarArregloDeArreglos] Ignorando objeto de resumen en arreglo #$i")
                        1
                    } else {
                        Log.d("PaquetesTabla", "⚠️ [ProcesarArregloDeArreglos] Primer elemento no es resumen en arreglo #$i")
                        0
                    }
                } else {
                    0
                }

                // 7. Procesar cada objeto en el arreglo interno
                for (j in startIndex until innerArray.length()) {
                    try {
                        val json = innerArray.optJSONObject(j) ?: continue

                        // 8. Insertar registro en la base de datos
                        insertarRegistroDesdeJSON(json)
                        totalRegistrosInsertados++

                        // 9. Log de progreso cada 1000 registros
                        if (totalRegistrosInsertados % 1000 == 0) {
                            Log.d("PaquetesTabla", "📊 [ProcesarArregloDeArreglos] Progreso: $totalRegistrosInsertados registros insertados")
                        }
                    } catch (e: Exception) {
                        Log.e("PaquetesTabla", "❌ [ProcesarArregloDeArreglos] Error en arreglo #$i, posición $j: ${e.message}")
                    }
                }
            }

            // 10. Reporte final del procesamiento
            Log.d("PaquetesTabla", "✅ [ProcesarArregloDeArreglos] Procesamiento completado: " +
                    "\n- Arreglos procesados: $totalArreglosProcesados" +
                    "\n- Resúmenes ignorados: $totalResumenesIgnorados" +
                    "\n- Registros insertados: $totalRegistrosInsertados")

        } catch (e: Exception) {
            Log.e("PaquetesTabla", "❌ [ProcesarArregloDeArreglos] Error inesperado en procesamiento", e)
            throw e
        }
    }
    /**
     * Método para insertar un registro en la tabla 'paquetes' desde un objeto JSON,
     * utilizando dinámicamente la estructura de campos definida.
     *
     * @param json Objeto JSON con los datos del registro.
     */
    private suspend fun insertarRegistroDesdeJSON(json: JSONObject) {
        //Log.d("PaquetesTabla", "📌 [InsertarRegistro] Iniciando inserción desde JSON")

        try {
            // 1. Mapa para almacenar los valores convertidos
            val valores = mutableMapOf<String, Any?>()

            // 2. Procesar cada campo definido en la estructura
            for (campo in campos) {
                try {
                    //Log.v("PaquetesTabla", "🔄 Procesando campo: ${campo.nombreCampo}")

                    // 3. Determinar el valor según la fuente definida
                    val (tipoFuenteValor, valorFuente) = campo.fuenteValores[0]

                    when (tipoFuenteValor as Int) {
                        // 3.1. Caso Autoincremental (ignorar)
                        1 -> {
                            //Log.d("PaquetesTabla", "⚡ Ignorando campo autoincremental: ${campo.nombreCampo}")
                            continue
                        }

                        // 3.2. Caso Valor Directo
                        2 -> {
                            valores[campo.nombreCampo] = when (campo.tipoCampo) {
                                2 -> valorFuente as? Int ?: 0
                                3 -> valorFuente as? Long ?: 0L
                                else -> valorFuente
                            }
                            //Log.d("PaquetesTabla", "🔹 Valor directo para ${campo.nombreCampo}: ${valores[campo.nombreCampo]}")
                        }

                        // 3.3. Caso Valor desde JSON
                        3 -> {
                            val nombreCampoJson = valorFuente.toString()
                            val valor = when (campo.tipoCampo) {
                                1 -> json.optString(nombreCampoJson, "") // String
                                2 -> json.optInt(nombreCampoJson, 0)     // Int
                                3 -> json.optLong(nombreCampoJson, 0L)   // Long
                                4 -> {  // Fecha (tratada como Long timestamp)
                                    val fechaStr = json.optString(nombreCampoJson, "")
                                    if (fechaStr.isNotEmpty()) {
                                        try {
                                            SimpleDateFormat("yyyy-MM-dd HH:mm:ss", Locale.getDefault())
                                                .parse(fechaStr)?.time ?: 0L
                                        } catch (e: Exception) {
                                            Log.e("PaquetesTabla", "❌ Error al parsear fecha '$fechaStr' para ${campo.nombreCampo}")
                                            0L
                                        }
                                    } else {
                                        0L
                                    }
                                }
                                else -> null
                            }

                            if (valor != null) {
                                valores[campo.nombreCampo] = valor
                                //Log.d("PaquetesTabla", "📥 Valor desde JSON para ${campo.nombreCampo}: $valor")
                            } else {
                                throw IllegalArgumentException("Tipo de campo no soportado: ${campo.tipoCampo}")
                            }
                        }

                        else -> throw IllegalArgumentException("Tipo de fuente no soportado: $tipoFuenteValor")
                    }
                } catch (e: Exception) {
                    Log.e("PaquetesTabla", "❌ Error procesando campo ${campo.nombreCampo}: ${e.message}")
                    throw e
                }
            }

            // 4. Validar que tenemos todos los campos necesarios (excepto autoincrementales)
            val camposRequeridos = campos.filter { it.fuenteValores[0][0] != 1 }.size
            if (valores.size != camposRequeridos) {
                throw IllegalStateException("Faltan campos. Esperados: $camposRequeridos, Obtenidos: ${valores.size}")
            }

            // 5. Insertar en la base de datos usando el DAO
            withContext(Dispatchers.IO) {
                try {
                    // 5.1. Construir objeto Paquetes desde los valores
                    val paquetes = Paquetes(
                        ID = 0L, // Autoincremental
                        ambito = valores["ambito"] as Int,
                        idWeb = valores["idWeb"] as Int,
                        referencia = valores["fererencia"] as String,
                        descripcion = valores["descripcion"] as String,
                        fecha = valores["fecha"] as Long,
                        fechastatus = valores["fechastatus"] as Long,
                        status = valores["status"] as Int,
                        comentario = valores["comentario"] as String,
                        origen = valores["origen"] as String,
                        destino = valores["destino"] as String,
                        internos = valores["internos"] as Int,
                        total = valores["total"] as Int,
                        responsable = valores["responsable"] as Int,
                        fechaaccion = valores["fechaaccion"] as Long
                    )

                    // 5.2. Insertar usando DAO
                    paquetesDao.insertar(paquetes)
                    //Log.d("PaquetesTabla", "✅ Registro insertado correctamente")
                } catch (e: Exception) {
                    Log.e("PaquetesTabla", "❌ Error al construir/insertar registro", e)
                    throw e
                }
            }
        } catch (e: Exception) {
            Log.e("PaquetesTabla", "❌ Error inesperado en insertarRegistroDesdeJSON", e)
            throw e
        }
    }
    /**
     * Método para mostrar registros en intervalos.
     *
     * @param intervalo Intervalo en el que se mostrarán los registros.
     */
    suspend fun muestra(intervalo: Int) {
        try {
            Log.d("PaquetesTabla", "📌 Iniciando proceso de muestra de registros")

            // Obtener el conteo de registros
            total = paquetesDao.obtenerConteo()
            Log.d("PaquetesTabla", "✅ Total de registros en la tabla 'paquetes': $total")

            // Mostrar el primer registro
            val primerRegistro = paquetesDao.obtenerPrimerRegistro()
            if (primerRegistro != null) {
                Log.d("PaquetesTabla", "📌 Primer registro: $primerRegistro")
            } else {
                Log.d("PaquetesTabla", "📌 No hay registros en la tabla.")
                return
            }

            // Mostrar registros en intervalos
            for (i in intervalo until total step intervalo) {
                val registro = paquetesDao.obtenerRegistroEnIntervalo(i)
                if (registro != null) {
                    Log.d("PaquetesTabla", "📌 Registro en intervalo $i: $registro")
                }
            }

            // Mostrar el último registro
            val ultimoRegistro = paquetesDao.obtenerUltimoRegistro()
            if (ultimoRegistro != null) {
                Log.d("PaquetesTabla", "📌 Último registro: $ultimoRegistro")
            }

            Log.d("PaquetesTabla", "✅ Proceso de muestra de registros completado")
        } catch (e: Exception) {
            Log.e("PaquetesTabla", "❌ Error inesperado durante la muestra de registros", e)
        }
    }

// En la clase PaquetesTabla, modificar el método:
    /**
     * Inspecciona resultadoCombo para diagnóstico.
     * Cumple con:
     * - Logs de seguimiento
     * - Manejo de errores
     * - Estructura clara
     */
    fun inspeccionarResultadoCombo() {
        try {
            Log.d("PaquetesTabla", "##%%## INSPECCIÓN resultadoCombo INICIADA")

            when (resultadoCombo.size) {
                0 -> Log.w("PaquetesTabla", "⚠️ resultadoCombo VACÍO")
                1 -> Log.d("PaquetesTabla", "📊 Único item: value='${resultadoCombo[0].value}' text='${resultadoCombo[0].text}'")
                else -> {
                    Log.d("PaquetesTabla", "📊 Total items: ${resultadoCombo.size}")
                    Log.d("PaquetesTabla", "   - Primer item: value='${resultadoCombo[0].value}'")
                    Log.d("PaquetesTabla", "   - Último item: value='${resultadoCombo.last().value}'")
                }
            }
        } catch (e: Exception) {
            Log.e("PaquetesTabla", "💥 Error en inspeccionarResultadoCombo()", e)
        } finally {
            Log.d("PaquetesTabla", "##%%## INSPECCIÓN FINALIZADA")
        }
    }
}