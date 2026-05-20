<?php
// VINCULAMOS CLASES PHP
require_once "../../pantalib/php/objetos/new/Sistema.php";
require_once "../../pantalib/php/objetos/new/User.php";
require_once "../../pantalib/php/objetos/new/Log.php";
header('Content-Type: text/html; charset=UTF-8');
session_start();

// ESTABLECEMOS PARAMETROS DE LOG
$_SESSION['logPhp']->configuraciones[2] = '../logs/';

// LOGEAMOS INICIO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS actualiza.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

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
$elementos_valores = [$id_user, $name_user, $paterno_user, $materno_user, $mail_user, $pass_user, $priv_user];
$elementos = [$elementos_valores];
$_SESSION['User'] = new User($configuraciones, $elementos);
?>
<!DOCTYPE html>
<html lang="es_MX">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CS ACTUALIZA CONTRASEÑA</title>
        <link rel="icon" href="../icons8-favicon.gif" type="image/x-icon">
		<link rel="stylesheet" href="../../pantalib/fontawesome/css/all.css">
		<link rel="stylesheet" href="../../pantalib/css/comerciosolidario.css">
		<link rel="stylesheet" href="../../pantalib/css/comerciosolidario_actualiza.css">
		<script src="../../pantalib/jquery/jquery.js"></script>

		<script src="../../pantalib/javascript/objetos/mvvm/model/System.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/model/Consulta.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/model/Dato.js"></script>

		<script src="../../pantalib/javascript/objetos/mvvm/view/Maqueta.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Load.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Input.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Link.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Modal.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Elemento.js"></script>

		<script src="../../pantalib/javascript/objetos/mvvm/viewmodel/Pantalla.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/viewmodel/Metodos.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/viewmodel/Evaluacion.js"></script>
    </head>
    <body class="maqueta_base" id="ID_COMERCIOSOLIDARIO_BODY">
        COMERCIO SOLIDARIO 
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

// BLOQUE UNO: ESTABLECE DATOS INICIALES CLASES MODELO

// ****************************************************************
// ****************************************************************
// ****************************************************************




































// ****************************************************************
// MODELS: CLASES PARA MANEJAR SESION PHP Y SISTEMA
// ****************************************************************


// CLASE........: System
// INSTANCIA....: Sistema_comerciosolidario
// DESCRIPCION..: Instancia para administrar sesión de PHP 
	
  	var idioma = <?php echo json_encode($_SESSION['Sistema'] -> configuraciones[2]); ?>;
    var sistema_id = <?php echo json_encode($_SESSION['Sistema'] -> configuraciones[0]); ?>;
    var sistema_tech_name = <?php echo json_encode($_SESSION['Sistema'] -> configuraciones[1]); ?>;
    var token = <?php echo json_encode($_SESSION['token']); ?>;
	var Sistema_comerciosolidario = new System(sistema_id, sistema_tech_name, 'COMERCIOSOLIDARIO', 'SECRETARÍA DE DESARROLLO HUMANO Y BIENESTAR COMUNITARIO', '');


// ****************************************************************
// MODELS: CLASES PARA IR AL BACKEND
// ****************************************************************


