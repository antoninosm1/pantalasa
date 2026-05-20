<?php
    include "../session/verify.php";
    
    switch ($_POST['action']) {
        case 'update-table':
            update_table($_POST['page']);
            break;
        case 'edit-record':
            edit_record($_POST['id']);
            break;
        case 'delete-record':
            delete_record($_POST['id']);
            update_table($_POST['page']);
            break;
        case 'show-user':
            show_user($_POST['userId']);
            break;
        case 'show-ced':
            show_ced($_POST['id']);
            break;
        case 'show-viv':
            show_viv($_POST['id']);
            break;
        case 'show-gen':
            show_gen($_POST['id']);
            break;
        case 'show-fam':
            show_fam($_POST['id']);
            break;
        default:
            echo json_encode(array('success' => false, 'title' => 'ERROR', 'message' => 'Solicitud no efectuada.'));
    }
    exit();
    

    function update_table($page) {
        include "../../model/connection.php";
        $num_results_on_page = 20;
        if ($_SESSION['Privilegios'] <= 2) {
            $number_of_records = $conn -> query('SELECT COUNT(*) FROM cedula') -> fetch_row()[0];
        } else {
            $number_of_records = $conn -> query('SELECT COUNT(*) FROM cedula WHERE UsuarioId=' . $_SESSION['ID']) -> fetch_row()[0];
        }
        
        $total_pages = ceil($number_of_records / $num_results_on_page);
        $calc_page = ($page - 1) * $num_results_on_page;
        
        if ($_SESSION['Privilegios'] <= 2) {
            $query = "SELECT ID, UsuarioId, MunicipioNom, FecRegCed, FecRegViv, FecRegGen, NumInteg FROM cedula ORDER BY ID DESC LIMIT " . $calc_page . "," . $num_results_on_page;
        } else {
            $query = "SELECT ID, UsuarioId, MunicipioNom, FecRegCed, FecRegViv, FecRegGen, NumInteg FROM cedula WHERE UsuarioId=" . $_SESSION['ID'] . " ORDER BY ID DESC LIMIT " . $calc_page . "," . $num_results_on_page;
        }
        $result = mysqli_query($conn, $query);

        
        $output = array();
        if ($result != null) {
            foreach ($result as $row) {
                $output[] = array('ID' => $row['ID'], 'UsuarioId' => $row['UsuarioId'], 'MunicipioNom' => $row['MunicipioNom'], 'FecRegCed' => $row['FecRegCed'], 'FecRegViv' => $row['FecRegViv'], 'FecRegGen' => $row['FecRegGen'], 'NumInteg' => $row['NumInteg']);
            }
        }
        mysqli_close($conn);
        echo json_encode(array('success' => true, 'records' => $output));
    }

    function edit_record($id) {
        $_SESSION['CedulaId'] = $id;
        $_SESSION['url'] = "https://www.sdhybc.org/on/c_cedula.php";
        echo json_encode(array('success' => true, 'message' => 'Solicitud efectuada.'));
    }

    function delete_record($id) {
        include "../../model/connection.php";
        $query = "DELETE FROM cedula WHERE ID=" . $id;
        mysqli_query($conn, $query);
        mysqli_close($conn);
    }

    function show_user($userId) {
        include "../../model/connection.php";
        $query = "SELECT Nombre, Apellido1, Apellido2, Correo, Privilegios FROM usuarios WHERE ID=" . $userId;
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            mysqli_close($conn);
            echo json_encode(array('success' => true, 'name' => "<b class='font-size-12px'>" . $row['Nombre'] . " " . $row['Apellido1'] . " " . $row['Apellido2'] . "</b>", 'user' =>"<p class='font-size-12px'>" . $row['Correo'] . "<br>Nivel de acceso: " . $row['Privilegios'] . "</p>"));
        }
    }

    function show_ced($id) {
        include "../../model/connection.php";
        $query = "SELECT UsuarioId, MunicipioNum, MunicipioNom, LocalidadNum, LocalidadNom, Unidad, AsistSoc, TipoLoc, SedeVm, SedeVk, SedePm, SedePk, SubsVm, SubsVk, SubsPm, SubsPk, FecRegCed FROM cedula WHERE ID=" . $id;
        $result = mysqli_query($conn, $query);        
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            mysqli_close($conn);
            $content = "<p class='font-size-12px'>" . 
                "<b class='font-size-12px'>Capturó:</b> " . $row['UsuarioId'] . "<br>" . 
                "<b class='font-size-12px'>Municipio:</b> " . $row['MunicipioNum'] . " - " . $row['MunicipioNom'] .  "<br>" . 
                "<b class='font-size-12px'>Localidad:</b> " . $row['LocalidadNum'] . " - " . $row['LocalidadNom'] .  "<br>" .
                "<b class='font-size-12px'>Unidad:</b> " . $row['Unidad'] .  "<br>" .
                "<b class='font-size-12px'>Asistente:</b> " . $row['AsistSoc'] .  "<br>" .
                "<b class='font-size-12px'>Tipo de Localidad:</b> " . $row['TipoLoc'] .  "<br>" .
                "<b class='font-size-12px'>Duración a Sede en Vehiculo (min.):</b> " . $row['SedeVm'] .  "<br>" .
                "<b class='font-size-12px'>Distancia a Sede en Vehiculo (km.):</b> " . $row['SedeVk'] .  "<br>" .
                "<b class='font-size-12px'>Duración a Sede a Pie (min.):</b> " . $row['SedePm'] .  "<br>" .
                "<b class='font-size-12px'>Distancia a Sede a Pie (km.):</b> " . $row['SedePk'] .  "<br>" .
                "<b class='font-size-12px'>Duración a Subsede en Vehiculo (min.):</b> " . $row['SubsVm'] .  "<br>" .
                "<b class='font-size-12px'>Distancia a Subsede en Vehiculo (km.):</b> " . $row['SubsVk'] .  "<br>" .
                "<b class='font-size-12px'>Duración a Subsede a Pie (min.):</b> " . $row['SubsPm'] .  "<br>" .
                "<b class='font-size-12px'>Distancia a Subsede a Pie (km.):</b> " . $row['SubsPk'] .  "<br>" .
                $row['FecRegCed'] . "</p>";
            echo json_encode(array('success' => true, 'name' => "<b class='font-size-13px'>CÉDULA: " . $id . "</b>", 'content' => $content));
        }
    }

    function show_viv($id) {
        include "../../model/connection.php";
        $query = "SELECT TechoConc, TechoGalv, TechoMade, TechoCart, TechoOtro, PareTabiq, PareAdobe, PareBlock, PareMader, ParePiedr, PareCarto, PisoCemen, PisoMader, PisoTierr, PisoPiedr, AgUsoPota, AgUsoNori, AgUsoRio, AgUsoLluv, AgConPota, AgConPuri, AgConHerv, AgConClor, AgConFilt, ExcFoSep, ExcLetri, ExcRasSu, CombGas, CombCar, CombLen, CombOtr, BasRedM, BasEnte, BasCieAb, BasInci, AlumRedE, AlumVela, AlumQuin, AlumPlaS, NumHab, Recam, Estan, Comed, Multi, Cocin, FecRegViv FROM cedula WHERE ID=" . $id;
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            mysqli_close($conn);
            $content = "<p class='font-size-12px'>" .
                "<b class='font-size-12px'>Material de Techo</b><br>" .
                ($row['TechoConc'] == 1 ? 'Concreto<br>'  : '') . 
                ($row['TechoGalv'] == 1 ? 'Lamina Galvanizada<br>'  : '') . 
                ($row['TechoMade'] == 1 ? 'Madera<br>'  : '') . 
                ($row['TechoCart'] == 1 ? 'Cartón<br>'  : '') . 
                ($row['TechoOtro'] == 1 ? 'Otro<br>'  : '') . 
                '<b class="font-size-12px">Material de Pared</b><br>' . 
                ($row['PareTabiq'] == 1 ? 'Tabique<br>' : '') . 
                ($row['PareAdobe'] == 1 ? 'Adobe<br>' : '') . 
                ($row['PareBlock'] == 1 ? 'Block<br>' : '') . 
                ($row['PareMader'] == 1 ? 'Madera<br>' : '') . 
                ($row['ParePiedr'] == 1 ? 'Piedra<br>' : '') . 
                ($row['PareCarto'] == 1 ? 'Cartón<br>' : '') .
                '<b class="font-size-12px">Material de Piso</b><br>' . 
                ($row['PisoCemen'] == 1 ? 'Cemento<br>' : '') . 
                ($row['PisoMader'] == 1 ? 'Madera<br>' : '') . 
                ($row['PisoTierr'] == 1 ? 'Tierra<br>' : '') . 
                ($row['PisoPiedr'] == 1 ? 'Piedra<br>' : '') .
                '<b class="font-size-12px">Agua de Uso</b><br>' . 
                ($row['AgUsoPota'] == 1 ? 'Potable<br>' : '') . 
                ($row['AgUsoNori'] == 1 ? 'Noria<br>' : '') . 
                ($row['AgUsoRio'] == 1 ? 'Rio<br>' : '') . 
                ($row['AgUsoLluv'] == 1 ? 'Lluvia<br>' : '') .
                '<b class="font-size-12px">Agua de Consumo</b><br>' . 
                ($row['AgConPota'] == 1 ? 'Potable<br>' : '') . 
                ($row['AgConPuri'] == 1 ? 'Purificada<br>' : '') . 
                ($row['AgConHerv'] == 1 ? 'Hervida<br>' : '') . 
                ($row['AgConClor'] == 1 ? 'Clorada<br>' : '') . 
                ($row['AgConFilt'] == 1 ? 'Filtrada<br>' : '') .
                '<b class="font-size-12px">Excreta</b><br>' . 
                ($row['ExcFoSep'] == 1 ? 'Fosa Séptica<br>' : '') . 
                ($row['ExcLetri'] == 1 ? 'Letrina<br>' : '') . 
                ($row['ExcRasSu'] == 1 ? 'Al Ras del Suelo<br>' : '') .
                '<b class="font-size-12px">Combustible</b><br>' . 
                ($row['CombGas'] == 1 ? 'Gas<br>' : '') . 
                ($row['CombCar'] == 1 ? 'Carbón<br>' : '') . 
                ($row['CombLen'] == 1 ? 'Leña<br>' : '') . 
                ($row['CombOtr'] == 1 ? 'Otro<br>' : '') .
                '<b class="font-size-12px">Basura</b><br>' . 
                ($row['BasRedM'] == 1 ? 'Red Municipal<br>' : '') . 
                ($row['BasEnte'] == 1 ? 'Enterramiento<br>' : '') . 
                ($row['BasCieAb'] == 1 ? 'Cielo Abierto<br>' : '') . 
                ($row['BasInci'] == 1 ? 'Incineración<br>' : '') .
                '<b class="font-size-12px">Alumbrado</b><br>' . 
                ($row['AlumRedE'] == 1 ? 'Red Electrica<br>' : '') . 
                ($row['AlumVela'] == 1 ? 'Velas<br>' : '') . 
                ($row['AlumQuin'] == 1 ? 'Quinque<br>' : '') . 
                ($row['AlumPlaS'] == 1 ? 'Placa Solar<br>' : '') .
                '<b class="font-size-12px">Número de Habitaciones:</b> ' . $row['NumHab'] . '<br>' . 
                $row['FecRegViv'] .
                "</p>";
            echo json_encode(array('success' => true, 'name' => "<b class='font-size-13px'>CÉDULA: " . $id . "</b>", 'content' => $content));
        }
    }

    function show_gen($id) {
        include "../../model/connection.php";
        $query = "SELECT PueIndTara, PueIndTepe, PueIndWuar, PueIndPima, PueIndMeno, PueIndOtro, DerechINSABI, DerechIMSS, DerechISSSTE, DerechPEMEX, DerechSEDENA, DerechOtro, NumPerros, NumGatos, NumOtros, SisSalINSABI, SisSalIMSS, SisSalISSSTE, SisSalPEMEX, SisSalSEDENA, SisSalOtro, SisSalMedPar, SisSalCliPar, SisSalParter, SisSalCurand, SisSalYerber, SisSalHueser, SisSalBotica, Comentario, FecRegGen FROM cedula WHERE ID=" . $id;
        $result = mysqli_query($conn, $query);        
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            mysqli_close($conn);
            $content = "<p class='font-size-12px'>" . 
                '<b class="font-size-12px">Pueblo Indigena</b><br>' . 
                ($row['PueIndTara'] == 1 ? 'Tarahumara<br>' : '') . 
                ($row['PueIndTepe'] == 1 ? 'Tepehuan<br>' : '') . 
                ($row['PueIndWuar'] == 1 ? 'Wuarojio<br>' : '') . 
                ($row['PueIndPima'] == 1 ? 'Pima<br>' : '') . 
                ($row['PueIndMeno'] == 1 ? 'Menonita<br>' : '') . 
                ($row['PueIndOtro'] == 1 ? 'Otro<br>' : '') .
                '<b class="font-size-12px">Derechohabiencia</b><br>' . 
                ($row['DerechINSABI'] == 1 ? 'INSABI<br>' : '') . 
                ($row['DerechIMSS'] == 1 ? 'IMSS<br>' : '') . 
                ($row['DerechISSSTE'] == 1 ? 'ISSSTE<br>' : '') . 
                ($row['DerechPEMEX'] == 1 ? 'PEMEX<br>' : '') . 
                ($row['DerechSEDENA'] == 1 ? 'SEDENA<br>' : '') . 
                ($row['DerechOtro'] == 1 ? 'Otro<br>' : '') .
                '<b class="font-size-12px">Mascotas</b><br>' . 
                ($row['NumPerros'] > 0 ? ('Número de Perros: ' . $row['NumPerros'] . '<br>') : '') . 
                ($row['NumGatos'] > 0 ? ('Número de Gatos: ' . $row['NumGatos'] . '<br>') : '') . 
                ($row['NumOtros'] > 0 ? ('Número de Otros: ' . $row['NumOtros'] . '<br>') : '') .
                '<b class="font-size-12px">Sistema de Salud</b><br>' . 
                ($row['SisSalINSABI'] == 1 ? 'INSABI<br>' : '') . 
                ($row['SisSalIMSS'] == 1 ? 'IMSS<br>' : '') . 
                ($row['SisSalISSSTE'] == 1 ? 'ISSSTE<br>' : '') . 
                ($row['SisSalPEMEX'] == 1 ? 'PEMEX<br>' : '') . 
                ($row['SisSalSEDENA'] == 1 ? 'SEDENA<br>' : '') . 
                ($row['SisSalOtro'] == 1 ? 'Otro<br>' : '') . 
                ($row['SisSalMedPar'] == 1 ? 'Médico Particular<br>' : '') . 
                ($row['SisSalCliPar'] == 1 ? 'Clínica Particular<br>' : '') . 
                ($row['SisSalParter'] == 1 ? 'Partera<br>' : '') . 
                ($row['SisSalCurand'] == 1 ? 'Curandera<br>' : '') . 
                ($row['SisSalYerber'] == 1 ? 'Yerbero<br>' : '') . 
                ($row['SisSalHueser'] == 1 ? 'Huesero<br>' : '') . 
                ($row['SisSalBotica'] == 1 ? 'Boticario<br>' : '') .
                ($row['Comentario'] != '' ? ('Comentario: ' . $row['Comentario'] . '<br>') : '') .
                $row['FecRegGen'] .
                "</p>";
            echo json_encode(array('success' => true, 'name' => "<b class='font-size-13px'>CÉDULA: " . $id . "</b>", 'content' => $content));
        }
    }

    function show_fam($id) {
        include "../../model/connection.php";
        $query = "SELECT ID, Apelli1, Apelli2, Nombres, FecNac FROM familia WHERE cedulaId=" . $id;
        $result = mysqli_query($conn, $query);
        $output = "";
        while($row = mysqli_fetch_assoc($result)) {
            $a = getAge($row['FecNac']);
            $output = $output . $row['ID'] . " - " . $row['Nombres'] . " " . $row['Apelli1'] . " " . $row['Apelli2'] . " (" . $a . ")" . "<br>";
        }
        mysqli_close($conn);
        $content = "<p class='font-size-12px'>" . 
            '<b class="font-size-12px">INTEGRANTES</b><br>' . 
            $output .
            "</p>";
        echo json_encode(array('success' => true, 'name' => "<b class='font-size-13px'>CÉDULA: " . $id . "</b>", 'content' => $content));
    }

    function getAge($birthDate) {
        $birthDate = explode("-", $birthDate);
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
        ? ((date("Y") - $birthDate[0]) - 1)
        : (date("Y") - $birthDate[0]));
        return $age;
    }
?>