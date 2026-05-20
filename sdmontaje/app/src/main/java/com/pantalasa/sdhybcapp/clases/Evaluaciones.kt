package com.pantalasa.mudanzas.clases

import kotlin.reflect.full.memberFunctions
import android.app.Activity

data class Errores(
    var valor: Any,
    var tipo: Class<*>,
    var status: Boolean,
    var textoPrevio: String,
    var textoPosterior: String,
    var textoError: String,
    var posicionValidaciones: List<Any>,
    var valoresComparacion: MutableList<List<Any>>
)

class Evaluaciones(
    var status: Boolean = false,
    var validacionPosiciones: MutableList<Int> = mutableListOf(),
    var errorTexto: String = "",
    var posiciones: MutableList<Any> = mutableListOf(
        mutableListOf<Int>(), // Lista 1
        mutableListOf<Int>(), // Lista 2
        mutableListOf<Int>(), // Lista 3
        mutableListOf<Int>()  // Lista 4
    ),
    var errorTextoInicial: String = "",
    var errorTextoFinal: String = "",
    errores: MutableList<Errores> = mutableListOf()
) {
    private val errores: MutableList<Errores> = errores

    // Función para agregar un error
    fun agregarError(
        valor: Any,
        tipo: Class<*>,
        status: Boolean,
        textoPrevio: String,
        textoPosterior: String,
        textoError: String,
        posicionValidaciones: List<Any>,
        valoresComparacion: MutableList<List<Any>>
    ) {
        errores.add(
            Errores(
                valor,
                tipo,
                status,
                textoPrevio,
                textoPosterior,
                textoError,
                posicionValidaciones,
                valoresComparacion
            )
        )
    }

    // Función para asignar un valor a una posición específica en los errores
    fun recibe_valor(posicion: Int, valor: Any) {
        errores[posicion].valor = valor
    }

    // Método principal de ejecución
    fun ejecutar() {
        // Reiniciar valores iniciales y establecer estado predeterminado
        this.status = true
        this.validacionPosiciones = mutableListOf()
        this.errorTexto = ""

        // Concatenación acumulativa para texto de errores
        val concatenacionErrores = StringBuilder()

        // Recorrer las validaciones
        for (validacion in errores) {
            // Reiniciar estados y valores de cada validación
            validacion.status = true
            validacion.textoError = ""
            validacion.posicionValidaciones = listOf()

            // Acumulación de texto de error para cada validación
            val textoComparaciones = StringBuilder()

            // Iterar sobre las listas de valores de comparación
            for (valorComparacion in validacion.valoresComparacion) {
                val tipoComparacion = valorComparacion[0] as Int
                val valorComparar = valorComparacion[1]
                val esNegacion = valorComparacion[2] as Int == 1
                val textoAConcatenar = valorComparacion[3] as String // Texto de la 5ª posición

                // Comparaciones basadas en el tipo
                val resultado = when (tipoComparacion) {
                    1 -> compararIgualdad(validacion.valor, valorComparar, validacion.tipo, esNegacion)
                    2 -> compararMenor(validacion.valor, valorComparar, validacion.tipo, esNegacion)
                    3 -> compararMenorIgual(validacion.valor, valorComparar, validacion.tipo, esNegacion)
                    4 -> compararMayor(validacion.valor, valorComparar, validacion.tipo, esNegacion)
                    5 -> compararMayorIgual(validacion.valor, valorComparar, validacion.tipo, esNegacion)
                    6 -> compararNulo(validacion.valor, esNegacion)
                    7 -> compararCero(validacion.valor, esNegacion)
                    8 -> compararNegativo(validacion.valor, esNegacion)
                    9 -> compararDecimales(validacion.valor, esNegacion)
                    10 -> compararEspacios(validacion.valor as? String, esNegacion, soloExtremos = true)
                    11 -> compararEspacios(validacion.valor as? String, esNegacion, soloExtremos = false)
                    12 -> compararNuloOVacio(validacion.valor, esNegacion) // Nuevo tipo de validación
                    else -> false
                }

                if (resultado) {
                    // Actualizar posición de validaciones y texto acumulado
                    validacion.posicionValidaciones = validacion.posicionValidaciones + valorComparacion[4]
                    textoComparaciones.append(textoAConcatenar)
                    validacion.status = false
                }
            }

            // Concatenar texto de error para cada validación
            validacion.textoError = validacion.textoPrevio + textoComparaciones + validacion.textoPosterior
            concatenacionErrores.append(validacion.textoError)

            // Evaluar el estado general de la validación
            if (!validacion.status) this.status = false
        }

        // Asignar valores a validacionPosiciones según el estado general


        validacionPosiciones = if (this.status) {
            posiciones[0] as MutableList<Int>
        } else {
            val listaFinal = (posiciones[2] as MutableList<Int>) +
                    (posiciones[1] as MutableList<Int>) +
                    errores.flatMap {
                        it.posicionValidaciones.flatMap { pos ->
                            if (pos is List<*>) pos.filterIsInstance<Int>() else listOf(pos as Int)
                        }
                    } +
                    (posiciones[3] as MutableList<Int>)
            listaFinal.toMutableList()
        }

        // Asignar texto final de error
        this.errorTexto = this.errorTextoInicial + concatenacionErrores + this.errorTextoFinal
    }

    // Métodos auxiliares para las comparaciones
    private fun compararIgualdad(valor: Any, comparar: Any, tipo: Class<*>, negacion: Boolean): Boolean {
        return if (tipo.isInstance(valor) && tipo.isInstance(comparar)) {
            if (negacion) valor != comparar else valor == comparar
        } else false
    }

    private fun compararMenor(valor: Any, comparar: Any, tipo: Class<*>, negacion: Boolean): Boolean {
        return if (valor is Number && comparar is Number) {
            if (negacion) valor.toDouble() >= comparar.toDouble() else valor.toDouble() < comparar.toDouble()
        } else false
    }

    private fun compararMenorIgual(valor: Any, comparar: Any, tipo: Class<*>, negacion: Boolean): Boolean {
        return if (valor is Number && comparar is Number) {
            if (negacion) valor.toDouble() > comparar.toDouble() else valor.toDouble() <= comparar.toDouble()
        } else false
    }

    private fun compararMayor(valor: Any, comparar: Any, tipo: Class<*>, negacion: Boolean): Boolean {
        return if (valor is Number && comparar is Number) {
            if (negacion) valor.toDouble() <= comparar.toDouble() else valor.toDouble() > comparar.toDouble()
        } else false
    }

    private fun compararMayorIgual(valor: Any, comparar: Any, tipo: Class<*>, negacion: Boolean): Boolean {
        return if (valor is Number && comparar is Number) {
            if (negacion) valor.toDouble() < comparar.toDouble() else valor.toDouble() >= comparar.toDouble()
        } else false
    }

    private fun compararNulo(valor: Any, negacion: Boolean): Boolean {
        return if (negacion) valor != null else valor == null
    }

    private fun compararCero(valor: Any, negacion: Boolean): Boolean {
        return if (valor is Number) {
            if (negacion) valor.toDouble() != 0.0 else valor.toDouble() == 0.0
        } else false
    }

    private fun compararNegativo(valor: Any, negacion: Boolean): Boolean {
        return if (valor is Number) {
            if (negacion) valor.toDouble() >= 0.0 else valor.toDouble() < 0.0
        } else false
    }

    private fun compararDecimales(valor: Any, negacion: Boolean): Boolean {
        return if (valor is Number) {
            if (negacion) valor.toDouble() % 1 == 0.0 else valor.toDouble() % 1 != 0.0
        } else false
    }

    private fun compararEspacios(valor: String?, negacion: Boolean, soloExtremos: Boolean): Boolean {
        if (valor == null) return false
        val tieneEspacios = if (soloExtremos) {
            valor.startsWith(" ") || valor.endsWith(" ")
        } else {
            valor.contains(" ")
        }
        return if (negacion) !tieneEspacios else tieneEspacios
    }

    private fun compararNuloOVacio(valor: Any?, negacion: Boolean): Boolean {
        return if (valor == null) {
            !negacion // Si es nulo, devolver true si no se niega, de lo contrario false
        } else if (valor is String) {
            val esVacio = valor.isEmpty()
            if (negacion) !esVacio else esVacio // Si es cadena, validar si está vacía
        } else {
            false // No aplica la validación para otros tipos
        }
    }
}
