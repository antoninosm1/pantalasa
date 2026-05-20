function Screen(configuraciones) {
	this.configuraciones = configuraciones;
}
Screen.prototype.quita_clase = function(id_elemento, clase) {
    document.getElementById(id_elemento).classList.remove(clase);
};
Screen.prototype.agrega_clase = function() {
    document.getElementById(id_elemento).classList.add(clase);
};
