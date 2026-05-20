package com.pantalasa.sdhybc.clases

import android.util.Log
import androidx.room.RoomDatabase
import androidx.sqlite.db.SimpleSQLiteQuery
import kotlin.reflect.KClass
import org.json.JSONArray
import org.json.JSONObject
import java.lang.reflect.Method

/**
 * Clase que sirve de enlace entre las Actividades y las entidades, DAOs y BD.
 * Se debe generar una instancia de esta clase por cada entidad que se quiera manejar.
 * Esta clase es genérica y puede trabajar con cualquier entidad y DAO.
 */
class Tabla {

    // Variables de instancia
    var bd: RoomDatabase? = null // Instancia de la base de datos
    var entidad: Class<*>? = null // Clase de la entidad
    var dao: Any? = null // DAO de la entidad (genérico)
    var estructura: MutableList<EstructuraCampos> = mutableListOf() // Lista de campos de la tabla

    // Variables para la construcción de la sentencia SQL
    var tipoSentencia: Int = 0 // 0 = error, 1 = SELECT, 2 = UPDATE, 3 = INSERT INTO, 4 = DELETE
    var campos: MutableList<String> = mutableListOf() // Lista de campos afectados por la sentencia
    var valores: MutableList<Any> = mutableListOf() // Lista de valores de los campos
    var tablas: MutableList<String> = mutableListOf() // Lista de tablas afectadas por la sentencia
    var filtro: Boolean = false // Indica si la sentencia tiene condicionales
    var condicionales: MutableList<CondicionalSentencia> = mutableListOf() // Lista de condicionales
    var order: MutableList<String> = mutableListOf() // Lista de campos para ordenar la consulta
    var orderSentido: Int = 0 // 0 = ASC (normal), 1 = DESC

    // Variables para manejar la respuesta de la sentencia SQL
    var esperaRespuesta: Boolean = false // Indica si la sentencia espera una respuesta
    var respuesta: JSONArray = JSONArray() // Respuesta de la sentencia SQL
    var nombresRespuesta: MutableList<String> = mutableListOf() // Nombres de los valores esperados en la respuesta
    var tipoRespuesta: Int = 0 // 0 = no hay formato, 1 = objeto JSON, 2 = arreglo de objetos JSON, 3 = arreglo de arreglos de objetos JSON
    var resumenRespuesta: Boolean = false // true = agrega un objeto de resumen en la primera posición en la lista de resultados (solo para tipoRespuesta 2 o 3)

    /**
     * Constructor de la clase Tabla.
     * Inicializa las variables y registra la creación de la instancia.
     */
    init {
        Log.d("Tabla", "🚀 Instancia de Tabla creada.")
    }

    /**
     * Subclase que define la estructura de los campos de la tabla.
     *
     * @property nombre Nombre del campo.
     * @property tipo Tipo de dato del campo.
     * @property longitud Longitud del campo (opcional, útil para campos de texto).
     * @property decimal Indica si el campo es numérico y admite decimales.
     * @property llave Indica si el campo es la llave primaria.
     * @property incremental Indica si el campo es autoincremental.
     */
    class EstructuraCampos(
        var nombre: String, // Nombre del campo
        var tipo: KClass<*>, // Tipo de dato del campo (usamos KClass para manejar tipos en Kotlin)
        var longitud: Int = 0, // Longitud del campo (0 si no aplica)
        var decimal: Boolean = false, // true si el campo admite decimales
        var llave: Boolean = false, // true si el campo es la llave primaria
        var incremental: Boolean = false // true si el campo es autoincremental
    ) {
        init {
            Log.d("Tabla", "✅ Campo creado: nombre=$nombre, tipo=$tipo, longitud=$longitud, decimal=$decimal, llave=$llave, incremental=$incremental")
        }
    }

    /**
     * Subclase que define la estructura de los condicionales de la sentencia SQL.
     *
     * @property conector Conector lógico (0 = no lleva conexión, 1 = AND, 2 = OR).
     * @property filtros Lista de filtros condicionales.
     */
    class CondicionalSentencia(
        var conector: Int, // 0 = no lleva conexión, 1 = AND, 2 = OR
        var filtros: MutableList<List<Any>> // Lista de filtros condicionales
    ) {
        init {
            Log.d("Tabla", "✅ Condicional creado: conector=$conector, filtros=$filtros")
        }
    }

