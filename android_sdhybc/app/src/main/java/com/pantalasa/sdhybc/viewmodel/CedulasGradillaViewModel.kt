package com.pantalasa.sdhybc.viewmodel

import android.util.Log
import androidx.lifecycle.ViewModel
import androidx.lifecycle.viewModelScope // Importación añadida
import com.pantalasa.sdhybc.clases.TablaCedulas
import com.pantalasa.sdhybc.clases.Modal
import com.pantalasa.sdhybc.clases.Back
import com.pantalasa.sdhybc.bd.AppDatabase
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch
import kotlinx.coroutines.withContext
import java.util.concurrent.atomic.AtomicBoolean
import com.pantalasa.sdhybc.bd.tablas.ComboItem // Importación añadida

/**
 * ViewModel para manejar la lógica de actualización de cédulas y localidades.
 * Garantiza ejecución secuencial paso a paso sin concurrencia.
 */
class CedulasGradillaViewModel : ViewModel() {

    // Control de ejecución (AtomicBoolean para thread-safety)
    private val estaEjecutando = AtomicBoolean(false)

    // ======================================================================
    // MÉTODO PARA ACTUALIZAR CÉDULAS
    // ======================================================================

    /**
     * Actualiza las cédulas desde el backend de forma secuencial
     * @param dbSdhybc Instancia de la base de datos
     * @param backCedulas Configuración para conexión con backend
     * @param modalActualizaCedulas Modal para mostrar progreso
     */
    fun actualizarCedulas(
        dbSdhybc: AppDatabase,
        backCedulas: Back,
        modalActualizaCedulas: Modal
    ) {
        if (!estaEjecutando.compareAndSet(false, true)) {
            Log.w("CedulasGradillaVM", "Actualización ya en progreso")
            return
        }

        viewModelScope.launch {
            try {
                // PASO 1: CREAR INSTANCIA DE TABLA CEDULAS
                Log.d("CedulasGradillaVM", "##%%## PASO 1: Crear instancia TablaCedulas")
                val tablaCedulas = TablaCedulas.getInstance(dbSdhybc.cedulaDao())

                // PASO 2: MOSTRAR MODAL DE AVISO
                withContext(Dispatchers.Main) {
                    Log.d("CedulasGradillaVM", "##%%## PASO 2: Mostrar modal")
                    modalActualizaCedulas.mensaje = "ACTUALIZANDO CÉDULAS, ESPERE POR FAVOR"
                    modalActualizaCedulas.mostrarSinSuspender()
                }

                if (tablaCedulas.statusFuente == false) {
                    // PASO 3: BAJAR CÉDULAS DE LA WEB
                    withContext(Dispatchers.IO) {
                        Log.d("CedulasGradillaVM", "##%%## PASO 3: Bajar cédulas web")
                        backCedulas.ejecutar()
                    }

                    // PASO 4: MOSTRAR RESULTADOS JSON
                    withContext(Dispatchers.IO) {
                        Log.d("CedulasGradillaVM", "##%%## PASO 4: Mostrar JSON")
                        backCedulas.imprimirJsonResumen()
                    }

                    // PASO 5: LIMPIAR TABLA CEDULAS
                    withContext(Dispatchers.IO) {
                        Log.d("CedulasGradillaVM", "##%%## PASO 5: Limpiar tabla")
                        tablaCedulas.vaciarTabla()
                    }

                    // PASO 6: VOLCAR REGISTROS
                    withContext(Dispatchers.IO) {
                        Log.d("CedulasGradillaVM", "##%%## PASO 6: Volcar registros")
                        tablaCedulas.tipoFuente = 3
                        tablaCedulas.resumenFuente = true
                        tablaCedulas.volcarRegistros(backCedulas.codigos[0])
                    }
                }

                // PASO 7: PRESENTAR MUESTRA
                withContext(Dispatchers.IO) {
                    Log.d("CedulasGradillaVM", "##%%## PASO 7: Mostrar muestra")
                    tablaCedulas.muestra(1000)
                }

            } catch (e: Exception) {
                Log.e("CedulasGradillaVM", "❌ Error actualizando cédulas", e)
            } finally {
                // PASO 8: CERRAR MODAL
                withContext(Dispatchers.Main) {
                    Log.d("CedulasGradillaVM", "##%%## PASO 8: Cerrar modal")
                    modalActualizaCedulas.cerrar()
                    estaEjecutando.set(false)
                }
            }
        }
    }

    // ======================================================================
    // MÉTODO PARA CONSULTAR LOCALIDADES
    // ======================================================================

