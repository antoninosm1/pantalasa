function Record(configuraciones, etiquetas, codigos, elementos, valores, metodos) {
	this.configuraciones = configuraciones;
	this.etiquetas = etiquetas;
	this.codigos = codigos;
	this.elementos = elementos;
	this.valores = valores;
	this.metodos = metodos;
}
Record.prototype.stablece_status = function(status_captura) {
	this.configuraciones[0][0] = status_captura;
};	   						
Record.prototype.imprime_estado = function(nivel) {
	this.codigos[0] = "<A>";
	if (nivel == 0) {
		if (this.configuraciones[1]==0) {

			this.codigos[0] = this.codigos[0] + "SIN REGISTRO SELECCIONADO" + "</A>";

		}
		else {
			if (this.configuraciones[1]==1) {

				this.codigos[0] = this.codigos[0] + "REGISTRO SELECCIONADO" + "</A>";

			}
			else {

				this.codigos[0] = this.codigos[0] + "ERROR EN STATUS" + "</A>";

			}

		}
	}
	else {
		if (nivel == 1) {
        	var i = 0;
        	while(i < this.configuraciones[2][0].length) {
				if (this.configuraciones[2][0][i]==0) {
					this.codigos[0] = this.codigos[0] + this.configuraciones[2][1][i] + "</A>";
				}
				else {
					if (this.configuraciones[2][0][i]==1) {
						this.codigos[0] = this.codigos[0] + this.elementos[2][this.configuraciones[2][1][i]][0] + "</A>";
					}
				}
            	i++;
        	}

		}
		else {
			if (nivel == 2) {
    	    	var i = 0;
        		while(i < this.configuraciones[2][0].length) {
					if (this.configuraciones[2][0][i]==0) {
						this.codigos[0] = this.codigos[0] + "ID: " + this.configuraciones[2][1][i] + "</A>";
					}
					else {
						if (this.configuraciones[2][0][i]==1) {
							this.codigos[0] = this.codigos[0] + "ID: " + this.elementos[2][this.configuraciones[2][1][i]][0] + "</A>";
						}
					}
            		i++;
        		}	

			}
			else {

			}

		}

	}
	this.imprimehtml();
}
Record.prototype.imprimehtml = function() {
    if (this.configuraciones[4]==0) {
        this.escribehtml();
    }
    else {
        this.agregahtml();
    }
};	   						
Record.prototype.escribehtml = function() {
	$(this.etiquetas[2]).html(this.codigos[0]);
};	   						
Record.prototype.agregahtml = function() {
	$(this.etiquetas[2]).append(this.codigos[0]);
};	   						
    
Record.prototype.recibe_area_impresion = function(areaImpresion) {
	this.etiquetas[2] = areaImpresion;
};	   						

Record.prototype.imprime_valor = function(indiceValor) {

	if (this.elementos[7][indiceValor][0]==0) {
		this.codigos[0] = "<A>"+this.elementos[2][indiceValor][1] + "</A>";
	}
	else {
		if (this.elementos[7][indiceValor][0]==1) {
			this.codigos[0] = "<A>" + this.elementos[7][indiceValor][1]+this.elementos[2][indiceValor][1] + "</A>";
		}
		else {
			this.codigos[0] = "<A>ERROR EN TAG: " + this.elementos[2][indiceValor][1] + "</A>";
		}

	}
	this.imprimehtml();
};	   						

Record.prototype.modo_alta = function() {
	
	this.configuraciones[1] = 1;

};	   						

Record.prototype.inicializa_valores = function() {
	
   	var i = 0;
	while(i < this.configuraciones[3]) {
		
		this.elementos[3][i][0] = this.elementos[3][i][1];
		document.getElementById(this.configuraciones[6][i]).value = this.elementos[3][i][1];
		i++;
    
	}	

};	   						

Record.prototype.valida = function() {

   	var i = 0;
	while(i < this.configuraciones[3]) {
    	
//    	const valor = document.getElementById("usuario").value;		
		
		
		
		i++;
    }	

};	   						




    