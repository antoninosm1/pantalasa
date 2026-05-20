package com.pantalasa.sdhybc.clases

import android.util.Log
import com.pantalasa.sdhybc.bd.tablas.General
import com.pantalasa.sdhybc.bd.tablas.GeneralDao
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.withContext
import java.util.Date

/**
 * Clase Singleton para manejar operaciones en la tabla "general".
 * Implementa el patrón Singleton para asegurar una única instancia en toda la aplicación.
 * Proporciona métodos para interactuar con la tabla "general" a través de GeneralDao.
 */
class TablaGeneral private constructor(private val generalDao: GeneralDao) {

    // Variable de instancia para almacenar el total de registros
    var total: Int = 0

    companion object {
        @Volatile
        private var INSTANCE: TablaGeneral? = null

        /**
         * Método para obtener la instancia única de TablaGeneral.
         *
         * @param generalDao DAO de la tabla general
         * @return Instancia única de TablaGeneral
         */
        fun getInstance(generalDao: GeneralDao): TablaGeneral {
            return INSTANCE ?: synchronized(this) {
                val instance = TablaGeneral(generalDao).also { INSTANCE = it }
                Log.d("TablaGeneral", "🚀 Instancia de TablaGeneral creada: ${instance.hashCode()}")
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
            Log.d("TablaGeneral", "📌 Iniciando consulta SELECT COUNT(*) FROM general")

            // Ejecutar la consulta y obtener el conteo
            total = generalDao.obtenerConteo()

            // Mostrar el resultado en el log
            Log.d("TablaGeneral", "✅ Conteo de registros en la tabla 'general': $total")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("TablaGeneral", "❌ Error al ejecutar la consulta SELECT COUNT(*)", e)
            throw e // Relanzar la excepción para manejo superior
        }
    }

    /**
     * Método para obtener todos los registros de la tabla "general".
     */
    suspend fun obtenerTodos() {
        try {
            Log.d("TablaGeneral", "📌 Iniciando consulta SELECT * FROM general")

            // Ejecutar la consulta y obtener los registros
            val registros = withContext(Dispatchers.IO) {
                generalDao.obtenerTodos()
            }

            // Mostrar el resultado en el log
            Log.d("TablaGeneral", "✅ Registros obtenidos: ${registros.size}")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("TablaGeneral", "❌ Error al ejecutar la consulta SELECT *", e)
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
            Log.d("TablaGeneral", "📌 Insertando registro en la tabla 'general'")

            // Insertar el registro
            withContext(Dispatchers.IO) {
                generalDao.insertar(registro)
            }

            // Mostrar confirmación en el log
            Log.d("TablaGeneral", "✅ Registro insertado correctamente")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("TablaGeneral", "❌ Error al insertar registro", e)
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
            Log.d("TablaGeneral", "📌 Eliminando registro con ID: $id")

            // Eliminar el registro
            withContext(Dispatchers.IO) {
                generalDao.eliminar(id)
            }

            // Mostrar confirmación en el log
            Log.d("TablaGeneral", "✅ Registro eliminado correctamente")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("TablaGeneral", "❌ Error al eliminar registro", e)
            throw e
        }
    }

    /**
     * Método para vaciar la tabla "general".
     */
    suspend fun vaciarTabla() {
        try {
            Log.d("TablaGeneral", "📌 Vaciando tabla")

            // Vaciar tabla
            withContext(Dispatchers.IO) {
                generalDao.vaciar()
            }

            // Mostrar confirmación en el log
            Log.d("TablaGeneral", "✅ Tabla vaciada correctamente")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("TablaGeneral", "❌ Error al vaciar tabla", e)
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
            Log.d("TablaGeneral", "📌 Iniciando proceso de actualización de la tabla 'general'")

            // Contar los registros actuales
            contarRegistros()

            // Verificar si no hay registros
            if (total == 0) {
                Log.d("TablaGeneral", "📌 No hay registros. Insertando nuevo registro...")

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
                Log.d("TablaGeneral", "✅ Nuevo registro insertado: ID=$id, Nombre=$nombre, Descripción=$descripcion")
            } else {
                // Mostrar la cantidad de registros existentes
                Log.d("TablaGeneral", "✅ La tabla 'general' ya contiene $total registros.")
            }
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("TablaGeneral", "❌ Error durante el proceso de actualización", e)
            throw e
        }
    }
}

