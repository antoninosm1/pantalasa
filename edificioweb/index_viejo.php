<?php
	require_once "../pantalib/php/objetos/new/Sistema.php";
	require_once "../pantalib/php/objetos/new/User.php";
	require_once "../pantalib/php/objetos/new/Log.php";
	require_once "../comerciosolidario/php/Conexion_comerciosolidario.php";
	require_once "../pantalib/php/objetos/new/Session.php";
	header('Content-Type: text/html; charset=UTF-8');
	session_start();

// INICIA PROCESO PARA ESTABLECER SISTEMA
	$configuraciones = [13, 'edificioweb', 1, 'http://localhost/pantalasa/edificioweb/', 1];
	$_SESSION['Sistema'] = new Sistema($configuraciones);

// INICIA PROCESO PARA ESTABLECER LOG DE PHP
	$archivo_log = 'kriru.txt';
	$mensaje_log = date('Y-m-d H:i:s').' ESTABLECEMOS LOG PHP EN FLUJO PRINCIPAL EDIFICIO WEB';
	$ruta_log = 'logs/';
	$sistema_log = $_SESSION['Sistema'];
	$configuraciones = [$archivo_log, $mensaje_log, $ruta_log, $sistema_log];
	$_SESSION['logPhp'] = new Log($configuraciones);
	$_SESSION['logPhp']->escribe_log();

// INICIA PROCESO PARA ESTABLECER SESSION
	$configuraciones = [1];
	$_SESSION['session'] = new Session($configuraciones);

// INICIA PROCESO PARA ESTABLECER CONEXIÓN DE BD
	$_SESSION['bd'] = new Conexion_comerciosolidario();

// INICIA PROCESO PARA ESTABLECER USUARIO VACIO
	$consulta_objeto = '';
	$configuraciones = [$consulta_objeto];
	$id_user = 0;
	$name_user = '';
	$paterno_user = '';
	$materno_user = '';
	$paterno_user = '';
	$mail_user = '';
	$pass_user = '';
	$priv_user = '';
	$confirma_user = '';
	$elementos_valores = [$id_user, $name_user, $paterno_user, $materno_user, $mail_user, $pass_user, $priv_user, $confirma_user];
	$elementos = [$elementos_valores];
	$_SESSION['User'] = new User($configuraciones, $elementos);

	$sistema_config = $_SESSION['Sistema']->configuraciones;

?>

<!DOCTYPE html>
<html lang="es_MX">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>EDIFICIO WEB</title>
        <link rel="icon" href="icons8-favicon.gif" type="image/x-icon">
		<link rel="stylesheet" href="../pantalib/fontawesome/css/all.css">
		<link rel="stylesheet" href="../pantalib/css/edificioweb.css">
		<link rel="stylesheet" href="../pantalib/css/edificioweb_portada.css">
		<script src="../pantalib/jquery/jquery.js"></script>
		
		
		<script src="../pantalib/javascript/objetos/new/Session.js"></script>
		<script src="../pantalib/javascript/objetos/new/System.js"></script>
		<script src="../pantalib/javascript/objetos/new/Consulta.js"></script>
		<script src="../pantalib/javascript/objetos/new/Phpmail.js"></script>

		<script src="../pantalib/javascript/objetos/new/Load.js"></script>
		<script src="../pantalib/javascript/objetos/new/Form.js"></script>
		<script src="../pantalib/javascript/objetos/new/Maqueta.js"></script>
		<script src="../pantalib/javascript/objetos/new/Menu.js"></script>
		<script src="../pantalib/javascript/objetos/new/Input.js"></script>
		<script src="../pantalib/javascript/objetos/new/Button.js"></script>
		<script src="../pantalib/javascript/objetos/new/Link.js"></script>
		<script src="../pantalib/javascript/objetos/new/Modal.js"></script>
		<script src="../pantalib/javascript/objetos/new/Elemento.js"></script>
    
		<script src="../pantalib/javascript/objetos/new/Pantalla.js"></script>
		<script src="../pantalib/javascript/objetos/new/Evaluacion.js"></script>
		<script src="../pantalib/javascript/objetos/new/Metodos.js"></script>
		<script src="../pantalib/javascript/objetos/new/Scroll.js"></script>
	
	
	</head>
    <body class="maqueta_base" id="ID_EDIFICIOWEB_BODY">
        EDIFICIO WEB
    </body>
</html>
<script>

	//alert("ESTOY VIVO AL INICIO 1");


