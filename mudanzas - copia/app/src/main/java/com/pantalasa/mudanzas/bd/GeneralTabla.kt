/**
 * Ruta: c:\xampp\htdocs\pantalasa\mudanzas\app\src\main\java\com\pantalasa\mudanzas\bd\GeneralTabla.kt
 * Descripción: Maneja la interacción con tabla general.
 * Funciones:
 * - Persistir en toda la App (Singleton).
 * - Interactuar con GeneralDao.kt
 */

package com.pantalasa.mudanzas.bd

import android.util.Log
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.withContext
import java.util.Date
import com.pantalasa.mudanzas.clases.Print

/////////////////////////////////////////////////////////////
// CONSTRUCTOR

class GeneralTabla private constructor(private val generalDao: GeneralDao) {

    /////////////////////////////////////////////////////////////
    // VARIABLES DE INSTANCIA

    private val impresora = Print.getInstance() // Instancia única
    var total: Int = 0

    ///////////////////////////////////////////////////////////////
    // BLOQUE init - INICIALIZACIÓN DE GENERALTABLA

    init {

        ///////////////////////////////////////////////////////////////
        // CONFIGURACIÓN DE IMPRESORA (LOGS)

        impresora.ruta[3] = "GeneralTabla.kt"
        impresora.ruta[4] = "init"
        impresora.ruta[5] = ""

        impresora.print(mutableListOf(
            mutableListOf(2, "INICIANDO INICIALIZACIÓN DE GENERALTABLA", true),
            mutableListOf(3, "Configurando sistema de logs", false),
            mutableListOf(5, "Instancia ID: ${this.hashCode()}", false)
        ))

        ///////////////////////////////////////////////////////////////
        // REGISTRO FINAL DE INICIALIZACIÓN

        impresora.print(mutableListOf(
            mutableListOf(2, "INICIALIZACIÓN DE GENERALTABLA COMPLETA", true),
            mutableListOf(3, "Instancia lista para uso", false)
        ))
    }

    ///////////////////////////////////////////////////////////////
    // INSTANCIA ÚNICA DE GENERALTABLA CON GENERALDAO COMO PARAMETRO

    companion object {
        @Volatile
        private var INSTANCE: GeneralTabla? = null

        fun getInstance(generalDao: GeneralDao): GeneralTabla {
            return INSTANCE ?: synchronized(this) {
                val instance = GeneralTabla(generalDao).also { INSTANCE = it }
                Log.d("GeneralTabla", "🚀 Instancia de GeneralTabla creada: ${instance.hashCode()}")
                instance
            }
        }
    }

    /**
     * Método para contar registros en la tabla "general".
     * Actualiza la variable `total` con la cantidad de registros.
     */
    suspend fun contarRegistros() {
        try {
            Log.d("GeneralTabla", "📌 Iniciando consulta SELECT COUNT(*) FROM general")

            // Ejecutar la consulta y obtener el conteo
            total = generalDao.obtenerConteo()

            // Mostrar el resultado en el log
            Log.d("GeneralTabla", "✅ Conteo de registros en la tabla 'general': $total")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("GeneralTabla", "❌ Error al ejecutar la consulta SELECT COUNT(*)", e)
            throw e // Relanzar la excepción para manejo superior
        }
    }

    /**
     * Método para obtener todos los registros de la tabla "general".
     */
    suspend fun obtenerTodos() {
        try {
            Log.d("GeneralTabla", "📌 Iniciando consulta SELECT * FROM general")

            // Ejecutar la consulta y obtener los registros
            val registros = withContext(Dispatchers.IO) {
                generalDao.obtenerTodos()
            }

            // Mostrar el resultado en el log
            Log.d("GeneralTabla", "✅ Registros obtenidos: ${registros.size}")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("GeneralTabla", "❌ Error al ejecutar la consulta SELECT *", e)
            throw e
        }
    }

    /**
     * Método para insertar un registro en la tabla "general".
     *
     * @param registro Registro a insertar.
     */
    suspend fun insertarRegistro(registro: General) {
        try {
            Log.d("GeneralTabla", "📌 Insertando registro en la tabla 'general'")

            // Insertar el registro
            withContext(Dispatchers.IO) {
                generalDao.insertar(registro)
            }

            // Mostrar confirmación en el log
            Log.d("GeneralTabla", "✅ Registro insertado correctamente")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("GeneralTabla", "❌ Error al insertar registro", e)
            throw e
        }
    }

    /**
     * Método para eliminar un registro de la tabla "general" por su ID.
     *
     * @param id ID del registro a eliminar.
     */
    suspend fun eliminarRegistro(id: Int) {
        try {
            Log.d("GeneralTabla", "📌 Eliminando registro con ID: $id")

            // Eliminar el registro
            withContext(Dispatchers.IO) {
                generalDao.eliminar(id)
            }

            // Mostrar confirmación en el log
            Log.d("GeneralTabla", "✅ Registro eliminado correctamente")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("GeneralTabla", "❌ Error al eliminar registro", e)
            throw e
        }
    }

    /**
     * Método para vaciar la tabla "general".
     */
    suspend fun vaciarTabla() {
        try {
            Log.d("GeneralTabla", "📌 Vaciando tabla")

            // Vaciar tabla
            withContext(Dispatchers.IO) {
                generalDao.vaciar()
            }

            // Mostrar confirmación en el log
            Log.d("GeneralTabla", "✅ Tabla vaciada correctamente")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("GeneralTabla", "❌ Error al vaciar tabla", e)
            throw e
        }
    }

    /**
     * Método para actualizar la tabla "general".
     * Si no hay registros, inserta uno nuevo con los parámetros proporcionados.
     * Si hay registros, imprime la cantidad de registros existentes.
     *
     * @param id ID del registro a insertar (en caso de no existir registros).
     * @param nombre Nombre del registro a insertar.
     * @param descripcion Descripción del registro a insertar.
     */
    suspend fun actualizar(id: Int, nombre: String, descripcion: String) {
        try {
            Log.d("GeneralTabla", "📌 Iniciando proceso de actualización de la tabla 'general'")

            // Contar los registros actuales
            contarRegistros()

            // Verificar si no hay registros
            if (total == 0) {
                Log.d("GeneralTabla", "📌 No hay registros. Insertando nuevo registro...")

                // Crear un nuevo registro
                val nuevoRegistro = General(
                    id = id,
                    nombre = nombre,
                    descripcion = descripcion,
                    inicio = Date() // Fecha y hora actuales
                )

                // Insertar el registro
                insertarRegistro(nuevoRegistro)

                // Mostrar confirmación en el log
                Log.d("GeneralTabla", "✅ Nuevo registro insertado: ID=$id, Nombre=$nombre, Descripción=$descripcion")
            } else {
                // Mostrar la cantidad de registros existentes
                Log.d("GeneralTabla", "✅ La tabla 'general' ya contiene $total registros.")
            }
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("GeneralTabla", "❌ Error durante el proceso de actualización", e)
            throw e
        }
    }
}

