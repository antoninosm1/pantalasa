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
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 148 INGRESOS MENOR AL SALARIO MINIMO
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Ingres", 0, "MENOR AL SALARIO MINIMO", 0], [1, "familia.Ingres", 0, "MENOR AL SALARIO MÍNIMO", 0], [1, "familia.Ingres", 0, "Menor al Salario Minimo", 0], [1, "familia.Ingres", 0, "Menor al Salario Mínimo", 0], [1, "familia.Ingres", 0, "Menor al salario minimo", 0], [1, "familia.Ingres", 0, "Menor al salario mínimo", 0], [1, "familia.Ingres", 0, "Menor al salario mínimo", 0], [1, "familia.Ingres", 0, "menor al salario minimo", 0], [1, "familia.Ingres", 0, "menor al salario mínimo", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 149 INGRESOS IGUAL AL SALARIO MINIMO
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Ingres", 0, "IGUAL AL SALARIO MINIMO", 0], [1, "familia.Ingres", 0, "IGUAL AL SALARIO MÍNIMO", 0], [1, "familia.Ingres", 0, "Igual al Salario Minimo", 0], [1, "familia.Ingres", 0, "Igual al Salario Mínimo", 0], [1, "familia.Ingres", 0, "Igual al salario minimo", 0], [1, "familia.Ingres", 0, "Igual al salario mínimo", 0], [1, "familia.Ingres", 0, "Igual al salario mínimo", 0], [1, "familia.Ingres", 0, "igual al salario minimo", 0], [1, "familia.Ingres", 0, "igual al salario mínimo", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 150 INGRESOS MAYOR AL SALARIO MINIMO
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Ingres", 0, "MAYOR AL SALARIO MINIMO", 0], [1, "familia.Ingres", 0, "MAYOR AL SALARIO MÍNIMO", 0], [1, "familia.Ingres", 0, "Mayor al Salario Minimo", 0], [1, "familia.Ingres", 0, "Mayor al Salario Mínimo", 0], [1, "familia.Ingres", 0, "Mayor al salario minimo", 0], [1, "familia.Ingres", 0, "Mayor al salario mínimo", 0], [1, "familia.Ingres", 0, "Mayor al salario mínimo", 0], [1, "familia.Ingres", 0, "mayor al salario minimo", 0], [1, "familia.Ingres", 0, "mayor al salario mínimo", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 151 INGRESOS NO HAY DATOS
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Ingres", 0, "ND", 0], [1, "familia.Ingres", 0, "Nd", 0], [1, "familia.Ingres", 0, "nd", 0], [1, "familia.Ingres", 0, "", 0], [1, "familia.Ingres", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 152 DETECCIONES PAPANICOLAOU
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Papani", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 153 DETECCIONES HIPERTENSIÓN
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Hipert", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 154 DETECCIONES DIABETES
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Diabet", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 155 DETECCIONES TUBERCULOSIS
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Tuberc", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 156 DETECCIONES ALCOHOL
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Alcoho", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 157 DETECCIONES TABAQUISMO
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Tabaqu", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 158 DETECCIONES CANCER
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Cancer", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 159 PLANIFICACIÓN FAMILIAR DIU
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Diu", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 160 PLANIFICACIÓN FAMILIAR ORALES
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Orales", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 161 PLANIFICACIÓN FAMILIAR PRESERVATIVOS
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Preser", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 162 PLANIFICACIÓN FAMILIAR INYECCIONES MENSUALES
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.InyMens", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 163 PLANIFICACIÓN FAMILIAR INYECCIONES BIMENSUALES
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.InyBien", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 164 PLANIFICACIÓN FAMILIAR SALPINGO
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Salping", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 165 PLANIFICACIÓN FAMILIAR IMPLANTES
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Implant", 0, 1, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 166 EMBARAZADA SI
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Embaraz", 0, "SI", 0], [1, "familia.Embaraz", 0, "SÍ", 0], [1, "familia.Embaraz", 0, "Si", 0], [1, "familia.Embaraz", 0, "Sí", 0], [1, "familia.Embaraz", 0, "si", 0], [1, "familia.Embaraz", 0, "sí", 0], [0, "familia.Embaraz", 0, "EN CONTROL", 0], [1, "familia.Embaraz", 0, "En Control", 0], [1, "familia.Embaraz", 0, "En control", 0], [1, "familia.Embaraz", 0, "en control", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 167 EMBARAZADA EN CONTROL
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Embaraz", 0, "EN CONTROL", 0], [1, "familia.Embaraz", 0, "En Control", 0], [1, "familia.Embaraz", 0, "En control", 0], [1, "familia.Embaraz", 0, "en control", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 168 BAÑO Y CAMBIO DE ROPA DIARIO
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Bacamro", 0, "DIARIO", 0], [1, "familia.Bacamro", 0, "Diario", 0], [1, "familia.Bacamro", 0, "diario", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 169 BAÑO Y CAMBIO DE ROPA TRES VECES POR SEMANA
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Bacamro", 0, "TRES VECES POR SEMANA", 0], [1, "familia.Bacamro", 0, "Tres Veces Por Semana", 0], [1, "familia.Bacamro", 0, "Tres veces por semana", 0], [1, "familia.Bacamro", 0, "tres veces por semana", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 170 BAÑO Y CAMBIO DE ROPA DOS VECES POR SEMANA
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Bacamro", 0, "DOS VECES POR SEMANA", 0], [1, "familia.Bacamro", 0, "Dos Veces Por Semana", 0], [1, "familia.Bacamro", 0, "Dos veces por semana", 0], [1, "familia.Bacamro", 0, "dos veces por semana", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 171 BAÑO Y CAMBIO DE ROPA NUNCA
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Bacamro", 0, "NUNCA", 0], [1, "familia.Bacamro", 0, "Nunca", 0], [1, "familia.Bacamro", 0, "nunca", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 172 BAÑO Y CAMBIO DE ROPA NO HAY DATOS
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Bacamro", 0, "ND", 0], [1, "familia.Bacamro", 0, "Nd", 0], [1, "familia.Bacamro", 0, "nd", 0], [1, "familia.Bacamro", 0, "", 0], [1, "familia.Bacamro", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 173 LAVADO DE DIENTES DIARIO
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.LavDien", 0, "DIARIO", 0], [1, "familia.LavDien", 0, "Diario", 0], [1, "familia.LavDien", 0, "diario", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 174 LAVADO DE DIENTES TRES VECES POR SEMANA
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.LavDien", 0, "TRES VECES POR SEMANA", 0], [1, "familia.LavDien", 0, "Tres Veces Por Semana", 0], [1, "familia.LavDien", 0, "Tres veces por semana", 0], [1, "familia.LavDien", 0, "tres veces por semana", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 175 LAVADO DE DIENTES DOS VECES POR SEMANA
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.LavDien", 0, "DOS VECES POR SEMANA", 0], [1, "familia.LavDien", 0, "Dos Veces Por Semana", 0], [1, "familia.LavDien", 0, "Dos veces por semana", 0], [1, "familia.LavDien", 0, "dos veces por semana", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 176 LAVADO DE DIENTES NUNCA
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.LavDien", 0, "NUNCA", 0], [1, "familia.LavDien", 0, "Nunca", 0], [1, "familia.LavDien", 0, "nunca", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 177 LAVADO DE DIENTES NO HAY DATOS
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.LavDien", 0, "ND", 0], [1, "familia.LavDien", 0, "Nd", 0], [1, "familia.LavDien", 0, "nd", 0], [1, "familia.LavDien", 0, "", 0], [1, "familia.LavDien", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 178 LIMPIEZA DE VIVIENDA DIARIO
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.LimVivi", 0, "DIARIO", 0], [1, "familia.LimVivi", 0, "Diario", 0], [1, "familia.LimVivi", 0, "diario", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 179 LIMPIEZA DE VIVIENDA TRES VECES POR SEMANA
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.LimVivi", 0, "TRES VECES POR SEMANA", 0], [1, "familia.LimVivi", 0, "Tres Veces Por Semana", 0], [1, "familia.LimVivi", 0, "Tres veces por semana", 0], [1, "familia.LimVivi", 0, "tres veces por semana", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 180 LIMPIEZA DE VIVIENDA DOS VECES POR SEMANA
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.LimVivi", 0, "DOS VECES POR SEMANA", 0], [1, "familia.LimVivi", 0, "Dos Veces Por Semana", 0], [1, "familia.LimVivi", 0, "Dos veces por semana", 0], [1, "familia.LimVivi", 0, "dos veces por semana", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 181 LIMPIEZA DE VIVIENDA NUNCA
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.LimVivi", 0, "NUNCA", 0], [1, "familia.LimVivi", 0, "Nunca", 0], [1, "familia.LimVivi", 0, "nunca", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 182 LIMPIEZA DE VIVIENDA NO HAY DATOS
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.LimVivi", 0, "ND", 0], [1, "familia.LimVivi", 0, "Nd", 0], [1, "familia.LimVivi", 0, "nd", 0], [1, "familia.LimVivi", 0, "", 0], [1, "familia.LimVivi", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 183 BEBIDAS ALCOHOLICAS DIARIO
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.BebAlco", 0, "DIARIO", 0], [1, "familia.BebAlco", 0, "Diario", 0], [1, "familia.BebAlco", 0, "diario", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 184 BEBIDAS ALCOHOLICAS TRES VECES POR SEMANA
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.BebAlco", 0, "TRES VECES POR SEMANA", 0], [1, "familia.BebAlco", 0, "Tres Veces Por Semana", 0], [1, "familia.BebAlco", 0, "Tres veces por semana", 0], [1, "familia.BebAlco", 0, "tres veces por semana", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 185 BEBIDAS ALCOHOLICAS DOS VECES POR SEMANA
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.BebAlco", 0, "DOS VECES POR SEMANA", 0], [1, "familia.BebAlco", 0, "Dos Veces Por Semana", 0], [1, "familia.BebAlco", 0, "Dos veces por semana", 0], [1, "familia.BebAlco", 0, "dos veces por semana", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 186 BEBIDAS ALCOHOLICAS NUNCA
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.BebAlco", 0, "NUNCA", 0], [1, "familia.BebAlco", 0, "Nunca", 0], [1, "familia.BebAlco", 0, "nunca", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 187 BEBIDAS ALCOHOLICAS NO HAY DATOS
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.BebAlco", 0, "ND", 0], [1, "familia.BebAlco", 0, "Nd", 0], [1, "familia.BebAlco", 0, "nd", 0], [1, "familia.BebAlco", 0, "", 0], [1, "familia.BebAlco", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 188 TABACO DIARIO
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Tabaco", 0, "DIARIO", 0], [1, "familia.Tabaco", 0, "Diario", 0], [1, "familia.Tabaco", 0, "diario", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 189 TABACO TRES VECES POR SEMANA
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Tabaco", 0, "TRES VECES POR SEMANA", 0], [1, "familia.Tabaco", 0, "Tres Veces Por Semana", 0], [1, "familia.Tabaco", 0, "Tres veces por semana", 0], [1, "familia.Tabaco", 0, "tres veces por semana", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 190 TABACO DOS VECES POR SEMANA
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Tabaco", 0, "DOS VECES POR SEMANA", 0], [1, "familia.Tabaco", 0, "Dos Veces Por Semana", 0], [1, "familia.Tabaco", 0, "Dos veces por semana", 0], [1, "familia.Tabaco", 0, "dos veces por semana", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 191 TABACO NUNCA
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Tabaco", 0, "NUNCA", 0], [1, "familia.Tabaco", 0, "Nunca", 0], [1, "familia.Tabaco", 0, "nunca", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 192 TABACO NO HAY DATOS
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Tabaco", 0, "ND", 0], [1, "familia.Tabaco", 0, "Nd", 0], [1, "familia.Tabaco", 0, "nd", 0], [1, "familia.Tabaco", 0, "", 0], [1, "familia.Tabaco", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 193 MEDICAMENTOS DIARIO
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Medica", 0, "DIARIO", 0], [1, "familia.Medica", 0, "Diario", 0], [1, "familia.Medica", 0, "diario", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 194 MEDICAMENTOS TRES VECES POR SEMANA
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Medica", 0, "TRES VECES POR SEMANA", 0], [1, "familia.Medica", 0, "Tres Veces Por Semana", 0], [1, "familia.Medica", 0, "Tres veces por semana", 0], [1, "familia.Medica", 0, "tres veces por semana", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 195 MEDICAMENTOS DOS VECES POR SEMANA
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Medica", 0, "DOS VECES POR SEMANA", 0], [1, "familia.Medica", 0, "Dos Veces Por Semana", 0], [1, "familia.Medica", 0, "Dos veces por semana", 0], [1, "familia.Medica", 0, "dos veces por semana", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 196 MEDICAMENTOS NUNCA
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Medica", 0, "NUNCA", 0], [1, "familia.Medica", 0, "Nunca", 0], [1, "familia.Medica", 0, "nunca", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 197 MEDICAMENTOS NO HAY DATOS
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Medica", 0, "ND", 0], [1, "familia.Medica", 0, "Nd", 0], [1, "familia.Medica", 0, "nd", 0], [1, "familia.Medica", 0, "", 0], [1, "familia.Medica", 2, 0, 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 198 DROGAS DIARIO
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Drogas", 0, "DIARIO", 0], [1, "familia.Drogas", 0, "Diario", 0], [1, "familia.Drogas", 0, "diario", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 199 DROGAS TRES VECES POR SEMANA
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Drogas", 0, "TRES VECES POR SEMANA", 0], [1, "familia.Drogas", 0, "Tres Veces Por Semana", 0], [1, "familia.Drogas", 0, "Tres veces por semana", 0], [1, "familia.Drogas", 0, "tres veces por semana", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 200 DROGAS DOS VECES POR SEMANA
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Drogas", 0, "DOS VECES POR SEMANA", 0], [1, "familia.Drogas", 0, "Dos Veces Por Semana", 0], [1, "familia.Drogas", 0, "Dos veces por semana", 0], [1, "familia.Drogas", 0, "dos veces por semana", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 201 DROGAS NUNCA
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Drogas", 0, "NUNCA", 0], [1, "familia.Drogas", 0, "Nunca", 0], [1, "familia.Drogas", 0, "nunca", 0]], 0];  
$consultacedulas -> configuraciones[2][0] = 1;
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();
// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();
// INICIAMOS CONCATENACIÓN DE LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.', '.$consultacedulas->codigos[1];

///////////////////////////////////////////////////////////////
// RECONFIGURAMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA 202 DROGAS NO HAY DATOS
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
$consultacedulas -> configuraciones[2][1][] = [0, [[0, "familia.Drogas", 0, "ND", 0], [1, "familia.Drogas", 0, "Nd", 0], [1, "familia.Drogas", 0, "nd", 0], [1, "familia.Drogas", 0, "", 0], [1, "familia.Drogas", 2, 0, 0]], 0];  
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

