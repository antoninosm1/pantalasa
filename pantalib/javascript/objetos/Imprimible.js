function Imprimible(elementos) {
	this.elementos = elementos;
}
Imprimible.prototype.imprimir = function() {
    for (var contador = 0; contador < this.elementos.length; contador++) {
        if (this.elementos[contador].folioFactura) {
            alert(this.elementos[contador].folioFactura+" "+this.elementos[contador].documento.id+" "+this.elementos[contador].documento.objeto.html[3]);
        }
        if (this.elementos[contador].folio) {
            alert(this.elementos[contador].folio+" "+this.elementos[contador].documento.id+" "+this.elementos[contador].documento.objeto.areas);
        }
    }
};	   						

