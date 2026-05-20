function Setestilos(especificaciones, areas) {
	this.especificaciones = especificaciones;
	this.areas = areas;
}

Setestilos.prototype.actualizaset = function(set_color) {
    this.especificaciones[1] = set_color;
};	   						
Setestilos.prototype.inicializaestilo = function() {
    var set_num = this.especificaciones[1];
	alert("estoy en inicializa estilo");
	var areas_pantalla = this.especificaciones[3].objetos.length;
	alert("CANTIDAD DE AREAS EN LA PANTALLA: "+areas_pantalla);
	for (var contador = 0; contador < areas_pantalla; contador++) {
        var cant_caracteristicas = this.areas[set_num-1][3].length;
		for (var contador2 = 0; contador2 < cant_caracteristicas; contador2++) {
            if (this.areas[set_num-1][3][0][contador2]=="backgroundColor") {
				document.getElementById(this.especificaciones[3].objetos[contador].html[]).style.backgroundColor = this.areas[set_num-1][3][1][contador2];
			}
    		if (this.areas[set_num-1][3][0][contador2]=="color") {
				document.getElementById(this.areas[set_num-1][0][contador]).style.color = this.areas[set_num-1][3][1][contador2];
			}
    		if (this.areas[set_num-1][3][0][contador2]=="fontSize") {
				document.getElementById(this.areas[set_num-1][0][contador]).style.fontSize = this.areas[set_num-1][3][1][contador2];
			}
    		if (this.areas[set_num-1][3][0][contador2]=="fontWeight") {
				document.getElementById(this.areas[set_num-1][0][contador]).style.fontWeight = this.areas[set_num-1][3][1][contador2];
			}
		}
	}
};	   						


Setestilos.prototype.imprimehtml = function() {
//	alert("estoy en imprime color, el set de estilos es: "+this.especificaciones[1]);
    var set_num = this.especificaciones[1];
    var cant_areas = this.areas[set_num-1][0].length;
	for (var contador = 0; contador < cant_areas; contador++) {
        var cant_caracteristicas = this.areas[set_num-1][1][contador].length;
        for (var contador2 = 0; contador2 < cant_caracteristicas; contador2++) {
            if (this.areas[set_num-1][1][contador][contador2]=="backgroundColor") {
				document.getElementById(this.areas[set_num-1][0][contador]).style.backgroundColor = this.areas[set_num-1][2][contador][contador2];
			}
    		if (this.areas[set_num-1][1][contador][contador2]=="color") {
				document.getElementById(this.areas[set_num-1][0][contador]).style.color = this.areas[set_num-1][2][contador][contador2];
			}
    		if (this.areas[set_num-1][1][contador][contador2]=="fontSize") {
				document.getElementById(this.areas[set_num-1][0][contador]).style.fontSize = this.areas[set_num-1][2][contador][contador2];
			}
    		if (this.areas[set_num-1][1][contador][contador2]=="fontWeight") {
				document.getElementById(this.areas[set_num-1][0][contador]).style.fontWeight = this.areas[set_num-1][2][contador][contador2];
			}
		}
	}
//    alert("sigo vivo");

};	   						
Setestilos.prototype.traduce = function() {
	alert("estoy en traduce")
};	   						
