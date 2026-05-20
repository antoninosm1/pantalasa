<?php
    include "../session/verify.php";
    include "../../model/connection.php";
    
    $id = $conn -> real_escape_string($_POST['integranteId']);

    $query = "DELETE FROM familia WHERE ID=" . $id;
    mysqli_query($conn, $query);
    mysqli_close($conn);
    echo json_encode(array('success' => true, 'id' => $id));
?>