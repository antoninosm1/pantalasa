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
    private val impresora = Print.getInstance().apply {
        ruta[1] = "MainViewModel"
    }

    ///////////////////////////////////////////////////////////////
    // FUNCIÓN: actualizarTablaGeneral
    // Descripción: Actualiza la tabla general de la BD local
    suspend fun actualizarTablaGeneral(
        tablaGeneral: GeneralTabla,
        esSincrono: Boolean = true,
        esperarOtrosProcesos: Boolean = true
    ) {
        impresora.print(mutableListOf(
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

            impresora.print(mutableListOf(
                mutableListOf(3, "Tabla general actualizada correctamente", true)
            ))
        } catch (e: Exception) {
            impresora.print(mutableListOf(
                mutableListOf(8, "Error al actualizar tabla general: ${e.message}", true)
            ))
            throw e
        }
    }

    ///////////////////////////////////////////////////////////////
    // FUNCIÓN: operacionesTablaSesiones
    // Descripción: Realiza operaciones con la tabla de sesiones
    suspend fun operacionesTablaSesiones(
        tablaSesiones: SesionesTabla,
        sesionActiva: Session,
        esSincrono: Boolean = true,
        esperarOtrosProcesos: Boolean = true
    ) {
        impresora.print(mutableListOf(
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

            impresora.print(mutableListOf(
                mutableListOf(3, "Sesión creada con ID: ${tablaSesiones.retorno}", true)
            ))
        } catch (e: Exception) {
            impresora.print(mutableListOf(
                mutableListOf(8, "Error en operaciones de sesión: ${e.message}", true)
            ))
            throw e
        }
    }

    ///////////////////////////////////////////////////////////////
    // FUNCIÓN: mostrarRegistrosSesiones
    // Descripción: Muestra registros de la tabla de sesiones
    suspend fun mostrarRegistrosSesiones(
        tablaSesiones: SesionesTabla,
        esSincrono: Boolean = true,
        esperarOtrosProcesos: Boolean = true
    ) {
        impresora.print(mutableListOf(
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
            impresora.print(mutableListOf(
                mutableListOf(8, "Error al mostrar registros: ${e.message}", true)
            ))
            throw e
        }
    }

    ///////////////////////////////////////////////////////////////
    // FUNCIÓN: evaluarConexion
    // Descripción: Evalúa el estado de la conexión
    suspend fun evaluarConexion(
        red: Back,
        esSincrono: Boolean = true,
        esperarOtrosProcesos: Boolean = true
    ): Boolean {
        impresora.print(mutableListOf(
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
                impresora.print(mutableListOf(
                    mutableListOf(3, "Estado conexión: $estado", true)
                ))
            }
        } catch (e: Exception) {
            impresora.print(mutableListOf(
                mutableListOf(8, "Error al evaluar conexión: ${e.message}", true)
            ))
            throw e
        }
    }

    ///////////////////////////////////////////////////////////////
    // FUNCIÓN: ejecutarFlujoInicial
    // Descripción: Orquesta todo el flujo inicial de la app
    suspend fun ejecutarFlujoInicial(
        tablaGeneral: GeneralTabla,
        tablaSesiones: SesionesTabla,
        red: Back,
        sesionActiva: Session,
        esSincrono: Boolean = true
    ) {
        impresora.print(mutableListOf(
            mutableListOf(3, "INICIANDO FLUJO PRINCIPAL", false),
            mutableListOf(5, "INICIA ejecutarFlujoInicial", true)
        ))

        try {
            // Ejecución secuencial (síncrona por defecto)
            actualizarTablaGeneral(tablaGeneral, esSincrono)
            operacionesTablaSesiones(tablaSesiones, sesionActiva, esSincrono)
            mostrarRegistrosSesiones(tablaSesiones, esSincrono)
            val estadoConexion = evaluarConexion(red, esSincrono)

            impresora.print(mutableListOf(
                mutableListOf(3, "FLUJO COMPLETADO - Conexión: $estadoConexion", true)
            ))

            estadoConexion
        } catch (e: Exception) {
            impresora.print(mutableListOf(
                mutableListOf(8, "ERROR EN FLUJO PRINCIPAL: ${e.message}", true)
            ))
            throw e
        }
    }
}

