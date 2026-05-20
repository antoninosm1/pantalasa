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
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS consulta_graba_familiar.php';
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
$_SESSION['logPhp']->configuraciones[1] = 'DATO 01: '.$_POST['dato_0'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 02: '.$_POST['dato_1'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 03: '.$_POST['dato_2'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 04: '.$_POST['dato_3'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 05: '.$_POST['dato_4'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 06: '.$_POST['dato_5'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 07: '.$_POST['dato_6'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 08: '.$_POST['dato_7'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 09: '.$_POST['dato_8'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 10: '.$_POST['dato_9'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 11: '.$_POST['dato_10'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 12: '.$_POST['dato_11'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 13: '.$_POST['dato_12'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 14: '.$_POST['dato_13'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 15: '.$_POST['dato_14'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 16: '.$_POST['dato_15'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 17: '.$_POST['dato_16'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 18: '.$_POST['dato_17'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 19: '.$_POST['dato_18'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 20: '.$_POST['dato_19'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 21: '.$_POST['dato_20'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 22: '.$_POST['dato_21'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 23: '.$_POST['dato_22'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 24: '.$_POST['dato_23'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 25: '.$_POST['dato_24'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 26: '.$_POST['dato_25'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 27: '.$_POST['dato_26'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 28: '.$_POST['dato_27'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 29: '.$_POST['dato_28'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 30: '.$_POST['dato_29'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 31: '.$_POST['dato_30'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 32: '.$_POST['dato_31'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 33: '.$_POST['dato_32'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 34: '.$_POST['dato_33'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 35: '.$_POST['dato_34'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 36: '.$_POST['dato_35'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 37: '.$_POST['dato_36'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 38: '.$_POST['dato_37'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 39: '.$_POST['dato_38'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 40: '.$_POST['dato_39'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

$status_familiar = $_POST['dato_0'];
$familiar_id = $_POST['dato_1'];
$cedula_id = $_POST['dato_2'];

$fecha_actual = date('Y-m-d H:i:s');

if ($status_familiar == 1) {
    $tipo_consulta = 3;
    $filtro = 1;
}
else {
    if ($status_familiar == 2) {
        $tipo_consulta = 2;
        $filtro = 0;
    }
    else {
        $tipo_consulta = 0;
        $filtro = 0;
    }
}

$valor_05 = $_POST['dato_5'];
$valor_06 = $_POST['dato_6'];
$valor_07 = $_POST['dato_7'];
$valor_08 = $_POST['dato_8'];
$valor_09 = $_POST['dato_9'];
$valor_10 = $_POST['dato_10'];

$valor_11 = $_POST['dato_11'];
$valor_12 = $_POST['dato_12'];
$valor_13 = $_POST['dato_13'];
$valor_14 = $_POST['dato_14'];
$valor_15 = $_POST['dato_15'];
$valor_16 = $_POST['dato_16'];
$valor_17 = $_POST['dato_17'];
$valor_18 = $_POST['dato_18'];
$valor_19 = $_POST['dato_19'];

$valor_20 = $_POST['dato_20'];
$valor_21 = $_POST['dato_21'];
$valor_22 = $_POST['dato_22'];
$valor_23 = $_POST['dato_23'];
$valor_24 = $_POST['dato_24'];
$valor_25 = $_POST['dato_25'];
$valor_26 = $_POST['dato_26'];
$valor_27 = $_POST['dato_27'];
$valor_28 = $_POST['dato_28'];
$valor_29 = $_POST['dato_29'];

$valor_30 = $_POST['dato_30'];
$valor_31 = $_POST['dato_31'];
$valor_32 = $_POST['dato_32'];
$valor_33 = $_POST['dato_33'];
$valor_34 = $_POST['dato_34'];
$valor_35 = $_POST['dato_35'];
$valor_36 = $_POST['dato_36'];
$valor_37 = $_POST['dato_37'];
$valor_38 = $_POST['dato_38'];
$valor_39 = $_POST['dato_39'];

$respuestaJSON = '[';

// CONFIGURAMOS LOS FILTROS
$lista_parametros = [];
$lista_parametros[] = [0, [[0, "familia.ID", 0, $familiar_id, 0]], 0];

// HACEMOS INSTANCIA DEL OBJETO Consulta PARA GRABAR FAMILIAR EN BD	
$numero_elementos = 38;
$tables = ["familia"];
$where = [$filtro, $lista_parametros]; 
$order_order = 0;
$order_elementos = [];
$order = [0, 0, []];
$sistema = $_SESSION['Sistema'];
$status = 0;
$tipo = $tipo_consulta;
$limites = [0, 0, 0, 0, 0, 0];
$registros = 0;
$excell = [0, '', 0, '', '', '', '', ''];
$nombre = 'INST::: grabafamiliar';
$recupera = 1;
$configuraciones = [$numero_elementos, $tables, $where, $order, $sistema, $_SESSION['bd'], $status, $tipo, $limites, $registros, $excell, $nombre, $recupera];
$codigos = ['', '', [], '', '', ''];
$elementos_campos = ['CedulaId',
'NumInt',
'Apelli1',
'Apelli2',
'Nombres',
'FecNac',
'Edad',
'Genero',
'EstOrig',
'LenMat',
'EstCiv',
'Parente',
'Escola',
'Ocupa',
'Ingres',
'Papani',
'Hipert',
'Diabet',
'Tuberc',
'Alcoho',
'Tabaqu',
'Cancer',
'Diu',
'Orales',
'Preser',
'InyMens',
'InyBien',
'Salping',
'Implant',
'Embaraz',
'Bacamro',
'LavDien',
'LimVivi',
'BebAlco',
'Tabaco',
'Medica',
'Drogas',
'FecRegInt']; // 38

$elementos_nombres = ['dato_1',
'dato_2',
'dato_3',
'dato_4',
'dato_5',
'dato_6',
'dato_7',
'dato_8',
'dato_9',

'dato_10',
'dato_11',
'dato_12',
'dato_13',
'dato_14',
'dato_15',
'dato_16',
'dato_17',
'dato_18',
'dato_19',

'dato_10',
'dato_11',
'dato_12',
'dato_13',
'dato_14',
'dato_15',
'dato_16',
'dato_17',
'dato_18',
'dato_19',

'dato_20',
'dato_21',
'dato_22',
'dato_23',
'dato_24',
'dato_25',
'dato_26',
'dato_27',
'dato_28',
'dato_29',

'dato_30',
'dato_31',
'dato_32',
'dato_33',
'dato_34',
'dato_35',
'dato_36',
'dato_37',
'dato_38'
];

$elementos_tipos = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
1, 1, 1, 1, 1, 1, 1, 1];

$elementos_valores = [$cedula_id, // 01
0, // 02
$valor_05, // 03
$valor_06, // 04
$valor_07, // 05
$valor_08, // 06
$valor_09, // 07
$valor_10, // 08
$valor_11, // 09
$valor_12, // 10
$valor_13, // 11
$valor_14, // 12
$valor_15, // 13
$valor_16, // 14
$valor_17, // 15
$valor_18, // 16
$valor_19, // 17
$valor_20, // 18
$valor_21, // 19
$valor_22, // 20
$valor_23, // 21
$valor_24, // 22
$valor_25, // 23
$valor_26, // 24
$valor_27, // 25
$valor_28, // 26
$valor_29, // 27
$valor_30, // 28
$valor_31, // 29
$valor_32, // 30
$valor_33, // 31

$valor_34, // 32
$valor_35, // 33
$valor_36, // 34
$valor_37, // 35
$valor_38, // 36
$valor_39, // 37
$fecha_actual // 38
];

$elementos = [$elementos_campos, $elementos_nombres, $elementos_tipos, $elementos_valores];

$grabafamiliar = new Consulta($configuraciones, $codigos, $elementos);

// EJECUTAMOS METODO construye() DEL SEGUNDO OBJETO Consulta	
$grabafamiliar->construye();

// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'consulta_graba_familiar.php CONSULTA';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $grabafamiliar->codigos[0];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();

// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$grabafamiliar->ejecuta();

// CONCATENAMOS LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.$grabafamiliar->codigos[1].']';

// HACEMOS INSTANCIA DEL OBJETO Reordena PARA REORDENAR NUMERO DE FAMILIAR	
$status = 0;
$vinculo = ['cedula', 'cedula.ID', 'cedula.NumInteg', $cedula_id, 'familia', 'familia.CedulaId', 'familia.ID', 'familia.ID', 'familia.NumInt'];
$configuraciones = [$status, $vinculo, $_SESSION['bd']];
$reordenafamiliar = new Reordena($configuraciones);

// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$reordenafamiliar->ejecuta();

// RETORNAMOS RESPUESTA DEL OBJETO Consulta	
//$respuestaJSON = $respuestaJSON.']';

echo $respuestaJSON;

// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'consulta_graba_familiar.php RESPUESTA JSON';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $respuestaJSON;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();

 // LOGEAMOS TERMINO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' TERMINAMOS consulta_graba_familiar.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();


