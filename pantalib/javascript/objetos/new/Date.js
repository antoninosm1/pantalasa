function Date(configuraciones, etiquetas, codigos, valores, metodos) {
	this.configuraciones = configuraciones;
	this.etiquetas = etiquetas;
	this.codigos = codigos;
	this.valores = valores;
	this.metodos = metodos;
}
Date.prototype.generahtml = function() {
    if (this.configuraciones[4] == 1) {
        this.codigos[0] = this.codigos[0]+'<label>'+this.configuraciones[0][1][this.configuraciones[0][0]][0];
    }
    this.codigos[0] = this.codigos[0]+'<input type="date" class="'+this.etiquetas[0]+'" id="'+this.etiquetas[1]+'" name="'+this.etiquetas[3]+'" placeholder="'+this.configuraciones[0][1][this.configuraciones[0][0]][1]+'" value="'+this.valores[0]+'" maxlength="'+this.configuraciones[3]+'"';
    this.codigos[0] = this.codigos[0]+this.metodos[0];
    this.codigos[0] = this.codigos[0]+' />';
    if (this.configuraciones[4] == 1) {
        this.codigos[0] = this.codigos[0]+'</label>';
    }
};
Date.prototype.imprimehtml = function() {
    if (this.configuraciones[1]==0) {
        this.escribehtml();
    }
    else {
        this.agregahtml();
    }
};	   						
Date.prototype.escribehtml = function() {
	$(this.etiquetas[2]).html(this.codigos[0]);
};	   						
Date.prototype.agregahtml = function() {
	$(this.etiquetas[2]).append(this.codigos[0]);
};	   						
Date.prototype.traduce = function(par_idioma) {
    this.configuraciones[0][0] = par_idioma;
};	   						
Date.prototype.actualizavalor = function() {
    this.valores[1] = document.getElementById(this.etiquetas[1]).value;
};	   						
Date.prototype.inicializavalor = function() {
    this.valores[1] = this.valores[0];
};	   						
Date.prototype.imprimevalor = function() {
    document.getElementById(this.etiquetas[1]).value = this.valores[1];
};	   						
Date.prototype.vaciovalor = function() {
    this.valores[1] = document.getElementById(this.etiquetas[1]).value.trim();
    if (this.valores[1]=='') {
        return 1;
    }
    else {
        return 0;
    }
};	   						
Date.prototype.actual = function() {

    var currentDate = new Date();
    
    this.valores[1] = currentDate.getFullYear() + '-' +
        ('0' + (currentDate.getMonth() + 1)).slice(-2) + '-' +
        ('0' + currentDate.getDate()).slice(-2);
};	   						
Date.prototype.check = function() {
    alert();
};	   						
Date.prototype.recibevalor = function(fecha) {
    this.valores[1] = fecha;
};	   						
     