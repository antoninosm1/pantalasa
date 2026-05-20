package com.pantalasa.mudanzas.bd

import androidx.room.Dao
import androidx.room.Insert
import androidx.room.Query
import kotlinx.coroutines.flow.Flow

@Dao
interface PaquetesDao {
    @Insert
    suspend fun insertar(paquetes: Paquetes)

    @Query("SELECT * FROM paquetes")
    fun obtenerPaquetes(): Flow<List<Paquetes>>

    @Query("SELECT COUNT(*) FROM paquetes")
    suspend fun obtenerConteo(): Int

    @Query("DELETE FROM paquetes WHERE id = :id")
    suspend fun eliminar(id: Long)

    @Query("DELETE FROM paquetes")
    suspend fun vaciar()

    @Query("DELETE FROM sqlite_sequence WHERE name = 'paquetes'")
    suspend fun reiniciarContadorId()

    @Query("DELETE FROM paquetes WHERE ambito = :ambito")
    suspend fun eliminarPorAmbito(ambito: Int)

    @Query("INSERT INTO paquetes (ambito, idWeb, referencia, descripcion, fecha, fechastatus, status, comentario, origen, destino, internos, total, responsable, fechaaccion) VALUES (:ambito, :idWeb, :referencia, :descripcion, :fecha, :fechastatus, :status, :comentario, :origen, :destino, :internos, :total, :responsable, :fechaaccion)")
    suspend fun insertarRegistro(
        ambito: Int,
        idWeb: Int,
        referencia: String,
        descripcion: String,
        fecha: Long,
        fechastatus: Long,
        status: Int,
        comentario: String,
        origen: String,
        destino: String,
        internos: Int,
        total: Int,
        responsable: Int,
        fechaaccion: Int
    )

    @Query("SELECT * FROM paquetes LIMIT 1")
    suspend fun obtenerPrimerRegistro(): Paquetes?

    @Query("SELECT * FROM paquetes LIMIT 1 OFFSET :offset")
    suspend fun obtenerRegistroEnIntervalo(offset: Int): Paquetes?

    @Query("SELECT * FROM paquetes ORDER BY id DESC LIMIT 1")
    suspend fun obtenerUltimoRegistro(): Paquetes?
}

