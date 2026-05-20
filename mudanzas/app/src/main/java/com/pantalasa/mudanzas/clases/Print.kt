/**
 * Ruta: c:\xampp\htdocs\pantalasa\mudanzas\app\src\main\java\com\pantalasa\mudanzas\clases\Print.kt
 * Descripción: Clase singleton para manejo centralizado de logs y captura de errores en producción.
 * Nuevas funcionalidades:
 * - Detección automática de entorno (Debug/Release).
 * - Integración con Firebase Crashlytics para errores en producción.
 * - Variable de control 'capturarErroresEnProduccion' para habilitar/deshabilitar captura.
 * Funciones:
 * - print(): Procesa múltiples mensajes y decide destino (LogCat o Crashlytics).
 * - imprimirRuta(): Formatea la ubicación del log.
 */

package com.pantalasa.mudanzas.clases

import android.util.Log // <- Importar para LogCat

import com.google.firebase.crashlytics.ktx.crashlytics // Import para KTX
import com.google.firebase.ktx.Firebase                 // Import para KTX
import android.content.Context

// CORRECCIÓN 1: Asegurar la importación de Firebase Crashlytics

class Print private constructor() {

    var excepciones: MutableList<Int> = mutableListOf()
    var ruta: MutableList<String> = MutableList(6) { "" } // [Actividad, ViewModel, FunciónVM, Clase, Método, Función]

    // +++ NUEVA VARIABLE DE CONTROL +++
    var capturarErroresEnProduccion: Boolean = true // Control global para captura en producción

    // +++ NUEVA VARIABLE: Necesitamos el contexto para verificar el modo +++
    private var contexto: Context? = null

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
        // +++ NUEVA LÓGICA: OBTENER INSTANCIA DE CRASHLYTICS (Solo si es necesario) +++
        // Se obtiene aquí para no hacerlo en cada iteración del bucle

        val crashlytics = if (!esModoDebug() && capturarErroresEnProduccion) {
            Firebase.crashlytics // <- Usamos la propiedad de extensión KTX
            // FirebaseCrashlytics.getInstance() // <- Alternativa tradicional
        } else {
            null
        }

        mensajes.forEach { mensaje ->
            val tipo = mensaje[0] as Int
            val texto = mensaje[1] as String
            val mostrarRuta = mensaje.getOrNull(2) as? Boolean ?: false // Manejo más seguro

            if (excepciones.contains(tipo)) return@forEach

            if (mostrarRuta && tipo != 5) imprimirRuta(mostrarMensaje = false)

            when (tipo) {
                5 -> imprimirRuta(texto)
                else -> {
                    // +++ NUEVA LÓGICA: DECIDIR DESTINO SEGÚN MODO Y TIPO +++
                    val mensajeFormateado = procesarMensaje(tipo, texto) // Procesa para LogCat

                    // 1. Siempre imprimir en LogCat (en ambos modos)
                    Log.println(obtenerNivelLogPriority(tipo), "MUDANZAS_FLUJO", mensajeFormateado)

                    // 2. Si estamos en PRODUCCIÓN y la captura está habilitada, enviar errores/advertencias a Crashlytics

                    if (!esModoDebug() && capturarErroresEnProduccion && (tipo == 7 || tipo == 8 || tipo == 9)) {

                        // Usamos crashlytics.log para los mensajes de error/advertencia
                        crashlytics?.log("[$tipo] $mensajeFormateado")

                        // Para errores críticos (8), también se puede registrar una excepción no fatal
                        if (tipo == 8) {
                            val exception = Exception("Error Crítico en App: $texto")
                            crashlytics?.recordException(exception)
                        }
                    }
                }
            }
        }
    }

    ///////////////////////////////////////////////////////////////
    // FUNCIÓN PARA IMPRIMIR RUTA (Adaptada para usar LogCat)

    fun imprimirRuta(mensaje: String = "", mostrarMensaje: Boolean = true) {
        val rutaFormateada = ruta.filter { it.isNotEmpty() }.joinToString(": ")
        val salida = if (mostrarMensaje) "// ++ //: FLUJO: $rutaFormateada: $mensaje" else "// ++ //: FLUJO: $rutaFormateada"
        Log.d("MUDANZAS_FLUJO", salida) // Usa Log.d para las rutas
    }

    ///////////////////////////////////////////////////////////////
    // FUNCIÓN PARA LIMPIAR RUTA (Se mantiene igual)

    fun limpiaRuta() {
        this.ruta[0] = "" // Actividad
        this.ruta[1] = "" // View Model
        this.ruta[2] = "" // Función View Model
        this.ruta[3] = "" // Clase
        this.ruta[4] = "" // Metodo
        this.ruta[5] = "" // Función
    }

    // +++ NUEVA FUNCIÓN AUXILIAR: Convertir tipo numérico a nivel de prioridad de Log de Android +++
    private fun obtenerNivelLogPriority(tipo: Int): Int {
        return when (tipo) {
            0, 1, 2, 3, 4, 5 -> Log.DEBUG // Mensajes de desarrollo, proceso, encabezados y rutas
            6 -> Log.INFO // Renglón vacío (no debería imprimir nada, pero por si acaso)
            7 -> Log.ERROR // Error
            8 -> Log.ERROR // Error Crítico
            9 -> Log.WARN // Advertencia
            else -> Log.VERBOSE // Cualquier otro tipo
        }
    }

    ///////////////////////////////////////////////////////////////
    // FUNCIÓN PARA PROCESAR MENSAJES: Ahora solo formatea el string para LogCat
    private fun procesarMensaje(tipo: Int, mensaje: String): String {
        return when (tipo) {
            0, 1 -> mensaje // Mensajes normales
            2 -> "// PROCESO: $mensaje"
            3, 4 -> "// $mensaje"
            6 -> "" // Renglón vacío
            7 -> "//## ERROR: $mensaje"
            8 -> "//## ERROR CRÍTICO: $mensaje"
            9 -> "⚠️ ADVERTENCIA: $mensaje ⚠️"
            else -> "// LOG DESCONOCIDO: $mensaje" // Por si aparece un tipo no definido
        }
    }

    // +++ NUEVA FUNCIÓN: Para asignar el contexto (debe llamarse desde MainActivity) +++
    fun setContext(context: Context) {
        this.contexto = context.applicationContext
    }

    // +++ NUEVA FUNCIÓN AUXILIAR: Reemplaza la verificación con BuildConfig +++
    private fun esModoDebug(): Boolean {
        val context = contexto ?: return true // Por defecto, asume debug si no hay contexto
        // CORRECCIÓN: Operación de bits 'and' correcta y comparación con 0 para retornar Boolean
        return (context.applicationInfo.flags and android.content.pm.ApplicationInfo.FLAG_DEBUGGABLE) != 0
    }
}

