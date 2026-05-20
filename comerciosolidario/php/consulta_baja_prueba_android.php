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

// INICIA PROCESO PARA ESTABLECER SISTEMA
$configuraciones = [10, 'sdhybc', 1, 'https://sdhybc.org/nuevo/', 0];
$_SESSION['Sistema'] = new Sistema($configuraciones);

// INICIA PROCESO PARA ESTABLECER LOG DE PHP
$archivo_log = 'karmela.txt';
$mensaje_log = date('Y-m-d H:i:s').' ESTABLECEMOS LOG PHP EN FLUJO PRINCIPAL';
$ruta_log = 'logs/';
$sistema_log = $_SESSION['Sistema'];
$configuraciones = [$archivo_log, $mensaje_log, $ruta_log, $sistema_log];
$_SESSION['logPhp'] = new Log($configuraciones);
$_SESSION['logPhp']->escribe_log();

// INICIA PROCESO PARA ESTABLECER CONEXIÓN DE BD
$_SESSION['bd'] = new Conexion_sdhybc();

// INICIA PROCESO PARA ESTABLECER USUARIO VACIO
$consulta_objeto = '';
$configuraciones = [$consulta_objeto];
$id_user = 0;
$name_user = '';
$paterno_user = '';
$materno_user = '';
$paterno_user = '';
$mail_user = '';
$pass_user = '';
$priv_user = '';
$elementos_valores = [$id_user, $name_user, $paterno_user, $materno_user, $mail_user, $pass_user, $priv_user];
$elementos = [$elementos_valores];
$_SESSION['User'] = new User($configuraciones, $elementos);

// ESTABLECEMOS PARAMETROS DE LOG
$_SESSION['logPhp']->configuraciones[2] = '../logs/';

// LOGEAMOS INICIO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS consulta_baja_cedula.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();