// CLASE........: Consulta
// INSTANCIA....: Consulta_actualiza_clave
// DESCRIPCION..: Consulta que se ejecuta para actualizar la contraseña
	
	var statusConsulta = 0;
	var scriptPhp = 'consulta_actualiza_clave.php';
	var metodoPhp = 'POST';
	var filtro = ['', ''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_actualiza.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_actualiza_clave = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_baja_registro
// DESCRIPCION..: Consulta que se ejecuta para traer desde la BD un registro de usuario
	
	var statusConsulta = 0;
	var scriptPhp = 'consulta_baja_usuario_actualiza.php';
	var metodoPhp = 'POST';
	var filtro = [''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_baja.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_baja_registro = new Consulta(configuraciones, codigos, elementos);


// ****************************************************************
// MODELS: DATOS BASE
// ****************************************************************
	

	// CLASE........: Dato
	// INSTANCIA....: Dato_status_registro
	// DESCRIPCION..: Dato para manejar el status del registro de usuario
	
		var instancia_name = 'Dato_status_registro';
		var configuraciones = [instancia_name];
		var estructura_tipo = 1;
		var estructura = [estructura_tipo];
		var dato_actual = 0;
		var dato_inicial = 0;
		var datos = [dato_actual, dato_inicial];
		var Dato_status_registro = new Dato(configuraciones, estructura, datos);
		Dato_status_registro.inicializa_dato();

	// CLASE........: Dato
	// INSTANCIA....: Dato_token_registro
	// DESCRIPCION..: Dato para manejar el token del registro de usuario
	
		var instancia_name = 'Dato_token_registro';
		var configuraciones = [instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var dato_actual = '';
		var dato_inicial = '';
		var datos = [dato_actual, dato_inicial];
		var Dato_token_registro = new Dato(configuraciones, estructura, datos);
		Dato_token_registro.inicializa_dato();

	// CLASE........: Dato
	// INSTANCIA....: Dato_id_registro
	// DESCRIPCION..: Dato para manejar el id del registro de usuario
	
		var instancia_name = 'Dato_id_registro';
		var configuraciones = [instancia_name];
		var estructura_tipo = 1;
		var estructura = [estructura_tipo];
		var dato_actual = 0;
		var dato_inicial = 0;
		var datos = [dato_actual, dato_inicial];
		var Dato_id_registro = new Dato(configuraciones, estructura, datos);
		Dato_id_registro.inicializa_dato();

	// CLASE........: Dato
	// INSTANCIA....: Dato_correo_registro
	// DESCRIPCION..: Dato para manejar el email del registro de usuario
	
		var instancia_name = 'Dato_correo_registro';
		var configuraciones = [instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var dato_actual = '';
		var dato_inicial = '';
		var datos = [dato_actual, dato_inicial];
		var Dato_correo_registro = new Dato(configuraciones, estructura, datos);
		Dato_correo_registro.inicializa_dato();

	// CLASE........: Dato
	// INSTANCIA....: Dato_nombre_registro
	// DESCRIPCION..: Dato para manejar el nombre del registro de usuario
	
		var instancia_name = 'Dato_nombre_registro';
		var configuraciones = [instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var dato_actual = '';
		var dato_inicial = '';
		var datos = [dato_actual, dato_inicial];
		var Dato_nombre_registro = new Dato(configuraciones, estructura, datos);
		Dato_nombre_registro.inicializa_dato();

	// CLASE........: Dato
	// INSTANCIA....: Dato_apellido_registro
	// DESCRIPCION..: Dato para manejar el apellido del registro de usuario
	
		var instancia_name = 'Dato_apellido_registro';
		var configuraciones = [instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var dato_actual = '';
		var dato_inicial = '';
		var datos = [dato_actual, dato_inicial];
		var Dato_apellido_registro = new Dato(configuraciones, estructura, datos);
		Dato_apellido_registro.inicializa_dato();

	// CLASE........: Dato
	// INSTANCIA....: Dato_alias_registro
	// DESCRIPCION..: Dato para manejar el alias del registro de usuario
	
		var instancia_name = 'Dato_alias_registro';
		var configuraciones = [instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var dato_actual = '';
		var dato_inicial = '';
		var datos = [dato_actual, dato_inicial];
		var Dato_alias_registro = new Dato(configuraciones, estructura, datos);
		Dato_alias_registro.inicializa_dato();

	// CLASE........: Dato
	// INSTANCIA....: Dato_password_registro
	// DESCRIPCION..: Dato para manejar la clave del registro de usuario
	
		var instancia_name = 'Dato_password_registro';
		var configuraciones = [instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var dato_actual = '';
		var dato_inicial = '';
		var datos = [dato_actual, dato_inicial];
		var Dato_password_registro = new Dato(configuraciones, estructura, datos);
		Dato_password_registro.inicializa_dato();

	// CLASE........: Dato
	// INSTANCIA....: Dato_confirma_registro
	// DESCRIPCION..: Dato para manejar la confirmación de la clave del registro de usuario
	
		var instancia_name = 'Dato_confirma_registro';
		var configuraciones = [instancia_name];
		var estructura_tipo = 0;
		var estructura = [estructura_tipo];
		var dato_actual = '';
		var dato_inicial = '';
		var datos = [dato_actual, dato_inicial];
		var Dato_confirma_registro = new Dato(configuraciones, estructura, datos);
		Dato_confirma_registro.inicializa_dato();























// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE DOS: PANTALLA CLASES VIEW

// ****************************************************************
// ****************************************************************
// ****************************************************************





















// ****************************************************************
// BLOQUE DOS: 01 MAQUETA GENERAL Y MODALES
// ****************************************************************


// CLASE........: Maqueta
// INSTANCIA....: maqueta_01
// ID...........: ID_GEN_MAQUETA
// SE INSERTA EN: #ID_COMERCIOSOLIDARIO_BODY	
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
	var etiquetas = ["maqueta_01", "ID_GEN_MAQUETA", "#ID_COMERCIOSOLIDARIO_BODY"];
	var codigos = [""];
	var elementosClass = ["area_cuerpo", "modal_oculto", "modal_oculto"];
	var elementosId = ["ID_GEN_CUERPO", "ID_GEN_MODAL", "ID_GEN_MODAL_OPCION"];
	var elementos = [elementosClass, elementosId];
	var maqueta_01 = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	maqueta_01.generahtml();
	maqueta_01.imprimehtml();

// CLASE........: Modal
// INSTANCIA....: Modal_index
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
	var etiquetas = ["ventana_modal", "ID_COMERCIOSOLIDARIO_MODAL_X", "#ID_COMERCIOSOLIDARIO_BODY", "#ID_COMERCIOSOLIDARIO_MODAL_TITULO_X", "#ID_COMERCIOSOLIDARIO_MODAL_AVISO_X"];
	var codigos = [""];
	var Modal_index = new Modal(configuraciones, etiquetas, codigos);
	Modal_index.generahtml();
	Modal_index.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_index_modal
// ID...........: ID_COMERCIOSOLIDARIO_MODAL_MAQUETA
// SE INSERTA EN: #ID_COMERCIOSOLIDARIO_MODAL_X	
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
	var Maqueta_index_modal = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_index_modal.generahtml();
	Maqueta_index_modal.imprimehtml();

// CLASE........: Modal
// INSTANCIA....: Modal_login_opcion
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
	var Modal_login_opcion = new Modal(configuraciones, etiquetas, codigos);
	Modal_login_opcion.generahtml();
	Modal_login_opcion.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_login_modal_opcion
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
	var Maqueta_login_modal_opcion = new Maqueta(configuraciones, etiquetas, codigos, elementos);

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
	var onclickMetodos = ['Modal_login_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Ok_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Modal
// INSTANCIA....: Modal_login
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
	var etiquetas = ["ventana_modal", "ID_COMERCIOSOLIDARIO_MODAL", "#ID_COMERCIOSOLIDARIO_BODY", "#ID_COMERCIOSOLIDARIO_MODAL_TITULO", "#ID_COMERCIOSOLIDARIO_MODAL_AVISO"];
	var codigos = [""];
	var Modal_login = new Modal(configuraciones, etiquetas, codigos);
	Modal_login.generahtml();
	Modal_login.imprimehtml();

// OBJETO 3 Maqueta MAQUETA_COMERCIOSOLIDARIO maqueta principal de 5 posiciones
	
	var inglesIdioma = ["AUTHENTICATION ERROR", "WARNING TEXT", "OK"];
	var espanolIdioma = ["ERROR DE AUTENTIFICACIÓN", "TEXTO AVISO", "ACEPTAR"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 3;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_ventana_modal", "ID_COMERCIOSOLIDARIO_MODAL_MAQUETA", "#ID_COMERCIOSOLIDARIO_MODAL"];
	var codigos = [""];
	var elementosClass = ["titulo_ventana", "area_aviso_modal", "area_button_modal"];
	var elementosId = ["ID_COMERCIOSOLIDARIO_MODAL_TITULO", "ID_COMERCIOSOLIDARIO_MODAL_AVISO", "ID_COMERCIOSOLIDARIO_MODAL_BUTTON"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_login_modal = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_login_modal.generahtml();
	Maqueta_login_modal.imprimehtml();

// ****************************************************************
// VIEW: CLASE PARA IMPORTAR FILE HTML DE PANTALLA ACTUALIZA CAPTURA
// ****************************************************************


	// CLASE........: Load
	// INSTANCIA....: Load_actualiza_captura
	// SE INSERTA EN: #ID_GEN_03	
	// DESCRIPCION..: Inserta codigo HTML puntos_trabajo.html en el area de trabajo
	// IMPRESION....: Despues de ser creado, sustitutivo

	var tipoImpresion = 0;
	var posicionCallback = 0;
//	var metodosCallback01 = ['Metodos_after_pantalla_trabajo.ejecuta()'];
	var metodosCallback01 = [];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var configuraciones = [tipoImpresion, callback];
	var etiquetas = ["../html/actualiza_captura.html", "#ID_GEN_CUERPO"];
	var Load_actualiza_captura = new Load(configuraciones, etiquetas);




















	
















// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE TRES: PROCESOS Y PUENTES CLASES VIEW MODEL

// ****************************************************************
// ****************************************************************
// ****************************************************************



































	Load_actualiza_captura.imprimehtml();	

//	Metodos_prepara_baja.ejecuta();
</script>