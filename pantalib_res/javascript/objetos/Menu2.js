function Menu2(opciones, html) {
	this.opciones = opciones;
	this.html = html;
}
Menu2.prototype.generahtml = function() {
	this.html[4] = this.html[4]+"<ul class='"+this.html[0]+"'>";
		
		for (var i = 0; i < this.opciones[3]; i++) {
			
            
            this.html[4] = this.html[4]+"<li class='"+this.html[1]+"'>";


//                this.html[4] = this.html[4]+"<a href='"+this.opciones[2][this.opciones[0]][i]+"' class='"+this.html[2]+"'>"+this.idioma[1][this.idioma[0]][i]+"</a>";
                this.html[4] = this.html[4]+"<a href='"+this.opciones[2][this.opciones[0]][i]+"' class='"+this.html[2]+"'>"+this.opciones[1][this.opciones[0]][i]+"</a>";


            this.html[4] = this.html[4]+"</li>";
		
        
        }
	
	this.html[4] = this.html[4]+"</ul>";
};	   						
Menu2.prototype.traduce = function() {
	alert("estoy en traduce")
};	   						
