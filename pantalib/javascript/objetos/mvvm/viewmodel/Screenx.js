function Screenx(configuraciones) {
	this.configuraciones = configuraciones;
}
Screenx.prototype.quita_clase = function(idelemento, clasex) {
    document.getElementById(idelemento).classList.remove(clasex);
};
Screenx.prototype.agrega_clase = function(idelemento, clasex) {
    document.getElementById(idelemento).classList.add(clasex);
};
