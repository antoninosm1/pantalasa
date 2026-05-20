<?php
	require_once "../pantalib/php/objetos/new/Sistema.php";
	require_once "../pantalib/php/objetos/new/User.php";
	require_once "../pantalib/php/objetos/new/Log.php";
	require_once "php/Conexion_kronos.php";
	require_once "../pantalib/php/objetos/new/Session.php";
	header('Content-Type: text/html; charset=UTF-8');
	session_start();

// INICIA PROCESO PARA ESTABLECER SISTEMA
	$configuraciones = [12, 'kronos', 1, 'http://localhost/pantalasa/kronos/', 1];
	$_SESSION['Sistema'] = new Sistema($configuraciones);

// INICIA PROCESO PARA ESTABLECER LOG DE PHP
	$archivo_log = 'kronopio.txt';
	$mensaje_log = date('Y-m-d H:i:s').' ESTABLECEMOS LOG PHP EN FLUJO PRINCIPAL';
	$ruta_log = 'logs/';
	$sistema_log = $_SESSION['Sistema'];
	$configuraciones = [$archivo_log, $mensaje_log, $ruta_log, $sistema_log];
	$_SESSION['logPhp'] = new Log($configuraciones);
	$_SESSION['logPhp']->escribe_log();

// INICIA PROCESO PARA ESTABLECER SESSION
	$configuraciones = [1];
	$_SESSION['session'] = new Session($configuraciones);

// INICIA PROCESO PARA ESTABLECER CONEXIÓN DE BD
	$_SESSION['bd'] = new Conexion_kronos();

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
		<title>KRONOS</title>
        <link rel="icon" href="icons8-favicon.gif" type="image/x-icon">
		<link rel="stylesheet" href="../pantalib/fontawesome/css/all.css">
		<link rel="stylesheet" href="../pantalib/css/kronos.css">
		<link rel="stylesheet" href="../pantalib/css/kronos_hom.css">
		<script src="../pantalib/jquery/jquery.js"></script>
		
		<script src="../pantalib/javascript/objetos/mvvm/model/Session.js"></script>
		<script src="../pantalib/javascript/objetos/mvvm/model/System.js"></script>
		<script src="../pantalib/javascript/objetos/mvvm/model/Phpmail.js"></script>
		<script src="../pantalib/javascript/objetos/mvvm/model/Consulta.js"></script>
		
		<script src="../pantalib/javascript/objetos/mvvm/view/Maqueta.js"></script>
		<script src="../pantalib/javascript/objetos/mvvm/view/Modal.js"></script>
		<script src="../pantalib/javascript/objetos/mvvm/view/Form.js"></script>
		<script src="../pantalib/javascript/objetos/mvvm/view/Menu.js"></script>
		<script src="../pantalib/javascript/objetos/mvvm/view/Input.js"></script>
		<script src="../pantalib/javascript/objetos/mvvm/view/Button.js"></script>
		<script src="../pantalib/javascript/objetos/mvvm/view/Link.js"></script>
		<script src="../pantalib/javascript/objetos/mvvm/view/Elemento.js"></script>
				
		<script src="../pantalib/javascript/objetos/mvvm/viewmodel/Pantalla.js"></script>
		<script src="../pantalib/javascript/objetos/mvvm/viewmodel/Metodos.js"></script>
		<script src="../pantalib/javascript/objetos/mvvm/viewmodel/Evaluacion.js"></script>

	</head>
    <body class="maqueta_base" id="ID_KRONOS_BODY">
        KRONOS
    </body>
</html>
<script>








////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////


// ** // ** // ** // ** // ** // ** // ** // ** // **
//////////////////////////////////////////
// ** // ** // ** // ** // ** // ** // ** // ** // **
//////////////////////////////////////////


// ** COMIENZA JS


// ** // ** // ** // ** // ** // ** // ** // ** // **
//////////////////////////////////////////
// ** // ** // ** // ** // ** // ** // ** // ** // **
//////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////








// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE UNO: ESTABLECE DATOS INICIALES CLASES DEL MODELO

// ****************************************************************
// ****************************************************************
// ****************************************************************








// ****************************************************************
// BLOQUE UNO: 01 ESTABLECE CLASES PARA MANEJAR SESION PHP Y SISTEMA
// ****************************************************************


// CLASE........: Session
// INSTANCIA....: Session_revisa
// DESCRIPCION..: Instancia para administrar sesión de PHP 
	
  	var idioma = '<?php echo json_encode($_SESSION['Sistema'] -> configuraciones[2]); ?>';
    var sistema_id = <?php echo json_encode($sistema_config[0]); ?>;
	var sistema_tech_name = <?php echo json_encode($sistema_config[1]); ?>;
	var ruta = <?php echo json_encode($sistema_config[3]); ?>;
	var idCode = 1;
	var statusSessiono = [1, 2, 3, 4, 5];
	var statusCheck = 1;
	var scarlet = [idCode, statusSessiono, statusCheck, 0];
	var scriptPhp = ['php/session_cierra_kronos.php', 'php/session_abre_kronos.php'];
	var metodoPhp = 'POST';
	var configuraciones = [scarlet, scriptPhp, metodoPhp];
	var codigos = [''];
	var Session_revisa = new Session(configuraciones, codigos);

