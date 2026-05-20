function Session(configuraciones, codigos) {
	this.configuraciones = configuraciones;
	this.codigos = codigos;
}
Session.prototype.cierra = function() {
    let DatosFormulario = new FormData();
    DatosFormulario.append("dato_01", "X");
    fetch(this.configuraciones[1][0], {
        method: this.configuraciones[2],
        body: DatosFormulario,
    })
    .then(res => res.json())
    .then(datax => this.regresa(datax))
    .catch(err => this.json_error(err))
};	   						
Session.prototype.abre = function() {
    let DatosFormulario = new FormData();
    DatosFormulario.append("dato_01", "X");
    fetch(this.configuraciones[1][1], {
        method: this.configuraciones[2],
        body: DatosFormulario,
    })
    .then(res => res.json())
    .then(datax => this.regresa2(datax))
    .catch(err => this.json_error(err))
};	   						
Session.prototype.regresa = function(datax) {
    this.codigos[0] = datax;
    this.configuraciones[0] = 1;
};	   						
Session.prototype.regresa2 = function(datax) {
    this.codigos[0] = datax;
    this.configuraciones[0] = 0;
};	   						
Session.prototype.revisa = function(usuario, session, salida) {
    if (usuario==0) {
        window.location.replace(salida);
    }
    else {
        if (session==1) {
            window.location.replace(salida);
        }
        else {
            if (this.configuraciones[0][2] == 1) {
                var sw_status = 0;                
                var i = 0;
                while(i < this.configuraciones[0][1].length) {
                    if (this.configuraciones[0][1][i]==this.configuraciones[0][3]) {
                        sw_status = 1;
                    }
                    i++;
                }
                if (sw_status == 0) {
                    window.location.replace(salida);
                }
            }
        }
    }
};	   						
