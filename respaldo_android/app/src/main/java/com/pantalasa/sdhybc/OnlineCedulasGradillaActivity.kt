package com.pantalasa.sdhybc

import android.os.Bundle
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import androidx.lifecycle.ViewModelProvider
import com.google.android.material.button.MaterialButton
import android.widget.TextView
import androidx.lifecycle.lifecycleScope
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch
import kotlinx.coroutines.withContext
import android.view.View
import android.widget.AdapterView
import android.widget.AdapterView.OnItemSelectedListener
import com.pantalasa.sdhybc.R

/////////////////////////////////////////////////////////////////////////
// IMPORTACIÓN LIBRERIAS CLASES DE BD Y TABLAS
/////////////////////////////////////////////////////////////////////////

import com.pantalasa.sdhybc.clases.Bd
import com.pantalasa.sdhybc.clases.TablaGeneral
import com.pantalasa.sdhybc.clases.TablaSesiones
import com.pantalasa.sdhybc.clases.TablaCedulas

/////////////////////////////////////////////////////////////////////////
// IMPORTACIÓN LIBRERIAS OTRAS CLASES
/////////////////////////////////////////////////////////////////////////

import com.pantalasa.sdhybc.clases.Session
import com.pantalasa.sdhybc.clases.Print
import com.pantalasa.sdhybc.clases.Actividad
import com.pantalasa.sdhybc.clases.Back
import com.pantalasa.sdhybc.clases.Metodos
import com.pantalasa.sdhybc.clases.ComboList
import com.pantalasa.sdhybc.clases.Modal
import com.pantalasa.sdhybc.viewmodel.CedulasGradillaViewModel

class OnlineCedulasGradillaActivity : AppCompatActivity() {

