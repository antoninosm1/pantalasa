function Session2(configuraciones) {
	this.configuraciones = configuraciones;
}
Session2.prototype.muestra = function() {
    alert(this.configuraciones[0][1][1]);
};	   						
