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
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS usuarios.php';
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
		<link rel="stylesheet" href="../css/sdhybc_usuarios.css">
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
    <body class="maqueta_base" id="ID_SDHYBC_USUARIOS_BODY">
        USUARIOS SDHYBC 
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

	var idCode = 5;
	var statusSessiono = [1, 2];
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
// INSTANCIA....: Pantalla_sdhybc_usuarios
// DESCRIPCION..: Objeto para almacenar información general de la pantalla
	
	var objetos_pantalla = [];
	var ancho = 0;
	var alto = 0;
	var posicion = 0;
	var breaks = [0, 800];
	var metodosbreaks = ['Metodos_resize.ejecuta()', 'Metodos_resize.ejecuta()'];
	var dimensiones = [ancho, alto, posicion, breaks, metodosbreaks];
	var configuraciones = [dimensiones];
	var Pantalla_sdhybc_usuarios = new Pantalla(idioma, 5, "usuarios.php", "SDHYBC USUARIOS", "", "", objetos_pantalla, "", Sistema_sdhybc, "../index.php", configuraciones);

	Pantalla_sdhybc_usuarios.dimensiona();

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
	var elementos = ['Gradilla_usuarios.generahtml()', 'Gradilla_usuarios.imprimehtml()'];
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
// SE INSERTA EN: #ID_SDHYBC_USUARIOS_BODY	
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
	var etiquetas = ["maqueta_01", "ID_GEN_MAQUETA", "#ID_SDHYBC_USUARIOS_BODY"];
	var codigos = [""];
	var elementosClass = ["area_cinta", "area_cabeza", "area_cuerpo", "area_pie", "modal_oculto", "modal_oculto"];
	var elementosId = ["ID_GEN_STATUS", "ID_GEN_CABEZA", "ID_GEN_CUERPO", "ID_GEN_PIE", "ID_GEN_MODAL", "ID_GEN_MODAL_OPCION"];
	var elementos = [elementosClass, elementosId];
	var maqueta_01 = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	maqueta_01.generahtml();
	maqueta_01.imprimehtml();

// CLASE........: Modal
// INSTANCIA....: Modal_usuarios
// ID...........: ID_SDHYBC_MODAL
// SE INSERTA EN: #ID_SDHYBC_USUARIOS_BODY	
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
	var etiquetas = ["ventana_modal", "ID_SDHYBC_MODAL", "#ID_SDHYBC_USUARIOS_BODY", "#ID_SDHYBC_MODAL_TITULO", "#ID_SDHYBC_MODAL_AVISO"];
	var codigos = [""];
	var Modal_usuarios = new Modal(configuraciones, etiquetas, codigos);
	Modal_usuarios.generahtml();
	Modal_usuarios.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_usuarios_modal
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
	var Maqueta_usuarios_modal = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_usuarios_modal.generahtml();
	Maqueta_usuarios_modal.imprimehtml();

// CLASE........: Modal
// INSTANCIA....: Modal_usuarios_opcion
// ID...........: ID_SDHYBC_MODAL_OPCION
// SE INSERTA EN: #ID_SDHYBC_USUARIOS_BODY	
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
	var etiquetas = ["ventana_modal", "ID_SDHYBC_MODAL_OPCION", "#ID_SDHYBC_USUARIOS_BODY", "#ID_SDHYBC_MODAL_OPCION_TITULO", "#ID_SDHYBC_MODAL_OPCION_AVISO"];
	var codigos = [""];
	var Modal_usuarios_opcion = new Modal(configuraciones, etiquetas, codigos);
	Modal_usuarios_opcion.generahtml();
	Modal_usuarios_opcion.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_usuarios_modal_opcion
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
	var Maqueta_usuarios_modal_opcion = new Maqueta(configuraciones, etiquetas, codigos, elementos);

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
	var onclickMetodos = ['Modal_usuarios_opcion.cierra()'];
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
	var statusCinco = [0, 0, 0, 0, 0]; 
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
	
	var inglesIdioma = ["USUARIOS", ""];
	var espanolIdioma = ["USUARIOS", ""];
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
// INSTANCIA....: Panel_usuarios
// ID...........: ID_TRABAJO_ESCRITORIO_MAQUETA
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO	
// DESCRIPCION..: Panel para organizar las sub areas generales de trabajo
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido
	
    var tipoImpresion = 0;
	var nivel = [];
	var configuraciones = [tipoImpresion, nivel];
	var etiquetas = ['areas_registro_usuarios area_paneles', 'ID', '#ID_TRABAJO_ESCRITORIO'];
	var elemento01 = ['ELIGE UN USUARIO O CREA UN REGISTRO NUEVO'];
	var elemento02 = ['AREA GRADILLA USUARIOS'];
    var elemento03_01 = 'AREA DE CAPTURA USUARIOS';
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
	
	var elemento03_03_01_01 = 'DATOS GENERALES';
	
	var elemento03_03_01_02_01 = 'NOMBRE:';
	var elemento03_03_01_02_02 = 'XX';
	var elemento03_03_01_02 = [elemento03_03_01_02_01, elemento03_03_01_02_02];

	var elemento03_03_01_03_01 = 'PRIMER APELLIDO:';
	var elemento03_03_01_03_02 = 'XX';
	var elemento03_03_01_03 = [elemento03_03_01_03_01, elemento03_03_01_03_02];

	var elemento03_03_01_04_01 = 'SEGUNDO APELLIDO:';
	var elemento03_03_01_04_02 = 'XX';
	var elemento03_03_01_04 = [elemento03_03_01_04_01, elemento03_03_01_04_02];

	var elemento03_03_01 = [elemento03_03_01_01, elemento03_03_01_02, elemento03_03_01_03, elemento03_03_01_04];
	
	var elemento03_03_02_01 = 'ACCESO';

	var elemento03_03_02_02_01 = 'CORREO:';
	var elemento03_03_02_02_02 = 'XX';
	var elemento03_03_02_02 = [elemento03_03_02_02_01, elemento03_03_02_02_02];

	var elemento03_03_02_03_01 = 'NIVEL:';
	var elemento03_03_02_03_02 = 'XX';
	var elemento03_03_02_03 = [elemento03_03_02_03_01, elemento03_03_02_03_02];

	var elemento03_03_02_04_01 = 'CONFIRMACIÓN:';
	var elemento03_03_02_04_02 = 'XX';
	var elemento03_03_02_04 = [elemento03_03_02_04_01, elemento03_03_02_04_02];

	var elemento03_03_02 = [elemento03_03_02_01, elemento03_03_02_02, elemento03_03_02_03, elemento03_03_02_04];
	
	var elemento03_03 = [elemento03_03_01, elemento03_03_02];

	var elemento03 = [elemento03_01, elemento03_02, elemento03_03];
    var elementos = [elemento01, elemento02, elemento03];
    var codigos = [''];
    var Panel_usuarios = new Panel(configuraciones, etiquetas, codigos, elementos);
    Panel_usuarios.generahtml_r();
    Panel_usuarios.imprimehtml();

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

