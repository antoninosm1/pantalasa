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
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS resume.php';
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
		<link rel="stylesheet" href="../../pantalib/css/sdhybc.css">
		<link rel="stylesheet" href="../css/sdhybc_resume.css">
		<script src="../../pantalib/jquery/jquery.js"></script>
		<script src="../../pantalib/javascript/objetos/new/System.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Pantalla.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Maqueta.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Html.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Select.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Metodos.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Radio.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Panel.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Datos.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Consulta.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Menu.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Modal.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Button.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Toggle.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Link.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Arreglo.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Session.js"></script>
    </head>
    <body class="maqueta_base" id="ID_SDHYBC_RESUME_BODY">
        RESUME SDHYBC 
    </body>
</html>
<script>




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

	var idCode = 7;
	var statusSessiono = [1, 2, 3, 4];
	var statusCheck = 1;
	var scarlet = [idCode, statusSessiono, statusCheck, usuarioStatus];
	var scriptPhp = ['session_cierra_sdhybc.php', 'session_abre_sdhybc.php'];
	var metodoPhp = 'POST';
	var configuraciones = [scarlet, scriptPhp, metodoPhp];
	var codigos = [''];
	var Session_revisa = new Session(configuraciones, codigos);

	Session_revisa.revisa(usuarioID, session, 'salida.php');


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

// OBEJTO 2 Pantalla "SDHYBC RESUME"

	var objetos_pantalla = [];
	var dimensiones = [];
	var configuraciones = [dimensiones];
	var Pantalla_sdhybc_resume = new Pantalla(idioma, 7, "resume.php", "SDHYBC RESUME", "", "", objetos_pantalla, "", Sistema_sdhybc, "../index.php", configuraciones);

// ****************************************************************
// ****************************************************************
// ESTABLECE INSTANCIAS GENERALES DE TRABAJO
// ****************************************************************
// ****************************************************************

// CLASE........: Arreglo
// INSTANCIA....: Arreglo_resume
// DESCRIPCION..: Objeto que se utiliza para dictar arreglos grandes

	var numeroElementos = 0;
	var configuraciones = [numeroElementos];
	var elementos = [];
	var codigos = ['']
	var Arreglo_resume = new Arreglo(configuraciones, elementos, codigos);

// ****************************************************************
// ****************************************************************
// MAQUETA PRINCIPAL
// ****************************************************************
// ****************************************************************

// OBJETO Maqueta ID_GEN_MAQUETA maqueta principal de 4 posiciones
// LAS POSICIONES SON:
// ID_GEN_STATUS
// ID_GEN_CABEZA
// ID_GEN_CUERPO
// ID_GEN_PIE
// SE INSERTA EN: #ID_SDHYBC_RESUME_BODY	
	var inglesIdioma = ["STATUS", "HEAD", "BODY", "", "MODAL"];
	var espanolIdioma = ["ESTADO", "CABEZA", "CUERPO", "", "MODAL"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 5;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_01", "ID_GEN_MAQUETA", "#ID_SDHYBC_RESUME_BODY"];
	var codigos = [""];
	var elementosClass = ["area_cinta", "area_cabeza", "area_cuerpo", "area_pie", "modal_oculto"];
	var elementosId = ["ID_GEN_STATUS", "ID_GEN_CABEZA", "ID_GEN_CUERPO", "ID_GEN_PIE", "ID_GEN_MODAL"];
	var elementos = [elementosClass, elementosId];
	var maqueta_01 = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	maqueta_01.generahtml();
	maqueta_01.imprimehtml();

// OBJETO Maqueta ID_GEN_STATUS_MAQUETA maqueta de area de Status de 3 posiciones
// para organizar la barra de Status
// LAS POSICIONES SON:
// ID_GEN_STATUS_NAME
// ID_GEN_STATUS_AVISO
// ID_GEN_STATUS_USER
// SE INSERTA EN: #ID_GEN_STATUS	
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

// OBJETO x Html ID_GEN_MAQUETA_USER HTML DIRECTO PARA PRINTAR EL USUARIO

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

// OBJETO Maqueta ID_GEN_CABEZA_MAQUETA maqueta de area de Cabecera de 4 posiciones
// para organizar la cabecera
// LAS POSICIONES SON:
// ID_GEN_CABEZA_TITULO
// ID_GEN_CABEZA_MENUIZQ
// ID_GEN_CABEZA_MENUCENTRO
// ID_GEN_CABEZA_MENUDER
// SE INSERTA EN: #ID_GEN_CABEZA	
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

// OBJETO Menu MENU IZQUIERDA
	
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
	var etiquetas = ["menu_elementos", "ID_GEN_CABEZA_MENUIZQ_ELEMENTOS", "#ID_GEN_CABEZA_MENUIZQ"];
	var codigosHtml = "";
	var codigos = [codigosHtml];
	var elementosClass = ["boton_menu_cuadro"];
	var elementosId = ["ID_GEN_CABEZA_MENUIZQ_ELEMENTOS_01"];
	var elementosIcono = [1];
	var elementosOrdenIcono = [0];
	var elementosMetodos = [[['ONCLICK'], ['window.location.replace(`home.php`)']]];
	var elementos = [elementosClass, elementosId, elementosIcono, elementosOrdenIcono, elementosMetodos];
	var Menu_izquierda = new Menu(configuraciones, etiquetas, codigos, elementos);
	Menu_izquierda.generahtml();
	Menu_izquierda.imprimehtml();

// OBJETO Menu MENU CENTRAL
	
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

// OBJETO Menu MENU IZQUIERDA
	
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

// OBJETO Maqueta ID_GEN_CUERPO_MAQUETA maqueta de area Principal o cuerpo de 3 posiciones
// para organizar el area principal de la pantalla
// LAS POSICIONES SON:
// ID_GEN_CUERPO_IZQ
// ID_GEN_CUERPO_CENTRO
// ID_GEN_CUERPO_PIE
// SE INSERTA EN: #ID_GEN_CUERPO	
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

// OBJETO Maqueta ID_TRABAJO maqueta de area Principal o cuerpo de 3 posiciones
// para organizar el area principal de la pantalla
// LAS POSICIONES SON:
// ID_TRABAJO_CABEZA
// ID_TRABAJO_ESCRITORIO
// ID_TRABAJO_PIE
// SE INSERTA EN: #ID_GEN_CUERPO_CENTRO	
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

// OBJETO Maqueta ID_TRABAJO_CABEZA_MAQUETA maqueta de area de Cabecera del area de Trabajo de 4 posiciones
// para organizar el area de cabecera del area de trabajo, el titulo, los municipios, localidades y cedulas
// LAS POSICIONES SON:
// ID_TRABAJO_CABEZA_TITULO
// ID_TRABAJO_CABEZA_MUNICIPIOS
// ID_TRABAJO_CABEZA_LOCALIDADES
// ID_TRABAJO_CABEZA_DATOS
// SE INSERTA EN: #ID_TRABAJO_CABEZA	
	var inglesIdioma = ["RESUMEN DE REGISTROS", "MUNICIPIOS", "LOCALIDAD", "RESUMEN"];
	var espanolIdioma = ["RESUMEN DE REGISTROS", "MUNICIPIOS", "LOCALIDAD", "RESUMEN"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 4;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["area_cabeza", "ID_TRABAJO_CABEZA_MAQUETA", "#ID_TRABAJO_CABEZA"];
	var codigos = [""];
	var elementosClass = ["area_titulo_pantalla", "control_normal", "control_normal", "control_normal"];
	var elementosId = ["ID_TRABAJO_CABEZA_TITULO", "ID_TRABAJO_CABEZA_MUNICIPIOS", "ID_TRABAJO_CABEZA_LOCALIDADES", "ID_TRABAJO_CABEZA_RESUMEN"];
	var elementos = [elementosClass, elementosId];
	var Maqueta_cuerpo_cabeza = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_cuerpo_cabeza.generahtml();
	Maqueta_cuerpo_cabeza.imprimehtml();

// OBJETO 3 Select ID_MUNICIPIOS_SELECT

	var inglesElementos = ['ELEMENT 1', 'ELEMENT 2', 'ELEMENT 3'];
	var inglesIdioma = ['MUNICIPIO:', 'TODOS LOS MUNICIPIOS', inglesElementos, 'PRUEBA RENGLON 2', 'PRUEBA RENGLON 3'];
	var espanolElementos = ['ELEMENTO 1', 'ELEMENTO 2', 'ELEMENTO 3', 'PRUEBA RENGLON 3', 'PRUEBA RENGLON 3'];
	var espanolIdioma = ['MUNICIPIO:', 'TODOS LOS MUNICIPIOS', espanolElementos, 'PRUEBA RENGLON 2', 'PRUEBA RENGLON 3'];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 3;
	var tipoImpresion = 0;
	var tipoSelect = 0;
	var etiquetaSelect = 1;
	var datosSelect = 1;
	var consultaPhp = 'select_municipios_cedulas.php';
	var metodoPhp = 'POST';
	var valorArreglo = [[0], [0]];
	var datoArreglo = [[0, 1, 0], [1, ' ', 0]];
	var codificado = 0;
	var consulta = [consultaPhp, metodoPhp, valorArreglo, datoArreglo, codificado];
	var filtro = [0, [''], 0];
	var renglon01 = ['TODOS_REGISTROS', 1];
	var elementosEspeciales = [renglon01];
	var size = 0;
	var status_x = 0;

	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_cambia_municipio.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];

	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, tipoSelect, etiquetaSelect, datosSelect, consulta, filtro, elementosEspeciales, size, status_x, callback];
	var etiquetas = ['select_lista_desplegable', 'ID_MUNICIPIOS_SELECT', '#ID_TRABAJO_CABEZA_MUNICIPIOS', 'select_municipios'];
	var codigos = [''];
	var elementosValor = ['', ''];
	var elementos = [elementosValor];
	var valores = ['TODOS_REGISTROS', 'TODOS_REGISTROS', ''];
	var metodos = [' ONCHANGE="Select_municipios.actualizavalor(), Metodos_cambia_municipio.ejecuta()"'];
	var Select_municipios = new Select(configuraciones, etiquetas, codigos, elementos, valores, metodos);
	Select_municipios.generahtml();

// OBJETO Metodos
	var numeroConsultas = 5;
	var configiraciones = numeroConsultas;
	var codigos = [''];
	var elementos = ['Select_localidades.inicializa_valor()', 'Select_localidades.recibefiltro([0], [Select_municipios.valores[1]], Select_municipios.valores[1])', 'Consulta_descarga.actualizafiltro(0, Select_municipios.valores[1])', 'Consulta_descarga.actualizafiltro(1, Select_localidades.recorta_filtro([[["TODOS_REGISTROS_L", 0, "", 0, 0] ], 2, 1, 2]))', 'Select_localidades.generahtml()']
	var Metodos_cambia_municipio = new Metodos(configuraciones, codigos, elementos);

// OBJETO Select ID_LOCALIDADES_SELECT

	var inglesElementos = ['ELEMENT 1', 'ELEMENT 2', 'ELEMENT 3', 'ELEMENT 4'];
	var inglesIdioma = ['LOCALIDAD:', 'TODAS LAS LOCALIDADES', inglesElementos, 'PRUEBA RENGLON 2', 'PRUEBA RENGLON 2'];
	var espanolElementos = ['ELEMENTO 1', 'ELEMENTO 2'];
	var espanolIdioma = ['LOCALIDAD:', 'TODAS LAS LOCALIDADES', espanolElementos, 'PRUEBA RENGLON 2', 'PRUEBA RENGLON 2'];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 2;
	var tipoImpresion = 0;
	var tipoSelect = 0;
	var etiquetaSelect = 1;
	var datosSelect = 1;
	var consultaPhp = 'select_localidades_cedulas.php';
	var metodoPhp = 'POST';
	var valorArreglo = [[0, 0], [0, 1]];
//	var datoArreglo = [[0, 1, 0, 1, 0, 1, 0], [0, ' ', 1, ' ', 2, ' ', 3]];
	var datoArreglo = [[0, 1, 0], [0, ' ', 1]];
	var codificado = 1;
	var consulta = [consultaPhp, metodoPhp, valorArreglo, datoArreglo, codificado];
	var filtro = [1, [Select_municipios.valores[1]], 0];
	var renglon01 = ['TODOS_REGISTROS_L', 1];
	var elementosEspeciales = [renglon01];
	var size = 6;
	var status_x = 0;
	
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_cambia_localidad.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, tipoSelect, etiquetaSelect, datosSelect, consulta, filtro, elementosEspeciales, size, status_x, callback];
	var etiquetas = ['select_lista_desplegable', 'ID_LOCALIDADES_SELECT', '#ID_TRABAJO_CABEZA_LOCALIDADES', 'select_localidades'];
	var codigos = [''];
	var elementosValor = ['', '', ''];
	var elementos = [elementosValor];
	var valores = ['TODOS_REGISTROS_L', 'TODOS_REGISTROS_L', 'TODOS_REGISTROS'];
	var metodos = [' ONCHANGE="Select_localidades.actualizavalor(), Metodos_cambia_localidad.ejecuta()"'];
	var Select_localidades = new Select(configuraciones, etiquetas, codigos, elementos, valores, metodos);

