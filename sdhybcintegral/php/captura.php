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
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS captura.php';
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
		<link rel="stylesheet" href="../css/sdhybc_captura.css">
		<script src="../../pantalib/jquery/jquery.js"></script>
		<script src="../../pantalib/select2/js/select2.js"></script>
		<script src="../../pantalib/javascript/objetos/new/System.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Pantalla.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Maqueta.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Html.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Select.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Combolist.js"></script>
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
		<script src="../../pantalib/javascript/objetos/new/Session.js"></script>
    </head>
    <body class="maqueta_base" id="ID_SDHYBC_CAPTURA_BODY">
        CAPTURA SDHYBC 
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

	var idioma = <?php echo json_encode($_SESSION['Sistema'] -> configuraciones[2]) ?>;
    var sistema_id = <?php echo json_encode($_SESSION['Sistema'] -> configuraciones[0]) ?>;
    var sistema_tech_name = <?php echo json_encode($_SESSION['Sistema'] -> configuraciones[1]) ?>;
	var usuarioID = <?php echo json_encode($_SESSION['User'] -> elementos[0][0]) ?>;
	var usuarioName = <?php echo json_encode($_SESSION['User'] -> elementos[0][1]." ".$_SESSION['User'] -> elementos[0][2]." ".$_SESSION['User'] -> elementos[0][3]) ?>;
	var usuarioStatus = <?php echo json_encode($_SESSION['User'] -> elementos[0][6]) ?>;
	var session = <?php echo json_encode($_SESSION['session'] -> configuraciones[0]) ?>;
	
	var idCode = 3;
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
// INSTANCIA....: Pantalla_sdhybc_captura
// DESCRIPCION..: Objeto para almacenar información general de la pantalla
	
	var objetos_pantalla = [];
	var ancho = 0;
	var alto = 0;
	var posicion = 0;
	var breaks = [0, 800];
	var metodosbreaks = ['Metodos_resize.ejecuta()', 'Metodos_resize.ejecuta()'];
	var dimensiones = [ancho, alto, posicion, breaks, metodosbreaks];
	var configuraciones = [dimensiones];
	var Pantalla_sdhybc_captura = new Pantalla(idioma, 3, "captura.php", "SDHYBC CAPTURA", "", "", objetos_pantalla, "", Sistema_sdhybc, "../index.php", configuraciones);

	Pantalla_sdhybc_captura.dimensiona();

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
	var elementos = ['Gradilla_cedulas.generahtml()', 'Gradilla_cedulas.imprimehtml()'];
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
// SE INSERTA EN: #ID_SDHYBC_CAPTURA_BODY	
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
	var etiquetas = ["maqueta_01", "ID_GEN_MAQUETA", "#ID_SDHYBC_CAPTURA_BODY"];
	var codigos = [""];
	var elementosClass = ["area_cinta", "area_cabeza", "area_cuerpo", "area_pie", "modal_oculto", "modal_oculto"];
	var elementosId = ["ID_GEN_STATUS", "ID_GEN_CABEZA", "ID_GEN_CUERPO", "ID_GEN_PIE", "ID_GEN_MODAL", "ID_GEN_MODAL_OPCION"];
	var elementos = [elementosClass, elementosId];
	var maqueta_01 = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	maqueta_01.generahtml();
	maqueta_01.imprimehtml();

// CLASE........: Modal
// INSTANCIA....: Modal_captura
// ID...........: ID_SDHYBC_MODAL
// SE INSERTA EN: #ID_SDHYBC_CAPTURA_BODY	
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
	var etiquetas = ["ventana_modal", "ID_SDHYBC_MODAL", "#ID_SDHYBC_CAPTURA_BODY", "#ID_SDHYBC_MODAL_TITULO", "#ID_SDHYBC_MODAL_AVISO"];
	var codigos = [""];
	var Modal_captura = new Modal(configuraciones, etiquetas, codigos);
	Modal_captura.generahtml();
	Modal_captura.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_captura_modal
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
	var Maqueta_captura_modal = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_captura_modal.generahtml();
	Maqueta_captura_modal.imprimehtml();

// CLASE........: Modal
// INSTANCIA....: Modal_captura_opcion
// ID...........: ID_SDHYBC_MODAL_OPCION
// SE INSERTA EN: #ID_SDHYBC_CAPTURA_BODY	
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
	var etiquetas = ["ventana_modal", "ID_SDHYBC_MODAL_OPCION", "#ID_SDHYBC_CAPTURA_BODY", "#ID_SDHYBC_MODAL_OPCION_TITULO", "#ID_SDHYBC_MODAL_OPCION_AVISO"];
	var codigos = [""];
	var Modal_captura_opcion = new Modal(configuraciones, etiquetas, codigos);
	Modal_captura_opcion.generahtml();
	Modal_captura_opcion.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_captura_modal_opcion
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
	var Maqueta_captura_modal_opcion = new Maqueta(configuraciones, etiquetas, codigos, elementos);




	



// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
	var iconosIngles = ['fa-solid fa-pen-to-square', 'fa-solid fa-user', 'fa-solid fa-user-group', 'fa-solid fa-handshake', 'fa-solid fa-table'];
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
	
	var inglesIdioma = ["CAPTURA DE REGISTROS", ""];
	var espanolIdioma = ["CAPTURA DE REGISTROS", ""];
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
// INSTANCIA....: Panel_gradilla_captura
// ID...........: ID_TRABAJO_ESCRITORIO_MAQUETA
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO	
// DESCRIPCION..: Panel para organizar las sub areas generales de trabajo
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido
	
	var tipoImpresion = 0;
	var nivel = [0, 0, 0, 1];
	var configuraciones = [tipoImpresion, nivel];
	var etiquetas = ['area_paneles', 'ID_TRABAJO_ESCRITORIO_MAQUETA', '#ID_TRABAJO_ESCRITORIO'];
    var elemento01 = ['ELIGE UNA CÉDULA O CREA UN REGISTRO NUEVO'];
    var elementos_02_01 = '';
	var elementos_02_02_01 = 'FILTRO LISTA';
	var elementos_02_02_02 = 'MUNICIPIO';
	var elementos_02_02_03 = 'LOCALIDAD';
	var elementos_02_02_04 = 'RECARGAR';
	var elementos_02_02 = [elementos_02_02_01, elementos_02_02_02, elementos_02_02_03, elementos_02_02_04];
	var elementos_02_03 = '';
	var elemento02 = [elementos_02_01, elementos_02_02, elementos_02_03];
	var elementos_03_01_01 = 'STATUS';
    var elementos_03_01_02 = 'NUEVO REGISTRO';
	var elementos_03_01 = [elementos_03_01_01, elementos_03_01_02];
    var elementos_03_02 = 'DATOS DE VIVIENDA';
    var elementos_03_03 = 'DATOS GENERALES';
    var elementos_03_04 = 'FAMILIARES';
    var elementos_03_05 = 'CONTROLES';
    var elemento03 = ['AREA DE CAPTURA'];
    var elemento04 = [''];
    var elementos = [elemento01, elemento02, elemento03, elemento04];
    var codigos = [''];
    var Panel_gradilla_captura = new Panel(configuraciones, etiquetas, codigos, elementos);
    Panel_gradilla_captura.generahtml();
    Panel_gradilla_captura.imprimehtml();



















// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  
// $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !! // $$ // ** // ## // && // !!  



























// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// PRUEBA SELECT COMBOLIST INICIAL

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
	var metodosCallback02 = ['alert("EJECUTÉ CONSULTA Consulta_combolist_municipios")'];
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
    	'Consulta_combolist_localidades.limpia_codigos()',
    	'Consulta_combolist_localidades.inicializa_parametros()',
		'Consulta_combolist_localidades.ejecuta_2()'
    
    ];

	var Metodos_after_consulta_combolist_municipios = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Combolist
// INSTANCIA....: Combolist_municipios
// ID...........: ID_MUNICIPIOS_COMBOLIST
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_2_2_2	
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
    var especial02 = [['TODOS_CLAVE_2', 'SEGUNDO VALOR ESPECIAL'], 'SEGUNDO VALOR ESPECIAL'];
    var especial03 = [['TODOS_CLAVE_3', 'TERCER VALOR ESPECIAL'], 'TERCER VALOR ESPECIAL'];
    var especial04 = [['TODOS_CLAVE_4', 'CUARTO VALOR ESPECIAL'], 'CUARTO VALOR ESPECIAL'];
// ARREGLO DE ARREGLOS CON TODAS LOS REGISTROS ESPECIALES	
    var especiales = [];
    var configuraciones = [controlIdioma, impresion, etiqueta, fuente, consulta, especiales];
    var etiquetas = ['combolist', 'ID_MUNICIPIOS_COMBOLIST', '#ID_TRABAJO_ESCRITORIO_MAQUETA_2_2_2', 'combolist_municipios'];
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
		'Consulta_combolist_localidades.limpia_codigos()',
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
	var filtro = [];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_consulta_combolist_localidades.ejecuta()'];
	var metodosCallback02 = ['alert("EJECUTÉ CONSULTA Consulta_combolist_localidades")'];
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

		'Consulta_gradilla.actualizafiltro(0, Combolist_municipios.valores[1][1])',
		'Consulta_gradilla.actualizafiltro(1, Combolist_localidades.valores[1][3])',
		'Consulta_gradilla.actualizafiltro(2, usuarioID)',
		'Consulta_gradilla.actualizafiltro(3, usuarioStatus)',
		'Combolist_localidades.generahtml()',
        'Combolist_localidades.imprimehtml()'
    
    ];
	var Metodos_after_consulta_combolist_localidades = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Combolist
// INSTANCIA....: Combolist_localidades
// ID...........: ID_LOCALIDADES_COMBOLIST
// SE INSERTA EN: #ID_DESK_2	
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
    var etiquetas = ['combolist', 'ID_LOCALIDADES_COMBOLIST', '#ID_TRABAJO_ESCRITORIO_MAQUETA_2_2_3', 'combolist_localidades'];
    var codigos = [''];
    var valores = [['VALOR VACIO', 'VALOR VACIO', 'VALOR VACIO', 'VALOR VACIO'], ['VALOR VACIO', 'VALOR VACIO', 'VALOR VACIO', 'VALOR VACIO'], ['', ''], ['VALOR VACIO', 'VALOR VACIO', 'VALOR VACIO', 'VALOR VACIO'], [0, 0]];
    var metodos = ['ONCHANGE = "Combolist_localidades.elige_valor(), Metodos_cambia_localidad_combo.ejecuta()"'];
	var Combolist_localidades = new Combolist(configuraciones, etiquetas, valores, metodos, codigos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_cambia_localidad_combo
// DESCRIPCION..: Metodos que se ejecutan despues de seleccionar localidad

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	
	'Consulta_gradilla.actualizafiltro(0, Combolist_localidades.valores[1][1])',
	'Consulta_gradilla.actualizafiltro(1, Combolist_localidades.valores[1][3])',
	'Consulta_gradilla.actualizafiltro(2, usuarioID)',
	'Consulta_gradilla.actualizafiltro(3, usuarioStatus)'

	];
	var Metodos_cambia_localidad_combo = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Recarga_grid
// ID...........: ID_BOTON_RECARGA
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_2_2_4	
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
	var etiquetas = ["boton_link_icono_chico", "ID_BOTON_RECARGA", "#ID_TRABAJO_ESCRITORIO_MAQUETA_2_2_4", "recarga_grid"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_recarga.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
//	var metodos = [' ONCLICK="Metodos_recarga.ejecuta()"'];
	var Recarga_grid = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Recarga_grid.generahtml();
	Recarga_grid.imprimehtml();

// CLASE........: Metodos
// INSTANCIA....: Metodos_recarga
// DESCRIPCION..: Metodos que se ejecutan al actualizar y filtrar gradilla

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
	'Gradilla_cedulas.inicializa_posicion()',
	'Consulta_gradilla.limpia_codigos()',
	'Consulta_gradilla.inicializa_parametros()',
	'Consulta_gradilla.posicion_callback(0)',
	'Consulta_gradilla.ejecuta_2()'

	];
	var Metodos_recarga = new Metodos(configuraciones, codigos, elementos);






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE AREA GRADILLA

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

	




	Modal_captura.abrefijo();
	
// CLASE........: Consulta
// INSTANCIA....: Consulta_gradilla
// DESCRIPCION..: Consulta que se ejecuta para actualizar gradilla desde la BD

	var statusConsulta = 0;
	var scriptPhp = 'consulta_gradilla_cedulas.php';
	var metodoPhp = 'POST';
	var filtro = [Combolist_municipios.valores[1][1], Combolist_localidades.valores[1][3], usuarioID, usuarioStatus];
//	var filtro = [Select_municipios.valores[1], Select_localidades.valores[1], usuarioID, usuarioStatus];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_gradilla.ejecuta()'];
	var metodosCallback02 = ['Metodos_gradilla_after_graba_familiares.ejecuta()'];
	var metodosCallback03 = ['Metodos_gradilla_after_elimina_familiares.ejecuta()'];
	var metodosCallback04 = ['Metodos_gradilla_after_elimina_cedula.ejecuta()'];
	var metodosCallback = [metodosCallback01, metodosCallback02, metodosCallback03, metodosCallback04]; 
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
	var elementos = ['Modal_captura.cierra()',
	'Gradilla_cedulas.generahtml()',
	'Gradilla_cedulas.imprimehtml()'];
	var Metodos_gradilla = new Metodos(configuraciones, codigos, elementos);
// 88 // 77 
	Consulta_gradilla.limpia_codigos();
	Consulta_gradilla.inicializa_parametros();
    Consulta_gradilla.ejecuta_2();

// CLASE........: Gradilla
// INSTANCIA....: Gradilla_cedulas
// ID...........: ID_TRABAJO_ESCRITORIO_MAQUETA_2_3_1
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_2_3	
// DESCRIPCION..: Gradilla de cedulas
// HTML.........: Espera metodo
// IMPRESION....: Espera metodo, sustituye contenido

	var inglesElementos = ['ID', 'USUA', 'MUNICIPIO', 'LOCALIDAD', 'CÉDULA', 'VIVIENDA', 'GENERAL', 'FAM'];
	var inglesIdioma = [inglesElementos, 'SCHDULES LIST'];
	var espanolElementos = ['ID', 'USUA', 'MUNICIPIO', 'LOCALIDAD', 'CÉDULA', 'VIVIENDA', 'GENERAL', 'FAM'];
	var espanolIdioma = [espanolElementos, 'LISTA DE CEDULAS'];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 8;
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
	var metodoValor = 'Gradilla_cedulas.actualiza_valores';
	var tipoValorArreglo = [0];
	var datoValorArreglo = [0];
	var valorArreglo = [tipoValorArreglo, datoValorArreglo];
	var valores = [valorIncialClave, valorClave, valorInicialPosicion, valorPosicion, valorInicialCelda, valorCelda, metodoValor, valorArreglo];
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, consulta, parametros, titulo, orientacion, controles, valores];
	var etiquetas = ['gradilla', 'ID_TRABAJO_ESCRITORIO_MAQUETA_2_3_1', '#ID_TRABAJO_ESCRITORIO_MAQUETA_2_3'];
    var elementos_tipo_valor = [0, 0, 0, 0, 0, 0, 0, 0];
    var elementos_llave_valor = ['dato_01', 'dato_02', 'dato_03', 'dato_04', 'dato_05', 'dato_06', 'dato_07', 'dato_08'];
    var elementos_ancho_valor = ['cinco', 'diez', 'diecisietepuntocinco', 'diecisietepuntocinco', 'quince', 'quince', 'quince', 'cinco'];
    var elementos_metodos = ['Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()', 'Metodos_elige_grid.ejecuta()'];
    var elementos_iconos = ['', '', '', '', '', '', '', ''];
	var elementos = [elementos_tipo_valor, elementos_llave_valor, elementos_ancho_valor, elementos_metodos, elementos_iconos];
    var codigos = [''];
    var Gradilla_cedulas = new Gradilla(configuraciones, etiquetas, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_avanzagrid
// DESCRIPCION..: Metodos que se ejecutan cuando se elige avanzar una pagina en la gradilla

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Gradilla_cedulas.avanza()',
	'Gradilla_cedulas.generahtml()',
	'Gradilla_cedulas.imprimehtml()'];
	var Metodos_avanzagrid = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_inicio_posicion
// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir a primera pagina en la gradilla

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Gradilla_cedulas.inicializa_posicion()',
	'Gradilla_cedulas.generahtml()',
	'Gradilla_cedulas.imprimehtml()'];
	var Metodos_inicio_posicion = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_inicio_posicion
// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir a primera pagina en la gradilla

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Gradilla_cedulas.retrocede()',
	'Gradilla_cedulas.generahtml()',
	'Gradilla_cedulas.imprimehtml()'];
	var Metodos_retrocedegrid = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_final_posicion
// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir a última pagina en la gradilla

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Gradilla_cedulas.finaliza_posicion()',
	'Gradilla_cedulas.generahtml()',
	'Gradilla_cedulas.imprimehtml()'];
	var Metodos_final_posicion = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_elige_grid
// DESCRIPCION..: Metodos que se ejecutan al elegir un registro en la gradilla

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Modal_captura.abrefijo()',
	'Consulta_baja_registro.actualizafiltro(0, Gradilla_cedulas.configuraciones[8][1])',
	'Registro_id.recibe_status(Gradilla_cedulas.configuraciones[8][1])',
	'Consulta_baja_registro.posicion_callback(0)',
	'Consulta_baja_registro.ejecuta()']
	var Metodos_elige_grid = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_baja_registro
// DESCRIPCION..: Consulta que se ejecuta para traer desde la BD un registro elegido en gradilla

	var statusConsulta = 0;
	var scriptPhp = 'consulta_baja_cedula.php';
	var metodoPhp = 'POST';
	var filtro = [''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_baja.ejecuta()'];
	var metodosCallback02 = ['Metodos_refresca_localidad.ejecuta()'];
	var metodosCallback03 = ['Metodos_graba_baja.ejecuta()'];
	var metodosCallback04 = ['Metodos_actualiza_baja.ejecuta()'];
	var metodosCallback05 = ['Metodos_refresca_localidad_c.ejecuta()'];
	var metodosCallback = [metodosCallback01, metodosCallback02, metodosCallback03, metodosCallback04, metodosCallback05]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_baja_registro = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_baja
// DESCRIPCION..: Metodos que se ejecutan despues de ejecutar consulta de cédula

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
	'Modal_captura.cierra()',
	'Registro_cedula.recibe_status(1)',
	'Registro_familiar.recibe_status(0)',
	'Json_datos_captura.recibe_json(Consulta_baja_registro.codigos[0])',
	'Json_datos_captura.genera()',
	'Datos_captura.imprime_natural(Json_datos_captura.codigos[0])',
	'Fecha_reg_ced.recibe_valor(Consulta_baja_registro.codigos[0][0][1].dato_18)',
	'Fecha_reg_viv.recibe_valor(Consulta_baja_registro.codigos[0][0][1].dato_64)',
	'Fecha_reg_gen.recibe_valor(Consulta_baja_registro.codigos[0][0][1].dato_94)',
	'Registro_tipoloca.recibe_status(Consulta_baja_registro.codigos[0][0][1].dato_09)',
	'Registro_numinteg.recibe_status(Consulta_baja_registro.codigos[0][0][1].dato_95)',
	'Registro_origcapt.recibe_status(Consulta_baja_registro.codigos[0][0][1].dato_96)',
	'Modal_captura.abrefijo()',	
	'Consulta_gradilla_familiares.actualizafiltro(0, Gradilla_cedulas.configuraciones[8][1])',
	'Consulta_gradilla_familiares.posicion_callback(0)',
	'Consulta_gradilla_familiares.ejecuta()',
	'Datos_captura_familiares.imprime_natural(Json_familiar_vacio)',
	'Clases_registro_activo.afectar()',
	'Clases_primer_bloque.afectar()',
	'Clases_disabled_familiar.afectar()',
	'Combolist_municipios_2.recibe_texto(Consulta_baja_registro.codigos[0][0][1].dato_03.trim()+" "+Consulta_baja_registro.codigos[0][0][1].dato_04.trim())',
	'Consulta_combolist_municipios_2.limpia_codigos()',
	'Consulta_combolist_municipios_2.inicializa_parametros()',
	'Consulta_combolist_municipios_2.posicion_callback(0)',
	'Consulta_combolist_municipios_2.ejecuta_2()'

	];
	var Metodos_baja = new Metodos(configuraciones, codigos, elementos);






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

// BLOQUE MAQUETA DE AREA CAPTURA

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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





// CLASE........: Panel
// INSTANCIA....: Panel_captura
// ID...........: ID_TRABAJO_ESCRITORIO_MAQUETA_X
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_3_1	
// DESCRIPCION..: Panel para organizar los controles generales de las sub areas del area de captura
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido
	
	var tipoImpresion = 0;
	var nivel = [0, 0];
	var configuraciones = [tipoImpresion, nivel];
	var etiquetas = ['areas_registro', 'ID_TRABAJO_ESCRITORIO_MAQUETA_X', '#ID_TRABAJO_ESCRITORIO_MAQUETA_3_1'];
	var elementos_01_01_01 = 'NO HAY REGISTRO SELECCIONADO';
	var elementos_01_01_02 = '';
	var elementos_01_01 = [elementos_01_01_01, elementos_01_01_02];
	var elementos_01_02_01 = 'ELIMINAR REGISTRO DE CÉDULA';
	var elementos_01_02_02 = 'LIMPIAR CAPTURA DE CÉDULA';
	var elementos_01_02_03 = 'REESTABLECER VALORES EN CAPTURA DE CÉDULA';
	var elementos_01_02_04 = 'CAPTURAR NUEVA CÉDULA';
	var elementos_01_02 = [elementos_01_02_01, elementos_01_02_02, elementos_01_02_03, elementos_01_02_04];
	var elemento01 = [elementos_01_01, elementos_01_02];
    var elemento02 = ['AREAS OCULTAS'];
    var elementos = [elemento01, elemento02];
    var codigos = [''];
    var Panel_captura = new Panel(configuraciones, etiquetas, codigos, elementos);
    Panel_captura.generahtml_r();
    Panel_captura.imprimehtml();

