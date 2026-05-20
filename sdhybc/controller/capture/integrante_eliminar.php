<?php
    include "../session/verify.php";
    include "../../model/connection.php";
    
    $id = $conn -> real_escape_string($_POST['integranteId']);

    $query = "DELETE FROM familia WHERE ID=" . $id;
    mysqli_query($conn, $query);
    
    $n = $conn -> query("SELECT COUNT(ID) FROM familia WHERE CedulaId = {$_SESSION['CedulaId']};") -> fetch_row()[0];
    mysqli_query($conn, "UPDATE cedula SET NumInteg = $n WHERE ID = {$_SESSION['CedulaId']};");

    mysqli_close($conn);
    echo json_encode(array('success' => true, 'id' => $id));
?>