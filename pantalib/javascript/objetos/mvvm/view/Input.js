function Input(configuraciones, etiquetas, codigos, valores, metodos, fuentes) {
	this.configuraciones = configuraciones;
	this.etiquetas = etiquetas;
	this.codigos = codigos;
	this.valores = valores;
	this.metodos = metodos;
	this.fuentes = fuentes;
}
Input.prototype.generahtml = function() {
    this.codigos[0] = '';
    if (this.configuraciones[4] == 1) {
        this.codigos[0] = this.codigos[0]+'<label>'+this.configuraciones[0][1][this.configuraciones[0][0]][0];
    }
    this.codigos[0] = this.codigos[0]+'<input type="'+this.configuraciones[2]+'" class="'+this.etiquetas[0]+'" id="'+this.etiquetas[1]+'" name="'+this.etiquetas[3]+'" placeholder="'+this.configuraciones[0][1][this.configuraciones[0][0]][1]+'" value="'+this.traer_dato(0)+'" maxlength="'+this.configuraciones[3]+'"';
    this.valores[0] = this.traer_dato(0);
    
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
    if (document.getElementById(this.etiquetas[1]).value < this.valores[2]) {
        document.getElementById(this.etiquetas[1]).value = this.valores[2];
    }
    this.valores[0] = document.getElementById(this.etiquetas[1]).value;
};	   						
Input.prototype.inicializavalor = function() {
    this.valores[0] = this.valores[1];
};	   						
Input.prototype.imprimevalor = function() {
    document.getElementById(this.etiquetas[1]).value = this.valores[0];
};	   						
Input.prototype.obtienevalor = function() {
    return document.getElementById(this.etiquetas[1]).value;
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
Input.prototype.traer_dato = function(funcion_dato) {
    dato_respuesta = '';
/////////////////////////////////////////////////////    
/// TIPOS DE VALOR POSICION funcion_dato

// 1 = VALOR DE LAS CLASES DE LA ETIQUETA
// 2 = VALOR DE LOS METODOS DE LA ETIQUETA 
// 3 = VALOR DEL TEXTO DE LA ETIQUETA
// 4 = VALOR DE LAS CLASES DEL TEXTO
// 5 = VALOR DE LOS METODOS DEL TEXTO
// 6 = VALOR DEL TEXTO

    // DIRECTO DE LA SIGUIENTE POSICIÓN
    if (this.fuentes[0][funcion_dato][0] == 1) {
        dato_respuesta = this.fuentes[0][funcion_dato][1];
    }
    // REGENERADO A PARTIR DE UNA INSTACIA DE VALOR
    if (this.fuentes[0][funcion_dato][0] == 2) {
        dato_respuesta = this.fuentes[1][this.fuentes[0][funcion_dato][1]].concatena_valor();
    }
    // DEL VALOR VIGENTE DE CUALQUIER INTANCIA QUE TENGA SU VALOR VIGENTE EN valores[0]
    if (this.fuentes[0][funcion_dato][0] == 3) {
        dato_respuesta = this.fuentes[1][this.fuentes[0][funcion_dato][1]].valores[0];
    }
    // DEL VALOR VIGENTE DE CUALQUIER INTANCIA QUE TENGA SU VALOR VIGENTE EN seleccion
    if (this.fuentes[0][funcion_dato][0] == 4) {
        dato_respuesta = this.fuentes[1][this.fuentes[0][funcion_dato][1]].seleccion;
    }
    // DEL VALOR VIGENTE DE CUALQUIER INTANCIA QUE TENGA SU VALOR EN datos[0]
    if (this.fuentes[0][funcion_dato][0] == 5) {
        dato_respuesta = this.fuentes[1][this.fuentes[0][funcion_dato][1]].datos[0];
    }
    return dato_respuesta;
};

