function Arreglo(configuraciones, elementos, codigos) {
	this.configuraciones = configuraciones;
	this.elementos = elementos;
	this.codigos = codigos;
}
Arreglo.prototype.generar = function(numeroElementos, configuracion) {
    this.configuraciones[0] = numeroElementos;
    this.codigos[0] = [];
// INICIAMOS CICLO MAESTRO POR CADA ELEMENTO    
    var i = 0;
    while (i < this.configuraciones[0]) {
// INICIAMOS CICLO MAESTRO POR CADA ELEMENTO    
        var ii = 0;
        while (ii < configuracion[0].length) {
            if (configuracion[0][ii]==0) {
                this.codigos[0].push(configuracion[1][ii]);
            }
            ii++;
        }
        i++;
    }
};	   						
