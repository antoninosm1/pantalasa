function Registro(configuraciones) {
	this.configuraciones = configuraciones;
}
Registro.prototype.recibe_status = function(status) {
	this.configuraciones[0] = status;
};	


Registro.prototype.pruebas = function() {

	alert(this.configuraciones[2]);


};	



    
    