    /**
     * Genera una sentencia SQL concatenada en un string y la ejecuta.
     *
     * @return Respuesta de la sentencia SQL procesada.
     */
    fun sentenciaSql(): Any {
        Log.d("Tabla", "🛠 Generando y ejecutando sentencia SQL...")

        // Verificar que se haya configurado la base de datos y el DAO
        if (bd == null || dao == null) {
            throw IllegalStateException("La base de datos o el DAO no están configurados.")
        }

        val sentencia = StringBuilder()

        when (tipoSentencia) {
            1 -> sentencia.append("SELECT ${campos.joinToString(", ")} FROM ${tablas.joinToString(", ")}")
            2 -> sentencia.append("UPDATE ${tablas.joinToString(", ")} SET ${campos.joinToString(", ") { "$it = ?" }}")
            3 -> sentencia.append("INSERT INTO ${tablas.joinToString(", ")} (${campos.joinToString(", ")}) VALUES (${campos.joinToString(", ") { "?" }})")
            4 -> sentencia.append("DELETE FROM ${tablas.joinToString(", ")}")
            else -> throw IllegalArgumentException("Tipo de sentencia no válido: $tipoSentencia")
        }

        if (filtro && condicionales.isNotEmpty()) {
            sentencia.append(" WHERE ")
            condicionales.forEachIndexed { index, condicional ->
                if (index > 0) {
                    sentencia.append(
                        when (condicional.conector) {
                            1 -> " AND "
                            2 -> " OR "
                            else -> ""
                        }
                    )
                }
                sentencia.append("(") // Abrir paréntesis para el condicional
                condicional.filtros.forEachIndexed { i, filtro ->
                    if (i > 0) {
                        sentencia.append(
                            when (filtro[0] as Int) {
                                1 -> " AND "
                                2 -> " OR "
                                else -> ""
                            }
                        )
                    }
                    val (_, campo, operacion, negacion, valor) = filtro
                    sentencia.append(
                        when (operacion) {
                            0 -> if (negacion == 1) "$campo != ?" else "$campo = ?"
                            1 -> if (negacion == 1) "$campo >= ?" else "$campo < ?"
                            2 -> if (negacion == 1) "$campo > ?" else "$campo <= ?"
                            3 -> if (negacion == 1) "$campo <= ?" else "$campo > ?"
                            4 -> if (negacion == 1) "$campo < ?" else "$campo >= ?"
                            else -> throw IllegalArgumentException("Operación no válida: $operacion")
                        }
                    )
                    valores.add(valor)
                }
                sentencia.append(")") // Cerrar paréntesis para el condicional
            }
        }

        if (order.isNotEmpty()) {
            sentencia.append(" ORDER BY ${order.joinToString(", ")}")
            if (orderSentido == 1) {
                sentencia.append(" DESC")
            }
        }

        Log.d("Tabla", "✅ Sentencia SQL generada: ${sentencia.toString()}")

        // Ejecutar la sentencia SQL
        return ejecutarSentenciaSQL(sentencia.toString())
    }

    /**
     * Ejecuta una sentencia SQL en la base de datos.
     *
     * @param sentenciaSQL Sentencia SQL a ejecutar.
     * @return Respuesta de la sentencia SQL procesada.
     */
    private fun ejecutarSentenciaSQL(sentenciaSQL: String): Any {
        Log.d("Tabla", "🛠 Ejecutando sentencia SQL: $sentenciaSQL")

        try {
            // Convertir la sentencia SQL en un objeto SimpleSQLiteQuery
            val query = SimpleSQLiteQuery(sentenciaSQL)

            // Obtener el método "ejecutarSentenciaSQL" del DAO usando reflexión
            val metodoEjecutar = dao!!::class.java.getMethod("ejecutarSentenciaSQL", SimpleSQLiteQuery::class.java)

            // Ejecutar la sentencia SQL en el DAO
            val resultados = metodoEjecutar.invoke(dao, query) as List<*>

            // Procesar la respuesta según el tipo configurado
            return when (tipoRespuesta) {
                1 -> procesarRespuestaComoObjeto(resultados)
                2 -> procesarRespuestaComoArregloDeObjetos(resultados)
                3 -> procesarRespuestaComoArregloDeArreglos(resultados)
                else -> throw IllegalArgumentException("Tipo de respuesta no válido: $tipoRespuesta")
            }
        } catch (e: Exception) {
            Log.e("Tabla", "❌ Error al ejecutar la sentencia SQL: ${e.message}")
            throw e
        }
    }

    /**
     * Procesa la respuesta como un objeto JSON.
     *
     * @param resultados Lista de resultados de la consulta SQL.
     * @return JSONObject con la respuesta procesada.
     */
    private fun procesarRespuestaComoObjeto(resultados: List<*>): JSONObject {
        Log.d("Tabla", "🛠 Procesando respuesta como objeto JSON...")

        val jsonObject = JSONObject()

        try {
            if (resultados.isNotEmpty()) {
                val primerElemento = resultados[0]
                if (primerElemento is List<*>) {
                    primerElemento.forEachIndexed { index, valor ->
                        val nombreCampo = if (index < nombresRespuesta.size && nombresRespuesta[index].isNotEmpty()) {
                            nombresRespuesta[index]
                        } else {
                            "dato_$index"
                        }
                        jsonObject.put(nombreCampo, valor)
                    }
                } else {
                    val nombreCampo = if (nombresRespuesta.isNotEmpty() && nombresRespuesta[0].isNotEmpty()) {
                        nombresRespuesta[0]
                    } else {
                        "dato_0"
                    }
                    jsonObject.put(nombreCampo, primerElemento)
                }
            } else {
                Log.w("Tabla", "⚠️ La lista de resultados está vacía.")
            }
        } catch (e: Exception) {
            Log.e("Tabla", "❌ Error al procesar la respuesta como objeto JSON: ${e.message}")
            throw e
        }

        Log.d("Tabla", "✅ Respuesta procesada como objeto JSON: $jsonObject")
        return jsonObject
    }

