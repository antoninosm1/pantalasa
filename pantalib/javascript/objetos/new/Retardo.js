function Retardo(configuraciones) {
	this.configuraciones = configuraciones;
}

Retardo.prototype.retardo = function() {
    var i = 0;
    while(i < 20) {
        alert(this.configuraciones[0].configuraciones[10]);
        i++;
    }
};	   						
