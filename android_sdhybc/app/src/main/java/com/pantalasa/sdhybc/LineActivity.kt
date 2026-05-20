package com.pantalasa.sdhybc

import android.os.Bundle
import androidx.appcompat.app.AppCompatActivity
import com.google.android.material.button.MaterialButton
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch
import kotlinx.coroutines.withContext
import android.util.Log
import androidx.lifecycle.lifecycleScope

import com.pantalasa.sdhybc.clases.Bd
import com.pantalasa.sdhybc.clases.TablaGeneral
import com.pantalasa.sdhybc.clases.TablaSesiones
import com.pantalasa.sdhybc.clases.TablaCedulas

import com.pantalasa.sdhybc.clases.Session
import com.pantalasa.sdhybc.clases.Metodos
import com.pantalasa.sdhybc.clases.Actividad

/**
 * Actividad principal que configura instancias y métodos.
 */
class LineActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_line)

        /////////////////////////////////////////////////////////////////////////
        // AREA SESSION
        /////////////////////////////////////////////////////////////////////////

        // Se obtiene la instancia de sesión activa
        var sesionActiva = Session.getInstance()

        ///////////////////////////////////////////////////////////////
        // AREA BD Y TABLAS
        ///////////////////////////////////////////////////////////////

        // Instanciar conexión a la base de datos
        val dbSdhybc = Bd.getInstance(applicationContext).obtener()

        // Instanciar acceso a las tablas
        val tablaGeneral = TablaGeneral.getInstance(dbSdhybc.generalDao())
        val tablaSesiones = TablaSesiones.getInstance(dbSdhybc.sesionesDao())
        val tablaCedulas = TablaCedulas.getInstance(dbSdhybc.cedulaDao())

        ///////////////////////////////////////////////////////////////
        // AREA ACTIVIDADES
        ///////////////////////////////////////////////////////////////

        // Crear instancias de actividades
        val actividadLine = Actividad(LineActivity::class.java)
        val actividadOnlineLogin = Actividad(OnlineLoginActivity::class.java)

        /////////////////////////////////////////////////////////////////////////
        // AREA METODOS
        /////////////////////////////////////////////////////////////////////////

        // Crear instancia de la clase Metodos
        val metodosOnline = Metodos()

        // Agregar métodos y configuraciones a la lista de métodos
        metodosOnline.agregarListaMetodos(
            instancias = mutableListOf(
                Pair("actividad_line", actividadLine),
                Pair("actividad_login", actividadOnlineLogin)
            ),
            metodos = mutableListOf("cerrar", "lanzar"),
            parametros = mutableListOf(
                mutableListOf(this@LineActivity),
                mutableListOf(this@LineActivity)
            ),
            ambitos = mutableListOf(0, 0) // Ámbito suspendido para todos los métodos
        )

        ///////////////////////////////////////////////////////////////
        // AREA BOTONES Y ACCIONES
        ///////////////////////////////////////////////////////////////

        // Botón para ir a login online
        val botonOnline = findViewById<MaterialButton>(R.id.line_boton_online)
        botonOnline.setOnClickListener {
            metodosOnline.ejecutar_posicion(0)
        }

        // Botón para cerrar la sesión y salir de la aplicación
        val botonSalir = findViewById<MaterialButton>(R.id.boton_salir)
        botonSalir.setOnClickListener {
            lifecycleScope.launch {
                try {
                    // Cerrar sesión activa usando la instancia existente de tablaSesiones
                    withContext(Dispatchers.IO) {
                        tablaSesiones.cerrarSesion(sesionActiva.sesionBd)
                    }

                    // Cerrar la aplicación en el hilo principal
                    withContext(Dispatchers.Main) {
                        finishAffinity()
                        System.exit(0)
                    }
                } catch (e: Exception) {
                    Log.e("LineActivity", "Error al cerrar sesión", e)
                    // Opcional: Mostrar mensaje de error al usuario
                }
            }
        }
    }
}
