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
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS apoyos.php';
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
		<link rel="stylesheet" href="../css/sdhybc_apoyos.css">
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
		<script src="../../pantalib/javascript/objetos/new/Combolist.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Session.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Navega.js"></script>
    </head>
    <body class="maqueta_base" id="ID_SDHYBC_APOYOS_BODY">
        APOYOS SDHYBC 
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

	var idCode = 6;
	var statusSessiono = [1, 2, 3];
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
// INSTANCIA....: Pantalla_sdhybc_apoyos
// DESCRIPCION..: Objeto para almacenar información general de la pantalla
	
	var objetos_pantalla = [];
	var ancho = 0;
	var alto = 0;
	var posicion = 0;
	var breaks = [0, 800];
	var metodosbreaks = ['Metodos_resize.ejecuta()', 'Metodos_resize.ejecuta()'];
	var dimensiones = [ancho, alto, posicion, breaks, metodosbreaks];
	var configuraciones = [dimensiones];
	var Pantalla_sdhybc_apoyos = new Pantalla(idioma, 6, "apoyos.php", "SDHYBC APOYOS", "", "", objetos_pantalla, "", Sistema_sdhybc, "../index.php", configuraciones);

	Pantalla_sdhybc_apoyos.dimensiona();

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
	var elementos = ['Gradilla_programas.generahtml()', 'Gradilla_programas.imprimehtml()'];
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
// SE INSERTA EN: #ID_SDHYBC_APOYOS_BODY	
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
	var etiquetas = ["maqueta_01", "ID_GEN_MAQUETA", "#ID_SDHYBC_APOYOS_BODY"];
	var codigos = [""];
	var elementosClass = ["area_cinta", "area_cabeza", "area_cuerpo", "area_pie", "modal_oculto", "modal_oculto"];
	var elementosId = ["ID_GEN_STATUS", "ID_GEN_CABEZA", "ID_GEN_CUERPO", "ID_GEN_PIE", "ID_GEN_MODAL", "ID_GEN_MODAL_OPCION"];
	var elementos = [elementosClass, elementosId];
	var maqueta_01 = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	maqueta_01.generahtml();
	maqueta_01.imprimehtml();

// CLASE........: Modal
// INSTANCIA....: Modal_apoyos
// ID...........: ID_SDHYBC_MODAL
// SE INSERTA EN: #ID_SDHYBC_APOYOS_BODY	
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
	var etiquetas = ["ventana_modal", "ID_SDHYBC_MODAL", "#ID_SDHYBC_APOYOS_BODY", "#ID_SDHYBC_MODAL_TITULO", "#ID_SDHYBC_MODAL_AVISO"];
	var codigos = [""];
	var Modal_apoyos = new Modal(configuraciones, etiquetas, codigos);
	Modal_apoyos.generahtml();
	Modal_apoyos.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_apoyos_modal
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
	var Maqueta_apoyos_modal = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_apoyos_modal.generahtml();
	Maqueta_apoyos_modal.imprimehtml();

// CLASE........: Modal
// INSTANCIA....: Modal_apoyos_opcion
// ID...........: ID_SDHYBC_MODAL_OPCION
// SE INSERTA EN: #ID_SDHYBC_APOYOS_BODY	
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
	var etiquetas = ["ventana_modal", "ID_SDHYBC_MODAL_OPCION", "#ID_SDHYBC_APOYOS_BODY", "#ID_SDHYBC_MODAL_OPCION_TITULO", "#ID_SDHYBC_MODAL_OPCION_AVISO"];
	var codigos = [""];
	var Modal_apoyos_opcion = new Modal(configuraciones, etiquetas, codigos);
	Modal_apoyos_opcion.generahtml();
	Modal_apoyos_opcion.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_apoyos_modal_opcion
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
	var Maqueta_apoyos_modal_opcion = new Maqueta(configuraciones, etiquetas, codigos, elementos);

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
	var onclickMetodos = ['Navega_general.ejecuta()', 'Modal_apoyos_opcion.cierra()'];
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
	
	var inglesIdioma = ["PROGRAMAS Y APOYOS", ""];
	var espanolIdioma = ["PROGRAMAS Y APOYOS", ""];
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
// INSTANCIA....: Panel_programas
// ID...........: ID_TRABAJO_ESCRITORIO_MAQUETA
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO	
// DESCRIPCION..: Panel para organizar las sub areas generales de trabajo
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido
	
    var tipoImpresion = 0;
	var nivel = [];
	var configuraciones = [tipoImpresion, nivel];
	var etiquetas = ['areas_registro_captura area_paneles', 'ID', '#ID_TRABAJO_ESCRITORIO'];
	var elemento01 = ['ELIGE UN PROGRAMA O CREA UN REGISTRO NUEVO'];
	var elemento02 = ['AREA GRADILLA PROGRAMAS'];
    var elemento03_01 = 'AREA DE CAPTURA PROGRAMAS';
	var elemento03_02_01_01 = 'STATUS REGISTRO';
	var elemento03_02_01_02 = 'ID REGISTRO';
	var elemento03_02_01 = [elemento03_02_01_01, elemento03_02_01_02];
	var elemento03_02_02_01 = 'ELIMINAR';
	var elemento03_02_02_02 = 'ACTUALIZAR';
	var elemento03_02_02_03 = 'GRABAR';
	var elemento03_02_02_04 = 'REESTABLECER';
	var elemento03_02_02_05 = 'LIMPIAR';
	var elemento03_02_02_06 = 'NUEVO';
	var elemento03_02_02 = [elemento03_02_02_01, elemento03_02_02_02, elemento03_02_02_03, elemento03_02_02_04, elemento03_02_02_05, elemento03_02_02_06];
	var elemento03_02 = [elemento03_02_01, elemento03_02_02];
	var elemento03_03 = 'FORMULARIO PROGRAMAS';
	var elemento03 = [elemento03_01, elemento03_02, elemento03_03];
    var elementos = [elemento01, elemento02, elemento03];
    var codigos = [''];
    var Panel_programas = new Panel(configuraciones, etiquetas, codigos, elementos);
    Panel_programas.generahtml_r();
    Panel_programas.imprimehtml();






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE AREA GRADILLA PROGRAMAS

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************





/*
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_gradilla
	// DESCRIPCION..: Metodos que se ejecutan despues de actualizar y filtrar gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
		
		'Modal_apoyos.abrefijo()',
		'Consulta_gradilla_apoyos.actualizafiltro(0, Registro_id_programa.configuraciones[0])',
		'Consulta_gradilla_apoyos.actualizafiltro(1, 0)',
		'Consulta_gradilla_apoyos.actualizafiltro(2, "")',
		'Consulta_gradilla_apoyos.actualizafiltro(3, "")',
		'Consulta_gradilla_apoyos.actualizafiltro(4, 0)',
		'Consulta_gradilla_apoyos.actualizafiltro(5, "0000-00-00")',
		'Consulta_gradilla_apoyos.posicion_callback(1)',
		'Consulta_gradilla_apoyos.ejecuta_2()'
		
		];
		var Metodos_gradilla = new Metodos(configuraciones, codigos, elementos);
*/	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_gradilla
	// DESCRIPCION..: Metodos que se ejecutan despues de actualizar y filtrar gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
		
