<?php
// VINCULAMOS CLASES
require_once "../../pantalib/php/objetos/new/Sistema.php";
require_once "../../pantalib/php/objetos/new/User.php";
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
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS consulta_baja_familiares.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

// REVISAMOS, BAJAMOS Y ESTABLECEMOS VARIABLES A PARTIR DE VARIABLES POST
$id = $_POST['dato_0'];
$respuestaJSON = '[';

// CONFIGURAMOS LOS FILTROS
$lista_parametros = [];
$filtro = 1;
$lista_parametros[] = [0, [[0, "familia.ID", 0, $id, 0]], 0];

///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
// HACEMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA DE FAMILIAR	
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////

$numero_elementos = 39;
$tables = ['familia'];
$where = [$filtro, $lista_parametros]; 
$order_order = 0;
$order_elementos = ['familia.ID'];
$order = [1, $order_order, $order_elementos];
$sistema = $_SESSION['Sistema'];
$status = 0;
$tipo = 1;
$limites = [0, 0, 0, 0, 0, 0];
$registros = 0;
$excel = [0, '', 0, '', '', '', '', ''];
$nombre = 'INST:: consultafamiliares';
$recupera = 0;
$configuraciones = [$numero_elementos, $tables, $where, $order, $sistema, $_SESSION['bd'], $status, $tipo, $limites, $registros, $excel, $nombre, $recupera];
$codigos = ['', '', [], '', '', ''];
$elemento01 = 'familia.ID';
$elemento02 = 'familia.CedulaId';
$elemento03 = 'familia.NumInt';
$elemento04 = 'familia.Apelli1';
$elemento05 = 'familia.Apelli2';
$elemento06 = 'familia.Nombres';
$elemento07 = 'familia.FecNac';
$elemento08 = 'familia.Edad';
$elemento09 = 'familia.Genero';
$elemento10 = 'familia.EstOrig';
$elemento11 = 'familia.LenMat';
$elemento12 = 'familia.EstCiv';
$elemento13 = 'familia.Parente';
$elemento14 = 'familia.Escola';
$elemento15 = 'familia.Ocupa';
$elemento16 = 'familia.Ingres';
$elemento17 = 'familia.Papani';
$elemento18 = 'familia.Hipert';
$elemento19 = 'familia.Diabet';
$elemento20 = 'familia.Tuberc';
$elemento21 = 'familia.Alcoho';
$elemento22 = 'familia.Tabaqu';
$elemento23 = 'familia.Cancer';
$elemento24 = 'familia.Diu';
$elemento25 = 'familia.Orales';
$elemento26 = 'familia.Preser';
$elemento27 = 'familia.InyMens';
$elemento28 = 'familia.InyBien';
$elemento29 = 'familia.Salping';
$elemento30 = 'familia.Implant';
$elemento31 = 'familia.Embaraz';
$elemento32 = 'familia.Bacamro';
$elemento33 = 'familia.LavDien';
$elemento34 = 'familia.LimVivi';
$elemento35 = 'familia.BebAlco';
$elemento36 = 'familia.Tabaco';
$elemento37 = 'familia.Medica';
$elemento38 = 'familia.Drogas';
$elemento39 = 'familia.FecRegInt';
$elementos_campos_2 = [$elemento01, $elemento02, $elemento03, $elemento04, $elemento05, $elemento06, $elemento07, $elemento08, $elemento09, $elemento10, $elemento11, $elemento12, $elemento13, $elemento14, $elemento15, $elemento16, $elemento17, $elemento18, $elemento19, $elemento20, $elemento21, $elemento22, $elemento23, $elemento24, $elemento25, $elemento26, $elemento27, $elemento28, $elemento29, $elemento30, $elemento31, $elemento32, $elemento33, $elemento34, $elemento35, $elemento36, $elemento37, $elemento38, $elemento39];
$elementos_nombres_2 = ['dato_01', 'dato_02', 'dato_03', 'dato_04', 'dato_05', 'dato_06', 'dato_07', 'dato_08', 'dato_09', 'dato_10', 'dato_11', 'dato_12', 'dato_13', 'dato_14', 'dato_15', 'dato_16', 'dato_17', 'dato_18', 'dato_19', 'dato_20', 'dato_21', 'dato_22', 'dato_23', 'dato_24', 'dato_25', 'dato_26', 'dato_27', 'dato_28', 'dato_29', 'dato_30', 'dato_31', 'dato_32', 'dato_33', 'dato_34', 'dato_35', 'dato_36', 'dato_37', 'dato_38', 'dato_39'];
$elementos_tipos_2 = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
$elementos = [$elementos_campos_2, $elementos_nombres_2, $elementos_tipos_2];
$consultafamiliares = new Consulta($configuraciones, $codigos, $elementos);

// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultafamiliares->construye();

// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultafamiliares->ejecuta();

// CONCATENAMOS LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.$consultafamiliares->codigos[1].']';

// RETORNAMOS RESPUESTA DEL OBJETO Consulta	
 echo $respuestaJSON;
/*
// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'consulta_baja_familiales.php RESPUESTA JSON';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $respuestaJSON;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
*/
// LOGEAMOS TERMINO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' TERMINAMOS consulta_baja_familiares.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();


