function Toggle() {

	const navMenu = document.querySelector(".menu_lista");
	navMenu.classList.toggle("menu_lista_visible");

}

function clickescondido() {
	alert("estoy en click escondido");
	
	document.getElementById("ID_FILELIST_MAQUETA_INPUTFILE").click();
	alert("estoy en click escondido");
	
}

function filecambiavalor() {

	var file_puente = document.getElementById("ID_SUBE_FORMULARIO").value;
	
	
	file_puente = file_puente.replace("fakepath", "...");
	
	
	$("#ID_FORMULARIO_VALOR_AREA").html(file_puente);

}

function formularioenvia() {
	Formulario.validaformulario();
	if (Formulario.especificaciones[4]==0) {
		window.scrollTo(0,0)
		document.getElementById("ID_MODAL_CROSSCFC").style.display = "block";
		if (idioma == 0) {
			TituloModal.etiqueta[1] = "FIELDS (*) ARE REQUIRED";
		}
		if (idioma == 1) {
			TituloModal.etiqueta[1] = "LOS CAMPOS (*) SON OBLIGATORIOS";
		}
		if (idioma == 2) {
			TituloModal.etiqueta[1] = "LAOS CAIMPOS (*) SON NECESARUS";
		}
		TituloModal.generahtml();
		$(TituloModal.html[2]).html(TituloModal.html[3]);
		TextoModal.generahtml();
		$(TextoModal.html[2]).html(TextoModal.html[3]);
	
		var contenedorControl = [0, "", ""];
		var label = [0, "OK"];
		var valor = [0, "", 0, "", 0];
		var metodos = ["oksimple()", ""];
		var html = ["link_boton_formulario_02", "ID_LINK_OK_BACK_MODAL", "#ID_MODAL_BOTONES", "", "okback"];
		var LinkOkBackModal = new Control2(contenedorControl, 5, label, valor, metodos, html);
		LinkOkBackModal.generahtml();
		var acumula_html = LinkOkBackModal.html[3];
		$(LinkOkBackModal.html[2]).html(acumula_html);

	}
	Formulario.procesaformulario();
}
function oksimple() {
    window.scrollTo(0,0)
    document.getElementById("ID_MODAL_CROSSCFC").style.display = "none";
}
