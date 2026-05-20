function Form(configuraciones, etiquetas, codigos, elementos) {
	this.configuraciones = configuraciones;
	this.etiquetas = etiquetas;
	this.codigos = codigos;
	this.elementos = elementos;
}

// METODO generahtml() QUE CONSTRUYE UNA CADENA CON HTML Y LA GUARDA EN LA VARIABLE DE INSTANCIA this.codigos[0]
// ESTE METODO SE PUEDE INVOCAR A PARTIR DE UNA INSTANCIA DE LA CLASE Form CUANDO SE QUIERA REINICIAR EL HTML
// ESTE METODO NO IMPRIME EL HTML, PARA ESO SE USA EL METODO imprimehtml()

Form.prototype.generahtml = function() {
	this.codigos[0] = "<FORM ACTION='"+this.configuraciones[3]+"' METHOD='"+this.configuraciones[4]+"' CLASS='"+this.etiquetas[0]+"' ID='"+this.etiquetas[1]+"' ENCTYPE='multipart/form-data'></FORM>";
};	   						
Form.prototype.imprimehtml = function() {
    if (this.configuraciones[2]==0) {
        this.escribehtml();
    }
    else {
        this.agregahtml();
    }
};	   						
Form.prototype.escribehtml = function() {
	$(this.etiquetas[2]).html(this.codigos[0]);
};	   						
Form.prototype.agregahtml = function() {
	$(this.etiquetas[2]).append(this.codigos[0]);
};	   						
Form.prototype.traduce = function(par_idioma) {
    this.configuraciones[0][0] = par_idioma;
};	   						
Form.prototype.valida = function() {
    this.configuraciones[5][0] = 0;
    this.configuraciones[5][1] = 1;
    this.codigos[1] = "";
    var i = 0;
    var validaciones = 0;
    var errores = 0;
    while(i < this.configuraciones[1]) {
        if (this.elementos[1][i]==1) {
            if (this.elementos[0][i].vaciovalor() == 1) {
                errores = errores + 1;
                this.elementos[2][i][0] = 0;
                this.elementos[2][i][1] = 1;
            }
            else {
                validaciones = validaciones + 1;
                this.elementos[2][i][0] = 1;
                this.elementos[2][i][1] = 0;
            }
        }
        else {
            validaciones = validaciones + 1;
            this.elementos[2][i][0] = 1;
            this.elementos[2][i][1] = 0;
        }
        i++;
    }
    if (validaciones==this.configuraciones[1]) {
        this.configuraciones[5][0] = 1;
        this.configuraciones[5][1] = 0;
    }
    else {
        this.configuraciones[5][0] = 0;
        this.configuraciones[5][1] = 1;
        if (errores == 1) {
            this.codigos[1] = this.codigos[1] + this.configuraciones[0][1][this.configuraciones[0][0]][0]+" ";
            var i = 0;
            while(i < this.configuraciones[1]) {
                if (this.elementos[2][i][0] == 0) {
                    this.codigos[1] = this.codigos[1]+" "+this.elementos[0][i].configuraciones[0][1][this.configuraciones[0][0]][0];
                }
                i++;
            }
            this.codigos[1] = this.codigos[1] + " " + this.configuraciones[0][1][this.configuraciones[0][0]][2];
        }
        else {
            this.codigos[1] = this.codigos[1] + this.configuraciones[0][1][this.configuraciones[0][0]][1]+" ";
            var i = 0;
            while(i < this.configuraciones[1]) {
                if (this.elementos[2][i][0] == 0) {
                    this.codigos[1] = this.codigos[1]+" "+this.elementos[0][i].configuraciones[0][1][this.configuraciones[0][0]][0]+",";
                }
                i++;
            }
            this.codigos[1] = this.codigos[1] + " " + this.configuraciones[0][1][this.configuraciones[0][0]][3];
        }
    }
};	   						
Form.prototype.envia = function() {
    if (this.configuraciones[5][0]==1) {

        let DatosFormulario = new FormData();
		
		for (var i = 0; i < this.configuraciones[1]; i++) {
			DatosFormulario.append(this.elementos[0][i].etiquetas[3], document.getElementById(this.elementos[0][i].etiquetas[1]).value);
		}
        fetch(this.configuraciones[3], {
            method: this.configuraciones[4],
            body: DatosFormulario,
        })
        .then(res => res.json())
        .then(data => this.revisa_data(data))
        .catch(err => console.log(err))
    }
    else {
        this.configuraciones[6].abre(this.configuraciones[0][1][this.configuraciones[0][0]][6], this.codigos[1], this.configuraciones[0][1][this.configuraciones[0][0]][4]);
    }
};	   						
Form.prototype.envia_status = function() {
    if (this.configuraciones[5][0]==1) {
    
        let DatosFormulario = new FormData();
            
        for (var i = 0; i < this.configuraciones[1]; i++) {
            DatosFormulario.append(this.elementos[0][i].etiquetas[3], document.getElementById(this.elementos[0][i].etiquetas[1]).value);
        }
        fetch(this.configuraciones[3], {
            method: this.configuraciones[4],
            body: DatosFormulario,
        })
        .then(res => res.json())
        .then(data => this.revisa_data_status(data))
        .catch(err => console.log(err))
    }
    else {
        this.configuraciones[6].abre(this.configuraciones[0][1][this.configuraciones[0][0]][6], this.codigos[1], this.configuraciones[0][1][this.configuraciones[0][0]][4]);
    }
};	   						


Form.prototype.verifica = function() {
    return this.configuraciones[5][0];
};	   						

Form.prototype.revisa_data = function(data) {
    if (data[0].registros==0) {

        this.configuraciones[6].abre(this.configuraciones[0][1][this.configuraciones[0][0]][7], this.configuraciones[0][1][this.configuraciones[0][0]][5], this.configuraciones[0][1][this.configuraciones[0][0]][4]);
        var i = 0;
        while(i < this.configuraciones[7][0].length) {
            eval(this.configuraciones[7][0][i]);
            i++;
        }
    }
    else {
        var i = 0;
        while(i < this.configuraciones[7][1].length) {
            eval(this.configuraciones[7][1][i]);
            i++;
        }
    }
};	   						
    
Form.prototype.revisa_data_status = function(data) {
    if (data[0].registros==0) {

        this.configuraciones[6].abre(this.configuraciones[0][1][this.configuraciones[0][0]][7], this.configuraciones[0][1][this.configuraciones[0][0]][5], this.configuraciones[0][1][this.configuraciones[0][0]][4]);
        var i = 0;
        while(i < this.configuraciones[7][0].length) {
            eval(this.configuraciones[7][0][i]);
            i++;
        }
    }
    else {

        if (data[1].confirma==0) {
            this.configuraciones[6].abre(this.configuraciones[0][1][this.configuraciones[0][0]][10], this.configuraciones[0][1][this.configuraciones[0][0]][9], this.configuraciones[0][1][this.configuraciones[0][0]][4]);
            var i = 0;
            while(i < this.configuraciones[7][2].length) {
                eval(this.configuraciones[7][2][i]);
                i++;
            }
        }
        else {
            var i = 0;
            while(i < this.configuraciones[7][1].length) {
                eval(this.configuraciones[7][1][i]);
                i++;
            }
        }
    }
    Form.prototype.regresa = function(datax) {
    };	   						
};	   						
    
