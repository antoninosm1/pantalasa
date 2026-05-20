function Metodos(configuraciones, codigos, elementos) {
	this.configuraciones = configuraciones;
	this.codigos = codigos;
	this.elementos = elementos;
}
Metodos.prototype.ejecuta = function() {
    var i = 0;
    while(i < this.elementos.length) {
        eval(this.elementos[i]);
        i++;
    }
};	   						
Metodos.prototype.recibe_opcion = function(opcion) {
    this.configuraciones[1] = opcion;
};	   						
Metodos.prototype.ejecuta_opcion = function() {
    alert('ESTA ES LA OPCIÓN: '+this.configuraciones[1]);
};	   						
