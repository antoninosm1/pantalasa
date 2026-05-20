function Descarga(configuraciones, etiquetas, codigos, metodos) {
	this.configuraciones = configuraciones;
	this.etiquetas = etiquetas;
	this.codigos = codigos;
	this.metodos = metodos;
}
Descarga.prototype.generahtml = function() {
    this.codigos[0] = this.codigos[0]+'<a href="'+this.configuraciones[2]+'" class="'+this.etiquetas[0]+'" id="'+this.etiquetas[1]+'" '+this.metodos[0]+'>';
    this.codigos[0] = this.codigos[0]+this.configuraciones[0][1][this.configuraciones[0][0]][0];
    this.codigos[0] = this.codigos[0]+'</a>';
};
Descarga.prototype.imprimehtml = function() {
    if (this.configuraciones[1]==0) {
        this.escribehtml();
    }
    else {
        this.agregahtml();
    }
};	   						
Descarga.prototype.escribehtml = function() {
	$(this.etiquetas[2]).html(this.codigos[0]);
};	   						
Descarga.prototype.agregahtml = function() {
	$(this.etiquetas[2]).append(this.codigos[0]);
};	   						
Descarga.prototype.traduce = function(par_idioma) {
    this.configuraciones[0][0] = par_idioma;
};	   						
