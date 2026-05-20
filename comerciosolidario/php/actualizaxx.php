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
		<title>SDHyBC</title>
        <link rel="icon" href="../icons8-favicon.gif" type="image/x-icon">
		<link rel="stylesheet" href="../../pantalib/fontawesome/css/all.css">
		<link rel="stylesheet" href="../../pantalib/css/comerciosolidario.css">
		<link rel="stylesheet" href="../css/comerciosolidario_actualiza.css">
		<script src="../../pantalib/jquery/jquery.js"></script>

		<script src="../../pantalib/javascript/objetos/mvvm/model/System.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/model/Consulta.js"></script>

		<script src="../../pantalib/javascript/objetos/mvvm/view/Maqueta.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Input.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Button.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Link.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Modal.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Panel.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/view/Elemento.js"></script>

		<script src="../../pantalib/javascript/objetos/mvvm/viewmodel/Pantalla.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/viewmodel/Metodos.js"></script>
		<script src="../../pantalib/javascript/objetos/mvvm/viewmodel/Evaluacion.js"></script>
    </head>
    <body class="maqueta_base" id="ID_COMERCIOSOLIDARIO_ACTUALIZA_BODY">
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
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// ESTABLECE PANTALLA

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

	




// OBEJTO 2 Pantalla "COMERCIOSOLIDARIO ACTUALIZA"

	var objetos_pantalla = [];	
	var dimensiones = [];
	var configuraciones = [dimensiones];
	var Pantalla_comerciosolidario_login = new Pantalla(idioma, 1, "actualiza.php", "COMERCIOSOLIDARIO ACTUALIZA CLAVE", "", "", objetos_pantalla, "", Sistema_comerciosolidario, "php/home.php", configuraciones);






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// ESTABLECE MAQUETACIÓN GENERAL

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// SE INSERTA EN: #ID_COMERCIOSOLIDARIO_ACTUALIZA_BODY	
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
	var etiquetas = ["maqueta_01", "ID_GEN_MAQUETA", "#ID_COMERCIOSOLIDARIO_ACTUALIZA_BODY"];
	var codigos = [""];
	var elementosClass = ["area_cuerpo", "modal_oculto", "modal_oculto"];
	var elementosId = ["ID_GEN_CUERPO", "ID_GEN_MODAL", "ID_GEN_MODAL_OPCION"];
	var elementos = [elementosClass, elementosId];
	var maqueta_01 = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	maqueta_01.generahtml();
	maqueta_01.imprimehtml();

