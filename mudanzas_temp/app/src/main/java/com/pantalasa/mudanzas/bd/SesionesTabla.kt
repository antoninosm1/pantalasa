package com.pantalasa.mudanzas.bd

import android.util.Log
import com.pantalasa.mudanzas.bd.Sesiones
import com.pantalasa.mudanzas.bd.SesionesDao
import com.pantalasa.mudanzas.clases.Print
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.withContext
import java.util.Date

/**
 * Clase Singleton para manejar operaciones en la tabla "sesiones".
 * Implementa el patrón Singleton para asegurar una única instancia en toda la aplicación.
 * Proporciona métodos para interactuar con la tabla "sesiones" a través de SesionesDao.
 */
class SesionesTabla private constructor(private val sesionesDao: SesionesDao) {

    // Variables de instancia
    var total: Int = 0 // Almacena la cantidad de registros en la tabla
    var retorno: Int = 0
    var retornoLista: MutableList<Any> = mutableListOf() // Almacena una lista de posibles respuestas

    companion object {
        @Volatile
        private var INSTANCE: SesionesTabla? = null

        /**
         * Método para obtener la instancia única de SesionesTabla.
         *
         * @param sesionesDao DAO de la tabla sesiones
         * @return Instancia única de SesionesTabla
         */
        fun getInstance(sesionesDao: SesionesDao): SesionesTabla {
            return INSTANCE ?: synchronized(this) {
                val instance = SesionesTabla(sesionesDao).also { INSTANCE = it }
                val impresora = Print.getInstance()
                impresora.ruta[3] = "SesionesTabla.kt"
                impresora.ruta[4] = "getInstance.kt"
                impresora.print(mutableListOf(mutableListOf(5, "OBTENEMOS INSTANCIA DE SesionesTabla.kt ${instance.hashCode()}", true)))
                instance
            }
        }
    }

    /**
     * Método para contar registros en la tabla "sesiones".
     * Actualiza la variable `total` con la cantidad de registros.
     */
    suspend fun contar() {
        try {
            Log.d("SesionesTabla", "📌 Iniciando consulta SELECT COUNT(*) FROM sesiones")

            // Ejecutar la consulta y obtener el conteo
            total = withContext(Dispatchers.IO) {
                sesionesDao.obtenerConteo()
            }

            // Mostrar el resultado en el log
            Log.d("SesionesTabla", "✅ Conteo de registros en la tabla 'sesiones': $total")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("SesionesTabla", "❌ Error al ejecutar la consulta SELECT COUNT(*)", e)
            throw e
        }
    }

    /**
     * Método para obtener todos los registros de la tabla "sesiones".
     */
    suspend fun obtenerTodos() {
        try {
            Log.d("SesionesTabla", "📌 Iniciando consulta SELECT * FROM sesiones")

            // Ejecutar la consulta y obtener los registros
            val registros = withContext(Dispatchers.IO) {
                sesionesDao.obtenerTodos()
            }

            // Mostrar el resultado en el log
            Log.d("SesionesTabla", "✅ Registros obtenidos: ${registros}")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("SesionesTabla", "❌ Error al ejecutar la consulta SELECT *", e)
            throw e
        }
    }

    /**
     * Método para insertar un registro en la tabla "sesiones".
     *
     * @param registro Registro a insertar.
     */
    suspend fun insertarRegistro(registro: Sesiones) {
        try {
            Log.d("SesionesTabla", "📌 Insertando registro en la tabla 'sesiones'")

            // Insertar el registro
            withContext(Dispatchers.IO) {
                sesionesDao.insertar(registro)
            }

            // Mostrar confirmación en el log
            Log.d("SesionesTabla", "✅ Registro insertado correctamente")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("SesionesTabla", "❌ Error al insertar registro", e)
            throw e
        }
    }

    /**
     * Método para eliminar un registro de la tabla "sesiones" por su ID.
     *
     * @param id ID del registro a eliminar.
     */
    suspend fun eliminarRegistro(id: Int) {
        try {
            Log.d("SesionesTabla", "📌 Eliminando registro con ID: $id")

            // Eliminar el registro
            withContext(Dispatchers.IO) {
                sesionesDao.eliminar(id.toLong())
            }

            // Mostrar confirmación en el log
            Log.d("SesionesTabla", "✅ Registro eliminado correctamente")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("SesionesTabla", "❌ Error al eliminar registro", e)
            throw e
        }
    }

