<?php
	require_once "../../pantalib/php/objetos/new/Sistema.php";
	require_once "../../pantalib/php/objetos/new/User.php";
	require_once "../../pantalib/php/objetos/new/Consulta.php";
	require_once "../../pantalib/php/objetos/new/Log.php";
	require_once "Conexion_comerciosolidario.php";
	header('Content-Type: text/html; charset=UTF-8');
	session_start();

// INICIA PROCESO PARA ESTABLECER SISTEMA
	$configuraciones = [11, 'comerciosolidario', 1, 'http://localhost/pantalasa/comerciosolidario/', 1];
	$_SESSION['Sistema'] = new Sistema($configuraciones);

// INICIA PROCESO PARA ESTABLECER LOG DE PHP
	$archivo_log = 'karmela.txt';
	$mensaje_log = date('Y-m-d H:i:s').' ESTABLECEMOS LOG PHP EN FLUJO PRINCIPAL';
	$ruta_log = '../logs/';
	$sistema_log = $_SESSION['Sistema'];
	$configuraciones = [$archivo_log, $mensaje_log, $ruta_log, $sistema_log];
	$_SESSION['logPhp'] = new Log($configuraciones);
	$_SESSION['logPhp']->escribe_log();

//	$_SESSION['prueba'] = "que pedo";

// INICIA PROCESO PARA ESTABLECER CONEXIÓN DE BD
$_SESSION['bd'] = new Conexion_comerciosolidario();

// LOGEAMOS INICIO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS prepara_actualiza_clave.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

// REVISAMOS, BAJAMOS Y ESTABLECEMOS VARIABLES A PARTIR DE VARIABLES GET

$_SESSION['token'] = $_GET['token'];
$_SESSION['expira'] = $_GET['tokenexpira'];

// CONFIGURAMOS LOS FILTROS
$lista_parametros = [];
$lista_parametros[] = [0, [[0, "usuarios.token", 0, $_SESSION['token'], 0]], 0];
$lista_parametros[] = [0, [[0, "usuarios.tokenexpira", 7, '', 0]], 0];

// HACEMOS INSTANCIA DEL OBJETO Consulta PARA GRABAR FAMILIAR EN BD	
$numero_elementos = 1;
$tables = ["usuarios"];
$where = [1, $lista_parametros]; 
$order_order = 0;
$order_elementos = [];
$order = [0, 0, []];
$sistema = $_SESSION['Sistema'];
$status = 0;
$tipo = 1;
$limites = [0, 0, 0, 0, 0, 0];
$registros = 0;
$excell = [0, '', 0, '', '', '', '', ''];
$nombre = 'INST::: verificatoken';
$recupera = 0;
$configuraciones = [$numero_elementos, $tables, $where, $order, $sistema, $_SESSION['bd'], $status, $tipo, $limites, $registros, $excell, $nombre, $recupera];
$codigos = ['', '', [], '', '', ''];
$elementos_campos = ['COUNT(*)'];
$elementos_nombres = ['dato_1'];
$elementos_tipos = [1];
$elementos_valores = [''];
$elementos = [$elementos_campos, $elementos_nombres, $elementos_tipos, $elementos_valores];

$verificatoken = new Consulta($configuraciones, $codigos, $elementos);

// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$verificatoken->construye();

// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' prepara_actualiza_clave.php CONSULTA';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $verificatoken->codigos[0];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();

// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$verificatoken->ejecuta();

// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' prepara_actualiza_clave.php CONSULTA';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $verificatoken->codigos[1];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();

// LOGEAMOS 
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'prepara_actualiza_clave.php: ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $_SESSION['token'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $_SESSION['expira'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

// Cadena JSON
$json_string = $verificatoken->codigos[1];

// Decodificar la cadena JSON a un objeto PHP
$json_object = json_decode($json_string);

// Acceder a los valores
if ($json_object !== null) {
    if ($json_object[1]->dato_1 == 1) {
        echo "<script>window.location.href='actualiza.php';</script>";
        exit();
    }
    else {
        echo "<script>window.location.href='nodisponible.php';</script>";
        exit();
    }
} 
else {
    echo "Error en la conversión de JSON.";
}
