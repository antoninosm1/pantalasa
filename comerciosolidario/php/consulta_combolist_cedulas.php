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
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS consulta_combolist_cedulas.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

// REVISAMOS, BAJAMOS Y ESTABLECEMOS VARIABLES A PARTIR DE VARIABLES POST

$posicion_inicio = $_POST['dato_0'];
$porcion = $_POST['dato_1'];
$inicial_lote = $_POST['dato_2'];
$respuestaJSON = '[';
$lista_parametros = [];

// LOGEAMOS VALORES
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'consulta_combolist_cedulas.php ESTOS SON LOS VALORES:';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'dato_0 $posicion_inicio  : '.$posicion_inicio;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'dato_1 $porcion          : '.$porcion;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'dato_2 $inicial_lote     : '.$inicial_lote;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();






///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
// HACEMOS INSTANCIA DEL OBJETO Consulta PARA CONOCER LA CANTIDAD DE REGISTROS	
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////






    $numero_elementos = 1;
    $tables = ['cedula'];
    $where = [0, $lista_parametros]; 
    $order_order = 1;
    $order_elementos = ['cedula.ID'];
    $order = [1, $order_order, $order_elementos];
    $sistema = $_SESSION['Sistema'];
    $status = 0;
    $tipo = 1;
    $limites = [0, 0, 0, 0, 0, 0];
    $registros = 0;
    $excel = [0, '', 0, '', '', '', '', ''];
    $nombre = 'INST:: consulta_total_registros';
    $configuraciones = [$numero_elementos, $tables, $where, $order, $sistema, $_SESSION['bd'], $status, $tipo, $limites, $registros, $excel, $nombre];
    $codigos = ['', '', [], '', '', ''];
    $elementos_campos = ['COUNT(*)'];
    $elementos_nombres = ['dato_01'];
    $elementos_tipos = [1];
    $elementos = [$elementos_campos, $elementos_nombres, $elementos_tipos]; 
    $consulta_total_registros_cedulas = new Consulta($configuraciones, $codigos, $elementos);

// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
    $consulta_total_registros_cedulas->construye();

// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
    $consulta_total_registros_cedulas->ejecuta();

// HACEMOS INSTANCIA DEL OBJETO Consulta	

    $numero_elementos = 3;
    $tables = ["cedula"];
    $where = [0, $lista_parametros]; 
    $order_order = 0;
    $order_elementos = ['cedula.ID'];
    $order = [1, $order_order, $order_elementos];
    $sistema = $_SESSION['Sistema'];
    $status = 0;
    $tipo = 1;
    
// CONFIGURACIÓN DE LOS LIMÍTES DE SEIS POSCIONES
// PRIMERA POSICIÓN INDICA SI LLEVA LIMITES O NO LLEVA LIMITES 0 = NO, 1 = SI
// SEGUNDA POSICIÓN INDICA POSICIÓN DE INICIO DE CONSULTA 
// TERCERA POSICIÓN INDICA CANTIDAD DE REGISTROS A CONSULTAR POR CADA CONSULTA 
// CUARTA POSICIÓN INDICA CANTIDAD DE REGISTROS EN TOTAL A CONSULTAR EN ESTE LOTE DE CONSULTAS
// QUINTA POSICIÓN INDICA CONSULTA PARCIAL O FINAL DE UN LOTE DE CONSULTAS 0 = FINAL, 1 = FINAL 
// SEXTA POSICIÓN INDICA CONSULTA INICIAL DE UN LOTE DE CONSULTAS 0 = INICIAL, 1 = NO INICIAL 

    $limites = [1, $posicion_inicio, 200, $consulta_total_registros_cedulas->obtener_dato_lote(0, 0, $posicion_inicio, $porcion), $consulta_total_registros_cedulas->obtener_status(0, 0, $posicion_inicio, $porcion), $inicial_lote];
    $registros = 0;
    $excell = [0, '', 0, '', '', '', '', ''];
    $nombre = 'INST:: consultacedulas';
    $recupera = 0;
    $configuraciones = [$numero_elementos, $tables, $where, $order, $sistema, $_SESSION['bd'], $status, $tipo, $limites, $registros, $excell, $nombre. $recupera];
    $codigos = ['', '', [], '', '', ''];
    $elementos_campos = ['cedula.ID', 'cedula.MunicipioNom', 'cedula.LocalidadNom'];
    $elementos_nombres = ['ID', 'MUNICIPIO', 'LOCALIDAD'];
    $elementos_tipos = [1, 1, 1];
    $elementos = [$elementos_campos, $elementos_nombres, $elementos_tipos];
    $consultacedulas = new Consulta($configuraciones, $codigos, $elementos);

// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
    $consultacedulas->ejecuta_rangos();

// HACEMOS CONCATENACIÓN FINAL

    $consultacedulas->codigos[1] = "[".$consultacedulas->codigos[1]."]";

// RETORNAMOS VARIABLE codigos[1] DEL PRIMER OBJETO Consulta	
    echo $consultacedulas->codigos[1];

// LOGEAMOS TERMINO
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'ESTA ES LA CONSULTA: ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $consultacedulas->codigos[0];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
//$_SESSION['logPhp']->configuraciones[1] = 'ESTE ES EL RESULTADO: ';
//$_SESSION['logPhp']->escribe_log();
//$_SESSION['logPhp']->configuraciones[1] = $consultacedulas->codigos[1];
//$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();


// LOGEAMOS TERMINO
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' TERMINAMOS consulta_combolist_cedulas.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
