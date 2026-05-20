function Valor(configuraciones, estructura, valores, fuentes) {
	this.configuraciones = configuraciones;
	this.estructura = estructura;
    this.valores = valores;
    this.fuentes = fuentes;
}
Valor.prototype.inicializa_valor = function() {

    if (this.valores[1][0]==0) {
        this.valores[0] = this.valores[1][1];
    }

};
Valor.prototype.actualiza_valor = function(valor) {
    this.valores[0] = valor;
};

/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////

////////// FUNCIONES PARA INTERPRETAR VALOR, BAJO EL PRINCIPIO DE TODO
////////// VALOR ES UNA COCATENACIÓN DE VALORES Y ESTA SUJETA A UNA
////////// CONDICIONAL QUE ES EL RESULTADO QUE PERDURA DE UNA 
////////// SERIE DE COMPARACIONES APLICADAS EN CASACADA

/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////

Valor.prototype.concatena_valor = function() {
    var conca_parte = 0;
    var conca_partes = this.fuentes[0].length;
    var resultado_concatenado = '';
    //console.log('ESTOY EN CONCATENA VALOR, PARTES: '+conca_partes);
    while(conca_parte < conca_partes) {
        //console.log('PARTE: '+conca_parte);
        resultado_concatenado = resultado_concatenado + this.condicional(conca_parte);
        conca_parte++;
    };
    //console.log('RESULTADO CONCATENANDO: '+resultado_concatenado);
    this.valores[0] = resultado_concatenado; 
    return resultado_concatenado;

};

Valor.prototype.condicional = function(condi_parte) {

    var condi_condicion = 0;
    var condi_condiciones = this.fuentes[0][condi_parte];
    var resultado_condicional = '';

    // //console.log('ESTOY EN CICLO DE CONDICIONALES: '+condi_condiciones.length);

    while(condi_condicion < condi_condiciones.length) {

        // //console.log('//// CND CND CND EXAMINANDO CONDICIÓN: '+condi_condicion+' VAMOS A COMPARACIÓN');

        var condi_operaciones = condi_condiciones[condi_condicion][0][1];
        var antecedente01 = this.operaciones(condi_operaciones);
        // //console.log('VALOR ANTECEDENTE 01: '+antecedente01);

        var condi_operaciones = condi_condiciones[condi_condicion][0][2];
        var antecedente02 = this.operaciones(condi_operaciones);
        // //console.log('VALOR ANTECEDENTE 02: '+antecedente02);

        if (condi_condiciones[condi_condicion][0][0] == 1) {
            // //console.log('REALIZANDO COMPARACIÓN DE IGUALDAD');
            if (antecedente01 == antecedente02) {
                var condi_operaciones = condi_condiciones[condi_condicion][1];
                resultado_condicional = resultado_condicional + this.operaciones(condi_operaciones);
                // //console.log('VALOR AGREGADO A CONDICIONAL: '+resultado_condicional);
            };

        };
        condi_condicion++;
        
    }

    // //console.log('RESULTADO DE LA CONDICIONAL: '+resultado_condicional);
    return resultado_condicional;

};








/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////

////////// FUNCIONES DE NUCLEO PARA GENERAR UN DIGITO (VALOR MOSTRADO
////////// O ANTECEDENTE DE COMPARACIÓN), BAJO EL PRINCIPIO DE TODO
////////// DIGITO ES EL RESULTADO DE UNA SERIE DE OPERACIONES

/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////





Valor.prototype.operaciones = function(opera_operaciones) {
    var resultado_operaciones = '';
    var opera_factor = 0
    // console.log('REALIZANDO CICLO DE OPERACIONES CANTIDAD: '+opera_operaciones.length);
    while(opera_factor < opera_operaciones.length) {
        // console.log('OPERACIÓN: '+opera_factor);
        if (opera_operaciones[opera_factor][0]==0) {
            // console.log('OPERACIÓN: '+opera_factor+' SIN OPERADOR');
            resultado_operaciones = this.dato(opera_operaciones, opera_factor);
        }
        if (opera_operaciones[opera_factor][0]==1) {
            // console.log('OPERACIÓN: '+opera_factor+' CON OPERADOR +');
            resultado_operaciones = resultado_operaciones + this.dato(opera_operaciones, opera_factor);
        }
        if (opera_operaciones[opera_factor][0]==2) {
            // console.log('OPERACIÓN: '+opera_factor+' CON OPERADOR -');
            resultado_operaciones = resultado_operaciones - this.dato(opera_operaciones, opera_factor);
        }
        opera_factor++;
    }
    // console.log('RESULTADO DE LAS OPERACIONES: '+resultado_operaciones);
    return resultado_operaciones;
};


