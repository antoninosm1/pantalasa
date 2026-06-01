<?php
	require_once "../pantalib/php/objetos/new/Sistema.php";
	require_once "../pantalib/php/objetos/new/Log.php";
	require_once "../pantalib/php/objetos/new/Session.php";
	header('Content-Type: text/html; charset=UTF-8');
	session_start();

// INICIA PROCESO PARA ESTABLECER SISTEMA   BETA
	$configuraciones = [13, 'kochi', 1, 'http://localhost/pantalasa/kochi/', 1];
	$_SESSION['Sistema'] = new Sistema($configuraciones);

// INICIA PROCESO PARA ESTABLECER LOG DE PHP
	$archivo_log = 'kriru.txt';
	$mensaje_log = date('Y-m-d H:i:s').' ESTABLECEMOS LOG PHP EN FLUJO PRINCIPAL KOCHI';
	$ruta_log = 'logs/';
	$sistema_log = $_SESSION['Sistema'];
	$configuraciones = [$archivo_log, $mensaje_log, $ruta_log, $sistema_log];
	$_SESSION['logPhp'] = new Log($configuraciones);
	$_SESSION['logPhp']->escribe_log();

// INICIA PROCESO PARA ESTABLECER SESSION
	$configuraciones = [1];
	$_SESSION['session'] = new Session($configuraciones);

	$sistema_config = $_SESSION['Sistema']->configuraciones;

?>

<!DOCTYPE html>
<html lang="es_MX">
    <head>
        <meta charset="UTF-8">
		<!-- se retira redundancia charset=iso-8859-1"/> -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>KOCHI</title>
        <link rel="icon" href="icons8-favicon.gif" type="image/x-icon">
		<link rel="stylesheet" href="../pantalib/fontawesome/css/all.css">
		<link rel="stylesheet" href="../pantalib/css/kochi/kochi.css">
		<link rel="stylesheet" href="../pantalib/css/kochi/kochi_portada.css">
		<script src="../pantalib/jquery/jquery.js"></script>
		
		<script src="../pantalib/javascript/objetos/mvvm/model/Session.js"></script>
		<script src="../pantalib/javascript/objetos/mvvm/model/System.js"></script>

		<script src="../pantalib/javascript/objetos/mvvm/view/Load.js"></script>
		<script src="../pantalib/javascript/objetos/mvvm/view/Maqueta1.js"></script>
    
		<script src="../pantalib/javascript/objetos/mvvm/viewmodel/Metodos.js"></script>
		<script src="../pantalib/javascript/objetos/mvvm/viewmodel/Scroll.js"></script>

	</head>
    <body class="contenedor_body" id="ID_kochi_BODY">
    </body>
	hola0
</html>
<script>

		console.log('INICIA JS');
// ** // ** // ** // ** // ** // ** // ** // ** // **
//////////////////////////////////////////
// ** // ** // ** // ** // ** // ** // ** // ** // **
//////////////////////////////////////////


// ** COMIENZA JS


// ** // ** // ** // ** // ** // ** // ** // ** // **
//////////////////////////////////////////
// ** // ** // ** // ** // ** // ** // ** // ** // **
//////////////////////////////////////////











// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE UNO: ESTABLECE DATOS INICIALES CLASES MODELO

// ****************************************************************
// ****************************************************************
// ****************************************************************










// ****************************************************************
// MODELS: CLASES PARA MANEJAR SESION PHP Y SISTEMA
// ****************************************************************


// CLASE........: Session
// INSTANCIA....: Session_kochi
// DESCRIPCION..: Objeto para guardar información de la session PHP en JS
// HTML.........: Se genera despues de ser creado
	
  	var idioma = <?php echo json_encode($_SESSION['Sistema']->configuraciones[2]); ?>;

    var sistema_id = <?php echo json_encode($sistema_config[0]); ?>;
	var sistema_tech_name = <?php echo json_encode($sistema_config[1]); ?>;
	var ruta = <?php echo json_encode($sistema_config[3]); ?>;
	var idCode = 1;
	var statusSessiono = [1, 2, 3, 4, 5];
	var statusCheck = 1;
	var scarlet = [idCode, statusSessiono, statusCheck, 0];
	var scriptPhp = ['php/session_cierra_kochi.php', 'php/session_abre_kochi.php'];
	var metodoPhp = 'POST';
	var configuraciones = [scarlet, scriptPhp, metodoPhp];
	var codigos = [''];
	var Session_kochi = new Session(configuraciones, codigos);

// CLASE........: System
// INSTANCIA....: Sistema_kochi
// DESCRIPCION..: Instancia para administrar sesión de PHP 
	
	var Sistema_kochi = new System(sistema_id, sistema_tech_name, 'kochi', 'PÁGINA WEB DE KOCHI', '');











// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE DOS: PARA IMPRIMIR PANTALLA CLASES VIEW

// ****************************************************************
// ****************************************************************
// ****************************************************************











// ****************************************************************
// VIEW: AREA LOAD HTML
// ****************************************************************


// CLASE........: Load
// INSTANCIA....: Load_kochi
// SE INSERTA EN: #ID_GEN_CUERPO	
// DESCRIPCION..: Inserta codigo HTML en un elemento del DOM
// IMPRESION....: Despues de ser creado, sustitutivo

	var tipoImpresion = 0;
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_portada.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var statusCallback = 1;
	var callback = [posicionCallback, metodosCallback, statusCallback];
	var configuraciones = [tipoImpresion, callback];
	var etiquetas = ["html/portada_pantalla.html", "#ID_kochi_BODY"];
	var Load_kochi = new Load(configuraciones, etiquetas);











// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE TRES: PROCESOS Y PUENTES CLASES VIEW MODEL

// ****************************************************************
// ****************************************************************
// ****************************************************************











// ****************************************************************
// VIEWMODEL: METODOS AFTER LOAD HTML   BETA
// ****************************************************************


// CLASE........: Metodos
// INSTANCIA....: Metodos_after_portada
// DESCRIPCION..: Metodos que se ejecutan despues de imprimir portada
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	
		'Scroll_pantallas.ejecuta_pantallas()'

	];
	var Metodos_after_portada = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Scroll
// INSTANCIA....: Scroll_pantallas
// DESCRIPCION..: Clase para ejecutar animaciones de scroll

	var configuraciones = ["html", 1, window.scrollY, 'pantalla_activa'];
	var pantallas = [
    	
		".postal_01",
    	".postal_02",
    	".postal_03",
    	".postal_04",
    	".postal_05",
    	".slide_01",
    	".menu_01"
	
	];
	var limites = [7, pantallas, 0];
	var Scroll_pantallas = new Scroll(configuraciones, limites);


	console.log('PUNTO DE INICIO');

	Load_kochi.imprimehtml();




</script>

