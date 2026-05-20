package com.pantalasa.sdhybc.clases

class VariablesSesion(

    var conexion: Boolean = false,
    var modalidad: Boolean = false,
    var usuarioId: Int = 0,
    var usuarioNombre: String = "",
    var usuarioStatus: Int = 0,
    var ruta: String = ""

)

{
    fun actualiza_conexion(conexion: Boolean) {
        this.conexion = conexion
    }
    fun imprimir_conexion() {
        println("ESTA ES LA CONEXION YA EN VARIABLES DE SESION ${this.conexion}")
    }
    fun actualiza_modalidad(modalidad: Boolean) {
        this.modalidad = modalidad
    }
    fun actualiza_usuario_id(usuarioId: Int) {
        this.usuarioId = usuarioId
    }
    fun actualiza_usuario_nombre(usuarioNombre: String) {
        this.usuarioNombre = usuarioNombre
    }
    fun actualiza_usuario_status(usuarioStatus: Int) {
        this.usuarioStatus = usuarioStatus
    }
    fun actualiza_ruta(ruta: String) {
        this.ruta = ruta
    }

}