<?php
    include "controller/session/verify.php";
?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/log.css">
    <link rel="stylesheet" href="../css/modals.css">
    <title>SDHyBC</title>
</head>
<body>
    <main>
        <?php
            include 'sections/main_menu.php';
        ?>
        
        <div class='main-sections-container'>

            <div class='form-section-container form-home'>
                <p class='title-form-section form-margin-top-5px'>DATOS DE LA CUENTA</p>
                <form>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section form-margin-bottom-0px' for='account-input-name'>NOMBRE</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <input class='single-input-form-section input-text' type='text' id='account-input-name' value=<?php echo $_SESSION['Nombre']; ?>>
                    </div>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section form-margin-bottom-0px' for='account-input-lastname1'>PRIMER APELLIDO</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <input class='single-input-form-section input-text' type='text' id='account-input-lastname1' value=<?php echo $_SESSION['Apellido1']; ?>>
                    </div>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section form-margin-bottom-0px' for='account-input-lastname2'>SEGUNDO APELLIDO</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <input class='single-input-form-section input-text' type='text' id='account-input-lastname2' value=<?php echo $_SESSION['Apellido2']; ?>>
                    </div>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section form-margin-bottom-0px' for='account-input-email'>CORREO</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <input class='single-input-form-section input-text' type='email' id='account-input-email' value=<?php echo $_SESSION['Correo']; ?>>
                    </div>
                    <div class='input-section-horizontal'>
                        <input type='button' class='single-input-form-section input-button form-margin-top-20px form-margin-bottom-40px' id='button-account-update' value='ACTUALIZAR'>
                    </div>

                    
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section form-margin-bottom-0px' for='account-input-pass1'>INGRESE CONTRASEÑA</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <input class='single-input-form-section input-text' type='password' id='account-input-pass1'>
                    </div>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section form-margin-bottom-0px' for='account-input-pass2'>CONFIRMAR CONTRASEÑA</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <input class='single-input-form-section input-text' type='password' id='account-input-pass2'>
                    </div>
                    <div class='input-section-horizontal'>
                        <input type='button' class='single-input-form-section input-button form-margin-top-20px form-margin-bottom-40px' id='button-account-pass' value='ACTUALIZAR'>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php
        include_once 'sections/modals.php';
    ?>
    <script src="js/in_session/my_account.js"></script>
</body>
</html>