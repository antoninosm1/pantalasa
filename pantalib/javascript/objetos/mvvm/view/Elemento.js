function Elemento(configuraciones, etiquetas, codigos, metodos) {
	this.configuraciones = configuraciones;
	this.etiquetas = etiquetas;
	this.codigos = codigos;
	this.metodos = metodos;
}
Elemento.prototype.generahtml = function() {
    this.codigos[0] = '<DIV CLASS="'+this.etiquetas[0]+'" ID="'+this.etiquetas[1]+'">';
    if (this.configuraciones[2][0]==1 && this.configuraciones[2][1]==0) {
        this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.etiquetas[0]+'_icono '+this.configuraciones[0][1][this.configuraciones[0][0]][1][0]+'" ID="'+this.etiquetas[1]+'_ICONO" ';
        if (this.configuraciones[3]==1) {
            this.codigos[0] = this.codigos[0] + ' HREF="'+this.configuraciones[0][1][this.configuraciones[0][0]][2][0]+'"';
        }
//        this.codigos[0] = this.codigos[0] + this.metodos[0];
        this.codigos[0] = this.codigos[0] + this.cadena_metodos();
        this.codigos[0] = this.codigos[0] + '>';
        this.codigos[0] = this.codigos[0] + '</A>';
    }

    this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.etiquetas[0]+'_texto" ID="'+this.etiquetas[1]+'_TEXTO" ';
    if (this.configuraciones[3]==1) {
        this.codigos[0] = this.codigos[0] + ' HREF="'+this.configuraciones[0][1][this.configuraciones[0][0]][2][0]+'"';
    }
//    this.codigos[0] = this.codigos[0] + this.metodos[0];
    this.codigos[0] = this.codigos[0] + this.cadena_metodos();
    this.codigos[0] = this.codigos[0] + '>';
    this.codigos[0] = this.codigos[0] + this.configuraciones[0][1][this.configuraciones[0][0]][0][0];
    this.codigos[0] = this.codigos[0] + '</A>';

    if (this.configuraciones[2][0]==1 && this.configuraciones[2][1]==1) {
        this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.etiquetas[0]+'_icono '+this.configuraciones[0][1][this.configuraciones[0][0]][1][0]+'" ID="'+this.etiquetas[1]+'_ICONO" ';
        if (this.configuraciones[3]==1) {
            this.codigos[0] = this.codigos[0] + ' HREF="'+this.configuraciones[0][1][this.configuraciones[0][0]][2][0]+'"';
        }
        this.codigos[0] = this.codigos[0] + this.cadena_metodos();
//        this.codigos[0] = this.codigos[0] + this.metodos[0];
        this.codigos[0] = this.codigos[0] + '>';
        this.codigos[0] = this.codigos[0] + '</A>';
    }
    this.codigos[0] = this.codigos[0] + '</DIV>';	
};
Elemento.prototype.imprimehtml = function() {
    if (this.configuraciones[1]==0) {
        this.escribehtml();
    }
    else {
        this.agregahtml();
    }
};	   						
Elemento.prototype.escribehtml = function() {
	$(this.etiquetas[2]).html(this.codigos[0]);
};	   						
Elemento.prototype.agregahtml = function() {
	$(this.etiquetas[2]).append(this.codigos[0]);
};	   						
Elemento.prototype.traduce = function(par_idioma) {
    this.configuraciones[0][0] = par_idioma;
};	   						
Elemento.prototype.recibe_metodos = function(metodos) {
    this.metodos[0][0] = metodos;
};	   						
Elemento.prototype.cadena_metodos = function() {
    if (this.metodos[0].length > 0) {
        var cadena_metodos = '';
        var sw_uno = 0;
        var i = 0;
        while(i < this.metodos[0].length) {
            if (sw_uno == 0) {
                sw_uno = 1;
                cadena_metodos = cadena_metodos + this.metodos[0][i];
            }
            else {
                cadena_metodos = cadena_metodos + ', ' + this.metodos[0][i];
            }
            
            
            i++;
        }
        return ' ONCLICK="' + cadena_metodos + '"';
    }
};	   						
