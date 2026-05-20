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
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' INICIAMOS consulta_descarga.php';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();

// REVISAMOS, BAJAMOS Y ESTABLECEMOS VARIABLES A PARTIR DE VARIABLES POST

$filtro = 0;
$municipio = $_POST['dato_0'];
$localidad = $_POST['dato_1'];
$datos = $_POST['dato_2'];
$campo = $_POST['dato_3'];
$posicion_inicio = $_POST['dato_4'];
$porcion = $_POST['dato_5'];
$inicial_lote = $_POST['dato_6'];
$elementos_conteo = ['COUNT(*)'];
$tables_conteo = ['cedula'];
$tables = ['cedula'];
$order_elementos = ['cedula.ID'];
$archivo_excell = '';
$datos_excell = 'cedulas_';
$municipio_excell = 'todos_muni_';
$localidad_excell = 'todas_loca_';
$consulta_excell = '';
$archivo_excell_titulo = '';
$datos_excell_titulo = 'CEDULAS ';
$municipio_excell_titulo = 'TODOS LOS MUNICIPIOS ';
$localidad_excell_titulo = 'TODAS LAS LOCALIDADES ';
$consulta_excell_titulo = '';
$numero_elementos_2 = 96;
$elementos_campos_2 = ['cedula.ID', 'cedula.UsuarioId', 'cedula.MunicipioNum', 'cedula.MunicipioNom', 'cedula.LocalidadNum', 'cedula.LocalidadNom', 'cedula.Unidad', 'cedula.AsistSoc', 'cedula.TipoLoc', 'cedula.SedeVm', 'cedula.SedeVk', 'cedula.SedePm', 'cedula.SedePk', 'cedula.SubsVm', 'cedula.SubsVk', 'cedula.SubsPm', 'cedula.SubsPk', 'cedula.FecRegCed', 'cedula.TechoConc', 'cedula.TechoGalv', 'cedula.TechoMade', 'cedula.TechoCart', 'cedula.TechoOtro', 'cedula.PareTabiq', 'cedula.PareAdobe', 'cedula.PareBlock', 'cedula.PareMader', 'cedula.ParePiedr', 'cedula.PareCarto', 'cedula.PisoCemen', 'cedula.PisoMader', 'cedula.PisoTierr', 'cedula.PisoPiedr', 'cedula.AgUsoPota', 'cedula.AgUsoNori', 'cedula.AgUsoRio', 'cedula.AgUsoLluv', 'cedula.AgConPota', 'cedula.AgConPuri', 'cedula.AgConHerv', 'cedula.AgConClor', 'cedula.AgConFilt', 'cedula.ExcFoSep', 'cedula.ExcLetri', 'cedula.ExcRasSu', 'cedula.CombGas', 'cedula.CombCar', 'cedula.CombLen', 'cedula.CombOtr', 'cedula.BasRedM', 'cedula.BasEnte', 'cedula.BasCieAb', 'cedula.BasInci', 'cedula.AlumRedE', 'cedula.AlumVela', 'cedula.AlumQuin', 'cedula.AlumPlaS', 'cedula.NumHab', 'cedula.Recam', 'cedula.Estan', 'cedula.Comed', 'cedula.Multi', 'cedula.Cocin', 'cedula.FecRegViv', 'cedula.PueIndTara', 'cedula.PueIndTepe', 'cedula.PueIndWuar', 'cedula.PueIndPima', 'cedula.PueIndMeno', 'cedula.PueIndOtro', 'cedula.DerechINSABI', 'cedula.DerechIMSS', 'cedula.DerechISSSTE', 'cedula.DerechPEMEX', 'cedula.DerechSEDENA', 'cedula.DerechOtro', 'cedula.NumPerros', 'cedula.NumGatos', 'cedula.NumOtros', 'cedula.SisSalINSABI', 'cedula.SisSalIMSS', 'cedula.SisSalISSSTE', 'cedula.SisSalPEMEX', 'cedula.SisSalSEDENA', 'cedula.SisSalOtro', 'cedula.SisSalMedPar', 'cedula.SisSalCliPar', 'cedula.SisSalParter', 'cedula.SisSalCurand', 'cedula.SisSalYerber', 'cedula.SisSalHueser', 'cedula.SisSalBotica', 'cedula.Comentario', 'cedula.FecRegGen', 'cedula.NumInteg', 'cedula.OrigCapt'];
$elementos_nombres_2 = ['dato_01', 'dato_02', 'dato_03', 'dato_04', 'dato_05', 'dato_06', 'dato_07', 'dato_08', 'dato_09', 'dato_10', 'dato_11', 'dato_12', 'dato_13', 'dato_14', 'dato_15', 'dato_16', 'dato_17', 'dato_18', 'dato_19', 'dato_20', 'dato_21', 'dato_22', 'dato_23', 'dato_24', 'dato_25', 'dato_26', 'dato_27', 'dato_28', 'dato_29', 'dato_30', 'dato_31', 'dato_32', 'dato_33', 'dato_34', 'dato_35', 'dato_36', 'dato_37', 'dato_38', 'dato_39', 'dato_40', 'dato_41', 'dato_42', 'dato_43', 'dato_44', 'dato_45', 'dato_46', 'dato_47', 'dato_48', 'dato_49', 'dato_50', 'dato_51', 'dato_52', 'dato_53', 'dato_54', 'dato_55', 'dato_56', 'dato_57', 'dato_58', 'dato_59', 'dato_60', 'dato_61', 'dato_62', 'dato_63', 'dato_64', 'dato_65', 'dato_66', 'dato_67', 'dato_68', 'dato_69', 'dato_70', 'dato_71', 'dato_72', 'dato_73', 'dato_74', 'dato_75', 'dato_76', 'dato_77', 'dato_78', 'dato_79', 'dato_80', 'dato_81', 'dato_82', 'dato_83', 'dato_84', 'dato_85', 'dato_86', 'dato_87', 'dato_88', 'dato_89', 'dato_90', 'dato_91', 'dato_92', 'dato_93', 'dato_94', 'dato_95', 'dato_96'];
$elementos_tipos_2 = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
$elementos_titulos_2 = ['ID CEDULA', 'ID USUARIO', 'NÚMERO MUNICIPIO', 'MUNICIPIO', 'NÚMERO LOCALIDAD', 'LOCALIDAD', 'UNIDAD', 'ASISTENCIA SOCIAL', 'TIPO LOCALIDAD', 'SEDEVM', 'SEDEVK', 'SEDEPM', 'SEDEPK', 'SUBSVM', 'SUBSVK', 'SUBSPM', 'SUBSPK', 'FECHA REGISTRO CEDULA', 'TECHO CONCRETO', 'TECHO LAMINA GALVANIZADA', 'TECHO MADERA', 'TECHO CARTON', 'TECHO OTRO', 'PARED TABIQUE', 'PARED ADOBE', 'PARED BLOCK', 'PARED MADERA', 'PARED PIEDRA', 'PARED CARTON', 'PISO CEMENTO', 'PISO MADERA', 'PISO TIERRA', 'PISO PIEDRA', 'AGUA USO POTABLE', 'AGUA USO NORIA', 'AGUA USO RIO', 'AGUA USO LLUVIA', 'AGUA CONSUMO POTABLE', 'AGUA CONSUMO PURIFICADA', 'AGUA CONSUMO HERVIDA', 'AGUA CONSUMO CLORO', 'AGUA CONSUMO FILTRO', 'EXCRETA FOSA SEPTICA', 'EXCRETA LETRINA', 'EXCRETA RAS DE SUELO', 'COMBUSTIBLE GAS', 'COMBUSTIBLE CARBON', 'COMBUSTIBLE LEÑA', 'COMBUSTIBLE OTRO', 'BASURA RED MUNICIPAL', 'BASURA ENTIERRO', 'BASURA CIELO ABIERTO', 'BASURA INCINERADA', 'ALUMBRADO RED ELECTRICA', 'ALUMBRADO VELAS', 'ALUMBRADO QUINQUÉ', 'ALUMBRADO PLACA SOLAR', 'NÚMERO DE HABITANTES', 'RECAMARAS', 'ESTANCIAS', 'COMEDORES', 'MULTIPLES', 'COSINAS', 'FECHA REGISTRO VIVIENDA', 'TARAHUMARA', 'TEPEHUAN', 'WUAROJIO', 'PIMA', 'MENONITA', 'PUBLO INDIGENA OTRO', 'DERECHOHABIENCIA INSABI', 'DERECHOHABIENCIA IMSS', 'DERECHOHABIENCIA ISSSTE', 'DERECHOHABIENCIA PEMEX', 'DERECHOHABIENCIA SEDENA', 'DERECHOHABIENCIA OTRO', 'PERROS', 'GATOS', 'OTRAS MASCOTAS', 'SERVICIOS SALUD INSABI', 'SERVICIOS SALUD IMSS', 'SERVICIOS SALUD ISSSTE', 'SERVICIOS SALUD PEMEX', 'SERVICIOS SALUD SEDENA', 'SERVICIOS SALUD OTRO', 'SISTEMA SALUD MEDICO PARTICULAR', 'SISTEMA SALUD CLINICA PARTICULAR', 'SISTEMA SALUD PARTERA', 'SISTEMA SALUD CURANDERA', 'SISTEMA SALUD YERBERO', 'SISTEMA SALUD HUESERO', 'SISTEMA SALUD BOTICARIO', 'COMENTARIO', 'FECHA REGISTRO GENERAL', 'NÚMERO INTEGRANTES', 'ORIGEN DE CAPTURA'];
$respuestaJSON = '[';

