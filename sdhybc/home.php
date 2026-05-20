<?php
    include "controller/session/verify.php";
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
                <p class='title-form-section form-margin-top-5px display-flex'>CÉDULAS CAPTURADAS
                <svg class='table-ced-refresh' id='table-ced-refresh' xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                </svg>
                </p>
                <table id='table-records'>
                    <thead>
                        <tr>
                            <td class='table-title'>ID</td>
                            <td class='table-title table-ced-acc' colspan="2">Acciones</td>
                            <?php
                            if ($_SESSION['Privilegios'] <= 2) {
                                echo "<td class='table-title table-ced-uId'>Registró</td>";
                            }
                            ?>
                            <td class='table-title table-ced-mun'>Municipio</td>
                            <td class='table-title table-ced-ced'>Cédula</td>
                            <td class='table-title table-ced-viv'>Vivienda</td>
                            <td class='table-title table-ced-gen'>General</td>
                            <td class='table-title table-ced-fam'>Familia</td>
                        </tr>
                    </thead>
                    <tbody id='table-records-body'>

<?php
    include "model/connection.php";

    $num_results_on_page = 20;
    if ($_SESSION['Privilegios'] <= 2) {
        $number_of_records = $conn -> query('SELECT COUNT(*) FROM cedula') -> fetch_row()[0];
    } else {
        $number_of_records = $conn -> query('SELECT COUNT(*) FROM cedula WHERE UsuarioId=' . $_SESSION['ID']) -> fetch_row()[0];
    }
    $total_pages = ceil($number_of_records / $num_results_on_page);

    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
    $page = $page <= 1 ? 1 : $page;
    $page = $page > $total_pages ? $total_pages : $page;

    if ($page - 1 >= 1){
        $arrow_back = "";
    } else {
        $arrow_back = "visibility:hidden;";
    }
    if ($page + 1 <= $total_pages){
        $arrow_next = "";
    } else {
        $arrow_next = "visibility:hidden;";
    }
?>

                    </tbody>
                </table>
                <div class='form-section-container form-home' id='pagination'>
                    <div class='pagination'>
                        <a id='page_backward' style='<?php echo $arrow_back; ?>' href="https://www.sdhybc.org/home.php?page=<?php echo $page - 1; ?>">
                            <svg class='image-table-arrows' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-caret-left-fill' viewBox='0 0 16 16'>
                                <path d='m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z'/>
                            </svg>
                        </a>
                        <p id='current_page'><?php echo $page . " - " . $total_pages; ?></p>
                        <a id='page_forward' style='<?php echo $arrow_next; ?>' href="https://www.sdhybc.org/home.php?page=<?php echo $page + 1; ?>">
                            <svg class='image-table-arrows' xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </main>
    <?php
        include_once 'sections/modals.php';
    ?>
    <script src="js/in_session/home.js"></script>
</body>
</html>