function Screenx(configuraciones) {
	this.configuraciones = configuraciones;
}
Screenx.prototype.quita_clase = function(id_elemento, clase) {
    document.getElementById(id_elemento).classList.remove(clase);
};
Screenx.prototype.agrega_clase = function(id_elemento, clase) {
    document.getElementById(id_elemento).classList.add(clase);
};
