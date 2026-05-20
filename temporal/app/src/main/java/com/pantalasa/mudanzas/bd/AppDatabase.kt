package com.pantalasa.mudanzas.bd

import androidx.room.Database
import androidx.room.Room
import androidx.room.RoomDatabase
import androidx.room.TypeConverters
import androidx.room.migration.Migration
import androidx.sqlite.db.SupportSQLiteDatabase
import android.content.Context
import android.util.Log

/**
 * Clase principal de la base de datos.
 * Define las entidades y los DAOs, y proporciona acceso a la base de datos.
 *
 * @property VERSION Versión de la base de datos (debe incrementarse si cambia el esquema).
 */
@Database(
    entities = [General::class, Sesiones::class, Cedula::class, Paquetes::class], // Entidades de la base de datos
    version = 4 // Versión de la base de datos
)
@TypeConverters(Converters::class) // Registrar los TypeConverters
abstract class AppDatabase : RoomDatabase() {

    // Métodos abstractos para obtener los DAOs
    abstract fun generalDao(): GeneralDao
    abstract fun sesionesDao(): SesionesDao
    abstract fun cedulaDao(): CedulaDao
    abstract fun paquetesDao(): PaquetesDao

    companion object {
        @Volatile
        private var INSTANCE: AppDatabase? = null

        // Migración de la versión 1 a la versión 2
        private val MIGRATION_1_2 = object : Migration(1, 2) {
            override fun migrate(database: SupportSQLiteDatabase) {
                Log.d("AppDatabase", "📌 Migrando de la versión 1 a la versión 2")

                // Ejemplo: Agregar una nueva columna a la tabla Cedula
                database.execSQL("ALTER TABLE cedulas ADD COLUMN nueva_columna TEXT DEFAULT 'valor_predeterminado'")
            }
        }

        // Migración de la versión 2 a la versión 3
        private val MIGRATION_2_3 = object : Migration(2, 3) {
            override fun migrate(database: SupportSQLiteDatabase) {
                Log.d("AppDatabase", "📌 Migrando de la versión 2 a la versión 3")

                // Ejemplo: Crear una nueva tabla
                database.execSQL(
                    """
                    CREATE TABLE nueva_tabla (
                        id INTEGER PRIMARY KEY AUTOINCREMENT,
                        nombre TEXT NOT NULL
                    )
                    """.trimIndent()
                )
            }
        }

///////////////////////////////////////////////////////////////
// BLOQUE 1: CONFIGURACIÓN DE MIGRACIÓN PARA ELIMINAR TABLA CEDULA
///////////////////////////////////////////////////////////////

        val MIGRATION_3_4 = object : Migration(3, 4) {
            override fun migrate(database: SupportSQLiteDatabase) {
                // Paso 1: Backup de datos críticos (si aplica)
                database.execSQL("""
            CREATE TABLE IF NOT EXISTS paquetes_backup AS 
            SELECT * FROM paquetes
        """)

                // Paso 2: Eliminar tabla obsoleta
                database.execSQL("DROP TABLE IF EXISTS cedula")

                // Paso 3: Crear nueva estructura (Room lo hace automáticamente)
            }
        }

        /**
         * Obtiene la instancia de la base de datos.
         * Si no existe, la crea.
         *
         * @param context Contexto de la aplicación.
         * @return Instancia de AppDatabase.
         */
        fun getInstance(context: Context): AppDatabase {
            return INSTANCE ?: synchronized(this) {
                Log.d("AppDatabase", "📌 Creando o obteniendo la instancia de la base de datos")

                val instance = Room.databaseBuilder(
                    context.applicationContext,
                    AppDatabase::class.java,
                    "mudanzas_db" // Nombre de la base de datos
                )
                    .addMigrations(MIGRATION_1_2, MIGRATION_2_3) // Agregar migraciones
                    .fallbackToDestructiveMigration() // Permitir migraciones destructivas si no se encuentra una migración
                    .build()

                INSTANCE = instance
                instance
            }
        }
    }
}