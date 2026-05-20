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
		<title>COMERCIO SOLIDARIO</title>
        <link rel="icon" href="../icons8-favicon.gif" type="image/x-icon">
		<link rel="stylesheet" href="../../pantalib/css/comerciosolidario_home.css">
		<link rel="stylesheet" href="../../pantalib/fontawesome/css/all.css">
		<script src="../../pantalib/jquery/jquery.js"></script>
		<script src="../../pantalib/javascript/objetos/new/System.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Pantalla.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Maqueta.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Html.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Menu.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Modal.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Session.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Load.js"></script>
    </head>
    <body class="maqueta_base" id="ID_COMERCIOSOLIDARIO_HOME_BODY">
        HOME COMERCIO SOLIDARIO
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
//	var usuarioID = <?php echo json_encode($_SESSION['User'] -> elementos[0][0]); ?>;
	var usuarioID = 1;
//	var usuarioName = <?php echo json_encode($_SESSION['User'] -> elementos[0][1]." ".$_SESSION['User'] -> elementos[0][2]." ".$_SESSION['User'] -> elementos[0][3]); ?>;
	var usuarioName = "PILOTO";
	var usuarioStatus = 1;
//	var usuarioStatus = <?php echo json_encode($_SESSION['User'] -> elementos[0][6]); ?>;
//	var session = <?php echo json_encode($_SESSION['session'] -> configuraciones[0]); ?>;
	var session = 2;

	var idCode = 2;
	var statusSessiono = [1, 2, 3, 4];
	var statusCheck = 1;
	var scarlet = [idCode, statusSessiono, statusCheck, usuarioStatus];
	var scriptPhp = ['session_cierra_comerciosolidario.php', 'session_abre_comerciosolidario.php'];
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

// OBEJTO 1 Sistema "comerciosolidario"

	var Sistema_comerciosolidario = new System(sistema_id, sistema_tech_name, 'COMERCIO SOLIDARIO', 'PLATAFORMA DE COMERCIO SOLIDARIO', '');

// ****************************************************************
// ****************************************************************
// ESTABLECE PANTALLA
// ****************************************************************
// ****************************************************************

// OBEJTO 2 Pantalla "COMERCIO SOLIDARIO COMERCIAR" (Principal)

	var objetos_pantalla = [];
	var dimensiones = [];
	var configuraciones = [dimensiones];
	var Pantalla_comerciosolidario_gen = new Pantalla(idioma, 2, "home.php", "COMERCIO SOLIDARIO COMERCIAR", "", "", objetos_pantalla, "", Sistema_comerciosolidario, "../index.php", configuraciones);

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
	var etiquetas = ["maqueta_01", "ID_GEN_MAQUETA", "#ID_COMERCIOSOLIDARIO_HOME_BODY"];
	var codigos = [""];
	var elementosClass = ["area_cinta", "area_cabeza", "area_cuerpo", "area_pie"];
	var elementosId = ["ID_GEN_01", "ID_GEN_02", "ID_GEN_03", "ID_GEN_04"];
	var elementos = [elementosClass, elementosId];
	var maqueta_01 = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	maqueta_01.generahtml();
	maqueta_01.imprimehtml();
	Pantalla_comerciosolidario_gen.objetos.push(maqueta_01);

