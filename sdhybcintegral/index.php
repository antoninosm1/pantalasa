<?php
	require_once "../pantalib/php/objetos/new/Sistema.php";
	require_once "../pantalib/php/objetos/new/User.php";
	require_once "../pantalib/php/objetos/new/Log.php";
//	require_once "../pantalib/php/objetos/new/Conexion_sdhybc.php";
	require_once "php/Conexion_sdhybc.php";
	require_once "../pantalib/php/objetos/new/Session.php";
	header('Content-Type: text/html; charset=UTF-8');
	session_start();

// INICIA PROCESO PARA ESTABLECER SISTEMA
	$configuraciones = [10, 'sdhybc', 1, 'http://localhost/pantalasa/sdhybcintegral/', 1];
//	$configuraciones = [10, 'sdhybc', 1, 'https://sdhybc.org/test/integral/', 0];
	$_SESSION['Sistema'] = new Sistema($configuraciones);

// INICIA PROCESO PARA ESTABLECER LOG DE PHP
	$archivo_log = 'karmela.txt';
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
	$_SESSION['bd'] = new Conexion_sdhybc();

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
		<title>SDHyBC</title>
        <link rel="icon" href="icons8-favicon.gif" type="image/x-icon">
		<link rel="stylesheet" href="../pantalib/fontawesome/css/all.css">
		<link rel="stylesheet" href="../pantalib/css/sdhybc.css">
		<script src="../pantalib/jquery/jquery.js"></script>
		<script src="../pantalib/javascript/objetos/new/System.js"></script>
		<script src="../pantalib/javascript/objetos/new/Pantalla.js"></script>
		<script src="../pantalib/javascript/objetos/new/Form.js"></script>
		<script src="../pantalib/javascript/objetos/new/Maqueta.js"></script>
		<script src="../pantalib/javascript/objetos/new/Input.js"></script>
		<script src="../pantalib/javascript/objetos/new/Button.js"></script>
		<script src="../pantalib/javascript/objetos/new/Link.js"></script>
		<script src="../pantalib/javascript/objetos/new/Modal.js"></script>
		<script src="../pantalib/javascript/objetos/new/Elemento.js"></script>
		<script src="../pantalib/javascript/objetos/new/Evaluacion.js"></script>
		<script src="../pantalib/javascript/objetos/new/Metodos.js"></script>
		<script src="../pantalib/javascript/objetos/new/Consulta.js"></script>
		<script src="../pantalib/javascript/objetos/new/Phpmail.js"></script>
		<script src="../pantalib/javascript/objetos/new/Session.js"></script>
    </head>
    <body class="maqueta_base" id="ID_SDHYBC_BODY">
        SDHYBC 
    </body>
</html>
<script>


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
	var scriptPhp = ['php/session_cierra_sdhybc.php', 'php/session_abre_sdhybc.php'];
	var metodoPhp = 'POST';
	var configuraciones = [scarlet, scriptPhp, metodoPhp];
	var codigos = [''];
	var Session_revisa = new Session(configuraciones, codigos);


// ****************************************************************
// ****************************************************************
// ESTABLECE SISTEMA 
// ****************************************************************
// ****************************************************************

// OBEJTO 1 Sistema "sdhybc"

	var Sistema_sdhybc = new System(sistema_id, sistema_tech_name, 'SDHYBC', 'SECRETARÍA DE DESARROLLO HUMANO Y BIENESTAR COMUNITARIO', '');

// ****************************************************************
// ****************************************************************
// ESTABLECE PANTALLA
// ****************************************************************
// ****************************************************************

// OBEJTO 2 Pantalla "SDHYBC LOGIN"

	var objetos_pantalla = [];	
	var dimensiones = [];
	var configuraciones = [dimensiones];
	var Pantalla_sdhybc_login = new Pantalla(idioma, 1, "index.php", "SDHYBC LOGIN", "", "", objetos_pantalla, "", Sistema_sdhybc, "php/home.php", configuraciones);





	



// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// SE INSERTA EN: #ID_SDHYBC_BODY	
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
	var etiquetas = ["maqueta_01", "ID_GEN_MAQUETA", "#ID_SDHYBC_BODY"];
	var codigos = [""];
	var elementosClass = ["area_cuerpo", "modal_oculto", "modal_oculto"];
	var elementosId = ["ID_GEN_CUERPO", "ID_GEN_MODAL", "ID_GEN_MODAL_OPCION"];
	var elementos = [elementosClass, elementosId];
	var maqueta_01 = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	maqueta_01.generahtml();
	maqueta_01.imprimehtml();

