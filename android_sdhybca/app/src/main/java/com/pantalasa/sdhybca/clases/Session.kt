// C:\xampp\htdocs\pantalasa\android_sdhybca\app\src\main\java\com\pantalasa\sdhybca\clases\Session.kt
package com.pantalasa.sdhybca.clases

class Session private constructor() {

    var modalidad: Boolean = false
    var status: Boolean = false
    var ruta: String = ""
    var idUsuario: Int = 0
    var nombreUsuario: String = ""
    var nivelUsuario: Int = 0
    var sesionBd: Int = 0
    var repositorios: Int = 0

    companion object {
        // Instancia única de la clase Session
        private var instance: Session? = null

        // Método para obtener la instancia única
        fun getInstance(): Session {
            if (instance == null) {
                instance = Session()
            }
            return instance!!
        }
    }

    // Métodos para actualizar los valores
    fun actualizaModalidad(modalidad: Boolean) {
        this.modalidad = modalidad
    }

    fun actualizaStatus(status: Boolean) {
        this.status = status
    }

    fun actualizaRuta(ruta: String) {
        this.ruta = ruta
    }

    fun actualizaIdUsuario(idUsuario: Int) {
        this.idUsuario = idUsuario
    }

    fun actualizaNombreUsuario(nombreUsuario: String) {
        this.nombreUsuario = nombreUsuario
    }

    fun actualizaNivelUsuario(nivelUsuario: Int) {
        this.nivelUsuario = nivelUsuario
    }
}
