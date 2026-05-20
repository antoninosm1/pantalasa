function Menu(configuraciones, etiquetas, codigos, elementos) {
	this.configuraciones = configuraciones;
	this.etiquetas = etiquetas;
	this.codigos = codigos;
	this.elementos = elementos;
}

Menu.prototype.generahtml = function() {
	this.codigos[0] = '<DIV CLASS="'+this.etiquetas[0]+'" ID="'+this.etiquetas[1]+'">';
    if (this.configuraciones[1] > 0) {
        if (this.configuraciones[3]==0) {
            var i = 0;
            while(i < this.configuraciones[1]) {
                this.codigos[0] = this.codigos[0] + '<DIV CLASS="'+this.elementos[0][i]+'" ID="'+this.elementos[1][i]+'">';
                if (this.elementos[2][i]==1 && this.elementos[3][i]==0) {
                    this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.elementos[0][i]+'_icono '+this.configuraciones[0][1][this.configuraciones[0][0]][1][i]+'" ID="'+this.elementos[1][i]+'_ICONO" HREF="'+this.configuraciones[0][1][this.configuraciones[0][0]][2][i]+'"';
                    var ix = 0;
                    while(ix < this.elementos[4][i][0].length) {
                        this.codigos[0] = this.codigos[0]+' '+this.elementos[4][i][0][ix]+'="'+this.elementos[4][i][1][ix]+'"';
                        ix++;
                    }
                    this.codigos[0] = this.codigos[0] + '></A>';
                }
                this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.elementos[0][i]+'_texto" ID="'+this.elementos[1][i]+'_TEXTO" HREF="'+this.configuraciones[0][1][this.configuraciones[0][0]][2][i]+'"';
                var ix = 0;
                while(ix < this.elementos[4][i][0].length) {
                    this.codigos[0] = this.codigos[0]+' '+this.elementos[4][i][0][ix]+'="'+this.elementos[4][i][1][ix]+'"';
                    ix++;
                }
                this.codigos[0] = this.codigos[0]+'>';
                this.codigos[0] = this.codigos[0] + this.configuraciones[0][1][this.configuraciones[0][0]][0][i];
                this.codigos[0] = this.codigos[0] + '</A>';
                if (this.elementos[2][i]==1 && this.elementos[3][i]==1) {
                    this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.elementos[0][i]+'_icono '+this.configuraciones[0][1][this.configuraciones[0][0]][1][i]+'" ID="'+this.elementos[1][i]+'_ICONO" HREF="'+this.configuraciones[0][1][this.configuraciones[0][0]][2][i]+'"';
                    var ix = 0;
                    while(ix < this.elementos[4][i][0].length) {
                        this.codigos[0] = this.codigos[0]+' '+this.elementos[4][i][0][ix]+'="'+this.elementos[4][i][1][ix]+'"';
                        ix++;
                    }
                    this.codigos[0] = this.codigos[0] + '></A>';
                }
                this.codigos[0] = this.codigos[0] + '</DIV>';	
                i++;
            }
        }
    }
	
    
    this.codigos[0] = this.codigos[0] + '</DIV>';
};	   						
Menu.prototype.imprimehtml = function() {
    if (this.configuraciones[2]==0) {
        this.escribehtml();
    }
    else {
        this.agregahtml();
    }
};	   						
Menu.prototype.escribehtml = function() {
	$(this.etiquetas[2]).html(this.codigos[0]);
};	   						
Menu.prototype.agregahtml = function() {
	$(this.etiquetas[2]).append(this.codigos[0]);
};	   						
Menu.prototype.traduce = function(par_idioma) {
    this.configuraciones[0][0] = par_idioma;
};	   						
Menu.prototype.generahtml_status = function() {
    var posicion = 0;
    var i = 0;
    while(i < this.configuraciones[4][1].length) {
        if (this.configuraciones[4][0] == this.configuraciones[4][1][i]) {
            posicion = i;
        }
        i++;
    }
	this.codigos[0] = '<DIV CLASS="'+this.etiquetas[0]+'" ID="'+this.etiquetas[1]+'">';
    if (this.configuraciones[1] > 0) {
        if (this.configuraciones[3]==0) {
            var i = 0;
            while(i < this.configuraciones[1]) {
                if (this.configuraciones[4][2][posicion][i]==1) {
                    this.codigos[0] = this.codigos[0] + '<DIV CLASS="'+this.elementos[0][i]+'" ID="'+this.elementos[1][i]+'">';
                    if (this.elementos[2][i]==1 && this.elementos[3][i]==0) {
                        this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.elementos[0][i]+'_icono '+this.configuraciones[0][1][this.configuraciones[0][0]][1][i]+'" ID="'+this.elementos[1][i]+'_ICONO" HREF="'+this.configuraciones[0][1][this.configuraciones[0][0]][2][i]+'"';
                        var ix = 0;
                        while(ix < this.elementos[4][i][0].length) {
                            this.codigos[0] = this.codigos[0]+' '+this.elementos[4][i][0][ix]+'="'+this.elementos[4][i][1][ix]+'"';
                            ix++;
                        }
                        this.codigos[0] = this.codigos[0] + '></A>';
                    }
                    this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.elementos[0][i]+'_texto" ID="'+this.elementos[1][i]+'_TEXTO" HREF="'+this.configuraciones[0][1][this.configuraciones[0][0]][2][i]+'"';
                    var ix = 0;
                    while(ix < this.elementos[4][i][0].length) {
                        this.codigos[0] = this.codigos[0]+' '+this.elementos[4][i][0][ix]+'="'+this.elementos[4][i][1][ix]+'"';
                        ix++;
                    }
                    this.codigos[0] = this.codigos[0]+'>';
                    this.codigos[0] = this.codigos[0] + this.configuraciones[0][1][this.configuraciones[0][0]][0][i];
                    this.codigos[0] = this.codigos[0] + '</A>';
                    if (this.elementos[2][i]==1 && this.elementos[3][i]==1) {
                        this.codigos[0] = this.codigos[0] + '<A CLASS="'+this.elementos[0][i]+'_icono '+this.configuraciones[0][1][this.configuraciones[0][0]][1][i]+'" ID="'+this.elementos[1][i]+'_ICONO" HREF="'+this.configuraciones[0][1][this.configuraciones[0][0]][2][i]+'"';
                        var ix = 0;
                        while(ix < this.elementos[4][i][0].length) {
                            this.codigos[0] = this.codigos[0]+' '+this.elementos[4][i][0][ix]+'="'+this.elementos[4][i][1][ix]+'"';
                            ix++;
                        }
                        this.codigos[0] = this.codigos[0] + '></A>';
                    }
                    this.codigos[0] = this.codigos[0] + '</DIV>';	
                }
                i++;
            }
        }
    }
    this.codigos[0] = this.codigos[0] + '</DIV>';
};	   						
    
