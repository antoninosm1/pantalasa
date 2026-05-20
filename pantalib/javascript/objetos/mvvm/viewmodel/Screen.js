function S(idioma, id, tipo, archivo, titulo, codigo, objetos, estilos, sistema, pull, configuraciones) {
	this.idioma = idioma;
	this.id = id;
	this.tipo = tipo;
	this.archivo = archivo;
	this.titulo = titulo;
	this.codigo = codigo;
	this.objetos = objetos;
	this.estilos = estilos;
	this.sistema = sistema;
	this.pull = pull;
	this.configuraciones = configuraciones;
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
Pantalla.prototype.navega = function() {
	window.location.replace(this.pull);
//	window.location.href = this.pull;
};	   						
Pantalla.prototype.dimensiona = function() {
	this.configuraciones[0][0] = window.innerWidth;
	this.configuraciones[0][1] = window.innerHeight;
    var i = 0;
    while(i < this.configuraciones[0][3].length) {
        if (this.configuraciones[0][0] == this.configuraciones[0][3][i] || this.configuraciones[0][0] > this.configuraciones[0][3][i]) {
           
            this.configuraciones[0][2] = i; 
        
        }
        i++;
    }
};	   						
Pantalla.prototype.redimensiona = function() {
	window.addEventListener('resize', () => {
		this.configuraciones[0][0] = window.innerWidth;
		this.configuraciones[0][1] = window.innerHeight;
		var posicion = 0;
		var ix = 0;
		while(ix < this.configuraciones[0][3].length) {
			if (this.configuraciones[0][0] == this.configuraciones[0][3][ix] || this.configuraciones[0][0] > this.configuraciones[0][3][ix]) {
			   
				posicion = ix; 
			
			}
			ix++;
		}
		if (this.configuraciones[0][2] != posicion) {
            this.configuraciones[0][2] = posicion; 
			eval(this.configuraciones[0][4][posicion]);
		}
	});
};	   						
