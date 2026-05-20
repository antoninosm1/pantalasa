<?php
    include "../session/verify.php";
    include "../../model/connection.php";
    
    require "../phpmailer/includes/PHPMailer.php";
    require "../phpmailer/includes/SMTP.php";
    require "../phpmailer/includes/Exception.php";
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    switch ($conn -> real_escape_string($_POST['action'])) {
        case 'update-table':
            update_table($conn -> real_escape_string($_POST['page']), "", "");
            break;
        case 'create-user':
            create_user();
            break;
        case 'get-user':
            get_user($conn -> real_escape_string($_POST['id']));
            break;
        case 'edit-user':
            edit_user();
            break;
        case 'delete-user':
            delete_user($conn -> real_escape_string($_POST['id']));
            break;
        default:
            echo json_encode(array('success' => false, 'title' => 'ERROR', 'message' => 'Solicitud no efectuada.'));
    }
    exit();
    
    function GenerateToken() {
        $permitted_characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($permitted_characters) . 
                str_shuffle($permitted_characters) . 
                str_shuffle($permitted_characters), 0, 100);
    }

    function SendGmail($receiver, $key) {
        $sent = true;
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Port = "587";
        $mail->Username = "ing.carlos.villalobos25@gmail.com";
        $mail->Password = "cuxpkrxzsqwfvkxf";
        $mail->Subject = "Activación de la cuenta";
        $mail->setFrom("ing.carlos.villalobos25@gmail.com");
        $mail->isHTML(true);
        $mail->Body = "<p>Se ha dado de alta una nueva cuenta con su correo electrónico, por favor ingrese al siguiente hipervinculo para activarla.</p>" .
        "<p>Link para <a href='https://www.sdhybc.org/controller/session/recovery.php?token=$key'>Activar mi cuenta</a></p>" .
        "<p>Por favor, NO responda a este correo electrónico.</p>" .
        "<p>Si tienes problemas para acceder al hipervínculo anterior, copia la siguiente URL y pégala en el navegador</p>" .
        "<p>https://www.sdhybc.org/controller/session/recovery.php?token=$key</p>" .
        "<p>Por favor, NO responda a este correo electrónico.</p>";
        $mail->addAddress($receiver);
        if(!($mail->Send())){
            $sent = false;
        }
        $mail->smtpClose();
        return $sent;
    }

    function update_table($page, $success, $message) {
        include "../../model/connection.php";
        $num_results_on_page = 50;
        $number_of_records = $conn -> query('SELECT COUNT(*) FROM usuarios') -> fetch_row()[0];
        $total_pages = ceil($number_of_records / $num_results_on_page);
        $calc_page = ($page - 1) * $num_results_on_page;
        $query = "SELECT ID, Nombre, Apellido1, Apellido2, Correo, Privilegios, MembresiaDesde, UltimoIngreso, NumeroCedulas FROM usuarios LIMIT " . $calc_page . "," . $num_results_on_page;
        $result = mysqli_query($conn, $query);
        $output = array();
        if ($result != null) {
            foreach ($result as $row) {
                $output[] = array('ID' => $row['ID'], 
                    'Nombre' => $row['Nombre'], 
                    'Apellido1' => $row['Apellido1'], 
                    'Apellido2' => $row['Apellido2'], 
                    'Correo' => $row['Correo'], 
                    'Privilegios' => $row['Privilegios'], 
                    'MembresiaDesde' => $row['MembresiaDesde'], 
                    'UltimoIngreso' => $row['UltimoIngreso'], 
                    'NumeroCedulas' => $row['NumeroCedulas']);
            }
        }
        mysqli_close($conn);
        echo json_encode(array('records' => $output, 'success' => $success, 'message' => $message));
        exit();
    }

    function create_user() {
        include "../../model/connection.php";
        $nombre = $conn -> real_escape_string($_POST['Nombre']);
        $apellido1 = $conn -> real_escape_string($_POST['Apellido1']);
        $apellido2 = $conn -> real_escape_string($_POST['Apellido2']);
        $correo = $conn -> real_escape_string($_POST['Correo']);
        $privilegios = $conn -> real_escape_string($_POST['Privilegios']);
        $desde = date('Y-m-d H:i:s', time());
        $token = GenerateToken();
        $tokenExpira = date('Y-m-d H:i:s', time() + (48 * 60 * 60));
        if (SendGmail($correo, $token) == true) {
            $query = "INSERT INTO usuarios (Nombre, Apellido1, Apellido2, Correo, Password, Privilegios, MembresiaDesde, Token, TokenExpira, NumeroCedulas) VALUES ('" . $nombre . "', '" . $apellido1 . "', '" . $apellido2 . "', '" . $correo . "', 'aaaaaaa', " . $privilegios . ", '" . $desde   . "', '" . $token . "', '" . $tokenExpira . "', 0)"; 
            mysqli_query($conn, $query);
            mysqli_close($conn);
            $success = true;
            $message = "Se envió un correo electrónico para la activación de la cuenta.";
        } else {
            $success = false;
            $message = 'No se logró enviar el correo electrónico, verifique que el EMAIL esté escrito correctamente.';
        }
        echo json_encode(array('success' => $success, 'message' => $message));
        exit();
    }

    function get_user($id) {
        include "../../model/connection.php";
        $query = "SELECT Nombre, Apellido1, Apellido2, Correo, Privilegios FROM usuarios WHERE ID=" . $id;
        $result = mysqli_query($conn, $query);
        $output = array();
        if ($result != null) {
            foreach ($result as $row) {
                $output[] = array('Nombre' => $row['Nombre'], 'Apellido1' => $row['Apellido1'], 'Apellido2' => $row['Apellido2'], 'Correo' => $row['Correo'], 'Privilegios' => $row['Privilegios']);
            }
        }
        mysqli_close($conn);
        echo json_encode(array('success' => true, 'ID' => $id, 'Nombre' => $output[0]['Nombre'], 'Apellido1' => $output[0]['Apellido1'], 'Apellido2' => $output[0]['Apellido2'], 'Correo' => $output[0]['Correo'], 'Privilegios' => $output[0]['Privilegios']));
        exit();
    }

    function edit_user() {
        include "../../model/connection.php";
        $id = $conn -> real_escape_string($_POST['id']);
        $nombre = $conn -> real_escape_string($_POST['Nombre']);
        $apellido1 = $conn -> real_escape_string($_POST['Apellido1']);
        $apellido2 = $conn -> real_escape_string($_POST['Apellido2']);
        $correo = $conn -> real_escape_string($_POST['Correo']);
        $privilegios = $conn -> real_escape_string($_POST['Privilegios']);        
        $query = "UPDATE usuarios SET Nombre='" . $nombre . "', Apellido1 = '" . $apellido1 . "', Apellido2 = '" . $apellido2 . "', Correo = '" . $correo . "', Privilegios = " . $privilegios . " WHERE ID = " . $id . ";";
        mysqli_query($conn, $query);
        mysqli_close($conn);
        echo json_encode(array('success' => true, 'message' => 'Usuario editado.'));
        exit();
    }

    function delete_user($id) {
        include "../../model/connection.php";
        $query = "DELETE FROM usuarios WHERE ID=" . $id;
        mysqli_query($conn, $query);
        mysqli_close($conn);
        echo json_encode(array('success' => true, 'message' => 'Usuario ' . $id . ' eliminado.'));
        exit();
    }
?>