//			'alert("ESTOY EN METODOS CALLBACK DE CONSULTA PROGRAMAS VOY A CONSULTA COMBO MUNICIPIOS ESTOY VIVO")',
			'Consulta_combolist_municipios.inicializa_parametros()',
			'Consulta_combolist_municipios.limpia_codigos()',
			'Consulta_combolist_municipios.posicion_callback(1)',
			'Consulta_combolist_municipios.ejecuta_2()'
		
		];
		var Metodos_gradilla = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_gradilla_graba
	// DESCRIPCION..: Metodos que se ejecutan despues de actualizar y filtrar gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [

			'Gradilla_programas.generahtml()',
			'Gradilla_programas.imprimehtml()'
		
		];
		var Metodos_gradilla_graba = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Gradilla
	// INSTANCIA....: Gradilla_programas
	// ID...........: ID_TRABAJO_ESCRITORIO_MAQUETA_2_3_1
	// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_2_3	
	// DESCRIPCION..: Gradilla de programas
	// HTML.........: Espera metodo
	// IMPRESION....: Espera metodo, sustituye contenido
	
		var inglesElementos = ['ID', 'USUA', 'NOMBRE', 'FECHA INICIO', 'FECHA TERMINO', 'DESCRIPCIÓN', 'APOYOS', 'REGISTRO'];
		var inglesIdioma = [inglesElementos, 'PROGRAMS LIST'];
		var espanolElementos = ['ID', 'US', 'NOMBRE', 'FECHA INICIO', 'FECHA TERMINO', 'DESCRIPCIÓN', 'APY', 'REG'];
		var espanolIdioma = [espanolElementos, 'LISTA DE PROGRAMAS'];
		var arregloIdioma = [inglesIdioma, espanolIdioma];
		var controlIdioma = [idioma, arregloIdioma];
		var numeroElementos = 8;
		var tipoImpresion = 0;
		var consulta = Consulta_gradilla;
		var parametros = [0, 10];
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
		var metodoValor = 'Metodos_modal_bajando_programa.ejecuta(), Gradilla_programas.actualiza_valores';
		var tipoValorArreglo = [0];
		var datoValorArreglo = [0];
		var valorArreglo = [tipoValorArreglo, datoValorArreglo];
		var valores = [valorIncialClave, valorClave, valorInicialPosicion, valorPosicion, valorInicialCelda, valorCelda, metodoValor, valorArreglo];
		var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, consulta, parametros, titulo, orientacion, controles, valores];
		var etiquetas = ['gradilla', 'ID_GRADILLA', '#ID_2_1'];
		var elementos_tipo_valor = [0, 0, 0, 0, 0, 0, 0, 0];
		var elementos_llave_valor = ['dato_01', 'dato_02', 'dato_03', 'dato_04', 'dato_05', 'dato_06', 'dato_07', 'dato_08'];
		var elementos_ancho_valor = ['cinco', 'cinco', 'veinte', 'diez', 'diez', 'treinta', 'cinco', 'quince'];
		var elementos_metodos = ['Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()'];
		var elementos_iconos = ['', '', '', '', '', '', '', ''];
		var elementos = [elementos_tipo_valor, elementos_llave_valor, elementos_ancho_valor, elementos_metodos, elementos_iconos];
		var codigos = [''];
		var Gradilla_programas = new Gradilla(configuraciones, etiquetas, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_avanzagrid
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige avanzar una pagina en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = ['Gradilla_programas.avanza()',
		'Gradilla_programas.generahtml()',
		'Gradilla_programas.imprimehtml()'];
		var Metodos_avanzagrid = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_inicio_posicion
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir a primera pagina en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = ['Gradilla_programas.inicializa_posicion()',
		'Gradilla_programas.generahtml()',
		'Gradilla_programas.imprimehtml()'];
		var Metodos_inicio_posicion = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_inicio_posicion
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir a primera pagina en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = ['Gradilla_programas.retrocede()',
		'Gradilla_programas.generahtml()',
		'Gradilla_programas.imprimehtml()'];
		var Metodos_retrocedegrid = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_final_posicion
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir a última pagina en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = ['Gradilla_programas.finaliza_posicion()',
		'Gradilla_programas.generahtml()',
		'Gradilla_programas.imprimehtml()'];
		var Metodos_final_posicion = new Metodos(configuraciones, codigos, elementos);



	



// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE ELIGE GRID PROGRAMAS

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_modal_bajando_programa
// DESCRIPCION..: Modal para avisar que se intento grabar un usuario sin nombre
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	
	'Maqueta_apoyos_modal_opcion.contenido([0, "BAJANDO PROGRAMA"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "BAJANDO DATOS DEL PROGRAMA ELEGIDO PARA SER CONSULTADO, MODIFICADO O ELIMINADO"])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Navega_general.recibe_destino(Navega_programas.configuraciones[0])',
	'Modal_apoyos_opcion.abrefijo()'
	

	];
	var Metodos_modal_bajando_programa = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_elige_grid
	// DESCRIPCION..: Metodos que se ejecutan al elegir un registro en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
		'Consulta_baja_programa.actualizafiltro(0, Gradilla_programas.configuraciones[8][1])',
		'Registro_id_programa.recibe_status(Gradilla_programas.configuraciones[8][1])',
		'Consulta_baja_programa.posicion_callback(0)',
		'Consulta_baja_programa.ejecuta()'
	
		]
		var Metodos_elige_grid = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Consulta
	// INSTANCIA....: Consulta_baja_programa
	// DESCRIPCION..: Consulta que se ejecuta para traer desde la BD un registro elegido en gradilla
	
		var statusConsulta = 0;
		var scriptPhp = 'consulta_baja_programa.php';
		var metodoPhp = 'POST';
		var filtro = [''];
		var posicionCallback = 0;
		var metodosCallback01 = ['Metodos_baja.ejecuta()'];
		var metodosCallback02 = ['Metodos_graba_baja_programa.ejecuta()'];
		var metodosCallback03 = ['Metodos_graba_baja.ejecuta()'];
		var metodosCallback04 = ['Metodos_actualizar_baja_programa.ejecuta()'];
		var metodosCallback05 = ['Metodos_refresca_localidad_c.ejecuta()'];
		var metodosCallback = [metodosCallback01, metodosCallback02, metodosCallback03, metodosCallback04, metodosCallback05]; 
		var callback = [posicionCallback, metodosCallback];
		var lotes = [0, 5000, 0, 0];
		var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
		var codigos = ['', ''];
		var elementos = [''];	
		var Consulta_baja_programa = new Consulta(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_baja
	// DESCRIPCION..: Metodos que se ejecutan despues de ejecutar consulta de programa
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
		'Modal_apoyos.cierra()',
		'Registro_status_programa.recibe_status(1)',
		'Registro_status_apoyo.recibe_status(0)',
		'Registro_status_detalle.recibe_status(0)',
		'Registro_id_apoyo.recibe_status(0)',
		'Registro_id_detalle.recibe_status(0)',
		
		'Json_datos_captura_programa.recibe_json(Consulta_baja_programa.codigos[0])',
		'Json_datos_captura_programa.genera()',
		'Datos_captura_programa.imprime_natural(Json_datos_captura_programa.codigos[0])',

		'Modal_apoyos.abrefijo()',
		'Consulta_gradilla_apoyos.limpia_codigos()',
		'Consulta_gradilla_apoyos.inicializa_parametros()',
		'Consulta_gradilla_apoyos.actualizafiltro(0, Registro_id_programa.configuraciones[0])',
		'Consulta_gradilla_apoyos.actualizafiltro(1, 0)',
		'Consulta_gradilla_apoyos.actualizafiltro(2, "")',
		'Consulta_gradilla_apoyos.actualizafiltro(3, "")',
		'Consulta_gradilla_apoyos.actualizafiltro(4, 0)',
		'Consulta_gradilla_apoyos.actualizafiltro(5, "0000-00-00")',
		'Consulta_gradilla_apoyos.posicion_callback(0)',
		'Consulta_gradilla_apoyos.ejecuta_2()',

		'Modal_apoyos.abrefijo()',
		'Consulta_gradilla_detalles.limpia_codigos()',
		'Consulta_gradilla_detalles.inicializa_parametros()',
		'Consulta_gradilla_detalles.posicion_callback(0)',
		'Consulta_gradilla_detalles.actualizafiltro(0, Registro_id_apoyo.configuraciones[0])',
		'Consulta_gradilla_detalles.ejecuta_2()',

		'Datos_captura_filtros.imprime_natural(Json_filtros_vacios)',
		
		'Combolist_municipios.inicializa_valor()',	
		'Combolist_municipios.generahtml()',	
		'Combolist_municipios.imprimehtml()',	

		'Combolist_localidades.inicializa_valor()',	
		'Combolist_localidades.generahtml()',	
		'Combolist_localidades.imprimehtml()',	

		'Datos_captura_apoyo.imprime_natural(Json_apoyo_vacio)',
		'Datos_captura_detalle.imprime_natural(Json_detalle_vacio)',
		'Datos_captura_material.imprime_natural(Json_material_vacio)',

		'Combolist_cedulas.inicializa_valor()',	
		'Combolist_cedulas.generahtml()',	
		'Combolist_cedulas.imprimehtml()',	

		'Combolist_familiares.inicializa_valor()',	
		'Combolist_familiares.generahtml()',	
		'Combolist_familiares.imprimehtml()',	

		'Clases_programa.afectar()'
	
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

// BLOQUE CONTROLES GENERALES DE LA CAPTURA

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Eliminar_programa
// ID...........: ID_BOTON_ELIMINAR
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_X_1_2_1	
// DESCRIPCION..: Link con metodos e icono para eliminar registro de programa ya existente
// HTML.........: Cuando es creado de manera disabled
// IMPRESION....: Cuando es creado sustituye contenidos y se inserta en contenedor oculto
//                la primera vez

	var titulosIngles = ['ELIMINAR PROGRAMA'];
	var iconosIngles = ['fa-solid fa-trash-can'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['ELIMINAR PROGRAMA'];
	var iconosEspanol = ['fa-solid fa-trash-can'];
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
	var etiquetas = ["boton_eliminar boton_link_icono_chico", "ID_BOTON_ELIMINAR", "#ID_3_2_2_1", "elimina_programa"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_modal_elimina_programa_confirma.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Eliminar_programa = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Eliminar_programa.generahtml();
	Eliminar_programa.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Actualizar_programa
// ID...........: ID_BOTON_ACTUALIZAR
// SE INSERTA EN: ##ID_3_2_2_2	
// DESCRIPCION..: Link con metodos e icono para actualizar registro de programa ya existente
// HTML.........: Cuando es creado de manera disabled
// IMPRESION....: Cuando es creado sustituye contenidos y se inserta en contenedor oculto
//                la primera vez

	var titulosIngles = ['ACTUALIZAR PROGRAMA'];
	var iconosIngles = ['fa-solid fa-floppy-disk'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['ACTUALIZAR PROGRAMA'];
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
	var etiquetas = ["boton_actualizar boton_link_icono_chico", "ID_BOTON_ACTUALIZAR", "#ID_3_2_2_2", "actualiza_programa"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_elige_actualizar_programa.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Actualizar_programa = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Actualizar_programa.generahtml();
	Actualizar_programa.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Grabar_programa
// ID...........: ID_BOTON_GRABAR
// SE INSERTA EN: ##ID_3_2_2_3	
// DESCRIPCION..: Link con metodos e icono para grabar registro de programa nuevo
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado sustituye contenidos

	var titulosIngles = ['GRABAR PROGRAMA'];
	var iconosIngles = ['fa-solid fa-floppy-disk'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['GRABAR PROGRAMA'];
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
	var etiquetas = ["boton_grabar boton_link_icono_chico", "ID_BOTON_GRABAR", "#ID_3_2_2_3", "graba_programa"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_graba_programa.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Grabar_programa = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Grabar_programa.generahtml();
	Grabar_programa.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Reestablece_captura
// ID...........: ID_BOTON_REESTABLECE
// SE INSERTA EN: #ID_3_2_2_3	
// DESCRIPCION..: Link con metodos e icono para reestablecer valores de la captura
//                cuando se esta modificando un registro de programa
// HTML.........: Cuando es creado de manera disabled
// IMPRESION....: Cuando es creado espera metodo para quitar disabled

	var titulosIngles = ['REESTABLECER VALORES DE CAPTURA'];
	var iconosIngles = ['fa-solid fa-arrow-rotate-right'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['REESTABLECER VALORES DE CAPTURA'];
	var iconosEspanol = ['fa-solid fa-arrow-rotate-right'];
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
	var etiquetas = ["boton_reestablece boton_link_icono_chico", "ID_BOTON_REESTABLECE", "#ID_3_2_2_4", "reestablece_captura"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_confirma_reestablece.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Reestablece_captura = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Reestablece_captura.generahtml();
	Reestablece_captura.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Limpia_captura
// ID...........: ID_BOTON_LIMPIA
// SE INSERTA EN: #ID_3_2_2_5	
// DESCRIPCION..: Link con metodos e icono para limpiar la captura capturando nueva programa
// HTML.........: Cuando es creado de manera disabled
// IMPRESION....: Cuando es creado espera metodo para quitar disabled

	var titulosIngles = ['LIMPIAR CAPTURA'];
	var iconosIngles = ['fa-regular fa-clipboard'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['LIMPIAR CAPTURA'];
	var iconosEspanol = ['fa-regular fa-clipboard'];
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
	var etiquetas = ["boton_limpia boton_link_icono_chico", "ID_BOTON_LIMPIA", "#ID_3_2_2_5", "limpia_captura"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_nuevo_programa.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Limpia_captura = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Limpia_captura.generahtml();
	Limpia_captura.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Nueva_captura
// ID...........: ID_BOTON_NUEVA
// SE INSERTA EN: ##ID_3_2_2_6	
// DESCRIPCION..: Link con metodos e icono para abrir la captura a un nuevo registro de programa
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido

	var titulosIngles = ['CAPTURAR NUEVO PROGRAMA'];
	var iconosIngles = ['fa-solid fa-plus'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['CAPTURAR NUEVO PROGRAMA'];
	var iconosEspanol = ['fa-solid fa-plus'];
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
	var etiquetas = ["boton_nueva boton_link_icono_chico", "ID_BOTON_NUEVA", "#ID_3_2_2_6", "nueva_captura"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_nuevo_programa.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Nueva_captura = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Nueva_captura.generahtml();
	Nueva_captura.imprimehtml();
	
	




// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE GRABAR PROGRAMA

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_graba_programa
// DESCRIPCION..: Metodos que se ejecutan al elegir grabar registro de programa

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Evaluacion_grabar_programa.recibe_validacion([0, document.getElementById("ID_DATO_PROGRAMA_3_2_INPUT_TEXT").value])',
	'Evaluacion_grabar_programa.recibe_validacion([1, document.getElementById("ID_DATO_PROGRAMA_6_5_INPUT_TEXT").value])',
	'Evaluacion_grabar_programa.ejecuta()'];
	var Metodos_graba_programa = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_grabar_programa
// DESCRIPCION..: Evalua que nombre y descripción de programa no este vacio 

	var numeroElementos = 2;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_modal_graba_programa_confirma.ejecuta()', 'Metodos_modal_programa_vacio.ejecuta()'];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = ['', ''];
	var tiposElementos = [0, 0];
	var validacionElementos = [0, 0];
	var especialesElementos = [[''], ['']];
	var retornoElementos = [[0], [0]];
	var mensajesElementos = [['NOMBRE DE PROGRAMA VACIO'], ['NOMBRE DE DESCRIPCIÓN VACIO']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_grabar_programa = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_programa_vacio
// DESCRIPCION..: Modal para avisar que se intento grabar un usuario sin nombre
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_apoyos_modal_opcion.contenido([0, "DATOS INCORRECTOS"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "NO PUEDO GRABAR PROGRAMA SIN NOMBRE O SIN DESCRIPCIÓN"])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Navega_general.recibe_destino(Navega_programas.configuraciones[0])',
	'Modal_apoyos_opcion.abrefijo()'

	];
	var Metodos_modal_programa_vacio = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_graba_programa_confirma
// DESCRIPCION..: Modal para confirmar grabar programa

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_apoyos_modal_opcion.contenido([0, "CONFIRMA GRABAR PROGRAMA"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE GRABAR EL PROGRAMA: "+document.getElementById(`ID_DATO_PROGRAMA_3_2_INPUT_TEXT`).value])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Si_grabar_programa_modal.generahtml()',
	'Si_grabar_programa_modal.imprimehtml()',
	'No_grabar_programa_modal.generahtml()',
	'No_grabar_programa_modal.imprimehtml()',
	'Modal_apoyos_opcion.abrefijo()'
	];
	var Metodos_modal_graba_programa_confirma = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_grabar_programa_modal
// ID...........: ID_SI_GRABAR_PROGRAMA_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de grabar programa
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_GRABAR_PROGRAMA_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_grabar_programa_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra(), Metodos_graba_programa_bd.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_grabar_programa_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Elemento
// INSTANCIA....: No_grabar_programa_modal
// ID...........: ID_NO_GRABAR_PROGRAMA_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en confirmación de grabar programa 
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
	var etiquetas = ["boton_link_icono_chico", "ID_NO_GRABAR_PROGRAMA_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "no_grabar_programa_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_grabar_programa_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);
	
// CLASE........: Metodos
// INSTANCIA....: Metodos_graba_programa_bd
// DESCRIPCION..: Metodos que se ejecutan para preparar consulta de grabación de programa
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.abrefijo()',
	'Consulta_grabar_programa.actualizafiltro(0, usuarioID)',
	'Datos_captura_programa.consulta_natural(1, Consulta_grabar_programa)',
	'Consulta_grabar_programa.posicion_callback(0)',
	'Consulta_grabar_programa.ejecuta()'

	];
	
	var Metodos_graba_programa_bd = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_grabar_programa
// DESCRIPCION..: Consulta que se ejecuta para grabar programa

	var statusConsulta = 0;
	var scriptPhp = 'consulta_graba_programa.php';
	var metodoPhp = 'POST';
	var filtro = [''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_graba_programa.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_grabar_programa = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_graba_programa
// DESCRIPCION..: Metodos que se ejecutan despues de grabar nueva usuario

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

		'Modal_apoyos.abrefijo()',
		'Registro_id_programa.recibe_status(Consulta_grabar_programa.codigos[0][0][0].recupera)',
		'Consulta_baja_programa.limpia_codigos()',
		'Consulta_baja_programa.inicializa_parametros()',
		'Consulta_baja_programa.actualizafiltro(0, Consulta_grabar_programa.codigos[0][0][0].recupera)',
		'Consulta_baja_programa.posicion_callback(1)',
		'Consulta_baja_programa.ejecuta()'

	];
	var Metodos_after_graba_programa = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_graba_baja_programa
	// DESCRIPCION..: Metodos que se ejecutan despues de ejecutar consulta de grabar programa
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
		'Modal_apoyos.cierra()',

		'Modal_apoyos.abrefijo()',

		'Registro_status_programa.recibe_status(1)',

		'Consulta_gradilla.limpia_codigos()',
		'Consulta_gradilla.inicializa_parametros()',
		'Consulta_gradilla.actualizafiltro(0, usuarioStatus)',
		'Consulta_gradilla.actualizafiltro(1, usuarioID)',
		'Consulta_gradilla.posicion_callback(1)',
		'Consulta_gradilla.ejecuta_2()',

		'Registro_status_programa.recibe_status(1)',
		'Registro_status_apoyo.recibe_status(0)',
		'Registro_status_detalle.recibe_status(0)',
		'Registro_id_apoyo.recibe_status(0)',
		'Registro_id_detalle.recibe_status(0)',
		
		'Json_datos_captura_programa.recibe_json(Consulta_baja_programa.codigos[0])',
		'Json_datos_captura_programa.genera()',
		'Datos_captura_programa.imprime_natural(Json_datos_captura_programa.codigos[0])',

		'Modal_apoyos.abrefijo()',
		'Consulta_gradilla_apoyos.limpia_codigos()',
		'Consulta_gradilla_apoyos.inicializa_parametros()',
		'Consulta_gradilla_apoyos.actualizafiltro(0, Registro_id_programa.configuraciones[0])',
		'Consulta_gradilla_apoyos.actualizafiltro(1, 0)',
		'Consulta_gradilla_apoyos.actualizafiltro(2, "")',
		'Consulta_gradilla_apoyos.actualizafiltro(3, "")',
		'Consulta_gradilla_apoyos.actualizafiltro(4, 0)',
		'Consulta_gradilla_apoyos.actualizafiltro(5, "0000-00-00")',
		'Consulta_gradilla_apoyos.posicion_callback(0)',
		'Consulta_gradilla_apoyos.ejecuta_2()',

		'Modal_apoyos.abrefijo()',
		'Consulta_gradilla_detalles.limpia_codigos()',
		'Consulta_gradilla_detalles.inicializa_parametros()',
		'Consulta_gradilla_detalles.posicion_callback(0)',
		'Consulta_gradilla_detalles.actualizafiltro(0, Registro_id_apoyo.configuraciones[0])',
		'Consulta_gradilla_detalles.ejecuta_2()',

		'Datos_captura_filtros.imprime_natural(Json_filtros_vacios)',
		
		'Combolist_municipios.inicializa_valor()',	
		'Combolist_municipios.generahtml()',	
		'Combolist_municipios.imprimehtml()',	

		'Combolist_localidades.inicializa_valor()',	
		'Combolist_localidades.generahtml()',	
		'Combolist_localidades.imprimehtml()',	

		'Datos_captura_apoyo.imprime_natural(Json_apoyo_vacio)',
		'Datos_captura_detalle.imprime_natural(Json_detalle_vacio)',

		'Combolist_cedulas.inicializa_valor()',	
		'Combolist_cedulas.generahtml()',	
		'Combolist_cedulas.imprimehtml()',	

		'Combolist_familiares.inicializa_valor()',	
		'Combolist_familiares.generahtml()',	
		'Combolist_familiares.imprimehtml()',	

		'Clases_programa.afectar()',
	
		'Maqueta_apoyos_modal_opcion.contenido([0, "PROGRAMA GRABADO"])',
		'Maqueta_apoyos_modal_opcion.contenido([1, "EL PROGRAMA: "+document.getElementById(`ID_DATO_PROGRAMA_3_2_INPUT_TEXT`).value+" FUE GRABADO EXITOSAMENTE CON EL ID: "+Registro_id_programa.configuraciones[0]])',
		'Maqueta_apoyos_modal_opcion.generahtml()',
		'Maqueta_apoyos_modal_opcion.imprimehtml()',
		'Ok_modal.generahtml()',
		'Ok_modal.imprimehtml()',
		'Navega_general.recibe_destino(Navega_programas.configuraciones[0])',
		'Modal_apoyos_opcion.abrefijo()'

		];
	
		var Metodos_graba_baja_programa = new Metodos(configuraciones, codigos, elementos);
	




// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE BORRAR PROGRAMA

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_modal_elimina_programa_confirma
// DESCRIPCION..: Modal para confirmar eliminar programa

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_apoyos_modal_opcion.contenido([0, "CONFIRMA ELIMINAR PROGRAMA"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE ELIMINAR EL PROGRAMA: "+Consulta_baja_programa.codigos[0][0][1].dato_02+" CON EL ID: "+Registro_id_programa.configuraciones[0]])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Si_eliminar_programa_modal.generahtml()',
	'Si_eliminar_programa_modal.imprimehtml()',
	'No_eliminar_programa_modal.generahtml()',
	'No_eliminar_programa_modal.imprimehtml()',
	'Modal_apoyos_opcion.abrefijo()'
	];
	var Metodos_modal_elimina_programa_confirma = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_eliminar_programa_modal
// ID...........: ID_SI_ELIMINAR_PROGRAMA_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de eliminar programa
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_ELIMINAR_PROGRAMA_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_eliminar_programa_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra(), Metodos_inspeccion_apoyos_programa.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_eliminar_programa_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Elemento
// INSTANCIA....: No_eliminar_programa_modal
// ID...........: ID_NO_ELIMINAR_PROGRAMA_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en confirmación de eliminar programa 
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
	var etiquetas = ["boton_link_icono_chico", "ID_NO_ELIMINAR_PROGRAMA_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "no_eliminar_programa_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_eliminar_programa_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);
	
// CLASE........: Metodos
// INSTANCIA....: Metodos_inspeccion_apoyos_programa
// DESCRIPCION..: Metodos que se ejecutan para preparar consulta de inspeccion de apoyos en
//              : programa
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.abrefijo()',
	'Consulta_inspeccionar_apoyos.actualizafiltro(0, Registro_id_programa.configuraciones[0])',
	'Consulta_inspeccionar_apoyos.posicion_callback(0)',
	'Consulta_inspeccionar_apoyos.ejecuta()'

	];
	
	var Metodos_inspeccion_apoyos_programa = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_inspeccionar_apoyos
// DESCRIPCION..: Consulta que se ejecuta para inspeccionar si el programa tiene apoyos

	var statusConsulta = 0;
	var scriptPhp = 'consulta_inspecciona_apoyos.php';
	var metodoPhp = 'POST';
	var filtro = [''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_inspecciona_apoyos.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_inspeccionar_apoyos = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_inspecciona_apoyos
// DESCRIPCION..: Metodos que se ejecutan despues de consulta apoyos

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.cierra()',
	'Evaluacion_borrar_programa_apoyos.recibe_validacion([0, Consulta_inspeccionar_apoyos.codigos[0][0][1].dato_01])',
	'Evaluacion_borrar_programa_apoyos.ejecuta()'

	];
	
	var Metodos_after_inspecciona_apoyos = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_borrar_programa_apoyos
// DESCRIPCION..: Evalua que programa no tenga apoyos dependientes para poder ser borrado 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_modal_no_eliminar_programa.ejecuta()', 'Metodos_consulta_eliminar_programa.ejecuta()'];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [0];
	var tiposElementos = [1];
	var validacionElementos = [1];
	var especialesElementos = [[0]];
	var retornoElementos = [[0]];
	var mensajesElementos = [['SIN APOYOS']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_borrar_programa_apoyos = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_no_eliminar_programa
// DESCRIPCION..: Metodos que se ejecutan para presentar modal de no borrar programas con apoyos
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Maqueta_apoyos_modal_opcion.contenido([0, "PROGRAMA CON APOYOS"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "NO PUEDO ELIMINAR EL PROGRAMA: "+Consulta_baja_programa.codigos[0][0][1].dato_02+" CON EL ID: "+Registro_id_programa.configuraciones[0]+" PORQUE TIENE "+Consulta_inspeccionar_apoyos.codigos[0][0][1].dato_01+" APOYOS DEPENDIENTES."])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Navega_general.recibe_destino(Navega_programas.configuraciones[0])',
	'Modal_apoyos_opcion.abrefijo()'

	];
	
	var Metodos_modal_no_eliminar_programa = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_consulta_eliminar_programa
// DESCRIPCION..: Metodos que se ejecutan para preparar consulta de eliminacion de programa
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.abrefijo()',
	'Consulta_eliminar_programa.actualizafiltro(0, Registro_id_programa.configuraciones[0])',
	'Consulta_eliminar_programa.posicion_callback(0)',
	'Consulta_eliminar_programa.ejecuta()'

	];
	
	var Metodos_consulta_eliminar_programa = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_eliminar_programa
// DESCRIPCION..: Consulta que se ejecuta para grabar programa

	var statusConsulta = 0;
	var scriptPhp = 'consulta_eliminar_programa.php';
	var metodoPhp = 'POST';
	var filtro = [''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_elimina_programa.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_eliminar_programa = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_elimina_programa
// DESCRIPCION..: Metodos que se ejecutan despues de grabar nueva usuario

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.cierra()',

	'Modal_apoyos.abrefijo()',
	'Consulta_gradilla.limpia_codigos()',
	'Consulta_gradilla.inicializa_parametros()',
	'Consulta_gradilla.actualizafiltro(0, usuarioStatus)',
	'Consulta_gradilla.actualizafiltro(1, usuarioID)',
	'Consulta_gradilla.posicion_callback(0)',
	'Consulta_gradilla.ejecuta_2()',

	'Maqueta_apoyos_modal_opcion.contenido([0, "PROGRAMA ELIMINADO"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "EL PROGRAMA: "+Consulta_baja_programa.codigos[0][0][1].dato_02+" CON EL ID: "+Registro_id_programa.configuraciones[0]+" FUE BORRADO EXITOSAMENTE."])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Navega_general.recibe_destino(Navega_programas.configuraciones[0])',
	'Modal_apoyos_opcion.abrefijo()',
	'Metodos_nuevo_programa.ejecuta()'

	];
	var Metodos_after_elimina_programa = new Metodos(configuraciones, codigos, elementos);
	




// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE LIMPIA CAPTURA DE PROGRAMA

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_limpia
// DESCRIPCION..: Metodos que se ejecutan al elegir limpiar una captura de programa nueva

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['alert("VOY A LIMPIAR REGISTRO")'];
	var Metodos_limpia = new Metodos(configuraciones, codigos, elementos);
	
	




// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE ACTUALIZAR PROGRAMA

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_elige_actualizar_programa
// DESCRIPCION..: Metodos que se ejecutan al elegir actualizar registro de programa

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Evaluacion_actualizar_programa.recibe_validacion([0, document.getElementById("ID_DATO_PROGRAMA_3_2_INPUT_TEXT").value])',
	'Evaluacion_actualizar_programa.recibe_validacion([1, document.getElementById("ID_DATO_PROGRAMA_6_5_INPUT_TEXT").value])',
	'Evaluacion_actualizar_programa.ejecuta()'];
	var Metodos_elige_actualizar_programa = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_actualizar_programa
// DESCRIPCION..: Evalua que nombre y descripción de programa no este vacio 

	var numeroElementos = 2;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_modal_actualizar_programa_confirma.ejecuta()', 'Metodos_modal_actualizar_programa_vacio.ejecuta()'];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = ['', ''];
	var tiposElementos = [0, 0];
	var validacionElementos = [0, 0];
	var especialesElementos = [[''], ['']];
	var retornoElementos = [[0], [0]];
	var mensajesElementos = [['NOMBRE DE PROGRAMA VACIO'], ['NOMBRE DE DESCRIPCIÓN VACIO']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_actualizar_programa = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_actualizar_programa_vacio
// DESCRIPCION..: Modal para avisar que se intento actualizar un usuario sin nombre
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_apoyos_modal_opcion.contenido([0, "DATOS INCORRECTOS"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "NO PUEDO ACTUALIZAR PROGRAMA SIN NOMBRE O SIN DESCRIPCIÓN"])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Navega_general.recibe_destino(Navega_programas.configuraciones[0])',
	'Modal_apoyos_opcion.abrefijo()'

	];
	var Metodos_modal_actualizar_programa_vacio = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_actualizar_programa_confirma
// DESCRIPCION..: Modal para confirmar actualizar programa

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_apoyos_modal_opcion.contenido([0, "CONFIRMA ACTUALIZAR PROGRAMA"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE ACTUALIZAR EL PROGRAMA: "+document.getElementById(`ID_DATO_PROGRAMA_3_2_INPUT_TEXT`).value+" CON EL ID: "+Registro_id_programa.configuraciones[0]])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Si_actualizar_programa_modal.generahtml()',
	'Si_actualizar_programa_modal.imprimehtml()',
	'No_actualizar_programa_modal.generahtml()',
	'No_actualizar_programa_modal.imprimehtml()',
	'Modal_apoyos_opcion.abrefijo()'
	];
	var Metodos_modal_actualizar_programa_confirma = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_actualizar_programa_modal
// ID...........: ID_SI_ACTUALIZAR_PROGRAMA_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de actualizar programa
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_ACTUALIZAR_PROGRAMA_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_grabar_programa_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra(), Metodos_actualizar_programa_bd.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_actualizar_programa_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Elemento
// INSTANCIA....: No_actualizar_programa_modal
// ID...........: ID_NO_ACTUALIZAR_PROGRAMA_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en confirmación de actualizar programa 
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
	var etiquetas = ["boton_link_icono_chico", "ID_NO_ACTUALIZAR_PROGRAMA_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "no_grabar_programa_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_actualizar_programa_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_actualizar_programa_bd
// DESCRIPCION..: Metodos que se ejecutan para preparar consulta de actualizacion de programa
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.abrefijo()',
	'Consulta_actualizar_programa.actualizafiltro(0, Registro_id_programa.configuraciones[0])',
	'Datos_captura_programa.consulta_natural(1, Consulta_actualizar_programa)',
	'Consulta_actualizar_programa.posicion_callback(0)',
	'Consulta_actualizar_programa.ejecuta()'

	];
	
	var Metodos_actualizar_programa_bd = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_actualizar_programa
// DESCRIPCION..: Consulta que se ejecuta para actualizar programa

	var statusConsulta = 0;
	var scriptPhp = 'consulta_actualizar_programa.php';
	var metodoPhp = 'POST';
	var filtro = [''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_actualizar_programa.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_actualizar_programa = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_actualizar_programa
// DESCRIPCION..: Metodos que se ejecutan despues de actualizar programa

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

		'Modal_apoyos.abrefijo()',
		'Consulta_baja_programa.limpia_codigos()',
		'Consulta_baja_programa.inicializa_parametros()',
		'Consulta_baja_programa.actualizafiltro(0, Registro_id_programa.configuraciones[0])',
		'Consulta_baja_programa.posicion_callback(3)',
		'Consulta_baja_programa.ejecuta()'

	];
	var Metodos_after_actualizar_programa = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_actualizar_baja_programa
	// DESCRIPCION..: Metodos que se ejecutan despues de ejecutar consulta de actualizar programa
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
		'Modal_apoyos.cierra()',

		'Modal_apoyos.abrefijo()',
		'Consulta_gradilla.limpia_codigos()',
		'Consulta_gradilla.inicializa_parametros()',
		'Consulta_gradilla.actualizafiltro(0, usuarioStatus)',
		'Consulta_gradilla.actualizafiltro(1, usuarioID)',
		'Consulta_gradilla.posicion_callback(1)',
		'Consulta_gradilla.ejecuta_2()',

		'Registro_status_programa.recibe_status(1)',
		'Registro_status_apoyo.recibe_status(0)',
		'Registro_status_detalle.recibe_status(0)',
		'Registro_id_apoyo.recibe_status(0)',
		'Registro_id_detalle.recibe_status(0)',
		
		'Json_datos_captura_programa.recibe_json(Consulta_baja_programa.codigos[0])',
		'Json_datos_captura_programa.genera()',
		'Datos_captura_programa.imprime_natural(Json_datos_captura_programa.codigos[0])',

		'Modal_apoyos.abrefijo()',
		'Consulta_gradilla_apoyos.limpia_codigos()',
		'Consulta_gradilla_apoyos.inicializa_parametros()',
		'Consulta_gradilla_apoyos.actualizafiltro(0, Registro_id_programa.configuraciones[0])',
		'Consulta_gradilla_apoyos.actualizafiltro(1, 0)',
		'Consulta_gradilla_apoyos.actualizafiltro(2, "")',
		'Consulta_gradilla_apoyos.actualizafiltro(3, "")',
		'Consulta_gradilla_apoyos.actualizafiltro(4, 0)',
		'Consulta_gradilla_apoyos.actualizafiltro(5, "0000-00-00")',
		'Consulta_gradilla_apoyos.posicion_callback(0)',
		'Consulta_gradilla_apoyos.ejecuta_2()',

		'Modal_apoyos.abrefijo()',
		'Consulta_gradilla_detalles.limpia_codigos()',
		'Consulta_gradilla_detalles.inicializa_parametros()',
		'Consulta_gradilla_detalles.posicion_callback(0)',
		'Consulta_gradilla_detalles.actualizafiltro(0, Registro_id_apoyo.configuraciones[0])',
		'Consulta_gradilla_detalles.ejecuta_2()',

		'Datos_captura_filtros.imprime_natural(Json_filtros_vacios)',
		
		'Combolist_municipios.inicializa_valor()',	
		'Combolist_municipios.generahtml()',	
		'Combolist_municipios.imprimehtml()',	

		'Combolist_localidades.inicializa_valor()',	
		'Combolist_localidades.generahtml()',	
		'Combolist_localidades.imprimehtml()',	

		'Datos_captura_apoyo.imprime_natural(Json_apoyo_vacio)',
		'Datos_captura_detalle.imprime_natural(Json_detalle_vacio)',
		'Datos_captura_material.imprime_natural(Json_material_vacio)',

		'Combolist_cedulas.inicializa_valor()',	
		'Combolist_cedulas.generahtml()',	
		'Combolist_cedulas.imprimehtml()',	

		'Combolist_familiares.inicializa_valor()',	
		'Combolist_familiares.generahtml()',	
		'Combolist_familiares.imprimehtml()',	

		'Clases_programa.afectar()',
	
		'Maqueta_apoyos_modal_opcion.contenido([0, "PROGRAMA ACTUALIZADO"])',
		'Maqueta_apoyos_modal_opcion.contenido([1, "EL PROGRAMA: "+document.getElementById(`ID_DATO_PROGRAMA_3_2_INPUT_TEXT`).value+" CON EL ID: "+Registro_id_programa.configuraciones[0]+" FUE ACTUALIZADO EXITOSAMENTE"])',
		'Maqueta_apoyos_modal_opcion.generahtml()',
		'Maqueta_apoyos_modal_opcion.imprimehtml()',
		'Ok_modal.generahtml()',
		'Ok_modal.imprimehtml()',
		'Navega_general.recibe_destino(Navega_programas.configuraciones[0])',
		'Modal_apoyos_opcion.abrefijo()'

		];
	
		var Metodos_actualizar_baja_programa = new Metodos(configuraciones, codigos, elementos);
	
	




// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE REESTABLECER PROGRAMA

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_confirma_reestablece
// DESCRIPCION..: Metodos que se ejecutan al elegir reestablecer valores de captura de programa 
//                existente

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Maqueta_apoyos_modal_opcion.contenido([0, "CONFIRMA REESTABLECER VALORES DE PROGRAMA"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE REESTABLECER LOS VALORES GRABADOS DEL PROGRAMA: "+Json_datos_captura_programa.codigos[0].dato_2+". LOS CAMBIOS EN LOS VALORES DE LA CAPTURA QUE NO ESTEN GRABADOS SE PERDERAN."])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Si_reestablece_modal.generahtml()',
	'Si_reestablece_modal.imprimehtml()',
	'No_reestablece_modal.generahtml()',
	'No_reestablece_modal.imprimehtml()',
	'Modal_apoyos_opcion.abrefijo()'];
	var Metodos_confirma_reestablece = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_reestablece_modal
// ID...........: ID_SI_REESTABLECE_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de reestablecer
//                valores originales de registro de programa en modificación
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_REESTABLECE_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_reestablece_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra(), Metodos_reestablece_valores.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_reestablece_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Elemento
// INSTANCIA....: No_reestablece_modal
// ID...........: ID_NO_REESTABLECE_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en confirmación de reestablecer 
//                valores originales de programa en modificación
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
	var etiquetas = ["boton_link_icono_chico", "ID_NO_REESTABLECE_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "no_reestablece_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_reestablece_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_reestablece_valores
	// DESCRIPCION..: Metodos que se ejecutan para reestablecer valores de programa
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
		'Modal_apoyos.abrefijo()',
		'Consulta_baja_programa.actualizafiltro(0, Registro_id_programa.configuraciones[0])',
		'Consulta_baja_programa.posicion_callback(0)',
		'Consulta_baja_programa.ejecuta()'
	
		]
		var Metodos_reestablece_valores = new Metodos(configuraciones, codigos, elementos);






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE CAPTURAR NUEVO PROGRAMA

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_nuevo_programa
// DESCRIPCION..: Metodos que se ejecutan al elegir capturar nuevo programa

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.cierra()',
	'Registro_status_programa.recibe_status(2)',
	'Registro_id_programa.recibe_status(0)',
	'Registro_status_apoyo.recibe_status(0)',
	'Registro_status_detalle.recibe_status(0)',
	'Registro_id_apoyo.recibe_status(0)',
	'Registro_id_detalle.recibe_status(0)',
		
	'Datos_captura_programa.imprime_natural(Json_programa_nuevo)',

	'Modal_apoyos.abrefijo()',
	'Consulta_gradilla_apoyos.limpia_codigos()',
	'Consulta_gradilla_apoyos.inicializa_parametros()',
	'Consulta_gradilla_apoyos.actualizafiltro(0, Registro_id_programa.configuraciones[0])',
	'Consulta_gradilla_apoyos.actualizafiltro(1, 0)',
	'Consulta_gradilla_apoyos.actualizafiltro(2, "")',
	'Consulta_gradilla_apoyos.actualizafiltro(3, "")',
	'Consulta_gradilla_apoyos.actualizafiltro(4, 0)',
	'Consulta_gradilla_apoyos.actualizafiltro(5, "0000-00-00")',
	'Consulta_gradilla_apoyos.posicion_callback(0)',
	'Consulta_gradilla_apoyos.ejecuta_2()',

	'Modal_apoyos.abrefijo()',
	'Consulta_gradilla_detalles.limpia_codigos()',
	'Consulta_gradilla_detalles.inicializa_parametros()',
	'Consulta_gradilla_detalles.posicion_callback(0)',
	'Consulta_gradilla_detalles.actualizafiltro(0, Registro_id_apoyo.configuraciones[0])',
	'Consulta_gradilla_detalles.ejecuta_2()',

	'Datos_captura_filtros.imprime_natural(Json_filtros_vacios)',
	
	'Combolist_municipios.inicializa_valor()',	
	'Combolist_municipios.generahtml()',	
	'Combolist_municipios.imprimehtml()',	

	'Combolist_localidades.inicializa_valor()',	
	'Combolist_localidades.generahtml()',	
	'Combolist_localidades.imprimehtml()',	
	
	'Datos_captura_apoyo.imprime_natural(Json_apoyo_vacio)',
	'Datos_captura_detalle.imprime_natural(Json_detalle_vacio)',
	'Datos_captura_material.imprime_natural(Json_material_vacio)',

	'Combolist_cedulas.inicializa_valor()',	
	'Combolist_cedulas.generahtml()',	
	'Combolist_cedulas.imprimehtml()',	

	'Combolist_familiares.inicializa_valor()',	
	'Combolist_familiares.generahtml()',	
	'Combolist_familiares.imprimehtml()',	

	'Clases_programa_nuevo.afectar()'

	];
	var Metodos_nuevo_programa = new Metodos(configuraciones, codigos, elementos);






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE MAQUETA DE FORMULARIO

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

	




// CLASE........: Panel
// INSTANCIA....: Panel_programas_formulario
// ID...........: ID_FORMULARIO_PROGRAMA
// SE INSERTA EN: #ID_3_3	
// DESCRIPCION..: Panel para organizar las sub areas generales del formulario de programas
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido
	
	var tipoImpresion = 0;
	var nivel = [];
	var configuraciones = [tipoImpresion, nivel];
	var etiquetas = ['areas_registro_formulario_x area_paneles_x', 'IDX', '#ID_3_3'];
	var elemento01_01_01 = 'DATOS DE PROGRAMA';
	var elemento01_01_02_01 = 'NOMBRE:';
	var elemento01_01_02_02 = '';
	var elemento01_01_02 = [elemento01_01_02_01, elemento01_01_02_02];
	var elemento01_01_03_01 = 'FECHA INICIO:';
	var elemento01_01_03_02 = '00/00/0000';
	var elemento01_01_03 = [elemento01_01_03_01, elemento01_01_03_02];
	var elemento01_01_04_01 = 'FECHA TÉRMINO:';
	var elemento01_01_04_02 = '00/00/0000';
	var elemento01_01_04 = [elemento01_01_04_01, elemento01_01_04_02];
	var elemento01_01 = [elemento01_01_01, elemento01_01_02, elemento01_01_03, elemento01_01_04];
	var elemento01_01_02_01 = 'DESCRIPCIÓN DE PROGRAMA';
	var elemento01_01_02_02 = '';
	var elemento01_02 = [elemento01_01_02_01, elemento01_01_02_02];
	var elemento01 = [elemento01_01, elemento01_02];
	var elemento02 = 'AREA APOYOS';
	var elementos = [elemento01, elemento02];
	var codigos = [''];
    var Panel_programas_formulario = new Panel(configuraciones, etiquetas, codigos, elementos);
    Panel_programas_formulario.generahtml_r();
    Panel_programas_formulario.imprimehtml();

// CLASE........: Panel
// INSTANCIA....: Panel_apoyos
// ID...........: IDXX
// SE INSERTA EN: #IDX_2	
// DESCRIPCION..: Panel para organizar las sub areas generales de captura de apoyos
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido
	
    var tipoImpresion = 0;
	var nivel = [];
	var configuraciones = [tipoImpresion, nivel];
	var etiquetas = ['areas_registro_captura area_paneles', 'IDXX', '#IDX_2'];
	var elemento01 = ['ELIGE UN APOYO O CREA UN REGISTRO NUEVO'];
	
	
	var elemento02_01_01 = 'FILTRO APOYOS DEL PROGRAMA';
	var elemento02_01_02 = 'MUNICIPIOS';
	var elemento02_01_03 = 'LOCALIDADES';
	var elemento02_01_04 = 'RECARGAR';
	
	var elemento02_01_05_01_01 = 'CÉDULA';
	var elemento02_01_05_01_02 = 'xx';
	var elemento02_01_05_01 = [elemento02_01_05_01_01, elemento02_01_05_01_02];
	var elemento02_01_05_02 = 'RECARGAR';
	var elemento02_01_05 = [elemento02_01_05_01, elemento02_01_05_02];


	var elemento02_01_06_01_01 = 'FECHA ENTREGA';
	var elemento02_01_06_01_02 = '0000-00-00';
	var elemento02_01_06_01 = [elemento02_01_06_01_01, elemento02_01_06_01_02];
	var elemento02_01_06_02 = 'RECARGAR';
	var elemento02_01_06 = [elemento02_01_06_01, elemento02_01_06_02];
	
	var elemento02_01 = [elemento02_01_01, elemento02_01_02, elemento02_01_03, elemento02_01_04, elemento02_01_05, elemento02_01_06];
	
	var elemento02_02 = 'GRADILLA APOYOS';
	var elemento02 = [elemento02_01, elemento02_02];
    var elemento03_01 = 'AREA DE CAPTURA APOYOS';
	var elemento03_02_01_01 = 'STATUS REGISTRO';
	var elemento03_02_01_02 = 'ID REGISTRO';
	var elemento03_02_01 = [elemento03_02_01_01, elemento03_02_01_02];
	var elemento03_02_02_01 = 'ELIMINAR';
	var elemento03_02_02_02 = 'ACTUALIZAR';
	var elemento03_02_02_03 = 'GRABAR';
	var elemento03_02_02_04 = 'REESTABLECER';
	var elemento03_02_02_05 = 'LIMPIAR';
	var elemento03_02_02_06 = 'NUEVO';
	var elemento03_02_02 = [elemento03_02_02_01, elemento03_02_02_02, elemento03_02_02_03, elemento03_02_02_04, elemento03_02_02_05, elemento03_02_02_06];
	var elemento03_02 = [elemento03_02_01, elemento03_02_02];
	var elemento03_03 = 'FORMULARIO APOYOS';
	var elemento03 = [elemento03_01, elemento03_02, elemento03_03];
    var elementos = [elemento01, elemento02, elemento03];
    var codigos = [''];
    var Panel_apoyos = new Panel(configuraciones, etiquetas, codigos, elementos);
    Panel_apoyos.generahtml_r();
    Panel_apoyos.imprimehtml();






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE AREA GRADILLA APOYOS

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
	// INSTANCIA....: Consulta_gradilla_apoyos
	// DESCRIPCION..: Consulta que se ejecuta para actualizar gradilla de apoyos desde la BD
	
		var statusConsulta = 0;
		var scriptPhp = 'consulta_gradilla_apoyos.php';
		var metodoPhp = 'POST';
		var filtro = [0, 0, '', '', 0, '0000-00-00'];
		var posicionCallback = 0;
		var metodosCallback01 = ['Metodos_gradilla_apoyos.ejecuta()'];
		var metodosCallback02 = ['Metodos_gradilla_apoyos_inicia.ejecuta()'];
		var metodosCallback = [metodosCallback01, metodosCallback02]; 
		var callback = [posicionCallback, metodosCallback];
		var lotes = [0, 5000, 0, 0];
		var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
		var codigos = ['', ''];
		var elementos = [''];	
		var Consulta_gradilla_apoyos = new Consulta(configuraciones, codigos, elementos);
		
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_gradilla_apoyos
	// DESCRIPCION..: Metodos que se ejecutan despues de actualizar y filtrar gradilla de apoyos
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
		'Modal_apoyos.cierra()',
		'Gradilla_apoyos.recibe_consulta(Consulta_gradilla_apoyos)',
		'Gradilla_apoyos.generahtml()',
		'Gradilla_apoyos.imprimehtml()'

		];
		var Metodos_gradilla_apoyos = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_gradilla_apoyos_inicia
	// DESCRIPCION..: Metodos que se ejecutan despues de actualizar y filtrar gradilla de apoyos
	//                al inicio					
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
//		'alert("ESTOY EN METODOS CALLBACK DE CONSULTA APOYOS VOY A CONSULTA COMBO CEDULAS ESTOY VIVO")',
		'Consulta_combolist_cedulas.inicializa_parametros()',
		'Consulta_combolist_cedulas.limpia_codigos()',
		'Consulta_combolist_cedulas.posicion_callback(1)',
		'Consulta_combolist_cedulas.ejecuta_2()'

		];
		var Metodos_gradilla_apoyos_inicia = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Gradilla
	// INSTANCIA....: Gradilla_apoyos
	// ID...........: ID_GRADILLA_APOYOS
	// SE INSERTA EN: #IDXX_2_2	
	// DESCRIPCION..: Gradilla de apoyos
	// HTML.........: Espera metodo
	// IMPRESION....: Espera metodo, sustituye contenido
	
		var inglesElementos = ['ID', 'USUA', 'NOMBRE', 'FECHA INICIO', 'FECHA TERMINO', 'DESCRIPCIÓN', 'APOYOS', 'REGISTRO'];
		var inglesIdioma = [inglesElementos, 'PROGRAMS LIST'];
		var espanolElementos = ['ID', 'US', 'CÉDULA', 'RESPONSABLE', 'LOCALIDAD', 'DESCRIPCIÓN', 'FEC. ENT.', 'DETA', 'REG'];
		var espanolIdioma = [espanolElementos, 'LISTA DE APOYOS'];
		var arregloIdioma = [inglesIdioma, espanolIdioma];
		var controlIdioma = [idioma, arregloIdioma];
		var numeroElementos = 9;
		var tipoImpresion = 0;
		var consulta = Consulta_gradilla_apoyos;
		var parametros = [0, 10];
		var titulo = [''];
		var orientacionBreaks = [0, 720];
		var orientacionFormato = [0, 1];
		var orientacion = [0, orientacionBreaks, orientacionFormato];
		var areacontroles = [1];
		var iconoscontroles = ['fa-solid fa-backward', 'fa-solid fa-backward-step', 'fa-solid fa-forward-step', 'fa-solid fa-forward'];
		var metodoscontroles = [' ONCLICK="Metodos_inicio_posicion_apoyos.ejecuta()"', ' ONCLICK="Metodos_retrocedegrid_apoyos.ejecuta()"', ' ONCLICK="Metodos_avanzagrid_apoyos.ejecuta()"', ' ONCLICK="Metodos_final_posicion_apoyos.ejecuta()"'];
		var controles = [areacontroles, iconoscontroles, metodoscontroles];
		var valorIncialClave = 0;
		var valorClave = 0;
		var valorInicialPosicion = 0;
		var valorPosicion = 0;
		var valorInicialCelda = 0;
		var valorCelda = 0;
		var metodoValor = 'Metodos_modal_bajando_apoyo.ejecuta(), Gradilla_apoyos.actualiza_valores';
		var tipoValorArreglo = [0];
		var datoValorArreglo = [0];
		var valorArreglo = [tipoValorArreglo, datoValorArreglo];
		var valores = [valorIncialClave, valorClave, valorInicialPosicion, valorPosicion, valorInicialCelda, valorCelda, metodoValor, valorArreglo];
		var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, consulta, parametros, titulo, orientacion, controles, valores];
		var etiquetas = ['gradilla', 'ID_GRADILLA_APOYOS', '#IDXX_2_2'];
		var elementos_tipo_valor = [0, 0, 0, 0, 0, 0, 0, 0, 0];
		var elementos_llave_valor = ['dato_01', 'dato_02', 'dato_03', 'dato_04', 'dato_05', 'dato_06', 'dato_07', 'dato_08', 'dato_09'];
		var elementos_ancho_valor = ['cinco', 'cinco', 'cinco', 'veinte', 'veinte', 'veinte', 'diez', 'cinco', 'diez'];
		var elementos_metodos = ['Metodos_elige_grid_apoyos.ejecuta()', 'Metodos_elige_grid_apoyos.ejecuta()', 'Metodos_elige_grid_apoyos.ejecuta()', 'Metodos_elige_grid_apoyos.ejecuta()', 'Metodos_elige_grid_apoyos.ejecuta()', 'Metodos_elige_grid_apoyos.ejecuta()', 'Metodos_elige_grid_apoyos.ejecuta()', 'Metodos_elige_grid_apoyos.ejecuta()', 'Metodos_elige_grid_apoyos.ejecuta()'];
		var elementos_iconos = ['', '', '', '', '', '', '', '', ''];
		var elementos = [elementos_tipo_valor, elementos_llave_valor, elementos_ancho_valor, elementos_metodos, elementos_iconos];
		var codigos = [''];
		var Gradilla_apoyos = new Gradilla(configuraciones, etiquetas, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_avanzagrid_apoyos
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige avanzar una pagina en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = ['Gradilla_apoyos.avanza()',
		'Gradilla_apoyos.generahtml()',
		'Gradilla_apoyos.imprimehtml()'];
		var Metodos_avanzagrid_apoyos = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_inicio_posicion_apoyos
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir a primera pagina en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = ['Gradilla_apoyos.inicializa_posicion()',
		'Gradilla_apoyos.generahtml()',
		'Gradilla_apoyos.imprimehtml()'];
		var Metodos_inicio_posicion_apoyos = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_inicio_posicion_apoyos
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir a primera pagina en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = ['Gradilla_apoyos.retrocede()',
		'Gradilla_apoyos.generahtml()',
		'Gradilla_apoyos.imprimehtml()'];
		var Metodos_retrocedegrid = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_final_posicion_apoyos
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir a última pagina en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = ['Gradilla_apoyos.finaliza_posicion()',
		'Gradilla_apoyos.generahtml()',
		'Gradilla_apoyos.imprimehtml()'];
		var Metodos_final_posicion_apoyos = new Metodos(configuraciones, codigos, elementos);



	



// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE ELIGE GRID APOYOS

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_modal_bajando_apoyo
// DESCRIPCION..: Modal para avisar que se esta bajando un regustro de apoyo
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	
	'Maqueta_apoyos_modal_opcion.contenido([0, "BAJANDO APOYO"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "BAJANDO DATOS DEL APOYO ELEGIDO PARA SER CONSULTADO, MODIFICADO O ELIMINADO. ENFOQUESE EN EL AREA DE CAPTURA DE APOYOS."])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Navega_general.recibe_destino(Navega_apoyos.configuraciones[0])',
	'Modal_apoyos_opcion.abrefijo()'

	];
	var Metodos_modal_bajando_apoyo = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_elige_grid_apoyos
	// DESCRIPCION..: Metodos que se ejecutan al elegir un registro en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
		'Modal_apoyos.abrefijo()',
		'Consulta_baja_apoyo.actualizafiltro(0, Gradilla_apoyos.configuraciones[8][1])',
		'Registro_id_apoyo.recibe_status(Gradilla_apoyos.configuraciones[8][1])',
		'Consulta_baja_apoyo.posicion_callback(0)',
		'Consulta_baja_apoyo.ejecuta()'
	
		]
		var Metodos_elige_grid_apoyos = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Consulta
	// INSTANCIA....: Consulta_baja_apoyo
	// DESCRIPCION..: Consulta que se ejecuta para traer desde la BD un registro elegido en gradilla
	
		var statusConsulta = 0;
		var scriptPhp = 'consulta_baja_apoyo.php';
		var metodoPhp = 'POST';
		var filtro = [''];
		var posicionCallback = 0;
		var metodosCallback01 = ['Metodos_baja_apoyo.ejecuta()'];
		var metodosCallback02 = ['Metodos_graba_baja_apoyo.ejecuta()'];
		var metodosCallback03 = ['Metodos_graba_baja_apoyo.ejecuta()'];
		var metodosCallback04 = ['Metodos_actualizar_baja_apoyo.ejecuta()'];
		var metodosCallback = [metodosCallback01, metodosCallback02, metodosCallback03, metodosCallback04]; 
		var callback = [posicionCallback, metodosCallback];
		var lotes = [0, 5000, 0, 0];
		var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
		var codigos = ['', ''];
		var elementos = [''];	
		var Consulta_baja_apoyo = new Consulta(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_baja_apoyo
	// DESCRIPCION..: Metodos que se ejecutan despues de ejecutar consulta de programa
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
		'Modal_apoyos.cierra()',
		'Registro_status_apoyo.recibe_status(1)',
		'Registro_status_detalle.recibe_status(0)',
		'Registro_id_detalle.recibe_status(0)',
		
		'Consulta_combolist_cedulas.limpia_codigos()',
    	'Consulta_combolist_cedulas.inicializa_parametros()',
    	'Consulta_combolist_cedulas.posicion_callback(0)',

		'Combolist_cedulas.inicializa_valor()',
		'Combolist_cedulas.recibe_texto(Consulta_baja_apoyo.codigos[0][0][1].dato_02)',

		'Combolist_familiares.inicializa_valor()',
		'Combolist_familiares.recibe_texto(Consulta_baja_apoyo.codigos[0][0][1].dato_04)',

		'Consulta_combolist_cedulas.ejecuta_2()',

		'Json_datos_captura_apoyo.recibe_json(Consulta_baja_apoyo.codigos[0])',
		'Json_datos_captura_apoyo.genera()',
		'Datos_captura_apoyo.imprime_natural(Json_datos_captura_apoyo.codigos[0])',

		'Modal_apoyos.abrefijo()',
		'Consulta_gradilla_detalles.limpia_codigos()',
		'Consulta_gradilla_detalles.inicializa_parametros()',
		'Consulta_gradilla_detalles.posicion_callback(0)',
		'Consulta_gradilla_detalles.actualizafiltro(0, Registro_id_apoyo.configuraciones[0])',
		'Consulta_gradilla_detalles.ejecuta_2()',

		'Datos_captura_detalle.imprime_natural(Json_detalle_vacio)',
		'Datos_captura_material.imprime_natural(Json_material_vacio)',

		'Clases_apoyo.afectar()'
	
		];
		var Metodos_baja_apoyo = new Metodos(configuraciones, codigos, elementos);






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE AREA FILTRO GRADILLA APOYOS

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Consulta_combolist_municipios
// DESCRIPCION..: Consulta que se ejecuta para actualizar Combolist de municipios

	var statusConsulta = 0;
	var scriptPhp = 'consulta_combolist_municipios_cedulas.php';
	var metodoPhp = 'POST';
	var filtro = [];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_consulta_combolist_municipios.ejecuta()'];
	var metodosCallback02 = ['Metodos_after_consulta_combolist_municipios_inicia.ejecuta()'];
	var metodosCallback = [metodosCallback01, metodosCallback02]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_combolist_municipios = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_consulta_combolist_municipios
// DESCRIPCION..: Metodos que se ejecutan despues de la consulta del combolist municipios

    var configuraciones = 0;
	var codigos = [''];
	var elementos = [
    
        'Combolist_municipios.generahtml()',
        'Combolist_municipios.imprimehtml()',
    	'Consulta_combolist_localidades.actualizafiltro(0, Combolist_municipios.valores[1][1])',
    	'Consulta_combolist_localidades.actualizafiltro(1, Combolist_municipios.valores[4][1])',
    	'Consulta_combolist_localidades.posicion_callback(0)',
    	'Consulta_combolist_localidades.inicializa_parametros()',
		'Consulta_combolist_localidades.ejecuta_2()'
    
    ];

	var Metodos_after_consulta_combolist_municipios = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_consulta_combolist_municipios_inicia
// DESCRIPCION..: Metodos que se ejecutan despues de la consulta del combolist municipios

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
    
//		'alert("ESTOY EN METODOS CALLBACK DE CONSULTA MUNICIPIOS VOY A CONSULTA COMBO LOCALIDADES ESTOY VIVO")',
		'Consulta_combolist_localidades.inicializa_parametros()',
		'Consulta_combolist_localidades.limpia_codigos()',
		'Consulta_combolist_localidades.posicion_callback(1)',
		'Consulta_combolist_localidades.ejecuta_2()'

    ];

	var Metodos_after_consulta_combolist_municipios_inicia = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Combolist
// INSTANCIA....: Combolist_municipios
// ID...........: ID_MUNICIPIOS_COMBOLIST
// SE INSERTA EN: #IDXX_2_1_7_1	
// DESCRIPCION..: Combolist que recibe datos de la tabla cedula para elegir municipio
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es llamado, sustituye contenido

	var inglesIdioma = ['COUNTY: ', 'WRITE OR CHOOSE...'];
	var espanolIdioma = ['MUNICIPIO: ', 'ESCRIBE O SELECCIONA...'];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
// impresion = 0 SUSTITUYE CONTENIDO = 1 AGREGA CONTENIDO
    var impresion = 0;
// etiqueta = 0 SIN ETIQUETA = 1 CON ETIQUETA
    var etiqueta = 1;
// fuente = 0 JSON = 1 INSTANCIA DE CONSULTA
    var fuente = 1;
// ORIGEN DE DATOS SEGÚN LA FUENTE
    var datos = Consulta_combolist_municipios;

    var valorFormatoArreglo = [[[0], [1]], [[0], [0]]];
	var datoFormatoArreglo = [[0, 1, 0], [1, ' ', 0]];
	var codificado = 0;
	var resultado = [];
	var consulta = [datos, valorFormatoArreglo, datoFormatoArreglo, codificado, resultado];
// ARREGLO DE DOS POSICIONES DE REGISTROS ESPECIALES
    var especial01 = [['TODOS_CLAVE_1', 'TODOS LOS REGISTROS'], 'TODOS LOS REGISTROS'];
// ARREGLO DE ARREGLOS CON TODAS LOS REGISTROS ESPECIALES	
    var especiales = [];
    var configuraciones = [controlIdioma, impresion, etiqueta, fuente, consulta, especiales];
    var etiquetas = ['combolist', 'ID_MUNICIPIOS_COMBOLIST', '#IDXX_2_1_2', 'combolist_municipios'];
    var codigos = [''];
    var valores = [['VALOR VACIO', 'VALOR VACIO'], ['VALOR VACIO', 'VALOR VACIO'], ['', ''], ['VALOR VACIO', 'VALOR VACIO'], [0, 0]];
    var metodos = ['ONCHANGE = "Combolist_municipios.elige_valor(), Metodos_cambia_municipio_combo.ejecuta()"'];
	var Combolist_municipios = new Combolist(configuraciones, etiquetas, valores, metodos, codigos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_cambia_municipio_combo
// DESCRIPCION..: Metodos que se ejecutan despues de seleccionar municipio en el filtro de gradilla

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Combolist_localidades.inicializa_valor()',
		'Consulta_combolist_localidades.inicializa_parametros()',
    	'Consulta_combolist_localidades.posicion_callback(0)',
		'Consulta_combolist_localidades.actualizafiltro(0, Combolist_municipios.valores[1][1])',
    	'Consulta_combolist_localidades.actualizafiltro(1, Combolist_municipios.valores[4][1])',
    	'Consulta_combolist_localidades.ejecuta_2()'
		
	];
	var Metodos_cambia_municipio_combo = new Metodos(configuraciones, codigos, elementos);






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// PRUEBA SELECT COMBOLIST LOCALIDADES

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Consulta_combolist_localidades
// DESCRIPCION..: Consulta que se ejecuta para actualizar Combolist de localidades

	var statusConsulta = 0;
	var scriptPhp = 'consulta_combolist_localidades_cedulas.php';
	var metodoPhp = 'POST';
	var filtro = ['', 0];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_consulta_combolist_localidades.ejecuta()'];
	var metodosCallback02 = ['Metodos_after_consulta_combolist_localidades_inicia.ejecuta()'];
	var metodosCallback = [metodosCallback01, metodosCallback02]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_combolist_localidades = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_consulta_combolist_localidades
// DESCRIPCION..: Metodos que se ejecutan despues de la consulta del combolist localidades

    var configuraciones = 0;
	var codigos = [''];
	var elementos = [

		'Combolist_localidades.generahtml()',
        'Combolist_localidades.imprimehtml()'
    
    ];
	var Metodos_after_consulta_combolist_localidades = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_consulta_combolist_localidades_inicia
// DESCRIPCION..: Metodos que se ejecutan despues de la consulta del combolist localidades

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

//		'alert("ESTOY EN METODOS CALLBACK DE CONSULTA LOCALIDADES VOY A CONSULTA GRID APOYOS ESTOY VIVO")',
		'Consulta_gradilla_apoyos.inicializa_parametros()',
		'Consulta_gradilla_apoyos.limpia_codigos()',
		'Consulta_gradilla_apoyos.posicion_callback(1)',
		'Consulta_gradilla_apoyos.ejecuta_2()'

    ];
	var Metodos_after_consulta_combolist_localidades_inicia = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Combolist
// INSTANCIA....: Combolist_localidades
// ID...........: ID_LOCALIDADES_COMBOLIST
// SE INSERTA EN: #IDXX_2_1_7_2	
// DESCRIPCION..: Combolist que recibe datos de la tabla cedula para elegir localidad
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es llamado, sustituye contenido

	var inglesIdioma = ['COUNTY: ', 'WRITE OR CHOOSE...'];
	var espanolIdioma = ['LOCALIDAD: ', 'ESCRIBE O SELECCIONA...'];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
// impresion = 0 SUSTITUYE CONTENIDO = 1 AGREGA CONTENIDO
    var impresion = 0;
// etiqueta = 0 SIN ETIQUETA = 1 CON ETIQUETA
    var etiqueta = 1;
// fuente = 0 JSON = 1 INSTANCIA DE CONSULTA
    var fuente = 1;
// ORIGEN DE DATOS SEGÚN LA FUENTE
    var datos = Consulta_combolist_localidades;

    var valorFormatoArreglo = [[[0], [0]], [[0], [1]], [[0], [2]], [[0], [3]]];
	var datoFormatoArreglo = [[0, 1, 0, 1, 0], [0, ' ', 1, ', ', 3]];
	var codificado = 0;
	var resultado = [];
	var consulta = [datos, valorFormatoArreglo, datoFormatoArreglo, codificado, resultado];
// ARREGLO DE DOS POSICIONES DE REGISTROS ESPECIALES
    var especial01 = [['TODOS_CLAVE_MUNI_1', 'TODOS LOS REGISTROS MUNI', 'TODOS_CLAVE_LOCA_1', 'TODOS LOS REGISTROS LOCA'], 'TODOS LOS REGISTROS LOCA'];
    var especial02 = [['TODOS_CLAVE_MUNI_2', 'SEGUNDO VALOR ESPECIAL MUNI', 'TODOS_CLAVE_LOCA_2', 'SEGUNDO VALOR ESPECIAL LOCA'], 'SEGUNDO VALOR ESPECIAL LOCA'];
// ARREGLO DE ARREGLOS CON TODAS LOS REGISTROS ESPECIALES	
    var especiales = [];
    var configuraciones = [controlIdioma, impresion, etiqueta, fuente, consulta, especiales];
    var etiquetas = ['combolist', 'ID_LOCALIDADES_COMBOLIST', '#IDXX_2_1_3', 'combolist_localidades'];
    var codigos = [''];
    var valores = [['VALOR VACIO', 'VALOR VACIO', 'VALOR VACIO', 'VALOR VACIO'], ['VALOR VACIO', 'VALOR VACIO', 'VALOR VACIO', 'VALOR VACIO'], ['', ''], ['VALOR VACIO', 'VALOR VACIO', 'VALOR VACIO', 'VALOR VACIO'], [0, 0]];
    var metodos = ['ONCHANGE = "Combolist_localidades.elige_valor()"'];
	var Combolist_localidades = new Combolist(configuraciones, etiquetas, valores, metodos, codigos);








// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE RECARGA FILTRO MUNICIPIOS Y LOCALIDAD EN APOYOS DE PROGRAMA

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Recarga_grid_localidad
// ID...........: ID_BOTON_RECARGA_LOCALIDAD
// SE INSERTA EN: #IDXX_2_1_4	
// DESCRIPCION..: Elemento de tipo link con metodos e icono para actualizar y filtrar gradilla
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustituye contenido

	var titulosIngles = ['RELOAD'];
	var iconosIngles = ['fa-solid fa-arrow-rotate-right'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['RECARGAR'];
	var iconosEspanol = ['fa-solid fa-arrow-rotate-right'];
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
	var etiquetas = ["boton_link_icono_chico", "ID_BOTON_RECARGA_LOCALIDAD", "#IDXX_2_1_4", "recarga_grid_localidad"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_recarga_localidad.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Recarga_grid_localidad = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Recarga_grid_localidad.generahtml();
	Recarga_grid_localidad.imprimehtml();

// CLASE........: Metodos
// INSTANCIA....: Metodos_recarga_localidad
// DESCRIPCION..: Metodos que se ejecutan al actualizar y filtrar gradilla

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
	'Gradilla_apoyos.inicializa_posicion()',
	'Consulta_gradilla_apoyos.limpia_codigos()',
	'Consulta_gradilla_apoyos.posicion_callback(0)',
	'Consulta_gradilla_apoyos.actualizafiltro(0, Registro_id_programa.configuraciones[0])',
	'Consulta_gradilla_apoyos.actualizafiltro(1, 1)',
	'Consulta_gradilla_apoyos.actualizafiltro(2, Combolist_municipios.valores[1][1])',
	'Consulta_gradilla_apoyos.actualizafiltro(3, Combolist_localidades.valores[1][3])',
	'Consulta_gradilla_apoyos.actualizafiltro(4, 0)',
	'Consulta_gradilla_apoyos.actualizafiltro(5, "0000-00-00")',
	'Consulta_gradilla_apoyos.ejecuta_2()'

	];

	var Metodos_recarga_localidad = new Metodos(configuraciones, codigos, elementos);






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE RECARGA FILTRO CEDULA

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Recarga_grid_cedula
// ID...........: ID_BOTON_RECARGA_CEDULA
// SE INSERTA EN: #IDXX_2_1_5_2	
// DESCRIPCION..: Elemento de tipo link con metodos e icono para actualizar y filtrar gradilla
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustituye contenido

	var titulosIngles = ['RELOAD'];
	var iconosIngles = ['fa-solid fa-arrow-rotate-right'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['RECARGAR'];
	var iconosEspanol = ['fa-solid fa-arrow-rotate-right'];
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
	var etiquetas = ["boton_link_icono_chico", "ID_BOTON_RECARGA_CEDULA", "#IDXX_2_1_5_2", "recarga_grid_cedula"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_recarga_cedula.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Recarga_grid_cedula = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Recarga_grid_cedula.generahtml();
	Recarga_grid_cedula.imprimehtml();

// CLASE........: Metodos
// INSTANCIA....: Metodos_recarga_cedula
// DESCRIPCION..: Metodos que se ejecutan al actualizar y filtrar gradilla

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
	'Gradilla_apoyos.inicializa_posicion()',
	'Consulta_gradilla_apoyos.limpia_codigos()',
	'Consulta_gradilla_apoyos.posicion_callback(0)',
	'Consulta_gradilla_apoyos.actualizafiltro(0, Registro_id_programa.configuraciones[0])',
	'Consulta_gradilla_apoyos.actualizafiltro(1, 2)',
	'Consulta_gradilla_apoyos.actualizafiltro(2, "")',
	'Consulta_gradilla_apoyos.actualizafiltro(3, "")',
	'Consulta_gradilla_apoyos.actualizafiltro(4, document.getElementById("ID_DATO_FILTRO_1_0_INPUT_NUM").value)', 
	'Consulta_gradilla_apoyos.actualizafiltro(5, "0000-00-00")',
	'Consulta_gradilla_apoyos.ejecuta_2()'

	];
	var Metodos_recarga_cedula = new Metodos(configuraciones, codigos, elementos);






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE RECARGA FILTRO FECHA

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Recarga_grid_fecha
// ID...........: ID_BOTON_RECARGA_FECHA
// SE INSERTA EN: #IDXX_2_1_6_2	
// DESCRIPCION..: Elemento de tipo link con metodos e icono para actualizar y filtrar gradilla
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustituye contenido

	var titulosIngles = ['RELOAD'];
	var iconosIngles = ['fa-solid fa-arrow-rotate-right'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['RECARGAR'];
	var iconosEspanol = ['fa-solid fa-arrow-rotate-right'];
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
	var etiquetas = ["boton_link_icono_chico", "ID_BOTON_RECARGA_FECHA", "#IDXX_2_1_6_2", "recarga_grid_fecha"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_recarga_fecha.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Recarga_grid_fecha = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Recarga_grid_fecha.generahtml();
	Recarga_grid_fecha.imprimehtml();


// INSTANCIA....: Metodos_recarga_fecha
// DESCRIPCION..: Metodos que se ejecutan al actualizar y filtrar gradilla

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
	'Gradilla_apoyos.inicializa_posicion()',
	'Consulta_gradilla_apoyos.limpia_codigos()',
	'Consulta_gradilla_apoyos.posicion_callback(0)',
	'Consulta_gradilla_apoyos.actualizafiltro(0, Registro_id_programa.configuraciones[0])',
	'Consulta_gradilla_apoyos.actualizafiltro(1, 3)',
	'Consulta_gradilla_apoyos.actualizafiltro(2, "")',
	'Consulta_gradilla_apoyos.actualizafiltro(3, "")',
	'Consulta_gradilla_apoyos.actualizafiltro(4, 0)', 
	'Consulta_gradilla_apoyos.actualizafiltro(5, document.getElementById("ID_DATO_FILTRO_2_1_INPUT_DATE").value)',
	'Consulta_gradilla_apoyos.ejecuta_2()'

	];
	var Metodos_recarga_fecha = new Metodos(configuraciones, codigos, elementos);






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE COMBOLIST APOYOS CEDULA

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Consulta_combolist_cedulas
// DESCRIPCION..: Consulta que se ejecuta para actualizar Combolist de cedulas

	var statusConsulta = 0;
	var scriptPhp = 'consulta_combolist_cedulas.php';
	var metodoPhp = 'POST';
	var filtro = [];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_consulta_combolist_cedulas.ejecuta()'];
	var metodosCallback02 = ['Metodos_after_consulta_combolist_cedulas_inicia.ejecuta()'];
	var metodosCallback = [metodosCallback01, metodosCallback02]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_combolist_cedulas = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_consulta_combolist_cedulas
// DESCRIPCION..: Metodos que se ejecutan despues de la consulta del combolist municipios

    var configuraciones = 0;
	var codigos = [''];
	var elementos = [
    
        'Combolist_cedulas.generahtml()',
        'Combolist_cedulas.imprimehtml()',
		'Consulta_combolist_familiares.limpia_codigos()',
    	'Consulta_combolist_familiares.inicializa_parametros()',
    	'Consulta_combolist_familiares.actualizafiltro(0, Combolist_cedulas.valores[1][0])',
    	'Consulta_combolist_familiares.actualizafiltro(1, 1)',
    	'Consulta_combolist_familiares.posicion_callback(0)',
		'Consulta_combolist_familiares.ejecuta_2()'
    
    ];

	var Metodos_after_consulta_combolist_cedulas = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_consulta_combolist_cedulas_inicia
// DESCRIPCION..: Metodos que se ejecutan despues de la consulta del combolist municipios
//                al inicio
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
    
//		'alert("ESTOY EN METODOS CALLBACK DE CONSULTA CEDULAS VOY A CONSULTA COMBO FAMILIARES ESTOY VIVO")',
		'Consulta_combolist_familiares.inicializa_parametros()',
		'Consulta_combolist_familiares.limpia_codigos()',
		'Consulta_combolist_familiares.posicion_callback(1)',
		'Consulta_combolist_familiares.ejecuta_2()'

	];

	var Metodos_after_consulta_combolist_cedulas_inicia = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Combolist
// INSTANCIA....: Combolist_cedulas
// ID...........: ID_CEDULAS_COMBOLIST
// SE INSERTA EN: #IDXXX_1_1_2_2	
// DESCRIPCION..: Combolist que recibe datos de la tabla cedula para elegir en apoyo
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es llamado, sustituye contenido

	var inglesIdioma = ['COUNTY: ', 'WRITE OR CHOOSE...'];
	var espanolIdioma = ['CÉDULA: ', 'ESCRIBE O SELECCIONA...'];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
// impresion = 0 SUSTITUYE CONTENIDO = 1 AGREGA CONTENIDO
    var impresion = 0;
// etiqueta = 0 SIN ETIQUETA = 1 CON ETIQUETA
    var etiqueta = 0;
// fuente = 0 JSON = 1 INSTANCIA DE CONSULTA
    var fuente = 1;
// ORIGEN DE DATOS SEGÚN LA FUENTE
    var datos = Consulta_combolist_cedulas;

    var valorFormatoArreglo = [[[0], [0]]];
	var datoFormatoArreglo = [[0, 1, 0, 1, 0], [0, " / ", 1, " ", 2]];
	var codificado = 0;
	var resultado = [];
	var consulta = [datos, valorFormatoArreglo, datoFormatoArreglo, codificado, resultado];
// ARREGLO DE DOS POSICIONES DE REGISTROS ESPECIALES
    var especial01 = [['TODOS_CLAVE_1', 'TODOS LOS REGISTROS'], 'TODOS LOS REGISTROS'];
// ARREGLO DE ARREGLOS CON TODAS LOS REGISTROS ESPECIALES	
    var especiales = [];
    var configuraciones = [controlIdioma, impresion, etiqueta, fuente, consulta, especiales];
    var etiquetas = ['combolist', 'ID_CEDULAS_COMBOLIST', '#IDXXX_1_1_2_2', 'combolist_cedulas'];
    var codigos = [''];
    var valores = [['VALOR VACIO'], ['VALOR VACIO'], ['', ''], ['VALOR VACIO'], [0, 0]];
    var metodos = ['ONCHANGE = "Combolist_cedulas.elige_valor(), Metodos_cambia_cedula_combo.ejecuta()"'];
	var Combolist_cedulas = new Combolist(configuraciones, etiquetas, valores, metodos, codigos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_cambia_cedula_combo
// DESCRIPCION..: Metodos que se ejecutan despues de seleccionar cedula en apoyo

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Combolist_familiares.inicializa_valor()',
		'Consulta_combolist_familiares.limpia_codigos()',
		'Consulta_combolist_familiares.inicializa_parametros()',
    	'Consulta_combolist_familiares.posicion_callback(0)',
		'Consulta_combolist_familiares.actualizafiltro(0, Combolist_cedulas.valores[1][0])',
    	'Consulta_combolist_familiares.actualizafiltro(1, 1)',
    	'Consulta_combolist_familiares.ejecuta_2()'
		
	];
	var Metodos_cambia_cedula_combo = new Metodos(configuraciones, codigos, elementos);





// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE COMBOLIST FAMILIARES APOYOS

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Consulta_combolist_familiares
// DESCRIPCION..: Consulta que se ejecuta para actualizar Combolist de familiares

	var statusConsulta = 0;
	var scriptPhp = 'consulta_combolist_familiares.php';
	var metodoPhp = 'POST';
	var filtro = ['', ''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_consulta_combolist_familiares.ejecuta()'];
	var metodosCallback02 = ['Metodos_after_consulta_combolist_familiares_inicia.ejecuta()'];
	var metodosCallback = [metodosCallback01, metodosCallback02]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_combolist_familiares = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_consulta_combolist_familiares
// DESCRIPCION..: Metodos que se ejecutan despues de la consulta del combolist familiares

    var configuraciones = 0;
	var codigos = [''];
	var elementos = [

		'Combolist_familiares.generahtml()',
        'Combolist_familiares.imprimehtml()'
    
    ];
	var Metodos_after_consulta_combolist_familiares = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_consulta_combolist_familiares_inicia
// DESCRIPCION..: Metodos que se ejecutan despues de la consulta del combolist familiares

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

//		'alert("ESTOY EN METODOS CALLBACK DE CONSULTA FAMILIARES VOY A CONSULTA GRID DETALLES ESTOY VIVO")',
		'Consulta_gradilla_detalles.inicializa_parametros()',
		'Consulta_gradilla_detalles.limpia_codigos()',
		'Consulta_gradilla_detalles.posicion_callback(1)',
		'Consulta_gradilla_detalles.ejecuta_2()'
    
    ];
	var Metodos_after_consulta_combolist_familiares_inicia = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Combolist
// INSTANCIA....: Combolist_familiares
// ID...........: ID_FAMILIARES_COMBOLIST
// SE INSERTA EN: #IDXXX_1_1_3_2	
// DESCRIPCION..: Combolist que recibe datos de la familia para elegir
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es llamado, sustituye contenido

	var inglesIdioma = ['COUNTY: ', 'WRITE OR CHOOSE...'];
	var espanolIdioma = ['RESPONSABLE: ', 'ESCRIBE O SELECCIONA...'];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
// impresion = 0 SUSTITUYE CONTENIDO = 1 AGREGA CONTENIDO
    var impresion = 0;
// etiqueta = 0 SIN ETIQUETA = 1 CON ETIQUETA
    var etiqueta = 0;
// fuente = 0 JSON = 1 INSTANCIA DE CONSULTA
    var fuente = 1;
// ORIGEN DE DATOS SEGÚN LA FUENTE
    var datos = Consulta_combolist_familiares;

    var valorFormatoArreglo = [[[0], [0]]];
	var datoFormatoArreglo = [[0, 1, 0, 1, 0], [0, ' ', 1, ', ', 2]];
	var codificado = 0;
	var resultado = [];
	var consulta = [datos, valorFormatoArreglo, datoFormatoArreglo, codificado, resultado];
// ARREGLO DE DOS POSICIONES DE REGISTROS ESPECIALES
    var especial01 = [['TODOS_CLAVE_MUNI_1', 'TODOS LOS REGISTROS MUNI', 'TODOS_CLAVE_LOCA_1', 'TODOS LOS REGISTROS LOCA'], 'TODOS LOS REGISTROS LOCA'];
// ARREGLO DE ARREGLOS CON TODAS LOS REGISTROS ESPECIALES	
    var especiales = [];
    var configuraciones = [controlIdioma, impresion, etiqueta, fuente, consulta, especiales];
    var etiquetas = ['combolist', 'ID_FAMILIARES_COMBOLIST', '#IDXXX_1_1_3_2', 'combolist_familiares'];
    var codigos = [''];
    var valores = [['VALOR VACIO'], ['VALOR VACIO'], ['', ''], ['VALOR VACIO'], [0, 0]];
    var metodos = ['ONCHANGE = "Combolist_familiares.elige_valor()"'];
	var Combolist_familiares = new Combolist(configuraciones, etiquetas, valores, metodos, codigos);






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE CONTROLES GENERALES DE LA CAPTURA APOYOS

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Eliminar_apoyo
// ID...........: ID_BOTON_ELIMINAR_APOYO
// SE INSERTA EN: #IDXX_3_2_2_1	
// DESCRIPCION..: Link con metodos e icono para eliminar registro de apoyo ya existente
// HTML.........: Cuando es creado de manera disabled
// IMPRESION....: Cuando es creado sustituye contenidos y se inserta en contenedor oculto
//                la primera vez

	var titulosIngles = ['ELIMINAR APOYO'];
	var iconosIngles = ['fa-solid fa-trash-can'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['ELIMINAR APOYO'];
	var iconosEspanol = ['fa-solid fa-trash-can'];
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
	var etiquetas = ["boton_eliminar boton_link_icono_chico", "ID_BOTON_ELIMINAR_APOYO", "#IDXX_3_2_2_1", "elimina_apoyo"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_modal_elimina_apoyo_confirma.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Eliminar_apoyo = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Eliminar_apoyo.generahtml();
	Eliminar_apoyo.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Actualizar_programa
// ID...........: ID_BOTON_ACTUALIZAR_APOYO
// SE INSERTA EN: #IDXX_3_2_2_2	
// DESCRIPCION..: Link con metodos e icono para actualizar registro de apoyo ya existente
// HTML.........: Cuando es creado de manera disabled
// IMPRESION....: Cuando es creado sustituye contenidos y se inserta en contenedor oculto
//                la primera vez

	var titulosIngles = ['ACTUALIZAR APOYO'];
	var iconosIngles = ['fa-solid fa-floppy-disk'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['ACTUALIZAR APOYO'];
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
	var etiquetas = ["boton_actualizar boton_link_icono_chico", "ID_BOTON_ACTUALIZAR_APOYO", "#IDXX_3_2_2_2", "actualiza_apoyo"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_elige_actualizar_apoyo.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Actualizar_apoyo = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Actualizar_apoyo.generahtml();
	Actualizar_apoyo.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Grabar_apoyo
// ID...........: ID_BOTON_GRABAR_APOYO
// SE INSERTA EN: #IDXX_3_2_2_3	
// DESCRIPCION..: Link con metodos e icono para grabar registro de apoyo nuevo
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado sustituye contenidos

	var titulosIngles = ['GRABAR APOYO'];
	var iconosIngles = ['fa-solid fa-floppy-disk'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['GRABAR APOYO'];
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
	var etiquetas = ["boton_grabar boton_link_icono_chico", "ID_BOTON_GRABAR_APOYO", "#IDXX_3_2_2_3", "graba_apoyo"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_graba_apoyo.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Grabar_apoyo = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Grabar_apoyo.generahtml();
	Grabar_apoyo.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Reestablece_captura_apoyo
// ID...........: ID_BOTON_REESTABLECE_APOYO
// SE INSERTA EN: #IDXX_3_2_2_4	
// DESCRIPCION..: Link con metodos e icono para reestablecer valores de la captura
//                cuando se esta modificando un registro de apoyo
// HTML.........: Cuando es creado de manera disabled
// IMPRESION....: Cuando es creado espera metodo para quitar disabled

	var titulosIngles = ['REESTABLECER VALORES DE CAPTURA'];
	var iconosIngles = ['fa-solid fa-arrow-rotate-right'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['REESTABLECER VALORES DE CAPTURA'];
	var iconosEspanol = ['fa-solid fa-arrow-rotate-right'];
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
	var etiquetas = ["boton_reestablece boton_link_icono_chico", "ID_BOTON_REESTABLECE_APOYO", "#IDXX_3_2_2_4", "reestablece_captura_apoyo"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_confirma_reestablece_apoyos.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Reestablece_captura_apoyo = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Reestablece_captura_apoyo.generahtml();
	Reestablece_captura_apoyo.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Limpia_captura_apoyo
// ID...........: ID_BOTON_LIMPIA_APOYO
// SE INSERTA EN: #IDXX_3_2_2_5	
// DESCRIPCION..: Link con metodos e icono para limpiar la captura capturando nuevo apoyo
// HTML.........: Cuando es creado de manera disabled
// IMPRESION....: Cuando es creado espera metodo para quitar disabled

	var titulosIngles = ['LIMPIAR CAPTURA'];
	var iconosIngles = ['fa-regular fa-clipboard'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['LIMPIAR CAPTURA'];
	var iconosEspanol = ['fa-regular fa-clipboard'];
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
	var etiquetas = ["boton_limpia boton_link_icono_chico", "ID_BOTON_LIMPIA_APOYO", "#IDXX_3_2_2_5", "limpia_captura_apoyo"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_nuevo_apoyo.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Limpia_captura_apoyo = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Limpia_captura_apoyo.generahtml();
	Limpia_captura_apoyo.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Nueva_captura_apoyo
// ID...........: ID_BOTON_NUEVA_APOYO
// SE INSERTA EN: #IDXX_3_2_2_6	
// DESCRIPCION..: Link con metodos e icono para abrir la captura a un nuevo registro de apoyo
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido

	var titulosIngles = ['CAPTURAR NUEVO APOYO'];
	var iconosIngles = ['fa-solid fa-plus'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['CAPTURAR NUEVO APOYO'];
	var iconosEspanol = ['fa-solid fa-plus'];
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
	var etiquetas = ["boton_nueva boton_link_icono_chico", "ID_BOTON_NUEVA_APOYO", "#IDXX_3_2_2_6", "nueva_captura_apoyo"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_nuevo_apoyo.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Nueva_captura_apoyo = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Nueva_captura_apoyo.generahtml();
	Nueva_captura_apoyo.imprimehtml();






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE CAPTURAR NUEVO APOYO

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_nuevo_apoyo
// DESCRIPCION..: Metodos que se ejecutan al elegir capturar nuevo apoyo

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.cierra()',

	'Registro_status_apoyo.recibe_status(2)',
	'Registro_id_apoyo.recibe_status(0)',

	'Registro_status_detalle.recibe_status(0)',

	'Registro_id_detalle.recibe_status(0)',
		
	'Datos_captura_apoyo.imprime_natural(Json_apoyo_nuevo)',

	'Modal_apoyos.abrefijo()',

	'Consulta_gradilla_detalles.limpia_codigos()',
	'Consulta_gradilla_detalles.inicializa_parametros()',
	'Consulta_gradilla_detalles.actualizafiltro(0, Registro_id_apoyo.configuraciones[0])',
	'Consulta_gradilla_detalles.posicion_callback(0)',
	'Consulta_gradilla_detalles.ejecuta_2()',

	'Datos_captura_filtros.imprime_natural(Json_filtros_vacios)',
	
	'Combolist_municipios.inicializa_valor()',	
	'Combolist_municipios.generahtml()',	
	'Combolist_municipios.imprimehtml()',	

	'Combolist_localidades.inicializa_valor()',	
	'Combolist_localidades.generahtml()',	
	'Combolist_localidades.imprimehtml()',	
	
	'Datos_captura_detalle.imprime_natural(Json_detalle_vacio)',
	'Datos_captura_material.imprime_natural(Json_material_vacio)',

	'Combolist_cedulas.inicializa_valor()',	
	'Combolist_cedulas.generahtml()',	
	'Combolist_cedulas.imprimehtml()',	

	'Combolist_familiares.inicializa_valor()',	
	'Combolist_familiares.generahtml()',	
	'Combolist_familiares.imprimehtml()',	

	'Clases_apoyo_nuevo.afectar()'

	];
	var Metodos_nuevo_apoyo = new Metodos(configuraciones, codigos, elementos);

	
	




// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE GRABAR APOYO

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_graba_apoyo
// DESCRIPCION..: Metodos que se ejecutan al elegir grabar registro de apoyo

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	
	'Evaluacion_grabar_apoyo.recibe_validacion([0, Combolist_cedulas.valores[1][0]])',
	'Evaluacion_grabar_apoyo.recibe_validacion([1, Combolist_familiares.valores[1][0]])',
	'Evaluacion_grabar_apoyo.ejecuta()'

	];
	var Metodos_graba_apoyo = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_grabar_apoyo
// DESCRIPCION..: Evalua que nombre y descripción de programa no este vacio 

	var numeroElementos = 2;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_modal_graba_apoyo_confirma.ejecuta()', 'Metodos_modal_apoyo_vacio.ejecuta()'];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = ['', ''];
	var tiposElementos = [0, 0];
	var validacionElementos = [1, 1];
	var especialesElementos = [['VALOR VACIO'], ['VALOR VACIO']];
	var retornoElementos = [[0], [0]];
	var mensajesElementos = [['CÉDULA VACIA'], ['RESPONSABLE VACIO']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_grabar_apoyo = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_apoyo_vacio
// DESCRIPCION..: Modal para avisar que se intento grabar un apoyo sin cedula o sin
//                responsable
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_apoyos_modal_opcion.contenido([0, "DATOS INCORRECTOS"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "NO PUEDO GRABAR APOYO SIN CÉDULA Y SIN RESPONSABLE"])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Navega_general.recibe_destino(Navega_apoyos.configuraciones[0])',
	'Modal_apoyos_opcion.abrefijo()'

	];
	var Metodos_modal_apoyo_vacio = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_graba_apoyo_confirma
// DESCRIPCION..: Modal para confirmar grabar apoyo

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_apoyos_modal_opcion.contenido([0, "CONFIRMA GRABAR APOYO"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE GRABAR EL APOYO DE LA CÉDULA: "+Combolist_cedulas.valores[1][0]+" CON EL RESPONSABLE: "+Combolist_familiares.valores[2][1]])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Si_grabar_apoyo_modal.generahtml()',
	'Si_grabar_apoyo_modal.imprimehtml()',
	'No_grabar_apoyo_modal.generahtml()',
	'No_grabar_apoyo_modal.imprimehtml()',
	'Modal_apoyos_opcion.abrefijo()'
	];
	var Metodos_modal_graba_apoyo_confirma = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_grabar_apoyo_modal
// ID...........: ID_SI_GRABAR_APOYO_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de grabar apoyo
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_GRABAR_APOYO_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_grabar_apoyo_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra(), Metodos_graba_apoyo_bd.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_grabar_apoyo_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Elemento
// INSTANCIA....: No_grabar_apoyo_modal
// ID...........: ID_NO_GRABAR_APOYO_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en confirmación de grabar apoyo 
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
	var etiquetas = ["boton_link_icono_chico", "ID_NO_GRABAR_APOYO_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "no_grabar_apoyo_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_grabar_apoyo_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);
	
// CLASE........: Metodos
// INSTANCIA....: Metodos_graba_apoyo_bd
// DESCRIPCION..: Metodos que se ejecutan para preparar consulta de grabación de apoyo
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.abrefijo()',
	'Consulta_grabar_apoyo.actualizafiltro(0, usuarioID)',
	'Consulta_grabar_apoyo.actualizafiltro(1, Registro_id_programa.configuraciones[0])',
	'Consulta_grabar_apoyo.actualizafiltro(2, Combolist_cedulas.valores[1][0])',
	'Consulta_grabar_apoyo.actualizafiltro(3, Combolist_familiares.valores[1][0])',
	'Datos_captura_apoyo.consulta_natural(4, Consulta_grabar_apoyo)',
	'Consulta_grabar_apoyo.posicion_callback(0)',
	'Consulta_grabar_apoyo.ejecuta()'

	];
	
	var Metodos_graba_apoyo_bd = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_grabar_apoyo
// DESCRIPCION..: Consulta que se ejecuta para grabar apoyo

	var statusConsulta = 0;
	var scriptPhp = 'consulta_graba_apoyo.php';
	var metodoPhp = 'POST';
	var filtro = ['', '', '', ''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_graba_apoyo.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_grabar_apoyo = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_graba_apoyo
// DESCRIPCION..: Metodos que se ejecutan despues de grabar nuevo apoyo

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

		'Modal_apoyos.abrefijo()',
		'Registro_id_apoyo.recibe_status(Consulta_grabar_apoyo.codigos[0][0][0].recupera)',
		'Consulta_baja_apoyo.limpia_codigos()',
		'Consulta_baja_apoyo.inicializa_parametros()',
		'Consulta_baja_apoyo.actualizafiltro(0, Consulta_grabar_apoyo.codigos[0][0][0].recupera)',
		'Consulta_baja_apoyo.posicion_callback(1)',
		'Consulta_baja_apoyo.ejecuta()'

	];
	var Metodos_after_graba_apoyo = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_graba_baja_apoyo
	// DESCRIPCION..: Metodos que se ejecutan despues de ejecutar consulta de grabar apoyo
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
		'Modal_apoyos.cierra()',

		'Modal_apoyos.abrefijo()',
		'Consulta_gradilla.limpia_codigos()',
		'Consulta_gradilla.inicializa_parametros()',
//		'Consulta_gradilla_apoyos.actualizafiltro(0, usuarioStatus)',
//		'Consulta_gradilla_apoyos.actualizafiltro(1, usuarioID)',
		'Consulta_gradilla.posicion_callback(0)',
		'Consulta_gradilla.ejecuta_2()',

		'Modal_apoyos.abrefijo()',
		'Consulta_gradilla_apoyos.limpia_codigos()',
		'Consulta_gradilla_apoyos.inicializa_parametros()',
/*
		'Consulta_gradilla_apoyos.actualizafiltro(0, usuarioStatus)',
		'Consulta_gradilla_apoyos.actualizafiltro(1, usuarioID)',
		'Consulta_gradilla_apoyos.actualizafiltro(0, Registro_id_programa.configuraciones[0])',
		'Consulta_gradilla_apoyos.actualizafiltro(1, 0)',
		'Consulta_gradilla_apoyos.actualizafiltro(2, "")',
		'Consulta_gradilla_apoyos.actualizafiltro(3, "")',
		'Consulta_gradilla_apoyos.actualizafiltro(4, 0)',
		'Consulta_gradilla_apoyos.actualizafiltro(5, "0000-00-00")',
*/
		'Consulta_gradilla_apoyos.posicion_callback(0)',
		'Consulta_gradilla_apoyos.ejecuta_2()',

		'Registro_status_apoyo.recibe_status(1)',
		'Registro_status_detalle.recibe_status(0)',
		'Registro_id_detalle.recibe_status(0)',
		
		'Json_datos_captura_apoyo.recibe_json(Consulta_baja_apoyo.codigos[0])',
		'Json_datos_captura_apoyo.genera()',
		'Datos_captura_apoyo.imprime_natural(Json_datos_captura_apoyo.codigos[0])',

		'Modal_apoyos.abrefijo()',
		'Consulta_gradilla_detalles.limpia_codigos()',
		'Consulta_gradilla_detalles.inicializa_parametros()',
		'Consulta_gradilla_detalles.actualizafiltro(0, Registro_id_apoyo.configuraciones[0])',
		'Consulta_gradilla_detalles.posicion_callback(0)',
		'Consulta_gradilla_detalles.ejecuta_2()',

		'Datos_captura_detalle.imprime_natural(Json_detalle_vacio)',
		'Datos_captura_material.imprime_natural(Json_material_vacio)',

		'Clases_apoyo.afectar()',
	
		'Maqueta_apoyos_modal_opcion.contenido([0, "APOYO GRABADO"])',
		'Maqueta_apoyos_modal_opcion.contenido([1, "EL APOYO: "+document.getElementById("ID_DATO_APOYOS_4_3_INPUT_TEXT").value+" FUE GRABADO EXITOSAMENTE CON EL ID: "+Registro_id_apoyo.configuraciones[0]])',
		'Maqueta_apoyos_modal_opcion.generahtml()',
		'Maqueta_apoyos_modal_opcion.imprimehtml()',
		'Ok_modal.generahtml()',
		'Ok_modal.imprimehtml()',
		'Navega_general.recibe_destino(Navega_apoyos.configuraciones[0])',
		'Modal_apoyos_opcion.abrefijo()'
		];
	
		var Metodos_graba_baja_apoyo = new Metodos(configuraciones, codigos, elementos);
	




// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE LIMPIA CAPTURA DE APOYO

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_limpia_apoyo
// DESCRIPCION..: Metodos que se ejecutan al elegir limpiar una captura de apoyo nuevo

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['alert("VOY A LIMPIAR REGISTRO")'];
	var Metodos_limpia_apoyo = new Metodos(configuraciones, codigos, elementos);
	




// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE BORRAR APOYO

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_modal_elimina_apoyo_confirma
// DESCRIPCION..: Modal para confirmar eliminar apoyo

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_apoyos_modal_opcion.contenido([0, "CONFIRMA ELIMINAR APOYO"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE ELIMINAR EL APOYO: "+Consulta_baja_apoyos.codigos[0][0][1].dato_05+" DEL RESPONSABLE: "+Consulta_baja_apoyos.codigos[0][0][1].dato_04+" ASIGNADO A LA CÉDULA: "+Combolist_cedulas.valores[1][0]+" CON EL ID: "+Registro_id_apoyo.configuraciones[0]])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Si_eliminar_apoyo_modal.generahtml()',
	'Si_eliminar_apoyo_modal.imprimehtml()',
	'No_eliminar_apoyo_modal.generahtml()',
	'No_eliminar_apoyo_modal.imprimehtml()',
	'Modal_apoyos_opcion.abrefijo()'
	];
	var Metodos_modal_elimina_apoyo_confirma = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_eliminar_apoyo_modal
// ID...........: ID_SI_ELIMINAR_APOYO_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de eliminar apoyo
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_ELIMINAR_APOYO_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_eliminar_apoyo_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra(), Metodos_inspeccion_detalles_apoyo.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_eliminar_apoyo_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Elemento
// INSTANCIA....: No_eliminar_apoyo_modal
// ID...........: ID_NO_ELIMINAR_APOYO_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en confirmación de eliminar apoyo 
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
	var etiquetas = ["boton_link_icono_chico", "ID_NO_ELIMINAR_APOYO_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "no_eliminar_apoyo_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_eliminar_apoyo_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);
	
// CLASE........: Metodos
// INSTANCIA....: Metodos_inspeccion_detalles_apoyo
// DESCRIPCION..: Metodos que se ejecutan para preparar consulta de inspeccion de detalles en
//              : apoyo
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.abrefijo()',
	'Consulta_inspeccionar_detalles.actualizafiltro(0, Registro_id_apoyo.configuraciones[0])',
	'Consulta_inspeccionar_detalles.posicion_callback(0)',
	'Consulta_inspeccionar_detalles.ejecuta()'

	];
	
	var Metodos_inspeccion_detalles_apoyo = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_inspeccionar_detalles
// DESCRIPCION..: Consulta que se ejecuta para inspeccionar si el programa tiene detalles

	var statusConsulta = 0;
	var scriptPhp = 'consulta_inspecciona_detalles.php';
	var metodoPhp = 'POST';
	var filtro = [''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_inspecciona_detalles.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_inspeccionar_detalles = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_inspecciona_detalles
// DESCRIPCION..: Metodos que se ejecutan despues de consulta detalles

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.cierra()',
	'Evaluacion_borrar_apoyo_detalles.recibe_validacion([0, Consulta_inspeccionar_detalles.codigos[0][0][1].dato_01])',
	'Evaluacion_borrar_apoyo_detalles.ejecuta()'

	];
	
	var Metodos_after_inspecciona_detalles = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_borrar_apoyo_detalles
// DESCRIPCION..: Evalua que apoyo no tenga detalles dependientes para poder ser borrado 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_modal_no_eliminar_apoyo.ejecuta()', 'Metodos_consulta_eliminar_apoyo.ejecuta()'];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [0];
	var tiposElementos = [1];
	var validacionElementos = [1];
	var especialesElementos = [[0]];
	var retornoElementos = [[0]];
	var mensajesElementos = [['SIN DETALLES']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_borrar_apoyo_detalles = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_no_eliminar_apoyo
// DESCRIPCION..: Metodos que se ejecutan para presentar modal de no borrar apoyos con detalles
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Maqueta_apoyos_modal_opcion.contenido([0, "PROGRAMA CON DETALLES"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "NO PUEDO ELIMINAR EL APOYO: "+Consulta_baja_apoyos.codigos[0][0][1].dato_05+" CON EL ID: "+Registro_id_apoyo.configuraciones[0]+" PORQUE TIENE "+Consulta_inspeccionar_detalles.codigos[0][0][1].dato_01+" DETALLES DEPENDIENTES."])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Navega_general.recibe_destino(Navega_apoyos.configuraciones[0])',
	'Modal_apoyos_opcion.abrefijo()'

	];
	
	var Metodos_modal_no_eliminar_apoyo = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_consulta_eliminar_apoyo
// DESCRIPCION..: Metodos que se ejecutan para preparar consulta de eliminacion de apoyo
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.abrefijo()',
	'Consulta_eliminar_apoyo.actualizafiltro(0, Registro_id_apoyo.configuraciones[0])',
	'Consulta_eliminar_apoyo.actualizafiltro(1, Registro_id_programa.configuraciones[0])',
	'Consulta_eliminar_apoyo.posicion_callback(0)',
	'Consulta_eliminar_apoyo.ejecuta()'

	];
	
	var Metodos_consulta_eliminar_apoyo = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_eliminar_apoyo
// DESCRIPCION..: Consulta que se ejecuta para eliminar apoyo

	var statusConsulta = 0;
	var scriptPhp = 'consulta_eliminar_apoyo.php';
	var metodoPhp = 'POST';
	var filtro = [''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_elimina_apoyo.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_eliminar_apoyo = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_elimina_apoyo
// DESCRIPCION..: Metodos que se ejecutan despues de eliminar apoyo

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.cierra()',

	'Modal_apoyos.abrefijo()',
	'Consulta_gradilla.limpia_codigos()',
	'Consulta_gradilla.inicializa_parametros()',
//	'Consulta_gradilla_apoyos.actualizafiltro(0, usuarioStatus)',
//	'Consulta_gradilla_apoyos.actualizafiltro(1, usuarioID)',
	'Consulta_gradilla.posicion_callback(0)',
	'Consulta_gradilla.ejecuta_2()',

	'Modal_apoyos.abrefijo()',
	'Consulta_gradilla_apoyos.limpia_codigos()',
	'Consulta_gradilla_apoyos.inicializa_parametros()',
//	'Consulta_gradilla_apoyos.actualizafiltro(0, usuarioStatus)',
//	'Consulta_gradilla_apoyos.actualizafiltro(1, usuarioID)',
	'Consulta_gradilla_apoyos.posicion_callback(0)',
	'Consulta_gradilla_apoyos.ejecuta_2()',

	'Maqueta_apoyos_modal_opcion.contenido([0, "APOYO ELIMINADO"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "EL APOYO CON EL ID: "+Registro_id_apoyo.configuraciones[0]+" FUE BORRADO EXITOSAMENTE."])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Navega_general.recibe_destino(Navega_apoyos.configuraciones[0])',
	'Modal_apoyos_opcion.abrefijo()',
	'Metodos_nuevo_apoyo.ejecuta()'

	];
	var Metodos_after_elimina_apoyo = new Metodos(configuraciones, codigos, elementos);
	
	




// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE ACTUALIZAR APOYO

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_elige_actualizar_apoyo
// DESCRIPCION..: Metodos que se ejecutan al elegir actualizar registro de apoyo

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Evaluacion_actualizar_apoyo.recibe_validacion([0, Combolist_cedulas.valores[1][0]])',
	'Evaluacion_actualizar_apoyo.recibe_validacion([1, Combolist_familiares.valores[1][0]])',
	'Evaluacion_actualizar_apoyo.ejecuta()'];
	var Metodos_elige_actualizar_apoyo = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_actualizar_apoyo
// DESCRIPCION..: Evalua que cedula y responsable de apoyo no esten vacios 

	var numeroElementos = 2;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_modal_actualizar_apoyo_confirma.ejecuta()', 'Metodos_modal_actualizar_apoyo_vacio.ejecuta()'];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = ['', ''];
	var tiposElementos = [0, 0];
	var validacionElementos = [0, 0];
	var especialesElementos = [[''], ['']];
	var retornoElementos = [[0], [0]];
	var mensajesElementos = [['CEDULA VACIA'], ['RESPONSABLE VACIO']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_actualizar_apoyo = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_actualizar_apoyo_vacio
// DESCRIPCION..: Modal para avisar que se intento actualizar un apoyo vacio
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_apoyos_modal_opcion.contenido([0, "DATOS INCORRECTOS"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "NO PUEDO ACTUALIZAR APOYO SIN CÉDULA Y SIN RESPONSABLE"])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Navega_general.recibe_destino(Navega_apoyos.configuraciones[0])',
	'Modal_apoyos_opcion.abrefijo()'

	];
	var Metodos_modal_actualizar_apoyo_vacio = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_actualizar_apoyo_confirma
// DESCRIPCION..: Modal para confirmar actualizar apoyo

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_apoyos_modal_opcion.contenido([0, "CONFIRMA ACTUALIZAR APOYO"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE ACTUALIZAR EL APOYO: "+document.getElementById("ID_DATO_APOYOS_4_3_INPUT_TEXT").value+" CON EL ID: "+Registro_id_apoyo.configuraciones[0]])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Si_actualizar_apoyo_modal.generahtml()',
	'Si_actualizar_apoyo_modal.imprimehtml()',
	'No_actualizar_apoyo_modal.generahtml()',
	'No_actualizar_apoyo_modal.imprimehtml()',
	'Modal_apoyos_opcion.abrefijo()'
	];
	var Metodos_modal_actualizar_apoyo_confirma = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_actualizar_apoyo_modal
// ID...........: ID_SI_ACTUALIZAR_APOYO_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de actualizar apoyo
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_ACTUALIZAR_APOYO_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_grabar_apoyo_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra(), Metodos_actualizar_apoyo_bd.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_actualizar_apoyo_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Elemento
// INSTANCIA....: No_actualizar_apoyo_modal
// ID...........: ID_NO_ACTUALIZAR_APOYO_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en confirmación de actualizar apoyo 
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
	var etiquetas = ["boton_link_icono_chico", "ID_NO_ACTUALIZAR_APOYO_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "no_grabar_apoyo_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_actualizar_apoyo_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_actualizar_apoyo_bd
// DESCRIPCION..: Metodos que se ejecutan para preparar consulta de actualizacion de apoyo
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.abrefijo()',
	'Consulta_actualizar_apoyo.actualizafiltro(0, Registro_id_apoyo.configuraciones[0])',
	'Consulta_actualizar_apoyo.actualizafiltro(1, Combolist_cedulas.valores[1][0])',
	'Consulta_actualizar_apoyo.actualizafiltro(2, Combolist_familiares.valores[1][0])',
	'Datos_captura_apoyo.consulta_natural(3, Consulta_actualizar_apoyo)',
	'Consulta_actualizar_apoyo.posicion_callback(0)',
	'Consulta_actualizar_apoyo.ejecuta()'

	];
	
	var Metodos_actualizar_apoyo_bd = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_actualizar_apoyo
// DESCRIPCION..: Consulta que se ejecuta para actualizar apoyo

	var statusConsulta = 0;
	var scriptPhp = 'consulta_actualizar_apoyo.php';
	var metodoPhp = 'POST';
	var filtro = [''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_actualizar_apoyo.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_actualizar_apoyo = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_actualizar_apoyo
// DESCRIPCION..: Metodos que se ejecutan despues de actualizar apoyo

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

		'Modal_apoyos.abrefijo()',
		'Consulta_baja_apoyo.limpia_codigos()',
		'Consulta_baja_apoyo.inicializa_parametros()',
		'Consulta_baja_apoyo.actualizafiltro(0, Registro_id_apoyo.configuraciones[0])',
		'Consulta_baja_apoyo.posicion_callback(3)',
		'Consulta_baja_apoyo.ejecuta()'

	];
	var Metodos_after_actualizar_apoyo = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_actualizar_baja_apoyo
	// DESCRIPCION..: Metodos que se ejecutan despues de ejecutar consulta de actualizar apoyo
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
		'Modal_apoyos.cierra()',

		'Modal_apoyos.abrefijo()',
		'Consulta_gradilla_apoyos.limpia_codigos()',
		'Consulta_gradilla_apoyos.inicializa_parametros()',
//		'Consulta_gradilla_apoyos.actualizafiltro(0, usuarioStatus)',
//		'Consulta_gradilla_apoyos.actualizafiltro(1, usuarioID)',
		'Consulta_gradilla_apoyos.posicion_callback(0)',
		'Consulta_gradilla_apoyos.ejecuta_2()',

		'Registro_status_apoyo.recibe_status(1)',
		'Registro_status_detalle.recibe_status(0)',
		'Registro_id_detalle.recibe_status(0)',
		
		'Json_datos_captura_apoyo.recibe_json(Consulta_baja_apoyo.codigos[0])',
		'Json_datos_captura_apoyo.genera()',
		'Datos_captura_apoyo.imprime_natural(Json_datos_captura_apoyo.codigos[0])',

		'Modal_apoyos.abrefijo()',
		'Consulta_gradilla_detalles.limpia_codigos()',
		'Consulta_gradilla_detalles.inicializa_parametros()',
		'Consulta_gradilla_detalles.actualizafiltro(0, Registro_id_apoyo.configuraciones[0])',
		'Consulta_gradilla_detalles.posicion_callback(0)',
		'Consulta_gradilla_detalles.ejecuta_2()',

		'Datos_captura_detalle.imprime_natural(Json_detalle_vacio)',
		'Datos_captura_material.imprime_natural(Json_material_vacio)',

		'Clases_apoyo.afectar()',
		
		'Maqueta_apoyos_modal_opcion.contenido([0, "APOYO ACTUALIZADO"])',
		'Maqueta_apoyos_modal_opcion.contenido([1, "EL APOYO: "+Consulta_baja_apoyo.codigos[0][0][1].dato_05+" CON EL ID: "+Registro_id_apoyo.configuraciones[0]+" FUE ACTUALIZADO EXITOSAMENTE"])',
		'Maqueta_apoyos_modal_opcion.generahtml()',
		'Maqueta_apoyos_modal_opcion.imprimehtml()',
		'Ok_modal.generahtml()',
		'Ok_modal.imprimehtml()',
		'Navega_general.recibe_destino(Navega_apoyos.configuraciones[0])',
		'Modal_apoyos_opcion.abrefijo()'

		];
	
		var Metodos_actualizar_baja_apoyo = new Metodos(configuraciones, codigos, elementos);
	
	




// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE REESTABLECER APOYO

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_confirma_reestablece_apoyos
// DESCRIPCION..: Metodos que se ejecutan al elegir reestablecer valores de captura de apoyo 
//                existente

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Maqueta_apoyos_modal_opcion.contenido([0, "CONFIRMA REESTABLECER VALORES DE APOYO"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE REESTABLECER LOS VALORES GRABADOS DEL APOYO: "+Consulta_baja_apoyo.codigos[0][0][1].dato_05+" "+Registro_id_apoyo.configuraciones[0]+". LOS CAMBIOS EN LOS VALORES DE LA CAPTURA QUE NO ESTEN GRABADOS SE PERDERAN."])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Si_reestablece_apoyos_modal.generahtml()',
	'Si_reestablece_apoyos_modal.imprimehtml()',
	'No_reestablece_apoyos_modal.generahtml()',
	'No_reestablece_apoyos_modal.imprimehtml()',
	'Modal_apoyos_opcion.abrefijo()'];
	var Metodos_confirma_reestablece_apoyos = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_reestablece_apoyos_modal
// ID...........: ID_SI_REESTABLECE_APOYO_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de reestablecer
//                valores originales de registro de apoyo en modificación
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_REESTABLECE_APOYO_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_reestablece_apoyo_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra(), Metodos_reestablece_apoyos_valores.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_reestablece_apoyos_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Elemento
// INSTANCIA....: No_reestablece_apoyos_modal
// ID...........: ID_NO_REESTABLECE_APOYO_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en confirmación de reestablecer 
//                valores originales de apoyo en modificación
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
	var etiquetas = ["boton_link_icono_chico", "ID_NO_REESTABLECE_APOYO_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "no_reestablece_apoyos_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_reestablece_apoyos_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_reestablece_apoyos_valores
	// DESCRIPCION..: Metodos que se ejecutan para reestablecer valores de programa
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
		'Modal_apoyos.abrefijo()',
		'Consulta_baja_apoyo.actualizafiltro(0, Registro_id_apoyo.configuraciones[0])',
		'Consulta_baja_apoyo.posicion_callback(0)',
		'Consulta_baja_apoyo.ejecuta()'
	
		]
		var Metodos_reestablece_apoyos_valores = new Metodos(configuraciones, codigos, elementos);






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE PANEL DE APOYOS

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

	




// CLASE........: Panel
// INSTANCIA....: Panel_apoyos_formulario
// ID...........: ID_FORMULARIO_APOYO
// SE INSERTA EN: #IDXX_3_3	
// DESCRIPCION..: Panel para organizar las sub areas generales del formulario de apoyos
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido
	
	var tipoImpresion = 0;
	var nivel = [];
	var configuraciones = [tipoImpresion, nivel];
	var etiquetas = ['areas_registro_formulario_x area_paneles_x', 'IDXXX', '#IDXX_3_3'];
	var elemento01_01_01 = 'ASIGNACIÓN DE APOYO';
	var elemento01_01_02_01 = 'CÉDULA:';
	var elemento01_01_02_02 = '';
	var elemento01_01_02 = [elemento01_01_02_01, elemento01_01_02_02];
	var elemento01_01_03_01 = 'RESPONSABLE:';
	var elemento01_01_03_02 = '';
	var elemento01_01_03 = [elemento01_01_03_01, elemento01_01_03_02];
	var elemento01_01_04_01 = 'FECHA ENTREGA:';
	var elemento01_01_04_02 = '';
	var elemento01_01_04 = [elemento01_01_04_01, elemento01_01_04_02];
	var elemento01_01 = [elemento01_01_01, elemento01_01_02, elemento01_01_03, elemento01_01_04];
	var elemento01_02_01 = 'DESCRIPCIÓN DE APOYO';
	var elemento01_02_02 = '';
	var elemento01_02 = [elemento01_02_01, elemento01_02_02];
	var elemento01 = [elemento01_01, elemento01_02];
	var elemento02_01 = 'ELIGE UN DETALLE DE APOYO O CREA UN REGISTRO NUEVO';
	var elemento02_02 = 'AREA GRID DETALLES DE APOYO';
	var elemento02_03 = 'AREA DE CAPTURA DETALLES DE APOYO';
	var elemento02_04_01_01 = 'STATUS DETALLE DE APOYO';
	var elemento02_04_01_02 = 'NUM DETALLE DE APOYO';
	var elemento02_04_01 = [elemento02_04_01_01, elemento02_04_01_02];
	var elemento02_04_02_01 = 'ELIMINAR';
	var elemento02_04_02_02 = 'ACTUALIZAR';
	var elemento02_04_02_03 = 'GRABAR';
	var elemento02_04_02_04 = 'REESTABLECER';
	var elemento02_04_02_05 = 'LIMPIAR';
	var elemento02_04_02_06 = 'CAPTURAR';
	var elemento02_04_02 = [elemento02_04_02_01, elemento02_04_02_02, elemento02_04_02_03, elemento02_04_02_04, elemento02_04_02_05, elemento02_04_02_06];
	var elemento02_04 = [elemento02_04_01, elemento02_04_02];
	var elemento02_05 = 'FORMULARIO DETALLES';
	var elemento02 = [elemento02_01, elemento02_02, elemento02_03, elemento02_04, elemento02_05];
	var elementos = [elemento01, elemento02];
	var codigos = [''];
    var Panel_apoyos_formulario = new Panel(configuraciones, etiquetas, codigos, elementos);
    Panel_apoyos_formulario.generahtml_r();
    Panel_apoyos_formulario.imprimehtml();






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE AREA GRADILLA DETALLES DE APOYO

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
	// INSTANCIA....: Consulta_gradilla_detalles
	// DESCRIPCION..: Consulta que se ejecuta para actualizar gradilla de detalles desde la BD
	
		var statusConsulta = 0;
		var scriptPhp = 'consulta_gradilla_detalles.php';
		var metodoPhp = 'POST';
		var filtro = [''];
		var posicionCallback = 0;
		var metodosCallback01 = ['Metodos_gradilla_detalles.ejecuta()'];
		var metodosCallback02 = ['Metodos_gradilla_detalles_inicia.ejecuta()'];
		var metodosCallback = [metodosCallback01, metodosCallback02]; 
		var callback = [posicionCallback, metodosCallback];
		var lotes = [0, 5000, 0, 0];
		var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
		var codigos = ['', ''];
		var elementos = [''];	
		var Consulta_gradilla_detalles = new Consulta(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_gradilla_detalles
	// DESCRIPCION..: Metodos que se ejecutan despues de actualizar y filtrar gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
		'Modal_apoyos.cierra()',
		'Gradilla_detalles.recibe_consulta(Consulta_gradilla_detalles)',
		'Gradilla_detalles.generahtml()',
		'Gradilla_detalles.imprimehtml()'
		
		];
		var Metodos_gradilla_detalles = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_gradilla_detalles_inicia
	// DESCRIPCION..: Metodos que se ejecutan despues de actualizar y filtrar gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
//		'alert("ESTOY EN METODOS CALLBACK DE CONSULTA DETALLES VOY A CONSULTA COMBO MATERIALES ESTOY VIVO")',
		'Consulta_combolist_materiales.inicializa_parametros()',
		'Consulta_combolist_materiales.limpia_codigos()',
		'Consulta_combolist_materiales.posicion_callback(1)',
		'Consulta_combolist_materiales.ejecuta_2()'

		];
		var Metodos_gradilla_detalles_inicia = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Gradilla
	// INSTANCIA....: Gradilla_detalles
	// ID...........: ID_GRADILLA_DETALLES
	// SE INSERTA EN: #IDXXX_2_1	
	// DESCRIPCION..: Gradilla de detalles de apoyo
	// HTML.........: Espera metodo
	// IMPRESION....: Espera metodo, sustituye contenido
	
		var inglesElementos = ['NUM', 'CANT', 'MEDIDA', 'DESCRIPCIÓN'];
		var inglesIdioma = [inglesElementos, 'PROGRAMS LIST'];
		var espanolElementos = ['NUM', 'CANT', 'MEDIDA', 'DESCRIPCIÓN'];
		var espanolIdioma = [espanolElementos, 'LISTA DE DETALLES DE APOYO'];
		var arregloIdioma = [inglesIdioma, espanolIdioma];
		var controlIdioma = [idioma, arregloIdioma];
		var numeroElementos = 4;
		var tipoImpresion = 0;
		var consulta = Consulta_gradilla_detalles;
		var parametros = [0, 5];
		var titulo = [''];
		var orientacionBreaks = [0, 720];
		var orientacionFormato = [0, 10];
		var orientacion = [0, orientacionBreaks, orientacionFormato];
		var areacontroles = [1];
		var iconoscontroles = ['fa-solid fa-backward', 'fa-solid fa-backward-step', 'fa-solid fa-forward-step', 'fa-solid fa-forward'];
		var metodoscontroles = [' ONCLICK="Metodos_inicio_posicion_detalles.ejecuta()"', ' ONCLICK="Metodos_retrocedegrid_detalles.ejecuta()"', ' ONCLICK="Metodos_avanzagrid_detalles.ejecuta()"', ' ONCLICK="Metodos_final_posicion_detalles.ejecuta()"'];
		var controles = [areacontroles, iconoscontroles, metodoscontroles];
		var valorIncialClave = 0;
		var valorClave = 0;
		var valorInicialPosicion = 0;
		var valorPosicion = 0;
		var valorInicialCelda = 0;
		var valorCelda = 0;
		var metodoValor = 'Metodos_modal_bajando_detalle.ejecuta(), Gradilla_detalles.actualiza_valores';
		var tipoValorArreglo = [0];
		var datoValorArreglo = [0];
		var valorArreglo = [tipoValorArreglo, datoValorArreglo];
		var valores = [valorIncialClave, valorClave, valorInicialPosicion, valorPosicion, valorInicialCelda, valorCelda, metodoValor, valorArreglo];
		var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, consulta, parametros, titulo, orientacion, controles, valores];
		var etiquetas = ['gradilla', 'ID_GRADILLA_DETALLES', '#IDXXX_2_2'];
		var elementos_tipo_valor = [0, 0, 0, 0];
		var elementos_llave_valor = ['dato_01', 'dato_02', 'dato_03', 'dato_04'];
		var elementos_ancho_valor = ['diez', 'quince', 'veinticinco', 'cincuenta'];
		var elementos_metodos = ['Metodos_elige_grid_detalles.ejecuta()', 'Metodos_elige_grid_detalles.ejecuta()', 'Metodos_elige_grid_detalles.ejecuta()', 'Metodos_elige_grid_detalles.ejecuta()'];
		var elementos_iconos = ['', '', '', ''];
		var elementos = [elementos_tipo_valor, elementos_llave_valor, elementos_ancho_valor, elementos_metodos, elementos_iconos];
		var codigos = [''];
		var Gradilla_detalles = new Gradilla(configuraciones, etiquetas, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_avanzagrid_detalles
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige avanzar una pagina en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = ['Gradilla_detalles.avanza()',
		'Gradilla_detalles.generahtml()',
		'Gradilla_detalles.imprimehtml()'];
		var Metodos_avanzagrid_detalles = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_inicio_posicion_detalles
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir a primera pagina en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = ['Gradilla_detalles.inicializa_posicion()',
		'Gradilla_detalles.generahtml()',
		'Gradilla_detalles.imprimehtml()'];
		var Metodos_inicio_posicion_detalles = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_inicio_posicion_detalles
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir a primera pagina en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = ['Gradilla_detalles.retrocede()',
		'Gradilla_detalles.generahtml()',
		'Gradilla_detalles.imprimehtml()'];
		var Metodos_retrocedegrid_detalles = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_final_posicion_detalles
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir a última pagina en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = ['Gradilla_detalles.finaliza_posicion()',
		'Gradilla_detalles.generahtml()',
		'Gradilla_detalles.imprimehtml()'];
		var Metodos_final_posicion_detalles = new Metodos(configuraciones, codigos, elementos);


	



// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE ELIGE GRID DETALLES

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_modal_bajando_detalle
// DESCRIPCION..: Modal para avisar que se esta bajando detalle
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	
	'Maqueta_apoyos_modal_opcion.contenido([0, "BAJANDO DETALLE"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "BAJANDO DATOS DEL DETALLE ELEGIDO PARA SER CONSULTADO, MODIFICADO O ELIMINADO. COLOQUESE EN EL AREA DE CAPTURA DE DETALLES DE APOYO PARA TRABAJAR."])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Navega_general.recibe_destino(Navega_detalles.configuraciones[0])',
	'Modal_apoyos_opcion.abrefijo()'


	];
	var Metodos_modal_bajando_detalle = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_elige_grid_detalles
	// DESCRIPCION..: Metodos que se ejecutan al elegir un registro en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
//		'Modal_apoyos.abrefijo()',
		'Consulta_baja_detalle.actualizafiltro(0, Gradilla_detalles.configuraciones[8][1])',
		'Registro_id_detalle.recibe_status(Gradilla_detalles.configuraciones[8][1])',
		'Consulta_baja_detalle.posicion_callback(0)',
		'Consulta_baja_detalle.ejecuta()'
	
		]
		var Metodos_elige_grid_detalles = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Consulta
	// INSTANCIA....: Consulta_baja_detalle
	// DESCRIPCION..: Consulta que se ejecuta para traer desde la BD un registro elegido en gradilla
	
		var statusConsulta = 0;
		var scriptPhp = 'consulta_baja_detalle.php';
		var metodoPhp = 'POST';
		var filtro = [''];
		var posicionCallback = 0;
		var metodosCallback01 = ['Metodos_baja_detalle.ejecuta()'];
		var metodosCallback02 = ['Metodos_graba_baja_detalle.ejecuta()'];
		var metodosCallback03 = ['Metodos_graba_baja_detalle.ejecuta()'];
		var metodosCallback04 = ['Metodos_actualizar_baja_detalle.ejecuta()'];
		var metodosCallback = [metodosCallback01, metodosCallback02, metodosCallback03, metodosCallback04]; 
		var callback = [posicionCallback, metodosCallback];
		var lotes = [0, 5000, 0, 0];
		var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
		var codigos = ['', ''];
		var elementos = [''];	
		var Consulta_baja_detalle = new Consulta(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_baja_detalle
	// DESCRIPCION..: Metodos que se ejecutan despues de ejecutar consulta de programa
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
		'Modal_apoyos.cierra()',
		'Registro_status_detalle.recibe_status(1)',
		'Json_datos_captura_detalle.recibe_json(Consulta_baja_detalle.codigos[0])',
		'Json_datos_captura_detalle.genera()',
		'Datos_captura_detalle.imprime_natural(Json_datos_captura_detalle.codigos[0])',
		
		'Consulta_combolist_materiales.limpia_codigos()',
    	'Consulta_combolist_materiales.inicializa_parametros()',
    	'Consulta_combolist_materiales.posicion_callback(0)',
		'Consulta_combolist_materiales.ejecuta_2()'
	
		];
		var Metodos_baja_detalle = new Metodos(configuraciones, codigos, elementos);






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE COMBOLIST MATERIALES DE DETALLE

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Consulta_combolist_materiales
// DESCRIPCION..: Consulta que se ejecuta para actualizar Combolist de materiales

	var statusConsulta = 0;
	var scriptPhp = 'consulta_combolist_materiales.php';
	var metodoPhp = 'POST';
	var filtro = [''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_consulta_combolist_materiales.ejecuta()'];
	var metodosCallback02 = ['Metodos_after_consulta_combolist_materiales_inicia.ejecuta()'];
	var metodosCallback03 = ['Metodos_after_consulta_combolist_materiales_solo.ejecuta()'];
	var metodosCallback = [metodosCallback01, metodosCallback02, metodosCallback03]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_combolist_materiales = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_consulta_combolist_materiales
// DESCRIPCION..: Metodos que se ejecutan despues de la consulta del combolist materiales

    var configuraciones = 0;
	var codigos = [''];
	var elementos = [

		'Combolist_materiales.inicializa_valor()',
		'Combolist_materiales.recibe_texto(Consulta_baja_detalle.codigos[0][0][1].dato_02)',
		'Combolist_materiales.generahtml()',
        'Combolist_materiales.imprimehtml()',
		'Clases_detalle.afectar()'
    
    ];
	var Metodos_after_consulta_combolist_materiales = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_consulta_combolist_materiales_inicia
// DESCRIPCION..: Metodos que se ejecutan despues de la consulta del combolist materiales

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

//		'alert("ESTOY EN METODOS CALLBACK DE CONSULTA MATERIALES VOY A CONSULTA GRID MATERIALES ESTOY VIVO")',
		'Consulta_gradilla_materiales.inicializa_parametros()',
		'Consulta_gradilla_materiales.limpia_codigos()',
		'Consulta_gradilla_materiales.posicion_callback(1)',
		'Consulta_gradilla_materiales.ejecuta_2()'

    ];
	var Metodos_after_consulta_combolist_materiales_inicia = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_consulta_combolist_materiales_solo
// DESCRIPCION..: Metodos que se ejecutan despues de la consulta del combolist materiales

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Combolist_materiales.recibe_datos(Consulta_combolist_materiales)',
	'Combolist_materiales.generahtml()',
	'Combolist_materiales.imprimehtml()'

    ];
	var Metodos_after_consulta_combolist_materiales_solo = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Combolist
// INSTANCIA....: Combolist_materiales
// ID...........: ID_MATERIALES_COMBOLIST
// SE INSERTA EN: #IDXXXX_1_1_3_2	
// DESCRIPCION..: Combolist que recibe datos de la materiales para elegir
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es llamado, sustituye contenido

	var inglesIdioma = ['COUNTY: ', 'WRITE OR CHOOSE...'];
	var espanolIdioma = ['RESPONSABLE: ', 'ESCRIBE O SELECCIONA...'];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
// impresion = 0 SUSTITUYE CONTENIDO = 1 AGREGA CONTENIDO
    var impresion = 0;
// etiqueta = 0 SIN ETIQUETA = 1 CON ETIQUETA
    var etiqueta = 0;
// fuente = 0 JSON = 1 INSTANCIA DE CONSULTA
    var fuente = 1;
// ORIGEN DE DATOS SEGÚN LA FUENTE
    var datos = Consulta_combolist_materiales;

    var valorFormatoArreglo = [[[0], [0]]];
	var datoFormatoArreglo = [[0, 1, 0, 1, 0], [0, ' ', 1, ' ', 2]];
	var codificado = 0;
	var resultado = [];
	var consulta = [datos, valorFormatoArreglo, datoFormatoArreglo, codificado, resultado];
// ARREGLO DE DOS POSICIONES DE REGISTROS ESPECIALES
    var especial01 = [['TODOS_CLAVE_MUNI_1', 'TODOS LOS REGISTROS MUNI', 'TODOS_CLAVE_LOCA_1', 'TODOS LOS REGISTROS LOCA'], 'TODOS LOS REGISTROS LOCA'];
// ARREGLO DE ARREGLOS CON TODAS LOS REGISTROS ESPECIALES	
    var especiales = [];
    var configuraciones = [controlIdioma, impresion, etiqueta, fuente, consulta, especiales];
    var etiquetas = ['combolist', 'ID_MATERIALES_COMBOLIST', '#IDXXXX_1_1_3_2', 'combolist_materiales'];
    var codigos = [''];
    var valores = [['VALOR VACIO'], ['VALOR VACIO'], ['', ''], ['VALOR VACIO'], [0, 0]];
    var metodos = ['ONCHANGE = "Combolist_materiales.elige_valor()"'];
	var Combolist_materiales = new Combolist(configuraciones, etiquetas, valores, metodos, codigos);






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE CONTROLES GENERALES DE LA CAPTURA DETALLES

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Eliminar_detalle
// ID...........: ID_BOTON_ELIMINAR_DETALLE
// SE INSERTA EN: #IDXXX_2_4_2_1	
// DESCRIPCION..: Link con metodos e icono para eliminar registro de detalle ya existente
// HTML.........: Cuando es creado de manera disabled
// IMPRESION....: Cuando es creado sustituye contenidos y se inserta en contenedor oculto
//                la primera vez

	var titulosIngles = ['ELIMINAR DETALLE'];
	var iconosIngles = ['fa-solid fa-trash-can'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['ELIMINAR DETALLE'];
	var iconosEspanol = ['fa-solid fa-trash-can'];
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
	var etiquetas = ["boton_eliminar boton_link_icono_chico", "ID_BOTON_ELIMINAR_DETALLE", "#IDXXX_2_4_2_1", "elimina_detalle"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_modal_elimina_detalle_confirma.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Eliminar_detalle = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Eliminar_detalle.generahtml();
	Eliminar_detalle.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Actualizar_detalle
// ID...........: ID_BOTON_ACTUALIZAR_DETALLE
// SE INSERTA EN: #IDXXX_2_4_2_2	
// DESCRIPCION..: Link con metodos e icono para actualizar registro de detalle ya existente
// HTML.........: Cuando es creado de manera disabled
// IMPRESION....: Cuando es creado sustituye contenidos y se inserta en contenedor oculto
//                la primera vez

	var titulosIngles = ['ACTUALIZAR DETALLE'];
	var iconosIngles = ['fa-solid fa-floppy-disk'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['ACTUALIZAR DETALLE'];
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
	var etiquetas = ["boton_actualizar boton_link_icono_chico", "ID_BOTON_ACTUALIZAR_DETALLE", "#IDXXX_2_4_2_2", "actualiza_detalle"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_elige_actualizar_detalle.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Actualizar_detalle = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Actualizar_detalle.generahtml();
	Actualizar_detalle.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Grabar_detalle
// ID...........: ID_BOTON_GRABAR_DETALLE
// SE INSERTA EN: #IDXXX_2_4_2_3	
// DESCRIPCION..: Link con metodos e icono para grabar registro de detalle nuevo
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado sustituye contenidos

	var titulosIngles = ['GRABAR DETALLE'];
	var iconosIngles = ['fa-solid fa-floppy-disk'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['GRABAR DETALLE'];
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
	var etiquetas = ["boton_grabar boton_link_icono_chico", "ID_BOTON_GRABAR_DETALLE", "#IDXXX_2_4_2_3", "graba_detalle"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_graba_detalle.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Grabar_detalle = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Grabar_detalle.generahtml();
	Grabar_detalle.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Reestablece_captura_detalle
// ID...........: ID_BOTON_REESTABLECE_DETALLE
// SE INSERTA EN: #IDXXX_2_4_2_4	
// DESCRIPCION..: Link con metodos e icono para reestablecer valores de la captura
//                cuando se esta modificando un registro de detalle
// HTML.........: Cuando es creado de manera disabled
// IMPRESION....: Cuando es creado espera metodo para quitar disabled

	var titulosIngles = ['REESTABLECER VALORES DE CAPTURA'];
	var iconosIngles = ['fa-solid fa-arrow-rotate-right'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['REESTABLECER VALORES DE CAPTURA'];
	var iconosEspanol = ['fa-solid fa-arrow-rotate-right'];
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
	var etiquetas = ["boton_reestablece boton_link_icono_chico", "ID_BOTON_REESTABLECE_DETALLE", "#IDXXX_2_4_2_4", "reestablece_captura_detalle"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_confirma_reestablece_detalles.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Reestablece_captura_detalle = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Reestablece_captura_detalle.generahtml();
	Reestablece_captura_detalle.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Limpia_captura_detalle
// ID...........: ID_BOTON_LIMPIA_DETALLE
// SE INSERTA EN: #IDXXX_2_4_2_5	
// DESCRIPCION..: Link con metodos e icono para limpiar la captura capturando nuevo detalle
// HTML.........: Cuando es creado de manera disabled
// IMPRESION....: Cuando es creado espera metodo para quitar disabled

	var titulosIngles = ['LIMPIAR CAPTURA'];
	var iconosIngles = ['fa-regular fa-clipboard'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['LIMPIAR CAPTURA'];
	var iconosEspanol = ['fa-regular fa-clipboard'];
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
	var etiquetas = ["boton_limpia boton_link_icono_chico", "ID_BOTON_LIMPIA_DETALLE", "#IDXXX_2_4_2_5", "limpia_captura_detalle"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_nuevo_detalle.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Limpia_captura_detalle = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Limpia_captura_detalle.generahtml();
	Limpia_captura_detalle.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Nueva_captura_detalle
// ID...........: ID_BOTON_NUEVA_DETALLE
// SE INSERTA EN: #IDXXX_2_4_2_6	
// DESCRIPCION..: Link con metodos e icono para abrir la captura a un nuevo registro de detalle
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido

	var titulosIngles = ['CAPTURAR NUEVO DETALLE'];
	var iconosIngles = ['fa-solid fa-plus'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['CAPTURAR NUEVO DETALLE'];
	var iconosEspanol = ['fa-solid fa-plus'];
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
	var etiquetas = ["boton_nueva boton_link_icono_chico", "ID_BOTON_NUEVA_DETALLE", "#IDXXX_2_4_2_6", "nueva_captura_detalle"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_nuevo_detalle.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Nueva_captura_detalle = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Nueva_captura_detalle.generahtml();
	Nueva_captura_detalle.imprimehtml();







// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE GRABAR DETALLE

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_graba_detalle
// DESCRIPCION..: Metodos que se ejecutan al elegir grabar registro de detalle

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	
	'Evaluacion_grabar_detalle.recibe_validacion([0, document.getElementById("ID_DATO_DETALLES_3_2_INPUT_NUM").value])',
	'Evaluacion_grabar_detalle.recibe_validacion([1, Combolist_materiales.valores[1][0]])',
	'Evaluacion_grabar_detalle.ejecuta()'

	];
	var Metodos_graba_detalle = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_grabar_detalle
// DESCRIPCION..: Evalua que cedula y material de detalle no este vacio 

	var numeroElementos = 2;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_modal_graba_detalle_confirma.ejecuta()', 'Metodos_modal_detalle_vacio.ejecuta()'];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = ['', ''];
	var tiposElementos = [0, 0];
	var validacionElementos = [1, 1];
	var especialesElementos = [['0', '0.0', '0.00', '0.000', '0.0000'], ['VALOR VACIO']];
	var retornoElementos = [[0, 0, 0, 0, 0], [0]];
	var mensajesElementos = [['CANTIDAD VACIA', 'x', 'x', 'x', 'x'], ['MATERIAL VACIO']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_grabar_detalle = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_detalle_vacio
// DESCRIPCION..: Modal para avisar que se intento grabar un detalle sin cedula o sin
//                responsable
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_apoyos_modal_opcion.contenido([0, "DATOS INCORRECTOS"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "NO PUEDO GRABAR DETALLE SIN CANTIDAD O SIN MATERIAL"])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Navega_general.recibe_destino(Navega_detalles.configuraciones[0])',
	'Modal_apoyos_opcion.abrefijo()'

	];
	var Metodos_modal_detalle_vacio = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_graba_detalle_confirma
// DESCRIPCION..: Modal para confirmar grabar detalle

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_apoyos_modal_opcion.contenido([0, "CONFIRMA GRABAR DETALLE"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE GRABAR EL DETALLE: "+document.getElementById("ID_DATO_DETALLES_3_2_INPUT_NUM").value+" "+Combolist_materiales.valores[2][1]+" DEL APOYO: "+Registro_id_apoyo.configuraciones[0]+" CON EL RESPONSABLE: "+Combolist_familiares.valores[2][1]])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Si_grabar_detalle_modal.generahtml()',
	'Si_grabar_detalle_modal.imprimehtml()',
	'No_grabar_detalle_modal.generahtml()',
	'No_grabar_detalle_modal.imprimehtml()',
	'Modal_apoyos_opcion.abrefijo()'
	];
	var Metodos_modal_graba_detalle_confirma = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_grabar_detalle_modal
// ID...........: ID_SI_GRABAR_DETALLE_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de grabar detalle
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_GRABAR_DETALLE_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_grabar_detalle_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra(), Metodos_graba_detalle_bd.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_grabar_detalle_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Elemento
// INSTANCIA....: No_grabar_detalle_modal
// ID...........: ID_NO_GRABAR_DETALLE_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en confirmación de grabar detalle 
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
	var etiquetas = ["boton_link_icono_chico", "ID_NO_GRABAR_DETALLE_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "no_grabar_detalle_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_grabar_detalle_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);
	
// CLASE........: Metodos
// INSTANCIA....: Metodos_graba_detalle_bd
// DESCRIPCION..: Metodos que se ejecutan para preparar consulta de grabación de detalle
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.abrefijo()',
	'Consulta_grabar_detalle.actualizafiltro(0, Registro_id_apoyo.configuraciones[0])',
	'Consulta_grabar_detalle.actualizafiltro(1, document.getElementById("ID_DATO_DETALLES_3_2_INPUT_NUM").value)',
	'Consulta_grabar_detalle.actualizafiltro(2, Combolist_materiales.valores[1][0])',
	'Consulta_grabar_detalle.posicion_callback(0)',
	'Consulta_grabar_detalle.ejecuta()'

	];
	
	var Metodos_graba_detalle_bd = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_grabar_detalle
// DESCRIPCION..: Consulta que se ejecuta para grabar detalle

	var statusConsulta = 0;
	var scriptPhp = 'consulta_graba_detalle.php';
	var metodoPhp = 'POST';
	var filtro = ['', '', '', ''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_graba_detalle.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_grabar_detalle = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_graba_detalle
// DESCRIPCION..: Metodos que se ejecutan despues de grabar nuevo detalle

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

		'Modal_apoyos.abrefijo()',
		'Registro_id_detalle.recibe_status(Consulta_grabar_detalle.codigos[0][0][0].recupera)',
		'Consulta_baja_detalle.limpia_codigos()',
		'Consulta_baja_detalle.inicializa_parametros()',
		'Consulta_baja_detalle.actualizafiltro(0, Consulta_grabar_detalle.codigos[0][0][0].recupera)',
		'Consulta_baja_detalle.posicion_callback(1)',
		'Consulta_baja_detalle.ejecuta()'

	];
	var Metodos_after_graba_detalle = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_graba_baja_detalle
	// DESCRIPCION..: Metodos que se ejecutan despues de ejecutar consulta de grabar detalle
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
		'Modal_apoyos.cierra()',

		'Modal_apoyos.abrefijo()',
		'Consulta_gradilla_apoyos.limpia_codigos()',
		'Consulta_gradilla_apoyos.inicializa_parametros()',
		'Consulta_gradilla_apoyos.posicion_callback(0)',
		'Consulta_gradilla_apoyos.ejecuta_2()',
		
		'Registro_status_detalle.recibe_status(1)',
	
		'Json_datos_captura_detalle.recibe_json(Consulta_baja_detalle.codigos[0])',
		'Json_datos_captura_detalle.genera()',
		'Datos_captura_detalle.imprime_natural(Json_datos_captura_detalle.codigos[0])',

		'Modal_apoyos.abrefijo()',
		'Consulta_gradilla_detalles.limpia_codigos()',
		'Consulta_gradilla_detalles.inicializa_parametros()',
		'Consulta_gradilla_detalles.actualizafiltro(0, Registro_id_apoyo.configuraciones[0])',
		'Consulta_gradilla_detalles.posicion_callback(0)',
		'Consulta_gradilla_detalles.ejecuta_2()',

		'Datos_captura_detalle.imprime_natural(Json_detalle_vacio)',
		'Datos_captura_material.imprime_natural(Json_material_vacio)',

		'Clases_detalle.afectar()',
	
		'Maqueta_apoyos_modal_opcion.contenido([0, "DETALLE GRABADO"])',
		'Maqueta_apoyos_modal_opcion.contenido([1, "EL DETALLE FUE GRABADO EXITOSAMENTE CON EL ID: "+Registro_id_detalle.configuraciones[0]])',
		'Maqueta_apoyos_modal_opcion.generahtml()',
		'Maqueta_apoyos_modal_opcion.imprimehtml()',
		'Ok_modal.generahtml()',
		'Ok_modal.imprimehtml()',
		'Navega_general.recibe_destino(Navega_detalles.configuraciones[0])',
		'Modal_apoyos_opcion.abrefijo()'


		];
	
		var Metodos_graba_baja_detalle = new Metodos(configuraciones, codigos, elementos);





// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE ACTUALIZAR DETALLE

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_elige_actualizar_detalle
// DESCRIPCION..: Metodos que se ejecutan al elegir actualizar registro de detalle

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Evaluacion_actualizar_detalle.recibe_validacion([0, document.getElementById("ID_DATO_DETALLES_3_2_INPUT_NUM").value])',
	'Evaluacion_actualizar_detalle.recibe_validacion([1, Combolist_materiales.valores[1][0]])',
	'Evaluacion_actualizar_detalle.ejecuta()'];
	var Metodos_elige_actualizar_detalle = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_actualizar_detalle
// DESCRIPCION..: Evalua que cedula y responsable de detalle no esten vacios 

	var numeroElementos = 2;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_modal_actualizar_detalle_confirma.ejecuta()', 'Metodos_modal_actualizar_detalle_vacio.ejecuta()'];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = ['', ''];
	var tiposElementos = [0, 0];
	var validacionElementos = [1, 1];
	var especialesElementos = [['0', '0.0', '0.00', '0.000', '0.0000'], ['VALOR VACIO']];
	var retornoElementos = [[0, 0, 0, 0, 0], [0]];
	var mensajesElementos = [['CANTIDAD VACIA', 'x', 'x', 'x', 'x'], ['MATERIAL VACIO']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_actualizar_detalle = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_actualizar_detalle_vacio
// DESCRIPCION..: Modal para avisar que se intento actualizar un detalle vacio
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_apoyos_modal_opcion.contenido([0, "DATOS INCORRECTOS"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "NO PUEDO ACTUALIZAR DETALLE SIN CANTIDAD O SIN MATERIAL"])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Navega_general.recibe_destino(Navega_detalles.configuraciones[0])',
	'Modal_apoyos_opcion.abrefijo()'

	];
	var Metodos_modal_actualizar_detalle_vacio = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_actualizar_detalle_confirma
// DESCRIPCION..: Modal para confirmar actualizar detalle

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_apoyos_modal_opcion.contenido([0, "CONFIRMA ACTUALIZAR DETALLE"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE ACTUALIZAR EL DETALLE CON EL ID: "+Registro_id_detalle.configuraciones[0]+" DEL APOYO CON EL ID: "+Registro_id_apoyo.configuraciones[0]])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Si_actualizar_detalle_modal.generahtml()',
	'Si_actualizar_detalle_modal.imprimehtml()',
	'No_actualizar_detalle_modal.generahtml()',
	'No_actualizar_detalle_modal.imprimehtml()',
	'Modal_apoyos_opcion.abrefijo()'
	];
	var Metodos_modal_actualizar_detalle_confirma = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_actualizar_detalle_modal
// ID...........: ID_SI_ACTUALIZAR_DETALLE_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de actualizar detalle
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_ACTUALIZAR_DETALLE_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_grabar_detalle_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra(), Metodos_actualizar_detalle_bd.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_actualizar_detalle_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Elemento
// INSTANCIA....: No_actualizar_detalle_modal
// ID...........: ID_NO_ACTUALIZAR_DETALLE_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en confirmación de actualizar detalle 
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
	var etiquetas = ["boton_link_icono_chico", "ID_NO_ACTUALIZAR_DETALLE_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "no_grabar_detalle_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_actualizar_detalle_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_actualizar_detalle_bd
// DESCRIPCION..: Metodos que se ejecutan para preparar consulta de actualizacion de detalle
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.abrefijo()',
	'Consulta_actualizar_detalle.actualizafiltro(0, Registro_id_detalle.configuraciones[0])',
	'Consulta_actualizar_detalle.actualizafiltro(1, document.getElementById("ID_DATO_DETALLES_3_2_INPUT_NUM").value)',
	'Consulta_actualizar_detalle.actualizafiltro(2, Combolist_materiales.valores[1][0])',
	'Consulta_actualizar_detalle.posicion_callback(0)',
	'Consulta_actualizar_detalle.ejecuta()'

	];
	
	var Metodos_actualizar_detalle_bd = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_actualizar_detalle
// DESCRIPCION..: Consulta que se ejecuta para actualizar detalle

	var statusConsulta = 0;
	var scriptPhp = 'consulta_actualizar_detalle.php';
	var metodoPhp = 'POST';
	var filtro = [''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_actualizar_detalle.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_actualizar_detalle = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_actualizar_detalle
// DESCRIPCION..: Metodos que se ejecutan despues de actualizar apoyo

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Modal_apoyos.abrefijo()',
		'Consulta_baja_detalle.limpia_codigos()',
		'Consulta_baja_detalle.inicializa_parametros()',
		'Consulta_baja_detalle.actualizafiltro(0, Registro_id_detalle.configuraciones[0])',
		'Consulta_baja_detalle.posicion_callback(3)',
		'Consulta_baja_detalle.ejecuta()'

	];
	var Metodos_after_actualizar_detalle = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_actualizar_baja_detalle
	// DESCRIPCION..: Metodos que se ejecutan despues de ejecutar consulta de actualizar detalle
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
		'Modal_apoyos.cierra()',

		'Modal_apoyos.abrefijo()',
		'Consulta_gradilla_detalles.limpia_codigos()',
		'Consulta_gradilla_detalles.inicializa_parametros()',
		'Consulta_gradilla_detalles.posicion_callback(0)',
		'Consulta_gradilla_detalles.ejecuta_2()',
		
		'Maqueta_apoyos_modal_opcion.contenido([0, "DETALLE ACTUALIZADO"])',
		'Maqueta_apoyos_modal_opcion.contenido([1, "EL DETALLE CON EL ID: "+Registro_id_detalle.configuraciones[0]+" FUE ACTUALIZADO EXITOSAMENTE"])',
		'Maqueta_apoyos_modal_opcion.generahtml()',
		'Maqueta_apoyos_modal_opcion.imprimehtml()',
		'Ok_modal.generahtml()',
		'Ok_modal.imprimehtml()',
		'Navega_general.recibe_destino(Navega_detalles.configuraciones[0])',
		'Modal_apoyos_opcion.abrefijo()'

		];
	
		var Metodos_actualizar_baja_detalle = new Metodos(configuraciones, codigos, elementos);
	
	




// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE REESTABLECER DETALLE

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_confirma_reestablece_detalles
// DESCRIPCION..: Metodos que se ejecutan al elegir reestablecer valores de captura de detalle 
//                existente

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Maqueta_apoyos_modal_opcion.contenido([0, "CONFIRMA REESTABLECER VALORES DE DETALLE"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE REESTABLECER LOS VALORES GRABADOS DEL DETALLE: "+Registro_id_detalle.configuraciones[0]+". LOS CAMBIOS EN LOS VALORES DE LA CAPTURA QUE NO ESTEN GRABADOS SE PERDERAN."])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Si_reestablece_detalles_modal.generahtml()',
	'Si_reestablece_detalles_modal.imprimehtml()',
	'No_reestablece_detalles_modal.generahtml()',
	'No_reestablece_detalles_modal.imprimehtml()',
	'Modal_apoyos_opcion.abrefijo()'];
	var Metodos_confirma_reestablece_detalles = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_reestablece_detalles_modal
// ID...........: ID_SI_REESTABLECE_DETALLE_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de reestablecer
//                valores originales de registro de detalle en modificación
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_REESTABLECE_DETALLE_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_reestablece_detalle_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra(), Metodos_reestablece_detalles_valores.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_reestablece_detalles_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Elemento
// INSTANCIA....: No_reestablece_detalles_modal
// ID...........: ID_NO_REESTABLECE_DETALLE_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en confirmación de reestablecer 
//                valores originales de detalle en modificación
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
	var etiquetas = ["boton_link_icono_chico", "ID_NO_REESTABLECE_DETALLE_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "no_reestablece_detalles_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_reestablece_detalles_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_reestablece_detalles_valores
	// DESCRIPCION..: Metodos que se ejecutan para reestablecer valores de programa
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
		'Modal_apoyos.abrefijo()',
		'Consulta_baja_detalle.actualizafiltro(0, Registro_id_detalle.configuraciones[0])',
		'Consulta_baja_detalle.posicion_callback(0)',
		'Consulta_baja_detalle.ejecuta()'
	
		]
		var Metodos_reestablece_detalles_valores = new Metodos(configuraciones, codigos, elementos);






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE BORRAR DETALLE

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_modal_elimina_detalle_confirma
// DESCRIPCION..: Modal para confirmar eliminar detalle

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_apoyos_modal_opcion.contenido([0, "CONFIRMA ELIMINAR DETALLE"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE ELIMINAR EL DETALLE CON ID: "+Registro_id_detalle.configuraciones[0]+" DEL APOYO CON ID: "+Registro_id_apoyo.configuraciones[0]])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Si_eliminar_detalle_modal.generahtml()',
	'Si_eliminar_detalle_modal.imprimehtml()',
	'No_eliminar_detalle_modal.generahtml()',
	'No_eliminar_detalle_modal.imprimehtml()',
	'Modal_apoyos_opcion.abrefijo()'
	];
	var Metodos_modal_elimina_detalle_confirma = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_eliminar_detalle_modal
// ID...........: ID_SI_ELIMINAR_DETALLE_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de eliminar detalle
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_ELIMINAR_DETALLE_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_eliminar_detalle_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra(), Metodos_consulta_eliminar_detalle.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_eliminar_detalle_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Elemento
// INSTANCIA....: No_eliminar_detalle_modal
// ID...........: ID_NO_ELIMINAR_DETALLE_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en confirmación de eliminar detalle 
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
	var etiquetas = ["boton_link_icono_chico", "ID_NO_ELIMINAR_DETALLE_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "no_eliminar_detalle_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_eliminar_detalle_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);
	
// CLASE........: Metodos
// INSTANCIA....: Metodos_consulta_eliminar_detalle
// DESCRIPCION..: Metodos que se ejecutan para preparar consulta de eliminacion de detalle
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.abrefijo()',
	'Consulta_eliminar_detalle.actualizafiltro(0, Registro_id_detalle.configuraciones[0])',
	'Consulta_eliminar_detalle.actualizafiltro(1, Registro_id_apoyo.configuraciones[0])',
	'Consulta_eliminar_detalle.posicion_callback(0)',
	'Consulta_eliminar_detalle.ejecuta()'

	];
	
	var Metodos_consulta_eliminar_detalle = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_eliminar_detalle
// DESCRIPCION..: Consulta que se ejecuta para eliminar detalle

	var statusConsulta = 0;
	var scriptPhp = 'consulta_eliminar_detalle.php';
	var metodoPhp = 'POST';
	var filtro = [''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_elimina_detalle.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_eliminar_detalle = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_elimina_detalle
// DESCRIPCION..: Metodos que se ejecutan despues de eliminar detalle

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.cierra()',

	'Modal_apoyos.abrefijo()',

	'Consulta_gradilla_apoyos.limpia_codigos()',
	'Consulta_gradilla_apoyos.inicializa_parametros()',
	'Consulta_gradilla_apoyos.posicion_callback(0)',
	'Consulta_gradilla_apoyos.ejecuta_2()',

	'Consulta_gradilla_detalles.limpia_codigos()',
	'Consulta_gradilla_detalles.inicializa_parametros()',
	'Consulta_gradilla_detalles.posicion_callback(0)',
	'Consulta_gradilla_detalles.ejecuta_2()',

	'Maqueta_apoyos_modal_opcion.contenido([0, "DETALLE ELIMINADO"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "EL DETALLE CON EL ID: "+Registro_id_detalle.configuraciones[0]+" FUE BORRADO EXITOSAMENTE."])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Navega_general.recibe_destino(Navega_detalles.configuraciones[0])',
	'Modal_apoyos_opcion.abrefijo()',

	'Metodos_nuevo_detalle.ejecuta()'

	];
	var Metodos_after_elimina_detalle = new Metodos(configuraciones, codigos, elementos);
	
	




// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE CAPTURAR NUEVO DETALLE

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_nuevo_detalle
// DESCRIPCION..: Metodos que se ejecutan al elegir capturar nuevo detalle

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.cierra()',
	'Registro_status_detalle.recibe_status(2)',
	'Registro_id_detalle.recibe_status(0)',
	'Datos_captura_detalle.imprime_natural(Json_detalle_nuevo)',
	'Clases_detalle_nuevo.afectar()',
	'Combolist_materiales.inicializa_valor()',
	'Combolist_materiales.recibe_texto("")',
	'Combolist_materiales.generahtml()',
    'Combolist_materiales.imprimehtml()'

	];
	var Metodos_nuevo_detalle = new Metodos(configuraciones, codigos, elementos);








// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE PANEL DETALLES DE APOYO

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

	



// CLASE........: Panel
// INSTANCIA....: Panel_detalles_formulario
// ID...........: ID_FORMULARIO_DETALLE
// SE INSERTA EN: #IDXXX_2_5	
// DESCRIPCION..: Panel para organizar las sub areas generales del formulario de detalles
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido
	
	var tipoImpresion = 0;
	var nivel = [];
	var configuraciones = [tipoImpresion, nivel];
	var etiquetas = ['areas_registro_formulario_x area_paneles_x', 'IDXXXX', '#IDXXX_2_5'];
	var elemento01_01_01 = 'DATOS DETALLE DE APOYO';
	var elemento01_01_02_01 = 'CANTIDAD:';
	var elemento01_01_02_02 = '';
	var elemento01_01_02 = [elemento01_01_02_01, elemento01_01_02_02];
	var elemento01_01_03_01 = 'MATERIAL:';
	var elemento01_01_03_02 = '';
	var elemento01_01_03 = [elemento01_01_03_01, elemento01_01_03_02];
	var elemento01_01 = [elemento01_01_01, elemento01_01_02, elemento01_01_03];
	var elemento01 = [elemento01_01];
	var elemento02_01 = 'CREA UN REGISTRO NUEVO DE MATERIAL';
	var elemento02_02 = 'AREA GRID MATERIALES';
	var elemento02_03 = 'AREA DE CAPTURA MATERIALES';
	var elemento02_04_01_01 = 'STATUS MATERIAL';
	var elemento02_04_01_02 = 'ID MATERIAL';
	var elemento02_04_01 = [elemento02_04_01_01, elemento02_04_01_02];
	var elemento02_04_02_01 = 'ELIMINAR';
	var elemento02_04_02_02 = 'ACTUALIZAR';
	var elemento02_04_02_03 = 'GRABAR';
	var elemento02_04_02_04 = 'REESTABLECER';
	var elemento02_04_02_05 = 'LIMPIAR';
	var elemento02_04_02_06 = 'CAPTURAR';
	var elemento02_04_02 = [elemento02_04_02_01, elemento02_04_02_02, elemento02_04_02_03, elemento02_04_02_04, elemento02_04_02_05, elemento02_04_02_06];
	var elemento02_04 = [elemento02_04_01, elemento02_04_02];
	var elemento02_05 = 'FORMULARIO MATERIALES';
	var elemento02 = [elemento02_01, elemento02_02, elemento02_03, elemento02_04, elemento02_05];
	var elementos = [elemento01, elemento02];
	var codigos = [''];
    var Panel_detalles_formulario = new Panel(configuraciones, etiquetas, codigos, elementos);
    Panel_detalles_formulario.generahtml_r();
    Panel_detalles_formulario.imprimehtml();






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE AREA GRADILLA MATERIALES

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
	// INSTANCIA....: Consulta_gradilla_materiales
	// DESCRIPCION..: Consulta que se ejecuta para actualizar gradilla de materiales desde la BD
	
		var statusConsulta = 0;
		var scriptPhp = 'consulta_gradilla_materiales.php';
		var metodoPhp = 'POST';
		var filtro = [];
		var posicionCallback = 0;
		var metodosCallback01 = ['Metodos_gradilla_materiales.ejecuta()'];
		var metodosCallback02 = ['Metodos_gradilla_materiales_inicia.ejecuta()'];
		var metodosCallback = [metodosCallback01, metodosCallback02]; 
		var callback = [posicionCallback, metodosCallback];
		var lotes = [0, 5000, 0, 0];
		var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
		var codigos = ['', ''];
		var elementos = [''];	
		var Consulta_gradilla_materiales = new Consulta(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_gradilla_materiales
	// DESCRIPCION..: Metodos que se ejecutan despues de actualizar y filtrar gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
		'Modal_apoyos.cierra()',
		'Gradilla_materiales.recibe_consulta(Consulta_gradilla_materiales)',
		'Gradilla_materiales.generahtml()',
		'Gradilla_materiales.imprimehtml()'
	
		];
		var Metodos_gradilla_materiales = new Metodos(configuraciones, codigos, elementos);
		
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_gradilla_materiales_inicia
	// DESCRIPCION..: Metodos que se ejecutan despues de actualizar y filtrar gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
//		'alert("ESTOY EN METODOS CALLBACK DE CONSULTA GRID MATERIALES VOY A IMPRIMIR GRIDS Y COMBOS")',
		
		'Datos_captura_filtros.imprime_natural(Json_filtros_vacios)',
		'Datos_captura_programa.imprime_natural(Json_programa_vacio)',
		'Datos_captura_apoyo.imprime_natural(Json_apoyo_vacio)',
		'Datos_captura_detalle.imprime_natural(Json_detalle_vacio)',
		'Datos_captura_material.imprime_natural(Json_material_vacio)',

//		'alert("IMPRIMI DATOS SIGO VIVO")',

		'Combolist_materiales.generahtml()',
        'Combolist_materiales.imprimehtml()',

	//	'alert("IMPRIMI COMBO MATERIALES SIGO VIVO")',
    
		'Combolist_familiares.generahtml()',
        'Combolist_familiares.imprimehtml()',

	//	'alert("IMPRIMI COMBO FAMILIARES SIGO VIVO")',

		'Combolist_cedulas.generahtml()',
        'Combolist_cedulas.imprimehtml()',

	//	'alert("IMPRIMI COMBO CEDULAS SIGO VIVO")',

		'Combolist_localidades.generahtml()',
        'Combolist_localidades.imprimehtml()',
    
	//	'alert("IMPRIMI COMBO LOCALIDADES SIGO VIVO")',

		'Combolist_municipios.generahtml()',
        'Combolist_municipios.imprimehtml()',
    
	//	'alert("IMPRIMI COMBO MUNICIPIOS SIGO VIVO")',
 
		'Gradilla_materiales.recibe_consulta(Consulta_gradilla_materiales)',
		'Gradilla_materiales.generahtml()',
		'Gradilla_materiales.imprimehtml()',

	//	'alert("IMPRIMI GRADILLA MATERIALES SIGO VIVO")',
 
		'Gradilla_detalles.recibe_consulta(Consulta_gradilla_detalles)',
		'Gradilla_detalles.generahtml()',
		'Gradilla_detalles.imprimehtml()',

//		'alert("IMPRIMI GRADILLA DETALLES SIGO VIVO")',

		'Gradilla_apoyos.recibe_consulta(Consulta_gradilla_apoyos)',
		'Gradilla_apoyos.generahtml()',
		'Gradilla_apoyos.imprimehtml()',

	//	'alert("IMPRIMI GRADILLA APOYOS SIGO VIVO")',

		'Gradilla_programas.recibe_consulta(Consulta_gradilla)',
		'Gradilla_programas.generahtml()',
		'Gradilla_programas.imprimehtml()',

	//	'alert("IMPRIMI GRADILLA PROGRAMAS SIGO VIVO")',

		'Clases_inicio.afectar()',

	//	'alert("ACTUALICE CLASES")',

		'Modal_apoyos.cierra()'

		];
		var Metodos_gradilla_materiales_inicia = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Gradilla
	// INSTANCIA....: Gradilla_materiales
	// ID...........: ID_GRADILLA_MATERIALES
	// SE INSERTA EN: #IDXXXX_2_2	
	// DESCRIPCION..: Gradilla de materiales de apoyo
	// HTML.........: Espera metodo
	// IMPRESION....: Espera metodo, sustituye contenido
	
		var inglesElementos = ['ID', 'DESCRIPCIÓN', 'UNIDAD MEDIDA'];
		var inglesIdioma = [inglesElementos, 'PROGRAMS LIST'];
		var espanolElementos = ['ID', 'DESCRIPCIÓN', 'UNIDAD MEDIDA'];
		var espanolIdioma = [espanolElementos, 'LISTA DE MATERIALES DE APOYO'];
		var arregloIdioma = [inglesIdioma, espanolIdioma];
		var controlIdioma = [idioma, arregloIdioma];
		var numeroElementos = 3;
		var tipoImpresion = 0;
		var consulta = Consulta_gradilla_materiales;
		var parametros = [0, 10];
		var titulo = [''];
		var orientacionBreaks = [0, 720];
		var orientacionFormato = [0, 1];
		var orientacion = [0, orientacionBreaks, orientacionFormato];
		var areacontroles = [1];
		var iconoscontroles = ['fa-solid fa-backward', 'fa-solid fa-backward-step', 'fa-solid fa-forward-step', 'fa-solid fa-forward'];
		var metodoscontroles = [' ONCLICK="Metodos_inicio_posicion_materiales.ejecuta()"', ' ONCLICK="Metodos_retrocedegrid_materiales.ejecuta()"', ' ONCLICK="Metodos_avanzagrid_materiales.ejecuta()"', ' ONCLICK="Metodos_final_posicion_materiales.ejecuta()"'];
		var controles = [areacontroles, iconoscontroles, metodoscontroles];
		var valorIncialClave = 0;
		var valorClave = 0;
		var valorInicialPosicion = 0;
		var valorPosicion = 0;
		var valorInicialCelda = 0;
		var valorCelda = 0;
		var metodoValor = 'Metodos_modal_bajando_material.ejecuta(), Gradilla_materiales.actualiza_valores';
		var tipoValorArreglo = [0];
		var datoValorArreglo = [0];
		var valorArreglo = [tipoValorArreglo, datoValorArreglo];
		var valores = [valorIncialClave, valorClave, valorInicialPosicion, valorPosicion, valorInicialCelda, valorCelda, metodoValor, valorArreglo];
		var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, consulta, parametros, titulo, orientacion, controles, valores];
		var etiquetas = ['gradilla', 'ID_GRADILLA_MATERIALES', '#IDXXXX_2_2'];
		var elementos_tipo_valor = [0, 0, 0];
		var elementos_llave_valor = ['dato_01', 'dato_02', 'dato_03'];
		var elementos_ancho_valor = ['veinte', 'cincuenta', 'treinta'];
		var elementos_metodos = ['Metodos_elige_grid_materiales.ejecuta()', 'Metodos_elige_grid_materiales.ejecuta()', 'Metodos_elige_grid_materiales.ejecuta()'];
		var elementos_iconos = ['', '', ''];
		var elementos = [elementos_tipo_valor, elementos_llave_valor, elementos_ancho_valor, elementos_metodos, elementos_iconos];
		var codigos = [''];
		var Gradilla_materiales = new Gradilla(configuraciones, etiquetas, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_avanzagrid_materiales
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige avanzar una pagina en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = ['Gradilla_materiales.avanza()',
		'Gradilla_materiales.generahtml()',
		'Gradilla_materiales.imprimehtml()'];
		var Metodos_avanzagrid_materiales = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_inicio_posicion_materiales
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir a primera pagina en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = ['Gradilla_materiales.inicializa_posicion()',
		'Gradilla_materiales.generahtml()',
		'Gradilla_materiales.imprimehtml()'];
		var Metodos_inicio_posicion_materiales = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_inicio_posicion_materiales
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir a primera pagina en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = ['Gradilla_materiales.retrocede()',
		'Gradilla_materiales.generahtml()',
		'Gradilla_materiales.imprimehtml()'];
		var Metodos_retrocedegrid_materiales = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_final_posicion_materiales
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir a última pagina en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = ['Gradilla_materiales.finaliza_posicion()',
		'Gradilla_materiales.generahtml()',
		'Gradilla_materiales.imprimehtml()'];
		var Metodos_final_posicion_materiales = new Metodos(configuraciones, codigos, elementos);




	



// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE ELIGE GRID MATERIALES

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_modal_bajando_material
// DESCRIPCION..: Modal para avisar que se esta bajando material
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	
	'Maqueta_apoyos_modal_opcion.contenido([0, "BAJANDO MATERIAL"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "BAJANDO DATOS DEL MATERIAL ELEGIDO PARA SER CONSULTADO, MODIFICADO O ELIMINADO. COLOQUESE EN EL AREA DE CAPTURA DE MATERIALES PARA TRABAJAR."])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Navega_general.recibe_destino(Navega_materiales.configuraciones[0])',
	'Modal_apoyos_opcion.abrefijo()'

	];
	var Metodos_modal_bajando_material = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_elige_grid_materiales
	// DESCRIPCION..: Metodos que se ejecutan al elegir un registro en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
//		'Modal_apoyos.abrefijo()',
		'Consulta_baja_material.actualizafiltro(0, Gradilla_materiales.configuraciones[8][1])',
		'Registro_id_material.recibe_status(Gradilla_materiales.configuraciones[8][1])',
		'Consulta_baja_material.posicion_callback(0)',
		'Consulta_baja_material.ejecuta()'
	
		]
		var Metodos_elige_grid_materiales = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Consulta
	// INSTANCIA....: Consulta_baja_material
	// DESCRIPCION..: Consulta que se ejecuta para traer desde la BD un registro elegido en gradilla
	
		var statusConsulta = 0;
		var scriptPhp = 'consulta_baja_material.php';
		var metodoPhp = 'POST';
		var filtro = [''];
		var posicionCallback = 0;
		var metodosCallback01 = ['Metodos_baja_material.ejecuta()'];
		var metodosCallback02 = ['Metodos_graba_baja_material.ejecuta()'];
		var metodosCallback03 = ['Metodos_graba_baja_material.ejecuta()'];
		var metodosCallback04 = ['Metodos_actualizar_baja_material.ejecuta()'];
		var metodosCallback = [metodosCallback01, metodosCallback02, metodosCallback03, metodosCallback04]; 
		var callback = [posicionCallback, metodosCallback];
		var lotes = [0, 5000, 0, 0];
		var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
		var codigos = ['', ''];
		var elementos = [''];	
		var Consulta_baja_material = new Consulta(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_baja_material
	// DESCRIPCION..: Metodos que se ejecutan despues de ejecutar consulta de programa
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
		'Modal_apoyos.cierra()',
		'Registro_status_material.recibe_status(1)',
		'Json_datos_captura_material.recibe_json(Consulta_baja_material.codigos[0])',
		'Json_datos_captura_material.genera()',
		'Datos_captura_material.imprime_natural(Json_datos_captura_material.codigos[0])',
		'Clases_material.afectar()'
	
		];
		var Metodos_baja_material = new Metodos(configuraciones, codigos, elementos);



	

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE CONTROLES GENERALES DE CAPTURA DE MATERIALES

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Eliminar_material
// ID...........: ID_BOTON_ELIMINAR_MATERIAL
// SE INSERTA EN: #IDXXXX_2_4_2_1	
// DESCRIPCION..: Link con metodos e icono para eliminar registro de material ya existente
// HTML.........: Cuando es creado de manera disabled
// IMPRESION....: Cuando es creado sustituye contenidos y se inserta en contenedor oculto
//                la primera vez

	var titulosIngles = ['ELIMINAR MATERIAL'];
	var iconosIngles = ['fa-solid fa-trash-can'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['ELIMINAR MATERIAL'];
	var iconosEspanol = ['fa-solid fa-trash-can'];
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
	var etiquetas = ["boton_eliminar boton_link_icono_chico", "ID_BOTON_ELIMINAR_MATERIAL", "#IDXXXX_2_4_2_1", "elimina_material"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_modal_elimina_material_confirma.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Eliminar_material = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Eliminar_material.generahtml();
	Eliminar_material.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Actualizar_material
// ID...........: ID_BOTON_ACTUALIZAR_MATERIAL
// SE INSERTA EN: #IDXXXX_2_4_2_2	
// DESCRIPCION..: Link con metodos e icono para actualizar registro de material ya existente
// HTML.........: Cuando es creado de manera disabled
// IMPRESION....: Cuando es creado sustituye contenidos y se inserta en contenedor oculto
//                la primera vez

	var titulosIngles = ['ACTUALIZAR MATERIAL'];
	var iconosIngles = ['fa-solid fa-floppy-disk'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['ACTUALIZAR MATERIAL'];
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
	var etiquetas = ["boton_actualizar boton_link_icono_chico", "ID_BOTON_ACTUALIZAR_MATERIAL", "#IDXXXX_2_4_2_2", "actualiza_material"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_elige_actualizar_material.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Actualizar_material = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Actualizar_material.generahtml();
	Actualizar_material.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Grabar_material
// ID...........: ID_BOTON_GRABAR_MATERIAL
// SE INSERTA EN: #IDXXXX_2_4_2_3	
// DESCRIPCION..: Link con metodos e icono para grabar registro de material nuevo
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado sustituye contenidos

	var titulosIngles = ['GRABAR MATERIAL'];
	var iconosIngles = ['fa-solid fa-floppy-disk'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['GRABAR MATERIAL'];
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
	var etiquetas = ["boton_grabar boton_link_icono_chico", "ID_BOTON_GRABAR_MATERIAL", "#IDXXXX_2_4_2_3", "graba_material"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_graba_material.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Grabar_material = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Grabar_material.generahtml();
	Grabar_material.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Reestablece_captura_material
// ID...........: ID_BOTON_REESTABLECE_MATERIAL
// SE INSERTA EN: #IDXXXX_2_4_2_4	
// DESCRIPCION..: Link con metodos e icono para reestablecer valores de la captura
//                cuando se esta modificando un registro de material
// HTML.........: Cuando es creado de manera disabled
// IMPRESION....: Cuando es creado espera metodo para quitar disabled

	var titulosIngles = ['REESTABLECER VALORES DE CAPTURA'];
	var iconosIngles = ['fa-solid fa-arrow-rotate-right'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['REESTABLECER VALORES DE CAPTURA'];
	var iconosEspanol = ['fa-solid fa-arrow-rotate-right'];
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
	var etiquetas = ["boton_reestablece boton_link_icono_chico", "ID_BOTON_REESTABLECE_MATERIAL", "#IDXXXX_2_4_2_4", "reestablece_captura_material"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_confirma_reestablece_materiales.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Reestablece_captura_material = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Reestablece_captura_material.generahtml();
	Reestablece_captura_material.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Limpia_captura_material
// ID...........: ID_BOTON_LIMPIA_MATERIAL
// SE INSERTA EN: #IDXXXX_2_4_2_5	
// DESCRIPCION..: Link con metodos e icono para limpiar la captura capturando nuevo material
// HTML.........: Cuando es creado de manera disabled
// IMPRESION....: Cuando es creado espera metodo para quitar disabled

	var titulosIngles = ['LIMPIAR CAPTURA'];
	var iconosIngles = ['fa-regular fa-clipboard'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['LIMPIAR CAPTURA'];
	var iconosEspanol = ['fa-regular fa-clipboard'];
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
	var etiquetas = ["boton_limpia boton_link_icono_chico", "ID_BOTON_LIMPIA_MATERIAL", "#IDXXXX_2_4_2_5", "limpia_captura_material"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_nuevo_material.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Limpia_captura_material = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Limpia_captura_material.generahtml();
	Limpia_captura_material.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Nueva_captura_material
// ID...........: ID_BOTON_NUEVA_MATERIAL
// SE INSERTA EN: #IDXXXX_2_4_2_6	
// DESCRIPCION..: Link con metodos e icono para abrir la captura a un nuevo registro de material
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido

	var titulosIngles = ['CAPTURAR NUEVO MATERIAL'];
	var iconosIngles = ['fa-solid fa-plus'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['CAPTURAR NUEVO MATERIAL'];
	var iconosEspanol = ['fa-solid fa-plus'];
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
	var etiquetas = ["boton_nueva boton_link_icono_chico", "ID_BOTON_NUEVA_MATERIAL", "#IDXXXX_2_4_2_6", "nueva_captura_material"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_nuevo_material.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Nueva_captura_material = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Nueva_captura_material.generahtml();
	Nueva_captura_material.imprimehtml();
	
	




// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE CAPTURAR NUEVO MATERIAL

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_nuevo_material
// DESCRIPCION..: Metodos que se ejecutan al elegir capturar nuevo material

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.cierra()',
	'Registro_status_material.recibe_status(2)',
	'Registro_id_material.recibe_status(0)',
	'Datos_captura_material.imprime_natural(Json_material_nuevo)',
	'Clases_material_nuevo.afectar()'

	];
	var Metodos_nuevo_material = new Metodos(configuraciones, codigos, elementos);

	




// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE BORRAR MATERIAL

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_modal_elimina_material_confirma
// DESCRIPCION..: Modal para confirmar eliminar material

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_apoyos_modal_opcion.contenido([0, "CONFIRMA ELIMINAR MATERIAL"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE ELIMINAR EL MATERIAL: "+Registro_id_material.configuraciones[0]+" "+Consulta_baja_material.codigos[0][0][1].dato_02+" "+Consulta_baja_material.codigos[0][0][1].dato_03])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Si_eliminar_material_modal.generahtml()',
	'Si_eliminar_material_modal.imprimehtml()',
	'No_eliminar_material_modal.generahtml()',
	'No_eliminar_material_modal.imprimehtml()',
	'Modal_apoyos_opcion.abrefijo()'
	];
	var Metodos_modal_elimina_material_confirma = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_eliminar_material_modal
// ID...........: ID_SI_ELIMINAR_MATERIAL_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de eliminar material
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_ELIMINAR_MATERIAL_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_eliminar_material_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra(), Metodos_inspeccion_detalles_material.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_eliminar_material_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Elemento
// INSTANCIA....: No_eliminar_material_modal
// ID...........: ID_NO_ELIMINAR_MATERIAL_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en confirmación de eliminar material 
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
	var etiquetas = ["boton_link_icono_chico", "ID_NO_ELIMINAR_MATERIAL_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "no_eliminar_material_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_eliminar_material_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);
	
// CLASE........: Metodos
// INSTANCIA....: Metodos_inspeccion_detalles_material
// DESCRIPCION..: Metodos que se ejecutan para preparar consulta de inspeccion de detalles en
//              : material
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.abrefijo()',
	'Consulta_inspeccionar_materiales.actualizafiltro(0, Registro_id_material.configuraciones[0])',
	'Consulta_inspeccionar_materiales.posicion_callback(0)',
	'Consulta_inspeccionar_materiales.ejecuta()'

	];
	
	var Metodos_inspeccion_detalles_material = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_inspeccionar_detalles
// DESCRIPCION..: Consulta que se ejecuta para inspeccionar si el programa tiene detalles

	var statusConsulta = 0;
	var scriptPhp = 'consulta_inspecciona_materiales.php';
	var metodoPhp = 'POST';
	var filtro = [''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_inspecciona_materiales.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_inspeccionar_materiales = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_inspecciona_materiales
// DESCRIPCION..: Metodos que se ejecutan despues de consulta detalles

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.cierra()',
	'Evaluacion_borrar_material_detalles.recibe_validacion([0, Consulta_inspeccionar_materiales.codigos[0][0][1].dato_01])',
	'Evaluacion_borrar_material_detalles.ejecuta()'

	];
	
	var Metodos_after_inspecciona_materiales = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_borrar_material_detalles
// DESCRIPCION..: Evalua que material no tenga detalles dependientes para poder ser borrado 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_modal_no_eliminar_material.ejecuta()', 'Metodos_consulta_eliminar_material.ejecuta()'];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [1];
	var especialesElementos = [['0']];
	var retornoElementos = [[0]];
	var mensajesElementos = [['SIN MATERIALES']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_borrar_material_detalles = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_no_eliminar_material
// DESCRIPCION..: Metodos que se ejecutan para presentar modal de no borrar materiales con detalles
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Maqueta_apoyos_modal_opcion.contenido([0, "DETALLES CON MATERIAL"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "NO PUEDO ELIMINAR EL MATERIAL: "+Registro_id_material.configuraciones[0]+" "+Consulta_baja_material.codigos[0][0][1].dato_02+" "+Consulta_baja_material.codigos[0][0][1].dato_03+" PORQUÉ ESTÁ ASOCIADO A "+Consulta_inspeccionar_materiales.codigos[0][0][1].dato_01+" DETALLES DE APOYO."])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Navega_general.recibe_destino(Navega_materiales.configuraciones[0])',
	'Modal_apoyos_opcion.abrefijo()'

	];
	
	var Metodos_modal_no_eliminar_material = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_consulta_eliminar_material
// DESCRIPCION..: Metodos que se ejecutan para preparar consulta de eliminacion de material
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.abrefijo()',
	'Consulta_eliminar_material.actualizafiltro(0, Registro_id_material.configuraciones[0])',
	'Consulta_eliminar_material.posicion_callback(0)',
	'Consulta_eliminar_material.ejecuta()'

	];
	
	var Metodos_consulta_eliminar_material = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_eliminar_material
// DESCRIPCION..: Consulta que se ejecuta para eliminar material

	var statusConsulta = 0;
	var scriptPhp = 'consulta_eliminar_material.php';
	var metodoPhp = 'POST';
	var filtro = [''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_elimina_material.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_eliminar_material = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_elimina_material
// DESCRIPCION..: Metodos que se ejecutan despues de eliminar material

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.cierra()',

	'Modal_apoyos.abrefijo()',
	'Consulta_gradilla_materiales.limpia_codigos()',
	'Consulta_gradilla_materiales.inicializa_parametros()',
	'Consulta_gradilla_materiales.posicion_callback(0)',
	'Consulta_gradilla_materiales.ejecuta_2()',

	'Modal_apoyos.abrefijo()',
	'Consulta_combolist_materiales.limpia_codigos()',
	'Consulta_combolist_materiales.inicializa_parametros()',
	'Consulta_combolist_materiales.posicion_callback(2)',
	'Consulta_combolist_materiales.ejecuta_2()',

	'Maqueta_apoyos_modal_opcion.contenido([0, "MATERIAL ELIMINADO"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "EL MATERIAL: "+Consulta_baja_material.codigos[0][0][1].dato_02+" CON EL ID: "+Registro_id_material.configuraciones[0]+" FUE BORRADO EXITOSAMENTE."])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Navega_general.recibe_destino(Navega_materiales.configuraciones[0])',
	'Modal_apoyos_opcion.abrefijo()',
	'Metodos_nuevo_material.ejecuta()'

	];
	var Metodos_after_elimina_material = new Metodos(configuraciones, codigos, elementos);
	
	




// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE GRABAR MATERIAL

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_graba_material
// DESCRIPCION..: Metodos que se ejecutan al elegir grabar registro de material

var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	
	'Evaluacion_grabar_material.recibe_validacion([0, document.getElementById("ID_DATO_MATERIALES_3_2_INPUT_TEXT").value])',
	'Evaluacion_grabar_material.recibe_validacion([1, document.getElementById("ID_DATO_MATERIALES_4_3_INPUT_TEXT").value])',
	'Evaluacion_grabar_material.ejecuta()'

	];
	var Metodos_graba_material = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_grabar_material
// DESCRIPCION..: Evalua que cedula y material de material no este vacio 

	var numeroElementos = 2;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_modal_graba_material_confirma.ejecuta()', 'Metodos_modal_material_vacio.ejecuta()'];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = ['', ''];
	var tiposElementos = [0, 0];
	var validacionElementos = [0, 0];
	var especialesElementos = [[''], ['']];
	var retornoElementos = [[0], [0]];
	var mensajesElementos = [['DESCRIPCION VACIA'], ['UNIDAD MEDIDA VACIA']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_grabar_material = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_material_vacio
// DESCRIPCION..: Modal para avisar que se intento grabar un material sin cedula o sin
//                responsable
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_apoyos_modal_opcion.contenido([0, "DATOS INCORRECTOS"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "NO PUEDO GRABAR MATERIAL SIN DESCRIPCIÓN O UNIDAD DE MEDIDA"])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Navega_general.recibe_destino(Navega_materiales.configuraciones[0])',
	'Modal_apoyos_opcion.abrefijo()'

	];
	var Metodos_modal_material_vacio = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_graba_material_confirma
// DESCRIPCION..: Modal para confirmar grabar material

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_apoyos_modal_opcion.contenido([0, "CONFIRMA GRABAR MATERIAL"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE GRABAR EL MATERIAL: "+document.getElementById("ID_DATO_MATERIALES_3_2_INPUT_TEXT").value+" "+document.getElementById("ID_DATO_MATERIALES_4_3_INPUT_TEXT").value])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Si_grabar_material_modal.generahtml()',
	'Si_grabar_material_modal.imprimehtml()',
	'No_grabar_material_modal.generahtml()',
	'No_grabar_material_modal.imprimehtml()',
	'Modal_apoyos_opcion.abrefijo()'
	];
	var Metodos_modal_graba_material_confirma = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_grabar_material_modal
// ID...........: ID_SI_GRABAR_MATERIAL_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de grabar material
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_GRABAR_MATERIAL_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_grabar_material_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra(), Metodos_graba_material_bd.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_grabar_material_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Elemento
// INSTANCIA....: No_grabar_material_modal
// ID...........: ID_NO_GRABAR_MATERIAL_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en confirmación de grabar material 
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
	var etiquetas = ["boton_link_icono_chico", "ID_NO_GRABAR_MATERIAL_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "no_grabar_material_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_grabar_material_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);
	
// CLASE........: Metodos
// INSTANCIA....: Metodos_graba_material_bd
// DESCRIPCION..: Metodos que se ejecutan para preparar consulta de grabación de material
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.abrefijo()',
	'Consulta_grabar_material.actualizafiltro(0, document.getElementById("ID_DATO_MATERIALES_3_2_INPUT_TEXT").value)',
	'Consulta_grabar_material.actualizafiltro(1, document.getElementById("ID_DATO_MATERIALES_4_3_INPUT_TEXT").value)',
	'Consulta_grabar_material.posicion_callback(0)',
	'Consulta_grabar_material.ejecuta()'

	];
	
	var Metodos_graba_material_bd = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_grabar_material
// DESCRIPCION..: Consulta que se ejecuta para grabar material

	var statusConsulta = 0;
	var scriptPhp = 'consulta_graba_material.php';
	var metodoPhp = 'POST';
	var filtro = ['', '', '', ''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_graba_material.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_grabar_material = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_graba_material
// DESCRIPCION..: Metodos que se ejecutan despues de grabar nuevo material

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

		'Modal_apoyos.abrefijo()',
		'Registro_id_material.recibe_status(Consulta_grabar_material.codigos[0][0][0].recupera)',
		'Consulta_baja_material.limpia_codigos()',
		'Consulta_baja_material.inicializa_parametros()',
		'Consulta_baja_material.actualizafiltro(0, Consulta_grabar_material.codigos[0][0][0].recupera)',
		'Consulta_baja_material.posicion_callback(1)',
		'Consulta_baja_material.ejecuta()'

	];
	var Metodos_after_graba_material = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_graba_baja_material
	// DESCRIPCION..: Metodos que se ejecutan despues de ejecutar consulta de grabar material
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
		'Modal_apoyos.cierra()',

		'Registro_status_material.recibe_status(1)',
	
		'Json_datos_captura_material.recibe_json(Consulta_baja_material.codigos[0])',
		'Json_datos_captura_material.genera()',
		'Datos_captura_material.imprime_natural(Json_datos_captura_material.codigos[0])',

		'Modal_apoyos.abrefijo()',
		'Consulta_gradilla_materiales.limpia_codigos()',
		'Consulta_gradilla_materiales.inicializa_parametros()',
		'Consulta_gradilla_materiales.posicion_callback(0)',
		'Consulta_gradilla_materiales.ejecuta_2()',

		'Modal_apoyos.abrefijo()',
		'Consulta_combolist_materiales.limpia_codigos()',
		'Consulta_combolist_materiales.inicializa_parametros()',
		'Consulta_combolist_materiales.posicion_callback(2)',
		'Consulta_combolist_materiales.ejecuta_2()',

		'Clases_material.afectar()',
	
		'Maqueta_apoyos_modal_opcion.contenido([0, "MATERIAL GRABADO"])',
		'Maqueta_apoyos_modal_opcion.contenido([1, "EL MATERIAL: "+document.getElementById("ID_DATO_MATERIALES_3_2_INPUT_TEXT").value+" "+document.getElementById("ID_DATO_MATERIALES_4_3_INPUT_TEXT").value+" FUE GRABADO EXITOSAMENTE CON EL ID: "+Registro_id_material.configuraciones[0]])',
		'Maqueta_apoyos_modal_opcion.generahtml()',
		'Maqueta_apoyos_modal_opcion.imprimehtml()',
		'Ok_modal.generahtml()',
		'Ok_modal.imprimehtml()',
		'Navega_general.recibe_destino(Navega_materiales.configuraciones[0])',
		'Modal_apoyos_opcion.abrefijo()'

		];
	
		var Metodos_graba_baja_material = new Metodos(configuraciones, codigos, elementos);






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE ACTUALIZAR MATERIAL

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_elige_actualizar_material
// DESCRIPCION..: Metodos que se ejecutan al elegir actualizar registro de material

var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Evaluacion_actualizar_material.recibe_validacion([0, document.getElementById("ID_DATO_MATERIALES_3_2_INPUT_TEXT").value])',
	'Evaluacion_actualizar_material.recibe_validacion([1, document.getElementById("ID_DATO_MATERIALES_4_3_INPUT_TEXT").value])',
	'Evaluacion_actualizar_material.ejecuta()'];
	var Metodos_elige_actualizar_material = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_actualizar_material
// DESCRIPCION..: Evalua que cedula y responsable de material no esten vacios 

	var numeroElementos = 2;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_modal_actualizar_material_confirma.ejecuta()', 'Metodos_modal_actualizar_material_vacio.ejecuta()'];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = ['', ''];
	var tiposElementos = [0, 0];
	var validacionElementos = [0, 0];
	var especialesElementos = [[''], ['']];
	var retornoElementos = [[0], [0]];
	var mensajesElementos = [['DESCRIPCION VACIA'], ['UNIDAD VACIA']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_actualizar_material = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_actualizar_material_vacio
// DESCRIPCION..: Modal para avisar que se intento actualizar un material vacio
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_apoyos_modal_opcion.contenido([0, "DATOS INCORRECTOS"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "NO PUEDO ACTUALIZAR MATERIAL SIN DESCRIPCIÓN O SIN UNIDAD DE MEDIDA"])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Navega_general.recibe_destino(Navega_materiales.configuraciones[0])',
	'Modal_apoyos_opcion.abrefijo()'

	];
	var Metodos_modal_actualizar_material_vacio = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_actualizar_material_confirma
// DESCRIPCION..: Modal para confirmar actualizar material

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_apoyos_modal_opcion.contenido([0, "CONFIRMA ACTUALIZAR MATERIAL"])',
	'Maqueta_apoyos_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE ACTUALIZAR EL MATERIAL: "+Registro_id_material.configuraciones[0]+" "+Consulta_baja_material.codigos[0][0][1].dato_02+" "+Consulta_baja_material.codigos[0][0][1].dato_03])',
	'Maqueta_apoyos_modal_opcion.generahtml()',
	'Maqueta_apoyos_modal_opcion.imprimehtml()',
	'Si_actualizar_material_modal.generahtml()',
	'Si_actualizar_material_modal.imprimehtml()',
	'No_actualizar_material_modal.generahtml()',
	'No_actualizar_material_modal.imprimehtml()',
	'Modal_apoyos_opcion.abrefijo()'

	];
	var Metodos_modal_actualizar_material_confirma = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_actualizar_material_modal
// ID...........: ID_SI_ACTUALIZAR_MATERIAL_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de actualizar material
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_ACTUALIZAR_MATERIAL_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_grabar_material_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra(), Metodos_actualizar_material_bd.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_actualizar_material_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Elemento
// INSTANCIA....: No_actualizar_material_modal
// ID...........: ID_NO_ACTUALIZAR_MATERIAL_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en confirmación de actualizar material 
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
	var etiquetas = ["boton_link_icono_chico", "ID_NO_ACTUALIZAR_MATERIAL_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "no_grabar_material_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_actualizar_material_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_actualizar_material_bd
// DESCRIPCION..: Metodos que se ejecutan para preparar consulta de actualizacion de material
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_apoyos.abrefijo()',
	'Consulta_actualizar_material.actualizafiltro(0, Registro_id_material.configuraciones[0])',
	'Consulta_actualizar_material.actualizafiltro(1, document.getElementById("ID_DATO_MATERIALES_3_2_INPUT_TEXT").value)',
	'Consulta_actualizar_material.actualizafiltro(2, document.getElementById("ID_DATO_MATERIALES_4_3_INPUT_TEXT").value)',
	'Consulta_actualizar_material.posicion_callback(0)',
	'Consulta_actualizar_material.ejecuta()'

	];
	
	var Metodos_actualizar_material_bd = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_actualizar_material
// DESCRIPCION..: Consulta que se ejecuta para actualizar material

	var statusConsulta = 0;
	var scriptPhp = 'consulta_actualizar_material.php';
	var metodoPhp = 'POST';
	var filtro = [''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_actualizar_material.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_actualizar_material = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_actualizar_material
// DESCRIPCION..: Metodos que se ejecutan despues de actualizar apoyo

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Modal_apoyos.abrefijo()',
		'Consulta_baja_material.limpia_codigos()',
		'Consulta_baja_material.inicializa_parametros()',
		'Consulta_baja_material.actualizafiltro(0, Registro_id_material.configuraciones[0])',
		'Consulta_baja_material.posicion_callback(3)',
		'Consulta_baja_material.ejecuta_2()'

	];
	var Metodos_after_actualizar_material = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_actualizar_baja_material
	// DESCRIPCION..: Metodos que se ejecutan despues de ejecutar consulta de actualizar material
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
		'Modal_apoyos.cierra()',

		'Modal_apoyos.abrefijo()',
		'Consulta_gradilla_materiales.limpia_codigos()',
		'Consulta_gradilla_materiales.inicializa_parametros()',
		'Consulta_gradilla_materiales.posicion_callback(0)',
		'Consulta_gradilla_materiales.ejecuta_2()',
		
		'Modal_apoyos.abrefijo()',
		'Consulta_combolist_materiales.limpia_codigos()',
		'Consulta_combolist_materiales.inicializa_parametros()',
		'Consulta_combolist_materiales.posicion_callback(2)',
		'Consulta_combolist_materiales.ejecuta_2()',

		'Clases_material.afectar()',
		
		'Maqueta_apoyos_modal_opcion.contenido([0, "MATERIAL ACTUALIZADO"])',
		'Maqueta_apoyos_modal_opcion.contenido([1, "EL MATERIAL: "+document.getElementById("ID_DATO_MATERIALES_3_2_INPUT_TEXT").value+" "+document.getElementById("ID_DATO_MATERIALES_4_3_INPUT_TEXT").value+" CON EL ID: "+Registro_id_material.configuraciones[0]+" FUE ACTUALIZADO EXITOSAMENTE"])',
		'Maqueta_apoyos_modal_opcion.generahtml()',
		'Maqueta_apoyos_modal_opcion.imprimehtml()',
		'Ok_modal.generahtml()',
		'Ok_modal.imprimehtml()',
		'Navega_general.recibe_destino(Navega_materiales.configuraciones[0])',
		'Modal_apoyos_opcion.abrefijo()'

		];
	
		var Metodos_actualizar_baja_material = new Metodos(configuraciones, codigos, elementos);
	
	




// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE REESTABLECER MATERIAL

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_confirma_reestablece_materiales
// DESCRIPCION..: Metodos que se ejecutan al elegir reestablecer valores de captura de material 
//                existente

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Maqueta_apoyos_modal_opcion.contenido([0, "CONFIRMA REESTABLECER VALORES DE MATERIAL"])',
		'Maqueta_apoyos_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE REESTABLECER LOS VALORES GRABADOS DEL MATERIAL: "+Registro_id_material.configuraciones[0]+" "+Consulta_baja_material.codigos[0][0][1].dato_02+" "+Consulta_baja_material.codigos[0][0][1].dato_03])',
		'Maqueta_apoyos_modal_opcion.generahtml()',
		'Maqueta_apoyos_modal_opcion.imprimehtml()',
		'Si_reestablece_materiales_modal.generahtml()',
		'Si_reestablece_materiales_modal.imprimehtml()',
		'No_reestablece_materiales_modal.generahtml()',
		'No_reestablece_materiales_modal.imprimehtml()',
		'Modal_apoyos_opcion.abrefijo()'
	
		];
		var Metodos_confirma_reestablece_materiales = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_reestablece_materiales_modal
// ID...........: ID_SI_REESTABLECE_MATERIAL_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de reestablecer
//                valores originales de registro de material en modificación
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_REESTABLECE_MATERIAL_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_reestablece_material_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra(), Metodos_reestablece_materiales_valores.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_reestablece_materiales_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Elemento
// INSTANCIA....: No_reestablece_materiales_modal
// ID...........: ID_NO_REESTABLECE_MATERIAL_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en confirmación de reestablecer 
//                valores originales de material en modificación
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
	var etiquetas = ["boton_link_icono_chico", "ID_NO_REESTABLECE_MATERIAL_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "no_reestablece_materiales_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_apoyos_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_reestablece_materiales_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_reestablece_materiales_valores
	// DESCRIPCION..: Metodos que se ejecutan para reestablecer valores de programa
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
			
		'Modal_apoyos.abrefijo()',
		'Consulta_baja_material.actualizafiltro(0, Registro_id_material.configuraciones[0])',
		'Consulta_baja_material.posicion_callback(0)',
		'Consulta_baja_material.ejecuta()'
	
		]
		var Metodos_reestablece_materiales_valores = new Metodos(configuraciones, codigos, elementos);






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE PANEL DETALLES FORMULARIO

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

	



// CLASE........: Panel
// INSTANCIA....: Panel_materiales_formulario
// ID...........: ID_FORMULARIO_MATERIAL
// SE INSERTA EN: #IDXXXX_2_5	
// DESCRIPCION..: Panel para organizar las sub areas generales del formulario de materiales
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido
	
	var tipoImpresion = 0;
	var nivel = [];
	var configuraciones = [tipoImpresion, nivel];
	var etiquetas = ['areas_registro_formulario_x area_paneles_x', 'IDXXXXX', '#IDXXXX_2_5'];
	var elemento01_01_01 = 'DATOS MATERIAL';
	var elemento01_01_02 = 'DESCRIPCIÓN DE MATERIAL';
	var elemento01_01_03 = '';
	var elemento01_01_04_01 = 'UNIDAD MEDIDA:';
	var elemento01_01_04_02 = '';
	var elemento01_01_04 = [elemento01_01_04_01, elemento01_01_04_02];
	var elemento01_01 = [elemento01_01_01, elemento01_01_02, elemento01_01_03, elemento01_01_04];
	var elemento01 = [elemento01_01];
	var elementos = [elemento01];
	var codigos = [''];
    var Panel_materiales_formulario = new Panel(configuraciones, etiquetas, codigos, elementos);
    Panel_materiales_formulario.generahtml_r();
    Panel_materiales_formulario.imprimehtml();
	




    

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Json_filtros_vacios
// DESCRIPCION..: Json de datos para imprimir filtros vacios  

	var Json_filtros_vacios = {"dato_0" : "0", "dato_1" : Fecha_actual.valores[1]};

// CLASE........: Datos
// INSTANCIA....: Datos_captura_filtros
// DESCRIPCION..: Objeto que determina cuales datos y donde se colocaran en la pantalla

	var numeroElementos = 2;
	var configuraciones = [numeroElementos];
	var codigos = [''];
	var elemento01 = '#IDXX_2_1_5_1_2';
	var elemento02 = '#IDXX_2_1_6_1_2';
	var elementosArea = [elemento01, elemento02];
	var elementosImpresion = [0, 0];
	var elemen01 = 0;
	var elemen02 = '0000-00-00';
	var elementosValor = [elemen01, elemen02];
// TIPOS DE FUENTES PARA TRATAR LOS DATOS DEPENDIENDO DE UNA CONFIGURACIÓN
	var elementosTipoFuente = [3, 7];
	var elementosTipoValor01 = ['f_cedula'];
	var elementosTipoValor02 = ['f_fecha_filtro'];
	var elementosTipoValor = [elementosTipoValor01, elementosTipoValor02];
	var elementosTipo = [elementosTipoFuente, elementosTipoValor];
	var elemenMe01 = '';
	var elemenMe02 = '';
	var elementosMetodos = [elemenMe01, elemenMe02];
	var elemCl01 = 'c_01';
	var elemCl02 = 'c_02';
	var elementosClass = [elemCl01, elemCl02];
	var elemId01 = 'ID_DATO_FILTRO_1';
	var elemId02 = 'ID_DATO_FILTRO_2';
	var elementosId = [elemId01, elemId02];
	var elementos = [elementosArea, elementosImpresion, elementosValor, elementosTipo, elementosMetodos, elementosClass, elementosId];
	var Datos_captura_filtros = new Datos(configuraciones, codigos, elementos);



    

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE DATOS DE PROGRAMA

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Json_programa_nuevo
// DESCRIPCION..: Json de datos para iniciar captura de nuevo programa  

var Json_programa_nuevo = {"dato_0" : "2",
                        "dato_1" : " SIN GRABAR",
                        "dato_2" : "",
                        "dato_3" : Fecha_actual.valores[1],
                        "dato_4" : Fecha_actual.valores[1],
                        "dato_5" : ""};

// OBJETO.......: Json
// INSTANCIA....: Json_programa_vacio
// DESCRIPCION..: Json de datos para imprimir programa vacio  

var Json_programa_vacio = {"dato_0" : "0",
                        "dato_1" : "",
                        "dato_2" : "",
                        "dato_3" : Fecha_actual.valores[1],
                        "dato_4" : Fecha_actual.valores[1],
                        "dato_5" : ""};

// CLASE........: Json
// INSTANCIA....: Json_datos_captura_programa
// DESCRIPCION..: Json que recoge los valores de la consulta baja programas según una 
//                configuración. Tipo de fuente de los datos de entrada: 0 = Directo
//                lo recoge de un arreglo, 1 = Json consulta de consultas cada consulta tiene
//                dos objetos, 2 Json de una consulta tiene dos objetos, 3 = Json normal
//                de un solo objeto 

	var numeroElementos = 6;
	var tipoFuente = 2;
	var configuraciones = [numeroElementos, tipoFuente];

	var codigoJsonSalida = '';
	var codigoJsonFuente = '';
	var codigos = [codigoJsonSalida, codigoJsonFuente];
	
	var elementoValorFuente01 = [1, 'registros'];
	var elementoValorFuente02 = [2, 'dato_01'];
	var elementoValorFuente03 = [2, 'dato_02'];
	var elementoValorFuente04 = [2, 'dato_03'];
	var elementoValorFuente05 = [2, 'dato_04'];
	var elementoValorFuente06 = [2, 'dato_05'];
	var elementosValoresFuentes = [elementoValorFuente01, elementoValorFuente02, elementoValorFuente03, elementoValorFuente04, elementoValorFuente05, elementoValorFuente06];
	var elementosTiposResultado = [0, 0, 0, 0, 0, 0];
	var elementos = [elementosValoresFuentes, elementosTiposResultado];
	
	var Json_datos_captura_programa = new Json(configuraciones, codigos, elementos);

// CLASE........: Datos
// INSTANCIA....: Datos_captura_programa
// DESCRIPCION..: Objeto que determina cuales datos y donde se colocaran en la pantalla

	var numeroElementos = 6;
	var configuraciones = [numeroElementos];
	var codigos = [''];

	var elemento01 = '#ID_3_2_1_1';
	var elemento02 = '#ID_3_2_1_2';
	
	var elemento03 = '#IDX_1_1_2_2';
	var elemento04 = '#IDX_1_1_3_2';
	var elemento05 = '#IDX_1_1_4_2';
	
	var elemento06 = '#IDX_1_2_2';

	var elementosArea = [elemento01, elemento02, elemento03, elemento04, elemento05, elemento06];
	var elementosImpresion = [0, 0, 0, 0, 0, 0];
	var elemen01 = 0;
	var elemen02 = ' SIN GRABAR ';
	var elemen03 = '';
	var elemen04 = '';
	var elemen05 = '';
	var elemen06 = '';
	var elementosValor = [elemen01, elemen02, elemen03, elemen04, elemen05, elemen06];
// TIPOS DE FUENTES PARA TRATAR LOS DATOS DEPENDIENDO DE UNA CONFIGURACIÓN
	var elementosTipoFuente = [1, 4, 2, 7, 7, 2];
	var elementosTipoValor01 = [[0, 'NO HAY REGISTRO SELECCIONADO'], [1, 'CONSULTANDO / MODIFICANDO REGISTRO'], [2, 'CAPTURANDO NUEVO PROGRAMA']];
	var elementosTipoValor02 = [0, 'PROGRAMA: '];
	var elementosTipoValor03 = ['p_nombre'];
	var elementosTipoValor04 = ['p_fecha_inicio'];
	var elementosTipoValor05 = ['p_fecha_termino'];
	var elementosTipoValor06 = ['p_descripcion'];
	var elementosTipoValor = [elementosTipoValor01, elementosTipoValor02, elementosTipoValor03, elementosTipoValor04, elementosTipoValor05, elementosTipoValor06];
	var elementosTipo = [elementosTipoFuente, elementosTipoValor];
	var elemenMe01 = '';
	var elemenMe02 = '';
	var elemenMe03 = '';
	var elemenMe04 = '';
	var elemenMe05 = '';
	var elemenMe06 = '';
	var elementosMetodos = [elemenMe01, elemenMe02, elemenMe03, elemenMe04, elemenMe05, elemenMe06];
	var elemCl01 = 'c_01';
	var elemCl02 = 'c_02';
	var elemCl03 = 'c_03';
	var elemCl04 = 'c_04';
	var elemCl05 = 'c_05';
	var elemCl06 = 'c_06';
	var elementosClass = [elemCl01, elemCl02, elemCl03, elemCl04, elemCl05, elemCl06];
	var elemId01 = 'ID_DATO_PROGRAMA_1';
	var elemId02 = 'ID_DATO_PROGRAMA_2';
	var elemId03 = 'ID_DATO_PROGRAMA_3';
	var elemId04 = 'ID_DATO_PROGRAMA_4';
	var elemId05 = 'ID_DATO_PROGRAMA_5';
	var elemId06 = 'ID_DATO_PROGRAMA_6';
	var elementosId = [elemId01, elemId02, elemId03, elemId04, elemId05, elemId06];
	var elementos = [elementosArea, elementosImpresion, elementosValor, elementosTipo, elementosMetodos, elementosClass, elementosId];
	
	var Datos_captura_programa = new Datos(configuraciones, codigos, elementos);
	




    

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE DATOS DE APOYOS

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Json_apoyo_nuevo
// DESCRIPCION..: Json de datos para iniciar captura de nuevo apoyo  

var Json_apoyo_nuevo = {"dato_0" : "2",
                        "dato_1" : " SIN GRABAR",
                        "dato_2" : Fecha_actual.valores[1],
                        "dato_3" : ""};

// OBJETO.......: Json
// INSTANCIA....: Json_apoyo_vacio
// DESCRIPCION..: Json de datos para imprimir usuario vacio  

var Json_apoyo_vacio = {"dato_0" : "0",
                        "dato_1" : "",
                        "dato_2" : Fecha_actual.valores[1],
                        "dato_3" : ""};

// CLASE........: Json
// INSTANCIA....: Json_datos_captura_apoyo
// DESCRIPCION..: Json que recoge los valores de la consulta baja programas según una 
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
	
	var elementoValorFuente01 = [1, 'registros'];
	var elementoValorFuente02 = [2, 'dato_01'];
	var elementoValorFuente03 = [2, 'dato_06'];
	var elementoValorFuente04 = [2, 'dato_05'];
	var elementosValoresFuentes = [elementoValorFuente01, elementoValorFuente02, elementoValorFuente03, elementoValorFuente04];
	var elementosTiposResultado = [0, 0, 0, 0];
	var elementos = [elementosValoresFuentes, elementosTiposResultado];
	
	var Json_datos_captura_apoyo = new Json(configuraciones, codigos, elementos);

// CLASE........: Datos
// INSTANCIA....: Datos_captura_apoyo
// DESCRIPCION..: Objeto que determina cuales datos y donde se colocaran en la pantalla

	var numeroElementos = 6;
	var configuraciones = [numeroElementos];
	var codigos = [''];

	var elemento01 = '#IDXX_3_2_1_1';
	var elemento02 = '#IDXX_3_2_1_2';
	
	var elemento03 = '#IDXXX_1_1_4_2';
	
	var elemento04 = '#IDXXX_1_2_2';

	var elementosArea = [elemento01, elemento02, elemento03, elemento04];
	var elementosImpresion = [0, 0, 0, 0];
	var elemen01 = 0;
	var elemen02 = ' SIN GRABAR ';
	var elemen03 = '';
	var elemen04 = '';
	var elementosValor = [elemen01, elemen02, elemen03, elemen04];
// TIPOS DE FUENTES PARA TRATAR LOS DATOS DEPENDIENDO DE UNA CONFIGURACIÓN
// ESTOS SON LOS TIPOS 1 = 
	var elementosTipoFuente = [1, 4, 7, 2];
	var elementosTipoValor01 = [[0, 'NO HAY REGISTRO SELECCIONADO'], [1, 'CONSULTANDO / MODIFICANDO REGISTRO'], [2, 'CAPTURANDO NUEVO APOYO']];
	var elementosTipoValor02 = [0, 'APOYO: '];
	var elementosTipoValor03 = ['a_fecha_entrega'];
	var elementosTipoValor04 = ['a_descripcion'];
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
	var elemId01 = 'ID_DATO_APOYOS_1';
	var elemId02 = 'ID_DATO_APOYOS_2';
	var elemId03 = 'ID_DATO_APOYOS_3';
	var elemId04 = 'ID_DATO_APOYOS_4';
	var elementosId = [elemId01, elemId02, elemId03, elemId04];
	var elementos = [elementosArea, elementosImpresion, elementosValor, elementosTipo, elementosMetodos, elementosClass, elementosId];
	
	var Datos_captura_apoyo = new Datos(configuraciones, codigos, elementos);






    

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE DATOS DE DETALLE DE APOYOS

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Json_detalle_nuevo
// DESCRIPCION..: Json de datos para iniciar captura de nuevo detalle  

var Json_detalle_nuevo = {"dato_0" : "2",
                        "dato_1" : " SIN GRABAR",
                        "dato_2" : "0"};

// OBJETO.......: Json
// INSTANCIA....: Json_detalle_vacio
// DESCRIPCION..: Json de datos para imprimir detalle vacio  

var Json_detalle_vacio = {"dato_0" : "0",
                        "dato_1" : "",
                        "dato_2" : "0"};

// CLASE........: Json
// INSTANCIA....: Json_datos_captura_detalle
// DESCRIPCION..: Json que recoge los valores de la consulta baja programas según una 
//                configuración. Tipo de fuente de los datos de entrada: 0 = Directo
//                lo recoge de un arreglo, 1 = Json consulta de consultas cada consulta tiene
//                dos objetos, 2 Json de una consulta tiene dos objetos, 3 = Json normal
//                de un solo objeto 

	var numeroElementos = 3;
	var tipoFuente = 2;
	var configuraciones = [numeroElementos, tipoFuente];

	var codigoJsonSalida = '';
	var codigoJsonFuente = '';
	var codigos = [codigoJsonSalida, codigoJsonFuente];
	
	var elementoValorFuente01 = [1, 'registros'];
	var elementoValorFuente02 = [2, 'dato_01'];
	var elementoValorFuente03 = [2, 'dato_03'];
	var elementosValoresFuentes = [elementoValorFuente01, elementoValorFuente02, elementoValorFuente03];
	var elementosTiposResultado = [0, 0, 0];
	var elementos = [elementosValoresFuentes, elementosTiposResultado];
	
	var Json_datos_captura_detalle = new Json(configuraciones, codigos, elementos);

// CLASE........: Datos
// INSTANCIA....: Datos_captura_detalle
// DESCRIPCION..: Objeto que determina cuales datos y donde se colocaran en la pantalla

	var numeroElementos = 3;
	var configuraciones = [numeroElementos];
	var codigos = [''];

	var elemento01 = '#IDXXX_2_4_1_1';
	var elemento02 = '#IDXXX_2_4_1_2';
	
	var elemento03 = '#IDXXXX_1_1_2_2';

	var elementosArea = [elemento01, elemento02, elemento03];
	var elementosImpresion = [0, 0, 0];
	var elemen01 = 0;
	var elemen02 = ' SIN GRABAR ';
	var elemen03 = '';
	var elementosValor = [elemen01, elemen02, elemen03];
// TIPOS DE FUENTES PARA TRATAR LOS DATOS DEPENDIENDO DE UNA CONFIGURACIÓN
// ESTOS SON LOS TIPOS 1 = 
	var elementosTipoFuente = [1, 4, 3];
	var elementosTipoValor01 = [[0, 'NO HAY REGISTRO SELECCIONADO'], [1, 'CONSULTANDO / MODIFICANDO REGISTRO'], [2, 'CAPTURANDO NUEVO DETALLE']];
	var elementosTipoValor02 = [0, 'DETALLE: '];
	var elementosTipoValor03 = ['d_cantidad'];
	var elementosTipoValor = [elementosTipoValor01, elementosTipoValor02, elementosTipoValor03];
	var elementosTipo = [elementosTipoFuente, elementosTipoValor];
	var elemenMe01 = '';
	var elemenMe02 = '';
	var elemenMe03 = '';
	var elementosMetodos = [elemenMe01, elemenMe02, elemenMe03];
	var elemCl01 = 'c_01';
	var elemCl02 = 'c_02';
	var elemCl03 = 'c_03';
	var elementosClass = [elemCl01, elemCl02, elemCl03];
	var elemId01 = 'ID_DATO_DETALLES_1';
	var elemId02 = 'ID_DATO_DETALLES_2';
	var elemId03 = 'ID_DATO_DETALLES_3';
	var elementosId = [elemId01, elemId02, elemId03];
	var elementos = [elementosArea, elementosImpresion, elementosValor, elementosTipo, elementosMetodos, elementosClass, elementosId];
	
	var Datos_captura_detalle = new Datos(configuraciones, codigos, elementos);
	




    


// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE DATOS DE MATERIALES

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Json_material_nuevo
// DESCRIPCION..: Json de datos para iniciar captura de nuevo material 

var Json_material_nuevo = {"dato_0" : "2",
                        "dato_1" : " SIN GRABAR",
                        "dato_2" : "",
                        "dato_3" : ""};

// OBJETO.......: Json
// INSTANCIA....: Json_material_vacio
// DESCRIPCION..: Json de datos para imprimir material vacio  

var Json_material_vacio = {"dato_0" : "0",
                        "dato_1" : "",
                        "dato_2" : "",
                        "dato_3" : ""};

// CLASE........: Json
// INSTANCIA....: Json_datos_captura_material
// DESCRIPCION..: Json que recoge los valores de la consulta baja programas según una 
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
	
	var elementoValorFuente01 = [1, 'registros'];
	var elementoValorFuente02 = [2, 'dato_01'];
	var elementoValorFuente03 = [2, 'dato_02'];
	var elementoValorFuente04 = [2, 'dato_03'];
	var elementosValoresFuentes = [elementoValorFuente01, elementoValorFuente02, elementoValorFuente03, elementoValorFuente04];
	var elementosTiposResultado = [0, 0, 0, 0];
	var elementos = [elementosValoresFuentes, elementosTiposResultado];
	
	var Json_datos_captura_material = new Json(configuraciones, codigos, elementos);

// CLASE........: Datos
// INSTANCIA....: Datos_captura_material
// DESCRIPCION..: Objeto que determina cuales datos y donde se colocaran en la pantalla

	var numeroElementos = 4;
	var configuraciones = [numeroElementos];
	var codigos = [''];

	var elemento01 = '#IDXXXX_2_4_1_1';
	var elemento02 = '#IDXXXX_2_4_1_2';
	
	var elemento03 = '#IDXXXXX_1_1_3';
	var elemento04 = '#IDXXXXX_1_1_4_2';

	var elementosArea = [elemento01, elemento02, elemento03, elemento04];
	var elementosImpresion = [0, 0, 0, 0];
	var elemen01 = 0;
	var elemen02 = ' SIN GRABAR ';
	var elemen03 = '';
	var elemen04 = '';
	var elementosValor = [elemen01, elemen02, elemen03, elemen04];
// TIPOS DE FUENTES PARA TRATAR LOS DATOS DEPENDIENDO DE UNA CONFIGURACIÓN
// ESTOS SON LOS TIPOS 1 = 
	var elementosTipoFuente = [1, 4, 2, 2];
	var elementosTipoValor01 = [[0, 'NO HAY REGISTRO SELECCIONADO'], [1, 'CONSULTANDO / MODIFICANDO REGISTRO'], [2, 'CAPTURANDO NUEVO MATERIAL']];
	var elementosTipoValor02 = [0, 'MATERIAL: '];
	var elementosTipoValor03 = ['m_descripcion'];
	var elementosTipoValor04 = ['m_unidad'];
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
	var elemId01 = 'ID_DATO_MATERIALES_1';
	var elemId02 = 'ID_DATO_MATERIALES_2';
	var elemId03 = 'ID_DATO_MATERIALES_3';
	var elemId04 = 'ID_DATO_MATERIALES_4';
	var elementosId = [elemId01, elemId02, elemId03, elemId04];
	var elementos = [elementosArea, elementosImpresion, elementosValor, elementosTipo, elementosMetodos, elementosClass, elementosId];
	
	var Datos_captura_material = new Datos(configuraciones, codigos, elementos);
	




    

// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
// &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ###### // &&&&& UUUUU %%%%%% ######
	
	




	
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE REGISTROS INICIALES

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************


// CONTROLES PROGRAMA xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// CONTROLES PROGRAMA xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

// CLASE........: Registro
// INSTANCIA....: Registro_status_programa
// DESCRIPCION..: Control del status del registro de programa 0 = no hay registro 1 = modificando
//                registro grabado 2 = capturando nuevo registro

	var valor = 0;
	var configuraciones = [valor];
	var Registro_status_programa = new Registro(configuraciones);

// CLASE........: Registro
// INSTANCIA....: Registro_id_programa
// DESCRIPCION..: Control del ID del registro de programa

	var valor = 0;
	var configuraciones = [valor];
	var Registro_id_programa = new Registro(configuraciones);

// CONTROLES APOYOS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// CONTROLES APOYOS xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

// CLASE........: Registro
// INSTANCIA....: Registro_status_apoyo
// DESCRIPCION..: Control del status del registro de apoyo 0 = no hay registro 1 = modificando
//                registro grabado 2 = capturando nuevo registro

	var valor = 0;
	var configuraciones = [valor];
	var Registro_status_apoyo = new Registro(configuraciones);

// CLASE........: Registro
// INSTANCIA....: Registro_id_apoyo
// DESCRIPCION..: Control del ID del registro de apoyo

	var valor = 0;
	var configuraciones = [valor];
	var Registro_id_apoyo = new Registro(configuraciones);

// CONTROLES DETALLE xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// CONTROLES DETALLE xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

// CLASE........: Registro
// INSTANCIA....: Registro_status_detalle
// DESCRIPCION..: Control del status del registro de detalle 0 = no hay registro 1 = modificando
//                registro grabado 2 = capturando nuevo registro

	var valor = 0;
	var configuraciones = [valor];
	var Registro_status_detalle = new Registro(configuraciones);

// CLASE........: Registro
// INSTANCIA....: Registro_id_detalle
// DESCRIPCION..: Control del ID del registro de detalle

	var valor = 0;
	var configuraciones = [valor];
	var Registro_id_detalle = new Registro(configuraciones);

// CONTROLES MATERIAL xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
// CONTROLES MATERIAL xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

// CLASE........: Registro
// INSTANCIA....: Registro_status_material
// DESCRIPCION..: Control del status del registro de material 0 = no hay registro 1 = modificando
//                registro grabado 2 = capturando nuevo registro

	var valor = 0;
	var configuraciones = [valor];
	var Registro_status_material = new Registro(configuraciones);

// CLASE........: Registro
// INSTANCIA....: Registro_id_material
// DESCRIPCION..: Control del ID del registro de material

	var valor = 0;
	var configuraciones = [valor];
	var Registro_id_material = new Registro(configuraciones);

///// TIPO DE GRABACIONES /////////////////////////
///// TIPO DE GRABACIONES /////////////////////////

// CLASE........: Registro
// INSTANCIA....: Registro_graba_programa
// DESCRIPCION..: Control de tipo de grabación

	var valor = 0;
	var configuraciones = [valor];
	var Registro_graba_programa = new Registro(configuraciones);

// CLASE........: Registro
// INSTANCIA....: Registro_graba_apoyo
// DESCRIPCION..: Control de tipo de grabación

	var valor = 0;
	var configuraciones = [valor];
	var Registro_graba_apoyo = new Registro(configuraciones);

// CLASE........: Registro
// INSTANCIA....: Registro_graba_detalle
// DESCRIPCION..: Control de tipo de grabación

	var valor = 0;
	var configuraciones = [valor];
	var Registro_graba_detalle = new Registro(configuraciones);

// CLASE........: Registro
// INSTANCIA....: Registro_graba_material
// DESCRIPCION..: Control de tipo de grabación

	var valor = 0;
	var configuraciones = [valor];
	var Registro_graba_material = new Registro(configuraciones);
	
	




	
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE CLASES

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************






// CLASE........: Clases
// INSTANCIA....: Clases_inicio
// DESCRIPCION..: Configuración de Clases interactivas del DOM iniciales

	var configuraciones = [0];
	
	var elementosClasesBase = [
// BOTONES PROGRAMA		
	'ID_3_2_2_1_CL_0',
	'ID_3_2_2_2_CL_1',
	'ID_3_2_2_3_CL_2',
	'ID_3_2_2_4_CL_3',
	'ID_3_2_2_5_CL_4',
// BOTONES APOYO
	'IDXX_3_2_2_1_CL_0',
	'IDXX_3_2_2_2_CL_1',
	'IDXX_3_2_2_3_CL_2',
	'IDXX_3_2_2_4_CL_3',
	'IDXX_3_2_2_5_CL_4',
	'IDXX_3_2_2_6_CL_5',
// BOTONES DETALLE
	'IDXXX_2_4_2_1_CL_0',
	'IDXXX_2_4_2_2_CL_1',
	'IDXXX_2_4_2_3_CL_2',
	'IDXXX_2_4_2_4_CL_3',
	'IDXXX_2_4_2_5_CL_4',
	'IDXXX_2_4_2_6_CL_5',
// BOTONES MATERIALES
	'IDXXXX_2_4_2_1_CL_0',
	'IDXXXX_2_4_2_2_CL_1',
	'IDXXXX_2_4_2_3_CL_2',
	'IDXXXX_2_4_2_4_CL_3',
	'IDXXXX_2_4_2_5_CL_4',
	'IDXXXX_2_4_2_6_CL_5',
// CAPTURA PROGRAMAS
	'IDX_1_1_2_CL_1',
	'IDX_1_1_3_CL_2',
	'IDX_1_1_4_CL_3',
	'IDX_1_2_2_CL_1',
// FILTROS APOYOS
	'IDXX_2_1_2_CL_1',
	'IDXX_2_1_3_CL_2',
	'IDXX_2_1_4_CL_3',
	'IDXX_2_1_5_CL_4',
	'IDXX_2_1_6_CL_5',
// CAPTURA APOYOS
	'IDXXX_1_1_2_CL_1',
	'IDXXX_1_1_3_CL_2',
	'IDXXX_1_1_4_CL_3',
	'IDXXX_1_2_2_CL_1',
// CAPTURA DE DETALLES	
	'IDXXXX_1_1_2_CL_1',
	'IDXXXX_1_1_3_CL_2',
// CAPTURA DE MATERIALES	
	'IDXXXXX_1_1_3_CL_2',
	'IDXXXXX_1_1_4_CL_3'


	];
	
	var elementosClases = [
		
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2']

	];
	
	var elementosClasesTipo = [
		
	[1],
	[1],
	[1],
	[1],
	[1],

	[1],
	[1],
	[1],
	[1],
	[1],
	[1],

	[1],
	[1],
	[1],
	[1],
	[1],
	[1],

	[1],
	[1],
	[1],
	[1],
	[1],
	[0],

	[1],
	[1],
	[1],
	[1],

	[1],
	[1],
	[1],
	[1],
	[1],

	[1],
	[1],
	[1],
	[1],

	[1],
	[1],

	[1],
	[1]

	];
	
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_inicio = new Clases(configuraciones, elementos);

// CLASE........: Clases
// INSTANCIA....: Clases_programa
// DESCRIPCION..: Configuración de Clases cuando se elige programa

var configuraciones = [0];
	
	var elementosClasesBase = [
// BOTONES PROGRAMA		
	'ID_3_2_2_1_CL_0',
	'ID_3_2_2_2_CL_1',
	'ID_3_2_2_3_CL_2',
	'ID_3_2_2_4_CL_3',
	'ID_3_2_2_5_CL_4',
// BOTONES APOYO
	'IDXX_3_2_2_1_CL_0',
	'IDXX_3_2_2_2_CL_1',
	'IDXX_3_2_2_3_CL_2',
	'IDXX_3_2_2_4_CL_3',
	'IDXX_3_2_2_5_CL_4',
	'IDXX_3_2_2_6_CL_5',
// BOTONES DETALLE
	'IDXXX_2_4_2_1_CL_0',
	'IDXXX_2_4_2_2_CL_1',
	'IDXXX_2_4_2_3_CL_2',
	'IDXXX_2_4_2_4_CL_3',
	'IDXXX_2_4_2_5_CL_4',
	'IDXXX_2_4_2_6_CL_5',
// CAPTURA PROGRAMAS
	'IDX_1_1_2_CL_1',
	'IDX_1_1_3_CL_2',
	'IDX_1_1_4_CL_3',
	'IDX_1_2_2_CL_1',
// FILTROS APOYOS
	'IDXX_2_1_2_CL_1',
	'IDXX_2_1_3_CL_2',
	'IDXX_2_1_4_CL_3',
	'IDXX_2_1_5_CL_4',
	'IDXX_2_1_6_CL_5',
// CAPTURA APOYOS
	'IDXXX_1_1_2_CL_1',
	'IDXXX_1_1_3_CL_2',
	'IDXXX_1_1_4_CL_3',
	'IDXXX_1_2_2_CL_1',
// CAPTURA DE DETALLES	
	'IDXXXX_1_1_2_CL_1',
	'IDXXXX_1_1_3_CL_2'

	];
	
	var elementosClases = [
		
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2']

	];
	
	var elementosClasesTipo = [
		
	[0],
	[0],
	[1],
	[0],
	[1],

	[1],
	[1],
	[1],
	[1],
	[1],
	[0],

	[1],
	[1],
	[1],
	[1],
	[1],
	[1],

	[0],
	[0],
	[0],
	[0],

	[0],
	[0],
	[0],
	[0],
	[0],

	[1],
	[1],
	[1],
	[1],

	[1],
	[1]

	];
	
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_programa = new Clases(configuraciones, elementos);

// CLASE........: Clases
// INSTANCIA....: Clases_programa_nuevo
// DESCRIPCION..: Configuración de Clases cuando se elige programa

	var configuraciones = [0];
	
	var elementosClasesBase = [
// BOTONES PROGRAMA		
	'ID_3_2_2_1_CL_0',
	'ID_3_2_2_2_CL_1',
	'ID_3_2_2_3_CL_2',
	'ID_3_2_2_4_CL_3',
	'ID_3_2_2_5_CL_4',
// BOTONES APOYO
	'IDXX_3_2_2_1_CL_0',
	'IDXX_3_2_2_2_CL_1',
	'IDXX_3_2_2_3_CL_2',
	'IDXX_3_2_2_4_CL_3',
	'IDXX_3_2_2_5_CL_4',
	'IDXX_3_2_2_6_CL_5',
// BOTONES DETALLE
	'IDXXX_2_4_2_1_CL_0',
	'IDXXX_2_4_2_2_CL_1',
	'IDXXX_2_4_2_3_CL_2',
	'IDXXX_2_4_2_4_CL_3',
	'IDXXX_2_4_2_5_CL_4',
	'IDXXX_2_4_2_6_CL_5',
// CAPTURA PROGRAMAS
	'IDX_1_1_2_CL_1',
	'IDX_1_1_3_CL_2',
	'IDX_1_1_4_CL_3',
	'IDX_1_2_2_CL_1',
// FILTROS APOYOS
	'IDXX_2_1_2_CL_1',
	'IDXX_2_1_3_CL_2',
	'IDXX_2_1_4_CL_3',
	'IDXX_2_1_5_CL_4',
	'IDXX_2_1_6_CL_5',
// CAPTURA APOYOS
	'IDXXX_1_1_2_CL_1',
	'IDXXX_1_1_3_CL_2',
	'IDXXX_1_1_4_CL_3',
	'IDXXX_1_2_2_CL_1',
// CAPTURA DE DETALLES	
	'IDXXXX_1_1_2_CL_1',
	'IDXXXX_1_1_3_CL_2'

	];
	
	var elementosClases = [
		
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2']

	];
	
	var elementosClasesTipo = [
		
	[1],
	[1],
	[0],
	[1],
	[0],

	[1],
	[1],
	[1],
	[1],
	[1],
	[1],

	[1],
	[1],
	[1],
	[1],
	[1],
	[1],

	[0],
	[0],
	[0],
	[0],

	[1],
	[1],
	[1],
	[1],
	[1],

	[1],
	[1],
	[1],
	[1],

	[1],
	[1]

	];
	
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_programa_nuevo = new Clases(configuraciones, elementos);

// CLASE........: Clases
// INSTANCIA....: Clases_apoyo
// DESCRIPCION..: Configuración de Clases cuando se elige apoyo

var configuraciones = [0];
	
	var elementosClasesBase = [
// BOTONES APOYO
	'IDXX_3_2_2_1_CL_0',
	'IDXX_3_2_2_2_CL_1',
	'IDXX_3_2_2_3_CL_2',
	'IDXX_3_2_2_4_CL_3',
	'IDXX_3_2_2_5_CL_4',
	'IDXX_3_2_2_6_CL_5',
// BOTONES DETALLE
	'IDXXX_2_4_2_1_CL_0',
	'IDXXX_2_4_2_2_CL_1',
	'IDXXX_2_4_2_3_CL_2',
	'IDXXX_2_4_2_4_CL_3',
	'IDXXX_2_4_2_5_CL_4',
	'IDXXX_2_4_2_6_CL_5',
// CAPTURA PROGRAMAS
	'IDX_1_1_2_CL_1',
	'IDX_1_1_3_CL_2',
	'IDX_1_1_4_CL_3',
	'IDX_1_2_2_CL_1',
// FILTROS APOYOS
	'IDXX_2_1_2_CL_1',
	'IDXX_2_1_3_CL_2',
	'IDXX_2_1_4_CL_3',
	'IDXX_2_1_5_CL_4',
	'IDXX_2_1_6_CL_5',
// CAPTURA APOYOS
	'IDXXX_1_1_2_CL_1',
	'IDXXX_1_1_3_CL_2',
	'IDXXX_1_1_4_CL_3',
	'IDXXX_1_2_2_CL_1',
// CAPTURA DE DETALLES	
	'IDXXXX_1_1_2_CL_1',
	'IDXXXX_1_1_3_CL_2'

	];
	
	var elementosClases = [
		
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2']

	];
	
	var elementosClasesTipo = [
		
	[0],
	[0],
	[1],
	[0],
	[1],
	[0],

	[1],
	[1],
	[1],
	[1],
	[1],
	[0],

	[0],
	[0],
	[0],
	[0],

	[0],
	[0],
	[0],
	[0],
	[0],

	[0],
	[0],
	[0],
	[0],

	[1],
	[1]

	];
	
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_apoyo = new Clases(configuraciones, elementos);

// CLASE........: Clases
// INSTANCIA....: Clases_apoyo_nuevo
// DESCRIPCION..: Configuración de Clases cuando se elige apoyo

	var configuraciones = [0];
	
	var elementosClasesBase = [
// BOTONES APOYO
	'IDXX_3_2_2_1_CL_0',
	'IDXX_3_2_2_2_CL_1',
	'IDXX_3_2_2_3_CL_2',
	'IDXX_3_2_2_4_CL_3',
	'IDXX_3_2_2_5_CL_4',
	'IDXX_3_2_2_6_CL_5',
// BOTONES DETALLE
	'IDXXX_2_4_2_1_CL_0',
	'IDXXX_2_4_2_2_CL_1',
	'IDXXX_2_4_2_3_CL_2',
	'IDXXX_2_4_2_4_CL_3',
	'IDXXX_2_4_2_5_CL_4',
	'IDXXX_2_4_2_6_CL_5',
// CAPTURA PROGRAMAS
	'IDX_1_1_2_CL_1',
	'IDX_1_1_3_CL_2',
	'IDX_1_1_4_CL_3',
	'IDX_1_2_2_CL_1',
// FILTROS APOYOS
	'IDXX_2_1_2_CL_1',
	'IDXX_2_1_3_CL_2',
	'IDXX_2_1_4_CL_3',
	'IDXX_2_1_5_CL_4',
	'IDXX_2_1_6_CL_5',
// CAPTURA APOYOS
	'IDXXX_1_1_2_CL_1',
	'IDXXX_1_1_3_CL_2',
	'IDXXX_1_1_4_CL_3',
	'IDXXX_1_2_2_CL_1',
// CAPTURA DE DETALLES	
	'IDXXXX_1_1_2_CL_1',
	'IDXXXX_1_1_3_CL_2'

	];
	
	var elementosClases = [
		
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2']

	];
	
	var elementosClasesTipo = [
		
	[1],
	[1],
	[0],
	[1],
	[0],
	[0],

	[1],
	[1],
	[1],
	[1],
	[1],
	[1],

	[0],
	[0],
	[0],
	[0],

	[0],
	[0],
	[0],
	[0],
	[0],

	[0],
	[0],
	[0],
	[0],

	[1],
	[1]

	];
	
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_apoyo_nuevo = new Clases(configuraciones, elementos);

// CLASE........: Clases
// INSTANCIA....: Clases_detalle
// DESCRIPCION..: Configuración de Clases cuando se elige detalle

	var configuraciones = [0];
	
	var elementosClasesBase = [
// BOTONES DETALLE
	'IDXXX_2_4_2_1_CL_0',
	'IDXXX_2_4_2_2_CL_1',
	'IDXXX_2_4_2_3_CL_2',
	'IDXXX_2_4_2_4_CL_3',
	'IDXXX_2_4_2_5_CL_4',
	'IDXXX_2_4_2_6_CL_5',
// CAPTURA DE DETALLES	
	'IDXXXX_1_1_2_CL_1',
	'IDXXXX_1_1_3_CL_2'

	];
	
	var elementosClases = [
		
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2']

	];
	
	var elementosClasesTipo = [
		
	[0],
	[0],
	[1],
	[0],
	[1],
	[0],

	[0],
	[0]

	];
	
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_detalle = new Clases(configuraciones, elementos);

// CLASE........: Clases
// INSTANCIA....: Clases_detalle_nuevo
// DESCRIPCION..: Configuración de Clases cuando se elige detalle

	var configuraciones = [0];
	
	var elementosClasesBase = [
// BOTONES DETALLE
	'IDXXX_2_4_2_1_CL_0',
	'IDXXX_2_4_2_2_CL_1',
	'IDXXX_2_4_2_3_CL_2',
	'IDXXX_2_4_2_4_CL_3',
	'IDXXX_2_4_2_5_CL_4',
	'IDXXX_2_4_2_6_CL_5',
// CAPTURA DE DETALLES	
	'IDXXXX_1_1_2_CL_1',
	'IDXXXX_1_1_3_CL_2'

	];
	
	var elementosClases = [
		
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2']

	];
	
	var elementosClasesTipo = [
		
	[1],
	[1],
	[0],
	[1],
	[0],
	[0],

	[0],
	[0]

	];
	
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_detalle_nuevo = new Clases(configuraciones, elementos);

// CLASE........: Clases
// INSTANCIA....: Clases_material
// DESCRIPCION..: Configuración de Clases interactivas del DOM iniciales

	var configuraciones = [0];
	
	var elementosClasesBase = [
// BOTONES MATERIALES
	'IDXXXX_2_4_2_1_CL_0',
	'IDXXXX_2_4_2_2_CL_1',
	'IDXXXX_2_4_2_3_CL_2',
	'IDXXXX_2_4_2_4_CL_3',
	'IDXXXX_2_4_2_5_CL_4',
	'IDXXXX_2_4_2_6_CL_5',
// CAPTURA DE MATERIALES	
	'IDXXXXX_1_1_3_CL_2',
	'IDXXXXX_1_1_4_CL_3'


	];
	
	var elementosClases = [
		
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2']

	];
	
	var elementosClasesTipo = [
		
	[0],
	[0],
	[1],
	[0],
	[1],
	[0],

	[0],
	[0]

	];
	
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_material = new Clases(configuraciones, elementos);

// CLASE........: Clases
// INSTANCIA....: Clases_material_inicio
// DESCRIPCION..: Configuración de Clases interactivas del DOM iniciales

	var configuraciones = [0];
	
	var elementosClasesBase = [
// BOTONES MATERIALES
	'IDXXXX_2_4_2_1_CL_0',
	'IDXXXX_2_4_2_2_CL_1',
	'IDXXXX_2_4_2_3_CL_2',
	'IDXXXX_2_4_2_4_CL_3',
	'IDXXXX_2_4_2_5_CL_4',
	'IDXXXX_2_4_2_6_CL_5',
// CAPTURA DE MATERIALES	
	'IDXXXXX_1_1_3_CL_2',
	'IDXXXXX_1_1_4_CL_3'


	];
	
	var elementosClases = [
		
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2'],

	['disabled_2'],
	['disabled_2']

	];
	
	var elementosClasesTipo = [
		
	[1],
	[1],
	[0],
	[1],
	[0],
	[0],

	[0],
	[0]

	];
	
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_material_nuevo = new Clases(configuraciones, elementos);






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE METODOS INICIALES

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Consulta_gradilla
// DESCRIPCION..: Consulta que se ejecuta para actualizar gradilla desde la BD
	
	var statusConsulta = 0;
	var scriptPhp = 'consulta_gradilla_programas.php';
	var metodoPhp = 'POST';
	var filtro = ['', ''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_gradilla.ejecuta()'];
	var metodosCallback02 = ['Metodos_gradilla_graba.ejecuta()'];
	var metodosCallback = [metodosCallback01, metodosCallback02]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_gradilla = new Consulta(configuraciones, codigos, elementos);

//	alert("INICIO PROCESO DE CONSULTAS INICIALES ESTOY VIVO");
	Modal_apoyos.abrefijo();
	Consulta_gradilla.actualizafiltro(0, usuarioStatus);
	Consulta_gradilla.actualizafiltro(1, usuarioID);
	Consulta_gradilla.posicion_callback(0);
	Consulta_gradilla.ejecuta_2();

// CLASE........: Navega
// INSTANCIA....: Navega_programas
// DESCRIPCION..: Desplaza la pantalla a un apuntador de detalle
	
	var destino = '#ID_TRABAJO_CABEZA_TITULO';
	var configuraciones = [destino];
	var Navega_programas = new Navega(configuraciones, codigos, elementos);

// CLASE........: Navega
// INSTANCIA....: Navega_apoyos
// DESCRIPCION..: Desplaza la pantalla a un apuntador de detalle
	
	var destino = '#IDXX_1_1';
	var configuraciones = [destino];
	var Navega_apoyos = new Navega(configuraciones, codigos, elementos);

// CLASE........: Navega
// INSTANCIA....: Navega_detalles
// DESCRIPCION..: Desplaza la pantalla a un apuntador de detalle
	
	var destino = '#IDXXX_2_1';
	var configuraciones = [destino];
	var Navega_detalles = new Navega(configuraciones, codigos, elementos);

// CLASE........: Navega
// INSTANCIA....: Navega_materiales
// DESCRIPCION..: Desplaza la pantalla a un apuntador de detalle
	
	var destino = '#IDXXXX_2_1';
	var configuraciones = [destino];
	var Navega_materiales = new Navega(configuraciones, codigos, elementos);

// CLASE........: Navega
// INSTANCIA....: Navega_general
// DESCRIPCION..: Desplaza la pantalla a un apuntador de detalle
	
	var destino = '';	
	var configuraciones = [destino];
	var Navega_general = new Navega(configuraciones, codigos, elementos);

// METODO.......: redimensiona()
// INSTANCIA....: Pantalla_sdhybc_apoyos
// DESCRIPCION..: Obtiene las dimensiones de la pantalla al iniciar por primera vez

	Pantalla_sdhybc_apoyos.redimensiona();

</script>