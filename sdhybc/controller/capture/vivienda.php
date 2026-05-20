<?php
    include "../session/verify.php";
    include "../../model/connection.php";
    
    $v_techoConcreto = $conn -> real_escape_string($_POST['v_techoConcreto']);
    $v_techoGalvanizada = $conn -> real_escape_string($_POST['v_techoGalvanizada']);
    $v_techoMadera = $conn -> real_escape_string($_POST['v_techoMadera']);
    $v_techoCarton = $conn -> real_escape_string($_POST['v_techoCarton']);
    $v_techoOtro = $conn -> real_escape_string($_POST['v_techoOtro']);
    $v_paredTabique = $conn -> real_escape_string($_POST['v_paredTabique']);
    $v_paredAdobe = $conn -> real_escape_string($_POST['v_paredAdobe']);
    $v_paredBlock = $conn -> real_escape_string($_POST['v_paredBlock']);
    $v_paredMadera = $conn -> real_escape_string($_POST['v_paredMadera']);
    $v_paredPiedra = $conn -> real_escape_string($_POST['v_paredPiedra']);
    $v_paredCarton = $conn -> real_escape_string($_POST['v_paredCarton']);
    $v_pisoCemento = $conn -> real_escape_string($_POST['v_pisoCemento']);
    $v_pisoMadera = $conn -> real_escape_string($_POST['v_pisoMadera']);
    $v_pisoTierra = $conn -> real_escape_string($_POST['v_pisoTierra']);
    $v_pisoPiedra = $conn -> real_escape_string($_POST['v_pisoPiedra']);
    $v_agusoPotable = $conn -> real_escape_string($_POST['v_agusoPotable']);
    $v_agusoNoria = $conn -> real_escape_string($_POST['v_agusoNoria']);
    $v_agusoRio = $conn -> real_escape_string($_POST['v_agusoRio']);
    $v_agusoLluvia = $conn -> real_escape_string($_POST['v_agusoLluvia']);
    $v_agconPotable = $conn -> real_escape_string($_POST['v_agconPotable']);
    $v_agconPurificada = $conn -> real_escape_string($_POST['v_agconPurificada']);
    $v_agconHervida = $conn -> real_escape_string($_POST['v_agconHervida']);
    $v_agconClorada = $conn -> real_escape_string($_POST['v_agconClorada']);
    $v_agconFiltrada = $conn -> real_escape_string($_POST['v_agconFiltrada']);
    $v_excFosa = $conn -> real_escape_string($_POST['v_excFosa']);
    $v_excLetrina = $conn -> real_escape_string($_POST['v_excLetrina']);
    $v_excRas = $conn -> real_escape_string($_POST['v_excRas']);
    $v_combGas = $conn -> real_escape_string($_POST['v_combGas']);
    $v_combCarbon = $conn -> real_escape_string($_POST['v_combCarbon']);
    $v_combLena = $conn -> real_escape_string($_POST['v_combLena']);
    $v_combOtros = $conn -> real_escape_string($_POST['v_combOtros']);
    $v_basuMunicipal = $conn -> real_escape_string($_POST['v_basuMunicipal']);
    $v_basuEnterramiento = $conn -> real_escape_string($_POST['v_basuEnterramiento']);
    $v_basuAbierto = $conn -> real_escape_string($_POST['v_basuAbierto']);
    $v_basuIncineracion = $conn -> real_escape_string($_POST['v_basuIncineracion']);
    $v_alumElectrica = $conn -> real_escape_string($_POST['v_alumElectrica']);
    $v_alumVelas = $conn -> real_escape_string($_POST['v_alumVelas']);
    $v_alumQuinque = $conn -> real_escape_string($_POST['v_alumQuinque']);
    $v_alumPlaca = $conn -> real_escape_string($_POST['v_alumPlaca']);
    $v_Habitaciones = $conn -> real_escape_string($_POST['v_Habitaciones']);
    $v_Recamara = $conn -> real_escape_string($_POST['v_Recamara']);
    $v_Estancia = $conn -> real_escape_string($_POST['v_Estancia']);
    $v_Comedor = $conn -> real_escape_string($_POST['v_Comedor']);
    $v_Multiple = $conn -> real_escape_string($_POST['v_Multiple']);
    $v_Cocina = $conn -> real_escape_string($_POST['v_Cocina']);
    $fec_reg_viv = $conn -> real_escape_string($_POST['fec_reg_viv']);

    if (!isset($_SESSION['CedulaId'])) {
        echo json_encode(array('success' => false, 'message' => 'Cédula no identificada.'));
    } else {
        $query = "UPDATE cedula SET TechoConc=" . $v_techoConcreto . ", TechoGalv=" . $v_techoGalvanizada . ", TechoMade=" . $v_techoMadera . ", TechoCart=" . $v_techoCarton . ", TechoOtro=" . $v_techoOtro . ", PareTabiq=" . $v_paredTabique . ", PareAdobe=" . $v_paredAdobe . ", PareBlock=" . $v_paredBlock . ", PareMader=" . $v_paredMadera . ", ParePiedr=" . $v_paredPiedra . ", PareCarto=" . $v_paredCarton . ", PisoCemen=" . $v_pisoCemento . ", PisoMader=" . $v_pisoMadera . ", PisoTierr=" . $v_pisoTierra . ", PisoPiedr=" . $v_pisoPiedra . ", AgUsoPota=" . $v_agusoPotable . ", AgUsoNori=" . $v_agusoNoria . ", AgUsoRio=" . $v_agusoRio . ", AgUsoLluv=" . $v_agusoLluvia . ", AgConPota=" . $v_agconPotable . ", AgConPuri=" . $v_agconPurificada . ", AgConHerv=" . $v_agconHervida . ", AgConClor=" . $v_agconClorada . ", AgConFilt=" . $v_agconFiltrada . ", ExcFoSep=" . $v_excFosa . ", ExcLetri=" . $v_excLetrina . ", ExcRasSu=" . $v_excRas . ", CombGas=" . $v_combGas . ", CombCar=" . $v_combCarbon . ", CombLen=" . $v_combLena . ", CombOtr=" . $v_combOtros . ", BasRedM=" . $v_basuMunicipal . ", BasEnte=" . $v_basuEnterramiento . ", BasCieAb=" . $v_basuAbierto . ", BasInci=" . $v_basuIncineracion . ", AlumRedE=" . $v_alumElectrica . ", AlumVela=" . $v_alumVelas . ", AlumQuin=" . $v_alumQuinque . ", AlumPlaS=" . $v_alumPlaca . ", NumHab=" . $v_Habitaciones . ", Recam=" . $v_Recamara . ", Estan=" . $v_Estancia . ", Comed=" . $v_Comedor . ", Multi=" . $v_Multiple . ", Cocin=" . $v_Cocina . ", FecRegViv='" . $fec_reg_viv . "' WHERE ID=" . $_SESSION['CedulaId'];
        mysqli_query($conn, $query);
        mysqli_close($conn);
        $_SESSION['url'] = "https://www.sdhybc.org/on/c_general.php";
        echo json_encode(array('success' => true));
    }
?>