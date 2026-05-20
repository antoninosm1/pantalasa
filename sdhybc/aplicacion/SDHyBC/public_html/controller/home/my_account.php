<?php
    include "../session/verify.php";
    include "../../model/connection.php";
    
    $id = $_SESSION['ID'];

    if (isset($_POST['home'])) {
        if ($_POST['home'] == 'account-update') {
            if (!isset($_POST['username'])) {
                echo json_encode(array('success' => false, 'title' => 'ERROR', 'message' => 'Definir nombre de usuario.'));
                exit();
            }
            if (!isset($_POST['lastname1'])) {
                echo json_encode(array('success' => false, 'title' => 'ERROR', 'message' => 'Definir primer apellido.'));
                exit();
            }
            if (!isset($_POST['lastname2'])) {
                echo json_encode(array('success' => false, 'title' => 'ERROR', 'message' => 'Definir segundo apellido.'));
                exit();
            }
            if (!isset($_POST['email'])) {
                echo json_encode(array('success' => false, 'title' => 'ERROR', 'message' => 'Definir correo electrónico.'));
                exit();
            }
            $username = $conn -> real_escape_string($_POST['username']);
            $lastname1 = $conn -> real_escape_string($_POST['lastname1']);
            $lastname2 = $conn -> real_escape_string($_POST['lastname2']);
            $email = $conn -> real_escape_string($_POST['email']);

            $query = "UPDATE usuarios SET Nombre = '" . $username . "', Apellido1 = '" . $lastname1 . "', Apellido2 = '" . $lastname2 . "', Correo = '" . $email . "' WHERE ID = " . $id;
            mysqli_query($conn, $query);
            mysqli_close($conn);
            $_SESSION['Nombre'] = $username;
            $_SESSION['Apellido1'] = $lastname1;
            $_SESSION['Apellido2'] = $lastname2;
            $_SESSION['Correo'] = $email;
            echo json_encode(array('success' => true, 'title' => 'INFORMACIÓN', 'message' => 'Los datos de la cuenta se actualizaron correctamente.'));
        } elseif ($_POST['home'] == 'password-update') {
            if (!isset($_POST['pass1']) && !isset($_POST['pass2'])) {
                echo json_encode(array('success' => false, 'title' => 'ERROR', 'message' => 'Definir contraseña.'));
                exit();
            }
            $pass1 = $conn -> real_escape_string($_POST['pass1']);
            $pass2 = $conn -> real_escape_string($_POST['pass2']);
            if ($pass1 != $pass2) {
                echo json_encode(array('success' => false, 'title' => 'ERROR', 'message' => 'Error en contraseña.'));
                exit();
            }
            if (strlen($pass1) < 8 || strlen($pass1) > 25) {
                echo json_encode(array('success' => false, 'title' => 'ERROR', 'message' => 'La contraseña debe tener entre 8 y 25 caracteres...'));
                exit();
            }
            $pass1 = sha1($pass1);
            $query = "UPDATE usuarios SET Password = '" . $pass1 . "' WHERE ID = " . $id;
            mysqli_query($conn, $query);
            mysqli_close($conn);
            echo json_encode(array('success' => true, 'title' => 'INFORMACIÓN', 'message' => 'Contraseña actualizada correctamente.'));
        }

    } else {
        echo json_encode(array('success' => false, 'title' => 'ERROR', 'message' => 'Nada.'));
        exit();
    }
?>