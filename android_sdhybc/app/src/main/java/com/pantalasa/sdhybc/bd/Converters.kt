package com.pantalasa.sdhybc.bd

import androidx.room.TypeConverter
import java.util.Date

/**
 * Clase que proporciona métodos para convertir tipos de datos no compatibles con Room.
 */
class Converters {

    /**
     * Convierte un valor Long (milisegundos) a un objeto Date.
     *
     * @param value Valor Long que representa la fecha en milisegundos.
     * @return Objeto Date correspondiente.
     */
    @TypeConverter
    fun fromTimestamp(value: Long?): Date? {
        return value?.let { Date(it) }
    }

    /**
     * Convierte un objeto Date a un valor Long (milisegundos).
     *
     * @param date Objeto Date a convertir.
     * @return Valor Long que representa la fecha en milisegundos.
     */
    @TypeConverter
    fun dateToTimestamp(date: Date?): Long? {
        return date?.time
    }
}