// CLASE........: Panel
// INSTANCIA....: Panel_captura_ocultas
// ID...........: ID_TRABAJO_ESCRITORIO_MAQUETA_X_X
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_X_2_1	
// DESCRIPCION..: Panel para organizar las sub areas del area de captura default aparecen ocultas
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido
	
	var tipoImpresion = 0;
	var nivel = [0, 0, 0, 0];
	var configuraciones = [tipoImpresion, nivel];
	var etiquetas = ['areas_registro_captura elemento_oculto', 'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X', '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_2_1'];
	
	var elemento_01_01_01 = 'DATOS DE CAPTURA';
	var elemento_01_01_02_01 = 'UNIDAD:';
	var elemento_01_01_02_02 = 'SIN REG';
	var elemento_01_01_02 = [elemento_01_01_02_01, elemento_01_01_02_02];
	var elemento_01_01_03_01 = 'ASISTENTE SOCIAL:';
	var elemento_01_01_03_02 = 'SIN REG';
	var elemento_01_01_03 = [elemento_01_01_03_01, elemento_01_01_03_02];
	var elemento_01_01 = [elemento_01_01_01, elemento_01_01_02, elemento_01_01_03]; 
	
	var elemento_01_02_01 = 'LUGAR';
	var elemento_01_02_02_01 = 'MUNICIPIO:'; 
	var elemento_01_02_02_02 = 'NO HAY MUNICIPIO'; 
	var elemento_01_02_02 = [elemento_01_02_02_01, elemento_01_02_02_02]; 
	var elemento_01_02_03_01 = 'LOCALIDAD:'; 
	var elemento_01_02_03_02 = 'NO HAY LOCALIDAD'; 
	var elemento_01_02_03 = [elemento_01_02_03_01, elemento_01_02_03_02]; 
	var elemento_01_02_04 = '';
	var elemento_01_02_05 = '';
	var elemento_01_02_06 = 'ACTUALIZA LUGAR';
	var elemento_01_02_07 = 'LOCALIDAD NUEVA';
	var elemento_01_02_08 = 'ALTA LOCALIDAD';
	var elemento_01_02 = [elemento_01_02_01, elemento_01_02_02, elemento_01_02_03, elemento_01_02_04, elemento_01_02_05, elemento_01_02_06, elemento_01_02_07, elemento_01_02_08]; 
	
	var elemento_01_03_01 = 'REGIÓN A LA SEDE OPERATIVA'; 
	var elemento_01_03_02_01 = 'MINUTOS EN VEHÍCULO:'; 
	var elemento_01_03_02_02 = '0'; 
	var elemento_01_03_02 = [elemento_01_03_02_01, elemento_01_03_02_02]; 
	var elemento_01_03_03_01 = 'KILOMETROS EN VEHÍCULO:'; 
	var elemento_01_03_03_02 = '0'; 
	var elemento_01_03_03 = [elemento_01_03_03_01, elemento_01_03_03_02]; 
	var elemento_01_03_04_01 = 'MINUTOS A PIE / SEMOVIENTE:'; 
	var elemento_01_03_04_02 = '0'; 
	var elemento_01_03_04 = [elemento_01_03_04_01, elemento_01_03_04_02]; 
	var elemento_01_03_05_01 = 'KILOMETROS A PIE / SEMOVIENTE:'; 
	var elemento_01_03_05_02 = '0'; 
	var elemento_01_03_05 = [elemento_01_03_05_01, elemento_01_03_05_02]; 
	var elemento_01_03 = [elemento_01_03_01, elemento_01_03_02, elemento_01_03_03, elemento_01_03_04, elemento_01_03_05]; 

	var elemento_01_04_01 = 'CAPTURA'; 
	var elemento_01_04_02 = 'AVANZAR / GRABAR'; 
	var elemento_01_04 = [elemento_01_04_01, elemento_01_04_02]; 

	var elementos_01 = [elemento_01_01, elemento_01_02, elemento_01_03, elemento_01_04];

	var elemento_02_01_01 = 'TECHO';
	var elemento_02_01_02_01 = 'CONCRETO:';
	var elemento_02_01_02_02 = 'SIN REG';
	var elemento_02_01_02 = [elemento_02_01_02_01, elemento_02_01_02_02];
	var elemento_02_01_03_01 = 'LÁMINA GALVANIZADA:';
	var elemento_02_01_03_02 = 'SIN REG';
	var elemento_02_01_03 = [elemento_02_01_03_01, elemento_02_01_03_02];
	var elemento_02_01_04_01 = 'MADERA:';
	var elemento_02_01_04_02 = 'SIN REG';
	var elemento_02_01_04 = [elemento_02_01_04_01, elemento_02_01_04_02];
	var elemento_02_01_05_01 = 'LÁMINA CARTÓN:';
	var elemento_02_01_05_02 = 'SIN REG';
	var elemento_02_01_05 = [elemento_02_01_05_01, elemento_02_01_05_02];
	var elemento_02_01_06_01 = 'OTRO:';
	var elemento_02_01_06_02 = 'SIN REG';
	var elemento_02_01_06 = [elemento_02_01_06_01, elemento_02_01_06_02];
	var elemento_02_01 = [elemento_02_01_01, elemento_02_01_02, elemento_02_01_03, elemento_02_01_04, elemento_02_01_05, elemento_02_01_06]; 

	var elemento_02_02_01 = 'PAREDES';
	var elemento_02_02_02_01 = 'TABIQUE:';
	var elemento_02_02_02_02 = 'SIN REG';
	var elemento_02_02_02 = [elemento_02_02_02_01, elemento_02_02_02_02];
	var elemento_02_02_03_01 = 'ADOBE:';
	var elemento_02_02_03_02 = 'SIN REG';
	var elemento_02_02_03 = [elemento_02_02_03_01, elemento_02_02_03_02];
	var elemento_02_02_04_01 = 'BLOCK:';
	var elemento_02_02_04_02 = 'SIN REG';
	var elemento_02_02_04 = [elemento_02_02_04_01, elemento_02_02_04_02];
	var elemento_02_02_05_01 = 'MADERA:';
	var elemento_02_02_05_02 = 'SIN REG';
	var elemento_02_02_05 = [elemento_02_02_05_01, elemento_02_02_05_02];
	var elemento_02_02_06_01 = 'PIEDRA:';
	var elemento_02_02_06_02 = 'SIN REG';
	var elemento_02_02_06 = [elemento_02_02_06_01, elemento_02_02_06_02];
	var elemento_02_02_07_01 = 'CARTÓN:';
	var elemento_02_02_07_02 = 'SIN REG';
	var elemento_02_02_07 = [elemento_02_02_07_01, elemento_02_02_07_02];
	var elemento_02_02 = [elemento_02_02_01, elemento_02_02_02, elemento_02_02_03, elemento_02_02_04, elemento_02_02_05, elemento_02_02_06, elemento_02_02_07]; 

	var elemento_02_03_01 = 'PISO';
	var elemento_02_03_02_01 = 'CEMENTO:';
	var elemento_02_03_02_02 = 'SIN REG';
	var elemento_02_03_02 = [elemento_02_03_02_01, elemento_02_03_02_02];
	var elemento_02_03_03_01 = 'MADERA:';
	var elemento_02_03_03_02 = 'SIN REG';
	var elemento_02_03_03 = [elemento_02_03_03_01, elemento_02_03_03_02];
	var elemento_02_03_04_01 = 'TIERRA:';
	var elemento_02_03_04_02 = 'SIN REG';
	var elemento_02_03_04 = [elemento_02_03_04_01, elemento_02_03_04_02];
	var elemento_02_03_05_01 = 'PIEDRA:';
	var elemento_02_03_05_02 = 'SIN REG';
	var elemento_02_03_05 = [elemento_02_03_05_01, elemento_02_03_05_02];
	var elemento_02_03 = [elemento_02_03_01, elemento_02_03_02, elemento_02_03_03, elemento_02_03_04, elemento_02_03_05]; 

	var elemento_02_04_01 = 'AGUA DE USO';
	var elemento_02_04_02_01 = 'POTABLE:';
	var elemento_02_04_02_02 = 'SIN REG';
	var elemento_02_04_02 = [elemento_02_04_02_01, elemento_02_04_02_02];
	var elemento_02_04_03_01 = 'NORIA / POZO:';
	var elemento_02_04_03_02 = 'SIN REG';
	var elemento_02_04_03 = [elemento_02_04_03_01, elemento_02_04_03_02];
	var elemento_02_04_04_01 = 'RÍO:';
	var elemento_02_04_04_02 = 'SIN REG';
	var elemento_02_04_04 = [elemento_02_04_04_01, elemento_02_04_04_02];
	var elemento_02_04_05_01 = 'LLUVIA:';
	var elemento_02_04_05_02 = 'SIN REG';
	var elemento_02_04_05 = [elemento_02_04_05_01, elemento_02_04_05_02];
	var elemento_02_04 = [elemento_02_04_01, elemento_02_04_02, elemento_02_04_03, elemento_02_04_04, elemento_02_04_05]; 

	var elemento_02_05_01 = 'AGUA DE CONSUMO';
	var elemento_02_05_02_01 = 'POTABLE:';
	var elemento_02_05_02_02 = 'SIN REG';
	var elemento_02_05_02 = [elemento_02_05_02_01, elemento_02_05_02_02];
	var elemento_02_05_03_01 = 'PURIFICADA:';
	var elemento_02_05_03_02 = 'SIN REG';
	var elemento_02_05_03 = [elemento_02_05_03_01, elemento_02_05_03_02];
	var elemento_02_05_04_01 = 'HERVIDA:';
	var elemento_02_05_04_02 = 'SIN REG';
	var elemento_02_05_04 = [elemento_02_05_04_01, elemento_02_05_04_02];
	var elemento_02_05_05_01 = 'CLORADA:';
	var elemento_02_05_05_02 = 'SIN REG';
	var elemento_02_05_05 = [elemento_02_05_05_01, elemento_02_05_05_02];
	var elemento_02_05_06_01 = 'FILTRADA:';
	var elemento_02_05_06_02 = 'SIN REG';
	var elemento_02_05_06 = [elemento_02_05_06_01, elemento_02_05_06_02];
	var elemento_02_05 = [elemento_02_05_01, elemento_02_05_02, elemento_02_05_03, elemento_02_05_04, elemento_02_05_05, elemento_02_05_06]; 

	var elemento_02_06_01 = 'EXCRETA';
	var elemento_02_06_02_01 = 'FOSA SÉPTICA:';
	var elemento_02_06_02_02 = 'SIN REG';
	var elemento_02_06_02 = [elemento_02_06_02_01, elemento_02_06_02_02];
	var elemento_02_06_03_01 = 'LETRINA:';
	var elemento_02_06_03_02 = 'SIN REG';
	var elemento_02_06_03 = [elemento_02_06_03_01, elemento_02_06_03_02];
	var elemento_02_06_04_01 = 'AL RAS DEL SUELO:';
	var elemento_02_06_04_02 = 'SIN REG';
	var elemento_02_06_04 = [elemento_02_06_04_01, elemento_02_06_04_02];
	var elemento_02_06 = [elemento_02_06_01, elemento_02_06_02, elemento_02_06_03, elemento_02_06_04]; 

	var elemento_02_07_01 = 'COMBUSTIBLE';
	var elemento_02_07_02_01 = 'GAS:';
	var elemento_02_07_02_02 = 'SIN REG';
	var elemento_02_07_02 = [elemento_02_07_02_01, elemento_02_07_02_02];
	var elemento_02_07_03_01 = 'CARBÓN:';
	var elemento_02_07_03_02 = 'SIN REG';
	var elemento_02_07_03 = [elemento_02_07_03_01, elemento_02_07_03_02];
	var elemento_02_07_04_01 = 'LEÑA:';
	var elemento_02_07_04_02 = 'SIN REG';
	var elemento_02_07_04 = [elemento_02_07_04_01, elemento_02_07_04_02];
	var elemento_02_07_05_01 = 'OTRO:';
	var elemento_02_07_05_02 = 'SIN REG';
	var elemento_02_07_05 = [elemento_02_07_05_01, elemento_02_07_05_02];
	var elemento_02_07 = [elemento_02_07_01, elemento_02_07_02, elemento_02_07_03, elemento_02_07_04, elemento_02_07_05]; 

	var elemento_02_08_01 = 'BASURA';
	var elemento_02_08_02_01 = 'RED MUNICIPAL:';
	var elemento_02_08_02_02 = 'SIN REG';
	var elemento_02_08_02 = [elemento_02_08_02_01, elemento_02_08_02_02];
	var elemento_02_08_03_01 = 'ENTERRAMIENTO:';
	var elemento_02_08_03_02 = 'SIN REG';
	var elemento_02_08_03 = [elemento_02_08_03_01, elemento_02_08_03_02];
	var elemento_02_08_04_01 = 'CIELO ABIERTO:';
	var elemento_02_08_04_02 = 'SIN REG';
	var elemento_02_08_04 = [elemento_02_08_04_01, elemento_02_08_04_02];
	var elemento_02_08_05_01 = 'INCINERACIÓN:';
	var elemento_02_08_05_02 = 'SIN REG';
	var elemento_02_08_05 = [elemento_02_08_05_01, elemento_02_08_05_02];
	var elemento_02_08 = [elemento_02_08_01, elemento_02_08_02, elemento_02_08_03, elemento_02_08_04, elemento_02_08_05]; 

	var elemento_02_09_01 = 'ALUMBRADO';
	var elemento_02_09_02_01 = 'RED ELÉCTRICA:';
	var elemento_02_09_02_02 = 'SIN REG';
	var elemento_02_09_02 = [elemento_02_09_02_01, elemento_02_09_02_02];
	var elemento_02_09_03_01 = 'VELAS:';
	var elemento_02_09_03_02 = 'SIN REG';
	var elemento_02_09_03 = [elemento_02_09_03_01, elemento_02_09_03_02];
	var elemento_02_09_04_01 = 'QUINQUE:';
	var elemento_02_09_04_02 = 'SIN REG';
	var elemento_02_09_04 = [elemento_02_09_04_01, elemento_02_09_04_02];
	var elemento_02_09_05_01 = 'PLACA SOLAR:';
	var elemento_02_09_05_02 = 'SIN REG';
	var elemento_02_09_05 = [elemento_02_09_05_01, elemento_02_09_05_02];
	var elemento_02_09 = [elemento_02_09_01, elemento_02_09_02, elemento_02_09_03, elemento_02_09_04, elemento_02_09_05]; 

	var elemento_02_10_01 = 'DISTRIBUCIÓN HABITACIONAL';
	var elemento_02_10_02_01 = 'NÚMERO DE HABITACIONES:';
	var elemento_02_10_02_02 = 'SIN REG';
	var elemento_02_10_02 = [elemento_02_10_02_01, elemento_02_10_02_02];
	var elemento_02_10_03_01 = 'RECAMARA:';
	var elemento_02_10_03_02 = 'SIN REG';
	var elemento_02_10_03 = [elemento_02_10_03_01, elemento_02_10_03_02];
	var elemento_02_10_04_01 = 'ESTANCIA:';
	var elemento_02_10_04_02 = 'SIN REG';
	var elemento_02_10_04 = [elemento_02_10_04_01, elemento_02_10_04_02];
	var elemento_02_10_05_01 = 'COMEDOR:';
	var elemento_02_10_05_02 = 'SIN REG';
	var elemento_02_10_05 = [elemento_02_10_05_01, elemento_02_10_05_02];
	var elemento_02_10_06_01 = 'MULTIPLE:';
	var elemento_02_10_06_02 = 'SIN REG';
	var elemento_02_10_06 = [elemento_02_10_06_01, elemento_02_10_06_02];
	var elemento_02_10_07_01 = 'COCINA INDEPENDIENTE:';
	var elemento_02_10_07_02 = 'SIN REG';
	var elemento_02_10_07 = [elemento_02_10_07_01, elemento_02_10_07_02];
	var elemento_02_10 = [elemento_02_10_01, elemento_02_10_02, elemento_02_10_03, elemento_02_10_04, elemento_02_10_05, elemento_02_10_06, elemento_02_10_07]; 

	var elemento_02_11_01 = 'CAPTURA'; 
	var elemento_02_11_02 = 'AVANZAR / GRABAR'; 
	var elemento_02_11_03 = 'REGRESAR'; 
	var elemento_02_11 = [elemento_02_11_01, elemento_02_11_02, elemento_02_11_03]; 

	var elementos_02 = [elemento_02_01, elemento_02_02, elemento_02_03, elemento_02_04, elemento_02_05, elemento_02_06, elemento_02_07, elemento_02_08, elemento_02_09, elemento_02_10, elemento_02_11];

	var elemento_03_01_01 = 'PUEBLO INDÍGENA';
	var elemento_03_01_02_01 = 'TARAHUMARA:';
	var elemento_03_01_02_02 = 'SIN REG';
	var elemento_03_01_02 = [elemento_03_01_02_01, elemento_03_01_02_02];
	var elemento_03_01_03_01 = 'TEPEHUAN:';
	var elemento_03_01_03_02 = 'SIN REG';
	var elemento_03_01_03 = [elemento_03_01_03_01, elemento_03_01_03_02];
	var elemento_03_01_04_01 = 'WUAROJIO:';
	var elemento_03_01_04_02 = 'SIN REG';
	var elemento_03_01_04 = [elemento_03_01_04_01, elemento_03_01_04_02];
	var elemento_03_01_05_01 = 'PIMA:';
	var elemento_03_01_05_02 = 'SIN REG';
	var elemento_03_01_05 = [elemento_03_01_05_01, elemento_03_01_05_02];
	var elemento_03_01_06_01 = 'MENONITA:';
	var elemento_03_01_06_02 = 'SIN REG';
	var elemento_03_01_06 = [elemento_03_01_06_01, elemento_03_01_06_02];
	var elemento_03_01_07_01 = 'OTRO:';
	var elemento_03_01_07_02 = 'SIN REG';
	var elemento_03_01_07 = [elemento_03_01_07_01, elemento_03_01_07_02];
	var elemento_03_01 = [elemento_03_01_01, elemento_03_01_02, elemento_03_01_03, elemento_03_01_04, elemento_03_01_05, elemento_03_01_06, elemento_03_01_07]; 

	var elemento_03_02_01 = 'DERECHOHABIENCIA';
	var elemento_03_02_02_01 = 'INSABI:';
	var elemento_03_02_02_02 = 'SIN REG';
	var elemento_03_02_02 = [elemento_03_02_02_01, elemento_03_02_02_02];
	var elemento_03_02_03_01 = 'IMSS:';
	var elemento_03_02_03_02 = 'SIN REG';
	var elemento_03_02_03 = [elemento_03_02_03_01, elemento_03_02_03_02];
	var elemento_03_02_04_01 = 'ISSSTE:';
	var elemento_03_02_04_02 = 'SIN REG';
	var elemento_03_02_04 = [elemento_03_02_04_01, elemento_03_02_04_02];
	var elemento_03_02_05_01 = 'PEMEX:';
	var elemento_03_02_05_02 = 'SIN REG';
	var elemento_03_02_05 = [elemento_03_02_05_01, elemento_03_02_05_02];
	var elemento_03_02_06_01 = 'SEDENA:';
	var elemento_03_02_06_02 = 'SIN REG';
	var elemento_03_02_06 = [elemento_03_02_06_01, elemento_03_02_06_02];
	var elemento_03_02_07_01 = 'OTRO:';
	var elemento_03_02_07_02 = 'SIN REG';
	var elemento_03_02_07 = [elemento_03_02_07_01, elemento_03_02_07_02];
	var elemento_03_02 = [elemento_03_02_01, elemento_03_02_02, elemento_03_02_03, elemento_03_02_04, elemento_03_02_05, elemento_03_02_06, elemento_03_02_07]; 

	var elemento_03_03_01 = 'MASCOTAS';
	var elemento_03_03_02_01 = 'PERROS:';
	var elemento_03_03_02_02 = 'SIN REG';
	var elemento_03_03_02 = [elemento_03_03_02_01, elemento_03_03_02_02];
	var elemento_03_03_03_01 = 'GATOS:';
	var elemento_03_03_03_02 = 'SIN REG';
	var elemento_03_03_03 = [elemento_03_03_03_01, elemento_03_03_03_02];
	var elemento_03_03_04_01 = 'OTRAS:';
	var elemento_03_03_04_02 = 'SIN REG';
	var elemento_03_03_04 = [elemento_03_03_04_01, elemento_03_03_04_02];
	var elemento_03_03 = [elemento_03_03_01, elemento_03_03_02, elemento_03_03_03, elemento_03_03_04]; 

	var elemento_03_04_01 = 'SISTEMA DE SALUD';
	var elemento_03_04_02_01 = 'OFICIALES';
	var elemento_03_04_02 = [elemento_03_04_02_01];
	var elemento_03_04_03_01 = 'INSABI:';
	var elemento_03_04_03_02 = 'SIN REG';
	var elemento_03_04_03 = [elemento_03_04_03_01, elemento_03_04_03_02];
	var elemento_03_04_04_01 = 'IMSS:';
	var elemento_03_04_04_02 = 'SIN REG';
	var elemento_03_04_04 = [elemento_03_04_04_01, elemento_03_04_04_02];
	var elemento_03_04_05_01 = 'ISSSTE:';
	var elemento_03_04_05_02 = 'SIN REG';
	var elemento_03_04_05 = [elemento_03_04_05_01, elemento_03_04_05_02];
	var elemento_03_04_06_01 = 'PEMEX:';
	var elemento_03_04_06_02 = 'SIN REG';
	var elemento_03_04_06 = [elemento_03_04_06_01, elemento_03_04_06_02];
	var elemento_03_04_07_01 = 'SEDENA:';
	var elemento_03_04_07_02 = 'SIN REG';
	var elemento_03_04_07 = [elemento_03_04_07_01, elemento_03_04_07_02];
	var elemento_03_04_08_01 = 'OTRO:';
	var elemento_03_04_08_02 = 'SIN REG';
	var elemento_03_04_08 = [elemento_03_04_08_01, elemento_03_04_08_02];
	var elemento_03_04_09_01 = 'PRIVADOS';
	var elemento_03_04_09 = [elemento_03_04_09_01];
	var elemento_03_04_10_01 = 'MÉDICO PARTICULAR:';
	var elemento_03_04_10_02 = 'SIN REG';
	var elemento_03_04_10 = [elemento_03_04_10_01, elemento_03_04_10_02];
	var elemento_03_04_11_01 = 'CLÍNICA PARTICULAR:';
	var elemento_03_04_11_02 = 'SIN REG';
	var elemento_03_04_11 = [elemento_03_04_11_01, elemento_03_04_11_02];
	var elemento_03_04_12_01 = 'TRADICIONALES';
	var elemento_03_04_12 = [elemento_03_04_12_01];
	var elemento_03_04_13_01 = 'PARTERA:';
	var elemento_03_04_13_02 = 'SIN REG';
	var elemento_03_04_13 = [elemento_03_04_13_01, elemento_03_04_13_02];
	var elemento_03_04_14_01 = 'CURANDERA:';
	var elemento_03_04_14_02 = 'SIN REG';
	var elemento_03_04_14 = [elemento_03_04_14_01, elemento_03_04_14_02];
	var elemento_03_04_15_01 = 'YERBERO:';
	var elemento_03_04_15_02 = 'SIN REG';
	var elemento_03_04_15 = [elemento_03_04_15_01, elemento_03_04_15_02];
	var elemento_03_04_16_01 = 'HUESERO:';
	var elemento_03_04_16_02 = 'SIN REG';
	var elemento_03_04_16 = [elemento_03_04_16_01, elemento_03_04_16_02];
	var elemento_03_04_17_01 = 'BOTICARIO:';
	var elemento_03_04_17_02 = 'SIN REG';
	var elemento_03_04_17 = [elemento_03_04_17_01, elemento_03_04_17_02];
	var elemento_03_04 = [elemento_03_04_01, elemento_03_04_02, elemento_03_04_03, elemento_03_04_04, elemento_03_04_05, elemento_03_04_06, elemento_03_04_07, elemento_03_04_08, elemento_03_04_09, elemento_03_04_10, elemento_03_04_11, elemento_03_04_12, elemento_03_04_13, elemento_03_04_14, elemento_03_04_15, elemento_03_04_16, elemento_03_04_17]; 

	var elemento_03_05_01 = 'COMENTARIO';
	var elemento_03_05_02_01 = '';
	var elemento_03_05_02 = [elemento_03_05_02_01];
	var elemento_03_05 = [elemento_03_05_01, elemento_03_05_02]; 

	var elemento_03_06_01 = 'CAPTURA'; 
	var elemento_03_06_02 = 'AVANZAR / GRABAR'; 
	var elemento_03_06_03 = 'REGRESAR'; 
	var elemento_03_06 = [elemento_03_06_01, elemento_03_06_02, elemento_03_06_03]; 

	var elementos_03 = [elemento_03_01, elemento_03_02, elemento_03_03, elemento_03_04, elemento_03_05, elemento_03_06];

	var elemento_04_01 = 'GRADILLA FAMILIARES';
	
	var elemento_04_02_01_01 = 'STATUS';
	var elemento_04_02_01_02 = 'ID';
	var elemento_04_02_01 = [elemento_04_02_01_01, elemento_04_02_01_02];
	
	var elemento_04_02_02_01 = 'ELIMINAR FAMILIAR';
	var elemento_04_02_02_02 = 'GRABAR FAMILIAR';
	var elemento_04_02_02_03 = 'ACTUALIZAR FAMILIAR';
	var elemento_04_02_02_04 = 'LIMPIAR FAMILIAR';
	var elemento_04_02_02_05 = 'REESTABLECER FAMILIAR';
	var elemento_04_02_02_06 = 'CAPTURAR FAMILIAR';
	var elemento_04_02_02 = [elemento_04_02_02_01, elemento_04_02_02_02, elemento_04_02_02_03, elemento_04_02_02_04, elemento_04_02_02_05, elemento_04_02_02_06];
	
	var elemento_04_02 = [elemento_04_02_01, elemento_04_02_02];

	var elemento_04_03_01 = 'DATOS DE IDENTIDAD';
	var elemento_04_03_02_01 = 'PRIMER APELLÍDO:';
	var elemento_04_03_02_02 = '';
	var elemento_04_03_02 = [elemento_04_03_02_01, elemento_04_03_02_02];
	var elemento_04_03_03_01 = 'SEGUNDO APELLÍDO:';
	var elemento_04_03_03_02 = '';
	var elemento_04_03_03 = [elemento_04_03_03_01, elemento_04_03_03_02];
	var elemento_04_03_04_01 = 'NOMBRES:';
	var elemento_04_03_04_02 = '';
	var elemento_04_03_04 = [elemento_04_03_04_01, elemento_04_03_04_02];
	var elemento_04_03_05_01 = 'FECHA DE NACIMIENTO:';
	var elemento_04_03_05_02 = '';
	var elemento_04_03_05 = [elemento_04_03_05_01, elemento_04_03_05_02];
	var elemento_04_03_06_01 = 'EDAD:';
	var elemento_04_03_06_02 = '';
	var elemento_04_03_06 = [elemento_04_03_06_01, elemento_04_03_06_02];
	var elemento_04_03_07_01 = 'GÉNERO:';
	var elemento_04_03_07_02 = '';
	var elemento_04_03_07 = [elemento_04_03_07_01, elemento_04_03_07_02];
	var elemento_04_03 = [elemento_04_03_01, elemento_04_03_02, elemento_04_03_03, elemento_04_03_04, elemento_04_03_05, elemento_04_03_06, elemento_04_03_07];

	var elemento_04_04_01 = 'DATOS GENERALES';
	var elemento_04_04_02_01 = 'ESTADO DONDE NACE:';
	var elemento_04_04_02_02 = '';
	var elemento_04_04_02 = [elemento_04_04_02_01, elemento_04_04_02_02];
	var elemento_04_04_03_01 = 'LENGUA MATERNA:';
	var elemento_04_04_03_02 = '';
	var elemento_04_04_03 = [elemento_04_04_03_01, elemento_04_04_03_02];
	var elemento_04_04_04_01 = 'ESTADO CIVIL:';
	var elemento_04_04_04_02 = '';
	var elemento_04_04_04 = [elemento_04_04_04_01, elemento_04_04_04_02];
	var elemento_04_04_05_01 = 'PARENTESCO:';
	var elemento_04_04_05_02 = '';
	var elemento_04_04_05 = [elemento_04_04_05_01, elemento_04_04_05_02];
	var elemento_04_04_06_01 = 'ESCOLARIDAD:';
	var elemento_04_04_06_02 = '';
	var elemento_04_04_06 = [elemento_04_04_06_01, elemento_04_04_06_02];
	var elemento_04_04_07_01 = 'OCUPACIÓN:';
	var elemento_04_04_07_02 = '';
	var elemento_04_04_07 = [elemento_04_04_07_01, elemento_04_04_07_02];
	var elemento_04_04_08_01 = 'INGRESOS:';
	var elemento_04_04_08_02 = '';
	var elemento_04_04_08 = [elemento_04_04_08_01, elemento_04_04_08_02];
	var elemento_04_04 = [elemento_04_04_01, elemento_04_04_02, elemento_04_04_03, elemento_04_04_04, elemento_04_04_05, elemento_04_04_06, elemento_04_04_07, elemento_04_04_08];

	var elemento_04_05_01 = 'PADECIMIENTOS';
	var elemento_04_05_02_01 = 'PAPANICOLAU:';
	var elemento_04_05_02_02 = '';
	var elemento_04_05_02 = [elemento_04_05_02_01, elemento_04_05_02_02];
	var elemento_04_05_03_01 = 'HIPERTENSIÓN:';
	var elemento_04_05_03_02 = '';
	var elemento_04_05_03 = [elemento_04_05_03_01, elemento_04_05_03_02];
	var elemento_04_05_04_01 = 'DIABETES:';
	var elemento_04_05_04_02 = '';
	var elemento_04_05_04 = [elemento_04_05_04_01, elemento_04_05_04_02];
	var elemento_04_05_05_01 = 'TUBERCULOSIS:';
	var elemento_04_05_05_02 = '';
	var elemento_04_05_05 = [elemento_04_05_05_01, elemento_04_05_05_02];
	var elemento_04_05_06_01 = 'ALCOHOLISMO:';
	var elemento_04_05_06_02 = '';
	var elemento_04_05_06 = [elemento_04_05_06_01, elemento_04_05_06_02];
	var elemento_04_05_07_01 = 'TABAQUISMO:';
	var elemento_04_05_07_02 = '';
	var elemento_04_05_07 = [elemento_04_05_07_01, elemento_04_05_07_02];
	var elemento_04_05_08_01 = 'CANCER:';
	var elemento_04_05_08_02 = '';
	var elemento_04_05_08 = [elemento_04_05_08_01, elemento_04_05_08_02];
	var elemento_04_05 = [elemento_04_05_01, elemento_04_05_02, elemento_04_05_03, elemento_04_05_04, elemento_04_05_05, elemento_04_05_06, elemento_04_05_07, elemento_04_05_08];

	var elemento_04_06_01 = 'PLNIFICACIÓN FAMILIAR';
	var elemento_04_06_02_01 = 'DIU:';
	var elemento_04_06_02_02 = '';
	var elemento_04_06_02 = [elemento_04_06_02_01, elemento_04_06_02_02];
	var elemento_04_06_03_01 = 'ORALES:';
	var elemento_04_06_03_02 = '';
	var elemento_04_06_03 = [elemento_04_06_03_01, elemento_04_06_03_02];
	var elemento_04_06_04_01 = 'PRESERVATIVOS:';
	var elemento_04_06_04_02 = '';
	var elemento_04_06_04 = [elemento_04_06_04_01, elemento_04_06_04_02];
	var elemento_04_06_05_01 = 'INYECCIÓN MENSUAL:';
	var elemento_04_06_05_02 = '';
	var elemento_04_06_05 = [elemento_04_06_05_01, elemento_04_06_05_02];
	var elemento_04_06_06_01 = 'INYECCIÓN BIMENSUAL:';
	var elemento_04_06_06_02 = '';
	var elemento_04_06_06 = [elemento_04_06_06_01, elemento_04_06_06_02];
	var elemento_04_06_07_01 = 'SALPINGO / OTB:';
	var elemento_04_06_07_02 = '';
	var elemento_04_06_07 = [elemento_04_06_07_01, elemento_04_06_07_02];
	var elemento_04_06_08_01 = 'IMPLANTES:';
	var elemento_04_06_08_02 = '';
	var elemento_04_06_08 = [elemento_04_06_08_01, elemento_04_06_08_02];
	var elemento_04_06_09_01 = 'EMBARAZO:';
	var elemento_04_06_09_02 = '';
	var elemento_04_06_09 = [elemento_04_06_09_01, elemento_04_06_09_02];
	var elemento_04_06 = [elemento_04_06_01, elemento_04_06_02, elemento_04_06_03, elemento_04_06_04, elemento_04_06_05, elemento_04_06_06, elemento_04_06_07, elemento_04_06_08, elemento_04_06_09];

	var elemento_04_07_01 = 'HIGIENE';
	var elemento_04_07_02_01 = 'BAÑO Y CAMBIO DE ROPA:';
	var elemento_04_07_02_02 = '';
	var elemento_04_07_02 = [elemento_04_07_02_01, elemento_04_07_02_02];
	var elemento_04_07_03_01 = 'LAVADO DE DIENTES:';
	var elemento_04_07_03_02 = '';
	var elemento_04_07_03 = [elemento_04_07_03_01, elemento_04_07_03_02];
	var elemento_04_07_04_01 = 'LIMPIEZA DE VIVIENDA:';
	var elemento_04_07_04_02 = '';
	var elemento_04_07_04 = [elemento_04_07_04_01, elemento_04_07_04_02];
	var elemento_04_07 = [elemento_04_07_01, elemento_04_07_02, elemento_04_07_03, elemento_04_07_04];

	var elemento_04_08_01 = 'TOXICOMANÍAS';
	var elemento_04_08_02_01 = 'BEBIDAS ALCOHOLICAS:';
	var elemento_04_08_02_02 = '';
	var elemento_04_08_02 = [elemento_04_08_02_01, elemento_04_08_02_02];
	var elemento_04_08_03_01 = 'TABACO:';
	var elemento_04_08_03_02 = '';
	var elemento_04_08_03 = [elemento_04_08_03_01, elemento_04_08_03_02];
	var elemento_04_08_04_01 = 'MEDICAMENTOS:';
	var elemento_04_08_04_02 = '';
	var elemento_04_08_04 = [elemento_04_08_04_01, elemento_04_08_04_02];
	var elemento_04_08_05_01 = 'DROGAS:';
	var elemento_04_08_05_02 = '';
	var elemento_04_08_05 = [elemento_04_08_05_01, elemento_04_08_05_02];
	var elemento_04_08 = [elemento_04_08_01, elemento_04_08_02, elemento_04_08_03, elemento_04_08_04, elemento_04_08_05];

	var elemento_04_09_01 = 'CAPTURA'; 
	var elemento_04_09_02 = 'REGRESAR'; 
	var elemento_04_09 = [elemento_04_09_01, elemento_04_09_02]; 

	var elementos_04 = [elemento_04_01, elemento_04_02, elemento_04_03, elemento_04_04, elemento_04_05, elemento_04_06, elemento_04_07, elemento_04_08, elemento_04_09];
    
	var elemento01 = [elementos_01, elementos_02, elementos_03, elementos_04];

	var elementos = [elemento01];
	
	var codigos = [''];
    var Panel_captura_ocultas = new Panel(configuraciones, etiquetas, codigos, elementos);
    Panel_captura_ocultas.generahtml_r();
    Panel_captura_ocultas.imprimehtml();





	
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Eliminar_cedula
// ID...........: ID_BOTON_ELIMINAR
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_X_1_2_1	
// DESCRIPCION..: Link con metodos e icono para eliminar registro de cédula ya existente
// HTML.........: Cuando es creado de manera disabled
// IMPRESION....: Cuando es creado sustituye contenidos y se inserta en contenedor oculto
//                la primera vez

	var titulosIngles = ['ELIMINAR CÉDULA'];
	var iconosIngles = ['fa-solid fa-trash-can'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['ELIMINAR CÉDULA'];
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
	var etiquetas = ["boton_eliminar boton_link_icono_chico", "ID_BOTON_ELIMINAR", "#ID_TRABAJO_ESCRITORIO_MAQUETA_X_1_2_1", "elimina_cedula"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_modal_eliminar_cedula_confirma.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Eliminar_cedula = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Eliminar_cedula.generahtml();
	Eliminar_cedula.imprimehtml();

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_eliminar_cedula_confirma
// DESCRIPCION..: Modal para confirmar eliminar cedula

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Maqueta_captura_modal_opcion.contenido([0, "CONFIRMA ELIMINAR CÉDULA"])',
	'Maqueta_captura_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE ELIMINAR LA CÉDULA: "+Registro_id.configuraciones[0]])',
	'Maqueta_captura_modal_opcion.generahtml()',
	'Maqueta_captura_modal_opcion.imprimehtml()',
	'Si_eliminar_cedula_modal.generahtml()',
	'Si_eliminar_cedula_modal.imprimehtml()',
	'No_grabar_familiar_modal.generahtml()',
	'No_grabar_familiar_modal.imprimehtml()',
	'Modal_captura_opcion.abrefijo()'];
	var Metodos_modal_eliminar_cedula_confirma = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_eliminar_cedula_modal
// ID...........: ID_SI_ELIMINA_CEDULA_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de eliminar cedula
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_ELIMINA_CEDULA_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_reestablecer_familiar_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_captura_opcion.cierra(), Metodos_evalua_eliminar_cedula.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_eliminar_cedula_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_evalua_eliminar_cedula
// DESCRIPCION..: Metodos que se ejecutan para evaluar si la cedula se puede borrar

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Modal_captura.abrefijo()',
	'Consulta_evalua_eliminar_cedula.actualizafiltro(0, Registro_id.configuraciones[0])',
	'Consulta_evalua_eliminar_cedula.posicion_callback(0)',
	'Consulta_evalua_eliminar_cedula.ejecuta()'
	];
	var Metodos_evalua_eliminar_cedula = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_evalua_eliminar_cedula
// DESCRIPCION..: Consulta que se ejecuta para evaluar si la cedula no tiene registros ######
//                dependientes

	var statusConsulta = 0;
	var scriptPhp = 'consulta_evalua_eliminar_cedula.php';
	var metodoPhp = 'POST';
	var filtro = [''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_evalua_eliminar_cedula.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 0, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_evalua_eliminar_cedula = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_evalua_eliminar_cedula
// DESCRIPCION..: Metodos que se ejecutan despues de la consulta para evaluar si la cedula
//                puede ser borrada prepara la evaluación de la respuesta

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Evaluacion_eliminar_cedula.recibe_validacion([0, Consulta_evalua_eliminar_cedula.codigos[0][0][1].dato_01])',
	'Evaluacion_eliminar_cedula.recibe_metodo([0, "Metodos_modal_cedula_no_elimina.ejecuta()"])',
	'Evaluacion_eliminar_cedula.recibe_metodo([1, "Metodos_eliminar_cedula_si.ejecuta()"])',
	'Evaluacion_eliminar_cedula.ejecuta()'];
	var Metodos_after_evalua_eliminar_cedula = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_eliminar_cedula
// DESCRIPCION..: Evalua que cedula no tenga familiares 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['', ''];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [1];
	var especialesElementos = [[0]];
	var retornoElementos = [[0]];
	var mensajesElementos = [['CÉDULA TIENE FAMILIARES DEPENDIENTES']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_eliminar_cedula = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_cedula_no_elimina
// DESCRIPCION..: Metodos que se ejecutan despues de consultar evaluacion de Cedulas para
//                determinar si puede ser eliminada

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Modal_captura.cierra()',
	'Maqueta_captura_modal_opcion.contenido([0, "NO PUEDO ELIMINAR CÉDULA"])',
	'Maqueta_captura_modal_opcion.contenido([1, "LA CÉDULA: "+Registro_id.configuraciones[0]+" NO PUEDE SER ELIMINADA PORQUE TIENE FAMILIARES DEPENDIENTES. ELIMINA PRIMERO LOS FAMILIARES DE ESTA CÉDULA."])',
	'Maqueta_captura_modal_opcion.generahtml()',
	'Maqueta_captura_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_captura_opcion.abrefijo()'
	];
	var Metodos_modal_cedula_no_elimina = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_eliminar_cedula_si
// DESCRIPCION..: Metodos que se ejecutan para preparar la consulta de eliminar cedula

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Modal_captura.abrefijo()',
	'Consulta_eliminar_cedula.actualizafiltro(0, Registro_id.configuraciones[0])',
	'Consulta_eliminar_cedula.posicion_callback(0)',
	'Consulta_eliminar_cedula.ejecuta()'
	];
	var Metodos_eliminar_cedula_si = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_eliminar_cedula
// DESCRIPCION..: Consulta que se ejecuta para eliminar cedula despues de evaluaciones            dependientes

	var statusConsulta = 0;
	var scriptPhp = 'consulta_eliminar_cedula.php';
	var metodoPhp = 'POST';
	var filtro = [''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_eliminar_cedula.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 0, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_eliminar_cedula = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_eliminar_cedula
// DESCRIPCION..: Metodos que se ejecutan despues de eliminar cedula

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Datos_captura.imprime_natural(Json_cedula_nueva)',
	'Consulta_gradilla.limpia_codigos()',
	'Consulta_gradilla.inicializa_parametros()',
	'Consulta_gradilla.posicion_callback(3)',
	'Consulta_gradilla.ejecuta_2()'];
	var Metodos_after_eliminar_cedula = new Metodos(configuraciones, codigos, elementos);
	
// CLASE........: Metodos
// INSTANCIA....: Metodos_gradilla_after_elimina_cedula
// DESCRIPCION..: Metodos que se ejecutan despues de consultar gradilla de Cedulas despues
//                de eliminar cedula

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Gradilla_cedulas.generahtml()',
	'Gradilla_cedulas.imprimehtml()',
	'Clases_diseno_inicial.afectar()',
    'Clases_elige_nueva.afectar()',
	'Clases_primer_bloque.afectar()',
	'Modal_captura.cierra()',
	'Maqueta_captura_modal_opcion.contenido([0, "CÉDULA ELIMINADA"])',
	'Maqueta_captura_modal_opcion.contenido([1, "LA CÉDULA: "+Registro_id.configuraciones[0]+" FUE ELIMINADA EXITOSAMENTE"])',
	'Maqueta_captura_modal_opcion.generahtml()',
	'Maqueta_captura_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Registro_cedula.recibe_status(2)',
	'Registro_id.recibe_status(0)',
	'Modal_captura_opcion.abrefijo()'
	];
	var Metodos_gradilla_after_elimina_cedula = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Limpia_captura
