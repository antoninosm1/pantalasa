package com.pantalasa.sdhybcapp

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

import com.pantalasa.sdhybcapp.bd.Bd
import com.pantalasa.sdhybcapp.bd.GeneralTabla
import com.pantalasa.sdhybcapp.bd.SesionesTabla
import com.pantalasa.sdhybcapp.bd.CedulasTabla

/////////////////////////////////////////////////////////////////////////
// IMPORTACIÓN LIBRERIAS OTRAS CLASES
/////////////////////////////////////////////////////////////////////////

import com.pantalasa.sdhybcapp.clases.Session
import com.pantalasa.sdhybcapp.clases.Print
import com.pantalasa.sdhybcapp.clases.Actividad
import com.pantalasa.sdhybcapp.clases.Back
import com.pantalasa.sdhybcapp.clases.Metodos
import com.pantalasa.sdhybcapp.clases.Modal

/////////////////////////////////////////////////////////////////////////
// VIEW MODEL´S
/////////////////////////////////////////////////////////////////////////

import com.pantalasa.sdhybcapp.viewmodels.RepositoriosViewModel
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch
import kotlinx.coroutines.withContext

class RepositoriosActivity : AppCompatActivity() {

    private lateinit var viewModel: RepositoriosViewModel

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_repositorios)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main_repositorios)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        // Inicializar ViewModel
        viewModel = ViewModelProvider(this).get(RepositoriosViewModel::class.java)

        /////////////////////////////////////////////////////////////////////////
        // AREA SESSION
        /////////////////////////////////////////////////////////////////////////

        val sesionActiva = Session.getInstance()

        ///////////////////////////////////////////////////////////////
        // AREA BD Y TABLAS
        ///////////////////////////////////////////////////////////////

        val dbSdhybc = Bd.getInstance(applicationContext).obtener()
        val tablaGeneral = GeneralTabla.getInstance(dbSdhybc.generalDao())
        val tablaSesiones = SesionesTabla.getInstance(dbSdhybc.sesionesDao())
        val tablaCedulas = CedulasTabla.getInstance(dbSdhybc.cedulaDao())

        /////////////////////////////////////////////////////////////////////////
        // AREA USUARIO
        /////////////////////////////////////////////////////////////////////////

        val textViewStatus = findViewById<TextView>(R.id.texto_status)
        textViewStatus.text = getString(R.string.usuario_text, sesionActiva.nombreUsuario)

        /////////////////////////////////////////////////////////////////////////
        // AREA PRINT
        /////////////////////////////////////////////////////////////////////////

        ///////////////////////////////////////////////////////////////
        // BLOQUE 1: INICIALIZACIÓN DE PRINT

        val impresora = Print.getInstance()

        impresora.excepciones = mutableListOf(1)
        impresora.ruta[0] = "RepositoriosActivity.kt"
        impresora.print(mutableListOf(mutableListOf(3, "0) INICIA RepositoriosActivity.kt", false)))
        impresora.print(mutableListOf(mutableListOf(5, "1) INICIALIZACIÓN DE PRINT", true)))

        /////////////////////////////////////////////////////////////////////////
        // AREA ACTIVIDADES
        /////////////////////////////////////////////////////////////////////////

        val actividadRepositorios = Actividad(RepositoriosActivity::class.java as Class<*>)
//        val actividadCedulasGradilla = Actividad(OnlineCedulasGradillaActivity::class.java as Class<*>)
//        val actividadApoyosProgramas = Actividad(OnlineApoyosProgramasActivity::class.java as Class<*>)
        val actividadCedulasGradilla = Actividad(ConstruccionActivity::class.java as Class<*>)
        val actividadApoyosProgramas = Actividad(ConstruccionActivity::class.java as Class<*>)

        /////////////////////////////////////////////////////////////////////////
        // AREA MODAL REPOSITORIOS
        /////////////////////////////////////////////////////////////////////////

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
            mensaje = "TODOS LOS REPOSITORIOS FUERON ACTUALIZADOS. VOY A NAVEGAR A CEDULAS GRADILLA.",
            botones = listOf(
                "OK" to {
                    impresora.print(mutableListOf(mutableListOf(3, "CANCELAR MODAL", true)))
                }
            )
        )

        /////////////////////////////////////////////////////////////////////////
        // AREA BACK CEDULAS
        /////////////////////////////////////////////////////////////////////////

        val backCedulas = Back(
            contexto = this@RepositoriosActivity,
            script = sesionActiva.ruta + "php/android_consulta_cedulas.php",
            respuesta = 1,
            parametros = mutableListOf("", 0, 0, 0),
            nombres = mutableListOf("", "", "", ""),
            lotes = mutableListOf(0, 5000, 0, 0, true)
        )

        /////////////////////////////////////////////////////////////////////////
        // AREA METODOS
        /////////////////////////////////////////////////////////////////////////

        val metodosRepositorios = Metodos()

        metodosRepositorios.agregarListaMetodos(
            instancias = mutableListOf(
                Pair("actividad_repositorios", actividadRepositorios),
                Pair("actividad_cedulas_gradilla", actividadCedulasGradilla)
            ),
            metodos = mutableListOf(
                "cerrar",
                "lanzar"
            ),
            parametros = mutableListOf(
                mutableListOf(this@RepositoriosActivity),
                mutableListOf(this@RepositoriosActivity)
            ),
            ambitos = mutableListOf(0, 0) // Ámbito suspendido para todos los métodos
        )

        metodosRepositorios.agregarListaMetodos(
            instancias = mutableListOf(
                Pair("actividad_repositorios", actividadRepositorios),
                Pair("actividad_apoyos_programas", actividadApoyosProgramas)
            ),
            metodos = mutableListOf(
                "cerrar",
                "lanzar"
            ),
            parametros = mutableListOf(
                mutableListOf(this@RepositoriosActivity),
                mutableListOf(this@RepositoriosActivity)
            ),
            ambitos = mutableListOf(0, 0) // Ámbito suspendido para todos los métodos
        )

        /////////////////////////////////////////////////////////////////////////
        // BOTÓN CÉDULAS
        /////////////////////////////////////////////////////////////////////////

        val botonCedulas = findViewById<MaterialButton>(R.id.boton_cedulas)
        botonCedulas.setOnClickListener {
            metodosRepositorios.ejecutar_posicion(0)
        }

        /////////////////////////////////////////////////////////////////////////
        // BOTÓN APOYOS
        /////////////////////////////////////////////////////////////////////////

        val botonApoyos = findViewById<MaterialButton>(R.id.boton_apoyos)
        botonApoyos.setOnClickListener {
            metodosRepositorios.ejecutar_posicion(1)
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
                        SesionesTabla.getInstance(dbSdhybc.sesionesDao())
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

        /////////////////////////////////////////////////////////////////////////
        // AREA BOTON SI ACTUALIZAR REPOSITORIOS
        /////////////////////////////////////////////////////////////////////////

        val botonSi = findViewById<MaterialButton>(R.id.boton_actualizar_repositorios)
        botonSi.setOnClickListener {

            viewModel.actualizarRepositorios(
                dbSdhybc,
                backCedulas,
                modalActualizaRepositorios,
                modalActualizarCompleto
            )

        }
    }
}

