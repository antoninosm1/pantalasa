<?php
    session_start();
    if(!isset($_SESSION['ID'])) {
        session_destroy();
        header('location:../../index.php');
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
        <form class="form-login" id="form-change">
            <h4 class="form-title">RECUPERAR CUENTA</h4>
            <p id='form-recovery-paragraph'><?php echo $_SESSION['Usuario'] ?>,<br> ingresa la nueva contraseña.</p>
            <input class="input-log" type="password" name="pass-1" id="input-pass-1" placeholder="NUEVA CONTRASEÑA">
            <input class="input-log" type="password" name="pass-2" id="input-pass-2" placeholder="CONFIRMAR CONTRASEÑA">
            <input class="input-log button-log" type="button" value="CONFIRMAR" id="button-change-pass">
        </form>
    </main>
    
    <dialog class="modals-login" id="modal-recovery">
        <h4 class="modals-contents modals-text" id="modal-recovery-title"></h4>
        <p class="modals-contents modals-text" id="modal-recovery-description"></p>
        <form method="dialog">
            <input type="button" value="OK" class="input-log button-log modals-contents" id="modal-recovery-button-ok">
        </form>
    </dialog>

    
    <script src="js/recovery.js"></script>
</body>
</html>