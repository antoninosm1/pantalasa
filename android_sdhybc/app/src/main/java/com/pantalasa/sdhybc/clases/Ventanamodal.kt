package com.pantalasa.sdhybc.clases

import android.app.AlertDialog
import android.content.Context

class VentanaModal(
    var context: Context, // Contexto para mostrar el diálogo
    var titulo: String, // Título de la ventana modal
    var mensaje: String, // Mensaje del modal
    var botones: List<Pair<String, () -> Unit>> // Lista de botones con texto y acciones
) {

    /**
     * Método para mostrar la ventana modal.
     * No recibe parámetros, utiliza las variables de instancia para configurarse.
     */
    fun mostrar() {
        // Crear el constructor de la ventana modal
        var builder = AlertDialog.Builder(context)
        builder.setTitle(titulo)
        builder.setMessage(mensaje)

        // Agregar los botones
        for (boton in botones) {
            builder.setPositiveButton(boton.first) { _, _ ->
                boton.second.invoke() // Ejecuta la acción asociada al botón
            }
        }

        // Mostrar el diálogo
        var dialog = builder.create()
        dialog.show()
    }
}
