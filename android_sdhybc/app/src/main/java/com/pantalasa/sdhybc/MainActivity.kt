package com.pantalasa.sdhybc

import android.os.Bundle
import androidx.appcompat.app.AppCompatActivity
import androidx.lifecycle.lifecycleScope
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch
import kotlinx.coroutines.withContext
import java.net.CookieManager
import java.net.CookiePolicy

///////////////////////////////////////////////////////////////
// IMPORTACIÓN CLASES PROPIAS BD Y TABLAS
///////////////////////////////////////////////////////////////

import com.pantalasa.sdhybc.clases.Bd

import com.pantalasa.sdhybc.clases.TablaGeneral
import com.pantalasa.sdhybc.clases.TablaSesiones
import com.pantalasa.sdhybc.clases.TablaCedulas

///////////////////////////////////////////////////////////////
// IMPORTACIÓN OTRAS CLASES PROPIAS
///////////////////////////////////////////////////////////////

import com.pantalasa.sdhybc.clases.Session
import com.pantalasa.sdhybc.clases.Actividad
import com.pantalasa.sdhybc.clases.Back
import com.pantalasa.sdhybc.clases.Metodos
import com.pantalasa.sdhybc.clases.Evaluaciones

class MainActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        ///////////////////////////////////////////////////////////////
        // AREA COOKIES
        ///////////////////////////////////////////////////////////////

        val cookieManager = CookieManager().apply {
            setCookiePolicy(CookiePolicy.ACCEPT_ALL)
        }
        java.net.CookieHandler.setDefault(cookieManager)

        ///////////////////////////////////////////////////////////////
        // AREA BD Y TABLAS
        ///////////////////////////////////////////////////////////////

        val dbSdhybc = Bd.getInstance(applicationContext).obtener()
        val tablaGeneral = TablaGeneral.getInstance(dbSdhybc.generalDao())
        val tablaSesiones = TablaSesiones.getInstance(dbSdhybc.sesionesDao())
        val tablaCedulas = TablaCedulas.getInstance(dbSdhybc.cedulaDao())

        ///////////////////////////////////////////////////////////////
        // AREA VARIABLES DE SESION
        ///////////////////////////////////////////////////////////////

        val sesionActiva = Session.getInstance()
        sesionActiva.actualizaRuta("https://sdhybc.org/test/integral/")

        ///////////////////////////////////////////////////////////////
        // AREA ACTIVIDADES
        ///////////////////////////////////////////////////////////////

        var Actividad_principal = Actividad(MainActivity::class.java as Class<*>)
        var Actividad_line = Actividad(LineActivity::class.java as Class<*>)
        var Actividad_offline_home = Actividad(OfflineHomeActivity::class.java as Class<*>)

        ///////////////////////////////////////////////////////////////
        // AREA RED
        ///////////////////////////////////////////////////////////////

        val RedMain = Back(
            contexto = this@MainActivity,
            script = "",
            parametros = mutableListOf(),
            nombres = mutableListOf(),
            respuesta = 0
        )

        // Ejecutar operaciones de manera secuencial
        lifecycleScope.launch {
            // Ejecutar operaciones de TablaGeneral
            println("PASO 4: ACTUALIZAR TABLA GENERAL")
            withContext(Dispatchers.IO) {
                tablaGeneral.actualizar(1, "GENERAL", "PARAMETROS GENERALES")
            }

            // Ejecutar operaciones de TablaSesiones
            println("PASO 5: AGREGAR REGISTRO EN TABLA SESIONES")
            withContext(Dispatchers.IO) {
                tablaSesiones.agregaRetorno(1)
            }

            println("PASO 6: MOSTRAR REGISTROS DE LA TABLA SESIONES")
            withContext(Dispatchers.IO) {
                tablaSesiones.mostrarRegistros()
            }

            println("ESTE ES EL id DE SESION Bd ${tablaSesiones.retorno}")
            sesionActiva.sesionBd = tablaSesiones.retorno
            println("ESTE ES EL id DE SESION EN CLASE SESION: ${sesionActiva.sesionBd}")

            ///////////////////////////////////////////////////////////////
            // AREA EVALUACIONES
            ///////////////////////////////////////////////////////////////

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

            ///////////////////////////////////////////////////////////////
            // AREA METODOS ACTIVIDADES
            ///////////////////////////////////////////////////////////////

            var metodosActividades = Metodos()
            metodosActividades.agregarListaMetodos(
                instancias = mutableListOf(
                    Pair("sesionActiva", sesionActiva),
                    Pair("sesionActiva", sesionActiva),
                    Pair("Actividad_principal", Actividad_principal),
                    Pair("Actividad_line", Actividad_line)
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
            metodosActividades.ejecutar_lista(evaluacionConexion.validacionPosiciones)
        }
    }
}
