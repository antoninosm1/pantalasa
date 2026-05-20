<?php
// VINCULAMOS CLASES
require_once "../../../pantalib/php/objetos/new/Sistema.php";
require_once "../../../pantalib/php/objetos/new/User.php";
require_once "Conexion_mudanzas.php";
require_once "../../../pantalib/php/objetos/new/Consulta.php";
require_once "../../../pantalib/php/objetos/new/Log.php";
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
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS android_consulta_paquetes.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

// REVISAMOS, BAJAMOS Y ESTABLECEMOS VARIABLES A PARTIR DE VARIABLES POST

$referencia_filtro = $_POST['dato_0'];
$paquete_filtro = $_POST['dato_1'];
$sw_filtro = $_POST['dato_2'];
$tipo_filtro = $_POST['dato_3'];
$posicion_inicio = $_POST['dato_4'];
$porcion = $_POST['dato_5'];
$inicial_lote = $_POST['dato_6'];
$respuestaJSON = '[';

// CONFIGURAMOS LOS FILTROS
$lista_parametros = [];
if ($tipo_filtro == 0) {
    $lista_parametros[] = [0, [[0, "paquetes.ID", 0, $paquete_filtro, 0]], 0];
}
else {
    $lista_parametros[] = [0, [[0, "paquetes.referencia", 0, $referencia_filtro, 0]], 0];
}

$referencia_filtro = $_POST['dato_0'];
$paquete_filtro = $_POST['dato_1'];
$sw_filtro = $_POST['dato_2'];
$tipo_filtro = $_POST['dato_3'];
$posicion_inicio = $_POST['dato_4'];
$porcion = $_POST['dato_5'];
$inicial_lote = $_POST['dato_6'];
$respuestaJSON = '[';

// LOGEAMOS VALORES
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'android_consulta_paquetes.php ESTOS SON LOS VALORES:';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'dato_0 $referencia_filtro : '.$referencia_filtro;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'dato_1 $paquete_filtro... : '.$paquete_filtro;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'dato_2 $sw_filtro        : '.$sw_filtro;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'dato_3 $tipo_filtro      : '.$tipo_filtro;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'dato_4 $posicion_inicio  : '.$posicion_inicio;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'dato_5 $porcion          : '.$porcion;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'dato_6 $inicial_lote     : '.$inicial_lote;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
// HACEMOS INSTANCIA DEL OBJETO Consulta PARA CONOCER LA CANTIDAD DE REGISTROS	
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////

$numero_elementos = 1;
$tables = ['paquetes'];
$where = [$sw_filtro, $lista_parametros]; 
$order_order = 1;
$order_elementos = ['paquetes.ID'];
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
$consulta_total_registros_paquetes = new Consulta($configuraciones, $codigos, $elementos);

// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consulta_total_registros_paquetes->construye();

// LOGEAMOS CONSULTA TOTAL
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'android_consulta_paquetes.php ESTA ES LA CONSULTA DEL TOTAL: ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $consulta_total_registros_paquetes->codigos[0];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();

// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consulta_total_registros_paquetes->ejecuta();

// LOGEAMOS RESPUESTA TOTAL
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'android_consulta_paquetes.php ESTA ES LA CONSULTA DEL TOTAL: ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $consulta_total_registros_paquetes->codigos[1];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();

///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
// HACEMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA DE PAQUETES	
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////

$numero_elementos = 13;
$tables = ['paquetes'];
$where = [$sw_filtro, $lista_parametros]; 
$order_order = 0;
$order_elementos = ['paquetes.ID'];
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
$limites = [1, $posicion_inicio, 200, $consulta_total_registros_paquetes->obtener_dato_lote(0, 0, $posicion_inicio, $porcion), $consulta_total_registros_paquetes->obtener_status(0, 0, $posicion_inicio, $porcion), $inicial_lote];
$registros = 0;
$excel = [0, '', 0, '', '', '', '', ''];
$nombre = 'INST:: consultapaquetes';
$recupera = 0;
$configuraciones = [$numero_elementos, $tables, $where, $order, $sistema, $_SESSION['bd'], $status, $tipo, $limites, $registros, $excel, $nombre, $recupera];
$codigos = ['', '', [], '', '', ''];
$elementos_campos_2 = ['paquetes.ID', // 2, dato_01
'paquetes.referencia', // 2, dato_02
'paquetes.descripcion', // 3, dato_03
'paquetes.fecha', // 4, dato_04
'paquetes.fechastatus', // 5, dato_05
'paquetes.status', // 6, dato_06
'paquetes.comentario', // 7, dato_07
'paquetes.origen', // 8, dato_08
'paquetes.destino', // 9, dato_09
'paquetes.internos', // 10, dato_10
'paquetes.total', // 11, dato_11
'paquetes.responsable',  // 12, dato_12
'paquetes.fechaaccion'];  // 13, dato_13

$elementos_nombres_2 = ['dato_01', 'dato_02', 'dato_03', 'dato_04', 'dato_05', 'dato_06', 'dato_07', 'dato_08', 'dato_09', 'dato_10', 'dato_11', 'dato_12', 'dato_13'];
$elementos_tipos_2 = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
$elementos = [$elementos_campos_2, $elementos_nombres_2, $elementos_tipos_2];
$consultapaquetes = new Consulta($configuraciones, $codigos, $elementos);

// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultapaquetes->ejecuta_rangos();

// LOGEAMOS CONSULTA 
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'android_consulta_paquetes.php ESTA ES LA CONSULTA: ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $consultapaquetes->codigos[0];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();

// HACEMOS CONCATENACIÓN FINAL

    $consultapaquetes->codigos[1] = "[".$consultapaquetes->codigos[1]."]";

// RETORNAMOS VARIABLE codigos[1] DEL PRIMER OBJETO Consulta	
    echo $consultapaquetes->codigos[1];

// LOGEAMOS RESPUESTA
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'android_consulta_paquetes.php ESTA ES LA RESPUESTA: ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $consultapaquetes->codigos[1];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();

 // LOGEAMOS TERMINO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' TERMINAMOS android_consulta_paquetes.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();

