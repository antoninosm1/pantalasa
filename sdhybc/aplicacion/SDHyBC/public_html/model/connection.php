<?php
    $HOST = "localhost";
    $USERDB = "uyjjg45e2gxu3";
    $PASSDB = "Delicias@Chihuahua1Mexico";
    $DATABASE = "db6grkj7w2ygmv";

    $conn = mysqli_connect($HOST, $USERDB, $PASSDB, $DATABASE);
    if($conn -> connect_errno){
        echo json_encode(array('ERROR' => $conn -> connect_error));
        exit();
    }
?>