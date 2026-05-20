function Input(configuraciones, elementos, etiquetas, codigos) {
	this.configuraciones = configuraciones;
	this.elementos = elementos;
	this.etiquetas = etiquetas;
	this.codigos = codigos;
}
Control.prototype.generahtml = function() {

this.html[3] = "";

if(this.contenedor[0] == 1) {
	this.html[3] = this.html[3]+"<DIV CLASS='"+this.contenedor[1]+"' ID='"+this.contenedor[2]+"'>";
}
	
/* texto */

if (this.tipo == 1) {
	this.html[3] = this.html[3]+this.idioma[1][this.idioma[0]][0];
}

/* input text */

if (this.tipo == 2) {
	if (this.etiqueta == 1) {
		this.html[3] = this.html[3]+"<label>"+this.idioma[1][this.idioma[0]][0];
	}
	
	this.html[3] = this.html[3]+"<input type='text' class='"+this.html[0]+"' id='"+this.html[1]+"' name='"+this.html[4]+"' maxlength='"+this.valor[4]+"' value='"+this.valor[3]+"' onclick='"+this.metodos[0]+"' onchange='"+this.metodos[1]+"' />";
	
	if (this.etiqueta == 1) {
		this.html[3] = this.html[3]+"</label>";
	}
}

/* text area */

if (this.tipo == 3) {
	if (this.etiqueta == 1) {
		this.html[3] = this.html[3]+"<label>"+this.idioma[1][this.idioma[0]][0];
	}
	this.html[3] = this.html[3]+"<textarea class='"+this.html[0]+"' id='"+this.html[1]+"' name='"+this.html[4]+"'></textarea>";
	if (this.etiqueta == 1) {
		this.html[3] = this.html[3]+"</label>";
	}
}


/* boton file */


if (this.tipo == 4) {
	if (this.etiqueta == 1) {
		this.html[3] = this.html[3]+"<label>"+this.idioma[1][this.idioma[0]][0];
	}
	
	this.html[3] = this.html[3]+"<input type='file' class='"+this.html[0]+"' id='"+this.html[1]+"' name='"+this.html[4]+"' onchange='"+this.metodos[1]+"'>";
	
	if (this.etiqueta == 1) {
		this.html[3] = this.html[3]+"</label>";
	}
}

/* boton */


if (this.tipo == 5) {
	if (this.etiqueta == 1) {
		this.html[3] = this.html[3]+"<label>"+this.idioma[1][this.idioma[0]][0];
	}
	
	this.html[3] = this.html[3]+"<input type='button' class='"+this.html[0]+"' id='"+this.html[1]+"' name='"+this.html[4]+"' value='"+this.idioma[1][this.idioma[0]][0]+"' onclick='"+this.metodos[0]+"'>";
	
	if (this.etiqueta == 1) {
		this.html[3] = this.html[3]+"</label>";
	}
}

/* password */

if (this.tipo == 6) {
	if (this.etiqueta == 1) {
		this.html[3] = this.html[3]+"<label>"+this.idioma[1][this.idioma[0]][0];
	}
	
	this.html[3] = this.html[3]+"<input type='password' class='"+this.html[0]+"' id='"+this.html[1]+"' name='"+this.html[4]+"' maxlength='"+this.valor[4]+"' />";
	
	if (this.etiqueta == 1) {
		this.html[3] = this.html[3]+"</label>";
	}
}

if (this.tipo == 7) {
// radio button		
	if (this.etiqueta == 1) {
		this.html[3] = this.html[3]+"<div>"+this.idioma[1][this.idioma[0]][this.valor[4]+1]+"</div>";
	}

	for (var contador = 0; contador < this.valor[4]; contador++) {
		this.html[3] = this.html[3]+"<label>";
// PRIMERO DISCRIMINAMOS QUE TIPO DE VALOR TIENE EL RADIO BUTON 1=NUMERICO 2=CADENA
			if (this.valor[8]==1) {
// DISCRIMINAMOS SI EL VALOR ACTUAL COINCIDE CON EL VALOR DEL RADIO BUTON PARA SABER SI ESTA CHECKED O NO
				if (this.valor[7][contador]==this.valor[2]) {
					if (this.idioma[2]==1) {
						this.html[3] = this.html[3]+"<input type='radio' id='"+this.html[1]+contador+"' name='"+this.html[4]+"' value="+this.valor[7][contador]+" onclick = '"+this.metodos[0][contador]+"' onchange = '"+this.metodos[1][contador]+"' checked> "+this.idioma[1][this.idioma[0]][contador+1];
					}
					else {
						this.html[3] = this.html[3]+this.idioma[1][this.idioma[0]][contador+1]+"<input type='radio' id='"+this.html[1]+contador+"' name='"+this.html[4]+"' value="+this.valor[7][contador]+" onclick = '"+this.metodos[0][contador]+"' onchange = '"+this.metodos[1][contador]+"' checked> ";
					}
				}
				else {
					if (this.idioma[2]==1) {
						this.html[3] = this.html[3]+"<input type='radio' id='"+this.html[1]+contador+"' name='"+this.html[4]+"' value="+this.valor[7][contador]+" onclick = '"+this.metodos[0][contador]+"' onchange = '"+this.metodos[1][contador]+"'> "+this.idioma[1][this.idioma[0]][contador+1];
					}
					else {
						this.html[3] = this.html[3]+this.idioma[1][this.idioma[0]][contador+1]+"<input type='radio' id='"+this.html[1]+contador+"' name='"+this.html[4]+"' value="+this.valor[7][contador]+" onclick = '"+this.metodos[0][contador]+"' onchange = '"+this.metodos[1][contador]+"'> ";
					}
				}
			}
			if (this.valor[8]==2) {
// DISCRIMINAMOS SI EL VALOR ACTUAL COINCIDE CON EL VALOR DEL RADIO BUTON PARA SABER SI ESTA CHECKED O NO
				if (this.valor[7][contador]==this.valor[3]) {
					if (this.idioma[2]==1) {
						this.html[3] = this.html[3]+"<input type='radio' id='"+this.html[1]+contador+"' name='"+this.html[4]+"' value="+this.valor[7][contador]+" onclick = '"+this.metodos[0][contador]+"' onchange = '"+this.metodos[1][contador]+"' checked> "+this.idioma[1][this.idioma[0]][contador+1];
					}
					else {
						this.html[3] = this.html[3]+this.idioma[1][this.idioma[0]][contador+1]+"<input type='radio' id='"+this.html[1]+contador+"' name='"+this.html[4]+"' value="+this.valor[7][contador]+" onclick = '"+this.metodos[0][contador]+"' onchange = '"+this.metodos[1][contador]+"' checked> ";
					}
				}
				else {
					if (this.idioma[2]==1) {
						this.html[3] = this.html[3]+"<input type='radio' id='"+this.html[1]+contador+"' name='"+this.html[4]+"' value="+this.valor[7][contador]+" onclick = '"+this.metodos[0][contador]+"' onchange = '"+this.metodos[1][contador]+"'> "+this.idioma[1][this.idioma[0]][contador+1];
					}
					else {
						this.html[3] = this.html[3]+this.idioma[1][this.idioma[0]][contador+1]+"<input type='radio' id='"+this.html[1]+contador+"' name='"+this.html[4]+"' value="+this.valor[7][contador]+" onclick = '"+this.metodos[0][contador]+"' onchange = '"+this.metodos[1][contador]+"'> ";
					}
				}
			}
		this.html[3] = this.html[3]+"</label>";
	}

}

///////////////////////////////////
// lista desplegable
////////////////////////////////////////

if (this.tipo == 8) {
	if (this.etiqueta == 1) {
		this.html[3] = this.html[3]+"<div>"+this.idioma[1][this.idioma[0]][this.valor[4]]+"</div>";
	}
	this.html[3] = this.html[3]+"<select class='"+this.html[0]+"' name='"+this.html[4]+"' id='"+this.html[1]+"' value='"+this.valor[2]+"' onchange='"+this.metodos[1]+"'>";		
	if (this.valor[8]==1) {
		for (var contador = 0; contador < this.valor[4]; contador++) {
			if (this.valor[7][contador]==this.valor[2]) {
				this.html[3] = this.html[3]+"<option value="+this.valor[7][contador]+" selected>"+this.idioma[1][this.idioma[0]][contador+1]+"</option>";
			}
			else {
				this.html[3] = this.html[3]+"<option value="+this.valor[7][contador]+">"+this.idioma[1][this.idioma[0]][contador+1]+"</option>";
			}
		}
	}
	if (this.valor[8]==2) {
		for (var contador = 0; contador < this.valor[4]; contador++) {
			if (this.valor[7][contador]==this.valor[3]) {
				this.html[3] = this.html[3]+"<option value="+this.valor[7][contador]+" selected>"+this.idioma[1][this.idioma[0]][contador+1]+"</option>";
			}
			else {
				this.html[3] = this.html[3]+"<option value="+this.valor[7][contador]+">"+this.idioma[1][this.idioma[0]][contador+1]+"</option>";
			}
		}
	}
	this.html[3] = this.html[3]+"</select>";		
}

/* input number */

if (this.tipo == 9) {
	if (this.etiqueta == 1) {
		this.html[3] = this.html[3]+"<label>"+this.idioma[1][this.idioma[0]][0];
	}
	
	this.html[3] = this.html[3]+"<input type='number' class='"+this.html[0]+"' id='"+this.html[1]+"' name='"+this.html[4]+"' maxlength='"+this.valor[4]+"' onclick='"+this.metodos[0]+"' onchange='"+this.metodos[1]+"' value='"+this.valor[2]+"' />";
	
	if (this.etiqueta == 1) {
		this.html[3] = this.html[3]+"</label>";
	}
}

/* check box */

if (this.tipo == 10) {
	if (this.etiqueta == 1) {
		this.html[3] = this.html[3]+"<label>"+this.idioma[1][this.idioma[0]][0];
	}

	this.html[3] = this.html[3]+"<input type='checkbox' class='"+this.html[0]+"' id='"+this.html[1]+"' name='"+this.html[4]+"'/>";
	
	if (this.etiqueta == 1) {
		this.html[3] = this.html[3]+"</label>";
	}
}

/* list file */


if (this.tipo == 11) {
	if (this.etiqueta == 1) {
		this.html[3] = this.html[3]+"<label>"+this.idioma[1][this.idioma[0]][0];
	}
	
	this.html[3] = this.html[3]+"<input type='file' class='"+this.html[0]+"' id='"+this.html[1]+"' name='"+this.html[4]+"' onchange='"+this.metodos[1]+"'>";
	
	if (this.etiqueta == 1) {
		this.html[3] = this.html[3]+"</label>";
	}
}

/* date */

if (this.tipo == 12) {
	if (this.etiqueta == 1) {
		this.html[3] = this.html[3]+"<label>"+this.idioma[1][this.idioma[0]][0];
	}
	
	this.html[3] = this.html[3]+"<input type='date' class='"+this.html[0]+"' id='"+this.html[1]+"' name='"+this.html[4]+"' maxlength='"+this.valor[4]+"' value='"+this.valor[3]+"' onclick='"+this.metodos[0]+"' onchange='"+this.metodos[1]+"' />";
	
	if (this.etiqueta == 1) {
		this.html[3] = this.html[3]+"</label>";
	}
}

/* checkbox */

if (this.tipo == 13) {
	if (this.etiqueta == 1) {
		this.html[3] = this.html[3]+"<label>"+this.idioma[1][this.idioma[0]][0];
	}
	if (this.valor[2]==0) {
		this.html[3] = this.html[3]+"<input type='checkbox' class='"+this.html[0]+"' id='"+this.html[1]+"' name='"+this.html[4]+"' value='1' onclick='"+this.metodos[0]+"' onchange='"+this.metodos[1]+"'> "+this.idioma[1][this.idioma[0]][0];
	}
	if (this.valor[2]==1) {
		this.html[3] = this.html[3]+"<input type='checkbox' class='"+this.html[0]+"' id='"+this.html[1]+"' name='"+this.html[4]+"' value='1' onclick='"+this.metodos[0]+"' onchange='"+this.metodos[1]+"' checked> "+this.idioma[1][this.idioma[0]][0];
	}
	
	if (this.etiqueta == 1) {
		this.html[3] = this.html[3]+"</label>";
	}
}

if (this.contenedor[0] == 1) {
	this.html[3] = this.html[3]+"</DIV>";
}

};	   						

