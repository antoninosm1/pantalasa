// Clase Actividad.kt
package com.pantalasa.sdhybc.clases

import android.app.Activity
import android.content.Context
import android.content.Intent

class Actividad(
    private val actividad: Class<*>
) {
    // Método para cerrar la actividad actual
    fun cerrar(contexto: Activity) {
        contexto.finish()
    }

    // Método para lanzar la actividad asociada
    fun lanzar(contexto: Context) {
        val intent = Intent(contexto, actividad)
        contexto.startActivity(intent)
    }
}

