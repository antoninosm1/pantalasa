package com.pantalasa.sdhybca

import android.os.Bundle
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.google.android.material.button.MaterialButton

class OfflineHomeActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_offline_home)

        // Vincular el botón "SALIR"
        val botonSalir = findViewById<MaterialButton>(R.id.offline_home_boton_salir)

        // Configurar el evento de clic
        botonSalir.setOnClickListener {
            // Cerrar todas las actividades y salir de la app
            finishAffinity()
        }

    }
}