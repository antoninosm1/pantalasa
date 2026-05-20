function Datos(configuraciones, codigos, elementos) {
	this.configuraciones = configuraciones;
	this.codigos = codigos;
	this.elementos = elementos;
}
Datos.prototype.imprimehtml = function(datos) {
//	if (this.configuraciones[0]==0) {
//        this.escribehtml(datos);
//    }
//    else {
//        this.agregahtml(datos);
//    }
};	   						
Datos.prototype.escribehtml = function(datos) {
//	$(this.etiquetas[0]).html(datos[1].cedula_conteo);
};	   						
Datos.prototype.agregahtml = function(datos) {
//	$(this.etiquetas[0]).append(datos[1].cedula_conteo);
};	   						
Datos.prototype.imprime = function(datos) {
	this.codigos[0] = datos;
    var i = 0;
    while (i < this.configuraciones[0]) {

    //    alert("ESTA ES LA POSICIÓN: "+i+" ESTE ES EL ELEMENTO HTML: "+this.elementos[0][i]+" "+this.codigos[0][i][1].dato_j);


		$(this.elementos[0][i]).html('<SPAN CLASS="'+this.elementos[5][i]+'" ID="'+this.elementos[6][i]+'_'+i+'" '+this.elementos[4][i]+'>'+this.codigos[0][i][1].dato_j+'</SPAN>');
        i++;
    }
};	   						
Datos.prototype.imprime_directo = function() {
    var i = 0;
    while (i < this.configuraciones[0]) {
		$(this.elementos[0][i]).html('<SPAN CLASS="'+this.elementos[5][i]+'" ID="'+this.elementos[6][i]+'_'+i+'" '+this.elementos[4][i]+'>'+this.elementos[2][i]+'</SPAN>');
        i++;
    }
};	   						
Datos.prototype.imprime_inicial = function() {
    // METODO PARA IMPRIMIR VALORES INICIALES DEPENDIENDO DE UNA CONFIGURACIÓN
    var i = 0;
    while (i < this.configuraciones[0]) {
        this.imprime_especifico(i, 0);
        i++;
    }
};	   						
Datos.prototype.imprime_natural = function(datos) {
// METODO PARA IMPRIMIR VALORES DEPENDIENDO DE UNA CONFIGURACIÓN
	this.codigos[0] = datos;
    var i = 0;
    while (i < this.configuraciones[0]) {
        this.imprime_especifico(i, 1);
        i++;
    }
};	   						
Datos.prototype.imprime_especifico = function(posicion, tipo) {


    if (tipo==0) {
        var valorCadenaPre = this.elementos[2][posicion];
    }
    else {
        if (tipo==1) {
            var valorCadenaPre = eval('this.codigos[0].dato_'+posicion);
        }
    }

//    alert("POSICION: "+posicion+" VALOR: "+valorCadenaPre);

    var metodos = this.elementos[4][posicion];
    if (this.elementos[3][0][posicion]==0) {
    // TIPO 0 DIRECTO, IMPRIME DIRECTAMENTE LO QUE TRAIGA EN EL VALOR IMPRIME METODOS EN EL SPAN            
        var valorCadena = valorCadenaPre;
    }
    if (this.elementos[3][0][posicion]==1) {
    // TIPO 1 ARREGLO, RECORRE UN ARREGLO DE ARREGLOS CADA UNO CON DOS POSICIONES EN LA PRIMERA
    // POSICION HAY UN VALOR QUE SERA COMPARADO CON EL DATO DE SER IGUALES SE IMPRIMIRA LA CADENA
    // DE LA SEGUNDA POSICIÓN IMPRIME METODOS EN EL SPAN           
        var it = 0;
        while (it < this.elementos[3][1][posicion].length) {
            if (this.elementos[3][1][posicion][it][0] == valorCadenaPre) {
                var valorCadena = this.elementos[3][1][posicion][it][1];
            }
            it++;
        }
    }
    if (this.elementos[3][0][posicion]==2) {
    // TIPO 2 INPUT DE TEXTO, IMPRIME EL VALOR DENTRO DE UN INPUT IMPRIME METODOS AQUÍ            
        var valorCadena = '<INPUT TYPE="text" CLASS="'+this.elementos[5][posicion]+'_input_text" ID="'+this.elementos[6][posicion]+'_'+posicion+'_INPUT_TEXT" VALUE="'+valorCadenaPre+'" '+metodos+'>';
        var metodos = '';
    }
    if (this.elementos[3][0][posicion]==3) {
    // TIPO 3 INPUT DE NUMERO, IMPRIME EL VALOR DENTRO DE UN INPUT IMPRIME METODOS AQUÍ            
        var valorCadena = '<INPUT TYPE="number" CLASS="'+this.elementos[5][posicion]+'_input_num" ID="'+this.elementos[6][posicion]+'_'+posicion+'_INPUT_NUM" VALUE="'+valorCadenaPre+'" '+metodos+'>';
        var metodos = '';
    }
    if (this.elementos[3][0][posicion]==4) {
    // TIPO 4 VALOR CON CADENA OPCIONAL, INSPECCIONA UN PARAMETRO = 0 IMPRIME CADENA MAS VALOR
    // =  OTRA OPCIÓN IMPRIME VALOR MAS CADENA IMPRIME METODOS EN EL SPAN            
        if (this.elementos[3][1][posicion][0]==0) {
            var valorCadena = this.elementos[3][1][posicion][1] + valorCadenaPre; 
        }
        else {
            var valorCadena = valorCadenaPre + this.elementos[3][1][posicion][1]; 
        }
    }
    if (this.elementos[3][0][posicion]==5) {
    // TIPO 5 CHECKBOX, INSPECCIONA VALOR = 1 IMPRIME CHECKBOX CHECADO = OTRA  OPCION
    // IMPRIME CHECKBOX SIN CHEKAR IMPRIME METODOS AQUÍ            
        if (valorCadenaPre==1) {
            var valorCadena = '<INPUT TYPE="checkbox" CLASS="'+this.elementos[5][posicion]+'_input_checkbox" ID="'+this.elementos[6][posicion]+'_'+posicion+'_INPUT_CHECKBOX" '+metodos+' CHECKED>';
        }
        else {
            var valorCadena = '<INPUT TYPE="checkbox" CLASS="'+this.elementos[5][posicion]+'_input_checkbox" ID="'+this.elementos[6][posicion]+'_'+posicion+'_INPUT_CHECKBOX" '+metodos+'>';
        }
        var metodos = '';
    }
    if (this.elementos[3][0][posicion]==6) {
    // TIPO 6 TEXTAREA, IMPRIME VALOR EN UN AREA DE TEXTO IMPRIME METODOS AQUÍ            
        var valorCadena = '<TEXTAREA CLASS="'+this.elementos[5][posicion]+'_textarea" ID="'+this.elementos[6][posicion]+'_'+posicion+'_TEXTAREA" '+metodos+'>'+valorCadenaPre+'</TEXTAREA>';
        var metodos = '';
    }
    if (this.elementos[3][0][posicion]==7) {
    // TIPO 7 DATE, IMPRIME VALOR DE FECHA TOMANDO VALOR "YYYY-MM-DD"            
        var valorCadena = '<INPUT TYPE="DATE" CLASS="'+this.elementos[5][posicion]+'_input_date" ID="'+this.elementos[6][posicion]+'_'+posicion+'_INPUT_DATE" VALUE="'+valorCadenaPre+'" '+metodos+'>';
        var metodos = '';
    }
    if (this.elementos[3][0][posicion]==8) {
        // TIPO 8 OPTION GROUP, RECORRE UN ARREGLO DE PARAMETROS PARA GENERAR OPTIONS
        // DENTRO DE UN MISMO OPTION GROUP CHECANDO LA OPCION QUE CONTENGA ALGUN
        // ELEMENTO DENTRO DE UN ARREGLO IGUAL AL VALOR IMPRIME METODOS AQUÍ           
        var valorCadena = '<FIELDSET CLASS="'+this.elementos[5][posicion]+'_radio" ID="'+this.elementos[6][posicion]+'_'+posicion+'_RADIO" '+metodos+'>';
        var it = 0;
        while (it < this.elementos[3][1][posicion].length) {
            valorCadena = valorCadena + '<LABEL><INPUT TYPE="RADIO" NAME="'+this.elementos[6][posicion]+'_'+posicion+'_RADIO_OPCION" VALUE="'+this.elementos[3][1][posicion][it][1]+'"';
            var itt = 0;
            while (itt < this.elementos[3][1][posicion][it][0].length) {
                if (this.elementos[3][1][posicion][it][3]==1) {
                    if (this.elementos[3][1][posicion][it][0][itt].toUpperCase()==valorCadenaPre.toUpperCase()) {
                        valorCadena = valorCadena + ' CHECKED';
                    }
                }
                else {
                    if (this.elementos[3][1][posicion][it][0][itt]==valorCadenaPre) {
                        valorCadena = valorCadena + ' CHECKED';
                    }
                }
                itt++;
            }
            valorCadena = valorCadena+'>'+this.elementos[3][1][posicion][it][2]+'</LABEL>';
            it++;
        }
        valorCadena = valorCadena + '</FIELDSET>';
        var metodos = '';
    }
    if (this.elementos[3][0][posicion]==9) {
        // TIPO 9 SELECT, RECORRE UN ARREGLO DE PARAMETROS PARA GENERAR OPTIONS
        // DENTRO DE UN MISMO SELECT SELECCIONADO LA OPCION QUE CONTENGA ALGUN
        // ELEMENTO DENTRO DE UN ARREGLO IGUAL AL VALOR, IMPRIME METODOS AQUÍ           
        var valorCadena = '<SELECT CLASS="'+this.elementos[5][posicion]+'_select" ID="'+this.elementos[6][posicion]+'_'+posicion+'_SELECT" '+metodos+'>';
        var it = 0;
        while (it < this.elementos[3][1][posicion].length) {
            valorCadena = valorCadena + '<OPTION CLASS="'+this.elementos[5][posicion]+'_select_option" ID="'+this.elementos[6][posicion]+'_'+posicion+'_SELECT_OPTION" VALUE="'+this.elementos[3][1][posicion][it][1]+'"';
            var itt = 0;
            while (itt < this.elementos[3][1][posicion][it][0].length) {

                if (this.elementos[3][1][posicion][it][3]==1) {
                    if (this.elementos[3][1][posicion][it][0][itt].toUpperCase()==valorCadenaPre.toUpperCase()) {
                        valorCadena = valorCadena + ' SELECTED';
                    }
                }
                else {
                    if (this.elementos[3][1][posicion][it][0][itt]==valorCadenaPre) {
                        valorCadena = valorCadena + ' SELECTED';
                    }
                }
                itt++;
            }
            valorCadena = valorCadena+'>'+this.elementos[3][1][posicion][it][2];
            valorCadena = valorCadena + '</OPTION>';
            it++;
        }
        valorCadena = valorCadena + '</SELECT>';
        var metodos = '';
    }
    
    
    
    
    $(this.elementos[0][posicion]).html('<SPAN CLASS="'+this.elementos[5][posicion]+'" ID="'+this.elementos[6][posicion]+'_'+posicion+'" '+metodos+'>'+valorCadena+'</SPAN>');
};	   						
Datos.prototype.extrae_radio = function(etiqueta) {
    arreglo_radios = document.getElementsByName(etiqueta);
    var xix = 0;
    while (xix < arreglo_radios.length) {
        if (arreglo_radios[xix].checked) {
            return arreglo_radios[xix].value;
        }
        xix++;
    }

};	   						
Datos.prototype.consulta_natural = function(posicion_inicial, consulta) {
    var i = 0;
    while (i < this.configuraciones[0]) {
        this.imprime_consulta(i, posicion_inicial, consulta);
        i++;
    }
};	   						
Datos.prototype.recibe_json = function(json) {
    this.codigos[0] = json;
};	   						
Datos.prototype.imprime_consulta = function(posicion, posicion_inicial, consulta) {

    if (this.elementos[3][0][posicion]==0) {
        // TIPO 0 DIRECTO, EXTRAE EL TEXTO DEL SPAN            
        var elemento = document.getElementById(this.elementos[6][posicion]+'_'+posicion);
        consulta.actualizafiltro((posicion+posicion_inicial), elemento.textContent);
    }
    if (this.elementos[3][0][posicion]==1) {
        // TIPO 1 ARREGLO, EXTRAE EL TEXTO DEL SPAN           
        var elemento = document.getElementById(this.elementos[6][posicion]+'_'+posicion);
        consulta.actualizafiltro((posicion+posicion_inicial), elemento.textContent);
    }
    if (this.elementos[3][0][posicion]==2) {
        // TIPO 2 INPUT DE TEXTO, EXTRAE EL VALOR DEL INPUT            
        consulta.actualizafiltro((posicion+posicion_inicial), document.getElementById(this.elementos[6][posicion]+'_'+posicion+'_INPUT_TEXT').value);
    }
    if (this.elementos[3][0][posicion]==3) {
        // TIPO 3 INPUT DE NÚMERO, EXTRAE EL VALOR DEL INPUT            
        consulta.actualizafiltro((posicion+posicion_inicial), document.getElementById(this.elementos[6][posicion]+'_'+posicion+'_INPUT_NUM').value);
    }
    if (this.elementos[3][0][posicion]==4) {
        // TIPO 4 VALOR CON CADENA OPCIONAL, EXTRAE EL TEXTO DEL SPAN            
        var elemento = document.getElementById(this.elementos[6][posicion]+'_'+posicion);
        consulta.actualizafiltro((posicion+posicion_inicial), elemento.textContent);
    }
    if (this.elementos[3][0][posicion]==5) {
        // TIPO 5 CHECKBOX, INSPECCIONA CHECKBOX Y REGRESA 1 O 0
        var checkbox = document.getElementById(this.elementos[6][posicion]+'_'+posicion+'_INPUT_CHECKBOX');
        var dato = checkbox.checked ? 1 : 0;
        consulta.actualizafiltro((posicion+posicion_inicial), dato);
    }
    if (this.elementos[3][0][posicion]==6) {
        // TIPO 6 TEXTAREA, EXTRAE VALOR DEL TEXTAREA            
        consulta.actualizafiltro((posicion+posicion_inicial), document.getElementById(this.elementos[6][posicion]+'_'+posicion+'_TEXTAREA').value);
    }
    if (this.elementos[3][0][posicion]==7) {
        // TIPO 7 DATE, EXTRAE VALOR DE DATE TOMANDO VALOR "YYYY-MM-DD"            
        consulta.actualizafiltro((posicion+posicion_inicial), document.getElementById(this.elementos[6][posicion]+'_'+posicion+'_INPUT_DATE').value);
    }
    if (this.elementos[3][0][posicion]==8) {
        // TIPO 8 OPTION GROUP,ETRAE VALOR DE UN METODO QUE RECORRE EL OPTIONGROUP
        consulta.actualizafiltro((posicion+posicion_inicial), this.extrae_radio(this.elementos[6][posicion]+'_'+posicion+'_RADIO_OPCION'));
    }
    if (this.elementos[3][0][posicion]==9) {
        // TIPO 9 SELECT, EXTAE VALOR DEL SELECT
        consulta.actualizafiltro((posicion+posicion_inicial), document.getElementById(this.elementos[6][posicion]+'_'+posicion+'_SELECT').value);
    }
};	   						
        
