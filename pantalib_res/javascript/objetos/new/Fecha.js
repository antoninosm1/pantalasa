function Fecha(configuraciones, etiquetas, codigos, valores, metodos) {
	this.configuraciones = configuraciones;
	this.etiquetas = etiquetas;
	this.codigos = codigos;
	this.valores = valores;
	this.metodos = metodos;
}
Fecha.prototype.generahtml = function() {
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
Fecha.prototype.imprimehtml = function() {
    if (this.configuraciones[1]==0) {
        this.escribehtml();
    }
    else {
        this.agregahtml();
    }
};	   						
Fecha.prototype.escribehtml = function() {
	$(this.etiquetas[2]).html(this.codigos[0]);
};	   						
Fecha.prototype.agregahtml = function() {
	$(this.etiquetas[2]).append(this.codigos[0]);
};	   						
Fecha.prototype.traduce = function(par_idioma) {
    this.configuraciones[0][0] = par_idioma;
};	   						
Fecha.prototype.actualizavalor = function() {
    this.valores[1] = document.getElementById(this.etiquetas[1]).value;
};	   						
Fecha.prototype.recibe_valor = function(fecha) {
    this.valores[1] = fecha;
};	   						
Fecha.prototype.inicializavalor = function() {
    this.valores[1] = this.valores[0];
};	   						
Fecha.prototype.imprimevalor = function() {
    document.getElementById(this.etiquetas[1]).value = this.valores[1];
};	   						
Fecha.prototype.vaciovalor = function() {
    this.valores[1] = document.getElementById(this.etiquetas[1]).value.trim();
    if (this.valores[1]=='') {
        return 1;
    }
    else {
        return 0;
    }
};	   						
Fecha.prototype.actual = function() {
    let currentDate = new Date();
    this.valores[1] = currentDate.getFullYear() + '-' +
        ('0' + (currentDate.getMonth() + 1)).slice(-2) + '-' +
        ('0' + currentDate.getDate()).slice(-2);
};	   						
Fecha.prototype.compara_year = function(fecha_parametro) {
// CONVIERTO LOS VALORES STRING EN OBJETOS DATE
    let fecha_inicial = new Date(fecha_parametro);
    let fecha_actual = new Date(this.valores[1]);
    let age = fecha_actual.getFullYear() - fecha_inicial.getFullYear();
    let monthDiff = fecha_actual.getMonth() - fecha_inicial.getMonth();
// Si el mes actual es anterior al mes de nacimiento, o es el mismo mes pero el día actual es anterior al día de nacimiento, se resta un año
    if (monthDiff < 0 || (monthDiff === 0 && fecha_actual.getDate() < fecha_inicial.getDate())) {
        age--;
    }
// Si la edad es negativa, se retorna cero
    if (age < 0) {
        age = 0;
    }
    return age;
};	   						
