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
                            if ($_SESSION['Privilegios'] <= 3) {
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
    if ($_SESSION['Privilegios'] <= 3) {
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

    $calc_page = ($page - 1) * $num_results_on_page;

    if ($_SESSION['Privilegios'] <= 3) {
        $query = "SELECT ID, UsuarioId, MunicipioNom, FecRegCed, FecRegViv, FecRegGen FROM cedula ORDER BY ID DESC LIMIT " . $calc_page . "," . $num_results_on_page;
    } else {
        $query = "SELECT ID, UsuarioId, MunicipioNom, FecRegCed, FecRegViv, FecRegGen FROM cedula WHERE UsuarioId=" . $_SESSION['ID'] . " ORDER BY ID DESC LIMIT " . $calc_page . "," . $num_results_on_page;
    }
    
    $result = mysqli_query($conn, $query);

    $output = array();
        if ($result != null) {
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td class='table-ced-acc'><svg class='image-menu-table' onclick=edit_record(" . $row['ID'] . ") xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'><path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/><path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/></svg></td>";
            echo "<td class='table-ced-acc'><svg class='image-menu-table' onclick=delete_record(" . $row['ID'] . ") xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'><path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z'/></svg></td>";
            if ($_SESSION['Privilegios'] <= 3) {
                echo "<td class='table-ced-uId'><a class='table-links' onclick='return show_user(" . $row['UsuarioId'] . ")'>" . $row['UsuarioId'] . "</a></td>";
            }
            echo "<td class='table-ced-mun'>" . $row['MunicipioNom'] . "</td>";
            echo "<td class='table-ced-ced'><a class='table-links' onclick='return show_ced(" . $row['ID'] . ")'>" . $row['FecRegCed'] . "</a></td>";
            echo "<td class='table-ced-viv'><a class='table-links' onclick='return show_viv(" . $row['ID'] . ")'>" . $row['FecRegViv'] . "</a></td>";
            echo "<td class='table-ced-gen'><a class='table-links' onclick='return show_gen(" . $row['ID'] . ")'>" . $row['FecRegGen'] . "</a></td>";
            echo "</tr>";
        }
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