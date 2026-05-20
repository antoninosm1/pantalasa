function Formulario(especificaciones, campos, html) {
	this.especificaciones = especificaciones;
	this.campos = campos;
	this.html = html;
}
Formulario.prototype.generahtml = function() {
	this.html[3] = "<FORM ACTION='"+this.especificaciones[1]+"' METHOD='"+this.especificaciones[2]+"' CLASS='"+this.html[0]+"' ID='"+this.html[1]+"' ENCTYPE='multipart/form-data'></FORM>";
};	   						
Formulario.prototype.imprimehtml = function() {
	$(this.html[2]).html(this.html[3]);
};	   						

Formulario.prototype.validaformulario = function() {
	var obligatorios = 0;
	for (var contador = 0; contador < this.campos[0].length; contador++) {
		if (this.campos[4][contador]==1) {
			if (this.campos[1][contador]==1) {
				if (this.campos[5][contador]==1) {
					if (document.getElementById(this.campos[2][contador]).value=="")  {
						obligatorios = obligatorios + 1;
					}
				}
				if (this.campos[5][contador]==2) {
					if (document.getElementById(this.campos[2][contador]).value==0)  {
						obligatorios = obligatorios + 1;
					}
				}
			}
			if (this.campos[1][contador]==2) {
				var obligatorios2 = 0;
				for (var contador2 = 0; contador2 < this.campos[6][contador]; contador2++) {
					if (document.getElementById(this.campos[2][contador]+contador2).checked)  {
						obligatorios2 = obligatorios2 + 1;
					}
				}
				if (obligatorios2==0) {
					obligatorios = obligatorios + 1;
				}
			}
		}
	}
	if (obligatorios > 0) {
		this.especificaciones[4] = 0;
	}
	else {
		this.especificaciones[4] = 1;
	}
};	   						

Formulario.prototype.grabaformulario = function() {
	if (this.especificaciones[4] == 1) {
		let DatosFormulario = new FormData();
		
/*		alert("voy a entrar al ciclo para armar los parametros"); */
		
		for (var contador = 0; contador < this.campos[0].length; contador++) {
		
			if (this.campos[5][contador]==1) {
				DatosFormulario.append(this.campos[0][contador], document.getElementById(this.campos[2][contador]).value);
			}
			if (this.campos[5][contador]==3) {
				var ValorFile = $("#"+this.campos[2][contador]).prop('files')[0];
				DatosFormulario.append(this.campos[0][contador], ValorFile);
			}
		}
		$.ajax({
			type: this.especificaciones[2],
			cache: false,
			contentType: false,
			processData: false,
			data: DatosFormulario,
			url: this.especificaciones[1]
		
		})
		.done(function(res){
            alert(res);
            this.especificaciones[9] = res;			
            alert("esta es la respuesta "+res);
            if (res == 0) {
                alert("fue cero");
                this.especificaciones[8] = 0;
            }
            else {
                alert("fue uno");
                this.especificaciones[8] = 1;
            }
            console.log(res);
		})
		.fail(function(res){
            this.especificaciones[9] = $id;			
            this.especificaciones[8] = 0;
            console.log(res);
		});
		for (var contador = 0; contador < this.campos[0].length; contador++) {
			document.getElementById(this.campos[2][contador]).value = this.campos[3][contador];
		}
	}
};	   						

Formulario.prototype.procesaformulario = function() {
	let DatosFormulario = new FormData();
	if (this.especificaciones[4] == 1) {
		
		for (var contador = 0; contador < this.campos[0].length; contador++) {
		
			if (this.campos[5][contador]==1) {
				DatosFormulario.append(this.campos[0][contador], document.getElementById(this.campos[2][contador]).value);
			}
			if (this.campos[5][contador]==3) {
				var ValorFile = $("#"+this.campos[2][contador]).prop('files')[0];
				DatosFormulario.append(this.campos[0][contador], ValorFile);
			}
		}
		var ruta_envia = this.especificaciones[7];
		$.ajax({
			type: this.especificaciones[2],
			cache: false,
			contentType: false,
			processData: false,
			data: DatosFormulario,
			url: this.especificaciones[1]
		
		})
		.done(function(res){
			alert(res);
			if (res == 0) {
				location.href = ruta_envia;
			}
			else {
				alert("INCORRECT DATA...");
			}
		})
		.fail(function(res){
			alert("****FALLO****: "+res);
		});
		for (var contador = 0; contador < this.campos[0].length; contador++) {
			document.getElementById(this.campos[2][contador]).value = this.campos[3][contador];
		}
	}
};	   						

