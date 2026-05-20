package com.pantalasa.sdhybcapp.bd

import android.content.Context
import android.util.Log
import androidx.room.Room
import com.pantalasa.sdhybcapp.clases.Print

class Bd private constructor(private val appContext: Context) {

    // Nombre de la base de datos
    private val dbName = "sdhybc_db"
    private val impresora = Print.getInstance() // Instancia única
    
    // Instancia de la base de datos (se inicializa solo cuando se accede por primera vez)
    val database: AppDatabase by lazy {
        impresora.ruta[5] = "AppDatabase.kt"
        impresora.print(mutableListOf(mutableListOf(5, "Creando la base de datos SOLO UNA VEZ", false)))
        Room.databaseBuilder(
            appContext,
            AppDatabase::class.java,
            dbName
        )
            .build() // No usar fallbackToDestructiveMigration para evitar borrar la BD
    }

    // Método para obtener la base de datos
    fun obtener(): AppDatabase {
        impresora.ruta[3] = "Bd.kt"
        impresora.ruta[4] = "obtener()"
        impresora.print(mutableListOf(mutableListOf(5, "Obteniendo la base de datos", false)))
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