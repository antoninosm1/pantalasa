package com.pantalasa.sdhybc.bd.tablas

import androidx.room.Dao
import androidx.room.Insert
import androidx.room.Query

@Dao
interface ApoyoDao {
    @Insert
    fun insertar(apoyo: Apoyo)

    @Query("SELECT * FROM apoyos")
    fun obtenerApoyos(): List<Apoyo>
}