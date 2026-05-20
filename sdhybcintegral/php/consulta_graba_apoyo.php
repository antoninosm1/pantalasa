<?php
// VINCULAMOS CLASES
require_once "../../pantalib/php/objetos/new/Sistema.php";
require_once "../../pantalib/php/objetos/new/User.php";
require_once "Conexion_sdhybc.php";
//require_once "../../pantalib/php/objetos/new/Conexion_sdhybc.php";
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
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS consulta_graba_apoyo.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

// REVISAMOS, BAJAMOS Y ESTABLECEMOS VARIABLES A PARTIR DE VARIABLES POST

// LOGEAMOS VALORES
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' ESTOS SON LOS VALORES: ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'USUARIO ID...: '.$_POST['dato_0'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'PROGRAMA.....: '.$_POST['dato_1'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'CEDULA.......: '.$_POST['dato_2'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'RESPONSABLE..: '.$_POST['dato_3'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'STATUS.......: '.$_POST['dato_4'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'ID...........: '.$_POST['dato_5'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'FECHA ENTREGA: '.$_POST['dato_6'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DESCRIPCIÓN..: '.$_POST['dato_7'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

$usuario_id = $_POST['dato_0'];
$programa = $_POST['dato_1'];
$cedula = $_POST['dato_2'];
$responsable = $_POST['dato_3'];
$descripcion = $_POST['dato_7'];
$fecha_entrega = $_POST['dato_6'];
$detalles = 0;
$fecha_registro = date('Y-m-d H:i:s');
$respuestaJSON = '[';

// CONFIGURAMOS LOS FILTROS
$lista_parametros = [];

// HACEMOS INSTANCIA DEL OBJETO Consulta PARA GRABAR PROGRAMA EN BD	
$numero_elementos = 8;
$tables = ["apoyos"];
$where = [0, $lista_parametros]; 
$order_order = 0;
$order_elementos = [];
$order = [0, 0, []];
$sistema = $_SESSION['Sistema'];
$status = 0;
$tipo = 2;
$limites = [0, 0, 0, 0, 0, 0];
$registros = 0;
$excell = [0, '', 0, '', '', '', '', ''];
$nombre = 'INST::: grabaapoyo';
$recupera = 1;
$configuraciones = [$numero_elementos, $tables, $where, $order, $sistema, $_SESSION['bd'], $status, $tipo, $limites, $registros, $excell, $nombre, $recupera];
$codigos = ['', '', [], '', '', ''];
$elementos_campos = [
    
'UsuarioId',
'Programa',
'CedulaId',
'Resp',
'Desco',
'FecEntr',
'NumDeta',
'FecReg'

];

$elementos_nombres = [
    
'dato_1',
'dato_2',
'dato_3',
'dato_4',
'dato_5',
'dato_6',
'dato_8',
'dato_9'

];

$elementos_tipos = [1, 1, 1, 1, 1, 1, 1, 1];

$elementos_valores = [
    
    $usuario_id,
    $programa,
    $cedula,
    $responsable,
    $descripcion,
    $fecha_entrega,
    $detalles,
    $fecha_registro
    
];

$elementos = [$elementos_campos, $elementos_nombres, $elementos_tipos, $elementos_valores];

$grabaapoyo = new Consulta($configuraciones, $codigos, $elementos);

// EJECUTAMOS METODO construye() DEL SEGUNDO OBJETO Consulta	
$grabaapoyo->construye();

// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'consulta_graba_apoyo.php CONSULTA';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $grabaapoyo->codigos[0];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();

// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$grabaapoyo->ejecuta();

// CONCATENAMOS LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.$grabaapoyo->codigos[1].']';

// RETORNAMOS RESPUESTA DEL OBJETO Consulta	

echo $respuestaJSON;

// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'consulta_graba_apoyo.php RESPUESTA JSON';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $respuestaJSON;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();

// CONFIGURAMOS LOS FILTROS
$lista_parametros = [];
$lista_parametros[] = [0, [[0, "programas.ID", 0, $programa, 0]], 0];

// HACEMOS INSTANCIA DEL OBJETO Consulta PARA GRABAR FAMILIAR EN BD	
$numero_elementos = 1;
$tables = ["programas"];
$where = [1, $lista_parametros]; 
$order_order = 0;
$order_elementos = [];
$order = [0, 0, []];
$sistema = $_SESSION['Sistema'];
$status = 0;
$tipo = 5;
$limites = [0, 0, 0, 0, 0, 0];
$registros = 0;
$excell = [0, '', 0, '', '', '', '', ''];
$nombre = 'INST::: grabaprograma';
$recupera = 0;
$configuraciones = [$numero_elementos, $tables, $where, $order, $sistema, $_SESSION['bd'], $status, $tipo, $limites, $registros, $excell, $nombre, $recupera];
$codigos = ['', '', [], '', '', ''];
$elementos_campos = ['NumApoy'];
$elementos_nombres = ['dato_1'];
$elementos_tipos = [[1, 1]];
$elementos_valores = ['NumApoy'];
$elementos = [$elementos_campos, $elementos_nombres, $elementos_tipos, $elementos_valores];
$grabaprograma = new Consulta($configuraciones, $codigos, $elementos);

// EJECUTAMOS METODO construye() DEL SEGUNDO OBJETO Consulta	
$grabaprograma->construye();

// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'consulta_graba_apoyo.php ESTA ES LA CONSULTA: ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $grabaprograma->codigos[0];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();

// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$grabaprograma->ejecuta();

// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'consulta_graba_apoyo.php ESTA ES LA RESPUESTA: ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $grabaprograma->codigos[1];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();

// LOGEAMOS TERMINO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' TERMINAMOS consulta_graba_apoyo.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();


