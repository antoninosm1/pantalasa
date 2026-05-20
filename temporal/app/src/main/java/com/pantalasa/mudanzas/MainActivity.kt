/**
 * Ruta: c:\xampp\htdocs\pantalasa\mudanzas\app\src\main\java\com\pantalasa\mudanzas\MainActivity.kt
 * Descripción: Actividad Principal de la App.
 * Funciones:
 * - Mostrar pantalla de inicio (activity_main.xml)
 * - Inicializar sistema de logs (Clase Print)
 * - Configurar política de cookies HTTP
 * - Cargar instancias de BD local (Room)
 * - Preparar redirección a otras Activities
 */

package com.pantalasa.mudanzas

///////////////////////////////////////////////////////////////
// IMPORTACIÓN DE ELEMENTOS

import android.os.Bundle
import androidx.appcompat.app.AppCompatActivity
import java.net.CookieManager
import java.net.CookiePolicy
import androidx.lifecycle.lifecycleScope
import kotlinx.coroutines.launch
import androidx.lifecycle.ViewModelProvider

///////////////////////////////////////////////////////////////
// IMPORTACIÓN DE CLASES PROPIAS BD

import com.pantalasa.mudanzas.bd.Bd
import com.pantalasa.mudanzas.bd.GeneralTabla
import com.pantalasa.mudanzas.bd.SesionesTabla

///////////////////////////////////////////////////////////////
// IMPORTACIÓN DE CLASES PROPIAS GENERALES

import com.pantalasa.mudanzas.clases.Print
import com.pantalasa.mudanzas.clases.Session
import com.pantalasa.mudanzas.clases.Actividad
import com.pantalasa.mudanzas.clases.Back
import com.pantalasa.mudanzas.clases.Evaluaciones
import com.pantalasa.mudanzas.clases.Metodos

///////////////////////////////////////////////////////////////
// IMPORTACIÓN DE VIEW MODELS

import com.pantalasa.mudanzas.viewmodels.MainViewModel

class MainActivity : AppCompatActivity() {

    ///////////////////////////////////////////////////////////////
    // BLOQUE 1: INSTANCIACIÓN DE VIEW MODEL

    private lateinit var viewModel: MainViewModel

    ///////////////////////////////////////////////////////////////
    // BLOQUE 0: MÉTODO PRINCIPAL (CICLO DE VIDA)

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        ///////////////////////////////////////////////////////////////
        // BLOQUE 1: INICIALIZACIÓN DE PRINT

        val impresora = Print.getInstance()

        impresora.excepciones = mutableListOf(1)
        impresora.ruta[0] = "MainActivity.kt"
        impresora.print(mutableListOf(mutableListOf(3, "0) INICIA MainActivity.kt", false)))
        impresora.print(mutableListOf(mutableListOf(5, "1) INICIALIZACIÓN DE PRINT", true)))

        ///////////////////////////////////////////////////////////////
        // BLOQUE 2: CONFIGURACIÓN DE COOKIES

        impresora.print(mutableListOf(mutableListOf(5, "2) CONFIGURACIÓN DE COOKIES", false)))

        val cookieManager = CookieManager().apply {
            setCookiePolicy(CookiePolicy.ACCEPT_ALL)
        }
        java.net.CookieHandler.setDefault(cookieManager)

        ///////////////////////////////////////////////////////////////
        // BLOQUE 3: INICIALIZACIÓN DE BD Y TABLAS ROOM

        impresora.print(mutableListOf(mutableListOf(5, "3) INICIALIZACIÓN DE BD Y TABLAS ROOM", false)))

        val dbMudanzas = Bd.getInstance(applicationContext).obtener()
        val tablaGeneral = GeneralTabla.getInstance(dbMudanzas.generalDao())
        val tablaSesiones = SesionesTabla.getInstance(dbMudanzas.sesionesDao())

        ///////////////////////////////////////////////////////////////
        // BLOQUE 4: VARIABLES DE SESSION

        impresora.limpiaRuta()
        impresora.ruta[0] = "MainActivity.kt"
        impresora.print(mutableListOf(mutableListOf(5, "4) SESSION", false)))

        val sesionActiva = Session.getInstance()
        sesionActiva.actualizaRuta("https://fronterapalestina.org/desarrollos/mudanzas/app/")

        ///////////////////////////////////////////////////////////////
        // BLOQUE 5: AREA DEFINICIÓN ACTIVIDADES

        impresora.limpiaRuta()
        impresora.ruta[0] = "MainActivity.kt"
        impresora.print(mutableListOf(mutableListOf(5, "5) DEFINICIÓN ACTIVIDADES", false)))

