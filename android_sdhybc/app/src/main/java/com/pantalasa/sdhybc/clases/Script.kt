package com.pantalasa.sdhybc.clases

import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.withContext
import org.json.JSONObject
import java.io.OutputStreamWriter
import java.net.HttpURLConnection
import java.net.URL

/**
 * Clase para interactuar con un script PHP remoto mediante solicitudes HTTP.
 * @param script URL del script PHP a ejecutar.
 */
class Script(private val script: String) {
    var parametros: MutableList<Any> = mutableListOf() // Lista de valores para los parámetros del POST
    var nombres: MutableList<String> = mutableListOf() // Lista de nombres para los parámetros
    var status: Boolean = false // Indica si la solicitud fue exitosa
    var codigos: MutableList<Any> = mutableListOf(JSONObject(), "", "") // Resultados de la ejecución

    /**
     * Método suspendido para ejecutar el script PHP.
     * Realiza una solicitud HTTP POST y procesa la respuesta.
     */
    suspend fun ejecutar() {
        try {
            // Construcción de parámetros para la solicitud POST
            val postParams = if (parametros.isEmpty()) {
                "" // Si no hay parámetros, no se envía cuerpo en la solicitud
            } else {
                buildPostParams(parametros, nombres)
            }

            // Realizar la solicitud HTTP en un contexto de IO
            val respuesta = withContext(Dispatchers.IO) {
                realizarPeticion(script, postParams)
            }

            // Inspección y manejo de la respuesta
            if (esJsonValido(respuesta)) {
                valido(respuesta)
            } else {
                noValido(respuesta)
            }
        } catch (e: Exception) {
            noValido("Error durante la conexión: ${e.message ?: "Error desconocido"}")
        }
    }

    /**
     * Construye los parámetros para la solicitud POST.
     * Si no hay parámetros, retorna una cadena vacía.
     * @param parámetros Lista de valores de los parámetros.
     * @param nombres Lista de nombres de los parámetros.
     * @return Una cadena con los parámetros formateados para POST o vacía.
     */
    private fun buildPostParams(parámetros: MutableList<Any>, nombres: MutableList<String>): String {
        val builder = StringBuilder()
        for ((index, value) in parámetros.withIndex()) {
            val nombre = if (nombres.size > index && nombres[index].isNotEmpty()) {
                nombres[index]
            } else {
                "dato_$index" // Nombre predeterminado
            }
            builder.append("$nombre=${value.toString()}&")
        }
        return builder.substring(0, builder.length - 1) // Elimina el último '&'
    }

    /**
     * Realiza una solicitud HTTP POST al servidor.
     * Si los parámetros están vacíos, no se envía cuerpo en la solicitud.
     * @param urlString URL del script PHP.
     * @param postParams Parámetros formateados para enviar o vacíos.
     * @return Respuesta del servidor como cadena de texto.
     */
    private fun realizarPeticion(urlString: String, postParams: String): String {
        val url = URL(urlString)
        val connection = url.openConnection() as HttpURLConnection
        connection.requestMethod = "POST"
        connection.doOutput = true
        connection.setRequestProperty("Content-Type", "text/plain")
//        connection.setRequestProperty("Content-Type", "application/x-www-form-urlencoded")
        if (postParams.isNotEmpty()) {
            // Enviar los parámetros al servidor si existen
            OutputStreamWriter(connection.outputStream).use { it.write(postParams) }
        }

        // Leer y retornar la respuesta del servidor
        return connection.inputStream.bufferedReader().use { it.readText() }
    }

    /**
     * Valida si una cadena es un JSON válido.
     * @param jsonString Cadena a validar.
     * @return Verdadero si es un JSON válido, falso en caso contrario.
     */
    private fun esJsonValido(jsonString: String): Boolean {
        return try {
            JSONObject(jsonString) // Intenta convertir la cadena en JSON
            true
        } catch (e: Exception) {
            false
        }
    }

    /**
     * Procesa una respuesta válida en formato JSON.
     * @param respuesta Cadena con la respuesta del servidor.
     */
    private fun valido(respuesta: String) {
        val json = JSONObject(respuesta)
        codigos[0] = json // Asigna el JSON a la posición 0
        codigos[1] = respuesta // Respuesta completa
        codigos[2] = "" // Limpia posibles errores
        status = true // Indica que la respuesta es válida
    }

    /**
     * Procesa una respuesta no válida o un error.
     * @param respuesta Cadena con la respuesta o mensaje de error.
     */
    private fun noValido(respuesta: String) {
        codigos[1] = respuesta // Almacena el mensaje de error
        println("Error: $respuesta") // Imprime el error para depuración
        status = false // Indica que la respuesta no es válida
    }
}
