<?php
// VINCULAMOS CLASES PHP
	require_once "../../pantalib/php/objetos/new/Sistema.php";
	require_once "../../pantalib/php/objetos/new/User.php";
	require_once "../../pantalib/php/objetos/new/Log.php";
	require_once "../../pantalib/php/objetos/new/Session.php";
	session_start();
	if (!isset($_SESSION['Sistema'])) {
		header('Location: ../index.php');
	}
	header('Content-Type: text/html; charset=UTF-8');

// ESTABLECEMOS PARAMETROS DE LOG
	$_SESSION['logPhp']->configuraciones[2] = '';

?>
<!DOCTYPE html>
<html lang="es_MX">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>SDHyBC</title>
        <link rel="icon" href="../icons8-favicon.gif" type="image/x-icon">
		<link rel="stylesheet" href="../../pantalib/css/sdhybc.css">
		<link rel="stylesheet" href="../../pantalib/fontawesome/css/all.css">
		<script src="../../pantalib/jquery/jquery.js"></script>
		<script src="../../pantalib/javascript/objetos/new/System.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Pantalla.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Maqueta.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Html.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Menu.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Modal.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Session.js"></script>
    </head>
    <body class="maqueta_base" id="ID_SDHYBC_HOME_BODY">
        HOME SDHYBC 
    </body>
</html>
<script>

// ****************************************************************
// ****************************************************************
// ESTABLECE VARIABLES GENERALES
// ****************************************************************
// ****************************************************************

	var idioma = <?php echo json_encode($_SESSION['Sistema'] -> configuraciones[2]); ?>;
    var sistema_id = <?php echo json_encode($_SESSION['Sistema'] -> configuraciones[0]); ?>;
    var sistema_tech_name = <?php echo json_encode($_SESSION['Sistema'] -> configuraciones[1]); ?>;
	var usuarioID = <?php echo json_encode($_SESSION['User'] -> elementos[0][0]); ?>;
	var usuarioName = <?php echo json_encode($_SESSION['User'] -> elementos[0][1]." ".$_SESSION['User'] -> elementos[0][2]." ".$_SESSION['User'] -> elementos[0][3]); ?>;
	var usuarioStatus = <?php echo json_encode($_SESSION['User'] -> elementos[0][6]); ?>;
	var session = <?php echo json_encode($_SESSION['session'] -> configuraciones[0]); ?>;

	var idCode = 2;
	var statusSessiono = [1, 2, 3, 4];
	var statusCheck = 1;
	var scarlet = [idCode, statusSessiono, statusCheck, usuarioStatus];
	var scriptPhp = ['session_cierra_sdhybc.php', 'session_abre_sdhybc.php'];
	var metodoPhp = 'POST';
	var configuraciones = [scarlet, scriptPhp, metodoPhp];
	var codigos = [''];
	var Session_revisa = new Session(configuraciones, codigos);

	Session_revisa.revisa(usuarioID, session, 'salida.php');


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

// OBEJTO 2 Pantalla "SDHYBC HOME"

	var objetos_pantalla = [];
	var dimensiones = [];
	var configuraciones = [dimensiones];
	var Pantalla_sdhybc_gen = new Pantalla(idioma, 2, "home.php", "SDHYBC HOME", "", "", objetos_pantalla, "", Sistema_sdhybc, "../index.php", configuraciones);

// ****************************************************************
// ****************************************************************
// MAQUETA PRINCIPAL
// ****************************************************************
// ****************************************************************

// OBJETO 3 Maqueta ID_GEN_MAQUETA maqueta principal de 5 posiciones
	
	var inglesIdioma = ["STATUS", "HEAD", "BODY", ""];
	var espanolIdioma = ["ESTADO", "CABEZA", "CUERPO", ""];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 4;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_01", "ID_GEN_MAQUETA", "#ID_SDHYBC_HOME_BODY"];
	var codigos = [""];
	var elementosClass = ["area_cinta", "area_cabeza", "area_cuerpo", "area_pie"];
	var elementosId = ["ID_GEN_STATUS", "ID_GEN_CABEZA", "ID_GEN_CUERPO", "ID_GEN_PIE"];
	var elementos = [elementosClass, elementosId];
	var maqueta_01 = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	maqueta_01.generahtml();
	maqueta_01.imprimehtml();
	Pantalla_sdhybc_gen.objetos.push(maqueta_01);

