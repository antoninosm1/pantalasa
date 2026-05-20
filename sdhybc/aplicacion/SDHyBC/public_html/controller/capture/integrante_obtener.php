<?php
    include "../session/verify.php";
    include "../../model/connection.php";
    
    $cedulaId = $_SESSION['CedulaId'];
    $f_Id = $conn -> real_escape_string($_POST['integranteId']);
    $f_borrar = $conn -> real_escape_string($_POST['borrar']);

    if (!isset($_SESSION['CedulaId'])) {
        echo json_encode(array('success' => false, 'message' => 'Cédula no identificada.'));
    } else {
        $query = "SELECT * FROM familia WHERE ID=" . $f_Id;
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_array($result);
            $Apelli1 = $row['Apelli1'];
            $Apelli2 = $row['Apelli2'];
            $Nombres = $row['Nombres'];
            $FecNac = $row['FecNac'];
            $Edad = $row['Edad'];
            $Genero = $row['Genero'];
            $EstOrig = $row['EstOrig'];
            $LenMat = $row['LenMat'];
            $EstCiv = $row['EstCiv'];
            $Parente = $row['Parente'];
            $Escola = $row['Escola'];
            $Ocupa = $row['Ocupa'];
            $Ingres = $row['Ingres'];
            $Papani = $row['Papani'];
            $Hipert = $row['Hipert'];
            $Diabet = $row['Diabet'];
            $Tuberc = $row['Tuberc'];
            $Alcoho = $row['Alcoho'];
            $Tabaqu = $row['Tabaqu'];
            $Cancer = $row['Cancer'];
            $Diu = $row['Diu'];
            $Orales = $row['Orales'];
            $Preser = $row['Preser'];
            $InyMens = $row['InyMens'];
            $InyBien = $row['InyBien'];
            $Salping = $row['Salping'];
            $Implant = $row['Implant'];
            $Embaraz = $row['Embaraz'];
            $Bacamro = $row['Bacamro'];
            $LavDien = $row['LavDien'];
            $LimVivi = $row['LimVivi'];
            $BebAlco = $row['BebAlco'];
            $Tabaco = $row['Tabaco'];
            $Medica = $row['Medica'];
            $Drogas = $row['Drogas'];
            mysqli_query($conn, $query);
            mysqli_free_result($result);

            if ($f_borrar === true) {
                $query = "DELETE FROM familia WHERE ID=" . $f_Id;
                mysqli_query($conn, $query);
            }
            echo json_encode(array('success' => true, 'Apelli1' => $Apelli1, 'Apelli2' => $Apelli2, 'Nombres' => $Nombres, 'FecNac' => $FecNac, 'Edad' => $Edad, 'Genero' => $Genero, 'EstOrig' => $EstOrig, 'LenMat' => $LenMat, 'EstCiv' => $EstCiv, 'Parente' => $Parente, 'Escola' => $Escola, 'Ocupa' => $Ocupa, 'Ingres' => $Ingres, 'Papani' => $Papani, 'Hipert' => $Hipert, 'Diabet' => $Diabet, 'Tuberc' => $Tuberc, 'Alcoho' => $Alcoho, 'Tabaqu' => $Tabaqu, 'Cancer' => $Cancer, 'Diu' => $Diu, 'Orales' => $Orales, 'Preser' => $Preser, 'InyMens' => $InyMens, 'InyBien' => $InyBien, 'Salping' => $Salping, 'Implant' => $Implant, 'Embaraz' => $Embaraz, 'Bacamro' => $Bacamro, 'LavDien' => $LavDien, 'LimVivi' => $LimVivi, 'BebAlco' => $BebAlco, 'Tabaco' => $Tabaco, 'Medica' => $Medica, 'Drogas' => $Drogas));
        } else {            
            echo json_encode(array('success' => false, 'message' => 'No hay datos de integrante.'));
        }

        mysqli_close($conn);
        exit();
    }
?>