// ID...........: ID_BOTON_LIMPIA
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_X_1_2_2	
// DESCRIPCION..: Link con metodos e icono para limpiar la captura capturando nueva cédula
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
	var etiquetas = ["boton_limpia boton_link_icono_chico", "ID_BOTON_LIMPIA", "#ID_TRABAJO_ESCRITORIO_MAQUETA_X_1_2_2", "limpia_captura"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_nueva.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Limpia_captura = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Limpia_captura.generahtml();
	Limpia_captura.imprimehtml();

// CLASE........: Metodos
// INSTANCIA....: Metodos_limpia
// DESCRIPCION..: Metodos que se ejecutan al elegir limpiar una captura de cédula nueva

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['alert("VOY A LIMPIAR REGISTRO")'];
	var Metodos_limpia = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Reestablece_captura
// ID...........: ID_BOTON_REESTABLECE
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_X_1_2_3	
// DESCRIPCION..: Link con metodos e icono para reestablecer valores de la captura
//                cuando se esta modificando un registro de cédula
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
	var etiquetas = ["boton_reestablece boton_link_icono_chico", "ID_BOTON_REESTABLECE", "#ID_TRABAJO_ESCRITORIO_MAQUETA_X_1_2_3", "reestablece_captura"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_confirma_reestablece.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Reestablece_captura = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Reestablece_captura.generahtml();
	Reestablece_captura.imprimehtml();

// CLASE........: Metodos
// INSTANCIA....: Metodos_confirma_reestablece
// DESCRIPCION..: Metodos que se ejecutan al elegir reestablecer valores de captura de cédula 
//                existente

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Maqueta_captura_modal_opcion.contenido([0, "CONFIRMA REESTABLECER VALORES DE CÉDULA"])',
	'Maqueta_captura_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE REESTABLECER LOS VALORES GRABADOS DE LA CÉDULA: "+Json_datos_captura.codigos[0].dato_1+". LOS CAMBIOS EN LOS VALORES DE LA CAPTURA QUE NO ESTEN GRABADOS SE PERDERAN. ESTE PROCESO NO PUEDE REESTABLECER LOS VALORES ORIGINALES DE MUNICIPIO Y LOCALIDAD QUE HAYA SIDO ACTUALIZADOS EN ESTA SESIÓN."])',
	'Maqueta_captura_modal_opcion.generahtml()',
	'Maqueta_captura_modal_opcion.imprimehtml()',
	'Si_reestablece_modal.generahtml()',
	'Si_reestablece_modal.imprimehtml()',
	'No_reestablece_modal.generahtml()',
	'No_reestablece_modal.imprimehtml()',
	'Modal_captura_opcion.abrefijo()'];
	var Metodos_confirma_reestablece = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_reestablece_modal
// ID...........: ID_SI_REESTABLECE_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de reestablecer
//                valores originales de registro de cédula en modificación
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
	var onclickMetodos = ['Modal_captura_opcion.cierra(), Metodos_reestablece_valores.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_reestablece_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Elemento
// INSTANCIA....: No_reestablece_modal
// ID...........: ID_NO_REESTABLECE_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en confirmación de reestablecer 
//                valores originales de cédula en modificación
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
	var onclickMetodos = ['Modal_captura_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_reestablece_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_reestablece_valores
// DESCRIPCION..: Metodos que se ejecutan despues de elegir si reestablecer valores 
//                valores originales de cedula en modificación

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Modal_captura.abrefijo()',
	'Consulta_baja_registro.actualizafiltro(0, Json_datos_captura.codigos[0].dato_1)',
	'Consulta_baja_registro.posicion_callback(0)',
	'Consulta_baja_registro.ejecuta()',
	'Registro_familiar.recibe_status(0)',
	'Clases_disabled_familiar.afectar()',
	'Modal_captura.cierra()'];
	var Metodos_reestablece_valores = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Nueva_captura
// ID...........: ID_BOTON_NUEVA
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_X_1_2_4	
// DESCRIPCION..: Link con metodos e icono para abrir la captura a un nuevo registro de cédula
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido

	var titulosIngles = ['CAPTURAR NUEVA CÉDULA'];
	var iconosIngles = ['fa-solid fa-plus'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['CAPTURAR NUEVA CÉDULA'];
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
	var etiquetas = ["boton_nueva boton_link_icono_chico", "ID_BOTON_NUEVA", "#ID_TRABAJO_ESCRITORIO_MAQUETA_X_1_2_4", "nueva_captura"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_nueva.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Nueva_captura = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Nueva_captura.generahtml();
	Nueva_captura.imprimehtml();

// CLASE........: Metodos
// INSTANCIA....: Metodos_nueva
// DESCRIPCION..: Metodos que se ejecutan al elegir capturar nueva cédula

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
	'Modal_captura.abrefijo()',
	'Registro_cedula.recibe_status(2)',
	'Registro_familiar.recibe_status(0)',
	'Clases_disabled_familiar.afectar()',
	'Registro_id.recibe_status(0)',
	'Registro_bloque.recibe_status(1)',
    'Clases_elige_nueva.afectar()',
	'Datos_captura.imprime_natural(Json_cedula_nueva)',
	'Combolist_municipios_2.recibe_texto("")',
	'Combolist_localidades_2.recibe_texto("")',
	'Modal_captura.abrefijo()',
	'Consulta_combolist_municipios_2.limpia_codigos()',
	'Consulta_combolist_municipios_2.inicializa_parametros()',
	'Consulta_combolist_municipios_2.posicion_callback(1)',
	'Consulta_combolist_municipios_2.ejecuta_2()',
//	'Select_municipios_c.seleccion("TODOS_REGISTROS")',
//    'Select_municipios_c.posicion_callback(1)',
//	'Select_municipios_c.generahtml()',
//	'Select_localidades_c.inicializa_valor()',
//	'Select_localidades_c.recibefiltro([0], ["TODOS_REGISTROS"], ["TODOS_REGISTROS"])',
//	'Select_localidades_c.generahtml()',
	
	'Modal_captura.abrefijo()',	
	'Consulta_gradilla_familiares.actualizafiltro(0, "0")',
	'Consulta_gradilla_familiares.posicion_callback(0)',
	'Consulta_gradilla_familiares.ejecuta()',
	'Datos_captura_familiares.imprime_natural(Json_familiar_vacio)',
	'Fecha_reg_ced.recibe_valor("0000-00-00 00:00:00")',
	'Fecha_reg_viv.recibe_valor("0000-00-00 00:00:00")',
	'Fecha_reg_gen.recibe_valor("0000-00-00 00:00:00")',
	'Registro_tipoloca.recibe_status("ND")',
	'Registro_numinteg.recibe_status(0)',
	'Registro_origcapt.recibe_status("NUEVO")',

	'Clases_primer_bloque.afectar()'
	
	
	];
	var Metodos_nueva = new Metodos(configuraciones, codigos, elementos);









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

// BLOQUE CONTROL DE CAMBIA, CAPTURA Y GRABA LOCALIDAD CON MUNICIPIO

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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

// PRUEBA SELECT COMBOLIST MUNICIPIO 2

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Consulta_combolist_municipios_2
// DESCRIPCION..: Consulta que se ejecuta para actualizar Combolist de municipios en captura

	var statusConsulta = 0;
	var scriptPhp = 'consulta_combolist_municipios.php';
	var metodoPhp = 'POST';
	var filtro = [];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_consulta_combolist_municipios_2.ejecuta()'];
	var metodosCallback02 = ['Metodos_after_consulta_combolist_municipios_2_nueva.ejecuta()'];
	var metodosCallback = [metodosCallback01, metodosCallback02]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_combolist_municipios_2 = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_consulta_combolist_municipios_2
// DESCRIPCION..: Metodos que se ejecutan despues de la consulta del combolist municipios

    var configuraciones = 0;
	var codigos = [''];
	var elementos = [
    
//		'Modal_captura.abrefijo()',
        'Combolist_municipios_2.generahtml()',
        'Combolist_municipios_2.imprimehtml()',
		'Combolist_localidades_2.inicializa_valor()',
		'Combolist_localidades_2.inicializa_status()',
		'Combolist_localidades_2.recibe_texto(Consulta_baja_registro.codigos[0][0][1].dato_03.trim()+" "+Consulta_baja_registro.codigos[0][0][1].dato_04.trim()+", "+Consulta_baja_registro.codigos[0][0][1].dato_06.trim())',
		'Consulta_combolist_localidades_2.limpia_codigos()',
		'Consulta_combolist_localidades_2.inicializa_parametros()',
		'Consulta_combolist_localidades_2.actualizafiltro(0, Combolist_municipios_2.valores[1][1])',
    	'Consulta_combolist_localidades_2.actualizafiltro(1, Combolist_municipios_2.valores[4][1])',
    	'Consulta_combolist_localidades_2.posicion_callback(0)',
		'Consulta_combolist_localidades_2.ejecuta_2()'

	];

	var Metodos_after_consulta_combolist_municipios_2 = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_consulta_combolist_municipios_2_nueva
// DESCRIPCION..: Metodos que se ejecutan despues de la consulta del combolist municipios

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
    
//		'Modal_captura.abrefijo()',
        'Combolist_municipios_2.generahtml()',
        'Combolist_municipios_2.imprimehtml()',
		'Combolist_localidades_2.inicializa_valor()',
		'Combolist_localidades_2.inicializa_status()',
		'Consulta_combolist_localidades_2.limpia_codigos()',
		'Consulta_combolist_localidades_2.inicializa_parametros()',
		'Consulta_combolist_localidades_2.actualizafiltro(0, Combolist_municipios_2.valores[1][1])',
    	'Consulta_combolist_localidades_2.actualizafiltro(1, Combolist_municipios_2.valores[4][1])',
    	'Consulta_combolist_localidades_2.posicion_callback(0)',
		'Consulta_combolist_localidades_2.ejecuta_2()'

	];

	var Metodos_after_consulta_combolist_municipios_2_nueva = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Combolist
// INSTANCIA....: Combolist_municipios_2
// ID...........: ID_MUNICIPIOS_COMBOLIST_2
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_2_2_2	
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
    var datos = Consulta_combolist_municipios_2;

    var valorFormatoArreglo = [[[0], [1]], [[0], [0]]];
	var datoFormatoArreglo = [[0, 1, 0], [1, ' ', 0]];
	var codificado = 0;
	var resultado = [];
	var consulta = [datos, valorFormatoArreglo, datoFormatoArreglo, codificado, resultado];
// ARREGLO DE DOS POSICIONES DE REGISTROS ESPECIALES
    var especial01 = [['TODOS_CLAVE_1', 'TODOS LOS REGISTROS'], 'TODOS LOS REGISTROS'];
    var especial02 = [['TODOS_CLAVE_2', 'SEGUNDO VALOR ESPECIAL'], 'SEGUNDO VALOR ESPECIAL'];
    var especial03 = [['TODOS_CLAVE_3', 'TERCER VALOR ESPECIAL'], 'TERCER VALOR ESPECIAL'];
    var especial04 = [['TODOS_CLAVE_4', 'CUARTO VALOR ESPECIAL'], 'CUARTO VALOR ESPECIAL'];
// ARREGLO DE ARREGLOS CON TODAS LOS REGISTROS ESPECIALES	
    var especiales = [];
    var configuraciones = [controlIdioma, impresion, etiqueta, fuente, consulta, especiales];
    var etiquetas = ['combolist', 'ID_MUNICIPIOS_COMBOLIST_2', '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_2_4', 'combolist_municipios_2'];
    var codigos = [''];
    var valores = [['VALOR VACIO', 'VALOR VACIO'], ['VALOR VACIO', 'VALOR VACIO'], ['', ''], ['VALOR VACIO', 'VALOR VACIO'], [0, 0]];
    var metodos = ['ONCHANGE = "Combolist_municipios_2.elige_valor(), Metodos_cambia_municipio_combo_2.ejecuta()"'];
	var Combolist_municipios_2 = new Combolist(configuraciones, etiquetas, valores, metodos, codigos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_cambia_municipio_combo_2
// DESCRIPCION..: Metodos que se ejecutan despues de seleccionar municipio en el filtro de gradilla

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Combolist_localidades_2.inicializa_valor()',
		'Consulta_combolist_localidades_2.inicializa_parametros()',
		'Consulta_combolist_localidades_2.limpia_codigos()',
		'Consulta_combolist_localidades_2.posicion_callback(0)',
    	'Consulta_combolist_localidades_2.actualizafiltro(0, Combolist_municipios_2.valores[1][1])',
    	'Consulta_combolist_localidades_2.actualizafiltro(1, Combolist_municipios_2.valores[4][1])',
    	'Consulta_combolist_localidades_2.ejecuta_2()',
		'Clases_actualiza_disabled.afectar()',    
		
		'Evaluacion_nueva_localidad_municipios.recibe_validacion([0, Combolist_municipios_2.valores[4][1]])',
		'Evaluacion_nueva_localidad_municipios.recibe_metodo([0, "Metodos_valora_input_localidad.ejecuta()"])',
		'Evaluacion_nueva_localidad_municipios.recibe_metodo([1, "Clases_nueva_disabled.afectar()"])',
		'Evaluacion_nueva_localidad_municipios.ejecuta()',


	];
	var Metodos_cambia_municipio_combo_2 = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_nueva_localidad_municipios
// DESCRIPCION..: Evalua si existe municipio activo para prender nueva localidad 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['', ''];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [1];
	var especialesElementos = [[0]];
	var retornoElementos = [[0]];
	var mensajesElementos = [['MUNICIPIO NO SELECCIONADO']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_nueva_localidad_municipios = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_valora_input_localidad
// DESCRIPCION..: Metodos que se para checar input de nueva localidad

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Evaluacion_nueva_localidad_input.recibe_validacion([0, Input_localidad.valores[0]])',
		'Evaluacion_nueva_localidad_input.recibe_metodo([0, "Clases_nueva_enabled.afectar()"])',
		'Evaluacion_nueva_localidad_input.recibe_metodo([1, "Clases_nueva_disabled.afectar()"])',
		'Evaluacion_nueva_localidad_input.ejecuta()',

	];
	var Metodos_valora_input_localidad = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_nueva_localidad_input
// DESCRIPCION..: Evalua si existe input activo para prender nueva localidad 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['', ''];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [0];
	var especialesElementos = [[0]];
	var retornoElementos = [[0]];
	var mensajesElementos = [['NUEVA LOCALIDAD VACIA']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_nueva_localidad_input = new Evaluacion(configuraciones, elementos);





// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// PRUEBA SELECT COMBOLIST LOCALIDADES 2

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Consulta_combolist_localidades_2
// DESCRIPCION..: Consulta que se ejecuta para actualizar Combolist de localidades

	var statusConsulta = 0;
	var scriptPhp = 'consulta_combolist_localidades.php';
	var metodoPhp = 'POST';
	var filtro = [];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_consulta_combolist_localidades_2.ejecuta()'];
	var metodosCallback02 = ['alert("EJECUTÉ CONSULTA Consulta_combolist_localidades")'];
	var metodosCallback = [metodosCallback01, metodosCallback02]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_combolist_localidades_2 = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_consulta_combolist_localidades_2
// DESCRIPCION..: Metodos que se ejecutan despues de la consulta del combolist localidades

    var configuraciones = 0;
	var codigos = [''];
	var elementos = [

		'Combolist_localidades_2.generahtml()',
        'Combolist_localidades_2.imprimehtml()'
    
    ];
	var Metodos_after_consulta_combolist_localidades_2 = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Combolist
// INSTANCIA....: Combolist_localidades_2
// ID...........: ID_LOCALIDADES_COMBOLIST_2
// SE INSERTA EN: #ID_DESK_2	
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
    var datos = Consulta_combolist_localidades_2;

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
    var etiquetas = ['combolist', 'ID_LOCALIDADES_COMBOLIST_2', '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_2_5', 'combolist_localidades_2'];
    var codigos = [''];
    var valores = [['VALOR VACIO', 'VALOR VACIO', 'VALOR VACIO', 'VALOR VACIO'], ['VALOR VACIO', 'VALOR VACIO', 'VALOR VACIO', 'VALOR VACIO'], ['', ''], ['VALOR VACIO', 'VALOR VACIO', 'VALOR VACIO', 'VALOR VACIO'], [0, 0]];
    var metodos = ['ONCHANGE = "Combolist_localidades_2.elige_valor(), Metodos_cambia_localidad_combo_2.ejecuta()"'];
	var Combolist_localidades_2 = new Combolist(configuraciones, etiquetas, valores, metodos, codigos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_cambia_localidad_combo_2
// DESCRIPCION..: Metodos que se ejecutan despues de seleccionar localidad

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	
	'Consulta_gradilla.actualizafiltro(0, Combolist_localidades.valores[1][1])',
	'Consulta_gradilla.actualizafiltro(1, Combolist_localidades.valores[1][3])',
	'Consulta_gradilla.actualizafiltro(2, usuarioID)',
	'Consulta_gradilla.actualizafiltro(3, usuarioStatus)',
	'Evaluacion_localidad_activa.recibe_validacion([0, Combolist_localidades_2.valores[4][1]])',
	'Evaluacion_localidad_activa.recibe_metodo([0, "Clases_actualiza_enabled.afectar()"])',
	'Evaluacion_localidad_activa.recibe_metodo([1, "Clases_actualiza_disabled.afectar()"])',
	'Evaluacion_localidad_activa.ejecuta()',
	
	];
	var Metodos_cambia_localidad_combo_2 = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_localidad_activa
// DESCRIPCION..: Evalua si existe localidad activa en captura 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['', ''];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [1];
	var especialesElementos = [[0]];
	var retornoElementos = [[0]];
	var mensajesElementos = [['LOCALIDAD NO SELECCIONADA']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_localidad_activa = new Evaluacion(configuraciones, elementos);






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE CONTROL ACTUALIZA MUNICIPIO Y LOCALIDAD

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Actualiza_lugar
// ID...........: ID_BOTON_ACTUALIZA
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_2_6	
// DESCRIPCION..: Elemento de tipo link con metodos e icono para actualizar municipio y localidad en la cedula
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustituye contenido

	var titulosIngles = ['ACTUALIZA LUGAR'];
	var iconosIngles = ['fa-solid fa-floppy-disk'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['ACTUALIZA LUGAR'];
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
	var etiquetas = ["disabled boton_sw_enabled boton_link_icono_chico", "ID_BOTON_ACTUALIZA", "#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_2_6", "actualiza_lugar"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_confirma_actualiza_lugar.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Actualiza_lugar = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Actualiza_lugar.generahtml();
	Actualiza_lugar.imprimehtml();

// CLASE........: Metodos
// INSTANCIA....: Metodos_confirma_actualiza_lugar
// DESCRIPCION..: Metodos prepara y ejecuta modal confirmación de actualizar localidad

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Maqueta_captura_modal_opcion.contenido([0, "CONFIRMA ACTUALIZACIÓN DE LOCALIDAD"])',
	'Maqueta_captura_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE ACTUALIZAR LA LOCALIDAD: "+Combolist_localidades_2.valores[1][3]+" DEL MUNICIPIO: "+Combolist_localidades_2.valores[1][1]+" EN LA CÉDULA: "+Json_datos_captura.codigos[0].dato_1])',
	'Maqueta_captura_modal_opcion.generahtml()',
	'Maqueta_captura_modal_opcion.imprimehtml()',
	'Si_actualiza_modal.generahtml()',
	'Si_actualiza_modal.imprimehtml()',
	'No_actualiza_modal.generahtml()',
	'No_actualiza_modal.imprimehtml()',
	'Modal_captura_opcion.abrefijo()'];
	var Metodos_confirma_actualiza_lugar = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_actualiza_modal
// ID...........: ID_SI_ACTUALIZA_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de actualizar localidad
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_ACTUALIZA_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_actualiza_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_captura_opcion.cierra(), Metodos_actualiza_lugar.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
//	var metodos = [' ONCLICK="Modal_captura_opcion.cierra(), Metodos_actualiza_lugar.ejecuta()"'];
	var Si_actualiza_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Elemento
// INSTANCIA....: No_actualiza_modal
// ID...........: ID_NO_ACTUALIZA_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en confirmación de actualizar localidad
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
	var etiquetas = ["boton_link_icono_chico", "ID_NO_ACTUALIZA_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "no_sustituye_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_captura_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
//	var metodos = [' ONCLICK="Modal_captura_opcion.cierra()"'];
	var No_actualiza_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_actualiza_lugar
// DESCRIPCION..: Metodos que se ejecutan despues de elegir actualizar municipio y localidad en cedula

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Consulta_actualiza_lugar.actualizafiltro(0, Json_datos_captura.codigos[0].dato_1)',
	'Consulta_actualiza_lugar.actualizafiltro(1, Combolist_localidades_2.valores[1][0])',
	'Consulta_actualiza_lugar.actualizafiltro(2, Combolist_localidades_2.valores[1][1])',
	'Consulta_actualiza_lugar.actualizafiltro(3, Combolist_localidades_2.valores[1][2])',
	'Consulta_actualiza_lugar.actualizafiltro(4, Combolist_localidades_2.valores[1][3])',
	'Consulta_actualiza_lugar.posicion_callback(0)',
	'Consulta_actualiza_lugar.ejecuta()',
	'Clases_actualiza_disabled.afectar()'];
	var Metodos_actualiza_lugar = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_actualiza_lugar
// DESCRIPCION..: Consulta que se ejecuta para actualizar municipio y localidad en cedula en la BD

	var statusConsulta = 0;
	var scriptPhp = 'consulta_actualiza_lugar.php';
	var metodoPhp = 'POST';
	var filtro = ['', '', ''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_consulta_actualiza_lugar.ejecuta()'];
	var metodosCallback02 = ['Metodos_consulta_actualiza_lugar_nuevo.ejecuta()'];
	var metodosCallback = [metodosCallback01, metodosCallback02]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 0, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_actualiza_lugar = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_consulta_actualiza_lugar_nuevo
// DESCRIPCION..: Metodos que se ejecutan despues de consulta actualizar municipio y localidad en cedula

	var numeroMetodos = 1;
	var configuraciones = numeroMetodos;
	var codigos = [''];
	var elementos = [
		
	'Consulta_gradilla.limpia_codigos()',
	'Consulta_gradilla.inicializa_parametros()',
	'Consulta_gradilla.actualizafiltro(0, Combolist_municipios_2.valores[1][1])',
	'Consulta_gradilla.actualizafiltro(1, Input_localidad.valores[0])',
	'Consulta_gradilla.actualizafiltro(2, usuarioID)',
	'Consulta_gradilla.actualizafiltro(3, usuarioStatus)',
	'Json_datos_captura.cambia_valor(["dato_4", Combolist_localidades_2.valores[1][1]])',
	'Json_datos_captura.cambia_valor(["dato_5", Combolist_localidades_2.valores[1][3]])',
	'Datos_captura.imprime_especifico(4, 1)',
	'Datos_captura.imprime_especifico(5, 1)',
	'Consulta_gradilla.posicion_callback(0)',
	'Consulta_gradilla.ejecuta_2()'];
	var Metodos_consulta_actualiza_lugar_nuevo = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_consulta_actualiza_lugar
// DESCRIPCION..: Metodos que se ejecutan despues de consulta actualizar municipio y localidad en cedula

	var numeroMetodos = 1;
	var configuraciones = numeroMetodos;
	var codigos = [''];
	var elementos = [
		
	'Consulta_gradilla.limpia_codigos()',
	'Consulta_gradilla.inicializa_parametros()',
	'Consulta_gradilla.actualizafiltro(0, Combolist_localidades_2.valores[1][1])',
	'Consulta_gradilla.actualizafiltro(1, Combolist_localidades_2.valores[1][3])',
	'Consulta_gradilla.actualizafiltro(2, usuarioID)',
	'Consulta_gradilla.actualizafiltro(3, usuarioStatus)',
	'Json_datos_captura.cambia_valor(["dato_4", Combolist_localidades_2.valores[1][1]])',
	'Json_datos_captura.cambia_valor(["dato_5", Combolist_localidades_2.valores[1][3]])',
	'Datos_captura.imprime_especifico(4, 1)',
	'Datos_captura.imprime_especifico(5, 1)',
	'Consulta_gradilla.posicion_callback(0)',
	'Consulta_gradilla.ejecuta_2()'];
	var Metodos_consulta_actualiza_lugar = new Metodos(configuraciones, codigos, elementos);







// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE CONTROL AGREGA LOCALIDAD

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

	





// CLASE........: Input
// INSTANCIA....: Input_localidad
// ID...........: ID_LOCALIDAD_NUEVA
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_2_7	
// DESCRIPCION..: Input para recibir nueva localidad en captura
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustituye contenido

	var inglesIdioma = ['NEW COUNTY', 'NEW COUNTY'];
	var espanolIdioma = ['NUEVA LOCALIDAD', 'NUEVA LOCALIDAD'];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 0;
	var tipoInput = '';
	var dimensionInput = 60;
	var etiquetaInput = 0;
	var configuraciones = [controlIdioma, tipoImpresion, tipoInput, dimensionInput, etiquetaInput];
	var etiquetas = ['input_text_largo', 'ID_LOCALIDAD_NUEVA', '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_2_7', 'localidad_nueva'];
	var codigos = [''];
	var valores = ['', ''];
	var metodos = ['ONCHANGE = "Input_localidad.actualizavalor(), Metodos_validacion_localidad_input.ejecuta()"'];
	var Input_localidad = new Input(configuraciones, etiquetas, codigos, valores, metodos);
	Input_localidad.generahtml();
	Input_localidad.imprimehtml();

// CLASE........: Metodos
// INSTANCIA....: Metodos_validacion_localidad_input
// DESCRIPCION..: Metodos que se ejecutan para preparar evaluacion de input nueva

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Evaluacion_nueva_localidad_input_2.recibe_validacion([0, Input_localidad.valores[0]])',
		'Evaluacion_nueva_localidad_input_2.recibe_metodo([0, "Metodos_valora_input_localidad_2.ejecuta()"])',
		'Evaluacion_nueva_localidad_input_2.recibe_metodo([1, "Clases_nueva_disabled.afectar()"])',
		'Evaluacion_nueva_localidad_input_2.ejecuta()',

	];
	var Metodos_validacion_localidad_input = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_nueva_localidad_input_2
// DESCRIPCION..: Evalua si existe input nueva localidad 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['', ''];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [0];
	var especialesElementos = [[0]];
	var retornoElementos = [[0]];
	var mensajesElementos = [['NUEVA LOCALIDAD VACIA']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_nueva_localidad_input_2 = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_valora_input_localidad_2
// DESCRIPCION..: Metodos que se ejecutan para checar municipio de input de nueva localidad

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Evaluacion_nueva_localidad_municipio_2.recibe_validacion([0, Combolist_municipios_2.valores[1][1]])',
		'Evaluacion_nueva_localidad_municipio_2.recibe_metodo([0, "Clases_nueva_enabled.afectar()"])',
		'Evaluacion_nueva_localidad_municipio_2.recibe_metodo([1, "Clases_nueva_disabled.afectar()"])',
		'Evaluacion_nueva_localidad_municipio_2.ejecuta()',

	];
	var Metodos_valora_input_localidad_2 = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_nueva_localidad_municipio_2
// DESCRIPCION..: Evalua si existe municipio activo para prender nueva localidad 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['', ''];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [1];
	var especialesElementos = [['VALOR VACIO']];
	var retornoElementos = [[0]];
	var mensajesElementos = [['NO HAY MUNICIPIO']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_nueva_localidad_municipio_2 = new Evaluacion(configuraciones, elementos);

// CLASE........: Elemento
// INSTANCIA....: Agrega_localidad
// ID...........: ID_BOTON_AGREGA
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_2_8	
// DESCRIPCION..: Link con metodos e icono para agregar una nueva localidad y elegirla en captura de cedula
// HTML.........: Se genera despues de ser creado
// IMPRESION....: Despues de ser creado, sustituye contenido

	var titulosIngles = ['AGREGAR LOCALIDAD'];
	var iconosIngles = ['fa-solid fa-plus'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['AGREGAR LOCALIDAD'];
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
	var valoresValidcacion = [];
	var tiposValoresValidacion = [];
	var statusValidacion = [];
	var Validacion = [valoresValidcacion];
	var configuraciones = [controlIdioma, tipoImpresion, Icono, Link];
	var etiquetas = ["disabled boton_sw_nueva_loca boton_link_icono_chico", "ID_BOTON_AGREGA", "#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_2_8", "agrega_localidad"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_elemento_agrega_localidad.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Agrega_localidad = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Agrega_localidad.generahtml();
	Agrega_localidad.imprimehtml();

// CLASE........: Metodos
// INSTANCIA....: Metodos_elemento_agrega_localidad
// DESCRIPCION..: Metodos que se ejecutan despues de elegir dar de alta una localidad

	var numeroMetodos = 1;
	var configuraciones = numeroMetodos;
	var codigos = [''];
	var elementos = [
		
		'Evaluacion_localidad.recibe_validacion([0, Combolist_municipios_2.valores[4][1]])',
		'Evaluacion_localidad.recibe_validacion([1, Input_localidad.valores[0]])',
		'Evaluacion_localidad.ejecuta()'
	
	];
	var Metodos_elemento_agrega_localidad = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_localidad
// DESCRIPCION..: Evalua que localidad no este vacio y que exista un municipio y ejecuta
//                metodos valida o no valida dependiendo de la validación 

	var numeroElementos = 2;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_agrega_localidad_valida.ejecuta()', 'Metodos_agrega_localidad_no_valida.ejecuta()'];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = ['', ''];
	var tiposElementos = [0, 0];
	var validacionElementos = [1, 1];
	var especialesElementos = [[0], [0]];
	var retornoElementos = [[0], [0]];
	var mensajesElementos = [['NO PUEDO GRABAR LOCALIDAD SIN MUNICIPIO'], ['NO PUEDO GRABAR LOCALIDAD SIN NOMBRE']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_localidad = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_agrega_localidad_no_valida
// DESCRIPCION..: Metodos que se ejecutan cuando la validación de consulta agrega localidad falla

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Maqueta_captura_modal_opcion.contenido([0, "DATOS INCORRECTOS"])',
	'Maqueta_captura_modal_opcion.contenido([1, Validacion_localidad.configuraciones[1][4]])',
	'Maqueta_captura_modal_opcion.generahtml()',
	'Maqueta_captura_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_captura_opcion.abrefijo()'];
	var Metodos_agrega_localidad_no_valida = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Ok_modal
// ID...........: ID_OK_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir ok en modal opcion cuando falla la validacion
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
	var onclickMetodos = ['Modal_captura_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Ok_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_agrega_localidad_valida
// DESCRIPCION..: Metodos que se ejecutan cuando la validación de consulta agrega localidad no falla
//                ejecuta la consulta para inspeccionar si la localidad ya existe en el municipio 

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Modal_captura.abrefijo()',
	'Consulta_inspecciona_localidad.actualizafiltro(0, Combolist_municipios_2.valores[1][0])',
	'Consulta_inspecciona_localidad.actualizafiltro(1, Combolist_municipios_2.valores[1][1])',
	'Consulta_inspecciona_localidad.actualizafiltro(2, Input_localidad.valores[0])',
	'Consulta_inspecciona_localidad.posicion_callback(0)',
	'Consulta_inspecciona_localidad.ejecuta()',
	'Modal_captura.cierra()'];
	var Metodos_agrega_localidad_valida = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_inspecciona_localidad
// DESCRIPCION..: Consulta con validación que se ejecuta para agregar nueva localidad en cedula en la BD 

	var numeroConsultas = 1;
	var scriptPhp = 'consulta_inspecciona_localidad.php';
	var metodoPhp = 'POST';
	var filtro = ['', '', ''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_inspecciona_localidad.ejecuta()'];
	var metodosCallback02 = ['Metodos_inspecciona_localidad_graba_callback.ejecuta()'];
	var metodosCallback = [metodosCallback01, metodosCallback02]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 0, 0, 0];
	var configuraciones = [numeroConsultas, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_inspecciona_localidad = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_inspecciona_localidad
// DESCRIPCION..: Metodos que se ejecutan cuando regresamos de inspeccionar si existe la localidad

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Existe_localidad.recibe_validacion([0, Consulta_inspecciona_localidad.codigos[0][0][0].registros])',
		'Existe_localidad.ejecuta()'
	
	];
	var Metodos_inspecciona_localidad = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Existe_localidad
// DESCRIPCION..: Evalua el resultado de la consulta 0 = no existe localidad 1 = ya existe localidad

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_agrega_localidad_status.ejecuta()', 'Metodos_localidad_existe.ejecuta()'];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [1];
	var especialesElementos = [['1']];
	var retornoElementos = [[1]];
	var mensajesElementos = [['LOCALIDAD YA EXISTE EN EL MUNICIPIO']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Existe_localidad = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_localidad_existe
// DESCRIPCION..: Metodos que se ejecutan cuando la localidad que se pretende agregar ya existe

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Maqueta_captura_modal_opcion.contenido([0, "REGISTRO YA EXISTE"])',
	'Maqueta_captura_modal_opcion.contenido([1, "LA LOCALIDAD: "+Input_localidad.valores[0]+" YA EXISTE EN EL MUNICIPIO: "+Combolist_municipios_2.valores[1][1]])',
	'Maqueta_captura_modal_opcion.generahtml()',
	'Maqueta_captura_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_captura_opcion.abrefijo()'];
	var Metodos_localidad_existe = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_agrega_localidad_status
// DESCRIPCION..: Metodos prepara la inspección del status de la cédula

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Status_cedula_localidad.recibe_validacion([0, Registro_cedula.configuraciones[0]])',
		'Status_cedula_localidad.ejecuta()'
	
	];
	var Metodos_agrega_localidad_status = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Status_cedula_localidad
// DESCRIPCION..: Evalua el status de la cédula para determinar si afectara registro de cédula
//                o no.

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_confirma_agrega_localidad_con_cedula.ejecuta()', 'Metodos_confirma_agrega_localidad_sin_cedula.ejecuta()'];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [1];
	var especialesElementos = [['2']];
	var retornoElementos = [[1]];
	var mensajesElementos = [['NO HAY CÉDULA PARA GRABAR']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Status_cedula_localidad = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_confirma_agrega_localidad_con_cedula
// DESCRIPCION..: Metodos prepara y ejecuta modal de confirmación de agregar localidad

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Consulta_agrega_localidad.posicion_callback(0)',
	'Maqueta_captura_modal_opcion.contenido([0, "CONFIRMA AGREGAR LOCALIDAD"])',
	'Maqueta_captura_modal_opcion.contenido([1, "ESTA SEGURO QUE DESEA AGREGAR LA LOCALIDAD: "+Input_localidad.valores[0]+" EN EL MUNICIPIO: "+Combolist_municipios_2.valores[1][1]+". SÍ ELIGE AGREGAR LA LOCALIDAD SE ACTUALIZARÁ EN EL REGISTRO DE LOCALIDADES Y EN LA CÉDULA: "+Json_datos_captura.codigos[0].dato_1+" ESTE PROCESO NO PODRA SER REVOCADO POR LA OPCIÓN REESTABLECER VALORES DE CAPTURA."])',
	'Maqueta_captura_modal_opcion.generahtml()',
	'Maqueta_captura_modal_opcion.imprimehtml()',
	'Si_agrega_modal.generahtml()',
	'Si_agrega_modal.imprimehtml()',
	'No_agrega_modal.generahtml()',
	'No_agrega_modal.imprimehtml()',
	'Modal_captura_opcion.abrefijo()'];
	var Metodos_confirma_agrega_localidad_con_cedula = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_confirma_agrega_localidad_sin_cedula
// DESCRIPCION..: Metodos prepara y ejecuta modal de confirmación de agregar localidad sin
//                cédula

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Consulta_agrega_localidad.posicion_callback(1)',
		'Maqueta_captura_modal_opcion.contenido([0, "CONFIRMA AGREGAR LOCALIDAD"])',
		'Maqueta_captura_modal_opcion.contenido([1, "ESTA SEGURO QUE DESEA AGREGAR LA LOCALIDAD: "+Input_localidad.valores[0]+" EN EL MUNICIPIO: "+Combolist_municipios_2.valores[1][1]+". SÍ ELIGE AGREGAR LA LOCALIDAD SE ACTUALIZARÁ EN EL REGISTRO DE LOCALIDADES."])',
		'Maqueta_captura_modal_opcion.generahtml()',
		'Maqueta_captura_modal_opcion.imprimehtml()',
		'Si_agrega_modal.generahtml()',
		'Si_agrega_modal.imprimehtml()',
		'No_agrega_modal.generahtml()',
		'No_agrega_modal.imprimehtml()',
		'Modal_captura_opcion.abrefijo()'
	
	];
	var Metodos_confirma_agrega_localidad_sin_cedula = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_agrega_modal
// ID...........: ID_SI_AGREGA_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de agregar localidad
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_AGREGA_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_agrega_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_captura_opcion.cierra(), Metodos_localidad_si_grabar.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
//	var metodos = [' ONCLICK="Modal_captura_opcion.cierra(), Metodos_localidad_si_grabar.ejecuta()"'];
	var Si_agrega_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);













































































































































































// CLASE........: Metodos
// INSTANCIA....: Metodos_localidad_si_grabar
// DESCRIPCION..: Metodos que se ejecutan cuando se confirma agregar localidad en el modal

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
	'Modal_captura.abrefijo()',
	'Consulta_agrega_localidad.actualizafiltro(0, Combolist_municipios_2.valores[1][0])',
	'Consulta_agrega_localidad.actualizafiltro(1, Combolist_municipios_2.valores[1][1])',
	'Consulta_agrega_localidad.actualizafiltro(2, Input_localidad.valores[0])',
	'Consulta_agrega_localidad.ejecuta()',
	'Modal_captura.cierra()'

	];
	var Metodos_localidad_si_grabar = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: No_agrega_modal
// ID...........: ID_NO_AGREGA_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en confirmación de agrega localidad
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
	var etiquetas = ["boton_link_icono_chico", "ID_NO_AGREGA_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "no_agrega_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_captura_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_agrega_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_agrega_localidad
// DESCRIPCION..: Consulta que se ejecuta para agregar nueva localidad en cedula en la BD 

	var numeroElementos = 0;
	var scriptPhp = 'consulta_agrega_localidad.php';
	var metodoPhp = 'POST';
	var filtro = ['', '', ''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_agrega_localidad.ejecuta()'];
	var metodosCallback02 = ['Metodos_after_agrega_localidad_sin_cedula.ejecuta()'];
	var metodosCallback = [metodosCallback01, metodosCallback02]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 0, 0, 0];
	var configuraciones = [numeroElementos, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_agrega_localidad = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_agrega_localidad
// DESCRIPCION..: Metodos que se ejecutan despues de agregar localidad

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
	'Modal_captura.abrefijo()',
	'Consulta_actualiza_lugar.actualizafiltro(0, Json_datos_captura.codigos[0].dato_1)',
	'Consulta_actualiza_lugar.actualizafiltro(1, Combolist_municipios_2.valores[1][0])',
	'Consulta_actualiza_lugar.actualizafiltro(2, Combolist_municipios_2.valores[1][1])',
	'Consulta_actualiza_lugar.actualizafiltro(3, "000")',
	'Consulta_actualiza_lugar.actualizafiltro(4, Input_localidad.valores[0])',
	'Consulta_actualiza_lugar.posicion_callback(1)',
	'Consulta_actualiza_lugar.ejecuta()',
	'Combolist_municipios.recibe_texto(Combolist_municipios_2.valores[1][0]+" "+Combolist_municipios_2.valores[1][1])',
	'Combolist_localidades.recibe_texto("")',
	'Consulta_combolist_municipios.limpia_codigos()',
	'Consulta_combolist_municipios.inicializa_parametros()',
	'Consulta_combolist_municipios.posicion_callback(0)',
	'Consulta_combolist_municipios.ejecuta_2()',
/*	
	'Select_municipios.seleccion(Combolist_municipios_2.valores[1][1])',
	'Select_localidades.seleccion("TODOS_REGISTROS_L")',
	'Select_municipios.generahtml()',
*/	
//	'Consulta_gradilla.recibefiltro([Combolist_localidades.valores[1][0], Combolist_localidades.valores[1][1]])',
//	'Consulta_gradilla.actualizafiltro(0, Combolist_localidades.valores[1][0])',
//	'Consulta_gradilla.actualizafiltro(1, Combolist_localidades.valores[1][1])',
//	'Consulta_gradilla.actualizafiltro(2, usuarioID)', 
//	'Consulta_gradilla.actualizafiltro(3, usuarioStatus)',
//	'Consulta_gradilla.actualizafiltro(0, Select_localidades.recorta_filtro([[["TODOS_REGISTROS_L", 2, Select_municipios.valores[1], 0, 0]], 2, 0, 2]))',
//	'Consulta_gradilla.actualizafiltro(1, Select_localidades.recorta_filtro([[["TODOS_REGISTROS_L", 0, "", 0, 0] ], 2, 1, 2]))',
//	'Consulta_gradilla.limpia_codigos()',
//	'Consulta_gradilla.posicion_callback(0)',
	'Consulta_baja_registro.posicion_callback(1)',
	'Consulta_baja_registro.ejecuta()',
	'Clases_actualiza_disabled.afectar()',
	'Modal_captura.cierra()'];
	var Metodos_after_agrega_localidad = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_agrega_localidad_sin_cedula
// DESCRIPCION..: Metodos que se ejecutan despues de agregar localidad sin cédula

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Modal_captura.abrefijo()',
	'Combolist_localidades_2.recibe_texto(Consulta_agrega_localidad.configuraciones[3][0].trim()+" "+Consulta_agrega_localidad.configuraciones[3][1].trim()+", "+Input_localidad.valores[0].trim())',
	'Consulta_combolist_localidades_2.actualizafiltro(0, Combolist_municipios.valores[1][1])',
    'Consulta_combolist_localidades_2.actualizafiltro(1, Combolist_municipios.valores[4][1])',
   	'Consulta_combolist_localidades_2.posicion_callback(0)',
   	'Consulta_combolist_localidades_2.limpia_codigos()',
   	'Consulta_combolist_localidades_2.inicializa_parametros()',
	'Consulta_combolist_localidades_2.ejecuta_2()',
/*
	'Select_localidades_c.seleccion("/1/003/"+Consulta_agrega_localidad.configuraciones[3][0].trim()+"/1/"+(Consulta_agrega_localidad.configuraciones[3][1].trim().length + 1000).toString().substr(1, 3)+"/"+Consulta_agrega_localidad.configuraciones[3][1].trim()+"/1/003/000/1/"+(Input_localidad.valores[0].trim().length + 1000).toString().substr(1, 3)+"/"+Input_localidad.valores[0].trim())',
	'Select_localidades_c.recibefiltro([0], [Consulta_agrega_localidad.configuraciones[3][1]], Consulta_agrega_localidad.configuraciones[3][1])',
	'Select_localidades_c.generahtml()',
*/
	'Modal_captura.cierra()'];
	var Metodos_after_agrega_localidad_sin_cedula = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_refresca_localidad
// DESCRIPCION..: Metodos que se ejecutan despues de consulta baja localidad con salida opcional
//                para refrescar pantalla

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Json_datos_captura.recibe_json(Consulta_baja_registro.codigos[0])',
	'Json_datos_captura.genera()',
	'Combolist_municipios_2.recibe_texto(Consulta_baja_registro.codigos[0][0][1].dato_03.trim()+" "+Consulta_baja_registro.codigos[0][0][1].dato_04.trim())',
	'Consulta_combolist_municipios_2.posicion_callback(0)',
   	'Consulta_combolist_municipios_2.limpia_codigos()',
   	'Consulta_combolist_municipios_2.inicializa_parametros()',
	'Consulta_combolist_municipios_2.ejecuta_2()',
//	'Select_municipios_c.seleccion("/1/"+(Consulta_baja_registro.codigos[0][0][1].dato_03.trim().length+1000).toString().slice(-3)+"/"+Consulta_baja_registro.codigos[0][0][1].dato_03.trim()+"/1/"+(Consulta_baja_registro.codigos[0][0][1].dato_04.trim().length+1000).toString().slice(-3)+"/"+Consulta_baja_registro.codigos[0][0][1].dato_04.trim())',
//	'Select_municipios_c.posicion_callback(0)',
//	'Select_municipios_c.generahtml()',
//	'Json_datos_captura.cambia_valor(["dato_4", Select_municipios_c.recorta_filtro([[["TODOS_REGISTROS", 2, "", 0, 0]], 2, 1, 2])])',
//	'Json_datos_captura.cambia_valor(["dato_5", Input_localidad.valores[0]])',
	'Datos_captura.recibe_json(Json_datos_captura.codigos[0])',
//	'Datos_captura.imprime_natural(Json_datos_captura.codigos[0])'];
	'Datos_captura.imprime_especifico(4, 1)',
	'Datos_captura.imprime_especifico(5, 1)'];
	var Metodos_refresca_localidad = new Metodos(configuraciones, codigos, elementos);






    

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE BOTONES DE NAVEGACION DE CAPTURA

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Avanzar_uno
// ID...........: ID_AVANZAR_UNO
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_4_2
// DESCRIPCION..: Link con metodos e icono para elegir avanzar grabar en bloque de captura uno
// HTML.........: Espera metodo
// IMPRESION....: Inmediato, sustituye contenido

	var titulosIngles = ['AVANZAR / GRABAR'];
	var iconosIngles = ['fa-solid fa-forward-step'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['AVANZAR / GRABAR'];
	var iconosEspanol = ['fa-solid fa-forward-step'];
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
	var etiquetas = ["boton_link_icono_chico", "ID_AVANZAR_UNO", "#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_4_2", "avanza_bloque_uno"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_avanza_uno.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Avanzar_uno = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Avanzar_uno.generahtml();
	Avanzar_uno.imprimehtml();

// CLASE........: Metodos
// INSTANCIA....: Metodos_avanza_uno
// DESCRIPCION..: Metodos que se ejecutan cuando se elige avanza en la captura de bloque 1 
//                prepara la evaluación de registro de cédula antes de pasar a confirmación 
//                y posteriormente a validación

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Evaluacion_cedula_status_grabar.recibe_validacion([0, Registro_cedula.configuraciones[0]])',
		'Evaluacion_cedula_status_grabar.recibe_metodo([0, "Metodos_prepara_modal_graba_confirma_con_cedula.ejecuta()"])',
		'Evaluacion_cedula_status_grabar.recibe_metodo([1, "Metodos_prepara_modal_graba_confirma_sin_cedula.ejecuta()"])',
		'Evaluacion_cedula_status_grabar.ejecuta()',
		'Registro_avanza.recibe_status(2)'
	
	];
	var Metodos_avanza_uno = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_prepara_modal_graba_confirma_con_cedula
// DESCRIPCION..: Metodos que se ejecutan cuando se elige grabar y la validación del status del
//                registro de cédula es existente, prepara modal para confirmación

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Maqueta_captura_modal_opcion.contenido([0, "CÉDULA EXISTENTE"])',
		'Maqueta_captura_modal_opcion.contenido([1, "PARA AVANZAR EN LA CAPTURA ES NECESARIO GRABAR LOS CAMBIOS EN LA CÉDULA: "+Json_datos_captura.codigos[0].dato_1+". ESTE PROCESO NO PODRA SER REVOCADO POR LA OPCIÓN REESTABLECER VALORES DE CAPTURA DE CÉDULA."])',
		'Maqueta_captura_modal_opcion.generahtml()',
		'Maqueta_captura_modal_opcion.imprimehtml()',
		'Si_graba_cedula_modal.recibe_metodos("Modal_captura_opcion.cierra(), Metodos_regrabar_validar_cedula.ejecuta()")',
		'Si_graba_cedula_modal.generahtml()',
		'Si_graba_cedula_modal.imprimehtml()',
		'No_graba_cedula_modal.generahtml()',
		'No_graba_cedula_modal.imprimehtml()',
		'Consulta_grabar_cedula.posicion_callback(1)',
		'Modal_captura_opcion.abrefijo()'
	
	];
		
	var Metodos_prepara_modal_graba_confirma_con_cedula = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_prepara_modal_graba_confirma_sin_cedula
// DESCRIPCION..: Metodos que se ejecutan cuando se elige grabar y la validación del status del
//                registro de cédula es nuevo, prepara modal para confirmación

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Maqueta_captura_modal_opcion.contenido([0, "CÉDULA NUEVA"])',
		'Maqueta_captura_modal_opcion.contenido([1, "PARA AVANZAR EN LA CAPTURA ES NECESARIO GRABAR NUEVA CÉDULA."])',
		'Maqueta_captura_modal_opcion.generahtml()',
		'Maqueta_captura_modal_opcion.imprimehtml()',
		'Si_graba_cedula_modal.recibe_metodos("Modal_captura_opcion.cierra(), Metodos_regrabar_validar_cedula.ejecuta()")',
		'Si_graba_cedula_modal.generahtml()',
		'Si_graba_cedula_modal.imprimehtml()',
		'No_graba_cedula_modal.generahtml()',
		'No_graba_cedula_modal.imprimehtml()',
		'Consulta_grabar_cedula.posicion_callback(0)',
		'Modal_captura_opcion.abrefijo()'
	
	];
	
	var Metodos_prepara_modal_graba_confirma_sin_cedula = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Avanzar_dos
// ID...........: ID_AVANZAR_DOS
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_11_2
// DESCRIPCION..: Link con metodos e icono para elegir avanzar grabar en bloque de captura dos
// HTML.........: Espera metodo
// IMPRESION....: Inmediato, sustituye contenido

	var titulosIngles = ['AVANZAR / GRABAR'];
	var iconosIngles = ['fa-solid fa-forward-step'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['AVANZAR / GRABAR'];
	var iconosEspanol = ['fa-solid fa-forward-step'];
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
	var etiquetas = ["boton_link_icono_chico", "ID_AVANZAR_DOS", "#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_11_2", "avanza_bloque_dos"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_avanza_dos.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Avanzar_dos = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Avanzar_dos.generahtml();
	Avanzar_dos.imprimehtml();

// CLASE........: Metodos
// INSTANCIA....: Metodos_avanza_dos
// DESCRIPCION..: Metodos que se ejecutan cuando se elige avanza en la captura de bloque 2  

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Evaluacion_cedula_status_grabar.recibe_validacion([0, Registro_cedula.configuraciones[0]])',
	'Evaluacion_cedula_status_grabar.recibe_metodo([0, "Metodos_prepara_modal_graba_confirma_con_cedula.ejecuta()"])',
	'Evaluacion_cedula_status_grabar.recibe_metodo([1, "Metodos_prepara_modal_graba_confirma_sin_cedula.ejecuta()"])',
	'Evaluacion_cedula_status_grabar.ejecuta()',
	'Registro_avanza.recibe_status(3)'];
	var Metodos_avanza_dos = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Regresa_dos
// ID...........: ID_REGRESAR_DOS
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_11_3
// DESCRIPCION..: Link con metodos e icono para elegir regresar en bloque de captura dos
// HTML.........: Espera metodo
// IMPRESION....: Inmediato, sustituye contenido

	var titulosIngles = ['REGRESAR'];
	var iconosIngles = ['fa-solid fa-backward-step'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['REGRESAR'];
	var iconosEspanol = ['fa-solid fa-backward-step'];
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
	var etiquetas = ["boton_link_icono_chico", "ID_REGRESAR_DOS", "#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_11_3", "regresa_bloque_dos"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_regresa_dos.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Regresa_dos = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Regresa_dos.generahtml();
	Regresa_dos.imprimehtml();

// CLASE........: Metodos
// INSTANCIA....: Metodos_regresa_dos
// DESCRIPCION..: Metodos que se ejecutan cuando se elige regresar en la captura de bloque 2  

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Clases_primer_bloque.afectar()'];
	var Metodos_regresa_dos = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Avanzar_tres
// ID...........: ID_AVANZAR_TRES
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_6_1
// DESCRIPCION..: Link con metodos e icono para elegir avanzar grabar en bloque de captura tres
// HTML.........: Espera metodo
// IMPRESION....: Inmediato, sustituye contenido

	var titulosIngles = ['AVANZAR / GRABAR'];
	var iconosIngles = ['fa-solid fa-forward-step'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['AVANZAR / GRABAR'];
	var iconosEspanol = ['fa-solid fa-forward-step'];
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
	var etiquetas = ["boton_link_icono_chico", "ID_AVANZAR_TRES", "#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_6_2", "avanza_bloque_tres"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_avanza_tres.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Avanzar_tres = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Avanzar_tres.generahtml();
	Avanzar_tres.imprimehtml();

// CLASE........: Metodos
// INSTANCIA....: Metodos_avanza_tres
// DESCRIPCION..: Metodos que se ejecutan cuando se elige avanza en la captura de bloque 3  

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Evaluacion_cedula_status_grabar.recibe_validacion([0, Registro_cedula.configuraciones[0]])',
	'Evaluacion_cedula_status_grabar.recibe_metodo([0, "Metodos_prepara_modal_graba_confirma_con_cedula.ejecuta()"])',
	'Evaluacion_cedula_status_grabar.recibe_metodo([1, "Metodos_prepara_modal_graba_confirma_sin_cedula.ejecuta()"])',
	'Evaluacion_cedula_status_grabar.ejecuta()',
	'Registro_avanza.recibe_status(4)'];
	var Metodos_avanza_tres = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Regresa_tres
// ID...........: ID_REGRESAR_TRES
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_6_3
// DESCRIPCION..: Link con metodos e icono para elegir regresar en bloque de captura tres
// HTML.........: Espera metodo
// IMPRESION....: Inmediato, sustituye contenido

	var titulosIngles = ['REGRESAR'];
	var iconosIngles = ['fa-solid fa-backward-step'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['REGRESAR'];
	var iconosEspanol = ['fa-solid fa-backward-step'];
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
	var etiquetas = ["boton_link_icono_chico", "ID_REGRESAR_TRES", "#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_6_3", "regresa_bloque_tres"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_regresa_tres.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Regresa_tres = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Regresa_tres.generahtml();
	Regresa_tres.imprimehtml();

// CLASE........: Metodos
// INSTANCIA....: Metodos_regresa_tres
// DESCRIPCION..: Metodos que se ejecutan cuando se elige regresar en la captura de bloque 3  

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Clases_segundo_bloque.afectar()'];
	var Metodos_regresa_tres = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Regresa_cuatro
// ID...........: ID_REGRESAR_CUATRO
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_9_2
// DESCRIPCION..: Link con metodos e icono para elegir regresar en bloque de captura cuatro
// HTML.........: Espera metodo
// IMPRESION....: Inmediato, sustituye contenido

	var titulosIngles = ['REGRESAR'];
	var iconosIngles = ['fa-solid fa-backward-step'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['REGRESAR'];
	var iconosEspanol = ['fa-solid fa-backward-step'];
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
	var etiquetas = ["boton_link_icono_chico", "ID_REGRESAR_CUATRO", "#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_9_2", "regresa_bloque_cuatro"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_regresa_cuatro.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Regresa_cuatro = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Regresa_cuatro.generahtml();
	Regresa_cuatro.imprimehtml();

// CLASE........: Metodos
// INSTANCIA....: Metodos_regresa_cuatro
// DESCRIPCION..: Metodos que se ejecutan cuando se elige regresar en la captura de bloque 4  

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Clases_tercer_bloque.afectar()'];
	var Metodos_regresa_cuatro = new Metodos(configuraciones, codigos, elementos);





    

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE PROCESO DE GRABACIÓN CON CÉDULA Y SIN CÉDULA CON VALIDACIONES

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************







// %% // $$ // INSTANCIAMOS LAS DOS EVALUACIONES NECESARIAS PARA EL
// %% // $$ // PROCESO DE GRABACIÓN DE CÉDULA LA PRIMERA Evaluacion_cedula_status_grabar
// %% // $$ // MANTIENE EL STATUS DEL REGISTRO DE CÉDULA 0 = NO HAY
// %% // $$ // REGISTRO 1 = REGISTRO EN ACTUALIZACIÓN 2 = REGISTRO NUEVO
// %% // $$ // INSTANCIAMOS LAS DOS EVALUACIONES NECESARIAS PARA EL
// %% // $$ // LA SEGUNDA Evaluacion_localidad_grabar MANTIENE EL VALOR 
// %% // $$ // DE LA CAPTURA DE LOCALIDAD CORRECTA O INCORRECTA O NO
// %% // $$ // EXISTE EN LA BD. ESTAS INSTACIAS TIENEN LA PARTICULARIDAD
// %% // $$ // QUE SIEMPRE SABEN LO QUE VAN EVALUAR PERO LOS METODOS
// %% // $$ // DE RESPUESTA DEBEN DE CONFIGURAR SIEMPRE ANTES DE EJECUTAR


// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_cedula_status_grabar
// DESCRIPCION..: Evalua status de registro de cédula nueva o ya existente grabada 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['', ''];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [1];
	var especialesElementos = [['0', '2']];
	var retornoElementos = [[0, 1]];
	var mensajesElementos = [['REGISTRO DE CÉDULA NO SELECCIONADO', 'CÉDULA NUEVA']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_cedula_status_grabar = new Evaluacion(configuraciones, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_localidad_cedula_grabar
// DESCRIPCION..: Evalua localidad vacia o valor especial 'TODOS_REGISTROS_L' 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['', ''];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [1];
	var especialesElementos = [['', 'TODOS_REGISTROS_L']];
	var retornoElementos = [[0, 1, 2]];
	var mensajesElementos = [['LOCALIDAD NO SELECCIONADA', 'LOCALIDAD NO SELECCIONADA', 'LOCALIDAD NO EXISTE EN LA BD']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_localidad_cedula_grabar = new Evaluacion(configuraciones, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_localidad_existe_grabar
// DESCRIPCION..: Evalua localidad no existe en la BD 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['', ''];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [1];
	var especialesElementos = [['0']];
	var retornoElementos = [[0]];
	var mensajesElementos = [['LOCALIDAD NO SELECCIONADA']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_localidad_existe_grabar = new Evaluacion(configuraciones, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_graba_cedula_modal
// ID...........: ID_SI_GRABA_CON_CEDULA_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en modales del proceso grabar
//                cédula
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_GRABA_CON_CEDULA_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_graba_con_cedula_modal"];
	var codigos = [''];
	var onclickMetodos = [''];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_graba_cedula_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Elemento
// INSTANCIA....: No_graba_cedula_modal
// ID...........: ID_NO_GRABA_CEDULA_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en modales de proceso grabar
//                cédula
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
	var etiquetas = ["boton_link_icono_chico", "ID_NO_GRABA_CEDULA_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_graba_con_cedula_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_captura_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_graba_cedula_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_regrabar_validar_cedula
// DESCRIPCION..: Metodos que se ejecutan cuando se elige confirmar grabar cédula y la validación del status del
//                registro de cédula es exsietnte, se evalua que la localidad no este vacía

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Evaluacion_localidad_cedula_grabar.recibe_validacion([0, Combolist_localidades_2.valores[1][1]])',
		'Evaluacion_localidad_cedula_grabar.recibe_metodo([0, "Metodos_graba_inspecciona_localidad.ejecuta()"])',
		'Evaluacion_localidad_cedula_grabar.recibe_metodo([1, "Metodos_prepara_modal_localidad_vacia.ejecuta()"])',
		'Evaluacion_localidad_cedula_grabar.ejecuta()'
	
	];
	
	var Metodos_regrabar_validar_cedula = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_prepara_modal_localidad_vacia
// DESCRIPCION..: Metodos que se ejecutan cuando se intenta grabar con la localidad vacia

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Maqueta_captura_modal_opcion.contenido([0, "LOCALIDAD VACIA"])',
	'Maqueta_captura_modal_opcion.contenido([1, "ELIGE UNA LOCALIDAD VALIDA."])',
	'Maqueta_captura_modal_opcion.generahtml()',
	'Maqueta_captura_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_captura_opcion.abrefijo()'];
	var Metodos_prepara_modal_localidad_vacia = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_graba_inspecciona_localidad
// DESCRIPCION..: Metodos para preparar consulta de localidad existente

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Modal_captura.abrefijo()',
	/*
	
	'Consulta_inspecciona_localidad.actualizafiltro(0, Select_localidades_c.recorta_filtro([[["TODOS_REGISTROS_L", 2, "TODOS_REGISTROS_L", 0, 0]], 4, 0, 2]))',
	'Consulta_inspecciona_localidad.actualizafiltro(1, Select_localidades_c.recorta_filtro([[["TODOS_REGISTROS_L", 2, "TODOS_REGISTROS_L", 0, 0]], 4, 1, 2]))',
	'Consulta_inspecciona_localidad.actualizafiltro(2, Select_localidades_c.recorta_filtro([[["TODOS_REGISTROS_L", 2, "TODOS_REGISTROS_L", 0, 0]], 4, 3, 2]))',
	*/
		'Consulta_inspecciona_localidad.actualizafiltro(0, Combolist_localidades_2.valores[1][0])',
		'Consulta_inspecciona_localidad.actualizafiltro(1, Combolist_localidades_2.valores[1][1])',
		'Consulta_inspecciona_localidad.actualizafiltro(2, Combolist_localidades_2.valores[1][3])',
		'Consulta_inspecciona_localidad.posicion_callback(1)',
		'Consulta_inspecciona_localidad.ejecuta()',
		'Modal_captura.cierra()'
	
	];
	var Metodos_graba_inspecciona_localidad = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_inspecciona_localidad_graba_callback
// DESCRIPCION..: Metodos que se ejecutan cuando regresamos de inspeccionar si existe
//                la localidad en proceso de grabar cédula

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Evaluacion_localidad_existe_grabar.recibe_validacion([0, Consulta_inspecciona_localidad.codigos[0][0][0].registros])',
		'Evaluacion_localidad_existe_grabar.recibe_metodo([0, "Metodos_grabar_cedula_status.ejecuta()"])',
		'Evaluacion_localidad_existe_grabar.recibe_metodo([1, "Metodos_localidad_no_existe_modal.ejecuta()"])',
		'Evaluacion_localidad_existe_grabar.ejecuta()'
	
	];
	var Metodos_inspecciona_localidad_graba_callback = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_localidad_no_existe_modal
// DESCRIPCION..: Metodos que se ejecutan cuando se intenta grabar con localidad que no
//                existe

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Maqueta_captura_modal_opcion.contenido([0, "LOCALIDAD NO EXISTE"])',
	'Maqueta_captura_modal_opcion.contenido([1, "LA LOCALIDAD NO EXISTE. ELIGE UNA LOCALIDAD VALIDA."])',
	'Maqueta_captura_modal_opcion.generahtml()',
	'Maqueta_captura_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_captura_opcion.abrefijo()'];
	var Metodos_localidad_no_existe_modal = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_grabar_cedula_status
// DESCRIPCION..: Metodos que se ejecutan cuando se va a grabar cédula despues de confirmación

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Evaluacion_cedula_status_grabar.recibe_validacion([0, Registro_cedula.configuraciones[0]])',
	'Evaluacion_cedula_status_grabar.recibe_metodo([0, "Metodos_grabar_cedula.ejecuta()"])',
	'Evaluacion_cedula_status_grabar.recibe_metodo([1, "Metodos_grabar_cedula.ejecuta()"])',
	'Evaluacion_cedula_status_grabar.ejecuta()'];
	var Metodos_grabar_cedula_status = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_grabar_cedula
// DESCRIPCION..: Metodos que se ejecutan cuando se va a grabar cédula nuevo registro despues
//                de evaluación

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Modal_captura.abrefijo()',
		'Consulta_grabar_cedula.actualizafiltro(0, Registro_graba.configuraciones[0])',
		'Consulta_grabar_cedula.actualizafiltro(1, Registro_cedula.configuraciones[0])',
		'Consulta_grabar_cedula.actualizafiltro(2, Registro_bloque.configuraciones[0])',
		'Consulta_grabar_cedula.actualizafiltro(3, Registro_id.configuraciones[0])',
		'Consulta_grabar_cedula.actualizafiltro(4, Combolist_localidades_2.valores[1][0])',
		'Consulta_grabar_cedula.actualizafiltro(5, Combolist_localidades_2.valores[1][1])',
		'Consulta_grabar_cedula.actualizafiltro(6, Combolist_localidades_2.valores[1][2])',
		'Consulta_grabar_cedula.actualizafiltro(7, Combolist_localidades_2.valores[1][3])',
		'Consulta_grabar_cedula.actualizafiltro(8, usuarioID)',
		'Datos_captura.consulta_natural(9, Consulta_grabar_cedula)',
		'Consulta_grabar_cedula.actualizafiltro(93, Fecha_reg_ced.valores[1])',
		'Consulta_grabar_cedula.actualizafiltro(94, Fecha_reg_viv.valores[1])',
		'Consulta_grabar_cedula.actualizafiltro(95, Fecha_reg_gen.valores[1])',
		'Consulta_grabar_cedula.actualizafiltro(96, Registro_tipoloca.configuraciones[0])',
		'Consulta_grabar_cedula.actualizafiltro(97, Registro_numinteg.configuraciones[0])',
		'Consulta_grabar_cedula.actualizafiltro(98, Registro_origcapt.configuraciones[0])',
		'Consulta_grabar_cedula.ejecuta()',
		'Modal_captura.cierra()'
	
	];
	var Metodos_grabar_cedula = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_grabar_cedula
// DESCRIPCION..: Consulta que se ejecuta para grabar o regrabar cédula

	var statusConsulta = 0;
	var scriptPhp = 'consulta_graba_cedula.php';
	var metodoPhp = 'POST';
	var filtro = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46', '47', '48', '49', '50', '51', '52', '53', '54', '55', '56', '57', '58', '59', '60', '61', '62', '63', '64', '65', '66', '67', '68', '69', '70', '71', '72', '73', '74', '75', '76', '77', '78', '79', '80', '81', '82', '83', '84', '85', '86', '87', '88', '89', '90', '91', '92', '93', '94', '95', '96', '97', '98', '99'];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_graba_cedula.ejecuta()'];
	var metodosCallback02 = ['Metodos_after_actualiza_cedula.ejecuta()'];
	var metodosCallback = [metodosCallback01, metodosCallback02]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_grabar_cedula = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_graba_cedula
// DESCRIPCION..: Metodos que se ejecutan despues de grabar nueva cédula

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Modal_captura.abrefijo()',
	'Consulta_baja_registro.actualizafiltro(0, Consulta_grabar_cedula.codigos[0][0][0].recupera)',
	'Registro_id.recibe_status(Consulta_grabar_cedula.codigos[0][0][0].recupera)',
	'Consulta_baja_registro.posicion_callback(2)',
	'Consulta_baja_registro.ejecuta()',
	'Modal_captura.cierra()'];
	var Metodos_after_graba_cedula = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_graba_baja
// DESCRIPCION..: Metodos que se ejecutan despues de grabar consulta de cédula al regrescar 
//                registro, grid, selects y captura

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Modal_captura.cierra()',
	'Registro_cedula.recibe_status(1)',
	'Registro_familiar.recibe_status(0)',
	'Json_datos_captura.recibe_json(Consulta_baja_registro.codigos[0])',
	'Json_datos_captura.genera()',
	'Datos_captura.imprime_natural(Json_datos_captura.codigos[0])',
	'Fecha_reg_ced.recibe_valor(Consulta_baja_registro.codigos[0][0][1].dato_18)',
	'Fecha_reg_viv.recibe_valor(Consulta_baja_registro.codigos[0][0][1].dato_64)',
	'Fecha_reg_gen.recibe_valor(Consulta_baja_registro.codigos[0][0][1].dato_94)',
	'Registro_tipoloca.recibe_status(Consulta_baja_registro.codigos[0][0][1].dato_09)',
	'Registro_numinteg.recibe_status(Consulta_baja_registro.codigos[0][0][1].dato_95)',
	'Registro_origcapt.recibe_status(Consulta_baja_registro.codigos[0][0][1].dato_96)',
	/*
	'Select_municipios_c.seleccion("/1/"+(Consulta_baja_registro.codigos[0][0][1].dato_03.trim().length+1000).toString().slice(-3)+"/"+Consulta_baja_registro.codigos[0][0][1].dato_03.trim()+"/1/"+(Consulta_baja_registro.codigos[0][0][1].dato_04.trim().length+1000).toString().slice(-3)+"/"+Consulta_baja_registro.codigos[0][0][1].dato_04.trim())',
    'Select_municipios_c.posicion_callback(0)',
	'Select_municipios_c.generahtml()',
	*/
	'Combolist_municipios_2.recibe_texto(Consulta_baja_registro.codigos[0][0][1].dato_03.trim()+" "+Consulta_baja_registro.codigos[0][0][1].dato_04.trim())',
	'Consulta_combolist_municipios_2.limpia_codigos()',
	'Consulta_combolist_municipios_2.inicializa_parametros()',
    'Consulta_combolist_municipios_2.posicion_callback(0)',
	'Consulta_combolist_municipios_2.ejecuta_2()',
	'Modal_captura.abrefijo()',	
//	'Gradilla_cedulas.inicializa_posicion()',
// 88 // 77
//	'Consulta_gradilla.actualizafiltro(0, Consulta_baja_registro.codigos[0][0][1].dato_04.trim())', 
//	'Consulta_gradilla.actualizafiltro(1, Consulta_baja_registro.codigos[0][0][1].dato_06.trim())',
//	'Consulta_gradilla.actualizafiltro(0, Combolist_municipios.valores[1][1])', 
//	'Consulta_gradilla.actualizafiltro(1, Combolist_localidades.valores[1][3])',
	'Consulta_gradilla.actualizafiltro(2, usuarioID)', 
	'Consulta_gradilla.actualizafiltro(3, usuarioStatus)',
	'Consulta_gradilla.limpia_codigos()',
	'Consulta_gradilla.inicializa_parametros()',
    'Consulta_gradilla.posicion_callback(0)',
	'Consulta_gradilla.ejecuta_2()',
	'Consulta_gradilla_familiares.actualizafiltro(0, Consulta_grabar_cedula.codigos[0][0][0].recupera)',
	'Consulta_gradilla_familiares.posicion_callback(0)',
	'Consulta_gradilla_familiares.ejecuta()',
	'Datos_captura_familiares.imprime_natural(Json_familiar_vacio)',
	'Clases_registro_activo.afectar()',
	'Evaluacion_avanzar_graba_bloque_dos.recibe_validacion([0, Registro_avanza.configuraciones[0]])',
	'Evaluacion_avanzar_graba_bloque_dos.recibe_metodo([0, ""])',
	'Evaluacion_avanzar_graba_bloque_dos.recibe_metodo([1, "Metodos_graba_avanza_dos.ejecuta()"])',
	'Evaluacion_avanzar_graba_bloque_dos.ejecuta()'];
	var Metodos_graba_baja = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_actualiza_cedula
// DESCRIPCION..: Metodos que se ejecutan despues de actualizar cédula

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Modal_captura.abrefijo()',
		'Consulta_baja_registro.actualizafiltro(0, Json_datos_captura.codigos[0].dato_1)',
		'Registro_id.recibe_status(Json_datos_captura.codigos[0].dato_1)',
		'Consulta_baja_registro.posicion_callback(3)',
		'Consulta_baja_registro.ejecuta()',
		'Modal_captura.cierra()'
	
	];
	var Metodos_after_actualiza_cedula = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_actualiza_baja
// DESCRIPCION..: Metodos que se ejecutan despues de grabar consulta de cédula al regrescar 
//                registro, grid, selects y captura

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'Modal_captura.cierra()',
		'Registro_cedula.recibe_status(1)',
		'Registro_familiar.recibe_status(0)',
		'Json_datos_captura.recibe_json(Consulta_baja_registro.codigos[0])',
		'Json_datos_captura.genera()',
		'Datos_captura.imprime_natural(Json_datos_captura.codigos[0])',
		'Fecha_reg_ced.recibe_valor(Consulta_baja_registro.codigos[0][0][1].dato_18)',
		'Fecha_reg_viv.recibe_valor(Consulta_baja_registro.codigos[0][0][1].dato_64)',
		'Fecha_reg_gen.recibe_valor(Consulta_baja_registro.codigos[0][0][1].dato_94)',
		'Registro_tipoloca.recibe_status(Consulta_baja_registro.codigos[0][0][1].dato_09)',
		'Registro_numinteg.recibe_status(Consulta_baja_registro.codigos[0][0][1].dato_95)',
		'Registro_origcapt.recibe_status(Consulta_baja_registro.codigos[0][0][1].dato_96)',
	/*
	'Select_municipios_c.seleccion("/1/"+(Consulta_baja_registro.codigos[0][0][1].dato_03.trim().length+1000).toString().slice(-3)+"/"+Consulta_baja_registro.codigos[0][0][1].dato_03.trim()+"/1/"+(Consulta_baja_registro.codigos[0][0][1].dato_04.trim().length+1000).toString().slice(-3)+"/"+Consulta_baja_registro.codigos[0][0][1].dato_04.trim())',
    'Select_municipios_c.posicion_callback(0)',
	'Select_municipios_c.generahtml()',
	*/
		'Combolist_municipios_2.recibe_texto(Consulta_baja_registro.codigos[0][0][1].dato_03.trim()+" "+Consulta_baja_registro.codigos[0][0][1].dato_04.trim())',
		'Consulta_combolist_municipios_2.limpia_codigos()',
		'Consulta_combolist_municipios_2.inicializa_parametros()',
    	'Consulta_combolist_municipios_2.posicion_callback(0)',
		'Consulta_combolist_municipios_2.ejecuta_2()',
		'Modal_captura.abrefijo()',	
	
		//'Consulta_gradilla.actualizafiltro(0, Consulta_baja_registro.codigos[0][0][1].dato_04.trim())', 
		//'Consulta_gradilla.actualizafiltro(1, Consulta_baja_registro.codigos[0][0][1].dato_06.trim())',
		'Consulta_gradilla.actualizafiltro(2, usuarioID)', 
		'Consulta_gradilla.actualizafiltro(3, usuarioStatus)',
	
		//'Gradilla_cedulas.inicializa_posicion()',
		'Consulta_gradilla.limpia_codigos()',
		'Consulta_gradilla.inicializa_parametros()',
		'Consulta_gradilla.posicion_callback(0)',
		'Consulta_gradilla.ejecuta_2()',
	
		'Consulta_gradilla_familiares.actualizafiltro(0, Json_datos_captura.codigos[0].dato_1)',
		'Consulta_gradilla_familiares.posicion_callback(0)',
		'Consulta_gradilla_familiares.ejecuta()',
		'Datos_captura_familiares.imprime_natural(Json_familiar_vacio)',
		'Clases_registro_activo.afectar()',
		'Evaluacion_avanzar_graba_bloque_dos.recibe_validacion([0, Registro_avanza.configuraciones[0]])',
		'Evaluacion_avanzar_graba_bloque_dos.recibe_metodo([0, ""])',
		'Evaluacion_avanzar_graba_bloque_dos.recibe_metodo([1, "Metodos_actualiza_avanza_dos.ejecuta()"])',
		'Evaluacion_avanzar_graba_bloque_dos.ejecuta()',
		'Evaluacion_avanzar_graba_bloque_tres.recibe_validacion([0, Registro_avanza.configuraciones[0]])',
		'Evaluacion_avanzar_graba_bloque_tres.recibe_metodo([0, ""])',
		'Evaluacion_avanzar_graba_bloque_tres.recibe_metodo([1, "Metodos_actualiza_avanza_tres.ejecuta()"])',
		'Evaluacion_avanzar_graba_bloque_tres.ejecuta()',
		'Evaluacion_avanzar_graba_bloque_cuatro.recibe_validacion([0, Registro_avanza.configuraciones[0]])',
		'Evaluacion_avanzar_graba_bloque_cuatro.recibe_metodo([0, ""])',
		'Evaluacion_avanzar_graba_bloque_cuatro.recibe_metodo([1, "Metodos_actualiza_avanza_cuatro.ejecuta()"])',
		'Evaluacion_avanzar_graba_bloque_cuatro.ejecuta()'];
		var Metodos_actualiza_baja = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_avanzar_graba_bloque_dos
// DESCRIPCION..: Evalua el avance al bloque 2 en la actualización de cédula 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['', ''];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [1];
	var especialesElementos = [['2']];
	var retornoElementos = [[1]];
	var mensajesElementos = [['AVANZO A BLOQUE DOS']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_avanzar_graba_bloque_dos = new Evaluacion(configuraciones, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_avanzar_graba_bloque_tres
// DESCRIPCION..: Evalua el avance al bloque 3 en la actualización de cédula 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['', ''];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [1];
	var especialesElementos = [['3']];
	var retornoElementos = [[1]];
	var mensajesElementos = [['AVANZO A BLOQUE TRES']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_avanzar_graba_bloque_tres = new Evaluacion(configuraciones, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_avanzar_graba_bloque_cuatro
// DESCRIPCION..: Evalua el avance al bloque 4 en la actualización de cédula 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['', ''];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [1];
	var especialesElementos = [['4']];
	var retornoElementos = [[1]];
	var mensajesElementos = [['AVANZO A BLOQUE CUATRO']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_avanzar_graba_bloque_cuatro = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_graba_avanza_dos
// DESCRIPCION..: Metodos que se ejecutan despues de grabar y avanzar al bloque dos
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Maqueta_captura_modal_opcion.contenido([0, "CÉDULA GRABADA"])',
	'Maqueta_captura_modal_opcion.contenido([1, "LA CÉDULA FUE GRABADA EXITOSAMENTE CON EL ID: "+Consulta_grabar_cedula.codigos[0][0][0].recupera+" AVANCÉ AL SEGUNDO BLOQUE DE CAPTURA."])',
	'Maqueta_captura_modal_opcion.generahtml()',
	'Maqueta_captura_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_captura_opcion.abrefijo()',
	'Registro_bloque.recibe_status(2)',
	'Clases_segundo_bloque.afectar()'];
	var Metodos_graba_avanza_dos = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_actualiza_avanza_dos
// DESCRIPCION..: Metodos que se ejecutan despues de actualizar y avanzar al bloque dos
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Maqueta_captura_modal_opcion.contenido([0, "CÉDULA ACTUALIZADA"])',
	'Maqueta_captura_modal_opcion.contenido([1, "LA CÉDULA: "+Json_datos_captura.codigos[0].dato_1+" FUE ACTUALIZADA EXITOSAMENTE. AVANCÉ AL SEGUNDO BLOQUE DE CAPTURA."])',
	'Maqueta_captura_modal_opcion.generahtml()',
	'Maqueta_captura_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_captura_opcion.abrefijo()',
	'Registro_bloque.recibe_status(2)',
	'Clases_segundo_bloque.afectar()'];
	var Metodos_actualiza_avanza_dos = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_actualiza_avanza_tres
// DESCRIPCION..: Metodos que se ejecutan despues de actualizar y avanzar al bloque tres
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Maqueta_captura_modal_opcion.contenido([0, "CÉDULA ACTUALIZADA"])',
	'Maqueta_captura_modal_opcion.contenido([1, "LA CÉDULA: "+Json_datos_captura.codigos[0].dato_1+" FUE ACTUALIZADA EXITOSAMENTE. AVANCÉ AL TERCER BLOQUE DE CAPTURA."])',
	'Maqueta_captura_modal_opcion.generahtml()',
	'Maqueta_captura_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_captura_opcion.abrefijo()',
	'Registro_bloque.recibe_status(3)',
	'Clases_tercer_bloque.afectar()'];
	var Metodos_actualiza_avanza_tres = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_actualiza_avanza_cuatro
// DESCRIPCION..: Metodos que se ejecutan despues de actualizar y avanzar al bloque cuatro
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Maqueta_captura_modal_opcion.contenido([0, "CÉDULA ACTUALIZADA"])',
	'Maqueta_captura_modal_opcion.contenido([1, "LA CÉDULA: "+Json_datos_captura.codigos[0].dato_1+" FUE ACTUALIZADA EXITOSAMENTE. AVANCÉ AL CUARTO BLOQUE DE CAPTURA."])',
	'Maqueta_captura_modal_opcion.generahtml()',
	'Maqueta_captura_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_captura_opcion.abrefijo()',
	'Registro_bloque.recibe_status(4)',
	'Clases_cuarto_bloque.afectar()',
	'Evaluacion_status_familiares.recibe_validacion([0, Registro_familiar.configuraciones[0]])',
	'Evaluacion_status_familiares.recibe_metodo([0, "Clases_enabled_familiar.afectar()"])',
	'Evaluacion_status_familiares.recibe_metodo([1, "Clases_disabled_familiar.afectar()"])',
	'Evaluacion_status_familiares.ejecuta()'];
	var Metodos_actualiza_avanza_cuatro = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_status_familiares
// DESCRIPCION..: Evalua el status del registro de familiares 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['', ''];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [1];
	var especialesElementos = [['0']];
	var retornoElementos = [[0]];
	var mensajesElementos = [['REGISTRO DE FAMILIAR NO SELECCIONADO']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_status_familiares = new Evaluacion(configuraciones, elementos);






	

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE VALIDA GRABACIÓN DE CÉDULA

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

	





// CLASE........: Evaluacion
// INSTANCIA....: Validacion_localidad_grabar
// DESCRIPCION..: Evalua que localidad no este vacio para poder grabar cédula 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_prepara_modal_graba_confirma.ejecuta()'];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [1];
	var especialesElementos = [['TODOS_REGISTROS_L', 'UNA PRUEBA INUTIL', '']];
	var retornoElementos = [[3, 4, 5]];
	var mensajesElementos = [['NO PUEDO GRABAR CÉDULA SIN LOCALIDAD', 'NO PUEDO GRABAR CÉDULA SIN LOCALIDAD', 'NO PUEDO GRABAR CÉDULA SIN LOCALIDAD'], ['PARA GRABAR LOCALIDAD ELIGE UN MUNICIPIO', 'LLEGAMOS A LA PRUEBA INUTIL']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Validacion_localidad_grabar = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_agrega_localidad_no_valida
// DESCRIPCION..: Metodos que se ejecutan cuando la validación de consulta agrega localidad falla

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Maqueta_captura_modal_opcion.contenido([0, "DATOS INCORRECTOS"])',
	'Maqueta_captura_modal_opcion.contenido([1, Validacion_localidad.configuraciones[1][4]])',
	'Maqueta_captura_modal_opcion.generahtml()',
	'Maqueta_captura_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_captura_opcion.abrefijo()'];
	var Metodos_agrega_localidad_no_valida = new Metodos(configuraciones, codigos, elementos);








// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE JSON DATOS DE CAPTURA

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Json_cedula_nueva
// DESCRIPCION..: Json de datos para iniciar captura de nueva cedula  

var Json_cedula_nueva = {"dato_0" : "2",
                        "dato_1" : " SIN GRABAR",
                        "dato_2" : "",
                        "dato_3" : "",
                        "dato_4" : "",
                        "dato_5" : "",
                        "dato_6" : "0",
                        "dato_7" : "0",
                        "dato_8" : "0",
                        "dato_9" : "0",
                        "dato_10" : "0",
                        "dato_11" : "0",
                        "dato_12" : "0",
                        "dato_13" : "0",
                        "dato_14" : "0",
                        "dato_15" : "0",
                        "dato_16" : "0",
                        "dato_17" : "0",
                        "dato_18" : "0",
                        "dato_19" : "0",
                        "dato_20" : "0",
                        "dato_21" : "0",
                        "dato_22" : "0",
                        "dato_23" : "0",
                        "dato_24" : "0",
                        "dato_25" : "0",
                        "dato_26" : "0",
                        "dato_27" : "0",
                        "dato_28" : "0",
                        "dato_29" : "0",
                        "dato_30" : "0",
                        "dato_31" : "0",
                        "dato_32" : "0",
                        "dato_33" : "0",
                        "dato_34" : "0",
                        "dato_35" : "0",
                        "dato_36" : "0",
                        "dato_37" : "0",
                        "dato_38" : "0",
                        "dato_39" : "0",
                        "dato_40" : "0",
                        "dato_41" : "0",
                        "dato_42" : "0",
                        "dato_43" : "0",
                        "dato_44" : "0",
                        "dato_45" : "0",
                        "dato_46" : "0",
                        "dato_47" : "0",
                        "dato_48" : "0",
                        "dato_49" : "0",
                        "dato_50" : "0",
                        "dato_51" : "0",
                        "dato_52" : "0",
                        "dato_53" : "0",
                        "dato_54" : "0",
                        "dato_55" : "0",
                        "dato_56" : "0",
                        "dato_57" : "0",
                        "dato_58" : "0",
                        "dato_59" : "0",
                        "dato_60" : "0",
                        "dato_61" : "0",
                        "dato_62" : "0",
                        "dato_63" : "0",
                        "dato_64" : "0",
                        "dato_65" : "0",
                        "dato_66" : "0",
                        "dato_67" : "0",
                        "dato_68" : "0",
                        "dato_69" : "0",
                        "dato_70" : "0",
                        "dato_71" : "0",
                        "dato_72" : "0",
                        "dato_73" : "0",
                        "dato_74" : "0",
                        "dato_75" : "0",
                        "dato_76" : "0",
                        "dato_77" : "0",
                        "dato_78" : "0",
                        "dato_79" : "0",
                        "dato_80" : "0",
                        "dato_81" : "0",
                        "dato_82" : "0",
                        "dato_83" : ""};

// CLASE........: Json
// INSTANCIA....: Json_datos_captura
// DESCRIPCION..: Json que recoge los valores de la consulta baja cedula según una 
//                configuración. Tipo de fuente de los datos de entrada: 0 = Directo
//                lo recoge de un arreglo, 1 = Json consulta de consultas cada consulta tiene
//                dos objetos, 2 Json de una consulta tiene dos objetos, 3 = Json normal
//                de un solo objeto 

    var numeroElementos = 84;
	var tipoFuente = 2;
	var configuraciones = [numeroElementos, tipoFuente];

	var codigoJsonSalida = '';
	var codigoJsonFuente = '';
	var codigos = [codigoJsonSalida, codigoJsonFuente];
	
	var elementoValorFuente01 = [1, 'registros'];
	var elementoValorFuente02 = [2, 'dato_01'];
	var elementoValorFuente03 = [2, 'dato_07'];
	var elementoValorFuente04 = [2, 'dato_08'];
	var elementoValorFuente05 = [2, 'dato_04'];
	var elementoValorFuente06 = [2, 'dato_06'];
	var elementoValorFuente07 = [2, 'dato_10'];
	var elementoValorFuente08 = [2, 'dato_11'];
	var elementoValorFuente09 = [2, 'dato_12'];
	var elementoValorFuente10 = [2, 'dato_13'];
	var elementoValorFuente11 = [2, 'dato_19'];
	var elementoValorFuente12 = [2, 'dato_20'];
	var elementoValorFuente13 = [2, 'dato_21'];
	var elementoValorFuente14 = [2, 'dato_22'];
	var elementoValorFuente15 = [2, 'dato_23'];
	var elementoValorFuente16 = [2, 'dato_24'];
	var elementoValorFuente17 = [2, 'dato_25'];
	var elementoValorFuente18 = [2, 'dato_26'];
	var elementoValorFuente19 = [2, 'dato_27'];
	var elementoValorFuente20 = [2, 'dato_28'];
	var elementoValorFuente21 = [2, 'dato_29'];
	var elementoValorFuente22 = [2, 'dato_30'];
	var elementoValorFuente23 = [2, 'dato_31'];
	var elementoValorFuente24 = [2, 'dato_32'];
	var elementoValorFuente25 = [2, 'dato_33'];
	var elementoValorFuente26 = [2, 'dato_34'];
	var elementoValorFuente27 = [2, 'dato_35'];
	var elementoValorFuente28 = [2, 'dato_36'];
	var elementoValorFuente29 = [2, 'dato_37'];
	var elementoValorFuente30 = [2, 'dato_38'];
	var elementoValorFuente31 = [2, 'dato_39'];
	var elementoValorFuente32 = [2, 'dato_40'];
	var elementoValorFuente33 = [2, 'dato_41'];
	var elementoValorFuente34 = [2, 'dato_42'];
	var elementoValorFuente35 = [2, 'dato_43'];
	var elementoValorFuente36 = [2, 'dato_44'];
	var elementoValorFuente37 = [2, 'dato_45'];
	var elementoValorFuente38 = [2, 'dato_46'];
	var elementoValorFuente39 = [2, 'dato_47'];
	var elementoValorFuente40 = [2, 'dato_48'];
	var elementoValorFuente41 = [2, 'dato_49'];
	var elementoValorFuente42 = [2, 'dato_50'];
	var elementoValorFuente43 = [2, 'dato_51'];
	var elementoValorFuente44 = [2, 'dato_52'];
	var elementoValorFuente45 = [2, 'dato_53'];
	var elementoValorFuente46 = [2, 'dato_54'];
	var elementoValorFuente47 = [2, 'dato_55'];
	var elementoValorFuente48 = [2, 'dato_56'];
	var elementoValorFuente49 = [2, 'dato_57'];
	var elementoValorFuente50 = [2, 'dato_58'];
	var elementoValorFuente51 = [2, 'dato_59'];
	var elementoValorFuente52 = [2, 'dato_60'];
	var elementoValorFuente53 = [2, 'dato_61'];
	var elementoValorFuente54 = [2, 'dato_62'];
	var elementoValorFuente55 = [2, 'dato_63'];
	var elementoValorFuente56 = [2, 'dato_65'];
	var elementoValorFuente57 = [2, 'dato_66'];
	var elementoValorFuente58 = [2, 'dato_67'];
	var elementoValorFuente59 = [2, 'dato_68'];
	var elementoValorFuente60 = [2, 'dato_69'];
	var elementoValorFuente61 = [2, 'dato_70'];
	var elementoValorFuente62 = [2, 'dato_71'];
	var elementoValorFuente63 = [2, 'dato_72'];
	var elementoValorFuente64 = [2, 'dato_73'];
	var elementoValorFuente65 = [2, 'dato_74'];
	var elementoValorFuente66 = [2, 'dato_75'];
	var elementoValorFuente67 = [2, 'dato_76'];
	var elementoValorFuente68 = [2, 'dato_77'];
	var elementoValorFuente69 = [2, 'dato_78'];
	var elementoValorFuente70 = [2, 'dato_79'];
	var elementoValorFuente71 = [2, 'dato_80'];
	var elementoValorFuente72 = [2, 'dato_81'];
	var elementoValorFuente73 = [2, 'dato_82'];
	var elementoValorFuente74 = [2, 'dato_83'];
	var elementoValorFuente75 = [2, 'dato_84'];
	var elementoValorFuente76 = [2, 'dato_85'];
	var elementoValorFuente77 = [2, 'dato_86'];
	var elementoValorFuente78 = [2, 'dato_87'];
	var elementoValorFuente79 = [2, 'dato_88'];
	var elementoValorFuente80 = [2, 'dato_89'];
	var elementoValorFuente81 = [2, 'dato_90'];
	var elementoValorFuente82 = [2, 'dato_91'];
	var elementoValorFuente83 = [2, 'dato_92'];
	var elementoValorFuente84 = [2, 'dato_93'];
	var elementosValoresFuentes = [elementoValorFuente01, elementoValorFuente02, elementoValorFuente03, elementoValorFuente04, elementoValorFuente05, elementoValorFuente06, elementoValorFuente07, elementoValorFuente08, elementoValorFuente09, elementoValorFuente10, elementoValorFuente11, elementoValorFuente12, elementoValorFuente13, elementoValorFuente14, elementoValorFuente15, elementoValorFuente16, elementoValorFuente17, elementoValorFuente18, elementoValorFuente19, elementoValorFuente20, elementoValorFuente21, elementoValorFuente22, elementoValorFuente23, elementoValorFuente24, elementoValorFuente25, elementoValorFuente26, elementoValorFuente27, elementoValorFuente28, elementoValorFuente29, elementoValorFuente30, elementoValorFuente31, elementoValorFuente32, elementoValorFuente33, elementoValorFuente34, elementoValorFuente35, elementoValorFuente36, elementoValorFuente37, elementoValorFuente38, elementoValorFuente39, elementoValorFuente40, elementoValorFuente41, elementoValorFuente42, elementoValorFuente43, elementoValorFuente44, elementoValorFuente45, elementoValorFuente46, elementoValorFuente47, elementoValorFuente48, elementoValorFuente49, elementoValorFuente50, elementoValorFuente51, elementoValorFuente52, elementoValorFuente53, elementoValorFuente54, elementoValorFuente55, elementoValorFuente56, elementoValorFuente57, elementoValorFuente58, elementoValorFuente59, elementoValorFuente60, elementoValorFuente61, elementoValorFuente62, elementoValorFuente63, elementoValorFuente64, elementoValorFuente65, elementoValorFuente66, elementoValorFuente67, elementoValorFuente68, elementoValorFuente69, elementoValorFuente70, elementoValorFuente71, elementoValorFuente72, elementoValorFuente73, elementoValorFuente74, elementoValorFuente75, elementoValorFuente76, elementoValorFuente77, elementoValorFuente78, elementoValorFuente79, elementoValorFuente80, elementoValorFuente81, elementoValorFuente82, elementoValorFuente83, elementoValorFuente84];
	var elementosTiposResultado = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
	var elementos = [elementosValoresFuentes, elementosTiposResultado];
	
	var Json_datos_captura = new Json(configuraciones, codigos, elementos);





    

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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

	





// CLASE........: Datos
// INSTANCIA....: Datos_captura
// DESCRIPCION..: Objeto que determina cuales datos y donde se colocaran en la pantalla

	var numeroElementos = 84;
	var configuraciones = [numeroElementos];
	var codigos = [''];

	var elemento01 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_1_1_1';
	var elemento02 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_1_1_2';
	
	var elemento03 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_1_2_2';
	var elemento04 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_1_3_2';
	var elemento05 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_2_2_2';
	var elemento06 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_2_3_2';
	var elemento07 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_3_2_2';
	var elemento08 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_3_3_2';
	var elemento09 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_3_4_2';
	var elemento10 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_3_5_2';
	
	var elemento11 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_1_2_2';
	var elemento12 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_1_3_2';
	var elemento13 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_1_4_2';
	var elemento14 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_1_5_2';
	var elemento15 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_1_6_2';
	
	var elemento16 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_2_2_2';
	var elemento17 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_2_3_2';
	var elemento18 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_2_4_2';
	var elemento19 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_2_5_2';
	var elemento20 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_2_6_2';
	var elemento21 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_2_7_2';

	var elemento22 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_3_2_2';
	var elemento23 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_3_3_2';
	var elemento24 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_3_4_2';
	var elemento25 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_3_5_2';

	var elemento26 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_4_2_2';
	var elemento27 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_4_3_2';
	var elemento28 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_4_4_2';
	var elemento29 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_4_5_2';

	var elemento30 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_5_2_2';
	var elemento31 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_5_3_2';
	var elemento32 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_5_4_2';
	var elemento33 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_5_5_2';
	var elemento34 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_5_6_2';

	var elemento35 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_6_2_2';
	var elemento36 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_6_3_2';
	var elemento37 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_6_4_2';

	var elemento38 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_7_2_2';
	var elemento39 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_7_3_2';
	var elemento40 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_7_4_2';
	var elemento41 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_7_5_2';

	var elemento42 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_8_2_2';
	var elemento43 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_8_3_2';
	var elemento44 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_8_4_2';
	var elemento45 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_8_5_2';

	var elemento46 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_9_2_2';
	var elemento47 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_9_3_2';
	var elemento48 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_9_4_2';
	var elemento49 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_9_5_2';

	var elemento50 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_10_2_2';
	var elemento51 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_10_3_2';
	var elemento52 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_10_4_2';
	var elemento53 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_10_5_2';
	var elemento54 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_10_6_2';
	var elemento55 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_10_7_2';

	var elemento56 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_1_2_2';
	var elemento57 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_1_3_2';
	var elemento58 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_1_4_2';
	var elemento59 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_1_5_2';
	var elemento60 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_1_6_2';
	var elemento61 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_1_7_2';

	var elemento62 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_2_2_2';
	var elemento63 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_2_3_2';
	var elemento64 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_2_4_2';
	var elemento65 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_2_5_2';
	var elemento66 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_2_6_2';
	var elemento67 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_2_7_2';

	var elemento68 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_3_2_2';
	var elemento69 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_3_3_2';
	var elemento70 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_3_4_2';

	var elemento71 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_4_3_2';
	var elemento72 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_4_4_2';
	var elemento73 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_4_5_2';
	var elemento74 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_4_6_2';
	var elemento75 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_4_7_2';
	var elemento76 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_4_8_2';
	var elemento77 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_4_10_2';
	var elemento78 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_4_11_2';
	var elemento79 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_4_13_2';
	var elemento80 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_4_14_2';
	var elemento81 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_4_15_2';
	var elemento82 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_4_16_2';
	var elemento83 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_4_17_2';

	var elemento84 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_5_2_1';

	var elementosArea = [elemento01, elemento02, elemento03, elemento04, elemento05, elemento06, elemento07, elemento08, elemento09, elemento10, elemento11, elemento12, elemento13, elemento14, elemento15, elemento16, elemento17, elemento18, elemento19, elemento20, elemento21, elemento22, elemento23, elemento24, elemento25, elemento26, elemento27, elemento28, elemento29, elemento30, elemento31, elemento32, elemento33, elemento34, elemento35, elemento36, elemento37, elemento38, elemento39, elemento40, elemento41, elemento42, elemento43, elemento44, elemento45, elemento46, elemento47, elemento48, elemento49, elemento50, elemento51, elemento52, elemento53, elemento54, elemento55, elemento56, elemento57, elemento58, elemento59, elemento60, elemento61, elemento62, elemento63, elemento64, elemento65, elemento66, elemento67, elemento68, elemento69, elemento70, elemento71, elemento72, elemento73, elemento74, elemento75, elemento76, elemento77, elemento78, elemento79, elemento80, elemento81, elemento82, elemento83, elemento84];
	var elementosImpresion = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
	var elemen01 = 0;
	var elemen02 = ' SIN GRABAR ';
	var elemen03 = '';
	var elemen04 = '';
	var elemen05 = '';
	var elemen06 = '';
	var elemen07 = 0;
	var elemen08 = 0;
	var elemen09 = 0;
	var elemen10 = 0;
	var elemen11 = 0;
	var elemen12 = 0;
	var elemen13 = 0;
	var elemen14 = 0;
	var elemen15 = 0;
	var elemen16 = 0;
	var elemen17 = 0;
	var elemen18 = 0;
	var elemen19 = 0;
	var elemen20 = 0;
	var elemen21 = 0;
	var elemen22 = 0;
	var elemen23 = 0;
	var elemen24 = 0;
	var elemen25 = 0;
	var elemen26 = 0;
	var elemen27 = 0;
	var elemen28 = 0;
	var elemen29 = 0;
	var elemen30 = 0;
	var elemen31 = 0;
	var elemen32 = 0;
	var elemen33 = 0;
	var elemen34 = 0;
	var elemen35 = 0;
	var elemen36 = 0;
	var elemen37 = 0;
	var elemen38 = 0;
	var elemen39 = 0;
	var elemen40 = 0;
	var elemen41 = 0;
	var elemen42 = 0;
	var elemen43 = 0;
	var elemen44 = 0;
	var elemen45 = 0;
	var elemen46 = 0;
	var elemen47 = 0;
	var elemen48 = 0;
	var elemen49 = 0;
	var elemen50 = 0;
	var elemen51 = 0;
	var elemen52 = 0;
	var elemen53 = 0;
	var elemen54 = 0;
	var elemen55 = 0;
	var elemen56 = 0;
	var elemen57 = 0;
	var elemen58 = 0;
	var elemen59 = 0;
	var elemen60 = 0;
	var elemen61 = 0;
	var elemen62 = 0;
	var elemen63 = 0;
	var elemen64 = 0;
	var elemen65 = 0;
	var elemen66 = 0;
	var elemen67 = 0;
	var elemen68 = 0;
	var elemen69 = 0;
	var elemen70 = 0;
	var elemen71 = 0;
	var elemen72 = 0;
	var elemen73 = 0;
	var elemen74 = 0;
	var elemen75 = 0;
	var elemen76 = 0;
	var elemen77 = 0;
	var elemen78 = 0;
	var elemen79 = 0;
	var elemen80 = 0;
	var elemen81 = 0;
	var elemen82 = 0;
	var elemen83 = 0;
	var elemen84 = '';
	var elementosValor = [elemen01, elemen02, elemen03, elemen04, elemen05, elemen06, elemen07, elemen08, elemen09, elemen10, elemen11, elemen12, elemen13, elemen14, elemen15, elemen16, elemen17, elemen18, elemen19, elemen20, elemen21, elemen22, elemen23, elemen24, elemen25, elemen26, elemen27, elemen28, elemen29, elemen30, elemen31, elemen32, elemen33, elemen34, elemen35, elemen36, elemen37, elemen38, elemen39, elemen40, elemen41, elemen42, elemen43, elemen44, elemen45, elemen46, elemen47, elemen48, elemen49, elemen50, elemen51, elemen52, elemen53, elemen54, elemen55, elemen56, elemen57, elemen58, elemen59, elemen60, elemen61, elemen62, elemen63, elemen64, elemen65, elemen66, elemen67, elemen68, elemen69, elemen70, elemen71, elemen72, elemen73, elemen74, elemen75, elemen76, elemen77, elemen78, elemen79, elemen80, elemen81, elemen82, elemen83, elemen84];
// TIPOS DE FUENTES PARA TRATAR LOS DATOS DEPENDIENDO DE UNA CONFIGURACIÓN
	var elementosTipoFuente = [1, 4, 2, 2, 0, 0, 3, 3, 3, 3, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 3, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 3, 3, 3, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 6];
	var elementosTipoValor01 = [[0, 'NO HAY REGISTRO SELECCIONADO'], [1, 'CONSULTANDO / MODIFICANDO REGISTRO'], [2, 'CAPTURANDO NUEVA CÉDULA']];
	var elementosTipoValor02 = [0, 'CEDULA: '];
	var elementosTipoValor03 = ['c_unidad'];
	var elementosTipoValor04 = ['c_asistente'];
	var elementosTipoValor05 = '';
	var elementosTipoValor06 = '';
	var elementosTipoValor07 = ['c_svm'];
	var elementosTipoValor08 = ['c_svk'];
	var elementosTipoValor09 = ['c_spm'];
	var elementosTipoValor10 = ['c_spk'];
	var elementosTipoValor11 = ['c_te_concreto'];
	var elementosTipoValor12 = ['c_te_galvanizada'];
	var elementosTipoValor13 = ['c_te_madera'];
	var elementosTipoValor14 = ['c_te_carton'];
	var elementosTipoValor15 = ['c_te_otro'];
	var elementosTipoValor16 = ['c_pa_tabique'];
	var elementosTipoValor17 = ['c_pa_adobe'];
	var elementosTipoValor18 = ['c_pa_block'];
	var elementosTipoValor19 = ['c_pa_madera'];
	var elementosTipoValor20 = ['c_pa_piedra'];
	var elementosTipoValor21 = ['c_pa_carton'];
	var elementosTipoValor22 = ['c_pi_cemento'];
	var elementosTipoValor23 = ['c_pi_madera'];
	var elementosTipoValor24 = ['c_pi_tierra'];
	var elementosTipoValor25 = ['c_pi_piedra'];
	var elementosTipoValor26 = ['c_au_potable'];
	var elementosTipoValor27 = ['c_au_noria'];
	var elementosTipoValor28 = ['c_au_rio'];
	var elementosTipoValor29 = ['c_au_lluvia'];
	var elementosTipoValor30 = ['c_ac_potable'];
	var elementosTipoValor31 = ['c_ac_purificada'];
	var elementosTipoValor32 = ['c_ac_hervida'];
	var elementosTipoValor33 = ['c_ac_clorada'];
	var elementosTipoValor34 = ['c_ac_filtrada'];
	var elementosTipoValor35 = ['c_ex_fosa'];
	var elementosTipoValor36 = ['c_ex_letrina'];
	var elementosTipoValor37 = ['c_ex_suelo'];
	var elementosTipoValor38 = ['c_co_gas'];
	var elementosTipoValor39 = ['c_co_carbon'];
	var elementosTipoValor40 = ['c_co_lena'];
	var elementosTipoValor41 = ['c_co_otro'];
	var elementosTipoValor42 = ['c_ba_municipal'];
	var elementosTipoValor43 = ['c_ba_enterramiento'];
	var elementosTipoValor44 = ['c_ba_cielo'];
	var elementosTipoValor45 = ['c_ba_incineracion'];
	var elementosTipoValor46 = ['c_al_red'];
	var elementosTipoValor47 = ['c_al_velas'];
	var elementosTipoValor48 = ['c_al_quinque'];
	var elementosTipoValor49 = ['c_al_placa'];
	var elementosTipoValor50 = ['c_ha_habitaciones'];
	var elementosTipoValor51 = ['c_ha_recamara'];
	var elementosTipoValor52 = ['c_ha_estancia'];
	var elementosTipoValor53 = ['c_ha_comedor'];
	var elementosTipoValor54 = ['c_ha_multiple'];
	var elementosTipoValor55 = ['c_ha_cocina'];
	var elementosTipoValor56 = ['c_in_tarahumara'];
	var elementosTipoValor57 = ['c_in_tepehuan'];
	var elementosTipoValor58 = ['c_in_wuarojio'];
	var elementosTipoValor59 = ['c_in_pima'];
	var elementosTipoValor60 = ['c_in_menonita'];
	var elementosTipoValor61 = ['c_in_otro'];
	var elementosTipoValor62 = ['c_de_insabi'];
	var elementosTipoValor63 = ['c_de_imss'];
	var elementosTipoValor64 = ['c_de_issste'];
	var elementosTipoValor65 = ['c_de_pemex'];
	var elementosTipoValor66 = ['c_de_sedena'];
	var elementosTipoValor67 = ['c_de_otro'];
	var elementosTipoValor68 = ['c_ma_perros'];
	var elementosTipoValor69 = ['c_ma_gatos'];
	var elementosTipoValor70 = ['c_ma_otras'];
	var elementosTipoValor71 = ['c_ss_insabi'];
	var elementosTipoValor72 = ['c_ss_imss'];
	var elementosTipoValor73 = ['c_ss_issste'];
	var elementosTipoValor74 = ['c_ss_pemex'];
	var elementosTipoValor75 = ['c_ss_sedena'];
	var elementosTipoValor76 = ['c_ss_otro'];
	var elementosTipoValor77 = ['c_ss_medico'];
	var elementosTipoValor78 = ['c_ss_clinica'];
	var elementosTipoValor79 = ['c_ss_partera'];
	var elementosTipoValor80 = ['c_ss_curandera'];
	var elementosTipoValor81 = ['c_ss_yerbero'];
	var elementosTipoValor82 = ['c_ss_huesero'];
	var elementosTipoValor83 = ['c_ss_boticario'];
	var elementosTipoValor84 = ['c_co_comentario'];
	var elementosTipoValor = [elementosTipoValor01, elementosTipoValor02, elementosTipoValor03, elementosTipoValor04, elementosTipoValor05, elementosTipoValor06, elementosTipoValor07, elementosTipoValor08, elementosTipoValor09, elementosTipoValor10, elementosTipoValor11, elementosTipoValor12, elementosTipoValor13, elementosTipoValor14, elementosTipoValor15, elementosTipoValor16, elementosTipoValor17, elementosTipoValor18, elementosTipoValor19, elementosTipoValor20, elementosTipoValor21, elementosTipoValor22, elementosTipoValor23, elementosTipoValor24, elementosTipoValor25, elementosTipoValor26, elementosTipoValor27, elementosTipoValor28, elementosTipoValor29, elementosTipoValor30, elementosTipoValor31, elementosTipoValor32, elementosTipoValor33, elementosTipoValor34, elementosTipoValor35, elementosTipoValor36, elementosTipoValor37, elementosTipoValor38, elementosTipoValor39, elementosTipoValor40, elementosTipoValor41, elementosTipoValor42, elementosTipoValor43, elementosTipoValor44, elementosTipoValor45, elementosTipoValor46, elementosTipoValor47, elementosTipoValor48, elementosTipoValor49, elementosTipoValor50, elementosTipoValor51, elementosTipoValor52, elementosTipoValor53, elementosTipoValor54, elementosTipoValor55, elementosTipoValor56, elementosTipoValor57, elementosTipoValor58, elementosTipoValor59, elementosTipoValor60, elementosTipoValor61, elementosTipoValor62, elementosTipoValor63, elementosTipoValor64, elementosTipoValor65, elementosTipoValor66, elementosTipoValor67, elementosTipoValor68, elementosTipoValor69, elementosTipoValor70, elementosTipoValor71, elementosTipoValor72, elementosTipoValor73, elementosTipoValor74, elementosTipoValor75, elementosTipoValor76, elementosTipoValor77, elementosTipoValor78, elementosTipoValor79, elementosTipoValor80, elementosTipoValor81, elementosTipoValor82, elementosTipoValor83, elementosTipoValor84];
	var elementosTipo = [elementosTipoFuente, elementosTipoValor];
	var elemenMe01 = '';
	var elemenMe02 = '';
	var elemenMe03 = '';
	var elemenMe04 = '';
	var elemenMe05 = '';
	var elemenMe06 = '';
	var elemenMe07 = '';
	var elemenMe08 = '';
	var elemenMe09 = '';
	var elemenMe10 = '';
	var elemenMe11 = '';
	var elemenMe12 = '';
	var elemenMe13 = '';
	var elemenMe14 = '';
	var elemenMe15 = '';
	var elemenMe16 = '';
	var elemenMe17 = '';
	var elemenMe18 = '';
	var elemenMe19 = '';
	var elemenMe20 = '';
	var elemenMe21 = '';
	var elemenMe22 = '';
	var elemenMe23 = '';
	var elemenMe24 = '';
	var elemenMe25 = '';
	var elemenMe26 = '';
	var elemenMe27 = '';
	var elemenMe28 = '';
	var elemenMe29 = '';
	var elemenMe30 = '';
	var elemenMe31 = '';
	var elemenMe32 = '';
	var elemenMe33 = '';
	var elemenMe34 = '';
	var elemenMe35 = '';
	var elemenMe36 = '';
	var elemenMe37 = '';
	var elemenMe38 = '';
	var elemenMe39 = '';
	var elemenMe40 = '';
	var elemenMe41 = '';
	var elemenMe42 = '';
	var elemenMe43 = '';
	var elemenMe44 = '';
	var elemenMe45 = '';
	var elemenMe46 = '';
	var elemenMe47 = '';
	var elemenMe48 = '';
	var elemenMe49 = '';
	var elemenMe50 = '';
	var elemenMe51 = '';
	var elemenMe52 = '';
	var elemenMe53 = '';
	var elemenMe54 = '';
	var elemenMe55 = '';
	var elemenMe56 = '';
	var elemenMe57 = '';
	var elemenMe58 = '';
	var elemenMe59 = '';
	var elemenMe60 = '';
	var elemenMe61 = '';
	var elemenMe62 = '';
	var elemenMe63 = '';
	var elemenMe64 = '';
	var elemenMe65 = '';
	var elemenMe66 = '';
	var elemenMe67 = '';
	var elemenMe68 = '';
	var elemenMe69 = '';
	var elemenMe70 = '';
	var elemenMe71 = '';
	var elemenMe72 = '';
	var elemenMe73 = '';
	var elemenMe74 = '';
	var elemenMe75 = '';
	var elemenMe76 = '';
	var elemenMe77 = '';
	var elemenMe78 = '';
	var elemenMe79 = '';
	var elemenMe80 = '';
	var elemenMe81 = '';
	var elemenMe82 = '';
	var elemenMe83 = '';
	var elemenMe84 = '';
	var elementosMetodos = [elemenMe01, elemenMe02, elemenMe03, elemenMe04, elemenMe05, elemenMe06, elemenMe07, elemenMe08, elemenMe09, elemenMe10, elemenMe11, elemenMe12, elemenMe13, elemenMe14, elemenMe15, elemenMe16, elemenMe17, elemenMe18, elemenMe19, elemenMe20, elemenMe21, elemenMe22, elemenMe23, elemenMe24, elemenMe25, elemenMe26, elemenMe27, elemenMe28, elemenMe29, elemenMe30, elemenMe31, elemenMe32, elemenMe33, elemenMe34, elemenMe35, elemenMe36, elemenMe37, elemenMe38, elemenMe39, elemenMe40, elemenMe41, elemenMe42, elemenMe43, elemenMe44, elemenMe45, elemenMe46, elemenMe47, elemenMe48, elemenMe49, elemenMe50, elemenMe51, elemenMe52, elemenMe53, elemenMe54, elemenMe55, elemenMe56, elemenMe57, elemenMe58, elemenMe59, elemenMe60, elemenMe61, elemenMe62, elemenMe63, elemenMe64, elemenMe65, elemenMe66, elemenMe67, elemenMe68, elemenMe69, elemenMe70, elemenMe71, elemenMe72, elemenMe73, elemenMe74, elemenMe75, elemenMe76, elemenMe77, elemenMe78, elemenMe79, elemenMe80, elemenMe81, elemenMe82, elemenMe83, elemenMe84];
	var elemCl01 = 'c_01';
	var elemCl02 = 'c_02';
	var elemCl03 = 'c_03';
	var elemCl04 = 'c_04';
	var elemCl05 = 'c_05';
	var elemCl06 = 'c_06';
	var elemCl07 = 'c_07';
	var elemCl08 = 'c_08';
	var elemCl09 = 'c_09';
	var elemCl10 = 'c_10';
	var elemCl11 = 'c_11';
	var elemCl12 = 'c_12';
	var elemCl13 = 'c_13';
	var elemCl14 = 'c_14';
	var elemCl15 = 'c_15';
	var elemCl16 = 'c_16';
	var elemCl17 = 'c_17';
	var elemCl18 = 'c_18';
	var elemCl19 = 'c_19';
	var elemCl20 = 'c_20';
	var elemCl21 = 'c_21';
	var elemCl22 = 'c_22';
	var elemCl23 = 'c_23';
	var elemCl24 = 'c_24';
	var elemCl25 = 'c_25';
	var elemCl26 = 'c_26';
	var elemCl27 = 'c_27';
	var elemCl28 = 'c_28';
	var elemCl29 = 'c_29';
	var elemCl30 = 'c_30';
	var elemCl31 = 'c_31';
	var elemCl32 = 'c_32';
	var elemCl33 = 'c_33';
	var elemCl34 = 'c_34';
	var elemCl35 = 'c_35';
	var elemCl36 = 'c_36';
	var elemCl37 = 'c_37';
	var elemCl38 = 'c_38';
	var elemCl39 = 'c_39';
	var elemCl40 = 'c_40';
	var elemCl41 = 'c_41';
	var elemCl42 = 'c_42';
	var elemCl43 = 'c_43';
	var elemCl44 = 'c_44';
	var elemCl45 = 'c_45';
	var elemCl46 = 'c_46';
	var elemCl47 = 'c_47';
	var elemCl48 = 'c_48';
	var elemCl49 = 'c_49';
	var elemCl50 = 'c_50';
	var elemCl51 = 'c_51';
	var elemCl52 = 'c_52';
	var elemCl53 = 'c_53';
	var elemCl54 = 'c_54';
	var elemCl55 = 'c_55';
	var elemCl56 = 'c_56';
	var elemCl57 = 'c_57';
	var elemCl58 = 'c_58';
	var elemCl59 = 'c_59';
	var elemCl60 = 'c_60';
	var elemCl61 = 'c_61';
	var elemCl62 = 'c_62';
	var elemCl63 = 'c_63';
	var elemCl64 = 'c_64';
	var elemCl65 = 'c_65';
	var elemCl66 = 'c_66';
	var elemCl67 = 'c_67';
	var elemCl68 = 'c_68';
	var elemCl69 = 'c_69';
	var elemCl70 = 'c_70';
	var elemCl71 = 'c_71';
	var elemCl72 = 'c_72';
	var elemCl73 = 'c_73';
	var elemCl74 = 'c_74';
	var elemCl75 = 'c_75';
	var elemCl76 = 'c_76';
	var elemCl77 = 'c_77';
	var elemCl78 = 'c_78';
	var elemCl79 = 'c_79';
	var elemCl80 = 'c_80';
	var elemCl81 = 'c_81';
	var elemCl82 = 'c_82';
	var elemCl83 = 'c_83';
	var elemCl84 = 'c_84';
	var elementosClass = [elemCl01, elemCl02, elemCl03, elemCl04, elemCl05, elemCl06, elemCl07, elemCl08, elemCl09, elemCl10, elemCl11, elemCl12, elemCl13, elemCl14, elemCl15, elemCl16, elemCl17, elemCl18, elemCl19, elemCl20, elemCl21, elemCl22, elemCl23, elemCl24, elemCl25, elemCl26, elemCl27, elemCl28, elemCl29, elemCl30, elemCl31, elemCl32, elemCl33, elemCl34, elemCl35, elemCl36, elemCl37, elemCl38, elemCl39, elemCl40, elemCl41, elemCl42, elemCl43, elemCl44, elemCl45, elemCl46, elemCl47, elemCl48, elemCl49, elemCl50, elemCl51, elemCl52, elemCl53, elemCl54, elemCl55, elemCl56, elemCl57, elemCl58, elemCl59, elemCl60, elemCl61, elemCl62, elemCl63, elemCl64, elemCl65, elemCl66, elemCl67, elemCl68, elemCl69, elemCl70, elemCl71, elemCl72, elemCl73, elemCl74, elemCl75, elemCl76, elemCl77, elemCl78, elemCl79, elemCl80, elemCl81, elemCl82, elemCl83, elemCl84];
	var elemId01 = 'ID_DATO_1';
	var elemId02 = 'ID_DATO_2';
	var elemId03 = 'ID_DATO_3';
	var elemId04 = 'ID_DATO_4';
	var elemId05 = 'ID_DATO_5';
	var elemId06 = 'ID_DATO_6';
	var elemId07 = 'ID_DATO_7';
	var elemId08 = 'ID_DATO_8';
	var elemId09 = 'ID_DATO_9';
	var elemId10 = 'ID_DATO_10';
	var elemId11 = 'ID_DATO_11';
	var elemId12 = 'ID_DATO_12';
	var elemId13 = 'ID_DATO_13';
	var elemId14 = 'ID_DATO_14';
	var elemId15 = 'ID_DATO_15';
	var elemId16 = 'ID_DATO_16';
	var elemId17 = 'ID_DATO_17';
	var elemId18 = 'ID_DATO_18';
	var elemId19 = 'ID_DATO_19';
	var elemId20 = 'ID_DATO_20';
	var elemId21 = 'ID_DATO_21';
	var elemId22 = 'ID_DATO_22';
	var elemId23 = 'ID_DATO_23';
	var elemId24 = 'ID_DATO_24';
	var elemId25 = 'ID_DATO_25';
	var elemId26 = 'ID_DATO_26';
	var elemId27 = 'ID_DATO_27';
	var elemId28 = 'ID_DATO_28';
	var elemId29 = 'ID_DATO_29';
	var elemId30 = 'ID_DATO_30';
	var elemId31 = 'ID_DATO_31';
	var elemId32 = 'ID_DATO_32';
	var elemId33 = 'ID_DATO_33';
	var elemId34 = 'ID_DATO_34';
	var elemId35 = 'ID_DATO_35';
	var elemId36 = 'ID_DATO_36';
	var elemId37 = 'ID_DATO_37';
	var elemId38 = 'ID_DATO_38';
	var elemId39 = 'ID_DATO_39';
	var elemId40 = 'ID_DATO_40';
	var elemId41 = 'ID_DATO_41';
	var elemId42 = 'ID_DATO_42';
	var elemId43 = 'ID_DATO_43';
	var elemId44 = 'ID_DATO_44';
	var elemId45 = 'ID_DATO_45';
	var elemId46 = 'ID_DATO_46';
	var elemId47 = 'ID_DATO_47';
	var elemId48 = 'ID_DATO_48';
	var elemId49 = 'ID_DATO_49';
	var elemId50 = 'ID_DATO_50';
	var elemId51 = 'ID_DATO_51';
	var elemId52 = 'ID_DATO_52';
	var elemId53 = 'ID_DATO_53';
	var elemId54 = 'ID_DATO_54';
	var elemId55 = 'ID_DATO_55';
	var elemId56 = 'ID_DATO_56';
	var elemId57 = 'ID_DATO_57';
	var elemId58 = 'ID_DATO_58';
	var elemId59 = 'ID_DATO_59';
	var elemId60 = 'ID_DATO_60';
	var elemId61 = 'ID_DATO_61';
	var elemId62 = 'ID_DATO_62';
	var elemId63 = 'ID_DATO_63';
	var elemId64 = 'ID_DATO_64';
	var elemId65 = 'ID_DATO_65';
	var elemId66 = 'ID_DATO_66';
	var elemId67 = 'ID_DATO_67';
	var elemId68 = 'ID_DATO_68';
	var elemId69 = 'ID_DATO_69';
	var elemId70 = 'ID_DATO_70';
	var elemId71 = 'ID_DATO_71';
	var elemId72 = 'ID_DATO_72';
	var elemId73 = 'ID_DATO_73';
	var elemId74 = 'ID_DATO_74';
	var elemId75 = 'ID_DATO_75';
	var elemId76 = 'ID_DATO_76';
	var elemId77 = 'ID_DATO_77';
	var elemId78 = 'ID_DATO_78';
	var elemId79 = 'ID_DATO_79';
	var elemId80 = 'ID_DATO_80';
	var elemId81 = 'ID_DATO_81';
	var elemId82 = 'ID_DATO_82';
	var elemId83 = 'ID_DATO_83';
	var elemId84 = 'ID_DATO_84';
	var elementosId = [elemId01, elemId02, elemId03, elemId04, elemId05, elemId06, elemId07, elemId08, elemId09, elemId10, elemId11, elemId12, elemId13, elemId14, elemId15, elemId16, elemId17, elemId18, elemId19, elemId20, elemId21, elemId22, elemId23, elemId24, elemId25, elemId26, elemId27, elemId28, elemId29, elemId30, elemId31, elemId32, elemId33, elemId34, elemId35, elemId36, elemId37, elemId38, elemId39, elemId40, elemId41, elemId42, elemId43, elemId44, elemId45, elemId46, elemId47, elemId48, elemId49, elemId50, elemId51, elemId52, elemId53, elemId54, elemId55, elemId56, elemId57, elemId58, elemId59, elemId60, elemId61, elemId62, elemId63, elemId64, elemId65, elemId66, elemId67, elemId68, elemId69, elemId70, elemId71, elemId72, elemId73, elemId74, elemId75, elemId76, elemId77, elemId78, elemId79, elemId80, elemId81, elemId82, elemId83, elemId84];
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

// BLOQUE GRADILLA DE FAMILIARES POR CÉDULA

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Consulta_gradilla_familiares
// DESCRIPCION..: Consulta que se ejecuta para actualizar gradilla desde familuares de una cédula

	var statusConsulta = 0;
	var scriptPhp = 'consulta_gradilla_familiares.php';
	var metodoPhp = 'POST';
	var filtro = [0];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_gradilla_familiares.ejecuta()'];
	var metodosCallback02 = ['Metodos_gradilla_familiares_after_graba_familiares.ejecuta()'];
	var metodosCallback03 = ['Metodos_gradilla_familiares_after_eliminar_familiares.ejecuta()'];
	var metodosCallback04 = ['Metodos_gradilla_familiares_after_actualiza_familiares.ejecuta()'];
	var metodosCallback05 = ['Metodos_gradilla_familiares_after_eliminar_cedula.ejecuta()'];
	var metodosCallback = [metodosCallback01, metodosCallback02, metodosCallback03, metodosCallback04, metodosCallback05]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 0, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_gradilla_familiares = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_gradilla_familiares
// DESCRIPCION..: Metodos que se ejecutan despues de actualizar gradilla de familiares

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Modal_captura.cierra()',
	'Gradilla_familiares.recibe_consulta(Consulta_gradilla_familiares)',
	'Gradilla_familiares.generahtml()',
	'Gradilla_familiares.imprimehtml()'];
	var Metodos_gradilla_familiares = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Gradilla
// INSTANCIA....: Gradilla_familiares
// ID...........: ID_GRADILLA_FAMILIARES
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_1	
// DESCRIPCION..: Gradilla familiares por registro de cédula
// HTML.........: Espera metodo
// IMPRESION....: Espera metodo, sustituye contenido

	var inglesElementos = ['ID', 'NÚM', 'NOMBRE', 'FEC. NAC.', 'EDAD', 'GÉNERO', 'PARENTEZCO', 'CLON'];
	var inglesIdioma = [inglesElementos, 'FAMILY LIST'];
	var espanolElementos = ['ID', 'NÚM', 'NOMBRE', 'FEC. NAC.', 'EDAD', 'GÉNERO', 'PARENTEZCO', 'CLON'];
//	var espanolElementos = ['ID', 'NÚM', 'NOMBRE', 'FEC. NAC.', 'EDAD', 'GÉNERO', 'PARENTEZCO'];
	var espanolIdioma = [espanolElementos, 'LISTA DE FAMILIARES'];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 8;
    var tipoImpresion = 0;
    var consulta = Consulta_gradilla_familiares;
	var parametros = [0, 10];
	var titulo = ['FAMILIARES DE LA CÉDULA'];
	var orientacionBreaks = [0, 720];
	var orientacionFormato = [0, 1];
	var orientacion = [0, orientacionBreaks, orientacionFormato];
	var areacontroles = [1];
	var iconoscontroles = ['fa-solid fa-backward', 'fa-solid fa-backward-step', 'fa-solid fa-forward-step', 'fa-solid fa-forward'];
	var metodoscontroles = [' ONCLICK="Metodos_inicio_posicion_familiares.ejecuta()"', ' ONCLICK="Metodos_retrocedegrid_familiares.ejecuta()"', ' ONCLICK="Metodos_avanzagrid_familiares.ejecuta()"', ' ONCLICK="Metodos_final_posicion_familiares.ejecuta()"'];
	var controles = [areacontroles, iconoscontroles, metodoscontroles];
	var valorIncialClave = 0;
	var valorClave = 0;
	var valorInicialPosicion = 0;
	var valorPosicion = 0;
	var valorInicialCelda = 0;
	var valorCelda = 0;
	var metodoValor = 'Gradilla_familiares.actualiza_valores';
	var tipoValorArreglo = [0];
	var datoValorArreglo = [0];
	var valorArreglo = [tipoValorArreglo, datoValorArreglo];
	var valores = [valorIncialClave, valorClave, valorInicialPosicion, valorPosicion, valorInicialCelda, valorCelda, metodoValor, valorArreglo];
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, consulta, parametros, titulo, orientacion, controles, valores];
	var etiquetas = ['gradilla', 'ID_GRADILLA_FAMILIARES', '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_1'];
    var elementos_tipo_valor = [0, 0, 0, 0, 0, 0, 0, 5];
    var elementos_llave_valor = ['dato_01', 'dato_02', 'dato_03', 'dato_04', 'dato_05', 'dato_06', 'dato_07', 'dato_08'];
    var elementos_ancho_valor = ['diez', 'cinco', 'veinticinco', 'quince', 'cinco', 'quince', 'quince', 'diez'];
    var elementos_metodos = ['Metodos_elige_grid_familiares.ejecuta()', 'Metodos_elige_grid_familiares.ejecuta()', 'Metodos_elige_grid_familiares.ejecuta()', 'Metodos_elige_grid_familiares.ejecuta()', 'Metodos_elige_grid_familiares.ejecuta()', 'Metodos_elige_grid_familiares.ejecuta()', 'Metodos_elige_grid_familiares.ejecuta()', 'Metodos_clona_familiar.ejecuta()'];
    var elementos_iconos = ['', '', '', '', '', '', '', 'fa-regular fa-clone icono_gradilla'];
	var elementos = [elementos_tipo_valor, elementos_llave_valor, elementos_ancho_valor, elementos_metodos, elementos_iconos];
    var codigos = [''];
    var Gradilla_familiares = new Gradilla(configuraciones, etiquetas, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_avanzagrid_familiares
// DESCRIPCION..: Metodos que se ejecutan cuando se elige avanzar una pagina en la gradilla familiares

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Gradilla_familiares.avanza()',
	'Gradilla_familiares.generahtml()',
	'Gradilla_familiares.imprimehtml()'];
	var Metodos_avanzagrid_familiares = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_inicio_posicion_familiares
// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir a primera pagina en la gradilla familiares

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Gradilla_familiares.inicializa_posicion()',
	'Gradilla_familiares.generahtml()',
	'Gradilla_familiares.imprimehtml()'];
	var Metodos_inicio_posicion_familiares = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_retrocedegrid_familiares
// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir a primera pagina en la gradilla familiares

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Gradilla_familiares.retrocede()',
	'Gradilla_familiares.generahtml()',
	'Gradilla_familiares.imprimehtml()'];
	var Metodos_retrocedegrid_familiares = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_final_posicion
// DESCRIPCION..: Metodos que se ejecutan cuando se elige ir a última pagina en la gradilla familiares

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Gradilla_familiares.finaliza_posicion()',
	'Gradilla_familiares.generahtml()',
	'Gradilla_familiares.imprimehtml()'];
	var Metodos_final_posicion_familiares = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_elige_grid_familiares
// DESCRIPCION..: Metodos que se ejecutan al elegir un registro en la gradilla familiares

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Modal_captura.abrefijo()',
	'Consulta_baja_registro_familiares.actualizafiltro(0, Gradilla_familiares.configuraciones[8][1])',
	'Consulta_baja_registro_familiares.posicion_callback(0)',
	'Consulta_baja_registro_familiares.ejecuta()']
	var Metodos_elige_grid_familiares = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_clona_familiar
// DESCRIPCION..: Metodos que se ejecutan al elegir clonar un registro en la gradilla familiares

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Modal_captura.abrefijo()',
	'Consulta_baja_registro_familiares.actualizafiltro(0, Gradilla_familiares.configuraciones[8][1])',
	'Consulta_baja_registro_familiares.posicion_callback(2)',
	'Consulta_baja_registro_familiares.ejecuta()']
	var Metodos_clona_familiar = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_baja_registro_familiares
