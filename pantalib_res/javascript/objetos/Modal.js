function Modal(objetos) {
	this.objetos = objetos;
}
Modal.prototype.despliegaloaded = function() {
    alert("Estoy en despliegaloaded");
};	   						
Modal.prototype.traduce = function() {
	alert("estoy en traduce")
};	   						
