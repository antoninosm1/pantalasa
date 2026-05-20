function Setestilos2(especificaciones, valores, areas) {
	this.especificaciones = especificaciones;
	this.valores = valores;
	this.areas = areas;
}
Setestilos2.prototype.actualizaset = function(set_num) {
	this.valores[1] = set_num;
};	   						
Setestilos2.prototype.imprimehtml = function() {
	var estilos_num = this.especificaciones[1];
	for (var contador = 0; contador < estilos_num; contador++) {
		var cant_areas = this.areas[contador][0].length;
		for (var contador2 = 0; contador2 < cant_areas; contador2++) {
			var cant_clases = this.areas[contador][1][contador2].length;
			for (var contador3 = 0; contador3 < cant_clases; contador3++) {
				if ((contador+1)==this.valores[1]) {
					document.getElementById(this.areas[contador][0][contador2]).classList.add(this.areas[contador][1][contador2][contador3]);
				}
				else {
					document.getElementById(this.areas[contador][0][contador2]).classList.remove(this.areas[contador][1][contador2][contador3]);
				}
			}
		}
	}
};	   						
Setestilos2.prototype.generahtml = function() {
};	   						
Setestilos2.prototype.traduce = function() {
	alert("estoy en traduce")
};	   						