// BLOQUE AREA GRADILLA USUARIOS

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
		var scriptPhp = 'consulta_gradilla_usuarios.php';
		var metodoPhp = 'POST';
		var filtro = [];
		var posicionCallback = 0;
		var metodosCallback01 = ['Metodos_gradilla.ejecuta()'];
		var metodosCallback = [metodosCallback01]; 
		var callback = [posicionCallback, metodosCallback];
		var lotes = [0, 5000, 0, 0];
		var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
		var codigos = ['', ''];
		var elementos = [''];	
		var Consulta_gradilla = new Consulta(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_gradilla
	// DESCRIPCION..: Metodos que se ejecutan despues de actualizar y filtrar gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = ['Modal_usuarios.cierra()',
		'Gradilla_usuarios.generahtml()',
		'Gradilla_usuarios.imprimehtml()'];
		var Metodos_gradilla = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Gradilla
	// INSTANCIA....: Gradilla_usuarios
	// ID...........: ID_TRABAJO_ESCRITORIO_MAQUETA_2_3_1
	// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_2_3	
	// DESCRIPCION..: Gradilla de usuarios
	// HTML.........: Espera metodo
	// IMPRESION....: Espera metodo, sustituye contenido
	
		var inglesElementos = ['ID', 'NOMBRE', 'PRIMER APELLIDO', 'SEGUNDO APELLIDO', 'CORREO', 'ACCESO', 'MEMBRESÍA', 'ÚLTIMO INGRESO', 'CÉDULAS', 'FIRM', 'CONF'];
		var inglesIdioma = [inglesElementos, 'PROGRAMS LIST'];
		var espanolElementos = ['ID', 'NOMBRE', 'PRIMER APELLIDO', 'SEGUNDO APELLIDO', 'CORREO', 'ACCESO', 'MEMBRESÍA', 'ÚLTIMO INGRESO', 'CÉDULAS', 'FIRM', 'CONF'];
		var espanolIdioma = [espanolElementos, 'LISTA DE USUARIOS'];
		var arregloIdioma = [inglesIdioma, espanolIdioma];
		var controlIdioma = [idioma, arregloIdioma];
		var numeroElementos = 11;
		var tipoImpresion = 0;
		var consulta = Consulta_gradilla;
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
		var metodoValor = 'Gradilla_usuarios.actualiza_valores';
		var tipoValorArreglo = [0];
		var datoValorArreglo = [0];
		var valorArreglo = [tipoValorArreglo, datoValorArreglo];
		var valores = [valorIncialClave, valorClave, valorInicialPosicion, valorPosicion, valorInicialCelda, valorCelda, metodoValor, valorArreglo];
		var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, consulta, parametros, titulo, orientacion, controles, valores];
		var etiquetas = ['gradilla', 'ID_GRADILLA', '#ID_2_1'];
		var elementos_tipo_valor = [0, 0, 0, 0, 0, 2, 0, 0, 0, 2, 2];
		var elementos_llave_valor = ['dato_01', 'dato_02', 'dato_03', 'dato_04', 'dato_05', 'dato_06', 'dato_07', 'dato_08', 'dato_09', 'dato_10', 'dato_11'];
		var elementos_ancho_valor = ['cinco', 'diez', 'diez', 'diez', 'veinticinco', 'cinco', 'diez', 'diez', 'cinco', 'cinco', 'cinco'];
		var elementos_metodos = ['Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()'];
		var elementos_iconos = ['', '', '', '', '', '', '', '', '', '', ''];
		var elementos_trans = ['', '', '', '', '', [[1, 2, 3, 4, 5], ['ADM', 'ORG', 'CAP', 'VIS', 'SIN']], '', '', '', [[0, 1], ['NO', 'SI']], [[0, 1], ['NO', 'SI']]];
		var elementos = [elementos_tipo_valor, elementos_llave_valor, elementos_ancho_valor, elementos_metodos, elementos_iconos, elementos_trans];
		var codigos = [''];
		var Gradilla_usuarios = new Gradilla(configuraciones, etiquetas, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_avanzagrid
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige avanzar una pagina en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = ['Gradilla_usuarios.avanza()',
		'Gradilla_usuarios.generahtml()',
		'Gradilla_usuarios.imprimehtml()'];
		var Metodos_avanzagrid = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_inicio_posicion
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir a primera pagina en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = ['Gradilla_usuarios.inicializa_posicion()',
		'Gradilla_usuarios.generahtml()',
		'Gradilla_usuarios.imprimehtml()'];
		var Metodos_inicio_posicion = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_retrocedegrid
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir una pagina atras en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = ['Gradilla_usuarios.retrocede()',
		'Gradilla_usuarios.generahtml()',
		'Gradilla_usuarios.imprimehtml()'];
		var Metodos_retrocedegrid = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_final_posicion
	// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir a última pagina en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = ['Gradilla_usuarios.finaliza_posicion()',
		'Gradilla_usuarios.generahtml()',
		'Gradilla_usuarios.imprimehtml()'];
		var Metodos_final_posicion = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_elige_grid
	// DESCRIPCION..: Metodos que se ejecutan al elegir un registro en la gradilla
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
		
		
		'Modal_usuarios.abrefijo()',
		'Consulta_baja_registro.actualizafiltro(0, Gradilla_usuarios.configuraciones[8][1])',
		'Consulta_baja_registro.posicion_callback(0)',
		'Consulta_baja_registro.ejecuta()']
		var Metodos_elige_grid = new Metodos(configuraciones, codigos, elementos);
	
	// CLASE........: Consulta
	// INSTANCIA....: Consulta_baja_registro
	// DESCRIPCION..: Consulta que se ejecuta para traer desde la BD un registro elegido en gradilla
	
		var statusConsulta = 0;
		var scriptPhp = 'consulta_baja_usuarios.php';
		var metodoPhp = 'POST';
		var filtro = [''];
		var posicionCallback = 0;
		var metodosCallback01 = ['Metodos_baja.ejecuta()'];
		var metodosCallback02 = ['Metodos_graba_baja.ejecuta()'];
		var metodosCallback03 = ['Metodos_actualiza_baja.ejecuta()'];
		var metodosCallback04 = ['Metodos_refresca_localidad_c.ejecuta()'];
		var metodosCallback = [metodosCallback01, metodosCallback02, metodosCallback03, metodosCallback04]; 
		var callback = [posicionCallback, metodosCallback];
		var lotes = [0, 5000, 0, 0];
		var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
		var codigos = ['', ''];
		var elementos = [''];	
		var Consulta_baja_registro = new Consulta(configuraciones, codigos, elementos);
	
	// CLASE........: Metodos
	// INSTANCIA....: Metodos_baja
	// DESCRIPCION..: Metodos que se ejecutan despues de ejecutar consulta de usuario
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
		
		'Modal_usuarios.cierra()',
		'Registro_id.recibe_status(Gradilla_usuarios.configuraciones[8][1])',
		'Registro_usuario.recibe_status(1)',
		'Json_datos_captura.recibe_json(Consulta_baja_registro.codigos[0])',
		'Json_datos_captura.genera()',
		'Datos_captura.imprime_natural(Json_datos_captura.codigos[0])',
		'Clases_modificando.afectar()',
		'Registro_correo.recibe_status(document.getElementById("ID_DATO_6_5_INPUT_TEXT").value)',
		'Evaluacion_verifica_id.recibe_validacion([0, usuarioID])',
		'Evaluacion_verifica_id.recibe_especial(0, 0, Registro_id.configuraciones[0])',
		'Evaluacion_verifica_id.ejecuta()'

		];
		var Metodos_baja = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_verifica_id
