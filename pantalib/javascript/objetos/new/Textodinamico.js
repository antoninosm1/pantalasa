function Textodinamico(configuraciones, etiquetas, codigos, valores, fuentes) {
	this.configuraciones = configuraciones;
	this.etiquetas = etiquetas;
	this.codigos = codigos;
	this.valores = valores;
    this.fuentes = fuentes;
}
Textodinamico.prototype.generahtml = function() {

///////////////////////////////////////

// PASO: 1 INICIALIZAR E INSPECCIONAR SI EL TEXTO LLEVA ETIQUETA
    this.codigos[0] = '';
    if (this.configuraciones[2]==1) {
        this.codigos[0] = '<SPAN CLASS="'+this.etiquetas[0]+this.concatena_valor(this.fuentes[0])+'_e" ID="'+this.etiquetas[1]+'_E">';
        this.codigos[0] = this.codigos[0] + this.configuraciones[0][1][this.configuraciones[0][0]][0];
        this.codigos[0] = this.codigos[0] + '</SPAN>';
    }

// PASO: 2 CONCATENAR VALOR ABRIENDO ETIQUETA CON CLASE PRINCIPAL
// Y AGREGADAS A PARTIR DE ALGORITMO DE VALOR E ID
    
    this.codigos[0] = this.codigos[0] + '<SPAN CLASS="'+this.etiquetas[0]+this.concatena_valor(this.fuentes[0])+'" ID="'+this.etiquetas[1]+'">';
    this.codigos[0] = this.codigos[0] + this.concatena_valor(this.fuentes[1]);
    this.valores[0] = this.concatena_valor(this.fuentes[1]);
    this.codigos[0] = this.codigos[0] + '</SPAN>';

};







/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////

////////// FUNCIONES PARA INTERPRETAR VALOR, BAJO EL PRINCIPIO DE TODO
////////// VALOR ES UNA COCATENACIÓN DE VALORES Y ESTA SUJETA A UNA
////////// CONDICIONAL QUE ES EL RESULTADO QUE PERDURA DE UNA 
////////// SERIE DE COMPARACIONES APLICADAS EN CASACADA

/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////











Textodinamico.prototype.concatena_valor = function(fuente) {

    var conca_parte = 0;
    var conca_partes = fuente[0][0].length;
    var resultado_concatenado = 'CONCATENA VALOR ';

    console.log('ESTOY EN CONCATENA VALOR, PARTES: '+conca_partes);

    while(conca_parte < conca_partes) {
        console.log('PARTE: '+conca_parte);


        resultado_concatenado = resultado_concatenado + this.condicional(fuente, conca_parte);

        conca_parte++;
    };
    console.log('RESULTADO CONCATENANDO: '+resultado_concatenado);
    return resultado_concatenado;

};

Textodinamico.prototype.condicional = function(fuente, condi_parte) {

    var condi_condicion = 0;
    var condi_condiciones = fuente[0][condi_parte];
    var resultado_condicional = 'CONDICIONAL VALOR ';

//    console.log('ESTOY EN CICLO DE CONDICIONALES: '+condi_condiciones.length);

    while(condi_condicion < condi_condiciones.length) {

        console.log('//// CND CND CND EXAMINANDO CONDICIÓN: '+condi_condicion+' VAMOS A COMPARACIÓN');
/*
        var condi_operaciones = condi_condiciones[condi_condicion][0][1];
        // antecedente01 = this.operaciones(fuente, condi_operaciones);
        // console.log('VALOR ANTECEDENTE 01: '+antecedente01);

        var condi_operaciones = condi_condiciones[condi_condicion][0][2];
        // antecedente02 = this.operaciones(fuente, condi_operaciones);
        // console.log('VALOR ANTECEDENTE 02: '+antecedente02);

        if (condi_condiciones[condi_condicion][0][0] == 1) {
            console.log('REALIZANDO COMPARACIÓN DE IGUALDAD');
            if (antecedente01 == antecedente02) {
                // console.log('IGUALDAD TRUE VAMOS POR EL VALOR');
                var condi_operaciones = condi_condiciones[condi_condicion][1];
                // resultado_condicional = resultado_condicional + this.operaciones(fuente, condi_operaciones);
                console.log('VALOR AGREGADO A CONDICIONAL: '+resultado_condicional);
            };

        };
*/
        condi_condicion++;
        
    }

    console.log('RESULTADO DE LA CONDICIONAL: '+resultado_condicional);

    return resultado_condicional;

};














/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////

