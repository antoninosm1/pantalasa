package com.pantalasa.mudanzas.clases

import android.app.Activity

// Clase que representa un elemento dentro del formulario.
data class ElementoFormulario(
    var id: String,          // Identificador único (por ejemplo, ID XML)
    var valorInicial: Any,   // Valor inicial del dato (puede ser de cualquier tipo)
    var valor: Any,          // Valor del dato (puede ser de cualquier tipo)
    var tipo: Class<*>,      // Tipo del dato (String, Int, etc.)
    var imprimible: Boolean, // Si se debe imprimir o no
    var capturable: Boolean, // Si se debe capturar o no
    var validable: Boolean,  // Si se debe validar o no
    var status: Boolean,     // Estado general de la validación
    var erroresElemento: String,
    var tiposValidaciones: MutableList<Int>, // Lista de tipos de validaciones
    var erroresValidaciones: MutableList<String>, // Lista de tipos de validaciones
    var statusValidaciones: MutableList<Boolean> // Lista de los resultados de validaciones
)

// Clase que representa un formulario con múltiples elementos y funcionalidades.
class Formulario(
    var tipoTratamiento: Int,
    var validado: Boolean,
    var idPantalla: String,
    var cadenaErrores: String,
    var activity: Activity,
    elementos: MutableList<ElementoFormulario> = mutableListOf() // Lista inicial de elementos
) {
    // Propiedad inicializada con los elementos recibidos en el constructor.
    var elementos: MutableList<ElementoFormulario> = elementos

    // Método para agregar un nuevo elemento al formulario.
    fun agregarElemento(
        id: String,
        valorInicial: Any,
        valor: Any,
        tipo: Class<*>,
        imprimible: Boolean,
        capturable: Boolean,
        validable: Boolean,
        status: Boolean,
        erroresElemento: String,
        tiposValidaciones: MutableList<Int>,
        erroresValidaciones: MutableList<String>,
        statusValidaciones: MutableList<Boolean>
    ) {
        elementos.add(
            ElementoFormulario(
                id,
                valorInicial,
                valor,
                tipo,
                imprimible,
                capturable,
                validable,
                status,
                erroresElemento,
                tiposValidaciones,
                erroresValidaciones,
                statusValidaciones
            )
        )
    }

    // Método para actualizar el valor de un elemento en una posición específica.
    fun actualiza_valor(posicion: Int, valor: Any) {
        try {
            if (posicion in 0 until elementos.size) {
                var elemento = elementos[posicion]
                if (elemento.tipo.isInstance(valor)) {
                    elemento.valor = valor
                    println("El valor del elemento con id '${elemento.id}' ha sido actualizado a: $valor")
                } else {
                    println("Error: El valor proporcionado no coincide con el tipo esperado (${elemento.tipo.simpleName})")
                }
            } else {
                println("Error: La posición $posicion está fuera de los límites de la lista de elementos.")
            }
        } catch (e: Exception) {
            println("Error al actualizar el valor: ${e.message}")
        }
    }

//////////////////////////////////////////////////////////////////////
// METODO validar_datos()
//////////////////////////////////////////////////////////////////////

    // Método para validar los datos del formulario.
    fun validar_datos() {
        try {
            var errores = 0
            cadenaErrores = ""
            elementos.forEach { elemento ->
                elemento.status = true
                elemento.erroresElemento = ""

                if (elemento.validable) {

                    elemento.tiposValidaciones.forEachIndexed { index, tipoValidacion ->
                        elemento.statusValidaciones[index] = true // Inicializa en true.
                        when (tipoValidacion) {
                            1 -> { // Validación de no estar vacío.
                                if (elemento.valor is String) {
                                    if ((elemento.valor as String).isBlank()) {
                                        elemento.statusValidaciones[index] = false
                                        if (errores==0) {
                                            cadenaErrores = elemento.erroresValidaciones[index]
                                        }
                                        else {
                                            cadenaErrores = cadenaErrores + " " + elemento.erroresValidaciones[index]
                                        }
                                        errores++
                                    }
                                } else if (elemento.valor is Int) {
                                    if (elemento.valor == 0) {
                                        elemento.statusValidaciones[index] = false
                                        if (errores==0) {
                                            cadenaErrores = elemento.erroresValidaciones[index]
                                        }
                                        else {
                                            cadenaErrores = cadenaErrores + " " + elemento.erroresValidaciones[index]
                                        }
                                        errores++
                                    }
                                }
                            }
                            2 -> { // Validación de espacios.
                                if (elemento.valor is String) {
                                    val valorStr = elemento.valor as String
                                    if (valorStr.startsWith(" ") || valorStr.endsWith(" ") || valorStr.contains("  ")) {
                                        elemento.statusValidaciones[index] = false
                                        if (errores==0) {
                                            cadenaErrores = elemento.erroresValidaciones[index]
                                        }
                                        else {
                                            cadenaErrores = cadenaErrores + " " + elemento.erroresValidaciones[index]
                                        }
                                        errores++
                                    }
                                }
                            }
                        }
                    }
                    // Si alguna validación es falsa, contar como error.
//                    if (!elemento.statusValidaciones.all { it }) {
//                        errores++
//                    }
                }
                if (errores > 0) {
                    elemento.status = false
                    println("VALIDACION DE ELEMENTO: ${elemento.status}")

                }
            }
            println("CANTIDAD DE ERRORES: ${errores}")
            validado = errores == 0
            println("STATUS DE TODO EL FORMULARIO: ${validado}")
        } catch (e: Exception) {
            println("Error al validar los datos: ${e.message}")
        }
    }
}
