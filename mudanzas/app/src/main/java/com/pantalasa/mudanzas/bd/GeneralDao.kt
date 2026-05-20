package com.pantalasa.mudanzas.bd

import androidx.room.Dao
import androidx.room.Insert
import androidx.room.OnConflictStrategy
import androidx.room.Query
import androidx.room.RawQuery
import androidx.room.Update
import androidx.sqlite.db.SupportSQLiteQuery
import java.util.Date

/**
 * Interfaz común para todos los DAOs.
 * Define métodos genéricos que deben implementar todos los DAOs.
 */
interface BaseDao<T> {
    @Insert(onConflict = OnConflictStrategy.REPLACE)
    suspend fun insertar(entidad: T)

    @Update
    suspend fun actualizar(entidad: T)

    @Query("SELECT COUNT(*) FROM general")
    suspend fun obtenerConteo(): Int
}

/**
 * DAO para la entidad "general".
 * Proporciona métodos para interactuar con la tabla "general".
 */
@Dao
interface GeneralDao : BaseDao<General> {

    /**
     * Vacia la tabla "general".
     */
    @Query("DELETE FROM general")
    suspend fun vaciar()


    /**
     * Elimina un registro de la tabla "general".
     *
     * @param id ID del registro a eliminar.
     */
    @Query("DELETE FROM general WHERE id = :id")
    suspend fun eliminar(id: Int)

    /**
     * Obtiene todos los registros de la tabla "general".
     *
     * @return Lista de todos los registros.
     */
    @Query("SELECT * FROM general")
    suspend fun obtenerTodos(): List<General>

    /**
     * Obtiene un registro específico de la tabla "general" por su ID.
     *
     * @param id ID del registro a buscar.
     * @return Registro encontrado o null si no existe.
     */
    @Query("SELECT * FROM general WHERE id = :id")
    suspend fun obtenerPorId(id: Int): General?

    /**
     * Ejecuta una sentencia SQL personalizada.
     *
     * @param query Sentencia SQL a ejecutar.
     * @return Lista de resultados de la consulta.
     */
    @RawQuery
    suspend fun ejecutarSentenciaSQL(query: SupportSQLiteQuery): List<Any>
}