package com.pantalasa.sdhybc.clases

import android.content.Context
import android.net.ConnectivityManager
import android.net.NetworkCapabilities
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.withContext
import java.net.HttpURLConnection
import java.net.URL
import kotlin.reflect.full.memberFunctions
import org.json.JSONObject

class Conexion(private val contexto: Context) {

    var status: Boolean = false
        private set

    var modalidad: Boolean = false
        private set

    var callback: Array<Any> = arrayOf(
        0,
        mutableListOf<MutableList<Pair<String, List<Any>>>>()
    )

    private val instancias: MutableMap<String, Any> = mutableMapOf()

    suspend fun verificar() {
        withContext(Dispatchers.IO) {
            val url = URL("https://google.com") // Cambia por tu URL
            val connection = url.openConnection() as HttpURLConnection

            try {
                connection.requestMethod = "GET"
                connection.connect()

                val responseCode = connection.responseCode
                val response = connection.inputStream.bufferedReader().readText()

                // Verificar si la respuesta es válida JSON
                if (responseCode == 200 && response.isNotEmpty()) {
                    if (response.startsWith("{")) {
                        val jsonObject = JSONObject(response)
                        println("Respuesta válida: $jsonObject")
                        // Aquí procesas el JSON
                    } else {
                        println("Respuesta inesperada: $response")
                    }
                } else {
                    println("Error en el servidor: Código $responseCode")
                }
            } catch (e: Exception) {
                println("Error en la conexión: ${e.message}")
            } finally {
                connection.disconnect()
            }
        }
    }
    /*
    suspend fun verificar() {
        status = withContext(Dispatchers.IO) {
            comprobarConexionReal()
        }
        modalidad = status
        if (status) {
            callback_posicion(0)
        } else {
            callback_posicion(1)
        }
    }
    */
    private fun comprobarConexionBasica(): Boolean {
        val connectivityManager =
            contexto.getSystemService(Context.CONNECTIVITY_SERVICE) as ConnectivityManager

        val network = connectivityManager.activeNetwork
        val capabilities = connectivityManager.getNetworkCapabilities(network)
        return capabilities?.let {
            it.hasTransport(NetworkCapabilities.TRANSPORT_WIFI) ||
                    it.hasTransport(NetworkCapabilities.TRANSPORT_CELLULAR)
        } ?: false
    }

    private fun comprobarConexionReal(): Boolean {
        if (!comprobarConexionBasica()) return false

        return try {
            val url = URL("https://www.google.com")
            val urlConnection = url.openConnection() as HttpURLConnection
            urlConnection.connectTimeout = 3000
            urlConnection.connect()
            urlConnection.responseCode == 200
        } catch (e: Exception) {
            false
        }
    }

    fun registrarInstancia(nombre: String, instancia: Any) {
        instancias[nombre] = instancia
    }

    fun callback() {
        val posicion = callback[0] as Int
        val listaMutable = callback[1] as MutableList<MutableList<Pair<String, List<Any>>>>
        if (posicion in listaMutable.indices) {
            listaMutable[posicion].forEach { (nombreMetodo, parametros) ->
                ejecutarMetodo(nombreMetodo, parametros)
            }
        }
    }

    fun callback_posicion(posicion: Int) {
        val listaMutable = callback[1] as MutableList<MutableList<Pair<String, List<Any>>>>
        if (posicion in listaMutable.indices) {
            listaMutable[posicion].forEach { (nombreMetodo, parametros) ->
                ejecutarMetodo(nombreMetodo, parametros)
            }
        }
    }

    private fun ejecutarMetodo(nombreMetodo: String, parametros: List<Any>) {
        val partes = nombreMetodo.split(".")
        if (partes.size == 2) {
            val nombreInstancia = partes[0]
            val nombreFuncion = partes[1]

            val instancia = instancias[nombreInstancia]
            if (instancia != null) {
                val metodo = instancia::class.memberFunctions.find { it.name == nombreFuncion }
                metodo?.let {
                    try {
                        it.call(instancia, *parametros.toTypedArray())
                    } catch (e: Exception) {
                        println("Error al ejecutar el método '$nombreFuncion': ${e.message}")
                    }
                }
            }
        }
    }
}
