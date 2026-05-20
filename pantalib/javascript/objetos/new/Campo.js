function Campo(configuraciones, etiquetas, codigos, valores, metodos, fuentes) {
	this.configuraciones = configuraciones;
	this.etiquetas = etiquetas;
	this.codigos = codigos;
	this.valores = valores;
	this.metodos = metodos;
    this.fuentes = fuentes;
}
Campo.prototype.generahtml = function() {

///////////////////////////////////////
// PASO 1: INICIALIZAR CODIGO HTML VARIABLE this.codigos[0]
    this.codigos[0] == '';
// PASO 2: ESTABLECER TIPO DE CAMPO VARIABLE this.configuraciones[1]
// VALORES:
    // 1 = TEXTO
    if (configuraciones[1]==1) {
        console.log('VALOR DEL TIPO DE CAMPO: '+configuraciones[1]);
        this.codigos[0] = this.codigos[0] + '<SPAN';
    }

    this.codigos[0] = this.codigos[0] + ' CLASS="'+this.etiquetas[0];
    this.codigos[0] = this.codigos[0] + this.concatena_valor(0, 0, this.fuentes[0])+'"';
    this.codigos[0] = this.codigos[0] + ' ID="'+this.etiquetas[1]+'"';
    this.codigos[0] = this.codigos[0] + this.metodos[0];
    this.codigos[0] = this.codigos[0] + '>';

    if (configuraciones[1]==1) {
        this.codigos[0] = this.codigos[0] + this.concatena_valor(0, 0, this.fuentes[1])+'"';
        this.codigos[0] = this.codigos[0] + '</SPAN>';
    }
};
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////

////////// FUNCIONES PARA INTERPRETAR VALOR, BAJO EL PRINCIPIO DE TODO
////////// VALOR ES UNA COCATENACIÓN DE VALORES Y ESTA SUJETA A UNA
////////// CONDICIONAL QUE ES EL RESULTADO RUE QUE PERDURA DE UNA 
////////// SERIE DE COMPARACIONES APLICADAS EN CASACADA

/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////











Grid.prototype.concatena_valor = function(registro, campo, adn) {

    var conca_parte = 0;
    var conca_partes = adn[campo].length;
    var resultado_concatenado = '';

    console.log('ESTOY EN CONCATENA VALOR, PARTES: '+conca_partes);

    while(conca_parte < conca_partes) {
        console.log('PARTE: '+conca_parte);

        resultado_concatenado = resultado_concatenado + this.condicional(registro, campo, consulta, adn, conca_parte);

        conca_parte++;
    };
    console.log('RESULTADO CONCATENANDO: '+resultado_concatenado);
    return resultado_concatenado;

};

Grid.prototype.condicional = function(registro, campo, consulta, adn, condi_parte) {

    var condi_condicion = 0;
    var condi_condiciones = adn[campo][condi_parte];
    var resultado_condicional = '';

    console.log('ESTOY EN CICLO DE CONDICIONALES: '+condi_condiciones.length);

    while(condi_condicion < condi_condiciones.length) {

        console.log('//// CND CND CND EXAMINANDO CONDICIÓN: '+condi_condicion+' VAMOS A COMPARACIÓN');

        var condi_operaciones = condi_condiciones[condi_condicion][0][1];
        antecedente01 = this.operaciones(registro, campo, consulta, adn, condi_parte, condi_condiciones, condi_condicion, condi_operaciones);
        console.log('VALOR ANTECEDENTE 01: '+antecedente01);

        var condi_operaciones = condi_condiciones[condi_condicion][0][2];
        antecedente02 = this.operaciones(registro, campo, consulta, adn, condi_parte, condi_condiciones, condi_condicion, condi_operaciones);
        console.log('VALOR ANTECEDENTE 02: '+antecedente02);

        if (condi_condiciones[condi_condicion][0][0] == 1) {
            console.log('REALIZANDO COMPARACIÓN DE IGUALDAD');
            if (antecedente01 == antecedente02) {
                console.log('IGUALDAD TRUE VAMOS POR EL VALOR');
                var condi_operaciones = condi_condiciones[condi_condicion][1];
                resultado_condicional = resultado_condicional + this.operaciones(registro, campo, consulta, adn, condi_parte, condi_condiciones, condi_condicion, condi_operaciones);
                console.log('VALOR AGREGADO A CONDICIONAL: '+resultado_condicional);
            };

        };

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











Grid.prototype.operaciones = function(registro, campo, consulta, adn, opera_parte, opera_condiciones, opera_condicion, opera_operaciones) {
    var resultado_operaciones = '';
    var opera_factor = 0
    console.log('REALIZANDO CICLO DE OPERACIONES CANTIDAD: '+opera_operaciones.length);
    while(opera_factor < opera_operaciones.length) {
        console.log('OPERACIÓN: '+opera_factor);
        if (opera_operaciones[opera_factor][0]==0) {
            console.log('OPERACIÓN: '+opera_factor+' SIN OPERADOR');
            resultado_operaciones = this.dato(registro, campo, consulta, adn, opera_parte, opera_operaciones, opera_factor);
        }
        if (opera_operaciones[opera_factor][0]==1) {
            console.log('OPERACIÓN: '+opera_factor+' CON OPERADOR +');
            resultado_operaciones = resultado_operaciones + this.dato(registro, campo, consulta, adn, opera_parte, opera_operaciones, opera_factor);
        }
        if (opera_operaciones[opera_factor][0]==2) {
            console.log('OPERACIÓN: '+opera_factor+' CON OPERADOR -');
            resultado_operaciones = resultado_operaciones - this.dato(registro, campo, consulta, adn, opera_parte, opera_operaciones, opera_factor);
        }
        opera_factor++;
    }
    console.log('RESULTADO DE LAS OPERACIONES: '+resultado_operaciones);
    return resultado_operaciones;
};


Grid.prototype.dato = function(registro, campo, consulta, adn, dato_parte, dato_operaciones, dato_factor) {
    
    console.log('EXTRAYENDO DATO TIPO: '+dato_operaciones[dato_factor][1]);
    var dato_dato = '';

    if (dato_operaciones[dato_factor][1] == 1) {
        console.log('OBTIENE DATO DIRECTO');
        dato_dato = dato_operaciones[dato_factor][2];
    }
    if (dato_operaciones[dato_factor][1] == 2) {
        console.log('OBTIENE DATO DE JSON');
        console.log('LLAVE DEL DATO: '+dato_operaciones[dato_factor][2]);
        console.log('ESTE ES EL DATO: '+consulta[dato_operaciones[dato_factor][2]]);
        dato_dato = consulta[dato_operaciones[dato_factor][2]];
    }

    console.log('RESULTADO DATO: '+dato_dato);
    return dato_dato;
};














Campo.prototype.imprimehtml = function() {
    if (this.configuraciones[1]==0) {
        this.escribehtml();
    }
    else {
        this.agregahtml();
    }
};	   						


Campo.prototype.escribehtml = function() {
	$(this.etiquetas[2]).html(this.codigos[0]);
};	   						
Campo.prototype.agregahtml = function() {
	$(this.etiquetas[2]).append(this.codigos[0]);
};	   						
Campo.prototype.traduce = function(par_idioma) {
    this.configuraciones[0][0] = par_idioma;
};	   						
Campo.prototype.actualizavalor = function() {
    this.valores[0] = document.getElementById(this.etiquetas[1]).value;
};	   						
Campo.prototype.inicializavalor = function() {
    this.valores[0] = this.valores[1];
};	   						
