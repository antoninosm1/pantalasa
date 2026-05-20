function Menu(idioma, id, nombre, elementos, logotexto, metodos, html) {
	this.idioma = idioma;
	this.id = id;
	this.nombre = nombre;
	this.elementos = elementos;
	this.logotexto = logotexto;
	this.metodos = metodos;
	this.html = html;
}
Menu.prototype.generahtml = function() {
	this.html[6] = "<a href='#' class='"+this.html[0]+"'>"+this.logotexto+"</a>";
	this.html[6] = this.html[6]+"<button class='"+this.html[1]+"' onclick='"+this.metodos[0]+"'>";
	this.html[6] = this.html[6]+"<img src='"+this.idioma[3][this.idioma[0]][0]+"' height ='"+this.idioma[3][this.idioma[0]][1]+"' width='"+this.idioma[3][this.idioma[0]][2]+"' />";
	this.html[6] = this.html[6]+"</button>";

	this.html[6] = this.html[6]+"<ul class='"+this.html[2]+"'>";
		
		for (var i = 0; i < this.elementos; i++) {
			this.html[6] = this.html[6]+"<li class='"+this.html[3]+"'>";
				this.html[6] = this.html[6]+"<a href='"+this.idioma[2][this.idioma[0]][i]+"' class='"+this.html[4]+"'>"+this.idioma[1][this.idioma[0]][i]+"</a>";
			this.html[6] = this.html[6]+"</li>";
		}
	
	this.html[6] = this.html[6]+"</ul>";
};	   						
Menu.prototype.traduce = function() {
	alert("estoy en traduce")
};	   						
