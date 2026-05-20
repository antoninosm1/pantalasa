package com.pantalasa.sdhybca.bd.tablas

import androidx.room.Entity
import androidx.room.PrimaryKey
import java.util.Date

/**
 * Entidad que representa la tabla "general".
 *
 * @property id Identificador único (clave primaria).
 * @property nombre Nombre (máximo 50 caracteres).
 * @property descripcion Descripción (máximo 200 caracteres).
 * @property inicio Fecha y hora de inicio.
 */
@Entity(tableName = "general")
data class General(
    @PrimaryKey val id: Int,
    val nombre: String,
    val descripcion: String,
    val inicio: Date // Campo de tipo Date
)