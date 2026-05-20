package com.pantalasa.sdhybc

import android.os.Bundle
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import com.google.android.material.button.MaterialButton
import kotlinx.coroutines.CoroutineScope
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch
import com.pantalasa.sdhybc.clases.Session
import androidx.lifecycle.lifecycleScope
import com.pantalasa.sdhybc.clases.Back

class PruebasActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_pruebas)

/////////////////////////////////////////////////////////////////////////
// AREA DE PRUEBAS
/////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////
// AREA SESSION
/////////////////////////////////////////////////////////////////////////

        var sesionActiva = Session.getInstance()

/////////////////////////////////////////////////////////////////////////
// AREA INCIAR SESSION PHP
/////////////////////////////////////////////////////////////////////////

        val Php = Back(
            contexto = this@PruebasActivity,
            script = sesionActiva.ruta + "android_session.php",
            parametros = mutableListOf(),
            nombres = mutableListOf(),
            respuesta = 0
        )

        CoroutineScope(Dispatchers.IO).launch {
            Php.sessionPrincipalPhp()
        }

/////////////////////////////////////////////////////////////////////////
// AREA SCRIPT ENVIA DATOS
/////////////////////////////////////////////////////////////////////////

        val scriptEnvia = Back(
            contexto = this@PruebasActivity,
            script = sesionActiva.ruta + "php/consulta_login.php",
            parametros = mutableListOf("geronimofong@gmail.com", "gero"),
            nombres = mutableListOf("user_login", "pass_login"),
            respuesta = 1
        )

/////////////////////////////////////////////////////////////////////////
// AREA REPOSITORIO MUNICIPIOS
/////////////////////////////////////////////////////////////////////////

        val scriptMunicipios = Back(
            contexto = this@PruebasActivity,
            script = sesionActiva.ruta + "php/consulta_combolist_municipios_cedulas.php",
            parametros = mutableListOf(),
            nombres = mutableListOf(),
            lotes = mutableListOf(0, 5000, 0, 0, true),
            respuesta = 1
        )

/////////////////////////////////////////////////////////////////////////
// AREA REPOSITORIO CEDULAS
/////////////////////////////////////////////////////////////////////////

        val backCedulas = Back(
            contexto = this@PruebasActivity,
            script = sesionActiva.ruta + "php/android_consulta_cedulas.php",
            respuesta = 1,
            parametros = mutableListOf("", 0, 0, 0),
            nombres = mutableListOf("", "", "", ""),
            lotes = mutableListOf(0, 5000, 0, 0, true)
        )

/////////////////////////////////////////////////////////////////////////
// AREA BOTON EJECUTAR PRUEBA
/////////////////////////////////////////////////////////////////////////

        val botonProbar = findViewById<MaterialButton>(R.id.boton_probar)
        botonProbar.setOnClickListener {

            lifecycleScope.launch {

                scriptEnvia.ejecutar()
                scriptEnvia.imprimirJsonResumen()

                lifecycleScope.launch {

                    backCedulas.ejecutar()
                    backCedulas.imprimirJsonResumen()

                }
            }
        }
    }
}