if ($datos == 1) {
    $tables = ['cedula'];
    $order_elementos = ['cedula.ID'];
    $datos_excell = 'cedulas_';
    $elementos_campos_2 = ['cedula.ID', 'cedula.UsuarioId', 'cedula.MunicipioNum', 'cedula.MunicipioNom', 'cedula.LocalidadNum', 'cedula.LocalidadNom', 'cedula.Unidad', 'cedula.AsistSoc', 'cedula.TipoLoc', 'cedula.SedeVm', 'cedula.SedeVk', 'cedula.SedePm', 'cedula.SedePk', 'cedula.SubsVm', 'cedula.SubsVk', 'cedula.SubsPm', 'cedula.SubsPk', 'cedula.FecRegCed', 'cedula.TechoConc', 'cedula.TechoGalv', 'cedula.TechoMade', 'cedula.TechoCart', 'cedula.TechoOtro', 'cedula.PareTabiq', 'cedula.PareAdobe', 'cedula.PareBlock', 'cedula.PareMader', 'cedula.ParePiedr', 'cedula.PareCarto', 'cedula.PisoCemen', 'cedula.PisoMader', 'cedula.PisoTierr', 'cedula.PisoPiedr', 'cedula.AgUsoPota', 'cedula.AgUsoNori', 'cedula.AgUsoRio', 'cedula.AgUsoLluv', 'cedula.AgConPota', 'cedula.AgConPuri', 'cedula.AgConHerv', 'cedula.AgConClor', 'cedula.AgConFilt', 'cedula.ExcFoSep', 'cedula.ExcLetri', 'cedula.ExcRasSu', 'cedula.CombGas', 'cedula.CombCar', 'cedula.CombLen', 'cedula.CombOtr', 'cedula.BasRedM', 'cedula.BasEnte', 'cedula.BasCieAb', 'cedula.BasInci', 'cedula.AlumRedE', 'cedula.AlumVela', 'cedula.AlumQuin', 'cedula.AlumPlaS', 'cedula.NumHab', 'cedula.Recam', 'cedula.Estan', 'cedula.Comed', 'cedula.Multi', 'cedula.Cocin', 'cedula.FecRegViv', 'cedula.PueIndTara', 'cedula.PueIndTepe', 'cedula.PueIndWuar', 'cedula.PueIndPima', 'cedula.PueIndMeno', 'cedula.PueIndOtro', 'cedula.DerechINSABI', 'cedula.DerechIMSS', 'cedula.DerechISSSTE', 'cedula.DerechPEMEX', 'cedula.DerechSEDENA', 'cedula.DerechOtro', 'cedula.NumPerros', 'cedula.NumGatos', 'cedula.NumOtros', 'cedula.SisSalINSABI', 'cedula.SisSalIMSS', 'cedula.SisSalISSSTE', 'cedula.SisSalPEMEX', 'cedula.SisSalSEDENA', 'cedula.SisSalOtro', 'cedula.SisSalMedPar', 'cedula.SisSalCliPar', 'cedula.SisSalParter', 'cedula.SisSalCurand', 'cedula.SisSalYerber', 'cedula.SisSalHueser', 'cedula.SisSalBotica', 'cedula.Comentario', 'cedula.FecRegGen', 'cedula.NumInteg', 'cedula.OrigCapt'];
    $elementos_nombres_2 = ['dato_01', 'dato_02', 'dato_03', 'dato_04', 'dato_05', 'dato_06', 'dato_07', 'dato_08', 'dato_09', 'dato_10', 'dato_11', 'dato_12', 'dato_13', 'dato_14', 'dato_15', 'dato_16', 'dato_17', 'dato_18', 'dato_19', 'dato_20', 'dato_21', 'dato_22', 'dato_23', 'dato_24', 'dato_25', 'dato_26', 'dato_27', 'dato_28', 'dato_29', 'dato_30', 'dato_31', 'dato_32', 'dato_33', 'dato_34', 'dato_35', 'dato_36', 'dato_37', 'dato_38', 'dato_39', 'dato_40', 'dato_41', 'dato_42', 'dato_43', 'dato_44', 'dato_45', 'dato_46', 'dato_47', 'dato_48', 'dato_49', 'dato_50', 'dato_51', 'dato_52', 'dato_53', 'dato_54', 'dato_55', 'dato_56', 'dato_57', 'dato_58', 'dato_59', 'dato_60', 'dato_61', 'dato_62', 'dato_63', 'dato_64', 'dato_65', 'dato_66', 'dato_67', 'dato_68', 'dato_69', 'dato_70', 'dato_71', 'dato_72', 'dato_73', 'dato_74', 'dato_75', 'dato_76', 'dato_77', 'dato_78', 'dato_79', 'dato_80', 'dato_81', 'dato_82', 'dato_83', 'dato_84', 'dato_85', 'dato_86', 'dato_87', 'dato_88', 'dato_89', 'dato_90', 'dato_91', 'dato_92', 'dato_93', 'dato_94', 'dato_95', 'dato_96'];
    $elementos_tipos_2 = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
    $elementos_titulos_2 = ['ID CEDULA', 'ID USUARIO', 'NÚMERO MUNICIPIO', 'MUNICIPIO', 'NÚMERO LOCALIDAD', 'LOCALIDAD', 'UNIDAD', 'ASISTENCIA SOCIAL', 'TIPO LOCALIDAD', 'SEDEVM', 'SEDEVK', 'SEDEPM', 'SEDEPK', 'SUBSVM', 'SUBSVK', 'SUBSPM', 'SUBSPK', 'FECHA REGISTRO CEDULA', 'TECHO CONCRETO', 'TECHO LAMINA GALVANIZADA', 'TECHO MADERA', 'TECHO CARTON', 'TECHO OTRO', 'PARED TABIQUE', 'PARED ADOBE', 'PARED BLOCK', 'PARED MADERA', 'PARED PIEDRA', 'PARED CARTON', 'PISO CEMENTO', 'PISO MADERA', 'PISO TIERRA', 'PISO PIEDRA', 'AGUA USO POTABLE', 'AGUA USO NORIA', 'AGUA USO RIO', 'AGUA USO LLUVIA', 'AGUA CONSUMO POTABLE', 'AGUA CONSUMO PURIFICADA', 'AGUA CONSUMO HERVIDA', 'AGUA CONSUMO CLORO', 'AGUA CONSUMO FILTRO', 'EXCRETA FOSA SEPTICA', 'EXCRETA LETRINA', 'EXCRETA RAS DE SUELO', 'COMBUSTIBLE GAS', 'COMBUSTIBLE CARBON', 'COMBUSTIBLE LEÑA', 'COMBUSTIBLE OTRO', 'BASURA RED MUNICIPAL', 'BASURA ENTIERRO', 'BASURA CIELO ABIERTO', 'BASURA INCINERADA', 'ALUMBRADO RED ELECTRICA', 'ALUMBRADO VELAS', 'ALUMBRADO QUINQUÉ', 'ALUMBRADO PLACA SOLAR', 'NÚMERO DE HABITANTES', 'RECAMARAS', 'ESTANCIAS', 'COMEDORES', 'MULTIPLES', 'COSINAS', 'FECHA REGISTRO VIVIENDA', 'TARAHUMARA', 'TEPEHUAN', 'WUAROJIO', 'PIMA', 'MENONITA', 'PUBLO INDIGENA OTRO', 'DERECHOHABIENCIA INSABI', 'DERECHOHABIENCIA IMSS', 'DERECHOHABIENCIA ISSSTE', 'DERECHOHABIENCIA PEMEX', 'DERECHOHABIENCIA SEDENA', 'DERECHOHABIENCIA OTRO', 'PERROS', 'GATOS', 'OTRAS MASCOTAS', 'SERVICIOS SALUD INSABI', 'SERVICIOS SALUD IMSS', 'SERVICIOS SALUD ISSSTE', 'SERVICIOS SALUD PEMEX', 'SERVICIOS SALUD SEDENA', 'SERVICIOS SALUD OTRO', 'SISTEMA SALUD MEDICO PARTICULAR', 'SISTEMA SALUD CLINICA PARTICULAR', 'SISTEMA SALUD PARTERA', 'SISTEMA SALUD CURANDERA', 'SISTEMA SALUD YERBERO', 'SISTEMA SALUD HUESERO', 'SISTEMA SALUD BOTICARIO', 'COMENTARIO', 'FECHA REGISTRO GENERAL', 'NÚMERO INTEGRANTES', 'ORIGEN DE CAPTURA'];
    $numero_elementos_2 = 96;
    $tables_conteo = ['cedula'];
    if ($campo > 95) {
        $tables = ['familia INNER JOIN cedula ON familia.CedulaId = cedula.ID'];
        $order_elementos = ['cedula.ID', 'familia.ID'];
        $datos_excell = 'personas_cedulas_';
        $elementos_campos_2 = ['cedula.ID', 'cedula.UsuarioId', 'cedula.MunicipioNum', 'cedula.MunicipioNom', 'cedula.LocalidadNum', 'cedula.LocalidadNom', 'cedula.Unidad', 'cedula.AsistSoc', 'cedula.TipoLoc', 'cedula.SedeVm', 'cedula.SedeVk', 'cedula.SedePm', 'cedula.SedePk', 'cedula.SubsVm', 'cedula.SubsVk', 'cedula.SubsPm', 'cedula.SubsPk', 'cedula.FecRegCed', 'cedula.TechoConc', 'cedula.TechoGalv', 'cedula.TechoMade', 'cedula.TechoCart', 'cedula.TechoOtro', 'cedula.PareTabiq', 'cedula.PareAdobe', 'cedula.PareBlock', 'cedula.PareMader', 'cedula.ParePiedr', 'cedula.PareCarto', 'cedula.PisoCemen', 'cedula.PisoMader', 'cedula.PisoTierr', 'cedula.PisoPiedr', 'cedula.AgUsoPota', 'cedula.AgUsoNori', 'cedula.AgUsoRio', 'cedula.AgUsoLluv', 'cedula.AgConPota', 'cedula.AgConPuri', 'cedula.AgConHerv', 'cedula.AgConClor', 'cedula.AgConFilt', 'cedula.ExcFoSep', 'cedula.ExcLetri', 'cedula.ExcRasSu', 'cedula.CombGas', 'cedula.CombCar', 'cedula.CombLen', 'cedula.CombOtr', 'cedula.BasRedM', 'cedula.BasEnte', 'cedula.BasCieAb', 'cedula.BasInci', 'cedula.AlumRedE', 'cedula.AlumVela', 'cedula.AlumQuin', 'cedula.AlumPlaS', 'cedula.NumHab', 'cedula.Recam', 'cedula.Estan', 'cedula.Comed', 'cedula.Multi', 'cedula.Cocin', 'cedula.FecRegViv', 'cedula.PueIndTara', 'cedula.PueIndTepe', 'cedula.PueIndWuar', 'cedula.PueIndPima', 'cedula.PueIndMeno', 'cedula.PueIndOtro', 'cedula.DerechINSABI', 'cedula.DerechIMSS', 'cedula.DerechISSSTE', 'cedula.DerechPEMEX', 'cedula.DerechSEDENA', 'cedula.DerechOtro', 'cedula.NumPerros', 'cedula.NumGatos', 'cedula.NumOtros', 'cedula.SisSalINSABI', 'cedula.SisSalIMSS', 'cedula.SisSalISSSTE', 'cedula.SisSalPEMEX', 'cedula.SisSalSEDENA', 'cedula.SisSalOtro', 'cedula.SisSalMedPar', 'cedula.SisSalCliPar', 'cedula.SisSalParter', 'cedula.SisSalCurand', 'cedula.SisSalYerber', 'cedula.SisSalHueser', 'cedula.SisSalBotica', 'cedula.Comentario', 'cedula.FecRegGen', 'cedula.NumInteg', 'cedula.OrigCapt', 'familia.ID', 'familia.CedulaId', 'familia.NumInt', 'familia.Apelli1', 'familia.Apelli2', 'familia.Nombres', 'familia.FecNac', 'familia.Edad', 'familia.Genero', 'familia.EstOrig', 'familia.LenMat', 'familia.EstCiv', 'familia.Parente', 'familia.Escola', 'familia.Ocupa', 'familia.Ingres', 'familia.Papani', 'familia.Hipert', 'familia.Diabet', 'familia.Tuberc', 'familia.Alcoho', 'familia.Tabaqu', 'familia.Cancer', 'familia.Diu', 'familia.Orales', 'familia.Preser', 'familia.InyMens', 'familia.InyBien', 'familia.Salping', 'familia.Implant', 'familia.Embaraz', 'familia.Bacamro', 'familia.LavDien', 'familia.LimVivi', 'familia.BebAlco', 'familia.Tabaco', 'familia.Medica', 'familia.Drogas', 'familia.FecRegInt'];
        $elementos_nombres_2 = ['dato_01', 'dato_02', 'dato_03', 'dato_04', 'dato_05', 'dato_06', 'dato_07', 'dato_08', 'dato_09', 'dato_10', 'dato_11', 'dato_12', 'dato_13', 'dato_14', 'dato_15', 'dato_16', 'dato_17', 'dato_18', 'dato_19', 'dato_20', 'dato_21', 'dato_22', 'dato_23', 'dato_24', 'dato_25', 'dato_26', 'dato_27', 'dato_28', 'dato_29', 'dato_30', 'dato_31', 'dato_32', 'dato_33', 'dato_34', 'dato_35', 'dato_36', 'dato_37', 'dato_38', 'dato_39', 'dato_40', 'dato_41', 'dato_42', 'dato_43', 'dato_44', 'dato_45', 'dato_46', 'dato_47', 'dato_48', 'dato_49', 'dato_50', 'dato_51', 'dato_52', 'dato_53', 'dato_54', 'dato_55', 'dato_56', 'dato_57', 'dato_58', 'dato_59', 'dato_60', 'dato_61', 'dato_62', 'dato_63', 'dato_64', 'dato_65', 'dato_66', 'dato_67', 'dato_68', 'dato_69', 'dato_70', 'dato_71', 'dato_72', 'dato_73', 'dato_74', 'dato_75', 'dato_76', 'dato_77', 'dato_78', 'dato_79', 'dato_80', 'dato_81', 'dato_82', 'dato_83', 'dato_84', 'dato_85', 'dato_86', 'dato_87', 'dato_88', 'dato_89', 'dato_90', 'dato_91', 'dato_92', 'dato_93', 'dato_94', 'dato_95', 'dato_96', 'dato_97', 'dato_98', 'dato_99', 'dato_100', 'dato_101', 'dato_102', 'dato_103', 'dato_104', 'dato_105', 'dato_106', 'dato_107', 'dato_108', 'dato_109', 'dato_110', 'dato_111', 'dato_112', 'dato_113', 'dato_114', 'dato_115', 'dato_116', 'dato_117', 'dato_118', 'dato_119', 'dato_120', 'dato_121', 'dato_122', 'dato_123', 'dato_124', 'dato_125', 'dato_126', 'dato_127', 'dato_128', 'dato_129', 'dato_130', 'dato_131', 'dato_132', 'dato_133', 'dato_134', 'dato_135'];
        $elementos_tipos_2 = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
        $elementos_titulos_2 = ['ID CEDULA', 'ID USUARIO', 'NÚMERO MUNICIPIO', 'MUNICIPIO', 'NÚMERO LOCALIDAD', 'LOCALIDAD', 'UNIDAD', 'ASISTENCIA SOCIAL', 'TIPO LOCALIDAD', 'SEDEVM', 'SEDEVK', 'SEDEPM', 'SEDEPK', 'SUBSVM', 'SUBSVK', 'SUBSPM', 'SUBSPK', 'FECHA REGISTRO CEDULA', 'TECHO CONCRETO', 'TECHO LAMINA GALVANIZADA', 'TECHO MADERA', 'TECHO CARTON', 'TECHO OTRO', 'PARED TABIQUE', 'PARED ADOBE', 'PARED BLOCK', 'PARED MADERA', 'PARED PIEDRA', 'PARED CARTON', 'PISO CEMENTO', 'PISO MADERA', 'PISO TIERRA', 'PISO PIEDRA', 'AGUA USO POTABLE', 'AGUA USO NORIA', 'AGUA USO RIO', 'AGUA USO LLUVIA', 'AGUA CONSUMO POTABLE', 'AGUA CONSUMO PURIFICADA', 'AGUA CONSUMO HERVIDA', 'AGUA CONSUMO CLORO', 'AGUA CONSUMO FILTRO', 'EXCRETA FOSA SEPTICA', 'EXCRETA LETRINA', 'EXCRETA RAS DE SUELO', 'COMBUSTIBLE GAS', 'COMBUSTIBLE CARBON', 'COMBUSTIBLE LEÑA', 'COMBUSTIBLE OTRO', 'BASURA RED MUNICIPAL', 'BASURA ENTIERRO', 'BASURA CIELO ABIERTO', 'BASURA INCINERADA', 'ALUMBRADO RED ELECTRICA', 'ALUMBRADO VELAS', 'ALUMBRADO QUINQUÉ', 'ALUMBRADO PLACA SOLAR', 'NÚMERO DE HABITANTES', 'RECAMARAS', 'ESTANCIAS', 'COMEDORES', 'MULTIPLES', 'COSINAS', 'FECHA REGISTRO VIVIENDA', 'TARAHUMARA', 'TEPEHUAN', 'WUAROJIO', 'PIMA', 'MENONITA', 'PUBLO INDIGENA OTRO', 'DERECHOHABIENCIA INSABI', 'DERECHOHABIENCIA IMSS', 'DERECHOHABIENCIA ISSSTE', 'DERECHOHABIENCIA PEMEX', 'DERECHOHABIENCIA SEDENA', 'DERECHOHABIENCIA OTRO', 'PERROS', 'GATOS', 'OTRAS MASCOTAS', 'SERVICIOS SALUD INSABI', 'SERVICIOS SALUD IMSS', 'SERVICIOS SALUD ISSSTE', 'SERVICIOS SALUD PEMEX', 'SERVICIOS SALUD SEDENA', 'SERVICIOS SALUD OTRO', 'SISTEMA SALUD MEDICO PARTICULAR', 'SISTEMA SALUD CLINICA PARTICULAR', 'SISTEMA SALUD PARTERA', 'SISTEMA SALUD CURANDERA', 'SISTEMA SALUD YERBERO', 'SISTEMA SALUD HUESERO', 'SISTEMA SALUD BOTICARIO', 'COMENTARIO', 'FECHA REGISTRO GENERAL', 'NÚMERO INTEGRANTES', 'ORIGEN DE CAPTURA', 'ID PERSONA', 'ID CEDULA', 'INTEGRANTE FAMILIA', 'APELLIDO PATERNO', 'APELLIDO MATERNO', 'NOMBRES', 'FECHA NACIMIENTO', 'EDAD', 'GENERO', 'ESTADO ORIGEN', 'LENGUA MATERNA', 'ESTADO CIVIL', 'PARENTESCO', 'ESCOLARIDAD', 'OCUPACIÓN', 'INGRESO', 'PAPANICOLAU', 'HIPERTENSIÓN', 'DIABETES', 'TUBERCULOSIS', 'ALCOHOLISMO', 'TABAQUISMO', 'CANCER', 'PLANIFICACIÓN FAMILIAR DIU', 'PLANIFICACIÓN FAMILIAR ORALES', 'PLANIFICACIÓN FAMILIAR PRESERVATIVO', 'PLANIFICACIÓN FAMILIAR INYECCIÓN MENSUALES', 'PLANIFICACIÓN FAMILIAR INYECCIÓN BIMENSUAL', 'PLANIFICACIÓN FAMILIAR SALPINGO', 'PLANIFICACIÓN FAMILIAR IMPLANTES', 'EMBARAZADA', 'EMBARAZADA CONTROL', 'LAVADO DIENTES', 'LIMPIA VIVIENDA', 'BEBE ALCOHOL', 'FUMA TABACO', 'CONSUME MEDICAMENTOS', 'CONSUME DROGAS', 'FECHA REGISTRO INTEGRANTE'];
        $numero_elementos_2 = 135;
        $tables_conteo = ['familia INNER JOIN cedula ON familia.CedulaId = cedula.ID'];
    }
}
if ($datos == 2) {
    $tables = ['familia INNER JOIN cedula ON familia.CedulaId = cedula.ID'];
    $order_elementos = ['cedula.ID', 'familia.ID'];
    $datos_excell = 'personas_';
    $elementos_campos_2 = ['familia.ID', 'familia.CedulaId', 'familia.NumInt', 'familia.Apelli1', 'familia.Apelli2', 'familia.Nombres', 'familia.FecNac', 'familia.Edad', 'familia.Genero', 'familia.EstOrig', 'familia.LenMat', 'familia.EstCiv', 'familia.Parente', 'familia.Escola', 'familia.Ocupa', 'familia.Ingres', 'familia.Papani', 'familia.Hipert', 'familia.Diabet', 'familia.Tuberc', 'familia.Alcoho', 'familia.Tabaqu', 'familia.Cancer', 'familia.Diu', 'familia.Orales', 'familia.Preser', 'familia.InyMens', 'familia.InyBien', 'familia.Salping', 'familia.Implant', 'familia.Embaraz', 'familia.Bacamro', 'familia.LavDien', 'familia.LimVivi', 'familia.BebAlco', 'familia.Tabaco', 'familia.Medica', 'familia.Drogas', 'familia.FecRegInt'];
    $elementos_nombres_2 = ['dato_01', 'dato_02', 'dato_03', 'dato_04', 'dato_05', 'dato_06', 'dato_07', 'dato_08', 'dato_09', 'dato_10', 'dato_11', 'dato_12', 'dato_13', 'dato_14', 'dato_15', 'dato_16', 'dato_17', 'dato_18', 'dato_19', 'dato_20', 'dato_21', 'dato_22', 'dato_23', 'dato_24', 'dato_25', 'dato_26', 'dato_27', 'dato_28', 'dato_29', 'dato_30', 'dato_31', 'dato_32', 'dato_33', 'dato_34', 'dato_35', 'dato_36', 'dato_37', 'dato_38', 'dato_39'];
    $elementos_tipos_2 = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
    $elementos_titulos_2 = ['ID PERSONA', 'ID CEDULA', 'INTEGRANTE FAMILIA', 'APELLIDO PATERNO', 'APELLIDO MATERNO', 'NOMBRES', 'FECHA NACIMIENTO', 'EDAD', 'GENERO', 'ESTADO ORIGEN', 'LENGUA MATERNA', 'ESTADO CIVIL', 'PARENTESCO', 'ESCOLARIDAD', 'OCUPACIÓN', 'INGRESO', 'PAPANICOLAU', 'HIPERTENSIÓN', 'DIABETES', 'TUBERCULOSIS', 'ALCOHOLISMO', 'TABAQUISMO', 'CANCER', 'PLANIFICACIÓN FAMILIAR DIU', 'PLANIFICACIÓN FAMILIAR ORALES', 'PLANIFICACIÓN FAMILIAR PRESERVATIVO', 'PLANIFICACIÓN FAMILIAR INYECCIÓN MENSUALES', 'PLANIFICACIÓN FAMILIAR INYECCIÓN BIMENSUAL', 'PLANIFICACIÓN FAMILIAR SALPINGO', 'PLANIFICACIÓN FAMILIAR IMPLANTES', 'EMBARAZADA', 'EMBARAZADA CONTROL', 'LAVADO DIENTES', 'LIMPIA VIVIENDA', 'BEBE ALCOHOL', 'FUMA TABACO', 'CONSUME MEDICAMENTOS', 'CONSUME DROGAS', 'FECHA REGISTRO INTEGRANTE'];
    $numero_elementos_2 = 39;
    $tables_conteo = ['familia INNER JOIN cedula ON familia.CedulaId = cedula.ID'];
}
if ($datos == 3) {
    $tables = ['familia INNER JOIN cedula ON familia.CedulaId = cedula.ID'];
    $order_elementos = ['cedula.ID', 'familia.ID'];
    $datos_excell = 'personas_cedulas_';
    $elementos_campos_2 = ['cedula.ID', 'cedula.UsuarioId', 'cedula.MunicipioNum', 'cedula.MunicipioNom', 'cedula.LocalidadNum', 'cedula.LocalidadNom', 'cedula.Unidad', 'cedula.AsistSoc', 'cedula.TipoLoc', 'cedula.SedeVm', 'cedula.SedeVk', 'cedula.SedePm', 'cedula.SedePk', 'cedula.SubsVm', 'cedula.SubsVk', 'cedula.SubsPm', 'cedula.SubsPk', 'cedula.FecRegCed', 'cedula.TechoConc', 'cedula.TechoGalv', 'cedula.TechoMade', 'cedula.TechoCart', 'cedula.TechoOtro', 'cedula.PareTabiq', 'cedula.PareAdobe', 'cedula.PareBlock', 'cedula.PareMader', 'cedula.ParePiedr', 'cedula.PareCarto', 'cedula.PisoCemen', 'cedula.PisoMader', 'cedula.PisoTierr', 'cedula.PisoPiedr', 'cedula.AgUsoPota', 'cedula.AgUsoNori', 'cedula.AgUsoRio', 'cedula.AgUsoLluv', 'cedula.AgConPota', 'cedula.AgConPuri', 'cedula.AgConHerv', 'cedula.AgConClor', 'cedula.AgConFilt', 'cedula.ExcFoSep', 'cedula.ExcLetri', 'cedula.ExcRasSu', 'cedula.CombGas', 'cedula.CombCar', 'cedula.CombLen', 'cedula.CombOtr', 'cedula.BasRedM', 'cedula.BasEnte', 'cedula.BasCieAb', 'cedula.BasInci', 'cedula.AlumRedE', 'cedula.AlumVela', 'cedula.AlumQuin', 'cedula.AlumPlaS', 'cedula.NumHab', 'cedula.Recam', 'cedula.Estan', 'cedula.Comed', 'cedula.Multi', 'cedula.Cocin', 'cedula.FecRegViv', 'cedula.PueIndTara', 'cedula.PueIndTepe', 'cedula.PueIndWuar', 'cedula.PueIndPima', 'cedula.PueIndMeno', 'cedula.PueIndOtro', 'cedula.DerechINSABI', 'cedula.DerechIMSS', 'cedula.DerechISSSTE', 'cedula.DerechPEMEX', 'cedula.DerechSEDENA', 'cedula.DerechOtro', 'cedula.NumPerros', 'cedula.NumGatos', 'cedula.NumOtros', 'cedula.SisSalINSABI', 'cedula.SisSalIMSS', 'cedula.SisSalISSSTE', 'cedula.SisSalPEMEX', 'cedula.SisSalSEDENA', 'cedula.SisSalOtro', 'cedula.SisSalMedPar', 'cedula.SisSalCliPar', 'cedula.SisSalParter', 'cedula.SisSalCurand', 'cedula.SisSalYerber', 'cedula.SisSalHueser', 'cedula.SisSalBotica', 'cedula.Comentario', 'cedula.FecRegGen', 'cedula.NumInteg', 'cedula.OrigCapt', 'familia.ID', 'familia.CedulaId', 'familia.NumInt', 'familia.Apelli1', 'familia.Apelli2', 'familia.Nombres', 'familia.FecNac', 'familia.Edad', 'familia.Genero', 'familia.EstOrig', 'familia.LenMat', 'familia.EstCiv', 'familia.Parente', 'familia.Escola', 'familia.Ocupa', 'familia.Ingres', 'familia.Papani', 'familia.Hipert', 'familia.Diabet', 'familia.Tuberc', 'familia.Alcoho', 'familia.Tabaqu', 'familia.Cancer', 'familia.Diu', 'familia.Orales', 'familia.Preser', 'familia.InyMens', 'familia.InyBien', 'familia.Salping', 'familia.Implant', 'familia.Embaraz', 'familia.Bacamro', 'familia.LavDien', 'familia.LimVivi', 'familia.BebAlco', 'familia.Tabaco', 'familia.Medica', 'familia.Drogas', 'familia.FecRegInt'];
    $elementos_nombres_2 = ['dato_01', 'dato_02', 'dato_03', 'dato_04', 'dato_05', 'dato_06', 'dato_07', 'dato_08', 'dato_09', 'dato_10', 'dato_11', 'dato_12', 'dato_13', 'dato_14', 'dato_15', 'dato_16', 'dato_17', 'dato_18', 'dato_19', 'dato_20', 'dato_21', 'dato_22', 'dato_23', 'dato_24', 'dato_25', 'dato_26', 'dato_27', 'dato_28', 'dato_29', 'dato_30', 'dato_31', 'dato_32', 'dato_33', 'dato_34', 'dato_35', 'dato_36', 'dato_37', 'dato_38', 'dato_39', 'dato_40', 'dato_41', 'dato_42', 'dato_43', 'dato_44', 'dato_45', 'dato_46', 'dato_47', 'dato_48', 'dato_49', 'dato_50', 'dato_51', 'dato_52', 'dato_53', 'dato_54', 'dato_55', 'dato_56', 'dato_57', 'dato_58', 'dato_59', 'dato_60', 'dato_61', 'dato_62', 'dato_63', 'dato_64', 'dato_65', 'dato_66', 'dato_67', 'dato_68', 'dato_69', 'dato_70', 'dato_71', 'dato_72', 'dato_73', 'dato_74', 'dato_75', 'dato_76', 'dato_77', 'dato_78', 'dato_79', 'dato_80', 'dato_81', 'dato_82', 'dato_83', 'dato_84', 'dato_85', 'dato_86', 'dato_87', 'dato_88', 'dato_89', 'dato_90', 'dato_91', 'dato_92', 'dato_93', 'dato_94', 'dato_95', 'dato_96', 'dato_97', 'dato_98', 'dato_99', 'dato_100', 'dato_101', 'dato_102', 'dato_103', 'dato_104', 'dato_105', 'dato_106', 'dato_107', 'dato_108', 'dato_109', 'dato_110', 'dato_111', 'dato_112', 'dato_113', 'dato_114', 'dato_115', 'dato_116', 'dato_117', 'dato_118', 'dato_119', 'dato_120', 'dato_121', 'dato_122', 'dato_123', 'dato_124', 'dato_125', 'dato_126', 'dato_127', 'dato_128', 'dato_129', 'dato_130', 'dato_131', 'dato_132', 'dato_133', 'dato_134', 'dato_135'];
    $elementos_tipos_2 = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
    $elementos_titulos_2 = ['ID CEDULA', 'ID USUARIO', 'NÚMERO MUNICIPIO', 'MUNICIPIO', 'NÚMERO LOCALIDAD', 'LOCALIDAD', 'UNIDAD', 'ASISTENCIA SOCIAL', 'TIPO LOCALIDAD', 'SEDEVM', 'SEDEVK', 'SEDEPM', 'SEDEPK', 'SUBSVM', 'SUBSVK', 'SUBSPM', 'SUBSPK', 'FECHA REGISTRO CEDULA', 'TECHO CONCRETO', 'TECHO LAMINA GALVANIZADA', 'TECHO MADERA', 'TECHO CARTON', 'TECHO OTRO', 'PARED TABIQUE', 'PARED ADOBE', 'PARED BLOCK', 'PARED MADERA', 'PARED PIEDRA', 'PARED CARTON', 'PISO CEMENTO', 'PISO MADERA', 'PISO TIERRA', 'PISO PIEDRA', 'AGUA USO POTABLE', 'AGUA USO NORIA', 'AGUA USO RIO', 'AGUA USO LLUVIA', 'AGUA CONSUMO POTABLE', 'AGUA CONSUMO PURIFICADA', 'AGUA CONSUMO HERVIDA', 'AGUA CONSUMO CLORO', 'AGUA CONSUMO FILTRO', 'EXCRETA FOSA SEPTICA', 'EXCRETA LETRINA', 'EXCRETA RAS DE SUELO', 'COMBUSTIBLE GAS', 'COMBUSTIBLE CARBON', 'COMBUSTIBLE LEÑA', 'COMBUSTIBLE OTRO', 'BASURA RED MUNICIPAL', 'BASURA ENTIERRO', 'BASURA CIELO ABIERTO', 'BASURA INCINERADA', 'ALUMBRADO RED ELECTRICA', 'ALUMBRADO VELAS', 'ALUMBRADO QUINQUÉ', 'ALUMBRADO PLACA SOLAR', 'NÚMERO DE HABITANTES', 'RECAMARAS', 'ESTANCIAS', 'COMEDORES', 'MULTIPLES', 'COSINAS', 'FECHA REGISTRO VIVIENDA', 'TARAHUMARA', 'TEPEHUAN', 'WUAROJIO', 'PIMA', 'MENONITA', 'PUBLO INDIGENA OTRO', 'DERECHOHABIENCIA INSABI', 'DERECHOHABIENCIA IMSS', 'DERECHOHABIENCIA ISSSTE', 'DERECHOHABIENCIA PEMEX', 'DERECHOHABIENCIA SEDENA', 'DERECHOHABIENCIA OTRO', 'PERROS', 'GATOS', 'OTRAS MASCOTAS', 'SERVICIOS SALUD INSABI', 'SERVICIOS SALUD IMSS', 'SERVICIOS SALUD ISSSTE', 'SERVICIOS SALUD PEMEX', 'SERVICIOS SALUD SEDENA', 'SERVICIOS SALUD OTRO', 'SISTEMA SALUD MEDICO PARTICULAR', 'SISTEMA SALUD CLINICA PARTICULAR', 'SISTEMA SALUD PARTERA', 'SISTEMA SALUD CURANDERA', 'SISTEMA SALUD YERBERO', 'SISTEMA SALUD HUESERO', 'SISTEMA SALUD BOTICARIO', 'COMENTARIO', 'FECHA REGISTRO GENERAL', 'NÚMERO INTEGRANTES', 'ORIGEN DE CAPTURA', 'ID PERSONA', 'ID CEDULA', 'INTEGRANTE FAMILIA', 'APELLIDO PATERNO', 'APELLIDO MATERNO', 'NOMBRES', 'FECHA NACIMIENTO', 'EDAD', 'GENERO', 'ESTADO ORIGEN', 'LENGUA MATERNA', 'ESTADO CIVIL', 'PARENTESCO', 'ESCOLARIDAD', 'OCUPACIÓN', 'INGRESO', 'PAPANICOLAU', 'HIPERTENSIÓN', 'DIABETES', 'TUBERCULOSIS', 'ALCOHOLISMO', 'TABAQUISMO', 'CANCER', 'PLANIFICACIÓN FAMILIAR DIU', 'PLANIFICACIÓN FAMILIAR ORALES', 'PLANIFICACIÓN FAMILIAR PRESERVATIVO', 'PLANIFICACIÓN FAMILIAR INYECCIÓN MENSUALES', 'PLANIFICACIÓN FAMILIAR INYECCIÓN BIMENSUAL', 'PLANIFICACIÓN FAMILIAR SALPINGO', 'PLANIFICACIÓN FAMILIAR IMPLANTES', 'EMBARAZADA', 'EMBARAZADA CONTROL', 'LAVADO DIENTES', 'LIMPIA VIVIENDA', 'BEBE ALCOHOL', 'FUMA TABACO', 'CONSUME MEDICAMENTOS', 'CONSUME DROGAS', 'FECHA REGISTRO INTEGRANTE'];
    $numero_elementos_2 = 135;
    $tables_conteo = ['familia INNER JOIN cedula ON familia.CedulaId = cedula.ID'];
}

