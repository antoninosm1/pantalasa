package com.pantalasa.mudanzas.clases

import android.app.AlertDialog
import android.content.Context
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.withContext
import kotlin.coroutines.resume
import kotlin.coroutines.suspendCoroutine

class Modal(
    var context: Context, // Contexto para mostrar el diálogo
    var titulo: String, // Título de la ventana modal
    var mensaje: String, // Mensaje del modal
    var botones: List<Pair<String, () -> Unit>> // Lista de botones con texto y acciones
) {

    private var dialog: AlertDialog? = null // Referencia al diálogo para poder cerrarlo

    /**
     * Método suspendible para mostrar la ventana modal en el hilo principal.
     * Suspende la ejecución hasta que el modal se cierre.
     */
    suspend fun mostrar() {
        withContext(Dispatchers.Main) { // Asegura ejecución en el hilo principal
            suspendCoroutine { continuation ->

                val builder = AlertDialog.Builder(context)
                builder.setTitle(titulo)
                builder.setMessage(mensaje)

                // Evita que la ventana modal se cierre al tocar fuera de ella
                builder.setCancelable(false) // Se aplica correctamente en Builder

                // Variable para evitar reanudación doble
                var yaReanudado = false

                // Función auxiliar para reanudar solo una vez
                fun reanudarEjecucion() {
                    if (!yaReanudado) {
                        yaReanudado = true
                        continuation.resume(Unit) // Reanuda la ejecución
                    }
                }

                // Verifica cuántos botones hay y los asigna correctamente
                when (botones.size) {
                    1 -> builder.setPositiveButton(botones[0].first) { _, _ ->
                        botones[0].second.invoke() // Ejecuta la acción del botón
                        dialog?.dismiss()
                        reanudarEjecucion() // Reanuda solo si no se ha hecho antes
                    }
                    2 -> {
                        builder.setPositiveButton(botones[0].first) { _, _ ->
                            botones[0].second.invoke()
                            dialog?.dismiss()
                            reanudarEjecucion()
                        }
                        builder.setNegativeButton(botones[1].first) { _, _ ->
                            botones[1].second.invoke()
                            dialog?.dismiss()
                            reanudarEjecucion()
                        }
                    }
                    3 -> {
                        builder.setPositiveButton(botones[0].first) { _, _ ->
                            botones[0].second.invoke()
                            dialog?.dismiss()
                            reanudarEjecucion()
                        }
                        builder.setNegativeButton(botones[1].first) { _, _ ->
                            botones[1].second.invoke()
                            dialog?.dismiss()
                            reanudarEjecucion()
                        }
                        builder.setNeutralButton(botones[2].first) { _, _ ->
                            botones[2].second.invoke()
                            dialog?.dismiss()
                            reanudarEjecucion()
                        }
                    }
                }

                // Crear el diálogo
                dialog = builder.create()

                // ✅ Se bloquea la interacción fuera de la ventana modal
                dialog?.setCanceledOnTouchOutside(false)

                // Se detecta cuando se cierra la ventana
                dialog?.setOnDismissListener {
                    reanudarEjecucion() // Se reanuda solo si no se hizo antes
                }

                // Muestra el modal
                dialog?.show()
            }
        }
    }

    /**
     * Método para mostrar la ventana modal sin suspender la ejecución de la App.
     * La ventana modal se mostrará, pero la ejecución del código continuará normalmente.
     */
    fun mostrarSinSuspender() {
        val builder = AlertDialog.Builder(context)
        builder.setTitle(titulo)
        builder.setMessage(mensaje)

        // Evita que la ventana modal se cierre al tocar fuera de ella
        builder.setCancelable(false)

        // Verifica cuántos botones hay y los asigna correctamente
        when (botones.size) {
            1 -> builder.setPositiveButton(botones[0].first) { _, _ ->
                botones[0].second.invoke() // Ejecuta la acción del botón
                dialog?.dismiss() // Cierra la ventana modal
            }
            2 -> {
                builder.setPositiveButton(botones[0].first) { _, _ ->
                    botones[0].second.invoke()
                    dialog?.dismiss()
                }
                builder.setNegativeButton(botones[1].first) { _, _ ->
                    botones[1].second.invoke()
                    dialog?.dismiss()
                }
            }
            3 -> {
                builder.setPositiveButton(botones[0].first) { _, _ ->
                    botones[0].second.invoke()
                    dialog?.dismiss()
                }
                builder.setNegativeButton(botones[1].first) { _, _ ->
                    botones[1].second.invoke()
                    dialog?.dismiss()
                }
                builder.setNeutralButton(botones[2].first) { _, _ ->
                    botones[2].second.invoke()
                    dialog?.dismiss()
                }
            }
        }

        // Crear el diálogo
        dialog = builder.create()

        // ✅ Se bloquea la interacción fuera de la ventana modal
        dialog?.setCanceledOnTouchOutside(false)

        // Mostrar el diálogo
        dialog?.show()
    }

    /**
     * Método para cerrar manualmente la ventana modal si está abierta.
     */
    fun cerrar() {
        dialog?.dismiss() // Cierra el modal si está activo
    }
}
