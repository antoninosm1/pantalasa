function index() {
	alert("estoy vivo");

// ****************************************************************
// ****************************************************************
// ESTABLECE SISTEMA 
// ****************************************************************
// ****************************************************************

// OBEJTO 1 Sistema "sdhybc"

    var Sistema_sdhybc = new System(sistema_id, sistema_tech_name, 'SDHYBC', 'SECRETARÍA DE DESARROLLO HUMANO Y BIENESTAR COMUNITARIO', '');

// ****************************************************************
// ****************************************************************
// ESTABLECE PANTALLA
// ****************************************************************
// ****************************************************************

// OBEJTO 2 Pantalla "SDHYBC LOGIN"

	var objetos_pantalla = [];
	var Pantalla_sdhybc_login = new Pantalla(idioma, 1, "index.php", "SDHYBC LOGIN", "", "", objetos_pantalla, "");

// ****************************************************************
// ****************************************************************
// MAQUETA PRINCIPAL
// ****************************************************************
// ****************************************************************

// OBJETO 3 Maqueta MAQUETA_SDHYBC maqueta principal de 5 posiciones
	
    var inglesIdioma = ["LOGIN", "USER", "PASS", "BUTTON", "HELP"];
	var espanolIdioma = ["LOGIN", "USUARIO", "CONTRASEÑA", "ACCEDER", "Olvidé mi contraseña"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 5;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_ventana", "ID_SDHYBC_LOGIN_MAQUETA", "#ID_SDHYBC_BODY"];
	var codigos = [""];
	var elementosId = ["titulo_ventana", "area_input", "area_input", "area_button", "area_link"];
	var elementosClass = ["ID_SDHYBC_LOGIN_TITULO", "ID_SDHYBC_LOGIN_USER", "ID_SDHYBC_LOGIN_PASS", "ID_SDHYBC_LOGIN_BUTTON", "ID_SDHYBC_LOGIN_HELP"];
	var elementos = [elementosId, elementosClass];
	var Maqueta_login = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_login.generahtml();
	Maqueta_login.imprimehtml();
	Pantalla_sdhybc_login.objetos.push(Maqueta_login);

// OBJETO 4 Input ID_LOGIN_USER input de usuario

	var inglesIdioma = ["USER", "USER"];
	var espanolIdioma = ["USUARIO", "USUARIO"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 0;
	var tipoInput = "text";
	var dimensionInput = 60;
	var etiquetaInput = 0;
	var configuraciones = [controlIdioma, tipoImpresion, tipoInput, dimensionInput, etiquetaInput];
	var etiquetas = ["login_user_input", "ID_SDHYBC_LOGIN_USER_INPUT", "#ID_SDHYBC_LOGIN_USER", "user_login"];
	var codigos = [""];
	var valores = ["", ""];
	var metodos = ['onchange="User_login.actualizavalor()"'];
	var User_login = new Input(configuraciones, etiquetas, codigos, valores, metodos);
	User_login.generahtml();
	User_login.imprimehtml();
	Pantalla_sdhybc_login.objetos.push(User_login);

// OBJETO 5 Input ID_LOGIN_PASS input de password
alert("estoy vivo");
	
	var inglesIdioma = ["PASSWORD", "PASSWORD"];
	var espanolIdioma = ["CONTRASEÑA", "CONTRASEÑA"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 0;
	var tipoInput = "password";
	var dimensionInput = 60;
	var etiquetaInput = 0;
	var configuraciones = [controlIdioma, tipoImpresion, tipoInput, dimensionInput, etiquetaInput];
	var etiquetas = ["login_pass_input", "ID_SDHYBC_LOGIN_PASS_INPUT", "#ID_SDHYBC_LOGIN_PASS", "pass_login"];
	var codigos = [""];
	var valores = ["", ""];
	var metodos = ['onchange="Pass_login.actualizavalor()"'];
	var Pass_login = new Input(configuraciones, etiquetas, codigos, valores, metodos);
	Pass_login.generahtml();
	Pass_login.imprimehtml();
	Pantalla_sdhybc_login.objetos.push(Pass_login);

// OBJETO 6 Button ID_LOGIN_BUTTON boton de formulario login
alert("estoy vivo");
	
	var inglesIdioma = ["ACCES"];
	var espanolIdioma = ["ACCEDER"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 0;
	var etiquetaInput = 0;
	var configuraciones = [controlIdioma, tipoImpresion, etiquetaInput];
	var etiquetas = ["login_button", "ID_SDHYBC_LOGIN_BUTTON_INPUT", "#ID_SDHYBC_LOGIN_BUTTON", "pass_login"];
	var codigos = [""];
	var metodos = ['onchange="Pass_login.actualizavalor()"'];
	var Button_login = new Button(configuraciones, etiquetas, codigos, metodos);
	Button_login.generahtml();
	Button_login.imprimehtml();
	Pantalla_sdhybc_login.objetos.push(Button_login);

	alert("estoy vivo");
}
