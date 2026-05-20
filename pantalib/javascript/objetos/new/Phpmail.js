function Phpmail(configuraciones, codigos) {
	this.configuraciones = configuraciones;
	this.codigos = codigos;
}
Phpmail.prototype.ejecuta = function() {
    let DatosFormulario = new FormData();
    var i = 0;
    while(i < this.configuraciones[3].length) {
        etiqueta = "dato_"+i.toString();
        DatosFormulario.append(etiqueta, this.configuraciones[3][i]);
        i++;
    }
    fetch(this.configuraciones[1], {
        method: this.configuraciones[2],
        body: DatosFormulario,
    })
    .then(res => res.json())
    .then(datax => this.generadatos_respuesta(datax))
    .catch(err => this.json_error(err))
};	   						
Phpmail.prototype.generadatos_respuesta = function(datax) {

    this.codigos[0] = datax;
    this.configuraciones[0] = this.codigos[0][0].status;
    var i = 0;
    
    while (i < this.configuraciones[4][1][this.configuraciones[4][0]].length) {
        eval(this.configuraciones[4][1][this.configuraciones[4][0]][i]);
        i++;
    }

};	   						
Phpmail.prototype.json_error = function(err) {
    alert("ERROR: "+err);
    var i = 0;
    while (i < this.configuraciones[4][1][this.configuraciones[4][0]].length) {
        eval(this.configuraciones[4][1][this.configuraciones[4][0]][i]);
        i++;
    }
    this.configuraciones[0] = this.codigos[0][0].status;
    console.log(err);
};	   						
Phpmail.prototype.posicion_callback = function(posicion) {
    this.configuraciones[4][0] = posicion;
};	   						
Phpmail.prototype.recibe_parametro = function(posicion, parametro) {
    this.configuraciones[3][posicion] = parametro;
};	   						
