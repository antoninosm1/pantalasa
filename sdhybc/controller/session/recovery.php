<?php
    include "../../model/connection.php";

    if (isset($_GET['token'])) {
        $token = $conn ->real_escape_string($_GET['token']);
        $query = "SELECT ID, Nombre, Apellido1, Apellido2, Correo, Privilegios, TokenExpira FROM usuarios WHERE Token = '$token'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_array($result);
            $expirationTime = date('Y-m-d H:i:s', strtotime($row['TokenExpira']));
            if ($expirationTime > date('Y-m-d H:i:s', time())) {
                session_start();
                $_SESSION['ID'] = $row['ID'];
                $_SESSION['Nombre'] = $row['Nombre'];
                $_SESSION['Apellido1'] = $row['Apellido1'];
                $_SESSION['Apellido2'] = $row['Apellido2'];
                $_SESSION['Correo'] = $row['Correo'];
                $_SESSION['Privilegios'] = $row['Privilegios'];
                $_SESSION['Usuario'] = $row['Nombre'] . " " . $row['Apellido1'] . " " . $row['Apellido2'];
                $_SESSION['url'] = "https://www.sdhybc.org/home.php";

                header("location:../../recovery.php");
                exit();
            }
        }
    }
    header("location:../../index.php");
    exit();
?>