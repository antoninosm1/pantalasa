function Setcolor(especificaciones, areas) {
	this.especificaciones = especificaciones;
	this.areas = areas;
}

Setcolor.prototype.actualizaset = function(set_color) {
    this.especificaciones[1] = set_color;
};	   						

Setcolor.prototype.imprimehtml = function() {
	alert("estoy en imprime color");
	for (var contador = 0; contador < this.areas[this.especificaciones[1]-1][0].length; contador++) {
		for (var contador2 = 0; contador2 < this.areas[this.especificaciones[1]-1][1].length; contador2++) {
			if (this.areas[this.especificaciones[1]-1][1][contador]=="color") {
				document.getElementById(this.areas[this.especificaciones[1]-1][0][contador]).style.color = this.areas[this.especificaciones[1]-1][2][contador];
			}
			if (this.areas[this.especificaciones[1]-1][1][contador]=="backgroundColor") {
				document.getElementById(this.areas[this.especificaciones[1]-1][0][contador]).style.backgroundColor = this.areas[this.especificaciones[1]-1][2][contador];
			}
		}
	}

};	   						
Setcolor.prototype.traduce = function() {
	alert("estoy en traduce")
};	   						
