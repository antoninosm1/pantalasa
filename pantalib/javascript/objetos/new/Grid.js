function Grid(configuraciones, etiquetas, codigos, elementos) {
	this.configuraciones = configuraciones;
	this.etiquetas = etiquetas;
	this.codigos = codigos;
	this.elementos = elementos;
}

Grid.prototype.generahtml = function() {

/////////////////////////////////////////////////////////////////////
////////// ANALIZAMOS DIMESIONES DEL NAVEGADOR Y CONFIGURACIONES DE BREAKS DE LA Grid
////////// PARA ESTABLECER ORIENTACIÓN DE LA Grid
    var i = 0;
    while(i < this.configuraciones[6][1].length) {
        if (window.innerWidth == this.configuraciones[6][1][i] || window.innerWidth > this.configuraciones[6][1][i]) {
            
            this.configuraciones[6][0] = this.configuraciones[6][2][i]; 
        
        }
        i++;
    }

/////////////////////////////////////////////////////////////////////
////////// INICIAMOS EL DIV CONTENEDOR DE Grid COMO DIV PRINCIPAL
    this.codigos[0] = '<DIV CLASS = "'+this.etiquetas[0]+'" ID = "'+this.etiquetas[1]+'">';

/////////////////////////////////////////////////////////////////////
////////// INICIAMOS EL DIV CONTENEDOR DEL TITULO DE LA Grid DENTRO DEL DIV PRINCIPAL
    this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_titulogradilla" ID = "'+this.etiquetas[1]+'_TITULOGRADILLA">';
/////////////////////////////////////////////////////////////////////
////////// CONCATENAMOS EL TITULO DE LA Grid DENTRO DEL DIV CONTENEDOR DEL TITULO DE LA Grid
    this.codigos[0] = this.codigos[0]+this.configuraciones[5];
/////////////////////////////////////////////////////////////////////
////////// CERRAMOS EL DIV CONTENEDOR DEL TITULO DE LA Grid DENTRO DEL DIV PRINCIPAL
    this.codigos[0] = this.codigos[0]+'</DIV>';

/////////////////////////////////////////////////////////////////////
////////// INSPECCIONAMOS SI LA ORIENTACION DE LA Grid ES 0 = VERTICAL 1 = HORIZONTAL
    if (this.configuraciones[6][0]==1) {
        this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_encabezadosgradilla" ID = "'+this.etiquetas[1]+'_ENCABEZADOSGRADILLA">';
        var i = 0;
        while(i < this.configuraciones[1]) {
            this.codigos[0] = this.codigos[0] + '<DIV  CLASS = "'+this.etiquetas[0]+'_encabezados_elemento '+this.etiquetas[0]+'_'+this.elementos[2][i]+'">'+this.configuraciones[0][1][this.configuraciones[0][0]][0][i]+'</DIV>';
            i++;
        }
        this.codigos[0] = this.codigos[0]+'</DIV>';
    }
    this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_cuerpogradilla" ID = "'+this.etiquetas[1]+'_CUERPOGRADILLA">';
    var total_registros_Grid = (this.configuraciones[3].codigos[0][0].length-1)
    if (total_registros_Grid > 0) {
        
        var i = this.configuraciones[4][0];
////// CICLO POR REGISTRO i = REGISTRO       
        while(i < (this.configuraciones[4][0]+this.configuraciones[4][1])) {
            this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_renglongradilla'+'" ID = "'+this.etiquetas[1]+'_'+i+'">';
            
            var ii = 0;
            
////// CICLO DENTRO DEL REGISTRO POR CADA CAMPO ii = CAMPO       
            
            while(ii < this.configuraciones[1]) {

                console.log('REGISTRO: '+i+' CAMPO: '+ii);
                console.log('//////////////////////////////////////////////');
                console.log('//////////////////////////////////////////////');
                console.log('//////////////////////////////////////////////');
///////// INSPECCIONAMOS LA ORIENTACION

                if (this.configuraciones[6][0]==0) {
                    this.codigos[0] = this.codigos[0] + '<DIV  CLASS = "'+this.etiquetas[0]+'_titulorenglon">'+this.configuraciones[0][1][this.configuraciones[0][0]][0][ii]+':</DIV>';
                    this.codigos[0] = this.codigos[0] + '<DIV  CLASS = "no-double-click '+this.etiquetas[0]+'_celda '+this.etiquetas[0]+'_'+this.elementos[2][ii]+'_vertical" '; 
                    this.codigos[0] = this.codigos[0] + 'ONCLICK="'+this.configuraciones[8][2]+'(`';
                    this.valores(i, ii);
                }
                else {
                    this.codigos[0] = this.codigos[0] + '<DIV  CLASS = "no-double-click '+this.etiquetas[0]+'_celda '+this.etiquetas[0]+'_'+this.elementos[2][ii]+'" '; 
                    this.codigos[0] = this.codigos[0] + 'ONCLICK="'+this.configuraciones[8][2]+'(`';
                    this.valores(i, ii);
                }
                ii++;
                console.log('//////////////////////////////////////////////');
                console.log('//////////////////////////////////////////////');
            }
    
            this.codigos[0] = this.codigos[0]+'</DIV>';
            i++;
            if (i == total_registros_Grid) {
                i = (this.configuraciones[4][0]+this.configuraciones[4][1]);
            }
        }
    
    }
    
    
    
    this.codigos[0] = this.codigos[0]+'</DIV>';

    this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_controlesgradilla" ID = "'+this.etiquetas[1]+'_CONTROLESGRADILLA">';
    
    var i = 0;
    while(i < this.configuraciones[7][0].length) {
        if (this.configuraciones[7][0][i]==0) {
            this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_controlesgradilla_0" ID = "'+this.etiquetas[1]+'_CONTROLESGRADILLA_'+i+'">';
            this.codigos[0] = this.codigos[0]+this.configuraciones[7][i];
            this.codigos[0] = this.codigos[0]+'</DIV>';
        }
        if (this.configuraciones[7][0][i]==1) {
            this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_controlesgradilla_0" ID = "'+this.etiquetas[1]+'_CONTROLESGRADILLA_'+i+'">';
                this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_controlesgradilla_0_0" ID = "'+this.etiquetas[1]+'_CONTROLESGRADILLA_0_'+i+'">';
                this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_controlesgradilla_0_0_0" ID = "'+this.etiquetas[1]+'_CONTROLESGRADILLA_0_0_'+i+'">';
                
                
                this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.etiquetas[0]+'_icono '+this.configuraciones[7][1][0]+'" ID="'+this.etiquetas[0]+'_ICONO_1" ';
                this.codigos[0] = this.codigos[0] + this.configuraciones[7][2][0];
                this.codigos[0] = this.codigos[0] + '>';
                this.codigos[0] = this.codigos[0] + '</A>';
                
                
                this.codigos[0] = this.codigos[0]+'</DIV>';
                this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_controlesgradilla_0_0_0" ID = "'+this.etiquetas[1]+'_CONTROLESGRADILLA_0_1_'+i+'">';

                this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.etiquetas[0]+'_icono '+this.configuraciones[7][1][1]+'" ID="'+this.etiquetas[0]+'_ICONO_2" ';
                this.codigos[0] = this.codigos[0] + this.configuraciones[7][2][1];
                this.codigos[0] = this.codigos[0] + '>';
                this.codigos[0] = this.codigos[0] + '</A>';

                this.codigos[0] = this.codigos[0]+'</DIV>';
                this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_controlesgradilla_0_0_0" ID = "'+this.etiquetas[1]+'_CONTROLESGRADILLA_0_2_'+i+'">';

                this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.etiquetas[0]+'_icono '+this.configuraciones[7][1][2]+'" ID="'+this.etiquetas[0]+'_ICONO_3" ';
                this.codigos[0] = this.codigos[0] + this.configuraciones[7][2][2];
                this.codigos[0] = this.codigos[0] + '>';
                this.codigos[0] = this.codigos[0] + '</A>';

                this.codigos[0] = this.codigos[0]+'</DIV>';
                this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_controlesgradilla_0_0_0" ID = "'+this.etiquetas[1]+'_CONTROLESGRADILLA_0_3_'+i+'">';

                this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.etiquetas[0]+'_icono '+this.configuraciones[7][1][3]+'" ID="'+this.etiquetas[0]+'_ICONO_4" ';
                this.codigos[0] = this.codigos[0] + this.configuraciones[7][2][3];
                this.codigos[0] = this.codigos[0] + '>';
                this.codigos[0] = this.codigos[0] + '</A>';

                this.codigos[0] = this.codigos[0]+'</DIV>';
                this.codigos[0] = this.codigos[0]+'</DIV>';
                
                this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_controlesgradilla_0_0" ID = "'+this.etiquetas[1]+'_CONTROLESGRADILLA_1'+i+'">';

                this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.etiquetas[0]+'_texto" ID="'+this.etiquetas[0]+'_TEXTO_1">';
                this.codigos[0] = this.codigos[0] + 'REGISTROS: '+this.configuraciones[3].codigos[0][0][0].registros;
                this.codigos[0] = this.codigos[0] + '</A>';

                this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.etiquetas[0]+'_texto" ID="'+this.etiquetas[0]+'_TEXTO_2">';
                this.codigos[0] = this.codigos[0] + 'REG X PAG: '+this.configuraciones[4][1];
                this.codigos[0] = this.codigos[0] + '</A>';

                this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.etiquetas[0]+'_texto" ID="'+this.etiquetas[0]+'_TEXTO_3">';
                var num_pag_grid = this.configuraciones[3].codigos[0][0][0].registros / this.configuraciones[4][1];
                var num_pag_grid_int = Math.trunc(num_pag_grid);
                if (num_pag_grid != num_pag_grid_int) {
                    num_pag_grid = num_pag_grid_int + 1;
                }
                this.codigos[0] = this.codigos[0] + 'PÁGINAS: '+num_pag_grid;
                this.codigos[0] = this.codigos[0] + '</A>';

                this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.etiquetas[0]+'_texto" ID="'+this.etiquetas[0]+'_TEXTO_4">';
                var posicion_grid = this.configuraciones[4][0] + this.configuraciones[4][1];
                var pag_act_grid = posicion_grid / this.configuraciones[4][1]
                this.codigos[0] = this.codigos[0] + 'PÁG. ACT.: '+pag_act_grid;
                this.codigos[0] = this.codigos[0] + '</A>';

                this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.etiquetas[0]+'_texto" ID="'+this.etiquetas[0]+'_TEXTO_5">';
                var reg_inicio_pag_grid = this.configuraciones[4][0] + 1;
                var reg_final_pag_grid = this.configuraciones[4][0] + this.configuraciones[4][1];
                if (reg_final_pag_grid > this.configuraciones[3].codigos[0][0][0].registros || reg_final_pag_grid == this.configuraciones[3].codigos[0][0][0].registros) {
                    reg_final_pag_grid = this.configuraciones[3].codigos[0][0][0].registros;
                }
                this.codigos[0] = this.codigos[0] + 'REG-PÁG-AC: '+reg_inicio_pag_grid+' - '+reg_final_pag_grid;
                this.codigos[0] = this.codigos[0] + '</A>';

                this.codigos[0] = this.codigos[0]+'</DIV>';
                this.codigos[0] = this.codigos[0]+'</DIV>';
        }
        if (this.configuraciones[7][0][i]==2) {
            this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_controlesgradilla_0" ID = "'+this.etiquetas[1]+'_CONTROLESGRADILLA_'+i+'">';
            this.codigos[0] = this.codigos[0]+'xx';
            this.codigos[0] = this.codigos[0]+'</DIV>';
        }
        i++;
    }

    this.codigos[0] = this.codigos[0]+'</DIV>';
    
/////////////////////////////////////////////////////////////////////
////////// CERRAMOS EL DIV CONTENEDOR DE Grid O DIV PRINCIPAL
    this.codigos[0] = this.codigos[0]+'</DIV>';
};


