<?php
    include "../controller/session/verify.php";
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
            include 'main_menu.php';
        ?>
        
        <div class='main-sections-container'>

            <div class='form-section-container form-home'>
                <p class='title-form-section form-margin-top-5px'>CÉDULAS CAPTURADAS</p>
                <table id='table-records'>
                    <thead>
                        <tr>
                            <td class='table-title'>ID</td>
                            <td class='table-title' colspan="3">Acciones</td>
                            <td class='table-title'>Registró</td>
                            <td class='table-title'>Municipio</td>
                            <td class='table-title'>Registro Cédula</td>
                            <td class='table-title'>Registro Vivienda</td>
                            <td class='table-title'>Registro General</td>
                        </tr>
                    </thead>
                    <tbody id='table-records-body'></tbody>
                </table>
                <div class='form-section-container form-home' id='pagination'>
                    <div class='pagination'>
                        <a id='page_backward'><</a>
                        <p id='current_page'></p>
                        <a id='page_forward'>></a>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </main>
    <?php
        include_once 'modals.php';
    ?>
    <script src="../js/home/records.js"></script>
</body>
</html>