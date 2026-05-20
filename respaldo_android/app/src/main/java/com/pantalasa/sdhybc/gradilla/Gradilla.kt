package pantalasa.sdhybc.gradilla

import android.content.Context
import android.util.Log
import androidx.recyclerview.widget.GridLayoutManager
import androidx.recyclerview.widget.RecyclerView

// Clase abstracta y reutilizable para mostrar una lista de objetos tipo T en una RecyclerView en forma de cuadrícula.
abstract class Gradilla<T>(
    private val context: Context,
    private val recyclerView: RecyclerView,
    private val columnas: Int
) {
    private lateinit var adaptador: GradillaAdapter<T>

    // Método para presentar los datos en la RecyclerView
    fun presentar(
        fuente: FuenteDatos<T>, // Interfaz que provee los datos (puede ser JSON, Room, etc.)
        tipoFuente: Int,        // Tipo de fuente, ej. 4 para Room
        paginada: Boolean = false, // Scroll infinito (para más adelante)
        onClick: (T) -> Unit        // Evento al hacer clic en un ítem
    ) {
        adaptador = crearAdaptador(onClick)
        recyclerView.layoutManager = GridLayoutManager(context, columnas)
        recyclerView.adapter = adaptador

        try {
            val datos = fuente.obtenerDatos()
            Log.i("Gradilla", "Datos cargados: ${datos.size}")
            adaptador.actualizarDatos(datos)
        } catch (e: Exception) {
            Log.e("Gradilla", "Error al obtener datos: ${e.message}")
        }
    }

    // Método abstracto que deberá implementarse para crear un adaptador concreto para T
    abstract fun crearAdaptador(onClick: (T) -> Unit): GradillaAdapter<T>
}
