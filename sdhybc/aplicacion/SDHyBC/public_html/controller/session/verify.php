<?php
    session_start();
    
    if(!isset($_SESSION['Privilegios'])) {
        session_unset();
        session_destroy();
        header('Location: https://www.sdhybc.org/index.php');
    }
    
?>