Valor.prototype.dato = function(dato_operaciones, dato_factor) {
    
    // console.log('EXTRAYENDO DATO TIPO: '+dato_operaciones[dato_factor][1]);
    var dato_dato = '';

//////////////////////////////////////////////////////    
/// TTIPOS DE VALOR POSICION 0
// 1 = VALOR DIRECTO SE TOMA DE LA SIGUIENTE POSICIÓN 1
// 2 = VALOR INTERNO SE TOMA DE LA CONFIGURACIÓN DE IDIOMAS DEBE INDICARSE LA POSICIÓN 
// 3 = VALOR ACTUAL SE TOMA DEL VALOR VIGENTE DE ESTA CLASE valores[0]
// 4 = VALOR INICIAL SE TOMA DEL VALOR INICIAL DE ESTA CLASE valores[1]
// 5 = VALOR PARAMETRO SE TOMA DE LA POSICIÓN DE UN ARREGLO DE PARAMETROS 
// 6 = VALOR CLASE INPUT SE TOMA DEL VALOR DE UNA CLASE HTML
// 7 = VALOR VIGENTE VALOR SE TOMA DEL VALOR VIGENTE DE OTRA INSTANCIA VALOR
// 8 = VALOR INICIAL VALOR SE TOMA DEL VALOR INICIAL DE OTRA INSTANCIA VALOR
// 9 = VALOR FECHA ACTUAL TOMA VALOR DE LA FECHA ACTUAL
// 10 = VALOR JSON RECIBE VALOR DE UNA ETIQUETA ASOCIADA A UN OBJETO JSON
// 11 = VALOR VIGENTE-VALOR SE TOMA DEL DATO VIGENTE DE OTRA INSTANCIA DATO
// 12 = VALOR INICIAL-VALOR SE TOMA DEL DATO INICIAL DE OTRA INSTANCIA DATO

    if (dato_operaciones[dato_factor][1] == 1) {
        // //console.log('OBTIENE DATO DIRECTO');
        dato_dato = dato_operaciones[dato_factor][2];
    }

    if (dato_operaciones[dato_factor][1] == 2) {
        // //console.log('2 = VALOR INTERNO SE TOMA DE LA CONFIGURACIÓN DE IDIOMAS DEBE INDICARSE LA POSICIÓN');

        dato_dato = this.configuraciones[0][1][this.configuraciones[0][0]][dato_operaciones[dato_factor][2]];
    }

    if (dato_operaciones[dato_factor][1] == 3) {

        // //console.log('// 3 = VALOR ACTUAL SE TOMA DEL VALOR VIGENTE DE ESTA CLASE valores[0]');

        dato_dato = this.valores[0];

    }

    if (dato_operaciones[dato_factor][1] == 4) {

        // //console.log('// 4 = VALOR INICIAL SE TOMA DEL VALOR INICIAL DE ESTA CLASE valores[1]');

        if (this.valores[1][0]==0) {
            dato_dato = this.valores[1][1];
        }
        else {
            if (this.valores[1][0]==1) {
                dato_dato = this.fuentes[1][this.valores[1][1]].valores[0];
            }
        }
    }


    if (dato_operaciones[dato_factor][1] == 5) {
    }


    if (dato_operaciones[dato_factor][1] == 7) {
        dato_dato = this.fuentes[1][dato_operaciones[dato_factor][2]].valores[0];
    }
    if (dato_operaciones[dato_factor][1] == 8) {
        dato_dato = this.fuentes[1][dato_operaciones[dato_factor][2]].valores[1];
    }

    if (dato_operaciones[dato_factor][1] == 10) {

        //console.log('OBTIENE DATO DE UN OBJETO Y UNA ETIQUETA EN JSON');

// LAS POCISIONES DE dato_operaciones[dato_factor][2] SON:
// dato_operaciones[dato_factor][2][0] = LLAVE 
// dato_operaciones[dato_factor][2][1] = POSICION DE LA CONSULTA 

      
        dato_dato = this.fuentes[1][dato_operaciones[dato_factor][2][1]].codigos[0][0][(this.configuraciones[1][0]+1)][dato_operaciones[dato_factor][2][0]];

    }
    if (dato_operaciones[dato_factor][1] == 11) {
        dato_dato = this.fuentes[1][dato_operaciones[dato_factor][2]].datos[0];
    }
    if (dato_operaciones[dato_factor][1] == 12) {
        dato_dato = this.fuentes[1][dato_operaciones[dato_factor][2]].datos[1];
    }


    // //console.log('RESULTADO DATO: '+dato_dato);
    return dato_dato;
};
Valor.prototype.recibe_registro = function(registro, campo) {

    this.configuraciones[1][0] = registro;
    this.configuraciones[1][1] = campo;
};	   						

Valor.prototype.traduce = function(par_idioma) {
    this.estructura[0][0] = par_idioma;
};	   						
