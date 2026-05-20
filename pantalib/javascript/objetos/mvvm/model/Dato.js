function Dato(configuraciones, estructura, datos) {
	this.configuraciones = configuraciones;
	this.estructura = estructura;
    this.datos = datos;
}
Dato.prototype.inicializa_dato = function() {
    this.datos[0] = this.datos[1];
};
Dato.prototype.actualiza_dato = function(dato) {
    this.datos[0] = dato;
};