// DESCRIPCION..: Consulta que se ejecuta para traer desde la BD un registro elegido en gradilla familiares

	var statusConsulta = 0;
	var scriptPhp = 'consulta_baja_familiares.php';
	var metodoPhp = 'POST';
	var filtro = [''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_baja_familiares.ejecuta()'];
	var metodosCallback02 = ['Metodos_baja_familiares_after_graba_familiar.ejecuta()'];
	var metodosCallback03 = ['Metodos_after_clona_familiar.ejecuta()'];
	var metodosCallback = [metodosCallback01, metodosCallback02, metodosCallback03]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 0, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_baja_registro_familiares = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_baja_familiares
// DESCRIPCION..: Metodos que se ejecutan despues de ejecutar consulta de bajar registro de familiares

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Modal_captura.cierra()',
	'Registro_id_familiar.recibe_status(Gradilla_familiares.configuraciones[8][1])',
	'Registro_familiar.recibe_status(1)',
	'Json_datos_captura_familiares.recibe_json(Consulta_baja_registro_familiares.codigos[0])',
	'Json_datos_captura_familiares.genera()',
	'Clases_baja_familiar.afectar()',
	'Datos_captura_familiares.imprime_natural(Json_datos_captura_familiares.codigos[0])'];
	var Metodos_baja_familiares = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_clona_familiar
