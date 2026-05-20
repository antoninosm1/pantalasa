package com.pantalasa.sdhybc.clases

import android.app.Activity
import android.widget.EditText

class Datos(

    var configuraciones: MutableList<Any>,
    var elementosValoresIniciales: MutableList<Any>,
    var elementosValores: MutableList<Any>,
    var elementosIdXml: MutableList<String>,
    var elementosTipoXml: MutableList<Int>,
    var elementosValidacion: MutableList<Int>,
    private val activity: Activity

)

{

    // Método para actualizar el valor de un elemento en el formulario
    fun actualiza_valor(posicion: Int, valor: Any) {
        elementosValores[posicion] = valor
    }

    // Método para validar datos
    fun validar_datos() {

        elementosValidacion.forEach {posicion ->
            println("VALIDACION: ${posicion} VALORES: ${elementosValores[posicion]}")
        }

    }
}