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
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS consulta_estadisticas_familiares.php';
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
$tables = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$where = [$filtro_consulta, $lista_parametros]; 
$order_order = 1;
$order_elementos = ['familia.ID'];
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
$elementos_campos = ['COUNT(*)'];
$elementos_nombres = ['dato_j'];
$elementos_tipos = [1];
$elementos = [$elementos_campos, $elementos_nombres, $elementos_tipos];
$consultacedulas = new Consulta($configuraciones, $codigos, $elementos);
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
//$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
//$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
//$respuestaJSON = $respuestaJSON.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 96 FAMIIARES MENORES DE 5 AÑOS HOMBRES
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Edad", 5, 5, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Genero", 0, "HOMBRE", 0], [1, "familia.Genero", 0, "Hombre", 0], [1, "familia.Genero", 0, "hombre", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 97 FAMIIARES ENTRE 5 Y 9 AÑOS HOMBRES
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Edad", 6, [5, 9], 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Genero", 0, "HOMBRE", 0], [1, "familia.Genero", 0, "Hombre", 0], [1, "familia.Genero", 0, "hombre", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 98 FAMIIARES ENTRE 10 Y 17 AÑOS HOMBRES
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Edad", 6, [10, 17], 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Genero", 0, "HOMBRE", 0], [1, "familia.Genero", 0, "Hombre", 0], [1, "familia.Genero", 0, "hombre", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 99 FAMIIARES ENTRE 18 Y 59 AÑOS HOMBRES
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Edad", 6, [18, 59], 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Genero", 0, "HOMBRE", 0], [1, "familia.Genero", 0, "Hombre", 0], [1, "familia.Genero", 0, "hombre", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 100 FAMIIARES 60 Y MÁS AÑOS HOMBRES
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Edad", 4, 59, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Genero", 0, "HOMBRE", 0], [1, "familia.Genero", 0, "Hombre", 0], [1, "familia.Genero", 0, "hombre", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 101 FAMIIARES EDAD NO HAY DATOS HOMBRES
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Edad", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Genero", 0, "HOMBRE", 0], [1, "familia.Genero", 0, "Hombre", 0], [1, "familia.Genero", 0, "hombre", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 102 FAMIIARES MENORES DE 5 AÑOS MUJERES
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Edad", 5, 5, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Genero", 0, "MUJER", 0], [1, "familia.Genero", 0, "Mujer", 0], [1, "familia.Genero", 0, "mujer", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 103 FAMIIARES ENTRE 5 Y 9 AÑOS MUJERES
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Edad", 6, [5, 9], 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Genero", 0, "MUJER", 0], [1, "familia.Genero", 0, "Mujer", 0], [1, "familia.Genero", 0, "mujer", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 104 FAMIIARES ENTRE 10 Y 17 AÑOS MUJERES
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Edad", 6, [10, 17], 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Genero", 0, "MUJER", 0], [1, "familia.Genero", 0, "Mujer", 0], [1, "familia.Genero", 0, "mujer", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 105 FAMIIARES ENTRE 18 Y 59 AÑOS MUJERES
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Edad", 6, [18, 59], 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Genero", 0, "MUJER", 0], [1, "familia.Genero", 0, "Mujer", 0], [1, "familia.Genero", 0, "mujer", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 106 FAMIIARES 60 Y MÁS AÑOS MUJERES
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Edad", 4, 59, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Genero", 0, "MUJER", 0], [1, "familia.Genero", 0, "Mujer", 0], [1, "familia.Genero", 0, "mujer", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 107 FAMIIARES EDAD NO HAY DATOS MUJERES
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Edad", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Genero", 0, "MUJER", 0], [1, "familia.Genero", 0, "Mujer", 0], [1, "familia.Genero", 0, "mujer", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 108 FAMIIARES LENGUA MATERNA ESPAÑOL
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.LenMat", 0, "Español", 0], [1, "familia.LenMat", 0, "ESPAÑOL", 0], [1, "familia.LenMat", 0, "español", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 109 FAMIIARES LENGUA MATERNA TARAHUMARA
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.LenMat", 0, "Tarahumara", 0], [1, "familia.LenMat", 0, "TARAHUMARA", 0], [1, "familia.LenMat", 0, "tarahumara", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 110 FAMIIARES LENGUA MATERNA TEPEHUAN
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.LenMat", 0, "Tepehuan", 0], [1, "familia.LenMat", 0, "TEPEHUAN", 0], [1, "familia.LenMat", 0, "tepehuan", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 111 FAMIIARES LENGUA MATERNA WUAROJIO
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.LenMat", 0, "Wuarojio", 0], [1, "familia.LenMat", 0, "WUAROJIO", 0], [1, "familia.LenMat", 0, "wuarojio", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 112 FAMIIARES LENGUA MATERNA PIMA
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.LenMat", 0, "Pima", 0], [1, "familia.LenMat", 0, "PIMA", 0], [1, "familia.LenMat", 0, "pima", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 113 FAMIIARES LENGUA MATERNA MENONITA
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.LenMat", 0, "Menonita", 0], [1, "familia.LenMat", 0, "MENONITA", 0], [1, "familia.LenMat", 0, "menonita", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 114 FAMIIARES LENGUA MATERNA OTRO
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.LenMat", 0, "Otro", 0], [1, "familia.LenMat", 0, "OTRO", 0], [1, "familia.LenMat", 0, "otro", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 115 FAMIIARES LENGUA MATERNA NO HAY DATOS
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.LenMat", 0, "Nd", 0], [1, "familia.LenMat", 0, "ND", 0], [1, "familia.LenMat", 0, "nd", 0], [1, "familia.LenMat", 0, "", 0], [1, "familia.LenMat", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 116 FAMIIARES HOMBRES
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Genero", 0, "HOMBRE", 0], [1, "familia.Genero", 0, "Hombre", 0], [1, "familia.Genero", 0, "hombre", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 117 FAMIIARES MUJERES
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Genero", 0, "MUJER", 0], [1, "familia.Genero", 0, "Mujer", 0], [1, "familia.Genero", 0, "mujer", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 118 FAMIIARES GENERO NO HAY DATOS
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Genero", 0, "ND", 0], [1, "familia.Genero", 0, "Nd", 0], [1, "familia.Genero", 0, "nd", 0], [1, "familia.Genero", 0, "", 0], [1, "familia.Genero", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 119 FAMIIARES ESTADO CIVIL CASADO
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.EstCiv", 0, "CASADO", 0], [1, "familia.EstCiv", 0, "Casado", 0], [1, "familia.EstCiv", 0, "casado", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 120 FAMIIARES ESTADO CIVIL SOLTERO
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.EstCiv", 0, "SOLTERO", 0], [1, "familia.EstCiv", 0, "Soltero", 0], [1, "familia.EstCiv", 0, "soltero", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 121 FAMIIARES ESTADO CIVIL UNIÓN LIBRE
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.EstCiv", 0, "UNION LIBRE", 0], [1, "familia.EstCiv", 0, "UNIÓN LIBRE", 0], [1, "familia.EstCiv", 0, "Union Libre", 0], [1, "familia.EstCiv", 0, "Unión Libre", 0], [1, "familia.EstCiv", 0, "Union libre", 0], [1, "familia.EstCiv", 0, "Unión libre", 0], [1, "familia.EstCiv", 0, "union libre", 0], [1, "familia.EstCiv", 0, "unión libre", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 122 FAMIIARES ESTADO CIVIL DIVORCIADO
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.EstCiv", 0, "DIVORCIADO", 0], [1, "familia.EstCiv", 0, "Divorciado", 0], [1, "familia.EstCiv", 0, "divorciado", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 123 FAMIIARES ESTADO CIVIL SEPARADO
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.EstCiv", 0, "SEPARADO", 0], [1, "familia.EstCiv", 0, "Separado", 0], [1, "familia.EstCiv", 0, "separado", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 124 FAMIIARES ESTADO CIVIL NO HAY DATOS
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.EstCiv", 0, "ND", 0], [1, "familia.EstCiv", 0, "Nd", 0], [1, "familia.EstCiv", 0, "nd", 0], [1, "familia.EstCiv", 0, "", 0], [1, "familia.EstCiv", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 125 FAMIIARES PARENTESCO PADRE
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Parente", 0, "PADRE", 0], [1, "familia.Parente", 0, "Padre", 0], [1, "familia.Parente", 0, "padre", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 126 FAMIIARES PARENTESCO MADRE
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Parente", 0, "MADRE", 0], [1, "familia.Parente", 0, "Madre", 0], [1, "familia.Parente", 0, "madre", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 127 FAMIIARES PARENTESCO HIJO
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Parente", 0, "HIJO", 0], [1, "familia.Parente", 0, "Hijo", 0], [1, "familia.Parente", 0, "hijo", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 128 FAMIIARES PARENTESCO PARIENTE
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Parente", 0, "PARIENTE", 0], [1, "familia.Parente", 0, "Pariente", 0], [1, "familia.Parente", 0, "pariente", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 129 FAMIIARES PARENTESCO OTRO
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Parente", 0, "OTRO", 0], [1, "familia.Parente", 0, "Otro", 0], [1, "familia.Parente", 0, "otro", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 130 FAMIIARES PARENTESCO NO HAY DATOS
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Parente", 0, "ND", 0], [1, "familia.Parente", 0, "Nd", 0], [1, "familia.Parente", 0, "nd", 0], [1, "familia.Parente", 0, "", 0], [1, "familia.Parente", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 131 FAMIIARES ESCOLARIDAD PREESCOLAR
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Escola", 0, "PREESCOLAR", 0], [1, "familia.Escola", 0, "Preescolar", 0], [1, "familia.Escola", 0, "preescolar", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 132 FAMIIARES ESCOLARIDAD PRIMARIA
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Escola", 0, "PRIMARIA", 0], [1, "familia.Escola", 0, "Primaria", 0], [1, "familia.Escola", 0, "primaria", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 133 FAMIIARES ESCOLARIDAD SECUNDARIA
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Escola", 0, "SECUNDARIA", 0], [1, "familia.Escola", 0, "Secundaria", 0], [1, "familia.Escola", 0, "secundaria", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 134 FAMIIARES ESCOLARIDAD PREPARATORIA
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Escola", 0, "PREPARATORIA", 0], [1, "familia.Escola", 0, "Preparatoria", 0], [1, "familia.Escola", 0, "preparatoria", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 135 FAMIIARES ESCOLARIDAD TÉCNICO
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Escola", 0, "TECNICO", 0], [1, "familia.Escola", 0, "TÉCNICO", 0], [1, "familia.Escola", 0, "Tecnico", 0], [1, "familia.Escola", 0, "Técnico", 0], [1, "familia.Escola", 0, "tecnico", 0], [1, "familia.Escola", 0, "técnico", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 136 FAMIIARES ESCOLARIDAD PROFESIONAL
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Escola", 0, "PROFESIONAL", 0], [1, "familia.Escola", 0, "Profesional", 0], [1, "familia.Escola", 0, "profesional", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 137 FAMIIARES ESCOLARIDAD POSGRADO
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Escola", 0, "POSGRADO", 0], [1, "familia.Escola", 0, "Posgrado", 0], [1, "familia.Escola", 0, "posgrado", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 138 FAMIIARES ESCOLARIDAD NO ASISTE A LA ESCUELA
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Escola", 0, "NO ASISTE A LA ESCUELA", 0], [1, "familia.Escola", 0, "No Asiste a la Escuela", 0], [1, "familia.Escola", 0, "No asiste a la escuela", 0], [1, "familia.Escola", 0, "no asiste a la escuela", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 139 FAMIIARES ESCOLARIDAD SABE LEER Y ESCRIBIR
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Escola", 0, "SABE LEER Y ESCRIBIR", 0], [1, "familia.Escola", 0, "Sabe Leer y Escribir", 0], [1, "familia.Escola", 0, "Sabe leer y escribir", 0], [1, "familia.Escola", 0, "sabe leer y escribir", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 140 FAMIIARES ESCOLARIDAD ANALFABETA
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Escola", 0, "ANALFABETA", 0], [1, "familia.Escola", 0, "Analfabeta", 0], [1, "familia.Escola", 0, "analfabeta", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 141 FAMIIARES ESCOLARIDAD NO HAY DATOS
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Escola", 0, "ND", 0], [1, "familia.Escola", 0, "Nd", 0], [1, "familia.Escola", 0, "nd", 0], [1, "familia.Escola", 0, "", 0], [1, "familia.Escola", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 142 OCUPACIÓN HOGAR
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Ocupa", 0, "HOGAR", 0], [1, "familia.Ocupa", 0, "Hogar", 0], [1, "familia.Ocupa", 0, "hogar", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 143 OCUPACIÓN ESTUDIANTE
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Ocupa", 0, "ESTUDIANTE", 0], [1, "familia.Ocupa", 0, "Estudiante", 0], [1, "familia.Ocupa", 0, "estudiante", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 144 OCUPACIÓN EMPLEADO
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Ocupa", 0, "EMPLEADO", 0], [1, "familia.Ocupa", 0, "Empleado", 0], [1, "familia.Ocupa", 0, "empleado", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 145 OCUPACIÓN DESEMPLEADO
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Ocupa", 0, "DESEMPLEADO", 0], [1, "familia.Ocupa", 0, "Desempleado", 0], [1, "familia.Ocupa", 0, "desempleado", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 146 OCUPACIÓN POR CUENTA PROPIA
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Ocupa", 0, "POR CUENTA PROPIA", 0], [1, "familia.Ocupa", 0, "Por Cuenta Propia", 0], [1, "familia.Ocupa", 0, "Por cuenta propia", 0], [1, "familia.Ocupa", 0, "por cuenta propia", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 147 OCUPACIÓN NO HAY DATOS
///////////////////////////////////////////////////////////////
// INICIALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[6] = 0;
$consultacedulas -> codigos = ['', '', [], '', '', ''];
$consultacedulas -> configuraciones[2][0] = $filtro_consulta;
$consultacedulas -> configuraciones[2][1] = $lista_parametros;  
// ACTUALIZAMOS VARIABLES DE LA INSTANCIA $consultacedulas
$consultacedulas -> configuraciones[1] = ["familia INNER JOIN cedula ON familia.CedulaId = cedula.ID"];
$consultacedulas -> elementos[0] = ['COUNT(*)'];
$consultacedulas -> configuraciones[3][2] = ['familia.ID'];
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Ocupa", 0, "ND", 0], [1, "familia.Ocupa", 0, "Nd", 0], [1, "familia.Ocupa", 0, "nd", 0], [1, "familia.Ocupa", 0, "", 0], [1, "familia.Ocupa", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'QQQXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'consulta_estadisticas.php: HOMBRES MENORES DE 5 AÑOS: ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $consultacedulas->codigos[0];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DDDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

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
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' TERMINAMOS consulta_estadisticas_familiares.php '.$respuestaJSON;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

