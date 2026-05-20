function Gradilla(idobjeto, titulo, ordenlista, codigohtml, columnas, encabezados, ordenrenglon, consulta, classceldas, valor, metodos) {
	this.idobjeto = idobjeto;              
	this.titulo = titulo;              
	this.ordenlista = ordenlista;              
	this.codigohtml = codigohtml;
	this.columnas = columnas;
	this.encabezados = encabezados;
	this.ordenrenglon = ordenrenglon;
	this.consulta = consulta;
	this.classceldas = classceldas;
	this.valor = valor;
	this.metodos = metodos;
}
Gradilla.prototype.presenta = function() {
	let columnasx = this.columnas;
	let encabezadosx = this.encabezados;
	let ordenrenglonx = this.ordenrenglon;
	let consultamysql = this.consulta;
    let classceldas = this.classceldas;
	let valor = this.valor;
	let metodos = this.metodos;
	let valorCaja2 = "";
	let numregistros = 0;
	let columnavalorprincipal = 0;
	var parametros = {"consulta" : consultamysql, "valorCaja2" : valorCaja2};
	$.ajax({
        data:  parametros,
		type: "POST",
		url: '../pantalib/php/scripts/datosgradilla.php',
		success: function(response)
		{
			let jsondatos = JSON.parse(response);
			let numregistros = parseInt(jsondatos[0].registros);
			this.codigohtml = "";
			this.codigohtml = this.codigohtml+"<DIV CLASS='GRADILLA_CUERPO_TABLA' ID='CUERPO_TABLA'>";
				this.codigohtml = this.codigohtml+"<DIV CLASS='GRADILLA_CUERPO_TABLA_ENCABEZADOS' ID='ENCABEZADOS'>";
				let n = 0;
				let x = columnasx;
				while (n < x) {

// VAMOS A ESTABLECER CUAL COLUMNA LLEVA EL VALOR PRINCIPAL ++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
					if (valor[2] == (n+1)) {
						valorprincipal = (n);
//						alert("ENCONTRE VALOR PRINCIPAL ES: "+n);
					}

					this.codigohtml = this.codigohtml+"<DIV CLASS='ENC_"+classceldas[n]+"' ID='ENCABEZADOS"+n+"'>"+encabezadosx[ordenrenglonx[n]]+"</DIV>";
					n++;
				}
				this.codigohtml = this.codigohtml+"<DIV CLASS='GRADILLA_COMPLEMENTO'></DIV>";
			this.codigohtml = this.codigohtml+"</DIV>";
			this.codigohtml = this.codigohtml+"<DIV CLASS='GRADILLA_CUERPO_TABLA_CUERPO'>";
			let nr = 0;
			let xr = numregistros;
			while (nr < xr) {
				this.codigohtml = this.codigohtml+"<DIV CLASS='GRADILLA_CUERPO_TABLA_RENGLON' ID='RENGLON'"+nr+">";
				let n = 0;
				let x = columnasx;
				let vueltaxx = nr + 1;
				while (n < x) {
					let datox = eval("jsondatos["+vueltaxx+"].item"+ordenrenglon[n]);
					let valorprincipaldatox = eval("jsondatos["+vueltaxx+"].item"+ordenrenglon[valorprincipal]);

					let metodonclick = "ONCLICK = '"+metodos[n]+"("+valorprincipaldatox+")'";

					this.codigohtml = this.codigohtml+"<DIV CLASS='LABEL_VERTICAL'>"+encabezadosx[ordenrenglonx[n]]+": </DIV>";
					if (valor[0][n]==1) {
						this.codigohtml = this.codigohtml+"<DIV CLASS='"+classceldas[n]+"' "+metodonclick+">"+datox+"</DIV>";
					}
					if (valor[0][n]==2) {
						this.codigohtml = this.codigohtml+"<DIV CLASS='"+classceldas[n]+"' "+metodonclick+">"+valor[1][n][(datox-1)]+"</DIV>";
					}
					n++;
				}
				this.codigohtml = this.codigohtml+"</DIV>";
				nr++;
			}
			this.codigohtml = this.codigohtml+"</DIV>";
			$("#ID_FORMULARIO_GRID_CUERPO").html(this.codigohtml);
			$("#ID_FORMULARIO_GRID_PIE").html(numregistros+" RECORDS");
		}
	});
};	   						
