function Input(configuraciones, etiquetas, codigos, valores, metodos) {
	this.configuraciones = configuraciones;
	this.etiquetas = etiquetas;
	this.codigos = codigos;
	this.valores = valores;
	this.metodos = metodos;
}
Input.prototype.generahtml = function() {
    if (this.configuraciones[4] == 1) {
        this.codigos[0] = this.codigos[0]+'<label>'+this.configuraciones[0][1][this.configuraciones[0][0]][0];
    }
    this.codigos[0] = this.codigos[0]+'<input type="'+this.configuraciones[2]+'" class="'+this.etiquetas[0]+'" id="'+this.etiquetas[1]+'" name="'+this.etiquetas[3]+'" placeholder="'+this.configuraciones[0][1][this.configuraciones[0][0]][1]+'" value="'+this.valores[1]+'" maxlength="'+this.configuraciones[3]+'"';
    this.codigos[0] = this.codigos[0]+this.metodos[0];
    this.codigos[0] = this.codigos[0]+' />';
    if (this.configuraciones[4] == 1) {
        this.codigos[0] = this.codigos[0]+'</label>';
    }
};
Input.prototype.imprimehtml = function() {
    if (this.configuraciones[1]==0) {
        this.escribehtml();
    }
    else {
        this.agregahtml();
    }
};	   						
Input.prototype.escribehtml = function() {
	$(this.etiquetas[2]).html(this.codigos[0]);
};	   						
Input.prototype.agregahtml = function() {
	$(this.etiquetas[2]).append(this.codigos[0]);
};	   						
Input.prototype.traduce = function(par_idioma) {
    this.configuraciones[0][0] = par_idioma;
};	   						
Input.prototype.actualizavalor = function() {
    this.valores[0] = document.getElementById(this.etiquetas[1]).value;
};	   						
Input.prototype.inicializavalor = function() {
    this.valores[0] = this.valores[1];
};	   						
Input.prototype.imprimevalor = function() {
    document.getElementById(this.etiquetas[1]).value = this.valores[0];
};	   						
Input.prototype.vaciovalor = function() {
    this.valores[0] = document.getElementById(this.etiquetas[1]).value.trim();
    if (this.valores[0]=='') {
        return 1;
    }
    else {
        return 0;
    }
};	   						
