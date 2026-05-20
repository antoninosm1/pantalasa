package com.pantalasa.sdhybc.clases

import kotlin.reflect.full.memberFunctions
import android.app.Activity
import kotlinx.coroutines.CoroutineScope
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch

data class ListaMetodos(
    var instancias: MutableList<Pair<String, Any>>,
    var metodos: MutableList<String>,
    var parametros: MutableList<MutableList<Any>>,
    var ambitos: MutableList<Int> // Nuevo parámetro para definir el ámbito
)

class Metodos(
    var instanciasPrincipal: MutableList<Any> = mutableListOf(),
    listaMetodos: MutableList<ListaMetodos> = mutableListOf()
) {
    private val listaMetodos: MutableList<ListaMetodos> = listaMetodos

    fun agregarListaMetodos(
        instancias: MutableList<Pair<String, Any>>,
        metodos: MutableList<String>,
        parametros: MutableList<MutableList<Any>>,
        ambitos: MutableList<Int> // Se añade el ámbito como parámetro
    ) {
        listaMetodos.add(
            ListaMetodos(
                instancias,
                metodos,
                parametros,
                ambitos
            )
        )
    }

    fun ejecutar_posicion(posicion: Int) {
        if (posicion < 0 || posicion >= listaMetodos.size) {
            throw IndexOutOfBoundsException("Posición inválida: $posicion")
        }

        val lista = listaMetodos[posicion]

        for ((index, instanciaPair) in lista.instancias.withIndex()) {
            val instanciaNombre = instanciaPair.first
            val instanciaObjeto = instanciaPair.second

            val instancia = instanciasPrincipal.find { (it as? Pair<*, *>)?.first == instanciaNombre }?.let {
                (it as Pair<*, *>).second
            } ?: run {
                registrarInstancia(instanciaNombre, instanciaObjeto)
                instanciaObjeto
            }

            val metodoNombre = lista.metodos[index]
            val parametros = lista.parametros.getOrElse(index) { mutableListOf() }
            val ambito = lista.ambitos.getOrElse(index) { 0 }

            val metodo = instancia::class.memberFunctions.find { it.name == metodoNombre }
                ?: throw NoSuchMethodException("Método '$metodoNombre' no encontrado en la instancia '$instanciaNombre'.")

            if (ambito == 0) {
                // Ejecución normal
                metodo.call(instancia, *parametros.toTypedArray())
            } else if (ambito == 1) {
                // Ejecución suspendida
                CoroutineScope(Dispatchers.Main).launch {
                    metodo.call(instancia, *parametros.toTypedArray())
                }
            }
        }
    }

    fun registrarInstancia(nombre: String, instancia: Any) {
        if (instanciasPrincipal.none { (it as? Pair<*, *>)?.first == nombre }) {
            instanciasPrincipal.add(Pair(nombre, instancia))
        }
    }

    fun ejecutar_lista(listaPosiciones: MutableList<Int>) {
        for (posicion in listaPosiciones) {
            try {
                ejecutar_posicion(posicion)
            } catch (e: IndexOutOfBoundsException) {
                println("Error: Posición inválida $posicion en la lista. ${e.message}")
            } catch (e: Exception) {
                println("Error: Falló la ejecución en la posición $posicion. ${e.message}")
            }
        }
    }
}