// ****************************************************************
// ****************************************************************
// ESTABLECE VARIABLES GENERALES
// ****************************************************************
// ****************************************************************

  	var idioma = '<?php echo json_encode($_SESSION['Sistema'] -> configuraciones[2]); ?>';
    var sistema_id = <?php echo json_encode($sistema_config[0]); ?>;
	var sistema_tech_name = <?php echo json_encode($sistema_config[1]); ?>;
	var ruta = <?php echo json_encode($sistema_config[3]); ?>;
	var idCode = 1;
	var statusSessiono = [1, 2, 3, 4, 5];
	var statusCheck = 1;
	var scarlet = [idCode, statusSessiono, statusCheck, 0];
	var scriptPhp = ['php/session_cierra_edificioweb.php', 'php/session_abre_edificioweb.php'];
	var metodoPhp = 'POST';
	var configuraciones = [scarlet, scriptPhp, metodoPhp];
	var codigos = [''];
	var Session_revisa = new Session(configuraciones, codigos);






// ****************************************************************
// ****************************************************************
// ESTABLECE SISTEMA 
// ****************************************************************
// ****************************************************************

// OBEJTO 1 Sistema "edificioweb"

	var Sistema_edificioweb = new System(sistema_id, sistema_tech_name, 'edificioweb', 'PÁGINA WEB DEL EDIFICIO DE LOS SUEÑOS', '');


// ****************************************************************
// ****************************************************************
// ESTABLECE PANTALLA
// ****************************************************************
// ****************************************************************

// OBEJTO 2 Pantalla "EDIFICIO WEB"

	var objetos_pantalla = [];	
	var dimensiones = [];
	var configuraciones = [dimensiones];
	var Pantalla_edificioweb = new Pantalla(idioma, 1, "index.php", "PÁGINA WEB DEL EDIFICIO DE LOS SUEÑOS", "", "", objetos_pantalla, "", Sistema_edificioweb, "php/home.php", configuraciones);




// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE 2 MAQUETACION GENERAL

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

	




// CLASE........: Maqueta
// INSTANCIA....: maqueta_01
// ID...........: ID_GEN_MAQUETA
// SE INSERTA EN: #ID_EDIFICIOWEB_BODY	
// DESCRIPCION..: Maqueta principal de 3 posiciones
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustitutivo
	
	var inglesIdioma = ["BODY", "MODAL", "MODAL OPCION"];
	var espanolIdioma = ["", "MODAL", "MODAL OPCION"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 3;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_01", "ID_GEN_MAQUETA", "#ID_EDIFICIOWEB_BODY"];
	var codigos = [""];
	var elementosClass = ["area_cuerpo", "modal_oculto", "modal_oculto"];
	var elementosId = ["ID_GEN_CUERPO", "ID_GEN_MODAL", "ID_GEN_MODAL_OPCION"];
	var elementos = [elementosClass, elementosId];
	var maqueta_01 = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	maqueta_01.generahtml();
	maqueta_01.imprimehtml();

// ****************************************************************

// BLOQUE 2 MAQUETACION GENERAL - AREA DE MODALES


// CLASE........: Modal
// INSTANCIA....: Modal_aviso
// ID...........: ID_EDIFICIOWEB_MODAL_X
// SE INSERTA EN: #ID_EDIFICIOWEB_BODY	
// DESCRIPCION..: Ventana modal para avisar sin opción
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, adicional

	var inglesIdioma = [""];
	var espanolIdioma = [""];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 1;
	var botonCerrar = "";
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, botonCerrar];
	var etiquetas = ["ventana_modal", "ID_EDIFICIOWEB_MODAL_X", "#ID_EDIFICIOWEB_BODY", "#ID_KRONOX_MODAL_TITULO_X", "#ID_EDIFICIOWEB_MODAL_AVISO_X"];
	var codigos = [""];
	var Modal_aviso = new Modal(configuraciones, etiquetas, codigos);
	Modal_aviso.generahtml();
	Modal_aviso.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_aviso_modal
