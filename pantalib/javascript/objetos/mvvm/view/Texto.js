function Texto(configuraciones, etiquetas, codigos, fuentes) {
	this.configuraciones = configuraciones;
	this.etiquetas = etiquetas;
	this.codigos = codigos;
    this.fuentes = fuentes;
}
Texto.prototype.generahtml = function() {

///////////////////////////////////////

// PASO: 1 INICIALIZAR E INSPECCIONAR SI EL TEXTO LLEVA ETIQUETA
    this.codigos[0] = '';
    if (this.configuraciones[2]==1) {
        this.codigos[0] = this.codigos[0]+'<SPAN CLASS="' + this.etiquetas[0]+'_eti';
  
        this.codigos[0] = this.codigos[0] + this.traer_dato(0);

        this.codigos[0] = this.codigos[0] + '" ID="'+this.etiquetas[1]+'_E"';
        this.codigos[0] = this.codigos[0] + this.traer_dato(1)+'>';
        this.codigos[0] = this.codigos[0] + this.traer_dato(2);

        this.codigos[0] = this.codigos[0] + '</SPAN>';

    }

    this.codigos[0] = this.codigos[0] + '<SPAN CLASS="'+this.etiquetas[0];
    this.codigos[0] = this.codigos[0] + this.traer_dato(3);
    this.codigos[0] = this.codigos[0] + '" ID="'+this.etiquetas[1]+'"';
    this.codigos[0] = this.codigos[0] + this.traer_dato(4)+'>';
    this.codigos[0] = this.codigos[0] + this.traer_dato(5);
    this.codigos[0] = this.codigos[0] + '</SPAN>';

};
Texto.prototype.traer_dato = function(funcion_dato) {
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

Texto.prototype.imprimehtml = function() {
    if (this.configuraciones[2]==0) {
        this.escribehtml();
    }
    else {
        this.agregahtml();
    }
};	   						

Texto.prototype.escribehtml = function() {
	$(this.etiquetas[2]).html(this.codigos[0]);
};	   						
Texto.prototype.agregahtml = function() {
	$(this.etiquetas[2]).append(this.codigos[0]);
};	   						
Texto.prototype.traduce = function(par_idioma) {
    this.configuraciones[0][0] = par_idioma;
};	   						
