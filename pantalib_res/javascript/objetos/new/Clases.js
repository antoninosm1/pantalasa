function Clases(configuraciones, elementos) {
	this.configuraciones = configuraciones;
	this.elementos = elementos;
}
Clases.prototype.afectar = function() {
    var i = 0;
    while (i < this.elementos[0].length) {
        const elementosConClaseBase = document.querySelectorAll('.'+this.elementos[0][i]);
        elementosConClaseBase.forEach(elemento => {
            var ii = 0;
            while (ii < this.elementos[1][i].length) {
//                alert('ESTA ES LA CLASE AFECTADORA: '+this.elementos[1][i][ii]);
                if (elemento.classList.contains(this.elementos[1][i][ii])) {
                    if (this.elementos[2][i][ii] == 0) {
                        elemento.classList.remove(this.elementos[1][i][ii]);
                    }
                }
                if (!elemento.classList.contains(this.elementos[1][i][ii])) {
                    if (this.elementos[2][i][ii] == 1) {
                        elemento.classList.add(this.elementos[1][i][ii]);
                    }
                }
                ii++;
            }
        });
        i++;
    }

};	   						
Clases.prototype.poner = function() {
    var i = 0;
    while (i < this.configuraciones[0]) {
        var elementosClase = document.querySelectorAll('.' + this.elementos[0][i]);
        elementosClase.forEach(function(elemento) {
            var ii = 0;
            while (ii < this.elementos[1][i].length) {
                if (elemento.classList.contains(this.elementos[1][i][ii])) {
                    if (this.elementos[2][i][ii]==0) {
                        elemento.classList.add(this.elementos[1][i][ii]);
                    }
                }
                else {
                    if (this.elementos[2][i][ii]==1) {
                        elemento.classList.remove(this.elementos[1][i][ii]);
                    }
                }
                ii++;
            }
        });
        i++;
    }

};	   						
    