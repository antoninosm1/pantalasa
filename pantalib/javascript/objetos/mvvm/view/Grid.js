function Grid(configuraciones, etiquetas, codigos, elementos, fuentes) {
	this.configuraciones = configuraciones;
	this.etiquetas = etiquetas;
	this.codigos = codigos;
	this.elementos = elementos;
	this.fuentes = fuentes;
}

Grid.prototype.generahtml = function() {
    this.configuraciones[4][1] = Number(this.traer_dato(0));
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
    
    this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_cuerpogradilla_scroll" ID = "'+this.etiquetas[1]+'_CUERPOGRADILLA_SCROLL">';
    
    
    if (total_registros_Grid > 0) {
        
        var i = this.configuraciones[4][0];


////// CICLO POR REGISTRO i = REGISTRO       
        while(i < (this.configuraciones[4][0]+this.configuraciones[4][1])) {

            
            this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_renglongradilla'+'" ID = "'+this.etiquetas[1]+'_'+i+'">';
            
            var ii = 0;
            
////// CICLO DENTRO DEL REGISTRO POR CADA CAMPO ii = CAMPO       
            
            while(ii < this.configuraciones[1]) {

                //console.log('REGISTRO: '+i+' CAMPO: '+ii);
                //console.log('//////////////////////////////////////////////');
                //console.log('//////////////////////////////////////////////');
                //console.log('//////////////////////////////////////////////');
///////// INSPECCIONAMOS LA ORIENTACION

                if (this.configuraciones[6][0]==0) {
                    this.codigos[0] = this.codigos[0] + '<DIV  CLASS = "'+this.etiquetas[0]+'_titulorenglon">'+this.configuraciones[0][1][this.configuraciones[0][0]][0][ii]+':</DIV>';
                    this.codigos[0] = this.codigos[0] + '<DIV  CLASS = "no-double-click '+this.etiquetas[0]+'_celda '+this.etiquetas[0]+'_'+this.elementos[2][ii]+'_vertical" '; 
                    this.codigos[0] = this.codigos[0] + 'ONCLICK="'+this.configuraciones[8][2]+'([`';
                    this.valores(i, ii);
                }
                else {
                    this.codigos[0] = this.codigos[0] + '<DIV  CLASS = "no-double-click '+this.etiquetas[0]+'_celda '+this.etiquetas[0]+'_'+this.elementos[2][ii]+'" '; 
                    this.codigos[0] = this.codigos[0] + 'ONCLICK="'+this.configuraciones[8][2]+'([`';
                    this.valores(i, ii);
                }
                ii++;
                //console.log('//////////////////////////////////////////////');
                //console.log('//////////////////////////////////////////////');
            }
    
            this.codigos[0] = this.codigos[0]+'</DIV>';
            i++;
            if (i == total_registros_Grid) {
                i = (this.configuraciones[4][0]+this.configuraciones[4][1]);
            }
        }
    
    }
    
    this.codigos[0] = this.codigos[0]+'</DIV>';
    
    
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

    this.codigos[0] = this.codigos[0] + i;
    this.codigos[0] = this.codigos[0] + '`,`';
    this.codigos[0] = this.codigos[0] + ii;

    var iv = 0;
    while(iv < this.elementos[0][ii].length) {
        this.codigos[0] = this.codigos[0] + '`,`';
        this.elementos[0][ii][iv].recibe_registro(i, ii);
        this.codigos[0] = this.codigos[0] + this.elementos[0][ii][iv].concatena_valor();
        iv++;
   
    }

    this.codigos[0] = this.codigos[0] + '`]), '+this.elementos[3][ii]+'">';

    this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.etiquetas[0]+'_celda_dato';
    

    var iv = 0;
    while(iv < this.elementos[4][ii].length) {
        this.elementos[4][ii][iv].recibe_registro(i, ii);
        this.codigos[0] = this.codigos[0] + this.elementos[4][ii][iv].concatena_valor();
        iv++;
   
    }
    
    this.codigos[0] = this.codigos[0] + '">';

    //this.codigos[0] = this.codigos[0] + this.concatena_valor(i, ii, this.configuraciones[3].codigos[0][0][(i+1)], this.elementos[5]);

    var iv = 0;
    while(iv < this.elementos[5][ii].length) {
        this.elementos[5][ii][iv].recibe_registro(i, ii);
        this.codigos[0] = this.codigos[0] + this.elementos[5][ii][iv].concatena_valor();
        iv++;
   
    }

    this.codigos[0] = this.codigos[0] + '</A>';
    this.codigos[0] = this.codigos[0] + '</DIV>';
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













/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////

////////// METODOS PARA MOVERSE ENTRE PÁGINAS DE LA GRADILLA

/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////














Grid.prototype.avanza = function() {
    var pos_final_total_grid = Number(this.configuraciones[4][0]) + Number(this.configuraciones[4][1]);
    
    
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
    pos_inicial_total_grid = Number(this.configuraciones[4][0]) - Number(this.configuraciones[4][1]);
    if (pos_inicial_total_grid < 0) {

    }
    else {
        this.configuraciones[4][0] = Number(this.configuraciones[4][0]) - Number(this.configuraciones[4][1]);
    };
};

Grid.prototype.finaliza_posicion = function() {
    var num_pag_grid = this.configuraciones[3].codigos[0][0][0].registros / Number(this.configuraciones[4][1]);
    var num_pag_grid_int = Math.trunc(num_pag_grid);
    var pos_final_grid = (num_pag_grid_int * Number(this.configuraciones[4][1]));
    if (pos_final_grid==this.configuraciones[3].codigos[0][0][0].registros) {
        pos_final_grid = pos_final_grid - Number(this.configuraciones[4][1]);
    }
    this.configuraciones[4][0] = pos_final_grid;
};

Grid.prototype.actualiza_valores = function(arreglo_valores) {
    this.configuraciones[8][0] = arreglo_valores;
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
Grid.prototype.registros_pagina = function(registros) {
    this.configuraciones[4][1] = registros;
};

Grid.prototype.traer_dato = function(funcion_dato) {
    dato_respuesta = '';


/////////////////////////////////////////////////////    
/// TIPOS DE VALOR POSICION funcion_dato

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



