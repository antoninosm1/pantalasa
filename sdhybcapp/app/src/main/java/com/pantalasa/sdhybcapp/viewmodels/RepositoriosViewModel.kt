package com.pantalasa.sdhybcapp.viewmodels

import android.util.Log
import androidx.lifecycle.ViewModel
import androidx.lifecycle.viewModelScope
import com.pantalasa.sdhybcapp.clases.*
import com.pantalasa.sdhybcapp.bd.*
import com.pantalasa.sdhybcapp.bd.AppDatabase
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch
import kotlinx.coroutines.withContext
/**
 * ViewModel para manejar la lógica de actualización de repositorios.
 */
class RepositoriosViewModel : ViewModel() {

    /**
     * Método para actualizar los repositorios de cédulas.
     *
     * @param dbSdhybc Instancia de la base de datos.
     * @param backCedulas Instancia de Back para manejar la conexión con el servidor.
     * @param modalActualizaRepositorios Modal para mostrar el progreso.
     * @param modalActualizarCompleto Modal para mostrar el resultado final.
     * @param metodosRepositorios Métodos para navegar entre actividades.
     */
    fun actualizarRepositorios(
        dbSdhybc: AppDatabase,
        backCedulas: Back,
        modalActualizaRepositorios: Modal,
        modalActualizarCompleto: Modal
    ) {
        viewModelScope.launch {
            try {
                /////////////////////////////////////////////////////////////////////////
                // CREAR INSTANCIA DE TABLA CEDULAS
                /////////////////////////////////////////////////////////////////////////

                Log.d("RepositoriosViewModel", "📌 Crear instancia de TablaCedulas")
                val tablaCedulas = CedulasTabla.getInstance(dbSdhybc.cedulaDao())

                /////////////////////////////////////////////////////////////////////////
                // PASO 1: MOSTRAR MODAL EN EL HILO PRINCIPAL
                /////////////////////////////////////////////////////////////////////////

                withContext(Dispatchers.Main) {
                    Log.d("RepositoriosViewModel", "📌 Iniciando PASO 1: Mostrar modal")
                    modalActualizaRepositorios.mensaje = "ACTUALIZANDO CEDULAS, ESPERE POR FAVOR"
                    modalActualizaRepositorios.mostrarSinSuspender()
                }

                /////////////////////////////////////////////////////////////////////////
                // PASO 2: BAJAR CÉDULAS DE LA WEB Y COLOCARLAS EN JSON
                /////////////////////////////////////////////////////////////////////////

                withContext(Dispatchers.IO) {
                    Log.d("RepositoriosViewModel", "📌 Iniciando PASO 2: Bajar cédulas de la web")
                    backCedulas.ejecutar()
                }

                /////////////////////////////////////////////////////////////////////////
                // PASO 3: MOSTRAR RESULTADOS JSON
                /////////////////////////////////////////////////////////////////////////

                withContext(Dispatchers.IO) {
                    Log.d("RepositoriosViewModel", "📌 Iniciando PASO 3: Mostrar resultados JSON")
                    backCedulas.imprimirJsonResumen()
                }

                /////////////////////////////////////////////////////////////////////////
                // PASO 4: LIMPIAR TABLA CEDULAS
                /////////////////////////////////////////////////////////////////////////

                withContext(Dispatchers.IO) {
                    Log.d("RepositoriosViewModel", "📌 Iniciando PASO 4: Limpiar TablaCedulas")
                    tablaCedulas.borrarWeb()
                    //tablaCedulas.vaciarTabla()
                }

                /////////////////////////////////////////////////////////////////////////
                // PASO 5: VOLCAR REGISTROS EN CEDULAS DESDE JSON
                /////////////////////////////////////////////////////////////////////////

                withContext(Dispatchers.IO) {
                    Log.d("RepositoriosViewModel", "📌 Iniciando PASO 5: Volcar registros en la tabla 'cedulas'")
                    tablaCedulas.tipoFuente = 3
                    tablaCedulas.resumenFuente = true
                    tablaCedulas.volcarRegistros(backCedulas.codigos[0])
                }

                /////////////////////////////////////////////////////////////////////////
                // PASO 6: PRESENTAR MUESTRA DE REGISTROS DE CEDULAS
                /////////////////////////////////////////////////////////////////////////

                withContext(Dispatchers.IO) {
                    Log.d("RepositoriosViewModel", "📌 Iniciando PASO 6: Presentar muestra de registros")
                    tablaCedulas.muestra(1000)
                }

            } catch (e: Exception) {
                Log.e(
                    "RepositoriosViewModel",
                    "❌ Error en la actualización del repositorio de cédulas",
                    e
                )
            } finally {

                /////////////////////////////////////////////////////////////////////////
                // PASO 7: CERRAR MODAL
                /////////////////////////////////////////////////////////////////////////

                withContext(Dispatchers.Main) {
                    Log.d("RepositoriosViewModel", "📌 Iniciando PASO 7: Cerrar modal y navegar")
                    modalActualizaRepositorios.cerrar()
                    modalActualizarCompleto.mostrar()
                }
            }
        }
    }
}

