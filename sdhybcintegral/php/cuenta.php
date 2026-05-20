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
	$_SESSION['logPhp']->configuraciones[2] = '../logs/';

// LOGEAMOS INICIO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS cuenta.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
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
		<link rel="stylesheet" href="../../pantalib/fontawesome/css/all.css">
		<link rel="stylesheet" href="../../pantalib/select2/css/select2.css">
		<link rel="stylesheet" href="../../pantalib/css/sdhybc.css">
		<link rel="stylesheet" href="../css/sdhybc_cuenta.css">
		<script src="../../pantalib/jquery/jquery.js"></script>
		<script src="../../pantalib/select2/js/select2.js"></script>
		<script src="../../pantalib/javascript/objetos/new/System.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Pantalla.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Maqueta.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Html.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Select.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Metodos.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Radio.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Panel.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Gradilla.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Consulta.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Menu.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Modal.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Button.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Toggle.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Evaluacion.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Link.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Elemento.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Scroll.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Datos.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Json.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Clases.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Registro.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Input.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Fecha.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Phpmail.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Session.js"></script>
    </head>
    <body class="maqueta_base" id="ID_SDHYBC_CUENTA_BODY">
        CUENTA SDHYBC 
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

// BLOQUE 1 ESTABLECE VARIABLES GENERALES Y SISTEMA

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
	
	var idCode = 4;
	var statusSessiono = [1, 2, 3, 4];
	var statusCheck = 1;
	var scarlet = [idCode, statusSessiono, statusCheck, usuarioStatus];
	var scriptPhp = ['session_cierra_sdhybc.php', 'session_abre_sdhybc.php'];
	var metodoPhp = 'POST';
	var configuraciones = [scarlet, scriptPhp, metodoPhp];
	var codigos = [''];
	var Session_revisa = new Session(configuraciones, codigos);

	Session_revisa.revisa(usuarioID, session, 'salida.php');


// CLASE........: System
// INSTANCIA....: Sistema_sdhybc
// DESCRIPCION..: Objeto para almacenar información general del sistema
	
	var Sistema_sdhybc = new System(sistema_id, sistema_tech_name, 'SDHYBC', 'SECRETARÍA DE DESARROLLO HUMANO Y BIENESTAR COMUNITARIO', '');

// CLASE........: Pantalla
// INSTANCIA....: Pantalla_sdhybc_cuenta
// DESCRIPCION..: Objeto para almacenar información general de la pantalla
	
	var objetos_pantalla = [];
	var ancho = 0;
	var alto = 0;
	var posicion = 0;
	var breaks = [0, 800];
	var metodosbreaks = ['Metodos_resize.ejecuta()', 'Metodos_resize.ejecuta()'];
	var dimensiones = [ancho, alto, posicion, breaks, metodosbreaks];
	var configuraciones = [dimensiones];
	var Pantalla_sdhybc_cuenta = new Pantalla(idioma, 4, "cuenta.php", "SDHYBC CUENTA", "", "", objetos_pantalla, "", Sistema_sdhybc, "../index.php", configuraciones);

	Pantalla_sdhybc_cuenta.dimensiona();

// CLASE........: Date
// INSTANCIA....: Fecha_actual
// ID...........: 
// SE INSERTA EN: 	
// DESCRIPCION..: Fecha que puede generar un Input en HTML o almacenarse para utilizarse
//                para procesos
// HTML.........: No se genera
// IMPRESION....: No se imprime

	var inglesIdioma = ['', ''];
	var espanolIdioma = ['', ''];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 0;
	var tipoDate = 'YYYY-MM-DD';
	var dimensionDate = 0;
	var etiquetaDate = 0;
	var configuraciones = [controlIdioma, tipoImpresion, tipoDate, dimensionDate, etiquetaDate];
	var etiquetas = ['clase', 'ID', 'CONT', 'name'];
	var codigos = [''];
	var valores = ['0000-00-00', '0000-00-00'];
	var metodos = [''];
	var Fecha_actual = new Fecha(configuraciones, etiquetas, codigos, valores, metodos);
	Fecha_actual.actual();