Formulario.prototype.buscaformulario = function() {
	let DatosFormulario = new FormData();
	if (this.especificaciones[4] == 1) {
		alert("VOY A BUSCAR CRITERIOS");
		
		for (var contador = 0; contador < this.campos[0].length; contador++) {
		
			if (this.campos[5][contador]==1) {
				DatosFormulario.append(this.campos[0][contador], document.getElementById(this.campos[2][contador]).value);
			}
			if (this.campos[5][contador]==3) {
				var ValorFile = $("#"+this.campos[2][contador]).prop('files')[0];
				DatosFormulario.append(this.campos[0][contador], ValorFile);
			}
		}
		var ruta_envia = this.especificaciones[7];
		$.ajax({
			type: this.especificaciones[2],
			cache: false,
			contentType: false,
			processData: false,
			data: DatosFormulario,
			url: this.especificaciones[1]
		
		})
		.done(function(res){
			if (res == 0) {
				location.href = ruta_envia;
			}
			else {
				alert("INCORRECT DATA...");
			}
		})
		.fail(function(res){
			alert("****FALLO****: "+res);
		});
		for (var contador = 0; contador < this.campos[0].length; contador++) {
			document.getElementById(this.campos[2][contador]).value = this.campos[3][contador];
		}
	}
};	   						
Formulario.prototype.avanzaformulario = function() {
	if (this.especificaciones[5] == 1) {
		location.href = this.especificaciones[7];
	}
};	   						    
Formulario.prototype.clearformulario = function() {
	for (var contador = 0; contador < this.campos[0].length; contador++) {
		this.campos[6][contador].limpia();
	}
};	   						
Formulario.prototype.formularioenvia = function() {
	var error_obligatorio = 0;
	var error_obligatorio_campos = "";
	var error_obligatorio_texto = "";
	for (var contador = 0; contador < this.campos[0].length; contador++) {
		if (this.campos[4][contador]==1) {
			this.campos[6][contador].verificavacio();
			if (this.campos[6][contador].valor[6]==1) {
				error_obligatorio = error_obligatorio + 1;
				if (this.campos[6][contador].tipo==11) {
					error_obligatorio_campos = error_obligatorio_campos + this.campos[6][contador].idioma[1][this.campos[6][contador].idioma[0]][7]+", ";
				}
				else {
					error_obligatorio_campos = error_obligatorio_campos + this.campos[6][contador].idioma[1][this.campos[6][contador].idioma[0]][0]+", ";
				}

			}
		}
	
/*		
		
		

		
		
		
		
		if (this.campos[1][contador]==2) {
			alert("TIPO: 2 INPUT TEXTO");
			alert(document.getElementById(this.campos[6][contador].html[1]).value);
			if (document.getElementById(this.campos[6][contador].html[1]).value=="") {
				error_obligatorio = error_obligatorio + 1;
				error_obligatorio_campos = error_obligatorio_campos + this.campos[6][contador].idioma[1][this.campos[6][contador].idioma[0]][0]+" ";
			}
		}
		if (this.campos[1][contador]==3) {
			alert("TIPO: 3");
		}
		if (this.campos[1][contador]==4) {
			alert("TIPO: 4");
		}
		if (this.campos[1][contador]==5) {
			alert("TIPO: 5");
		}
		if (this.campos[1][contador]==6) {
			alert("TIPO: 6");
		}
		if (this.campos[1][contador]==7) {
			alert("TIPO: 7");
		}
		if (this.campos[1][contador]==8) {
			alert("TIPO: 8");
		}
		if (this.campos[1][contador]==9) {
			alert("TIPO: 9 NUMERO");
			alert(document.getElementById(this.campos[6][contador].html[1]).value);
			if (document.getElementById(this.campos[6][contador].html[1]).value==0) {
				error_obligatorio = error_obligatorio + 1;
				error_obligatorio_campos = error_obligatorio_campos + this.campos[6][contador].idioma[1][this.campos[6][contador].idioma[0]][0]+" ";
			}
		}
		if (this.campos[1][contador]==10) {
			alert("TIPO: 10 CHECKBOX");
		}
		if (this.campos[1][contador]==11) {
			alert("TIPO: 11 FILELIST");
			alert("VALOR: "+this.campos[6][contador].elementos[0]);
			if (this.campos[6][contador].elementos==0) {
				error_obligatorio = error_obligatorio + 1;
				error_obligatorio_campos = error_obligatorio_campos + this.campos[6][contador].idioma[1][this.campos[6][contador].idioma[0]][7]+" ";
			}
		}
	*/
	}
	if (error_obligatorio > 0) {
		if (error_obligatorio == 1) {
			error_obligatorio_texto = this.especificaciones[0][1][this.especificaciones[0][0]][1]+error_obligatorio_campos+this.especificaciones[0][1][this.especificaciones[0][0]][3];
		}
		else {
			error_obligatorio_texto = this.especificaciones[0][1][this.especificaciones[0][0]][0]+error_obligatorio_campos+this.especificaciones[0][1][this.especificaciones[0][0]][2];
		}
		alert(error_obligatorio_texto);
	}
	else {
		alert("voy a grabar");
	}
};	   						
Formulario.prototype.traduce = function(par_idioma) {
	this.especificaciones[0][0] = par_idioma;
};	   						


