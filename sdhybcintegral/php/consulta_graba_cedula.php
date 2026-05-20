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
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS consulta_graba_cedula.php';
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
$_SESSION['logPhp']->configuraciones[1] = 'DATO 41: '.$_POST['dato_40'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 42: '.$_POST['dato_41'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 43: '.$_POST['dato_42'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 44: '.$_POST['dato_43'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 45: '.$_POST['dato_44'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 46: '.$_POST['dato_45'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 47: '.$_POST['dato_46'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 48: '.$_POST['dato_47'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 49: '.$_POST['dato_48'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 50: '.$_POST['dato_49'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 51: '.$_POST['dato_50'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 52: '.$_POST['dato_51'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 53: '.$_POST['dato_52'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 54: '.$_POST['dato_53'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 55: '.$_POST['dato_54'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 56: '.$_POST['dato_55'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 57: '.$_POST['dato_56'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 58: '.$_POST['dato_57'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 59: '.$_POST['dato_58'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 60: '.$_POST['dato_59'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 61: '.$_POST['dato_60'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 62: '.$_POST['dato_61'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 63: '.$_POST['dato_62'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 64: '.$_POST['dato_63'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 65: '.$_POST['dato_64'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 66: '.$_POST['dato_65'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 67: '.$_POST['dato_66'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 68: '.$_POST['dato_67'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 69: '.$_POST['dato_68'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 70: '.$_POST['dato_69'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 71: '.$_POST['dato_70'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 72: '.$_POST['dato_71'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 73: '.$_POST['dato_72'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 74: '.$_POST['dato_73'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 75: '.$_POST['dato_74'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 76: '.$_POST['dato_75'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 77: '.$_POST['dato_76'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 78: '.$_POST['dato_77'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 79: '.$_POST['dato_78'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 80: '.$_POST['dato_79'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 81: '.$_POST['dato_80'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 82: '.$_POST['dato_81'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 83: '.$_POST['dato_82'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 84: '.$_POST['dato_83'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 85: '.$_POST['dato_84'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 86: '.$_POST['dato_85'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 87: '.$_POST['dato_86'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 88: '.$_POST['dato_87'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 89: '.$_POST['dato_88'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 90: '.$_POST['dato_89'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 91: '.$_POST['dato_90'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 92: '.$_POST['dato_91'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 93: '.$_POST['dato_92'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 94: '.$_POST['dato_93'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 95: '.$_POST['dato_94'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 96: '.$_POST['dato_95'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 97: '.$_POST['dato_96'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 98: '.$_POST['dato_97'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'DATO 99: '.$_POST['dato_98'];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

$tipo_grabacion = $_POST['dato_0'];
$status_cedula = $_POST['dato_1'];
$bloque = $_POST['dato_2'];
$cedula_id = $_POST['dato_3'];
$clave_municipio = $_POST['dato_4'];
$municipio = $_POST['dato_5'];
$clave_localidad = $_POST['dato_6'];
$localidad = $_POST['dato_7'];
$usuario_id = $_POST['dato_8'];

$fecha_01 = $_POST['dato_93'];
$fecha_02 = $_POST['dato_94'];
$fecha_03 = $_POST['dato_95'];

$tipoloca = $_POST['dato_96'];
$numinteg = $_POST['dato_97'];
$origcapt = $_POST['dato_98'];

$fecha_actual = date('Y-m-d H:i:s');
$sw_conteo = 0;
if ($status_cedula == 1) {
    $tipo_consulta = 3;
    $filtro = 1;
    $sw_conteo = 0;
}
else {
    if ($status_cedula == 2) {
        $tipo_consulta = 2;
        $filtro = 0;
    }
    else {
        $tipo_consulta = 0;
        $filtro = 0;
    }
    $sw_conteo = 1;
}

if ($bloque == 1) {
    $fecha_01 = $fecha_actual;
    if ($status_cedula == 1) {
        $fecha_02 = $_POST['dato_94'];
        $fecha_03 = $_POST['dato_95'];
        $tipoloca = $_POST['dato_96'];
        $numinteg = $_POST['dato_97'];
        $origcapt = $_POST['dato_98'];
    }
    else {
        $fecha_02 = '0000-00-00 00:00:00';
        $fecha_03 = '0000-00-00 00:00:00';
        $tipoloca = 'ND';
        $numinteg = 0;
        $origcapt = 'NUEVO';
    }
}
else {
    if ($bloque == 2) {
        $fecha_02 = $fecha_actual;
    }
    else {
        if ($bloque == 3) {
            $fecha_03 = $fecha_actual;
        }
    }
}

$valor_9 = $_POST['dato_9'];
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

$valor_40 = $_POST['dato_40'];
$valor_41 = $_POST['dato_41'];
$valor_42 = $_POST['dato_42'];
$valor_43 = $_POST['dato_43'];
$valor_44 = $_POST['dato_44'];
$valor_45 = $_POST['dato_45'];
$valor_46 = $_POST['dato_46'];
$valor_47 = $_POST['dato_47'];
$valor_48 = $_POST['dato_48'];
$valor_49 = $_POST['dato_49'];

$valor_50 = $_POST['dato_50'];
$valor_51 = $_POST['dato_51'];
$valor_52 = $_POST['dato_52'];
$valor_53 = $_POST['dato_53'];
$valor_54 = $_POST['dato_54'];
$valor_55 = $_POST['dato_55'];
$valor_56 = $_POST['dato_56'];
$valor_57 = $_POST['dato_57'];
$valor_58 = $_POST['dato_58'];
$valor_59 = $_POST['dato_59'];

$valor_60 = $_POST['dato_60'];
$valor_61 = $_POST['dato_61'];
$valor_62 = $_POST['dato_62'];
$valor_63 = $_POST['dato_63'];
$valor_64 = $_POST['dato_64'];
$valor_65 = $_POST['dato_65'];
$valor_66 = $_POST['dato_66'];
$valor_67 = $_POST['dato_67'];
$valor_68 = $_POST['dato_68'];
$valor_69 = $_POST['dato_69'];

$valor_70 = $_POST['dato_70'];
$valor_71 = $_POST['dato_71'];
$valor_72 = $_POST['dato_72'];
$valor_73 = $_POST['dato_73'];
$valor_74 = $_POST['dato_74'];
$valor_75 = $_POST['dato_75'];
$valor_76 = $_POST['dato_76'];
$valor_77 = $_POST['dato_77'];
$valor_78 = $_POST['dato_78'];
$valor_79 = $_POST['dato_79'];

$valor_80 = $_POST['dato_80'];
$valor_81 = $_POST['dato_81'];
$valor_82 = $_POST['dato_82'];
$valor_83 = $_POST['dato_83'];
$valor_84 = $_POST['dato_84'];
$valor_85 = $_POST['dato_85'];
$valor_86 = $_POST['dato_86'];
$valor_87 = $_POST['dato_87'];
$valor_88 = $_POST['dato_88'];
$valor_89 = $_POST['dato_89'];

$valor_90 = $_POST['dato_90'];
$valor_91 = $_POST['dato_91'];
$valor_92 = $_POST['dato_92'];

$respuestaJSON = '[';

// CONFIGURAMOS LOS FILTROS
$lista_parametros = [];
$lista_parametros[] = [0, [[0, "cedula.ID", 0, $cedula_id, 0]], 0];
// HACEMOS INSTANCIA DEL OBJETO Consulta PARA GRABAR LA LOCALIDAD EN BD	
$numero_elementos = 95;
$tables = ["cedula"];
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
$nombre = 'INST::: grabacedula';
$recupera = 1;
$configuraciones = [$numero_elementos, $tables, $where, $order, $sistema, $_SESSION['bd'], $status, $tipo, $limites, $registros, $excell, $nombre, $recupera];
$codigos = ['', '', [], '', '', ''];
$elementos_campos = ['UsuarioId', // 1
'MunicipioNum', // 2
'MunicipioNom', // 3 
'LocalidadNum', // 4
'LocalidadNom', // 5
'Unidad', // 6
'AsistSoc', // 7
'TipoLoc', // 8
'SedeVm', // 9
'SedeVk', // 10

'SedePm', // 11
'SedePk', // 12
'SubsVm', // 13
'SubsVk', // 14
'SubsPm', // 15
'SubsPk', // 16
'FecRegCed', // 17
'TechoConc', // 18
'TechoGalv', // 19
'TechoMade', // 20

'TechoCart', // 21
'TechoOtro', // 22
'PareTabiq', // 23
'PareAdobe', // 24
'PareBlock', // 25
'PareMader', // 26
'ParePiedr', // 27
'PareCarto', // 28
'PisoCemen', // 29
'PisoMader', // 30

'PisoTierr', // 31
'PisoPiedr', // 32
'AgUsoPota', // 33
'AgUsoNori', // 34
'AgUsoRio', // 35
'AgUsoLluv', // 36
'AgConPota', // 37
'AgConPuri', // 38
'AgConHerv', // 39
'AgConClor', // 40

'AgConFilt', // 41
'ExcFoSep', // 42
'ExcLetri', // 43
'ExcRasSu', // 44
'CombGas', // 45
'CombCar', // 46
'CombLen', // 47
'CombOtr', // 48
'BasRedM', // 49
'BasEnte', // 50

'BasCieAb', // 51
'BasInci', // 52
'AlumRedE', // 53
'AlumVela', // 54
'AlumQuin', // 55
'AlumPlaS', // 56
'NumHab', // 57
'Recam', // 58
'Estan', // 59
'Comed', // 60

'Multi', // 61
'Cocin', // 62
'FecRegViv', // 63
'PueIndTara', // 64
'PueIndTepe', // 65
'PueIndWuar', // 66
'PueIndPima', // 67
'PueIndMeno', // 68
'PueIndOtro', // 69
'DerechINSABI', // 70

'DerechIMSS', // 71
'DerechISSSTE', // 72
'DerechPEMEX', // 73
'DerechSEDENA', // 74
'DerechOtro', // 75
'NumPerros', // 76
'NumGatos', // 77
'NumOtros', // 78
'SisSalINSABI', // 79
'SisSalIMSS', // 80

'SisSalISSSTE', // 81
'SisSalPEMEX', // 82
'SisSalSEDENA', // 83
'SisSalOtro', // 84
'SisSalMedPar', // 85
'SisSalCliPar', // 86
'SisSalParter', // 87
'SisSalCurand', // 88
'SisSalYerber', // 89
'SisSalHueser', // 90

'SisSalBotica', // 91
'Comentario', // 92
'FecRegGen', // 93
'NumInteg', // 94
'OrigCapt']; // 95

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
'dato_38',
'dato_39',

'dato_40',
'dato_41',
'dato_42',
'dato_43',
'dato_44',
'dato_45',
'dato_46',
'dato_47',
'dato_48',
'dato_49',

'dato_50',
'dato_51',
'dato_52',
'dato_53',
'dato_54',
'dato_55',
'dato_56',
'dato_57',
'dato_58',
'dato_59',

'dato_60',
'dato_61',
'dato_62',
'dato_63',
'dato_64',
'dato_65',
'dato_66',
'dato_67',
'dato_68',
'dato_69',

'dato_50',
'dato_51',
'dato_52',
'dato_53',
'dato_54',
'dato_55',
'dato_56',
'dato_57',
'dato_58',
'dato_59',

'dato_60',
'dato_61',
'dato_62',
'dato_63',
'dato_64',
'dato_65',
'dato_66',
'dato_67',
'dato_68',
'dato_69',

'dato_70',
'dato_71',
'dato_72',
'dato_73',
'dato_74',
'dato_75',
'dato_76',
'dato_77',
'dato_78',
'dato_79',

'dato_80',
'dato_81',
'dato_82',
'dato_83',
'dato_84',
'dato_85',
'dato_86',
'dato_87',
'dato_88',
'dato_89',

'dato_90',
'dato_91',
'dato_92',
'dato_93',
'dato_94',
'dato_95'];

$elementos_tipos = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
1, 1, 1, 1, 1, 1, 1, 1, 1, 1,
1, 1, 1, 1, 1];

$elementos_valores = [$usuario_id,
$clave_municipio,
$municipio,
$clave_localidad,
$localidad,
$valor_11,
$valor_12,
$tipoloca,
$valor_15,
$valor_16,

$valor_17,
$valor_18,
$valor_15,
$valor_16,
$valor_17,
'0',

$fecha_01,

$valor_19,
$valor_20,
$valor_21,

$valor_22,
$valor_23,
$valor_24,
$valor_25,
$valor_26,
$valor_27,
$valor_28,
$valor_29,
$valor_30,
$valor_31,

$valor_32,
$valor_33,
$valor_34,
$valor_35,
$valor_36,
$valor_37,
$valor_38,
$valor_39,
$valor_40,
$valor_41,

$valor_42,
$valor_43,
$valor_44,
$valor_45,
$valor_46,
$valor_47,
$valor_48,
$valor_49,
$valor_50,
$valor_51,

$valor_52,
$valor_53,
$valor_54,
$valor_55,
$valor_56,
$valor_57,
$valor_58,
$valor_59,
$valor_60,
$valor_61,

$valor_62,
$valor_63,

$fecha_02,

$valor_64,
$valor_65,
$valor_66,
$valor_67,
$valor_68,
$valor_69,
$valor_70,

$valor_71,
$valor_72,
$valor_73,
$valor_74,
$valor_75,
$valor_76,
$valor_77,
$valor_78,
$valor_79,
$valor_80,

$valor_81,
$valor_82,
$valor_83,
$valor_84,
$valor_85,
$valor_86,
$valor_87,
$valor_88,
$valor_89,
$valor_90,

$valor_91,
$valor_92,

$fecha_03,

$numinteg,
$origcapt];

$elementos = [$elementos_campos, $elementos_nombres, $elementos_tipos, $elementos_valores];

$grabacedula = new Consulta($configuraciones, $codigos, $elementos);

// EJECUTAMOS METODO construye() DEL SEGUNDO OBJETO Consulta	
$grabacedula->construye();

// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'consulta_graba_cedula.php CONSULTA';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $grabacedula->codigos[0];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();

// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$grabacedula->ejecuta();

// CONCATENAMOS LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.$grabacedula->codigos[1].']';

// RETORNAMOS RESPUESTA DEL OBJETO Consulta	
 echo $respuestaJSON;

// CONFIGURAMOS LOS FILTROS
$lista_parametros = [];
$lista_parametros[] = [0, [[0, "usuarios.ID", 0, $usuario_id, 0]], 0];

// HACEMOS INSTANCIA DEL OBJETO Consulta PARA GRABAR FAMILIAR EN BD	
$numero_elementos = 1;
$tables = ["usuarios"];
$where = [1, $lista_parametros]; 
$order_order = 0;
$order_elementos = [];
$order = [0, 0, []];
$sistema = $_SESSION['Sistema'];
$status = 0;
$tipo = 5;
$limites = [0, 0, 0, 0, 0, 0];
$registros = 0;
$excell = [0, '', 0, '', '', '', '', ''];
$nombre = 'INST::: grabausuario';
$recupera = 0;
$configuraciones = [$numero_elementos, $tables, $where, $order, $sistema, $_SESSION['bd'], $status, $tipo, $limites, $registros, $excell, $nombre, $recupera];
$codigos = ['', '', [], '', '', ''];
$elementos_campos = ['NumeroCedulas'];
$elementos_nombres = ['dato_1'];
$elementos_tipos = [[$sw_conteo, 1]];
$elementos_valores = ['NumeroCedulas'];
$elementos = [$elementos_campos, $elementos_nombres, $elementos_tipos, $elementos_valores];
$grabausuario = new Consulta($configuraciones, $codigos, $elementos);

// EJECUTAMOS METODO construye() DEL SEGUNDO OBJETO Consulta	
$grabausuario->construye();

// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'consulta_graba_cedula.php ESTA ES LA CONSULTA: ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $grabausuario->codigos[0];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();

// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$grabausuario->ejecuta();

// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'consulta_graba_cedula.php ESTA ES LA RESPUESTA: ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $grabausuario->codigos[1];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();

































































// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'consulta_graba_cedula.php RESPUESTA JSON';
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
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' TERMINAMOS consulta_graba_cedula.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();


