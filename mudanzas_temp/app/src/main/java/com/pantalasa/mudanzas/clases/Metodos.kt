/**
 * Ruta: c:\xampp\htdocs\pantalasa\mudanzas\app\src\main\java\com\pantalasa\mudanzas\clases\Metodos.kt
 * Versión: 2.6
 * Descripción: Gestión dinámica de métodos mediante reflection
 * Funciones:
 * - Ejecución síncrona/asíncrona de métodos
 * - Manejo de parámetros variables
 * - Validación de ámbitos (0=síncrono, 1=asíncrono)
 * - Registro centralizado de instancias
 * Dependencias:
 * - kotlin-reflect (1.8.21)
 * - kotlinx-coroutines-android
 */

package com.pantalasa.mudanzas.clases

import kotlin.reflect.full.memberFunctions  // Usado en memberFunctions
import kotlinx.coroutines.CoroutineScope   // Usado en CoroutineScope
import kotlinx.coroutines.Dispatchers      // Usado en Dispatchers.Main
import kotlinx.coroutines.launch           // Usado en launch

data class ListaMetodos(
    var instancias: MutableList<Pair<String, Any>>,
    var metodos: MutableList<String>,
    var parametros: MutableList<MutableList<Any>>,
    var ambitos: MutableList<Int>
)

class Metodos(
    var instanciasPrincipal: MutableList<Any> = mutableListOf(),
    listaMetodos: MutableList<ListaMetodos> = mutableListOf()
) {
    private val listaMetodos: MutableList<ListaMetodos> = listaMetodos

    ///////////////////////////////////////////////////////////////
    // MÉTODO: agregarListaMetodos
    // Descripción: Registra nuevos métodos para ejecución posterior
    fun agregarListaMetodos(
        instancias: MutableList<Pair<String, Any>>,
        metodos: MutableList<String>,
        parametros: MutableList<MutableList<Any>>,
        ambitos: MutableList<Int>
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

    ///////////////////////////////////////////////////////////////
    // MÉTODO: ejecutar_posicion
    // Descripción: Ejecuta métodos en la posición especificada
    fun ejecutar_posicion(posicion: Int) {
        try {
            val lista = listaMetodos[posicion]

            lista.instancias.forEachIndexed { index, (instanciaNombre, instanciaObjeto) ->
                val metodoNombre = lista.metodos[index]
                val parametros = lista.parametros.getOrElse(index) { mutableListOf() }
                val ambito = lista.ambitos.getOrElse(index) { 0 }

                val metodo = instanciaObjeto::class.memberFunctions
                    .firstOrNull { it.name == metodoNombre }

                when {
                    metodo == null -> {
                        Print.getInstance().print(mutableListOf(
                            mutableListOf(8, "Método '$metodoNombre' no encontrado", true)
                        ))
                    }
                    ambito == 0 -> {
                        metodo.call(instanciaObjeto, *parametros.toTypedArray())
                    }
                    ambito == 1 -> {
                        CoroutineScope(Dispatchers.Main).launch {
                            metodo.call(instanciaObjeto, *parametros.toTypedArray())
                        }
                    }
                    else -> {
                        Print.getInstance().print(mutableListOf(
                            mutableListOf(9, "Ámbito no soportado: $ambito", true)
                        ))
                    }
                }
            }
        } catch (e: IndexOutOfBoundsException) {
            Print.getInstance().print(mutableListOf(
                mutableListOf(8, "Posición $posicion inválida: ${e.message}", true)
            ))
        }
    }

    ///////////////////////////////////////////////////////////////
    // MÉTODO: registrarInstancia
    // Descripción: Almacena instancias para reutilización
    fun registrarInstancia(nombre: String, instancia: Any) {
        if (instanciasPrincipal.none { (it as? Pair<*, *>)?.first == nombre }) {
            instanciasPrincipal.add(Pair(nombre, instancia))
        }
    }

    ///////////////////////////////////////////////////////////////
    // MÉTODO: ejecutar_lista
    // Descripción: Ejecuta múltiples posiciones de métodos
    fun ejecutar_lista(listaPosiciones: MutableList<Int>) {
        for (posicion in listaPosiciones) {
            try {
                ejecutar_posicion(posicion)
            } catch (e: IndexOutOfBoundsException) {
                Print.getInstance().print(mutableListOf(
                    mutableListOf(8, "Error en posición $posicion: ${e.message}", true)
                ))
            } catch (e: Exception) {
                Print.getInstance().print(mutableListOf(
                    mutableListOf(8, "Error al ejecutar posición $posicion: ${e.message}", true)
                ))
            }
        }
    }
}
