function Gradilla2(configuracion, campos, html, json) {
	this.configuracion = configuracion;
	this.campos = campos;
	this.html = html;
	this.json = json;
}
Gradilla2.prototype.generahtml = function() {
	if (this.configuracion[3]==1) {
		this.html[3] = this.html[3] + "<div>VIENE DE UNA BD</div>";
		var consultamysql = this.configuracion[4].mysql;
		var parametros = {"consulta" : consultamysql};
		var id_html_impr = this.campos[0].length;
		var codigo_ajax = this.html[3];
		var flujo_html = this.html[5];
		var id_html = this.html[2];
		var titulo_grid = this.configuracion[0][1][this.configuracion[0][0]][0];
		var titulos_grid = this.configuracion[0][1][this.configuracion[0][0]][1];
		var ancho_absolute = this.configuracion[2];
		var grid_elementos = this.campos[0];
		var grid_clasesdato = this.campos[1];
		var ordenColumna = this.campos[2];
		$.ajax({
			data: parametros,
			type: "POST",
			url: this.configuracion[4].php,
			success: function(response)
			{
				let jsondatos = JSON.parse(response);
				console.log(jsondatos);
				this.json = jsondatos;
				let numregistros = parseInt(jsondatos[0].registros);
				unidad_absolute = 100 / ancho_absolute; 
				codigo_ajax = "";
				codigo_ajax = codigo_ajax+"<div class='area_grid_interna' id='"+id_html_impr+"_G01'>"+titulo_grid+"</div>";
				codigo_ajax = codigo_ajax+"<div class='area_grid_interna' id='"+id_html_impr+"_G02'>";
				codigo_ajax = codigo_ajax+"<div class='renglon_grid_encabezados'>";
				for (var contador = 0; contador < id_html_impr; contador++) {
					codigo_ajax = codigo_ajax+"<div class='grid_encabezado_celda' id='"+id_html_impr+"_GEC"+(contador+1)+"' style='width: "+(unidad_absolute*grid_elementos[ordenColumna[contador]])+"%;'>"+titulos_grid[ordenColumna[contador]]+"</div>";
				}
				codigo_ajax = codigo_ajax+"</div>";
				codigo_ajax = codigo_ajax+"</div>";
				var sw_renglon = 1;
				for (var contador = 0; contador < numregistros; contador++) {
					codigo_ajax = codigo_ajax+"<div class='renglon_grid renglon_grid"+sw_renglon+"'>";
					if (sw_renglon==0) {
						sw_renglon = 1;
					}
					else {
						sw_renglon = 0;
					}
					for (var contador2 = 0; contador2 < id_html_impr; contador2++) {
						var datox_x = eval("jsondatos[contador+1].item"+ordenColumna[contador2]);						
						codigo_ajax = codigo_ajax+"<div class='grid_celda grid_celda_"+grid_clasesdato[ordenColumna[contador2]]+"' id='"+id_html_impr+"_GC"+(contador2+1)+"' style='width: "+(unidad_absolute*grid_elementos[ordenColumna[contador2]])+"%;'>"+datox_x+"</div>";
					}
					codigo_ajax = codigo_ajax+"</div>";
				}
				if (flujo_html==1) {
					$(id_html).html(codigo_ajax);
				}
				else {
					if (flujo_html==2) {
						$(id_html).append(codigo_ajax);
					}
					else {
						$(id_html).html(codigo_ajax);
					}
				}
			}
		});
	}
	else {
		this.html[3] = this.html[3] + "<div>NO VIENE DE UNA BD</div>";
	}
};	   						
Gradilla2.prototype.imprimehtml = function() {
	if (this.html[5]==1) {
		this.imprimehtml_nuevo();
	}
	else {
		if (this.html[5]==2) {
			this.imprimehtml_agrega();
		}
		else {
			this.imprimehtml_nuevo();
		}
	}
};	   						
Gradilla2.prototype.imprimehtml_nuevo = function() {
	$(this.html[2]).html(this.html[3]);
};	   						
Gradilla2.prototype.imprimehtml_agrega = function() {
	$(this.html[2]).append(this.html[3]);
};	   						
Gradilla2.prototype.traduce = function(par_idioma) {
    this.configuracion[0][0] = par_idioma;
};	   						
	
