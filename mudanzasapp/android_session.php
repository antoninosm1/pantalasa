<?php
	require_once "../../pantalib/php/objetos/new/Sistema.php";
	require_once "../../pantalib/php/objetos/new/User.php";
	require_once "../../pantalib/php/objetos/new/Log.php";
	require_once "php/Conexion_mudanzas.php";
	require_once "../../pantalib/php/objetos/new/Session.php";
	header('Content-Type: text/html; charset=UTF-8');
	session_start();

// INICIA PROCESO PARA ESTABLECER SISTEMA
//	$configuraciones = [10, 'sdhybc', 1, 'http://localhost/pantalasa/sdhybcintegral/', 1];
	$configuraciones = [10, 'mudanzas', 1, 'https://fronterapalestina.org/desarrollos/mudanzas/app/', 1];
	$_SESSION['Sistema'] = new Sistema($configuraciones);

// INICIA PROCESO PARA ESTABLECER LOG DE PHP
	$archivo_log = 'karmela.txt';
	$mensaje_log = date('Y-m-d H:i:s').' ESTABLECEMOS LOG PHP EN FLUJO PRINCIPAL DE ANDROID SISTEMA MUDANZAS';
	$ruta_log = 'logs/';
	$sistema_log = $_SESSION['Sistema'];
	$configuraciones = [$archivo_log, $mensaje_log, $ruta_log, $sistema_log];
	$_SESSION['logPhp'] = new Log($configuraciones);
	$_SESSION['logPhp']->escribe_log();

// INICIA PROCESO PARA ESTABLECER SESSION
	$configuraciones = [1];
	$_SESSION['session'] = new Session($configuraciones);

// INICIA PROCESO PARA ESTABLECER CONEXIÓN DE BD
	$_SESSION['bd'] = new Conexion_mudanzas();

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
?>
