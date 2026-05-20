<?php
// LOGS    
    $contenidoNuevo = "ESTOY EN LOGIN PHP.";
    $archivo = 'mensajes.txt';
    $gestor = fopen($archivo, 'a');

    if ($gestor === false) {
        error_log("Error al abrir o crear el archivo '$archivo' para escritura.");
    } else {
        ini_set('error_log', $archivo);
        $resultado = fwrite($gestor, $contenidoNuevo . PHP_EOL);
        if ($resultado === false) {
            error_log("Error al escribir en el archivo '$archivo'.");
        } else {
            echo "El nuevo contenido se ha agregado al archivo.";
        }
        fclose($gestor); // Cerrar el archivo
    }
// CIERRA LOGS    

    require "../../model/connection.php";

    $contenidoNuevo = "ESTOY EN LOGIN PHP.";

// LOGS    


    $archivo = 'mensajes.txt';
    $gestor = fopen($archivo, 'a');
    
    if ($gestor === false) {
        error_log("Error al abrir o crear el archivo '$archivo' para escritura.");
    } else {
        ini_set('error_log', $archivo);
        $resultado = fwrite($gestor, $contenidoNuevo . PHP_EOL);
        if ($resultado === false) {
            error_log("Error al escribir en el archivo '$archivo'.");
        } else {
            echo "El nuevo contenido se ha agregado al archivo.";
        }
        fclose($gestor); // Cerrar el archivo
    }
// LOGS    
    if (isset($_POST['user']) && isset($_POST['pass']) && $_POST['pass'] != "") {

        $username = $conn -> real_escape_string($_POST['user']);

        $password = sha1($conn -> real_escape_string($_POST['pass']));

        $dt = $conn -> real_escape_string($_POST['dt']);

        $query = "SELECT ID, Nombre, Apellido1, Apellido2, Correo, Password, Privilegios FROM usuarios WHERE (Correo='$username' AND Password='$password')";

        $result = mysqli_query($conn, $query);

        

        if (mysqli_num_rows($result)) {


            $contenidoNuevo = "HUBO RESULTADO.";
            $archivo = 'mensajes.txt';
            $gestor = fopen($archivo, 'a');
            
            if ($gestor === false) {
                error_log("Error al abrir o crear el archivo '$archivo' para escritura.");
            } else {
                ini_set('error_log', $archivo);
                $resultado = fwrite($gestor, $contenidoNuevo . PHP_EOL);
                if ($resultado === false) {
                    error_log("Error al escribir en el archivo '$archivo'.");
                } else {
                    echo "El nuevo contenido se ha agregado al archivo.";
                }
                fclose($gestor); // Cerrar el archivo
            }

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

                //4 -> VISOR DE RESUMEN

                //5 -> SIN ACCESO



                if($_SESSION['Privilegios'] == 5){

                    echo json_encode(array('success' => true, 'message' => 'USUARIO y la CONTRASEÑA incorrectos.'));

                    exit();

                }else{

                    if($_SESSION['Privilegios'] == 4){

//                        $_SESSION['url'] = "https://www.sdhybc.org/resume.php";
                        $_SESSION['url'] = "http://localhost/pantalasa/sdhybc/resume.php";

                    } else {

//                        $_SESSION['url'] = "https://www.sdhybc.org/home.php";
                        $_SESSION['url'] = "http://localhost/pantalasa/sdhybc/home.php";

                    }

                    $query = "INSERT INTO usuarios_logs (UsuarioId, FechaHora, Log) VALUES (" . $row['ID'] . ", '$dt', 'LOGIN');";

                    mysqli_query($conn, $query);

                    $query = "UPDATE usuarios SET UltimoIngreso='" . $dt . "' WHERE ID=" . $row['ID'] . ";";

                    mysqli_query($conn, $query);

                    mysqli_free_result($result);

                    mysqli_close($conn);



                    $_SESSION['Usuario'] = $row['Nombre'] . " " . $row['Apellido1'] . " " . $row['Apellido2'];

                    echo json_encode(array('success' => true, 'url' => $_SESSION['url']));

                    exit();

                }

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

