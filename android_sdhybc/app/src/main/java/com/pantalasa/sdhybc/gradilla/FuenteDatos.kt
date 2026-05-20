package pantalasa.sdhybc.gradilla

// Interfaz genérica que representa una fuente de datos para el componente Gradilla<T>
interface FuenteDatos<T> {
    @Throws(Exception::class)
    fun obtenerDatos(): List<T>
}