        var Actividad_principal = Actividad(MainActivity::class.java as Class<*>)
        var Actividad_modalidad = Actividad(ModalidadActivity::class.java as Class<*>)
        var Actividad_offline_home = Actividad(ConstruccionActivity::class.java as Class<*>)

        ///////////////////////////////////////////////////////////////
        // BLOQUE 6: AREA DEFINICIÓN DE METODOS
        ///////////////////////////////////////////////////////////////

        var metodosActividades = Metodos()
        metodosActividades.agregarListaMetodos(
            instancias = mutableListOf(
                Pair("sesionActiva", sesionActiva),
                Pair("sesionActiva", sesionActiva),
                Pair("Actividad_principal", Actividad_principal),
                Pair("Actividad_modalidad", Actividad_modalidad)
            ),
            metodos = mutableListOf(
                "actualizaModalidad",
                "actualizaStatus",
                "cerrar",
                "lanzar"
            ),
            parametros = mutableListOf(
                mutableListOf(false),
                mutableListOf(true),
                mutableListOf(this@MainActivity),
                mutableListOf(this@MainActivity)
            ),
            ambitos = mutableListOf(0, 0, 0, 0)
        )

        metodosActividades.agregarListaMetodos(
            instancias = mutableListOf(
                Pair("sesionActiva", sesionActiva),
                Pair("sesionActiva", sesionActiva),
                Pair("Actividad_principal", Actividad_principal),
                Pair("Actividad_offline_home", Actividad_offline_home)
            ),
            metodos = mutableListOf(
                "actualizaModalidad",
                "actualizaStatus",
                "cerrar",
                "lanzar"
            ),
            parametros = mutableListOf(
                mutableListOf(false),
                mutableListOf(true),
                mutableListOf(this@MainActivity),
                mutableListOf(this@MainActivity)
            ),
            ambitos = mutableListOf(0, 0, 0, 0)
        )

        ///////////////////////////////////////////////////////////////
        // BLOQUE 7: AREA DEFINICIÓN RED

        impresora.limpiaRuta()
        impresora.ruta[0] = "MainActivity.kt"
        impresora.print(mutableListOf(mutableListOf(3, "6) DEFINICIÓN RED", false)))

        val RedMain = Back(
            contexto = this@MainActivity,
            script = "",
            parametros = mutableListOf(),
            nombres = mutableListOf(),
            respuesta = 0
        )
        lifecycleScope.launch {

            ///////////////////////////////////////////////////////////////
            // BLOQUE 8: AREA OPERACIONES EN VIEW MODEL

            impresora.limpiaRuta()
            impresora.ruta[0] = "MainActivity.kt"
            impresora.print(mutableListOf(mutableListOf(5, "7) OPERACIONES EN VIEW MODEL", false)))

            viewModel = ViewModelProvider(this@MainActivity).get(MainViewModel::class.java)
            viewModel.ejecutarFlujoInicial(
                tablaGeneral = tablaGeneral,
                tablaSesiones = tablaSesiones,
                red = RedMain,
                sesionActiva = sesionActiva,
                esSincrono = true
            )

            ///////////////////////////////////////////////////////////////
            // BLOQUE 11: EVALUACION DE LA CONEXIÓN

            impresora.limpiaRuta()
            impresora.ruta[0] = "MainActivity.kt"
            impresora.print(mutableListOf(mutableListOf(5, "11) EVALUACION DE LA CONEXIÓN", false)))
            RedMain.verificarConexion()
            val evaluacionConexion = Evaluaciones()
            evaluacionConexion.posiciones = mutableListOf(
                mutableListOf<Int>(0),
                mutableListOf<Int>(1),
                mutableListOf<Int>(),
                mutableListOf<Int>()
            )

            evaluacionConexion.errorTextoInicial = "LA CONEXIÓN "
            evaluacionConexion.errorTextoFinal = " VOY AL LOGIN OFFLINE"
            impresora.print(mutableListOf(mutableListOf(2, "ESTE ES EL STATUS DE LA CONEXIÓN ${RedMain.statusConexion}", true)))
            evaluacionConexion.agregarError(
                valor = RedMain.statusConexion,
                tipo = java.lang.Boolean::class.java,
                status = false,
                textoPrevio = "",
                textoPosterior = "",
                textoError = "",
                posicionValidaciones = listOf<Any>(),
                valoresComparacion = mutableListOf(
                    listOf(1, false, 0, "ES FALSA", listOf<Int>())
                ),
            )
            evaluacionConexion.ejecutar()
            metodosActividades.ejecutar_lista(evaluacionConexion.validacionPosiciones)
        }
    }
}