    /**
     * Procesa la respuesta como un arreglo de objetos JSON.
     *
     * @param resultados Lista de resultados de la consulta SQL.
     * @return JSONArray con la respuesta procesada.
     */
    private fun procesarRespuestaComoArregloDeObjetos(resultados: List<*>): JSONArray {
        Log.d("Tabla", "🛠 Procesando respuesta como arreglo de objetos JSON...")

        val jsonArray = JSONArray()

        try {
            // Agregar resumen si es necesario
            if (resumenRespuesta) {
                val resumen = JSONObject().apply {
                    put("registros", resultados.size)
                    put("final", 0)
                    put("folio", 0)
                }
                jsonArray.put(resumen)
            }

            // Procesar los resultados
            resultados.forEach { fila ->
                val jsonObject = JSONObject()
                when (fila) {
                    is List<*> -> {
                        fila.forEachIndexed { index, valor ->
                            val nombreCampo = if (index < nombresRespuesta.size && nombresRespuesta[index].isNotEmpty()) {
                                nombresRespuesta[index]
                            } else {
                                "dato_$index"
                            }
                            jsonObject.put(nombreCampo, valor)
                        }
                    }
                    else -> {
                        val nombreCampo = if (nombresRespuesta.isNotEmpty() && nombresRespuesta[0].isNotEmpty()) {
                            nombresRespuesta[0]
                        } else {
                            "dato_0"
                        }
                        jsonObject.put(nombreCampo, fila)
                    }
                }
                jsonArray.put(jsonObject)
            }
        } catch (e: Exception) {
            Log.e("Tabla", "❌ Error al procesar la respuesta como arreglo de objetos JSON: ${e.message}")
            throw e
        }

        Log.d("Tabla", "✅ Respuesta procesada como arreglo de objetos JSON: $jsonArray")
        return jsonArray
    }

    /**
     * Procesa la respuesta como un arreglo de arreglos de objetos JSON.
     *
     * @param resultados Lista de resultados de la consulta SQL.
     * @return JSONArray con la respuesta procesada.
     */
    private fun procesarRespuestaComoArregloDeArreglos(resultados: List<*>): JSONArray {
        Log.d("Tabla", "🛠 Procesando respuesta como arreglo de arreglos de objetos JSON...")

        val jsonArray = JSONArray()

        try {
            // Agregar resumen si es necesario
            if (resumenRespuesta) {
                val resumen = JSONObject().apply {
                    put("registros", resultados.size)
                    put("final", 0)
                    put("folio", 0)
                }
                jsonArray.put(JSONArray().put(resumen))
            }

            // Procesar los resultados
            resultados.forEach { fila ->
                val jsonObject = JSONObject()
                when (fila) {
                    is List<*> -> {
                        fila.forEachIndexed { index, valor ->
                            val nombreCampo = if (index < nombresRespuesta.size && nombresRespuesta[index].isNotEmpty()) {
                                nombresRespuesta[index]
                            } else {
                                "dato_$index"
                            }
                            jsonObject.put(nombreCampo, valor)
                        }
                    }
                    else -> {
                        val nombreCampo = if (nombresRespuesta.isNotEmpty() && nombresRespuesta[0].isNotEmpty()) {
                            nombresRespuesta[0]
                        } else {
                            "dato_0"
                        }
                        jsonObject.put(nombreCampo, fila)
                    }
                }
                jsonArray.put(JSONArray().put(jsonObject))
            }
        } catch (e: Exception) {
            Log.e("Tabla", "❌ Error al procesar la respuesta como arreglo de arreglos de objetos JSON: ${e.message}")
            throw e
        }

        Log.d("Tabla", "✅ Respuesta procesada como arreglo de arreglos de objetos JSON: $jsonArray")
        return jsonArray
    }

    /**
     * Muestra la respuesta de la sentencia SQL en el Log.
     *
     * @param respuesta Respuesta de la sentencia SQL.
     */
    fun mostrarRespuesta() {
        Log.d("Tabla", "📄 Respuesta de la sentencia SQL: ${this.respuesta}")
    }
}