// OBJETO Maqueta ID_GEN_01_MAQUETA maqueta de 3 posiciones para organizar la barra de estado
	
	var inglesIdioma = ["COMERCIO SOLIDARIO SYSTEM", "", "USER"];
	var espanolIdioma = ["ONLINE", "", "USUARIO"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 3;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["area_cinta", "ID_GEN_01_MAQUETA", "#ID_GEN_01"];
	var codigos = [""];
	var elementosClass = ["area_cinta", "area_cinta", "area_cinta"];
	var elementosId = ["ID_GEN_01_NAME", "ID_GEN_01_AVISO", "ID_GEN_01_USER"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_user = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_user.generahtml();
	Maqueta_user.imprimehtml();
	Pantalla_comerciosolidario_gen.objetos.push(Maqueta_user);

// OBJETO x Html ID_GEN_MAQUETA_USER HTML DIRECTO PARA PRINTAR EL USUARIO

	var inglesIdioma = ['USER: '+usuarioName];
	var espanolIdioma = ['USUARIO: '+usuarioName];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 0;
	var configuraciones = [controlIdioma, tipoImpresion];
	var etiquetas = "#ID_GEN_01_USER";
	var codigos = "";
	var User_name = new Html(configuraciones, etiquetas, codigos);
	User_name.generahtml();
	User_name.imprimehtml();
	Pantalla_comerciosolidario_gen.objetos.push(User_name);

// OBJETO Maqueta ID_GEN_02_MAQUETA maqueta de 2 posiciones para organizar la cabecera
	
	var inglesIdioma = ["<A CLASS='postit'>SISTEMA DE COMERCIO SOLIDARIO</A>", "MENU"];
	var espanolIdioma = ["<A CLASS='postit'>PLATAFORMA DE COMERCIO SOLIDARIO</A>", "MENU"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 2;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["area_cabecera", "ID_GEN_02_MAQUETA", "#ID_GEN_02"];
	var codigos = [""];
	var elementosClass = ["area_titulo_pantalla", "area_menu_centro"];
	var elementosId = ["ID_GEN_02_TITULO", "ID_GEN_02_MENUCENTRO"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_cabeza = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_cabeza.generahtml();
	Maqueta_cabeza.imprimehtml();
	Pantalla_comerciosolidario_gen.objetos.push(Maqueta_cabeza);

// OBJETO Menu MENU CENTRAL
	
	var titulosIngles = ['USER', 'USERS', 'USERS', 'SUPPORT', 'RESUME', 'SUPPORT'];
	var iconosIngles = ['fa-solid fa-user', 'fa-solid fa-user-group disabled', 'fa-solid fa-user-group disabled', 'fa-solid fa-handshake disabled', 'fa-solid fa-table', 'fa-solid fa-handshake disabled'];
	var enlacesIngles = ['javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['COMUNIDAD', 'PUNTOS', 'PRODUCTOS', 'ACOPIO', 'CONFIGURACIÓN', 'SALIR'];
	var iconosEspanol = ['fa-solid fa-people-group', 'fa-solid fa-arrows-to-circle', 'fa-solid fa-boxes-stacked', 'fa-solid fa-boxes-packing', 'fa-solid fa-gears', 'fa-solid fa-door-open'];
	var enlacesEspanol = ['javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)'];
	var espanolIdioma = [titulosEspanol, iconosEspanol, enlacesEspanol];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 6;
	var tipoImpresion = 0;
	var tipoMenu = 0;
	var nivelesStatus = [1, 2, 3, 4];
	var statusUno = [1, 1, 1, 1, 1, 1]; 
	var statusDos = [1, 1, 1, 1, 1, 1]; 
	var statusTres = [1, 1, 1, 1, 1, 1]; 
	var statusCuatro = [1, 1, 1, 1, 1, 1]; 
	var statusArreglo = [statusUno, statusDos, statusTres, statusCuatro];
	var statusUser = [usuarioStatus, nivelesStatus, statusArreglo];
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, tipoMenu, statusUser];
	var etiquetas = ['menu_elementos', 'ID_GEN_02_MENUCENTRO_ELEMENTOS', '#ID_GEN_02_MENUCENTRO'];
	var codigosHtml = "";
	var codigos = [codigosHtml];
	var elementosClass = ['boton_menu_cuadro', 'boton_menu_cuadro', 'boton_menu_cuadro', 'boton_menu_cuadro', 'boton_menu_cuadro', 'boton_menu_cuadro'];
	var elementosId = ['ID_GEN_02_MENUCENTRO_ELEMENTOS_01', 'ID_GEN_02_MENUCENTRO_ELEMENTOS_02', 'ID_GEN_02_MENUCENTRO_ELEMENTOS_03', 'ID_GEN_02_MENUCENTRO_ELEMENTOS_04', 'ID_GEN_02_MENUCENTRO_ELEMENTOS_05', 'ID_GEN_02_MENUCENTRO_ELEMENTOS_06'];
	var elementosIcono = [1, 1, 1, 1, 1, 1];
	var elementosOrdenIcono = [0, 0, 0, 0, 0, 0];
	var elementosMetodos = [
		
		[['ONCLICK'], ['window.location.replace(`comunidad.php`)']],
		[['ONCLICK'], ['window.location.replace(`puntos.php`)']],
		[['ONCLICK'], ['window.location.replace(`productos.php`)']],
		[['ONCLICK'], ['window.location.replace(`acopio.php`)']],
		[['ONCLICK'], ['window.location.replace(`configuracion.php`)']],
		[['ONCLICK'], ['window.location.replace(`salir.php`)']]
	
	];
	var elementos = [elementosClass, elementosId, elementosIcono, elementosOrdenIcono, elementosMetodos];
	var Menu_central = new Menu(configuraciones, etiquetas, codigos, elementos);
	Menu_central.generahtml_status();
	Menu_central.imprimehtml();
	Pantalla_comerciosolidario_gen.objetos.push(Menu_central);

	// CLASE........: Load
	// INSTANCIA....: Load_puntos
	// SE INSERTA EN: #ID_GEN_03	
	// DESCRIPCION..: Inserta codigo HTML comerciar_puntos.html en el area de trabajo
	// IMPRESION....: Despues de ser creado, sustitutivo

	var tipoImpresion = 0;
	var configuraciones = [tipoImpresion];
	var etiquetas = ["../html/comerciar_puntos.html", "#ID_GEN_03"];
	var Load_puntos = new Load(configuraciones, etiquetas);
	Load_puntos.imprimehtml()	

</script>