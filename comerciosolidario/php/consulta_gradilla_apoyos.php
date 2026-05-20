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
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS consulta_gradilla_apoyos.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

// REVISAMOS, BAJAMOS Y ESTABLECEMOS VARIABLES A PARTIR DE VARIABLES POST

$programa = $_POST['dato_0'];
$tipo_filtro = $_POST['dato_1'];
$municipio = $_POST['dato_2'];
$localidad = $_POST['dato_3'];
$cedula = $_POST['dato_4'];
$fecha = $_POST['dato_5'];
$posicion_inicio = $_POST['dato_6'];
$porcion = $_POST['dato_7'];
$inicial_lote = $_POST['dato_8'];
$respuestaJSON = '[';

// LOGEAMOS VALORES
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'INICIAMOS consulta_gradilla_apoyos.php ESTOS SON LOS VALORES: ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'PROGRAMA.......: '.$programa;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'TIPO FILTRO....: '.$tipo_filtro;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'LOCALIDAD......: '.$localidad;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'MUNICIPIO......: '.$municipio;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'CEDULA.........: '.$cedula;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'FECHA..........: '.$fecha;
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

$parametro01 = [0, [[0, "apoyos.Programa", 0, $programa, 0]], 0];
$parametro02 = [0, [[0, "cedula.MunicipioNom", 0, $municipio, 0]], 0];
$parametro03 = [0, [[0, "cedula.LocalidadNom", 0, $localidad, 0]], 0];
$parametro04 = [0, [[0, "cedula.ID", 0, $cedula, 0]], 0];
$parametro05 = [0, [[0, "apoyos.FecEntr", 0, $fecha, 0]], 0];

$lista_parametros = [];
$lista_parametros[] = $parametro01;

if ($tipo_filtro == 1) {
    if ($municipio=="VALOR VACIO") {
    }
    else {
        $lista_parametros[] = $parametro02;
    }
    if ($localidad=="VALOR VACIO") {
    }
    else {
        $lista_parametros[] = $parametro03;
    }
}
if ($tipo_filtro == 2) {
    $lista_parametros[] = $parametro04;
}
if ($tipo_filtro == 3) {
    $lista_parametros[] = $parametro05;
}

///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
// HACEMOS INSTANCIA DEL OBJETO Consulta PARA CONOCER LA CANTIDAD DE REGISTROS	
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
$numero_elementos = 1;
$tables = ['apoyos INNER JOIN cedula ON apoyos.CedulaId = cedula.ID'];
$where = [1, $lista_parametros]; 
$order_order = 1;
$order_elementos = ['apoyos.ID'];
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
$consulta_total_registros_apoyos = new Consulta($configuraciones, $codigos, $elementos);

// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consulta_total_registros_apoyos->construye();

// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'consulta_gradilla_apoyos.php ESTA ES LA CONSULTA COUNT:';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $consulta_total_registros_apoyos->codigos[0];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();

// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consulta_total_registros_apoyos->ejecuta();

// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'consulta_gradilla_apoyos.php ESTA ES LA RESPUESTA COUNT:';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $consulta_total_registros_apoyos->codigos[0];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();

///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
// HACEMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA CEDULAS 1	
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////

$numero_elementos = 9;
$tables = ['apoyos INNER JOIN cedula ON apoyos.CedulaId = cedula.ID INNER JOIN familia ON apoyos.Resp = familia.ID'];
$where = [1, $lista_parametros]; 
$order_order = 1;
$order_elementos = ['apoyos.ID'];
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

$limites = [1, $posicion_inicio, 200, $consulta_total_registros_apoyos->obtener_dato_lote(0, 0, $posicion_inicio, $porcion), $consulta_total_registros_apoyos->obtener_status(0, 0, $posicion_inicio, $porcion), $inicial_lote];
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
$nombre = 'INST:: consulta_apoyos';
$recupera = 0;
$configuraciones = [$numero_elementos, $tables, $where, $order, $sistema, $_SESSION['bd'], $status, $tipo, $limites, $registros, $excel, $nombre, $recupera];
$codigos = ['', '', [], '', '', ''];
$elementos_campos = ['apoyos.ID', 'apoyos.UsuarioId', 'apoyos.CedulaId', 'CONCAT(familia.Nombres, " ", familia.Apelli1, " ", familia.Apelli2)', 'CONCAT(cedula.MunicipioNom, " ", cedula.LocalidadNom)', 'apoyos.Desco', 'apoyos.FecEntr', 'apoyos.NumDeta', 'apoyos.FecReg'];
$elementos_nombres = ['dato_01', 'dato_02', 'dato_03', 'dato_04', 'dato_05', 'dato_06', 'dato_07', 'dato_08', 'dato_09'];
$elementos_tipos = [1, 1, 1, 1, 1, 1, 1, 1, 1];
$elementos = [$elementos_campos, $elementos_nombres, $elementos_tipos];
$consulta_apoyos = new Consulta($configuraciones, $codigos, $elementos);
// EJECUTAMOS METODO ejecuta_rangos() DEL OBJETO Consulta	
$consulta_apoyos->ejecuta_rangos();

// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'consulta_gradilla_apoyos.php ESTA ES LA CONSULTA:';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $consulta_apoyos->codigos[0];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();

// CONCATENAMOS LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.$consulta_apoyos->codigos[1].']';

// RETORNAMOS RESPUESTA DEL OBJETO Consulta	
 echo $respuestaJSON;

// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'consulta_gradilla_apoyos.php ESTA ES LA RESPUESTA:';
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
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' TERMINAMOS consulta_gradilla_apoyos.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
