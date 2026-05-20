package com.pantalasa.sdhybc.clases

////////////////////////////////////////////////////////
// AREA IMPORTACIONES
////////////////////////////////////////////////////////

import android.app.Activity
import android.content.Context
import android.net.ConnectivityManager
import android.net.NetworkCapabilities
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.withContext
import kotlinx.coroutines.CoroutineScope
import kotlinx.coroutines.launch

////////////////////////////////////////////////////////
// AREA SUB CLASE PRINCIPAL Red
////////////////////////////////////////////////////////

class Red (

    var context: Context, // Contexto necesario para verificar conectividad
    var conexion: Boolean = false // Variable que indica el estado de la conexión

)

{

////////////////////////////////////////////////////////
// AREA METODO VERIFICAR CONEXION
////////////////////////////////////////////////////////

////////////////////////////////////////////////////////
// AREA METODO VERIFICAR CONEXION SUSPENDIDA
////////////////////////////////////////////////////////

    /**
     * Método suspendido para verificar la conexión a Internet.
     * Este método realiza la verificación en un hilo secundario
     * y retorna el estado de la conexión al hilo principal.
     *
     * @return Boolean - true si hay conexión, false de lo contrario.
     */
    suspend fun verificar_conexion(): Boolean {
        // Cambiar al contexto de IO para realizar la verificación
        conexion = withContext(Dispatchers.IO) {
            // Ejecutar la verificación de conexión a Internet
            tieneConexionInternet()
        }

        // Imprimir el estado de la conexión para fines de depuración
        if (conexion) {
            println("ESTA EN LA CONEXION CON EXITO: $conexion")
        } else {
            println("ESTA EN LA CONEXION SIN EXITO: $conexion")
        }

        // Retornar el estado de la conexión
        return conexion
    }

////////////////////////////////////////////////////////
// AREA SUB METODO VERIFICAR CONEXION INTERNET
////////////////////////////////////////////////////////

    private fun tieneConexionInternet(): Boolean {
        val connectivityManager =
            (context as? Activity)?.getSystemService(Context.CONNECTIVITY_SERVICE) as? ConnectivityManager
                ?: return false

        val activeNetwork = connectivityManager.activeNetwork ?: return false
        val networkCapabilities = connectivityManager.getNetworkCapabilities(activeNetwork) ?: return false

        return when {
            networkCapabilities.hasTransport(NetworkCapabilities.TRANSPORT_WIFI) -> true
            networkCapabilities.hasTransport(NetworkCapabilities.TRANSPORT_CELLULAR) -> true
            networkCapabilities.hasTransport(NetworkCapabilities.TRANSPORT_ETHERNET) -> true
            else -> false
        }
    }

}
