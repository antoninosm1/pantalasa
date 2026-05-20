function Radiopcion(configuraciones, etiquetas, metodos, codigos, fuentes, elementos) {
	this.configuraciones = configuraciones;
	this.etiquetas = etiquetas;
	this.metodos = metodos;
	this.codigos = codigos;
	this.fuentes = fuentes;
	this.elementos = elementos;
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////// ESTRUCTURA 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////

Radiopcion.prototype.generahtml = function() {
    this.codigos[0] = '';
    this.codigos[0] = this.codigos[0]+'<FIELDSET CLASS="'+this.etiquetas[0]+'" ID="'+this.etiquetas[1]+'"'+this.metodos[0]+'>';
    if (this.configuraciones[3]==1) {
        this.codigos[0] = this.codigos[0]+'<LEGEND>'+this.configuraciones[0][1][this.configuraciones[0][0]][0]+'</LEGEND>';
    }
    var i = 0;
    while(i < this.configuraciones[1]) {
        this.codigos[0] = this.codigos[0]+'<SPAN CLASS="'+this.etiquetas[0]+'_option" ID="'+this.etiquetas[0]+'_'+i+'">';
        this.codigos[0] = this.codigos[0]+'<INPUT TYPE="RADIO" ID="'+this.etiquetas[1]+'_'+i+'" NAME="'+this.etiquetas[3]+'" VALUE="'+this.elementos[0][i]+'"'+this.elementos[1][i];
        if (this.elementos[0][i]==this.configuraciones[4]) {
            this.codigos[0] = this.codigos[0]+' CHECKED';
        }
        this.codigos[0] = this.codigos[0]+'> '+this.configuraciones[0][1][this.configuraciones[0][0]][1][i]+'</SPAN><BR>';
        i++;
    }

    this.codigos[0] = this.codigos[0]+'</FIELDSET>';
};
Radiopcion.prototype.imprimehtml = function() {
    if (this.configuraciones[2]==0) {
        this.escribehtml();
    }
    else {
        this.agregahtml();
    }
};	   						
Radiopcion.prototype.escribehtml = function() {
	$(this.etiquetas[2]).html(this.codigos[0]);
};	   						
Radiopcion.prototype.agregahtml = function() {
	$(this.etiquetas[2]).append(this.codigos[0]);
};	   						
Radiopcion.prototype.traduce = function(par_idioma) {
    this.configuraciones[0][0] = par_idioma;
};	   						
Radiopcion.prototype.actualizavalor = function(posicion) {
    this.configuraciones[4] = document.getElementById(this.etiquetas[1]+'_'+posicion).value;
};	   						
Radiopcion.prototype.borra_area = function() {
	$(this.etiquetas[2]).html('');
};	   						

Radiopcion.prototype.recorre_arreglo = function(valores_arreglo) {

    var i = 0;
    while(i < valores_arreglo.length) {
        alert(valores_arreglo[i])
        i++;
    }
};	   						

Radiopcion.prototype.traer_dato = function(funcion_dato) {
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
