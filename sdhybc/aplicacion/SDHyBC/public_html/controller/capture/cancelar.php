<?php
    include "../session/verify.php";

    if (isset($_SESSION['CedulaId'])) {
        unset($_SESSION['CedulaId']);
    }
    
    $_SESSION['url'] = "https://www.sdhybc.org/home.php";
    echo json_encode(array('success' => true));
?>