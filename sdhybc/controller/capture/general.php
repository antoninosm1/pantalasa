<?php
    include "../session/verify.php";
    include "../../model/connection.php";
    
    $g_PueIndTarahumara = $conn -> real_escape_string($_POST['g_PueIndTarahumara']);
    $g_PueIndTepehuan = $conn -> real_escape_string($_POST['g_PueIndTepehuan']);
    $g_PueIndWuarojio = $conn -> real_escape_string($_POST['g_PueIndWuarojio']);
    $g_PueIndPima = $conn -> real_escape_string($_POST['g_PueIndPima']);
    $g_PueIndMenonita = $conn -> real_escape_string($_POST['g_PueIndMenonita']);
    $g_PueIndOtro = $conn -> real_escape_string($_POST['g_PueIndOtro']);
    $g_DereINSABI = $conn -> real_escape_string($_POST['g_DereINSABI']);
    $g_DereIMSS = $conn -> real_escape_string($_POST['g_DereIMSS']);
    $g_DereISSSTE = $conn -> real_escape_string($_POST['g_DereISSSTE']);
    $g_DerePEMEX = $conn -> real_escape_string($_POST['g_DerePEMEX']);
    $g_DereSEDENA = $conn -> real_escape_string($_POST['g_DereSEDENA']);
    $g_DereOtro = $conn -> real_escape_string($_POST['g_DereOtro']);
    $g_MascotasPerros = $conn -> real_escape_string($_POST['g_MascotasPerros']);
    $g_MascotasGatos = $conn -> real_escape_string($_POST['g_MascotasGatos']);
    $g_MascotasOtros = $conn -> real_escape_string($_POST['g_MascotasOtros']);
    $g_SiSalINSABI = $conn -> real_escape_string($_POST['g_SiSalINSABI']);
    $g_SiSalIMSS = $conn -> real_escape_string($_POST['g_SiSalIMSS']);
    $g_SiSalISSSTE = $conn -> real_escape_string($_POST['g_SiSalISSSTE']);
    $g_SiSalPEMEX = $conn -> real_escape_string($_POST['g_SiSalPEMEX']);
    $g_SiSalSEDENA = $conn -> real_escape_string($_POST['g_SiSalSEDENA']);
    $g_SiSalOtro = $conn -> real_escape_string($_POST['g_SiSalOtro']);
    $g_SiSalMedico = $conn -> real_escape_string($_POST['g_SiSalMedico']);
    $g_SiSalClinica = $conn -> real_escape_string($_POST['g_SiSalClinica']);
    $g_SiSalPartera = $conn -> real_escape_string($_POST['g_SiSalPartera']);
    $g_SiSalCurandera = $conn -> real_escape_string($_POST['g_SiSalCurandera']);
    $g_SiSalYerbero = $conn -> real_escape_string($_POST['g_SiSalYerbero']);
    $g_SiSalHuesero = $conn -> real_escape_string($_POST['g_SiSalHuesero']);
    $g_SiSalBoticario = $conn -> real_escape_string($_POST['g_SiSalBoticario']);
    $g_Comentario = $conn -> real_escape_string($_POST['g_Comentario']);
    $fec_reg_gen = $conn -> real_escape_string($_POST['fec_reg_gen']);

    if (!isset($_SESSION['CedulaId'])) {
        echo json_encode(array('success' => false, 'message' => 'Cédula no identificada.'));
    } else {
        $query = "UPDATE cedula SET PueIndTara=" . $g_PueIndTarahumara . ", PueIndTepe=" . $g_PueIndTepehuan . ", PueIndWuar=" . $g_PueIndWuarojio . ", PueIndPima=" . $g_PueIndPima . ", PueIndMeno=" . $g_PueIndMenonita . ", PueIndOtro=" . $g_PueIndOtro . ", DerechINSABI=" . $g_DereINSABI . ", DerechIMSS=" . $g_DereIMSS . ", DerechISSSTE=" . $g_DereISSSTE . ", DerechPEMEX=" . $g_DerePEMEX . ", DerechSEDENA=" . $g_DereSEDENA . ", DerechOtro=" . $g_DereOtro . ", NumPerros=" . $g_MascotasPerros . ", NumGatos=" . $g_MascotasGatos . ", NumOtros=" . $g_MascotasOtros . ", SisSalINSABI=" . $g_SiSalINSABI . ", SisSalIMSS=" . $g_SiSalIMSS . ", SisSalISSSTE=" . $g_SiSalISSSTE . ", SisSalPEMEX=" . $g_SiSalPEMEX . ", SisSalSEDENA=" . $g_SiSalSEDENA . ", SisSalOtro=" . $g_SiSalOtro . ", SisSalMedPar=" . $g_SiSalMedico . ", SisSalCliPar=" . $g_SiSalClinica . ", SisSalParter=" . $g_SiSalPartera . ", SisSalCurand=" . $g_SiSalCurandera . ", SisSalYerber=" . $g_SiSalYerbero . ", SisSalHueser=" . $g_SiSalHuesero . ", SisSalBotica=" . $g_SiSalBoticario . ", Comentario='" . $g_Comentario . "', FecRegGen='" . $fec_reg_gen . "' WHERE ID=" . $_SESSION['CedulaId'];
        mysqli_query($conn, $query);
        mysqli_close($conn);
        $_SESSION['url'] = "https://www.sdhybc.org/on/c_familia.php";
        echo json_encode(array('success' => true, 'message' => $query));
    }
?>