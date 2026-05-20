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
		<link rel="stylesheet" href="../../pantalib/css/comerciosolidario_comerciar.css">
		<link rel="stylesheet" href="../../pantalib/css/comerciosolidario_comerciar_puntos.css">
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
		<script src="../../pantalib/javascript/objetos/new/Metodos.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Grid.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Elemento.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Consulta.js"></script>
    </head>
    <body class="maqueta_base" id="ID_COMERCIOSOLIDARIO_COMERCIAR">
      
    </body>
</html>
<script>







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

// BLOQUE 1 SETINGS GENERALES

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

	




// CLASE........: Session
// INSTANCIA....: Session_comerciar
// DESCRIPCION..: Objeto para guardar información de la session PHP en JS
// HTML.........: Se genera despues de ser creado
	
	var idioma = <?php echo json_encode($_SESSION['Sistema'] -> configuraciones[2]); ?>;
    var sistema_id = <?php echo json_encode($_SESSION['Sistema'] -> configuraciones[0]); ?>;
    var sistema_tech_name = <?php echo json_encode($_SESSION['Sistema'] -> configuraciones[1]); ?>;
	var usuarioID = <?php echo json_encode($_SESSION['User'] -> elementos[0][0]); ?>;
	var usuarioName = <?php echo json_encode($_SESSION['User'] -> elementos[0][4]." ".$_SESSION['User'] -> elementos[0][3]); ?>;
	var usuarioStatus = <?php echo json_encode($_SESSION['User'] -> elementos[0][7]); ?>;
	var session = <?php echo json_encode($_SESSION['session'] -> configuraciones[0]); ?>;
	var idCode = 2;
	var statusSessiono = [1, 2, 3, 4];
	var statusCheck = 1;
	var scarlet = [idCode, statusSessiono, statusCheck, usuarioStatus];
	var scriptPhp = ['session_cierra_comerciosolidario.php', 'session_abre_comerciosolidario.php'];
	var metodoPhp = 'POST';
	var configuraciones = [scarlet, scriptPhp, metodoPhp];
	var codigos = [''];
	var Session_comerciar = new Session(configuraciones, codigos);
	Session_comerciar.revisa(usuarioID, session, 'salida.php');


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
	var Pantalla_comerciosolidario_gen = new Pantalla(idioma, 2, "comerciar.php", "COMERCIO SOLIDARIO COMERCIAR", "", "", objetos_pantalla, "", Sistema_comerciosolidario, "../index.php", configuraciones);







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

// BLOQUE 2 MAQUETACION MASTER Y MODALES

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
// SE INSERTA EN: #ID_comerciosolidario_BODY	
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
	var etiquetas = ["maqueta_01", "ID_GEN_MAQUETA", "#ID_COMERCIOSOLIDARIO_COMERCIAR"];
	var codigos = [""];
	var elementosClass = ["area_cuerpo", "modal_oculto", "modal_oculto"];
	var elementosId = ["ID_GEN_CUERPO", "ID_GEN_MODAL", "ID_GEN_MODAL_OPCION"];
	var elementos = [elementosClass, elementosId];
	var maqueta_01 = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	maqueta_01.generahtml();
	maqueta_01.imprimehtml();

// CLASE........: Modal
// INSTANCIA....: Modal_comerciar
// ID...........: ID_COMERCIOSOLIDARIO_MODAL_X
// SE INSERTA EN: #ID_COMERCIOSOLIDARIO_BODY	
// DESCRIPCION..: Ventana modal para ir por datos
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, adicional

	var inglesIdioma = [""];
	var espanolIdioma = [""];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 1;
	var botonCerrar = "";
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, botonCerrar];
	var etiquetas = ["ventana_modal", "ID_COMERCIOSOLIDARIO_MODAL_X", "#ID_COMERCIOSOLIDARIO_COMERCIAR", "#ID_COMERCIOSOLIDARIO_MODAL_TITULO_X", "#ID_COMERCIOSOLIDARIO_MODAL_AVISO_X"];
	var codigos = [""];
	var Modal_comerciar = new Modal(configuraciones, etiquetas, codigos);
	Modal_comerciar.generahtml();
	Modal_comerciar.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_comerciar_modal
