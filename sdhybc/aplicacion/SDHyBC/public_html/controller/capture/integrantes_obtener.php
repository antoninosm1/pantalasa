<?php
    include "../session/verify.php";
    include "../../model/connection.php";
    
    $cedulaId = $_SESSION['CedulaId'];

    if (!isset($_SESSION['CedulaId'])) {
        echo json_encode(array('success' => false, 'message' => 'Cédula no identificada.'));
    } else {
        $query = "SELECT ID, Nombres, Apelli1, Apelli2 FROM familia WHERE CedulaId=" . $cedulaId;
        $result = mysqli_query($conn, $query);

        $output = array();
        foreach ($result as $row) {
            $id = $row['ID'];
            $nombre = $row['Nombres'] . " " . $row['Apelli1'] . " " . $row['Apelli2'];
            $output[] = array( 'id' => $id, 'nombre' => $nombre );
        }
        echo json_encode(array('success' => true, 'integrantes' => $output));

        mysqli_close($conn);
        exit();
    }
?>