    /**
     * Método para vaciar la tabla "sesiones".
     */
    suspend fun vaciarTabla() {
        try {
            Log.d("SesionesTabla", "📌 Vaciando tabla 'sesiones'")

            // Vaciar tabla
            withContext(Dispatchers.IO) {
                sesionesDao.vaciar()
            }

            // Mostrar confirmación en el log
            Log.d("SesionesTabla", "✅ Tabla vaciada correctamente")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("SesionesTabla", "❌ Error al vaciar tabla", e)
            throw e
        }
    }

    /**
     * Método para agregar un nuevo registro en la tabla "sesiones".
     * Recupera el ID autoincremental y lo almacena en la variable `retorno`.
     *
     * @param idBd ID de la base de datos asociada a la sesión.
     */
    suspend fun agregaRetorno(idBd: Int) {
        try {
            Log.d("SesionesTabla", "📌 Agregando nuevo registro en la tabla 'sesiones'")

            // Crear un nuevo registro
            val nuevaSesion = Sesiones(
                id = 0, // ID autoincremental (se genera automáticamente)
                bd = idBd,
                fecha = Date(), // Fecha y hora actuales
                cierre = null // Campo cierre vacío por ahora
            )

            // Insertar el registro y obtener el ID autoincremental
            val idGenerado = withContext(Dispatchers.IO) {
                sesionesDao.insertar(nuevaSesion)
            }

            // Almacenar el ID generado en la variable `retorno`
            retorno = idGenerado.toInt()

            // Mostrar confirmación en el log
            Log.d("SesionesTabla", "✅ Nuevo registro agregado con ID: $idGenerado")
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("SesionesTabla", "❌ Error al agregar registro", e)
            throw e
        }
    }

    /**
     * Método para cerrar una sesión actualizando el campo `cierre`.
     *
     * @param idSesion ID de la sesión a cerrar.
     */
    suspend fun cerrarSesion(idSesion: Int) {
        try {
            Log.d("SesionesTabla", "📌 Cerrando sesión con ID: $idSesion")

            // Obtener la sesión por su ID
            val sesion = withContext(Dispatchers.IO) {
                sesionesDao.obtenerPorId(idSesion.toLong())
            }

            // Verificar si la sesión existe
            if (sesion != null) {
                // Actualizar el campo `cierre` con la fecha y hora actuales
                sesion.cierre = Date()

                // Actualizar el registro en la base de datos
                withContext(Dispatchers.IO) {
                    sesionesDao.actualizar(sesion)
                }

                // Mostrar confirmación en el log
                Log.d("SesionesTabla", "✅ Sesión cerrada correctamente")
            } else {
                Log.e("SesionesTabla", "❌ Sesión no encontrada con ID: $idSesion")
                throw IllegalArgumentException("Sesión no encontrada con ID: $idSesion")
            }
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("SesionesTabla", "❌ Error al cerrar sesión", e)
            throw e
        }
    }

    /**
     * Método para mostrar todos los registros de la tabla "sesiones" ordenados por ID.
     */
    suspend fun mostrarRegistros() {
        try {
            Log.d("SesionesTabla", "📌 Iniciando consulta SELECT * FROM sesiones ORDER BY id")

            // Ejecutar la consulta y obtener los registros ordenados por ID
            val registros = withContext(Dispatchers.IO) {
                sesionesDao.obtenerTodosOrdenadosPorId()
            }

            // Mostrar los registros en el log
            if (registros.isNotEmpty()) {
                Log.d("SesionesTabla", "✅ Registros obtenidos (ordenados por ID):")
                for (registro in registros) {
                    Log.d("SesionesTabla", "   - ID: ${registro.id}, BD: ${registro.bd}, Fecha: ${registro.fecha}, Cierre: ${registro.cierre}")
                }
            } else {
                Log.d("SesionesTabla", "✅ No hay registros en la tabla 'sesiones'.")
            }
        } catch (e: Exception) {
            // Capturar y mostrar cualquier error inesperado
            Log.e("SesionesTabla", "❌ Error al ejecutar la consulta SELECT * ORDER BY id", e)
            throw e
        }
    }
}

