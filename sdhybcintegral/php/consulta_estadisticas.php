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
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS consulta_estadisticas.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

// REVISAMOS, BAJAMOS Y ESTABLECEMOS VARIABLES A PARTIR DE VARIABLES POST

$filtro_municipio = 1;
$filtro_localidad = 1;
$filtro_municipio_2 = 1;
$filtro_localidad_2 = 1;
$filtro_consulta = 0;
$sw_filtro_x = 0;
$municipio = $_POST['dato_0'];
$localidad = $_POST['dato_1'];
$datos = $_POST['dato_2'];
$campos_habitaciones = [''];
$elementos_perros = ['SUM(cedula.NumPerros)'];
$elementos_gatos = ['SUM(cedula.NumGatos)'];
$elementos_mascotas_otros = ['SUM(cedula.NumOtros)'];
$elementos_habitaciones = ['SUM(cedula.NumHab)'];
if ($datos==1) {
    $tablas_2 = ["cedula"];
    $order_2 = ['cedula.ID'];
    $campos_habitaciones  = ['COUNT(DISTINCT familia.CedulaId)'];
    $elementos_habitaciones = ['SUM(cedula.NumHab)'];
    $elementos_perros = ['SUM(cedula.NumPerros)'];
    $elementos_gatos = ['SUM(cedula.NumGatos)'];
    $elementos_mascotas_otros = ['SUM(cedula.NumOtros)'];
}
else {
    $tablas_2 = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
    $order_2 = ['cedula.TechoConc'];
    $campos_habitaciones  = ['COUNT(familia.CedulaId)'];
    $elementos_habitaciones = ['COUNT(*)'];
    $elementos_perros = ['COUNT(*)'];
    $elementos_gatos = ['COUNT(*)'];
    $elementos_mascotas_otros = ['COUNT(*)'];
} 

$parametro01 = [0, [[0, "cedula.MunicipioNom", 0, $municipio, 0]], 0];
$parametro02 = [0, [[0, "cedula.LocalidadNom", 0, $localidad, 0]], 0];

$lista_parametros = [];

if ($municipio=="TODOS_REGISTROS") {
    $filtro_municipio = 0;
    $filtro_municipio_2 = 0;
}
else {
    $filtro_municipio = 1;
    $lista_parametros[] = $parametro01;
    $filtro_consulta = 1;
}
if ($localidad=="TODOS_REGISTROS_L") {
    $filtro_localidad = 0;
}
else {
    $filtro_localidad = 1;
    $lista_parametros[] = $parametro02;
    $filtro_consulta = 1;
}

$filtro_habitaciones = $lista_parametros;
$filtro_perros = $lista_parametros;
$filtro_gatos = $lista_parametros;
$filtro_mascotas_otros = $lista_parametros;

if ($datos==1) {
    if ($filtro_consulta==1) {
        $sw_filtro_x = 1;
    }
} 
else {
    $filtro_perros[] = [0, [[0, "cedula.NumPerros", 4, 0, 0]], 0];
    $filtro_gatos[] = [0, [[0, "cedula.NumGatos", 4, 0, 0]], 0];
    $filtro_mascotas_otros[] = [0, [[0, "cedula.NumOtros", 4, 0, 0]], 0];
    $filtro_habitaciones[] = [0, [[0, "cedula.NumHab", 4, 0, 0]], 0];
    $sw_filtro_x = 1;
} 

$respuestaJSON = '[';

///////////////////////////////////////////////////////////////
// HACEMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA CEDULAS 1	
///////////////////////////////////////////////////////////////
$numero_elementos = 1;
$tables = ["cedula"];
$where = [$filtro_consulta, $lista_parametros]; 
$order_order = 1;
$order_elementos = ['MunicipioNum'];
$order = [1, $order_order, $order_elementos];
$sistema = $_SESSION['Sistema'];
$status = 0;
$tipo = 1;
$limites = [0, 0, 0, 0, 0, 0];
$registros = 0;
$excell = [0, '', 0, '', '', '', '', ''];
$nombre = 'INST:: consultacedulas';
$recupera = 0;
$configuraciones = [$numero_elementos, $tables, $where, $order, $sistema, $_SESSION['bd'], $status, $tipo, $limites, $registros, $excell, $nombre, $recupera];
$codigos = ['', '', [], '', '', ''];
$elementos_campos = ['count(*)'];
$elementos_nombres = ['dato_j'];
$elementos_tipos = [1];
$elementos = [$elementos_campos, $elementos_nombres, $elementos_tipos];
$consultacedulas = new Consulta($configuraciones, $codigos, $elementos);
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 2 LOCALIDADES	
///////////////////////////////////////////////////////////////
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
$consultacedulas -> configuraciones[1] = ["cedula"];
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> elementos[0] = ['count(DISTINCT cedula.LocalidadNom)'];
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 3 VIVIENDAS	
///////////////////////////////////////////////////////////////
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> configuraciones[3][2] = ['familia.CedulaId'];
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> elementos[0] = ['count(DISTINCT familia.CedulaId)'];
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 4 POBLACIÓN	
///////////////////////////////////////////////////////////////

// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> elementos[0] = ['count(*)'];
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 5 TECHO DE CONCRETO	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = $tablas_2;
$consultacedulas -> configuraciones[3][2] = $order_2;
$consultacedulas -> configuraciones[2][0] = 1;  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.TechoConc", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
$consultacedulas -> elementos[0] = ['count(*)'];
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 6 TECHO DE LAMINA GALVANIZADA	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.TechoGalv", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 7 TECHO DE MADERA	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.TechoMade", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 8 TECHO DE CARTON	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.TechoCart", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 9 TECHO OTRO	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.TechoOtro", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 10 TECHO NO HAY DATOS	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.TechoConc", 1, 1, 0], [1, "cedula.TechoConc", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.TechoGalv", 1, 1, 0], [1, "cedula.TechoGalv", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.TechoMade", 1, 1, 0], [1, "cedula.TechoMade", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.TechoCart", 1, 1, 0], [1, "cedula.TechoCart", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.TechoOtro", 1, 1, 0], [1, "cedula.TechoOtro", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 11 PAREDES TABIQUE	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PareTabiq", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 12 PAREDES ADOBE	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PareAdobe", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 13 PAREDES BLOCK	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PareBlock", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 14 PAREDES MADERA	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PareMader", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 15 PAREDES PIEDRA	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.ParePiedr", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 16 PAREDES CARTON	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PareCarto", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 17 PAREDES NO HAY DATOS	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PareTabiq", 1, 1, 0], [1, "cedula.PareTabiq", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PareAdobe", 1, 1, 0], [1, "cedula.PareAdobe", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PareBlock", 1, 1, 0], [1, "cedula.PareBlock", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PareMader", 1, 1, 0], [1, "cedula.PareMader", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.ParePiedr", 1, 1, 0], [1, "cedula.ParePiedr", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PareCarto", 1, 1, 0], [1, "cedula.PareCarto", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 18 PISO CEMENTO	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PisoCemen", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 19 PISO MADERA	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PisoMader", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 20 PISO TIERRA	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PisoTierr", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 21 PISO PIEDRA	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PisoPiedr", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 22 PISO NO HAY DATOS	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PisoCemen", 1, 1, 0], [1, "cedula.PisoCemen", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PisoMader", 1, 1, 0], [1, "cedula.PisoMader", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PisoTierr", 1, 1, 0], [1, "cedula.PisoTierr", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PisoPiedr", 1, 1, 0], [1, "cedula.PisoPiedr", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 23 AGUA USO POTABLE	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AgUsoPota", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 24 AGUA USO NORIA	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AgUsoNori", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 25 AGUA USO RIO	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AgUsoRio", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 26 AGUA USO LLUVIA	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AgUsoLluv", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 27 AGUA USO NO HAY DATOS	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AgUsoPota", 1, 1, 0], [1, "cedula.AgUsoPota", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AgUsoNori", 1, 1, 0], [1, "cedula.AgUsoNori", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AgUsoRio", 1, 1, 0], [1, "cedula.AgUsoRio", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AgUsoLluv", 1, 1, 0], [1, "cedula.AgUsoLluv", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 28 AGUA CONSUMO POTABLE	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AgConPota", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 29 AGUA CONSUMO PURIFICADA	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AgConPuri", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 30 AGUA CONSUMO HERVIDA	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AgConHerv", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 31 AGUA CONSUMO CLORO	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AgConClor", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 32 AGUA CONSUMO FILTRO	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AgConFilt", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 33 AGUA CONSUMO NO HAY DATOS	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AgConPota", 1, 1, 0], [1, "cedula.AgConPota", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AgConPuri", 1, 1, 0], [1, "cedula.AgConPuri", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AgConHerv", 1, 1, 0], [1, "cedula.AgConHerv", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AgConClor", 1, 1, 0], [1, "cedula.AgConClor", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AgConFilt", 1, 1, 0], [1, "cedula.AgConFilt", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 34 EXCRETA FOSA SEPTICA	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.ExcFoSep", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 35 EXCRETA FOSA LETRINA	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.ExcLetri", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 36 EXCRETA RAS DE SUELO	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.ExcRasSu", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 37 EXCRETA NO HAY DATOS	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.ExcFoSep", 1, 1, 0], [1, "cedula.ExcFoSep", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.ExcLetri", 1, 1, 0], [1, "cedula.ExcLetri", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.ExcRasSu", 1, 1, 0], [1, "cedula.ExcRasSu", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 38 COMBUSTIBLE GAS	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.CombGas", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 39 COMBUSTIBLE CARBON	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.CombCar", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 40 COMBUSTIBLE LEÑA	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.CombLen", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 41 COMBUSTIBLE OTRO	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.CombOtr", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 42 COMBUSTIBLE NO HAY DATOS	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.CombGas", 1, 1, 0], [1, "cedula.CombGas", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.CombCar", 1, 1, 0], [1, "cedula.CombCar", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.CombLen", 1, 1, 0], [1, "cedula.CombLen", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.CombOtr", 1, 1, 0], [1, "cedula.CombOtr", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 43 BASURA RED MUNICIPAL	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.BasRedM", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 44 BASURA ENTERRAMIENTO	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.BasEnte", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 45 BASURA CIELO ABIERTO	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.BasCieAb", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 45 BASURA INCINERACIÓN	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.BasInci", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 47 BASURA NO HAY DATOS	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.BasRedM", 1, 1, 0], [1, "cedula.BasRedM", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.BasEnte", 1, 1, 0], [1, "cedula.BasEnte", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.BasCieAb", 1, 1, 0], [1, "cedula.BasCieAb", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.BasInci", 1, 1, 0], [1, "cedula.BasInci", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 48 ALUMBRADO RED ELECTRICA	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AlumRedE", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 49 ALUMBRADO VELADORA	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AlumVela", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 50 ALUMBRADO QUINQUÉ	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AlumQuin", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 51 ALUMBRADO PLACA SOLAR	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AlumPlaS", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 52 ALUMBRADO NO HAY DATOS	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AlumRedE", 1, 1, 0], [1, "cedula.AlumRedE", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AlumVela", 1, 1, 0], [1, "cedula.AlumVela", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AlumQuin", 1, 1, 0], [1, "cedula.AlumQuin", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.AlumPlaS", 1, 1, 0], [1, "cedula.AlumPlaS", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 53 DISTRIBUCIÓN HABITACIONAL RECAMARAS	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> elementos[0] = ['COUNT(*)'];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.Recam", 4, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
$consultacedulas -> configuraciones[3][2] = ['cedula.Recam'];
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 54 DISTRIBUCIÓN HABITACIONAL ESTANCIAS	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> elementos[0] = ['COUNT(*)'];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.Estan", 4, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
$consultacedulas -> configuraciones[3][2] = ['cedula.Estan'];
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 55 DISTRIBUCIÓN HABITACIONAL COMEDORES	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> elementos[0] = ['COUNT(*)'];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.Comed", 4, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
$consultacedulas -> configuraciones[3][2] = ['cedula.Comed'];
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 56 DISTRIBUCIÓN HABITACIONAL MULTIPLES	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> elementos[0] = ['COUNT(*)'];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.Multi", 4, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
$consultacedulas -> configuraciones[3][2] = ['cedula.Multi'];
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 57 DISTRIBUCIÓN HABITACIONAL COCINAS	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> elementos[0] = ['COUNT(*)'];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.Cocin", 4, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
$consultacedulas -> configuraciones[3][2] = ['cedula.Cocin'];
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 58 HABITACIONES POR VIVIENDA 1 HABITACIÓN	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> elementos[0] = ['COUNT(*)'];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.NumHab", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
$consultacedulas -> configuraciones[3][2] = ['cedula.NumHab'];
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 59 HABITACIONES POR VIVIENDA 2 HABITACIONES
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> elementos[0] = ['COUNT(*)'];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.NumHab", 0, 2, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
$consultacedulas -> configuraciones[3][2] = ['cedula.NumHab'];
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 60 HABITACIONES POR VIVIENDA 3 HABITACIONES
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> elementos[0] = ['COUNT(*)'];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.NumHab", 0, 3, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
$consultacedulas -> configuraciones[3][2] = ['cedula.NumHab'];
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 61 HABITACIONES POR VIVIENDA 4 HABITACIONES
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> elementos[0] = ['COUNT(*)'];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.NumHab", 0, 4, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
$consultacedulas -> configuraciones[3][2] = ['cedula.NumHab'];
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 62 HABITACIONES POR VIVIENDA MÁS DE 4 HABITACIONES
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> elementos[0] = ['COUNT(*)'];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.NumHab", 4, 4, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
$consultacedulas -> configuraciones[3][2] = ['cedula.NumHab'];
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 63 DISTRIBUCIÓN HABITACIONAL NÚMERO DE HABITACIONES	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> elementos[0] = $elementos_habitaciones;  
$consultacedulas -> configuraciones[2][1] = $filtro_habitaciones;  
$consultacedulas -> configuraciones[2][0] = $sw_filtro_x;
$consultacedulas -> configuraciones[3][2] = ['cedula.NumHab'];
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 64 HABITACIONES POR VIVIENDA NO HAY DATOS
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> elementos[0] = ['COUNT(*)'];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.NumHab", 0, 0, 0], [1, "cedula.NumHab", 0, "", 0], [1, "cedula.NumHab", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
$consultacedulas -> configuraciones[3][2] = ['cedula.NumHab'];
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 65 PUEBLO INDIGENA TARAHUMARA
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
$consultacedulas -> configuraciones[1] = $tablas_2;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> elementos[0] = ['count(*)'];
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.PueIndTara'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PueIndTara", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 66 PUEBLO INDIGENA TEPEHUAN
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.PueIndTepe'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PueIndTepe", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 67 PUEBLO INDIGENA WUAROJIO
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.PueIndWuar'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PueIndWuar", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 68 PUEBLO INDIGENA PIMA
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.PueIndPima'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PueIndPima", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 69 PUEBLO INDIGENA PIMA
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.PueIndMeno'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PueIndMeno", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 70 PUEBLO INDIGENA OTRO
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.PueIndOtro'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PueIndOtro", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 71 PUEBLO INDIGENA NO HAY DATOS
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.PueIndOtro'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PueIndTara", 1, 1, 0], [1, "cedula.PueIndTara", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PueIndTepe", 1, 1, 0], [1, "cedula.PueIndTepe", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PueIndWuar", 1, 1, 0], [1, "cedula.PueIndWuar", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PueIndPima", 1, 1, 0], [1, "cedula.PueIndPima", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PueIndMeno", 1, 1, 0], [1, "cedula.PueIndMeno", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.PueIndOtro", 1, 1, 0], [1, "cedula.PueIndOtro", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 72 DERECHOHABIENCIA INSABI
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.DerechINSABI'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.DerechINSABI", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 73 DERECHOHABIENCIA IMSS
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.DerechIMSS'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.DerechIMSS", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 74 DERECHOHABIENCIA ISSSTE
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.DerechISSSTE'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.DerechISSSTE", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 75 DERECHOHABIENCIA PEMEX
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.DerechPEMEX'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.DerechPEMEX", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 76 DERECHOHABIENCIA SEDENA
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.DerechSEDENA'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.DerechSEDENA", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 77 DERECHOHABIENCIA OTRO
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.DerechOtro'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.DerechOtro", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 78 DERECHOHABIENCIA NO HAY DATOS
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.DerechINSABI", 1, 1, 0], [1, "cedula.DerechINSABI", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.DerechIMSS", 1, 1, 0], [1, "cedula.DerechIMSS", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.DerechISSSTE", 1, 1, 0], [1, "cedula.DerechISSSTE", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.DerechPEMEX", 1, 1, 0], [1, "cedula.DerechPEMEX", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.DerechSEDENA", 1, 1, 0], [1, "cedula.DerechSEDENA", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.DerechOtro", 1, 1, 0], [1, "cedula.DerechOtro", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];