    private lateinit var viewModel: CedulasGradillaViewModel

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_online_cedulas_gradilla)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main_cedulas_gradilla_online)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        /////////////////////////////////////////////////////////////////////////
        // AREA INICIAR VIEW MODEL
        /////////////////////////////////////////////////////////////////////////

        viewModel = ViewModelProvider(this).get(CedulasGradillaViewModel::class.java)

        /////////////////////////////////////////////////////////////////////////
        // AREA SESSION
        /////////////////////////////////////////////////////////////////////////

        val sesionActiva = Session.getInstance()

        /////////////////////////////////////////////////////////////////////////
        // AREA BD Y TABLAS
        /////////////////////////////////////////////////////////////////////////

        val dbSdhybc = Bd.getInstance(applicationContext).obtener()
        val tablaGeneral = TablaGeneral.getInstance(dbSdhybc.generalDao())
        val tablaSesiones = TablaSesiones.getInstance(dbSdhybc.sesionesDao())
        val tablaCedulas = TablaCedulas.getInstance(dbSdhybc.cedulaDao())

        /////////////////////////////////////////////////////////////////////////
        // AREA MODAL ACTUALIZA CÉDULAS
        /////////////////////////////////////////////////////////////////////////

        val modalActualizaCedulas = Modal(
            context = this,
            titulo = "ACTUALIZANDO CÉDULAS",
            mensaje = "ESPERE",
            botones = listOf()
        )

        /////////////////////////////////////////////////////////////////////////
        // AREA BACK CÉDULAS
        /////////////////////////////////////////////////////////////////////////

        val backCedulas = Back(
            contexto = this@OnlineCedulasGradillaActivity,
            script = sesionActiva.ruta + "php/android_consulta_cedulas.php",
            respuesta = 1,
            parametros = mutableListOf("", 0, 0, 0),
            nombres = mutableListOf("", "", "", ""),
            lotes = mutableListOf(0, 5000, 0, 0, true)
        )

        /////////////////////////////////////////////////////////////////////////
        // AREA USUARIO
        /////////////////////////////////////////////////////////////////////////

        val textViewStatus = findViewById<TextView>(R.id.texto_status)
        textViewStatus.text = getString(R.string.usuario_text, sesionActiva.nombreUsuario)

        val textViewGradilla = findViewById<TextView>(R.id.gradilla_eleccion)
        textViewGradilla.text = "NO HAY REGISTRO SELECCIONADO"

        /////////////////////////////////////////////////////////////////////////
        // AREA PRINT
        /////////////////////////////////////////////////////////////////////////

        val impresora = Print()
        impresora.print("INICIALIZANDO MÓDULO CÉDULAS")

        /////////////////////////////////////////////////////////////////////////
        // AREA COMBO LIST LOCALIDADES
        /////////////////////////////////////////////////////////////////////////

        val comboListLocalidades = findViewById<ComboList>(R.id.comboList_localidades).apply {
            composicionFuente = ComboList.ConfigComposicion(
                fuentesValor = listOf(listOf(3) to listOf("value")),
                fuentesTexto = listOf(listOf(3) to listOf("text"))
            )

            tipoFuente = ComboList.TipoFuente.CONSULTA_ROOM
            especialesItems = mutableListOf(
                mutableListOf(
                    "##!##TODOS_X##!##TODOS_X##!##TODOS_X##!##TODOS_X##!##",
                    "TODAS LAS LOCALIDADES"
                ),
                mutableListOf(
                    "##!##NO_X##!##NO_X##!##NO_X##!##NO_X##!##",
                    "SIN LOCALIDAD"
                )
            )
            setValor(
                tipo = 2,
                cantidad = 4,
                valorInicial = "##!##NO_X##!##NO_X##!##NO_X##!##NO_X##!##",
                tieneValorInicial = true
            )

            // Configuración del listener usando el método público
            setOnItemSelectedListener { value, text ->
               procesarSeleccion(value)
               valorCapturado.apply {
                   (this[2] as MutableList<Any>).apply {
                       clear()
                       addAll(value.split(ComboList.DELIMITADOR_VALORES).take(4))
                   }
                   this[3] = value
                   this[4] = true
               }
            }
        }

        /////////////////////////////////////////////////////////////////////////
        // RESTO DEL CÓDIGO ORIGINAL (MANTENIDO SIN CAMBIOS)
        /////////////////////////////////////////////////////////////////////////

        viewModel.ejecutarProcesoCompleto(
            dbSdhybc,
            backCedulas,
            modalActualizaCedulas
        ) { resultados ->
            lifecycleScope.launch(Dispatchers.Main) {
                comboListLocalidades.ejecutar(resultados)
            }
        }

        comboListLocalidades.onItemSelectedListener = object : OnItemSelectedListener {
            override fun onItemSelected(parent: AdapterView<*>, view: View, position: Int, id: Long) {
                val seleccion = parent.getItemAtPosition(position).toString()
                textViewGradilla.text = "SELECCIONADO: $seleccion"
                impresora.print("Localidad seleccionada: $seleccion")
            }

            override fun onNothingSelected(parent: AdapterView<*>) {
                textViewGradilla.text = "NO HAY REGISTRO SELECCIONADO"
            }
        }

        val botonEditar = findViewById<MaterialButton>(R.id.boton_editar).setOnClickListener {
            impresora.print("BOTÓN EDITAR PRESIONADO - FUNCIONALIDAD EN DESARROLLO")
        }

        val botonNuevo = findViewById<MaterialButton>(R.id.boton_nuevo).setOnClickListener {
            impresora.print("BOTÓN NUEVO PRESIONADO - FUNCIONALIDAD EN DESARROLLO")
        }

        val botonSalir = findViewById<MaterialButton>(R.id.boton_salir).setOnClickListener {
            lifecycleScope.launch {
                try {
                    withContext(Dispatchers.IO) {
                        tablaSesiones.cerrarSesion(sesionActiva.sesionBd)
                    }
                    withContext(Dispatchers.Main) {
                        finishAffinity()
                        System.exit(0)
                    }
                } catch (e: Exception) {
                    impresora.print("ERROR AL CERRAR SESIÓN: ${e.message}")
                }
            }
        }
    }
}
