package com.pantalasa.mudanzas

import android.os.Bundle
import android.util.Log
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import androidx.lifecycle.ViewModelProvider
import com.google.android.material.button.MaterialButton
import android.widget.TextView
import androidx.lifecycle.lifecycleScope

/////////////////////////////////////////////////////////////////////////
// IMPORTACIÓN LIBRERIAS CLASES DE BD Y TABLAS
/////////////////////////////////////////////////////////////////////////

import com.pantalasa.mudanzas.bd.Bd
import com.pantalasa.mudanzas.bd.GeneralTabla
import com.pantalasa.mudanzas.bd.SesionesTabla
import com.pantalasa.mudanzas.bd.PaquetesTabla

/////////////////////////////////////////////////////////////////////////
// IMPORTACIÓN LIBRERIAS OTRAS CLASES
/////////////////////////////////////////////////////////////////////////

import com.pantalasa.mudanzas.clases.Session
import com.pantalasa.mudanzas.clases.Print
import com.pantalasa.mudanzas.clases.Actividad
import com.pantalasa.mudanzas.clases.Back
import com.pantalasa.mudanzas.clases.Metodos
import com.pantalasa.mudanzas.clases.Modal

/////////////////////////////////////////////////////////////////////////
// VIEW MODEL´S
/////////////////////////////////////////////////////////////////////////

import com.pantalasa.mudanzas.viewmodels.RepositoriosViewModel
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch
import kotlinx.coroutines.withContext

class PaquetesActivity : AppCompatActivity() {

//    private lateinit var viewModel: PaquetesViewModel

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_paquetes)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main_paquetes)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        /////////////////////////////////////////////////////////////////////////
        // AREA PRINT
        /////////////////////////////////////////////////////////////////////////

        val impresora = Print.getInstance()

        impresora.setContext(this) // <- LINEA CRÍTICA NUEVA: Proporciona el contexto
        impresora.excepciones = mutableListOf(1)
        impresora.ruta[0] = "RepositoriosActivity.kt"
        impresora.print(mutableListOf(mutableListOf(3, "0) INICIA PaquetesActivity.kt", false)))
        impresora.print(mutableListOf(mutableListOf(5, "1) INICIALIZACIÓN DE PRINT", true)))

        /////////////////////////////////////////////////////////////////////////
        // AREA INICIALIZA VIEW MODEL
        /////////////////////////////////////////////////////////////////////////

//        viewModel = ViewModelProvider(this).get(PaquetesViewModel::class.java)

        /////////////////////////////////////////////////////////////////////////
        // AREA SESSION
        /////////////////////////////////////////////////////////////////////////

        val sesionActiva = Session.getInstance()

        ///////////////////////////////////////////////////////////////
        // AREA BD Y TABLAS
        ///////////////////////////////////////////////////////////////

        val dbMudanzas = Bd.getInstance(applicationContext).obtener()
        val tablaGeneral = GeneralTabla.getInstance(dbMudanzas.generalDao())
        val tablaSesiones = SesionesTabla.getInstance(dbMudanzas.sesionesDao())
        val tablaPaquetes = PaquetesTabla.getInstance(dbMudanzas.paquetesDao())

        /////////////////////////////////////////////////////////////////////////
        // AREA USUARIO
        /////////////////////////////////////////////////////////////////////////

        val textViewStatus = findViewById<TextView>(R.id.texto_status)
        textViewStatus.text = getString(R.string.usuario_text, sesionActiva.nombreUsuario)

        /////////////////////////////////////////////////////////////////////////
        // AREA ACTIVIDADES
        /////////////////////////////////////////////////////////////////////////

        val actividadPaquetes = Actividad(PaquetesActivity::class.java as Class<*>)
//        val actividadPaquetesGradilla = Actividad(OnlinePaquetesGradillaActivity::class.java as Class<*>)
//        val actividadApoyosProgramas = Actividad(OnlineApoyosProgramasActivity::class.java as Class<*>)
        val actividadScann = Actividad(ScannActivity::class.java as Class<*>)
        val actividadRepositorios = Actividad(RepositoriosActivity::class.java as Class<*>)

        /////////////////////////////////////////////////////////////////////////
        // AREA MODAL REPOSITORIOS
        /////////////////////////////////////////////////////////////////////////