// OBJETO Maqueta ID_GEN_STATUS_MAQUETA maqueta de 3 posiciones para organizar la barra de estado
	
	var inglesIdioma = ["SDHYBC SYSTEM", "", "USER"];
	var espanolIdioma = ["SISTEMA SDHYBC", "", "USUARIO"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 3;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["area_cinta", "ID_GEN_STATUS_MAQUETA", "#ID_GEN_STATUS"];
	var codigos = [""];
	var elementosClass = ["area_cinta", "area_cinta", "area_cinta"];
	var elementosId = ["ID_GEN_STATUS_NAME", "ID_GEN_STATUS_AVISO", "ID_GEN_STATUS_USER"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_user = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_user.generahtml();
	Maqueta_user.imprimehtml();
	Pantalla_sdhybc_gen.objetos.push(Maqueta_user);

// OBJETO x Html ID_GEN_MAQUETA_USER HTML DIRECTO PARA PRINTAR EL USUARIO

	var inglesIdioma = ['USER: '+usuarioName];
	var espanolIdioma = ['USUARIO: '+usuarioName];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 0;
	var configuraciones = [controlIdioma, tipoImpresion];
	var etiquetas = "#ID_GEN_STATUS_USER";
	var codigos = "";
	var User_name = new Html(configuraciones, etiquetas, codigos);
	User_name.generahtml();
	User_name.imprimehtml();
	Pantalla_sdhybc_gen.objetos.push(User_name);

// OBJETO Maqueta ID_GEN_CABEZA_MAQUETA maqueta de 4 posiciones para organizar la cabecera
	
	var inglesIdioma = ["SDHYBC", "MENU 1", "MENU 2", "MENU 3"];
	var espanolIdioma = ["SDHYBC", "MENU 1", "MENU 2", "MENU 3"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 4;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["area_cabeza", "ID_GEN_CABEZA_MAQUETA", "#ID_GEN_CABEZA"];
	var codigos = [""];
	var elementosClass = ["area_titulo_pantalla", "area_menu_izq", "area_menu_centro", "area_menu_der"];
	var elementosId = ["ID_GEN_CABEZA_TITULO", "ID_GEN_CABEZA_MENUIZQ", "ID_GEN_CABEZA_MENUCENTRO", "ID_GEN_CABEZA_MENUDER"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_cabeza = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_cabeza.generahtml();
	Maqueta_cabeza.imprimehtml();
	Pantalla_sdhybc_gen.objetos.push(Maqueta_cabeza);

// OBJETO Menu MENU IZQUIERDA
	
	var titulosIngles = ['HOME'];
	var iconosIngles = ['fa-solid fa-home'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['INICIO'];
	var iconosEspanol = ['fa-solid fa-home'];
	var enlacesEspanol = ['javascript:void(0)'];
	var espanolIdioma = [titulosEspanol, iconosEspanol, enlacesEspanol];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 1;
	var tipoImpresion = 0;
	var tipoMenu = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, tipoMenu];
	var etiquetas = ['menu_elementos', 'ID_GEN_CABEZA_MENUIZQ_ELEMENTOS', '#ID_GEN_CABEZA_MENUIZQ'];
	var codigosHtml = "";
	var codigos = [codigosHtml];
	var elementosClass = ['boton_menu_cuadro'];
	var elementosId = ['ID_GEN_CABEZA_MENUIZQ_ELEMENTOS_01'];
	var elementosIcono = [1];
	var elementosOrdenIcono = [0];
	var elementosMetodos = [[['ONCLICK'], ['window.location.replace(`home.php`)']]];
	var elementos = [elementosClass, elementosId, elementosIcono, elementosOrdenIcono, elementosMetodos];
	var Menu_izquierda = new Menu(configuraciones, etiquetas, codigos, elementos);
	Menu_izquierda.generahtml();
	Menu_izquierda.imprimehtml();
	Pantalla_sdhybc_gen.objetos.push(Menu_izquierda);

// OBJETO Menu MENU CENTRAL
	
	var titulosIngles = ['INPUT', 'USER', 'USERS', 'SUPPORT', 'RESUME'];
	var iconosIngles = ['fa-solid fa-pen-to-square', 'fa-solid fa-user', 'fa-solid fa-user-group disabled', 'fa-solid fa-handshake disabled', 'fa-solid fa-table'];
	var enlacesIngles = ['javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['CAPTURA', 'CUENTA', 'USUARIOS', 'APOYOS', 'RESUMEN'];
	var iconosEspanol = ['fa-solid fa-pen-to-square', 'fa-solid fa-user', 'fa-solid fa-user-group', 'fa-solid fa-handshake', 'fa-solid fa-table'];
	var enlacesEspanol = ['javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)'];
	var espanolIdioma = [titulosEspanol, iconosEspanol, enlacesEspanol];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 5;
	var tipoImpresion = 0;
	var tipoMenu = 0;
	var nivelesStatus = [1, 2, 3, 4, 5];
	var statusUno = [1, 1, 1, 1, 1]; 
	var statusDos = [1, 1, 1, 1, 1]; 
	var statusTres = [1, 1, 0, 1, 1]; 
	var statusCuatro = [0, 1, 0, 0, 1]; 
	var statusCinco = [0, 1, 0, 0, 0]; 
	var statusArreglo = [statusUno, statusDos, statusTres, statusCuatro, statusCinco];
	var statusUser = [usuarioStatus, nivelesStatus, statusArreglo];
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, tipoMenu, statusUser];
	var etiquetas = ['menu_elementos', 'ID_GEN_CABEZA_MENUCENTRO_ELEMENTOS', '#ID_GEN_CABEZA_MENUCENTRO'];
	var codigosHtml = "";
	var codigos = [codigosHtml];
	var elementosClass = ['boton_menu_cuadro', 'boton_menu_cuadro', 'boton_menu_cuadro', 'boton_menu_cuadro', 'boton_menu_cuadro'];
	var elementosId = ['ID_GEN_CABEZA_MENUCENTRO_ELEMENTOS_01', 'ID_GEN_CABEZA_MENUCENTRO_ELEMENTOS_02', 'ID_GEN_CABEZA_MENUCENTRO_ELEMENTOS_03', 'ID_GEN_CABEZA_MENUCENTRO_ELEMENTOS_04', 'ID_GEN_CABEZA_MENUCENTRO_ELEMENTOS_05'];
	var elementosIcono = [1, 1, 1, 1, 1];
	var elementosOrdenIcono = [0, 0, 0, 0, 0];
	var elementosMetodos = [
		
		[['ONCLICK'], ['window.location.replace(`captura.php`)']],
		[['ONCLICK'], ['window.location.replace(`cuenta.php`)']],
		[['ONCLICK'], ['window.location.replace(`usuarios.php`)']],
		[['ONCLICK'], ['window.location.replace(`apoyos.php`)']],
		[['ONCLICK'], ['window.location.replace(`resume.php`)']]
	
	];
	var elementos = [elementosClass, elementosId, elementosIcono, elementosOrdenIcono, elementosMetodos];
	var Menu_central = new Menu(configuraciones, etiquetas, codigos, elementos);
	Menu_central.generahtml_status();
	Menu_central.imprimehtml();
	Pantalla_sdhybc_gen.objetos.push(Menu_central);

// OBJETO Menu MENU IZQUIERDA
	
	var titulosIngles = ['EXIT'];
	var iconosIngles = ['fa-solid fa-door-open'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['SALIDA'];
	var iconosEspanol = ['fa-solid fa-door-open'];
	var enlacesEspanol = ['javascript:void(0)'];
	var espanolIdioma = [titulosEspanol, iconosEspanol, enlacesEspanol];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 1;
	var tipoImpresion = 0;
	var tipoMenu = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, tipoMenu];
	var etiquetas = ['menu_elementos', 'ID_GEN_CABEZA_MENUDER_ELEMENTOS', '#ID_GEN_CABEZA_MENUDER'];
	var codigosHtml = "";
	var codigos = [codigosHtml];
	var elementosClass = ['boton_menu_cuadro'];
	var elementosId = ['ID_GEN_CABEZA_MENUDER_ELEMENTOS_01'];
	var elementosIcono = [1];
	var elementosOrdenIcono = [0];
	var elementosMetodos = [[['ONCLICK'], ['window.location.replace(`salida.php`)']]];
	var elementos = [elementosClass, elementosId, elementosIcono, elementosOrdenIcono, elementosMetodos];
	var Menu_derecha = new Menu(configuraciones, etiquetas, codigos, elementos);
	Menu_derecha.generahtml();
	Menu_derecha.imprimehtml();
	Pantalla_sdhybc_gen.objetos.push(Menu_derecha);

// OBJETO 3 Maqueta ID_GEN_MAQUETA_CUERPO maqueta principal de 3 posiciones
	
	var inglesIdioma = ["", "", ""];
	var espanolIdioma = ["", "", ""];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 3;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_01_cuerpo", "ID_GEN_MAQUETA_CUERPO", "#ID_GEN_CUERPO"];
	var codigos = [""];
	var elementosClass = ["area_lateral_izq", "area_cuerpo_principal", "area_lateral_der"];
	var elementosId = ["ID_GEN_CUERPO_IZQ", "ID_GEN_CUERPO_CENTRO", "ID_GEN_CUERPO_DER"];
	var elementos = [elementosClass, elementosId];
	var maqueta_01_cuerpo = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	maqueta_01_cuerpo.generahtml();
	maqueta_01_cuerpo.imprimehtml();
	Pantalla_sdhybc_gen.objetos.push(maqueta_01_cuerpo);

// OBJETO 3 Maqueta ID_GEN_MAQUETA_CUERPO_PRINCIPAL maqueta principal de 4 posiciones
	
	var inglesIdioma = ["HOME", "BUILDING", ""];
	var espanolIdioma = ["INICIO", "", ""];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 3;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_01_cuerpo_principal", "ID_TRABAJO", "#ID_GEN_CUERPO_CENTRO"];
	var codigos = [""];
	var elementosClass = ["area_cabeza_pantalla area_titulo_pantalla", "area_trabajo area_titulo_pantalla", "area_pie"];
	var elementosId = ["ID_TRABAJO_CABEZA", "ID_TRABAJO_ESCRITORIO", "ID_TRABAJO_PIE"];
	var elementos = [elementosClass, elementosId];
	var maqueta_01_cuerpo_principal = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	maqueta_01_cuerpo_principal.generahtml();
	maqueta_01_cuerpo_principal.imprimehtml();
	Pantalla_sdhybc_gen.objetos.push(maqueta_01_cuerpo_principal);

</script>