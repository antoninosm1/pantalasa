/**
 * Ruta: sdhybca/app/src/main/java/com/pantalasa/sdhybca/bd/Converters.kt
 * Descripción: Conversores de tipos para Room Database.
 * Responsabilidades:
 * - Mapear tipos complejos a tipos compatibles con SQLite
 * - Permitir el almacenamiento de objetos personalizados en la BD
 *
 * Nota: Cada conversor debe incluir dos métodos (@TypeConverter) con lógica inversa
 */

@file:JvmName("DbTypeConverters")  // Nombre opcional para interoperabilidad con Java

package com.pantalasa.sdhybca.bd

import androidx.room.TypeConverter
import java.util.Date
import android.util.Log

/**
 * Conversores para tipos estándar.
 * Ejemplo básico: Conversión Date ↔ Long (timestamp)
 */
class Converters {

    /**
     * Convierte Date a Long (timestamp)
     * @param date Objeto Date a convertir
     * @return Valor Long o null
     */
    @TypeConverter
    fun dateToTimestamp(date: Date?): Long? {
        return date?.time?.also {
            Log.d("Converters", "Convertido Date a Long: $it")
        }
    }

    /**
     * Convierte Long (timestamp) a Date
     * @param value Timestamp a convertir
     * @return Objeto Date o null
     */
    @TypeConverter
    fun timestampToDate(value: Long?): Date? {
        return value?.let {
            Date(it).also {
                Log.d("Converters", "Convertido Long a Date: $it")
            }
        }
    }

    // Añadir más conversores según necesidades:
    // - Listas ↔ JSON
    // - Enums ↔ String
    // - Objetos personalizados ↔ String serializado
}