// OBJETO Metodos
	var numeroConsultas = 5;
	var configiraciones = numeroConsultas;
	var codigos = [''];
	var elementos =	[
	'Select_localidades.actualizavalor()',
	'Consulta_estadisticas.recibefiltro([Select_localidades.recorta_filtro([[["TODOS_REGISTROS_L", 2, Select_municipios.valores[1], 0, 0]], 2, 0, 2]), Select_localidades.recorta_filtro([[["TODOS_REGISTROS_L", 0, "", 0, 0] ], 2, 1, 2]), Radio_datos.valores[1]])',
	'Consulta_estadisticas_familiares.recibefiltro([Select_localidades.recorta_filtro([[["TODOS_REGISTROS_L", 2, Select_municipios.valores[1], 0, 0]], 2, 0, 2]), Select_localidades.recorta_filtro([[["TODOS_REGISTROS_L", 0, "", 0, 0] ], 2, 1, 2]), Radio_datos.valores[1]])',
	'Consulta_estadisticas_familiares_2.recibefiltro([Select_localidades.recorta_filtro([[["TODOS_REGISTROS_L", 2, Select_municipios.valores[1], 0, 0]], 2, 0, 2]), Select_localidades.recorta_filtro([[["TODOS_REGISTROS_L", 0, "", 0, 0] ], 2, 1, 2]), Radio_datos.valores[1]])',
	'Consulta_descarga.actualizafiltro(0, Select_localidades.recorta_filtro([[["TODOS_REGISTROS_L", 2, Select_municipios.valores[1], 0, 0]], 2, 0, 2]))',
	'Consulta_descarga.actualizafiltro(1, Select_localidades.recorta_filtro([[["TODOS_REGISTROS_L", 0, "", 0, 0] ], 2, 1, 2]))',
	'Modal_resume.abrefijo()', 'Consulta_estadisticas.ejecuta()'
	];
	var Metodos_cambia_localidad = new Metodos(configuraciones, codigos, elementos);

// OBJETO Panel
	
var tipoImpresion = 0;
var nivel = [0, 0, 1];
var configuraciones = [tipoImpresion, nivel];
var etiquetas = ['area_panel_xx', 'ID_RESUMEN_PANEL', '#ID_TRABAJO_CABEZA_RESUMEN'];

var elementos_01_01 = 'RESUMEN GENERAL';
var elementos_01_02_01 = 'Cédulas:';
var elementos_01_02_02 = '0';
var elementos_01_02 = [elementos_01_02_01, elementos_01_02_02];
var elementos_01_03_01 = 'Localidades:';
var elementos_01_03_02 = '0';
var elementos_01_03 = [elementos_01_03_01, elementos_01_03_02];
var elementos_01_04_01 = 'Viviendas:';
var elementos_01_04_02 = '0';
var elementos_01_04 = [elementos_01_04_01, elementos_01_04_02];
var elementos_01_05_01 = 'Población:';
var elementos_01_05_02 = '0';
var elementos_01_05 = [elementos_01_05_01, elementos_01_05_02];
var elemento01 = [elementos_01_01, elementos_01_02, elementos_01_03, elementos_01_04, elementos_01_05];

var elementos = [elemento01];
var codigos = [''];
var Panel_resumen = new Panel(configuraciones, etiquetas, codigos, elementos);
Panel_resumen.generahtml();
Panel_resumen.imprimehtml();

// OBJETO Panel
	
	var tipoImpresion = 0;
	var nivel = [0, 0, 1];
	var configuraciones = [tipoImpresion, nivel];
	var etiquetas = ['area_paneles', 'ID_TRABAJO_ESCRITORIO_MAQUETA', '#ID_TRABAJO_ESCRITORIO'];
	
	var elemento01 = [];
	
	var elementos_02_01 = 'CEDULAS CON<BR>TECHO';
	var elementos_02_02_01 = 'Concreto:';
	var elementos_02_02_02 = '0';
	var elementos_02_02 = [elementos_02_02_01, elementos_02_02_02];
	var elementos_02_03_01 = 'Lamina Galvanizada:';
	var elementos_02_03_02 = '0';
	var elementos_02_03 = [elementos_02_03_01, elementos_02_03_02];
	var elementos_02_04_01 = 'Madera:';
	var elementos_02_04_02 = '0';
	var elementos_02_04 = [elementos_02_04_01, elementos_02_04_02];
	var elementos_02_05_01 = 'Lamina Cartón:';
	var elementos_02_05_02 = '0';
	var elementos_02_05 = [elementos_02_05_01, elementos_02_05_02];
	var elementos_02_06_01 = 'Otro:';
	var elementos_02_06_02 = '0';
	var elementos_02_06 = [elementos_02_06_01, elementos_02_06_02];
	var elementos_02_07_01 = 'No Hay Datos:';
	var elementos_02_07_02 = '0';
	var elementos_02_07 = [elementos_02_07_01, elementos_02_07_02];
	var elemento02 = [elementos_02_01, elementos_02_02, elementos_02_03, elementos_02_04, elementos_02_05, elementos_02_06, elementos_02_07];

	var elementos_03_01 = 'CEDULAS CON<BR>PAREDES';
	var elementos_03_02_01 = 'Tabique:';
	var elementos_03_02_02 = '0';
	var elementos_03_02 = [elementos_03_02_01, elementos_03_02_02];
	var elementos_03_03_01 = 'Adobe:';
	var elementos_03_03_02 = '0';
	var elementos_03_03 = [elementos_03_03_01, elementos_03_03_02];
	var elementos_03_04_01 = 'Block:';
	var elementos_03_04_02 = '0';
	var elementos_03_04 = [elementos_03_04_01, elementos_03_04_02];
	var elementos_03_05_01 = 'Madera:';
	var elementos_03_05_02 = '0';
	var elementos_03_05 = [elementos_03_05_01, elementos_03_05_02];
	var elementos_03_06_01 = 'Piedra:';
	var elementos_03_06_02 = '0';
	var elementos_03_06 = [elementos_03_06_01, elementos_03_06_02];
	var elementos_03_07_01 = 'Cartón:';
	var elementos_03_07_02 = '0';
	var elementos_03_07 = [elementos_03_07_01, elementos_03_07_02];
	var elementos_03_08_01 = 'No Hay Datos:';
	var elementos_03_08_02 = '0';
	var elementos_03_08 = [elementos_03_08_01, elementos_03_08_02];
	var elemento03 = [elementos_03_01, elementos_03_02, elementos_03_03, elementos_03_04, elementos_03_05, elementos_03_06, elementos_03_07, elementos_03_08];

	var elementos_04_01 = 'CEDULAS CON<BR>PISO';
	var elementos_04_02_01 = 'Cemento:';
	var elementos_04_02_02 = '0';
	var elementos_04_02 = [elementos_04_02_01, elementos_04_02_02];
	var elementos_04_03_01 = 'Madera:';
	var elementos_04_03_02 = '0';
	var elementos_04_03 = [elementos_04_03_01, elementos_04_03_02];
	var elementos_04_04_01 = 'Tierra:';
	var elementos_04_04_02 = '0';
	var elementos_04_04 = [elementos_04_04_01, elementos_04_04_02];
	var elementos_04_05_01 = 'Piedra:';
	var elementos_04_05_02 = '0';
	var elementos_04_05 = [elementos_04_05_01, elementos_04_05_02];
	var elementos_04_06_01 = 'No Hay Datos:';
	var elementos_04_06_02 = '0';
	var elementos_04_06 = [elementos_04_06_01, elementos_04_06_02];
	var elemento04 = [elementos_04_01, elementos_04_02, elementos_04_03, elementos_04_04, elementos_04_05, elementos_04_06];

	var elementos_05_01 = 'CEDULAS CON<BR>AGUA DE USO';
	var elementos_05_02_01 = 'Potable:';
	var elementos_05_02_02 = '0';
	var elementos_05_02 = [elementos_05_02_01, elementos_05_02_02];
	var elementos_05_03_01 = 'Noria/Pozo:';
	var elementos_05_03_02 = '0';
	var elementos_05_03 = [elementos_05_03_01, elementos_05_03_02];
	var elementos_05_04_01 = 'Río:';
	var elementos_05_04_02 = '0';
	var elementos_05_04 = [elementos_05_04_01, elementos_05_04_02];
	var elementos_05_05_01 = 'Lluvia:';
	var elementos_05_05_02 = '0';
	var elementos_05_05 = [elementos_05_05_01, elementos_05_05_02];
	var elementos_05_06_01 = 'No Hay Datos:';
	var elementos_05_06_02 = '0';
	var elementos_05_06 = [elementos_05_06_01, elementos_05_06_02];
	var elemento05 = [elementos_05_01, elementos_05_02, elementos_05_03, elementos_05_04, elementos_05_05, elementos_05_06];

	var elementos_06_01 = 'CEDULAS CON<BR>AGUA DE CONSUMO';
	var elementos_06_02_01 = 'Potable:';
	var elementos_06_02_02 = '0';
	var elementos_06_02 = [elementos_06_02_01, elementos_06_02_02];
	var elementos_06_03_01 = 'Purificada:';
	var elementos_06_03_02 = '0';
	var elementos_06_03 = [elementos_06_03_01, elementos_06_03_02];
	var elementos_06_04_01 = 'Hervida:';
	var elementos_06_04_02 = '0';
	var elementos_06_04 = [elementos_06_04_01, elementos_06_04_02];
	var elementos_06_05_01 = 'Clorada:';
	var elementos_06_05_02 = '0';
	var elementos_06_05 = [elementos_06_05_01, elementos_06_05_02];
	var elementos_06_06_01 = 'Filtrada:';
	var elementos_06_06_02 = '0';
	var elementos_06_06 = [elementos_06_06_01, elementos_06_06_02];
	var elementos_06_07_01 = 'No Hay Datos:';
	var elementos_06_07_02 = '0';
	var elementos_06_07 = [elementos_06_07_01, elementos_06_07_02];
	var elemento06 = [elementos_06_01, elementos_06_02, elementos_06_03, elementos_06_04, elementos_06_05, elementos_06_06, elementos_06_07];

	var elementos_07_01 = 'CEDULAS CON<BR>EXCRETA';
	var elementos_07_02_01 = 'Fosa Séptica:';
	var elementos_07_02_02 = '0';
	var elementos_07_02 = [elementos_07_02_01, elementos_07_02_02];
	var elementos_07_03_01 = 'Letrina:';
	var elementos_07_03_02 = '0';
	var elementos_07_03 = [elementos_07_03_01, elementos_07_03_02];
	var elementos_07_04_01 = 'Al ras del suelo:';
	var elementos_07_04_02 = '0';
	var elementos_07_04 = [elementos_07_04_01, elementos_07_04_02];
	var elementos_07_05_01 = 'No Hay Datos:';
	var elementos_07_05_02 = '0';
	var elementos_07_05 = [elementos_07_05_01, elementos_07_05_02];
	var elemento07 = [elementos_07_01, elementos_07_02, elementos_07_03, elementos_07_04, elementos_07_05];

	var elementos_08_01 = 'CEDULAS CON<BR>COMBUSTIBLE';
	var elementos_08_02_01 = 'Gas:';
	var elementos_08_02_02 = '0';
	var elementos_08_02 = [elementos_08_02_01, elementos_08_02_02];
	var elementos_08_03_01 = 'Carbón:';
	var elementos_08_03_02 = '0';
	var elementos_08_03 = [elementos_08_03_01, elementos_08_03_02];
	var elementos_08_04_01 = 'Leña:';
	var elementos_08_04_02 = '0';
	var elementos_08_04 = [elementos_08_04_01, elementos_08_04_02];
	var elementos_08_05_01 = 'Otros:';
	var elementos_08_05_02 = '0';
	var elementos_08_05 = [elementos_08_05_01, elementos_08_05_02];
	var elementos_08_06_01 = 'No Hay Datos:';
	var elementos_08_06_02 = '0';
	var elementos_08_06 = [elementos_08_06_01, elementos_08_06_02];
	var elemento08 = [elementos_08_01, elementos_08_02, elementos_08_03, elementos_08_04, elementos_08_05, elementos_08_06];

	var elementos_09_01 = 'CEDULAS CON<BR>BASURA';
	var elementos_09_02_01 = 'Red Municipal:';
	var elementos_09_02_02 = '0';
	var elementos_09_02 = [elementos_09_02_01, elementos_09_02_02];
	var elementos_09_03_01 = 'Enterramiento:';
	var elementos_09_03_02 = '0';
	var elementos_09_03 = [elementos_09_03_01, elementos_09_03_02];
	var elementos_09_04_01 = 'Cielo Abierto:';
	var elementos_09_04_02 = '0';
	var elementos_09_04 = [elementos_09_04_01, elementos_09_04_02];
	var elementos_09_05_01 = 'Incineración:';
	var elementos_09_05_02 = '0';
	var elementos_09_05 = [elementos_09_05_01, elementos_09_05_02];
	var elementos_09_06_01 = 'No Hay Datos:';
	var elementos_09_06_02 = '0';
	var elementos_09_06 = [elementos_09_06_01, elementos_09_06_02];
	var elemento09 = [elementos_09_01, elementos_09_02, elementos_09_03, elementos_09_04, elementos_09_05, elementos_09_06];

	var elementos_10_01 = 'CEDULAS CON<BR>ALUMBRADO';
	var elementos_10_02_01 = 'Red Eléctrica:';
	var elementos_10_02_02 = '0';
	var elementos_10_02 = [elementos_10_02_01, elementos_10_02_02];
	var elementos_10_03_01 = 'Velas:';
	var elementos_10_03_02 = '0';
	var elementos_10_03 = [elementos_10_03_01, elementos_10_03_02];
	var elementos_10_04_01 = 'Quinqué:';
	var elementos_10_04_02 = '0';
	var elementos_10_04 = [elementos_10_04_01, elementos_10_04_02];
	var elementos_10_05_01 = 'Placa Solar:';
	var elementos_10_05_02 = '0';
	var elementos_10_05 = [elementos_10_05_01, elementos_10_05_02];
	var elementos_10_06_01 = 'No Hay Datos:';
	var elementos_10_06_02 = '0';
	var elementos_10_06 = [elementos_10_06_01, elementos_10_06_02];
	var elemento10 = [elementos_10_01, elementos_10_02, elementos_10_03, elementos_10_04, elementos_10_05, elementos_10_06];

