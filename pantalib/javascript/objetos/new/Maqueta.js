function Maqueta(configuraciones, etiquetas, codigos, elementos) {
	this.configuraciones = configuraciones;
	this.etiquetas = etiquetas;
	this.codigos = codigos;
	this.elementos = elementos;
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////// ESTRUCTURA 
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////

// configuraciones                       : arreglo con las configuraciones de esta clase
//      configuraciones[0]               : arreglo con las configuraciones del idioma
//          configuraciones[0][0]        : numero del idioma activo en este objeto         
//          configuraciones[0][1]        : arreglo con los idiomas disponibles          
//          configuraciones[0][1][0 ...] : un arreglo con las cadenas de texto por cada idioma disponible          
//      configuraciones[1]               : número de areas que dependen del area HTML principal de este objeto
//      configuraciones[2]               : tipo de impresión html 0 = sustituye contenido 1 = agrega contenido
//      configuraciones[3]               : sentido de la impresión HTML 0 = progresiva 1 = regresiva
// etiquetas                             : arreglo con clase, id y elemento donde se inserta este objeto HTML
//      etiquetas[0]                     : clase del codigo HTML de este objeto
//      etiquetas[1]                     : id del codigo HTML de este objeto
//      etiquetas[2]                     : elemento HTML en donde se inserta el codigo HTML de este objeto
// codigos                               : arreglo con los codigos generados por los metodos de este objeto
//      codigos[0]                       : codigo HTML generado por el metodo generahtml() de este objeto
// elementos                             : arreglo con las areas que dependen del area HTML principal de este objeto
//      elementos[0]                     : arreglo con las clases de las areas HTML internas de este objeto
//      elementos[0][0 ...]              : clases de HTML por cada area interna de este objeto
//      elementos[1]                     : arreglo con las id de las areas HTML internas de este objeto
//      elementos[1][0 ...]              : id´s de HTML por cada area interna de este objeto

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////

Maqueta.prototype.generahtml = function() {
	this.codigos[0] = "<DIV CLASS='"+this.etiquetas[0]+"' ID='"+this.etiquetas[1]+"'>";
    if (this.configuraciones[1] > 0) {
        var i = 0;
        while(i < this.configuraciones[1]) {
            if (this.configuraciones[3]==0) {
                var vuelta = i;
            }
            else {
                var vuelta = (this.configuraciones[1]-(i+1));
            }
            this.codigos[0] = this.codigos[0] + "<DIV CLASS='"+this.elementos[0][vuelta]+"' ID='"+this.elementos[1][vuelta]+"'>";
            this.codigos[0] = this.codigos[0] + this.configuraciones[0][1][this.configuraciones[0][0]][vuelta];
            this.codigos[0] = this.codigos[0] + "</DIV>";	
            i++;
        }
    }
	this.codigos[0] = this.codigos[0] + "</DIV>";
};
Maqueta.prototype.imprimehtml = function() {
    if (this.configuraciones[2]==0) {
        this.escribehtml();
    }
    else {
        this.agregahtml();
    }
};	   						
Maqueta.prototype.escribehtml = function() {
	$(this.etiquetas[2]).html(this.codigos[0]);
};	   						
Maqueta.prototype.agregahtml = function() {
	$(this.etiquetas[2]).append(this.codigos[0]);
};	   						
Maqueta.prototype.traduce = function(par_idioma) {
    this.configuraciones[0][0] = par_idioma;
};	   						
Maqueta.prototype.contenido = function(contenido) {
    this.configuraciones[0][1][this.configuraciones[0][0]][contenido[0]] = contenido[1];
};	   						
