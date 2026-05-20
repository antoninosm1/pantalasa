function Kanban(configuraciones, etiquetas, codigos, elementos) {
	this.configuraciones = configuraciones;
	this.etiquetas = etiquetas;
	this.codigos = codigos;
	this.elementos = elementos;
}

Kanban.prototype.generahtml = function() {
/////////////////////////////////////////////////////////////////////
////////// ANALIZAMOS DIMESIONES DEL NAVEGADOR Y CONFIGURACIONES DE BREAKS DE LA Kanban
////////// PARA ESTABLECER ORIENTACIÓN DE LA Kanban
    var i = 0;
    while(i < this.configuraciones[6][1].length) {
        if (window.innerWidth == this.configuraciones[6][1][i] || window.innerWidth > this.configuraciones[6][1][i]) {
            
            this.configuraciones[6][0] = this.configuraciones[6][2][i]; 
        
        }
        i++;
    }

/////////////////////////////////////////////////////////////////////
////////// INICIAMOS EL DIV CONTENEDOR DE Kanban COMO DIV PRINCIPAL
    this.codigos[0] = '<DIV CLASS = "'+this.etiquetas[0]+'" ID = "'+this.etiquetas[1]+'">';

/////////////////////////////////////////////////////////////////////
////////// INICIAMOS EL DIV CONTENEDOR DEL TITULO DE LA Kanban DENTRO DEL DIV PRINCIPAL
    this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_tituloKanban" ID = "'+this.etiquetas[1]+'_TITULOKanban">';
/////////////////////////////////////////////////////////////////////
////////// CONCATENAMOS EL TITULO DE LA Kanban DENTRO DEL DIV CONTENEDOR DEL TITULO DE LA Kanban
    this.codigos[0] = this.codigos[0]+this.configuraciones[5];
/////////////////////////////////////////////////////////////////////
////////// CERRAMOS EL DIV CONTENEDOR DEL TITULO DE LA Kanban DENTRO DEL DIV PRINCIPAL
    this.codigos[0] = this.codigos[0]+'</DIV>';

/////////////////////////////////////////////////////////////////////
////////// INSPECCIONAMOS SI LA ORIENTACION DE LA Kanban ES 0 = VERTICAL 1 = HORIZONTAL
    if (this.configuraciones[6][0]==1) {
        this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_encabezadosKanban" ID = "'+this.etiquetas[1]+'_ENCABEZADOSKanban">';
        var i = 0;
        while(i < this.configuraciones[1]) {
            this.codigos[0] = this.codigos[0] + '<DIV  CLASS = "'+this.etiquetas[0]+'_encabezados_elemento '+this.etiquetas[0]+'_'+this.elementos[2][i]+'">'+this.configuraciones[0][1][this.configuraciones[0][0]][0][i]+'</DIV>';
            i++;
        }
        this.codigos[0] = this.codigos[0]+'</DIV>';
    }
    this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_cuerpoKanban" ID = "'+this.etiquetas[1]+'_CUERPOKanban">';
    var total_registros_Kanban = (this.configuraciones[3].codigos[0][0].length-1)
    if (total_registros_Kanban > 0) {
        
        var i = this.configuraciones[4][0];
////// CICLO POR REGISTRO        
        while(i < (this.configuraciones[4][0]+this.configuraciones[4][1])) {
            this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_renglongrid'+'" ID = "'+this.etiquetas[1]+'_'+i+'">';
            
            var ii = 0;
            
////// CICLO DENTRO DEL REGISTRO        
            
            while(ii < this.configuraciones[1]) {


///////// INSPECCIONAMOS LA ORIENTACION

                if (this.configuraciones[6][0]==0) {
                    this.codigos[0] = this.codigos[0] + '<DIV  CLASS = "'+this.etiquetas[0]+'_titulorenglon">'+this.configuraciones[0][1][this.configuraciones[0][0]][0][ii]+':</DIV>';
                    
                    this.codigos[0] = this.codigos[0] + '<DIV  CLASS = "no-double-click '+this.etiquetas[0]+'_celda '+this.etiquetas[0]+'_'+this.elementos[2][ii]+'_vertical" '; 
                    this.codigos[0] = this.codigos[0] + 'ONCLICK="'+this.configuraciones[8][6]+'(`';
                    var iii = 0;
                    while(iii < this.configuraciones[8][7][0].length) {
                        if (this.configuraciones[8][7][0][iii]==0) {
                            this.codigos[0] = this.codigos[0] + this.configuraciones[3].codigos[0][0][(i+1)][this.elementos[1][this.configuraciones[8][7][1][iii]]];
                        }
                        if (this.configuraciones[8][7][0][iii]==1) {
                            this.codigos[0] = this.codigos[0] + this.configuraciones[8][7][1][iii];
                        }
                        iii++;
                    }
                    this.codigos[0] = this.codigos[0] + '`,';
                    this.codigos[0] = this.codigos[0] + '`'+ii+'`, `'+this.configuraciones[3].codigos[0][0][(i+1)][this.elementos[1][ii]]+'`), '+this.elementos[3][ii]+'">';
                    // INSPECCIONAMOS TIPO DE VALOR
                    if (this.elementos[0][ii]==0) {
                        this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.etiquetas[0]+'_celda_dato'+'">'+this.configuraciones[3].codigos[0][0][(i+1)][this.elementos[1][ii]]+'</A>';
                    }
                    if (this.elementos[0][ii]==2) {
                        var xi = 0;
                        while(xi < this.elementos[5][ii][0].length) {
                            if (this.elementos[5][ii][0][xi]==this.configuraciones[3].codigos[0][0][(i+1)][this.elementos[1][ii]]) {
                                this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.etiquetas[0]+'_celda_dato'+'">'+this.elementos[5][ii][1][xi]+'</A>';
                            }    
                            xi++;
                        }
                    }
                    if (this.elementos[0][ii]==5) {
                        this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.etiquetas[0]+'_celda_dato '+this.elementos[4][ii]+'"></A>';
                    }
                    this.codigos[0] = this.codigos[0] + '</DIV>';
                
                }
                else {
    
                    this.codigos[0] = this.codigos[0] + '<DIV  CLASS = "no-double-click '+this.etiquetas[0]+'_celda '+this.etiquetas[0]+'_'+this.elementos[2][ii]+'" '; 
                    this.codigos[0] = this.codigos[0] + 'ONCLICK="'+this.configuraciones[8][6]+'(`';
                    var iii = 0;
                    while(iii < this.configuraciones[8][7][0].length) {
                        if (this.configuraciones[8][7][0][iii]==0) {
                            this.codigos[0] = this.codigos[0] + this.configuraciones[3].codigos[0][0][(i+1)][this.elementos[1][this.configuraciones[8][7][1][iii]]];
                        }
                        if (this.configuraciones[8][7][0][iii]==1) {
                            this.codigos[0] = this.codigos[0] + this.configuraciones[8][7][1][iii];
                        }
                        iii++;
                    }
                    this.codigos[0] = this.codigos[0] + '`,';
                    this.codigos[0] = this.codigos[0] + '`'+ii+'`, `'+this.configuraciones[3].codigos[0][0][(i+1)][this.elementos[1][ii]]+'`), '+this.elementos[3][ii]+'">';
                    
                    
                    if (this.elementos[0][ii]==0) {
                        this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.etiquetas[0]+'_celda_dato'+'">'+this.configuraciones[3].codigos[0][0][(i+1)][this.elementos[1][ii]]+'</A>';
                    }
                    if (this.elementos[0][ii]==2) {
                        var xi = 0;
                        while(xi < this.elementos[5][ii][0].length) {
                            if (this.elementos[5][ii][0][xi]==this.configuraciones[3].codigos[0][0][(i+1)][this.elementos[1][ii]]) {
                                this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.etiquetas[0]+'_celda_dato'+'">'+this.elementos[5][ii][1][xi]+'</A>';
                            }    
                            xi++;
                        }
                    }
                    if (this.elementos[0][ii]==5) {
                        this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.etiquetas[0]+'_celda_dato '+this.elementos[4][ii]+'"></A>';
                    }
                    
                    
                    
                    this.codigos[0] = this.codigos[0] + '</DIV>';
                }
                ii++;
            }
    
            this.codigos[0] = this.codigos[0]+'</DIV>';
            i++;
            if (i == total_registros_Kanban) {
                i = (this.configuraciones[4][0]+this.configuraciones[4][1]);
            }
        }
    
    }
    
    
    
    this.codigos[0] = this.codigos[0]+'</DIV>';

    this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_controlesKanban" ID = "'+this.etiquetas[1]+'_CONTROLESKanban">';
    
    var i = 0;
    while(i < this.configuraciones[7][0].length) {
        if (this.configuraciones[7][0][i]==0) {
            this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_controlesKanban_0" ID = "'+this.etiquetas[1]+'_CONTROLESKanban_'+i+'">';
            this.codigos[0] = this.codigos[0]+this.configuraciones[7][i];
            this.codigos[0] = this.codigos[0]+'</DIV>';
        }
        if (this.configuraciones[7][0][i]==1) {
            this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_controlesKanban_0" ID = "'+this.etiquetas[1]+'_CONTROLESKanban_'+i+'">';
                this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_controlesKanban_0_0" ID = "'+this.etiquetas[1]+'_CONTROLESKanban_0_'+i+'">';
                this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_controlesKanban_0_0_0" ID = "'+this.etiquetas[1]+'_CONTROLESKanban_0_0_'+i+'">';
                
                
                this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.etiquetas[0]+'_icono '+this.configuraciones[7][1][0]+'" ID="'+this.etiquetas[0]+'_ICONO_1" ';
                this.codigos[0] = this.codigos[0] + this.configuraciones[7][2][0];
                this.codigos[0] = this.codigos[0] + '>';
                this.codigos[0] = this.codigos[0] + '</A>';
                
                
                this.codigos[0] = this.codigos[0]+'</DIV>';
                this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_controlesKanban_0_0_0" ID = "'+this.etiquetas[1]+'_CONTROLESKanban_0_1_'+i+'">';

                this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.etiquetas[0]+'_icono '+this.configuraciones[7][1][1]+'" ID="'+this.etiquetas[0]+'_ICONO_2" ';
                this.codigos[0] = this.codigos[0] + this.configuraciones[7][2][1];
                this.codigos[0] = this.codigos[0] + '>';
                this.codigos[0] = this.codigos[0] + '</A>';

                this.codigos[0] = this.codigos[0]+'</DIV>';
                this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_controlesKanban_0_0_0" ID = "'+this.etiquetas[1]+'_CONTROLESKanban_0_2_'+i+'">';

                this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.etiquetas[0]+'_icono '+this.configuraciones[7][1][2]+'" ID="'+this.etiquetas[0]+'_ICONO_3" ';
                this.codigos[0] = this.codigos[0] + this.configuraciones[7][2][2];
                this.codigos[0] = this.codigos[0] + '>';
                this.codigos[0] = this.codigos[0] + '</A>';

                this.codigos[0] = this.codigos[0]+'</DIV>';
                this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_controlesKanban_0_0_0" ID = "'+this.etiquetas[1]+'_CONTROLESKanban_0_3_'+i+'">';

                this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.etiquetas[0]+'_icono '+this.configuraciones[7][1][3]+'" ID="'+this.etiquetas[0]+'_ICONO_4" ';
                this.codigos[0] = this.codigos[0] + this.configuraciones[7][2][3];
                this.codigos[0] = this.codigos[0] + '>';
                this.codigos[0] = this.codigos[0] + '</A>';

                this.codigos[0] = this.codigos[0]+'</DIV>';
                this.codigos[0] = this.codigos[0]+'</DIV>';
                
                this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_controlesKanban_0_0" ID = "'+this.etiquetas[1]+'_CONTROLESKanban_1'+i+'">';

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
            this.codigos[0] = this.codigos[0]+'<DIV CLASS = "'+this.etiquetas[0]+'_controlesKanban_0" ID = "'+this.etiquetas[1]+'_CONTROLESKanban_'+i+'">';
            this.codigos[0] = this.codigos[0]+'xx';
            this.codigos[0] = this.codigos[0]+'</DIV>';
        }
        i++;
    }

    this.codigos[0] = this.codigos[0]+'</DIV>';
    
/////////////////////////////////////////////////////////////////////
////////// CERRAMOS EL DIV CONTENEDOR DE Kanban O DIV PRINCIPAL
    this.codigos[0] = this.codigos[0]+'</DIV>';
};
Kanban.prototype.imprimehtml = function() {
    if (this.configuraciones[2]==0) {
        this.escribehtml();
    }
    else {
        this.agregahtml();
    }
};	   						
Kanban.prototype.escribehtml = function() {
	$(this.etiquetas[2]).html(this.codigos[0]);
};	   						
Kanban.prototype.agregahtml = function() {
	$(this.etiquetas[2]).append(this.codigos[0]);
};	   						
Kanban.prototype.esArray = function(variable) {
    return Array.isArray(variable);
};
Kanban.prototype.avanza = function() {
    var pos_final_total_grid = this.configuraciones[4][0] + this.configuraciones[4][1];
    if (pos_final_total_grid > this.configuraciones[3].codigos[0][0][0].registros || pos_final_total_grid == this.configuraciones[3].codigos[0][0][0].registros) {
    }
    else {
        this.configuraciones[4][0] = pos_final_total_grid;
    };
};
Kanban.prototype.inicializa_posicion = function() {
    this.configuraciones[4][0] = 0;
};
Kanban.prototype.retrocede = function() {
    pos_inicial_total_grid = this.configuraciones[4][0] - this.configuraciones[4][1];
    if (pos_inicial_total_grid < 0) {

    }
    else {
        this.configuraciones[4][0] = this.configuraciones[4][0] - this.configuraciones[4][1];
    };
};
Kanban.prototype.finaliza_posicion = function() {
    var num_pag_grid = this.configuraciones[3].codigos[0][0][0].registros / this.configuraciones[4][1];
    var num_pag_grid_int = Math.trunc(num_pag_grid);
    var pos_final_grid = (num_pag_grid_int * this.configuraciones[4][1]);
    if (pos_final_grid==this.configuraciones[3].codigos[0][0][0].registros) {
        pos_final_grid = pos_final_grid - this.configuraciones[4][1];
    }
    this.configuraciones[4][0] = pos_final_grid;
};

Kanban.prototype.actualiza_valores = function(valor_clave, valor_posicion, valor_celda) {
    this.configuraciones[8][1] = valor_clave;
    this.configuraciones[8][3] = valor_posicion;
    this.configuraciones[8][5] = valor_celda;
//    alert('ESTE ES VALOR INICIAL CLAVE: '+this.configuraciones[8][0]+' ESTE ES VALOR CLAVE: '+this.configuraciones[8][1]+' ESTE ES VALOR INICIAL POSICION: '+this.configuraciones[8][2]+' ESTE ES VALOR POSICION: '+this.configuraciones[8][3]+' ESTE ES VALOR INICIAL CELDA: '+this.configuraciones[8][4]+' ESTE ES VALOR CELDA: '+this.configuraciones[8][5]);
};
Kanban.prototype.recibe_consulta = function(consulta) {
    this.configuraciones[3] = consulta;
};
Kanban.prototype.retardo = function() {
    alert("estoy en retardo");
};