//////////////////////////////////////////////////////
//////////////////////////////////////////////////////
//////////////////////////////////////////////////////
//////////////////////////////////////////////////////

	var elementos_11_01 = 'CEDULAS CON<BR>DISTRIBUCIÓN HABITACIONAL';
	var elementos_11_02_01 = 'Recamaras:';
	var elementos_11_02_02 = '0';
	var elementos_11_02 = [elementos_11_02_01, elementos_11_02_02];
	var elementos_11_03_01 = 'Estancias:';
	var elementos_11_03_02 = '0';
	var elementos_11_03 = [elementos_11_03_01, elementos_11_03_02];
	var elementos_11_04_01 = 'Comedores:';
	var elementos_11_04_02 = '0';
	var elementos_11_04 = [elementos_11_04_01, elementos_11_04_02];
	var elementos_11_05_01 = 'Multiples:';
	var elementos_11_05_02 = '0';
	var elementos_11_05 = [elementos_11_05_01, elementos_11_05_02];
	var elementos_11_06_01 = 'Cocinas Independientes:';
	var elementos_11_06_02 = '0';
	var elementos_11_06 = [elementos_11_06_01, elementos_11_06_02];
	var elemento11 = [elementos_11_01, elementos_11_02, elementos_11_03, elementos_11_04, elementos_11_05, elementos_11_06];

	var elementos_12_01 = 'CEDULAS CON<BR>HABITACIONES';
	var elementos_12_02_01 = '1 habitación:';
	var elementos_12_02_02 = '0';
	var elementos_12_02 = [elementos_12_02_01, elementos_12_02_02];
	var elementos_12_03_01 = '2 habitaciones:';
	var elementos_12_03_02 = '0';
	var elementos_12_03 = [elementos_12_03_01, elementos_12_03_02];
	var elementos_12_04_01 = '3 habitaciones:';
	var elementos_12_04_02 = '0';
	var elementos_12_04 = [elementos_12_04_01, elementos_12_04_02];
	var elementos_12_05_01 = '4 habitaciones:';
	var elementos_12_05_02 = '0';
	var elementos_12_05 = [elementos_12_05_01, elementos_12_05_02];
	var elementos_12_06_01 = 'Más de 4 habitaciones:';
	var elementos_12_06_02 = '0';
	var elementos_12_06 = [elementos_12_06_01, elementos_12_06_02];
	var elementos_12_07_01 = 'Total Habitaciones:';
	var elementos_12_07_02 = '0';
	var elementos_12_07 = [elementos_12_07_01, elementos_12_07_02];
	var elementos_12_08_01 = 'No Hay Datos:';
	var elementos_12_08_02 = '0';
	var elementos_12_08 = [elementos_12_08_01, elementos_12_08_02];
	var elemento12 = [elementos_12_01, elementos_12_02, elementos_12_03, elementos_12_04, elementos_12_05, elementos_12_06, elementos_12_07, elementos_12_08];

	var elementos_13_01 = 'CEDULAS CON<BR>PUEBLO INDÍGENA';
	var elementos_13_02_01 = 'Tarahumara:';
	var elementos_13_02_02 = '0';
	var elementos_13_02 = [elementos_13_02_01, elementos_13_02_02];
	var elementos_13_03_01 = 'Tepehuan:';
	var elementos_13_03_02 = '0';
	var elementos_13_03 = [elementos_13_03_01, elementos_13_03_02];
	var elementos_13_04_01 = 'Wuarojio:';
	var elementos_13_04_02 = '0';
	var elementos_13_04 = [elementos_13_04_01, elementos_13_04_02];
	var elementos_13_05_01 = 'Pima:';
	var elementos_13_05_02 = '0';
	var elementos_13_05 = [elementos_13_05_01, elementos_13_05_02];
	var elementos_13_06_01 = 'Menonita:';
	var elementos_13_06_02 = '0';
	var elementos_13_06 = [elementos_13_06_01, elementos_13_06_02];
	var elementos_13_07_01 = 'Otro:';
	var elementos_13_07_02 = '0';
	var elementos_13_07 = [elementos_13_07_01, elementos_13_07_02];
	var elementos_13_08_01 = 'No Hay Datos:';
	var elementos_13_08_02 = '0';
	var elementos_13_08 = [elementos_13_08_01, elementos_13_08_02];
	var elemento13 = [elementos_13_01, elementos_13_02, elementos_13_03, elementos_13_04, elementos_13_05, elementos_13_06, elementos_13_07, elementos_13_08];

	var elementos_14_01 = 'CEDULAS CON<BR>DERECHOHABIENCIA';
	var elementos_14_02_01 = 'INSABI:';
	var elementos_14_02_02 = '0';
	var elementos_14_02 = [elementos_14_02_01, elementos_14_02_02];
	var elementos_14_03_01 = 'IMSS:';
	var elementos_14_03_02 = '0';
	var elementos_14_03 = [elementos_14_03_01, elementos_14_03_02];
	var elementos_14_04_01 = 'ISSSTE:';
	var elementos_14_04_02 = '0';
	var elementos_14_04 = [elementos_14_04_01, elementos_14_04_02];
	var elementos_14_05_01 = 'PEMEX:';
	var elementos_14_05_02 = '0';
	var elementos_14_05 = [elementos_14_05_01, elementos_14_05_02];
	var elementos_14_06_01 = 'SEDENA:';
	var elementos_14_06_02 = '0';
	var elementos_14_06 = [elementos_14_06_01, elementos_14_06_02];
	var elementos_14_07_01 = 'Otro:';
	var elementos_14_07_02 = '0';
	var elementos_14_07 = [elementos_14_07_01, elementos_14_07_02];
	var elementos_14_08_01 = 'No Hay Datos:';
	var elementos_14_08_02 = '0';
	var elementos_14_08 = [elementos_14_08_01, elementos_14_08_02];
	var elemento14 = [elementos_14_01, elementos_14_02, elementos_14_03, elementos_14_04, elementos_14_05, elementos_14_06, elementos_14_07, elementos_14_08];

	var elementos_15_01 = 'MASCOTAS';
	var elementos_15_02_01 = 'Perros:';
	var elementos_15_02_02 = '0';
	var elementos_15_02 = [elementos_15_02_01, elementos_15_02_02];
	var elementos_15_03_01 = 'Gatos:';
	var elementos_15_03_02 = '0';
	var elementos_15_03 = [elementos_15_03_01, elementos_15_03_02];
	var elementos_15_04_01 = 'Otros:';
	var elementos_15_04_02 = '0';
	var elementos_15_04 = [elementos_15_04_01, elementos_15_04_02];
	var elemento15 = [elementos_15_01, elementos_15_02, elementos_15_03, elementos_15_04];

	var elementos_16_01 = 'CEDULAS CON<BR>SERVICIOS DE SALUD';
	var elementos_16_02_01 = 'INSABI:';
	var elementos_16_02_02 = '0';
	var elementos_16_02 = [elementos_16_02_01, elementos_16_02_02];
	var elementos_16_03_01 = 'IMSS:';
	var elementos_16_03_02 = '0';
	var elementos_16_03 = [elementos_16_03_01, elementos_16_03_02];
	var elementos_16_04_01 = 'ISSSTE:';
	var elementos_16_04_02 = '0';
	var elementos_16_04 = [elementos_16_04_01, elementos_16_04_02];
	var elementos_16_05_01 = 'PEMEX:';
	var elementos_16_05_02 = '0';
	var elementos_16_05 = [elementos_16_05_01, elementos_16_05_02];
	var elementos_16_06_01 = 'SEDENA:';
	var elementos_16_06_02 = '0';
	var elementos_16_06 = [elementos_16_06_01, elementos_16_06_02];
	var elementos_16_07_01 = 'Otro:';
	var elementos_16_07_02 = '0';
	var elementos_16_07 = [elementos_16_07_01, elementos_16_07_02];
	var elementos_16_08_01 = 'Médico Particular:';
	var elementos_16_08_02 = '0';
	var elementos_16_08 = [elementos_16_08_01, elementos_16_08_02];
	var elementos_16_09_01 = 'Clínica Particular:';
	var elementos_16_09_02 = '0';
	var elementos_16_09 = [elementos_16_09_01, elementos_16_09_02];
	var elementos_16_10_01 = 'Partera:';
	var elementos_16_10_02 = '0';
	var elementos_16_10 = [elementos_16_10_01, elementos_16_10_02];
	var elementos_16_11_01 = 'Curandera:';
	var elementos_16_11_02 = '0';
	var elementos_16_11 = [elementos_16_11_01, elementos_16_11_02];
	var elementos_16_12_01 = 'Yerbero:';
	var elementos_16_12_02 = '0';
	var elementos_16_12 = [elementos_16_12_01, elementos_16_12_02];
	var elementos_16_13_01 = 'Huesero:';
	var elementos_16_13_02 = '0';
	var elementos_16_13 = [elementos_16_13_01, elementos_16_13_02];
	var elementos_16_14_01 = 'Boticario:';
	var elementos_16_14_02 = '0';
	var elementos_16_14 = [elementos_16_14_01, elementos_16_14_02];
	var elementos_16_15_01 = 'No Hay Datos:';
	var elementos_16_15_02 = '0';
	var elementos_16_15 = [elementos_16_15_01, elementos_16_15_02];
	var elemento16 = [elementos_16_01, elementos_16_02, elementos_16_03, elementos_16_04, elementos_16_05, elementos_16_06, elementos_16_07, elementos_16_08, elementos_16_09, elementos_16_10, elementos_16_11, elementos_16_12, elementos_16_13, elementos_16_14, elementos_16_15];

	var elementos_17_01 = 'EDAD DE HOMBRES';
	var elementos_17_02_01 = 'Menores de 5 años:';
	var elementos_17_02_02 = '0';
	var elementos_17_02 = [elementos_17_02_01, elementos_17_02_02];
	var elementos_17_03_01 = 'De 5 a 9 años:';
	var elementos_17_03_02 = '0';
	var elementos_17_03 = [elementos_17_03_01, elementos_17_03_02];
	var elementos_17_04_01 = 'De 10 a 17 años:';
	var elementos_17_04_02 = '0';
	var elementos_17_04 = [elementos_17_04_01, elementos_17_04_02];
	var elementos_17_05_01 = 'De 18 a 59 años:';
	var elementos_17_05_02 = '0';
	var elementos_17_05 = [elementos_17_05_01, elementos_17_05_02];
	var elementos_17_06_01 = '60 años y más:';
	var elementos_17_06_02 = '0';
	var elementos_17_06 = [elementos_17_06_01, elementos_17_06_02];
	var elementos_17_07_01 = 'No Hay Datos:';
	var elementos_17_07_02 = '0';
	var elementos_17_07 = [elementos_17_07_01, elementos_17_07_02];
	var elemento17 = [elementos_17_01, elementos_17_02, elementos_17_03, elementos_17_04, elementos_17_05, elementos_17_06, elementos_17_07];

	var elementos_18_01 = 'EDAD DE MÚJERES';
	var elementos_18_02_01 = 'Menores de 5 años:';
	var elementos_18_02_02 = '0';
	var elementos_18_02 = [elementos_18_02_01, elementos_18_02_02];
	var elementos_18_03_01 = 'De 5 a 9 años:';
	var elementos_18_03_02 = '0';
	var elementos_18_03 = [elementos_18_03_01, elementos_18_03_02];
	var elementos_18_04_01 = 'De 10 a 17 años:';
	var elementos_18_04_02 = '0';
	var elementos_18_04 = [elementos_18_04_01, elementos_18_04_02];
	var elementos_18_05_01 = 'De 18 a 59 años:';
	var elementos_18_05_02 = '0';
	var elementos_18_05 = [elementos_18_05_01, elementos_18_05_02];
	var elementos_18_06_01 = '60 años y más:';
	var elementos_18_06_02 = '0';
	var elementos_18_06 = [elementos_18_06_01, elementos_18_06_02];
	var elementos_18_07_01 = 'No Hay Datos:';
	var elementos_18_07_02 = '0';
	var elementos_18_07 = [elementos_18_07_01, elementos_18_07_02];
	var elemento18 = [elementos_18_01, elementos_18_02, elementos_18_03, elementos_18_04, elementos_18_05, elementos_18_06, elementos_18_07];

	var elementos_19_01 = 'LENGUA MATERNA';
