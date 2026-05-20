<?php
    include "../session/verify.php";

    if (isset($_SESSION['CedulaId'])) {
        unset($_SESSION['CedulaId']);
    }
    if (isset($_SESSION['ContCapt'])) {
        unset($_SESSION['ContCapt']);
    }
    
    $_SESSION['url'] = "https://www.sdhybc.org/home.php";
    echo json_encode(array('success' => true));
?>