/**
 * Ruta: c:\xampp\htdocs\pantalasa\mudanzas\app\src\main\java\com\pantalasa\mudanzas\bd\AppDatabase.kt
 * Descripción: Clase principal de la base de datos Room para la aplicación Mudanzas.
 * Funciones:
 * - Definir entidades y versión de la base de datos
 * - Proporcionar acceso a los DAOs de las tablas
 * - Gestionar migraciones entre versiones de la base de datos
 * - Garantizar instancia única (Singleton) de la base de datos
 * - Implementar sistema centralizado de logs con Clase Print
 */

package com.pantalasa.mudanzas.bd

import androidx.room.Database
import androidx.room.Room
import androidx.room.RoomDatabase
import androidx.room.TypeConverters
import androidx.room.migration.Migration
import androidx.sqlite.db.SupportSQLiteDatabase
import android.content.Context

///////////////////////////////////////////////////////////////
// IMPORTACIÓN DE CLASE PRINT PARA LOGS CENTRALIZADOS
import com.pantalasa.mudanzas.clases.Print

///////////////////////////////////////////////////////////////
// DEFINICIÓN PRINCIPAL DE LA BASE DE DATOS
@Database(
    entities = [General::class, Sesiones::class, Paquetes::class],
    // ↑ CEDULA ELIMINADA - SOLO 3 ENTIDADES ↑
    version = 5 // INCREMENTADA DE 4 A 5
)
@TypeConverters(Converters::class)
abstract class AppDatabase : RoomDatabase() {

    ///////////////////////////////////////////////////////////////
    // MÉTODOS ABSTRACTOS PARA OBTENER DAOs - CEDULADAO ELIMINADO
    abstract fun generalDao(): GeneralDao
    abstract fun sesionesDao(): SesionesDao
    abstract fun paquetesDao(): PaquetesDao
    // ↑ CEDULADAO ELIMINADO - SOLO 3 DAOs ↑