// // CONFIGURAMOS LOS FILTROS

$lista_parametros = [];

if ($municipio=="TODOS_REGISTROS") {
    $municipio_excell = 'todos_muni_';
}
else {
    $filtro = 1;
    $lista_parametros[] = [0, [[0, "cedula.MunicipioNom", 0, $municipio, 0]], 0];
    $municipio_excell = $municipio;
}
if ($localidad=="TODOS_REGISTROS_L") {
    $localidad_excell = 'todas_loca_';
}
else {
    $filtro = 1;
    $lista_parametros[] = [0, [[0, "cedula.LocalidadNom", 0, $localidad, 0]], 0];
    $localidad_excell = $localidad;
}

// // DISCRIMINAMOS EL CAMPO DE DONDE FUE ENVIADA LA CONSULTA
//DENOTAN CASOS ESPECIALES SOBRE LAS CONFIGURACIONES GENERALES

// CONSULTA 1: RESUMEN: CEDULAS 
if ($campo==1) {
    if ($datos > 1) {
        $tables = ['cedula'];
        $order_elementos = ['cedula.ID'];
        $datos_excell = 'cedulas_';
        $elementos_campos_2 = ['cedula.ID', 'cedula.UsuarioId', 'cedula.MunicipioNum', 'cedula.MunicipioNom', 'cedula.LocalidadNum', 'cedula.LocalidadNom', 'cedula.Unidad', 'cedula.AsistSoc', 'cedula.TipoLoc', 'cedula.SedeVm', 'cedula.SedeVk', 'cedula.SedePm', 'cedula.SedePk', 'cedula.SubsVm', 'cedula.SubsVk', 'cedula.SubsPm', 'cedula.SubsPk', 'cedula.FecRegCed', 'cedula.TechoConc', 'cedula.TechoGalv', 'cedula.TechoMade', 'cedula.TechoCart', 'cedula.TechoOtro', 'cedula.PareTabiq', 'cedula.PareAdobe', 'cedula.PareBlock', 'cedula.PareMader', 'cedula.ParePiedr', 'cedula.PareCarto', 'cedula.PisoCemen', 'cedula.PisoMader', 'cedula.PisoTierr', 'cedula.PisoPiedr', 'cedula.AgUsoPota', 'cedula.AgUsoNori', 'cedula.AgUsoRio', 'cedula.AgUsoLluv', 'cedula.AgConPota', 'cedula.AgConPuri', 'cedula.AgConHerv', 'cedula.AgConClor', 'cedula.AgConFilt', 'cedula.ExcFoSep', 'cedula.ExcLetri', 'cedula.ExcRasSu', 'cedula.CombGas', 'cedula.CombCar', 'cedula.CombLen', 'cedula.CombOtr', 'cedula.BasRedM', 'cedula.BasEnte', 'cedula.BasCieAb', 'cedula.BasInci', 'cedula.AlumRedE', 'cedula.AlumVela', 'cedula.AlumQuin', 'cedula.AlumPlaS', 'cedula.NumHab', 'cedula.Recam', 'cedula.Estan', 'cedula.Comed', 'cedula.Multi', 'cedula.Cocin', 'cedula.FecRegViv', 'cedula.PueIndTara', 'cedula.PueIndTepe', 'cedula.PueIndWuar', 'cedula.PueIndPima', 'cedula.PueIndMeno', 'cedula.PueIndOtro', 'cedula.DerechINSABI', 'cedula.DerechIMSS', 'cedula.DerechISSSTE', 'cedula.DerechPEMEX', 'cedula.DerechSEDENA', 'cedula.DerechOtro', 'cedula.NumPerros', 'cedula.NumGatos', 'cedula.NumOtros', 'cedula.SisSalINSABI', 'cedula.SisSalIMSS', 'cedula.SisSalISSSTE', 'cedula.SisSalPEMEX', 'cedula.SisSalSEDENA', 'cedula.SisSalOtro', 'cedula.SisSalMedPar', 'cedula.SisSalCliPar', 'cedula.SisSalParter', 'cedula.SisSalCurand', 'cedula.SisSalYerber', 'cedula.SisSalHueser', 'cedula.SisSalBotica', 'cedula.Comentario', 'cedula.FecRegGen', 'cedula.NumInteg', 'cedula.OrigCapt'];
        $elementos_nombres_2 = ['dato_01', 'dato_02', 'dato_03', 'dato_04', 'dato_05', 'dato_06', 'dato_07', 'dato_08', 'dato_09', 'dato_10', 'dato_11', 'dato_12', 'dato_13', 'dato_14', 'dato_15', 'dato_16', 'dato_17', 'dato_18', 'dato_19', 'dato_20', 'dato_21', 'dato_22', 'dato_23', 'dato_24', 'dato_25', 'dato_26', 'dato_27', 'dato_28', 'dato_29', 'dato_30', 'dato_31', 'dato_32', 'dato_33', 'dato_34', 'dato_35', 'dato_36', 'dato_37', 'dato_38', 'dato_39', 'dato_40', 'dato_41', 'dato_42', 'dato_43', 'dato_44', 'dato_45', 'dato_46', 'dato_47', 'dato_48', 'dato_49', 'dato_50', 'dato_51', 'dato_52', 'dato_53', 'dato_54', 'dato_55', 'dato_56', 'dato_57', 'dato_58', 'dato_59', 'dato_60', 'dato_61', 'dato_62', 'dato_63', 'dato_64', 'dato_65', 'dato_66', 'dato_67', 'dato_68', 'dato_69', 'dato_70', 'dato_71', 'dato_72', 'dato_73', 'dato_74', 'dato_75', 'dato_76', 'dato_77', 'dato_78', 'dato_79', 'dato_80', 'dato_81', 'dato_82', 'dato_83', 'dato_84', 'dato_85', 'dato_86', 'dato_87', 'dato_88', 'dato_89', 'dato_90', 'dato_91', 'dato_92', 'dato_93', 'dato_94', 'dato_95', 'dato_96'];
        $elementos_tipos_2 = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
        $elementos_titulos_2 = ['ID CEDULA', 'ID USUARIO', 'NÚMERO MUNICIPIO', 'MUNICIPIO', 'NÚMERO LOCALIDAD', 'LOCALIDAD', 'UNIDAD', 'ASISTENCIA SOCIAL', 'TIPO LOCALIDAD', 'SEDEVM', 'SEDEVK', 'SEDEPM', 'SEDEPK', 'SUBSVM', 'SUBSVK', 'SUBSPM', 'SUBSPK', 'FECHA REGISTRO CEDULA', 'TECHO CONCRETO', 'TECHO LAMINA GALVANIZADA', 'TECHO MADERA', 'TECHO CARTON', 'TECHO OTRO', 'PARED TABIQUE', 'PARED ADOBE', 'PARED BLOCK', 'PARED MADERA', 'PARED PIEDRA', 'PARED CARTON', 'PISO CEMENTO', 'PISO MADERA', 'PISO TIERRA', 'PISO PIEDRA', 'AGUA USO POTABLE', 'AGUA USO NORIA', 'AGUA USO RIO', 'AGUA USO LLUVIA', 'AGUA CONSUMO POTABLE', 'AGUA CONSUMO PURIFICADA', 'AGUA CONSUMO HERVIDA', 'AGUA CONSUMO CLORO', 'AGUA CONSUMO FILTRO', 'EXCRETA FOSA SEPTICA', 'EXCRETA LETRINA', 'EXCRETA RAS DE SUELO', 'COMBUSTIBLE GAS', 'COMBUSTIBLE CARBON', 'COMBUSTIBLE LEÑA', 'COMBUSTIBLE OTRO', 'BASURA RED MUNICIPAL', 'BASURA ENTIERRO', 'BASURA CIELO ABIERTO', 'BASURA INCINERADA', 'ALUMBRADO RED ELECTRICA', 'ALUMBRADO VELAS', 'ALUMBRADO QUINQUÉ', 'ALUMBRADO PLACA SOLAR', 'NÚMERO DE HABITANTES', 'RECAMARAS', 'ESTANCIAS', 'COMEDORES', 'MULTIPLES', 'COSINAS', 'FECHA REGISTRO VIVIENDA', 'TARAHUMARA', 'TEPEHUAN', 'WUAROJIO', 'PIMA', 'MENONITA', 'PUBLO INDIGENA OTRO', 'DERECHOHABIENCIA INSABI', 'DERECHOHABIENCIA IMSS', 'DERECHOHABIENCIA ISSSTE', 'DERECHOHABIENCIA PEMEX', 'DERECHOHABIENCIA SEDENA', 'DERECHOHABIENCIA OTRO', 'PERROS', 'GATOS', 'OTRAS MASCOTAS', 'SERVICIOS SALUD INSABI', 'SERVICIOS SALUD IMSS', 'SERVICIOS SALUD ISSSTE', 'SERVICIOS SALUD PEMEX', 'SERVICIOS SALUD SEDENA', 'SERVICIOS SALUD OTRO', 'SISTEMA SALUD MEDICO PARTICULAR', 'SISTEMA SALUD CLINICA PARTICULAR', 'SISTEMA SALUD PARTERA', 'SISTEMA SALUD CURANDERA', 'SISTEMA SALUD YERBERO', 'SISTEMA SALUD HUESERO', 'SISTEMA SALUD BOTICARIO', 'COMENTARIO', 'FECHA REGISTRO GENERAL', 'NÚMERO INTEGRANTES', 'ORIGEN DE CAPTURA'];
        $numero_elementos_2 = 96;
    }
    $datos_excell = 'cedulas_';
    $consulta_excell = '';
}

// CONSULTA 2: RESUMEN: LOCALIDADES 
if ($campo==2) {
    $elementos_conteo = ['COUNT(DISTINCT cedula.LocalidadNom)'];
    $tables = ['cedula GROUP BY cedula.LocalidadNom'];
    $tables_conteo = ['cedula'];
    $order_elementos = ['cedula.MunicipioNom', 'cedula.LocalidadNom'];
    $elementos_campos_2 = ['MAX(cedula.MunicipioNom) AS MunicipioNom', 'cedula.LocalidadNom'];
    $elementos_nombres_2 = ['dato_01', 'dato_02'];
    $elementos_tipos_2 = [1, 1];
    $numero_elementos_2 = 2;
    $datos_excell = 'localidades_';
    $localidad_excell = '';
    $consulta_excell = '';
}