// CLASE........: Modal
// INSTANCIA....: Modal_actualiza
// ID...........: ID_COMERCIOSOLIDARIO_MODAL
// SE INSERTA EN: #ID_COMERCIOSOLIDARIO_ACTUALIZA_BODY	
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
	var etiquetas = ["ventana_modal", "ID_COMERCIOSOLIDARIO_MODAL", "#ID_COMERCIOSOLIDARIO_ACTUALIZA_BODY", "#ID_COMERCIOSOLIDARIO_MODAL_TITULO", "#ID_COMERCIOSOLIDARIO_MODAL_AVISO"];
	var codigos = [""];
	var Modal_actualiza = new Modal(configuraciones, etiquetas, codigos);
	Modal_actualiza.generahtml();
	Modal_actualiza.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_actualiza_modal
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
	var etiquetas = ["maqueta_ventana_modal", "ID_COMERCIOSOLIDARIO_MODAL_MAQUETA", "#ID_COMERCIOSOLIDARIO_MODAL"];
	var codigos = [""];
	var elementosClass = ["titulo_ventana", "area_aviso_modal", "area_button_modal"];
	var elementosId = ["ID_COMERCIOSOLIDARIO_MODAL_TITULO", "ID_COMERCIOSOLIDARIO_MODAL_AVISO", "ID_COMERCIOSOLIDARIO_MODAL_BUTTON"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_actualiza_modal = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_actualiza_modal.generahtml();
	Maqueta_actualiza_modal.imprimehtml();

// CLASE........: Modal
// INSTANCIA....: Modal_actualiza_opcion
// ID...........: ID_COMERCIOSOLIDARIO_MODAL_OPCION
// SE INSERTA EN: #ID_COMERCIOSOLIDARIO_ACTUALIZA_BODY	
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
	var etiquetas = ["ventana_modal", "ID_COMERCIOSOLIDARIO_MODAL_OPCION", "#ID_COMERCIOSOLIDARIO_ACTUALIZA_BODY", "#ID_COMERCIOSOLIDARIO_MODAL_OPCION_TITULO", "#ID_COMERCIOSOLIDARIO_MODAL_OPCION_AVISO"];
	var codigos = [""];
	var Modal_actualiza_opcion = new Modal(configuraciones, etiquetas, codigos);
	Modal_actualiza_opcion.generahtml();
	Modal_actualiza_opcion.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_actualiza_modal_opcion
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
	var Maqueta_actualiza_modal_opcion = new Maqueta(configuraciones, etiquetas, codigos, elementos);

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
	var onclickMetodos = ['Modal_actualiza_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Ok_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);






















// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 


// AREA DE TRABAJO


// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 
// %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## // %% // && // ** // ## 






















// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// PANEL DE TRABAJO

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Panel_actualiza
// ID...........: ID_PANEL_ACTUALIZA
// SE INSERTA EN: #ID_TRABAJO_ESCRITORIO	
// DESCRIPCION..: Panel para organizar las sub areas generales de trabajo
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado, sustituye contenido
	
	var tipoImpresion = 0;
	var nivel = [0, 0, 0, 1];
	var configuraciones = [tipoImpresion, nivel];
	var etiquetas = ['maqueta_ventana', 'ID_COMERCIOSOLIDARIO_ACTUALIZA_MAQUETA', '#ID_GEN_CUERPO'];
    var elemento01 = 'ACTUALIZA CLAVE';
    var elemento02_01 = 'NOMBRE:';
    var elemento02_02 = 'xx';
    var elemento02 = [elemento02_01, elemento02_02];
    var elemento03_01 = 'USUARIO:';
    var elemento03_02 = 'xx';
    var elemento03 = [elemento03_01, elemento03_02];
    var elemento04 = 'CONTRASEÑA';
    var elemento05 = 'CONFIRMAR CONTRASEÑA';
    var elemento06_01 = 'ACTUALIZAR';
    var elemento06_02 = 'SALIR';
    var elemento06 = [elemento06_01, elemento06_02];
    var elementos = [elemento01, elemento02, elemento03, elemento04, elemento05, elemento06];
    var codigos = [''];
    var Panel_actualiza = new Panel(configuraciones, etiquetas, codigos, elementos);
    Panel_actualiza.generahtml();
    Panel_actualiza.imprimehtml();






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// AREA DE CAPTURA

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

	





// OBJETO Input ID_ACTUALIZA_PASS input de password
	
	var inglesIdioma = ["PASSWORD", "PASSWORD"];
	var espanolIdioma = ["CONTRASEÑA", "CONTRASEÑA"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 0;
	var tipoInput = "password";
	var dimensionInput = 60;
	var etiquetaInput = 0;
	var configuraciones = [controlIdioma, tipoImpresion, tipoInput, dimensionInput, etiquetaInput];
	var etiquetas = ["login_input", "ID_COMERCIOSOLIDARIO_ACTUALIZA_PASS_INPUT", "#ID_COMERCIOSOLIDARIO_ACTUALIZA_MAQUETA_4", "pass_login"];
	var codigos = [""];
	var valores = ["", ""];
	var metodos = ['onchange="Pass_login.actualizavalor()"'];
	var Pass_login = new Input(configuraciones, etiquetas, codigos, valores, metodos);
	Pass_login.generahtml();
	Pass_login.imprimehtml();

// OBJETO Input ID_COMERCIOSOLIDARIO_ACTUALIZA_CONFIRMA_INPUT input de password de confirmación
	
	var inglesIdioma = ["PASSWORD", "PASSWORD"];
	var espanolIdioma = ["CONFIRMA CONTRASEÑA", "CONFIRMA CONTRASEÑA"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 0;
	var tipoInput = "password";
	var dimensionInput = 60;
	var etiquetaInput = 0;
	var configuraciones = [controlIdioma, tipoImpresion, tipoInput, dimensionInput, etiquetaInput];
	var etiquetas = ["login_input", "ID_COMERCIOSOLIDARIO_ACTUALIZA_CONFIRMA_INPUT", "#ID_COMERCIOSOLIDARIO_ACTUALIZA_MAQUETA_5", "pass_confirma"];
	var codigos = [""];
	var valores = ["", ""];
	var metodos = ['onchange="Pass_login.actualizavalor()"'];
	var Pass_confirma = new Input(configuraciones, etiquetas, codigos, valores, metodos);
	Pass_confirma.generahtml();
	Pass_confirma.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Actualizar_clave
// ID...........: ID_ACTUALIZAR_CLAVE
// SE INSERTA EN: #ID_COMERCIOSOLIDARIO_ACTUALIZA_MAQUETA_6_1	
// DESCRIPCION..: Link con metodos e icono para actualizar registro de usuario
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado sustituye contenidos y se inserta en contenedor oculto
//                la primera vez

	var titulosIngles = ['ACTUALIZAR'];
	var iconosIngles = ['fa-solid fa-floppy-disk'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['ACTUALIZAR'];
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
	var etiquetas = ["boton_link_icono_chico", "ID_ACTUALIZAR_CLAVE", "#ID_COMERCIOSOLIDARIO_ACTUALIZA_MAQUETA_6_1", "actualizar_clave"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_evaluacion_clave_vacia.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Actualizar_clave = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Actualizar_clave.generahtml();
	Actualizar_clave.imprimehtml();

// CLASE........: Elemento
// INSTANCIA....: Salir_actualiza
// ID...........: ID_SALIR_ACTUALIZA
// SE INSERTA EN: #ID_COMERCIOSOLIDARIO_ACTUALIZA_MAQUETA_6_2	
// DESCRIPCION..: Link con metodos e icono para salir de actualizar clave
// HTML.........: Cuando es creado
// IMPRESION....: Cuando es creado sustituye contenidos y se inserta en contenedor oculto
//                la primera vez

	var titulosIngles = ['SALIR'];
	var iconosIngles = ['fa-solid fa-door-open'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['SALIR'];
	var iconosEspanol = ['fa-solid fa-door-open'];
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
	var etiquetas = ["boton_link_icono_chico", "ID_SALIR_ACTUALIZA", "#ID_COMERCIOSOLIDARIO_ACTUALIZA_MAQUETA_6_2", "salir_actualiza"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_salir.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Salir_actualiza = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Salir_actualiza.generahtml();
	Salir_actualiza.imprimehtml();







// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// FUNCIONALIDAD EVALUACIÓN CLAVE VACIA

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_evaluacion_clave_vacia
// DESCRIPCION..: Metodos que se ejecutan para preparar evaluación de clave vacia
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Evaluacion_clave_vacia.recibe_validacion([0, document.getElementById("ID_COMERCIOSOLIDARIO_ACTUALIZA_PASS_INPUT").value])',
	'Evaluacion_clave_vacia.ejecuta()'

	];
	var Metodos_evaluacion_clave_vacia = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_clave_vacia
// DESCRIPCION..: Evalua que clave no este vacia 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_confirma_clave.ejecuta()', 'Metodos_vacia.ejecuta()'];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [0];
	var especialesElementos = [['']];
	var retornoElementos = [[0]];
	var mensajesElementos = [['NOMBRE DE USUARIO VACIO']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_clave_vacia = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_vacia
// DESCRIPCION..: Modal para avisar que la clave esta vacia
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_actualiza_modal_opcion.contenido([0, "CONTRASEÑA VACIA"])',
	'Maqueta_actualiza_modal_opcion.contenido([1, "NO PUEDO ACTUALIZAR UNA CONTRASEÑA VACIA"])',
	'Maqueta_actualiza_modal_opcion.generahtml()',
	'Maqueta_actualiza_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_actualiza_opcion.abrefijo()'
	];
	var Metodos_vacia = new Metodos(configuraciones, codigos, elementos);







// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// FUNCIONALIDAD EVALUACIÓN CONFIRMA CONTRASEÑA

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_confirma_clave
// DESCRIPCION..: Metodos que se ejecutan para preparar evaluación de contraseñas iguales
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

		'Evaluacion_confirma_igualdad.recibe_validacion([0, document.getElementById("ID_COMERCIOSOLIDARIO_ACTUALIZA_PASS_INPUT").value])',
		'Evaluacion_confirma_igualdad.recibe_especial(0, 0, document.getElementById("ID_COMERCIOSOLIDARIO_ACTUALIZA_CONFIRMA_INPUT").value)',
		'Evaluacion_confirma_igualdad.ejecuta()'

	];
	var Metodos_confirma_clave = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_confirma_igualdad
// DESCRIPCION..: Evalua si las claves son iguales 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_no_iguales.ejecuta()', 'Metodos_modal_actualizar_confirma.ejecuta()'];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [1];
	var especialesElementos = [[""]];
	var retornoElementos = [[0]];
	var mensajesElementos = [['CLAVES IGUALES']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_confirma_igualdad = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_no_iguales
// DESCRIPCION..: Modal para avisar que l clave no coincide con la confirmación
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_actualiza_modal_opcion.contenido([0, "CONTRASEÑA SIN CONFIRMAR"])',
	'Maqueta_actualiza_modal_opcion.contenido([1, "NO PUEDO ACTUALIZAR CONTRASEÑA PORQUE NO COINCIDE CON LA CONFIRMACIÓN"])',
	'Maqueta_actualiza_modal_opcion.generahtml()',
	'Maqueta_actualiza_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_actualiza_opcion.abrefijo()'];
	var Metodos_no_iguales = new Metodos(configuraciones, codigos, elementos);







// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// CONFIRMAR CONTRASEÑA

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_modal_actualizar_confirma
// DESCRIPCION..: Modal para confirmar actualizar clave

	var configuraciones = 0;
	var codigos = [''];
	var elementos = ['Maqueta_actualiza_modal_opcion.contenido([0, "CONFIRMA ACTUALIZAR CONTRASEÑA"])',
	'Maqueta_actualiza_modal_opcion.contenido([1, "ESTA SEGURO QUE QUIERE ACTUALIZAR LA CONTRASEÑA DEL USUARIO: "+Consulta_baja_registro.codigos[0][0][1].dato_02+" "+Consulta_baja_registro.codigos[0][0][1].dato_03+" "+Consulta_baja_registro.codigos[0][0][1].dato_04])',
	'Maqueta_actualiza_modal_opcion.generahtml()',
	'Maqueta_actualiza_modal_opcion.imprimehtml()',
	'Si_actualizar_clave_modal.generahtml()',
	'Si_actualizar_clave_modal.imprimehtml()',
	'No_actualizar_clave_modal.generahtml()',
	'No_actualizar_clave_modal.imprimehtml()',
	'Modal_actualiza_opcion.abrefijo()'];
	var Metodos_modal_actualizar_confirma = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Elemento
// INSTANCIA....: Si_actualizar_clave_modal
// ID...........: ID_SI_ACTUALIZA_CLAVE_MODAL
// SE INSERTA EN: #ID_COMERCIOSOLIDARIO_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir si en confirmación de actualizar clave
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
	var etiquetas = ["boton_link_icono_chico", "ID_SI_ACTUALIZA_CLAVE_MODAL", "#ID_COMERCIOSOLIDARIO_MODAL_OPCION_BUTTON", "si_reestablecer_familiar_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_actualiza_opcion.cierra(), Metodos_prepara_actualiza.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Si_actualizar_clave_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

// CLASE........: Elemento
// INSTANCIA....: No_actualizar_clave_modal
// ID...........: ID_NO_ACTUALIZA_CLAVE_MODAL
// SE INSERTA EN: #ID_COMERCIOSOLIDARIO_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir no en confirmación actualizar clave 
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
	var etiquetas = ["boton_link_icono_chico", "ID_NO_ACTUALIZA_CLAVE_MODAL", "#ID_COMERCIOSOLIDARIO_MODAL_OPCION_BUTTON", "no_reestablecer_familiar_modal"];
	var codigos = [''];
	var onclickMetodos = ['Modal_actualiza_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var No_actualizar_clave_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_prepara_actualiza
	// DESCRIPCION..: Metodos que se ejecutan para preparar consulta
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
	'Modal_actualiza.abrefijo()',
	'Consulta_actualiza_clave.actualizafiltro(0, document.getElementById("ID_COMERCIOSOLIDARIO_ACTUALIZA_PASS_INPUT").value)',
	'Consulta_actualiza_clave.actualizafiltro(1, Consulta_baja_registro.codigos[0][0][1].dato_01)',
	'Consulta_actualiza_clave.posicion_callback(0)',
	'Consulta_actualiza_clave.ejecuta()'
	
	];
	var Metodos_prepara_actualiza = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_actualiza
// DESCRIPCION..: Modal para avisar que la clave fue confirmada
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Modal_actualiza.cierra()',
	'Maqueta_actualiza_modal_opcion.contenido([0, "CONTRASEÑA CONFIRMADA"])',
	'Maqueta_actualiza_modal_opcion.contenido([1, "LA CONTRASEÑA DEL USUARIO: "+Consulta_baja_registro.codigos[0][0][1].dato_02+" "+Consulta_baja_registro.codigos[0][0][1].dato_03+" "+Consulta_baja_registro.codigos[0][0][1].dato_04+" FUE CONFIRMADA CORRECTAMENTE"])',
	'Maqueta_actualiza_modal_opcion.generahtml()',
	'Maqueta_actualiza_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_actualiza_opcion.abrefijo()'
	];
	var Metodos_after_actualiza = new Metodos(configuraciones, codigos, elementos);






// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// INSTACIAS Y METODOS FINALES

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_salir
// DESCRIPCION..: Metodos que se ejecutan despues de elegir salir
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
		'window.location.replace("salir.php")'
	
	];
	var Metodos_salir = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_prepara_baja
	// DESCRIPCION..: Metodos que se ejecutan para preparar consulta
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
	'Modal_actualiza.abrefijo()',
	'Consulta_baja_registro.actualizafiltro(0, token)',
	'Consulta_baja_registro.posicion_callback(0)',
	'Consulta_baja_registro.ejecuta()'
	
	];
	var Metodos_prepara_baja = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Metodos
	// INSTANCIA....: Metodos_baja
	// DESCRIPCION..: Metodos que se ejecutan despues de ejecutar consulta de usuario
	
		var configuraciones = 0;
		var codigos = [''];
		var elementos = [
		
			'$("#ID_COMERCIOSOLIDARIO_ACTUALIZA_MAQUETA_2_2").html(Consulta_baja_registro.codigos[0][0][1].dato_02+" "+Consulta_baja_registro.codigos[0][0][1].dato_03+" "+Consulta_baja_registro.codigos[0][0][1].dato_04)',
			'$("#ID_COMERCIOSOLIDARIO_ACTUALIZA_MAQUETA_3_2").html(Consulta_baja_registro.codigos[0][0][1].dato_05)',
			'Modal_actualiza.cierra()'
	
		];
		var Metodos_baja = new Metodos(configuraciones, codigos, elementos);

	Metodos_prepara_baja.ejecuta();

</script>