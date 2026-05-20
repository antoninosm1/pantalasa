package com.pantalasa.sdhybc.clases

import android.content.Context
import android.content.SharedPreferences
import android.util.Log
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.withContext
import org.json.JSONObject
import org.json.JSONArray
import java.net.HttpURLConnection
import java.net.URL
import java.io.OutputStreamWriter
import java.io.BufferedReader
import java.io.InputStreamReader

/**
 * Clase Back encargada de gestionar la conexión con un servidor PHP, manejar sesiones
 * y enviar solicitudes HTTP POST.
 */
class Back(
    var statusConexion: Boolean = false,   // Indica si hay conexión a Internet
    var modalidadConexion: Int = 0,        // 0 = Offline, 1 = Online
    var contexto: Context,                 // Contexto de la aplicación
    var script: String = "",               // URL del script PHP a ejecutar
    var respuesta: Int = 0,                // Indica el tipo de respuesta esperada (1 = JSON)
    var statusRespuesta: Boolean = false,  // Indica si la respuesta es válida o no
    var parametros: MutableList<Any> = mutableListOf(),   // Lista de valores a enviar en la petición
    var nombres: MutableList<String> = mutableListOf(),   // Nombres de los parámetros de la petición
    var statusScript: Boolean = false,     // Indica si la ejecución del script fue exitosa
    var codigos: MutableList<Any> = mutableListOf("", "", ""), // Respuesta del servidor y datos
    var lotes: MutableList<Any> = mutableListOf(0, 5000, 0, 0, false) // Lotes para consultas por lotes
) {
    // SharedPreferences para almacenar la sesión PHP
    private val sharedPrefs: SharedPreferences =
        contexto.getSharedPreferences("SesionPHP", Context.MODE_PRIVATE)

    /**
     * Método suspendido para verificar la conexión a Internet de forma asíncrona.
     * Ejecuta un ping a google.com y evalúa si hay conexión.
     */
    suspend fun verificarConexion() = withContext(Dispatchers.IO) {
        val command = "ping -c 1 google.com" // Comando para hacer ping
        statusConexion = try {
            Runtime.getRuntime().exec(command).waitFor() == 0
        } catch (e: Exception) {
            false // Si hay un error, asumimos que no hay conexión
        }
    }

    /**
     * Configura la modalidad de conexión en modo offline.
     */
    fun modalidadOffline() {
        modalidadConexion = 0
    }

    /**
     * Configura la modalidad de conexión en modo online.
     */
    fun modalidadOnline() {
        modalidadConexion = 1
    }

    /**
     * Ejecuta el script PHP inicial y almacena la sesión PHP en SharedPreferences.
     */
    suspend fun sessionPrincipalPhp() {
        verificarConexion() // Verifica si hay conexión antes de proceder
        if (!statusConexion) return // Si no hay conexión, se detiene el proceso

        val sessionId = ejecutarPeticion() // Ejecuta la petición HTTP
        if (sessionId.isNotEmpty()) {
            // Si la sesión es válida, se almacena en SharedPreferences
            sharedPrefs.edit().putString("PHPSESSID", sessionId).apply()
            Log.d("Back", "Sesión PHP almacenada: $sessionId")
        }
    }

    /**
     * Ejecuta un script reutilizando la sesión PHP almacenada.
     */
    suspend fun ejecutarSession() {
        verificarConexion() // Verifica conexión antes de ejecutar
        if (!statusConexion) return // Si no hay conexión, detiene la ejecución

        val sessionId = sharedPrefs.getString("PHPSESSID", "") ?: ""
        if (sessionId.isEmpty()) {
            Log.d("Back", "No hay sesión PHP almacenada")
            statusScript = false
            return
        }

        ejecutarPeticion(sessionId) // Llama a ejecutarPeticion con el ID de sesión
    }

    /**
     * Ejecuta un script sin requerir sesión PHP almacenada.
     */
    suspend fun ejecutar() {
        verificarConexion()
        if (!statusConexion) return

        if (lotes[4] as Boolean) {
            Log.d("Back", "🚀 Iniciando consulta por lotes...")
            ejecutarConsultaPorLotes()
        } else {
            ejecutarPeticion()
        }
    }

    /**
     * Ejecuta una consulta por lotes.
     */
    private suspend fun ejecutarConsultaPorLotes() {
        var final = 0
        val registrosConcatenados = mutableListOf<String>() // Almacena los registros concatenados

        while (final == 0) {
            Log.d("Back", "📌 Ejecutando consulta por lotes desde ${lotes[0]}...")
            ejecutarPeticion()

            val respuestaServidor = codigos[1] as String

            // Verificar si la respuesta es un JSON válido
            if (!esRespuestaJsonValida(respuestaServidor)) {
                Log.e("Back", "La respuesta del servidor no es un JSON válido.")
                break
            }

            try {
                // Verificar si la respuesta es un JSONArray
                if (respuestaServidor.trim().startsWith("[")) {
                    val jsonArray = JSONArray(respuestaServidor)
                    if (jsonArray.length() > 0 && jsonArray.get(0) is JSONArray) {
                        val innerArray = jsonArray.getJSONArray(0)
                        if (innerArray.length() > 0) {
                            val primerObjeto = innerArray.getJSONObject(0)
                            final = primerObjeto.getInt("final")

                            // Extraer los registros (ignorando el objeto de resumen)
                            for (i in 1 until innerArray.length()) {
                                registrosConcatenados.add(innerArray.getJSONObject(i).toString())
                            }

                            // Actualizar parámetros para la siguiente consulta
                            lotes[0] = (lotes[0] as Int) + (lotes[1] as Int) // Actualizar posición inicial
                            lotes[3] = (lotes[3] as Int) + (lotes[1] as Int) // Actualizar total de registros
                        }
                    }
                }
            } catch (e: Exception) {
                Log.e("Back", "Error al procesar la respuesta JSON: ${e.message}")
                break
            }
        }

        // Construir el JSON final con resumen y registros concatenados
        val jsonFinal = JSONArray().apply {
            put(JSONArray().apply {
                put(JSONObject().apply {
                    put("registros", registrosConcatenados.size)
                })
                registrosConcatenados.forEach { registro ->
                    put(JSONObject(registro))
                }
            })
        }

        // Guardar el JSON final en codigos[0]
        codigos[0] = jsonFinal
        Log.d("Back", "✅ Consulta por lotes completada.")
    }

    /**
     * Construye y envía una petición HTTP POST al script PHP.
     * @param sessionId ID de sesión PHP opcional para reutilizar sesiones previas.
     * @return String con el ID de sesión si se obtiene, o una cadena vacía si hay error.
     */
    private suspend fun ejecutarPeticion(sessionId: String = ""): String = withContext(Dispatchers.IO) {
        try {
            val url = URL(script)
            val conexion = url.openConnection() as HttpURLConnection

            // Configuración de la conexión
            conexion.requestMethod = "POST"
            conexion.doOutput = true
            conexion.setRequestProperty("Content-Type", "application/x-www-form-urlencoded")

            if (sessionId.isNotEmpty()) {
                conexion.setRequestProperty("Cookie", "PHPSESSID=$sessionId")
            }

            // Construcción y envío de parámetros
            val parametrosPost = construirParametrosPost()
            Log.d("Back", "Intentando ejecutar el script PHP: $script")
            Log.d("Back", "Datos POST que se enviarán: $parametrosPost")

            if (parametrosPost.isNotEmpty()) {
                OutputStreamWriter(conexion.outputStream).use { writer ->
                    writer.write(parametrosPost)
                }
            }

            // Verificar código de estado HTTP
            val codigoEstado = conexion.responseCode
            if (codigoEstado != HttpURLConnection.HTTP_OK) {
                Log.e("Back", "Error en la petición: Código de estado HTTP $codigoEstado")
                return@withContext ""
            }

            // Leer respuesta del servidor
            val respuestaServidor = BufferedReader(InputStreamReader(conexion.inputStream)).use { reader ->
                reader.readText()
            }

            // Guardar respuesta en codigos[1] como String
            codigos[1] = respuestaServidor
            Log.d("Back", "Respuesta recibida: $respuestaServidor")

            // Procesar respuesta JSON
            try {
                if (respuestaServidor.trim().startsWith("{")) {
                    // Es un JSONObject
                    codigos[0] = JSONObject(respuestaServidor)
                    statusRespuesta = true
                } else if (respuestaServidor.trim().startsWith("[")) {
                    // Es un JSONArray
                    codigos[0] = JSONArray(respuestaServidor)
                    statusRespuesta = true
                } else {
                    // No es un JSON válido
                    statusRespuesta = false
                    Log.e("Back", "La respuesta no es un JSON válido")
                }
            } catch (e: Exception) {
                statusRespuesta = false
                Log.e("Back", "Error al parsear JSON: ${e.message}")
            }

            statusScript = true
            return@withContext ""
        } catch (e: Exception) {
            Log.e("Back", "Error en la ejecución: ${e.message}")
            statusScript = false
            statusRespuesta = false
            return@withContext ""
        }
    }
    /**
     * Construye la cadena de parámetros para enviar en el cuerpo del método POST.
     * @return String con los parámetros formateados.
     */
    private fun construirParametrosPost(): String {
        val parametrosPost = mutableListOf<String>()

        // Construir parámetros base si existen
        if (parametros.isNotEmpty()) {
            if (parametros.size != nombres.size) {
                Log.e("Back", "Error en parámetros")
                return ""
            }

            parametrosPost.addAll(
                parametros.indices.map { i ->
                    val nombre = if (nombres[i].isEmpty()) "dato_$i" else nombres[i]
                    "$nombre=${parametros[i]}"
                }
            )
        }

        // Si es una consulta por lotes, agregamos los valores de lotes
        if (lotes[4] as Boolean) {
            val inicio = parametros.size
            parametrosPost.add("dato_${inicio}=${lotes[0]}") // Posición inicial
            parametrosPost.add("dato_${inicio + 1}=${lotes[1]}") // Tamaño del lote
            parametrosPost.add("dato_${inicio + 2}=${lotes[2]}") // Indicador de consulta final
            parametrosPost.add("dato_${inicio + 3}=${lotes[3]}") // Total de registros consultados
        }

        return parametrosPost.joinToString("&")
    }

    /**
     * Verifica si la respuesta del servidor es un JSON válido.
     * @param respuestaServidor La respuesta del servidor como String.
     * @return Boolean que indica si la respuesta es un JSON válido.
     */
    private fun esRespuestaJsonValida(respuestaServidor: String): Boolean {
        return try {
            // Intenta parsear la respuesta como JSONObject
            JSONObject(respuestaServidor)
            true
        } catch (e: Exception) {
            try {
                // Si falla, intenta parsear la respuesta como JSONArray
                JSONArray(respuestaServidor)
                true
            } catch (e: Exception) {
                // Si ambos intentos fallan, no es un JSON válido
                Log.e("Back", "Error al validar JSON: ${e.message}")
                false
            }
        }
    }

    /**
     * Método para imprimir un resumen del JSON en consola (Log).
     * Toma el JSON de codigos[0] y muestra la cantidad de registros, el primer objeto JSON,
     * el segundo objeto JSON (si existe) y el último objeto JSON.
     */
    fun imprimirJsonResumen() {
        try {
            val json = codigos[0]

            when (json) {
                is JSONObject -> {
                    // Caso 1: Objeto JSON
                    Log.d("Back", "📌 Cantidad de objetos JSON obtenidos: 1")
                    Log.d("Back", "📌 JSON: ${json.toString(1)}")
                }
                is JSONArray -> {
                    if (json.length() > 0) {
                        when (val firstElement = json.get(0)) {
                            is JSONObject -> {
                                // Caso 2: Arreglo de objetos JSON
                                val cantidadObjetos = json.length()
                                Log.d("Back", "📌 Cantidad de objetos JSON obtenidos: $cantidadObjetos")

                                if (cantidadObjetos > 1) {
                                    Log.d("Back", "📌 Primer JSON: ${json.getJSONObject(0).toString(1)}")
                                    Log.d("Back", "📌 Segundo JSON: ${json.getJSONObject(1).toString(1)}")
                                    Log.d("Back", "📌 Último JSON: ${json.getJSONObject(cantidadObjetos - 1).toString(1)}")
                                } else {
                                    Log.d("Back", "📌 Único JSON: ${json.getJSONObject(0).toString(1)}")
                                }
                            }
                            is JSONArray -> {
                                // Caso 3: Arreglo de arreglos de objetos JSON
                                val innerArray = firstElement
                                val cantidadObjetos = innerArray.length()
                                Log.d("Back", "📌 Cantidad de objetos JSON obtenidos: $cantidadObjetos")

                                if (cantidadObjetos > 1) {
                                    // Mostrar el primer objeto JSON completo
                                    if (innerArray.length() >= 1) {
                                        val primerObjeto = innerArray.getJSONObject(0)
                                        Log.d("Back", "📌 Primer JSON: ${primerObjeto.toString(1)}")
                                    }
                                    // Mostrar el segundo objeto JSON
                                    if (innerArray.length() >= 2) {
                                        val segundoObjeto = innerArray.getJSONObject(1)
                                        Log.d("Back", "📌 Segundo JSON: ${segundoObjeto.toString(1)}")
                                    }
                                    // Mostrar el último objeto JSON
                                    if (innerArray.length() >= 3) {
                                        val ultimoObjeto = innerArray.getJSONObject(innerArray.length() - 1)
                                        Log.d("Back", "📌 Último JSON: ${ultimoObjeto.toString(1)}")
                                    }
                                } else if (cantidadObjetos == 1) {
                                    Log.d("Back", "📌 Único JSON: ${innerArray.getJSONObject(0).toString(1)}")
                                }
                            }
                            else -> {
                                Log.e("Back", "⚠️ El primer elemento del JSONArray no es un JSONObject ni un JSONArray.")
                            }
                        }
                    } else {
                        Log.e("Back", "⚠️ El JSONArray está vacío.")
                    }
                }
                else -> {
                    Log.e("Back", "⚠️ El tipo de dato no es un JSON válido.")
                }
            }
        } catch (e: Exception) {
            Log.e("Back", "⚠️ Error inesperado al imprimir el resumen del JSON: ${e.message}")
        }
    }
    /**
     * Muestra el contenido de codigos[0] tal como está, sin formato adicional.
     * Detecta automáticamente si es String, JSONObject, JSONArray o Array de Arrays.
     */
    fun mostrarResultado() {
        try {
            val resultado = codigos[0]

            when (resultado) {
                is String -> {
                    // Caso 1: Es una cadena String
                    Log.d("Back-resultado", "String: $resultado")
                }
                is JSONObject -> {
                    // Caso 2: Es un objeto JSON
                    Log.d("Back-resultado", "JSONObject: ${resultado.toString()}")
                }
                is JSONArray -> {
                    // Caso 3: Es un array JSON
                    if (resultado.length() > 0 && resultado.get(0) is JSONArray) {
                        // Subcaso 3.1: Array de arrays
                        Log.d("Back-resultado", "Array de Arrays JSON: ${resultado.toString()}")
                    } else {
                        // Subcaso 3.2: Array simple
                        Log.d("Back-resultado", "Array JSON: ${resultado.toString()}")
                    }
                }
                else -> {
                    // Caso 4: Tipo no reconocido
                    Log.d("Back-resultado", "Tipo no reconocido: ${resultado?.toString() ?: "null"}")
                }
            }
        } catch (e: Exception) {
            Log.e("Back-resultado", "Error al mostrar resultado: ${e.message}")
        }
    }
}