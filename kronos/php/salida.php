<?php
// VINCULAMOS CLASES PHP
	require_once "../../pantalib/php/objetos/new/Sistema.php";
	require_once "../../pantalib/php/objetos/new/User.php";
	require_once "../../pantalib/php/objetos/new/Log.php";
	require_once "../../pantalib/php/objetos/new/Session.php";
	session_start();
	if (!isset($_SESSION['Sistema'])) {
		header('Location: ../cryona__kronos.php');
	}
	header('Content-Type: text/html; charset=UTF-8');

// ESTABLECEMOS PARAMETROS DE LOG
$_SESSION['logPhp']->configuraciones[2] = '../logs/';

// LOGEAMOS INICIO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS salida.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
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
		<title>KRONOS</title>
        <link rel="icon" href="../icons8-favicon.gif" type="image/x-icon">
		<link rel="stylesheet" href="../../pantalib/css/kronos.css">
		<link rel="stylesheet" href="../../pantalib/fontawesome/css/all.css">
		<script src="../../pantalib/jquery/jquery.js"></script>
		<script src="../../pantalib/javascript/objetos/new/System.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Pantalla.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Maqueta.js"></script>
		<script src="../../pantalib/javascript/objetos/new/Session.js"></script>
    </head>
    <body class="maqueta_base" id="ID_KRONOS_SALIDA_BODY">
        SESIÓN CERRADA KRONOS  
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
	var usuarioName = <?php echo json_encode($_SESSION['User'] -> elementos[0][1]." ".$_SESSION['User'] -> elementos[0][2]." ".$_SESSION['User'] -> elementos[0][3]); ?>;
	var usuarioStatus = <?php echo json_encode($_SESSION['User'] -> elementos[0][6]); ?>;

// ****************************************************************
// ****************************************************************
// ESTABLECE SISTEMA 
// ****************************************************************
// ****************************************************************

// OBEJTO 1 Sistema "kronos"

	var Sistema_kronos = new System(sistema_id, sistema_tech_name, 'KRONOS', 'pAntalasa Software', '');

// ****************************************************************
// ****************************************************************
// ESTABLECE PANTALLA
// ****************************************************************
// ****************************************************************

// OBEJTO 2 Pantalla "KRONOS SALIDA"

	var objetos_pantalla = [];
	var dimensiones = [];
	var configuraciones = [dimensiones];
	var Pantalla_kronos_gen = new Pantalla(idioma, 10, "salida.php", "KRONOS SALIDA", "", "", objetos_pantalla, "", Sistema_kronos, "../salida.php", configuraciones);

// ****************************************************************
// ****************************************************************
// MAQUETA PRINCIPAL
// ****************************************************************
// ****************************************************************

// OBJETO 3 Maqueta ID_GEN_MAQUETA maqueta principal de 5 posiciones
	
    var inglesIdioma = ["SESIÓN CERRADA KRONOS AHORA PUEDE CERRAR LA PESTAÑA DEL NAVEGADOR"];
	var espanolIdioma = ["SESIÓN CERRADA KRONOS AHORA PUEDE CERRAR LA PESTAÑA DEL NAVEGADOR"];
	var arregloIdioma = [inglesIdioma, espanolIdioma];
	var controlIdioma = [idioma, arregloIdioma];
	var numeroElementos = 1;
	var tipoImpresion = 0;
	var sentidoImpresion = 0;
	var configuraciones = [controlIdioma, numeroElementos, tipoImpresion, sentidoImpresion];
	var etiquetas = ["maqueta_01", "ID_GEN_MAQUETA", "#ID_KRONOS_SALIDA_BODY"];
	var codigos = [""];
	var elementosClass = ["area_cinta"];
	var elementosId = ["ID_GEN_STATUS"];
	var elementos = [elementosClass, elementosId];
	var maqueta_01 = new Maqueta(configuraciones, etiquetas, codigos, elementos);
	maqueta_01.generahtml();
	maqueta_01.imprimehtml();
	Pantalla_kronos_gen.objetos.push(maqueta_01);

// CLASE........: Session
// INSTANCIA....: Session_cerrar
// DESCRIPCION..: Session para cerrar session de PHP

    var statusSession = 0;
	var scriptPhp = ['session_cierra_kronos.php', 'session_abre_kronos.php'];
	var metodoPhp = 'POST';
	var configuraciones = [statusSession, scriptPhp, metodoPhp];
	var codigos = [''];
	var Session_cierra = new Session(configuraciones, codigos);
    Session_cierra.cierra();

</script>
