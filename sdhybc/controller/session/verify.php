<?php
    session_start();
    
    if((isset($_SESSION['Privilegios']) == true ? ($_SESSION['Privilegios'] >= 5 ? true : false) : true)) {
        session_unset();
        session_destroy();
        header('Location: https://www.sdhybc.org/index.php');
    }
    
?>