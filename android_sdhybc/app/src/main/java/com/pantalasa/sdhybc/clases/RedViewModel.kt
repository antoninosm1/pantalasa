package com.pantalasa.sdhybc.clases

import androidx.lifecycle.LiveData
import androidx.lifecycle.MutableLiveData
import androidx.lifecycle.ViewModel

// Clase ViewModel para gestionar la instancia de RedMain
class RedViewModel : ViewModel() {
    // LiveData para RedMain
    private val _redMain = MutableLiveData<Red?>()
    val redMain: LiveData<Red?> get() = _redMain

    // Método para actualizar la instancia de RedMain
    fun setRedMain(red: Red) {
        _redMain.value = red
    }
}
