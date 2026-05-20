function Sistema(idioma, id, tecnichal_name, company, slogan, code) {
	this.idioma = idioma;
	this.id = id;
	this.tecnichal_name = tecnichal_name;
	this.company = company;
	this.slogan = slogan;
	this.code = code;
}
Sistema.prototype.print_header = function() {
};	   						




function Sistema(localitation) {
	this.localitation = localitation;
}
Sistema.prototype.traduce = function() {
	alert("estoy en traduce")
};	   						
