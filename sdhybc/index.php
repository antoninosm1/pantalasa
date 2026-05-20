<?php
    session_start();
    if (isset($_SESSION['url'])) {
        header('Location: ' . $_SESSION['url']);
        exit();
    }
?>
<!DOCTYPE html>
<html lang="es_MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>SDHyBC</title>
</head>
<body>
    <main>
        <form class="form-login" id="form-login">
            <h4 class="form-title">LOGIN</h4>
            <input class="input-log" type="text" name="username" id="input-user" placeholder="USUARIO">
            <input class="input-log" type="password" name="pass" id="input-pass" placeholder="CONTRASEÑA">
            <input class="input-log button-log" type="button" value="ACCEDER" id="button-login">
            
            <a class="form-footer-link" id="account_recovery" href="account_recovery.html">Olvidé mi contraseña</a>
        </form>
    </main>
    
    <dialog class="modals-login" id="modal-login">
        <h4 class="modals-contents modals-text" id="modal-login-title"></h4>
        <p class="modals-contents modals-text" id="modal-login-description"></p>
        <form method="dialog">
            <input type="button" value="OK" class="input-log button-log modals-contents" id="modal-login-button-ok">
        </form>
    </dialog>

    <script src="js/login.js"></script>
</body>
</html>