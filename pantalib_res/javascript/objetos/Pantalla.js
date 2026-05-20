function Pantalla(idioma, id, tipo, archivo, titulo, codigo, objetos, estilos, sistema) {
	this.idioma = idioma;
	this.id = id;
	this.tipo = tipo;
	this.archivo = archivo;
	this.titulo = titulo;
	this.codigo = codigo;
	this.objetos = objetos;
	this.estilos = estilos;
	this.sistema = sistema;
}
Pantalla.prototype.encabezado = function() {
};	   						

Pantalla.prototype.idiomalocal = function(id_idioma) {
	this.idioma = id_idioma;
};	   						
Pantalla.prototype.traduce = function() {
	var areas_cant = this.objetos.length; 
	for (var contador = 0; contador < areas_cant; contador++) {
		this.objetos[contador].traduce(this.idioma);
		this.objetos[contador].generahtml();
		this.objetos[contador].imprimehtml();
	}
};	   						