// DESCRIPCION..: Evalua si hay persistencia de id 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Clases_aparecer_confirma.afectar()', 'Clases_ocultar_confirma.afectar()'];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [1];
	var especialesElementos = [[""]];
	var retornoElementos = [[0]];
	var mensajesElementos = [['CUENTA PROPIA']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_verifica_id = new Evaluacion(configuraciones, elementos);









// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Eliminar_usuario
// ID...........: ID_BOTON_ELIMINAR
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_X_1_2_1	
// DESCRIPCION..: Link con metodos e icono para eliminar registro de usuario ya existente
// HTML.........: Cuando es creado de manera disabled
// IMPRESION....: Cuando es creado sustituye contenidos y se inserta en contenedor oculto
//                la primera vez

    var titulosIngles = ['ELIMINAR USUARIO'];
	var iconosIngles = ['fa-solid fa-trash-can'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['ELIMINAR USUARIO'];
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
	var etiquetas = ["boton_eliminar boton_link_icono_chico", "ID_BOTON_ELIMINAR", "#ID_3_2_2_1", "elimina_usuario"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_elimina_usuario.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Eliminar_usuario = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Eliminar_usuario.generahtml();
	Eliminar_usuario.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Actualizar_usuario
// ID...........: ID_BOTON_ACTUALIZAR
// SE INSERTA EN: ##ID_3_2_2_2	
// DESCRIPCION..: Link con metodos e icono para actualizar registro de usuario ya existente
// HTML.........: Cuando es creado de manera disabled
// IMPRESION....: Cuando es creado sustituye contenidos y se inserta en contenedor oculto
//                la primera vez

	var titulosIngles = ['ACTUALIZAR USUARIO'];
	var iconosIngles = ['fa-solid fa-floppy-disk'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['ACTUALIZAR USUARIO'];
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
	var etiquetas = ["boton_actualizar boton_link_icono_chico", "ID_BOTON_ACTUALIZAR", "#ID_3_2_2_2", "actualiza_usuario"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_evalua_usuario_actualiza.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Actualizar_usuario = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Actualizar_usuario.generahtml();
	Actualizar_usuario.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Grabar_usuario
// ID...........: ID_BOTON_GRABAR
// SE INSERTA EN: ##ID_3_2_2_3	
// DESCRIPCION..: Link con metodos e icono para grabar registro de usuario nuevo
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado sustituye contenidos

	var titulosIngles = ['GRABAR USUARIO'];
	var iconosIngles = ['fa-solid fa-floppy-disk'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['GRABAR USUARIO'];
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
	var etiquetas = ["boton_grabar boton_link_icono_chico", "ID_BOTON_GRABAR", "#ID_3_2_2_3", "graba_usuario"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_evalua_usuario.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Grabar_usuario = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Grabar_usuario.generahtml();
	Grabar_usuario.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Reestablece_usuarios
// ID...........: ID_BOTON_REESTABLECE
// SE INSERTA EN: #ID_3_2_2_3	
// DESCRIPCION..: Link con metodos e icono para reestablecer valores de la usuarios
//                cuando se esta modificando un registro de usuario
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
	var etiquetas = ["boton_reestablece boton_link_icono_chico", "ID_BOTON_REESTABLECE", "#ID_3_2_2_4", "reestablece_usuarios"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_elige_grid.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Reestablece_usuarios = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Reestablece_usuarios.generahtml();
	Reestablece_usuarios.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Limpia_usuarios
// ID...........: ID_BOTON_LIMPIA
// SE INSERTA EN: #ID_3_2_2_5	
// DESCRIPCION..: Link con metodos e icono para limpiar la usuarios usuariosndo nueva usuario
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
	var etiquetas = ["boton_limpia boton_link_icono_chico", "ID_BOTON_LIMPIA", "#ID_3_2_2_5", "limpia_usuarios"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_limpia.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Limpia_usuarios = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Limpia_usuarios.generahtml();
	Limpia_usuarios.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Nueva_captura
// ID...........: ID_BOTON_NUEVA
// SE INSERTA EN: #ID_3_2_2_6	
// DESCRIPCION..: Link con metodos e icono para abrir captura a un nuevo registro de usuario
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido

	var titulosIngles = ['CAPTURAR NUEVO USUARIO'];
	var iconosIngles = ['fa-solid fa-plus'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['CAPTURAR NUEVO USUARIO'];
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
	var onclickMetodos = ['Metodos_nueva.ejecuta()'];
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

// BLOQUE ELIMINA USUARIO

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_elimina_usuario
// DESCRIPCION..: Metodos que se ejecutan al elegir eliminar registro de usuario

    var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	
	'Modal_usuarios.abrefijo()',
	'Consulta_verifica_usuario_cedulas.actualizafiltro(0, Registro_id.configuraciones[0])',
	'Consulta_verifica_usuario_cedulas.posicion_callback(0)',
	'Consulta_verifica_usuario_cedulas.ejecuta()'
	
	];
	var Metodos_elimina_usuario = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_verifica_usuario_cedulas
// DESCRIPCION..: Consulta que se ejecuta para examinar numero de cedulas del usuario

	var statusConsulta = 0;
	var scriptPhp = 'consulta_verifica_usuario_cedulas.php';
	var metodoPhp = 'POST';
	var filtro = [''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_verifica_usuario_cedulas.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_verifica_usuario_cedulas = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_verifica_usuario_cedulas
// DESCRIPCION..: Metodos que se ejecutan despues de verificar cedulas de usuario

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
	'Modal_usuarios.cierra()',
	'Evaluacion_eliminar_usuario_cedulas.recibe_validacion([0, Consulta_verifica_usuario_cedulas.codigos[0][0][1].dato_01])',
	'Evaluacion_eliminar_usuario_cedulas.ejecuta()'

	];

	var Metodos_after_verifica_usuario_cedulas = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_eliminar_usuario_cedulas
// DESCRIPCION..: Evalua el resultado de la verificación de cedulas de usuario para eliminar 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_modal_usuario_cedulas_no_borra.ejecuta()', 'Metodos_confirma_elimina_usuario.ejecuta()'];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [1];
	var especialesElementos = [["0"]];
	var retornoElementos = [[0]];
	var mensajesElementos = [['USUARIO CON CÉDULAS']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_eliminar_usuario_cedulas = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_usuario_cedulas_no_borra
// DESCRIPCION..: Modal para avisar que no se puede eliminar usuario con cedulas
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_usuarios_modal_opcion.contenido([0, "USUARIO CON CÉDULAS"])',
	'Maqueta_usuarios_modal_opcion.contenido([1, "NO PUEDO ELIMINAR USUARIO CON CÉDULAS ASOCIADAS"])',
	'Maqueta_usuarios_modal_opcion.generahtml()',
	'Maqueta_usuarios_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_usuarios_opcion.abrefijo()'];
	var Metodos_modal_usuario_cedulas_no_borra = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_confirma_elimina_usuario
// DESCRIPCION..: Metodos que se ejecutan al elegir eliminar usuario 
//                existente

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	
	'Maqueta_usuarios_modal_opcion.contenido([0, "CONFIRMA ELIMINAR USUARIO"])',
	'Maqueta_usuarios_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE ELIMINAR EL USUARIO: "+Consulta_baja_registro.codigos[0][0][1].dato_02+" "+Consulta_baja_registro.codigos[0][0][1].dato_03+" "+Consulta_baja_registro.codigos[0][0][1].dato_04+" CON EL CORREO: "+Consulta_baja_registro.codigos[0][0][1].dato_05])',
	'Maqueta_usuarios_modal_opcion.generahtml()',
	'Maqueta_usuarios_modal_opcion.imprimehtml()',
	'Si_elimina_modal.generahtml()',
	'Si_elimina_modal.imprimehtml()',
	'No_elimina_modal.generahtml()',
	'No_elimina_modal.imprimehtml()',
	'Modal_usuarios_opcion.abrefijo()'

	];
	var Metodos_confirma_elimina_usuario = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_elimina_modal
// ID...........: ID_SI_ELIMINA_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de eliminar
//                registro de usuario en modificación
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_ELIMINA_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_elimina_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_usuarios_opcion.cierra(), Metodos_confirma_si_elimina_usuario.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_elimina_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Elemento
// INSTANCIA....: No_elimina_modal
// ID...........: ID_NO_ELIMINA_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en eliminar 
//                usuario en modificación
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
	var etiquetas = ["boton_link_icono_chico", "ID_NO_ELIMINAR_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "no_eliminar_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_usuarios_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_elimina_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_confirma_si_elimina_usuario
// DESCRIPCION..: Metodos que se ejecutan despues de elegir si confirma eliminar usuario 

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
	'Modal_usuarios.abrefijo()',
	'Consulta_elimina_usuario.actualizafiltro(0, Registro_id.configuraciones[0])',
	'Consulta_elimina_usuario.posicion_callback(0)',
	'Consulta_elimina_usuario.ejecuta()'
	
	];
	var Metodos_confirma_si_elimina_usuario = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_elimina_usuario
// DESCRIPCION..: Consulta que se ejecuta para eliminar usuario

	var statusConsulta = 0;
	var scriptPhp = 'consulta_eliminar_usuario.php';
	var metodoPhp = 'POST';
	var filtro = ['1'];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_elimina_usuario.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_elimina_usuario = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_elimina_usuario
// DESCRIPCION..: Metodos que se ejecutan despues de eliminar usuario

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_usuarios.cierra()',
	'Maqueta_usuarios_modal_opcion.contenido([0, "USUARIO ELIMINADO"])',
	'Maqueta_usuarios_modal_opcion.contenido([1, "EL USUARIO CON EL ID: "+Registro_id.configuraciones[0]+": "+document.getElementById(`ID_DATO_3_2_INPUT_TEXT`).value+" "+document.getElementById(`ID_DATO_4_3_INPUT_TEXT`).value+" "+document.getElementById(`ID_DATO_5_4_INPUT_TEXT`).value+" CON EL CORREO: "+document.getElementById(`ID_DATO_6_5_INPUT_TEXT`).value+" FUE ELIMINADO EXITOSAMENTE"])',
	'Metodos_limpia.ejecuta()',
	'Modal_usuarios.abrefijo()',
	'Consulta_gradilla.limpia_codigos()',
	'Consulta_gradilla.inicializa_parametros()',
	'Consulta_gradilla.ejecuta_2()',
	'Maqueta_usuarios_modal_opcion.generahtml()',
	'Maqueta_usuarios_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_usuarios_opcion.abrefijo()'
		
	];
	var Metodos_after_elimina_usuario = new Metodos(configuraciones, codigos, elementos);
	




    

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE LIMPIA USUARIO

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// DESCRIPCION..: Metodos que se ejecutan al elegir limpiar una usuarios de usuario nueva

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Registro_usuario.recibe_status(2)',
		'Registro_id.recibe_status(0)',
    	'Clases_nuevo.afectar()',
		'Datos_captura.imprime_natural(Json_usuario_nuevo)',
		'Registro_correo.recibe_status("")'
	
	];
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

// BLOQUE REESTABLECER USUARIO

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// DESCRIPCION..: Metodos que se ejecutan al elegir reestablecer valores de usuarios de usuario 
//                existente

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Maqueta_usuarios_modal_opcion.contenido([0, "CONFIRMA REESTABLECER VALORES DE USUARIO"])',
	'Maqueta_usuarios_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE REESTABLECER LOS VALORES GRABADOS DE LA USUARIO: "+Json_datos_captura.codigos[0].dato_1+". LOS CAMBIOS EN LOS VALORES DE LA CAPTURA QUE NO ESTEN GRABADOS SE PERDERAN. ESTE PROCESO NO PUEDE REESTABLECER LOS VALORES ORIGINALES DE MUNICIPIO Y LOCALIDAD QUE HAYA SIDO ACTUALIZADOS EN ESTA SESIÓN."])',
	'Maqueta_usuarios_modal_opcion.generahtml()',
	'Maqueta_usuarios_modal_opcion.imprimehtml()',
	'Si_reestablece_modal.generahtml()',
	'Si_reestablece_modal.imprimehtml()',
	'No_reestablece_modal.generahtml()',
	'No_reestablece_modal.imprimehtml()',
	'Modal_usuarios_opcion.abrefijo()'];
	var Metodos_confirma_reestablece = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_reestablece_modal
// ID...........: ID_SI_REESTABLECE_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de reestablecer
//                valores originales de registro de usuario en modificación
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
	var onclickMetodos = ['Modal_usuarios_opcion.cierra(), Metodos_reestablece_valores.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_reestablece_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Elemento
// INSTANCIA....: No_reestablece_modal
// ID...........: ID_NO_REESTABLECE_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en confirmación de reestablecer 
//                valores originales de usuario en modificación
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
	var onclickMetodos = ['Modal_usuarios_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_reestablece_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_reestablece_valores
// DESCRIPCION..: Metodos que se ejecutan despues de elegir si reestablecer valores 
//                valores originales de usuario en modificación

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Modal_usuarios.abrefijo()',
	'Consulta_baja_registro.actualizafiltro(0, Json_datos_captura.codigos[0].dato_1)',
	'Consulta_baja_registro.posicion_callback(0)',
	'Consulta_baja_registro.ejecuta()',
	'Registro_usuario.recibe_status(0)',
	'Clases_disabled_usuario.afectar()',
	'Modal_usuarios.cierra()'];
	var Metodos_reestablece_valores = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_nueva
// DESCRIPCION..: Metodos que se ejecutan al elegir capturar nuevo usuario

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Registro_usuario.recibe_status(2)',
	'Registro_id.recibe_status(0)',
    'Clases_nuevo.afectar()',
	'Datos_captura.imprime_natural(Json_usuario_nuevo)',
	'Registro_correo.recibe_status("")'
	];
	var Metodos_nueva = new Metodos(configuraciones, codigos, elementos);




    

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE GRABAR USUARIO

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_evalua_usuario
// DESCRIPCION..: Metodos que se ejecutan al elegir grabar registro de usuario

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Evaluacion_grabar_usuario.recibe_validacion([0, document.getElementById("ID_DATO_3_2_INPUT_TEXT").value])',
	'Evaluacion_grabar_usuario.recibe_validacion([1, document.getElementById("ID_DATO_6_5_INPUT_TEXT").value])',
	'Evaluacion_grabar_usuario.recibe_metodo([0, "Metodos_modal_graba_usuario_confirma.ejecuta()"])',
	'Evaluacion_grabar_usuario.recibe_metodo([1, "Metodos_modal_usuario_vacio.ejecuta()"])',
	'Evaluacion_grabar_usuario.ejecuta()'];
	var Metodos_evalua_usuario = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_grabar_usuario
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
	var Evaluacion_grabar_usuario = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_usuario_vacio
// DESCRIPCION..: Modal para avisar que se intento grabar un usuario sin nombre
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_usuarios_modal_opcion.contenido([0, "DATOS INCORRECTOS"])',
	'Maqueta_usuarios_modal_opcion.contenido([1, "NO PUEDO GRABAR USUARIO SIN NOMBRES O SIN CORREO"])',
	'Maqueta_usuarios_modal_opcion.generahtml()',
	'Maqueta_usuarios_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_usuarios_opcion.abrefijo()'];
	var Metodos_modal_usuario_vacio = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_graba_usuario_confirma
// DESCRIPCION..: Modal para confirmar grabar usuario

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_usuarios_modal_opcion.contenido([0, "CONFIRMA GRABAR USUARIO"])',
	'Maqueta_usuarios_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE GRABAR EL USUARIO: "+document.getElementById(`ID_DATO_3_2_INPUT_TEXT`).value+" "+document.getElementById(`ID_DATO_4_3_INPUT_TEXT`).value+" "+document.getElementById(`ID_DATO_5_4_INPUT_TEXT`).value+" CON EL CORREO: "+document.getElementById(`ID_DATO_6_5_INPUT_TEXT`).value])',
	'Maqueta_usuarios_modal_opcion.generahtml()',
	'Maqueta_usuarios_modal_opcion.imprimehtml()',
	'Si_grabar_usuario_modal.generahtml()',
	'Si_grabar_usuario_modal.imprimehtml()',
	'No_grabar_usuario_modal.generahtml()',
	'No_grabar_usuario_modal.imprimehtml()',
	'Modal_usuarios_opcion.abrefijo()'
	];
	var Metodos_modal_graba_usuario_confirma = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_grabar_usuario_modal
// ID...........: ID_SI_GRABAR_FAMILIAR_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de grabar usuario
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_GRABAR_USUARIO_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_reestablecer_usuario_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_usuarios_opcion.cierra(), Metodos_verifica.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_grabar_usuario_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_verifica
// DESCRIPCION..: Metodos que se ejecutan para mandar verificar si no existe correo en BD
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_usuarios.abrefijo()',
	'Consulta_verifica_mail.actualizafiltro(0, document.getElementById("ID_DATO_6_5_INPUT_TEXT").value)',
	'Consulta_verifica_mail.posicion_callback(0)',
	'Consulta_verifica_mail.ejecuta()'

	];
	var Metodos_verifica = new Metodos(configuraciones, codigos, elementos);

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
// INSTANCIA....: Metodos_after_verifica_correo_graba
// DESCRIPCION..: Metodos que se ejecutan despues de grabar nueva usuario

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Modal_usuarios.cierra()',
		'Evaluacion_after_verifica_mail_graba.recibe_validacion([0, Consulta_verifica_mail.codigos[0][0][1].dato_1])',
		'Evaluacion_after_verifica_mail_graba.ejecuta()'
	
	];

	var Metodos_after_verifica_correo_graba = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_after_verifica_mail_graba
