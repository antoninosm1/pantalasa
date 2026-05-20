package com.pantalasa.sdhybc.clases

import android.util.Log
import androidx.room.RoomDatabase
import kotlinx.coroutines.CoroutineScope
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch
import java.lang.reflect.Method

class Entidad {
    // Variables de instancia
    var bd: RoomDatabase? = null // Instancia de la base de datos
    var entidad: Class<*>? = null // Clase de la entidad
    var dao: Any? = null // DAO de la entidad (genérico)

    /**
     * Método para contar registros en la tabla asociada al DAO.
     * Este método es genérico y funciona con cualquier DAO que tenga un método "obtenerConteo".
     */
    fun contarRegistros() {
        CoroutineScope(Dispatchers.IO).launch {
            try {
                Log.d("Entidad", "📌 Iniciando consulta SELECT COUNT(*) en la tabla asociada al DAO")

                // Verificar que el DAO no sea nulo
                if (dao == null) {
                    Log.e("Entidad", "❌ Error: El DAO no ha sido asignado.")
                    return@launch
                }

                // Obtener el método "obtenerConteo" del DAO usando reflexión
                val metodoObtenerConteo: Method? = dao!!::class.java.getMethod("obtenerConteo")

                // Verificar si el método existe
                if (metodoObtenerConteo == null) {
                    Log.e("Entidad", "❌ Error: El DAO no tiene un método 'obtenerConteo'.")
                    return@launch
                }

                // Invocar el método "obtenerConteo" en el DAO
                val conteo = metodoObtenerConteo.invoke(dao!!) as Int

                // Mostrar el resultado en el log
                Log.d("Entidad", "✅ Conteo de registros en la tabla: $conteo")
            } catch (e: Exception) {
                // Capturar y mostrar cualquier error inesperado
                Log.e("Entidad", "❌ Error al ejecutar la consulta SELECT COUNT(*)", e)
            }
        }
    }
}