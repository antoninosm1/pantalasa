<?php
// VINCULAMOS CLASES
require_once "../../pantalib/php/objetos/new/Sistema.php";
require_once "../../pantalib/php/objetos/new/User.php";
require_once "Conexion_comerciosolidario.php";
require_once "../../pantalib/php/objetos/new/Consulta.php";
require_once "../../pantalib/php/objetos/new/Reordena.php";
require_once "../../pantalib/php/objetos/new/Log.php";
session_start();
header( 'Content-type: text/html; charset=utf-8' );

// ESTABLECEMOS PARAMETROS DE LOG
$_SESSION['logPhp']->configuraciones[2] = '../logs/';

// LOGEAMOS INICIO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS kronos_comunidad.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();


$respuestaJSON = '[';

// CONFIGURAMOS LOS FILTROS
$lista_parametros = [];
$lista_parametros[] = [0, [[0, "comunidad.ID", 0, 0, 0]], 0];

// HACEMOS INSTANCIA DEL OBJETO Consulta PARA GRABAR REGISTRO COMUNIDAD KRONOS EN BD	
$numero_elementos = 8;
$tables = ["comunidad"];
$where = [0, []]; 
$order_order = 0;
$order_elementos = [];
$order = [0, 0, []];
$sistema = $_SESSION['Sistema'];
$status = 0;
$tipo = 2;
$limites = [0, 0, 0, 0, 0, 0];
$registros = 0;
$excell = [0, '', 0, '', '', '', '', ''];
$nombre = 'INST::: grabausuario';
$recupera = 1;
$configuraciones = [$numero_elementos, $tables, $where, $order, $sistema, $_SESSION['bd'], $status, $tipo, $limites, $registros, $excell, $nombre, $recupera];
$codigos = ['', '', [], '', '', ''];
$elementos_campos = [
    
'nombre',
'apellido',
'alias',
'fecha',
'creador',
'cuentausuario',
'usuariorelacionado',
'actualizacion'

]; // 8

$elementos_nombres = [
    
'dato_1',
'dato_2',
'dato_3',
'dato_4',
'dato_5',
'dato_6',
'dato_7',
'dato_8'

];

$elementos_tipos = [1, 1, 1, 1, 1, 1, 1, 1];

$elementos_valores = [
    
'YÉFFIM',
'FONG',
'GERO',
'',
'1',
'1',
'1',
date('Y-m-d H:i:s')

];

$elementos = [$elementos_campos, $elementos_nombres, $elementos_tipos, $elementos_valores];

$grabausuario = new Consulta($configuraciones, $codigos, $elementos);

// EJECUTAMOS METODO construye() DEL SEGUNDO OBJETO Consulta	
$grabausuario->construye();

// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'kronos_comunidad.php CONSULTA';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $grabausuario->codigos[0];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();

// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$grabausuario->ejecuta();

// CONCATENAMOS LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.$grabausuario->codigos[1].']';

// RETORNAMOS RESPUESTA DEL OBJETO Consulta	

echo $respuestaJSON;

// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'kronos_comunidad.php RESPUESTA JSON';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $respuestaJSON;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();

 // LOGEAMOS TERMINO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' TERMINAMOS kronos_comunidad.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();