// CLASE........: Metodos
// INSTANCIA....: Metodos_resize
// DESCRIPCION..: Metodos que se ejecutan cuando la pantalla cambia de dimensiones

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [''];
	var Metodos_resize = new Metodos(configuraciones, codigos, elementos);




	



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
// SE INSERTA EN: #ID_SDHYBC_CUENTA_BODY	
// DESCRIPCION..: Maqueta principal de 6 posiciones
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustitutivo
	
	var inglesIdioma = ["STATUS", "HEAD", "BODY", "", "MODAL", "MODAL OPCION"];
	var espanolIdioma = ["ESTADO", "CABEZA", "CUERPO", "", "MODAL", "MODAL OPCION"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 6;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_01", "ID_GEN_MAQUETA", "#ID_SDHYBC_CUENTA_BODY"];
	var codigos = [""];
	var elementosClass = ["area_cinta", "area_cabeza", "area_cuerpo", "area_pie", "modal_oculto", "modal_oculto"];
	var elementosId = ["ID_GEN_STATUS", "ID_GEN_CABEZA", "ID_GEN_CUERPO", "ID_GEN_PIE", "ID_GEN_MODAL", "ID_GEN_MODAL_OPCION"];
	var elementos = [elementosClass, elementosId];
	var maqueta_01 = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	maqueta_01.generahtml();
	maqueta_01.imprimehtml();

// CLASE........: Modal
// INSTANCIA....: Modal_cuenta
// ID...........: ID_SDHYBC_MODAL
// SE INSERTA EN: #ID_SDHYBC_CUENTA_BODY	
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
	var etiquetas = ["ventana_modal", "ID_SDHYBC_MODAL", "#ID_SDHYBC_CUENTA_BODY", "#ID_SDHYBC_MODAL_TITULO", "#ID_SDHYBC_MODAL_AVISO"];
	var codigos = [""];
	var Modal_cuenta = new Modal(configuraciones, etiquetas, codigos);
	Modal_cuenta.generahtml();
	Modal_cuenta.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_cuenta_modal
// ID...........: ID_SDHYBC_MODAL_MAQUETA
// SE INSERTA EN: #ID_SDHYBC_MODAL	
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
	var etiquetas = ["maqueta_ventana_modal", "ID_SDHYBC_MODAL_MAQUETA", "#ID_SDHYBC_MODAL"];
	var codigos = [""];
	var elementosClass = ["titulo_ventana", "area_aviso_modal", "area_button_modal"];
	var elementosId = ["ID_SDHYBC_MODAL_TITULO", "ID_SDHYBC_MODAL_AVISO", "ID_SDHYBC_MODAL_BUTTON"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_cuenta_modal = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_cuenta_modal.generahtml();
	Maqueta_cuenta_modal.imprimehtml();

// CLASE........: Modal
// INSTANCIA....: Modal_cuenta_opcion
// ID...........: ID_SDHYBC_MODAL_OPCION
// SE INSERTA EN: #ID_SDHYBC_CUENTA_BODY	
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
	var etiquetas = ["ventana_modal", "ID_SDHYBC_MODAL_OPCION", "#ID_SDHYBC_CUENTA_BODY", "#ID_SDHYBC_MODAL_OPCION_TITULO", "#ID_SDHYBC_MODAL_OPCION_AVISO"];
	var codigos = [""];
	var Modal_cuenta_opcion = new Modal(configuraciones, etiquetas, codigos);
	Modal_cuenta_opcion.generahtml();
	Modal_cuenta_opcion.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_cuenta_modal_opcion
// ID...........: ID_SDHYBC_MODAL_OPCION_MAQUETA
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION	
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
	var etiquetas = ["maqueta_ventana_modal", "ID_SDHYBC_MODAL_OPCION_MAQUETA", "#ID_SDHYBC_MODAL_OPCION"];
	var codigos = [""];
	var elementosClass = ["titulo_ventana", "area_aviso_modal", "area_button_modal"];
	var elementosId = ["ID_SDHYBC_MODAL_OPCION_TITULO", "ID_SDHYBC_MODAL_OPCION_AVISO", "ID_SDHYBC_MODAL_OPCION_BUTTON"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_cuenta_modal_opcion = new Maqueta(configuraciones, etiquetas, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Ok_modal
// ID...........: ID_OK_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
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
	var etiquetas = ["boton_link_icono_chico", "ID_OK_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "ok_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_cuenta_opcion.cierra()'];
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

// BLOQUE 3 CABECERA Y MENU

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
// INSTANCIA....: Maqueta_user
// ID...........: ID_GEN_STATUS_MAQUETA
// SE INSERTA EN: #ID_GEN_STATUS	
// DESCRIPCION..: Maqueta de 3 posiciones para organizar el area de status de usuario
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustitutivo
	
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

// CLASE........: Html
// INSTANCIA....: User_name
// ID...........: SE CONFIGURA DIRECTO
// SE INSERTA EN: #ID_GEN_STATUS_USER	
// DESCRIPCION..: Codigo HTML directo para printar usuario
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido
	
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

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_cabeza
// ID...........: ID_GEN_CABEZA_MAQUETA
// SE INSERTA EN: #ID_GEN_CABEZA	
// DESCRIPCION..: Maqueta de 4 posiciones para organizar el area de cabecera
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido
	
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

// CLASE........: Menu
// INSTANCIA....: Menu_izquierda
// ID...........: ID_GEN_CABEZA_MENUIZQ_ELEMENTOS
// SE INSERTA EN: #ID_GEN_CABEZA_MENUIZQ	
// DESCRIPCION..: Menu de tipo boton con elemento a la izquierda para gestionar home
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido
	
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

// CLASE........: Menu
// INSTANCIA....: Menu_central
// ID...........: ID_GEN_CABEZA_MENUCENTRO_ELEMENTOS
// SE INSERTA EN: #ID_GEN_CABEZA_MENUCENTRO	
// DESCRIPCION..: Menu de tipo boton con 4 elementos al centro para gestionar opciones principales
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido
	
	var titulosIngles = ['INPUT', 'USER', 'USERS', 'SUPPORT', 'RESUME'];
	var iconosIngles = ['fa-solid fa-pen-to-square', 'fa-solid fa-user disabled', 'fa-solid fa-user-group disabled', 'fa-solid fa-handshake disabled', 'fa-solid fa-table'];
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
	var etiquetas = ["menu_elementos", "ID_GEN_CABEZA_MENUCENTRO_ELEMENTOS", "#ID_GEN_CABEZA_MENUCENTRO"];
	var codigosHtml = "";
	var codigos = [codigosHtml];
	var elementosClass = ["boton_menu_cuadro", "boton_menu_cuadro", "boton_menu_cuadro", "boton_menu_cuadro", "boton_menu_cuadro"];
	var elementosId = ["ID_GEN_CABEZA_MENUCENTRO_ELEMENTOS_01", "ID_GEN_CABEZA_MENUCENTRO_ELEMENTOS_02", "ID_GEN_CABEZA_MENUCENTRO_ELEMENTOS_03", "ID_GEN_CABEZA_MENUCENTRO_ELEMENTOS_04", "ID_GEN_CABEZA_MENUCENTRO_ELEMENTOS_05"];
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

// CLASE........: Menu
// INSTANCIA....: Menu_derecha
// ID...........: ID_GEN_CABEZA_MENUDER_ELEMENTOS
// SE INSERTA EN: #ID_GEN_CABEZA_MENUDER	
// DESCRIPCION..: Menu de tipo boton con elemento a la derecha para gestionar salida
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido
	
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
	var etiquetas = ["menu_elementos", "ID_GEN_CABEZA_MENUDER_ELEMENTOS", "#ID_GEN_CABEZA_MENUDER"];
	var codigosHtml = "";
	var codigos = [codigosHtml];
	var elementosClass = ["boton_menu_cuadro"];
	var elementosId = ["ID_GEN_CABEZA_MENUDER_ELEMENTOS_01"];
	var elementosIcono = [1];
	var elementosOrdenIcono = [0];
	var elementosMetodos = [[['ONCLICK'], ['window.location.replace(`salida.php`)']]];
	var elementos = [elementosClass, elementosId, elementosIcono, elementosOrdenIcono, elementosMetodos];
	var Menu_derecha = new Menu(configuraciones, etiquetas, codigos, elementos);
	Menu_derecha.generahtml();
	Menu_derecha.imprimehtml();


	


// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ





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

// BLOQUE MAQUETACION DEL AREA DE TRABAJO

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





// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ
// QQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQQ





// CLASE........: Maqueta
// INSTANCIA....: maqueta_01_cuerpo
// ID...........: ID_GEN_CUERPO_MAQUETA
// SE INSERTA EN: #ID_GEN_CUERPO	
// DESCRIPCION..: Maqueta de 3 posiciones para organizar el area del cuerpo de trabajo
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido
	
	var inglesIdioma = ["", "", ""];
	var espanolIdioma = ["", "", ""];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 3;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_01_cuerpo", "ID_GEN_CUERPO_MAQUETA", "#ID_GEN_CUERPO"];
	var codigos = [""];
	var elementosClass = ["area_lateral_izq", "area_cuerpo_principal", "area_lateral_der"];
	var elementosId = ["ID_GEN_CUERPO_IZQ", "ID_GEN_CUERPO_CENTRO", "ID_GEN_CUERPO_DER"];
	var elementos = [elementosClass, elementosId];
	var maqueta_01_cuerpo = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	maqueta_01_cuerpo.generahtml();
	maqueta_01_cuerpo.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: maqueta_01_cuerpo_principal
// ID...........: ID_TRABAJO
// SE INSERTA EN: #ID_GEN_CUERPO_CENTRO	
// DESCRIPCION..: Maqueta de 3 posiciones para organizar el area central del cuerpo de trabajo
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido
	
	var inglesIdioma = ["RESUME RECORD", "BUILDING", ""];
	var espanolIdioma = ["RESUMEN DE REGISTROS", "EN CONSTRUCCION", ""];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 3;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_01_cuerpo_principal", "ID_TRABAJO", "#ID_GEN_CUERPO_CENTRO"];
	var codigos = [""];
	var elementosClass = ["area_cabeza_pantalla", "area_trabajo", "area_pie"];
	var elementosId = ["ID_TRABAJO_CABEZA", "ID_TRABAJO_ESCRITORIO", "ID_TRABAJO_PIE"];
	var elementos = [elementosClass, elementosId];
	var maqueta_01_cuerpo_principal = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	maqueta_01_cuerpo_principal.generahtml();
	maqueta_01_cuerpo_principal.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_cuerpo_cabeza
// ID...........: ID_TRABAJO_CABEZA_MAQUETA
// SE INSERTA EN: #ID_TRABAJO_CABEZA	
// DESCRIPCION..: Maqueta de 2 posiciones para organizar la cabeza del area central del cuerpo de trabajo
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido
	
	var inglesIdioma = ["CUENTA", ""];
	var espanolIdioma = ["CUENTA", ""];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 2;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["area_cabeza", "ID_TRABAJO_CABEZA_MAQUETA", "#ID_TRABAJO_CABEZA"];
	var codigos = [""];
	var elementosClass = ["area_titulo_pantalla", "control_normal"];
	var elementosId = ["ID_TRABAJO_CABEZA_TITULO", "ID_TRABAJO_CABEZA_SUBTITULO"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_cuerpo_cabeza = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_cuerpo_cabeza.generahtml();
	Maqueta_cuerpo_cabeza.imprimehtml();

// CLASE........: Panel
// INSTANCIA....: Panel_cuenta
// ID...........: ID_TRABAJO_ESCRITORIO_MAQUETA
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO	
// DESCRIPCION..: Panel para organizar las sub areas generales de trabajo
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido
	
    var tipoImpresion = 0;
	var nivel = [];
	var configuraciones = [tipoImpresion, nivel];
	var etiquetas = ['areas_registro_cuenta area_paneles', 'ID', '#ID_TRABAJO_ESCRITORIO'];
	var elemento01 = ['ACTUALIZA DATOS'];

    var elemento02_01_01_01 = 'NOMBRE:';
    var elemento02_01_01_02 = 'XXNOM';
    var elemento02_01_01 = [elemento02_01_01_01, elemento02_01_01_02];
    var elemento02_01_02_01 = 'PRIMER APELLIDO:';
    var elemento02_01_02_02 = 'PATERNO';
    var elemento02_01_02 = [elemento02_01_02_01, elemento02_01_02_02];
    var elemento02_01_03_01 = 'SEGUNDO APELLIDO:';
    var elemento02_01_03_02 = 'MATERNO';
    var elemento02_01_03 = [elemento02_01_03_01, elemento02_01_03_02];
    var elemento02_01_04_01 = 'CORREO:';
    var elemento02_01_04_02 = 'MAIL';
    var elemento02_01_04 = [elemento02_01_04_01, elemento02_01_04_02];
    var elemento02_01_05 = 'BOTÓN ACTUALIZAR';
    var elemento02_01 = [elemento02_01_01, elemento02_01_02, elemento02_01_03, elemento02_01_04, elemento02_01_05];
    var elemento02 = [elemento02_01];

    var elementos = [elemento01, elemento02];
    var codigos = [''];
    var Panel_cuenta = new Panel(configuraciones, etiquetas, codigos, elementos);
    Panel_cuenta.generahtml_r();
    Panel_cuenta.imprimehtml();

	




    

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

// BLOQUE DATOS DE CAPTURA

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

	





// OBJETO.......: Json
// INSTANCIA....: Json_cuenta_vacia
// DESCRIPCION..: Json de datos para imprimir cuenta vacia  

var Json_cuenta_vacia = {"dato_0" : "",
                        "dato_1" : "",
                        "dato_2" : "",
                        "dato_3" : "",
                        "dato_4" : ""};

// CLASE........: Json
// INSTANCIA....: Json_datos_captura
// DESCRIPCION..: Json que recoge los valores de la consulta baja cuenta según una 
//                configuración. Tipo de fuente de los datos de entrada: 0 = Directo
//                lo recoge de un arreglo, 1 = Json consulta de consultas cada consulta tiene
//                dos objetos, 2 Json de una consulta tiene dos objetos, 3 = Json normal
//                de un solo objeto 

	var numeroElementos = 4;
	var tipoFuente = 2;
	var configuraciones = [numeroElementos, tipoFuente];

	var codigoJsonSalida = '';
	var codigoJsonFuente = '';
	var codigos = [codigoJsonSalida, codigoJsonFuente];
	
	var elementoValorFuente01 = [2, 'dato_02'];
	var elementoValorFuente02 = [2, 'dato_03'];
	var elementoValorFuente03 = [2, 'dato_04'];
	var elementoValorFuente04 = [2, 'dato_05'];
	var elementosValoresFuentes = [elementoValorFuente01, elementoValorFuente02, elementoValorFuente03, elementoValorFuente04];
	var elementosTiposResultado = [0, 0, 0, 0];
	var elementos = [elementosValoresFuentes, elementosTiposResultado];
	
	var Json_datos_captura = new Json(configuraciones, codigos, elementos);

// CLASE........: Datos
// INSTANCIA....: Datos_captura
// DESCRIPCION..: Objeto que determina cuales datos y donde se colocaran en la pantalla

	var numeroElementos = 4;
	var configuraciones = [numeroElementos];
	var codigos = [''];

	var elemento01 = '#ID_2_1_1_2';
	var elemento02 = '#ID_2_1_2_2';
	var elemento03 = '#ID_2_1_3_2';
	var elemento04 = '#ID_2_1_4_2';

	var elementosArea = [elemento01, elemento02, elemento03, elemento04];
	var elementosImpresion = [0, 0, 0, 0];
	var elemen01 = '';
	var elemen02 = '';
	var elemen03 = '';
	var elemen04 = '';
	var elementosValor = [elemen01, elemen02, elemen03, elemen04];
// TIPOS DE FUENTES PARA TRATAR LOS DATOS DEPENDIENDO DE UNA CONFIGURACIÓN
	var elementosTipoFuente = [2, 2, 2, 2];
	var elementosTipoValor01 = ['c_nombre'];
	var elementosTipoValor02 = ['c_paterno'];
	var elementosTipoValor03 = ['c_materno'];
	var elementosTipoValor04 = ['c_correo'];
	var elementosTipoValor = [elementosTipoValor01, elementosTipoValor02, elementosTipoValor03, elementosTipoValor04];
	var elementosTipo = [elementosTipoFuente, elementosTipoValor];
	var elemenMe01 = '';
	var elemenMe02 = '';
	var elemenMe03 = '';
	var elemenMe04 = '';
	var elementosMetodos = [elemenMe01, elemenMe02, elemenMe03, elemenMe04];
	var elemCl01 = 'c_01';
	var elemCl02 = 'c_02';
	var elemCl03 = 'c_03';
	var elemCl04 = 'c_04';
	var elementosClass = [elemCl01, elemCl02, elemCl03, elemCl04];
	var elemId01 = 'ID_DATO_1';
	var elemId02 = 'ID_DATO_2';
	var elemId03 = 'ID_DATO_3';
	var elemId04 = 'ID_DATO_4';
	var elementosId = [elemId01, elemId02, elemId03, elemId04];
	var elementos = [elementosArea, elementosImpresion, elementosValor, elementosTipo, elementosMetodos, elementosClass, elementosId];
	
	var Datos_captura = new Datos(configuraciones, codigos, elementos);

	




    

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

// BLOQUE CONSULTA DE REGISTRO

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
	// INSTANCIA....: Consulta_baja_registro
	// DESCRIPCION..: Consulta que se ejecuta para traer desde la BD el registro de cuenta
	
        var statusConsulta = 0;
		var scriptPhp = 'consulta_baja_usuarios.php';
		var metodoPhp = 'POST';
		var filtro = [usuarioID];
		var posicionCallback = 0;
		var metodosCallback01 = ['Metodos_baja.ejecuta()'];
		var metodosCallback02 = ['Metodos_graba_baja.ejecuta()'];
		var metodosCallback03 = ['Metodos_after_actualiza_baja.ejecuta()'];
		var metodosCallback = [metodosCallback01, metodosCallback02, metodosCallback03]; 
		var callback = [posicionCallback, metodosCallback];
		var lotes = [0, 5000, 0, 0];
		var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
		var codigos = ['', ''];
		var elementos = [''];	
		var Consulta_baja_registro = new Consulta(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_baja
	// DESCRIPCION..: Metodos que se ejecutan despues de ejecutar consulta de cuenta
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
		
		'Modal_cuenta.cierra()',
		'Registro_cuenta.recibe_status(1)',
		'Registro_correo.recibe_status(Consulta_baja_registro.codigos[0][0][1].dato_05)',
		'Registro_id.recibe_status(Consulta_baja_registro.codigos[0][0][1].dato_01)',
		'Json_datos_captura.recibe_json(Consulta_baja_registro.codigos[0])',
		'Json_datos_captura.genera()',
		'Datos_captura.imprime_natural(Json_datos_captura.codigos[0])'
	
		];
		var Metodos_baja = new Metodos(configuraciones, codigos, elementos);

	




    

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

// BLOQUE CONTROLES DE GRABACIÓN

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

	





// CLASE........: Elemento
// INSTANCIA....: Actualizar_cuenta
// ID...........: ID_BOTON_ACTUALIZAR
// SE INSERTA EN: #ID_2_1_5	
// DESCRIPCION..: Link con metodos e icono para actualizar registro de cuenta ya existente
// HTML.........: Cuando es creado de manera disabled
// IMPRESION....: Cuando es creado sustituye contenidos y se inserta en contenedor oculto
//                la primera vez

	var titulosIngles = ['ACTUALIZAR CUENTA'];
	var iconosIngles = ['fa-solid fa-floppy-disk'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['ACTUALIZAR CUENTA'];
	var iconosEspanol = ['fa-solid fa-floppy-disk'];
	var enlacesEspanol = ['javascript:void(0)'];
	var espanolIdioma = [titulosEspanol, iconosEspanol, enlacesEspanol];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 0;
	var ElementoIcono = 1;
	var OrdenIcono = 0;
	var Icono = [ElementoIcono, OrdenIcono];
	var Link = 1;
	var configuraciones = [controlIdioma, tipoImpresion, Icono, Link];
	var etiquetas = ["boton_actualizar boton_link_icono_chico", "ID_BOTON_ACTUALIZAR", "#ID_2_1_5", "actualiza_cuenta"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_evalua_usuario_actualiza.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Actualizar_cuenta = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Actualizar_cuenta.generahtml();
	Actualizar_cuenta.imprimehtml();

	




    

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

// BLOQUE ACTUALIZAR USUARIO

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

	





	
// CLASE........: Metodos
// INSTANCIA....: Metodos_evalua_usuario_actualiza
// DESCRIPCION..: Metodos que se ejecutan al elegir actualizar registro de usuario

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Evaluacion_actualizar_usuario.recibe_validacion([0, document.getElementById("ID_DATO_1_0_INPUT_TEXT").value])',
	'Evaluacion_actualizar_usuario.recibe_validacion([1, document.getElementById("ID_DATO_4_3_INPUT_TEXT").value])',
	'Evaluacion_actualizar_usuario.recibe_metodo([0, "Metodos_modal_actualiza_usuario_confirma.ejecuta()"])',
	'Evaluacion_actualizar_usuario.recibe_metodo([1, "Metodos_modal_usuario_vacio_actualiza.ejecuta()"])',
	'Evaluacion_actualizar_usuario.ejecuta()'];
	var Metodos_evalua_usuario_actualiza = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_actualizar_usuario
// DESCRIPCION..: Evalua que nombre de usuario no este vacio 

	var numeroElementos = 2;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['', ''];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = ['', ''];
	var tiposElementos = [0, 0];
	var validacionElementos = [0, 0];
	var especialesElementos = [[''], ['']];
	var retornoElementos = [[0], [0]];
	var mensajesElementos = [['NOMBRE DE USUARIO VACIO'], ['CORREO VACIO']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_actualizar_usuario = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_usuario_vacio_actualiza
// DESCRIPCION..: Modal para avisar que se intento grabar un usuario sin nombre
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_cuenta_modal_opcion.contenido([0, "DATOS INCORRECTOS"])',
	'Maqueta_cuenta_modal_opcion.contenido([1, "NO PUEDO ACTUALIZAR USUARIO SIN NOMBRES O SIN CORREO"])',
	'Maqueta_cuenta_modal_opcion.generahtml()',
	'Maqueta_cuenta_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_cuenta_opcion.abrefijo()'];
	var Metodos_modal_usuario_vacio_actualiza = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_actualiza_usuario_confirma
// DESCRIPCION..: Modal para confirmar actualizar usuario

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_cuenta_modal_opcion.contenido([0, "CONFIRMA ACTUALIZAR USUARIO"])',
	'Maqueta_cuenta_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE ACTUALIZAR EL USUARIO: "+document.getElementById(`ID_DATO_1_0_INPUT_TEXT`).value+" "+document.getElementById(`ID_DATO_2_1_INPUT_TEXT`).value+" "+document.getElementById(`ID_DATO_3_2_INPUT_TEXT`).value+" CON EL CORREO: "+document.getElementById(`ID_DATO_4_3_INPUT_TEXT`).value])',
	'Maqueta_cuenta_modal_opcion.generahtml()',
	'Maqueta_cuenta_modal_opcion.imprimehtml()',
	'Si_actualizar_usuario_modal.generahtml()',
	'Si_actualizar_usuario_modal.imprimehtml()',
	'No_actualizar_usuario_modal.generahtml()',
	'No_actualizar_usuario_modal.imprimehtml()',
	'Modal_cuenta_opcion.abrefijo()'
	];
	var Metodos_modal_actualiza_usuario_confirma = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_actualizar_usuario_modal
// ID...........: ID_SI_ACTUALIZAR_USUARIO_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de actualizar usuario
// HTML.........: Espera metodo
// IMPRESION....: Espera metodo, sustituye contenido

	var titulosIngles = ['SI'];
	var iconosIngles = ['fa-solid fa-thumbs-up'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['SI'];
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_ACTUALIZAR_USUARIO_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_reestablecer_usuario_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_cuenta_opcion.cierra(), Metodos_actualiza_after_confirma.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_actualizar_usuario_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Elemento
// INSTANCIA....: No_actualizar_usuario_modal
// ID...........: ID_NO_ACTUALIZAR_USUARIO_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en confirmación de actualizar usuario 
// HTML.........: Espera metodo
// IMPRESION....: Espera metodo, agrega contenido

	var titulosIngles = ['NO'];
	var iconosIngles = ['fa-solid fa-thumbs-down'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['NO'];
	var iconosEspanol = ['fa-solid fa-thumbs-down'];
	var enlacesEspanol = ['javascript:void(0)'];
	var espanolIdioma = [titulosEspanol, iconosEspanol, enlacesEspanol];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 1;
	var ElementoIcono = 1;
	var OrdenIcono = 0;
	var Icono = [ElementoIcono, OrdenIcono];
	var Link = 1;
	var valoresValidcacion = [];
	var tiposValoresValidacion = [];
	var statusValidacion = [];
	var Validacion = [valoresValidcacion];
	var configuraciones = [controlIdioma, tipoImpresion, Icono, Link];
	var etiquetas = ["boton_link_icono_chico", "ID_NO_ACTUALIZAR_USUARIO_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "no_reestablecer_usuario_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_cuenta_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_actualizar_usuario_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_actualiza_after_confirma
// DESCRIPCION..: Metodos que se ejecutan despues de confirmar actualizar usuario
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Consulta_verifica_mail.actualizafiltro(0, document.getElementById("ID_DATO_4_3_INPUT_TEXT").value)',
	'Consulta_verifica_mail.posicion_callback(1)',
	'Consulta_verifica_mail.ejecuta()'

	];
	var Metodos_actualiza_after_confirma = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_verifica_mail
// DESCRIPCION..: Consulta que se ejecuta para que no exista otro usuario con correo

	var statusConsulta = 0;
	var scriptPhp = 'consulta_verifica_mail.php';
	var metodoPhp = 'POST';
	var filtro = [''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_verifica_correo_graba.ejecuta()'];
	var metodosCallback02 = ['Metodos_after_verifica_correo_actualiza.ejecuta()'];
	var metodosCallback = [metodosCallback01, metodosCallback02]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_verifica_mail = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_verifica_correo_actualiza
// DESCRIPCION..: Metodos que se ejecutan despues de verificar actualizar usuario

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Evaluacion_after_verifica_mail_actualiza_igual.recibe_validacion([0, Registro_correo.configuraciones[0]])',
		'Evaluacion_after_verifica_mail_actualiza_igual.recibe_especial(0, 0, document.getElementById("ID_DATO_4_3_INPUT_TEXT").value)',
		'Evaluacion_after_verifica_mail_actualiza_igual.ejecuta()'
	
	];

	var Metodos_after_verifica_correo_actualiza = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_after_verifica_mail_actualiza_igual
// DESCRIPCION..: Evalua si hay persistencia de correo para actualizar 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_after_verifica_igualdad.ejecuta()', 'Metodos_after_verifica_igualdad_igual.ejecuta()'];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [1];
	var especialesElementos = [[""]];
	var retornoElementos = [[0]];
	var mensajesElementos = [['NO EXISTE CORREO']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_after_verifica_mail_actualiza_igual = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_verifica_igualdad
// DESCRIPCION..: Metodos que se ejecutan despues de verificar actualizar usuario

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Evaluacion_after_verifica_igualdad_actualiza.recibe_validacion([0, Consulta_verifica_mail.codigos[0][0][1].dato_1])',
		'Evaluacion_after_verifica_igualdad_actualiza.ejecuta()'
	
	];

	var Metodos_after_verifica_igualdad = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_after_verifica_igualdad_actualiza
// DESCRIPCION..: Evalua el resultado de la verificación de existe correo para actualizar 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_modal_correo_existe_actualizar.ejecuta()', 'Metodos_verifica_valido.ejecuta()'];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [1];
	var especialesElementos = [["0"]];
	var retornoElementos = [[0]];
	var mensajesElementos = [['NO EXISTE CORREO']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_after_verifica_igualdad_actualiza = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_verifica_igualdad_igual
// DESCRIPCION..: Metodos que se ejecutan despues de verificar actualizar usuario

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Evaluacion_after_verifica_igualdad_actualiza_igual.recibe_validacion([0, Consulta_verifica_mail.codigos[0][0][1].dato_1])',
		'Evaluacion_after_verifica_igualdad_actualiza_igual.ejecuta()'
	
	];

	var Metodos_after_verifica_igualdad_igual = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_after_verifica_igualdad_actualiza_igual
// DESCRIPCION..: Evalua el resultado de la verificación de existe correo para actualizar 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_modal_correo_existe_actualizar.ejecuta()', 'Metodos_verifica_valido.ejecuta()'];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [1];
	var especialesElementos = [["1"]];
	var retornoElementos = [[0]];
	var mensajesElementos = [['NO EXISTE CORREO']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_after_verifica_igualdad_actualiza_igual = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_correo_existe_actualizar
// DESCRIPCION..: Modal para avisar que el correo ya existe al actualizar
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_cuenta_modal_opcion.contenido([0, "CORREO EXISTE"])',
	'Maqueta_cuenta_modal_opcion.contenido([1, "NO PUEDO ACTUALIZAR USUARIO PORQUÉ YA EXISTE EL CORREO: "+document.getElementById("ID_DATO_4_3_INPUT_TEXT").value])',
	'Maqueta_cuenta_modal_opcion.generahtml()',
	'Maqueta_cuenta_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_cuenta_opcion.abrefijo()'
	];
	var Metodos_modal_correo_existe_actualizar = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_verifica_valido
// DESCRIPCION..: Metodos que se ejecutan para verificar si el correo es valido
//                de evaluación

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
	'Modal_cuenta.abrefijo()',
	'Phpmail_graba.recibe_parametro(0, document.getElementById("ID_DATO_4_3_INPUT_TEXT").value)',
	'Phpmail_graba.posicion_callback(1)',
	'Phpmail_graba.ejecuta()'	
	
	];
	var Metodos_verifica_valido = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Phpmail
// INSTANCIA....: Phpmail_graba
// DESCRIPCION..: Mail para confirmar correo electronico
	
	var statusMail = 0;
	var scriptPhp = 'enviar_mail_usuario.php';
	var metodoPhp = 'POST';
	var parametros = [''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_mail_usuario.ejecuta()'];
	var metodosCallback02 = ['Metodos_after_mail_actualiza_usuario.ejecuta()'];
	var metodosCallback = [metodosCallback01, metodosCallback02]; 
	var callback = [posicionCallback, metodosCallback];
	var codigos = [''];
	var configuraciones = [statusMail, scriptPhp, metodoPhp, parametros, callback, codigos];
	var Phpmail_graba = new Phpmail(configuraciones, codigos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_mail_actualiza_usuario
// DESCRIPCION..: Metodos que se ejecutan despues de enviar mail

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
	'Modal_cuenta.cierra()',
	'Evaluacion_after_mail_actualiza.recibe_validacion([0, Phpmail_graba.configuraciones[0]])',
	'Evaluacion_after_mail_actualiza.ejecuta()'

	];
	var Metodos_after_mail_actualiza_usuario = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_after_mail_actualiza
// DESCRIPCION..: Evalua el resultado del envio 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_correo_valido_actualizar.ejecuta()', 'Metodos_modal_correo_invalido_actualiza.ejecuta()'];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [1];
	var especialesElementos = [["0"]];
	var retornoElementos = [[0]];
	var mensajesElementos = [['CORREO INCORRECTO']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_after_mail_actualiza = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_correo_invalido_actualiza
// DESCRIPCION..: Modal para avisar que el correo es invalido
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_cuenta_modal_opcion.contenido([0, "CORREO INVALIDO"])',
	'Maqueta_cuenta_modal_opcion.contenido([1, "NO PUEDO ACTUALIZAR USUARIO PORQUÉ EL CORREO: "+document.getElementById("ID_DATO_4_3_INPUT_TEXT").value+" ES INVALIDO."])',
	'Maqueta_cuenta_modal_opcion.generahtml()',
	'Maqueta_cuenta_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_cuenta_opcion.abrefijo()'];
	var Metodos_modal_correo_invalido_actualiza = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_correo_valido_actualizar
// DESCRIPCION..: Metodos que se ejecutan despues de validar existencia correo para actualizar
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_cuenta.abrefijo()',
	'Consulta_actualizar_usuario.actualizafiltro(0, 1)',
	'Consulta_actualizar_usuario.actualizafiltro(1, Registro_id.configuraciones[0])',
	'Datos_captura.consulta_natural(2, Consulta_actualizar_usuario)',
	'Consulta_actualizar_usuario.actualizafiltro(6, Phpmail_graba.codigos[0][0].token)',
	'Consulta_actualizar_usuario.actualizafiltro(7, Phpmail_graba.codigos[0][0].expira)',
	'Consulta_actualizar_usuario.posicion_callback(1)',
	'Consulta_actualizar_usuario.ejecuta()'

	];
	
	var Metodos_correo_valido_actualizar = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_actualizar_usuario
// DESCRIPCION..: Consulta que se ejecuta para actualiza usuario

	var statusConsulta = 0;
	var scriptPhp = 'consulta_actualiza_cuenta.php';
	var metodoPhp = 'POST';
	var filtro = [
		
	'0',
	'1',
	'2',
	'3',
	'4',
	'5',
	'6',
	'7'
	
	];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_graba_usuario.ejecuta()'];
	var metodosCallback02 = ['Metodos_after_actualiza_usuario.ejecuta()'];
	var metodosCallback = [metodosCallback01, metodosCallback02]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_actualizar_usuario = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_actualiza_usuario
// DESCRIPCION..: Metodos que se ejecutan despues de actualizar nueva usuario

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Registro_correo.recibe_status(document.getElementById("ID_DATO_4_3_INPUT_TEXT").value)',
	'Consulta_baja_registro.actualizafiltro(0, Registro_id.configuraciones[0])',
	'Consulta_baja_registro.posicion_callback(2)',
	'Modal_cuenta.abrefijo()',
	'Consulta_baja_registro.ejecuta()'
	];
	var Metodos_after_actualiza_usuario = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_actualiza_baja
// DESCRIPCION..: Metodos que se ejecutan despues de bajar usuario recien actualizado

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Registro_cuenta.recibe_status(1)',
	'Json_datos_captura.recibe_json(Consulta_baja_registro.codigos[0])',
	'Json_datos_captura.genera()',
	'Datos_captura.imprime_natural(Json_datos_captura.codigos[0])',
	'Modal_cuenta.cierra()',
	'Maqueta_cuenta_modal_opcion.contenido([0, "CUENTA ACTUALIZADA"])',
	'Maqueta_cuenta_modal_opcion.contenido([1, "LA CUENTA DEL USUARIO: "+document.getElementById(`ID_DATO_1_0_INPUT_TEXT`).value+" "+document.getElementById(`ID_DATO_2_1_INPUT_TEXT`).value+" "+document.getElementById(`ID_DATO_3_2_INPUT_TEXT`).value+" CON EL CORREO: "+document.getElementById(`ID_DATO_4_3_INPUT_TEXT`).value+" FUE ACTUALIZADA EXITOSAMENTE"])',
	'Maqueta_cuenta_modal_opcion.generahtml()',
	'Maqueta_cuenta_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_cuenta_opcion.abrefijo()'
	];
	var Metodos_after_actualiza_baja = new Metodos(configuraciones, codigos, elementos);





    



//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&% //// &%&%&%&%&%&%&%&%&%&%&%&%
//// &%&%&%&%&%&%&%&%&%&%&%&%










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

// BLOQUE METODOS E INSTANCIAS FINALES

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

// CLASE........: Registro
// INSTANCIA....: Registro_cuenta
// DESCRIPCION..: Control del status del registro de cuenta 0 = no hay registro 1 = modificando
//                registro grabado 2 = capturando nuevo registro

	var valor = 0;
	var configuraciones = [valor];
	var Registro_cuenta = new Registro(configuraciones);

// CLASE........: Registro
// INSTANCIA....: Registro_id
// DESCRIPCION..: Control de id de la cuenta

	var valor = 0;
	var configuraciones = [valor];
	var Registro_id = new Registro(configuraciones);

// CLASE........: Registro
// INSTANCIA....: Registro_correo
// DESCRIPCION..: Control de email

	var valor = '';
	var configuraciones = [valor];
	var Registro_correo = new Registro(configuraciones);

	Modal_cuenta.abrefijo();
	Consulta_baja_registro.ejecuta_2();

// METODO.......: redimensiona()
// INSTANCIA....: Pantalla_sdhybc_cuenta
// DESCRIPCION..: Obtiene las dimensiones de la pantalla al iniciar por primera vez

	Pantalla_sdhybc_cuenta.redimensiona();
	
</script>