Control.prototype.imprimehtml = function() {
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
Control.prototype.imprimehtml_nuevo = function() {
	$(this.html[2]).html(this.html[3]);
};	   						
Control.prototype.imprimehtml_agrega = function() {
	$(this.html[2]).append(this.html[3]);
};	   						
Control.prototype.actualizavalor = function() {

	if (this.tipo == 7) {

		for (var contador = 0; contador < this.valor[4]; contador++) {
			if (document.getElementById(this.html[1]+contador).checked)  {


				if (this.valor[7][1]==1) {
					this.valor[0] = this.valor[5][contador];
				}
				if (this.valor[7][1]==2) {
					this.valor[0] = this.valor[5][contador];

				}
			}
		}
	}
	if (this.tipo == 8) {
		this.valor[2] = document.getElementById(this.html[1]).value; 
	}
};	   						


Control.prototype.limpia = function() {
	
	this.valor[0] = 0;
	this.valor[1] = "";
	this.valor[2] = 0;
	this.valor[3] = "";

	this.generahtml();
	this.imprimehtml();

};	   						
	
Control.prototype.verificavacio = function() {
	if (this.tipo==2) {
		if (document.getElementById(this.html[1]).value=="") {
			this.valor[6] = 1;
		}
		else {
			this.valor[6] = 0;
		}

	}
	if (this.tipo==9) {
		if (document.getElementById(this.html[1]).value==0) {
			this.valor[6] = 1;
		}
		else {
			this.valor[6] = 0;
		}
	}
};	   						
Control.prototype.traduce = function(par_idioma) {
    this.idioma[0] = par_idioma;
};	   						
	
Control.prototype.recogevalor = function() {

	alert("estoy en recoge valor");

// INPUT TEXT	
	if (this.tipo==2) {
		this.valor[3] = document.getElementById(this.html[1]).value; 
	}
// LISTA TENDEDERO	
	if (this.tipo==8) {
		alert("estoy en recoge valor tipo 8");
		if (this.valor[8]==1) {
			this.valor[2] = document.getElementById(this.html[1]).value; 
		}
		if (this.valor[8]==2) {
			this.valor[3] = document.getElementById(this.html[1]).value; 
		}
	}
// INPUT NUMBER	
	if (this.tipo==9) {
		this.valor[2] = document.getElementById(this.html[1]).value; 
	}
// DATE	
	if (this.tipo==12) {
		this.valor[3] = document.getElementById(this.html[1]).value; 
	}
// CHECKBOX	
	if (this.tipo==13) {
		if (document.getElementById(this.html[1]).checked) {
			this.valor[2] = 1; 
		}
		else {
			this.valor[2] = 0; 
		}
	}
};	   						
Control.prototype.recogevalor_p = function(parametro_id) {
	// RADIO BUTON
		if (this.tipo==7) {

			if (this.valor[8]==1) {
				this.valor[2] = document.getElementById(this.html[1]+parametro_id).value; 
			}
			if (this.valor[8]==2) {
				this.valor[3] = document.getElementById(this.html[1]+parametro_id).value; 
			}
		
		}
}	   						
Control.prototype.muestravalor = function() {
}	   						
	
Control.prototype.checa = function() {
	if (this.tipo==13) {
		if (document.getElementById(this.html[1]).checked) {
		}
		else {
//			document.getElementById(this.html[1]).click(); 
			document.getElementById(this.html[1]).checked = true; 
		}
	}
}	   						
Control.prototype.nocheca = function() {
	if (this.tipo==13) {
		if (document.getElementById(this.html[1]).checked) {
//			document.getElementById(this.html[1]).click(); 
			document.getElementById(this.html[1]).checked = false; 
		}
	}
}	   						