var elementos_19_02_01 = 'Español:';
var elementos_19_02_02 = '0';
var elementos_19_02 = [elementos_19_02_01, elementos_19_02_02];
var elementos_19_03_01 = 'Tarahumara:';
var elementos_19_03_02 = '0';
var elementos_19_03 = [elementos_19_03_01, elementos_19_03_02];
var elementos_19_04_01 = 'Tepehuan:';
var elementos_19_04_02 = '0';
var elementos_19_04 = [elementos_19_04_01, elementos_19_04_02];
var elementos_19_05_01 = 'Wuarojio:';
var elementos_19_05_02 = '0';
var elementos_19_05 = [elementos_19_05_01, elementos_19_05_02];
var elementos_19_06_01 = 'Pima:';
var elementos_19_06_02 = '0';
var elementos_19_06 = [elementos_19_06_01, elementos_19_06_02];
var elementos_19_07_01 = 'Menonita:';
var elementos_19_07_02 = '0';
var elementos_19_07 = [elementos_19_07_01, elementos_19_07_02];
var elementos_19_08_01 = 'Otro:';
var elementos_19_08_02 = '0';
var elementos_19_08 = [elementos_19_08_01, elementos_19_08_02];
var elementos_19_09_01 = 'No Hay Datos:';
var elementos_19_09_02 = '0';
var elementos_19_09 = [elementos_19_09_01, elementos_19_09_02];
var elemento19 = [elementos_19_01, elementos_19_02, elementos_19_03, elementos_19_04, elementos_19_05, elementos_19_06, elementos_19_07, elementos_19_08, elementos_19_09];

//////////////////////////////////////////////////////

var elementos_20_01 = 'SEXO';
var elementos_20_02_01 = 'Hombre:';
var elementos_20_02_02 = '0';
var elementos_20_02 = [elementos_20_02_01, elementos_20_02_02];
var elementos_20_03_01 = 'Mujer:';
var elementos_20_03_02 = '0';
var elementos_20_03 = [elementos_20_03_01, elementos_20_03_02];
var elementos_20_04_01 = 'No Hay Datos:';
var elementos_20_04_02 = '0';
var elementos_20_04 = [elementos_20_04_01, elementos_20_04_02];
var elemento20 = [elementos_20_01, elementos_20_02, elementos_20_03, elementos_20_04];

var elementos_21_01 = 'ESTADO CIVIL';
var elementos_21_02_01 = 'Casado:';
var elementos_21_02_02 = '0';
var elementos_21_02 = [elementos_21_02_01, elementos_21_02_02];
var elementos_21_03_01 = 'Soltero:';
var elementos_21_03_02 = '0';
var elementos_21_03 = [elementos_21_03_01, elementos_21_03_02];
var elementos_21_04_01 = 'Unión Libre:';
var elementos_21_04_02 = '0';
var elementos_21_04 = [elementos_21_04_01, elementos_21_04_02];
var elementos_21_05_01 = 'Divorciado:';
var elementos_21_05_02 = '0';
var elementos_21_05 = [elementos_21_05_01, elementos_21_05_02];
var elementos_21_06_01 = 'Separado:';
var elementos_21_06_02 = '0';
var elementos_21_06 = [elementos_21_06_01, elementos_21_06_02];
var elementos_21_07_01 = 'Np Hay Datos:';
var elementos_21_07_02 = '0';
var elementos_21_07 = [elementos_21_07_01, elementos_21_07_02];
var elemento21 = [elementos_21_01, elementos_21_02, elementos_21_03, elementos_21_04, elementos_21_05, elementos_21_06, elementos_21_07];

var elementos_22_01 = 'PARENTESCO';
var elementos_22_02_01 = 'Padre:';
var elementos_22_02_02 = '0';
var elementos_22_02 = [elementos_22_02_01, elementos_22_02_02];
var elementos_22_03_01 = 'Madre:';
var elementos_22_03_02 = '0';
var elementos_22_03 = [elementos_22_03_01, elementos_22_03_02];
var elementos_22_04_01 = 'Hijo:';
var elementos_22_04_02 = '0';
var elementos_22_04 = [elementos_22_04_01, elementos_22_04_02];
var elementos_22_05_01 = 'Pariente:';
var elementos_22_05_02 = '0';
var elementos_22_05 = [elementos_22_05_01, elementos_22_05_02];
var elementos_22_06_01 = 'Otro:';
var elementos_22_06_02 = '0';
var elementos_22_06 = [elementos_22_06_01, elementos_22_06_02];
var elementos_22_07_01 = 'No Hay Datos:';
var elementos_22_07_02 = '0';
var elementos_22_07 = [elementos_22_07_01, elementos_22_07_02];
var elemento22 = [elementos_22_01, elementos_22_02, elementos_22_03, elementos_22_04, elementos_22_05, elementos_22_06, elementos_22_07];

var elementos_23_01 = 'ESCOLARIDAD';
var elementos_23_02_01 = 'Preescolar:';
var elementos_23_02_02 = '0';
var elementos_23_02 = [elementos_23_02_01, elementos_23_02_02];
var elementos_23_03_01 = 'Primaria:';
var elementos_23_03_02 = '0';
var elementos_23_03 = [elementos_23_03_01, elementos_23_03_02];
var elementos_23_04_01 = 'Secundaria:';
var elementos_23_04_02 = '0';
var elementos_23_04 = [elementos_23_04_01, elementos_23_04_02];
var elementos_23_05_01 = 'Preparatoria:';
var elementos_23_05_02 = '0';
var elementos_23_05 = [elementos_23_05_01, elementos_23_05_02];
var elementos_23_06_01 = 'Técnico:';
var elementos_23_06_02 = '0';
var elementos_23_06 = [elementos_23_06_01, elementos_23_06_02];
var elementos_23_07_01 = 'Profesional:';
var elementos_23_07_02 = '0';
var elementos_23_07 = [elementos_23_07_01, elementos_23_07_02];
var elementos_23_08_01 = 'Posgrado:';
var elementos_23_08_02 = '0';
var elementos_23_08 = [elementos_23_08_01, elementos_23_08_02];
var elementos_23_09_01 = 'No asiste a la escuela';
var elementos_23_09_02 = '0';
var elementos_23_09 = [elementos_23_09_01, elementos_23_09_02];
var elementos_23_10_01 = 'Sabe leer y escribir';
var elementos_23_10_02 = '0';
var elementos_23_10 = [elementos_23_10_01, elementos_23_10_02];
var elementos_23_11_01 = 'Analfabeta';
var elementos_23_11_02 = '0';
var elementos_23_11 = [elementos_23_11_01, elementos_23_11_02];
var elementos_23_12_01 = 'No Hay Datos';
var elementos_23_12_02 = '0';
var elementos_23_12 = [elementos_23_12_01, elementos_23_12_02];
var elemento23 = [elementos_23_01, elementos_23_02, elementos_23_03, elementos_23_04, elementos_23_05, elementos_23_06, elementos_23_07, elementos_23_08, elementos_23_09, elementos_23_10, elementos_23_11, elementos_23_12];

var elementos_24_01 = 'OCUPACIÓN';
var elementos_24_02_01 = 'Hogar:';
var elementos_24_02_02 = '0';
var elementos_24_02 = [elementos_24_02_01, elementos_24_02_02];
var elementos_24_03_01 = 'Estudiante:';
var elementos_24_03_02 = '0';
var elementos_24_03 = [elementos_24_03_01, elementos_24_03_02];
var elementos_24_04_01 = 'Empleado:';
var elementos_24_04_02 = '0';
var elementos_24_04 = [elementos_24_04_01, elementos_24_04_02];
var elementos_24_05_01 = 'Desempleado:';
var elementos_24_05_02 = '0';
var elementos_24_05 = [elementos_24_05_01, elementos_24_05_02];
var elementos_24_06_01 = 'Por cuenta propia:';
var elementos_24_06_02 = '0';
var elementos_24_06 = [elementos_24_06_01, elementos_24_06_02];
var elementos_24_07_01 = 'No Hay Datos:';
var elementos_24_07_02 = '0';
var elementos_24_07 = [elementos_24_07_01, elementos_24_07_02];
var elemento24 = [elementos_24_01, elementos_24_02, elementos_24_03, elementos_24_04, elementos_24_05, elementos_24_06, elementos_24_07];

var elementos_25_01 = 'INGRESOS';
var elementos_25_02_01 = 'Menor al SM:';
var elementos_25_02_02 = '0';
var elementos_25_02 = [elementos_25_02_01, elementos_25_02_02];
var elementos_25_03_01 = 'Igual al SM:';
var elementos_25_03_02 = '0';
var elementos_25_03 = [elementos_25_03_01, elementos_25_03_02];
var elementos_25_04_01 = 'Mayor al SM:';
var elementos_25_04_02 = '0';
var elementos_25_04 = [elementos_25_04_01, elementos_25_04_02];
var elementos_25_05_01 = 'No Hay Datos:';
var elementos_25_05_02 = '0';
var elementos_25_05 = [elementos_25_05_01, elementos_25_05_02];
var elemento25 = [elementos_25_01, elementos_25_02, elementos_25_03, elementos_25_04, elementos_25_05];

	var elementos_26_01 = 'DETECCIONES Y PADECIMIENTOS';
	var elementos_26_02_01 = 'Papanicolaou:';
	var elementos_26_02_02 = '0';
	var elementos_26_02 = [elementos_26_02_01, elementos_26_02_02];
	var elementos_26_03_01 = 'Hipertensión:';
	var elementos_26_03_02 = '0';
	var elementos_26_03 = [elementos_26_03_01, elementos_26_03_02];
	var elementos_26_04_01 = 'Diabetes:';
	var elementos_26_04_02 = '0';
	var elementos_26_04 = [elementos_26_04_01, elementos_26_04_02];
	var elementos_26_05_01 = 'Tuberculosis:';
	var elementos_26_05_02 = '0';
	var elementos_26_05 = [elementos_26_05_01, elementos_26_05_02];
	var elementos_26_06_01 = 'Alcoholismo:';
	var elementos_26_06_02 = '0';
	var elementos_26_06 = [elementos_26_06_01, elementos_26_06_02];
	var elementos_26_07_01 = 'Tabaquismo:';
	var elementos_26_07_02 = '0';
	var elementos_26_07 = [elementos_26_07_01, elementos_26_07_02];
	var elementos_26_08_01 = 'Cancer:';
	var elementos_26_08_02 = '0';
	var elementos_26_08 = [elementos_26_08_01, elementos_26_08_02];
	var elemento26 = [elementos_26_01, elementos_26_02, elementos_26_03, elementos_26_04, elementos_26_05, elementos_26_06, elementos_26_07, elementos_26_08];

	var elementos_27_01 = 'PLANIFICACIÓN FAMILIAR';
	var elementos_27_02_01 = 'DIU:';
	var elementos_27_02_02 = '0';
	var elementos_27_02 = [elementos_27_02_01, elementos_27_02_02];
	var elementos_27_03_01 = 'Orales:';
	var elementos_27_03_02 = '0';
	var elementos_27_03 = [elementos_27_03_01, elementos_27_03_02];
	var elementos_27_04_01 = 'Preservativos:';
	var elementos_27_04_02 = '0';
	var elementos_27_04 = [elementos_27_04_01, elementos_27_04_02];
	var elementos_27_05_01 = 'Inyecciones Mensuales:';
	var elementos_27_05_02 = '0';
	var elementos_27_05 = [elementos_27_05_01, elementos_27_05_02];
	var elementos_27_06_01 = 'Inyecciones Bimensuales:';
	var elementos_27_06_02 = '0';
	var elementos_27_06 = [elementos_27_06_01, elementos_27_06_02];
	var elementos_27_07_01 = 'Salpingo / OTB:';
	var elementos_27_07_02 = '0';
	var elementos_27_07 = [elementos_27_07_01, elementos_27_07_02];
	var elementos_27_08_01 = 'Implantes:';
	var elementos_27_08_02 = '0';
	var elementos_27_08 = [elementos_27_08_01, elementos_27_08_02];
	var elemento27 = [elementos_27_01, elementos_27_02, elementos_27_03, elementos_27_04, elementos_27_05, elementos_27_06, elementos_27_07, elementos_27_08];

	var elementos_28_01 = '¿EMBARAZADA?';
	var elementos_28_02_01 = 'Si:';
	var elementos_28_02_02 = '0';
	var elementos_28_02 = [elementos_28_02_01, elementos_28_02_02];
	var elementos_28_03_01 = 'En control:';
	var elementos_28_03_02 = '0';
	var elementos_28_03 = [elementos_28_03_01, elementos_28_03_02];
	var elemento28 = [elementos_28_01, elementos_28_02, elementos_28_03];

	var elementos_29_01 = 'BAÑO Y CAMBIO DE ROPA';
	var elementos_29_02_01 = 'Diario:';
	var elementos_29_02_02 = '0';
	var elementos_29_02 = [elementos_29_02_01, elementos_29_02_02];
	var elementos_29_03_01 = 'Tres veces por semana:';
	var elementos_29_03_02 = '0';
	var elementos_29_03 = [elementos_29_03_01, elementos_29_03_02];
	var elementos_29_04_01 = 'Dos veces por semana:';
	var elementos_29_04_02 = '0';
	var elementos_29_04 = [elementos_29_04_01, elementos_29_04_02];
	var elementos_29_05_01 = 'Nunca:';
	var elementos_29_05_02 = '0';
	var elementos_29_05 = [elementos_29_05_01, elementos_29_05_02];
	var elementos_29_06_01 = 'No Hay Datos:';
	var elementos_29_06_02 = '0';
	var elementos_29_06 = [elementos_29_06_01, elementos_29_06_02];
	var elemento29 = [elementos_29_01, elementos_29_02, elementos_29_03, elementos_29_04, elementos_29_05, elementos_29_06];

	var elementos_30_01 = 'LAVADO DE DIENTES';
	var elementos_30_02_01 = 'Diario:';
	var elementos_30_02_02 = '0';
	var elementos_30_02 = [elementos_30_02_01, elementos_30_02_02];
	var elementos_30_03_01 = 'Tres veces por semana:';
	var elementos_30_03_02 = '0';
	var elementos_30_03 = [elementos_30_03_01, elementos_30_03_02];
	var elementos_30_04_01 = 'Dos veces por semana:';
	var elementos_30_04_02 = '0';
	var elementos_30_04 = [elementos_30_04_01, elementos_30_04_02];
	var elementos_30_05_01 = 'Nunca:';
	var elementos_30_05_02 = '0';
	var elementos_30_05 = [elementos_30_05_01, elementos_30_05_02];
	var elementos_30_06_01 = 'No Hay Datos:';
	var elementos_30_06_02 = '0';
	var elementos_30_06 = [elementos_30_06_01, elementos_30_06_02];
	var elemento30 = [elementos_30_01, elementos_30_02, elementos_30_03, elementos_30_04, elementos_30_05, elementos_30_06];