    ///////////////////////////////////////////////////////////////
    // COMPANION OBJECT: MIGRACIONES Y SINGLETON
    companion object {
        @Volatile
        private var INSTANCE: AppDatabase? = null

        ///////////////////////////////////////////////////////////////
        // FUNCIÓN: OBTENER IMPRESORA CONFIGURADA PARA LOGS
        private fun obtenerImpresora(): Print {
            return Print.getInstance().apply {
                ruta[3] = "AppDatabase.kt"
                ruta[4] = "CompanionObject"
            }
        }

        ///////////////////////////////////////////////////////////////
        // MIGRACIÓN DE LA VERSIÓN 1 A LA VERSIÓN 2
        private val MIGRATION_1_2 = object : Migration(1, 2) {
            override fun migrate(database: SupportSQLiteDatabase) {
                obtenerImpresora().print(mutableListOf(
                    mutableListOf(5, "MIGRACIÓN 1→2 INICIADA", true)
                ))

                // Ejemplo: Agregar una nueva columna a la tabla Cedula
                database.execSQL("ALTER TABLE cedulas ADD COLUMN nueva_columna TEXT DEFAULT 'valor_predeterminado'")

                obtenerImpresora().print(mutableListOf(
                    mutableListOf(3, "Migración 1→2 completada: Columna agregada", true)
                ))
            }
        }

        ///////////////////////////////////////////////////////////////
        // MIGRACIÓN DE LA VERSIÓN 2 A LA VERSIÓN 3
        private val MIGRATION_2_3 = object : Migration(2, 3) {
            override fun migrate(database: SupportSQLiteDatabase) {
                obtenerImpresora().print(mutableListOf(
                    mutableListOf(5, "MIGRACIÓN 2→3 INICIADA", true)
                ))

                // Ejemplo: Crear una nueva tabla
                database.execSQL(
                    """
                    CREATE TABLE nueva_tabla (
                        id INTEGER PRIMARY KEY AUTOINCREMENT,
                        nombre TEXT NOT NULL
                    )
                    """.trimIndent()
                )

                obtenerImpresora().print(mutableListOf(
                    mutableListOf(3, "Migración 2→3 completada: Nueva tabla creada", true)
                ))
            }
        }

        ///////////////////////////////////////////////////////////////
        // MIGRACIÓN DE LA VERSIÓN 3 A LA VERSIÓN 4
        val MIGRATION_3_4 = object : Migration(3, 4) {
            override fun migrate(database: SupportSQLiteDatabase) {
                obtenerImpresora().print(mutableListOf(
                    mutableListOf(5, "MIGRACIÓN 3→4 INICIADA", true)
                ))

                try {
                    // Paso 1: Backup de datos críticos
                    database.execSQL("""
                        CREATE TABLE IF NOT EXISTS paquetes_backup AS 
                        SELECT * FROM paquetes
                    """)

                    // Paso 2: Eliminar tabla obsoleta
                    database.execSQL("DROP TABLE IF EXISTS cedula")

                    obtenerImpresora().print(mutableListOf(
                        mutableListOf(3, "Migración 3→4 completada: Tabla cedula eliminada", true)
                    ))

                } catch (e: Exception) {
                    obtenerImpresora().print(mutableListOf(
                        mutableListOf(8, "ERROR en migración 3→4: ${e.message}", true)
                    ))
                    throw e
                }
            }
        }

        ///////////////////////////////////////////////////////////////
        // MIGRACIÓN DE LA VERSIÓN 4 A LA VERSIÓN 5 - NUEVA MIGRACIÓN
        private val MIGRATION_4_5 = object : Migration(4, 5) {
            override fun migrate(database: SupportSQLiteDatabase) {
                obtenerImpresora().print(mutableListOf(
                    mutableListOf(3, "INICIANDO MIGRACIÓN 4→5", false),
                    mutableListOf(5, "ELIMINACIÓN COMPLETA DE TABLA CEDULAS", true)
                ))

                try {
                    ///////////////////////////////////////////////////////////////
                    // BLOQUE 1: BACKUP PREVENTIVO DE DATOS
                    obtenerImpresora().print(mutableListOf(
                        mutableListOf(2, "Creando backup preventivo de cedulas", false)
                    ))

                    database.execSQL("""
                        CREATE TABLE IF NOT EXISTS cedulas_backup_v5 
                        AS SELECT * FROM cedulas
                    """)

                    ///////////////////////////////////////////////////////////////
                    // BLOQUE 2: ELIMINACIÓN DEFINITIVA DE TABLA CEDULAS
                    obtenerImpresora().print(mutableListOf(
                        mutableListOf(2, "Eliminando tabla cedulas permanentemente", false)
                    ))

                    database.execSQL("DROP TABLE IF EXISTS cedulas")

                    ///////////////////////////////////////////////////////////////
                    // BLOQUE 3: LIMPIEZA DE SECUENCIA AUTOINCREMENTAL
                    obtenerImpresora().print(mutableListOf(
                        mutableListOf(2, "Limpiando secuencia autoincremental", false)
                    ))

                    database.execSQL("DELETE FROM sqlite_sequence WHERE name = 'cedulas'")

                    ///////////////////////////////////////////////////////////////
                    // BLOQUE 4: CONFIRMACIÓN DE MIGRACIÓN EXITOSA
                    obtenerImpresora().print(mutableListOf(
                        mutableListOf(3, "Migración 4→5 completada exitosamente", false),
                        mutableListOf(5, "TABLA CEDULAS ELIMINADA DEL SISTEMA", true)
                    ))

                } catch (e: Exception) {
                    obtenerImpresora().print(mutableListOf(
                        mutableListOf(8, "ERROR CRÍTICO en migración 4→5: ${e.message}", true)
                    ))
                    throw e
                }
            }
        }

        ///////////////////////////////////////////////////////////////
        // MÉTODO SINGLETON PARA OBTENER INSTANCIA DE LA BASE DE DATOS
        fun getInstance(context: Context): AppDatabase {
            return INSTANCE ?: synchronized(this) {
                val impresora = obtenerImpresora()
                impresora.print(mutableListOf(
                    mutableListOf(3, "SOLICITUD DE INSTANCIA DE BD", false),
                    mutableListOf(5, "CREANDO/OBTENIENDO INSTANCIA CON MIGRACIÓN 4→5", true)
                ))

                val instance = Room.databaseBuilder(
                    context.applicationContext,
                    AppDatabase::class.java,
                    "mudanzas_db"
                )
                    .addMigrations(MIGRATION_1_2, MIGRATION_2_3, MIGRATION_3_4, MIGRATION_4_5)
                    .fallbackToDestructiveMigration()
                    .build()

                impresora.print(mutableListOf(
                    mutableListOf(3, "Instancia de BD creada exitosamente", false),
                    mutableListOf(5, "MIGRACIONES CONFIGURADAS: 1→2, 2→3, 3→4, 4→5", true)
                ))

                INSTANCE = instance
                instance
            }
        }
    }
}
