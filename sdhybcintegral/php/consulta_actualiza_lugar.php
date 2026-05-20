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
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS consulta_actualiza_lugar.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

// REVISAMOS, BAJAMOS Y ESTABLECEMOS VARIABLES A PARTIR DE VARIABLES POST
$cedula = $_POST['dato_0'];
$municipio_clave = $_POST['dato_1'];
$municipio = $_POST['dato_2'];
$localidad_clave = $_POST['dato_3'];
$localidad = $_POST['dato_4'];

// LOGEAMOS TERMINO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'ESTOS SON LOS DATOS';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'CEDULA.........: '.$cedula;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'MUNICIPIO CLAVE: '.$municipio_clave;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'MUNICIPIO......: '.$municipio;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'LOCALIDAD CLAVE: '.$localidad_clave;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'LOCALIDAD......: '.$localidad;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();



$respuestaJSON = '[';

// CONFIGURAMOS LOS FILTROS
$lista_parametros = [];
$filtro = 1;
$lista_parametros[] = [0, [[0, "cedula.ID", 0, $cedula, 0]], 0];

///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
// HACEMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA DE CEDULA	
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
$numero_elementos = 0;
$tables = ['cedula'];
$where = [$filtro, $lista_parametros]; 
$order_order = 0;
$order_elementos = [''];
$order = [0, $order_order, $order_elementos];
$sistema = $_SESSION['Sistema'];
$status = 0;
$tipo = 3;
$limites = [0, 0, 0, 0, 0, 0];
$registros = 0;
$excel = [0, '', 0, '', '', '', '', ''];
$nombre = 'INST:: actualizacedulas';
$recupera = 0;
$configuraciones = [$numero_elementos, $tables, $where, $order, $sistema, $_SESSION['bd'], $status, $tipo, $limites, $registros, $excel, $nombre, $recupera];
$codigos = ['', '', [], '', '', ''];
$elementos_campos_2 = ['cedula.MunicipioNum', 'cedula.MunicipioNom', 'cedula.LocalidadNum', 'cedula.LocalidadNom'];
$elementos_nombres_2 = ['dato_01', 'dato_02', 'dato_03', 'dato_04'];
$elementos_tipos_2 = [1, 1, 1, 1];
$elementos_valores_2 = [$municipio_clave, $municipio,  $localidad_clave, $localidad];
$elementos = [$elementos_campos_2, $elementos_nombres_2, $elementos_tipos_2, $elementos_valores_2];
$actualizacedulas = new Consulta($configuraciones, $codigos, $elementos);

// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$actualizacedulas->construye();

// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$actualizacedulas->ejecuta();

// CONCATENAMOS LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.$actualizacedulas->codigos[1].']';

// RETORNAMOS RESPUESTA DEL OBJETO Consulta	
echo $respuestaJSON;

 // LOGEAMOS TERMINO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' TERMINAMOS consulta_actualiza_lugar.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();


