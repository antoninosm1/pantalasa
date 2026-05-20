function Button(configuraciones, etiquetas, codigos, metodos, links) {
	this.configuraciones = configuraciones;
	this.etiquetas = etiquetas;
	this.codigos = codigos;
	this.metodos = metodos;
	this.links = links;
}
Button.prototype.generahtml = function() {
    if (this.configuraciones[2] == 1) {
        this.codigos[0] = this.codigos[0]+'<label>'+this.configuraciones[0][1][this.configuraciones[0][0]][0];
    }
    this.codigos[0] = this.codigos[0]+'<Input type="button" class="'+this.etiquetas[0]+'" id="'+this.etiquetas[1]+'" name="'+this.etiquetas[3]+'" value="'+this.configuraciones[0][1][this.configuraciones[0][0]][0]+'"';
    this.codigos[0] = this.codigos[0]+this.metodos[0];
    this.codigos[0] = this.codigos[0]+' />';
    if (this.configuraciones[2] == 1) {
        this.codigos[0] = this.codigos[0]+'</label>';
    }
};
Button.prototype.imprimehtml = function() {
    if (this.configuraciones[1]==0) {
        this.escribehtml();
    }
    else {
        this.agregahtml();
    }
};	   						
Button.prototype.escribehtml = function() {
	$(this.etiquetas[2]).html(this.codigos[0]);
};	   						
Button.prototype.agregahtml = function() {
	$(this.etiquetas[2]).append(this.codigos[0]);
};	   						
Button.prototype.traduce = function(par_idioma) {
    this.configuraciones[0][0] = par_idioma;
};	   						
Button.prototype.actualizavalor = function() {
    this.valores[0] = document.getElementById(this.etiquetas[1]).value;
};	   						
Button.prototype.inicializavalor = function() {
    this.valores[0] = this.valores[1];
};	   						
