/**
 * Ruta: c:\xampp\htdocs\pantalasa\mudanzas\app\src\main\java\com\pantalasa\mudanzas\viewmodels\RedViewModel.kt
 * Descripción: ViewModel para gestionar la instancia de Back (conexiones HTTP).
 * Funciones:
 * - Mantener una única instancia de Back observable (LiveData)
 * - Sincronizar estado de conexión entre Activities
 */

package com.pantalasa.mudanzas.viewmodels

import androidx.lifecycle.LiveData
import androidx.lifecycle.MutableLiveData
import androidx.lifecycle.ViewModel
import com.pantalasa.mudanzas.clases.Back  // ← Corrección 1: Importar la clase Back

class RedViewModel : ViewModel() {

    ///////////////////////////////////////////////////////////////
    // VARIABLES DE INSTANCIA

    private val _redInstance = MutableLiveData<Back?>()  // ← Corrección 2: Usar Back en lugar de Red
    val redInstance: LiveData<Back?> get() = _redInstance  // ← Corrección 3: Tipo Back

    ///////////////////////////////////////////////////////////////
    // MÉTODO: setRedInstance
    // Descripción: Actualiza la instancia observable de Back

    fun setRedInstance(red: Back) {  // ← Corrección 4: Parámetro de tipo Back
        _redInstance.value = red
    }
}
