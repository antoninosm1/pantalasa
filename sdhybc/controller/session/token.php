<?php
    include "../../model/connection.php";

    require "../phpmailer/includes/PHPMailer.php";
    require "../phpmailer/includes/SMTP.php";
    require "../phpmailer/includes/Exception.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

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
        $mail->Subject = "Recuperando cuenta";
        $mail->setFrom("ing.carlos.villalobos25@gmail.com");
        $mail->isHTML(true);
        $mail->Body = "<p>Para recuperar su cuenta ingrese al siguiente hipervínculo.</p>" .
        "<p>Link de <a href='https://www.sdhybc.org/controller/session/recovery.php?token=$key'>recuperación de mi cuenta</a></p>" .
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


    if (!isset($_POST['user'])) {
        echo json_encode(array('success' => false, 'message' => 'No se encontró USUARIO.'));
    }

    $email = $conn -> real_escape_string($_POST['user']);
    $query = "SELECT ID, Correo FROM usuarios WHERE Correo = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        if ($email == $row['Correo']) {
            $token = GenerateToken();
            $tokenexpiration = date('Y-m-d H:i:s', time() + (1 * 60 * 60));
            if (SendGmail($email, $token) == true) {
                $id = $row['ID'];
                $query = "UPDATE usuarios SET Token = '$token', TokenExpira = '$tokenexpiration' WHERE ID = $id";
                mysqli_query($conn, $query);
                $success = true;
                $message = "Se envió un correo de recuperación de cuenta.";
            } else {
                $success = false;
                $message = 'No se logró enviar EMAIL.';
            }
        } else {
            $success = false;
            $message = 'No se encontró USUARIO.';
        }
    } else {
        $success = false;
        $message = 'No se encontró USUARIO.';
    }
    
    mysqli_free_result($result);
    mysqli_close($conn);
    echo json_encode(array('success' => $success, 'message' => $message));
?>