// DESCRIPCION..: Evalua el resultado de la verificación de existe correo para grabar 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_modal_correo_existe_grabar.ejecuta()', 'Metodos_grabar_usuario.ejecuta()'];
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
	var Evaluacion_after_verifica_mail_graba = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_correo_existe_grabar
// DESCRIPCION..: Modal para avisar que el correo ya existe al grabar
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_usuarios_modal_opcion.contenido([0, "CORREO EXISTE"])',
	'Maqueta_usuarios_modal_opcion.contenido([1, "NO PUEDO GRABAR USUARIO PORQUÉ YA EXISTE EL CORREO: "+document.getElementById("ID_DATO_6_5_INPUT_TEXT").value])',
	'Maqueta_usuarios_modal_opcion.generahtml()',
	'Maqueta_usuarios_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_usuarios_opcion.abrefijo()'];
	var Metodos_modal_correo_existe_grabar = new Metodos(configuraciones, codigos, elementos);


// CLASE........: Metodos
// INSTANCIA....: Metodos_grabar_usuario
// DESCRIPCION..: Metodos que se ejecutan cuando se va a grabar usuario nuevo registro despues
//                de evaluación vacios

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
	'Modal_usuarios.abrefijo()',
	'Phpmail_graba.recibe_parametro(0, document.getElementById("ID_DATO_6_5_INPUT_TEXT").value)',
	'Phpmail_graba.posicion_callback(0)',
	'Phpmail_graba.ejecuta()'	
	
	];
	var Metodos_grabar_usuario = new Metodos(configuraciones, codigos, elementos);

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
// INSTANCIA....: Metodos_after_mail_usuario
// DESCRIPCION..: Metodos que se ejecutan cuando se va a grabar usuario nuevo registro despues
//                de evaluación

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
	'Modal_usuarios.cierra()',
	'Evaluacion_after_mail.recibe_validacion([0, Phpmail_graba.configuraciones[0]])',
	'Evaluacion_after_mail.ejecuta()'

	];
	var Metodos_after_mail_usuario = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_after_mail
