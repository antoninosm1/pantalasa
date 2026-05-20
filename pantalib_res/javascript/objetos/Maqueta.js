function Maqueta(idioma, areas, parametros, clasehtml, idhtml, clasedestino, codigo) {
	this.idioma = idioma;
	this.areas = areas;
	this.parametros = parametros;
	this.clasehtml = clasehtml;
	this.idhtml = idhtml;
	this.clasedestino = clasedestino;
	this.codigo = codigo;
}

Maqueta.prototype.genera = function() {
	this.codigo = "<DIV CLASS='"+this.clasehtml+"' ID='"+this.idhtml+"'>";
		let i = 0;
		while(i < this.areas) {
			this.codigo = this.codigo + "<DIV CLASS='"+this.parametros[0][i]+"' ID='"+this.parametros[1][i]+"'>";
                this.codigo = this.codigo + this.idioma[1][this.idioma[0]][i];
			this.codigo = this.codigo + "</DIV>";	
			i++;
		}
	this.codigo = this.codigo + "</DIV>";
};	   						

Maqueta.prototype.generahtml = function() {
	this.codigo = "<DIV CLASS='"+this.clasehtml+"' ID='"+this.idhtml+"'>";
		
		var i = 0;
		while(i < this.areas) {
			this.codigo = this.codigo + "<DIV CLASS='"+this.parametros[0][i]+"' ID='"+this.parametros[1][i]+"'>";
                this.codigo = this.codigo + this.idioma[1][this.idioma[0]][i];
			this.codigo = this.codigo + "</DIV>";	
			i++;
		}
		
	this.codigo = this.codigo + "</DIV>";
};	   						
Maqueta.prototype.imprimehtml = function() {
	if (this.parametros[2]==1) {
		this.imprimehtml_nuevo();
	}
	else {
		if (this.parametros[2]==2) {
			this.imprimehtml_agrega();
		}
		else {
			this.imprimehtml_nuevo();
		}
	}
};	   						
Maqueta.prototype.imprimehtml_nuevo = function() {
	$(this.clasedestino).html(this.codigo);
};	   						
Maqueta.prototype.imprimehtml_agrega = function() {
	$(this.clasedestino).append(this.codigo);
};	   						
Maqueta.prototype.traduce = function(par_idioma) {
    this.idioma[0] = par_idioma;
};	   						
Maqueta.prototype.exponerhtml = function() {
	return this.codigo;	
};	   						