// ID...........: ID_EDIFICIOWEB_MODAL_MAQUETA
// SE INSERTA EN: #ID_EDIFICIOWEB_MODAL	
// DESCRIPCION..: Maqueta de 3 posiciones para organizar ventana modal de aviso
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado sustitutivo
	
	var inglesIdioma = ["AVISO", "PARA INICIAR ELÍGE TRABAJO", ""];
	var espanolIdioma = ["AVISO", "PARA INICIAR ELÍGE TRABAJO", ""];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 3;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_ventana_modal", "ID_EDIFICIOWEB_MODAL_MAQUETA_X", "#ID_EDIFICIOWEB_MODAL_X"];
	var codigos = [""];
	var elementosClass = ["titulo_ventana", "area_aviso_modal", "area_button_modal"];
	var elementosId = ["ID_EDIFICIOWEB_MODAL_TITULO_X", "ID_EDIFICIOWEB_MODAL_AVISO_X", "ID_EDIFICIOWEB_MODAL_BUTTON_X"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_aviso_modal = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_aviso_modal.generahtml();
	Maqueta_aviso_modal.imprimehtml();


// CLASE........: Modal
// INSTANCIA....: Modal_aviso_opcion
// ID...........: ID_EDIFICIOWEB_MODAL_OPCION
// SE INSERTA EN: #ID_EDIFICIOWEB_BODY	
// DESCRIPCION..: Ventana modal para pedir opción
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado adicional
	
	var inglesIdioma = [""];
	var espanolIdioma = [""];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 1;
	var botonCerrar = "";
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, botonCerrar];
	var etiquetas = ["ventana_modal", "ID_EDIFICIOWEB_MODAL_OPCION", "#ID_EDIFICIOWEB_BODY", "#ID_EDIFICIOWEB_MODAL_OPCION_TITULO", "#ID_EDIFICIOWEB_MODAL_OPCION_AVISO"];
	var codigos = [""];
	var Modal_aviso_opcion = new Modal(configuraciones, etiquetas, codigos);
	Modal_aviso_opcion.generahtml();
	Modal_aviso_opcion.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_aviso_modal_opcion