// DESCRIPCION..: Evalua el resultado del envio 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_correo_valido_grabar.ejecuta()', 'Metodos_modal_correo_invalido.ejecuta()'];
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
	var Evaluacion_after_mail = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_correo_invalido
// DESCRIPCION..: Modal para avisar que el correo es invalido
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_usuarios_modal_opcion.contenido([0, "CORREO INVALIDO"])',
	'Maqueta_usuarios_modal_opcion.contenido([1, "NO PUEDO GRABAR USUARIO PORQUÉ EL CORREO: "+document.getElementById("ID_DATO_6_5_INPUT_TEXT").value+" ES INVALIDO."])',
	'Maqueta_usuarios_modal_opcion.generahtml()',
	'Maqueta_usuarios_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_usuarios_opcion.abrefijo()'];
	var Metodos_modal_correo_invalido = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_correo_valido_grabar
// DESCRIPCION..: Metodos que se ejecutan despues de validar existencia correo para grabar
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_usuarios.abrefijo()',
	'Consulta_grabar_usuario.actualizafiltro(0, Registro_usuario.configuraciones[0])',
	'Consulta_grabar_usuario.actualizafiltro(1, Registro_id.configuraciones[0])',
	'Datos_captura.consulta_natural(2, Consulta_grabar_usuario)',
	'Consulta_grabar_usuario.actualizafiltro(10, Phpmail_graba.codigos[0][0].token)',
	'Consulta_grabar_usuario.actualizafiltro(11, Phpmail_graba.codigos[0][0].expira)',
	'Consulta_grabar_usuario.posicion_callback(0)',
	'Consulta_grabar_usuario.ejecuta()'

	];
	
	var Metodos_correo_valido_grabar = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_grabar_usuario
// DESCRIPCION..: Consulta que se ejecuta para grabar o regrabar usuario

	var statusConsulta = 0;
	var scriptPhp = 'consulta_graba_usuario.php';
	var metodoPhp = 'POST';
	var filtro = [
		
	'0',
	'1',
	'2',
	'3',
	'4',
	'5',
	'6',
	'7',
	'8',
	'9',
	'10',
	'11'

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
	var Consulta_grabar_usuario = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_graba_usuario
// DESCRIPCION..: Metodos que se ejecutan despues de grabar nueva usuario

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Registro_id.recibe_status(Consulta_grabar_usuario.codigos[0][0][0].recupera)',
	'Consulta_baja_registro.actualizafiltro(0, Consulta_grabar_usuario.codigos[0][0][0].recupera)',
	'Registro_correo.recibe_status(document.getElementById("ID_DATO_6_5_INPUT_TEXT").value)',
	'Consulta_baja_registro.posicion_callback(1)',
	'Consulta_baja_registro.ejecuta()',
	'Modal_usuarios.abrefijo()',
	'Consulta_gradilla.limpia_codigos()',
	'Consulta_gradilla.inicializa_parametros()',
	'Consulta_gradilla.ejecuta_2()'
	];
	var Metodos_after_graba_usuario = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_graba_baja
