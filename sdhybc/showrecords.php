<?php
    include "controller/session/verify.php";
    if ($_SESSION['Privilegios'] > 2 && $_SESSION['Privilegios'] != 4) {
        header('location:https://www.sdhybc.org/home.php');
    }
?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SDHyBC</title>
    <link rel="stylesheet" href="css/showrecords.css">

    <script src = "https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js" integrity="sha512-csNcFYJniKjJxRWRV1R7fvnXrycHP6qDR21mgz1ZP55xY5d+aHLfo9/FcGDQLfn2IfngbAHd8LdfsagcCqgTcQ==" crossorigin = "anonymous" referrerpolicy = "no-referrer"> </script>
</head>
<body>
    <div class='header'>
        <div class='subhead'>
            <p class='title'>MUNICIPIO: <?php echo $_GET['mun']; ?></p>
            <p class='title'><?php echo isset($_GET['name']) == true ? $_GET['num'] . " cédulas - " . $_GET['name'] : ""; ?></p>
        </div>
        <div class='subhead'>
            <input type="button" class='buttons-downloads' value="CÉDULAS" id='button-cedulas'>
            <input type="button" class='buttons-downloads' value="FAMILIAS" id='button-integrantes'>
            <input type="button" class='buttons-downloads' value="CÉDULA-INTEGRANTE" id='button-ced-int'>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <td rowspan=3>ID</td>
                <td rowspan=3>Capturó</td>
                <td colspan=2>Municipio</td>
                <td colspan=2>Localidad</td>
                <td rowspan=3>Unidad</td>
                <td rowspan=3>Asistente Social</td>
                <td rowspan=3>Tipo de Localidad</td>
                <td colspan=4>Región a la Sede Operativa</td>
                <td colspan=4>Sede a la Subsede</td>
                <td rowspan=3>Fecha de Registro de la Cédula</td>
                <td rowspan=2 colspan=5>Techo</td>
                <td rowspan=2 colspan=6>Pared</td>
                <td rowspan=2 colspan=4>Piso</td>
                <td rowspan=2 colspan=5>Agua de Uso</td>
                <td rowspan=2 colspan=4>Agua de Consumo</td>
                <td rowspan=2 colspan=3>Excreta</td>
                <td rowspan=2 colspan=4>Combustible</td>
                <td rowspan=2 colspan=4>Basura</td>
                <td rowspan=2 colspan=4>Alumbrado</td>
                <td rowspan=2 colspan=6>Vivienda</td>
                <td rowspan=3>Fecha de Registro de la Vivienda</td>
                <td rowspan=2 colspan=6>Pueblo Indigena</td>
                <td rowspan=2 colspan=6>Derechohabiencia</td>
                <td rowspan=2 colspan=3>Mascotas</td>
                <td rowspan=2 colspan=13>Sistema de Salud</td>
                <td rowspan=3>Comentario</td>
                <td rowspan=3>Fecha de Registro General</td>
                <td rowspan=3>Origen de Datos</td>
            </tr>
            <tr>
                <td rowspan=2>Número</td>
                <td rowspan=2>Nombre</td>
                <td rowspan=2>Número</td>
                <td rowspan=2>Nombre</td>
                <td colspan=2>Vehiculo</td>
                <td colspan=2>A Pie/Semoviente</td>
                <td colspan=2>Vehiculo</td>
                <td colspan=2>A Pie/Semoviente</td>
            </tr>
            <tr>
                <td>Tiempo</td>
                <td>Distancia</td>
                <td>Tiempo</td>
                <td>Distancia</td>
                <td>Tiempo</td>
                <td>Distancia</td>
                <td>Tiempo</td>
                <td>Distancia</td>
                <td>Concreto</td>
                <td>Lámina Galvanizada</td>
                <td>Madeera</td>
                <td>Carton</td>
                <td>Otro</td>
                <td>Tabique</td>
                <td>Adobe</td>
                <td>Block</td>
                <td>Madera</td>
                <td>Piedra</td>
                <td>Cartón</td>
                <td>Cemento</td>
                <td>Madera</td>
                <td>Tierra</td>
                <td>Piedra</td>
                <td>Potable</td>
                <td>Noria</td>
                <td>Rio</td>
                <td>Lluvia</td>
                <td>Potable</td>
                <td>Purificada</td>
                <td>Hervida</td>
                <td>Clorada</td>
                <td>Filtrada</td>
                <td>Fosa Séptica</td>
                <td>Letrina</td>
                <td>Al Ras del Suelo</td>
                <td>Gas</td>
                <td>Carbón</td>
                <td>Leña</td>
                <td>Otro</td>
                <td>Red Municipal</td>
                <td>Enterramiento</td>
                <td>Cielo Abierto</td>
                <td>Incineración</td>
                <td>Red Eléctrica</td>
                <td>Vela</td>
                <td>Quinque</td>
                <td>Placa Solar</td>
                <td>Número de Habitaciones</td>
                <td>Recamara</td>
                <td>Estancia</td>
                <td>Comededor</td>
                <td>Multiple</td>
                <td>Cocinina Ind.</td>
                <td>Tarahumara</td>
                <td>Tepehuan</td>
                <td>Wuarojio</td>
                <td>Pima</td>
                <td>Menonita</td>
                <td>Otro</td>
                <td>INSABI</td>
                <td>IMSS</td>
                <td>ISSSTE</td>
                <td>PEMEX</td>
                <td>SEDENA</td>
                <td>Otro</td>
                <td># de Perros</td>
                <td># de Gatos</td>
                <td># de Otros</td>
                <td>INSABI</td>
                <td>IMSS</td>
                <td>ISSSTE</td>
                <td>PEMEX</td>
                <td>SEDENA</td>
                <td>Otro</td>
                <td>Médico Particular</td>
                <td>Clínica Particular</td>
                <td>Partera</td>
                <td>Curandero</td>
                <td>Yerbero</td>
                <td>Huesero</td>
                <td>Boticario</td>
            </tr>
        </thead>
        <tbody id='table-cedulas'>
            <?php
                include "model/connection.php";

                if($_GET['mun'] == 'ALL'){
                    if(!isset($_GET['att'])){
                        $query = "SELECT * FROM `cedula`;";
                    }else{
                        $att = str_replace("%20", " ", $_GET['att']);
                        $query = "SELECT * FROM `cedula` WHERE $att;";
                    }
                }else{
                    if(!isset($_GET['att'])){
                        $query = "SELECT * FROM `cedula` WHERE MunicipioNom = '{$_GET['mun']}';";
                    }else{
                        $att = str_replace("%20", " ", $_GET['att']);
                        $query = "SELECT * FROM `cedula` WHERE MunicipioNom = '{$_GET['mun']}' AND $att;";
                    }
                }
                
                $result = mysqli_query($conn, $query);
                foreach($result as $row){
                    echo "<tr>";
                    echo "<td>{$row['ID']}</td>";
                    echo "<td>{$row['UsuarioId']}</td>";
                    echo "<td>{$row['MunicipioNum']}</td>";
                    echo "<td>{$row['MunicipioNom']}</td>";
                    echo "<td>{$row['LocalidadNum']}</td>";
                    echo "<td>{$row['LocalidadNom']}</td>";
                    echo "<td>{$row['Unidad']}</td>";
                    echo "<td>{$row['AsistSoc']}</td>";
                    echo "<td>{$row['TipoLoc']}</td>";
                    echo "<td>{$row['SedeVm']}</td>";
                    echo "<td>{$row['SedeVk']}</td>";
                    echo "<td>{$row['SedePm']}</td>";
                    echo "<td>{$row['SedePk']}</td>";
                    echo "<td>{$row['SubsVm']}</td>";
                    echo "<td>{$row['SubsVk']}</td>";
                    echo "<td>{$row['SubsPm']}</td>";
                    echo "<td>{$row['SubsPk']}</td>";
                    echo "<td>{$row['FecRegCed']}</td>";
                    echo "<td>{$row['TechoConc']}</td>";
                    echo "<td>{$row['TechoGalv']}</td>";
                    echo "<td>{$row['TechoMade']}</td>";
                    echo "<td>{$row['TechoCart']}</td>";
                    echo "<td>{$row['TechoOtro']}</td>";
                    echo "<td>{$row['PareTabiq']}</td>";
                    echo "<td>{$row['PareAdobe']}</td>";
                    echo "<td>{$row['PareBlock']}</td>";
                    echo "<td>{$row['PareMader']}</td>";
                    echo "<td>{$row['ParePiedr']}</td>";
                    echo "<td>{$row['PareCarto']}</td>";
                    echo "<td>{$row['PisoCemen']}</td>";
                    echo "<td>{$row['PisoMader']}</td>";
                    echo "<td>{$row['PisoTierr']}</td>";
                    echo "<td>{$row['PisoPiedr']}</td>";
                    echo "<td>{$row['AgUsoPota']}</td>";
                    echo "<td>{$row['AgUsoNori']}</td>";
                    echo "<td>{$row['AgUsoRio']}</td>";
                    echo "<td>{$row['AgUsoLluv']}</td>";
                    echo "<td>{$row['AgConPota']}</td>";
                    echo "<td>{$row['AgConPuri']}</td>";
                    echo "<td>{$row['AgConHerv']}</td>";
                    echo "<td>{$row['AgConClor']}</td>";
                    echo "<td>{$row['AgConFilt']}</td>";
                    echo "<td>{$row['ExcFoSep']}</td>";
                    echo "<td>{$row['ExcLetri']}</td>";
                    echo "<td>{$row['ExcRasSu']}</td>";
                    echo "<td>{$row['CombGas']}</td>";
                    echo "<td>{$row['CombCar']}</td>";
                    echo "<td>{$row['CombLen']}</td>";
                    echo "<td>{$row['CombOtr']}</td>";
                    echo "<td>{$row['BasRedM']}</td>";
                    echo "<td>{$row['BasEnte']}</td>";
                    echo "<td>{$row['BasCieAb']}</td>";
                    echo "<td>{$row['BasInci']}</td>";
                    echo "<td>{$row['AlumRedE']}</td>";
                    echo "<td>{$row['AlumVela']}</td>";
                    echo "<td>{$row['AlumQuin']}</td>";
                    echo "<td>{$row['AlumPlaS']}</td>";
                    echo "<td>{$row['NumHab']}</td>";
                    echo "<td>{$row['Recam']}</td>";
                    echo "<td>{$row['Estan']}</td>";
                    echo "<td>{$row['Comed']}</td>";
                    echo "<td>{$row['Multi']}</td>";
                    echo "<td>{$row['Cocin']}</td>";
                    echo "<td>{$row['FecRegViv']}</td>";
                    echo "<td>{$row['PueIndTara']}</td>";
                    echo "<td>{$row['PueIndTepe']}</td>";
                    echo "<td>{$row['PueIndWuar']}</td>";
                    echo "<td>{$row['PueIndPima']}</td>";
                    echo "<td>{$row['PueIndMeno']}</td>";
                    echo "<td>{$row['PueIndOtro']}</td>";
                    echo "<td>{$row['DerechINSABI']}</td>";
                    echo "<td>{$row['DerechIMSS']}</td>";
                    echo "<td>{$row['DerechISSSTE']}</td>";
                    echo "<td>{$row['DerechPEMEX']}</td>";
                    echo "<td>{$row['DerechSEDENA']}</td>";
                    echo "<td>{$row['DerechOtro']}</td>";
                    echo "<td>{$row['NumPerros']}</td>";
                    echo "<td>{$row['NumGatos']}</td>";
                    echo "<td>{$row['NumOtros']}</td>";
                    echo "<td>{$row['SisSalINSABI']}</td>";
                    echo "<td>{$row['SisSalIMSS']}</td>";
                    echo "<td>{$row['SisSalISSSTE']}</td>";
                    echo "<td>{$row['SisSalPEMEX']}</td>";
                    echo "<td>{$row['SisSalSEDENA']}</td>";
                    echo "<td>{$row['SisSalOtro']}</td>";
                    echo "<td>{$row['SisSalMedPar']}</td>";
                    echo "<td>{$row['SisSalCliPar']}</td>";
                    echo "<td>{$row['SisSalParter']}</td>";
                    echo "<td>{$row['SisSalCurand']}</td>";
                    echo "<td>{$row['SisSalYerber']}</td>";
                    echo "<td>{$row['SisSalHueser']}</td>";
                    echo "<td>{$row['SisSalBotica']}</td>";
                    echo "<td>{$row['Comentario']}</td>";
                    echo "<td>{$row['FecRegGen']}</td>";
                    echo "<td>{$row['OrigCapt']}</td>";
                    echo "</tr>";
                }
                mysqli_close($conn);
            ?>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <td rowspan=2>ID</td>
                <td rowspan=2>Cédula</td>
                <td rowspan=2>Primer Apellido</td>
                <td rowspan=2>Segundo Apellido</td>
                <td rowspan=2>Nombre</td>
                <td rowspan=2>Fecha de Nacimiento</td>
                <td rowspan=2>Edad</td>
                <td rowspan=2>Género</td>
                <td rowspan=2>Estado de Origen</td>
                <td rowspan=2>Lengua Materna</td>
                <td colspan=5>Dato Generales</td>
                <td colspan=7>Detecciones y Padecimientos</td>
                <td colspan=7>Planificación Familiar</td>
                <td rowspan=2>Embarazada</td>
                <td colspan=3>Higiene</td>
                <td colspan=4>Toxicomanías</td>
                <td rowspan=2>Fecha de Registro de Integrante</td>
            </tr>
            <tr>
                <td>Estado Civil</td>
                <td>Parentesco</td>
                <td>Escolaridad</td>
                <td>Ocupación</td>
                <td>Ingresos</td>
                <td>Papanicolaou</td>
                <td>Hipertensión</td>
                <td>Diabetes</td>
                <td>Tuberculosis</td>
                <td>Alcoholismo</td>
                <td>Tabaquismo</td>
                <td>Cancer</td>
                <td>DIU</td>
                <td>Orales</td>
                <td>Preservativos</td>
                <td>Inyección Mensual</td>
                <td>Inyección Bimensual</td>
                <td>Salpingo</td>
                <td>Implantes</td>
                <td>Baño y cambio de ropa</td>
                <td>Lavado de dientes</td>
                <td>Limpieza de vivienda</td>
                <td>Bebidas alcoholicas</td>
                <td>Tabaco</td>
                <td>Medicamentos</td>
                <td>Drogas</td>
            </tr>
        </thead>
        <tbody id='table-integrantes'>
            <?php
                include "model/connection.php";

                function getAge($birthDate) {
                    $birthDate = explode("-", $birthDate);
                    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
                    ? ((date("Y") - $birthDate[0]) - 1)
                    : (date("Y") - $birthDate[0]));
                    return $age;
                }
                
                if($_GET['mun'] == 'ALL'){
                    if(!isset($_GET['att'])){
                        $query = "SELECT * FROM `cedula`, `familia` WHERE cedula.ID = familia.CedulaId ORDER BY familia.ID ASC;";
                    }else{
                        $att = str_replace("%20", " ", $_GET['att']);
                        $query = "SELECT * FROM `cedula`, `familia` WHERE cedula.ID = familia.CedulaId AND $att ORDER BY familia.ID ASC;";
                    }
                }else{
                    if(!isset($_GET['att'])){
                        $query = "SELECT * FROM `cedula`, `familia` WHERE cedula.ID = familia.CedulaId AND cedula.MunicipioNom = '{$_GET['mun']}' ORDER BY familia.ID ASC;";
                    }else{
                        $att = str_replace("%20", " ", $_GET['att']);
                        $query = "SELECT * FROM `cedula`, `familia` WHERE cedula.ID = familia.CedulaId AND cedula.MunicipioNom = '{$_GET['mun']}' AND $att ORDER BY familia.ID ASC;";
                    }
                }

                $result = mysqli_query($conn, $query);
                
                foreach($result as $row){
                    echo "<tr>";
                    echo "<td>{$row['ID']}</td>";
                    echo "<td>{$row['CedulaId']}</td>";
                    echo "<td>{$row['Apelli1']}</td>";
                    echo "<td>{$row['Apelli2']}</td>";
                    echo "<td>{$row['Nombres']}</td>";
                    echo "<td>{$row['FecNac']}</td>";
                    echo "<td>" . getAge($row['FecNac']) . "</td>";
                    echo "<td>{$row['Genero']}</td>";
                    echo "<td>{$row['EstOrig']}</td>";
                    echo "<td>{$row['LenMat']}</td>";
                    echo "<td>{$row['EstCiv']}</td>";
                    echo "<td>{$row['Parente']}</td>";
                    echo "<td>{$row['Escola']}</td>";
                    echo "<td>{$row['Ocupa']}</td>";
                    echo "<td>{$row['Ingres']}</td>";
                    echo "<td>{$row['Papani']}</td>";
                    echo "<td>{$row['Hipert']}</td>";
                    echo "<td>{$row['Diabet']}</td>";
                    echo "<td>{$row['Tuberc']}</td>";
                    echo "<td>{$row['Alcoho']}</td>";
                    echo "<td>{$row['Tabaqu']}</td>";
                    echo "<td>{$row['Cancer']}</td>";
                    echo "<td>{$row['Diu']}</td>";
                    echo "<td>{$row['Orales']}</td>";
                    echo "<td>{$row['Preser']}</td>";
                    echo "<td>{$row['InyMens']}</td>";
                    echo "<td>{$row['InyBien']}</td>";
                    echo "<td>{$row['Salping']}</td>";
                    echo "<td>{$row['Implant']}</td>";
                    echo "<td>{$row['Embaraz']}</td>";
                    echo "<td>{$row['Bacamro']}</td>";
                    echo "<td>{$row['LavDien']}</td>";
                    echo "<td>{$row['LimVivi']}</td>";
                    echo "<td>{$row['BebAlco']}</td>";
                    echo "<td>{$row['Tabaco']}</td>";
                    echo "<td>{$row['Medica']}</td>";
                    echo "<td>{$row['Drogas']}</td>";
                    echo "<td>{$row['FecRegInt']}</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    
    <script src="js/in_session/showrecords.js"></script>
</body>
</html>