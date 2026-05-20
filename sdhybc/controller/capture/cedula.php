<?php
    include "../session/verify.php";
    include "../../model/connection.php";
    
    $id = $_SESSION['ID'];
    $unidad = $conn -> real_escape_string($_POST['unidad']);
    $asistente = $conn -> real_escape_string($_POST['asistente']);
    $mun_num = $conn -> real_escape_string($_POST['mun-num']);
    $mun_nom = $conn -> real_escape_string($_POST['mun-nom']);
    $loc_num = $conn -> real_escape_string($_POST['loc-num']);
    $loc_nom = $conn -> real_escape_string($_POST['loc-nom']);
    $tipo_loc = $conn -> real_escape_string($_POST['tipo-loc']);
    $rvm = $conn -> real_escape_string($_POST['rvm']);
    $rvk = $conn -> real_escape_string($_POST['rvk']);
    $rpm = $conn -> real_escape_string($_POST['rpm']);
    $rpk = $conn -> real_escape_string($_POST['rpk']);
    $svm = $conn -> real_escape_string($_POST['svm']);
    $svk = $conn -> real_escape_string($_POST['svk']);
    $spm = $conn -> real_escape_string($_POST['spm']);
    $spk = $conn -> real_escape_string($_POST['spk']);
    $fec_reg_ced = $conn -> real_escape_string($_POST['fec-reg-ced']);

    if (!isset($_SESSION['CedulaId'])) {
        $query = "INSERT INTO cedula (UsuarioId, MunicipioNum, MunicipioNom, LocalidadNum, LocalidadNom, Unidad, AsistSoc, TipoLoc, SedeVm, SedeVk, SedePm, SedePk, SubsVm, SubsVk, SubsPm, SubsPk, FecRegCed) VALUES (" . $id . ", '" . $mun_num . "', '" . $mun_nom . "', '" . $loc_num . "', '" . $loc_nom . "', '" . $unidad . "', '" . $asistente . "', '" . $tipo_loc . "', " . $rvm . ", " . $rvk . ", " . $rpm . ", " . $rpk . ", " . $svm . ", " . $svk . ", " . $spm . ", " . $spk . ", '" . $fec_reg_ced . "');";
        mysqli_query($conn, $query);
        $_SESSION['CedulaId'] = mysqli_insert_id($conn);
        $_SESSION['ContCapt'] = $_SESSION['CedulaId'];
        
        $number_of_records = $conn -> query('SELECT COUNT(*) FROM cedula WHERE UsuarioId=' . $_SESSION['ID']) -> fetch_row()[0];
        $query = "UPDATE usuarios SET NumeroCedulas='" . $number_of_records . "' WHERE ID=" . $_SESSION['ID'] . ";";
        mysqli_query($conn, $query);
        
        mysqli_close($conn);
        $_SESSION['url'] = "https://www.sdhybc.org/on/c_vivienda.php";
        echo json_encode(array('success' => true));
    } else {
        $query = "UPDATE cedula SET UsuarioId=" . $id . ", MunicipioNum='" . $mun_num . "', MunicipioNom='" . $mun_nom . "', LocalidadNum='" . $loc_num . "', LocalidadNom='" . $loc_nom . "', Unidad='" . $unidad . "', AsistSoc='" . $asistente . "', TipoLoc='" . $tipo_loc . "', SedeVm=" . $rvm . ", SedeVk=" . $rvk . ", SedePm=" . $rpm . ", SedePk=" . $rpk . ", SubsVm=" . $svm . ", SubsVk=" . $svk . ", SubsPm=" . $spm . ", SubsPk=" . $spk . ", FecRegCed='" . $fec_reg_ced . "' WHERE ID=" . $_SESSION['CedulaId'];
        mysqli_query($conn, $query);
        mysqli_close($conn);
        $_SESSION['url'] = "https://www.sdhybc.org/on/c_vivienda.php";
        echo json_encode(array('success' => true));
    }
?>