///////////////////////////////////////////////
////////////////////////////////////////////
///////////////////////////////////////////////////////////

	var elementos_31_01 = 'LIMPIEZA DE VIVIENDA';
	var elementos_31_02_01 = 'Diario:';
	var elementos_31_02_02 = '0';
	var elementos_31_02 = [elementos_31_02_01, elementos_31_02_02];
	var elementos_31_03_01 = 'Tres veces por semana:';
	var elementos_31_03_02 = '0';
	var elementos_31_03 = [elementos_31_03_01, elementos_31_03_02];
	var elementos_31_04_01 = 'Dos veces por semana:';
	var elementos_31_04_02 = '0';
	var elementos_31_04 = [elementos_31_04_01, elementos_31_04_02];
	var elementos_31_05_01 = 'Nunca:';
	var elementos_31_05_02 = '0';
	var elementos_31_05 = [elementos_31_05_01, elementos_31_05_02];
	var elementos_31_06_01 = 'No Hay Datos:';
	var elementos_31_06_02 = '0';
	var elementos_31_06 = [elementos_31_06_01, elementos_31_06_02];
	var elemento31 = [elementos_31_01, elementos_31_02, elementos_31_03, elementos_31_04, elementos_31_05, elementos_31_06];

	var elementos_32_01 = 'BEBIDAS ALCOHOLICAS';
	var elementos_32_02_01 = 'Diario:';
	var elementos_32_02_02 = '0';
	var elementos_32_02 = [elementos_32_02_01, elementos_32_02_02];
	var elementos_32_03_01 = 'Tres veces por semana:';
	var elementos_32_03_02 = '0';
	var elementos_32_03 = [elementos_32_03_01, elementos_32_03_02];
	var elementos_32_04_01 = 'Dos veces por semana:';
	var elementos_32_04_02 = '0';
	var elementos_32_04 = [elementos_32_04_01, elementos_32_04_02];
	var elementos_32_05_01 = 'Nunca:';
	var elementos_32_05_02 = '0';
	var elementos_32_05 = [elementos_32_05_01, elementos_32_05_02];
	var elementos_32_06_01 = 'No Hay Datos:';
	var elementos_32_06_02 = '0';
	var elementos_32_06 = [elementos_32_06_01, elementos_32_06_02];
	var elemento32 = [elementos_32_01, elementos_32_02, elementos_32_03, elementos_32_04, elementos_32_05, elementos_32_06];

var elementos_33_01 = 'TABACO';
var elementos_33_02_01 = 'Diario:';
var elementos_33_02_02 = '0';
var elementos_33_02 = [elementos_33_02_01, elementos_33_02_02];
var elementos_33_03_01 = 'Tres veces por semana:';
var elementos_33_03_02 = '0';
var elementos_33_03 = [elementos_33_03_01, elementos_33_03_02];
var elementos_33_04_01 = 'Dos veces por semana:';
var elementos_33_04_02 = '0';
var elementos_33_04 = [elementos_33_04_01, elementos_33_04_02];
var elementos_33_05_01 = 'Nunca:';
var elementos_33_05_02 = '0';
var elementos_33_05 = [elementos_33_05_01, elementos_33_05_02];
var elementos_33_06_01 = 'No Hay Datos:';
var elementos_33_06_02 = '0';
var elementos_33_06 = [elementos_33_06_01, elementos_33_06_02];
var elemento33 = [elementos_33_01, elementos_33_02, elementos_33_03, elementos_33_04, elementos_33_05, elementos_33_06];

var elementos_34_01 = 'MEDICAMENTOS';
var elementos_34_02_01 = 'Diario:';
var elementos_34_02_02 = '0';
var elementos_34_02 = [elementos_34_02_01, elementos_34_02_02];
var elementos_34_03_01 = 'Tres veces por semana:';
var elementos_34_03_02 = '0';
var elementos_34_03 = [elementos_34_03_01, elementos_34_03_02];
var elementos_34_04_01 = 'Dos veces por semana:';
var elementos_34_04_02 = '0';
var elementos_34_04 = [elementos_34_04_01, elementos_34_04_02];
var elementos_34_05_01 = 'Nunca:';
var elementos_34_05_02 = '0';
var elementos_34_05 = [elementos_34_05_01, elementos_34_05_02];
var elementos_34_06_01 = 'No Hay Datos:';
var elementos_34_06_02 = '0';
var elementos_34_06 = [elementos_34_06_01, elementos_34_06_02];
var elemento34 = [elementos_34_01, elementos_34_02, elementos_34_03, elementos_34_04, elementos_34_05, elementos_34_06];

var elementos_35_01 = 'DROGAS';
var elementos_35_02_01 = 'Diario:';
var elementos_35_02_02 = '0';
var elementos_35_02 = [elementos_35_02_01, elementos_35_02_02];
var elementos_35_03_01 = 'Tres veces por semana:';
var elementos_35_03_02 = '0';
var elementos_35_03 = [elementos_35_03_01, elementos_35_03_02];
var elementos_35_04_01 = 'Dos veces por semana:';
var elementos_35_04_02 = '0';
var elementos_35_04 = [elementos_35_04_01, elementos_35_04_02];
var elementos_35_05_01 = 'Nunca:';
var elementos_35_05_02 = '0';
var elementos_35_05 = [elementos_35_05_01, elementos_35_05_02];
var elementos_35_06_01 = 'No Hay Datos:';
var elementos_35_06_02 = '0';
var elementos_35_06 = [elementos_35_06_01, elementos_35_06_02];
var elemento35 = [elementos_35_01, elementos_35_02, elementos_35_03, elementos_35_04, elementos_35_05, elementos_35_06];

	var elementos = [elemento01, elemento02, elemento03, elemento04, elemento05, elemento06, elemento07, elemento08, elemento09, elemento10, elemento11, elemento12, elemento13, elemento14, elemento15, elemento16, elemento17, elemento18, elemento19, elemento20, elemento21, elemento22, elemento23, elemento24, elemento25, elemento26, elemento27, elemento28, elemento29, elemento30, elemento31, elemento32, elemento33, elemento34, elemento35];
	var codigos = [''];
	var Panel_estadisticas = new Panel(configuraciones, etiquetas, codigos, elementos);
	Panel_estadisticas.generahtml();
	Panel_estadisticas.imprimehtml();

/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////


	// AREA DATOS DE IMPRESION


