package pantalasa

import java.net.HttpURLConnection
import java.net.URL

class Prueba(private val script: String) {

    // Método que ejecuta el script PHP mediante una solicitud HTTP GET
    fun ejecutar() {
        try {
            val url = URL(script) // Crear la URL a partir del script proporcionado
            val connection = url.openConnection() as HttpURLConnection

            // Configuración de la conexión HTTP
            connection.requestMethod = "GET"
            connection.connectTimeout = 5000 // Tiempo de espera de conexión
            connection.readTimeout = 5000    // Tiempo de espera de lectura

            // Ejecutar la solicitud y leer el código de respuesta
            val responseCode = connection.responseCode
            if (responseCode == HttpURLConnection.HTTP_OK) {
                println("Script ejecutado con éxito.")
            } else {
                println("Error al ejecutar el script. Código de respuesta: $responseCode")
            }

            // Cerrar la conexión
            connection.disconnect()
        } catch (e: Exception) {
            println("Ocurrió un error al ejecutar el script: ${e.message}")
        }
    }
}
