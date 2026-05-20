package com.pantalasa.mudanzas

import android.os.Bundle
import androidx.appcompat.app.AppCompatActivity
import com.google.android.material.button.MaterialButton
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch
import kotlinx.coroutines.withContext
import android.util.Log
import androidx.lifecycle.lifecycleScope

import com.pantalasa.mudanzas.bd.Bd
import com.pantalasa.mudanzas.bd.SesionesTabla

import com.pantalasa.mudanzas.clases.Session
import com.pantalasa.mudanzas.clases.Metodos
import com.pantalasa.mudanzas.clases.Actividad
import com.pantalasa.mudanzas.clases.Print

/**
 * Actividad principal que configura instancias y métodos.
 */
class ModalidadActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_modalidad)

        ///////////////////////////////////////////////////////////////
        // BLOQUE 1: INICIALIZACIÓN DE PRINT

        val impresora = Print.getInstance()

        impresora.setContext(this) // <- LINEA CRÍTICA NUEVA: Proporciona el contexto
        impresora.excepciones = mutableListOf(1)
        impresora.ruta[0] = "ModalidadActivity.kt"
        impresora.print(mutableListOf(mutableListOf(3, "1) INICIA ModalidadActivity.kt", false)))
        impresora.print(mutableListOf(mutableListOf(5, "1) INICIALIZA impresora", true)))

        /////////////////////////////////////////////////////////////////////////
        // AREA SESSION
        /////////////////////////////////////////////////////////////////////////

        impresora.print(mutableListOf(mutableListOf(5, "2) SESSION", false)))

        var sesionActiva = Session.getInstance()

        ///////////////////////////////////////////////////////////////
        // AREA BD Y TABLAS
        ///////////////////////////////////////////////////////////////

        impresora.print(mutableListOf(mutableListOf(5, "3) BD Y TABLAS", false)))

        val dbMudanzas = Bd.getInstance(applicationContext).obtener()
        val tablaSesiones = SesionesTabla.getInstance(dbMudanzas.sesionesDao())

        ///////////////////////////////////////////////////////////////
        // AREA ACTIVIDADES
        ///////////////////////////////////////////////////////////////

        impresora.print(mutableListOf(mutableListOf(5, "4) ACTIVIDADES", false)))

        val actividadModalidad = Actividad(ModalidadActivity::class.java)
        val actividadOnlineLogin = Actividad(OnlineLoginActivity::class.java)
        val actividadOfflineLogin = Actividad(OfflineLoginActivity::class.java)

        /////////////////////////////////////////////////////////////////////////
        // AREA METODOS
        /////////////////////////////////////////////////////////////////////////

        impresora.print(mutableListOf(mutableListOf(5, "5) METODOS", false)))

        val metodosModalidad = Metodos()
        metodosModalidad.agregarListaMetodos(
            instancias = mutableListOf(
                Pair("actividad_modalidad", actividadModalidad),
                Pair("actividad_login", actividadOnlineLogin)
            ),
            metodos = mutableListOf(
                "cerrar",
                "lanzar"
            ),
            parametros = mutableListOf(
                mutableListOf(this@ModalidadActivity),
                mutableListOf(this@ModalidadActivity)
            ),
            ambitos = mutableListOf(
                0,
                0
            ) // Ámbito suspendido para todos los métodos
        )
        metodosModalidad.agregarListaMetodos(
            instancias = mutableListOf(
                Pair("actividad_modalidad", actividadModalidad),
                Pair("actividad_offilne", actividadOfflineLogin)
            ),
            metodos = mutableListOf(
                "cerrar",
                "lanzar"
            ),
            parametros = mutableListOf(
                mutableListOf(this@ModalidadActivity),
                mutableListOf(this@ModalidadActivity)
            ),
            ambitos = mutableListOf(
                0,
                0
            ) // Ámbito suspendido para todos los métodos
        )

        ///////////////////////////////////////////////////////////////
        // AREA BOTON ONLINE
        ///////////////////////////////////////////////////////////////

        impresora.print(mutableListOf(mutableListOf(5, "6) BOTON ONLINE", false)))

        val botonOnline = findViewById<MaterialButton>(R.id.modalidad_boton_online)
        botonOnline.setOnClickListener {
            metodosModalidad.ejecutar_posicion(0)
        }

        ///////////////////////////////////////////////////////////////
        // AREA BOTON OFFLINE
        ///////////////////////////////////////////////////////////////

        impresora.print(mutableListOf(mutableListOf(5, "6) BOTON OFFLINE", false)))

        val botonOffline = findViewById<MaterialButton>(R.id.modalidad_boton_offline)
        botonOffline.setOnClickListener {
            metodosModalidad.ejecutar_posicion(1)
        }

        ///////////////////////////////////////////////////////////////
        // AREA BOTON SALIR
        ///////////////////////////////////////////////////////////////

        impresora.print(mutableListOf(mutableListOf(5, "7) SALIR", false)))

        val botonSalir = findViewById<MaterialButton>(R.id.boton_salir)
        botonSalir.setOnClickListener {

            ///////////////////////////////////////////////////////////////
            // AREA CLICK SALIR
            ///////////////////////////////////////////////////////////////

            impresora.print(mutableListOf(mutableListOf(2, "7.1) CLICK SALIR", false)))

            lifecycleScope.launch {
                try {

                    impresora.print(mutableListOf(mutableListOf(2, "7.1) VA INTENTAR EJECUTAR METODO: tablaSesiones.cerrarSesion(sesionActiva.sesionBd)", false)))

                    withContext(Dispatchers.IO) {
                        tablaSesiones.cerrarSesion(sesionActiva.sesionBd)
                    }

                    // Cerrar la aplicación en el hilo principal
                    withContext(Dispatchers.Main) {
                        finishAffinity()
                        System.exit(0)
                    }
                } catch (e: Exception) {
                    Log.e("ModalidadActivity", "Error al cerrar sesión", e)
                    // Opcional: Mostrar mensaje de error al usuario
                }
            }
        }
    }
}
