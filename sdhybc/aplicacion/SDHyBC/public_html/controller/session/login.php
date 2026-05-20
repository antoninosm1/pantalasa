<?php
    require "../../model/connection.php";

    if (isset($_POST['user']) && isset($_POST['pass']) && $_POST['pass'] != "") {
        $username = $conn -> real_escape_string($_POST['user']);
        $password = sha1($conn -> real_escape_string($_POST['pass']));
        $dt = $conn -> real_escape_string($_POST['dt']);
        $query = "SELECT ID, Nombre, Apellido1, Apellido2, Correo, Password, Privilegios FROM usuarios WHERE (Correo='$username' AND Password='$password')";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_array($result);
            if ($username == $row['Correo'] && $password == $row['Password']) {
                session_start();
                $_SESSION['ID'] = $row['ID'];
                $_SESSION['Nombre'] = $row['Nombre'];
                $_SESSION['Apellido1'] = $row['Apellido1'];
                $_SESSION['Apellido2'] = $row['Apellido2'];
                $_SESSION['Correo'] = $row['Correo'];
                $_SESSION['Privilegios'] = $row['Privilegios'];
                //PREIVILEGIOS
                //1 -> ADMINISTRADOR TOTAL
                //2 -> GESTOR
                //3 -> VISOR SIN RESTRICCIONES Y CAPTURISTA
                //4 -> CAPTURISTA
                $_SESSION['Usuario'] = $row['Nombre'] . " " . $row['Apellido1'] . " " . $row['Apellido2'];
                $_SESSION['url'] = "https://www.sdhybc.org/home.php";

                $query = "INSERT INTO usuarios_logs (UsuarioId, FechaHora, Log) VALUES (" . $row['ID'] . ", '$dt', 'LOGIN');";
                mysqli_query($conn, $query);
                
                $query = "UPDATE usuarios SET UltimoIngreso='" . $dt . "' WHERE ID=" . $row['ID'] . ";";

                mysqli_query($conn, $query);
                mysqli_free_result($result);
                mysqli_close($conn);

                echo json_encode(array('success' => true));
                exit();
            } else {
                echo json_encode(array('success' => false, 'message' => 'USUARIO y la CONTRASEÑA incorrectos.'));
            }
        } else {            
            echo json_encode(array('success' => false, 'message' => 'USUARIO y la CONTRASEÑA incorrectos.'));
        }
        mysqli_free_result($result);
        mysqli_close($conn);
    } else {
        echo json_encode(array('success' => false, 'message' => 'USUARIO y la CONTRASEÑA incorrectos.'));
    }
?>