// DESCRIPCION..: Metodos que se ejecutan despues de bajar usuario recien grabado

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Registro_usuario.recibe_status(1)',
	'Clases_modificando.afectar()',
	'Json_datos_captura.recibe_json(Consulta_baja_registro.codigos[0])',
	'Json_datos_captura.genera()',
	'Datos_captura.imprime_natural(Json_datos_captura.codigos[0])',
	'Registro_correo.recibe_status(document.getElementById("ID_DATO_6_5_INPUT_TEXT").value)',
	'Modal_usuarios.cierra()',
	'Maqueta_usuarios_modal_opcion.contenido([0, "USUARIO GRABADO"])',
	'Maqueta_usuarios_modal_opcion.contenido([1, "EL USUARIO: "+document.getElementById(`ID_DATO_3_2_INPUT_TEXT`).value+" "+document.getElementById(`ID_DATO_4_3_INPUT_TEXT`).value+" "+document.getElementById(`ID_DATO_5_4_INPUT_TEXT`).value+" CON EL CORREO: "+document.getElementById(`ID_DATO_6_5_INPUT_TEXT`).value+" FUE GRABADO EXITOSAMENTE CON EL ID: "+Registro_id.configuraciones[0]])',
	'Maqueta_usuarios_modal_opcion.generahtml()',
	'Maqueta_usuarios_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_usuarios_opcion.abrefijo()'
	];
	var Metodos_graba_baja = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: No_grabar_usuario_modal
// ID...........: ID_NO_GRABAR_USUARIO_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en confirmación de grabar usuario 
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
	var etiquetas = ["boton_link_icono_chico", "ID_NO_GRABAR_USUARIO_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "no_reestablecer_usuario_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_usuarios_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_grabar_usuario_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);
	




    

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
	'Evaluacion_actualizar_usuario.recibe_validacion([0, document.getElementById("ID_DATO_3_2_INPUT_TEXT").value])',
	'Evaluacion_actualizar_usuario.recibe_validacion([1, document.getElementById("ID_DATO_6_5_INPUT_TEXT").value])',
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
	'Maqueta_usuarios_modal_opcion.contenido([0, "DATOS INCORRECTOS"])',
	'Maqueta_usuarios_modal_opcion.contenido([1, "NO PUEDO ACTUALIZAR USUARIO SIN NOMBRES O SIN CORREO"])',
	'Maqueta_usuarios_modal_opcion.generahtml()',
	'Maqueta_usuarios_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_usuarios_opcion.abrefijo()'];
	var Metodos_modal_usuario_vacio_actualiza = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_actualiza_usuario_confirma
// DESCRIPCION..: Modal para confirmar actualizar usuario

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_usuarios_modal_opcion.contenido([0, "CONFIRMA ACTUALIZAR USUARIO"])',
	'Maqueta_usuarios_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE ACTUALIZAR EL USUARIO: "+document.getElementById(`ID_DATO_3_2_INPUT_TEXT`).value+" "+document.getElementById(`ID_DATO_4_3_INPUT_TEXT`).value+" "+document.getElementById(`ID_DATO_5_4_INPUT_TEXT`).value+" CON EL CORREO: "+document.getElementById(`ID_DATO_6_5_INPUT_TEXT`).value])',
	'Maqueta_usuarios_modal_opcion.generahtml()',
	'Maqueta_usuarios_modal_opcion.imprimehtml()',
	'Si_actualizar_usuario_modal.generahtml()',
	'Si_actualizar_usuario_modal.imprimehtml()',
	'No_actualizar_usuario_modal.generahtml()',
	'No_actualizar_usuario_modal.imprimehtml()',
	'Modal_usuarios_opcion.abrefijo()'
	];
	var Metodos_modal_actualiza_usuario_confirma = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_actualizar_usuario_modal
// ID...........: ID_SI_ACTUALIZAR_FAMILIAR_MODAL
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
	var onclickMetodos = ['Modal_usuarios_opcion.cierra(), Metodos_actualiza_after_confirma.ejecuta()'];
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
	var onclickMetodos = ['Modal_usuarios_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_actualizar_usuario_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_actualiza_after_confirma
// DESCRIPCION..: Metodos que se ejecutan despues de confirmar actualizar usuario
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Consulta_verifica_mail.actualizafiltro(0, document.getElementById("ID_DATO_6_5_INPUT_TEXT").value)',
	'Consulta_verifica_mail.posicion_callback(1)',
	'Consulta_verifica_mail.ejecuta()'

	];
	var Metodos_actualiza_after_confirma = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_verifica_correo_actualiza
// DESCRIPCION..: Metodos que se ejecutan despues de verificar actualizar usuario

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Evaluacion_after_verifica_mail_actualiza_igual.recibe_validacion([0, Registro_correo.configuraciones[0]])',
		'Evaluacion_after_verifica_mail_actualiza_igual.recibe_especial(0, 0, document.getElementById("ID_DATO_6_5_INPUT_TEXT").value)',
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
	'Maqueta_usuarios_modal_opcion.contenido([0, "CORREO EXISTE"])',
	'Maqueta_usuarios_modal_opcion.contenido([1, "NO PUEDO ACTUALIZAR USUARIO PORQUÉ YA EXISTE EL CORREO: "+document.getElementById("ID_DATO_6_5_INPUT_TEXT").value])',
	'Maqueta_usuarios_modal_opcion.generahtml()',
	'Maqueta_usuarios_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_usuarios_opcion.abrefijo()'
	];
	var Metodos_modal_correo_existe_actualizar = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_verifica_valido
// DESCRIPCION..: Metodos que se ejecutan para verificar si el correo es valido
//                de evaluación

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
	'Modal_usuarios.abrefijo()',
	'Phpmail_graba.recibe_parametro(0, document.getElementById("ID_DATO_6_5_INPUT_TEXT").value)',
	'Phpmail_graba.posicion_callback(1)',
	'Phpmail_graba.ejecuta()'	
	
	];
	var Metodos_verifica_valido = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_mail_actualiza_usuario
// DESCRIPCION..: Metodos que se ejecutan despues de enviar mail

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
	'Modal_usuarios.cierra()',
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
	'Maqueta_usuarios_modal_opcion.contenido([0, "CORREO INVALIDO"])',
	'Maqueta_usuarios_modal_opcion.contenido([1, "NO PUEDO ACTUALIZAR USUARIO PORQUÉ EL CORREO: "+document.getElementById("ID_DATO_6_5_INPUT_TEXT").value+" ES INVALIDO."])',
	'Maqueta_usuarios_modal_opcion.generahtml()',
	'Maqueta_usuarios_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_usuarios_opcion.abrefijo()'];
	var Metodos_modal_correo_invalido_actualiza = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_correo_valido_actualizar
// DESCRIPCION..: Metodos que se ejecutan despues de validar existencia correo para actualizar
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_usuarios.abrefijo()',
	'Consulta_actualizar_usuario.actualizafiltro(0, Registro_usuario.configuraciones[0])',
	'Consulta_actualizar_usuario.actualizafiltro(1, Registro_id.configuraciones[0])',
	'Datos_captura.consulta_natural(2, Consulta_actualizar_usuario)',
	'Consulta_actualizar_usuario.actualizafiltro(10, Phpmail_graba.codigos[0][0].token)',
	'Consulta_actualizar_usuario.actualizafiltro(11, Phpmail_graba.codigos[0][0].expira)',
	'Consulta_actualizar_usuario.posicion_callback(1)',
	'Consulta_actualizar_usuario.ejecuta()'

	];
	
	var Metodos_correo_valido_actualizar = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_actualizar_usuario
