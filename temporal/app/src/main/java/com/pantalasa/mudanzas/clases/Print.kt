/**
 * Ruta: c:\xampp\htdocs\pantalasa\mudanzas\app\src\main\java\com\pantalasa\mudanzas\clases\Print.kt
 * Descripción: Clase singleton para manejo centralizado de logs mejorado.
 * Nuevas funcionalidades:
 * - Impresión por lotes (List<MutableList<Any>>)
 * - Sistema de rutas jerárquicas
 * Funciones:
 * - print(): Procesa múltiples mensajes con rutas
 * - imprimirRuta(): Formatea la ubicación del log
 */

package com.pantalasa.mudanzas.clases

class Print private constructor() {
    var excepciones: MutableList<Int> = mutableListOf()
    var ruta: MutableList<String> = MutableList(6) { "" } // [Actividad, ViewModel, FunciónVM, Clase, Método, Función]

    companion object {
        private var instance: Print? = null

        fun getInstance(): Print {
            if (instance == null) {
                instance = Print()
            }
            return instance!!
        }
    }

    ///////////////////////////////////////////////////////////////
    // FUNCIÓN PRINCIPAL MEJORADA
    fun print(mensajes: MutableList<MutableList<Any>>) {
        mensajes.forEach { mensaje ->
            val tipo = mensaje[0] as Int
            val texto = mensaje[1] as String
            val mostrarRuta = mensaje[2] as Boolean

            if (excepciones.contains(tipo)) return@forEach

            if (mostrarRuta && tipo != 5) imprimirRuta(mostrarMensaje = false)

            when (tipo) {
                5 -> imprimirRuta(texto)
                else -> procesarMensaje(tipo, texto)
            }
        }
    }

    ///////////////////////////////////////////////////////////////
    // FUNCIÓN PARA IMPRIMIR RUTA
    fun imprimirRuta(mensaje: String = "", mostrarMensaje: Boolean = true) {
        val rutaFormateada = ruta.filter { it.isNotEmpty() }.joinToString(": ")
        val salida = if (mostrarMensaje) "// ++ //: FLUJO: $rutaFormateada: $mensaje"
        else "// ++ //: FLUJO: $rutaFormateada"
        println(salida)
    }

    ///////////////////////////////////////////////////////////////
    // FUNCIÓN PARA LIMPIAR RUTA
    fun limpiaRuta() {
        this.ruta[0] = "" // Actividad
        this.ruta[1] = "" // View Model
        this.ruta[2] = "" // Función View Model
        this.ruta[3] = "" // Clase
        this.ruta[4] = "" // Metodo
        this.ruta[5] = "" // Función
    }

    ///////////////////////////////////////////////////////////////
    // FUNCIÓN PARA PROCESAR MENSAJES: TIPOS DE MENSAJE 0 = MENSAJES DESARROLLADOR,
    // 1 = MENSAJES PROGRAMACIÓN, 2 = PROCESO 3 = ENCABEZADO 1, 4 = ENCABEZADO 2,
    // 5 = RUTA, 6 = RENGLON VACIO, 7 = ERROR, 8 = ERROR CRÍTICO, 9 = ADVERTENCIA

    private fun procesarMensaje(tipo: Int, mensaje: String) {
        when (tipo) {
            0, 1 -> println(mensaje)
            2 -> println("// #################################################\n// PROCESO: $mensaje")
            3, 4 -> println("\n///////////////////////////////////////////////////////////////////////////////////////////\n// $mensaje\n///////////////////////////////////////////////////////////////////////////////////////////\n")
            6 -> println("")
            7 -> println("//##//$$//&&//**//##//$$//&&//**//##//$$//&&//**//##//$$//&&//**\n// ERROR: $mensaje")
            8 -> println("\n//##//$$//&&//**//##//$$//&&//**//##//$$//&&//**//##//$$//&&//**\n// ERROR: ERROR: $mensaje\n//##//$$//&&//**//##//$$//&&//**//##//$$//&&//**//##//$$//&&//**\n")
            9 -> println("\n⚠️ ADVERTENCIA: $mensaje ⚠️\n")
        }
    }
}

