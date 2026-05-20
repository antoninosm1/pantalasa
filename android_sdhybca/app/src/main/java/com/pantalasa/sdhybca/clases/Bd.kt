package com.pantalasa.sdhybca.clases

import android.content.Context
import android.util.Log
import androidx.room.Room
import com.pantalasa.sdhybca.bd.AppDatabase

class Bd private constructor(private val appContext: Context) {

    // Nombre de la base de datos
    private val dbName = "sdhybc_db"

    // Instancia de la base de datos (se inicializa solo cuando se accede por primera vez)
    val database: AppDatabase by lazy {
        Log.d("Bd", "✅ Creando la base de datos SOLO UNA VEZ")
        Room.databaseBuilder(
            appContext,
            AppDatabase::class.java,
            dbName
        )
            .build() // No usar fallbackToDestructiveMigration para evitar borrar la BD
    }

    // Método para obtener la base de datos
    fun obtener(): AppDatabase {
        Log.d("Bd", "📌 Obteniendo la base de datos")
        return database
    }

    // Método para eliminar la base de datos
    fun eliminar() {
        Log.d("Bd", "🛑 Eliminando la base de datos...")
        appContext.deleteDatabase(dbName)
        Log.d("Bd", "✅ Base de datos eliminada.")
    }

    companion object {
        @Volatile
        private var INSTANCE: Bd? = null

        // Método para obtener la instancia única de Bd
        fun getInstance(context: Context): Bd {
            return INSTANCE ?: synchronized(this) {
                val instance = Bd(context.applicationContext).also { INSTANCE = it }
                Log.d("Bd", "🚀 Instancia de Bd creada: ${instance.hashCode()}")
                instance
            }
        }
    }
}