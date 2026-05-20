<?php
    include "controller/session/verify.php";
    if ($_SESSION['Privilegios'] > 2) {
        header('location:https://www.sdhybc.org/home.php');
    }
?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/log.css">
    <link rel="stylesheet" href="css/modals.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <title>SDHyBC</title>
</head>
<body>
    <main>
        <?php
            include 'sections/main_menu.php';
        ?>
        
        <div class='main-sections-container'>

            <div class='form-section-container form-home'>
                <p class='title-form-section form-margin-top-5px display-flex'>USUARIOS REGISTRADOS
                    <svg class='table-use-refresh' id='table-user-add' xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                        <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                    </svg>
                </p>
                <table id='table-records'>
                    <thead>
                        <tr>
                            <td class='table-title'>ID</td>
                            <td class='table-title table-use-acc' colspan="2">Acciones</td>
                            <td class='table-title table-use-nom'>Nombre</td>
                            <td class='table-title table-use-ap1'>Primer Apellido</td>
                            <td class='table-title table-use-ap2'>Segundo Apellido</td>
                            <td class='table-title table-use-cor'>Correo</td>
                            <td class='table-title table-use-nac'>Nivel de Acceso</td>
                            <td class='table-title table-use-mid'>Miembro Desde</td>
                            <td class='table-title table-use-uin'>Último Ingreso</td>
                            <td class='table-title table-use-cec'>Cédulas Capturadas</td>
                        </tr>
                    </thead>
                    <tbody id='table-records-body'></tbody>
                </table>
                <br>
            </div>
        </div>
    </main>
    <?php
        include_once 'sections/modals.php';
    ?>
    <script src="js/in_session/users.js"></script>
</body>
</html>