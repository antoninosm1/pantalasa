/**
 * Ruta: sdhybca/app/src/main/java/com/pantalasa/sdhybca/bd/AppDatabase.kt
 * Descripción: Configuración principal de la base de datos Room
 */

package com.pantalasa.sdhybca.bd

import android.content.Context
import android.util.Log
import androidx.room.Database
import androidx.room.Room
import androidx.room.RoomDatabase
import androidx.room.TypeConverters
import androidx.room.migration.Migration
import androidx.sqlite.db.SupportSQLiteDatabase
import com.pantalasa.sdhybca.bd.tablas.General
import com.pantalasa.sdhybca.bd.tablas.GeneralDao
import com.pantalasa.sdhybca.bd.tablas.Sesiones
import com.pantalasa.sdhybca.bd.tablas.SesionesDao
import com.pantalasa.sdhybca.bd.tablas.Cedula
import com.pantalasa.sdhybca.bd.tablas.CedulaDao

@Database(
    entities = [General::class, Sesiones::class, Cedula::class],
    version = 3,
    exportSchema = false
)
@TypeConverters(Converters::class)  // Asegúrate de que el import sea correcto
abstract class AppDatabase : RoomDatabase() {

    abstract fun generalDao(): GeneralDao
    abstract fun sesionesDao(): SesionesDao
    abstract fun cedulaDao(): CedulaDao

    companion object {
        @Volatile
        private var INSTANCE: AppDatabase? = null

        // 3. Migraciones como constantes en tiempo de compilación
        private val MIGRATION_1_2: Migration = object : Migration(1, 2) {
            override fun migrate(database: SupportSQLiteDatabase) {
                Log.d("AppDatabase", "Migración 1→2")
                database.execSQL("ALTER TABLE cedulas ADD COLUMN nueva_columna TEXT DEFAULT 'valor'")
            }
        }

        private val MIGRATION_2_3: Migration = object : Migration(2, 3) {
            override fun migrate(database: SupportSQLiteDatabase) {
                Log.d("AppDatabase", "Migración 2→3")
                database.execSQL("""
                    CREATE TABLE nueva_tabla (
                        id INTEGER PRIMARY KEY AUTOINCREMENT,
                        nombre TEXT NOT NULL
                    )
                """.trimIndent())
            }
        }

        fun getInstance(context: Context): AppDatabase {
            return INSTANCE ?: synchronized(this) {
                val instance = Room.databaseBuilder(
                    context.applicationContext,
                    AppDatabase::class.java,
                    "sdhybc_db"
                )
                    .addMigrations(MIGRATION_1_2, MIGRATION_2_3)
                    .fallbackToDestructiveMigration()
                    .build()
                INSTANCE = instance
                instance
            }
        }
    }
}