// DESCRIPCION..: Metodos que se ejecutan despues de ejecutar consulta de bajar registro de familiares
//                para clonar un registro
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Modal_captura.cierra()',
	'Registro_familiar.recibe_status(2)',
	'Registro_id_familiar.recibe_status(0)',
	'Json_datos_captura_familiares.recibe_json(Consulta_baja_registro_familiares.codigos[0])',
	'Json_datos_captura_familiares.genera()',
	'Json_datos_captura_familiares.cambia_valor(["dato_0", "2"])',
	'Json_datos_captura_familiares.cambia_valor(["dato_1", " SIN GRABAR"])',
	'Clases_capturar_familiar.afectar()',
	'Datos_captura_familiares.imprime_natural(Json_datos_captura_familiares.codigos[0])'];
	var Metodos_after_clona_familiar = new Metodos(configuraciones, codigos, elementos);






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE DATOS DE FAMILIARES

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Json_familiar_nuevo
// DESCRIPCION..: Json de datos para iniciar captura de nuevo familiar  

var Json_familiar_nuevo = {"dato_0" : "2",
                        "dato_1" : " SIN GRABAR",
                        "dato_2" : "",
                        "dato_3" : "",
                        "dato_4" : "",
                        "dato_5" : Fecha_actual.valores[1],
                        "dato_6" : "0",
                        "dato_7" : "ND",
                        "dato_8" : "ND",
                        "dato_9" : "ND",
                        "dato_10" : "ND",
                        "dato_11" : "ND",
                        "dato_12" : "ND",
                        "dato_13" : "ND",
                        "dato_14" : "ND",
                        "dato_15" : "0",
                        "dato_16" : "0",
                        "dato_17" : "0",
                        "dato_18" : "0",
                        "dato_19" : "0",
                        "dato_20" : "0",
                        "dato_21" : "0",
                        "dato_22" : "0",
                        "dato_23" : "0",
                        "dato_24" : "0",
                        "dato_25" : "0",
                        "dato_26" : "0",
                        "dato_27" : "0",
                        "dato_28" : "0",
                        "dato_29" : "ND",
                        "dato_30" : "ND",
                        "dato_31" : "ND",
                        "dato_32" : "ND",
                        "dato_33" : "ND",
                        "dato_34" : "ND",
                        "dato_35" : "ND",
                        "dato_36" : "ND"};

