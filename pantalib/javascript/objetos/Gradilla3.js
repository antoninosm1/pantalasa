function Gradilla3(configuraciones, elementos, vinculos, codigos) {
	this.configuraciones = configuraciones;
	this.elementos = elementos;
	this.vinculos = vinculos;
	this.codigos = codigos;
}
	
Gradilla3.prototype.generahtml = function() {
    this.codigos[0] = "<DIV CLASS="+this.vinculos[0]+" ID="+this.vinculos[1]+">";
    var nivel_objetos = 1;    
    while(nivel_objetos > 0) {

        for (var contador = 0; contador < this.elementos.length; contador++) {

            if (this.configuraciones[1]==4) {
                alert("objeto externo del grid");
    //            for (var contador_externo = 0; contador_externo < this.elementos[contador].length; contador_externo++) {
    //                this.elementos[contador_externo].generahtml();
    //                this.codigos[0] = this.codigos[0] + this.elementos[contador_externo].exponerhtml();
    //            }
            }
            else {
                alert("objeto interno del grid");
                this.codigos[0] = this.codigos[0] + "<DIV CLASS="+this.elementos[contador].vinculos[0]+" ID="+this.elementos[contador].vinculos[1]+">";
                this.codigos[0] = this.codigos[0] + this.elementos[contador].configuraciones[2][1][this.configuraciones[2][0]][0];
                this.codigos[0] = this.codigos[0] + "</DIV>";
            }
    
        }

        nivel_objetos = nivel_objetos - 1;
    }

    this.codigos[0] = this.codigos[0] + "</DIV>";
};
Gradilla3.prototype.imprimehtml = function() {
	$(this.vinculos[2]).html(this.codigos[0]);
};	   						
Gradilla3.prototype.traduce = function(par_idioma) {
    this.configuraciones[2][0] = par_idioma;
};	   						


Control.prototype.recogevalor = function() {
            this.valor[3] = document.getElementById(this.html[1]).value; 
    // LISTA TENDEDERO	
        if (this.tipo==8) {
            if (this.valor[8]==1) {
                this.valor[2] = document.getElementById(this.html[1]).value; 
            }
            if (this.valor[8]==2) {
                this.valor[3] = document.getElementById(this.html[1]).value; 
            }
        }
    // INPUT NUMBER	
        if (this.tipo==9) {
            this.valor[2] = document.getElementById(this.html[1]).value; 
        }
    // DATE	
        if (this.tipo==12) {
            this.valor[3] = document.getElementById(this.html[1]).value; 
        }
    // CHECKBOX	
        if (this.tipo==13) {
            if (document.getElementById(this.html[1]).checked) {
                this.valor[2] = 1; 
            }
            else {
                this.valor[2] = 0; 
            }
        }
    };	   						
    