package com.pantalasa.sdhybc.bd.tablas

import androidx.room.Entity
import androidx.room.PrimaryKey
import java.util.Date

@Entity(tableName = "apoyos")
data class Apoyo(
    @PrimaryKey val id: Int,
    val usuarioId: Int,
    val programa: Int,
    val cedulaId: Int,
    val resp: Int,
    val desco: String,
    val fecEntr: Date,
    val numDeta: Int,
    val fecReg: Date,
    val ambito: Int
)