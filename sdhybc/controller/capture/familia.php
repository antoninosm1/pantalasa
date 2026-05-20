<?php
    include "../session/verify.php";

    if (!isset($_SESSION['CedulaId'])) {
        echo json_encode(array('success' => false, 'message' => 'Cédula no identificada.'));
    } else {
        unset($_SESSION['CedulaId']);
        $_SESSION['url'] = "https://www.sdhybc.org/on/c_cedula.php";
        echo json_encode(array('success' => true));
    }
?>