// CONSULTA 3: RESUMEN: VIVIENDAS 
if ($campo==3) {
    $elementos_conteo = ['count(DISTINCT familia.CedulaId)'];
    $tables = ['familia INNER JOIN cedula ON familia.CedulaId = cedula.ID'];
    $tables_conteo = ['familia INNER JOIN cedula ON familia.CedulaId = cedula.ID'];
    $order_elementos = ['familia.CedulaId'];
    $elementos_campos_2 = ['DISTINCT cedula.ID', 'cedula.UsuarioId', 'cedula.MunicipioNum', 'cedula.MunicipioNom', 'cedula.LocalidadNum', 'cedula.LocalidadNom', 'cedula.Unidad', 'cedula.AsistSoc', 'cedula.TipoLoc', 'cedula.SedeVm', 'cedula.SedeVk', 'cedula.SedePm', 'cedula.SedePk', 'cedula.SubsVm', 'cedula.SubsVk', 'cedula.SubsPm', 'cedula.SubsPk', 'cedula.FecRegCed', 'cedula.TechoConc', 'cedula.TechoGalv', 'cedula.TechoMade', 'cedula.TechoCart', 'cedula.TechoOtro', 'cedula.PareTabiq', 'cedula.PareAdobe', 'cedula.PareBlock', 'cedula.PareMader', 'cedula.ParePiedr', 'cedula.PareCarto', 'cedula.PisoCemen', 'cedula.PisoMader', 'cedula.PisoTierr', 'cedula.PisoPiedr', 'cedula.AgUsoPota', 'cedula.AgUsoNori', 'cedula.AgUsoRio', 'cedula.AgUsoLluv', 'cedula.AgConPota', 'cedula.AgConPuri', 'cedula.AgConHerv', 'cedula.AgConClor', 'cedula.AgConFilt', 'cedula.ExcFoSep', 'cedula.ExcLetri', 'cedula.ExcRasSu', 'cedula.CombGas', 'cedula.CombCar', 'cedula.CombLen', 'cedula.CombOtr', 'cedula.BasRedM', 'cedula.BasEnte', 'cedula.BasCieAb', 'cedula.BasInci', 'cedula.AlumRedE', 'cedula.AlumVela', 'cedula.AlumQuin', 'cedula.AlumPlaS', 'cedula.NumHab', 'cedula.Recam', 'cedula.Estan', 'cedula.Comed', 'cedula.Multi', 'cedula.Cocin', 'cedula.FecRegViv', 'cedula.PueIndTara', 'cedula.PueIndTepe', 'cedula.PueIndWuar', 'cedula.PueIndPima', 'cedula.PueIndMeno', 'cedula.PueIndOtro', 'cedula.DerechINSABI', 'cedula.DerechIMSS', 'cedula.DerechISSSTE', 'cedula.DerechPEMEX', 'cedula.DerechSEDENA', 'cedula.DerechOtro', 'cedula.NumPerros', 'cedula.NumGatos', 'cedula.NumOtros', 'cedula.SisSalINSABI', 'cedula.SisSalIMSS', 'cedula.SisSalISSSTE', 'cedula.SisSalPEMEX', 'cedula.SisSalSEDENA', 'cedula.SisSalOtro', 'cedula.SisSalMedPar', 'cedula.SisSalCliPar', 'cedula.SisSalParter', 'cedula.SisSalCurand', 'cedula.SisSalYerber', 'cedula.SisSalHueser', 'cedula.SisSalBotica', 'cedula.Comentario', 'cedula.FecRegGen', 'cedula.NumInteg', 'cedula.OrigCapt'];
    $elementos_nombres_2 = ['dato_01', 'dato_02', 'dato_03', 'dato_04', 'dato_05', 'dato_06', 'dato_07', 'dato_08', 'dato_09', 'dato_10', 'dato_11', 'dato_12', 'dato_13', 'dato_14', 'dato_15', 'dato_16', 'dato_17', 'dato_18', 'dato_19', 'dato_20', 'dato_21', 'dato_22', 'dato_23', 'dato_24', 'dato_25', 'dato_26', 'dato_27', 'dato_28', 'dato_29', 'dato_30', 'dato_31', 'dato_32', 'dato_33', 'dato_34', 'dato_35', 'dato_36', 'dato_37', 'dato_38', 'dato_39', 'dato_40', 'dato_41', 'dato_42', 'dato_43', 'dato_44', 'dato_45', 'dato_46', 'dato_47', 'dato_48', 'dato_49', 'dato_50', 'dato_51', 'dato_52', 'dato_53', 'dato_54', 'dato_55', 'dato_56', 'dato_57', 'dato_58', 'dato_59', 'dato_60', 'dato_61', 'dato_62', 'dato_63', 'dato_64', 'dato_65', 'dato_66', 'dato_67', 'dato_68', 'dato_69', 'dato_70', 'dato_71', 'dato_72', 'dato_73', 'dato_74', 'dato_75', 'dato_76', 'dato_77', 'dato_78', 'dato_79', 'dato_80', 'dato_81', 'dato_82', 'dato_83', 'dato_84', 'dato_85', 'dato_86', 'dato_87', 'dato_88', 'dato_89', 'dato_90', 'dato_91', 'dato_92', 'dato_93', 'dato_94', 'dato_95', 'dato_96'];
    $elementos_tipos_2 = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
    $numero_elementos_2 = 96;
    $datos_excell = 'viviendas_';
    $consulta_excell = '';
}

// CONSULTA 4: RESUMEN: POBLACIÓN 
if ($campo==4) {
    if ($datos==3) {
        $elementos_campos_2 = ['cedula.ID', 'cedula.UsuarioId', 'cedula.MunicipioNum', 'cedula.MunicipioNom', 'cedula.LocalidadNum', 'cedula.LocalidadNom', 'cedula.Unidad', 'cedula.AsistSoc', 'cedula.TipoLoc', 'cedula.SedeVm', 'cedula.SedeVk', 'cedula.SedePm', 'cedula.SedePk', 'cedula.SubsVm', 'cedula.SubsVk', 'cedula.SubsPm', 'cedula.SubsPk', 'cedula.FecRegCed', 'cedula.TechoConc', 'cedula.TechoGalv', 'cedula.TechoMade', 'cedula.TechoCart', 'cedula.TechoOtro', 'cedula.PareTabiq', 'cedula.PareAdobe', 'cedula.PareBlock', 'cedula.PareMader', 'cedula.ParePiedr', 'cedula.PareCarto', 'cedula.PisoCemen', 'cedula.PisoMader', 'cedula.PisoTierr', 'cedula.PisoPiedr', 'cedula.AgUsoPota', 'cedula.AgUsoNori', 'cedula.AgUsoRio', 'cedula.AgUsoLluv', 'cedula.AgConPota', 'cedula.AgConPuri', 'cedula.AgConHerv', 'cedula.AgConClor', 'cedula.AgConFilt', 'cedula.ExcFoSep', 'cedula.ExcLetri', 'cedula.ExcRasSu', 'cedula.CombGas', 'cedula.CombCar', 'cedula.CombLen', 'cedula.CombOtr', 'cedula.BasRedM', 'cedula.BasEnte', 'cedula.BasCieAb', 'cedula.BasInci', 'cedula.AlumRedE', 'cedula.AlumVela', 'cedula.AlumQuin', 'cedula.AlumPlaS', 'cedula.NumHab', 'cedula.Recam', 'cedula.Estan', 'cedula.Comed', 'cedula.Multi', 'cedula.Cocin', 'cedula.FecRegViv', 'cedula.PueIndTara', 'cedula.PueIndTepe', 'cedula.PueIndWuar', 'cedula.PueIndPima', 'cedula.PueIndMeno', 'cedula.PueIndOtro', 'cedula.DerechINSABI', 'cedula.DerechIMSS', 'cedula.DerechISSSTE', 'cedula.DerechPEMEX', 'cedula.DerechSEDENA', 'cedula.DerechOtro', 'cedula.NumPerros', 'cedula.NumGatos', 'cedula.NumOtros', 'cedula.SisSalINSABI', 'cedula.SisSalIMSS', 'cedula.SisSalISSSTE', 'cedula.SisSalPEMEX', 'cedula.SisSalSEDENA', 'cedula.SisSalOtro', 'cedula.SisSalMedPar', 'cedula.SisSalCliPar', 'cedula.SisSalParter', 'cedula.SisSalCurand', 'cedula.SisSalYerber', 'cedula.SisSalHueser', 'cedula.SisSalBotica', 'cedula.Comentario', 'cedula.FecRegGen', 'cedula.NumInteg', 'cedula.OrigCapt', 'familia.ID', 'familia.CedulaId', 'familia.NumInt', 'familia.Apelli1', 'familia.Apelli2', 'familia.Nombres', 'familia.FecNac', 'familia.Edad', 'familia.Genero', 'familia.EstOrig', 'familia.LenMat', 'familia.EstCiv', 'familia.Parente', 'familia.Escola', 'familia.Ocupa', 'familia.Ingres', 'familia.Papani', 'familia.Hipert', 'familia.Diabet', 'familia.Tuberc', 'familia.Alcoho', 'familia.Tabaqu', 'familia.Cancer', 'familia.Diu', 'familia.Orales', 'familia.Preser', 'familia.InyMens', 'familia.InyBien', 'familia.Salping', 'familia.Implant', 'familia.Embaraz', 'familia.Bacamro', 'familia.LavDien', 'familia.LimVivi', 'familia.BebAlco', 'familia.Tabaco', 'familia.Medica', 'familia.Drogas', 'familia.FecRegInt'];
        $elementos_nombres_2 = ['dato_01', 'dato_02', 'dato_03', 'dato_04', 'dato_05', 'dato_06', 'dato_07', 'dato_08', 'dato_09', 'dato_10', 'dato_11', 'dato_12', 'dato_13', 'dato_14', 'dato_15', 'dato_16', 'dato_17', 'dato_18', 'dato_19', 'dato_20', 'dato_21', 'dato_22', 'dato_23', 'dato_24', 'dato_25', 'dato_26', 'dato_27', 'dato_28', 'dato_29', 'dato_30', 'dato_31', 'dato_32', 'dato_33', 'dato_34', 'dato_35', 'dato_36', 'dato_37', 'dato_38', 'dato_39', 'dato_40', 'dato_41', 'dato_42', 'dato_43', 'dato_44', 'dato_45', 'dato_46', 'dato_47', 'dato_48', 'dato_49', 'dato_50', 'dato_51', 'dato_52', 'dato_53', 'dato_54', 'dato_55', 'dato_56', 'dato_57', 'dato_58', 'dato_59', 'dato_60', 'dato_61', 'dato_62', 'dato_63', 'dato_64', 'dato_65', 'dato_66', 'dato_67', 'dato_68', 'dato_69', 'dato_70', 'dato_71', 'dato_72', 'dato_73', 'dato_74', 'dato_75', 'dato_76', 'dato_77', 'dato_78', 'dato_79', 'dato_80', 'dato_81', 'dato_82', 'dato_83', 'dato_84', 'dato_85', 'dato_86', 'dato_87', 'dato_88', 'dato_89', 'dato_90', 'dato_91', 'dato_92', 'dato_93', 'dato_94', 'dato_95', 'dato_96', 'dato_97', 'dato_98', 'dato_99', 'dato_100', 'dato_101', 'dato_102', 'dato_103', 'dato_104', 'dato_105', 'dato_106', 'dato_107', 'dato_108', 'dato_109', 'dato_110', 'dato_111', 'dato_112', 'dato_113', 'dato_114', 'dato_115', 'dato_116', 'dato_117', 'dato_118', 'dato_119', 'dato_120', 'dato_121', 'dato_122', 'dato_123', 'dato_124', 'dato_125', 'dato_126', 'dato_127', 'dato_128', 'dato_129', 'dato_130', 'dato_131', 'dato_132', 'dato_133', 'dato_134', 'dato_135'];
        $elementos_tipos_2 = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
        $numero_elementos_2 = 135;
        $consulta_excell = 'personas_cedulas_';
    }
    else {
        $elementos_campos_2 = ['cedula.ID', 'cedula.UsuarioId', 'cedula.MunicipioNum', 'cedula.MunicipioNom', 'cedula.LocalidadNum', 'cedula.LocalidadNom', 'cedula.Unidad', 'cedula.AsistSoc', 'cedula.TipoLoc', 'cedula.SedeVm', 'cedula.SedeVk', 'cedula.SedePm', 'cedula.SedePk', 'cedula.SubsVm', 'cedula.SubsVk', 'cedula.SubsPm', 'cedula.SubsPk', 'cedula.FecRegCed', 'cedula.TechoConc', 'cedula.TechoGalv', 'cedula.TechoMade', 'cedula.TechoCart', 'cedula.TechoOtro', 'cedula.PareTabiq', 'cedula.PareAdobe', 'cedula.PareBlock', 'cedula.PareMader', 'cedula.ParePiedr', 'cedula.PareCarto', 'cedula.PisoCemen', 'cedula.PisoMader', 'cedula.PisoTierr', 'cedula.PisoPiedr', 'cedula.AgUsoPota', 'cedula.AgUsoNori', 'cedula.AgUsoRio', 'cedula.AgUsoLluv', 'cedula.AgConPota', 'cedula.AgConPuri', 'cedula.AgConHerv', 'cedula.AgConClor', 'cedula.AgConFilt', 'cedula.ExcFoSep', 'cedula.ExcLetri', 'cedula.ExcRasSu', 'cedula.CombGas', 'cedula.CombCar', 'cedula.CombLen', 'cedula.CombOtr', 'cedula.BasRedM', 'cedula.BasEnte', 'cedula.BasCieAb', 'cedula.BasInci', 'cedula.AlumRedE', 'cedula.AlumVela', 'cedula.AlumQuin', 'cedula.AlumPlaS', 'cedula.NumHab', 'cedula.Recam', 'cedula.Estan', 'cedula.Comed', 'cedula.Multi', 'cedula.Cocin', 'cedula.FecRegViv', 'cedula.PueIndTara', 'cedula.PueIndTepe', 'cedula.PueIndWuar', 'cedula.PueIndPima', 'cedula.PueIndMeno', 'cedula.PueIndOtro', 'cedula.DerechINSABI', 'cedula.DerechIMSS', 'cedula.DerechISSSTE', 'cedula.DerechPEMEX', 'cedula.DerechSEDENA', 'cedula.DerechOtro', 'cedula.NumPerros', 'cedula.NumGatos', 'cedula.NumOtros', 'cedula.SisSalINSABI', 'cedula.SisSalIMSS', 'cedula.SisSalISSSTE', 'cedula.SisSalPEMEX', 'cedula.SisSalSEDENA', 'cedula.SisSalOtro', 'cedula.SisSalMedPar', 'cedula.SisSalCliPar', 'cedula.SisSalParter', 'cedula.SisSalCurand', 'cedula.SisSalYerber', 'cedula.SisSalHueser', 'cedula.SisSalBotica', 'cedula.Comentario', 'cedula.FecRegGen', 'cedula.NumInteg', 'cedula.OrigCapt'];
        $elementos_nombres_2 = ['dato_01', 'dato_02', 'dato_03', 'dato_04', 'dato_05', 'dato_06', 'dato_07', 'dato_08', 'dato_09', 'dato_10', 'dato_11', 'dato_12', 'dato_13', 'dato_14', 'dato_15', 'dato_16', 'dato_17', 'dato_18', 'dato_19', 'dato_20', 'dato_21', 'dato_22', 'dato_23', 'dato_24', 'dato_25', 'dato_26', 'dato_27', 'dato_28', 'dato_29', 'dato_30', 'dato_31', 'dato_32', 'dato_33', 'dato_34', 'dato_35', 'dato_36', 'dato_37', 'dato_38', 'dato_39', 'dato_40', 'dato_41', 'dato_42', 'dato_43', 'dato_44', 'dato_45', 'dato_46', 'dato_47', 'dato_48', 'dato_49', 'dato_50', 'dato_51', 'dato_52', 'dato_53', 'dato_54', 'dato_55', 'dato_56', 'dato_57', 'dato_58', 'dato_59', 'dato_60', 'dato_61', 'dato_62', 'dato_63', 'dato_64', 'dato_65', 'dato_66', 'dato_67', 'dato_68', 'dato_69', 'dato_70', 'dato_71', 'dato_72', 'dato_73', 'dato_74', 'dato_75', 'dato_76', 'dato_77', 'dato_78', 'dato_79', 'dato_80', 'dato_81', 'dato_82', 'dato_83', 'dato_84', 'dato_85', 'dato_86', 'dato_87', 'dato_88', 'dato_89', 'dato_90', 'dato_91', 'dato_92', 'dato_93', 'dato_94', 'dato_95', 'dato_96'];
        $elementos_tipos_2 = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
        $numero_elementos_2 = 96;
        $consulta_excell = 'personas_';
    }
    $elementos_conteo = ['count(*)'];
    $tables = ['familia INNER JOIN cedula ON familia.CedulaId = cedula.ID'];
    $tables_conteo = ['familia INNER JOIN cedula ON familia.CedulaId = cedula.ID'];
    $order_elementos = ['cedula.ID', 'familia.ID'];
    $datos_excell = 'población_';
    $consulta_excell = '';
}

// CONSULTA 5: TECHO: CONCRETO 
if ($campo==5) {
    $filtro = 1;
    $lista_parametros[] = [0, [[0, "cedula.TechoConc", 0, 1, 0]], 0];
    $consulta_excell = 'techo_concreto_';
}

// CONSULTA 6: TECHO: LAMINA GALVANIZADA 
if ($campo==6) {
    $filtro = 1;
    $lista_parametros[] = [0, [[0, "cedula.TechoGalv", 0, 1, 0]], 0];
    $consulta_excell = 'techo_lamina_';
}

// CONSULTA 7: TECHO: MADERA
if ($campo==7) {
    $filtro = 1;
    $lista_parametros[] = [0, [[0, "cedula.TechoMade", 0, 1, 0]], 0];
    $consulta_excell = 'techo_madera_';
}