    /**
     * Consulta localidades para el ComboList de forma secuencial
     * @param dbSdhybc Instancia de la base de datos
     * @param modalActualizaCedulas Modal para mostrar progreso
     */
    fun consultarLocalidadesCedulasCombo(
        dbSdhybc: AppDatabase,
        modalActualizaCedulas: Modal
    ) {
        if (!estaEjecutando.compareAndSet(false, true)) {
            Log.w("CedulasGradillaVM", "Consulta ya en progreso")
            return
        }

        viewModelScope.launch {
            try {
                // PASO 1: MOSTRAR MODAL
                withContext(Dispatchers.Main) {
                    Log.d("CedulasGradillaVM", "##%%## PASO 1: Mostrar modal localidades")
                    modalActualizaCedulas.mensaje = "CARGANDO LOCALIDADES"
                    modalActualizaCedulas.mostrarSinSuspender()
                }

                // PASO 2: CREAR INSTANCIA
                Log.d("CedulasGradillaVM", "##%%## PASO 2: Crear instancia TablaCedulas")
                val tablaCedulas = TablaCedulas.getInstance(dbSdhybc.cedulaDao())

                // PASO 3: CONSULTAR LOCALIDADES
                withContext(Dispatchers.IO) {
                    Log.d("CedulasGradillaVM", "##%%## PASO 3: Consultar localidades")
                    tablaCedulas.consultarLocalidadesCedulasCombo()
                }

                Log.d("CedulasGradillaVM", "Localidades obtenidas: ${tablaCedulas.resultadoCombo.size}")

            } catch (e: Exception) {
                Log.e("CedulasGradillaVM", "❌ Error consultando localidades", e)
            } finally {
                withContext(Dispatchers.Main) {
                    Log.d("CedulasGradillaVM", "##%%## PASO FINAL: Cerrar modal")
                    modalActualizaCedulas.cerrar()
                    estaEjecutando.set(false)
                }
            }
        }
    }

    /**
     * Método principal que coordina la actualización y consulta de datos.
     * @param dbSdhybc Instancia de Room Database
     * @param backCedulas Clase Back para conexión PHP
     * @param modalActualizaCedulas Modal UI
     * @param onCompletado Callback con resultados para el ComboList
     */
    fun ejecutarProcesoCompleto(
        dbSdhybc: AppDatabase,
        backCedulas: Back,
        modalActualizaCedulas: Modal,
        onCompletado: (List<ComboItem>) -> Unit
    ) {
        // Validar estado de ejecución
        if (!estaEjecutando.compareAndSet(false, true)) {
            Log.w("CedulasGradillaVM", "🚨 Bloqueado: Proceso ya en ejecución (flag=${estaEjecutando.get()})")
            return
        }

        viewModelScope.launch {
            try {
                /* PASO 1: ACTUALIZAR CÉDULAS DESDE BACKEND */
                Log.d("CedulasGradillaVM", "##%%## PASO 1/3: Iniciando actualización de cédulas")
                actualizarCedulas(dbSdhybc, backCedulas, modalActualizaCedulas)

                /* PASO 2: CONSULTAR LOCALIDADES PARA COMBO */
                Log.d("CedulasGradillaVM", "##%%## PASO 2/3: Consultando localidades en Room")
                val tablaCedulas = TablaCedulas.getInstance(dbSdhybc.cedulaDao()).apply {
                    consultarLocalidadesCedulasCombo()
                    inspeccionarResultadoCombo() // Diagnóstico interno
                }

                /* PASO 3: NOTIFICAR A UI (MainThread) */
                withContext(Dispatchers.Main) {
                    Log.d("CedulasGradillaVM", "##%%## PASO 3/3: Notificando UI (items=${tablaCedulas.resultadoCombo.size})")
                    when {
                        tablaCedulas.resultadoCombo.isEmpty() -> {
                            Log.w("CedulasGradillaVM", "⚠️ resultadoCombo vacío")
                            onCompletado(listOf(ComboItem("##!##NO_X##!##NO_X##!##NO_X##!##NO_X##!##", "SIN DATOS")))
                        }
                        else -> {
                            Log.d("CedulasGradillaVM", "##%%## Notificando ${tablaCedulas.resultadoCombo.size} items")
                            val datosValidados = tablaCedulas.resultadoCombo.map {
                                ComboItem(it.value, it.text) // Asegura tipo correcto
                            }
                            onCompletado(datosValidados)
                            //onCompletado(tablaCedulas.resultadoCombo)
                        }
                    }
                }

            } catch (e: Exception) {
                Log.e("CedulasGradillaVM", "💥 Error en proceso completo", e)
            } finally {
                /* LIBERAR RECURSOS */
                estaEjecutando.set(false)
                Log.d("CedulasGradillaVM", "##%%## PROCESO FINALIZADO (flag liberado)")
            }
        }
    }
}
