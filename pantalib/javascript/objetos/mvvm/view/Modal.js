function Modal(configuraciones, etiquetas, codigos, elementos) {
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


///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////

Modal.prototype.generahtml = function() {
	this.codigos[0] = "<DIALOG CLASS='"+this.etiquetas[0]+"' ID='"+this.etiquetas[1]+"'>";
	this.codigos[0] = this.codigos[0] + "</DIALOG>";
};
Modal.prototype.imprimehtml = function() {
    if (this.configuraciones[2]==0) {
        this.escribehtml();
    }
    else {
        this.agregahtml();
    }
};	   						
Modal.prototype.escribehtml = function() {
	$(this.etiquetas[2]).html(this.codigos[0]);
};	   						
Modal.prototype.agregahtml = function() {
	$(this.etiquetas[2]).append(this.codigos[0]);
};	   						
Modal.prototype.traduce = function(par_idioma) {
    this.configuraciones[0][0] = par_idioma;
};	   						
Modal.prototype.abrefijo = function() {
    document.getElementById(this.etiquetas[1]).showModal();
};	   						
Modal.prototype.abre = function(titulo_modal, mensaje_texto, texto_boton) {
	$(this.etiquetas[3]).html(titulo_modal);
	$(this.etiquetas[4]).html(mensaje_texto);
    document.getElementById(this.configuraciones[3].etiquetas[1]).value = texto_boton;
    document.getElementById(this.etiquetas[1]).showModal();
//    setTimeout(function() {
//        alert("voy a cerrar");
//        this.cierra();
//    }, 3000);
};	   						
Modal.prototype.cierra = function() {
    document.getElementById(this.etiquetas[1]).close();
};	   						
Modal.prototype.espera = function() {
	$(this.etiquetas[3]).html('AVISO');
	$(this.etiquetas[4]).html('ESPERA UN MOMENTO');
    document.getElementById(this.configuraciones[3].etiquetas[1]).value = 'OK';
    document.getElementById(this.etiquetas[1]).showModal();
};	   						
