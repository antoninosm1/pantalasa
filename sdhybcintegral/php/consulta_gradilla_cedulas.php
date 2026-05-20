<?php
// VINCULAMOS CLASES
require_once "../../pantalib/php/objetos/new/Sistema.php";
require_once "../../pantalib/php/objetos/new/User.php";
require_once "Conexion_sdhybc.php";
//require_once "../../pantalib/php/objetos/new/Conexion_sdhybc.php";
require_once "../../pantalib/php/objetos/new/Consulta.php";
require_once "../../pantalib/php/objetos/new/Descarga.php";
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
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS consulta_gradilla_cedulas.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

// REVISAMOS, BAJAMOS Y ESTABLECEMOS VARIABLES A PARTIR DE VARIABLES POST

$filtro_municipio = 1;
$filtro_localidad = 1;
$filtro_consulta = 0;
$municipio = $_POST['dato_0'];
$localidad = $_POST['dato_1'];
$usuario = $_POST['dato_2'];
$usuario_status = $_POST['dato_3'];
$posicion_inicio = $_POST['dato_4'];
$porcion = $_POST['dato_5'];
$inicial_lote = $_POST['dato_6'];
$respuestaJSON = '[';

// LOGEAMOS VALORES
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'ESTOS SON LOS VALORES: ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'dato_0 = $municipio       : '.$municipio;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'dato_1 = $localidad       : '.$localidad;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'dato_2 = $usuario         : '.$usuario;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'dato_3 = $usuario_status  : '.$usuario_status;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'dato_4 = $posicion_inicio : '.$posicion_inicio;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'dato_5 = $porcion         : '.$porcion;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'dato_6 = $inicial_lote    : '.$inicial_lote;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

$parametro01 = [0, [[0, "cedula.MunicipioNom", 0, $municipio, 0]], 0];
$parametro02 = [0, [[0, "cedula.LocalidadNom", 0, $localidad, 0]], 0];

$lista_parametros = [];

if ($municipio=="VALOR VACIO") {
    $filtro_municipio = 0;
}
else {
    $filtro_municipio = 1;
    $lista_parametros[] = $parametro01;
    $filtro_consulta = 1;
}
if ($localidad=="VALOR VACIO") {
    $filtro_localidad = 0;
}
else {
    $filtro_localidad = 1;
    $lista_parametros[] = $parametro02;
    $filtro_consulta = 1;
}

if ($usuario_status > 2) {
    $filtro_consulta = 1;
    $lista_parametros[] = [0, [[0, "cedula.UsuarioId", 0, $usuario, 0]], 0];
}





///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
// HACEMOS INSTANCIA DEL OBJETO Consulta PARA CONOCER LA CANTIDAD DE REGISTROS	
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
$numero_elementos = 1;
$tables = ['cedula'];
$where = [$filtro_consulta, $lista_parametros]; 
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

///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
// HACEMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA CEDULAS 1	
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////

$numero_elementos = 8;
$tables = ["cedula"];
$where = [$filtro_consulta, $lista_parametros]; 
$order_order = 1;
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

// CONFIGURACIÓN DE ARCHIVO EXCEL DE SIETE POSICIONES
// PRIMERA POSICIÓN INDICA SI LLEVA O NO LLEVA ARCHIVO EXCELL 0 = NO, 1 = SI
// SEGUNDA POSICIÓN INDICA LA RUTA EN DONDE SE GRABARA ARCHIVO EXCELL Y ARCHIVO DESCARGADOR 
// TERCERA POSICIÓN INDICA EXCELL SE GENERA EN CONSULTA SIMPLE O CONSULTA LOTES 0 = SIMPLE 1 = LOTES  
// CUARTA POSICIÓN INDICA CUERPO DEL NOMBRE ARCHIVO EXCELL
// QUINTA POSICIÓN INDICA CADENA IDENTIFICADORA DEL NOMBRE ARCHIVO EXCELL Y DEL ARCHIVO DESCCARGADOR 
// SEXTA POSICIÓN INDICA TIPO DE ARCHIVO EXCELL 
// SEPTIMA POSICIÓN INDICA CUERPO DEL NOMBRE DE ARCHIVO DESCARGADOR 
// OCTAVA POSICIÓN INDICA TITULO INTERNO DEL ARCHIVO EXCELL 
//$$excel = [1, '../descargas/', 1, $datos_excell.$municipio_excell.$localidad_excell.$consulta_excell, $_SESSION['User']->elementos[0][0], 'txt', 'baja_registros_', ''];

$excel = [0, '', 1, '', '', '', '', ''];
$nombre = 'INST:: consultacedulas';
$recupera = 0;
$configuraciones = [$numero_elementos, $tables, $where, $order, $sistema, $_SESSION['bd'], $status, $tipo, $limites, $registros, $excel, $nombre, $recupera];
$codigos = ['', '', [], '', '', ''];
$elementos_campos = ['cedula.ID', 'cedula.UsuarioId', 'cedula.MunicipioNom', 'cedula.LocalidadNom', 'cedula.FecRegCed', 'cedula.FecRegViv', 'cedula.FecRegGen', 'cedula.NumInteg'];
$elementos_nombres = ['dato_01', 'dato_02', 'dato_03', 'dato_04', 'dato_05', 'dato_06', 'dato_07', 'dato_08'];
$elementos_tipos = [1, 1, 1, 1, 1, 1, 1, 1];
$elementos = [$elementos_campos, $elementos_nombres, $elementos_tipos];
$consultacedulas = new Consulta($configuraciones, $codigos, $elementos);
// EJECUTAMOS METODO ejecuta_rangos() DEL OBJETO Consulta	
$consultacedulas->ejecuta_rangos();

// CONCATENAMOS LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.$consultacedulas->codigos[1].']';

// RETORNAMOS RESPUESTA DEL OBJETO Consulta	
 echo $respuestaJSON;

/*
// LOGEAMOS TERMINO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'consulta_gradilla_cedulas.php ESTE ES EL RESULTADO';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $respuestaJSON;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();



*/



 // LOGEAMOS TERMINO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' TERMINAMOS consulta_gradilla_cedulas.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();