// ID...........: ID_EDIFICIOWEB_MODAL_OPCION_MAQUETA
// SE INSERTA EN: #ID_EDIFICIOWEB_MODAL_OPCION	
// DESCRIPCION..: Maqueta de 3 posiciones para organizar ventana modal para pedir opción
// HTML.........: Espera metodo
// IMPRESION....: Espera metodo, sustitutivo
	
	var inglesIdioma = ["AVISO", "CAMPO VACIO O NULO", ""];
	var espanolIdioma = ["AVISO", "CAMPO VACIO O NULO", ""];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 3;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_ventana_modal", "ID_EDIFICIOWEB_MODAL_OPCION_MAQUETA", "#ID_EDIFICIOWEB_MODAL_OPCION"];
	var codigos = [""];
	var elementosClass = ["titulo_ventana", "area_aviso_modal", "area_button_modal"];
	var elementosId = ["ID_EDIFICIOWEB_MODAL_OPCION_TITULO", "ID_EDIFICIOWEB_MODAL_OPCION_AVISO", "ID_EDIFICIOWEB_MODAL_OPCION_BUTTON"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_aviso_modal_opcion = new Maqueta(configuraciones, etiquetas, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Ok_modal
// ID...........: ID_OK_MODAL
// SE INSERTA EN: #ID_EDIFICIOWEB_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir ok en modal opcion
// HTML.........: Espera metodo
// IMPRESION....: Espera metodo, sustituye contenido

	var titulosIngles = ['OK'];
	var iconosIngles = ['fa-solid fa-thumbs-up'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['OK'];
	var iconosEspanol = ['fa-solid fa-thumbs-up'];
	var enlacesEspanol = ['javascript:void(0)'];
	var espanolIdioma = [titulosEspanol, iconosEspanol, enlacesEspanol];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 0;
	var ElementoIcono = 1;
	var OrdenIcono = 0;
	var Icono = [ElementoIcono, OrdenIcono];
	var Link = 1;
	var valoresValidcacion = [];
	var tiposValoresValidacion = [];
	var statusValidacion = [];
	var Validacion = [valoresValidcacion];
	var configuraciones = [controlIdioma, tipoImpresion, Icono, Link];
	var etiquetas = ["boton_link_icono_chico", "ID_OK_MODAL", "#ID_EDIFICIOWEB_MODAL_OPCION_BUTTON", "ok_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_aviso_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Ok_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);









// ++//++//---- ++//++//---- ++//++//---- ++//++//---- ++//++//----
// ++//++//---- ++//++//---- ++//++//---- ++//++//---- ++//++//----

// ++//++//---- ++//++//---- ++//++//---- ++//++//---- ++//++//----
// ++//++//---- ++//++//---- ++//++//---- ++//++//---- ++//++//----

// ++//++//---- ++//++//---- ++//++//---- ++//++//---- ++//++//----
// ++//++//---- ++//++//---- ++//++//---- ++//++//---- ++//++//----

// ++//++//---- ++//++//---- ++//++//---- ++//++//---- ++//++//----
// ++//++//---- ++//++//---- ++//++//---- ++//++//---- ++//++//----

// ++//++//---- ++//++//---- ++//++//---- ++//++//---- ++//++//----
// ++//++//---- ++//++//---- ++//++//---- ++//++//---- ++//++//----

// ++//++//---- ++//++//---- ++//++//---- ++//++//---- ++//++//----
// ++//++//---- ++//++//---- ++//++//---- ++//++//---- ++//++//----

// ++//++//---- ++//++//---- ++//++//---- ++//++//---- ++//++//----
// ++//++//---- ++//++//---- ++//++//---- ++//++//---- ++//++//----

// ++//++//---- ++//++//---- ++//++//---- ++//++//---- ++//++//----
// ++//++//---- ++//++//---- ++//++//---- ++//++//---- ++//++//----

// ****************************************************************
// ****************************************************************
// MAQUETA PRINCIPAL
// ****************************************************************
// ****************************************************************

// ++//++//---- ++//++//---- ++//++//---- ++//++//---- ++//++//----
// ++//++//---- ++//++//---- ++//++//---- ++//++//---- ++//++//----

// ++//++//---- ++//++//---- ++//++//---- ++//++//---- ++//++//----
// ++//++//---- ++//++//---- ++//++//---- ++//++//---- ++//++//----


// CLASE........: Load
// INSTANCIA....: Load_edificioweb
// SE INSERTA EN: #ID_GEN_CUERPO	
// DESCRIPCION..: Inserta codigo HTML en un elemento del DOM
// IMPRESION....: Despues de ser creado, sustitutivo

	var tipoImpresion = 0;
	var posicionCallback = 0;
	var metodosCallback01 = [];
	var metodosCallback = [metodosCallback01]; 
	var statusCallback = 0;
	var callback = [posicionCallback, metodosCallback, statusCallback];
	var configuraciones = [tipoImpresion, callback];
	var etiquetas = ["html/portada.html", "#ID_GEN_CUERPO"];
	var Load_edificioweb = new Load(configuraciones, etiquetas);
	Load_edificioweb.imprimehtml();






// CLASE........: Scroll
// INSTANCIA....: Scroll_animacion_menu
// DESCRIPCION..: Animacion de scroll del Menu principal
// EJECUCIÓN....: Despues de ser creado

	var configuraciones = ["html", 1, window.scrollY];
	var animacionCero = [0, "", ""];
	var animacionesSuperior01 = [[1, ".caja_opcion_inicio", ["opcion_menu_invisible", "opcion_menu_visible"]]];
	var animacionesSuperior02 = [[1, ".caja_opcion_tienda", ["opcion_menu_invisible", "opcion_menu_visible"]]];
	var animacionesSuperior03 = [[1, ".caja_opcion_blog", ["opcion_menu_invisible", "opcion_menu_visible"]]];
	var animacionesSuperior04 = [[1, ".caja_opcion_germinadora", ["opcion_menu_invisible", "opcion_menu_visible"]]];
	var animacionesSuperior05 = [[1, ".caja_opcion_historia", ["opcion_menu_invisible", "opcion_menu_visible"]]];
	var animacionesSuperior06 = [[1, ".caja_opcion_ideario", ["opcion_menu_invisible", "opcion_menu_visible"]]];
	var animacionesSuperior = [animacionesSuperior01, animacionesSuperior02, animacionesSuperior03, animacionesSuperior04, animacionesSuperior05, animacionesSuperior06]
	var animacionesInferior01 = [[1, ".caja_opcion_inicio", ["opcion_menu_visible", "opcion_menu_invisible"]]];
	var animacionesInferior02 = [[1, ".caja_opcion_tienda", ["opcion_menu_visible", "opcion_menu_invisible"]]];
	var animacionesInferior03 = [[1, ".caja_opcion_blog", ["opcion_menu_visible", "opcion_menu_invisible"]]];
	var animacionesInferior04 = [[1, ".caja_opcion_germinadora", ["opcion_menu_visible", "opcion_menu_invisible"]]];
	var animacionesInferior05 = [[1, ".caja_opcion_historia", ["opcion_menu_visible", "opcion_menu_invisible"]]];
	var animacionesInferior06 = [[1, ".caja_opcion_ideario", ["opcion_menu_visible", "opcion_menu_invisible"]]];
	var animacionesInferior = [animacionesInferior01, animacionesInferior02, animacionesInferior03, animacionesInferior04, animacionesInferior05, animacionesInferior06]
	var animacionesAreas = [animacionesSuperior, animacionesInferior];
	var animacionesLimites = [animacionCero, animacionesAreas];
	var limites = [5, animacionesLimites, 0];
	var Scroll_animacion_menu = new Scroll(configuraciones, limites);
//	Scroll_animacion_menu.ejecuta_limites();
	Scroll_animacion_menu.ejecuta();

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_construccion
// DESCRIPCION..: Modal para avisar que un correo fuen enviado para recuperar contraseña
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_aviso_modal_opcion.contenido([0, "AVISO"])',
	'Maqueta_aviso_modal_opcion.contenido([1, "PANTALLA EN CONTRUCCIÓN."])',
	'Maqueta_aviso_modal_opcion.generahtml()',
	'Maqueta_aviso_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_aviso_opcion.abrefijo()'];
	var Metodos_modal_construccion = new Metodos(configuraciones, codigos, elementos);









</script>

