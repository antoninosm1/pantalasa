function Json(configuraciones, codigos, elementos) {
	this.configuraciones = configuraciones;
	this.codigos = codigos;
	this.elementos = elementos;
}
Json.prototype.genera = function() {

//    alert('ESTA ES LA ENTRADA DE TIPO '+this.configuraciones[1]+': '+JSON.stringify(this.codigos[1]));
    
    
    var json_cadena = '{';
    var i = 0;
    while (i < this.configuraciones[0]) {
        if (i > 0) {
            json_cadena = json_cadena + ', ';
        }
        json_cadena = json_cadena + '"dato_'+i+'" : "';

        if (this.elementos[0][i][0]==0) {
            json_cadena = json_cadena + this.elementos[0][i][1];
        }
        if (this.elementos[0][i][0]==1) {
            json_cadena = json_cadena + eval('this.codigos[1][0][0].'+this.elementos[0][i][1]);
        }
        if (this.elementos[0][i][0]==2) {
            json_cadena = json_cadena + eval('this.codigos[1][0][1].'+this.elementos[0][i][1]);
        }
            
        json_cadena = json_cadena + '"';
        i++;
    }
    json_cadena = json_cadena + '}';
    
    this.codigos[0] = JSON.parse(json_cadena);
};	   						

Json.prototype.recibe_json = function(json_fuente) {
    this.codigos[1] = json_fuente;
};	   						
    
Json.prototype.cambia_valor = function(arreglo) {

//    alert("ESTOY EN CAMBIA VALOR: "+arreglo[1]);

    eval('this.codigos[0].'+arreglo[0]+' = "'+arreglo[1]+'"');

};	   						
    
Json.prototype.cambia_tipo_fuente = function(tipo_fuente) {
    this.configuraciones[1] = tipo_fuente;
};	   						
    