/*
        val modalActualizaRepositorios = Modal(
            context = this,
            titulo = "ACTUALIZANDO REPOSITORIOS",
            mensaje = "ESPERE",
            botones = listOf()
        )

        /////////////////////////////////////////////////////////////////////////
        // AREA MODAL CONEXION PERDIDA
        /////////////////////////////////////////////////////////////////////////

        val modalActualizarCompleto = Modal(
            context = this,
            titulo = "REPOSITORIOS ACTUALIZADOS",
            mensaje = "TODOS LOS REPOSITORIOS FUERON ACTUALIZADOS. VOY A NAVEGAR A PAQUETES GRADILLA.",
            botones = listOf(
                "OK" to {
                    impresora.print(mutableListOf(mutableListOf(3, "CANCELAR MODAL", true)))
                }
            )
        )

        /////////////////////////////////////////////////////////////////////////
        // AREA BACK PAQUETES
        /////////////////////////////////////////////////////////////////////////

        val backPaquetes = Back(
            contexto = this@RepositoriosActivity,
            script = sesionActiva.ruta + "php/android_consulta_paquetes.php",
            respuesta = 1,
            parametros = mutableListOf("", 0, 0, 0),
            nombres = mutableListOf("", "", "", ""),
            lotes = mutableListOf(0, 5000, 0, 0, true)
        )

        /////////////////////////////////////////////////////////////////////////
        // AREA METODOS
        /////////////////////////////////////////////////////////////////////////
*/
        val metodosPaquetes = Metodos()

        metodosPaquetes.agregarListaMetodos(
            instancias = mutableListOf(
                Pair("actividad_paquetes", actividadPaquetes),
                Pair("actividad_scann", actividadScann)
            ),
            metodos = mutableListOf(
                "cerrar",
                "lanzar"
            ),
            parametros = mutableListOf(
                mutableListOf(this@PaquetesActivity),
                mutableListOf(this@PaquetesActivity)
            ),
            ambitos = mutableListOf(0, 0) // Ámbito suspendido para todos los métodos
        )

        metodosPaquetes.agregarListaMetodos(
            instancias = mutableListOf(
                Pair("actividad_paquetes", actividadPaquetes),
                Pair("actividad_repositorios", actividadRepositorios)
            ),
            metodos = mutableListOf(
                "cerrar",
                "lanzar"
            ),
            parametros = mutableListOf(
                mutableListOf(this@PaquetesActivity),
                mutableListOf(this@PaquetesActivity)
            ),
            ambitos = mutableListOf(0, 0) // Ámbito suspendido para todos los métodos
        )

        /////////////////////////////////////////////////////////////////////////
        // BOTÓN SCANN
        /////////////////////////////////////////////////////////////////////////

        val botonScann = findViewById<MaterialButton>(R.id.boton_scanner)
        botonScann.setOnClickListener {
            metodosPaquetes.ejecutar_posicion(0)
        }

        /////////////////////////////////////////////////////////////////////////
        // BOTÓN REPOSITORIOS
        /////////////////////////////////////////////////////////////////////////

        val botonRepositorios = findViewById<MaterialButton>(R.id.boton_repositorios)
        botonRepositorios.setOnClickListener {
            metodosPaquetes.ejecutar_posicion(1)
        }

        /////////////////////////////////////////////////////////////////////////
        // AREA BOTON SALIR
        /////////////////////////////////////////////////////////////////////////

        val botonSalir = findViewById<MaterialButton>(R.id.boton_salir)
        botonSalir.setOnClickListener {
            lifecycleScope.launch {
                try {
                    // Todas las operaciones de BD deben ir en Dispatchers.IO
                    val tablaSesiones = withContext(Dispatchers.IO) {
                        SesionesTabla.getInstance(dbMudanzas.sesionesDao())
                    }

                    withContext(Dispatchers.IO) {
                        tablaSesiones.cerrarSesion(sesionActiva.sesionBd)
                    }

                    // Las operaciones de UI deben volver al hilo principal
                    withContext(Dispatchers.Main) {
                        finishAffinity()
                        System.exit(0)
                    }
                } catch (e: Exception) {
                    Log.e("RepositoriosActivity", "Error al cerrar sesión", e)
                    // Opcional: Mostrar mensaje de error al usuario
                }
            }
        }
/*
        /////////////////////////////////////////////////////////////////////////
        // AREA BOTON SI ACTUALIZAR REPOSITORIOS
        /////////////////////////////////////////////////////////////////////////

        val botonSi = findViewById<MaterialButton>(R.id.boton_actualizar_repositorios)
        botonSi.setOnClickListener {

            viewModel.actualizarRepositorios(
                dbMudanzas,
                backPaquetes,
                modalActualizaRepositorios,
                modalActualizarCompleto
            )

        }
 */
    }
}

