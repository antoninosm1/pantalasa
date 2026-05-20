package com.pantalasa.sdhybca.bd.tablas

import androidx.room.Entity
import androidx.room.PrimaryKey
import java.util.Date

/**
 * Entidad que representa la tabla "sesiones".
 *
 * @property id Identificador único (clave primaria, autoincremental).
 * @property bd Referencia a la base de datos.
 * @property fecha Fecha y hora de la sesión.
 * @property cierre Fecha y hora de cierre de la sesión.
 */
@Entity(tableName = "sesiones")
data class Sesiones(
    @PrimaryKey(autoGenerate = true) val id: Long,
    val bd: Int,
    val fecha: Date,
    var cierre: Date?
)