package com.pantalasa.sdhybc.bd.modelos

import androidx.room.ColumnInfo

data class LocalidadesResult(
    @ColumnInfo(name = "clave") val clave: String,
    @ColumnInfo(name = "texto") val texto: String
)