/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////



















	// OBJETO Datos

	var numeroElementos = 95;
	var configuraciones = [numeroElementos];
	var codigos = [''];
	
	var elementosArea = [
  // Primeros 4 valores
  	'#ID_RESUMEN_PANEL_1_2_2', // elemento01
  	'#ID_RESUMEN_PANEL_1_3_2', // elemento02
  	'#ID_RESUMEN_PANEL_1_4_2', // elemento03
  	'#ID_RESUMEN_PANEL_1_5_2', // elemento04

  // Valores para 'TRABAJO_ESCRITORIO_MAQUETA_2_x_2' a 'TRABAJO_ESCRITORIO_MAQUETA_15_x_2'
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_2_2_2', // elemento05
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_2_3_2', // elemento06
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_2_4_2', // elemento07
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_2_5_2', // elemento08
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_2_6_2', // elemento09
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_2_7_2', // elemento10

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_3_2_2', // elemento11
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_3_3_2', // elemento12
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_3_4_2', // elemento13
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_3_5_2', // elemento14
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_3_6_2', // elemento15
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_3_7_2', // elemento16
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_3_8_2', // elemento17

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_4_2_2', // elemento18
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_4_3_2', // elemento19
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_4_4_2', // elemento20
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_4_5_2', // elemento21
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_4_6_2', // elemento22

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_5_2_2', // elemento23
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_5_3_2', // elemento24
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_5_4_2', // elemento25
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_5_5_2', // elemento26
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_5_6_2', // elemento27

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_6_2_2', // elemento28
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_6_3_2', // elemento29
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_6_4_2', // elemento30
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_6_5_2', // elemento31
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_6_6_2', // elemento32
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_6_7_2', // elemento33

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_7_2_2', // elemento34
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_7_3_2', // elemento35
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_7_4_2', // elemento36
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_7_5_2', // elemento37

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_8_2_2', // elemento38
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_8_3_2', // elemento39
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_8_4_2', // elemento40
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_8_5_2', // elemento41
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_8_6_2', // elemento42

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_9_2_2', // elemento43
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_9_3_2', // elemento44
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_9_4_2', // elemento45
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_9_5_2', // elemento46
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_9_6_2', // elemento47

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_10_2_2', // elemento48
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_10_3_2', // elemento49
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_10_4_2', // elemento50
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_10_5_2', // elemento51
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_10_6_2', // elemento52

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_11_2_2', // elemento53
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_11_3_2', // elemento54
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_11_4_2', // elemento55
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_11_5_2', // elemento56
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_11_6_2', // elemento57

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_12_2_2', // elemento58
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_12_3_2', // elemento59
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_12_4_2', // elemento60
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_12_5_2', // elemento61
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_12_6_2', // elemento62
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_12_7_2', // elemento63
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_12_8_2', // elemento64

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_13_2_2', // elemento65
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_13_3_2', // elemento66
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_13_4_2', // elemento67
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_13_5_2', // elemento68
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_13_6_2', // elemento69
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_13_7_2', // elemento70
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_13_8_2', // elemento71

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_14_2_2', // elemento72
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_14_3_2', // elemento73
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_14_4_2', // elemento74
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_14_5_2', // elemento75
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_14_6_2', // elemento76
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_14_7_2', // elemento77
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_14_8_2', // elemento78

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_15_2_2', // elemento79
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_15_3_2', // elemento80
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_15_4_2', // elemento81

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_16_2_2', // elemento82
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_16_3_2', // elemento83
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_16_4_2', // elemento84
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_16_5_2', // elemento85
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_16_6_2', // elemento86
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_16_7_2', // elemento87
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_16_8_2', // elemento88
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_16_9_2', // elemento89
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_16_10_2', // elemento90
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_16_11_2', // elemento91
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_16_12_2', // elemento92
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_16_13_2', // elemento93
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_16_14_2', // elemento94
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_16_15_2' // elemento95
	
	];
	
	Arreglo_resume.generar(numeroElementos, [[0], [0]]);
	var elementosImpresion = Arreglo_resume.codigos[0];
	var elementosValor = Arreglo_resume.codigos[0];
	Arreglo_resume.generar(numeroElementos, [[0], [1]]);
	var elementosTipo = Arreglo_resume.codigos[0];

	var elementosMetodos = [
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 1), Consulta_descarga.ejecuta_2()"', // Metodo 1
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 2), Consulta_descarga.ejecuta_2()"', // Metodo 2
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 3), Consulta_descarga.ejecuta_2()"', // Metodo 3
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 4), Consulta_descarga.ejecuta_2()"', // Metodo 4
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 5), Consulta_descarga.ejecuta_2()"', // Metodo 5
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 6), Consulta_descarga.ejecuta_2()"', // Metodo 6
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 7), Consulta_descarga.ejecuta_2()"', // Metodo 7
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 8), Consulta_descarga.ejecuta_2()"', // Metodo 8
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 9), Consulta_descarga.ejecuta_2()"', // Metodo 9
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 10), Consulta_descarga.ejecuta_2()"', // Metodo 10
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 11), Consulta_descarga.ejecuta_2()"', // Metodo 11
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 12), Consulta_descarga.ejecuta_2()"', // Metodo 12
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 13), Consulta_descarga.ejecuta_2()"', // Metodo 13
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 14), Consulta_descarga.ejecuta_2()"', // Metodo 14
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 15), Consulta_descarga.ejecuta_2()"', // Metodo 15
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 16), Consulta_descarga.ejecuta_2()"', // Metodo 16
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 17), Consulta_descarga.ejecuta_2()"', // Metodo 17
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 18), Consulta_descarga.ejecuta_2()"', // Metodo 18
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 19), Consulta_descarga.ejecuta_2()"', // Metodo 19
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 20), Consulta_descarga.ejecuta_2()"', // Metodo 20
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 21), Consulta_descarga.ejecuta_2()"', // Metodo 21
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 22), Consulta_descarga.ejecuta_2()"', // Metodo 22
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 23), Consulta_descarga.ejecuta_2()"', // Metodo 23
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 24), Consulta_descarga.ejecuta_2()"', // Metodo 24
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 25), Consulta_descarga.ejecuta_2()"', // Metodo 25
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 26), Consulta_descarga.ejecuta_2()"', // Metodo 26
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 27), Consulta_descarga.ejecuta_2()"', // Metodo 27
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 28), Consulta_descarga.ejecuta_2()"', // Metodo 28
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 29), Consulta_descarga.ejecuta_2()"', // Metodo 29
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 30), Consulta_descarga.ejecuta_2()"', // Metodo 30
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 31), Consulta_descarga.ejecuta_2()"', // Metodo 31
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 32), Consulta_descarga.ejecuta_2()"', // Metodo 32
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 33), Consulta_descarga.ejecuta_2()"', // Metodo 33
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 34), Consulta_descarga.ejecuta_2()"', // Metodo 34
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 35), Consulta_descarga.ejecuta_2()"', // Metodo 35
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 36), Consulta_descarga.ejecuta_2()"', // Metodo 36
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 37), Consulta_descarga.ejecuta_2()"', // Metodo 37
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 38), Consulta_descarga.ejecuta_2()"', // Metodo 38
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 39), Consulta_descarga.ejecuta_2()"', // Metodo 39
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 40), Consulta_descarga.ejecuta_2()"', // Metodo 40
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 41), Consulta_descarga.ejecuta_2()"', // Metodo 41
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 42), Consulta_descarga.ejecuta_2()"', // Metodo 42
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 43), Consulta_descarga.ejecuta_2()"', // Metodo 43
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 44), Consulta_descarga.ejecuta_2()"', // Metodo 44
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 45), Consulta_descarga.ejecuta_2()"', // Metodo 45
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 46), Consulta_descarga.ejecuta_2()"', // Metodo 46
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 47), Consulta_descarga.ejecuta_2()"', // Metodo 47
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 48), Consulta_descarga.ejecuta_2()"', // Metodo 48
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 49), Consulta_descarga.ejecuta_2()"', // Metodo 49
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 50), Consulta_descarga.ejecuta_2()"', // Metodo 50
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 51), Consulta_descarga.ejecuta_2()"', // Metodo 51
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 52), Consulta_descarga.ejecuta_2()"', // Metodo 52
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 53), Consulta_descarga.ejecuta_2()"', // Metodo 53
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 54), Consulta_descarga.ejecuta_2()"', // Metodo 54
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 55), Consulta_descarga.ejecuta_2()"', // Metodo 55
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 56), Consulta_descarga.ejecuta_2()"', // Metodo 56
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 57), Consulta_descarga.ejecuta_2()"', // Metodo 57
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 58), Consulta_descarga.ejecuta_2()"', // Metodo 58
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 59), Consulta_descarga.ejecuta_2()"', // Metodo 59
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 60), Consulta_descarga.ejecuta_2()"', // Metodo 60
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 61), Consulta_descarga.ejecuta_2()"', // Metodo 61
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 62), Consulta_descarga.ejecuta_2()"', // Metodo 62
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 63), Consulta_descarga.ejecuta_2()"', // Metodo 63
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 64), Consulta_descarga.ejecuta_2()"', // Metodo 64
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 65), Consulta_descarga.ejecuta_2()"', // Metodo 65
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 66), Consulta_descarga.ejecuta_2()"', // Metodo 66
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 67), Consulta_descarga.ejecuta_2()"', // Metodo 67
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 68), Consulta_descarga.ejecuta_2()"', // Metodo 68
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 69), Consulta_descarga.ejecuta_2()"', // Metodo 69
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 70), Consulta_descarga.ejecuta_2()"', // Metodo 70
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 71), Consulta_descarga.ejecuta_2()"', // Metodo 71
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 72), Consulta_descarga.ejecuta_2()"', // Metodo 72
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 73), Consulta_descarga.ejecuta_2()"', // Metodo 73
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 74), Consulta_descarga.ejecuta_2()"', // Metodo 74
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 75), Consulta_descarga.ejecuta_2()"', // Metodo 75
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 76), Consulta_descarga.ejecuta_2()"', // Metodo 76
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 77), Consulta_descarga.ejecuta_2()"', // Metodo 77
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 78), Consulta_descarga.ejecuta_2()"', // Metodo 78
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 79), Consulta_descarga.ejecuta_2()"', // Metodo 79
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 80), Consulta_descarga.ejecuta_2()"', // Metodo 80
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 81), Consulta_descarga.ejecuta_2()"', // Metodo 81
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 82), Consulta_descarga.ejecuta_2()"', // Metodo 82
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 83), Consulta_descarga.ejecuta_2()"', // Metodo 83
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 84), Consulta_descarga.ejecuta_2()"', // Metodo 84
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 85), Consulta_descarga.ejecuta_2()"', // Metodo 85
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 86), Consulta_descarga.ejecuta_2()"', // Metodo 86
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 87), Consulta_descarga.ejecuta_2()"', // Metodo 87
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 88), Consulta_descarga.ejecuta_2()"', // Metodo 88
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 89), Consulta_descarga.ejecuta_2()"', // Metodo 89
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 90), Consulta_descarga.ejecuta_2()"', // Metodo 90
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 91), Consulta_descarga.ejecuta_2()"', // Metodo 91
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 92), Consulta_descarga.ejecuta_2()"', // Metodo 92
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 93), Consulta_descarga.ejecuta_2()"', // Metodo 93
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 94), Consulta_descarga.ejecuta_2()"', // Metodo 94
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 95), Consulta_descarga.ejecuta_2()"' // Metodo 95
	
	];

	Arreglo_resume.generar(numeroElementos, [[0], ['dato_panel, dato_opcion']]);
	var elementosClass = Arreglo_resume.codigos[0];
	Arreglo_resume.generar(numeroElementos, [[0], ['ID_DATO_PANEL']]);
	var elementosId = Arreglo_resume.codigos[0];

	var elementos = [elementosArea, elementosImpresion, elementosValor, elementosTipo, elementosMetodos, elementosClass, elementosId];
	var Datos_cedulas = new Datos(configuraciones, codigos, elementos);

	// OBJETO Datos_familiares

	var numeroElementos = 52;
	var configuraciones = [numeroElementos];
	var codigos = [''];
	
	var elementosArea = [

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_17_2_2', // elemento96 / 1
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_17_3_2', // elemento97
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_17_4_2', // elemento98
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_17_5_2', // elemento99
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_17_6_2', // elemento100
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_17_7_2', // elemento101 / 6

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_18_2_2', // elemento102 / 7
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_18_3_2', // elemento103
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_18_4_2', // elemento104
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_18_5_2', // elemento105
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_18_6_2', // elemento106
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_18_7_2', // elemento107 / 12
	
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_19_2_2', // elemento108 / 13
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_19_3_2', // elemento109
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_19_4_2', // elemento110
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_19_5_2', // elemento111
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_19_6_2', // elemento112
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_19_7_2', // elemento113
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_19_8_2', // elemento114
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_19_9_2', // elemento115 / 20
	
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_20_2_2', // elemento116 / 21
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_20_3_2', // elemento117
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_20_4_2', // elemento118 / 23

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_21_2_2', // elemento119 / 24
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_21_3_2', // elemento120
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_21_4_2', // elemento121
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_21_5_2', // elemento122
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_21_6_2', // elemento123
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_21_7_2', // elemento124 / 29

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_22_2_2', // elemento125 / 30
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_22_3_2', // elemento126
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_22_4_2', // elemento127
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_22_5_2', // elemento128
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_22_6_2', // elemento129
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_22_7_2', // elemento130 / 35

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_23_2_2', // elemento131 / 36
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_23_3_2', // elemento132
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_23_4_2', // elemento133
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_23_5_2', // elemento134
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_23_6_2', // elemento135
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_23_7_2', // elemento136
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_23_8_2', // elemento137
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_23_9_2', // elemento138
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_23_10_2', // elemento139
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_23_11_2', // elemento140
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_23_12_2', // elemento141 / 46

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_24_2_2', // elemento142 / 47
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_24_3_2', // elemento143
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_24_4_2', // elemento144
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_24_5_2', // elemento145
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_24_6_2', // elemento146
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_24_7_2', // elemento147 / 52

	];
	
	Arreglo_resume.generar(numeroElementos, [[0], [0]]);
	var elementosImpresion = Arreglo_resume.codigos[0];
	var elementosValor = Arreglo_resume.codigos[0];
	Arreglo_resume.generar(numeroElementos, [[0], [1]]);
	var elementosTipo = Arreglo_resume.codigos[0];

	var elementosMetodos = [
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 96), Consulta_descarga.ejecuta_2()"', // Metodo 96
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 97), Consulta_descarga.ejecuta_2()"', // Metodo 97
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 98), Consulta_descarga.ejecuta_2()"', // Metodo 98
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 99), Consulta_descarga.ejecuta_2()"', // Metodo 99
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 100), Consulta_descarga.ejecuta_2()"', // Metodo 100
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 101), Consulta_descarga.ejecuta_2()"',  // Metodo 101
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 102), Consulta_descarga.ejecuta_2()"',  // Metodo 102
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 103), Consulta_descarga.ejecuta_2()"',  // Metodo 103
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 104), Consulta_descarga.ejecuta_2()"',  // Metodo 104
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 105), Consulta_descarga.ejecuta_2()"',  // Metodo 105
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 106), Consulta_descarga.ejecuta_2()"',  // Metodo 106
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 107), Consulta_descarga.ejecuta_2()"',  // Metodo 107

    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 108), Consulta_descarga.ejecuta_2()"',  // Metodo 108
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 109), Consulta_descarga.ejecuta_2()"',  // Metodo 109
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 110), Consulta_descarga.ejecuta_2()"',  // Metodo 110
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 111), Consulta_descarga.ejecuta_2()"',  // Metodo 111
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 112), Consulta_descarga.ejecuta_2()"',  // Metodo 112
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 113), Consulta_descarga.ejecuta_2()"',  // Metodo 113
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 114), Consulta_descarga.ejecuta_2()"',  // Metodo 114
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 115), Consulta_descarga.ejecuta_2()"',  // Metodo 115

    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 116), Consulta_descarga.ejecuta_2()"',  // Metodo 116
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 117), Consulta_descarga.ejecuta_2()"',  // Metodo 117
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 118), Consulta_descarga.ejecuta_2()"',  // Metodo 118

    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 119), Consulta_descarga.ejecuta_2()"',  // Metodo 119
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 120), Consulta_descarga.ejecuta_2()"',  // Metodo 120
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 121), Consulta_descarga.ejecuta_2()"',  // Metodo 121
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 122), Consulta_descarga.ejecuta_2()"',  // Metodo 122
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 123), Consulta_descarga.ejecuta_2()"',  // Metodo 123
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 124), Consulta_descarga.ejecuta_2()"',  // Metodo 124

    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 125), Consulta_descarga.ejecuta_2()"',  // Metodo 125
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 126), Consulta_descarga.ejecuta_2()"',  // Metodo 126
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 127), Consulta_descarga.ejecuta_2()"',  // Metodo 127
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 128), Consulta_descarga.ejecuta_2()"',  // Metodo 128
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 129), Consulta_descarga.ejecuta_2()"',  // Metodo 129
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 130), Consulta_descarga.ejecuta_2()"',  // Metodo 130

    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 131), Consulta_descarga.ejecuta_2()"',  // Metodo 131
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 132), Consulta_descarga.ejecuta_2()"',  // Metodo 132
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 133), Consulta_descarga.ejecuta_2()"',  // Metodo 133
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 134), Consulta_descarga.ejecuta_2()"',  // Metodo 134
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 135), Consulta_descarga.ejecuta_2()"',  // Metodo 135
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 136), Consulta_descarga.ejecuta_2()"',  // Metodo 136
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 137), Consulta_descarga.ejecuta_2()"',  // Metodo 137
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 138), Consulta_descarga.ejecuta_2()"',  // Metodo 138
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 139), Consulta_descarga.ejecuta_2()"',  // Metodo 139
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 140), Consulta_descarga.ejecuta_2()"',  // Metodo 140
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 141), Consulta_descarga.ejecuta_2()"',  // Metodo 141

    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 142), Consulta_descarga.ejecuta_2()"',  // Metodo 142
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 143), Consulta_descarga.ejecuta_2()"',  // Metodo 143
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 144), Consulta_descarga.ejecuta_2()"',  // Metodo 144
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 145), Consulta_descarga.ejecuta_2()"',  // Metodo 145
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 146), Consulta_descarga.ejecuta_2()"',  // Metodo 146
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 147), Consulta_descarga.ejecuta_2()"'  // Metodo 147

	];

	Arreglo_resume.generar(numeroElementos, [[0], ['dato_panel, dato_opcion']]);
	var elementosClass = Arreglo_resume.codigos[0];
	Arreglo_resume.generar(numeroElementos, [[0], ['ID_DATO_PANEL']]);
	var elementosId = Arreglo_resume.codigos[0];

	var elementos = [elementosArea, elementosImpresion, elementosValor, elementosTipo, elementosMetodos, elementosClass, elementosId];
	var Datos_familiares = new Datos(configuraciones, codigos, elementos);

	// OBJETO Datos

	var numeroElementos = 55;
	var configuraciones = [numeroElementos];
	var codigos = [''];
	
	var elementosArea = [

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_25_2_2', // elemento148
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_25_3_2', // elemento149
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_25_4_2', // elemento150
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_25_5_2', // elemento151

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_26_2_2', // elemento152
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_26_3_2', // elemento153
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_26_4_2', // elemento154
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_26_5_2', // elemento155
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_26_6_2', // elemento156
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_26_7_2', // elemento157
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_26_8_2', // elemento158

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_27_2_2', // elemento159
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_27_3_2', // elemento160
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_27_4_2', // elemento161
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_27_5_2', // elemento162
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_27_6_2', // elemento163
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_27_7_2', // elemento164
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_27_8_2', // elemento165

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_28_2_2', // elemento166
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_28_3_2', // elemento167

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_29_2_2', // elemento168
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_29_3_2', // elemento169
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_29_4_2', // elemento170
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_29_5_2', // elemento171
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_29_6_2', // elemento172

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_30_2_2', // elemento173
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_30_3_2', // elemento174
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_30_4_2', // elemento175
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_30_5_2', // elemento176
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_30_6_2', // elemento177

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_31_2_2', // elemento178
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_31_3_2', // elemento179
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_31_4_2', // elemento180
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_31_5_2', // elemento181
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_31_6_2', // elemento182

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_32_2_2', // elemento183
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_32_3_2', // elemento184
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_32_4_2', // elemento185
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_32_5_2', // elemento186
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_32_6_2', // elemento187

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_33_2_2', // elemento188
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_33_3_2', // elemento189
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_33_4_2', // elemento190
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_33_5_2', // elemento191
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_33_6_2', // elemento192

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_34_2_2', // elemento193
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_34_3_2', // elemento194
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_34_4_2', // elemento195
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_34_5_2', // elemento196
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_34_6_2', // elemento197

  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_35_2_2', // elemento198
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_35_3_2', // elemento199
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_35_4_2', // elemento200
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_35_5_2', // elemento201
  	'#ID_TRABAJO_ESCRITORIO_MAQUETA_35_6_2' // elemento202

	];
	
	Arreglo_resume.generar(numeroElementos, [[0], [0]]);
	var elementosImpresion = Arreglo_resume.codigos[0];
	var elementosValor = Arreglo_resume.codigos[0];
	Arreglo_resume.generar(numeroElementos, [[0], [1]]);
	var elementosTipo = Arreglo_resume.codigos[0];

	var elementosMetodos = [

	' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 148), Consulta_descarga.ejecuta_2()"',  // Metodo 148
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 149), Consulta_descarga.ejecuta_2()"',  // Metodo 149
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 150), Consulta_descarga.ejecuta_2()"',  // Metodo 150
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 151), Consulta_descarga.ejecuta_2()"',  // Metodo 151
	
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 152), Consulta_descarga.ejecuta_2()"',  // Metodo 152
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 153), Consulta_descarga.ejecuta_2()"',  // Metodo 153
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 154), Consulta_descarga.ejecuta_2()"',  // Metodo 154
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 155), Consulta_descarga.ejecuta_2()"',  // Metodo 155
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 156), Consulta_descarga.ejecuta_2()"',  // Metodo 156
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 157), Consulta_descarga.ejecuta_2()"',  // Metodo 157
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 158), Consulta_descarga.ejecuta_2()"',  // Metodo 158
	
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 159), Consulta_descarga.ejecuta_2()"',  // Metodo 159
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 160), Consulta_descarga.ejecuta_2()"',  // Metodo 160
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 161), Consulta_descarga.ejecuta_2()"',  // Metodo 161
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 162), Consulta_descarga.ejecuta_2()"',  // Metodo 162
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 163), Consulta_descarga.ejecuta_2()"',  // Metodo 163
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 164), Consulta_descarga.ejecuta_2()"',  // Metodo 164
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 165), Consulta_descarga.ejecuta_2()"',  // Metodo 165
	
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 166), Consulta_descarga.ejecuta_2()"',  // Metodo 166
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 167), Consulta_descarga.ejecuta_2()"',  // Metodo 167
	
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 168), Consulta_descarga.ejecuta_2()"',  // Metodo 168
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 169), Consulta_descarga.ejecuta_2()"',  // Metodo 169
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 170), Consulta_descarga.ejecuta_2()"',  // Metodo 170
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 171), Consulta_descarga.ejecuta_2()"',  // Metodo 171
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 172), Consulta_descarga.ejecuta_2()"',  // Metodo 172
	
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 173), Consulta_descarga.ejecuta_2()"',  // Metodo 173
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 174), Consulta_descarga.ejecuta_2()"',  // Metodo 174
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 175), Consulta_descarga.ejecuta_2()"',  // Metodo 175
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 176), Consulta_descarga.ejecuta_2()"',  // Metodo 176
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 177), Consulta_descarga.ejecuta_2()"',  // Metodo 177
	
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 178), Consulta_descarga.ejecuta_2()"',  // Metodo 178
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 179), Consulta_descarga.ejecuta_2()"',  // Metodo 179
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 180), Consulta_descarga.ejecuta_2()"',  // Metodo 180
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 181), Consulta_descarga.ejecuta_2()"',  // Metodo 181
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 182), Consulta_descarga.ejecuta_2()"',  // Metodo 182
	
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 183), Consulta_descarga.ejecuta_2()"',  // Metodo 183
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 184), Consulta_descarga.ejecuta_2()"',  // Metodo 184
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 185), Consulta_descarga.ejecuta_2()"',  // Metodo 185
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 186), Consulta_descarga.ejecuta_2()"',  // Metodo 186
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 187), Consulta_descarga.ejecuta_2()"',  // Metodo 187
	
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 188), Consulta_descarga.ejecuta_2()"',  // Metodo 188
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 189), Consulta_descarga.ejecuta_2()"',  // Metodo 189
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 190), Consulta_descarga.ejecuta_2()"',  // Metodo 190
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 191), Consulta_descarga.ejecuta_2()"',  // Metodo 191
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 192), Consulta_descarga.ejecuta_2()"',  // Metodo 192
	
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 193), Consulta_descarga.ejecuta_2()"',  // Metodo 193
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 194), Consulta_descarga.ejecuta_2()"',  // Metodo 194
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 195), Consulta_descarga.ejecuta_2()"',  // Metodo 195
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 196), Consulta_descarga.ejecuta_2()"',  // Metodo 196
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 197), Consulta_descarga.ejecuta_2()"',  // Metodo 197
	
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 198), Consulta_descarga.ejecuta_2()"',  // Metodo 198
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 199), Consulta_descarga.ejecuta_2()"',  // Metodo 199
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 200), Consulta_descarga.ejecuta_2()"',  // Metodo 200
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 201), Consulta_descarga.ejecuta_2()"',  // Metodo 201
    ' ONCLICK="Modal_resume.abrefijo(), Consulta_descarga.actualizafiltro(3, 202), Consulta_descarga.ejecuta_2()"'  // Metodo 202
	
	];

	Arreglo_resume.generar(numeroElementos, [[0], ['dato_panel, dato_opcion']]);
	var elementosClass = Arreglo_resume.codigos[0];
	Arreglo_resume.generar(numeroElementos, [[0], ['ID_DATO_PANEL']]);
	var elementosId = Arreglo_resume.codigos[0];

	var elementos = [elementosArea, elementosImpresion, elementosValor, elementosTipo, elementosMetodos, elementosClass, elementosId];
	var Datos_familiares_2 = new Datos(configuraciones, codigos, elementos);







