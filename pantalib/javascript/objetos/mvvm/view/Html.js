function Html(configuraciones, etiquetas, codigos) {
	this.configuraciones = configuraciones;
	this.etiquetas = etiquetas;
	this.codigos = codigos;
}
Html.prototype.generahtml = function() {
    this.codigos = this.configuraciones[0][1][this.configuraciones[0][0]][0];
};
Html.prototype.imprimehtml = function() {
    if (this.configuraciones[1]==0) {
        this.escribehtml();
    }
    else {
        this.agregahtml();
    }
};	   						
Html.prototype.escribehtml = function() {
	$(this.etiquetas).html(this.codigos);
};	   						
Html.prototype.agregahtml = function() {
	$(this.etiquetas).append(this.codigos);
};	   						
Html.prototype.traduce = function(par_idioma) {
    this.configuraciones[0][0] = par_idioma;
};	   						
Html.prototype.actualizavalor = function() {
//    this.valores[0] = document.getElementById(this.etiquetas[1]).value;
};	   						
Html.prototype.inicializavalor = function() {
//    this.valores[0] = this.valores[1];
};	   						
