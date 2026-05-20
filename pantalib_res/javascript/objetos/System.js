function System(id, tecnichal_name, company, slogan, code) {
	this.id = id;
	this.tecnichal_name = tecnichal_name;
	this.company = company;
	this.slogan = slogan;
	this.code = code;
}
System.prototype.print_header = function() {
};	   						
System.prototype.traduce = function() {
	alert("estoy en traduce")
};	   						


