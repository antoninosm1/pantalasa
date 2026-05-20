function Navega(configuraciones) {
	this.configuraciones = configuraciones;
}
Navega.prototype.ejecuta = function() {
// Selecciona el primer elemento con la clase "destino"
    var destino = document.querySelector(this.configuraciones[0]);
    if (destino) {
        destino.scrollIntoView({ behavior: 'smooth' });
    }
};	   						
Navega.prototype.recibe_destino = function(ancla) {
    this.configuraciones[0] = ancla;
};	   						
