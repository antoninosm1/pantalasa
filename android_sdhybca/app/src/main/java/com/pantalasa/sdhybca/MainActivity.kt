/**
 * [📁] com.pantalasa.sdhybca/MainActivity.kt
 * [ℹ] RESTAURACIÓN del Código Base original
 * - Sin funciones adicionales
 * - Sin estructuras de decisión/bucles
 * - Solo inicializaciones y llamadas a métodos
 */
package com.pantalasa.sdhybca

import android.os.Bundle
import androidx.appcompat.app.AppCompatActivity
import androidx.lifecycle.lifecycleScope
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch
import kotlinx.coroutines.withContext
import java.net.CookieManager
import java.net.CookiePolicy

// [📦] Importaciones originales
import com.pantalasa.sdhybca.clases.Bd
import com.pantalasa.sdhybca.clases.TablaGeneral
import com.pantalasa.sdhybca.clases.TablaSesiones
import com.pantalasa.sdhybca.clases.TablaCedulas
import com.pantalasa.sdhybca.clases.Session
import com.pantalasa.sdhybca.clases.Actividad
import com.pantalasa.sdhybca.clases.Back
import com.pantalasa.sdhybca.clases.Metodos
import com.pantalasa.sdhybca.clases.Evaluaciones

class MainActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        // [⚠️] SOLO CAMBIO: Layout programático temporal para evitar error 'app'
        val frameLayout = android.widget.FrameLayout(this).apply {
            layoutParams = android.view.ViewGroup.LayoutParams(
                android.view.ViewGroup.LayoutParams.MATCH_PARENT,
                android.view.ViewGroup.LayoutParams.MATCH_PARENT
            )
        }
        setContentView(frameLayout)

        // [🍪] Área Cookies (original)
        val cookieManager = CookieManager().apply { setCookiePolicy(CookiePolicy.ACCEPT_ALL) }
        java.net.CookieHandler.setDefault(cookieManager)

        // [🗃️] Área BD y Tablas (original)
        val dbSdhybc = Bd.getInstance(applicationContext).obtener()
        val tablaGeneral = TablaGeneral.getInstance(dbSdhybc.generalDao())
        val tablaSesiones = TablaSesiones.getInstance(dbSdhybc.sesionesDao())
        val tablaCedulas = TablaCedulas.getInstance(dbSdhybc.cedulaDao())

        // [🔐] Área Sesión (original)
        val sesionActiva = Session.getInstance()
        sesionActiva.actualizaRuta("https://sdhybc.org/test/integral/")

        // [🚀] Área Actividades (original)
        var Actividad_principal = Actividad(MainActivity::class.java as Class<*>)
        var Actividad_line = Actividad(LineActivity::class.java as Class<*>)
        var Actividad_offline_home = Actividad(OfflineHomeActivity::class.java as Class<*>)

        // [📡] Área Red (original)
        val RedMain = Back(
            contexto = this@MainActivity,
            script = "",
            parametros = mutableListOf(),
            nombres = mutableListOf(),
            respuesta = 0
        )

        // [▶️] Ejecución secuencial (original)
        lifecycleScope.launch {
            // Operaciones BD (original)
            withContext(Dispatchers.IO) {
                tablaGeneral.actualizar(1, "GENERAL", "PARAMETROS GENERALES")
                tablaSesiones.agregaRetorno(1)
                tablaSesiones.mostrarRegistros()
            }

            // Verificación de conexión (original)
            RedMain.verificarConexion()

            // Evaluación (original)
            val evaluacionConexion = Evaluaciones().apply {
                posiciones = mutableListOf(
                    mutableListOf(0),
                    mutableListOf(1),
                    mutableListOf(),
                    mutableListOf()
                )
                errorTextoInicial = "LA CONEXIÓN "
                errorTextoFinal = " VOY AL LOGIN OFFLINE"
                agregarError(
                    valor = RedMain.statusConexion,
                    tipo = java.lang.Boolean::class.java,
                    status = false,
                    valoresComparacion = mutableListOf(
                        listOf(1, false, 0, "ES FALSA", listOf<Int>())
                    )
                )
                ejecutar()
            }

            // Métodos (original)
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
            metodosActividades.ejecutar_lista(evaluacionConexion.validacionPosiciones)
        }
    }
}