// CLASE........: Modal
// INSTANCIA....: Modal_index
// ID...........: ID_SDHYBC_MODAL_X
// SE INSERTA EN: #ID_SDHYBC_BODY	
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
	var etiquetas = ["ventana_modal", "ID_SDHYBC_MODAL_X", "#ID_SDHYBC_BODY", "#ID_SDHYBC_MODAL_TITULO_X", "#ID_SDHYBC_MODAL_AVISO_X"];
	var codigos = [""];
	var Modal_index = new Modal(configuraciones, etiquetas, codigos);
	Modal_index.generahtml();
	Modal_index.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_index_modal
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
	var etiquetas = ["maqueta_ventana_modal", "ID_SDHYBC_MODAL_MAQUETA_X", "#ID_SDHYBC_MODAL_X"];
	var codigos = [""];
	var elementosClass = ["titulo_ventana", "area_aviso_modal", "area_button_modal"];
	var elementosId = ["ID_SDHYBC_MODAL_TITULO_X", "ID_SDHYBC_MODAL_AVISO_X", "ID_SDHYBC_MODAL_BUTTON_X"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_index_modal = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_index_modal.generahtml();
	Maqueta_index_modal.imprimehtml();

// CLASE........: Modal
// INSTANCIA....: Modal_login_opcion
// ID...........: ID_SDHYBC_MODAL_OPCION
// SE INSERTA EN: #ID_SDHYBC_BODY	
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
	var etiquetas = ["ventana_modal", "ID_SDHYBC_MODAL_OPCION", "#ID_SDHYBC_BODY", "#ID_SDHYBC_MODAL_OPCION_TITULO", "#ID_SDHYBC_MODAL_OPCION_AVISO"];
	var codigos = [""];
	var Modal_login_opcion = new Modal(configuraciones, etiquetas, codigos);
	Modal_login_opcion.generahtml();
	Modal_login_opcion.imprimehtml();

// CLASE........: Maqueta
// INSTANCIA....: Maqueta_login_modal_opcion
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
	var Maqueta_login_modal_opcion = new Maqueta(configuraciones, etiquetas, codigos, elementos);

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
	var onclickMetodos = ['Modal_login_opcion.cierra()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Ok_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);





	



// ****************************************************************
// ****************************************************************
// FORMULARIO
// FORMULARIO
// FORMULARIO
// FORMULARIO
// FORMULARIO
// FORMULARIO
// FORMULARIO
// FORMULARIO
// ****************************************************************
// ****************************************************************

// OBEJTO 3 Form ID_FORMULARIO_LOGIN para establecer variables para la validación
// y envio de formulario, se inserta en ID_SDHYBC_BODY

	var inglesIdioma = ["", "", "DATA IS MANDATORY", "DATA ARE MANDATORY", "OK", "INCORRECT DATA", "CAPTURE ERROR", "AUTHENTIFICATION ERROR", "CORRECT DATA", "COUNT DONT CONFIRM", "DEACTIVATE COUNT"];
	var espanolIdioma = ["EL DATO", "LOS DATOS", "ES OBLIGATORIO", "SON OBLIGATORIOS", "ACEPTAR", "DATOS INCORRECTOS", "ERROR DE CAPTURA", "ERROR DE AUTENTIFICACIÓN", "DATOS CORRECTOS", "CUENTA NO CONFIRMADA", "CUENTA INACTIVA"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 2;
	var tipoImpresion = 0;
	var actionFormulario = "php/consulta_login.php";
	var metodoFormulario = "POST";
	var validaFormulario = [0, 1];
	var modalFormulario = "";
//	var funcionesConsultaNoValida = ['Pass_login.inicializavalor()', 'Pass_login.imprimevalor()'];
	var funcionesConsultaNoValida = ['Pass_login.inicializavalor()', 'Pass_login.imprimevalor()', 'Session_revisa.cierra()'];
	var funcionesConsultaValida = ['Session_revisa.abre()', 'Pantalla_sdhybc_login.navega()'];
	var funcionesCuentaNoActiva = ['Pass_login.inicializavalor()', 'Pass_login.imprimevalor()', 'Session_revisa.cierra()'];
	var funcionesFormulario = [funcionesConsultaNoValida, funcionesConsultaValida, funcionesCuentaNoActiva];
	var salida = 'php/salida.php';
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, actionFormulario, metodoFormulario, validaFormulario, modalFormulario, funcionesFormulario, salida];
	var etiquetas = ["formulario_login", "ID_SDHYBC_LOGIN_FORMULARIO", "#ID_GEN_CUERPO"];
	var codigosHtml = "";
	var codigosMensaje = "";
	var codigos = [codigosHtml, codigosMensaje];
	var elementosObjetos = [];
	var elementosObligatorios = [1, 1];
	var elementosErrores = [[0, 1], [0, 1]];
	var elementos = [elementosObjetos, elementosObligatorios, elementosErrores];
	var Formulario_login = new Form(configuraciones, etiquetas, codigos, elementos);
	Formulario_login.generahtml();
	Formulario_login.imprimehtml();
	Pantalla_sdhybc_login.objetos.push(Formulario_login);

// ****************************************************************
// ****************************************************************
// MAQUETA PRINCIPAL
// ****************************************************************
// ****************************************************************

// OBJETO 3 Maqueta MAQUETA_SDHYBC maqueta principal de 5 posiciones
	
    var inglesIdioma = ["LOGIN", "USER", "PASS", "BUTTON", "HELP"];
	var espanolIdioma = ["LOGIN", "USUARIO", "CONTRASEÑA", "ACCEDER", ""];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 5;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_ventana", "ID_SDHYBC_LOGIN_MAQUETA", "#ID_SDHYBC_LOGIN_FORMULARIO"];
	var codigos = [""];
	var elementosClass = ["titulo_ventana", "area_input", "area_input", "area_input", "area_link"];
	var elementosId = ["ID_SDHYBC_LOGIN_TITULO", "ID_SDHYBC_LOGIN_USER", "ID_SDHYBC_LOGIN_PASS", "ID_SDHYBC_LOGIN_BUTTON", "ID_SDHYBC_LOGIN_HELP"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_login = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_login.generahtml();
	Maqueta_login.imprimehtml();
	Pantalla_sdhybc_login.objetos.push(Maqueta_login);

// OBJETO 4 Input ID_LOGIN_USER input de usuario

	var inglesIdioma = ["USER", "USER"];
	var espanolIdioma = ["USUARIO", "USUARIO"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 0;
	var tipoInput = "text";
	var dimensionInput = 60;
	var etiquetaInput = 0;
	var configuraciones = [controlIdioma, tipoImpresion, tipoInput, dimensionInput, etiquetaInput];
	var etiquetas = ["login_input", "ID_SDHYBC_LOGIN_USER_INPUT", "#ID_SDHYBC_LOGIN_USER", "user_login"];
	var codigos = [""];
	var valores = ["", ""];
	var metodos = ['onchange="User_login.actualizavalor()"'];
	var User_login = new Input(configuraciones, etiquetas, codigos, valores, metodos);
	User_login.generahtml();
	User_login.imprimehtml();
	Pantalla_sdhybc_login.objetos.push(User_login);
	Formulario_login.elementos[0].push(User_login);

// OBJETO 5 Input ID_LOGIN_PASS input de password
	
	var inglesIdioma = ["PASSWORD", "PASSWORD"];
	var espanolIdioma = ["CONTRASEÑA", "CONTRASEÑA"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 0;
	var tipoInput = "password";
	var dimensionInput = 60;
	var etiquetaInput = 0;
	var configuraciones = [controlIdioma, tipoImpresion, tipoInput, dimensionInput, etiquetaInput];
	var etiquetas = ["login_input", "ID_SDHYBC_LOGIN_PASS_INPUT", "#ID_SDHYBC_LOGIN_PASS", "pass_login"];
	var codigos = [""];
	var valores = ["", ""];
	var metodos = ['onchange="Pass_login.actualizavalor()"'];
	var Pass_login = new Input(configuraciones, etiquetas, codigos, valores, metodos);
	Pass_login.generahtml();
	Pass_login.imprimehtml();
	Pantalla_sdhybc_login.objetos.push(Pass_login);
	Formulario_login.elementos[0].push(Pass_login);

// OBJETO 5 Input ID_LOGIN_PASS input de password
	
	var inglesIdioma = ["ACCES"];
	var espanolIdioma = ["ACCEDER"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 0;
	var etiquetaInput = 0;
	var configuraciones = [controlIdioma, tipoImpresion, etiquetaInput];
	var etiquetas = ["login_input login_button", "ID_SDHYBC_LOGIN_BUTTON_INPUT", "#ID_SDHYBC_LOGIN_BUTTON", "button_login"];
	var codigos = [""];
	var metodos = [' ONCLICK="Formulario_login.valida(), Formulario_login.envia_status()"'];
	var Button_login = new Button(configuraciones, etiquetas, codigos, metodos);
	Button_login.generahtml();
	Button_login.imprimehtml();
	Pantalla_sdhybc_login.objetos.push(Button_login);

	




    

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE EVALUAR VACIO

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Key_modal
// ID...........: ID_KEY_MODAL
// SE INSERTA EN: #ID_SDHYBC_MODAL_OPCION_BUTTON	
// DESCRIPCION..: Link con metodos e icono para elegir recuperar contraseña
// HTML.........: Al inicio
// IMPRESION....: Al inicio, sustituye contenido

	var titulosIngles = ['RECUPERAR CONTRASEÑA'];
	var iconosIngles = ['fa-solid fa-key'];
	var enlacesIngles = ['javascript:void(0)'];
	var inglesIdioma = [titulosIngles, iconosIngles, enlacesIngles];
	var titulosEspanol = ['RECUPERAR CONTRASEÑA'];
	var iconosEspanol = ['fa-solid fa-key'];
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
	var etiquetas = ["boton_link_icono_chico", "ID_KEY_MODAL", "#ID_SDHYBC_LOGIN_HELP", "key_modal"];
	var codigos = [''];
	var onclickMetodos = ['Metodos_evalua_correo.ejecuta()'];
	var onchangeMetodos = [];
	var metodos = [onclickMetodos, onchangeMetodos];
	var Key_modal = new Elemento(configuraciones, etiquetas, codigos, metodos);
	Key_modal.generahtml();
	Key_modal.imprimehtml();

// CLASE........: Metodos
// INSTANCIA....: Metodos_evalua_correo
// DESCRIPCION..: Metodos que se ejecutan para preparar validación de correo vacio
//                para recuperar contraseña

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Evaluacion_correo_recupera.recibe_validacion([0, document.getElementById("ID_SDHYBC_LOGIN_USER_INPUT").value])',
	'Evaluacion_correo_recupera.ejecuta()'];
	var Metodos_evalua_correo = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_correo_recupera
// DESCRIPCION..: Evalua que correo no este vacio para recuperar contraseña

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_after_evaluar_vacio.ejecuta()', 'Metodos_modal_correo_vacio.ejecuta()'];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [0];
	var especialesElementos = [['']];
	var retornoElementos = [[0]];
	var mensajesElementos = [['USUARIO VACIO']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_correo_recupera = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_correo_vacio
// DESCRIPCION..: Modal para avisar que se intento grabar un usuario sin nombre
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_login_modal_opcion.contenido([0, "USUARIO VACIO"])',
	'Maqueta_login_modal_opcion.contenido([1, "PARA RECUPERAR CONTRASEÑA INGRESA TU CORREO VALIDO EN USUARIO"])',
	'Maqueta_login_modal_opcion.generahtml()',
	'Maqueta_login_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_login_opcion.abrefijo()'];
	var Metodos_modal_correo_vacio = new Metodos(configuraciones, codigos, elementos);

	




    

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE EVALUAR CORREO ACTIVO

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_after_evaluar_vacio
// DESCRIPCION..: Metodos que se ejecutan para preparar validación de correo activo
//                para recuperar contraseña

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Modal_index.abrefijo()',	
	'Consulta_correo_activo.actualizafiltro(0, document.getElementById("ID_SDHYBC_LOGIN_USER_INPUT").value)',
	'Consulta_correo_activo.posicion_callback(0)',
	'Consulta_correo_activo.ejecuta()'
	];
	var Metodos_after_evaluar_vacio = new Metodos(configuraciones, codigos, elementos);

	// CLASE........: Consulta
	// INSTANCIA....: Consulta_correo_activo
	// DESCRIPCION..: Consulta que se ejecuta para inspeciionar si existe correo
	
	var statusConsulta = 0;
	var scriptPhp = 'php/consulta_correo_activo.php';
	var metodoPhp = 'POST';
	var filtro = [''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_correo_activo.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_correo_activo = new Consulta(configuraciones, codigos, elementos);
	
// CLASE........: Metodos
// INSTANCIA....: Metodos_after_correo_activo
// DESCRIPCION..: Metodos que se ejecutan para evaluar regreso de correo activo
//                para recuperar contraseña

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Modal_index.cierra()',	
	'Evaluacion_correo_activo.recibe_validacion([0, Consulta_correo_activo.codigos[0][0][0].registros])',
	'Evaluacion_correo_activo.ejecuta()'
	];
	var Metodos_after_correo_activo = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_correo_activo
// DESCRIPCION..: Evalua que correo el correo existe en la BD despues de consulta

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_prepara_envio.ejecuta()', 'Metodos_modal_correo_no_activo.ejecuta()'];
	var cadenaErroresStatus = '';
	var arregloStatus = [0, erroresStatus, textosErroresStatus, metodosStatus, cadenaErroresStatus];
	var configuraciones = [numeroElementos, arregloStatus];
	var valoresElementos = [''];
	var tiposElementos = [0];
	var validacionElementos = [0];
	var especialesElementos = [['']];
	var retornoElementos = [[0]];
	var mensajesElementos = [['CORREO NO ACTIVO']];
	var elementos = [valoresElementos, tiposElementos, validacionElementos, especialesElementos, retornoElementos, mensajesElementos];
	var Evaluacion_correo_activo = new Evaluacion(configuraciones, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_correo_no_activo
// DESCRIPCION..: Modal para avisar que no existe correo en la BD
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Maqueta_login_modal_opcion.contenido([0, "CUENTA NO EXISTE"])',
	'Maqueta_login_modal_opcion.contenido([1, "NO EXISTE UNA CUENTA CON EL CORREO: "+document.getElementById("ID_SDHYBC_LOGIN_USER_INPUT").value])',
	'Maqueta_login_modal_opcion.generahtml()',
	'Maqueta_login_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_login_opcion.abrefijo()'];
	var Metodos_modal_correo_no_activo = new Metodos(configuraciones, codigos, elementos);

	




    

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************

// BLOQUE ENVIAR CORREO

// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
// ****************************************************************
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
// INSTANCIA....: Metodos_prepara_envio
// DESCRIPCION..: Metodos que se ejecutan para preparar envio de correo
//                para recuperar contraseña

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
	'Modal_index.abrefijo()',	
	'Phpmail_graba.recibe_parametro(0, document.getElementById("ID_SDHYBC_LOGIN_USER_INPUT").value)',
	'Phpmail_graba.recibe_parametro(1, ruta)',
	'Phpmail_graba.posicion_callback(0)',
	'Phpmail_graba.ejecuta()'	
	
	];
	var Metodos_prepara_envio = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Phpmail
// INSTANCIA....: Phpmail_graba
// DESCRIPCION..: Mail para confirmar correo electronico
	
	var statusMail = 0;
	var scriptPhp = 'php/enviar_mail_usuario.php';
	var metodoPhp = 'POST';
	var parametros = [''];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_after_mail.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var codigos = [''];
	var configuraciones = [statusMail, scriptPhp, metodoPhp, parametros, callback, codigos];
	var Phpmail_graba = new Phpmail(configuraciones, codigos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_after_mail
// DESCRIPCION..: Metodos que se ejecutan despues de enviar mail

	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
		
	'Modal_index.cierra()',	
	'Evaluacion_after_mail.recibe_validacion([0, Phpmail_graba.configuraciones[0]])',
	'Evaluacion_after_mail.ejecuta()'

	];
	var Metodos_after_mail = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Evaluacion
// INSTANCIA....: Evaluacion_after_mail
// DESCRIPCION..: Evalua el resultado del envio 

	var numeroElementos = 1;
	var erroresStatus = [];
	var textosErroresStatus = [];
	var metodosStatus = ['Metodos_prepara_grabar_token.ejecuta()', 'Metodos_modal_correo_invalido.ejecuta()'];
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
	'Maqueta_login_modal_opcion.contenido([0, "CORREO INVALIDO"])',
	'Maqueta_login_modal_opcion.contenido([1, "NO PUEDO ACTUALIZAR USUARIO PORQUÉ EL CORREO: "+document.getElementById("ID_SDHYBC_LOGIN_USER_INPUT").value+" ES INVALIDO."])',
	'Maqueta_login_modal_opcion.generahtml()',
	'Maqueta_login_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_login_opcion.abrefijo()'];
	var Metodos_modal_correo_invalido = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_prepara_grabar_token
// DESCRIPCION..: Metodos que se ejecutan para preparar grabar token
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [

	'Modal_index.abrefijo()',	
	'Consulta_actualizar_token.actualizafiltro(0, Consulta_correo_activo.codigos[0][0][1].dato_01)',
	'Consulta_actualizar_token.actualizafiltro(1, Phpmail_graba.codigos[0][0].token)',
	'Consulta_actualizar_token.actualizafiltro(2, Phpmail_graba.codigos[0][0].expira)',
	'Consulta_actualizar_token.posicion_callback(0)',
	'Consulta_actualizar_token.ejecuta()'

	];
	
	var Metodos_prepara_grabar_token = new Metodos(configuraciones, codigos, elementos);

// CLASE........: Consulta
// INSTANCIA....: Consulta_actualizar_token
// DESCRIPCION..: Consulta que se ejecuta para grabar token

	var statusConsulta = 0;
	var scriptPhp = 'php/consulta_grabar_token.php';
	var metodoPhp = 'POST';
	var filtro = ['0', '1',	'2'];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_modal_token.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [statusConsulta, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_actualizar_token = new Consulta(configuraciones, codigos, elementos);

// CLASE........: Metodos
// INSTANCIA....: Metodos_modal_token
// DESCRIPCION..: Modal para avisar que un correo fuen enviado para recuperar contraseña
	
	var configuraciones = 0;
	var codigos = [''];
	var elementos = [
	'Modal_index.cierra()',	
	'Maqueta_login_modal_opcion.contenido([0, "CORREO ENVIADO"])',
	'Maqueta_login_modal_opcion.contenido([1, "UN CORREO FUE ENVIADO A: "+document.getElementById("ID_SDHYBC_LOGIN_USER_INPUT").value+" CON UN ENLACE PARA RECUPERAR CONTRASEÑA."])',
	'Maqueta_login_modal_opcion.generahtml()',
	'Maqueta_login_modal_opcion.imprimehtml()',
	'Ok_modal.generahtml()',
	'Ok_modal.imprimehtml()',
	'Modal_login_opcion.abrefijo()'];
	var Metodos_modal_token = new Metodos(configuraciones, codigos, elementos);

	// OBJETO 7 Modal ID_SDHYBC_MODAL ventana modal de esta pantalla

	var inglesIdioma = [""];
	var espanolIdioma = [""];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 1;
	var botonCerrar = "";
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, botonCerrar];
	var etiquetas = ["ventana_modal", "ID_SDHYBC_MODAL", "#ID_SDHYBC_BODY", "#ID_SDHYBC_MODAL_TITULO", "#ID_SDHYBC_MODAL_AVISO"];
	var codigos = [""];
	var Modal_login = new Modal(configuraciones, etiquetas, codigos);
	Modal_login.generahtml();
	Modal_login.imprimehtml();
	Pantalla_sdhybc_login.objetos.push(Modal_login);
	Formulario_login.configuraciones[6] = Modal_login;

// OBJETO 3 Maqueta MAQUETA_SDHYBC maqueta principal de 5 posiciones
	
	var inglesIdioma = ["AUTHENTICATION ERROR", "WARNING TEXT", "OK"];
	var espanolIdioma = ["ERROR DE AUTENTIFICACIÓN", "TEXTO AVISO", "ACEPTAR"];
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
	var Maqueta_login_modal = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_login_modal.generahtml();
	Maqueta_login_modal.imprimehtml();
	Pantalla_sdhybc_login.objetos.push(Maqueta_login_modal);

// OBJETO 5 Input ID_LOGIN_PASS input de password
	
	var inglesIdioma = ["ACEPT"];
	var espanolIdioma = ["ACEPTAR"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 0;
	var etiquetaInput = 0;
	var configuraciones = [controlIdioma, tipoImpresion, etiquetaInput];
	var etiquetas = ["login_input login_button", "ID_SDHYBC_MODAL_BUTTON_INPUT", "#ID_SDHYBC_MODAL_BUTTON", "button_modal"];
	var codigos = [""];
	var metodos = ['onclick="Modal_login.cierra()"'];
	var Button_login_modal = new Button(configuraciones, etiquetas, codigos, metodos);
	Button_login_modal.generahtml();
	Button_login_modal.imprimehtml();
	Pantalla_sdhybc_login.objetos.push(Button_login_modal);
	Modal_login.configuraciones[3] = Button_login_modal;
//	alert('ESTOY VIVO AL TERMINAR JS');

</script>