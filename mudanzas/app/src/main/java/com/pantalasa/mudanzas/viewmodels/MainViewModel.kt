/**
 * Ruta: c:\xampp\htdocs\pantalasa\mudanzas\app\src\main\java\com\pantalasa\mudanzas\viewmodels\MainViewModel.kt
 * Descripción: ViewModel principal para manejar lógica de inicio de la aplicación.
 * Funciones:
 * - Gestionar inicialización de tablas de BD
 * - Verificar estado de conexión
 * - Coordinar flujo inicial de la app
 */
package com.pantalasa.mudanzas.viewmodels

import androidx.lifecycle.ViewModel
import com.pantalasa.mudanzas.clases.Print
import com.pantalasa.mudanzas.clases.Back
import com.pantalasa.mudanzas.bd.GeneralTabla
import com.pantalasa.mudanzas.bd.SesionesTabla
import com.pantalasa.mudanzas.clases.Session
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.withContext

///////////////////////////////////////////////////////////////
// DEFINICIÓN DE VIEW MODEL CON LOGS DE SEGUIMIENTO
class MainViewModel : ViewModel() {

    ///////////////////////////////////////////////////////////////
    // FUNCIÓN: obtenerImpresora

    private fun obtenerImpresora(): Print {
        return Print.getInstance().apply {
            ruta[1] = "VIEW MODEL DE MainActtivity : MainViewModel"
        }
    }

    ///////////////////////////////////////////////////////////////
    // FUNCIÓN: ejecutarFlujoInicial

    suspend fun ejecutarFlujoInicial(
        tablaGeneral: GeneralTabla,
        tablaSesiones: SesionesTabla,
        red: Back,
        sesionActiva: Session,
        esSincrono: Boolean = true
    ) {

        obtenerImpresora().ruta[2] = "FUNCIÓN DE VIEW MODEL : ejecutarFlujoInicial()"
        obtenerImpresora().print(mutableListOf(
            mutableListOf(3, "INICIANDO FLUJO PRINCIPAL", false),
            mutableListOf(5, "INICIA ejecutarFlujoInicial() de MainViewModel", true)
        ))

        try {
            // Ejecución secuencial (síncrona por defecto)
            actualizarTablaGeneral(tablaGeneral, esSincrono)
            operacionesTablaSesiones(tablaSesiones, sesionActiva, esSincrono)
            mostrarRegistrosSesiones(tablaSesiones, esSincrono)
            val estadoConexion = evaluarConexion(red, esSincrono)

            obtenerImpresora().print(mutableListOf(
                mutableListOf(3, "FLUJO COMPLETADO - Conexión: $estadoConexion", true)
            ))

            estadoConexion
        } catch (e: Exception) {
            obtenerImpresora().print(mutableListOf(
                mutableListOf(8, "ERROR EN FLUJO PRINCIPAL: ${e.message}", true)
            ))
            throw e
        }
    }

    ///////////////////////////////////////////////////////////////
    // FUNCIÓN: actualizarTablaGeneral

    suspend fun actualizarTablaGeneral(
        tablaGeneral: GeneralTabla,
        esSincrono: Boolean = true,
        esperarOtrosProcesos: Boolean = true
    ) {
        obtenerImpresora().ruta[2] = "FUNCIÓN DE VIEW MODEL : actualizarTablaGeneral()"
        obtenerImpresora().print(mutableListOf(
            mutableListOf(5, "INICIA actualizarTablaGeneral", true),
            mutableListOf(3, "Modo: ${if(esSincrono) "Síncrono" else "Asíncrono"}", false)
        ))

        try {
            if (esSincrono) {
                withContext(Dispatchers.IO) {
                    tablaGeneral.actualizar(1, "GENERAL", "PARAMETROS GENERALES")
                }
            } else {
                tablaGeneral.actualizar(1, "GENERAL", "PARAMETROS GENERALES")
            }

            obtenerImpresora().print(mutableListOf(
                mutableListOf(3, "Tabla general actualizada correctamente", true)
            ))
        } catch (e: Exception) {
            obtenerImpresora().print(mutableListOf(
                mutableListOf(8, "Error al actualizar tabla general: ${e.message}", true)
            ))
            throw e
        }
    }

    ///////////////////////////////////////////////////////////////
    // FUNCIÓN: operacionesTablaSesiones

    suspend fun operacionesTablaSesiones(
        tablaSesiones: SesionesTabla,
        sesionActiva: Session,
        esSincrono: Boolean = true,
        esperarOtrosProcesos: Boolean = true
    ) {

        obtenerImpresora().ruta[2] = "FUNCIÓN DE VIEW MODEL : operacionesTablaSesiones()"
        obtenerImpresora().print(mutableListOf(
            mutableListOf(5, "INICIA operacionesTablaSesiones", true)
        ))

        try {
            if (esSincrono) {
                withContext(Dispatchers.IO) {
                    tablaSesiones.agregaRetorno(1)
                    sesionActiva.sesionBd = tablaSesiones.retorno
                }
            } else {
                tablaSesiones.agregaRetorno(1)
                sesionActiva.sesionBd = tablaSesiones.retorno
            }

            obtenerImpresora().print(mutableListOf(
                mutableListOf(3, "Sesión creada con ID: ${tablaSesiones.retorno}", true)
            ))
        } catch (e: Exception) {
            obtenerImpresora().print(mutableListOf(
                mutableListOf(8, "Error en operaciones de sesión: ${e.message}", true)
            ))
            throw e
        }
    }

    ///////////////////////////////////////////////////////////////
    // FUNCIÓN: mostrarRegistrosSesiones

    suspend fun mostrarRegistrosSesiones(
        tablaSesiones: SesionesTabla,
        esSincrono: Boolean = true,
        esperarOtrosProcesos: Boolean = true
    ) {
        obtenerImpresora().print(mutableListOf(
            mutableListOf(5, "INICIA mostrarRegistrosSesiones", true)
        ))

        try {
            if (esSincrono) {
                withContext(Dispatchers.IO) {
                    tablaSesiones.mostrarRegistros()
                }
            } else {
                tablaSesiones.mostrarRegistros()
            }
        } catch (e: Exception) {
            obtenerImpresora().print(mutableListOf(
                mutableListOf(8, "Error al mostrar registros: ${e.message}", true)
            ))
            throw e
        }
    }

    ///////////////////////////////////////////////////////////////
    // FUNCIÓN: evaluarConexion

    suspend fun evaluarConexion(
        red: Back,
        esSincrono: Boolean = true,
        esperarOtrosProcesos: Boolean = true
    ): Boolean {
        obtenerImpresora().print(mutableListOf(
            mutableListOf(5, "INICIA evaluarConexion", true)
        ))

        return try {
            if (esSincrono) {
                withContext(Dispatchers.IO) {
                    red.verificarConexion()
                    red.statusConexion
                }
            } else {
                red.verificarConexion()
                red.statusConexion
            }.also { estado ->
                obtenerImpresora().print(mutableListOf(
                    mutableListOf(3, "Estado conexión: $estado", true)
                ))
            }
        } catch (e: Exception) {
            obtenerImpresora().print(mutableListOf(
                mutableListOf(8, "Error al evaluar conexión: ${e.message}", true)
            ))
            throw e
        }
    }
}