// CLASE........: System
// INSTANCIA....: Sistema_kronos
// DESCRIPCION..: Instancia para administrar información del Sistema 
	
	var Sistema_kronos = new System(sistema_id, sistema_tech_name, 'kronos', 'INICIALIZA SISTEMAS PANTALASA Y SUPER USUARIOS', '');








// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE DOS: PANTALLA HTML CON TODOS SUS ELEMENTOS CLASES VIEW

// ****************************************************************
// ****************************************************************
// ****************************************************************








// ****************************************************************
// BLOQUE DOS: 01 CLASES PARA IMPRIMIR MAQUETA GENERAL Y MODALES
// ****************************************************************


// CLASE........: Maqueta
// INSTANCIA....: maqueta_01
// ID...........: ID_GEN_MAQUETA
// SE INSERTA EN: #ID_KRONOS_BODY	
// DESCRIPCION..: Maqueta principal de 3 posiciones
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustitutivo
	
	var inglesIdioma = ["BODY", "MODAL", "MODAL OPCION"];
	var espanolIdioma = ["CUERPO", "MODAL", "MODAL OPCION"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 3;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_01", "ID_GEN_MAQUETA", "#ID_KRONOS_BODY"];
	var codigos = [""];
	var elementosClass = ["area_cuerpo", "modal_oculto", "modal_oculto"];
	var elementosId = ["ID_GEN_CUERPO", "ID_GEN_MODAL", "ID_GEN_MODAL_OPCION"];
	var elementos = [elementosClass, elementosId];
	var maqueta_01 = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	maqueta_01.generahtml();
	maqueta_01.imprimehtml();

// CLASE........: Modal
// INSTANCIA....: Modal_aviso
// ID...........: ID_KRONOS_MODAL_X
// SE INSERTA EN: #ID_KRONOS_BODY	
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
	var etiquetas = ["ventana_modal", "ID_KRONOS_MODAL_X", "#ID_KRONOS_BODY", "#ID_KRONOX_MODAL_TITULO_X", "#ID_KRONOS_MODAL_AVISO_X"];
	var codigos = [""];
	var Modal_aviso = new Modal(configuraciones, etiquetas, codigos);
	Modal_aviso.generahtml();
	Modal_aviso.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_aviso_modal
// ID...........: ID_KRONOS_MODAL_MAQUETA
// SE INSERTA EN: #ID_KRONOS_MODAL	
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
	var etiquetas = ["maqueta_ventana_modal", "ID_KRONOS_MODAL_MAQUETA_X", "#ID_KRONOS_MODAL_X"];
	var codigos = [""];
	var elementosClass = ["titulo_ventana", "area_aviso_modal", "area_button_modal"];
	var elementosId = ["ID_KRONOS_MODAL_TITULO_X", "ID_KRONOS_MODAL_AVISO_X", "ID_KRONOS_MODAL_BUTTON_X"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_aviso_modal = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_aviso_modal.generahtml();
	Maqueta_aviso_modal.imprimehtml();

// CLASE........: Modal
// INSTANCIA....: Modal_aviso_opcion
// ID...........: ID_KRONOS_MODAL_OPCION
// SE INSERTA EN: #ID_KRONOS_BODY	
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
	var etiquetas = ["ventana_modal", "ID_KRONOS_MODAL_OPCION", "#ID_KRONOS_BODY", "#ID_KRONOS_MODAL_OPCION_TITULO", "#ID_KRONOS_MODAL_OPCION_AVISO"];
	var codigos = [""];
	var Modal_aviso_opcion = new Modal(configuraciones, etiquetas, codigos);
	Modal_aviso_opcion.generahtml();
	Modal_aviso_opcion.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_aviso_modal_opcion
// ID...........: ID_KRONOS_MODAL_OPCION_MAQUETA
// SE INSERTA EN: #ID_KRONOS_MODAL_OPCION	
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
	var etiquetas = ["maqueta_ventana_modal", "ID_KRONOS_MODAL_OPCION_MAQUETA", "#ID_KRONOS_MODAL_OPCION"];
	var codigos = [""];
	var elementosClass = ["titulo_ventana", "area_aviso_modal", "area_button_modal"];
	var elementosId = ["ID_KRONOS_MODAL_OPCION_TITULO", "ID_KRONOS_MODAL_OPCION_AVISO", "ID_KRONOS_MODAL_OPCION_BUTTON"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_aviso_modal_opcion = new Maqueta(configuraciones, etiquetas, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Ok_modal
// ID...........: ID_OK_MODAL
// SE INSERTA EN: #ID_KRONOS_MODAL_OPCION_BUTTON	
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
	var etiquetas = ["boton_link_icono_chico", "ID_OK_MODAL", "#ID_KRONOS_MODAL_OPCION_BUTTON", "ok_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_aviso_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Ok_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);


// ****************************************************************
// BLOQUE DOS: 02 MAQUETA Y ELEMENTOS AREA DE TRABAJO
// ****************************************************************


// CLASE........: Maqueta
// INSTANCIA....: Maqueta_kronos
// ID...........: ID_KRONOS_MAQUETA
// SE INSERTA EN: #ID_GEN_CUERPO	
// DESCRIPCION..: Maqueta de diseño de la pantalla Kronos
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustitutivo

    var inglesIdioma = ["DATETIME", "LOGIN", "HOME", "TITLE SYSTEM", "EXIT", "MENU", "BAR LEFT", "PRINCIPAL", "BAR RIGHT", "RESULT", "BAR FOOT", "FOOT LEFT", "FOOT RIGHT"];
//	var espanolIdioma = ["ONLINE", "pAntalasa Software", "INICIO", "KRONOS<BR>SISTEMAS Y USUARIOS", "SALIDA", "MENU", "BARRA IZQUIERDA", "PRINCIPAL", "BARRA DERECHA", "RESULTADO", "CONTROLES", "PIE DE PÁGINA", "PIE DERECHO", "PÍE IZQUIERDO"];
	var espanolIdioma = ["ONLINE", "pAntalasa Software", "INICIO", "KRONOS<BR>CREA SISTEMAS Y USUARIOS", "SALIDA", "6", "7", "8", "9", "10", "11", "12", "13"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 13;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_kronos", "ID_KRONOS_MAQUETA", "#ID_GEN_CUERPO"];
	var codigos = [""];
	var elementosClass = ["cinta_superior", "cinta_superior", "area_home", "area_titulo", "area_exit", "area_menu", "barra_izquierda", "area_principal", "barra_derecha", "area_resultado", "pie_pagina", "cinta_pie", "cinta_pie"];
	var elementosId = ["ID_KRONOS_01", "ID_KRONOS_02", "ID_KRONOS_03", "ID_KRONOS_04", "ID_KRONOS_05", "ID_KRONOS_06", "ID_KRONOS_07", "ID_KRONOS_08", "ID_KRONOS_09", "ID_KRONOS_10", "ID_KRONOS_11", "ID_KRONOS_12", "ID_KRONOS_13"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_kronos = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_kronos.generahtml();
	Maqueta_kronos.imprimehtml();

// CLASE........: Menu
// INSTANCIA....: Menu_izquierda
// ID...........: ID_KRONOS_MENUIZQ
// SE INSERTA EN: #ID_KRONOS_03	
// DESCRIPCION..: Menu de un sólo elemento para navegar a INICIO
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustitutivo

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
	var etiquetas = ['menu_elementos', 'ID_KRONOS_MENUIZQ', '#ID_KRONOS_03'];
	var codigosHtml = "";
	var codigos = [codigosHtml];
	var elementosClass = ['boton_menu_cuadro'];
	var elementosId = ['ID_KRONOS_MENUIZQ_01'];
	var elementosIcono = [1];
	var elementosOrdenIcono = [0];
//	var elementosMetodos = [[['ONCLICK'], ['Metodos_modal_aviso.ejecuta()']]];
	var elementosMetodos = [[['ONCLICK'], ['Metodos_modal_aviso.ejecuta()']]];
	var elementos = [elementosClass, elementosId, elementosIcono, elementosOrdenIcono, elementosMetodos];
	var Menu_izquierda = new Menu(configuraciones, etiquetas, codigos, elementos);
	Menu_izquierda.generahtml();
	Menu_izquierda.imprimehtml();

// CLASE........: Menu
// INSTANCIA....: Menu_derecha
// ID...........: ID_KRONOS_MENUDER
// SE INSERTA EN: #ID_KRONOS_05	
// DESCRIPCION..: Menu de un sólo elemento para navegar a SALIDA
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustitutivo

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
	var etiquetas = ['menu_elementos', 'ID_KRONOS_MENUDER', '#ID_KRONOS_05'];
	var codigosHtml = "";
	var codigos = [codigosHtml];
	var elementosClass = ['boton_menu_cuadro'];
	var elementosId = ['ID_KRONOS_MENUDER_01'];
	var elementosIcono = [1];
	var elementosOrdenIcono = [0];
	var elementosMetodos = [[['ONCLICK'], ['window.location.replace(`php/salida.php`)']]];
	var elementos = [elementosClass, elementosId, elementosIcono, elementosOrdenIcono, elementosMetodos];
	var Menu_derecha = new Menu(configuraciones, etiquetas, codigos, elementos);
	Menu_derecha.generahtml();
	Menu_derecha.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_trabajo
// ID...........: ID_TRABAJO
// SE INSERTA EN: #ID_KRONOS_08	
// DESCRIPCION..: Maqueta de diseño del area de TRABAJO
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustitutivo

    var inglesIdioma = ["CHOSS YOUR WORK", ""];
	var espanolIdioma = ["ELÍGE TRABAJO", ""];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 2;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_trabajo", "ID_TRABAJO_HOM", "#ID_KRONOS_08"];
	var codigos = [""];
	var elementosClass = ["titulo_trabajo", "area_trabajo"];
	var elementosId = ["ID_TRABAJO_HOM_01", "ID_TRABAJO_HOM_02"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_trabajo = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_trabajo.generahtml();
	Maqueta_trabajo.imprimehtml();

// CLASE........: Menu
// INSTANCIA....: Menu_central
// ID...........: ID_KRONOS_MENUCEN
// SE INSERTA EN: #ID_KRONOS_06	
// DESCRIPCION..: Menu de dos elemento para navegar a las diferentes pantallas
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustitutivo

	var titulosIngles = ['SYSTEMS', 'USERS'];
	var iconosIngles = ['fa-solid fa-code', 'fa-solid fa-user-group'];
	var enlacesIngles = ['javascript:void(0)', 'javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['SISTEMAS', 'USUARIOS'];
	var iconosEspanol = ['fa-solid fa-code', 'fa-solid fa-user-group'];
	var enlacesEspanol = ['javascript:void(0)', 'javascript:void(0)'];
	var espanolIdioma = [titulosEspanol, iconosEspanol, enlacesEspanol];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 2;
	var tipoImpresion = 0;
	var tipoMenu = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, tipoMenu];
	var etiquetas = ['menu_elementos_d', 'ID_KRONOS_MENUCEN', '#ID_TRABAJO_HOM_02'];
	var codigosHtml = "";
	var codigos = [codigosHtml];
	var elementosClass = ['boton_menu_cuadro_d', 'boton_menu_cuadro_d'];
	var elementosId = ['ID_KRONOS_MENUCEN_01', 'ID_KRONOS_MENUCEN_02'];
	var elementosIcono = [1, 1];
	var elementosOrdenIcono = [0, 0];
	var elementosMetodos = [[['ONCLICK'], ['window.location.replace(`php/sistemas.php`)']], [['ONCLICK'], ['window.location.replace(`php/usuarios.php`)']]];
	var elementos = [elementosClass, elementosId, elementosIcono, elementosOrdenIcono, elementosMetodos];
	var Menu_central = new Menu(configuraciones, etiquetas, codigos, elementos);
	Menu_central.generahtml();
	Menu_central.imprimehtml();








// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE TRES: MANEJO DE PANTALLA Y METODOS CLASES VIEWMODEL

// ****************************************************************
// ****************************************************************
// ****************************************************************









// ****************************************************************
// BLOQUE TRES: 01 CLASE PARA IMPRIMIR LA PANTALLA
// ****************************************************************


// CLASE........: Pantalla
// INSTANCIA....: Pantalla_comerciosolidario_login
// DESCRIPCION..: Instancia para administrar las impresiones de la Pantalla


	var objetos_pantalla = [];	
	var dimensiones = [];
	var configuraciones = [dimensiones];
	var Pantalla_kronos = new Pantalla(idioma, 1, "cryona__kronos.php", "CREA SISTEMAS MySql - PHP - Js - JQuery - HTML Y SUPER USUARIOS", "", "", objetos_pantalla, "", Sistema_kronos, "php/home.php", configuraciones);


// ****************************************************************
// BLOQUE TRES: 02 METODOS
// ****************************************************************


// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_aviso
// DESCRIPCION..: Metodos para desplegar Modal para avisar que se debe hacer para iniciar

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	
		'Maqueta_aviso_modal_opcion.contenido([0, "AVISO"])',
		'Maqueta_aviso_modal_opcion.contenido([1, "PARA INICIAR ELÍGE TRABAJO"])',
		'Maqueta_aviso_modal_opcion.generahtml()',
		'Maqueta_aviso_modal_opcion.imprimehtml()',
		'Ok_modal.generahtml()',
		'Ok_modal.imprimehtml()',
		'Modal_aviso_opcion.abrefijo()'
	
	];
	var Metodos_modal_aviso = new Metodos(configuraciones, codigos, elementos);








</script>
