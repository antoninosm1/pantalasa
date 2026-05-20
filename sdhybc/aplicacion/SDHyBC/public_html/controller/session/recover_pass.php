<?php
    session_start();
    if (!isset($_SESSION['Privilegios'])) {
        session_destroy();
        header("location:../../index.php");
    }

    if (!isset($_POST['p1']) && !isset($_POST['p2'])) {
        echo json_encode(array('success' => false, 'message' => 'Definir contraseña.'));
        exit();
    }
    if ($_POST['p1'] != $_POST['p2']) {
        echo json_encode(array('success' => false, 'message' => 'Error en contraseña.'));
        exit();
    }

    require '../../model/connection.php';

    if (strlen($_POST['p1']) < 8 || strlen($_POST['p1']) > 25) {
        echo json_encode(array('success' => false, 'message' => 'La contraseña debe tener entre 8 y 25 caracteres...'));
        exit();
    }

    $pass = sha1($conn -> real_escape_string($_POST['p1']));

    $id = $_SESSION['ID'];
    $query = "UPDATE usuarios SET Password = '$pass' WHERE ID = $id";
    mysqli_query($conn, $query);
    echo json_encode(array('success' => true, 'message' => 'Hecho...'));

?>
