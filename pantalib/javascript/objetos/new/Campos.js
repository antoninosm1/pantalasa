function Director(configuraciones, elementos) {
	this.configuraciones = configuraciones;
	this.elementos = elementos;
}
        
Director.prototype.pruebas = function() {

	alert(this.configuraciones[2]);


};	