// DESCRIPCION..: Consulta que se ejecuta para actualiza usuario

	var statusConsulta = 0;
	var scriptPhp = 'consulta_actualiza_usuario.php';
	var metodoPhp = 'POST';
	var filtro = [
		
	'0',
	'1',
	'2',
	'3',
	'4',
	'5',
	'6',
	'7',
	'8',
	'9',
	'10',
	'11'

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
	'Registro_correo.recibe_status(document.getElementById("ID_DATO_6_5_INPUT_TEXT").value)',
	'Consulta_baja_registro.actualizafiltro(0, Registro_id.configuraciones[0])',
	'Consulta_baja_registro.posicion_callback(2)',
	'Consulta_baja_registro.ejecuta()',
	'Modal_usuarios.abrefijo()',
	'Consulta_gradilla.limpia_codigos()',
	'Consulta_gradilla.inicializa_parametros()',
	'Consulta_gradilla.ejecuta_2()'
	];
	var Metodos_after_actualiza_usuario = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_actualiza_baja
// DESCRIPCION..: Metodos que se ejecutan despues de bajar usuario recien actualizado

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Registro_usuario.recibe_status(1)',
	'Clases_modificando.afectar()',
	'Json_datos_captura.recibe_json(Consulta_baja_registro.codigos[0])',
	'Json_datos_captura.genera()',
	'Datos_captura.imprime_natural(Json_datos_captura.codigos[0])',
	'Modal_usuarios.cierra()',
	'Evaluacion_verifica_id.recibe_validacion([0, usuarioID])',
	'Evaluacion_verifica_id.recibe_especial(0, 0, Registro_id.configuraciones[0])',
	'Evaluacion_verifica_id.ejecuta()',
	'Maqueta_usuarios_modal_opcion.contenido([0, "USUARIO ACTUALIZADO"])',
	'Maqueta_usuarios_modal_opcion.contenido([1, "EL USUARIO: "+document.getElementById(`ID_DATO_3_2_INPUT_TEXT`).value+" "+document.getElementById(`ID_DATO_4_3_INPUT_TEXT`).value+" "+document.getElementById(`ID_DATO_5_4_INPUT_TEXT`).value+" CON EL CORREO: "+document.getElementById(`ID_DATO_6_5_INPUT_TEXT`).value+" FUE ACTUALIZADO EXITOSAMENTE CON EL ID: "+Registro_id.configuraciones[0]])',
	'Maqueta_usuarios_modal_opcion.generahtml()',
	'Maqueta_usuarios_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_usuarios_opcion.abrefijo()'
	];
	var Metodos_actualiza_baja = new Metodos(configuraciones, codigos, elementos);





    

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Json_usuario_nuevo
// DESCRIPCION..: Json de datos para iniciar captura de nuevo usuario  

var Json_usuario_nuevo = {"dato_0" : "2",
                        "dato_1" : " SIN GRABAR",
                        "dato_2" : "",
                        "dato_3" : "",
                        "dato_4" : "",
                        "dato_5" : "",
                        "dato_6" : "5",
                        "dato_7" : "0"};

// OBJETO.......: Json
// INSTANCIA....: Json_usuario_vacio
// DESCRIPCION..: Json de datos para imprimir usuario vacio  

var Json_usuario_vacio = {"dato_0" : "0",
                        "dato_1" : "",
                        "dato_2" : "",
                        "dato_3" : "",
                        "dato_4" : "",
                        "dato_5" : "",
                        "dato_6" : "5",
                        "dato_7" : "0"};

// CLASE........: Json
// INSTANCIA....: Json_datos_captura
// DESCRIPCION..: Json que recoge los valores de la consulta baja usuarios según una 
//                configuración. Tipo de fuente de los datos de entrada: 0 = Directo
//                lo recoge de un arreglo, 1 = Json consulta de consultas cada consulta tiene
//                dos objetos, 2 Json de una consulta tiene dos objetos, 3 = Json normal
//                de un solo objeto 

	var numeroElementos = 8;
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
	var elementoValorFuente07 = [2, 'dato_06'];
	var elementoValorFuente08 = [2, 'dato_11'];
	var elementosValoresFuentes = [elementoValorFuente01, elementoValorFuente02, elementoValorFuente03, elementoValorFuente04, elementoValorFuente05, elementoValorFuente06, elementoValorFuente07, elementoValorFuente08];
	var elementosTiposResultado = [0, 0, 0, 0, 0, 0, 0, 0];
	var elementos = [elementosValoresFuentes, elementosTiposResultado];
	
	var Json_datos_captura = new Json(configuraciones, codigos, elementos);

// CLASE........: Datos
// INSTANCIA....: Datos_captura
// DESCRIPCION..: Objeto que determina cuales datos y donde se colocaran en la pantalla

	var numeroElementos = 8;
	var configuraciones = [numeroElementos];
	var codigos = [''];

	var elemento01 = '#ID_3_2_1_1';
	var elemento02 = '#ID_3_2_1_2';
	
	var elemento03 = '#ID_3_3_1_2_2';
	var elemento04 = '#ID_3_3_1_3_2';
	var elemento05 = '#ID_3_3_1_4_2';
	
	var elemento06 = '#ID_3_3_2_2_2';
	var elemento07 = '#ID_3_3_2_3_2';
	var elemento08 = '#ID_3_3_2_4_2';

	var elementosArea = [elemento01, elemento02, elemento03, elemento04, elemento05, elemento06, elemento07, elemento08];
	var elementosImpresion = [0, 0, 0, 0, 0, 0, 0, 0];
	var elemen01 = 0;
	var elemen02 = ' SIN GRABAR ';
	var elemen03 = '';
	var elemen04 = '';
	var elemen05 = '';
	var elemen06 = '';
	var elemen07 = 0;
	var elemen08 = 0;
	var elementosValor = [elemen01, elemen02, elemen03, elemen04, elemen05, elemen06, elemen07, elemen08];
// TIPOS DE FUENTES PARA TRATAR LOS DATOS DEPENDIENDO DE UNA CONFIGURACIÓN
	var elementosTipoFuente = [1, 4, 2, 2, 2, 2, 9, 9];
	var elementosTipoValor01 = [[0, 'NO HAY REGISTRO SELECCIONADO'], [1, 'CONSULTANDO / MODIFICANDO REGISTRO'], [2, 'CAPTURANDO NUEVO USUARIO']];
	var elementosTipoValor02 = [0, 'USUARIO: '];
	var elementosTipoValor03 = ['u_nombre'];
	var elementosTipoValor04 = ['u_paterno'];
	var elementosTipoValor05 = ['u_materno'];
	var elementosTipoValor06 = ['u_correo'];
	var elementosTipoValor07 = [[['1'], '1', 'Administrador', 1], [['2'], '2', 'Organizador', 1], [['3'], '3', 'Capturista', 1], [['4'], '4', 'Visor de Resumen', 1], [['5'], '5', 'Sin Acceso', 1]];
	var elementosTipoValor08 = [[['0'], '0', 'NO', 1], [['1'], '1', 'SI', 1]];
	var elementosTipoValor = [elementosTipoValor01, elementosTipoValor02, elementosTipoValor03, elementosTipoValor04, elementosTipoValor05, elementosTipoValor06, elementosTipoValor07, elementosTipoValor08];
	var elementosTipo = [elementosTipoFuente, elementosTipoValor];
	var elemenMe01 = '';
	var elemenMe02 = '';
	var elemenMe03 = '';
	var elemenMe04 = '';
	var elemenMe05 = '';
	var elemenMe06 = '';
	var elemenMe07 = '';
	var elemenMe08 = '';
	var elementosMetodos = [elemenMe01, elemenMe02, elemenMe03, elemenMe04, elemenMe05, elemenMe06, elemenMe07, elemenMe08];
	var elemCl01 = 'c_01';
	var elemCl02 = 'c_02';
	var elemCl03 = 'c_03';
	var elemCl04 = 'c_04';
	var elemCl05 = 'c_05';
	var elemCl06 = 'c_06';
	var elemCl07 = 'c_07';
	var elemCl08 = 'c_08';
	var elementosClass = [elemCl01, elemCl02, elemCl03, elemCl04, elemCl05, elemCl06, elemCl07, elemCl08];
	var elemId01 = 'ID_DATO_1';
	var elemId02 = 'ID_DATO_2';
	var elemId03 = 'ID_DATO_3';
	var elemId04 = 'ID_DATO_4';
	var elemId05 = 'ID_DATO_5';
	var elemId06 = 'ID_DATO_6';
	var elemId07 = 'ID_DATO_7';
	var elemId08 = 'ID_DATO_8';
	var elementosId = [elemId01, elemId02, elemId03, elemId04, elemId05, elemId06, elemId07, elemId08];
	var elementos = [elementosArea, elementosImpresion, elementosValor, elementosTipo, elementosMetodos, elementosClass, elementosId];
	
	var Datos_captura = new Datos(configuraciones, codigos, elementos);







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

