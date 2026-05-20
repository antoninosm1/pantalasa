<?php
    include "../session/verify.php";
    include "../../model/connection.php";
    
    $cedulaId = $_SESSION['CedulaId'];
    $f_NumInt = $conn -> real_escape_string($_POST['f_NumInt']);
    $f_Apellido1 = $conn -> real_escape_string($_POST['f_Apellido1']);
    $f_Apellido2 = $conn -> real_escape_string($_POST['f_Apellido2']);
    $f_Nombres = $conn -> real_escape_string($_POST['f_Nombres']);
    $f_Nacimiento = $conn -> real_escape_string($_POST['f_Nacimiento']);
    $f_Edad = $conn -> real_escape_string($_POST['f_Edad']);
    $f_Genero = $conn -> real_escape_string($_POST['f_Genero']);
    $f_EstadoOrigen = $conn -> real_escape_string($_POST['f_EstadoOrigen']);
    $f_LenguaMaterna = $conn -> real_escape_string($_POST['f_LenguaMaterna']);
    $f_EstadoCivil = $conn -> real_escape_string($_POST['f_EstadoCivil']);
    $f_Parentesco = $conn -> real_escape_string($_POST['f_Parentesco']);
    $f_Escolaridad = $conn -> real_escape_string($_POST['f_Escolaridad']);
    $f_Ocupacion = $conn -> real_escape_string($_POST['f_Ocupacion']);
    $f_Ingresos = $conn -> real_escape_string($_POST['f_Ingresos']);
    $f_PADpapan = $conn -> real_escape_string($_POST['f_PADpapan']);
    $f_PADhiper = $conn -> real_escape_string($_POST['f_PADhiper']);
    $f_PADdiab = $conn -> real_escape_string($_POST['f_PADdiab']);
    $f_PADtube = $conn -> real_escape_string($_POST['f_PADtube']);
    $f_PADalco = $conn -> real_escape_string($_POST['f_PADalco']);
    $f_PADtaba = $conn -> real_escape_string($_POST['f_PADtaba']);
    $f_PADcanc = $conn -> real_escape_string($_POST['f_PADcanc']);
    $f_PLAdiu = $conn -> real_escape_string($_POST['f_PLAdiu']);
    $f_PLAora = $conn -> real_escape_string($_POST['f_PLAora']);
    $f_PLApre = $conn -> real_escape_string($_POST['f_PLApre']);
    $f_PLAinm = $conn -> real_escape_string($_POST['f_PLAinm']);
    $f_PLAinb = $conn -> real_escape_string($_POST['f_PLAinb']);
    $f_PLAsal = $conn -> real_escape_string($_POST['f_PLAsal']);
    $f_PLAimp = $conn -> real_escape_string($_POST['f_PLAimp']);
    $f_Embarazada = $conn -> real_escape_string($_POST['f_Embarazada']);
    $f_BaCaRo = $conn -> real_escape_string($_POST['f_BaCaRo']);
    $f_LavaDi = $conn -> real_escape_string($_POST['f_LavaDi']);
    $f_LimVi = $conn -> real_escape_string($_POST['f_LimVi']);
    $f_BeAl = $conn -> real_escape_string($_POST['f_BeAl']);
    $f_Tabaco = $conn -> real_escape_string($_POST['f_Tabaco']);
    $f_Medic = $conn -> real_escape_string($_POST['f_Medic']);
    $f_Drogas = $conn -> real_escape_string($_POST['f_Drogas']);
    $fec_reg_int = $conn -> real_escape_string($_POST['fec_reg_int']);

    if (!isset($_SESSION['CedulaId'])) {
        echo json_encode(array('success' => false, 'message' => 'Cédula no identificada.'));
    } else {
        $query = "INSERT INTO familia (CedulaId, NumInt, Apelli1, Apelli2, Nombres, FecNac, Edad, Genero, EstOrig, LenMat, EstCiv, Parente, Escola, Ocupa, Ingres, Papani, Hipert, Diabet, Tuberc, Alcoho, Tabaqu, Cancer, Diu, Orales, Preser, InyMens, InyBien, Salping, Implant, Embaraz, Bacamro, LavDien, LimVivi, BebAlco, Tabaco, Medica, Drogas, FecRegInt) VALUES (" . $cedulaId . ", " . $f_NumInt . ", '" . $f_Apellido1 . "', '" . $f_Apellido2 . "', '" . $f_Nombres . "', '" . $f_Nacimiento . "', " . $f_Edad . ", '" . $f_Genero . "', '" . $f_EstadoOrigen . "', '" . $f_LenguaMaterna . "', '" . $f_EstadoCivil . "', '" . $f_Parentesco . "', '" . $f_Escolaridad . "', '" . $f_Ocupacion . "', '" . $f_Ingresos . "', " . $f_PADpapan . ", " . $f_PADhiper . ", " . $f_PADdiab . ", " . $f_PADtube . ", " . $f_PADalco . ", " . $f_PADtaba . ", " . $f_PADcanc . ", " . $f_PLAdiu . ", " . $f_PLAora . ", " . $f_PLApre . ", " . $f_PLAinm . ", " . $f_PLAinb . ", " . $f_PLAsal . ", " . $f_PLAimp . ", '" . $f_Embarazada . "', '" . $f_BaCaRo . "', '" . $f_LavaDi . "', '" . $f_LimVi . "', '" . $f_BeAl . "', '" . $f_Tabaco . "', '" . $f_Medic . "', '" . $f_Drogas . "', '" . $fec_reg_int . "')";
        mysqli_query($conn, $query);
        $integranteId = mysqli_insert_id($conn);
        $integranteNombre = $f_Nombres . " " . $f_Apellido1 . " " . $f_Apellido2;
        mysqli_close($conn);
        echo json_encode(array('success' => true, 'id' => $integranteId, 'name' => $integranteNombre));
    }
?>