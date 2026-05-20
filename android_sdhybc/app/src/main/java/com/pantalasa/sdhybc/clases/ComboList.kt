package com.pantalasa.sdhybc.clases

import com.pantalasa.sdhybc.R
import android.content.Context
import android.util.AttributeSet
import android.util.Log
import android.view.View
import android.view.ViewGroup
import android.widget.ArrayAdapter
import android.widget.Filter
import android.widget.Filterable
import android.widget.TextView
import androidx.appcompat.widget.AppCompatAutoCompleteTextView
import org.json.JSONArray
import org.json.JSONObject

/**
 * Implementación avanzada de AutoCompleteTextView con:
 * - Filtrado dinámico
 * - Soporte para múltiples fuentes de datos (JSON, Room)
 * - Manejo de valores compuestos
 *
 * PRINCIPIOS APLICADOS:
 * 1. Separación clara entre inicialización, lógica y eventos
 * 2. Código completamente comentado
 * 3. Logs de seguimiento en todos los métodos
 * 4. Manejo de errores en todas las operaciones
 */
class ComboList @JvmOverloads constructor(
    context: Context,
    attrs: AttributeSet? = null,
    defStyleAttr: Int = androidx.appcompat.R.attr.autoCompleteTextViewStyle
) : AppCompatAutoCompleteTextView(context, attrs, defStyleAttr) {

    // ================================================
    // CONSTANTES
    // ================================================

    companion object {
        const val DELIMITADOR_VALORES = "##!##"
        private const val TAG = "ComboList"
        private const val DEFAULT_PAGE_SIZE = 200
    }

    // ================================================
    // ENUMERACIONES
    // ================================================
    enum class TipoFuente {
        OBJETO_UNICO,      // JSONObject
        ARREGLO_OBJETOS,   // JSONArray de objetos
        ARREGLO_ARREGLOS,  // JSONArray de arrays
        CONSULTA_ROOM      // Resultados de Room
    }

    // ================================================
    // MODELOS DE DATOS
    // ================================================
    data class ComboItem(
        val value: String,
        val text: String
    )

    data class ConfigComposicion(
        val fuentesValor: List<Pair<List<Int>, List<Any>>> = listOf(listOf(3) to listOf("value")),
        val fuentesTexto: List<Pair<List<Int>, List<Any>>> = listOf(listOf(3) to listOf("text"))
    )

    // ================================================
    // PROPIEDADES PÚBLICAS
    // ================================================
    var tipoFuente: TipoFuente = TipoFuente.ARREGLO_OBJETOS
    var resumenFuente: Boolean = false
    var items: Pair<String, String> = Pair("value", "text")
    var especialesItems: MutableList<Any> = mutableListOf()
    var valorCapturado: MutableList<Any> = mutableListOf(1, 1, mutableListOf<Any>(), "", false)
    var composicionFuente: ConfigComposicion = ConfigComposicion()

    // ================================================
    // PROPIEDADES PRIVADAS
    // ================================================
    private var fullData = mutableListOf<ComboItem>()
    private var filteredData = mutableListOf<ComboItem>()
    private var onItemSelected: ((String, String) -> Unit)? = null

    // ================================================
    // INICIALIZACIÓN
    // ================================================
    init {
        Log.d(TAG, "✅ Inicializando ComboList")
        try {
            threshold = 1
            setDropDownWidth(ViewGroup.LayoutParams.MATCH_PARENT)
            setAdapter(ComboAdapter(context))
        } catch (e: Exception) {
            Log.e(TAG, "❌ Error en init", e)
            mostrarError("Error de inicialización")
        }
    }

    // ================================================
    // MÉTODOS PÚBLICOS
    // ================================================

    /**
     * Configura listener para eventos de selección
     * @param listener Función que recibe (valor, texto) del item seleccionado
     */
    fun setOnItemSelectedListener(listener: (String, String) -> Unit) {
        Log.d(TAG, "🔄 Configurando listener de selección")
        this.onItemSelected = listener
    }

    /**
     * Establece valor inicial del combo
     * @param tipo Tipo de valor (1=simple, 2=compuesto)
     * @param cantidad Partes del valor compuesto
     * @param valorInicial Valor a seleccionar
     * @param tieneValorInicial Indica si existe valor inicial
     */
    fun setValor(tipo: Int, cantidad: Int, valorInicial: String, tieneValorInicial: Boolean) {
        Log.d(TAG, "📝 Configurando valor inicial: $valorInicial")
        try {
            valorCapturado = mutableListOf(tipo, cantidad, mutableListOf<Any>(), valorInicial, tieneValorInicial)
            if (tieneValorInicial) seleccionarItemPorValor(valorInicial)
        } catch (e: Exception) {
            Log.e(TAG, "❌ Error en setValor", e)
        }
    }

    /**
     * Carga datos según fuente configurada
     * @param sourceData Fuente de datos (JSON, List, etc.)
     */
    fun ejecutar(sourceData: Any) {
        Log.d(TAG, "🚀 Ejecutando carga de datos")
        try {
            fullData.clear()
            agregarItemsEspeciales()

            when {
                sourceData is JSONObject -> procesarObjetoJSON(sourceData)
                sourceData is JSONArray -> procesarArrayJSON(sourceData)
                sourceData is List<*> && sourceData.firstOrNull() is Pair<*, *> -> {
                    (sourceData as List<Pair<String, String>>).forEach { (value, text) ->
                        fullData.add(ComboItem(value, text))
                    }
                }
                sourceData is List<*> -> {
                    // CORRECCIÓN PUNTUAL (Mantiene todo lo existente)
                    sourceData.filterIsInstance<ComboItem>().forEach { item ->
                        if (!fullData.any { it.value == item.value }) {
                            fullData.add(item)
                        }
                    }
                    Log.d(TAG, "✅ ${sourceData.size} items de Room integrados")
                }
            }
            actualizarAdapter()
        } catch (e: Exception) {
            Log.e(TAG, "❌ Error en ejecutar()", e)
            mostrarError("Error al cargar datos")
        }
    }

    // ================================================
    // MÉTODOS PRIVADOS
    // ================================================

    private fun agregarItemsEspeciales() {
        Log.d(TAG, "➕ Agregando ${especialesItems.size} items especiales")
        try {
            especialesItems.forEach { item ->
                when (item) {
                    is Pair<*, *> -> fullData.add(ComboItem(
                        item.first?.toString() ?: "",
                        item.second?.toString() ?: ""
                    ))
                    is List<*> -> if (item.size >= 2) {
                        fullData.add(ComboItem(
                            item[0]?.toString() ?: "",
                            item[1]?.toString() ?: ""
                        ))
                    }
                }
            }
        } catch (e: Exception) {
            Log.e(TAG, "❌ Error en agregarItemsEspeciales", e)
        }
    }

    private fun procesarObjetoJSON(json: JSONObject) {
        Log.d(TAG, "📦 Procesando JSONObject")
        try {
            val value = json.optString(items.first, "")
            val text = json.optString(items.second, "")
            fullData.add(ComboItem(value, text))
        } catch (e: Exception) {
            Log.e(TAG, "❌ Error en procesarObjetoJSON", e)
        }
    }

    private fun procesarArrayJSON(jsonArray: JSONArray) {
        Log.d(TAG, "📦 Procesando JSONArray (${jsonArray.length()} elementos)")
        try {
            val startIdx = if (resumenFuente) 1 else 0
            for (i in startIdx until jsonArray.length()) {
                jsonArray.optJSONObject(i)?.let { obj ->
                    fullData.add(ComboItem(
                        obj.optString(items.first, ""),
                        obj.optString(items.second, "")
                    ))
                }
            }
        } catch (e: Exception) {
            Log.e(TAG, "❌ Error en procesarArrayJSON", e)
        }
    }

    private fun procesarFuenteRoom(datosRoom: List<*>) {
        Log.d(TAG, "🏛 Procesando datos Room (${datosRoom.size} elementos)")
        try {
            datosRoom.forEach { item ->
                when (item) {
                    is ComboItem -> fullData.add(item)
                    is Pair<*, *> -> fullData.add(ComboItem(
                        item.first?.toString() ?: "",
                        item.second?.toString() ?: ""
                    ))
                }
            }
        } catch (e: Exception) {
            Log.e(TAG, "❌ Error en procesarFuenteRoom", e)
        }
    }

    private fun actualizarAdapter() {
        try {
            Log.d(TAG, "🔄 Actualizando adapter con ${fullData.size} items")
            (adapter as? ComboAdapter)?.apply {
                updateData(fullData)
                notifyDataSetChanged()
            }
            filteredData = fullData.toMutableList()
        } catch (e: Exception) {
            Log.e(TAG, "❌ Error al actualizar adapter", e)
            mostrarError("Error interno")
        }
    }

    private fun mostrarError(mensaje: String) {
        Log.e(TAG, "⚠️ Mostrando error: $mensaje")
        try {
            setText(mensaje)
            fullData.clear()
        } catch (e: Exception) {
            Log.e(TAG, "❌ Error en mostrarError", e)
        }
    }

    private fun seleccionarItemPorValor(valor: String) {
        Log.d(TAG, "🔍 Buscando valor: $valor")
        try {
            (adapter as? ComboAdapter)?.let { adapter ->
                adapter.items.indexOfFirst { it.value == valor }.takeIf { it >= 0 }?.let {
                    setText(adapter.getItem(it).text)
                }
            }
        } catch (e: Exception) {
            Log.e(TAG, "❌ Error en seleccionarItemPorValor", e)
        }
    }

    internal fun procesarSeleccion(valor: String) {
        Log.d(TAG, "🎯 Procesando selección: $valor")
        try {
            val partes = valor.split(DELIMITADOR_VALORES)
                .filter { it.isNotEmpty() }
                .take(valorCapturado[1] as Int)

            (valorCapturado[2] as MutableList<Any>).apply {
                clear()
                addAll(partes)
            }
            valorCapturado[3] = valor
            valorCapturado[4] = true
        } catch (e: Exception) {
            Log.e(TAG, "❌ Error en procesarSeleccion", e)
        }
    }

    // ================================================
    // CLASE ADAPTADOR INTERNA
    // ================================================
    private inner class ComboAdapter(context: Context) :
        ArrayAdapter<ComboItem>(context, android.R.layout.simple_dropdown_item_1line),
        Filterable {

        var items = listOf<ComboItem>()

        fun updateData(newItems: List<ComboItem>) {
            items = newItems
        }

        override fun getCount(): Int = items.size

        override fun getItem(position: Int): ComboItem = items[position]

        override fun getView(position: Int, convertView: View?, parent: ViewGroup): View {
            return try {
                val view = super.getView(position, convertView, parent) as TextView
                view.text = getItem(position).text
                view
            } catch (e: Exception) {
                Log.e(TAG, "❌ Error en getView", e)
                TextView(context).apply { text = "Error" }
            }
        }

        override fun getFilter(): Filter {
            return object : Filter() {
                override fun performFiltering(constraint: CharSequence?): FilterResults {
                    return try {
                        val filteredList = if (constraint.isNullOrEmpty()) {
                            items.take(DEFAULT_PAGE_SIZE)
                        } else {
                            items.filter {
                                it.text.contains(constraint, ignoreCase = true)
                            }.take(DEFAULT_PAGE_SIZE)
                        }
                        FilterResults().apply {
                            values = filteredList
                            count = filteredList.size
                        }
                    } catch (e: Exception) {
                        Log.e(TAG, "❌ Error en performFiltering", e)
                        FilterResults()
                    }
                }

                override fun publishResults(constraint: CharSequence?, results: FilterResults?) {
                    try {
                        if (results?.values is List<*>) {
                            notifyDataSetChanged()
                        }
                    } catch (e: Exception) {
                        Log.e(TAG, "❌ Error en publishResults", e)
                    }
                }
            }
        }
    }
}

