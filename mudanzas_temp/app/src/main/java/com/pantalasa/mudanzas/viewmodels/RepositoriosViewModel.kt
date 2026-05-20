package com.pantalasa.mudanzas.viewmodels

import android.util.Log
import androidx.lifecycle.ViewModel
import androidx.lifecycle.viewModelScope
import com.pantalasa.mudanzas.clases.*
import com.pantalasa.mudanzas.bd.*
import com.pantalasa.mudanzas.bd.AppDatabase
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
     * @param dbMudanzas Instancia de la base de datos.
     * @param backPaquetes Instancia de Back para manejar la conexión con el servidor.
     * @param modalActualizaRepositorios Modal para mostrar el progreso.
     * @param modalActualizarCompleto Modal para mostrar el resultado final.
     * @param metodosRepositorios Métodos para navegar entre actividades.
     */
    fun actualizarRepositorios(
        dbMudanzas: AppDatabase,
        backPaquetes: Back,
        modalActualizaRepositorios: Modal,
        modalActualizarCompleto: Modal
    ) {
        viewModelScope.launch {
            try {
                /////////////////////////////////////////////////////////////////////////
                // CREAR INSTANCIA DE TABLA PAQUETES
                /////////////////////////////////////////////////////////////////////////

                Log.d("RepositoriosViewModel", "📌 Crear instancia de TablaPaquetes")
                val tablaPaquetes = PaquetesTabla.getInstance(dbMudanzas.paquetesDao())

                /////////////////////////////////////////////////////////////////////////
                // PASO 1: MOSTRAR MODAL EN EL HILO PRINCIPAL
                /////////////////////////////////////////////////////////////////////////

                withContext(Dispatchers.Main) {
                    Log.d("RepositoriosViewModel", "📌 Iniciando PASO 1: Mostrar modal")
                    modalActualizaRepositorios.mensaje = "ACTUALIZANDO PAQUETES, ESPERE POR FAVOR"
                    modalActualizaRepositorios.mostrarSinSuspender()
                }

                /////////////////////////////////////////////////////////////////////////
                // PASO 2: BAJAR PAQUETES DE LA WEB Y COLOCARLAS EN JSON
                /////////////////////////////////////////////////////////////////////////

                withContext(Dispatchers.IO) {
                    Log.d("RepositoriosViewModel", "📌 Iniciando PASO 2: Bajar paquetes de la web")
                    backPaquetes.ejecutar()
                }

                /////////////////////////////////////////////////////////////////////////
                // PASO 3: MOSTRAR RESULTADOS JSON
                /////////////////////////////////////////////////////////////////////////

                withContext(Dispatchers.IO) {
                    Log.d("RepositoriosViewModel", "📌 Iniciando PASO 3: Mostrar resultados JSON")
                    backPaquetes.imprimirJsonResumen()
                }

                /////////////////////////////////////////////////////////////////////////
                // PASO 4: LIMPIAR TABLA CEDULAS
                /////////////////////////////////////////////////////////////////////////

                withContext(Dispatchers.IO) {
                    Log.d("RepositoriosViewModel", "📌 Iniciando PASO 4: Limpiar TablaPaquetes")
                    tablaPaquetes.borrarWeb()
                    //tablaPaquetes.vaciarTabla()
                }

                /////////////////////////////////////////////////////////////////////////
                // PASO 5: VOLCAR REGISTROS EN PAQUETES DESDE JSON
                /////////////////////////////////////////////////////////////////////////

                withContext(Dispatchers.IO) {
                    Log.d("RepositoriosViewModel", "📌 Iniciando PASO 5: Volcar registros en la tabla 'paquetes'")
                    tablaPaquetes.tipoFuente = 3
                    tablaPaquetes.resumenFuente = true
                    tablaPaquetes.volcarRegistros(backPaquetes.codigos[0])
                }

                /////////////////////////////////////////////////////////////////////////
                // PASO 6: PRESENTAR MUESTRA DE REGISTROS DE PAQUETES
                /////////////////////////////////////////////////////////////////////////

                withContext(Dispatchers.IO) {
                    Log.d("RepositoriosViewModel", "📌 Iniciando PASO 6: Presentar muestra de registros")
                    tablaPaquetes.muestra(1000)
                }

            } catch (e: Exception) {
                Log.e(
                    "RepositoriosViewModel",
                    "❌ Error en la actualización del repositorio de paquetes",
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

