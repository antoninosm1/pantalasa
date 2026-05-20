<?php
// VINCULAMOS CLASES
require_once "../../pantalib/php/objetos/new/Sistema.php";
require_once "../../pantalib/php/objetos/new/User.php";
require_once "Conexion_comerciosolidario.php";
require_once "../../pantalib/php/objetos/new/Consulta.php";
require_once "../../pantalib/php/objetos/new/Descarga.php";
require_once "../../pantalib/php/objetos/new/Log.php";
session_start();
header( 'Content-type: text/html; charset=utf-8' );

///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////
  
// PROGRAMA GENERAL PARA CONSULTAR REGISTROS DE PUNTOS

// ESTRUCTURA DEL REGISTRO

// id int(11) autoincremental
// nombre var(50)
// descripcion var(200)
// status int(2)
// usuario int(11)
// fecha timestamp **
// creador int(11)
// almacen int(11)
// caja tinyint(1)
// actualizacion datetime

///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////

// ESTABLECEMOS PARAMETROS DE LOG
$_SESSION['logPhp']->configuraciones[2] = '../logs/';

// LOGEAMOS INICIO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS consulta_puntos.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

// REVISAMOS, BAJAMOS Y ESTABLECEMOS VARIABLES A PARTIR DE VARIABLES POST

$orden_consulta = $_POST['dato_0'];
$filtro_consulta = $_POST['dato_1'];
$posicion_inicio = $_POST['dato_2'];
$porcion = $_POST['dato_3'];
$inicial_lote = $_POST['dato_4'];
$respuestaJSON = '[';

// LOGEAMOS VALORES
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'INICIAMOS consulta_puntos.php ESTOS SON LOS VALORES: ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'ORDEN CONSULTA: '.$orden_consulta;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'FILTRO CONSULTA: '.$filtro_consulta;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'POSICION INICIO: '.$posicion_inicio;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'PORCIÓN........: '.$porcion;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'INICIAL LOTE...: '.$inicial_lote;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

$filtro = 0;
$parametro01 = [0, [[0, "puntos.caja", 0, 1, 0]], 0];
if ($filtro_consulta==1) {
    $filtro = 1;
    $parametro01 = [0, [[0, "puntos.caja", 0, 1, 0]], 0];
}
if ($filtro_consulta==2) {
    $filtro = 1;
    $parametro01 = [0, [[0, "puntos.caja", 0, 0, 0]], 0];
}

$lista_parametros = [];
$lista_parametros[] = $parametro01;

if ($orden_consulta==1) {
    $order_elementos = ['puntos.id', 'puntos.nombre', 'puntos.fecha'];
}
if ($orden_consulta==2) {
    $order_elementos = ['puntos.nombre', 'puntos.fecha'];
}
if ($orden_consulta==3) {
    $order_elementos = ['puntos.fecha', 'puntos.id'];
}


///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
// HACEMOS INSTANCIA DEL OBJETO Consulta PARA CONOCER LA CANTIDAD DE REGISTROS	
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////

$numero_elementos = 1;
$tables = ['puntos'];
$where = [$filtro, $lista_parametros];
$order_order = 0; 
$order = [1, $order_order, $order_elementos];
$sistema = $_SESSION['Sistema'];
$status = 0;
$tipo = 1;
$limites = [0, 0, 0, 0, 0, 0];
$registros = 0;
$excel = [0, '', 0, '', '', '', '', ''];
$nombre = 'INST:: consulta_puntos';
$configuraciones = [$numero_elementos, $tables, $where, $order, $sistema, $_SESSION['bd'], $status, $tipo, $limites, $registros, $excel, $nombre];
$codigos = ['', '', [], '', '', ''];
$elementos_campos = ['COUNT(*)'];
$elementos_nombres = ['dato_01'];
$elementos_tipos = [1];
$elementos = [$elementos_campos, $elementos_nombres, $elementos_tipos];
$consulta_total_puntos = new Consulta($configuraciones, $codigos, $elementos);

// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consulta_total_puntos->construye();

// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'consulta_puntos.php ESTA ES LA CONSULTA COUNT:';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $consulta_total_puntos->codigos[0];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();

// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consulta_total_puntos->ejecuta();

// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'consulta_puntos.php ESTA ES LA RESPUESTA COUNT:';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $consulta_total_puntos->codigos[1];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();

///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
// HACEMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA PUNTOS	
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////

$numero_elementos = 10;
$tables = ['puntos'];
$where = [$filtro, $lista_parametros]; 
$order_order = 0; 
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

$limites = [1, $posicion_inicio, 200, $consulta_total_puntos->obtener_dato_lote(0, 0, $posicion_inicio, $porcion), $consulta_total_puntos->obtener_status(0, 0, $posicion_inicio, $porcion), $inicial_lote];
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
$nombre = 'INST:: consulta_puntos';
$recupera = 0;
$configuraciones = [$numero_elementos, $tables, $where, $order, $sistema, $_SESSION['bd'], $status, $tipo, $limites, $registros, $excel, $nombre, $recupera];
$codigos = ['', '', [], '', '', ''];

$elementos_campos = ['puntos.id', 'puntos.nombre', 'puntos.descripcion', 'puntos.status', 'puntos.usuario', 'puntos.fecha', 'puntos.creador', 'puntos.almacen', 'puntos.caja', 'puntos.actualizacion'];
$elementos_nombres = ['dato_01', 'dato_02', 'dato_03', 'dato_04', 'dato_05', 'dato_06', 'dato_07', 'dato_08', 'dato_09', 'dato_10'];
$elementos_tipos = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
$elementos = [$elementos_campos, $elementos_nombres, $elementos_tipos];
$consulta_puntos = new Consulta($configuraciones, $codigos, $elementos);
// EJECUTAMOS METODO ejecuta_rangos() DEL OBJETO Consulta	
$consulta_puntos->ejecuta_rangos();

// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'consulta_puntos.php ESTA ES LA CONSULTA:';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $consulta_puntos->codigos[0];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();

// CONCATENAMOS LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.$consulta_puntos->codigos[1].']';

// RETORNAMOS RESPUESTA DEL OBJETO Consulta	
 echo $respuestaJSON;

// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'consulta_puntos.php ESTA ES LA RESPUESTA:';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $respuestaJSON;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();

// LOGEAMOS TERMINO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' TERMINAMOS consulta_puntos.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
