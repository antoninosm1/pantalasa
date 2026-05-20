function Radio(configuraciones, etiquetas, codigos, metodos, fuentes, elementos) {
	this.configuraciones = configuraciones;
	this.etiquetas = etiquetas;
	this.codigos = codigos;
	this.metodos = metodos;
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

Radio.prototype.generahtml = function() {
    this.codigos[0] = '';
    this.codigos[0] = this.codigos[0]+'<FIELDSET CLASS="'+this.etiquetas[0]+'" ID="'+this.etiquetas[1]+'"'+this.metodos[0]+'>';
    
    
    
    
    if (this.configuraciones[3]==1) {
        this.codigos[0] = this.codigos[0]+'<LEGEND>'+this.configuraciones[0][1][this.configuraciones[0][0]][0]+'</LEGEND>';
    }
    var i = 0;
    while(i < this.configuraciones[1]) {
        this.codigos[0] = this.codigos[0]+'<SPAN CLASS="'+this.etiquetas[0]+'_option" ID="'+this.etiquetas[0]+'_'+i+'">';
        this.codigos[0] = this.codigos[0]+'<INPUT TYPE="RADIO" ID="'+this.etiquetas[1]+'_'+i+'" NAME="'+this.etiquetas[3]+'" VALUE="'+this.elementos[0][i]+'"'+this.elementos[1][i];
        if (this.elementos[0][i]==this.valores[1]) {
            this.codigos[0] = this.codigos[0]+' CHECKED';
        }
        this.codigos[0] = this.codigos[0]+'> '+this.configuraciones[0][1][this.configuraciones[0][0]][1][i];
        this.codigos[0] = this.codigos[0]+'</SPAN>';
        i++;
    }

    this.codigos[0] = this.codigos[0]+'</FIELDSET>';
};
Radio.prototype.imprimehtml = function() {
    if (this.configuraciones[2]==0) {
        this.escribehtml();
    }
    else {
        this.agregahtml();
    }
};	   						
Radio.prototype.escribehtml = function() {
	$(this.etiquetas[2]).html(this.codigos[0]);
};	   						
Radio.prototype.agregahtml = function() {
	$(this.etiquetas[2]).append(this.codigos[0]);
};	   						
Radio.prototype.traduce = function(par_idioma) {
    this.configuraciones[0][0] = par_idioma;
};	   						
Radio.prototype.actualizavalor = function(posicion) {
//    alert(' ESTE ES LA POSICIÓN: '+posicion+' ESTE ES EL VALOR: '+document.getElementById(this.etiquetas[1]+'_'+posicion).value);
//    alert('ESTOY EN ACTUALIZA VALOR');  
//    alert("ESTOY EN ACTUALIZA VALOR DE RADIO: "+document.getElementById(this.etiquetas[1]+'_'+posicion).value);
    this.valores[1] = document.getElementById(this.etiquetas[1]+'_'+posicion).value;
//    alert(' ESTE ES EL VALOR EN EL OBJETO RADIO: '+this.valores[1]);
};	   						
Radio.prototype.borra_area = function() {
	$(this.etiquetas[2]).html('');
};	   						



Radio.prototype.recorre_arreglo = function(valores_arreglo) {

    var i = 0;
    while(i < valores_arreglo.length) {
        alert(valores_arreglo[i])
        i++;
    }
};	   						






Texto.prototype.obtener_dato = function(funcion_dato) {
    var dato_respuesta = '';
    if (this.fuentes[0][funcion_dato][0] == 0) {
    }
    if (this.fuentes[0][funcion_dato][0] == 1) {
        dato_respuesta = this.fuentes[0][funcion_dato][1];
    }
    if (this.fuentes[0][funcion_dato][0] == 2) {
        dato_respuesta = this.fuentes[1][0].concatena_valor();
    }
    if (this.fuentes[0][funcion_dato][0] == 3) {
        dato_respuesta = this.fuentes[1][0].valores[0];
    }
    return dato_respuesta;

};	   						