////////// FUNCIONES DE NUCLEO PARA GENERAR UN DIGITO (VALOR MOSTRADO
////////// O ANTECEDENTE DE COMPARACIÓN), BAJO EL PRINCIPIO DE TODO
////////// DIGITO ES EL RESULTADO DE UNA SERIE DE OPERACIONES

/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////











Textodinamico.prototype.operaciones = function(fuente, opera_operaciones) {
    var resultado_operaciones = '';
    var opera_factor = 0
    console.log('REALIZANDO CICLO DE OPERACIONES CANTIDAD: '+opera_operaciones.length);
    while(opera_factor < opera_operaciones.length) {
        console.log('OPERACIÓN: '+opera_factor);
        if (opera_operaciones[opera_factor][0]==0) {
            console.log('OPERACIÓN: '+opera_factor+' SIN OPERADOR');
            resultado_operaciones = this.dato(fuente, opera_operaciones, opera_factor);
        }
        if (opera_operaciones[opera_factor][0]==1) {
            console.log('OPERACIÓN: '+opera_factor+' CON OPERADOR +');
            resultado_operaciones = resultado_operaciones + this.dato(fuente, opera_operaciones, opera_factor);
        }
        if (opera_operaciones[opera_factor][0]==2) {
            console.log('OPERACIÓN: '+opera_factor+' CON OPERADOR -');
            resultado_operaciones = resultado_operaciones - this.dato(fuente, opera_operaciones, opera_factor);
        }
        opera_factor++;
    }
    console.log('RESULTADO DE LAS OPERACIONES: '+resultado_operaciones);
    return resultado_operaciones;
};


Textodinamico.prototype.dato = function(fuente, dato_operaciones, dato_factor) {
    
    console.log('EXTRAYENDO DATO TIPO: '+dato_operaciones[dato_factor][1]);
    var dato_dato = '';

    
    if (dato_operaciones[dato_factor][1] == 1) {
        console.log('OBTIENE DATO DIRECTO');
        dato_dato = dato_operaciones[dato_factor][2];
    }
    
    
    
    
    
    
    
    if (dato_operaciones[dato_factor][1] == 2) {

        console.log('OBTIENE DATO DE UN OBJETO Y UNA ETIQUETA EN JSON');

// LAS POCISIONES DE dato_operaciones[dato_factor][2] SON:
// dato_operaciones[dato_factor][2][0] = REGISTRO 
// dato_operaciones[dato_factor][2][1] = CAMPO 
// dato_operaciones[dato_factor][2][2] = LLAVE 
// dato_operaciones[dato_factor][2][3] = POSICION DE LA CONSULTA 

        console.log('LLAVE DEL DATO: '+dato_operaciones[dato_factor][2][2]);
        console.log('ESTE ES EL DATO: '+fuente[1][dato_operaciones[dato_factor][2][2]][dato_operaciones[dato_factor][2][2]]);
        dato_dato = fuente[1][dato_operaciones[dato_factor][2][2]];

    }

    if (dato_operaciones[dato_factor][1] == 3) {

        console.log('OBTIENE DATO DE LOS TEXTOS CONFIGURADOS EN DIFERENTES IDIOMAS');

// LAS POCISIONES DE dato_operaciones[dato_factor][2] SON:
// dato_operaciones[dato_factor][2][0] = POSICIÓN DEL TEXTO 

        console.log('POSICIÓN DEL TEXTO: '+dato_operaciones[dato_factor][2][0]);
        
        
        
        
        
        console.log('ESTE ES EL DATO: '+fuente[1][dato_operaciones[dato_factor][2][2]][dato_operaciones[dato_factor][2][2]]);
        
        
        
        
        dato_dato = fuente[1][dato_operaciones[dato_factor][2][2]];

    }

    
    
    
    
    
    
    console.log('RESULTADO DATO: '+dato_dato);
    return dato_dato;
};

















Textodinamico.prototype.imprimehtml = function() {
    if (this.configuraciones[1]==0) {
        this.escribehtml();
    }
    else {
        this.agregahtml();
    }
};	   						


Textodinamico.prototype.escribehtml = function() {
	$(this.etiquetas[2]).html(this.codigos[0]);
};	   						
Textodinamico.prototype.agregahtml = function() {
	$(this.etiquetas[2]).append(this.codigos[0]);
};	   						
Textodinamico.prototype.traduce = function(par_idioma) {
    this.configuraciones[0][0] = par_idioma;
};	   						
Textodinamico.prototype.actualizavalor = function() {
    this.valores[0] = document.getElementById(this.etiquetas[1]).value;
};	   						
Textodinamico.prototype.inicializavalor = function() {
    this.valores[0] = this.valores[1];
};	   						
