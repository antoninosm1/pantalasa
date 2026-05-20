function Consulta(tipo, elementos, tablas, condicion, order, mysql, php) {
	this.tipo = tipo;
	this.elementos = elementos;
	this.tablas = tablas;
	this.condicion = condicion;
	this.order = order;
	this.mysql = mysql;
	this.php = php;
}
Consulta.prototype.genera = function() {
	this.mysql = "";
	if (this.tipo == 1) {
		this.mysql = this.mysql + "SELECT ";
	}
	var sw_primera = 0;

	for (var contador = 0; contador < this.elementos.length; contador++) {
		if (sw_primera == 0) {
			sw_primera = 1;
			this.mysql = this.mysql + this.elementos[contador];
		}
		else {
			this.mysql = this.mysql + ", " + this.elementos[contador];
		}
	}
	this.mysql = this.mysql + " FROM "+this.tablas+" WHERE "+this.condicion;
	if (this.order !== "") {
		this.mysql = this.mysql + " ORDER BY "+this.order;
	}
};	   						
