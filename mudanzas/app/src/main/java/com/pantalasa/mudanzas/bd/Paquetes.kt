package com.pantalasa.mudanzas.bd

import androidx.room.Entity
import androidx.room.PrimaryKey

@Entity(tableName = "paquetes")
data class Paquetes(
    @PrimaryKey(autoGenerate = true) val ID: Long = 0, // Autoincremental
    val ambito: Int,
    val idWeb: Int,
    val referencia: String,
    val descripcion: String,
    val fecha: Long,
    val fechastatus: Long,
    val status: Int,
    val comentario: String,
    val origen: String,
    val destino: String,
    val internos: Int,
    val total: Int,
    val responsable: Int,
    val fechaaccion: Long
)