// REVISAMOS, BAJAMOS Y ESTABLECEMOS VARIABLES A PARTIR DE VARIABLES POST
$cedula = $_POST['dato_0'];
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
$numero_elementos = 96;
$tables = ['cedula'];
$where = [$filtro, $lista_parametros]; 
$order_order = 0;
$order_elementos = ['cedula.ID'];
$order = [1, $order_order, $order_elementos];
$sistema = $_SESSION['Sistema'];
$status = 0;
$tipo = 1;
$limites = [0, 0, 0, 0, 0, 0];
$registros = 0;
$excel = [0, '', 0, '', '', '', '', ''];
$nombre = 'INST:: consultacedulas';
$recupera = 0;
$configuraciones = [$numero_elementos, $tables, $where, $order, $sistema, $_SESSION['bd'], $status, $tipo, $limites, $registros, $excel, $nombre, $recupera];
$codigos = ['', '', [], '', '', ''];
$elementos_campos_2 = ['cedula.ID', // 2, dato_01
'cedula.UsuarioId', // 2, dato_02
'cedula.MunicipioNum', // 2, dato_03
'cedula.MunicipioNom', // 2, dato_04
'cedula.LocalidadNum', // 2, dato_05
'cedula.LocalidadNom', // 2, dato_06
'cedula.Unidad', // 2, dato_07
'cedula.AsistSoc', // 2, dato_08
'cedula.TipoLoc', // 2, dato_09
'cedula.SedeVm', // 2, dato_10
'cedula.SedeVk', // 2, dato_11
'cedula.SedePm', // 2, dato_12
'cedula.SedePk', // 2, dato_13
'cedula.SubsVm', // 2, dato_14
'cedula.SubsVk', // 2, dato_15
'cedula.SubsPm', // 2, dato_16
'cedula.SubsPk', // 2, dato_17
'cedula.FecRegCed', // 2, dato_18
'cedula.TechoConc', // 2, dato_19
'cedula.TechoGalv', // 2, dato_20
'cedula.TechoMade', // 2, dato_21
'cedula.TechoCart', // 2, dato_22
'cedula.TechoOtro', // 2, dato_23
'cedula.PareTabiq', // 2, dato_24
'cedula.PareAdobe', // 2, dato_25
'cedula.PareBlock', // 2, dato_26
'cedula.PareMader', // 2, dato_27
'cedula.ParePiedr', // 2, dato_28
'cedula.PareCarto', // 2, dato_29
'cedula.PisoCemen', // 2, dato_30
'cedula.PisoMader', // 2, dato_31
'cedula.PisoTierr', // 2, dato_32
'cedula.PisoPiedr', // 2, dato_33
'cedula.AgUsoPota', // 2, dato_34
'cedula.AgUsoNori', // 2, dato_35
'cedula.AgUsoRio', // 2, dato_36
'cedula.AgUsoLluv', // 2, dato_37
'cedula.AgConPota', // 2, dato_38
'cedula.AgConPuri', // 2, dato_39
'cedula.AgConHerv', // 2, dato_40
'cedula.AgConClor', // 2, dato_41
'cedula.AgConFilt', // 2, dato_42
'cedula.ExcFoSep', // 2, dato_43
'cedula.ExcLetri', // 2, dato_44 
'cedula.ExcRasSu', // 2, dato_45
'cedula.CombGas', // 2, dato_46
'cedula.CombCar', // 2, dato_47
'cedula.CombLen', // 2, dato_48
'cedula.CombOtr', // 2, dato_49
'cedula.BasRedM', // 2, dato_50
'cedula.BasEnte', // 2, dato_51
'cedula.BasCieAb', // 2, dato_52
'cedula.BasInci', // 2, dato_53
'cedula.AlumRedE', // 2, dato_54
'cedula.AlumVela', // 2, dato_55
'cedula.AlumQuin', // 2, dato_56
'cedula.AlumPlaS', // 2, dato_57
'cedula.NumHab', // 2, dato_58
'cedula.Recam', // 2, dato_59
'cedula.Estan', // 2, dato_60
'cedula.Comed', // 2, dato_61
'cedula.Multi', // 2, dato_62
'cedula.Cocin', // 2, dato_63
'cedula.FecRegViv', // 2, dato_64
'cedula.PueIndTara', // 2, dato_65
'cedula.PueIndTepe', // 2, dato_66
'cedula.PueIndWuar', // 2, dato_67
'cedula.PueIndPima', // 2, dato_68
'cedula.PueIndMeno', // 2, dato_69
'cedula.PueIndOtro', // 2, dato_70
'cedula.DerechINSABI', // 2, dato_71
'cedula.DerechIMSS', // 2, dato_72
'cedula.DerechISSSTE', // 2, dato_73
'cedula.DerechPEMEX', // 2, dato_74
'cedula.DerechSEDENA', // 2, dato_75
'cedula.DerechOtro', // 2, dato_76
'cedula.NumPerros', // 2, dato_77
'cedula.NumGatos', // 2, dato_78
'cedula.NumOtros', // 2, dato_79
'cedula.SisSalINSABI', // 2, dato_80
'cedula.SisSalIMSS', // 2, dato_81
'cedula.SisSalISSSTE', // 2, dato_82
'cedula.SisSalPEMEX', // 2, dato_83
'cedula.SisSalSEDENA', // 2, dato_84
'cedula.SisSalOtro', // 2, dato_85
'cedula.SisSalMedPar', // 2, dato_86
'cedula.SisSalCliPar', // 2, dato_87
'cedula.SisSalParter', // 2, dato_88
'cedula.SisSalCurand', // 2, dato_89
'cedula.SisSalYerber', // 2, dato_90
'cedula.SisSalHueser', // 2, dato_91
'cedula.SisSalBotica', // 2, dato_92
'cedula.Comentario', // 2, dato_93
'cedula.FecRegGen', // 2, dato_94
'cedula.NumInteg', // 2, dato_95
'cedula.OrigCapt']; // 2, dato_96
$elementos_nombres_2 = ['dato_01', 'dato_02', 'dato_03', 'dato_04', 'dato_05', 'dato_06', 'dato_07', 'dato_08', 'dato_09', 'dato_10', 'dato_11', 'dato_12', 'dato_13', 'dato_14', 'dato_15', 'dato_16', 'dato_17', 'dato_18', 'dato_19', 'dato_20', 'dato_21', 'dato_22', 'dato_23', 'dato_24', 'dato_25', 'dato_26', 'dato_27', 'dato_28', 'dato_29', 'dato_30', 'dato_31', 'dato_32', 'dato_33', 'dato_34', 'dato_35', 'dato_36', 'dato_37', 'dato_38', 'dato_39', 'dato_40', 'dato_41', 'dato_42', 'dato_43', 'dato_44', 'dato_45', 'dato_46', 'dato_47', 'dato_48', 'dato_49', 'dato_50', 'dato_51', 'dato_52', 'dato_53', 'dato_54', 'dato_55', 'dato_56', 'dato_57', 'dato_58', 'dato_59', 'dato_60', 'dato_61', 'dato_62', 'dato_63', 'dato_64', 'dato_65', 'dato_66', 'dato_67', 'dato_68', 'dato_69', 'dato_70', 'dato_71', 'dato_72', 'dato_73', 'dato_74', 'dato_75', 'dato_76', 'dato_77', 'dato_78', 'dato_79', 'dato_80', 'dato_81', 'dato_82', 'dato_83', 'dato_84', 'dato_85', 'dato_86', 'dato_87', 'dato_88', 'dato_89', 'dato_90', 'dato_91', 'dato_92', 'dato_93', 'dato_94', 'dato_95', 'dato_96'];
$elementos_tipos_2 = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
$elementos = [$elementos_campos_2, $elementos_nombres_2, $elementos_tipos_2];
$consultacedulas = new Consulta($configuraciones, $codigos, $elementos);

// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consultacedulas->construye();

// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consultacedulas->ejecuta();

// CONCATENAMOS LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.$consultacedulas->codigos[1].']';

// RETORNAMOS RESPUESTA DEL OBJETO Consulta	
 echo $respuestaJSON;
/*
// LOGEAMOS
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'consulta_baja_cedula.php RESPUESTA JSON';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $respuestaJSON;
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
*/

 // LOGEAMOS TERMINO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' TERMINAMOS consulta_baja_cedula.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();