// CONSULTA 8: TECHO: LAMINA CARTON 
if ($campo==8) {
    $filtro = 1;
    $lista_parametros[] = [0, [[0, "cedula.TechoCart", 0, 1, 0]], 0];
    $consulta_excell = 'techo_carton_';
}

// CONSULTA 9: TECHO: OTRO 
if ($campo==9) {
    $filtro = 1;
    $lista_parametros[] = [0, [[0, "cedula.TechoOtro", 0, 1, 0]], 0];
    $consulta_excell = 'techo_otro_';
}

// CONSULTA 10: TECHO: NO HAY DATOS 
if ($campo==10) {
    $filtro = 1;
    $lista_parametros[] = [0, [[0, "cedula.TechoConc", 1, 1, 0], [1, "cedula.TechoConc", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.TechoGalv", 1, 1, 0], [1, "cedula.TechoGalv", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.TechoMade", 1, 1, 0], [1, "cedula.TechoMade", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.TechoCart", 1, 1, 0], [1, "cedula.TechoCart", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.TechoOtro", 1, 1, 0], [1, "cedula.TechoOtro", 2, 0, 0]], 0];  
    $consulta_excell = 'techo_nohaydatos_';
}

// CONSULTA 11: PARED: TABIQUE 
if ($campo==11) {
    $filtro = 1;
    $lista_parametros[] = [0, [[0, "cedula.PareTabiq", 0, 1, 0]], 0];
    $consulta_excell = 'pared_tabique_';
}

// CONSULTA 12: PARED: ADOBE
if ($campo==12) {
    $filtro = 1;
    $lista_parametros[] = [0, [[0, "cedula.PareAdobe", 0, 1, 0]], 0];
    $consulta_excell = 'pared_adobe_';
}

// CONSULTA 13: PARED: BLOCK
if ($campo==13) {
    $filtro = 1;
    $lista_parametros[] = [0, [[0, "cedula.PareBlock", 0, 1, 0]], 0];
    $consulta_excell = 'pared_block_';
}

// CONSULTA 14: PARED: MADERA
if ($campo==14) {
    $filtro = 1;
    $lista_parametros[] = [0, [[0, "cedula.PareMader", 0, 1, 0]], 0];
    $consulta_excell = 'pared_madera_';
}

// CONSULTA 15: PARED: PIEDRA
if ($campo==15) {
    $filtro = 1;
    $lista_parametros[] = [0, [[0, "cedula.ParePiedr", 0, 1, 0]], 0];
    $consulta_excell = 'pared_piedra_';
}

// CONSULTA 16: PARED: CARTON
if ($campo==16) {
    $filtro = 1;
    $lista_parametros[] = [0, [[0, "cedula.PareCarto", 0, 1, 0]], 0];
    $consulta_excell = 'pared_carton_';
}

