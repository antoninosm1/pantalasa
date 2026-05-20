function Combolist(configuraciones, etiquetas, valores, metodos, codigos) {
    this.configuraciones = configuraciones;
	this.etiquetas = etiquetas;
	this.valores = valores;
	this.metodos = metodos;
	this.codigos = codigos;
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

Combolist.prototype.generahtml = function() {
// INICIALIZAMOS VARIABLE QUE ESPECIFICA SI EXISTE VALOR CORRECTO
    var sw_valor = 0;
// INICIAMOS METODO PARA GENERAR HTML PRIMERO INICIALIZAMOS EL RESULTADO
// ABRIENDO ETIQUETA DE CONTENEDOR
    this.codigos[0] = '<DIV CLASS="'+this.etiquetas[0]+'" ID="'+this.etiquetas[1]+'">';
// INSPECCIONAMOS SI LLEVA ETIQUETA EN CASO POSITIVO HACEMOS UNA AREA DE ETIQUETA
    if (this.configuraciones[2]==1) {
        this.codigos[0] = this.codigos[0]+'<LABEL ID="'+this.etiquetas[1]+'_ETIQUETA" FOR="'+this.etiquetas[1]+'_BUSCADOR">';
        this.codigos[0] = this.codigos[0]+'</DIV>'+this.configuraciones[0][1][this.configuraciones[0][0]][0];
        this.codigos[0] = this.codigos[0]+'</LABEL>';
    }
// CREAMOS INPUT BUSCADOR
    this.codigos[0] = this.codigos[0]+'<INPUT LIST="'+this.etiquetas[1]+'_LISTA" ID="'+this.etiquetas[1]+'_BUSCADOR"  NAME="'+this.etiquetas[1]+'_BUSCADOR" PLACEHOLDER="'+this.configuraciones[0][1][this.configuraciones[0][0]][1]+'" AUTOCOMPLETE="OFF" '+this.metodos[0]+' VALUE="'+this.valores[2][1]+'">';

// CREAMOS LISTA DE DATOS
    this.codigos[0] = this.codigos[0]+'<DATALIST ID="'+this.etiquetas[1]+'_LISTA">';

    // HACEMOS EL CICLO DE VALORES ESPECIALES UNA RONDA POR CADA VALOR ESPECIAL
    var valores = [];
    var i = 0;
    while (i < this.configuraciones[5].length) {
        
    // HACEMOS EL CICLO DE CADA VALOR DENTRO DE VALORES ESPECIALES UNA RONDA POR CADA ELEMENTO DE
    // VALOR
        
        var arreglovalores = [];
        var ii = 0;
        while (ii < this.configuraciones[5][i][0].length) {
            
            arreglovalores.push(this.configuraciones[5][i][0][ii]);

            ii++;
   
        }
        var valoresElemento = [i, arreglovalores, this.configuraciones[5][i][1]];
        this.configuraciones[4][4].push(valoresElemento);
        this.codigos[0] = this.codigos[0]+'<OPTION VALUE="'+this.configuraciones[5][i][1]+'">';
        // VAMOS A DETERMINAR SI ES ELEMENTO ACTIVO PARA ACTUALIZAR VALOR ACTUAL
        if (this.configuraciones[5][i][1]==this.valores[2][1]) {
            sw_valor = 1;
            this.valores[1] = arreglovalores;
            this.valores[4][1] = 1;
        }
        i++;
    }
    var numElemento = i;
// INICIAMOS PROCESO PARA EXTRAER VALORES DE LA CONSULTA DESDE EL OBJETO    
    
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////

    // CREAMOS UNA VARIABLE QUE CONTENGA EL OBJETO JSON A RECORRER    
    let jsonObject = this.configuraciones[4][0].codigos[0][0];
    // HACEMOS CICLO MAESTRO POR CADA ELEMENTO DEL OBJETO JSON DESDE EL SEGUNDO ELEMENTO (POSICION 1)
    // OMITIMOS LA POSICION CERO PORQUE ES INFORMACION GENERAL DE LA CONSULTA
    var i = 1;
    while (i < jsonObject.length) {
    
//        alert("ESTOY RECORRIENDO CADA ELEMENTO DEL COMBOLIST PARA ENCONTRAR EL VALOR: "+i);
    
        // GENERAMOS UNA VARIABLE currentObject PARA OBTENER EL ELEMENTO EN TURNO 
        let currentObject = jsonObject[i];
        // GENERAMOS UNA VARIABLE currentObject PARA OBTENER EL ELEMENTO EN TURNO 
        let entries = Object.entries(currentObject);

/////////////////////////////////////////////////////////////////
//////////////////// ARREGLO VALORES DE LOS ELEMENTOS 
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////

        // VAMOS A ESTABLECER ARREGLO DE VALORES. CADA ELEMENTO DEL COMBO PUEDE TENER VARIOS
        // VALORES Y CADA VALOR VARIOS ELEMENTOS EN SU CONFIGURACIÓN, EL COMBO MUNICIPIO
        // TIENE 2 VALORES DE 1 ELEMENTO: CLAVE, NOMBRE EL COMBO LOCALIDAD TIENE CUATRO VALORES
        // DE UN ELEMENTO: CLAVE MUNI, NOMBRE MUNI, CLAVE LOCA, NOMBRE LOCA. EL RESULTADO DEBE
        // SER UN ARREGLO QUE CONTIENE TANTOS ELEMENTOS DE CADENA COMO VALORES TENGA LA
        // CONFIGURACIÓN DEL VALOR DEL COMBO. 
        
        //EL PRIMER PASO CONSISTE EN RECORRER POR CADA ELEMENTO DEL COMBO LOS VALORES
        // CONFIGURADOS, LA POSICIÓN SE GUARDA EN ii Y EL RESULTADO EN arregloValores
        let arregloValores = [];
        var ii = 0;
        while (ii < this.configuraciones[4][1].length) {
            let cadenaValor = '';
            var iii = 0;
            // AHORA HACEMOS CICLO POR CADA UNO DE LOS ELEMENTOS DEL VALOR DE LA POSICION 0
            // EN DONDE SE GUARDAN COMO ELEMENTOS DEL ARREGLO LA CONFIGURACIÓN DEL VALOR
            while (iii < this.configuraciones[4][1][ii][0].length) {
                // POR CADA ELEMENTO DE CADA VALOR DE CADA ELEMENTO DEL COMBO INSPECCIONAMOS
                // EL TIPO DE VALOR
                if (this.configuraciones[4][1][ii][0][iii]==0) {
                    cadenaValor = cadenaValor + entries[this.configuraciones[4][1][ii][1][iii]][1]; 
                }
                if (this.configuraciones[4][1][ii][0][iii]==1) {
                    cadenaValor = cadenaValor + this.configuraciones[4][1][ii][1][iii]; 
                }
                iii++;
            }

            arregloValores.push(cadenaValor); 
            ii++;
        }
/////////////////////////////////////////////////////////////////
//////////////////// ARREGLO TEXTO DE LOS ELEMENTOS 
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
        
        // VAMOS A ESTABLECER TEXTO POR CADA ELEMENTO DEL COMBO PARA ESTABLECERLO COMO LLAVE
        // PARA ACCEDER AL VALOR, AL IGUAL QUE EL VALOR UN TEXTO PUEDE TENER VARIOS TEXTOS
        // CONFIGURADOS A SU VEZ CON VARIOS ELEMENTOS
        
        // EL PRIMER PASO CONSISTE EN HACER CICLO POR CADA UNO DE LOS TEXTOS, LA POSICION
        // SE AGURDA EN iiii Y EL RESULTADO EN cadenaTexto 
        let cadenaTexto = '';
        var iiii = 0;
        while (iiii < this.configuraciones[4][2][0].length) {
            // INSPECCIONAMOS EL TIPO DE VALOR
            if (this.configuraciones[4][2][0][iiii]==0) {
                cadenaTexto = cadenaTexto + entries[this.configuraciones[4][2][1][iiii]][1]; 
            }
            if (this.configuraciones[4][2][0][iiii]==1) {
                cadenaTexto = cadenaTexto + this.configuraciones[4][2][1][iiii]; 
            }
            iiii++;
        }

//        alert("ARREGLO DE VALORES: "+arregloValores+" TEXTO DEL ELEMENTO: "+cadenaTexto);



        var valoresElemento = [(i+numElemento), arregloValores, cadenaTexto];
//        alert("ELEMENTO DEL ARREGLO VALORES EN EL COMBO RESULTANTE: "+valoresElemento);
        this.configuraciones[4][4].push(valoresElemento);
        this.codigos[0] = this.codigos[0]+'<OPTION VALUE="'+cadenaTexto+'">';
        // VAMOS A DETERMINAR SI ES ELEMENTO ACTIVO PARA ACTUALIZAR VALOR ACTUAL
        if (cadenaTexto==this.valores[2][1]) {
            sw_valor = 1;
            this.valores[1] = arregloValores;
            this.valores[4][1] = 1;
        }
        i++;
    }
//    alert(this.configuraciones[4][4]);
    // CERRAMOS DATALIST
    this.codigos[0] = this.codigos[0]+'</DATALIST>';
    // TERMINAMOS CERRANDO EL CONTENEDOR
    this.codigos[0] = this.codigos[0]+'</DIV>';
    // INSPECCIONAMOS SI NO HUBO VALOR CORRECTO
    if (sw_valor == 0) {
        this.valores[1] = this.valores[3];
        this.valores[4][1] = 0;
    }
};
Combolist.prototype.imprimehtml = function() {
    if (this.configuraciones[1]==0) {
        this.escribehtml();
    }
    else {
        this.agregahtml();
    }
};	   						
Combolist.prototype.escribehtml = function() {
	$(this.etiquetas[2]).html(this.codigos[0]);
};	   						
Combolist.prototype.agregahtml = function() {
	$(this.etiquetas[2]).append(this.codigos[0]);
};	   						
Combolist.prototype.traduce = function(par_idioma) {
    this.configuraciones[0][0] = par_idioma;
};	   						
Combolist.prototype.inicializa_valor = function() {
// INICIALIZA EL VALOR DEL TEXTO ACTUAL CON EL VALOR DEL TEXTO INICIAL
    this.valores[2][1] = this.valores[2][0];
// INICIALIZA EL VALOR ACTUAL CON EL VALOR INICIAL PRIMERO RECORRE ARREGLO DE VALORES
    var i = 0;
    while (i < this.valores[1].length) {
    // ACTUALIZA EL VALOR ACTUAL CON EL VALOR INICIAL POR CADA VALOR ENCONTRADO
        this.valores[1][i] = this.valores[0][i]; 
        i++;

    }
    this.valores[4][1] = this.valores[4][0]; 
    /*
// FINALMENTE CORREGIMOS EL VALOR DEL INPUT EN HTML
    document.getElementById(this.etiquetas[1]+'_BUSCADOR').value = this.valores[2][0];         
*/
};	   						
Combolist.prototype.inicializa_status = function() {
    this.valores[4][1] = this.valores[4][0];
};	   						
Combolist.prototype.elige_valor = function() {
    var sw_valor = 0;
    this.valores[2][1] = document.getElementById(this.etiquetas[1]+'_BUSCADOR').value;
//    alert("ESTE ES EL TEXTO ELEGIDO PARA BUSCAR VALOR: "+this.valores[2][1]);
// VAMOS A RECORRER EL ARREGLO DE ELEMENTOS DEL ARREGLO VALORES QUE CONTIENE EL SIGUIENTE
// FORMATO POR CADA ELEMENTO: [0, [arreglo de valores], "texto"] CORRESPONDE A LA POSICIÓN
// configuraciones[4][4] SE CORRESPONDE CON LA POSICION i 
    var i = 0;
    while (i < this.configuraciones[4][4].length) {
        
        // INSPECCIONAMOS SI LA POSICION 2 "texto" DEL FORMATO DE CADA ELEMENTO i ES IGUAL AL
        // TEXTO ELEGIDO PARA ENCONTRAR VALOR 
        
        if (this.configuraciones[4][4][i][2]==this.valores[2][1]) {
            
//            alert("ENCONTRAMOS UNA COINCIDENCIA DE TEXTO PARA ACTUALIZAR VALOR, EL TEXTO ES: "+this.configuraciones[4][4][i][2]);
            sw_valor = 1;
            this.valores[4][1] = 1;
            arreglovalores = [];
            var ii = 0;
            while (ii < this.configuraciones[4][4][i][1].length) {
                arreglovalores.push(this.configuraciones[4][4][i][1][ii]); 
                ii++;
            }
            this.valores[1] = arreglovalores;
            i = this.configuraciones[4][4].length;
//            alert("ESTE DEBE SER EL VALOR ACTUALIZADO: "+this.valores[1]);
        }
        i++;
    }
    // INSPECCIONAMOS SI NO HUBO VALOR CORRECTO
    if (sw_valor == 0) {
        this.valores[1] = this.valores[3];
        this.valores[4][1] = 0;
    }
};	   						
Combolist.prototype.recibe_datos = function(datos) {
    this.configuraciones[4][0] = datos;
};	   						
Combolist.prototype.recibe_texto = function(texto) {
    this.valores[2][1] = texto;
};	   						
        