/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////


	// OBJETO Datos PARA TITULOS DE CEDULAS


/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////








	var numeroElementos = 16;
	var configuraciones = [numeroElementos];
	var codigos = [''];
	var elemento01 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_2_1';
	var elemento02 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_3_1';
	var elemento03 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_4_1';
	var elemento04 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_5_1';
	var elemento05 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_6_1';
	var elemento06 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_7_1';
	var elemento07 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_8_1';
	var elemento08 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_9_1';
	var elemento09 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_10_1';
	var elemento10 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_11_1';
	var elemento11 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_12_1';
	var elemento12 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_12_7_1';
	var elemento13 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_13_1';
	var elemento14 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_14_1';
	var elemento15 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_15_1';
	var elemento16 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_16_1';
	var elementosArea = [elemento01, elemento02, elemento03, elemento04, elemento05, elemento06, elemento07, elemento08, elemento09, elemento10, elemento11, elemento12, elemento13, elemento14, elemento15, elemento16];
	var elementosImpresion = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
	var elemen01 = 'CEDULAS CON<BR>TECHO';
	var elemen02 = 'CEDULAS CON<BR>PARED';
	var elemen03 = 'CEDULAS CON<BR>PISO';
	var elemen04 = 'CEDULAS CON<BR>AGUA DE USO';
	var elemen05 = 'CEDULAS CON<BR>AGUA DE CONSUMO';
	var elemen06 = 'CEDULAS CON<BR>EXCRETA';
	var elemen07 = 'CEDULAS CON<BR>COMBUSTIBLE';
	var elemen08 = 'CEDULAS CON<BR>BASURA';
	var elemen09 = 'CEDULAS CON<BR>ALUMBRADO';
	var elemen10 = 'CEDULAS CON<BR>DISTRIBUCIÓN HABITACIONAL';
	var elemen11 = 'CEDULAS CON<BR>HABITACIONES';
	var elemen12 = 'Total Habitaciones:';
	var elemen13 = 'CEDULAS CON<BR>PUEBLO INDÍGENA';
	var elemen14 = 'CEDULAS CON<BR>DERECHOHABIENCIA';
	var elemen15 = 'MASCOTAS';
	var elemen16 = 'CEDULAS CON<BR>SISTEMA DE SALUD';
	var elementosValor = [elemen01, elemen02, elemen03, elemen04, elemen05, elemen06, elemen07, elemen08, elemen09, elemen10, elemen11, elemen12, elemen13, elemen14, elemen15, elemen16];
	var elementosTipo = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
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
	var elementosMetodos = [elemenMe01, elemenMe02, elemenMe03, elemenMe04, elemenMe05, elemenMe06, elemenMe07, elemenMe08, elemenMe09, elemenMe10, elemenMe11, elemenMe12, elemenMe13, elemenMe14, elemenMe15, elemenMe16];
	var elemCl01 = '';
	var elemCl02 = '';
	var elemCl03 = '';
	var elemCl04 = '';
	var elemCl05 = '';
	var elemCl06 = '';
	var elemCl07 = '';
	var elemCl08 = '';
	var elemCl09 = '';
	var elemCl10 = '';
	var elemCl11 = '';
	var elemCl12 = '';
	var elemCl13 = '';
	var elemCl14 = '';
	var elemCl15 = '';
	var elemCl16 = '';
	var elementosClass = [elemCl01, elemCl02, elemCl03, elemCl04, elemCl05, elemCl06, elemCl07, elemCl08, elemCl09, elemCl10, elemCl11, elemCl12, elemCl13, elemCl14, elemCl15, elemCl16];
	var elemId01 = 'ID_DATO_PANEL_T';
	var elemId02 = 'ID_DATO_PANEL_T';
	var elemId03 = 'ID_DATO_PANEL_T';
	var elemId04 = 'ID_DATO_PANEL_T';
	var elemId05 = 'ID_DATO_PANEL_T';
	var elemId06 = 'ID_DATO_PANEL_T';
	var elemId07 = 'ID_DATO_PANEL_T';
	var elemId08 = 'ID_DATO_PANEL_T';
	var elemId09 = 'ID_DATO_PANEL_T';
	var elemId10 = 'ID_DATO_PANEL_T';
	var elemId11 = 'ID_DATO_PANEL_T';
	var elemId12 = 'ID_DATO_PANEL_T_E';
	var elemId13 = 'ID_DATO_PANEL_T';
	var elemId14 = 'ID_DATO_PANEL';
	var elemId15 = 'ID_DATO_PANEL';
	var elemId16 = 'ID_DATO_PANEL';
	var elementosId = [elemId01, elemId02, elemId03, elemId04, elemId05, elemId06, elemId07, elemId08, elemId09, elemId10, elemId11, elemId12, elemId13, elemId14, elemId15, elemId16];
	var elementos = [elementosArea, elementosImpresion, elementosValor, elementosTipo, elementosMetodos, elementosClass, elementosId];
	var Datos_titulos_cedulas = new Datos(configuraciones, codigos, elementos);

