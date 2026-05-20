<?php
// VINCULAMOS CLASES
    require_once "../../pantalib/php/objetos/new/Sistema.php";
    require_once "Conexion_sdhybc.php";
    //require_once "../../pantalib/php/objetos/new/Conexion_sdhybc.php";
    require_once "../../pantalib/php/objetos/new/Consulta.php";
    require_once "../../pantalib/php/objetos/new/Log.php";
    session_start();
	header( 'Content-type: text/html; charset=utf-8' );

// ESTABLECEMOS PARAMETROS DE LOG
	$_SESSION['logPhp']->configuraciones[2] = '../logs/';

// LOGEAMOS INICIO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS select_localidades_cedulas.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

// REVISAMOS, BAJAMOS Y ESTABLECEMOS VARIABLES A PARTIR DE VARIABLES POST

    $switch_filtro = $_POST['filtro_xx'];
    if ($_POST['todosregistros_xx']==1) {
        $switch_filtro = 0;
    }     

// HACEMOS INSTANCIA DEL OBJETO Consulta	
    $numero_elementos = 2;
    $tables = ["cedula"];
    $parametro01 = [0, [[0, "MunicipioNom", 0, $_POST['etiqueta_0'], 0]], 0];
    $lista_parametros = [$parametro01];
    $where = [$switch_filtro, $lista_parametros]; 
    $order_order = 0;
    $order_elementos = ['MunicipioNom', 'LocalidadNom'];
    $order = [1, $order_order, $order_elementos];
    $sistema = $_SESSION['Sistema'];
    $status = 0;
    $tipo = 1;
    $limites = [0, 0, 0, 0, 0, 0];
    $registros = 0;
    $excell = [0, '', 0, '', '', '', '', ''];
    $nombre = 'INST:: consultalocalidad';
    $recupera = 0;
    $configuraciones = [$numero_elementos, $tables, $where, $order, $sistema, $_SESSION['bd'], $status, $tipo, $limites, $registros, $excell, $nombre, $recupera];
    $codigos = ['', '', [], '', '', ''];
    $elementos_campos = ['DISTINCT MunicipioNom', 'LocalidadNom'];
    $elementos_nombres = ['municipio_nom', 'localidad_nom'];
    $elementos_tipos = [1, 1];
    $elementos = [$elementos_campos, $elementos_nombres, $elementos_tipos];
    $consultalocalidad = new Consulta($configuraciones, $codigos, $elementos);

// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
    $consultalocalidad->construye();

// LOGEAMOS TERMINO
    $_SESSION['logPhp']->configuraciones[1] = ' ';
    $_SESSION['logPhp']->escribe_log();
    $_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
    $_SESSION['logPhp']->escribe_log();
    $_SESSION['logPhp']->escribe_log();
    $_SESSION['logPhp']->configuraciones[1] = $consultalocalidad->codigos[0];
    $_SESSION['logPhp']->escribe_log();
    $_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
    $_SESSION['logPhp']->escribe_log();
    $_SESSION['logPhp']->escribe_log();
    $_SESSION['logPhp']->configuraciones[1] = ' ';
    $_SESSION['logPhp']->escribe_log();

// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
    $consultalocalidad->ejecuta();

// RETORNAMOS VARIABLE codigos[1] DEL PRIMER OBJETO Consulta	
    echo $consultalocalidad->codigos[1];

// LOGEAMOS TERMINO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $consultalocalidad->codigos[1];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

// LOGEAMOS TERMINO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' TERMINAMOS select_localidades_cedulas.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