Grid.prototype.valores = function(i, ii) {

    console.log('****** CONCATENA CLICK, REGISTRO: '+i);
    this.codigos[0] = this.codigos[0] + i;
    this.codigos[0] = this.codigos[0] + '`,`';

    console.log('****** CONCATENA CLICK, CAMPO: '+ii);
    this.codigos[0] = this.codigos[0] + ii;
    this.codigos[0] = this.codigos[0] + '`,`';

    console.log('CONCATENA CLICK, VALOR: '+this.concatena_valor(i, ii, this.configuraciones[3].codigos[0][0][(i+1)], this.elementos[0][0]));
    this.codigos[0] = this.codigos[0] + this.concatena_valor(i, ii, this.configuraciones[3].codigos[0][0][(i+1)], this.elementos[0][0]);
    this.codigos[0] = this.codigos[0] + '`,`';

    console.log('CONCATENA CLICK, ID: '+this.concatena_valor(i, ii, this.configuraciones[3].codigos[0][0][(i+1)], this.elementos[0][1]));
    this.codigos[0] = this.codigos[0] + this.concatena_valor(i, ii, this.configuraciones[3].codigos[0][0][(i+1)], this.elementos[0][1]);
    this.codigos[0] = this.codigos[0] + '`,`';

    console.log('CONCATENA CLICK, SEGUNDO VALOR '+this.concatena_valor(i, ii, this.configuraciones[3].codigos[0][0][(i+1)], this.elementos[0][2]));
    this.codigos[0] = this.codigos[0] + this.concatena_valor(i, ii, this.configuraciones[3].codigos[0][0][(i+1)], this.elementos[0][2]);
    this.codigos[0] = this.codigos[0] + '`,`';

    console.log('CONCATENA CLICK, VALOR ALTERNATIVO '+this.concatena_valor(i, ii, this.configuraciones[3].codigos[0][0][(i+1)], this.elementos[0][3]));
    this.codigos[0] = this.codigos[0] + this.concatena_valor(i, ii, this.configuraciones[3].codigos[0][0][(i+1)], this.elementos[0][3]);
    this.codigos[0] = this.codigos[0] + '`,`';

    console.log('CONCATENA CLICK, INFORMATIVO '+this.concatena_valor(i, ii, this.configuraciones[3].codigos[0][0][(i+1)], this.elementos[0][4]));
    this.codigos[0] = this.codigos[0] + this.concatena_valor(i, ii, this.configuraciones[3].codigos[0][0][(i+1)], this.elementos[0][4]);

    this.codigos[0] = this.codigos[0] + '`), '+this.elementos[3][ii]+'">';

    this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.etiquetas[0]+'_celda_dato';
    this.codigos[0] = this.codigos[0] + this.concatena_valor(i, ii, this.configuraciones[3].codigos[0][0][(i+1)], this.elementos[4]);
    this.codigos[0] = this.codigos[0] + '">';

    console.log('VALOR DE CELDA, REGISTRO: '+i+' CAMPO: '+ii);
    this.codigos[0] = this.codigos[0] + this.concatena_valor(i, ii, this.configuraciones[3].codigos[0][0][(i+1)], this.elementos[5]);

    this.codigos[0] = this.codigos[0] + '</A>';
    this.codigos[0] = this.codigos[0] + '</DIV>';
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











Grid.prototype.concatena_valor = function(registro, campo, consulta, adn) {

    var conca_parte = 0;
    var conca_partes = adn[campo].length;
    var resultado_concatenado = '';

    console.log('ESTOY EN CONCATENA VALOR, PARTES: '+conca_partes);

    while(conca_parte < conca_partes) {
        console.log('PARTE: '+conca_parte);

        //resultado_concatenado = resultado_concatenado + adn[campo][concatena_parte];
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














/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////

////////// METODOS PARA IMPRIMIR

/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////














Grid.prototype.imprimehtml = function() {
    if (this.configuraciones[2]==0) {
        this.escribehtml();
    }
    else {
        this.agregahtml();
    }
};	   						
Grid.prototype.escribehtml = function() {
	$(this.etiquetas[2]).html(this.codigos[0]);
};	   						
Grid.prototype.agregahtml = function() {
	$(this.etiquetas[2]).append(this.codigos[0]);
};	   						




Grid.prototype.esArray = function(variable) {
    return Array.isArray(variable);
};

Grid.prototype.avanza = function() {
    var pos_final_total_grid = this.configuraciones[4][0] + this.configuraciones[4][1];
    if (pos_final_total_grid > this.configuraciones[3].codigos[0][0][0].registros || pos_final_total_grid == this.configuraciones[3].codigos[0][0][0].registros) {
    }
    else {
        this.configuraciones[4][0] = pos_final_total_grid;
    };
};

Grid.prototype.inicializa_posicion = function() {
    this.configuraciones[4][0] = 0;
};

Grid.prototype.retrocede = function() {
    pos_inicial_total_grid = this.configuraciones[4][0] - this.configuraciones[4][1];
    if (pos_inicial_total_grid < 0) {

    }
    else {
        this.configuraciones[4][0] = this.configuraciones[4][0] - this.configuraciones[4][1];
    };
};

Grid.prototype.finaliza_posicion = function() {
    var num_pag_grid = this.configuraciones[3].codigos[0][0][0].registros / this.configuraciones[4][1];
    var num_pag_grid_int = Math.trunc(num_pag_grid);
    var pos_final_grid = (num_pag_grid_int * this.configuraciones[4][1]);
    if (pos_final_grid==this.configuraciones[3].codigos[0][0][0].registros) {
        pos_final_grid = pos_final_grid - this.configuraciones[4][1];
    }
    this.configuraciones[4][0] = pos_final_grid;
};










/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////

////////// METODOS PARA ACTUALIZAR LOS VALORES ELEGIDOS DEL GRID
////////// CON EL CLICK SEGUN EL CAMPO Y EL REGISTRO, SE RECOGEN
////////// CUATRO VALORES UN VALOR CONFIGURADO A NIVEL CAMPO, EL 
////////// REGISTRO, EL ID Y EL CAMPO DEL CLICK

/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////












Grid.prototype.actualiza_valores = function(registro_actualiza, campo_actualiza, valor_actualiza, id_actualiza, segundo_actualiza, alternativo_actualiza, informativo_actualiza) {
    this.configuraciones[8][1][0] = registro_actualiza;
    this.configuraciones[8][1][1] = campo_actualiza;
    this.configuraciones[8][1][2] = valor_actualiza;
    this.configuraciones[8][1][3] = id_actualiza;
    this.configuraciones[8][1][4] = segundo_actualiza;
    this.configuraciones[8][1][5] = alternativo_actualiza;
    this.configuraciones[8][1][6] = informativo_actualiza;

    console.log('REGISTRO: '+registro_actualiza+' CAMPO: '+campo_actualiza+' VALOR: '+valor_actualiza+' ID: '+id_actualiza+' SEGUNDO VALOR: '+segundo_actualiza+' VALOR ALTERNATIVO: '+alternativo_actualiza+' INFORMATIVO: '+informativo_actualiza);

};


Grid.prototype.recibe_consulta = function(consulta) {
    this.configuraciones[3] = consulta;
};
Grid.prototype.retardo = function() {
    alert("estoy en retardo");
};
Grid.prototype.crea = function() {
    var resultado = '<A CLASS="'+this.etiquetas[0]+'_celda_dato'+'">'+'DATO'+'</A>';
    return resultado;
};