// OBJETO Datos PARA TITULOS DE PERSONAS

	var numeroElementos = 16;
	var configuraciones = [numeroElementos];
	var codigos = [''];
	var elemento01 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_2_1';
	var elemento02 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_3_1';
	var elemento03 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_4_1';
	var elemento04 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_5_1';
	var elemento05 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_6_1';
	var elemento06 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_7_1';
	var elemento07 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_8_1';
	var elemento08 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_9_1';
	var elemento09 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_10_1';
	var elemento10 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_11_1';
	var elemento11 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_12_1';
	var elemento12 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_12_7_1';
	var elemento13 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_13_1';
	var elemento14 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_14_1';
	var elemento15 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_15_1';
	var elemento16 = '#ID_TRABAJO_ESCRITORIO_MAQUETA_16_1';
	var elementosArea = [elemento01, elemento02, elemento03, elemento04, elemento05, elemento06, elemento07, elemento08, elemento09, elemento10, elemento11, elemento12, elemento13, elemento14, elemento15, elemento16];
	var elementosImpresion = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
	var elemen01 = 'PERSONAS EN CEDULAS CON<BR>TECHO';
	var elemen02 = 'PERSONAS EN CEDULAS CON<BR>PARED';
	var elemen03 = 'PERSONAS EN CEDULAS CON<BR>PISO';
	var elemen04 = 'PERSONAS EN CEDULAS CON<BR>AGUA DE USO';
	var elemen05 = 'PERSONAS EN CEDULAS CON<BR>AGUA DE CONSUMO';
	var elemen06 = 'PERSONAS EN CEDULAS CON<BR>EXCRETA';
	var elemen07 = 'PERSONAS EN CEDULAS CON<BR>COMBUSTIBLE';
	var elemen08 = 'PERSONAS EN CEDULAS CON<BR>BASURA';
	var elemen09 = 'PERSONAS EN CEDULAS CON<BR>ALUMBRADO';
	var elemen10 = 'PERSONAS EN CEDULAS CON<BR>DISTRIBUCIÓN HABITACIONAL';
	var elemen11 = 'PERSONAS EN CEDULAS CON<BR>HABITACIONES';
	var elemen12 = 'Con Habitaciones:';
	var elemen13 = 'PERSONAS EN CEDULAS CON<BR>PUEBLO INDÍGENA';
	var elemen14 = 'PERSONAS EN CEDULAS CON<BR>DERECHOHABIENCIA';
	var elemen15 = 'PERSONAS EN CEDULAS CON<BR>MASCOTAS';
	var elemen16 = 'PERSONAS EN CEDULAS CON<BR>SISTEMA DE SALUD';
	var elementosValor = [elemen01, elemen02, elemen03, elemen04, elemen05, elemen06, elemen07, elemen08, elemen09, elemen10, elemen11, elemen12, elemen13, elemen14, elemen15, elemen16];
	var elementosTipo = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
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
	var elementosMetodos = [elemenMe01, elemenMe02, elemenMe03, elemenMe04, elemenMe05, elemenMe06, elemenMe07, elemenMe08, elemenMe09, elemenMe10, elemenMe11, elemenMe12, elemenMe13, elemenMe14, elemenMe15, elemenMe16];
	var elemCl01 = '';
	var elemCl02 = '';
	var elemCl03 = '';
	var elemCl04 = '';
	var elemCl05 = '';
	var elemCl06 = '';
	var elemCl07 = '';
	var elemCl08 = '';
	var elemCl09 = '';
	var elemCl10 = '';
	var elemCl11 = '';
	var elemCl12 = '';
	var elemCl13 = '';
	var elemCl14 = '';
	var elemCl15 = '';
	var elemCl16 = '';
	var elementosClass = [elemCl01, elemCl02, elemCl03, elemCl04, elemCl05, elemCl06, elemCl07, elemCl08, elemCl09, elemCl10, elemCl11, elemCl12, elemCl13, elemCl14, elemCl15, elemCl16];
	var elemId01 = 'ID_DATO_PANEL_T';
	var elemId02 = 'ID_DATO_PANEL_T';
	var elemId03 = 'ID_DATO_PANEL_T';
	var elemId04 = 'ID_DATO_PANEL_T';
	var elemId05 = 'ID_DATO_PANEL_T';
	var elemId06 = 'ID_DATO_PANEL_T';
	var elemId07 = 'ID_DATO_PANEL_T';
	var elemId08 = 'ID_DATO_PANEL_T';
	var elemId09 = 'ID_DATO_PANEL_T';
	var elemId10 = 'ID_DATO_PANEL_T';
	var elemId11 = 'ID_DATO_PANEL_T';
	var elemId12 = 'ID_DATO_PANEL_T_E';
	var elemId13 = 'ID_DATO_PANEL_T';
	var elemId14 = 'ID_DATO_PANEL_T';
	var elemId15 = 'ID_DATO_PANEL_T';
	var elemId16 = 'ID_DATO_PANEL_T';
	var elementosId = [elemId01, elemId02, elemId03, elemId04, elemId05, elemId06, elemId07, elemId08, elemId09, elemId10, elemId11, elemId12, elemId13, elemId14, elemId15, elemId16];
	var elementos = [elementosArea, elementosImpresion, elementosValor, elementosTipo, elementosMetodos, elementosClass, elementosId];
	var Datos_titulos_personas = new Datos(configuraciones, codigos, elementos);

// OBJETO Option ID_DATOS_OPTION

	var inglesElementos = ['CEDULAS', 'PERSONAS', 'CEDULAS Y PERSONAS'];
	var inglesIdioma = ['DATOS DE ARCHIVO:', inglesElementos];
	var espanolElementos = ['CEDULAS', 'PERSONAS', 'CEDULAS Y PERSONAS'];
	var espanolIdioma = ['DATOS DE ARCHIVO:', espanolElementos];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 3;
	var tipoImpresion = 0;
	var etiquetaRadio = 1;
	var renglon01 = ['', 0];
	var elementosEspeciales = [];
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, etiquetaRadio, elementosEspeciales];
	var etiquetas = ['radio_group', 'ID_DATOS_OPTION', '#ID_TRABAJO_ESCRITORIO_MAQUETA_1', 'select_datos'];
	var codigos = [''];
	var elementosValor = [1, 2, 3];
	var elementosMetodos = [' ONCHANGE="Radio_datos.actualizavalor(0), Metodos_cambia_datos.ejecuta(), Datos_titulos_cedulas.imprime_directo()"', ' ONCHANGE="Radio_datos.actualizavalor(1), Metodos_cambia_datos.ejecuta(), Datos_titulos_personas.imprime_directo()"', ' ONCHANGE="Radio_datos.actualizavalor(2), Metodos_cambia_datos.ejecuta(), Datos_titulos_personas.imprime_directo()"'];
	var elementos = [elementosValor, elementosMetodos];
	var valores = [1, 1];
	var metodos = [''];
	var Radio_datos = new Radio(configuraciones, etiquetas, codigos, elementos, valores, metodos);
	Radio_datos.generahtml();
	Radio_datos.imprimehtml();

// OBJETO Metodos
	var numeroConsultas = 4;
	var configiraciones = numeroConsultas;
	var codigos = [''];
	var elementos = [
	'Consulta_estadisticas.actualizafiltro(2, Radio_datos.valores[1])',
	'Consulta_estadisticas_familiares.actualizafiltro(2, Radio_datos.valores[1])',
	'Consulta_estadisticas_familiares_2.actualizafiltro(2, Radio_datos.valores[1])',
	'Consulta_descarga.actualizafiltro(2, Radio_datos.valores[1])',
	'Modal_resume.abrefijo()', 'Consulta_estadisticas.ejecuta()'
	];
	var Metodos_cambia_datos = new Metodos(configuraciones, codigos, elementos);

// OBJETO Link PARA DESCARGAR ARCHIVO
	
	var inglesIdioma = ["DOWNLOAD FILE"];
	var espanolIdioma = ["DOWNLOAD FILE"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 1;
	var link = "../descargas/krampuz_"+usuarioID+".php";
	var configuraciones = [controlIdioma, tipoImpresion, link];
	var etiquetas = ["descarga_link elemento_oculto", "ID_DESCARGA_LINK", "#ID_TRABAJO_ESCRITORIO_MAQUETA_1", "download_file"];
	var codigos = [""];
	var metodos = [""];
	var Descarga_file = new Link(configuraciones, etiquetas, codigos, metodos);
	Descarga_file.generahtml();
	Descarga_file.imprimehtml();

// OBJETO Consulta 
	var numeroConsultas = 5;
	var scriptPhp = 'consulta_estadisticas.php';
	var metodoPhp = 'POST';
	var filtro = [Select_municipios.valores[1], Select_localidades.valores[1], Radio_datos.valores[1]];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_consulta.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 0, 0, 0];
	var configuraciones = [numeroConsultas, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_estadisticas = new Consulta(configuraciones, codigos, elementos);

// OBJETO Consulta 
	var numeroConsultas = 5;
	var scriptPhp = 'consulta_estadisticas_familiares.php';
	var metodoPhp = 'POST';
	var filtro = [Select_municipios.valores[1], Select_localidades.valores[1], Radio_datos.valores[1]];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_consulta_familiares.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 0, 0, 0];
	var configuraciones = [numeroConsultas, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_estadisticas_familiares = new Consulta(configuraciones, codigos, elementos);

// OBJETO Consulta 
	var numeroConsultas = 5;
	var scriptPhp = 'consulta_estadisticas_familiares_2.php';
	var metodoPhp = 'POST';
	var filtro = [Select_municipios.valores[1], Select_localidades.valores[1], Radio_datos.valores[1]];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_consulta_familiares_2.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 0, 0, 0];
	var configuraciones = [numeroConsultas, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_estadisticas_familiares_2 = new Consulta(configuraciones, codigos, elementos);

// OBJETO Metodos
	var numeroMetodos = 1;
	var configiraciones = numeroMetodos;
	var codigos = [''];
	var elementos = [
	'Modal_resume.cierra()',
	'Datos_cedulas.imprime(Consulta_estadisticas.codigos[0])',
	'Modal_resume.abrefijo()',
	'Consulta_estadisticas_familiares.ejecuta()'
	];
	var Metodos_consulta = new Metodos(configuraciones, codigos, elementos);

// OBJETO Metodos
	var numeroMetodos = 1;
	var configiraciones = numeroMetodos;
	var codigos = [''];
	var elementos = [
	'Modal_resume.cierra()',
	'Datos_familiares.imprime(Consulta_estadisticas_familiares.codigos[0])',
	'Modal_resume.abrefijo()',
	'Consulta_estadisticas_familiares_2.ejecuta()'
	];
	var Metodos_consulta_familiares = new Metodos(configuraciones, codigos, elementos);

// OBJETO Metodos
	var numeroMetodos = 1;
	var configiraciones = numeroMetodos;
	var codigos = [''];
	var elementos = [
	'Modal_resume.cierra()',
	'Datos_familiares_2.imprime(Consulta_estadisticas_familiares_2.codigos[0])'
	];
	var Metodos_consulta_familiares_2 = new Metodos(configuraciones, codigos, elementos);

// OBJETO Consulta 
	var numeroConsultas = 1;
	var scriptPhp = 'consulta_descarga.php';
	var metodoPhp = 'POST';
	var filtro = [Select_municipios.valores[1], Select_localidades.valores[1], Radio_datos.valores[1], 0];
	var posicionCallback = 0;
	var metodosCallback01 = ['Metodos_descarga.ejecuta()'];
	var metodosCallback = [metodosCallback01]; 
	var callback = [posicionCallback, metodosCallback];
	var lotes = [0, 5000, 0, 0];
	var configuraciones = [numeroConsultas, scriptPhp, metodoPhp, filtro, callback, lotes];
	var codigos = ['', ''];
	var elementos = [''];	
	var Consulta_descarga = new Consulta(configuraciones, codigos, elementos);

// OBJETO Metodos
	var numeroMetodos = 2;
	var configiraciones = numeroMetodos;
	var codigos = [''];
	var elementos = ['Modal_resume.cierra()', 'document.getElementById("ID_DESCARGA_LINK").click()', 'console.log(Consulta_descarga.codigos[0])'];
	var Metodos_descarga = new Metodos(configuraciones, codigos, elementos);

// OBJETO Toggle 
//	var numeroElementos = 1;
//	var configuraciones = [numeroElementos];
//	var elementosHtml = ['ID_GEN_MODAL'];
//	var elementosClases = [['modal_oculto', 'modal_activo']];
//	var elementos = [elementosHtml, elementosClases];	
//	var Toggle_modal = new Toggle(configuraciones, elementos);

// OBJETO 7 Modal ID_SDHYBC_MODAL ventana modal de esta pantalla
	var inglesIdioma = [""];
	var espanolIdioma = [""];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var tipoImpresion = 1;
	var botonCerrar = "";
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, botonCerrar];
	var etiquetas = ["ventana_modal", "ID_SDHYBC_MODAL", "#ID_SDHYBC_RESUME_BODY", "#ID_SDHYBC_MODAL_TITULO", "#ID_SDHYBC_MODAL_AVISO"];
	var codigos = [""];
	var Modal_resume = new Modal(configuraciones, etiquetas, codigos);
	Modal_resume.generahtml();
	Modal_resume.imprimehtml();

// OBJETO 3 Maqueta MAQUETA_SDHYBC maqueta principal de 5 posiciones
	
	var inglesIdioma = ["AUTHENTICATION ERROR", "WARNING TEXT", ""];
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
	var Maqueta_resume_modal = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	Maqueta_resume_modal.generahtml();
	Maqueta_resume_modal.imprimehtml();

</script>