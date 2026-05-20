function Toggle(configuraciones, elementos) {
	this.configuraciones = configuraciones;
	this.elementos = elementos;
}
Toggle.prototype.ejecuta = function() {
    alert('ESTOY EN TOGGLE');
    document.getElementById('ID_GEN_MODAL').classList.toggle('modal_oculto');
    document.getElementById('ID_GEN_MODAL').classList.toggle('modal_activo');
    /*
    var i = 0;
    while(i < this.elementos.length) {
        var ii = 0;
        while(ii < this.elementos[1].length) {
            document.getElementById(this.elementos[0][i]).classList.Toggle(this.elementos[1][i][ii]);
            ii++;
        }
    }
*/
};	   						

