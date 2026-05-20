///////////////////////////////////////////////////////////////
// ARCHIVO COMPLETO - Bd.kt
///////////////////////////////////////////////////////////////

package com.pantalasa.mudanzas.bd

import android.content.Context
import android.util.Log
import androidx.room.Room
import com.pantalasa.mudanzas.clases.Print
import com.pantalasa.mudanzas.BuildConfig

/**
 * Descripción: Clase Singleton para gestionar la instancia única de la BD Room.
 * Funciones:
 * - Crear/obtener instancia de AppDatabase
 * - Borrar BD en desarrollo (solo debug)
 */
class Bd private constructor(private val appContext: Context) {

    ///////////////////////////////////////////////////////////////
    // BLOQUE 1: VARIABLES Y CONFIGURACIÓN INICIAL
    ///////////////////////////////////////////////////////////////
    private val dbName = "mudanzas_db"
    private val impresora = Print.getInstance()

    // Instancia lazy de la BD
    val database: AppDatabase by lazy {
        impresora.ruta[5] = "AppDatabase.kt"
        impresora.print(mutableListOf(mutableListOf(5, "Creando la base de datos SOLO UNA VEZ", false)))
        Room.databaseBuilder(
            appContext,
            AppDatabase::class.java,
            dbName
        )
            .addMigrations(AppDatabase.MIGRATION_3_4)  // [!] Migración actualizada
            .build()
    }

    ///////////////////////////////////////////////////////////////
    // BLOQUE 2: MÉTODOS PÚBLICOS
    ///////////////////////////////////////////////////////////////
    fun obtener(): AppDatabase {
        impresora.ruta[3] = "Bd.kt"
        impresora.ruta[4] = "obtener()"
        impresora.print(mutableListOf(mutableListOf(5, "Obteniendo la base de datos", false)))
        return database
    }

    fun eliminar() {
        Log.d("Bd", "🛑 Eliminando la base de datos...")
        appContext.deleteDatabase(dbName)
        Log.d("Bd", "✅ Base de datos eliminada.")
    }

    ///////////////////////////////////////////////////////////////
    // BLOQUE 3: COMPANION OBJECT (Singleton)
    ///////////////////////////////////////////////////////////////
    companion object {
        @Volatile
        private var INSTANCE: Bd? = null

        fun getInstance(context: Context): Bd {
            return INSTANCE ?: synchronized(this) {
                val instance = Bd(context.applicationContext).apply {
                    // [!] Solo borrar en desarrollo
                    if (BuildConfig.DEBUG) context.deleteDatabase(dbName)
                }
                INSTANCE = instance
                Log.d("Bd", "🚀 Instancia de Bd creada: ${instance.hashCode()}")
                instance
            }
        }
    }
}