// OBJETO.......: Json
// INSTANCIA....: Json_familiar_vacio
// DESCRIPCION..: Json de datos para limpiar captura de nuevo familiar  

var Json_familiar_vacio = {"dato_0" : "0",
                        "dato_1" : "",
                        "dato_2" : "",
                        "dato_3" : "",
                        "dato_4" : "",
                        "dato_5" : Fecha_actual.valores[1],
                        "dato_6" : "0",
                        "dato_7" : "ND",
                        "dato_8" : "ND",
                        "dato_9" : "ND",
                        "dato_10" : "ND",
                        "dato_11" : "ND",
                        "dato_12" : "ND",
                        "dato_13" : "ND",
                        "dato_14" : "ND",
                        "dato_15" : "0",
                        "dato_16" : "0",
                        "dato_17" : "0",
                        "dato_18" : "0",
                        "dato_19" : "0",
                        "dato_20" : "0",
                        "dato_21" : "0",
                        "dato_22" : "0",
                        "dato_23" : "0",
                        "dato_24" : "0",
                        "dato_25" : "0",
                        "dato_26" : "0",
                        "dato_27" : "0",
                        "dato_28" : "0",
                        "dato_29" : "ND",
                        "dato_30" : "ND",
                        "dato_31" : "ND",
                        "dato_32" : "ND",
                        "dato_33" : "ND",
                        "dato_34" : "ND",
                        "dato_35" : "ND",
                        "dato_36" : "ND"};

// CLASE........: Json
// INSTANCIA....: Json_datos_captura_familiares
// DESCRIPCION..: Json que recoge los valores de la consulta baja familiares según una 
//                configuración. Tipo de fuente de los datos de entrada: 0 = Directo
//                lo recoge de un arreglo, 1 = Json consulta de consultas cada consulta tiene
//                dos objetos, 2 Json de una consulta tiene dos objetos, 3 = Json normal
//                de un solo objeto 

	var numeroElementos = 37;
	var tipoFuente = 2;
	var configuraciones = [numeroElementos, tipoFuente];

	var codigoJsonSalida = '';
	var codigoJsonFuente = '';
	var codigos = [codigoJsonSalida, codigoJsonFuente];
	
	var elementoValorFuente01 = [1, 'registros'];
	var elementoValorFuente02 = [2, 'dato_01'];
	var elementoValorFuente03 = [2, 'dato_04'];
	var elementoValorFuente04 = [2, 'dato_05'];
	var elementoValorFuente05 = [2, 'dato_06'];
	var elementoValorFuente06 = [2, 'dato_07'];
	var elementoValorFuente07 = [2, 'dato_08'];
	var elementoValorFuente08 = [2, 'dato_09'];
	var elementoValorFuente09 = [2, 'dato_10'];
	var elementoValorFuente10 = [2, 'dato_11'];
	var elementoValorFuente11 = [2, 'dato_12'];
	var elementoValorFuente12 = [2, 'dato_13'];
	var elementoValorFuente13 = [2, 'dato_14'];
	var elementoValorFuente14 = [2, 'dato_15'];
	var elementoValorFuente15 = [2, 'dato_16'];
	var elementoValorFuente16 = [2, 'dato_17'];
	var elementoValorFuente17 = [2, 'dato_18'];
	var elementoValorFuente18 = [2, 'dato_19'];
	var elementoValorFuente19 = [2, 'dato_20'];
	var elementoValorFuente20 = [2, 'dato_21'];
	var elementoValorFuente21 = [2, 'dato_22'];
	var elementoValorFuente22 = [2, 'dato_23'];
	var elementoValorFuente23 = [2, 'dato_24'];
	var elementoValorFuente24 = [2, 'dato_25'];
	var elementoValorFuente25 = [2, 'dato_26'];
	var elementoValorFuente26 = [2, 'dato_27'];
	var elementoValorFuente27 = [2, 'dato_28'];
	var elementoValorFuente28 = [2, 'dato_29'];
	var elementoValorFuente29 = [2, 'dato_30'];
	var elementoValorFuente30 = [2, 'dato_31'];
	var elementoValorFuente31 = [2, 'dato_32'];
	var elementoValorFuente32 = [2, 'dato_33'];
	var elementoValorFuente33 = [2, 'dato_34'];
	var elementoValorFuente34 = [2, 'dato_35'];
	var elementoValorFuente35 = [2, 'dato_36'];
	var elementoValorFuente36 = [2, 'dato_37'];
	var elementoValorFuente37 = [2, 'dato_38'];
	var elementosValoresFuentes = [elementoValorFuente01, elementoValorFuente02, elementoValorFuente03, elementoValorFuente04, elementoValorFuente05, elementoValorFuente06, elementoValorFuente07, elementoValorFuente08, elementoValorFuente09, elementoValorFuente10, elementoValorFuente11, elementoValorFuente12, elementoValorFuente13, elementoValorFuente14, elementoValorFuente15, elementoValorFuente16, elementoValorFuente17, elementoValorFuente18, elementoValorFuente19, elementoValorFuente20, elementoValorFuente21, elementoValorFuente22, elementoValorFuente23, elementoValorFuente24, elementoValorFuente25, elementoValorFuente26, elementoValorFuente27, elementoValorFuente28, elementoValorFuente29, elementoValorFuente30, elementoValorFuente31, elementoValorFuente32, elementoValorFuente33, elementoValorFuente34, elementoValorFuente35, elementoValorFuente36, elementoValorFuente37];
	var elementosTiposResultado = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
	var elementos = [elementosValoresFuentes, elementosTiposResultado];
	
	var Json_datos_captura_familiares = new Json(configuraciones, codigos, elementos);





// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE DATOS DE CAPTURA DE FAMILIARES

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

	



// CLASE........: Datos
// INSTANCIA....: Datos_captura_familiares
// DESCRIPCION..: Objeto que determina cuales datos y donde se colocaran en la pantalla de 
//                captura de familiares por cédula

	var numeroElementos = 37;
	var configuraciones = [numeroElementos];
	var codigos = [''];

	var elemento01 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_1_1';
	var elemento02 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_1_2';
	
	var elemento03 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_3_2_2';
	var elemento04 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_3_3_2';
	var elemento05 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_3_4_2';
	var elemento06 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_3_5_2';
	var elemento07 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_3_6_2';
	var elemento08 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_3_7_2';

	var elemento09 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_4_2_2';
	var elemento10 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_4_3_2';
	var elemento11 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_4_4_2';
	var elemento12 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_4_5_2';
	var elemento13 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_4_6_2';
	var elemento14 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_4_7_2';
	var elemento15 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_4_8_2';

	var elemento16 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_5_2_2';
	var elemento17 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_5_3_2';
	var elemento18 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_5_4_2';
	var elemento19 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_5_5_2';
	var elemento20 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_5_6_2';
	var elemento21 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_5_7_2';
	var elemento22 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_5_8_2';

	var elemento23 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_6_2_2';
	var elemento24 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_6_3_2';
	var elemento25 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_6_4_2';
	var elemento26 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_6_5_2';
	var elemento27 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_6_6_2';
	var elemento28 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_6_7_2';
	var elemento29 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_6_8_2';
	var elemento30 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_6_9_2';

	var elemento31 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_7_2_2';
	var elemento32 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_7_3_2';
	var elemento33 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_7_4_2';

	var elemento34 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_8_2_2';
	var elemento35 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_8_3_2';
	var elemento36 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_8_4_2';
	var elemento37 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_8_5_2';

	var elementosArea = [elemento01, elemento02, elemento03, elemento04, elemento05, elemento06, elemento07, elemento08, elemento09, elemento10, elemento11, elemento12, elemento13, elemento14, elemento15, elemento16, elemento17, elemento18, elemento19, elemento20, elemento21, elemento22, elemento23, elemento24, elemento25, elemento26, elemento27, elemento28, elemento29, elemento30, elemento31, elemento32, elemento33, elemento34, elemento35, elemento36, elemento37];
	var elementosImpresion = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
	var elemen01 = ' ';
	var elemen02 = ' ';
	var elemen03 = ' ';
	var elemen04 = ' ';
	var elemen05 = ' ';
	var elemen06 = ' ';
	var elemen07 = ' ';
	var elemen08 = ' ';
	var elemen09 = ' ';
	var elemen10 = ' ';
	var elemen11 = ' ';
	var elemen12 = ' ';
	var elemen13 = ' ';
	var elemen14 = ' ';
	var elemen15 = ' ';
	var elemen16 = ' ';
	var elemen17 = ' ';
	var elemen18 = ' ';
	var elemen19 = ' ';
	var elemen20 = ' ';
	var elemen21 = ' ';
	var elemen22 = ' ';
	var elemen23 = ' ';
	var elemen24 = ' ';
	var elemen25 = ' ';
	var elemen26 = ' ';
	var elemen27 = ' ';
	var elemen28 = ' ';
	var elemen29 = ' ';
	var elemen30 = ' ';
	var elemen31 = ' ';
	var elemen32 = ' ';
	var elemen33 = ' ';
	var elemen34 = ' ';
	var elemen35 = ' ';
	var elemen36 = ' ';
	var elemen37 = ' ';
	var elementosValor = [elemen01, elemen02, elemen03, elemen04, elemen05, elemen06, elemen07, elemen08, elemen09, elemen10, elemen11, elemen12, elemen13, elemen14, elemen15, elemen16, elemen17, elemen18, elemen19, elemen20, elemen21, elemen22, elemen23, elemen24, elemen25, elemen26, elemen27, elemen28, elemen29, elemen30, elemen31, elemen32, elemen33, elemen34, elemen35, elemen36, elemen37];
// TIPOS DE FUENTES PARA TRATAR LOS DATOS DEPENDIENDO DE UNA CONFIGURACIÓN
	var elementosTipoFuente = [1, 4, 2, 2, 2, 7, 3, 8, 9, 9, 9, 9, 9, 9, 9, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 8, 9, 9, 9, 9, 9, 9, 9];
	var elementosTipoValor01 = [[0, 'NO HAY REGISTRO DE FAMILIAR SELECCIONADO'], [1, 'CONSULTANDO / MODIFICANDO REGISTRO DE FAMILIAR'], [2, 'CAPTURANDO NUEVO FAMILIAR']];
	var elementosTipoValor02 = [0, 'ID FAMILIAR: '];
	var elementosTipoValor03 = ['f_di_apellido1'];
	var elementosTipoValor04 = ['f_di_apellido2'];
	var elementosTipoValor05 = ['f_di_nombres'];
	var elementosTipoValor06 = ['f_di_fecha'];
	var elementosTipoValor07 = ['f_di_edad'];
	var elementosTipoValor08 = [[['', ' ', 'ND'], 'ND', 'ND', 1], [['Hombre', 'HOMBRE'], 'Hombre', 'Hombre', 1], [['Mujer', 'MUJER'], 'Mujer', 'Mujer', 1]];
	var elementosTipoValor09 = [[['', ' ', 'ND'], 'ND', 'ND', 1], [['Aguascalientes'], 'Aguascalientes', 'Aguascalientes', 1], [['Baja California'], 'Baja California', 'Baja California', 1], [['Baja California Sur'], 'Baja California Sur', 'Baja California Sur', 1], [['Campeche'], 'Campeche', 'Campeche', 1], [['Chiapas'], 'Chiapas', 'Chiapas', 1], [['Chihuahua'], 'Chihuahua', 'Chihuahua', 1], [['Ciudad de México'], 'Ciudad de México', 'Ciudad de México', 1], [['Coahuila'], 'Coahuila', 'Coahuila', 1], [['Colima'], 'Colima', 'Colima', 1], [['Durango'], 'Durango', 'Durango', 1], [['Guanajuato'], 'Guanajuato', 'Guanajuato', 1], [['Guerrero'], 'Guerrero', 'Guerrero', 1], [['Hidalgo'], 'Hidalgo', 'Hidalgo', 1], [['Jalisco'], 'Jalisco', 'Jalisco', 1], [['México'], 'México', 'México', 1], [['Michoacán'], 'Michoacán', 'Michoacán', 1], [['Morelos'], 'Morelos', 'Morelos', 1], [['Nayarit'], 'Nayarit', 'Nayarit', 1], [['Nuevo León'], 'Nuevo León', 'Nuevo León', 1], [['Oaxaca'], 'Oaxaca', 'Oaxaca', 1], [['Puebla'], 'Puebla', 'Puebla', 1], [['Queretaro'], 'Queretaro', 'Queretaro', 1], [['Quintana Roo'], 'Quintana Roo', 'Quintana Roo', 1], [['San Luis Potosí'], 'San Luis Potosí', 'San Luis Potosí', 1], [['Sinaloa'], 'Sinaloa', 'Sinaloa', 1], [['Sonora'], 'Sonora', 'Sinaloa', 1], [['Tabasco'], 'Tabasco', 'Tabasco', 1], [['Tamaulipas'], 'Tamaulipas', 'Tamaulipas', 1], [['Tlaxcala'], 'Tlaxcala', 'Tlaxcala', 1], [['Veracruz'], 'Veracruz', 'Veracruz', 1], [['Yucatán'], 'Yucatán', 'Yucatán', 1], [['Zacatecas'], 'Zacatecas', 'Zacatecas', 1]];
	var elementosTipoValor10 = [[['', ' ', 'ND'], 'ND', 'ND', 1], [['Español'], 'Español', 'Español', 1], [['Tarahumara'], 'Tarahumara', 'Tarahumara', 1], [['Tepehuan'], 'Tepehuan', 'Tepehuan', 1], [['Wuarojio'], 'Wuarojio', 'Wuarojio', 1], [['Pima'], 'Pima', 'Pima', 1], [['Menonita'], 'Menonita', 'Menonita', 1], [['Otro'], 'Otro', 'Otro', 1]];
	var elementosTipoValor11 = [[['', ' ', 'ND'], 'ND', 'ND', 1], [['Casado'], 'Casado', 'Casado', 1], [['Soltero'], 'Soltero', 'Soltero', 1], [['Unión Libre'], 'Unión Libre', 'Unión Libre', 1], [['Divorciado'], 'Divorciado', 'Divorciado', 1], [['Viudo'], 'Viudo', 'Viudo', 1], [['Separado'], 'Separado', 'Separado', 1], [['Menonita'], 'Menonita', 'Menonita', 1], [['Otro'], 'Otro', 'Otro', 1]];
	var elementosTipoValor12 = [[['', ' ', 'ND'], 'ND', 'ND', 1], [['Padre'], 'Padre', 'Padre', 1], [['Madre'], 'Madre', 'Madre', 1], [['Hijo'], 'Hijo', 'Hijo', 1], [['Pariente'], 'Pariente', 'Pariente', 1], [['Otro'], 'Otro', 'Otro', 1]];
	var elementosTipoValor13 = [[['', ' ', 'ND'], 'ND', 'ND', 1], [['Preescolar'], 'Preescolar', 'Preescolar', 1], [['Primaria'], 'Primaria', 'Primaria', 1], [['Secundaria'], 'Secundaria', 'Secundaria', 1], [['Preparatoria'], 'Preparatoria', 'Preparatoria', 1], [['Técnico'], 'Técnico', 'Técnico', 1], [['Profesional'], 'Profesional', 'Profesional', 1], [['Posgrado'], 'Posgrado', 'Posgrado', 1], [['No asiste a la escuela'], 'No asiste a la escuela', 'No asiste a la escuela', 1], [['Sabe leer y escribir'], 'Sabe leer y escribir', 'Sabe leer y escribir', 1], [['Analfabeta'], 'Analfabeta', 'Analfabeta', 1]];
	var elementosTipoValor14 = [[['', ' ', 'ND'], 'ND', 'ND', 1], [['Hogar'], 'Hogar', 'Hogar', 1], [['Estudiante'], 'Estudiante', 'Estudiante', 1], [['Empleado'], 'Empleado', 'Empleado', 1], [['Desempleado'], 'Desempleado', 'Desempleado', 1], [['Por cuenta propia'], 'Por cuenta propia', 'Por cuenta propia', 1]];
	var elementosTipoValor15 = [[['', ' ', 'ND'], 'ND', 'ND', 1], [['Menor al salario mínimo'], 'Menor al salario mínimo', 'Menor al salario mínimo', 1], [['Igual al salario mínimo'], 'Igual al salario mínimo', 'Igual al salario mínimo', 1], [['Mayor al salario mínimo'], 'Mayor al salario mínimo', 'Mayor al salario mínimo', 1]];
	var elementosTipoValor16 = ['f_pa_papanicolau'];
	var elementosTipoValor17 = ['f_pa_hipertension'];
	var elementosTipoValor18 = ['f_pa_diabetes'];
	var elementosTipoValor19 = ['f_pa_tuberculosis'];
	var elementosTipoValor20 = ['f_pa_alcoholismo'];
	var elementosTipoValor21 = ['f_pa_tabaquismo'];
	var elementosTipoValor22 = ['f_pa_cancer'];
	var elementosTipoValor23 = ['f_pf_diu'];
	var elementosTipoValor24 = ['f_pf_orales'];
	var elementosTipoValor25 = ['f_pf_preservativos'];
	var elementosTipoValor26 = ['f_pf_inyeccion_mensual'];
	var elementosTipoValor27 = ['f_pf_inyeccion_bimensual'];
	var elementosTipoValor28 = ['f_pf_salpingo'];
	var elementosTipoValor29 = ['f_pf_implantes'];
	var elementosTipoValor30 = [[['', ' ', 'ND'], 'ND', 'ND', 1], [['Si', 'SI', 'si'], 'Si', 'Si', 1], [['En Control', 'EN CONTROL', 'En control', 'en control'], 'En Control', 'En Control', 1]];;
	var elementosTipoValor31 = [[['', ' ', 'ND'], 'ND', 'ND', 1], [['Diario', 'DIARIO', 'diario'], 'Diario', 'Diario', 1], [['Tres veces por semana', 'TRES VECES POR SEMANA', 'Tres Veces Por Semana', 'tres veces por semana'], 'Tres veces por semana', 'Tres veces por semana', 1], [['Dos veces por semana', 'DOS VECES POR SEMANA', 'Dos Veces Por Semana', 'dos veces por semana'], 'Dos veces por semana', 'Dos veces por semana', 1], [['Nunca', 'NUNCA', 'nunca'], 'Nunca', 'Nunca', 1]];
	var elementosTipoValor32 = [[['', ' ', 'ND'], 'ND', 'ND', 1], [['Diario', 'DIARIO', 'diario'], 'Diario', 'Diario', 1], [['Tres veces por semana', 'TRES VECES POR SEMANA', 'Tres Veces Por Semana', 'tres veces por semana'], 'Tres veces por semana', 'Tres veces por semana', 1], [['Dos veces por semana', 'DOS VECES POR SEMANA', 'Dos Veces Por Semana', 'dos veces por semana'], 'Dos veces por semana', 'Dos veces por semana', 1], [['Nunca', 'NUNCA', 'nunca'], 'Nunca', 'Nunca', 1]];
	var elementosTipoValor33 = [[['', ' ', 'ND'], 'ND', 'ND', 1], [['Diario', 'DIARIO', 'diario'], 'Diario', 'Diario', 1], [['Tres veces por semana', 'TRES VECES POR SEMANA', 'Tres Veces Por Semana', 'tres veces por semana'], 'Tres veces por semana', 'Tres veces por semana', 1], [['Dos veces por semana', 'DOS VECES POR SEMANA', 'Dos Veces Por Semana', 'dos veces por semana'], 'Dos veces por semana', 'Dos veces por semana', 1], [['Nunca', 'NUNCA', 'nunca'], 'Nunca', 'Nunca', 1]];
	var elementosTipoValor34 = [[['', ' ', 'ND'], 'ND', 'ND', 1], [['Diario', 'DIARIO', 'diario'], 'Diario', 'Diario', 1], [['Tres veces por semana', 'TRES VECES POR SEMANA', 'Tres Veces Por Semana', 'tres veces por semana'], 'Tres veces por semana', 'Tres veces por semana', 1], [['Dos veces por semana', 'DOS VECES POR SEMANA', 'Dos Veces Por Semana', 'dos veces por semana'], 'Dos veces por semana', 'Dos veces por semana', 1], [['Nunca', 'NUNCA', 'nunca'], 'Nunca', 'Nunca', 1]];
	var elementosTipoValor35 = [[['', ' ', 'ND'], 'ND', 'ND', 1], [['Diario', 'DIARIO', 'diario'], 'Diario', 'Diario', 1], [['Tres veces por semana', 'TRES VECES POR SEMANA', 'Tres Veces Por Semana', 'tres veces por semana'], 'Tres veces por semana', 'Tres veces por semana', 1], [['Dos veces por semana', 'DOS VECES POR SEMANA', 'Dos Veces Por Semana', 'dos veces por semana'], 'Dos veces por semana', 'Dos veces por semana', 1], [['Nunca', 'NUNCA', 'nunca'], 'Nunca', 'Nunca', 1]];
	var elementosTipoValor36 = [[['', ' ', 'ND'], 'ND', 'ND', 1], [['Diario', 'DIARIO', 'diario'], 'Diario', 'Diario', 1], [['Tres veces por semana', 'TRES VECES POR SEMANA', 'Tres Veces Por Semana', 'tres veces por semana'], 'Tres veces por semana', 'Tres veces por semana', 1], [['Dos veces por semana', 'DOS VECES POR SEMANA', 'Dos Veces Por Semana', 'dos veces por semana'], 'Dos veces por semana', 'Dos veces por semana', 1], [['Nunca', 'NUNCA', 'nunca'], 'Nunca', 'Nunca', 1]];
	var elementosTipoValor37 = [[['', ' ', 'ND'], 'ND', 'ND', 1], [['Diario', 'DIARIO', 'diario'], 'Diario', 'Diario', 1], [['Tres veces por semana', 'TRES VECES POR SEMANA', 'Tres Veces Por Semana', 'tres veces por semana'], 'Tres veces por semana', 'Tres veces por semana', 1], [['Dos veces por semana', 'DOS VECES POR SEMANA', 'Dos Veces Por Semana', 'dos veces por semana'], 'Dos veces por semana', 'Dos veces por semana', 1], [['Nunca', 'NUNCA', 'nunca'], 'Nunca', 'Nunca', 1]];
	var elementosTipoValor = [elementosTipoValor01, elementosTipoValor02, elementosTipoValor03, elementosTipoValor04, elementosTipoValor05, elementosTipoValor06, elementosTipoValor07, elementosTipoValor08, elementosTipoValor09, elementosTipoValor10, elementosTipoValor11, elementosTipoValor12, elementosTipoValor13, elementosTipoValor14, elementosTipoValor15, elementosTipoValor16, elementosTipoValor17, elementosTipoValor18, elementosTipoValor19, elementosTipoValor20, elementosTipoValor21, elementosTipoValor22, elementosTipoValor23, elementosTipoValor24, elementosTipoValor25, elementosTipoValor26, elementosTipoValor27, elementosTipoValor28, elementosTipoValor29, elementosTipoValor30, elementosTipoValor31, elementosTipoValor32, elementosTipoValor33, elementosTipoValor34, elementosTipoValor35, elementosTipoValor36, elementosTipoValor37];
	var elementosTipo = [elementosTipoFuente, elementosTipoValor];
	var elemenMe01 = '';
	var elemenMe02 = '';
	var elemenMe03 = '';
	var elemenMe04 = '';
	var elemenMe05 = '';
	var elemenMe06 = ' ONCHANGE="Metodos_cambia_fecha_nacimiento.ejecuta()"';
	var elemenMe07 = '';
	var elemenMe08 = '';
	var elemenMe09 = '';
	var elemenMe10 = '';
	var elemenMe11 = '';
	var elemenMe12 = '';
	var elemenMe13 = '';
	var elemenMe14 = '';
	var elemenMe15 = '';
	var elemenMe16 = '';
	var elemenMe17 = '';
	var elemenMe18 = '';
	var elemenMe19 = '';
	var elemenMe20 = '';
	var elemenMe21 = '';
	var elemenMe22 = '';
	var elemenMe23 = '';
	var elemenMe24 = '';
	var elemenMe25 = '';
	var elemenMe26 = '';
	var elemenMe27 = '';
	var elemenMe28 = '';
	var elemenMe29 = '';
	var elemenMe30 = '';
	var elemenMe31 = '';
	var elemenMe32 = '';
	var elemenMe33 = '';
	var elemenMe34 = '';
	var elemenMe35 = '';
	var elemenMe36 = '';
	var elemenMe37 = '';
	var elementosMetodos = [elemenMe01, elemenMe02, elemenMe03, elemenMe04, elemenMe05, elemenMe06, elemenMe07, elemenMe08, elemenMe09, elemenMe10, elemenMe11, elemenMe12, elemenMe13, elemenMe14, elemenMe15, elemenMe16, elemenMe17, elemenMe18, elemenMe19, elemenMe20, elemenMe21, elemenMe22, elemenMe23, elemenMe24, elemenMe25, elemenMe26, elemenMe27, elemenMe28, elemenMe29, elemenMe30, elemenMe31, elemenMe32, elemenMe33, elemenMe34, elemenMe35, elemenMe36, elemenMe37];
	var elemCl01 = 'cf_01';
	var elemCl02 = 'cf_02';
	var elemCl03 = 'cf_03';
	var elemCl04 = 'cf_04';
	var elemCl05 = 'cf_05';
	var elemCl06 = 'cf_06';
	var elemCl07 = 'cf_07';
	var elemCl08 = 'cf_08';
	var elemCl09 = 'cf_09';
	var elemCl10 = 'cf_10';
	var elemCl11 = 'cf_11';
	var elemCl12 = 'cf_12';
	var elemCl13 = 'cf_13';
	var elemCl14 = 'cf_14';
	var elemCl15 = 'cf_15';
	var elemCl16 = 'cf_16';
	var elemCl17 = 'cf_17';
	var elemCl18 = 'cf_18';
	var elemCl19 = 'cf_19';
	var elemCl20 = 'cf_20';
	var elemCl21 = 'cf_21';
	var elemCl22 = 'cf_22';
	var elemCl23 = 'cf_23';
	var elemCl24 = 'cf_24';
	var elemCl25 = 'cf_25';
	var elemCl26 = 'cf_26';
	var elemCl27 = 'cf_27';
	var elemCl28 = 'cf_28';
	var elemCl29 = 'cf_29';
	var elemCl30 = 'cf_30';
	var elemCl31 = 'cf_31';
	var elemCl32 = 'cf_32';
	var elemCl33 = 'cf_33';
	var elemCl34 = 'cf_34';
	var elemCl35 = 'cf_35';
	var elemCl36 = 'cf_36';
	var elemCl37 = 'cf_37';
	var elementosClass = [elemCl01, elemCl02, elemCl03, elemCl04, elemCl05, elemCl06, elemCl07, elemCl08, elemCl09, elemCl10, elemCl11, elemCl12, elemCl13, elemCl14, elemCl15, elemCl16, elemCl17, elemCl18, elemCl19, elemCl20, elemCl21, elemCl22, elemCl23, elemCl24, elemCl25, elemCl26, elemCl27, elemCl28, elemCl29, elemCl30, elemCl31, elemCl32, elemCl33, elemCl34, elemCl35, elemCl36, elemCl37];
	var elemId01 = 'ID_DATO_FAMILIAR_1';
	var elemId02 = 'ID_DATO_FAMILIAR_2';
	var elemId03 = 'ID_DATO_FAMILIAR_3';
	var elemId04 = 'ID_DATO_FAMILIAR_4';
	var elemId05 = 'ID_DATO_FAMILIAR_5';
	var elemId06 = 'ID_DATO_FAMILIAR_6';
	var elemId07 = 'ID_DATO_FAMILIAR_7';
	var elemId08 = 'ID_DATO_FAMILIAR_8';
	var elemId09 = 'ID_DATO_FAMILIAR_9';
	var elemId10 = 'ID_DATO_FAMILIAR_10';
	var elemId11 = 'ID_DATO_FAMILIAR_11';
	var elemId12 = 'ID_DATO_FAMILIAR_12';
	var elemId13 = 'ID_DATO_FAMILIAR_13';
	var elemId14 = 'ID_DATO_FAMILIAR_14';
	var elemId15 = 'ID_DATO_FAMILIAR_15';
	var elemId16 = 'ID_DATO_FAMILIAR_16';
	var elemId17 = 'ID_DATO_FAMILIAR_17';
	var elemId18 = 'ID_DATO_FAMILIAR_18';
	var elemId19 = 'ID_DATO_FAMILIAR_19';
	var elemId20 = 'ID_DATO_FAMILIAR_20';
	var elemId21 = 'ID_DATO_FAMILIAR_21';
	var elemId22 = 'ID_DATO_FAMILIAR_22';
	var elemId23 = 'ID_DATO_FAMILIAR_23';
	var elemId24 = 'ID_DATO_FAMILIAR_24';
	var elemId25 = 'ID_DATO_FAMILIAR_25';
	var elemId26 = 'ID_DATO_FAMILIAR_26';
	var elemId27 = 'ID_DATO_FAMILIAR_27';
	var elemId28 = 'ID_DATO_FAMILIAR_28';
	var elemId29 = 'ID_DATO_FAMILIAR_29';
	var elemId30 = 'ID_DATO_FAMILIAR_30';
	var elemId31 = 'ID_DATO_FAMILIAR_31';
	var elemId32 = 'ID_DATO_FAMILIAR_32';
	var elemId33 = 'ID_DATO_FAMILIAR_33';
	var elemId34 = 'ID_DATO_FAMILIAR_34';
	var elemId35 = 'ID_DATO_FAMILIAR_35';
	var elemId36 = 'ID_DATO_FAMILIAR_36';
	var elemId37 = 'ID_DATO_FAMILIAR_37';
	var elementosId = [elemId01, elemId02, elemId03, elemId04, elemId05, elemId06, elemId07, elemId08, elemId09, elemId10, elemId11, elemId12, elemId13, elemId14, elemId15, elemId16, elemId17, elemId18, elemId19, elemId20, elemId21, elemId22, elemId23, elemId24, elemId25, elemId26, elemId27, elemId28, elemId29, elemId30, elemId31, elemId32, elemId33, elemId34, elemId35, elemId36, elemId37];
	var elementos = [elementosArea, elementosImpresion, elementosValor, elementosTipo, elementosMetodos, elementosClass, elementosId];
	
	var Datos_captura_familiares = new Datos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_cambia_fecha_nacimiento
// DESCRIPCION..: Metodos que se ejecutan cuando se cambia la fecha de nacimiento para
//                calcular años cumplidos 

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Json_datos_captura_familiares.cambia_valor(["dato_6", Fecha_actual.compara_year(document.getElementById("ID_DATO_FAMILIAR_6_5_INPUT_DATE").value)])',
	'Datos_captura_familiares.imprime_especifico(6, 1)'];
	var Metodos_cambia_fecha_nacimiento = new Metodos(configuraciones, codigos, elementos);





// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE AREA DE CONTROLES DE CAMBIOS ALTAS Y BAJAS DE FAMILIARES

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Eliminar_familiar
// ID...........: ID_ELIMINAR_FAMILIAR
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_1	
// DESCRIPCION..: Link con metodos e icono para eliminar registro de familiar ya existente
// HTML.........: Cuando es creado de manera disabled
// IMPRESION....: Cuando es creado sustituye contenidos y se inserta en contenedor oculto
//                la primera vez

	var titulosIngles = ['ELIMINAR FAMILIAR'];
	var iconosIngles = ['fa-solid fa-trash-can'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['ELIMINAR FAMILIAR'];
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
	var etiquetas = ["elemento_eliminar_familiar boton_link_icono_chico", "ID_ELIMINAR_FAMILIAR", "#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_1", "eliminar_familiar"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_modal_eliminar_familiar_confirma.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Eliminar_familiar = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Eliminar_familiar.generahtml();
	Eliminar_familiar.imprimehtml();

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_eliminar_familiar_confirma
// DESCRIPCION..: Modal para confirmar eliminar familiar

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Maqueta_captura_modal_opcion.contenido([0, "CONFIRMA ELIMINAR FAMILIAR"])',
	'Maqueta_captura_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE ELIMINAR FAMILIAR "+Json_datos_captura_familiares.codigos[0].dato_4+" "+Json_datos_captura_familiares.codigos[0].dato_2+" "+Json_datos_captura_familiares.codigos[0].dato_3+" DE LA CÉDULA: "+Json_datos_captura.codigos[0].dato_1+"."])',
	'Maqueta_captura_modal_opcion.generahtml()',
	'Maqueta_captura_modal_opcion.imprimehtml()',
	'Si_eliminar_familiar_modal.generahtml()',
	'Si_eliminar_familiar_modal.imprimehtml()',
	'No_grabar_familiar_modal.generahtml()',
	'No_grabar_familiar_modal.imprimehtml()',
	'Modal_captura_opcion.abrefijo()'];
	var Metodos_modal_eliminar_familiar_confirma = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_eliminar_familiar_modal
// ID...........: ID_SI_ELIMINA_FAMILIAR_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de eliminar familiar
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_GRABAR_FAMILIAR_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_reestablecer_familiar_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_captura_opcion.cierra(), Metodos_evalua_eliminar_familiar.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_eliminar_familiar_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_evalua_eliminar_familiar
// DESCRIPCION..: Metodos que se ejecutan para evaluar si el familiar se puede borrar

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Modal_captura.abrefijo()',
	'Consulta_evalua_eliminar_familiar.actualizafiltro(0, Registro_id_familiar.configuraciones[0])',
	'Consulta_evalua_eliminar_familiar.posicion_callback(0)',
	'Consulta_evalua_eliminar_familiar.ejecuta()'
	];
	var Metodos_evalua_eliminar_familiar = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_evalua_eliminar_familiar
// DESCRIPCION..: Consulta que se ejecuta para evaluar si el familiar no tiene registros ######
//                dependientes

	var statusConsulta = 0;
	var scriptPhp = 'consulta_evalua_eliminar_familiar.php';
	var metodoPhp = 'POST';
	var filtro = [''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_evalua_eliminar_familiar.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 0, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_evalua_eliminar_familiar = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_evalua_eliminar_familiar
// DESCRIPCION..: Metodos que se ejecutan despues de la consulta para evaluar si el familiar
//                puede ser borrado prepara la evaluación de la respuesta

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Modal_captura.cierra()',
	'Evaluacion_eliminar_familiar.recibe_validacion([0, Consulta_evalua_eliminar_familiar.codigos[0][0][1].dato_01])',
	'Evaluacion_eliminar_familiar.recibe_metodo([0, "Metodos_modal_familiar_no_elimina.ejecuta()"])',
	'Evaluacion_eliminar_familiar.recibe_metodo([1, "Metodos_eliminar_familiar_si.ejecuta()"])',
	'Evaluacion_eliminar_familiar.ejecuta()'];
	var Metodos_after_evalua_eliminar_familiar = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_eliminar_familiar
// DESCRIPCION..: Evalua que familiar no tenga apoyos 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['', ''];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [1];
	var especialesElementos = [[0]];
	var retornoElementos = [[0]];
	var mensajesElementos = [['FAMILIAR TIENE APOYOS DEPENDIENTES']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_eliminar_familiar = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_eliminar_familiar_si
// DESCRIPCION..: Metodos que se ejecutan para preparar la consulta de eliminar familiar

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Modal_captura.abrefijo()',
	'Consulta_eliminar_familiar.actualizafiltro(0, Registro_id_familiar.configuraciones[0])',
	'Consulta_eliminar_familiar.actualizafiltro(1, Registro_id.configuraciones[0])',
	'Consulta_eliminar_familiar.posicion_callback(0)',
	'Consulta_eliminar_familiar.ejecuta()'
	];
	var Metodos_eliminar_familiar_si = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_familiar_no_elimina
// DESCRIPCION..: Metodos que se ejecutan para preparar la consulta de eliminar familiar

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['alert("NO PUEDO ELIMINAR FAMILIAR")'];
	var Metodos_modal_familiar_no_elimina = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_eliminar_familiar
// DESCRIPCION..: Consulta que se ejecuta para eliminar familiar despues de evaluaciones            dependientes

	var statusConsulta = 0;
	var scriptPhp = 'consulta_eliminar_familiar.php';
	var metodoPhp = 'POST';
	var filtro = ['', ''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_eliminar_familiar.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 0, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_eliminar_familiar = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_eliminar_familiar
// DESCRIPCION..: Metodos que se ejecutan despues de eliminar familiar

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Datos_captura_familiares.imprime_natural(Json_familiar_nuevo)',
	'Clases_capturar_familiar.afectar()',
	'Consulta_gradilla.limpia_codigos()',
	'Consulta_gradilla.inicializa_parametros()',
	'Consulta_gradilla.posicion_callback(2)',
	'Consulta_gradilla.ejecuta_2()'];
	var Metodos_after_eliminar_familiar = new Metodos(configuraciones, codigos, elementos);
	
// CLASE........: Metodos
// INSTANCIA....: Metodos_gradilla_after_elimina_familiares
// DESCRIPCION..: Metodos que se ejecutan despues de consultar gradilla de Cedulas despues
//                de eliminar familiar

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Gradilla_cedulas.generahtml()',
	'Gradilla_cedulas.imprimehtml()',
	'Consulta_gradilla_familiares.limpia_codigos()',
	'Consulta_gradilla_familiares.posicion_callback(2)',
	'Consulta_gradilla_familiares.ejecuta()'];
	var Metodos_gradilla_after_elimina_familiares = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_gradilla_familiares_after_eliminar_familiares
// DESCRIPCION..: Metodos que se ejecutan despues de consultar gradilla de familiares despues
//                de eliminar familiar

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Gradilla_familiares.recibe_consulta(Consulta_gradilla_familiares)',
	'Gradilla_familiares.generahtml()',
	'Gradilla_familiares.imprimehtml()',
	'Modal_captura.cierra()',
	'Maqueta_captura_modal_opcion.contenido([0, "FAMILIAR ELIMINADO"])',
	'Maqueta_captura_modal_opcion.contenido([1, "EL FAMILIAR: "+Json_datos_captura_familiares.codigos[0].dato_4+" "+Json_datos_captura_familiares.codigos[0].dato_2+" "+Json_datos_captura_familiares.codigos[0].dato_3+" CON EL ID: "+Registro_id_familiar.configuraciones[0]+" DE LA CÉDULA: "+Registro_id.configuraciones[0]+" FUE ELIMINADO EXITOSAMENTE"])',
	'Maqueta_captura_modal_opcion.generahtml()',
	'Maqueta_captura_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Registro_familiar.recibe_status(2)',
	'Registro_id_familiar.recibe_status(0)',
	'Modal_captura_opcion.abrefijo()'
	];
	var Metodos_gradilla_familiares_after_eliminar_familiares = new Metodos(configuraciones, codigos, elementos);





// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE GRABAR FAMILIAR

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Grabar_familiar
// ID...........: ID_GRABAR_FAMILIAR
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_2	
// DESCRIPCION..: Link con metodos e icono para grabar registro de familiar o actualizar familiar
// HTML.........: Cuando es creado de manera disabled
// IMPRESION....: Cuando es creado sustituye contenidos y se inserta en contenedor oculto
//                la primera vez

	var titulosIngles = ['GRABAR'];
	var iconosIngles = ['fa-solid fa-floppy-disk'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['GRABAR'];
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
	var etiquetas = ["elemento_grabar_familiar boton_link_icono_chico", "ID_GRABAR_FAMILIAR", "#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_2", "grabar_familiar"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_evalua_familiar.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Grabar_familiar = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Grabar_familiar.generahtml();
	Grabar_familiar.imprimehtml();

// CLASE........: Metodos
// INSTANCIA....: Metodos_evalua_familiar
// DESCRIPCION..: Metodos que se ejecutan al elegir grabar registro de familiar

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Evaluacion_grabar_familiar.recibe_validacion([0, document.getElementById("ID_DATO_FAMILIAR_5_4_INPUT_TEXT").value])',
	'Evaluacion_grabar_familiar.recibe_metodo([0, "Metodos_modal_graba_familiar_confirma.ejecuta()"])',
	'Evaluacion_grabar_familiar.recibe_metodo([1, "Metodos_modal_familiar_vacio.ejecuta()"])',
	'Evaluacion_grabar_familiar.ejecuta()'];
	var Metodos_evalua_familiar = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_grabar_familiar
// DESCRIPCION..: Evalua que nombre de familiar no este vacio 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['', ''];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [0];
	var especialesElementos = [['']];
	var retornoElementos = [[0]];
	var mensajesElementos = [['NOMBRE DE FAMILIAR VACIO']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_grabar_familiar = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_familiar_vacio
// DESCRIPCION..: Modal para avisar que se intento grabar un familiar sin nombre
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Maqueta_captura_modal_opcion.contenido([0, "FAMILIAR SIN NOMBRE"])',
	'Maqueta_captura_modal_opcion.contenido([1, "NO PUEDO GRABAR O ACTUALIZAR FAMILIAR SIN NOMBRES"])',
	'Maqueta_captura_modal_opcion.generahtml()',
	'Maqueta_captura_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_captura_opcion.abrefijo()'];
	var Metodos_modal_familiar_vacio = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_graba_familiar_confirma
// DESCRIPCION..: Modal para confirmar grabar familiar

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Maqueta_captura_modal_opcion.contenido([0, "CONFIRMA GRABAR FAMILIAR"])',
	'Maqueta_captura_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE GRABAR FAMILIAR "+document.getElementById(`ID_DATO_FAMILIAR_5_4_INPUT_TEXT`).value+" "+document.getElementById(`ID_DATO_FAMILIAR_3_2_INPUT_TEXT`).value+" "+document.getElementById(`ID_DATO_FAMILIAR_4_3_INPUT_TEXT`).value+" DE LA CÉDULA: "+Json_datos_captura.codigos[0].dato_1+"."])',
	'Maqueta_captura_modal_opcion.generahtml()',
	'Maqueta_captura_modal_opcion.imprimehtml()',
	'Si_grabar_familiar_modal.generahtml()',
	'Si_grabar_familiar_modal.imprimehtml()',
	'No_grabar_familiar_modal.generahtml()',
	'No_grabar_familiar_modal.imprimehtml()',
	'Modal_captura_opcion.abrefijo()'];
	var Metodos_modal_graba_familiar_confirma = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_grabar_familiar_modal
// ID...........: ID_SI_GRABAR_FAMILIAR_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de grabar familiar
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_GRABAR_FAMILIAR_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_reestablecer_familiar_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_captura_opcion.cierra(), Metodos_grabar_familiar.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_grabar_familiar_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_grabar_familiar
// DESCRIPCION..: Metodos que se ejecutan cuando se va a grabar familiar nuevo registro despues
//                de evaluación

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Modal_captura.abrefijo()',
	'Consulta_grabar_familiar.actualizafiltro(0, Registro_familiar.configuraciones[0])',
	'Consulta_grabar_familiar.actualizafiltro(1, Registro_id_familiar.configuraciones[0])',
	'Consulta_grabar_familiar.actualizafiltro(2, Registro_id.configuraciones[0])',
	'Datos_captura_familiares.consulta_natural(3, Consulta_grabar_familiar)',
	'Consulta_grabar_familiar.posicion_callback(0)',
	'Consulta_grabar_familiar.ejecuta()'];
	var Metodos_grabar_familiar = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_grabar_familiar
// DESCRIPCION..: Consulta que se ejecuta para grabar o regrabar familiar

	var statusConsulta = 0;
	var scriptPhp = 'consulta_graba_familiar.php';
	var metodoPhp = 'POST';
	var filtro = ['1',
	'2',
	'3',
	'4',
	'5',
	'6',
	'7',
	'8',
	'9',
	'10',
	
	'11',
	'12',
	'13',
	'14',
	'15',
	'16',
	'17',
	'18',
	'19',
	'20',
	
	'21',
	'22',
	'23',
	'24',
	'25',
	'26',
	'27',
	'28',
	'29',
	'30',

	'31',
	'32',
	'33',
	'34',
	'35',
	'36',
	'37',
	'38',
	'39',
	'40'];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_graba_familiar.ejecuta()'];
	var metodosCallback02 = ['Metodos_after_actualiza_familiar.ejecuta()'];
	var metodosCallback = [metodosCallback01, metodosCallback02]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_grabar_familiar = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_graba_familiar
// DESCRIPCION..: Metodos que se ejecutan despues de grabar nueva familiar

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Registro_id_familiar.recibe_status(Consulta_grabar_familiar.codigos[0][0][0].recupera)',
	'Consulta_baja_registro_familiares.actualizafiltro(0, Consulta_grabar_familiar.codigos[0][0][0].recupera)',
	'Consulta_baja_registro_familiares.posicion_callback(1)',
	'Consulta_baja_registro_familiares.ejecuta()',
	'Consulta_gradilla.limpia_codigos()',
	'Consulta_gradilla.inicializa_parametros()',
	'Consulta_gradilla.posicion_callback(1)',
	'Consulta_gradilla.ejecuta_2()'
	];
	var Metodos_after_graba_familiar = new Metodos(configuraciones, codigos, elementos);
	
// CLASE........: Metodos
// INSTANCIA....: Metodos_gradilla_after_graba_familiares
// DESCRIPCION..: Metodos que se ejecutan despues de consultar gradilla de Cedulas despues
//                de grabar nuevo familiar

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Gradilla_cedulas.generahtml()',
	'Gradilla_cedulas.imprimehtml()',
	'Consulta_gradilla_familiares.limpia_codigos()',
	'Consulta_gradilla_familiares.posicion_callback(1)',
	'Consulta_gradilla_familiares.ejecuta()'];
	var Metodos_gradilla_after_graba_familiares = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_gradilla_familiares_after_graba_familiares
// DESCRIPCION..: Metodos que se ejecutan despues de consultar gradilla de familiares despues
//                de grabar nuevo familiar

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Gradilla_familiares.recibe_consulta(Consulta_gradilla_familiares)',
	'Gradilla_familiares.generahtml()',
	'Gradilla_familiares.imprimehtml()',
	'Modal_captura.cierra()',
	'Maqueta_captura_modal_opcion.contenido([0, "FAMILIAR GRABADO"])',
	'Maqueta_captura_modal_opcion.contenido([1, "EL FAMILIAR: "+document.getElementById(`ID_DATO_FAMILIAR_5_4_INPUT_TEXT`).value+" "+document.getElementById(`ID_DATO_FAMILIAR_3_2_INPUT_TEXT`).value+" "+document.getElementById(`ID_DATO_FAMILIAR_4_3_INPUT_TEXT`).value+" DE LA CÉDULA: "+Registro_id.configuraciones[0]+" FUE GRABADO EXITOSAMENTE CON EL ID: "+Registro_id_familiar.configuraciones[0]])',
	'Maqueta_captura_modal_opcion.generahtml()',
	'Maqueta_captura_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_captura_opcion.abrefijo()'
	];
	var Metodos_gradilla_familiares_after_graba_familiares = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_baja_familiares_after_graba_familiar
// DESCRIPCION..: Metodos que se ejecutan despues de ejecutar consulta de bajar registro de familiares

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Modal_captura.cierra()',
	'Registro_familiar.recibe_status(1)',
	'Json_datos_captura_familiares.recibe_json(Consulta_baja_registro_familiares.codigos[0])',
	'Json_datos_captura_familiares.genera()',
	'Clases_baja_familiar.afectar()',
	'Datos_captura_familiares.imprime_natural(Json_datos_captura_familiares.codigos[0])'];
	var Metodos_baja_familiares_after_graba_familiar = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: No_grabar_familiar_modal
// ID...........: ID_NO_GRABAR_FAMILIAR_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en confirmación de grabar familiar 
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
	var etiquetas = ["boton_link_icono_chico", "ID_NO_GRABAR_FAMILIAR_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "no_reestablecer_familiar_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_captura_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_grabar_familiar_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);





// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE ACTUALIZAR FAMILIAR

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Actualizar_familiar
// ID...........: ID_ACTUALIZAR_FAMILIAR
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_3	
// DESCRIPCION..: Link con metodos e icono para actualizar registro de familiar ya existente
// HTML.........: Cuando es creado de manera disabled
// IMPRESION....: Cuando es creado sustituye contenidos y se inserta en contenedor oculto
//                la primera vez

	var titulosIngles = ['ACTUALIZAR FAMILIAR'];
	var iconosIngles = ['fa-solid fa-floppy-disk'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['ACTUALIZAR FAMILIAR'];
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
	var etiquetas = ["elemento_actualizar_familiar boton_link_icono_chico", "ID_ACTUALIZAR_FAMILIAR", "#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_3", "actualizar_familiar"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_evalua_actualizar_familiar.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Actualizar_familiar = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Actualizar_familiar.generahtml();
	Actualizar_familiar.imprimehtml();

// CLASE........: Metodos
// INSTANCIA....: Metodos_evalua_actualizar_familiar
// DESCRIPCION..: Metodos que se ejecutan al elegir actualizar registro de familiar

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Evaluacion_grabar_familiar.recibe_validacion([0, document.getElementById("ID_DATO_FAMILIAR_5_4_INPUT_TEXT").value])',
	'Evaluacion_grabar_familiar.recibe_metodo([0, "Metodos_modal_actualiza_familiar_confirma.ejecuta()"])',
	'Evaluacion_grabar_familiar.recibe_metodo([1, "Metodos_modal_familiar_vacio.ejecuta()"])',
	'Evaluacion_grabar_familiar.ejecuta()'];
	var Metodos_evalua_actualizar_familiar = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_actualiza_familiar_confirma
// DESCRIPCION..: Modal para confirmar grabar familiar

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Maqueta_captura_modal_opcion.contenido([0, "CONFIRMA ACTUALIZAR FAMILIAR"])',
	'Maqueta_captura_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE ACTUALIZAR FAMILIAR "+document.getElementById(`ID_DATO_FAMILIAR_5_4_INPUT_TEXT`).value+" "+document.getElementById(`ID_DATO_FAMILIAR_3_2_INPUT_TEXT`).value+" "+document.getElementById(`ID_DATO_FAMILIAR_4_3_INPUT_TEXT`).value+" DE LA CÉDULA: "+Json_datos_captura.codigos[0].dato_1+"."])',
	'Maqueta_captura_modal_opcion.generahtml()',
	'Maqueta_captura_modal_opcion.imprimehtml()',
	'Si_actualizar_familiar_modal.generahtml()',
	'Si_actualizar_familiar_modal.imprimehtml()',
	'No_grabar_familiar_modal.generahtml()',
	'No_grabar_familiar_modal.imprimehtml()',
	'Modal_captura_opcion.abrefijo()'];
	var Metodos_modal_actualiza_familiar_confirma = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_actualzar_familiar_modal
// ID...........: ID_SI_ACTUALIZAR_FAMILIAR_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de actualizar familiar
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_ACTUALIZAR_FAMILIAR_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_reestablecer_familiar_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_captura_opcion.cierra(), Metodos_actualizar_familiar.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_actualizar_familiar_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_actualizar_familiar
// DESCRIPCION..: Metodos que se ejecutan cuando se va a actualizar familiar grabado

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Modal_captura.abrefijo()',
	'Consulta_grabar_familiar.actualizafiltro(0, Registro_familiar.configuraciones[0])',
	'Consulta_grabar_familiar.actualizafiltro(1, Registro_id_familiar.configuraciones[0])',
	'Consulta_grabar_familiar.actualizafiltro(2, Registro_id.configuraciones[0])',
	'Datos_captura_familiares.consulta_natural(3, Consulta_grabar_familiar)',
	'Consulta_grabar_familiar.posicion_callback(1)',
	'Consulta_grabar_familiar.ejecuta()'];
	var Metodos_actualizar_familiar = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_actualiza_familiar
// DESCRIPCION..: Metodos que se ejecutan despues de grabar nueva familiar

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Consulta_baja_registro_familiares.posicion_callback(1)',
	'Consulta_baja_registro_familiares.ejecuta()',
	'Consulta_gradilla_familiares.limpia_codigos()',
	'Consulta_gradilla_familiares.posicion_callback(3)',
	'Consulta_gradilla_familiares.ejecuta()'
	];
	var Metodos_after_actualiza_familiar = new Metodos(configuraciones, codigos, elementos);
	
// CLASE........: Metodos
// INSTANCIA....: Metodos_gradilla_familiares_after_actualiza_familiares
// DESCRIPCION..: Metodos que se ejecutan despues de consultar gradilla de familiares despues
//                de actualizar familiar

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Gradilla_familiares.recibe_consulta(Consulta_gradilla_familiares)',
	'Gradilla_familiares.generahtml()',
	'Gradilla_familiares.imprimehtml()',
	'Modal_captura.cierra()',
	'Maqueta_captura_modal_opcion.contenido([0, "FAMILIAR ACTUALIZADO"])',
	'Maqueta_captura_modal_opcion.contenido([1, "EL FAMILIAR: "+document.getElementById(`ID_DATO_FAMILIAR_5_4_INPUT_TEXT`).value+" "+document.getElementById(`ID_DATO_FAMILIAR_3_2_INPUT_TEXT`).value+" "+document.getElementById(`ID_DATO_FAMILIAR_4_3_INPUT_TEXT`).value+" DE LA CÉDULA: "+Registro_id.configuraciones[0]+" FUE ACTUALIZADO EXITOSAMENTE CON EL ID: "+Registro_id_familiar.configuraciones[0]])',
	'Maqueta_captura_modal_opcion.generahtml()',
	'Maqueta_captura_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_captura_opcion.abrefijo()'
	];
	var Metodos_gradilla_familiares_after_actualiza_familiares = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Limpiar_familiar
// ID...........: ID_LIMPIAR_FAMILIAR
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_4	
// DESCRIPCION..: Link con metodos e icono para limpiar la captura capturando nuevo familiar
// HTML.........: Cuando es creado de manera disabled
// IMPRESION....: Cuando es creado espera metodo para quitar disabled

	var titulosIngles = ['LIMPIAR CAPTURA FAMILIAR'];
	var iconosIngles = ['fa-regular fa-clipboard'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['LIMPIAR CAPTURA FAMILIAR'];
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
	var etiquetas = ["elemento_limpiar_familiar boton_link_icono_chico", "ID_LIMPIAR_FAMILIAR", "#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_4", "limpiar_familiar"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_capturar_familiar.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Limpia_captura_familiar = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Limpia_captura_familiar.generahtml();
	Limpia_captura_familiar.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Reestablecer_familiar
// ID...........: ID_REESTABLECER_FAMILIAR
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_6	
// DESCRIPCION..: Link con metodos e icono para reestablecer valores de la captura
//                cuando se esta modificando un registro de familiar
// HTML.........: Cuando es creado de manera disabled
// IMPRESION....: Cuando es creado espera metodo para quitar disabled

	var titulosIngles = ['REESTABLECER VALORES CAPTURA FAMILIAR'];
	var iconosIngles = ['fa-solid fa-arrow-rotate-right'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['REESTABLECER VALORES CAPTURA FAMILIAR'];
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
	var etiquetas = ["elemento_reestablecer_familiar boton_link_icono_chico", "ID_REESTABLECER_FAMILIAR", "#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_5", "reestablecer_familiar"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_confirma_reestablecer_familiar.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Reestablecer_familiar = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Reestablecer_familiar.generahtml();
	Reestablecer_familiar.imprimehtml();

// CLASE........: Metodos
// INSTANCIA....: Metodos_confirma_reestablecer_familiar
// DESCRIPCION..: Metodos que se ejecutan al elegir reestablecer valores de captura de familiar
//                existente

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Maqueta_captura_modal_opcion.contenido([0, "CONFIRMA REESTABLECER VALORES DE FAMILIAR"])',
	'Maqueta_captura_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE REESTABLECER LOS VALORES GRABADOS DEL FAMILIAR DE LA CÉDULA: "+Json_datos_captura.codigos[0].dato_1+"."])',
	'Maqueta_captura_modal_opcion.generahtml()',
	'Maqueta_captura_modal_opcion.imprimehtml()',
	'Si_reestablecer_familiar_modal.generahtml()',
	'Si_reestablecer_familiar_modal.imprimehtml()',
	'No_reestablecer_familiar_modal.generahtml()',
	'No_reestablecer_familiar_modal.imprimehtml()',
	'Modal_captura_opcion.abrefijo()'];
	var Metodos_confirma_reestablecer_familiar = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_reestablecer_familiar_modal
// ID...........: ID_SI_REESTABLECER_FAMILIAR_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de reestablecer
//                valores originales de registro de familiar en modificación
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_REESTABLECER_FAMILIAR_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "si_reestablecer_familiar_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_captura_opcion.cierra(), Metodos_reestablecer_familiar_valores.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_reestablecer_familiar_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Elemento
// INSTANCIA....: No_reestablecer_familiar_modal
// ID...........: ID_NO_REESTABLECER_FAMILIAR_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en confirmación de reestablecer 
//                valores originales de familiar en modificación
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
	var etiquetas = ["boton_link_icono_chico", "ID_NO_REESTABLECER_FAMILIAR_MODAL", "#ID_SDHYBC_MODAL_OPCION_BUTTON", "no_reestablecer_familiar_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_captura_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_reestablecer_familiar_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_reestablecer_familiar_valores
// DESCRIPCION..: Metodos que se ejecutan despues de elegir si reestablecer valores 
//                valores originales de familiar en modificación

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Modal_captura.abrefijo()',
	'Consulta_baja_registro_familiares.actualizafiltro(0, Registro_id_familiar.configuraciones[0])',
	'Consulta_baja_registro_familiares.posicion_callback(0)',
	'Consulta_baja_registro_familiares.ejecuta()',
	'Modal_captura.cierra()'];
	var Metodos_reestablecer_familiar_valores = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Capturar_familiar
// ID...........: ID_CAPTURAR_FAMILIAR
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_6	
// DESCRIPCION..: Link con metodos e icono para abrir la captura a un nuevo registro de familiar
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido

	var titulosIngles = ['CAPTURAR NUEVO FAMILIAR'];
	var iconosIngles = ['fa-solid fa-plus'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['CAPTURAR NUEVO FAMILIAR'];
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
	var etiquetas = ["elemento_capturar_familiar boton_link_icono_chico", "ID_CAPTURAR_FAMILIAR", "#ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_6", "capturar_familiar"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_capturar_familiar.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Capturar_familiar = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Capturar_familiar.generahtml();
	Capturar_familiar.imprimehtml();

// CLASE........: Metodos
// INSTANCIA....: Metodos_capturar_familiar
// DESCRIPCION..: Metodos que se ejecutan al elegir capturar nueva familiar

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Registro_familiar.recibe_status(2)',
	'Registro_id_familiar.recibe_status(0)',
	'Registro_familiar.recibe_status(2)',
	'Datos_captura_familiares.imprime_natural(Json_familiar_nuevo)',
	'Clases_capturar_familiar.afectar()'];
	var Metodos_capturar_familiar = new Metodos(configuraciones, codigos, elementos);







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







// CLASE........: Clases
// INSTANCIA....: Clases_registro_activo
// DESCRIPCION..: Clases del DOM que se configuran cuando se elige bajar a la captura un
//                registro de cédula

	var numeroElementos = 8;
	var configuraciones = [numeroElementos];
	var elementosClasesBase = ['areas_registro_captura',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_1_2_1_CL_0',
	'boton_eliminar',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_1_2_2_CL_1',
	'boton_limpia',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_1_2_3_CL_2',
	'boton_reestablece',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_2_2_CL_1',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_2_3_CL_2',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_2_6_CL_5'];
	var elementosClases = [['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto']];
	var elementosClasesTipo = [[0],
	[0],
	[0],
	[1],
	[1],
	[0],
	[0],
	[0],
	[0],
	[0]];
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_registro_activo = new Clases(configuraciones, elementos);

// INSTANCIA....: Clases_diseno_inicial
// DESCRIPCION..: Configuración de Clases interactivas del DOM como deben aparecer al iniciar
//                se ejecuta la primera vez al instanciarse

	var numeroElementos = 6;
	var configuraciones = [numeroElementos];
	var elementosClasesBase = ['ID_TRABAJO_ESCRITORIO_MAQUETA_X_1_2_1_CL_0',
	'boton_eliminar',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_1_2_2_CL_1',
	'boton_limpia',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_1_2_3_CL_2',
	'boton_reestablece'];
	var elementosClases = [['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto']];
	var elementosClasesTipo = [[1],
	[1],
	[1],
	[1],
	[1],
	[1]];
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_diseno_inicial = new Clases(configuraciones, elementos);
	Clases_diseno_inicial.afectar();

// CLASE........: Clases
// INSTANCIA....: Clases_elige_nueva
// DESCRIPCION..: Configuración de Clases interactivas del DOM como deben aparecer al elegir
//                nueva cédula

	var configuraciones = [0];
	var elementosClasesBase = ['areas_registro_captura',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_1_2_1_CL_0',
	'boton_eliminar',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_1_2_2_CL_1',
	'boton_limpia',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_1_2_3_CL_2',
	'boton_reestablece',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_2_2_CL_1',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_2_3_CL_2',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_2_6_CL_5'];
	var elementosClases = [['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto']];
	var elementosClasesTipo = [[0],
	[1],
	[1],
	[0],
	[0],
	[1],
	[1],
	[1],
	[1],
	[1]];
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_elige_nueva = new Clases(configuraciones, elementos);

// CLASE........: Clases
// INSTANCIA....: Clases_primer_bloque
// DESCRIPCION..: Configuración de Clases interactivas del DOM como deben aparecer al capturar
//                primer bloque

	var configuraciones = [0];
	var elementosClasesBase = ['ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_CL_0',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_CL_1',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_CL_2',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_CL_3'];
	var elementosClases = [['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto']];
	var elementosClasesTipo = [[0],
	[1],
	[1],
	[1]];
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_primer_bloque = new Clases(configuraciones, elementos);

// CLASE........: Clases
// INSTANCIA....: Clases_segundo_bloque
// DESCRIPCION..: Configuración de Clases interactivas del DOM como deben aparecer al capturar
//                segundo bloque

	var configuraciones = [0];
	var elementosClasesBase = ['ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_CL_0',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_CL_1',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_CL_2',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_CL_3'];
	var elementosClases = [['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto']];
	var elementosClasesTipo = [[1],
	[0],
	[1],
	[1]];
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_segundo_bloque = new Clases(configuraciones, elementos);

// CLASE........: Clases
// INSTANCIA....: Clases_tercer_bloque
// DESCRIPCION..: Configuración de Clases interactivas del DOM como deben aparecer al capturar
//                tercer bloque

	var configuraciones = [0];
	var elementosClasesBase = ['ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_CL_0',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_CL_1',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_CL_2',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_CL_3'];
	var elementosClases = [['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto']];
	var elementosClasesTipo = [[1],
	[1],
	[0],
	[1]];
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_tercer_bloque = new Clases(configuraciones, elementos);

// CLASE........: Clases
// INSTANCIA....: Clases_cuarto_bloque
// DESCRIPCION..: Configuración de Clases interactivas del DOM como deben aparecer al capturar
//                cuarto bloque

	var configuraciones = [0];
	var elementosClasesBase = ['ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_1_CL_0',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_2_CL_1',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_3_CL_2',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_CL_3'];
	var elementosClases = [['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto']];
	var elementosClasesTipo = [[1],
	[1],
	[1],
	[0]];
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_cuarto_bloque = new Clases(configuraciones, elementos);

// OBJETO Clases

	var numeroElementos = 1;
	var configuraciones = [numeroElementos];
	var elementosClasesBase = ['boton_sw_enabled'];
	var elementosClases = [['disabled']];
	var elementosClasesTipo = [[0]];
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_actualiza_enabled = new Clases(configuraciones, elementos);

// CLASE........: Clases
// INSTANCIA....: Clases_actualiza_disabled
// DESCRIPCION..: 

	var numeroElementos = 1;
	var configuraciones = [numeroElementos];
	var elementosClasesBase = ['boton_sw_enabled'];
	var elementosClases = [['disabled']];
	var elementosClasesTipo = [[1]];
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_actualiza_disabled = new Clases(configuraciones, elementos);

// OBJETO Clases

	var numeroElementos = 1;
	var configuraciones = [numeroElementos];
	var elementosClasesBase = ['boton_sw_nueva_loca'];
	var elementosClases = [['disabled']];
	var elementosClasesTipo = [[0]];
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_nueva_enabled = new Clases(configuraciones, elementos);

// CLASE........: Clases
// INSTANCIA....: Clases_nueva_disabled
// DESCRIPCION..: 

	var numeroElementos = 1;
	var configuraciones = [numeroElementos];
	var elementosClasesBase = ['boton_sw_nueva_loca'];
	var elementosClases = [['disabled']];
	var elementosClasesTipo = [[1]];
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_nueva_disabled = new Clases(configuraciones, elementos);

// CLASE........: Clases
// CLASE........: Clases
// INSTANCIA....: Clases_capturar_familiar
// DESCRIPCION..: Clases del DOM que se actualizan cuando se elige capturar nuevo familiar                calcular años cumplidos 


	var configuraciones = [0];
	var elementosClasesBase = ['ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_1_CL_0',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_2_CL_1',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_3_CL_2',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_4_CL_3',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_5_CL_4',
	'cf_03_input_text',
	'cf_04_input_text',
	'cf_05_input_text',
	'cf_06_input_date',
	'cf_07_input_num',
	'cf_08_radio',
	'cf_09_select',
	'cf_10_select',
	'cf_11_select',
	'cf_12_select',
	'cf_13_select',
	'cf_14_select',
	'cf_15_select',
	'cf_16_input_checkbox',
	'cf_17_input_checkbox',
	'cf_18_input_checkbox',
	'cf_19_input_checkbox',
	'cf_20_input_checkbox',
	'cf_21_input_checkbox',
	'cf_22_input_checkbox',
	'cf_23_input_checkbox',
	'cf_24_input_checkbox',
	'cf_25_input_checkbox',
	'cf_26_input_checkbox',
	'cf_27_input_checkbox',
	'cf_28_input_checkbox',
	'cf_29_input_checkbox',
	'cf_30_radio',
	'cf_31_select',
	'cf_32_select',
	'cf_33_select',
	'cf_34_select',
	'cf_35_select',
	'cf_36_select',
	'cf_37_select'];
	var elementosClases = [['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
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
	['disabled_2']];
	var elementosClasesTipo = [[1],
	[0],
	[1],
	[0],
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
	[0],
	[0],
	[0],
	[0],
	[0],
	[0],
	[0]];
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_capturar_familiar = new Clases(configuraciones, elementos);

// CLASE........: Clases
// INSTANCIA....: Clases_baja_familiar
// DESCRIPCION..: Clases del DOM en cmabios, bajas y altas de familiares que se actualizan
//                cuando se elige bajar un familiar 

	var configuraciones = [numeroElementos];
	var elementosClasesBase = ['ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_1_CL_0',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_2_CL_1',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_3_CL_2',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_4_CL_3',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_5_CL_4'];
	var elementosClases = [['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto']];
	var elementosClasesTipo = [[0],
	[1],
	[0],
	[1],
	[0]];
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_baja_familiar = new Clases(configuraciones, elementos);

// CLASE........: Clases
// INSTANCIA....: Clases_disabled_familiar
// DESCRIPCION..: Configuración de Clases interactivas del DOM haciendo disabled la captura de
//                de familiar

	var configuraciones = [0];
	var elementosClasesBase = ['ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_1_CL_0',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_2_CL_1',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_3_CL_2',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_4_CL_3',
	'ID_TRABAJO_ESCRITORIO_MAQUETA_X_X_1_4_2_2_5_CL_4',
	'cf_03_input_text',
	'cf_04_input_text',
	'cf_05_input_text',
	'cf_06_input_date',
	'cf_07_input_num',
	'cf_08_radio',
	'cf_09_select',
	'cf_10_select',
	'cf_11_select',
	'cf_12_select',
	'cf_13_select',
	'cf_14_select',
	'cf_15_select',
	'cf_16_input_checkbox',
	'cf_17_input_checkbox',
	'cf_18_input_checkbox',
	'cf_19_input_checkbox',
	'cf_20_input_checkbox',
	'cf_21_input_checkbox',
	'cf_22_input_checkbox',
	'cf_23_input_checkbox',
	'cf_24_input_checkbox',
	'cf_25_input_checkbox',
	'cf_26_input_checkbox',
	'cf_27_input_checkbox',
	'cf_28_input_checkbox',
	'cf_29_input_checkbox',
	'cf_30_radio',
	'cf_31_select',
	'cf_32_select',
	'cf_33_select',
	'cf_34_select',
	'cf_35_select',
	'cf_36_select',
	'cf_37_select'];
	var elementosClases = [['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
	['elemento_oculto'],
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
	['disabled_2']];
	var elementosClasesTipo = [[1],
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
	[1]];
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_disabled_familiar = new Clases(configuraciones, elementos);

// CLASE........: Clases
// INSTANCIA....: Clases_enabled_familiar
// DESCRIPCION..: Configuración de Clases interactivas del DOM haciendo enabled la captura de
//                de familiar

	var configuraciones = [0];
	var elementosClasesBase = ['cf_03_input_text',
	'cf_04_input_text',
	'cf_05_input_text',
	'cf_06_input_date'];
	var elementosClases = [['disabled_2'],
	['disabled_2'],
	['disabled_2'],
	['disabled_2']];
	var elementosClasesTipo = [[0],
	[0],
	[0],
	[0]];
	var elementos = [elementosClasesBase, elementosClases, elementosClasesTipo];
	var Clases_enabled_familiar = new Clases(configuraciones, elementos);







// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Registro_cedula
// DESCRIPCION..: Control del status del registro de cédula 0 = no hay registro 1 = modificando
//                registro grabado 2 = capturando nuevo registro

	var valor = 0;
	var configuraciones = [valor];
	var Registro_cedula = new Registro(configuraciones);

// CLASE........: Registro
// INSTANCIA....: Registro_familiar
// DESCRIPCION..: Control del status del registro de familiar 0 = no hay registro 1 = modificando
//                registro grabado 2 = capturando nuevo registro

	var valor = 0;
	var configuraciones = [valor];
	var Registro_familiar = new Registro(configuraciones);

// CLASE........: Registro
// INSTANCIA....: Registro_bloque
// DESCRIPCION..: Control del bloque de captura 4 bloques

	var valor = 0;
	var configuraciones = [valor];
	var Registro_bloque = new Registro(configuraciones);

// CLASE........: Registro
// INSTANCIA....: Registro_graba
// DESCRIPCION..: Control de tipo de grabación

	var valor = 0;
	var configuraciones = [valor];
	var Registro_graba = new Registro(configuraciones);

// CLASE........: Registro
// INSTANCIA....: Registro_id
// DESCRIPCION..: Control de id de cédula

	var valor = 0;
	var configuraciones = [valor];
	var Registro_id = new Registro(configuraciones);

// CLASE........: Registro
// INSTANCIA....: Registro_id_familiar
// DESCRIPCION..: Control de id de familiar

	var valor = 0;
	var configuraciones = [valor];
	var Registro_id_familiar = new Registro(configuraciones);

// CLASE........: Date
// INSTANCIA....: Fecha_reg_ced
// ID...........: 
// SE INSERTA EN: 	
// DESCRIPCION..: Fecha para guardar el dato de la fecha de grabación de cédula
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
	var Fecha_reg_ced = new Fecha(configuraciones, etiquetas, codigos, valores, metodos);

// CLASE........: Date
// INSTANCIA....: Fecha_reg_viv
// ID...........: 
// SE INSERTA EN: 	
// DESCRIPCION..: Fecha para guardar el dato de la fecha de vivienda
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
	var Fecha_reg_viv = new Fecha(configuraciones, etiquetas, codigos, valores, metodos);

// CLASE........: Date
// INSTANCIA....: Fecha_reg_gen
// ID...........: 
// SE INSERTA EN: 	
// DESCRIPCION..: Fecha para guardar el dato de la fecha de generales de cédula
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
	var Fecha_reg_gen = new Fecha(configuraciones, etiquetas, codigos, valores, metodos);

// CLASE........: Registro
// INSTANCIA....: Registro_tipoloca
// DESCRIPCION..: Control de tipo de localidad

	var valor = 'ND';
	var configuraciones = [valor];
	var Registro_tipoloca = new Registro(configuraciones);

// CLASE........: Registro
// INSTANCIA....: Registro_numinteg
// DESCRIPCION..: Control de número de integrantes

	var valor = 0;
	var configuraciones = [valor];
	var Registro_numinteg = new Registro(configuraciones);

// CLASE........: Registro
// INSTANCIA....: Registro_origcapt
// DESCRIPCION..: Control de origen de captura

	var valor = 'NUEVO';
	var configuraciones = [valor];
	var Registro_origcapt = new Registro(configuraciones);

// CLASE........: Registro
// INSTANCIA....: Registro_avanza
// DESCRIPCION..: Control de avance de bloque

	var valor = 0;
	var configuraciones = [valor];
	var Registro_avanza = new Registro(configuraciones);

// METODO.......: redimensiona()
// INSTANCIA....: Pantalla_sdhybc_captura
// DESCRIPCION..: Obtiene las dimensiones de la pantalla al iniciar por primera vez

	Pantalla_sdhybc_captura.redimensiona();

	Consulta_combolist_municipios.posicion_callback(0);
    Consulta_combolist_municipios.ejecuta_2();





</script>