<?php
    include "../session/verify.php";
    include "../../model/connection.php";

    if (!isset($_POST['num_mun'])) {
        echo json_encode(array('success' => false, 'message' => 'Error...'));
    }
    
    $num_mun = $conn -> real_escape_string($_POST['num_mun']);
    $query = "SELECT ID, localidad_nom, localidad_num FROM inegi WHERE (municipio_num='$num_mun')";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $array_result[] = $row;
        }
        echo json_encode(array('success' => true, 'message' => $array_result));
    }
    mysqli_free_result($result);
    mysqli_close($conn);
    
?>