// ID...........: ID_COMERCIOSOLIDARIO_MODAL_MAQUETA
// SE INSERTA EN: #ID_COMERCIOSOLIDARIO_MODAL	
// DESCRIPCION..: Maqueta de 3 posiciones para organizar ventana modal para ir por datos
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado sustitutivo
	
	var inglesIdioma = ["WAIT A MOMENT", "DATA CONSULTING", ""];
	var espanolIdioma = ["ESPERE UN MOMENTO", "CONSULTANDO DATOS", ""];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 3;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_ventana_modal", "ID_COMERCIOSOLIDARIO_MODAL_MAQUETA_X", "#ID_COMERCIOSOLIDARIO_MODAL_X"];
	var codigos = [""];
	var elementosClass = ["titulo_ventana", "area_aviso_modal", "area_button_modal"];
	var elementosId = ["ID_COMERCIOSOLIDARIO_MODAL_TITULO_X", "ID_COMERCIOSOLIDARIO_MODAL_AVISO_X", "ID_COMERCIOSOLIDARIO_MODAL_BUTTON_X"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_comerciar_modal = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_comerciar_modal.generahtml();
	Maqueta_comerciar_modal.imprimehtml();

// CLASE........: Modal
// INSTANCIA....: Modal_comerciar_opcion
// ID...........: ID_COMERCIOSOLIDARIO_MODAL_OPCION
// SE INSERTA EN: #ID_COMERCIOSOLIDARIO_BODY	
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
	var etiquetas = ["ventana_modal", "ID_COMERCIOSOLIDARIO_MODAL_OPCION", "#ID_COMERCIOSOLIDARIO_BODY", "#ID_COMERCIOSOLIDARIO_MODAL_OPCION_TITULO", "#ID_COMERCIOSOLIDARIO_MODAL_OPCION_AVISO"];
	var codigos = [""];
	var Modal_comerciar_opcion = new Modal(configuraciones, etiquetas, codigos);
	Modal_comerciar_opcion.generahtml();
	Modal_comerciar_opcion.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_comerciar_modal_opcion
// ID...........: ID_COMERCIOSOLIDARIO_MODAL_OPCION_MAQUETA
// SE INSERTA EN: #ID_COMERCIOSOLIDARIO_MODAL_OPCION	
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
	var etiquetas = ["maqueta_ventana_modal", "ID_COMERCIOSOLIDARIO_MODAL_OPCION_MAQUETA", "#ID_COMERCIOSOLIDARIO_MODAL_OPCION"];
	var codigos = [""];
	var elementosClass = ["titulo_ventana", "area_aviso_modal", "area_button_modal"];
	var elementosId = ["ID_COMERCIOSOLIDARIO_MODAL_OPCION_TITULO", "ID_COMERCIOSOLIDARIO_MODAL_OPCION_AVISO", "ID_COMERCIOSOLIDARIO_MODAL_OPCION_BUTTON"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_comerciar_modal_opcion = new Maqueta(configuraciones, etiquetas, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Ok_modal
// ID...........: ID_OK_MODAL
// SE INSERTA EN: #ID_COMERCIOSOLIDARIO_MODAL_OPCION_BUTTON	
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
	var etiquetas = ["boton_link_icono_chico", "ID_OK_MODAL", "#ID_COMERCIOSOLIDARIO_MODAL_OPCION_BUTTON", "ok_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_comerciar_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Ok_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);







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

// BLOQUE 3 MAQUETACION DE TRABAJO

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
// INSTANCIA....: maqueta_principal
// ID...........: ID_GEN_MAQUETA_PRINCIPAL
// SE INSERTA EN: #ID_GEN_CUERPO	
// DESCRIPCION..: Maqueta principal de 3 posiciones
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustitutivo
	
	var inglesIdioma = ["STATUS", "HEAD", "BODY", ""];
	var espanolIdioma = ["ESTADO", "CABEZA", "CUERPO", ""];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 4;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_principal", "ID_GEN_MAQUETA_PRINCIPAL", "#ID_GEN_CUERPO"];
	var codigos = [""];
	var elementosClass = ["area_cinta", "area_cabeza", "area_trabajo", "area_pie"];
	var elementosId = ["ID_GEN_01", "ID_GEN_02", "ID_GEN_03", "ID_GEN_04"];
	var elementos = [elementosClass, elementosId];
	var maqueta_principal = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	maqueta_principal.generahtml();
	maqueta_principal.imprimehtml();

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

// OBJETO Menu MENU CENTRAL
	
	var titulosIngles = ['USER', 'USERS', 'USERS', 'SUPPORT', 'RESUME', 'EXIT'];
	var iconosIngles = ['fa-solid fa-user', 'fa-solid fa-user-group disabled', 'fa-solid fa-user-group disabled', 'fa-solid fa-handshake disabled', 'fa-solid fa-table', 'fa-solid fa-door-open'];
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
	var elementosClass = ['boton_menu_dark', 'boton_menu_dark', 'boton_menu_dark', 'boton_menu_dark', 'boton_menu_dark', 'boton_menu_dark'];
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

	// CLASE........: Load
	// INSTANCIA....: Load_principal
	// SE INSERTA EN: #ID_GEN_03	
	// DESCRIPCION..: Inserta codigo HTML comerciar_principal.html en el area de trabajo
	// IMPRESION....: Despues de ser creado, sustitutivo

	var tipoImpresion = 0;
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_principal.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var configuraciones = [tipoImpresion, callback];
	var etiquetas = ["../html/comerciar_principal.html", "#ID_GEN_03"];
	var Load_principal = new Load(configuraciones, etiquetas);
	Load_principal.imprimehtml()	

	// CLASE........: Menu
	// INSTANCIA....: Menu_comerciar
	// SE INSERTA EN: #ID_COMERCIAR_TRABAJO_03	
	// DESCRIPCION..: Genera un Menu con elementos listos para trabajar con icono y texto y enlace
	// IMPRESION....: Despues de ser creado, sustitutivo

	var titulosIngles = ['TRATO', 'CAJA DE COBRO', 'INFORMES'];
	var iconosIngles = ['fa-solid fa-user', 'fa-solid fa-user-group disabled', 'fa-solid fa-user'];
	var enlacesIngles = ['javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['TRATO', 'CAJAS', 'INFORMES'];
	var iconosEspanol = ['fa-solid fa-handshake-angle', 'fa-solid fa-cash-register', 'fa-solid fa-chart-column'];
	var enlacesEspanol = ['javascript:void(0)', 'javascript:void(0)', 'javascript:void(0)'];
	var espanolIdioma = [titulosEspanol, iconosEspanol, enlacesEspanol];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 3;
	var tipoImpresion = 0;
	var tipoMenu = 0;
	var nivelesStatus = [1, 2, 3, 4];
	var statusUno = [1, 1, 1]; 
	var statusDos = [1, 1, 1]; 
	var statusTres = [1, 1, 1]; 
	var statusCuatro = [1, 1, 1]; 
	var statusArreglo = [statusUno, statusDos, statusTres, statusCuatro];
	var statusUser = [usuarioStatus, nivelesStatus, statusArreglo];
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, tipoMenu, statusUser];
	var etiquetas = ['menu_elementos', 'ID_GEN_03_MENUCOMERCIAR_ELEMENTOS', '#ID_COMERCIAR_TRABAJO_03'];
	var codigosHtml = "";
	var codigos = [codigosHtml];
	var elementosClass = ['boton_menu_cuadro', 'boton_menu_cuadro', 'boton_menu_cuadro'];
	var elementosId = ['ID_GEN_03_MENUCOMERCIAR_ELEMENTOS_01'];
	var elementosIcono = [1, 1, 1, 1];
	var elementosOrdenIcono = [0, 0, 0, 0];
	var elementosMetodos = [
		
		[['ONCLICK'], ['window.location.replace(`comunidad.php`)']],
		[['ONCLICK'], ['Metodos_elige_cajas.ejecuta()']],
		[['ONCLICK'], ['Metodos_elige_cajas.ejecuta()']]
	
	];
	var elementos = [elementosClass, elementosId, elementosIcono, elementosOrdenIcono, elementosMetodos];
	var Menu_comerciar = new Menu(configuraciones, etiquetas, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_after_principal
	// DESCRIPCION..: Metodos que se ejecutan despues de imprimir pantalla principal
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
			
		'Menu_comerciar.generahtml_status()',
		'Menu_comerciar.imprimehtml()'

	];
	var Metodos_after_principal = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_elige_cajas
	// DESCRIPCION..: Metodos que se ejecutan al elegir opción caja
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
			
		'Load_puntos.imprimehtml()'

	];
	var Metodos_elige_cajas = new Metodos(configuraciones, codigos, elementos);









/////////////////////////////////////////////////////////////////////////////
// *+++**+++* //  *+++**+++* //  *+++**+++* //  *+++**+++* //  *+++**+++* // 
/////////////////////////////////////////////////////////////////////////////
// *+++**+++* //  *+++**+++* //  *+++**+++* //  *+++**+++* //  *+++**+++* // 
/////////////////////////////////////////////////////////////////////////////
// *+++**+++* //  *+++**+++* //  *+++**+++* //  *+++**+++* //  *+++**+++* // 
/////////////////////////////////////////////////////////////////////////////
// *+++**+++* //  *+++**+++* //  *+++**+++* //  *+++**+++* //  *+++**+++* // 
/////////////////////////////////////////////////////////////////////////////
// *+++**+++* //  *+++**+++* //  *+++**+++* //  *+++**+++* //  *+++**+++* // 
/////////////////////////////////////////////////////////////////////////////
// *+++**+++* //  *+++**+++* //  *+++**+++* //  *+++**+++* //  *+++**+++* // 

/////// AREA CAJAS

/////////////////////////////////////////////////////////////////////////////
// *+++**+++* //  *+++**+++* //  *+++**+++* //  *+++**+++* //  *+++**+++* // 
/////////////////////////////////////////////////////////////////////////////
// *+++**+++* //  *+++**+++* //  *+++**+++* //  *+++**+++* //  *+++**+++* // 
/////////////////////////////////////////////////////////////////////////////
// *+++**+++* //  *+++**+++* //  *+++**+++* //  *+++**+++* //  *+++**+++* // 
/////////////////////////////////////////////////////////////////////////////
// *+++**+++* //  *+++**+++* //  *+++**+++* //  *+++**+++* //  *+++**+++* // 
/////////////////////////////////////////////////////////////////////////////
// *+++**+++* //  *+++**+++* //  *+++**+++* //  *+++**+++* //  *+++**+++* // 
/////////////////////////////////////////////////////////////////////////////
// *+++**+++* //  *+++**+++* //  *+++**+++* //  *+++**+++* //  *+++**+++* // 







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

// BLOQUE 4 AREA HTML PARA IMPRIMIR CAJAS

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

	




	// CLASE........: Load
	// INSTANCIA....: Load_puntos
	// SE INSERTA EN: #ID_GEN_03	
	// DESCRIPCION..: Inserta codigo HTML comerciar_puntos.html en el area de trabajo
	// IMPRESION....: Espera llamada, sustitutivo

	var tipoImpresion = 0;
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_cajas.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var statusCallback = 1;
	var callback = [posicionCallback, metodosCallback, statusCallback];
	var configuraciones = [tipoImpresion, callback];
	var etiquetas = ["../html/comerciar_puntos.html", "#ID_GEN_03"];
	var Load_puntos = new Load(configuraciones, etiquetas);
	
	// CLASE........: Menu
	// INSTANCIA....: Menu_comerciar_cajas
	// SE INSERTA EN: #ID_COMERCIAR_TRABAJO_03	
	// DESCRIPCION..: Genera un Menu con elementos listos para trabajar con icono y texto y enlace
	// IMPRESION....: Espera llamada

	var titulosIngles = ['REGRESAR'];
	var iconosIngles = ['fa-solid fa-user'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['REGRESAR'];
	var iconosEspanol = ['fa-solid fa-angle-left'];
	var enlacesEspanol = ['javascript:void(0)'];
	var espanolIdioma = [titulosEspanol, iconosEspanol, enlacesEspanol];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 1;
	var tipoImpresion = 0;
	var tipoMenu = 0;
	var nivelesStatus = [1, 2, 3, 4];
	var statusUno = [1]; 
	var statusDos = [1]; 
	var statusTres = [1]; 
	var statusCuatro = [1]; 
	var statusArreglo = [statusUno, statusDos, statusTres, statusCuatro];
	var statusUser = [usuarioStatus, nivelesStatus, statusArreglo];
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, tipoMenu, statusUser];
	var etiquetas = ['menu_elementos', 'ID_GEN_03_MENUCOMERCIAR_CAJAS', '#ID_COMERCIAR_TRABAJO_03'];
	var codigosHtml = "";
	var codigos = [codigosHtml];
	var elementosClass = ['boton_menu_cuadro'];
	var elementosId = ['ID_GEN_03_MENUCOMERCIAR_CAJAS_01'];
	var elementosIcono = [1];
	var elementosOrdenIcono = [0];
	var elementosMetodos = [
		
		[['ONCLICK'], ['Load_principal.imprimehtml()']]
	
	];
	var elementos = [elementosClass, elementosId, elementosIcono, elementosOrdenIcono, elementosMetodos];
	var Menu_comerciar_cajas = new Menu(configuraciones, etiquetas, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_after_cajas
	// DESCRIPCION..: Metodos que se ejecutan despues de imprimir pantalla de cajas
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
			
		'Menu_comerciar_cajas.generahtml_status()',
		'Menu_comerciar_cajas.imprimehtml()',
		'Metodos_presenta_kanban_cajas.ejecuta()'

	];
	var Metodos_after_cajas = new Metodos(configuraciones, codigos, elementos);







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

// BLOQUE 5 AREA CONSULTA DE PUNTOS CON CAJA

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

	




	// CLASE........: Consulta
	// INSTANCIA....: Consulta_kanban_cajas
	// DESCRIPCION..: Consulta que se ejecuta para actualizar kanban de cajas desde la BD

	var statusConsulta = 0;
	var scriptPhp = 'consulta_kanban_cajas.php';
	var metodoPhp = 'POST';
	var filtro = [];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_consulta_kanban.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_kanban_cajas = new Consulta(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_presenta_kanban_cajas
	// DESCRIPCION..: Metodos que se ejecutan para presentar el kanban de cajas
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_comerciar.abrefijo()',	
	'Consulta_kanban_cajas.posicion_callback(0)',
	'Consulta_kanban_cajas.ejecuta_2()'

	];
	
	var Metodos_presenta_kanban_cajas = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Grid
	// INSTANCIA....: Kanban_cajas
	// ID...........: ID_CAJAS_KANBAN
	// SE INSERTA EN: #ID_COMERCIAR_TRABAJO_04	
	// DESCRIPCION..: Kanban de cajas
	// HTML.........: Espera metodo
	// IMPRESION....: Espera metodo, sustituye contenido
	
		var inglesElementos = ['NOMBRE', 'ICONO', 'STATUS', 'USUARIO', 'COMPUESTO', 'CONTROL'];
		var inglesIdioma = [inglesElementos, 'LISTA DE CAJAS'];
		var espanolElementos = ['NOMBRE', 'ICONO', 'STATUS', 'USUARIO', 'COMPUESTO', 'CONTROL'];
		var espanolIdioma = [espanolElementos, 'LISTA DE CAJAS'];
		var arregloIdioma = [inglesIdioma, espanolIdioma];
		var controlIdioma = [idioma, arregloIdioma];
		
		var numeroElementos = 6;
		var tipoImpresion = 0;
		var consulta = Consulta_kanban_cajas;
		var parametros = [0, 15];
		var titulo = [''];
		
		var orientacionBreaks = [0, 720];
		var orientacionFormato = [0, 1];
		var orientacion = [0, orientacionBreaks, orientacionFormato];
		
		var areacontroles = [1];
		var iconoscontroles = ['fa-solid fa-backward', 'fa-solid fa-backward-step', 'fa-solid fa-forward-step', 'fa-solid fa-forward'];
		var metodoscontroles = [' ONCLICK="Metodos_inicio_posicion.ejecuta()"', ' ONCLICK="Metodos_retrocedegrid.ejecuta()"', ' ONCLICK="Metodos_avanzagrid.ejecuta()"', ' ONCLICK="Metodos_final_posicion.ejecuta()"'];
		var controles = [areacontroles, iconoscontroles, metodoscontroles];
		
		var valorIncialClave = 0;
		var valorClave = 0;
		var valorInicialPosicion = 0;
		var valorPosicion = 0;
		var valorInicialCelda = 0;
		var valorCelda = 0;
		var metodoValor = 'Kanban_cajas.actualiza_valores';
		var tipoValorArreglo = [0];
		var datoValorArreglo = [0];
		var valorArreglo = [tipoValorArreglo, datoValorArreglo];
		var valores = [valorIncialClave, valorClave, valorInicialPosicion, valorPosicion, valorInicialCelda, valorCelda, metodoValor, valorArreglo];
		
		var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, consulta, parametros, titulo, orientacion, controles, valores];
		
		var etiquetas = ['gradilla', 'ID_TRABAJO_SIS_GRAD', '#ID_COMERCIAR_TRABAJO_04'];
		
		var elementos_tipo_valor = [0, 5, 0, 0, 0, 0];
		var elementos_llave_valor = ['dato_02', 'dato_02', 'dato_03', 'dato_01', 'dato_02', 'dato_03'];
		var elementos_ancho_valor = ['veinte', 'cinco', 'diez', 'veinticinco', 'treinta', 'diez'];
		var elementos_metodos = ['Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()'];
		var elementos_iconos = ['', 'fa-solid fa-cash-register', '', '', '', ''];
		var elementos_trans = ['', '', '', '', '', ''];

		var elementos_trans = ['', '', '', '', '', [[1, 2, 3, 4, 5], ['ADM', 'ORG', 'CAP', 'VIS', 'SIN']], '', '', '', [[0, 1], ['NO', 'SI']], [[0, 1], ['NO', 'SI']]];



		var elementos = [elementos_tipo_valor, elementos_llave_valor, elementos_ancho_valor, elementos_metodos, elementos_iconos, elementos_trans];
		
		var codigos = [''];
		var Kanban_cajas = new Grid(configuraciones, etiquetas, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_after_consulta_kanban
	// DESCRIPCION..: Metodos que se ejecutan despues de actualizar y filtrar gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = ['Modal_comerciar.cierra()',
		'Kanban_cajas.generahtml()',
		'Kanban_cajas.imprimehtml()'];
		var Metodos_after_consulta_kanban = new Metodos(configuraciones, codigos, elementos);
		
</script>