/*
$tablas_2 = ["cedula"];
$order_2 = ['cedula.ID'];
$campos_habitaciones  = ['COUNT(DISTINCT familia.CedulaId)'];
$elementos_habitaciones = ['SUM(cedula.NumHab)'];
$elementos_perros = ['SUM(cedula.NumPerros)'];
$elementos_gatos = ['SUM(cedula.NumGatos)'];
$elementos_mascotas_otros = ['SUM(cedula.NumOtros)'];
}
else {
$tablas_2 = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$order_2 = ['cedula.TechoConc'];
$campos_habitaciones  = ['COUNT(familia.CedulaId)'];
$elementos_habitaciones = ['COUNT(*)'];
$elementos_perros = ['COUNT(*)'];
$elementos_gatos = ['COUNT(*)'];
$elementos_mascotas_otros = ['COUNT(*)'];
*/





///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 79 MASCOTAS PERROS	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> elementos[0] = $elementos_perros;  
$consultacedulas -> configuraciones[2][1] = $filtro_perros;  
$consultacedulas -> configuraciones[2][0] = $sw_filtro_x;
$consultacedulas -> configuraciones[3][2] = ['cedula.NumPerros'];
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' consulta_estadisticas.php ESTA ES LA CONSULTA DE PERROS: '.$consultacedulas->codigos[1];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 80 MASCOTAS GATOS	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> elementos[0] = $elementos_gatos;  
$consultacedulas -> configuraciones[2][1] = $filtro_gatos;  
$consultacedulas -> configuraciones[2][0] = $sw_filtro_x;
$consultacedulas -> configuraciones[3][2] = ['cedula.NumGatos'];
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 81 MASCOTAS OTROS	
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> elementos[0] = $elementos_mascotas_otros;  
$consultacedulas -> configuraciones[2][1] = $filtro_mascotas_otros;  
$consultacedulas -> configuraciones[2][0] = $sw_filtro_x;
$consultacedulas -> configuraciones[3][2] = ['cedula.NumOtros'];
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 82 SISTEMA DE SALUD INSABI
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> elementos[0] = ['count(*)'];
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.SisSalINSABI'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalINSABI", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 83 SISTEMA DE SALUD IMSS
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.SisSalIMSS'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalIMSS", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 84 SISTEMA DE SALUD ISSSTE
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.SisSalISSSTE'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalISSSTE", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 85 SISTEMA DE SALUD PEMEX
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.SisSalPEMEX'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalPEMEX", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 86 SISTEMA DE SALUD SEDENA
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.SisSalSEDENA'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalSEDENA", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 87 SISTEMA DE SALUD OTRO
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.SisSalOtro'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalOtro", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 88 SISTEMA DE SALUD MEDICO PARTICULAR
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.SisSalMedPar'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalMedPar", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 89 SISTEMA DE SALUD CLINICA PARTICULAR
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.SisSalCliPar'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalCliPar", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 90 SISTEMA DE SALUD PARTERA
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.SisSalParter'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalParter", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 91 SISTEMA DE SALUD CURANDERO
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.SisSalCurand'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalCurand", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 92 SISTEMA DE SALUD YERBERO
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.SisSalYerber'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalYerber", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 93 SISTEMA DE SALUD HUESERO
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.SisSalHueser'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalHueser", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 94 SISTEMA DE SALUD BOTICARIO
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID', 'cedula.SisSalBotica'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalBotica", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 95 SISTEMA DE SALUD NO HAY DATOS
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[3][2] = ['cedula.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalINSABI", 1, 1, 0], [1, "cedula.SisSalINSABI", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalIMSS", 1, 1, 0], [1, "cedula.SisSalIMSS", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalISSSTE", 1, 1, 0], [1, "cedula.SisSalISSSTE", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalPEMEX", 1, 1, 0], [1, "cedula.SisSalPEMEX", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalSEDENA", 1, 1, 0], [1, "cedula.SisSalSEDENA", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalOtro", 1, 1, 0], [1, "cedula.SisSalOtro", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalMedPar", 1, 1, 0], [1, "cedula.SisSalMedPar", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalCliPar", 1, 1, 0], [1, "cedula.SisSalCliPar", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalParter", 1, 1, 0], [1, "cedula.SisSalParter", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalCurand", 1, 1, 0], [1, "cedula.SisSalCurand", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalYerber", 1, 1, 0], [1, "cedula.SisSalYerber", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalHueser", 1, 1, 0], [1, "cedula.SisSalHueser", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "cedula.SisSalBotica", 1, 1, 0], [1, "cedula.SisSalBotica", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
// HACEMOS CONCATENACIÓN FINAL DE LA CADENA JSON DE RESPUESTA	
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////

$respuestaJSON = $respuestaJSON.']';

// RETORNAMOS VARIABLE codigos[1] DEL PRIMER OBJETO Consulta	
echo $respuestaJSON;

// LOGEAMOS TERMINO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' TERMINAMOS consulta_estadisticas.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