// BLOQUE MANEJO DE CLASES DEL DOM

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************







// INSTANCIA....: Clases_inicio
// DESCRIPCION..: Configuración de Clases interactivas del DOM como deben aparecer al iniciar
//                se ejecuta al iniciar pantalla

	var numeroElementos = 13;
	var configuraciones = [numeroElementos];
	var elementosClasesBase = [
	'ID_3_3_2_CL_1',
	'ID_3_3_1_CL_0',
	'ID_3_3_CL_2',
	'boton_limpia',
	'boton_reestablece',
	'boton_grabar',
	'boton_actualizar',
	'boton_eliminar',
	'ID_3_2_2_1_CL_0',
	'ID_3_2_2_2_CL_1',
	'ID_3_2_2_3_CL_2',
	'ID_3_2_2_4_CL_3',
	'ID_3_2_2_5_CL_4'
	];
	var elementosClases = [
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto']
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
	[1]
	];
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_inicio = new Clases(configuraciones, elementos);

// INSTANCIA....: Clases_modificando
// DESCRIPCION..: Configuración de Clases interactivas del DOM como deben aparecer al bajar usuario
//                se ejecuta al elegir grid

	var numeroElementos = 13;
	var configuraciones = [numeroElementos];
	var elementosClasesBase = [
	'ID_3_3_2_CL_1',
	'ID_3_3_1_CL_0',
	'ID_3_3_CL_2',
	
	'ID_3_2_2_1_CL_0',
	'boton_eliminar',
	'ID_3_2_2_2_CL_1',
	'boton_actualizar',
	'ID_3_2_2_3_CL_2',
	'boton_grabar',
	'ID_3_2_2_4_CL_3',
	'boton_reestablece',
	'ID_3_2_2_5_CL_4',
	'boton_limpia'
	
	];
	var elementosClases = [
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto']
	];
	var elementosClasesTipo = [
	[0],
	[0],
	[0],
	
	[0],
	[0],
	[0],
	[0],
	[1],
	[1],
	[0],
	[0],
	[1],
	[1]

	];
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_modificando = new Clases(configuraciones, elementos);

// INSTANCIA....: Clases_nuevo
// DESCRIPCION..: Configuración de Clases interactivas del DOM como deben aparecer al elegir nuevo
//                se ejecuta al elegir nuevo usuario

	var numeroElementos = 13;
	var configuraciones = [numeroElementos];
	var elementosClasesBase = [
	'ID_3_3_2_CL_1',
	'ID_3_3_1_CL_0',
	'ID_3_3_CL_2',
	'boton_limpia',
	'boton_reestablece',
	'boton_grabar',
	'boton_actualizar',
	'boton_eliminar',
	'ID_3_2_2_5_CL_4',
	'ID_3_2_2_4_CL_3',
	'ID_3_2_2_3_CL_2',
	'ID_3_2_2_2_CL_1',
	'ID_3_2_2_1_CL_0'
	];
	var elementosClases = [
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto']
	];
	var elementosClasesTipo = [
	[0],
	[0],
	[0],
	
	[0],
	[1],
	[0],
	[1],
	[1],
	
	[0],
	[1],
	[0],
	[1],
	[1]
	];
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_nuevo = new Clases(configuraciones, elementos);

// INSTANCIA....: Clases_ocultar_confirma
// DESCRIPCION..: Configuración de Clases interactivas del DOM como deben aparecer para
//                ocultar confirmacion

	var numeroElementos = 2;
	var configuraciones = [numeroElementos];
	var elementosClasesBase = ['c_07_select', 'c_08_select', 'boton_eliminar'];
	var elementosClases = [['disabled'], ['disabled'], ['disabled']];
	var elementosClasesTipo = [[1], [1], [1]];
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_ocultar_confirma = new Clases(configuraciones, elementos);

// INSTANCIA....: Clases_aparecer_confirma
// DESCRIPCION..: Configuración de Clases interactivas del DOM como deben aparecer para
//                ocultar confirmacion

	var numeroElementos = 2;
	var configuraciones = [numeroElementos];
	var elementosClasesBase = ['c_07_select', 'c_08_select', 'boton_eliminar'];
	var elementosClases = [['disabled'], ['disabled'], ['disabled']];
	var elementosClasesTipo = [[0], [0], [0]];
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_aparecer_confirma = new Clases(configuraciones, elementos);








// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Registro_usuario
// DESCRIPCION..: Control del status del registro de usuario 0 = no hay registro 1 = modificando
//                registro grabado 2 = capturando nuevo registro

	var valor = 0;
	var configuraciones = [valor];
	var Registro_usuario = new Registro(configuraciones);

// CLASE........: Registro
// INSTANCIA....: Registro_graba
// DESCRIPCION..: Control de tipo de grabación

	var valor = 0;
	var configuraciones = [valor];
	var Registro_graba = new Registro(configuraciones);

// CLASE........: Registro
// INSTANCIA....: Registro_id
// DESCRIPCION..: Control de id de usuario

	var valor = 0;
	var configuraciones = [valor];
	var Registro_id = new Registro(configuraciones);

// CLASE........: Registro
// INSTANCIA....: Registro_correo
// DESCRIPCION..: Control de correo de usuario

	var valor = '';
	var configuraciones = [valor];
	var Registro_correo = new Registro(configuraciones);

// CLASE........: Date
// INSTANCIA....: Fecha_reg_usu
// ID...........: 
// SE INSERTA EN: 	
// DESCRIPCION..: Fecha para guardar el dato de la fecha de grabación de usuario
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
	var Fecha_reg_usu = new Fecha(configuraciones, etiquetas, codigos, valores, metodos);

	Modal_usuarios.abrefijo();
	Consulta_gradilla.ejecuta_2();
	Datos_captura.imprime_natural(Json_usuario_vacio);
    Clases_inicio.afectar();

// METODO.......: redimensiona()
// INSTANCIA....: Pantalla_sdhybc_usuarios
// DESCRIPCION..: Obtiene las dimensiones de la pantalla al iniciar por primera vez

	Pantalla_sdhybc_usuarios.redimensiona();
	
</script>