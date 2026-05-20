package com.pantalasa.sdhybc.clases

import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.withContext
import okhttp3.*
import org.json.JSONObject
import java.io.IOException

class Phpscript(val script: String) {
    var valores: MutableList<Any> = mutableListOf()
    var codigos: Array<Any> = arrayOf(JSONObject(), "", "")
    var callback: Array<Any> = arrayOf(
        0,
        mutableListOf<MutableList<Pair<String, List<Any>>>>()
    )

    private val instancias: MutableMap<String, Any> = mutableMapOf()

    // Registrar instancia
    fun registrarInstancia(nombre: String, instancia: Any) {
        instancias[nombre] = instancia
    }

    // Ejecutar métodos de la callback
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
                val metodo = instancia::class.members.find { it.name == nombreFuncion }
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

    // Método ejecutar()
    suspend fun ejecutar() {
        // Construcción de los valores POST
        val formBodyBuilder = FormBody.Builder()
        valores.forEachIndexed { index, valor ->
            formBodyBuilder.add("dato_$index", valor.toString())
        }
        val formBody = formBodyBuilder.build()

        val client = OkHttpClient()
        val request = Request.Builder()
            .url(script)
            .post(formBody)
            .build()

        try {
            val response = withContext(Dispatchers.IO) {
                client.newCall(request).execute()
            }

            val responseBody = response.body?.string() ?: ""
            if (isJsonValid(responseBody)) {
                // Procesar JSON válido
                val jsonObject = JSONObject(responseBody)
                codigos[0] = jsonObject
                codigos[1] = responseBody
                callback()
            } else {
                // Manejar error en el script
                error_script()
            }
        } catch (e: IOException) {
            println("Error en la conexión: ${e.message}")
        }
    }

    private fun isJsonValid(test: String): Boolean {
        return try {
            JSONObject(test)
            true
        } catch (e: Exception) {
            false
        }
    }

    private fun recibe_datos() {
        println("Exito al ejecutar el script PHP.")
        // Este método se llamará en caso de respuesta JSON válida
    }

    private fun error_script() {
        println("Error al ejecutar el script PHP.")
    }
}