// CONSULTA 17: PARED: NO HAY DATOS 
if ($campo==17) {
    $filtro = 1;
    $lista_parametros[] = [0, [[0, "cedula.PareTabiq", 1, 1, 0], [1, "cedula.PareTabiq", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.PareAdobe", 1, 1, 0], [1, "cedula.PareAdobe", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.PareBlock", 1, 1, 0], [1, "cedula.PareBlock", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.PareMader", 1, 1, 0], [1, "cedula.PareMader", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.ParePiedr", 1, 1, 0], [1, "cedula.ParePiedr", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.PareCarto", 1, 1, 0], [1, "cedula.PareCarto", 2, 0, 0]], 0];  
    $consulta_excell = 'pared_nohaydatos_';
}

// CONSULTA 18 PISO CEMENTO	

if ($campo==18) {

    $lista_parametros[] = [0, [[0, "cedula.PisoCemen", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'piso_cemento_';

}

// CONSULTA 19 PISO MADERA	

if ($campo==19) {

    $lista_parametros[] = [0, [[0, "cedula.PisoMader", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'piso_madera_';

}

// CONSULTA 20 PISO TIERRA	

if ($campo==20) {

    $lista_parametros[] = [0, [[0, "cedula.PisoTierr", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'piso_tierra_';

}

// CONSULTA 21 PISO PIEDRA	

if ($campo==21) {

    $lista_parametros[] = [0, [[0, "cedula.PisoPiedr", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'piso_piedra_';

}

// CONSULTA 22 PISO NO HAY DATOS	

if ($campo==22) {
    
    $lista_parametros[] = [0, [[0, "cedula.PisoCemen", 1, 1, 0], [1, "cedula.PisoCemen", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.PisoMader", 1, 1, 0], [1, "cedula.PisoMader", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.PisoTierr", 1, 1, 0], [1, "cedula.PisoTierr", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.PisoPiedr", 1, 1, 0], [1, "cedula.PisoPiedr", 2, 0, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'piso_nohaydatos_';
    
}

// CONSULTA 23 AGUA USO POTABLE	

if ($campo==23) {

    $lista_parametros[] = [0, [[0, "cedula.AgUsoPota", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'agua_uso_potable_';

}

// CONSULTA 24 AGUA USO NORIA	

if ($campo==24) {
    
    $lista_parametros[] = [0, [[0, "cedula.AgUsoNori", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'agua_uso_noria_';

}

// CONSULTA 25 AGUA USO RIO	

if ($campo==25) {

    $lista_parametros[] = [0, [[0, "cedula.AgUsoRio", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'agua_uso_rio_';

}

// CONSULTA 26 AGUA USO LLUVIA	

if ($campo==26) {
    
    $lista_parametros[] = [0, [[0, "cedula.AgUsoLluv", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'agua_uso_lluvia_';

}

// CONSULTA 27 AGUA USO NO HAY DATOS	

if ($campo==27) {
    
    $lista_parametros[] = [0, [[0, "cedula.AgUsoPota", 1, 1, 0], [1, "cedula.AgUsoPota", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.AgUsoNori", 1, 1, 0], [1, "cedula.AgUsoNori", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.AgUsoRio", 1, 1, 0], [1, "cedula.AgUsoRio", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.AgUsoLluv", 1, 1, 0], [1, "cedula.AgUsoLluv", 2, 0, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'agua_uso_nohaydatos_';

}

// CONSULTA 28 AGUA CONSUMO POTABLE	

if ($campo==28) {
    
    $lista_parametros[] = [0, [[0, "cedula.AgConPota", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'agua_consumo_potable_';

}

// CONSULTA 29 AGUA CONSUMO PURIFICADA	

if ($campo==29) {
    
    $lista_parametros[] = [0, [[0, "cedula.AgConPuri", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'agua_consumo_purificada_';

}

// CONSULTA 30 AGUA CONSUMO HERVIDA	

if ($campo==30) {
    
    $lista_parametros[] = [0, [[0, "cedula.AgConHerv", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'agua_consumo_hervida_';

}

// CONSULTA 31 AGUA CONSUMO CLORO	

if ($campo==31) {
    
    $lista_parametros[] = [0, [[0, "cedula.AgConClor", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'agua_consumo_cloro_';

}

// CONSULTA 32 AGUA CONSUMO FILTRO	

if ($campo==32) {
    
    $lista_parametros[] = [0, [[0, "cedula.AgConFilt", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'agua_consumo_filtro_';

}

// CONSULTA 33 AGUA CONSUMO NO HAY DATOS	

if ($campo==33) {
    
    $lista_parametros[] = [0, [[0, "cedula.AgConPota", 1, 1, 0], [1, "cedula.AgConPota", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.AgConPuri", 1, 1, 0], [1, "cedula.AgConPuri", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.AgConHerv", 1, 1, 0], [1, "cedula.AgConHerv", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.AgConClor", 1, 1, 0], [1, "cedula.AgConClor", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.AgConFilt", 1, 1, 0], [1, "cedula.AgConFilt", 2, 0, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'agua_consumo_nohaydatos_';

}

// CONSULTA 34 EXCRETA FOSA SEPTICA	

if ($campo==34) {
    
    $lista_parametros[] = [0, [[0, "cedula.ExcFoSep", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'excreta_fosa_septica_';

}

// CONSULTA 35 EXCRETA FOSA LETRINA	

if ($campo==35) {

    $lista_parametros[] = [0, [[0, "cedula.ExcLetri", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'excreta_letrina_';

}

// CONSULTA 36 EXCRETA RAS DE SUELO	

if ($campo==36) {

    $lista_parametros[] = [0, [[0, "cedula.ExcRasSu", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'excreta_suelo_';

}

// CONSULTA 37 EXCRETA NO HAY DATOS	

if ($campo==37) {
    
    $lista_parametros[] = [0, [[0, "cedula.ExcFoSep", 1, 1, 0], [1, "cedula.ExcFoSep", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.ExcLetri", 1, 1, 0], [1, "cedula.ExcLetri", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.ExcRasSu", 1, 1, 0], [1, "cedula.ExcRasSu", 2, 0, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'excreta_nohaydatos_';

}

// CONSULTA 38 COMBUSTIBLE GAS	

if ($campo==38) {
    
    $lista_parametros[] = [0, [[0, "cedula.CombGas", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'combustible_gas_';

}

// CONSULTA 39 COMBUSTIBLE CARBON	

if ($campo==39) {
    
    $lista_parametros[] = [0, [[0, "cedula.CombCar", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'combustible_carbon_';

}

// CONSULTA 40 COMBUSTIBLE LEÑA	

if ($campo==40) {
    
    $lista_parametros[] = [0, [[0, "cedula.CombLen", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'combustible_lena_';

}

// CONSULTA 41 COMBUSTIBLE OTRO	

if ($campo==41) {
    
    $lista_parametros[] = [0, [[0, "cedula.CombOtr", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'combustible_otro_';

}

// CONSULTA 42 COMBUSTIBLE NO HAY DATOS	

if ($campo==42) {
    
    $lista_parametros[] = [0, [[0, "cedula.CombGas", 1, 1, 0], [1, "cedula.CombGas", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.CombCar", 1, 1, 0], [1, "cedula.CombCar", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.CombLen", 1, 1, 0], [1, "cedula.CombLen", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.CombOtr", 1, 1, 0], [1, "cedula.CombOtr", 2, 0, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'combustible_nohaydatos_';
    
}

// CONSULTA 43 BASURA RED MUNICIPAL	

if ($campo==43) {
    
    $lista_parametros[] = [0, [[0, "cedula.BasRedM", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'basura_red_municipal_';

}

// CONSULTA 44 BASURA ENTERRAMIENTO	

if ($campo==44) {
    
    $lista_parametros[] = [0, [[0, "cedula.BasEnte", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'basura_enterramiento_';

}

// CONSULTA 45 BASURA CIELO ABIERTO	

if ($campo==45) {
    
    $lista_parametros[] = [0, [[0, "cedula.BasCieAb", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'basura_cielo_abierto_';

}

// CONSULTA 46 BASURA INCINERACIÓN	

if ($campo==46) {
    
    $lista_parametros[] = [0, [[0, "cedula.BasInci", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'basura_incineracion_';

}

// CONSULTA 47 BASURA NO HAY DATOS	

if ($campo==47) {
    
    $lista_parametros[] = [0, [[0, "cedula.BasRedM", 1, 1, 0], [1, "cedula.BasRedM", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.BasEnte", 1, 1, 0], [1, "cedula.BasEnte", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.BasCieAb", 1, 1, 0], [1, "cedula.BasCieAb", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.BasInci", 1, 1, 0], [1, "cedula.BasInci", 2, 0, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'basura_nohaydatos_';

}

// CONSULTA 48 ALUMBRADO RED ELECTRICA	

if ($campo==48) {
    
    $lista_parametros[] = [0, [[0, "cedula.AlumRedE", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'alumbrado_red_electrica_';

}

// CONSULTA 49 ALUMBRADO VELADORA	

if ($campo==49) {
    
    $lista_parametros[] = [0, [[0, "cedula.AlumVela", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'alumbrado_veladora_';

}

// CONSULTA 50 ALUMBRADO QUINQUÉ	

if ($campo==50) {
    
    $lista_parametros[] = [0, [[0, "cedula.AlumQuin", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'alumbrado_quinque_';

}

// CONSULTA 51 ALUMBRADO PLACA SOLAR	

if ($campo==51) {
    
    $lista_parametros[] = [0, [[0, "cedula.AlumPlaS", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'alumbrado_placa_solar_';

}

// CONSULTA 52 ALUMBRADO NO HAY DATOS	

if ($campo==52) {
    
    $lista_parametros[] = [0, [[0, "cedula.AlumRedE", 1, 1, 0], [1, "cedula.AlumRedE", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.AlumVela", 1, 1, 0], [1, "cedula.AlumVela", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.AlumQuin", 1, 1, 0], [1, "cedula.AlumQuin", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.AlumPlaS", 1, 1, 0], [1, "cedula.AlumPlaS", 2, 0, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'alumbrado_nohaydatos_';

}

// CONSULTA 53 DISTRIBUCIÓN HABITACIONAL RECAMARAS	

if ($campo==53) {
    
    $elementos_conteo = ['COUNT(*)'];  
    $lista_parametros[] = [0, [[0, "cedula.Recam", 4, 0, 0]], 0];  
    $filtro = 1;
    $order_elementos = ['cedula.Recam'];
    $consulta_excell = 'distribucion_habitacional_recamaras_';

}

// CONSULTA 54 DISTRIBUCIÓN HABITACIONAL ESTANCIAS	

if ($campo==54) {

    $elementos_conteo = ['COUNT(*)'];  
    $lista_parametros[] = [0, [[0, "cedula.Estan", 4, 0, 0]], 0];  
    $filtro = 1;
    $order_elementos = ['cedula.Estan'];
    $consulta_excell = 'distribucion_habitacional_estancias_';

}

// CONSULTA 55 DISTRIBUCIÓN HABITACIONAL COMEDORES	

if ($campo==55) {
    
    $elementos_conteo = ['COUNT(*)'];  
    $lista_parametros[] = [0, [[0, "cedula.Comed", 4, 0, 0]], 0];  
    $filtro = 1;
    $order_elementos = ['cedula.Comed'];
    $consulta_excell = 'distribucion_habitacional_comedores_';

}

// CONSULTA 56 DISTRIBUCIÓN HABITACIONAL MULTIPLES	

if ($campo==56) {
    
    $elementos_conteo = ['COUNT(*)'];  
    $lista_parametros[] = [0, [[0, "cedula.Multi", 4, 0, 0]], 0];  
    $filtro = 1;
    $order_elementos = ['cedula.Multi'];
    $consulta_excell = 'distribucion_habitacional_multiples_';

}

// CONSULTA 57 DISTRIBUCIÓN HABITACIONAL COCINAS	

if ($campo==57) {
    
    $elementos_conteo = ['COUNT(*)'];  
    $lista_parametros[] = [0, [[0, "cedula.Cocin", 4, 0, 0]], 0];  
    $filtro = 1;
    $order_elementos = ['cedula.Cocin'];
    $consulta_excell = 'distribucion_habitacional_cocinas_';

}

// CONSULTA 58 HABITACIONES POR VIVIENDA 1 HABITACIÓN	

if ($campo==58) {
    
    $elementos_conteo = ['COUNT(*)'];  
    $lista_parametros[] = [0, [[0, "cedula.NumHab", 0, 1, 0]], 0];  
    $filtro = 1;
    $order_elementos = ['cedula.NumHab'];
    $consulta_excell = 'habitaciones_una_';

}

// CONSULTA 59 HABITACIONES POR VIVIENDA 2 HABITACIONES

if ($campo==59) {
    
    $elementos_conteo = ['COUNT(*)'];  
    $lista_parametros[] = [0, [[0, "cedula.NumHab", 0, 2, 0]], 0];  
    $filtro = 1;
    $order_elementos = ['cedula.NumHab'];
    $consulta_excell = 'habitaciones_dos_';

}

// CONSULTA 60 HABITACIONES POR VIVIENDA 3 HABITACIONES

if ($campo==60) {
    
    $elementos_conteo = ['COUNT(*)'];  
    $lista_parametros[] = [0, [[0, "cedula.NumHab", 0, 3, 0]], 0];  
    $filtro = 1;
    $order_elementos = ['cedula.NumHab'];
    $consulta_excell = 'habitaciones_tres_';

}

// CONSULTA 61 HABITACIONES POR VIVIENDA 4 HABITACIONES

if ($campo==61) {
    
    $elementos_conteo = ['COUNT(*)'];  
    $lista_parametros[] = [0, [[0, "cedula.NumHab", 0, 4, 0]], 0];  
    $filtro = 1;
    $order_elementos = ['cedula.NumHab'];
    $consulta_excell = 'habitaciones_cuatro_';

}

// CONSULTA 62 HABITACIONES POR VIVIENDA MÁS DE 4 HABITACIONES

if ($campo==62) {
    
    $elementos_conteo = ['COUNT(*)'];  
    $lista_parametros[] = [0, [[0, "cedula.NumHab", 4, 4, 0]], 0];  
    $filtro = 1;
    $order_elementos = ['cedula.NumHab'];
    $consulta_excell = 'habitaciones_masdecuatro_';

}

// CONSULTA 63 DISTRIBUCIÓN HABITACIONAL NÚMERO DE HABITACIONES	

if ($campo==63) {
        
    $elementos_conteo = ['COUNT(*)'];  
    $lista_parametros[] = [0, [[0, "cedula.NumHab", 4, 0, 0]], 0];  
    $filtro = 1;
    $order_elementos = ['cedula.NumHab'];
    $consulta_excell = 'habitaciones_';


}

// CONSULTA 64 HABITACIONES POR VIVIENDA NO HAY DATOS

if ($campo==64) {
    
    $elementos_conteo = ['COUNT(*)'];  
    $lista_parametros[] = [0, [[0, "cedula.NumHab", 0, 0, 0], [1, "cedula.NumHab", 0, "", 0], [1, "cedula.NumHab", 2, 0, 0]], 0];  
    $filtro = 1;
    $order_elementos = ['cedula.NumHab'];
    $consulta_excell = 'habitaciones_nohaydatos_';

}

// CONSULTA 65 PUEBLO INDIGENA TARAHUMARA

if ($campo==65) {
    
    $elementos_conteo = ['count(*)'];
    $order_elementos = ['cedula.ID', 'cedula.PueIndTara'];
    $lista_parametros[] = [0, [[0, "cedula.PueIndTara", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'pueblo_indigena_tarahumara_';

}

// CONSULTA 66 PUEBLO INDIGENA TEPEHUAN

if ($campo==66) {
    
    $order_elementos = ['cedula.ID', 'cedula.PueIndTepe'];
    $lista_parametros[] = [0, [[0, "cedula.PueIndTepe", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'pueblo_indigena_tepehuan_';

}

// CONSULTA 67 PUEBLO INDIGENA WUAROJIO

if ($campo==67) {
    
    $order_elementos = ['cedula.ID', 'cedula.PueIndWuar'];
    $lista_parametros[] = [0, [[0, "cedula.PueIndWuar", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'pueblo_indigena_wuarojio_';

}

// CONSULTA 68 PUEBLO INDIGENA PIMA

if ($campo==68) {
        
    $order_elementos = ['cedula.ID', 'cedula.PueIndPima'];
    $lista_parametros[] = [0, [[0, "cedula.PueIndPima", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'pueblo_indigena_pima_';

}

// CONSULTA 69 PUEBLO INDIGENA MENONITA

if ($campo==69) {
    
    $order_elementos = ['cedula.ID', 'cedula.PueIndMeno'];
    $lista_parametros[] = [0, [[0, "cedula.PueIndMeno", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'pueblo_indigena_menonita_';

}

// CONSULTA 70 PUEBLO INDIGENA OTRO

if ($campo==70) {
        
    $order_elementos = ['cedula.ID', 'cedula.PueIndOtro'];
    $lista_parametros[] = [0, [[0, "cedula.PueIndOtro", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'pueblo_indigena_otro_';

}

// CONSULTA 71 PUEBLO INDIGENA NO HAY DATOS

if ($campo==71) {
    
    $order_elementos = ['cedula.ID', 'cedula.PueIndOtro'];
    $lista_parametros[] = [0, [[0, "cedula.PueIndTara", 1, 1, 0], [1, "cedula.PueIndTara", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.PueIndTepe", 1, 1, 0], [1, "cedula.PueIndTepe", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.PueIndWuar", 1, 1, 0], [1, "cedula.PueIndWuar", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.PueIndPima", 1, 1, 0], [1, "cedula.PueIndPima", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.PueIndMeno", 1, 1, 0], [1, "cedula.PueIndMeno", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.PueIndOtro", 1, 1, 0], [1, "cedula.PueIndOtro", 2, 0, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'pueblo_indigena_nohaydatos_';

}

// CONSULTA 72 DERECHOHABIENCIA INSABI

if ($campo==72) {
    
    $order_elementos = ['cedula.ID', 'cedula.DerechINSABI'];
    $lista_parametros[] = [0, [[0, "cedula.DerechINSABI", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'derechohabiencia_insabi_';

}

// CONSULTA 73 DERECHOHABIENCIA IMSS

if ($campo==73) {
    
    $order_elementos = ['cedula.ID', 'cedula.DerechIMSS'];
    $lista_parametros[] = [0, [[0, "cedula.DerechIMSS", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'derechohabiencia_imss_';

}

// CONSULTA 74 DERECHOHABIENCIA ISSSTE

if ($campo==74) {

    $order_elementos = ['cedula.ID', 'cedula.DerechISSSTE'];
    $lista_parametros[] = [0, [[0, "cedula.DerechISSSTE", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'derechohabiencia_issste_';

}

// CONSULTA 75 DERECHOHABIENCIA PEMEX

if ($campo==75) {

    $order_elementos = ['cedula.ID', 'cedula.DerechPEMEX'];
    $lista_parametros[] = [0, [[0, "cedula.DerechPEMEX", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'derechohabiencia_pemex_';

}

// CONSULTA 76 DERECHOHABIENCIA SEDENA

if ($campo==76) {
    
    $order_elementos = ['cedula.ID', 'cedula.DerechSEDENA'];
    $lista_parametros[] = [0, [[0, "cedula.DerechSEDENA", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'derechohabiencia_sedena_';

}

// CONSULTA 77 DERECHOHABIENCIA OTRO

if ($campo==77) {

    $order_elementos = ['cedula.ID', 'cedula.DerechOtro'];
    $lista_parametros[] = [0, [[0, "cedula.DerechOtro", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'derechohabiencia_otro_';

}

// CONSULTA 78 DERECHOHABIENCIA NO HAY DATOS

if ($campo==78) {
    
    $order_elementos = ['cedula.ID'];
    $lista_parametros[] = [0, [[0, "cedula.DerechINSABI", 1, 1, 0], [1, "cedula.DerechINSABI", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.DerechIMSS", 1, 1, 0], [1, "cedula.DerechIMSS", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.DerechISSSTE", 1, 1, 0], [1, "cedula.DerechISSSTE", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.DerechPEMEX", 1, 1, 0], [1, "cedula.DerechPEMEX", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.DerechSEDENA", 1, 1, 0], [1, "cedula.DerechSEDENA", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.DerechOtro", 1, 1, 0], [1, "cedula.DerechOtro", 2, 0, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'derechohabiencia_nohaydatos_';

}

// CONSULTA 79 MASCOTAS PERROS	

if ($campo==79) {

    $lista_parametros[] = [0, [[0, "cedula.NumPerros", 4, 0, 0]], 0];  
    $filtro = 1;
    $order_elementos = ['cedula.NumPerros'];
    $consulta_excell = 'mascotas_perros_';

}

// CONSULTA 80 MASCOTAS GATOS	

if ($campo==80) {
    
    $lista_parametros[] = [0, [[0, "cedula.NumGatos", 4, 0, 0]], 0];  
    $filtro = 1;
    $order_elementos = ['cedula.NumGatos'];
    $consulta_excell = 'mascotas_gatos_';

}

// CONSULTA 81 MASCOTAS OTROS	

if ($campo==81) {
    
    $lista_parametros[] = [0, [[0, "cedula.NumOtros", 4, 0, 0]], 0];  
    $filtro = 1;
    $order_elementos = ['cedula.NumOtros'];
    $consulta_excell = 'mascotas_otros_';

}

// CONSULTA 82 SISTEMA DE SALUD INSABI

if ($campo==82) {
    
    $elementos_conteo = ['count(*)'];
    $order_elementos = ['cedula.ID', 'cedula.SisSalINSABI'];
    $lista_parametros[] = [0, [[0, "cedula.SisSalINSABI", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'sistema_salud_insabi_';

}

// CONSULTA 83 SISTEMA DE SALUD IMSS

if ($campo==83) {

    $order_elementos = ['cedula.ID', 'cedula.SisSalIMSS'];
    $lista_parametros[] = [0, [[0, "cedula.SisSalIMSS", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'sistema_salud_imss_';

}

// CONSULTA 84 SISTEMA DE SALUD ISSSTE

if ($campo==84) {
    
    $order_elementos = ['cedula.ID', 'cedula.SisSalISSSTE'];
    $lista_parametros[] = [0, [[0, "cedula.SisSalISSSTE", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'sistema_salud_issste_';

}

// CONSULTA 85 SISTEMA DE SALUD PEMEX

if ($campo==85) {
    
    $order_elementos = ['cedula.ID', 'cedula.SisSalPEMEX'];
    $lista_parametros[] = [0, [[0, "cedula.SisSalPEMEX", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'sistema_salud_pemex_';

}

// CONSULTA 86 SISTEMA DE SALUD SEDENA

if ($campo==86) {
    
    $order_elementos = ['cedula.ID', 'cedula.SisSalSEDENA'];
    $lista_parametros[] = [0, [[0, "cedula.SisSalSEDENA", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'sistema_salud_sedena_';

}

// CONSULTA 87 SISTEMA DE SALUD OTRO

if ($campo==87) {
    
    $order_elementos = ['cedula.ID', 'cedula.SisSalOtro'];
    $lista_parametros[] = [0, [[0, "cedula.SisSalOtro", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'sistema_salud_otro_';

}

// CONSULTA 88 SISTEMA DE SALUD MEDICO PARTICULAR

if ($campo==88) {
    
    $order_elementos = ['cedula.ID', 'cedula.SisSalMedPar'];
    $lista_parametros[] = [0, [[0, "cedula.SisSalMedPar", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'sistema_salud_medico_particular_';

}

// CONSULTA 89 SISTEMA DE SALUD CLINICA PARTICULAR

if ($campo==89) {
    
    $order_elementos = ['cedula.ID', 'cedula.SisSalCliPar'];
    $lista_parametros[] = [0, [[0, "cedula.SisSalCliPar", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'sistema_salud_clinica_particular_';

}

// CONSULTA 90 SISTEMA DE SALUD PARTERA

if ($campo==90) {
    
    $order_elementos = ['cedula.ID', 'cedula.SisSalParter'];
    $lista_parametros[] = [0, [[0, "cedula.SisSalParter", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'sistema_salud_partera_';

}

// CONSULTA 91 SISTEMA DE SALUD CURANDERO

if ($campo==91) {
    
    $order_elementos = ['cedula.ID', 'cedula.SisSalCurand'];
    $lista_parametros[] = [0, [[0, "cedula.SisSalCurand", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'sistema_salud_curandero_';

}

// CONSULTA 92 SISTEMA DE SALUD YERBERO

if ($campo==92) {
    
    $order_elementos = ['cedula.ID', 'cedula.SisSalYerber'];
    $lista_parametros[] = [0, [[0, "cedula.SisSalYerber", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'sistema_salud_yerbero_';

}

// CONSULTA 93 SISTEMA DE SALUD HUESERO

if ($campo==93) {
    
    $order_elementos = ['cedula.ID', 'cedula.SisSalHueser'];
    $lista_parametros[] = [0, [[0, "cedula.SisSalHueser", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'sistema_salud_huesero_';

}

// CONSULTA 94 SISTEMA DE SALUD BOTICARIO

if ($campo==94) {
    
    $order_elementos = ['cedula.ID', 'cedula.SisSalBotica'];
    $lista_parametros[] = [0, [[0, "cedula.SisSalBotica", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'sistema_salud_boticario_';

}

// CONSULTA 95 SISTEMA DE SALUD NO HAY DATOS

if ($campo==95) {
    
    $order_elementos = ['cedula.ID'];
    $lista_parametros[] = [0, [[0, "cedula.SisSalINSABI", 1, 1, 0], [1, "cedula.SisSalINSABI", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.SisSalIMSS", 1, 1, 0], [1, "cedula.SisSalIMSS", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.SisSalISSSTE", 1, 1, 0], [1, "cedula.SisSalISSSTE", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.SisSalPEMEX", 1, 1, 0], [1, "cedula.SisSalPEMEX", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.SisSalSEDENA", 1, 1, 0], [1, "cedula.SisSalSEDENA", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.SisSalOtro", 1, 1, 0], [1, "cedula.SisSalOtro", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.SisSalMedPar", 1, 1, 0], [1, "cedula.SisSalMedPar", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.SisSalCliPar", 1, 1, 0], [1, "cedula.SisSalCliPar", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.SisSalParter", 1, 1, 0], [1, "cedula.SisSalParter", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.SisSalCurand", 1, 1, 0], [1, "cedula.SisSalCurand", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.SisSalYerber", 1, 1, 0], [1, "cedula.SisSalYerber", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.SisSalHueser", 1, 1, 0], [1, "cedula.SisSalHueser", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "cedula.SisSalBotica", 1, 1, 0], [1, "cedula.SisSalBotica", 2, 0, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'sistema_salud_nohaydatos_';

}

// 96 FAMIIARES MENORES DE 5 AÑOS HOMBRES
if ($campo == 96) {
    $order_elementos = ['familia.Edad', 'familia.CedulaId'];
    $lista_parametros[] = [0, [[0, "familia.Edad", 5, 5, 0]], 0];  
    $lista_parametros[] = [0, [[0, "familia.Genero", 0, "HOMBRE", 0], [1, "familia.Genero", 0, "Hombre", 0], [1, "familia.Genero", 0, "hombre", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'hombres_edad_menores_5_';
}
// 97 FAMIIARES ENTRE 5 Y 9 AÑOS HOMBRES
if ($campo == 97) {
    $order_elementos = ['familia.Edad', 'familia.CedulaId'];
    $lista_parametros[] = [0, [[0, "familia.Edad", 6, [5, 9], 0]], 0];  
    $lista_parametros[] = [0, [[0, "familia.Genero", 0, "HOMBRE", 0], [1, "familia.Genero", 0, "Hombre", 0], [1, "familia.Genero", 0, "hombre", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'hombres_edad_5_9_';
}
// 98 FAMIIARES ENTRE 10 Y 17 AÑOS HOMBRES
if ($campo == 98) {    
    $order_elementos = ['familia.Edad', 'familia.CedulaId'];
    $lista_parametros[] = [0, [[0, "familia.Edad", 6, [10, 17], 0]], 0];  
    $lista_parametros[] = [0, [[0, "familia.Genero", 0, "HOMBRE", 0], [1, "familia.Genero", 0, "Hombre", 0], [1, "familia.Genero", 0, "hombre", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'hombres_edad_10_17_';
}
// 99 FAMIIARES ENTRE 18 Y 59 AÑOS HOMBRES
if ($campo == 99) {    
    $order_elementos = ['familia.Edad', 'familia.CedulaId'];
    $lista_parametros[] = [0, [[0, "familia.Edad", 6, [18, 59], 0]], 0];  
    $lista_parametros[] = [0, [[0, "familia.Genero", 0, "HOMBRE", 0], [1, "familia.Genero", 0, "Hombre", 0], [1, "familia.Genero", 0, "hombre", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'hombres_edad_18_59_';
}
// 100 FAMIIARES 60 Y MÁS AÑOS HOMBRES
if ($campo == 100) {    
    $order_elementos = ['familia.Edad', 'familia.CedulaId'];
    $lista_parametros[] = [0, [[0, "familia.Edad", 4, 59, 0]], 0];  
    $lista_parametros[] = [0, [[0, "familia.Genero", 0, "HOMBRE", 0], [1, "familia.Genero", 0, "Hombre", 0], [1, "familia.Genero", 0, "hombre", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'hombres_edad_60_mas_';
}
// 101 FAMIIARES EDAD NO HAY DATOS HOMBRES
if ($campo == 101) {    
    $order_elementos = ['familia.Edad', 'familia.CedulaId'];
    $lista_parametros[] = [0, [[0, "familia.Edad", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "familia.Genero", 0, "HOMBRE", 0], [1, "familia.Genero", 0, "Hombre", 0], [1, "familia.Genero", 0, "hombre", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'hombres_edad_nohaydatos_';
}
// 102 FAMIIARES MENORES DE 5 AÑOS MUJERES
if ($campo == 102) {    
    $order_elementos = ['familia.Edad', 'familia.CedulaId'];
    $lista_parametros[] = [0, [[0, "familia.Edad", 5, 5, 0]], 0];  
    $lista_parametros[] = [0, [[0, "familia.Genero", 0, "MUJER", 0], [1, "familia.Genero", 0, "Mujer", 0], [1, "familia.Genero", 0, "mujer", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'mujeres_edad_menores_5_';
}
// 103 FAMIIARES ENTRE 5 Y 9 AÑOS MUJERES
if ($campo == 103) {    
    $order_elementos = ['familia.Edad', 'familia.CedulaId'];
    $lista_parametros[] = [0, [[0, "familia.Edad", 6, [5, 9], 0]], 0];  
    $lista_parametros[] = [0, [[0, "familia.Genero", 0, "MUJER", 0], [1, "familia.Genero", 0, "Mujer", 0], [1, "familia.Genero", 0, "mujer", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'mujeres_edad_5_9_';
}
// 104 FAMIIARES ENTRE 10 Y 17 AÑOS MUJERES
if ($campo == 104) {    
    $order_elementos = ['familia.Edad', 'familia.CedulaId'];
    $lista_parametros[] = [0, [[0, "familia.Edad", 6, [10, 17], 0]], 0];  
    $lista_parametros[] = [0, [[0, "familia.Genero", 0, "MUJER", 0], [1, "familia.Genero", 0, "Mujer", 0], [1, "familia.Genero", 0, "mujer", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'mujeres_edad_10_17_';
}
// 105 FAMIIARES ENTRE 18 Y 59 AÑOS MUJERES
if ($campo == 105) {    
    $order_elementos = ['familia.Edad', 'familia.CedulaId'];
    $lista_parametros[] = [0, [[0, "familia.Edad", 6, [18, 59], 0]], 0];  
    $lista_parametros[] = [0, [[0, "familia.Genero", 0, "MUJER", 0], [1, "familia.Genero", 0, "Mujer", 0], [1, "familia.Genero", 0, "mujer", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'mujeres_edad_18_59_';
}
// 106 FAMIIARES 60 Y MÁS AÑOS MUJERES
if ($campo == 106) {    
    $order_elementos = ['familia.Edad', 'familia.CedulaId'];
    $lista_parametros[] = [0, [[0, "familia.Edad", 4, 59, 0]], 0];  
    $lista_parametros[] = [0, [[0, "familia.Genero", 0, "MUJER", 0], [1, "familia.Genero", 0, "Mujer", 0], [1, "familia.Genero", 0, "mujer", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'mujeres_edad_60_mas_';
}
// 107 FAMIIARES EDAD NO HAY DATOS MUJERES
if ($campo == 107) {    
    $order_elementos = ['familia.Edad', 'familia.CedulaId'];
    $lista_parametros[] = [0, [[0, "familia.Edad", 2, 0, 0]], 0];  
    $lista_parametros[] = [0, [[0, "familia.Genero", 0, "MUJER", 0], [1, "familia.Genero", 0, "Mujer", 0], [1, "familia.Genero", 0, "mujer", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'mujeres_edad_nohaydatos_';
}
// 108 FAMIIARES LENGUA MATERNA ESPAÑOL
if ($campo == 108) {    
    $order_elementos = ['familia.LenMat', 'familia.CedulaId'];
    $lista_parametros[] = [0, [[0, "familia.LenMat", 0, "Español", 0], [1, "familia.LenMat", 0, "ESPAÑOL", 0], [1, "familia.LenMat", 0, "español", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'lenguamaterna_espanol_';
}
// 109 FAMIIARES LENGUA MATERNA TARAHUMARA
if ($campo == 109) {    
    $order_elementos = ['familia.LenMat', 'familia.CedulaId'];
    $lista_parametros[] = [0, [[0, "familia.LenMat", 0, "Tarahumara", 0], [1, "familia.LenMat", 0, "TARAHUMARA", 0], [1, "familia.LenMat", 0, "tarahumara", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'lenguamaterna_tarahumara_';
}
// 110 FAMIIARES LENGUA MATERNA TEPEHUAN
if ($campo == 110) {    
    $order_elementos = ['familia.LenMat', 'familia.CedulaId'];
    $lista_parametros[] = [0, [[0, "familia.LenMat", 0, "Tepehuan", 0], [1, "familia.LenMat", 0, "TEPEHUAN", 0], [1, "familia.LenMat", 0, "tepehuan", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'lenguamaterna_tepehuan_';
}
// 111 FAMIIARES LENGUA MATERNA WUAROJIO
if ($campo == 111) {    
    $order_elementos = ['familia.LenMat', 'familia.CedulaId'];
    $lista_parametros[] = [0, [[0, "familia.LenMat", 0, "Wuarojio", 0], [1, "familia.LenMat", 0, "WUAROJIO", 0], [1, "familia.LenMat", 0, "wuarojio", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'lenguamaterna_wuarojio_';
}
// 112 FAMIIARES LENGUA MATERNA PIMA
if ($campo == 112) {    
    $order_elementos = ['familia.LenMat', 'familia.CedulaId'];
    $lista_parametros[] = [0, [[0, "familia.LenMat", 0, "Pima", 0], [1, "familia.LenMat", 0, "PIMA", 0], [1, "familia.LenMat", 0, "pima", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'lenguamaterna_pima_';
}
// 113 FAMIIARES LENGUA MATERNA MENONITA
if ($campo == 113) {    
    $order_elementos = ['familia.LenMat', 'familia.CedulaId'];
    $lista_parametros[] = [0, [[0, "familia.LenMat", 0, "Menonita", 0], [1, "familia.LenMat", 0, "MENONITA", 0], [1, "familia.LenMat", 0, "menonita", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'lenguamaterna_pima_';
}
// 114 FAMIIARES LENGUA MATERNA OTRO
if ($campo == 114) {    
    $order_elementos = ['familia.LenMat', 'familia.CedulaId'];
    $lista_parametros[] = [0, [[0, "familia.LenMat", 0, "Otro", 0], [1, "familia.LenMat", 0, "OTRO", 0], [1, "familia.LenMat", 0, "otro", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'lenguamaterna_otro_';
}
// 115 FAMIIARES LENGUA MATERNA NO HAY DATOS
if ($campo == 115) {    
    $order_elementos = ['familia.LenMat', 'familia.CedulaId'];
    $lista_parametros[] = [0, [[0, "familia.LenMat", 0, "Nd", 0], [1, "familia.LenMat", 0, "ND", 0], [1, "familia.LenMat", 0, "nd", 0], [1, "familia.LenMat", 0, "", 0], [1, "familia.LenMat", 2, 0, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'lenguamaterna_nohaydatos_';
}
// 116 FAMIIARES HOMBRES
if ($campo == 116) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Genero", 0, "HOMBRE", 0], [1, "familia.Genero", 0, "Hombre", 0], [1, "familia.Genero", 0, "hombre", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'genero_hombres_';
}
// 117 FAMIIARES MUJERES
if ($campo == 117) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Genero", 0, "MUJER", 0], [1, "familia.Genero", 0, "Mujer", 0], [1, "familia.Genero", 0, "mujer", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'genero_mujeres_';
}
// 118 FAMIIARES GENERO NO HAY DATOS
if ($campo == 118) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Genero", 0, "ND", 0], [1, "familia.Genero", 0, "Nd", 0], [1, "familia.Genero", 0, "nd", 0], [1, "familia.Genero", 0, "", 0], [1, "familia.Genero", 2, 0, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'genero_nohaydatos_';
}
// 119 FAMIIARES ESTADO CIVIL CASADO
if ($campo == 119) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.EstCiv", 0, "CASADO", 0], [1, "familia.EstCiv", 0, "Casado", 0], [1, "familia.EstCiv", 0, "casado", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'estadocivil_casado_';
}
// 120 FAMIIARES ESTADO CIVIL SOLTERO
if ($campo == 120) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.EstCiv", 0, "SOLTERO", 0], [1, "familia.EstCiv", 0, "Soltero", 0], [1, "familia.EstCiv", 0, "soltero", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'estadocivil_soltero_';
}
// 121 FAMIIARES ESTADO CIVIL UNIÓN LIBRE
if ($campo == 121) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.EstCiv", 0, "UNION LIBRE", 0], [1, "familia.EstCiv", 0, "UNIÓN LIBRE", 0], [1, "familia.EstCiv", 0, "Union Libre", 0], [1, "familia.EstCiv", 0, "Unión Libre", 0], [1, "familia.EstCiv", 0, "Union libre", 0], [1, "familia.EstCiv", 0, "Unión libre", 0], [1, "familia.EstCiv", 0, "union libre", 0], [1, "familia.EstCiv", 0, "unión libre", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'estadocivil_union_libre_';
}
// 122 FAMIIARES ESTADO CIVIL DIVORCIADO
if ($campo == 122) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.EstCiv", 0, "DIVORCIADO", 0], [1, "familia.EstCiv", 0, "Divorciado", 0], [1, "familia.EstCiv", 0, "divorciado", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'estadocivil_divorciado_';
}
// 123 FAMIIARES ESTADO CIVIL SEPARADO
if ($campo == 123) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.EstCiv", 0, "SEPARADO", 0], [1, "familia.EstCiv", 0, "Separado", 0], [1, "familia.EstCiv", 0, "separado", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'estadocivil_separado_';
}
// 124 FAMIIARES ESTADO CIVIL NO HAY DATOS
if ($campo == 124) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.EstCiv", 0, "ND", 0], [1, "familia.EstCiv", 0, "Nd", 0], [1, "familia.EstCiv", 0, "nd", 0], [1, "familia.EstCiv", 0, "", 0], [1, "familia.EstCiv", 2, 0, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'estadocivil_nohaydatos_';
}
// 125 FAMIIARES PARENTESCO PADRE
if ($campo == 125) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Parente", 0, "PADRE", 0], [1, "familia.Parente", 0, "Padre", 0], [1, "familia.Parente", 0, "padre", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'parentesco_padre_';
}
// 126 FAMIIARES PARENTESCO MADRE
if ($campo == 126) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Parente", 0, "MADRE", 0], [1, "familia.Parente", 0, "Madre", 0], [1, "familia.Parente", 0, "madre", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'parentesco_madre_';
}
// 127 FAMIIARES PARENTESCO HIJO
if ($campo == 127) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Parente", 0, "HIJO", 0], [1, "familia.Parente", 0, "Hijo", 0], [1, "familia.Parente", 0, "hijo", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'parentesco_hijo_';
}
// 128 FAMIIARES PARENTESCO PARIENTE
if ($campo == 128) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Parente", 0, "PARIENTE", 0], [1, "familia.Parente", 0, "Pariente", 0], [1, "familia.Parente", 0, "pariente", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'parentesco_pariente_';
}
// 129 FAMIIARES PARENTESCO OTRO
if ($campo == 129) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Parente", 0, "OTRO", 0], [1, "familia.Parente", 0, "Otro", 0], [1, "familia.Parente", 0, "otro", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'parentesco_otro_';
}
// 130 FAMIIARES PARENTESCO NO HAY DATOS
if ($campo == 130) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Parente", 0, "ND", 0], [1, "familia.Parente", 0, "Nd", 0], [1, "familia.Parente", 0, "nd", 0], [1, "familia.Parente", 0, "", 0], [1, "familia.Parente", 2, 0, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'parentesco_nohaydatos_';
}
// 131 FAMIIARES ESCOLARIDAD PREESCOLAR
if ($campo == 131) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Escola", 0, "PREESCOLAR", 0], [1, "familia.Escola", 0, "Preescolar", 0], [1, "familia.Escola", 0, "preescolar", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'escolaridad_preescolar_';
}
// 132 FAMIIARES ESCOLARIDAD PRIMARIA
if ($campo == 132) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Escola", 0, "PRIMARIA", 0], [1, "familia.Escola", 0, "Primaria", 0], [1, "familia.Escola", 0, "primaria", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'escolaridad_primaria_';
}
// 133 FAMIIARES ESCOLARIDAD SECUNDARIA
if ($campo == 133) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Escola", 0, "SECUNDARIA", 0], [1, "familia.Escola", 0, "Secundaria", 0], [1, "familia.Escola", 0, "secundaria", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'escolaridad_secundaria_';
}
// 134 FAMIIARES ESCOLARIDAD PREPARATORIA
if ($campo == 134) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Escola", 0, "PREPARATORIA", 0], [1, "familia.Escola", 0, "Preparatoria", 0], [1, "familia.Escola", 0, "preparatoria", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'escolaridad_preparatoria_';
}
// 135 FAMIIARES ESCOLARIDAD TÉCNICO
if ($campo == 135) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Escola", 0, "TECNICO", 0], [1, "familia.Escola", 0, "TÉCNICO", 0], [1, "familia.Escola", 0, "Tecnico", 0], [1, "familia.Escola", 0, "Técnico", 0], [1, "familia.Escola", 0, "tecnico", 0], [1, "familia.Escola", 0, "técnico", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'escolaridad_tecnico_';
}
// 136 FAMIIARES ESCOLARIDAD PROFESIONAL
if ($campo == 136) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Escola", 0, "PROFESIONAL", 0], [1, "familia.Escola", 0, "Profesional", 0], [1, "familia.Escola", 0, "profesional", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'escolaridad_profesional_';
}
// 137 FAMIIARES ESCOLARIDAD POSGRADO
if ($campo == 137) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Escola", 0, "POSGRADO", 0], [1, "familia.Escola", 0, "Posgrado", 0], [1, "familia.Escola", 0, "posgrado", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'escolaridad_posgrado_';
}
// 138 FAMIIARES ESCOLARIDAD NO ASISTE A LA ESCUELA
if ($campo == 138) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Escola", 0, "NO ASISTE A LA ESCUELA", 0], [1, "familia.Escola", 0, "No Asiste a la Escuela", 0], [1, "familia.Escola", 0, "No asiste a la escuela", 0], [1, "familia.Escola", 0, "no asiste a la escuela", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'escolaridad_no_asiste_escuela_';
}
// 139 FAMIIARES ESCOLARIDAD SABE LEER Y ESCRIBIR
if ($campo == 139) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Escola", 0, "SABE LEER Y ESCRIBIR", 0], [1, "familia.Escola", 0, "Sabe Leer y Escribir", 0], [1, "familia.Escola", 0, "Sabe leer y escribir", 0], [1, "familia.Escola", 0, "sabe leer y escribir", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'escolaridad_sabe_leer_escribir_';
}
// 140 FAMIIARES ESCOLARIDAD ANALFABETA
if ($campo == 140) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Escola", 0, "ANALFABETA", 0], [1, "familia.Escola", 0, "Analfabeta", 0], [1, "familia.Escola", 0, "analfabeta", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'escolaridad_analfabeta_';
}
// 141 FAMIIARES ESCOLARIDAD NO HAY DATOS
if ($campo == 141) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Escola", 0, "ND", 0], [1, "familia.Escola", 0, "Nd", 0], [1, "familia.Escola", 0, "nd", 0], [1, "familia.Escola", 0, "", 0], [1, "familia.Escola", 2, 0, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'escolaridad_nohaydatos_';
}
// 142 OCUPACIÓN HOGAR
if ($campo == 142) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Ocupa", 0, "HOGAR", 0], [1, "familia.Ocupa", 0, "Hogar", 0], [1, "familia.Ocupa", 0, "hogar", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'ocupacion_hogar_';
}
// 143 OCUPACIÓN ESTUDIANTE
if ($campo == 143) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Ocupa", 0, "ESTUDIANTE", 0], [1, "familia.Ocupa", 0, "Estudiante", 0], [1, "familia.Ocupa", 0, "estudiante", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'ocupacion_estudiante_';
}
// 144 OCUPACIÓN EMPLEADO
if ($campo == 144) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Ocupa", 0, "EMPLEADO", 0], [1, "familia.Ocupa", 0, "Empleado", 0], [1, "familia.Ocupa", 0, "empleado", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'ocupacion_empleado_';
}
// 145 OCUPACIÓN DESEMPLEADO
if ($campo == 145) {    
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Ocupa", 0, "DESEMPLEADO", 0], [1, "familia.Ocupa", 0, "Desempleado", 0], [1, "familia.Ocupa", 0, "desempleado", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'ocupacion_desempleado_';
}
// 146 OCUPACIÓN POR CUENTA PROPIA
if ($campo == 146) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Ocupa", 0, "POR CUENTA PROPIA", 0], [1, "familia.Ocupa", 0, "Por Cuenta Propia", 0], [1, "familia.Ocupa", 0, "Por cuenta propia", 0], [1, "familia.Ocupa", 0, "por cuenta propia", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'ocupacion_cuenta_propia_';
}
// 147 OCUPACIÓN NO HAY DATOS
if ($campo == 147) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Ocupa", 0, "ND", 0], [1, "familia.Ocupa", 0, "Nd", 0], [1, "familia.Ocupa", 0, "nd", 0], [1, "familia.Ocupa", 0, "", 0], [1, "familia.Ocupa", 2, 0, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'ocupacion_nohaydatos_';
}
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////
// 148 INGRESOS MENOR AL SALARIO MINIMO
if ($campo == 148) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Ingres", 0, "MENOR AL SALARIO MINIMO", 0], [1, "familia.Ingres", 0, "MENOR AL SALARIO MÍNIMO", 0], [1, "familia.Ingres", 0, "Menor al Salario Minimo", 0], [1, "familia.Ingres", 0, "Menor al Salario Mínimo", 0], [1, "familia.Ingres", 0, "Menor al salario minimo", 0], [1, "familia.Ingres", 0, "Menor al salario mínimo", 0], [1, "familia.Ingres", 0, "Menor al salario mínimo", 0], [1, "familia.Ingres", 0, "menor al salario minimo", 0], [1, "familia.Ingres", 0, "menor al salario mínimo", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'ingresos_menor_salario_minimo_';
}
// 149 INGRESOS IGUAL AL SALARIO MINIMO
if ($campo == 149) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Ingres", 0, "IGUAL AL SALARIO MINIMO", 0], [1, "familia.Ingres", 0, "IGUAL AL SALARIO MÍNIMO", 0], [1, "familia.Ingres", 0, "Igual al Salario Minimo", 0], [1, "familia.Ingres", 0, "Igual al Salario Mínimo", 0], [1, "familia.Ingres", 0, "Igual al salario minimo", 0], [1, "familia.Ingres", 0, "Igual al salario mínimo", 0], [1, "familia.Ingres", 0, "Igual al salario mínimo", 0], [1, "familia.Ingres", 0, "igual al salario minimo", 0], [1, "familia.Ingres", 0, "igual al salario mínimo", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'ingresos_igual_salario_minimo_';
}
// 150 INGRESOS MAYOR AL SALARIO MINIMO
if ($campo == 150) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Ingres", 0, "MAYOR AL SALARIO MINIMO", 0], [1, "familia.Ingres", 0, "MAYOR AL SALARIO MÍNIMO", 0], [1, "familia.Ingres", 0, "Mayor al Salario Minimo", 0], [1, "familia.Ingres", 0, "Mayor al Salario Mínimo", 0], [1, "familia.Ingres", 0, "Mayor al salario minimo", 0], [1, "familia.Ingres", 0, "Mayor al salario mínimo", 0], [1, "familia.Ingres", 0, "Mayor al salario mínimo", 0], [1, "familia.Ingres", 0, "mayor al salario minimo", 0], [1, "familia.Ingres", 0, "mayor al salario mínimo", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'ingresos_mayor_salario_minimo_';
}
// 151 INGRESOS NO HAY DATOS
if ($campo == 151) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Ingres", 0, "ND", 0], [1, "familia.Ingres", 0, "Nd", 0], [1, "familia.Ingres", 0, "nd", 0], [1, "familia.Ingres", 0, "", 0], [1, "familia.Ingres", 2, 0, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'ingresos_nohaydatos_';
}
// 152 DETECCIONES PAPANICOLAOU
if ($campo == 152) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Papani", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'detecciones_papanicolaou_';
}
// 153 DETECCIONES HIPERTENSIÓN
if ($campo == 153) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Hipert", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'detecciones_hipertension_';
}
// 154 DETECCIONES DIABETES
if ($campo == 154) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Diabet", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'detecciones_diabetes_';
}
// 155 DETECCIONES TUBERCULOSIS
if ($campo == 155) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Tuberc", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'detecciones_tuberculosis_';
}
// 156 DETECCIONES ALCOHOL
if ($campo == 156) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Alcoho", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'detecciones_alcohol_';
}
// 157 DETECCIONES TABAQUISMO
if ($campo == 157) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Tabaqu", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'detecciones_tabaquismo_';
}
// 158 DETECCIONES CANCER
if ($campo == 158) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Cancer", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'detecciones_cancer_';
}
// 159 PLANIFICACIÓN FAMILIAR DIU
if ($campo == 159) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Diu", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'planificcion_familiar_diu';
}
// 160 PLANIFICACIÓN FAMILIAR ORALES
if ($campo == 160) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Orales", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'planificcion_familiar_orales';
}
// 161 PLANIFICACIÓN FAMILIAR PRESERVATIVOS
if ($campo == 161) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Preser", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'planificcion_familiar_preservativos_';
}
// 162 PLANIFICACIÓN FAMILIAR INYECCIONES MENSUALES
if ($campo == 162) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.InyMens", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'planificcion_inyecciones_mensuales_diu_';
}
// 163 PLANIFICACIÓN FAMILIAR INYECCIONES BIMENSUALES
if ($campo == 163) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.InyBien", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'planificcion_familiar_inyecciones_bimensuales_';
}
// 164 PLANIFICACIÓN FAMILIAR SALPINGO
if ($campo == 164) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Salping", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'planificcion_familiar_salpingo_';
}
// 165 PLANIFICACIÓN FAMILIAR IMPLANTES
if ($campo == 165) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Implant", 0, 1, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'planificcion_familiar_implantes_';
}
// 166 EMBARAZADA SI
if ($campo == 166) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Embaraz", 0, "SI", 0], [1, "familia.Embaraz", 0, "SÍ", 0], [1, "familia.Embaraz", 0, "Si", 0], [1, "familia.Embaraz", 0, "Sí", 0], [1, "familia.Embaraz", 0, "si", 0], [1, "familia.Embaraz", 0, "sí", 0], [0, "familia.Embaraz", 0, "EN CONTROL", 0], [1, "familia.Embaraz", 0, "En Control", 0], [1, "familia.Embaraz", 0, "En control", 0], [1, "familia.Embaraz", 0, "en control", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'embarazadas_';
}
// 167 EMBARAZADA EN CONTROL
if ($campo == 167) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Embaraz", 0, "EN CONTROL", 0], [1, "familia.Embaraz", 0, "En Control", 0], [1, "familia.Embaraz", 0, "En control", 0], [1, "familia.Embaraz", 0, "en control", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'embarazadas_en_control_';
}
// 168 BAÑO Y CAMBIO DE ROPA DIARIO
if ($campo == 168) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Bacamro", 0, "DIARIO", 0], [1, "familia.Bacamro", 0, "Diario", 0], [1, "familia.Bacamro", 0, "diario", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'bano_cambio_ropa_diario_';
}
// 169 BAÑO Y CAMBIO DE ROPA TRES VECES POR SEMANA
if ($campo == 169) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Bacamro", 0, "TRES VECES POR SEMANA", 0], [1, "familia.Bacamro", 0, "Tres Veces Por Semana", 0], [1, "familia.Bacamro", 0, "Tres veces por semana", 0], [1, "familia.Bacamro", 0, "tres veces por semana", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'bano_cambio_ropa_tres_veces_semana_';
}
// 170 BAÑO Y CAMBIO DE ROPA DOS VECES POR SEMANA
if ($campo == 170) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Bacamro", 0, "DOS VECES POR SEMANA", 0], [1, "familia.Bacamro", 0, "Dos Veces Por Semana", 0], [1, "familia.Bacamro", 0, "Dos veces por semana", 0], [1, "familia.Bacamro", 0, "dos veces por semana", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'bano_cambio_ropa_dos_veces_semana_';
}
// 171 BAÑO Y CAMBIO DE ROPA NUNCA
if ($campo == 171) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Bacamro", 0, "NUNCA", 0], [1, "familia.Bacamro", 0, "Nunca", 0], [1, "familia.Bacamro", 0, "nunca", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'bano_cambio_ropa_nunca_';
}
// 172 BAÑO Y CAMBIO DE ROPA NO HAY DATOS
if ($campo == 172) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Bacamro", 0, "ND", 0], [1, "familia.Bacamro", 0, "Nd", 0], [1, "familia.Bacamro", 0, "nd", 0], [1, "familia.Bacamro", 0, "", 0], [1, "familia.Bacamro", 2, 0, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'bano_cambio_ropa_nohaydatos_';
}
// 173 LAVADO DE DIENTES DIARIO
if ($campo == 173) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.LavDien", 0, "DIARIO", 0], [1, "familia.LavDien", 0, "Diario", 0], [1, "familia.LavDien", 0, "diario", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'lavado_dientes_diario_';
}
// 174 LAVADO DE DIENTES TRES VECES POR SEMANA
if ($campo == 174) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.LavDien", 0, "TRES VECES POR SEMANA", 0], [1, "familia.LavDien", 0, "Tres Veces Por Semana", 0], [1, "familia.LavDien", 0, "Tres veces por semana", 0], [1, "familia.LavDien", 0, "tres veces por semana", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'hombres_edad_menores_5_';
    $consulta_excell = 'lavado_dientes_tres_veces_semana_';
}
// 175 LAVADO DE DIENTES DOS VECES POR SEMANA
if ($campo == 175) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.LavDien", 0, "DOS VECES POR SEMANA", 0], [1, "familia.LavDien", 0, "Dos Veces Por Semana", 0], [1, "familia.LavDien", 0, "Dos veces por semana", 0], [1, "familia.LavDien", 0, "dos veces por semana", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'hombres_edad_menores_5_';
    $consulta_excell = 'lavado_dientes_dos_veces_semana_';
}
// 176 LAVADO DE DIENTES NUNCA
if ($campo == 176) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.LavDien", 0, "NUNCA", 0], [1, "familia.LavDien", 0, "Nunca", 0], [1, "familia.LavDien", 0, "nunca", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'lavado_dientes_nunca_';
}
// 177 LAVADO DE DIENTES NO HAY DATOS
if ($campo == 177) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.LavDien", 0, "ND", 0], [1, "familia.LavDien", 0, "Nd", 0], [1, "familia.LavDien", 0, "nd", 0], [1, "familia.LavDien", 0, "", 0], [1, "familia.LavDien", 2, 0, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'hombres_edad_menores_5_';
    $consulta_excell = 'lavado_dientes_nohaydatos_';
}
// 178 LIMPIEZA DE VIVIENDA DIARIO
if ($campo == 178) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.LimVivi", 0, "DIARIO", 0], [1, "familia.LimVivi", 0, "Diario", 0], [1, "familia.LimVivi", 0, "diario", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'limpieza_vivienda_diario_';
}
// 179 LIMPIEZA DE VIVIENDA TRES VECES POR SEMANA
if ($campo == 179) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.LimVivi", 0, "TRES VECES POR SEMANA", 0], [1, "familia.LimVivi", 0, "Tres Veces Por Semana", 0], [1, "familia.LimVivi", 0, "Tres veces por semana", 0], [1, "familia.LimVivi", 0, "tres veces por semana", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'limpieza_vivienda_tres_veces_semana_';
}
// 180 LIMPIEZA DE VIVIENDA DOS VECES POR SEMANA
if ($campo == 180) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.LimVivi", 0, "DOS VECES POR SEMANA", 0], [1, "familia.LimVivi", 0, "Dos Veces Por Semana", 0], [1, "familia.LimVivi", 0, "Dos veces por semana", 0], [1, "familia.LimVivi", 0, "dos veces por semana", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'limpieza_vivienda_dos_veces_semana_';
}
// 181 LIMPIEZA DE VIVIENDA NUNCA
if ($campo == 181) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.LimVivi", 0, "NUNCA", 0], [1, "familia.LimVivi", 0, "Nunca", 0], [1, "familia.LimVivi", 0, "nunca", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'limpieza_vivienda_nunca_';
}
// 182 LIMPIEZA DE VIVIENDA NO HAY DATOS
if ($campo == 182) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.LimVivi", 0, "ND", 0], [1, "familia.LimVivi", 0, "Nd", 0], [1, "familia.LimVivi", 0, "nd", 0], [1, "familia.LimVivi", 0, "", 0], [1, "familia.LimVivi", 2, 0, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'limpieza_vivienda_nohaydatos_';
}
// 183 BEBIDAS ALCOHOLICAS DIARIO
if ($campo == 183) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.BebAlco", 0, "DIARIO", 0], [1, "familia.BebAlco", 0, "Diario", 0], [1, "familia.BebAlco", 0, "diario", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'bebidas_alcoholicas_diario_';
}
// 184 BEBIDAS ALCOHOLICAS TRES VECES POR SEMANA
if ($campo == 184) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.BebAlco", 0, "TRES VECES POR SEMANA", 0], [1, "familia.BebAlco", 0, "Tres Veces Por Semana", 0], [1, "familia.BebAlco", 0, "Tres veces por semana", 0], [1, "familia.BebAlco", 0, "tres veces por semana", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'bebidas_alcoholicas_tres_veces_semana_';
}
// 185 BEBIDAS ALCOHOLICAS DOS VECES POR SEMANA
if ($campo == 185) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.BebAlco", 0, "DOS VECES POR SEMANA", 0], [1, "familia.BebAlco", 0, "Dos Veces Por Semana", 0], [1, "familia.BebAlco", 0, "Dos veces por semana", 0], [1, "familia.BebAlco", 0, "dos veces por semana", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'bebidas_alcoholicas_dos_veces_semana_';
}
// 186 BEBIDAS ALCOHOLICAS NUNCA
if ($campo == 186) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.BebAlco", 0, "NUNCA", 0], [1, "familia.BebAlco", 0, "Nunca", 0], [1, "familia.BebAlco", 0, "nunca", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'bebidas_alcoholicas_nunca_';
}
// 187 BEBIDAS ALCOHOLICAS NO HAY DATOS
if ($campo == 187) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.BebAlco", 0, "ND", 0], [1, "familia.BebAlco", 0, "Nd", 0], [1, "familia.BebAlco", 0, "nd", 0], [1, "familia.BebAlco", 0, "", 0], [1, "familia.BebAlco", 2, 0, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'bebidas_alcoholicas_nohaydatos_';
}
// 188 TABACO DIARIO
if ($campo == 188) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Tabaco", 0, "DIARIO", 0], [1, "familia.Tabaco", 0, "Diario", 0], [1, "familia.Tabaco", 0, "diario", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'tabaco_diario_';
}
// 189 TABACO TRES VECES POR SEMANA
if ($campo == 189) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Tabaco", 0, "TRES VECES POR SEMANA", 0], [1, "familia.Tabaco", 0, "Tres Veces Por Semana", 0], [1, "familia.Tabaco", 0, "Tres veces por semana", 0], [1, "familia.Tabaco", 0, "tres veces por semana", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'tabaco_tres_veces_semana_';
}
// 190 TABACO DOS VECES POR SEMANA
if ($campo == 190) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Tabaco", 0, "DOS VECES POR SEMANA", 0], [1, "familia.Tabaco", 0, "Dos Veces Por Semana", 0], [1, "familia.Tabaco", 0, "Dos veces por semana", 0], [1, "familia.Tabaco", 0, "dos veces por semana", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'tabaco_dos_veces_semana_';
}
// 191 TABACO NUNCA
if ($campo == 191) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Tabaco", 0, "NUNCA", 0], [1, "familia.Tabaco", 0, "Nunca", 0], [1, "familia.Tabaco", 0, "nunca", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'tabaco_nunca_';
}
// 192 TABACO NO HAY DATOS
if ($campo == 192) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Tabaco", 0, "ND", 0], [1, "familia.Tabaco", 0, "Nd", 0], [1, "familia.Tabaco", 0, "nd", 0], [1, "familia.Tabaco", 0, "", 0], [1, "familia.Tabaco", 2, 0, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'tabaco_nohaydatos_';
}
// 193 MEDICAMENTOS DIARIO
if ($campo == 193) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Medica", 0, "DIARIO", 0], [1, "familia.Medica", 0, "Diario", 0], [1, "familia.Medica", 0, "diario", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'medicamentos_diarios_';
}
// 194 MEDICAMENTOS TRES VECES POR SEMANA
if ($campo == 194) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Medica", 0, "TRES VECES POR SEMANA", 0], [1, "familia.Medica", 0, "Tres Veces Por Semana", 0], [1, "familia.Medica", 0, "Tres veces por semana", 0], [1, "familia.Medica", 0, "tres veces por semana", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'medicamentos_tres_veces_semana_';
}
// 195 MEDICAMENTOS DOS VECES POR SEMANA
if ($campo == 195) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Medica", 0, "DOS VECES POR SEMANA", 0], [1, "familia.Medica", 0, "Dos Veces Por Semana", 0], [1, "familia.Medica", 0, "Dos veces por semana", 0], [1, "familia.Medica", 0, "dos veces por semana", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'medicamentos_dos_veces_semana_';
}
// 196 MEDICAMENTOS NUNCA
if ($campo == 196) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Medica", 0, "NUNCA", 0], [1, "familia.Medica", 0, "Nunca", 0], [1, "familia.Medica", 0, "nunca", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'medicamentos_nunca_';
}
// 197 MEDICAMENTOS NO HAY DATOS
if ($campo == 197) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Medica", 0, "ND", 0], [1, "familia.Medica", 0, "Nd", 0], [1, "familia.Medica", 0, "nd", 0], [1, "familia.Medica", 0, "", 0], [1, "familia.Medica", 2, 0, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'medicamentos_nohaydatos_';
}
// 198 DROGAS DIARIO
if ($campo == 198) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Drogas", 0, "DIARIO", 0], [1, "familia.Drogas", 0, "Diario", 0], [1, "familia.Drogas", 0, "diario", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'drogas_diario_';
}
// 199 DROGAS TRES VECES POR SEMANA
if ($campo == 199) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Drogas", 0, "TRES VECES POR SEMANA", 0], [1, "familia.Drogas", 0, "Tres Veces Por Semana", 0], [1, "familia.Drogas", 0, "Tres veces por semana", 0], [1, "familia.Drogas", 0, "tres veces por semana", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'drogas_tres_veces_semana_';
}
// 200 DROGAS DOS VECES POR SEMANA
if ($campo == 200) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Drogas", 0, "DOS VECES POR SEMANA", 0], [1, "familia.Drogas", 0, "Dos Veces Por Semana", 0], [1, "familia.Drogas", 0, "Dos veces por semana", 0], [1, "familia.Drogas", 0, "dos veces por semana", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'drogas_dos_veces_semana_';
}
// 201 DROGAS NUNCA
if ($campo == 201) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Drogas", 0, "NUNCA", 0], [1, "familia.Drogas", 0, "Nunca", 0], [1, "familia.Drogas", 0, "nunca", 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'drogas_nunca_';
}
// 202 DROGAS NO HAY DATOS
if ($campo == 202) {
    $order_elementos = ['familia.ID'];
    $lista_parametros[] = [0, [[0, "familia.Drogas", 0, "ND", 0], [1, "familia.Drogas", 0, "Nd", 0], [1, "familia.Drogas", 0, "nd", 0], [1, "familia.Drogas", 0, "", 0], [1, "familia.Drogas", 2, 0, 0]], 0];  
    $filtro = 1;
    $consulta_excell = 'drogas_nohaydatos_';
} 

///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
// HACEMOS INSTANCIA DEL OBJETO Consulta PARA CONOCER LA CANTIDAD DE REGISTROS	
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
$numero_elementos = 1;
//$tables = ['cedula'];
$where = [$filtro, $lista_parametros]; 
$order_order = 0;
//$order_elementos = ['MunicipioNum'];
$order = [1, $order_order, $order_elementos];
$sistema = $_SESSION['Sistema'];
$status = 0;
$tipo = 1;
$limites = [0, 0, 0, 0, 0, 0];
$registros = 0;
$excel = [0, '', 0, '', '', '', '', ''];
$nombre = 'INST:: consulta_total_registros';
$recupera = 0;
$configuraciones = [$numero_elementos, $tables_conteo, $where, $order, $sistema, $_SESSION['bd'], $status, $tipo, $limites, $registros, $excel, $nombre, $recupera];
$codigos = ['', '', [], '', '', ''];
$elementos_campos = $elementos_conteo;
$elementos_nombres = ['dato_01'];
$elementos_tipos = [1];
//$elementos_titulos 
$elementos = [$elementos_campos, $elementos_nombres, $elementos_tipos];
$consulta_total_registros = new Consulta($configuraciones, $codigos, $elementos);

// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
$consulta_total_registros->construye();

// EJECUTAMOS METODO ejecuta() DEL OBJETO Consulta	
$consulta_total_registros->ejecuta();

///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
// HACEMOS INSTANCIA DEL OBJETO Consulta PARA CONSULTA CEDULAS 1	
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
$numero_elementos = $numero_elementos_2;
//$tables = ["cedula"];
$where = [$filtro, $lista_parametros]; 
$order_order = 0;
//$order_elementos = ['ID'];
$order = [1, $order_order, $order_elementos];
$sistema = $_SESSION['Sistema'];
$status = 0;
$tipo = 1;
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// CONFIGURACIÓN DE LOS LIMÍTES DE SEIS POSCIONES
// PRIMERA POSICIÓN INDICA SI LLEVA LIMITES O NO LLEVA LIMITES 0 = NO, 1 = SI
// SEGUNDA POSICIÓN INDICA POSICIÓN DE INICIO DE CONSULTA 
// TERCERA POSICIÓN INDICA CANTIDAD DE REGISTROS A CONSULTAR POR CADA CONSULTA 
// CUARTA POSICIÓN INDICA CANTIDAD DE REGISTROS EN TOTAL A CONSULTAR EN ESTE LOTE DE CONSULTAS
// QUINTA POSICIÓN INDICA CONSULTA PARCIAL O FINAL DE UN LOTE DE CONSULTAS 0 = FINAL, 1 = FINAL 
// SEXTA POSICIÓN INDICA CONSULTA INICIAL DE UN LOTE DE CONSULTAS 0 = INICIAL, 1 = NO INICIAL 
$limites = [1, $posicion_inicio, 200, $consulta_total_registros->obtener_dato_lote(0, 0, $posicion_inicio, $porcion), $consulta_total_registros->obtener_status(0, 0, $posicion_inicio, $porcion), $inicial_lote];
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
$excel = [1, '../descargas/', 1, $datos_excell.$municipio_excell.'_'.$localidad_excell.'_'.$consulta_excell, strval($_SESSION['User']->elementos[0][0]), 'txt', 'krampuz_', ''];
$nombre = 'INST:: consultacedulas';
$configuraciones = [$numero_elementos, $tables, $where, $order, $sistema, $_SESSION['bd'], $status, $tipo, $limites, $registros, $excel, $nombre];
$codigos = ['', '', [], '', '', ''];
$elementos = [$elementos_campos_2, $elementos_nombres_2, $elementos_tipos_2];
$consultacedulas = new Consulta($configuraciones, $codigos, $elementos);
// EJECUTAMOS METODO construye() DEL OBJETO Consulta	
//$consultacedulas->construye();

// EJECUTAMOS METODO ejecuta_rangos() DEL OBJETO Consulta NO NECESITA CONSTRUYE	
$consultacedulas->ejecuta_rangos();
/*
// LOGEAMOS TERMINO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'ESTA ES LA CONSULTA DE DESCARGA: ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = $consultacedulas->codigos[0];
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
*/
// CONCATENAMOS LA RESPUESTA JSON	
$respuestaJSON = $respuestaJSON.$consultacedulas->codigos[1].']';

// RETORNAMOS RESPUESTA DEL OBJETO Consulta	
 echo $respuestaJSON;

// LOGEAMOS TERMINO
$_SESSION['logPhp']->configuraciones[1] = ' ';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').' TERMINAMOS consulta_descarga.';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->configuraciones[1] = date('Y-m-d H:i:s').'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$_SESSION['logPhp']->escribe_log();
$_SESSION['logPhp']->escribe_log();


