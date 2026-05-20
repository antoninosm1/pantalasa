package pantalasa.sdhybc.gradilla

import android.view.View
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView

// Adaptador abstracto genérico para manejar listas de objetos tipo T en un RecyclerView
abstract class GradillaAdapter<T>(
    private val onClick: (T) -> Unit
) : RecyclerView.Adapter<GradillaAdapter<T>.Vista>() {

    protected var listaDatos: List<T> = emptyList()

    // Método para actualizar los datos desde Gradilla
    fun actualizarDatos(datos: List<T>) {
        listaDatos = datos
        notifyDataSetChanged()
    }

    // Clase abstracta interna para representar cada ítem visual
    abstract inner class Vista(itemView: View) : RecyclerView.ViewHolder(itemView) {
        abstract fun enlazar(item: T)
    }

    override fun onBindViewHolder(holder: Vista, position: Int) {
        val item = listaDatos[position]
        holder.enlazar(item)
        holder.itemView.setOnClickListener { onClick(item) }
    }

    override fun getItemCount(): Int = listaDatos.size
}
