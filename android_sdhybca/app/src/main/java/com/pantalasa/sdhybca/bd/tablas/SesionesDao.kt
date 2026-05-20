package com.pantalasa.sdhybca.bd.tablas

import androidx.room.Dao
import androidx.room.Insert
import androidx.room.OnConflictStrategy
import androidx.room.Query
import androidx.room.RawQuery
import androidx.room.Update
import androidx.sqlite.db.SupportSQLiteQuery
import java.util.Date

/**
 * DAO para la entidad "sesiones".
 * Proporciona métodos para interactuar con la tabla "sesiones".
 */
@Dao
interface SesionesDao {

    /**
     * Inserta un registro en la tabla "sesiones".
     * Si ya existe un registro con el mismo ID, lo reemplaza.
     *
     * @param sesiones Registro a insertar.
     * @return ID del registro insertado (autoincremental).
     */
    @Insert(onConflict = OnConflictStrategy.REPLACE)
    suspend fun insertar(sesiones: Sesiones): Long

    /**
     * Actualiza un registro en la tabla "sesiones".
     *
     * @param sesiones Registro a actualizar.
     */
    @Update
    suspend fun actualizar(sesiones: Sesiones)

    /**
     * Elimina un registro de la tabla "sesiones".
     *
     * @param id ID del registro a eliminar.
     */
    @Query("DELETE FROM sesiones WHERE id = :id")
    suspend fun eliminar(id: Long)

    /**
     * Obtiene todos los registros de la tabla "sesiones".
     *
     * @return Lista de todos los registros.
     */
    @Query("SELECT * FROM sesiones")
    suspend fun obtenerTodos(): List<Sesiones>

    /**
     * Obtiene un registro específico de la tabla "sesiones" por su ID.
     *
     * @param id ID del registro a buscar.
     * @return Registro encontrado o null si no existe.
     */
    @Query("SELECT * FROM sesiones WHERE id = :id")
    suspend fun obtenerPorId(id: Long): Sesiones?

    /**
     * Vacía la tabla "sesiones".
     */
    @Query("DELETE FROM sesiones")
    suspend fun vaciar()

    /**
     * Cuenta los registros en la tabla "sesiones".
     *
     * @return Número de registros en la tabla.
     */
    @Query("SELECT COUNT(*) FROM sesiones")
    suspend fun obtenerConteo(): Int

    /**
     * Ejecuta una sentencia SQL personalizada.
     *
     * @param query Sentencia SQL a ejecutar.
     * @return Lista de resultados de la consulta.
     */
    @RawQuery
    suspend fun ejecutarSentenciaSQL(query: SupportSQLiteQuery): List<Any>

    /**
     * Obtiene todos los registros de la tabla "sesiones" ordenados por ID.
     *
     * @return Lista de registros ordenados por ID.
     */
    @Query("SELECT * FROM sesiones ORDER BY id")
    suspend fun obtenerTodosOrdenadosPorId(): List<Sesiones>
}