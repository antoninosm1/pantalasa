function Consulta(configuraciones, codigos, elementos) {
	this.configuraciones = configuraciones;
	this.codigos = codigos;
	this.elementos = elementos;
}
Consulta.prototype.ejecuta = function() {
//    alert('ESTOY EN CONSULTA EJECUTA');
    let DatosFormulario = new FormData();
    var i = 0;
    while(i < this.configuraciones[3].length) {
        etiqueta = "dato_"+i.toString();
//        alert(' ESTA ES LA ETIQUETA DE PARAMETRO: '+etiqueta+' ESTE ES EL VALOR: '+this.configuraciones[3][i]);
        DatosFormulario.append(etiqueta, this.configuraciones[3][i]);
        i++;
    }
//    alert('ESTE ES EL FETCH: '+this.configuraciones[1]);
    fetch(this.configuraciones[1], {
        method: this.configuraciones[2],
        body: DatosFormulario,
    })
    .then(res => res.json())
    .then(datax => this.generadatos_consulta(datax))
    .catch(err => this.json_error(err))
};	   						
Consulta.prototype.generadatos_consulta = function(datax) {
    this.codigos[0] = datax;
    this.configuraciones[0] = 1;

    var i = 0;
    
    while (i < this.configuraciones[4][1][this.configuraciones[4][0]].length) {
        eval(this.configuraciones[4][1][this.configuraciones[4][0]][i]);
        i++;
    }

};	   						
Consulta.prototype.recibefiltro = function(valores) {
//    alert('Recibo filtro en tres posiciones para consulta: '+valores[0]+' '+valores[1]+' '+valores[2]);
    var i = 0;
    while (i < valores.length) {
        this.configuraciones[3][i] = valores[i];
        i++;
    }
};	   						
Consulta.prototype.actualizafiltro = function(lugar, valor) {
//    alert('ESTOY EN ACTUALIZA FILTRO. LUGAR: '+lugar+' VALOR: '+valor);
//    alert('ESTOY EN ACTUALIZA FILTRO DE LA CONSULTA');
//    alert("ESTOY EN ACTUALIZA FILTRO, ESTE ES EL LUGAR: "+lugar+" ESTE ES EL VALOR: "+valor);
    this.configuraciones[3][lugar] = valor;
};	   						
Consulta.prototype.muestra_filtro = function() {
    var i = 0;
    while(i < this.configuraciones[3].length) {
        i++;
    }
};	   						

//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////

Consulta.prototype.ejecuta_2 = function() {

    let DatosFormulario = new FormData();
    var i = 0;
    while(i < this.configuraciones[3].length) {
        etiqueta = "dato_"+i.toString();
//        alert(' ESTA ES LA ETIQUETA DE PARAMETRO: '+etiqueta+' ESTE ES EL VALOR: '+this.configuraciones[3][i]);
        DatosFormulario.append(etiqueta, this.configuraciones[3][i]);
        i++;
    }
    etiqueta = "dato_"+i.toString();
    DatosFormulario.append(etiqueta, this.configuraciones[5][0]);
    i++;
    etiqueta = "dato_"+i.toString();
    DatosFormulario.append(etiqueta, this.configuraciones[5][1]);
    i++;
    etiqueta = "dato_"+i.toString();
    DatosFormulario.append(etiqueta, this.configuraciones[5][2]);
    i++;
    etiqueta = "dato_"+i.toString();
    DatosFormulario.append(etiqueta, this.configuraciones[5][3]);
//    alert('ESTE ES EL FETCH: '+this.configuraciones[1]);
    fetch(this.configuraciones[1], {
        method: this.configuraciones[2],
        body: DatosFormulario,
    })
    .then(res => res.json())
    .then(datax => this.generadatos_consulta_2(datax))
    .catch(err => this.json_error(err))
};	   						

//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////

Consulta.prototype.generadatos_consulta_2 = function(datax) {
    
    if (datax[0][0].final==0) {
        var objetos_a_incluir = datax[0].slice(1); // [desde el segundo objeto hasta el final]
        this.codigos[1] = this.codigos[1] + ', ' + JSON.stringify(objetos_a_incluir).slice(1, -1);
//        alert('CONSULTA PARCIAL VAMOS A OTRA CONSULTA');
        this.configuraciones[5][0] = this.configuraciones[5][0] + this.configuraciones[5][1];
        this.configuraciones[5][2] = 1;
        this.configuraciones[5][3] = this.configuraciones[5][3] + this.configuraciones[5][1];
        this.ejecuta_2();
// Seleccionamos los elementos desde el segundo objeto en adelante
    }
    else {
        if (datax[0][0].registros > 0) {
            var objetos_a_incluir = datax[0].slice(1); // [desde el segundo objeto hasta el final]
            this.codigos[1] = this.codigos[1] + ', ' + JSON.stringify(objetos_a_incluir).slice(1, -1);
            this.configuraciones[5][0] = 0;
            this.configuraciones[5][2] = 0;
            this.codigos[0] = JSON.parse('[[{"registros" : '+datax[0][0].registros+'}'+this.codigos[1]+']]');
        
        }
        else {
            this.configuraciones[5][0] = 0;
            this.configuraciones[5][2] = 0;
            this.codigos[0] = JSON.parse('[[{"registros" : "0"}]]');
        }

        var i = 0;
        while (i < this.configuraciones[4][1][this.configuraciones[4][0]].length) {
            eval(this.configuraciones[4][1][this.configuraciones[4][0]][i]);
            i++;
        }
    
    }
};	   						

Consulta.prototype.json_error = function(err) {

    var i = 0;
    while (i < this.configuraciones[4][1][this.configuraciones[4][0]].length) {
        eval(this.configuraciones[4][1][this.configuraciones[4][0]][i]);
        i++;
    }

    this.configuraciones[0] = 0;
//    alert('NO SE COMPLETÓ EL PROCESO HUBO UN ERROR: '+err);
    console.log(err);
};	   						
Consulta.prototype.limpia_codigos = function() {
    this.codigos = ['', ''];
};	   						
Consulta.prototype.posicion_callback = function(posicion) {
    this.configuraciones[4][0] = posicion;
};	   						
Consulta.prototype.inicializa_parametros = function() {
    this.codigos = ['', ''];
    this.configuraciones[5][0] = 0;
    this.configuraciones[5][2] = 0;
    this.configuraciones[5][3] = 0;
};	   						
