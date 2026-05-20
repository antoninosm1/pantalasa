function Selecto(configuraciones, etiquetas, codigos, elementos, valores, metodos) {
	this.configuraciones = configuraciones;
	this.etiquetas = etiquetas;
	this.codigos = codigos;
	this.elementos = elementos;
	this.valores = valores;
	this.metodos = metodos;
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

Selecto.prototype.generahtml = function() {
    this.configuraciones[10] = 0;
    this.codigos[0] = '';
    if (this.configuraciones[4]==1) {
        this.codigos[0] = this.codigos[0] + '<LABEL CLASS="'+this.etiquetas[0]+'_label" for="'+this.etiquetas[1]+'">'+this.configuraciones[0][1][this.configuraciones[0][0]][0]+'</LABEL>';
    }
    this.codigos[0] = this.codigos[0] + '<SELECT CLASS="'+this.etiquetas[0]+'" ID="'+this.etiquetas[1]+'" NAME="'+this.etiquetas[3]+'"'+this.metodos[0];
    if (this.configuraciones[9]!==0) {
        this.codigos[0] = this.codigos[0] + ' SIZE="'+this.configuraciones[9]+'">';
    }
    this.codigos[0] = this.codigos[0] + '>';
    if (this.configuraciones[5]==0) {
        var i = 0;
        while(i < this.configuraciones[8].length) {
            this.codigos[0] = this.codigos[0] + '<OPTION VALUE="'+this.configuraciones[8][i][0]+'" ';
            if (this.valores[1]==this.configuraciones[8][i][0]) {
                this.codigos[0] = this.codigos[0] + 'SELECTED';
            }
            this.codigos[0] = this.codigos[0] + '>'+this.configuraciones[0][1][this.configuraciones[0][0]][this.configuraciones[8][i][1]]+'</OPTION>';
            i++;
        }
        var i = 0;
        while(i < this.configuraciones[1]) {
            this.codigos[0] = this.codigos[0] + '<OPTION VALUE="'+this.elementos[0][i]+'" ';
            if (this.valores[1]==this.elementos[0][i]) {
                this.codigos[0] = this.codigos[0] + 'SELECTED';
            }
            this.codigos[0] = this.codigos[0] + '>'+this.configuraciones[0][1][this.configuraciones[0][0]][2][i]+'</OPTION>';
            i++;
        }
        this.codigos[0] = this.codigos[0] + '</SELECT>';
    }
    if (this.configuraciones[5]==1) {
        var i = 0;
        while(i < this.configuraciones[8].length) {
            this.codigos[0] = this.codigos[0] + '<OPTION VALUE="'+this.configuraciones[8][i][0]+'" ';
            if (this.valores[1]==this.configuraciones[8][i][0]) {
                this.codigos[0] = this.codigos[0] + 'SELECTED';
            }
            this.codigos[0] = this.codigos[0] + '>'+this.configuraciones[0][1][this.configuraciones[0][0]][this.configuraciones[8][i][1]]+'</OPTION>';
            i++;
        }
        let DatosFormulario = new FormData();
        DatosFormulario.append("titulo_xx", "SELECT DE CONSULTA");
        DatosFormulario.append("filtro_xx", this.configuraciones[7][0]);
        DatosFormulario.append("todosregistros_xx", this.configuraciones[7][2]);
        if (this.configuraciones[7][0]==1) {
            var i = 0;
            var etiqueta = '';
            while(i < this.configuraciones[7][1].length) {
                etiqueta = "etiqueta_"+i.toString();
                DatosFormulario.append(etiqueta, this.configuraciones[7][1][i]);
                i++;
            }
        }
        fetch(this.configuraciones[6][0], {
            method: this.configuraciones[6][1],
            body: DatosFormulario,
        })
        .then(res => res.json())
        .then(data => this.generahtml_consulta(data))
        .catch(err => console.log(err))
    }
};
Selecto.prototype.imprimehtml = function() {
    if (this.configuraciones[2]==0) {
        this.escribehtml();
    }
    else {
        this.agregahtml();
    }
};	   						
Selecto.prototype.escribehtml = function() {
	$(this.etiquetas[2]).html(this.codigos[0]);
};	   						
Selecto.prototype.agregahtml = function() {
	$(this.etiquetas[2]).append(this.codigos[0]);
};	   						
Selecto.prototype.traduce = function(par_idioma) {
    this.configuraciones[0][0] = par_idioma;
};	   						
Selecto.prototype.generahtml_consulta = function(data) {
    if (data[0].registros==0) {
        this.codigos[0] = this.codigos[0] + '<OPTION VALUE = "   ">SIN REGISTROS</OPTION>';
    }
    else {
        var i = 0;
        while (i < data.length) {
            if (i > 0) {
                objeto_activo = data[i];
                var j = 0;
                var opcion = [];
                for (var prop in objeto_activo) {
                    opcion.push(objeto_activo[prop]);
                }
                this.codigos[0] = this.codigos[0] + '<OPTION VALUE = "';
                var k = 0;
                var valor_cadena = '';

// HACEMOS UN CICLO POR LA CANTIDAD DE DATOS CONFIGURADOS EN LA CONSULTA

                while (k < this.configuraciones[6][2][0].length) {

// INSPECCIONAMOS EL CODIFICADO

                    if (this.configuraciones[6][4]==0) {
                        if (this.configuraciones[6][2][0][k]==0) {
                            this.codigos[0] = this.codigos[0]+opcion[this.configuraciones[6][2][1][k]];
                            valor_cadena = valor_cadena+opcion[this.configuraciones[6][2][1][k]];
                        }
                        if (this.configuraciones[6][2][0][k]==1) {
                            this.codigos[0] = this.codigos[0]+this.configuraciones[6][2][1][k];
                            valor_cadena = valor_cadena+this.configuraciones[6][2][1][k];
                        }
                    }
                    else {
                        if (this.configuraciones[6][4]==1) {
                            if (this.configuraciones[6][2][0][k]==0) {
                                var codificación = '/1/'+((opcion[this.configuraciones[6][2][1][k]].length+1000).toString()).substr(1,3)+'/';
                                this.codigos[0] = this.codigos[0]+codificación+opcion[this.configuraciones[6][2][1][k]];
                                valor_cadena = valor_cadena+codificación+opcion[this.configuraciones[6][2][1][k]];
                            }
                            if (this.configuraciones[6][2][0][k]==1) {
                                var codificación = '/1/'+((this.configuraciones[6][2][1][k].length+1000).toString()).substr(1,3)+'/';
                                this.codigos[0] = this.codigos[0]+codificación+this.configuraciones[6][2][1][k];
                                valor_cadena = valor_cadena+codificación+this.configuraciones[6][2][1][k];
                            }
                        }
                    }
                    k++;
                }
                this.codigos[0] =  this.codigos[0]+'"';
                if (valor_cadena==this.valores[1]) {
                    this.codigos[0] =  this.codigos[0]+' SELECTED';
                }
                this.codigos[0] =  this.codigos[0]+'>';
                var k = 0;
                while (k < this.configuraciones[6][3][0].length) {
                    if (this.configuraciones[6][3][0][k]==0) {
                        this.codigos[0] = this.codigos[0]+opcion[this.configuraciones[6][3][1][k]];
                    }
                    if (this.configuraciones[6][3][0][k]==1) {
                        this.codigos[0] = this.codigos[0]+this.configuraciones[6][3][1][k];
                    }
                    k++;
                }
                this.codigos[0] =  this.codigos[0]+'</OPTION>';
            }
            i++;
        }
    }
    this.codigos[0] = this.codigos[0] + '</SELECT>';
    this.configuraciones[10] = 1;
    this.imprimehtml();
    if (this.configuraciones[11]=='') {

    }
    else {
        eval(this.configuraciones[11]);
    }
};	   						
Selecto.prototype.actualizavalor = function() {
    this.valores[1] = document.getElementById(this.etiquetas[1]).value;
    alert('ESTOY EN SELECT ACTUALIZA VALOR, VALOR DESPUES DE ACTUALIZAR: '+this.valores[1]);
    alert('ESTE ES EL VALOR DEL CONTROL HTML: '+document.getElementById(this.etiquetas[1]).value);
};	   						
Selecto.prototype.recibefiltro = function(posicion, valor, valor_todos) {
    var i = 0;
    while (i < posicion.length) {
        this.configuraciones[7][1][posicion[i]] = valor[i];
        i++;
    }
    if (valor_todos == this.valores[2]) {
        this.configuraciones[7][2] = 1;
    } 
    else {
        this.configuraciones[7][2] = 0;
    }
};	   						
Selecto.prototype.borra_area = function() {
	$(this.etiquetas[2]).html('');
};	   						
Selecto.prototype.cambia_area = function() {
};	   						
Selecto.prototype.recorta_filtro = function(recortes) {
//    alert('ESTOY RECORTANDO: VALOR: '+recortes[0][0][0]+' TRATAMIENTO: '+recortes[0][0][1]+' VALOR ALTERNO: '+recortes[0][0][2]);
    var sw_especial = 0;
    var sw_tratamiento = 0;
    var valor_alterno = ' ';
    var cadena_inicio = 0;
    var cadena_final = 0;
    var i = 0;
// VOY A HACER UN CICLO POR CADA VALOR ESPECIAL

    while (i < recortes[0].length) {
        if (recortes[0][i][0]==this.valores[1]) {
            sw_tratamiento = recortes[0][i][1];
            valor_alterno = recortes[0][i][2];
            cadena_inicio = recortes[0][i][3];
            cadena_final = recortes[0][i][4];
            sw_especial = 1;
        }
        i++;
    }
    if (sw_especial == 1) {
        if (sw_tratamiento == 0) {
//            alert('ESPECIAL CON TRATAMIENTO CERO, TIENE QUE REGRESAR EL VALOR PROPIO: '+this.valores[1]);
            return this.valores[1];
        }
        else {
            if (sw_tratamiento == 1) {
//                alert('ESPECIAL CON TRATAMIENTO UNO, TIENE QUE REGRESAR EL VALOR RECORTADO: '+this.valores[1].substr(recortes[1], recortes[2]));
                return this.valores[1].substr(recortes[1], recortes[2]);
            }
            else {
                if (sw_tratamiento == 2) {
//                    alert('ESPECIAL CON TRATAMIENTO DOS, TIENE QUE REGRESAR EL VALOR ALTERNATIVO: '+valor_alterno);
                    return valor_alterno;
                }
                else {
                    if (sw_tratamiento == 3) {
//                        alert('ESPECIAL CON TRATAMIENTO TRES, TIENE QUE REGRESAR EL VALOR ALTERNATIVO RECORTADO: '+valor_alterno.substr(cadena_inicio, cadena_final));
                        return valor_alterno.substr(cadena_inicio, cadena_final);
                    }
                    else {
//                        alert('HAY UN ERROR EN ESPECIAL');
                        return 'ERROR';
                    }
                }
            }
        }
    }
    else {
        if (recortes[3]==0) {
//            alert('NORMAL CON TRATAMIENTO CERO, TIENE QUE REGRESAR EL VALOR PROPIO: '+this.valores[1]);
            return this.valores[1];
        }
        else {
            if (recortes[3]==1) {
//                alert('NORMAL CON TRATAMIENTO UNO, TIENE QUE REGRESAR EL VALOR RECORTADO: '+this.valores[1].substr(recortes[1], recortes[2]));
                return this.valores[1].substr(recortes[1], recortes[2]);
            }
            else {
                if (recortes[3]==2) {
                    var valor_recortado = '';
                    var inicial = 7;
                    var posiciones = 0;
                    var recorte_1 = 3;
                    var recorte_2 = 3;
                    var i = 0;
                    while (i < recortes[1]) {
//                        alert("VUELTA RECORTE: "+i);
                        posiciones = parseInt(this.valores[1].substr(recorte_1, recorte_2));
                        if (recortes[2]==i) {
//                            alert('COINCIDENCIA : '+i+' ESTE ES EL VALOR INICIAL: '+inicial+' ESTAS SON LAS POSICIONES: '+posiciones);
                            var valor_recortado = this.valores[1].substr(inicial, posiciones);
                        }
                        inicial = inicial + (posiciones+7);
                        recorte_1 = recorte_1 + (posiciones+7);
                        i++;
                    }
//                    alert('NORMAL CON TRATAMIENTO DOS, TIENE QUE REGRESAR EL VALOR RECORTADO EN BASE A CODIFICACIÓN: '+valor_recortado);
                    return valor_recortado;
                }
                else {
                    alert('HAY UN ERROR EN NORMAL');
                    return 'ERROR';
                }
            }
        }
    }
};	   						
Selecto.prototype.inicializa_valor = function() {
    this.valores[1] = this.valores[0];
};	   						
Selecto.prototype.seleccion = function(valor) {
//    alert('ESTOY EN SELECCION, ESTE ES EL VALOR: '+valor);
    this.valores[1] = valor;
};	   						
