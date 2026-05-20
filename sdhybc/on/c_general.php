<?php
    include "../controller/session/verify.php";

    if (isset($_SESSION['CedulaId'])) {
        include "../model/connection.php";
        $query = "SELECT PueIndTara, PueIndTepe, PueIndWuar, PueIndPima, PueIndMeno, PueIndOtro, DerechINSABI, DerechIMSS, DerechISSSTE, DerechPEMEX, DerechSEDENA, DerechOtro, NumPerros, NumGatos, NumOtros, SisSalINSABI, SisSalIMSS, SisSalISSSTE, SisSalPEMEX, SisSalSEDENA, SisSalOtro, SisSalMedPar, SisSalCliPar, SisSalParter, SisSalCurand, SisSalYerber, SisSalHueser, SisSalBotica, Comentario FROM cedula WHERE ID = " . $_SESSION['CedulaId'];
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_array($result);
            $puin_tara = $row['PueIndTara'] == 1 ? 'checked' : '';
            $puin_tepe = $row['PueIndTepe'] == 1 ? 'checked' : '';
            $puin_wuar = $row['PueIndWuar'] == 1 ? 'checked' : '';
            $puin_pima = $row['PueIndPima'] == 1 ? 'checked' : '';
            $puin_meno = $row['PueIndMeno'] == 1 ? 'checked' : '';
            $puin_otro = $row['PueIndOtro'] == 1 ? 'checked' : '';
            $der_INSA = $row['DerechINSABI'] == 1 ? 'checked' : '';
            $der_IMSS = $row['DerechIMSS'] == 1 ? 'checked' : '';
            $der_ISSS = $row['DerechISSSTE'] == 1 ? 'checked' : '';
            $der_PEME = $row['DerechPEMEX'] == 1 ? 'checked' : '';
            $der_SEDE = $row['DerechSEDENA'] == 1 ? 'checked' : '';
            $der_otro = $row['DerechOtro'] == 1 ? 'checked' : '';
            $num_pe = $row['NumPerros'];
            $num_ga = $row['NumGatos'];
            $num_ot = $row['NumOtros'];
            $si_INSA = $row['SisSalINSABI'] == 1 ? 'checked' : '';
            $si_IMSS = $row['SisSalIMSS'] == 1 ? 'checked' : '';
            $si_ISSS = $row['SisSalISSSTE'] == 1 ? 'checked' : '';
            $si_PEME = $row['SisSalPEMEX'] == 1 ? 'checked' : '';
            $si_SEDE = $row['SisSalSEDENA'] == 1 ? 'checked' : '';
            $si_Otro = $row['SisSalOtro'] == 1 ? 'checked' : '';
            $si_Medi = $row['SisSalMedPar'] == 1 ? 'checked' : '';
            $si_Clin = $row['SisSalCliPar'] == 1 ? 'checked' : '';
            $si_Part = $row['SisSalParter'] == 1 ? 'checked' : '';
            $si_Cura = $row['SisSalCurand'] == 1 ? 'checked' : '';
            $si_Yerb = $row['SisSalYerber'] == 1 ? 'checked' : '';
            $si_Hues = $row['SisSalHueser'] == 1 ? 'checked' : '';
            $si_Boti = $row['SisSalBotica'] == 1 ? 'checked' : '';
            $coment = $row['Comentario'];
            mysqli_query($conn, $query);
            mysqli_free_result($result);
            mysqli_close($conn);
        }
    } else {
        $puin_tara = '';
        $puin_tepe = '';
        $puin_wuar = '';
        $puin_pima = '';
        $puin_meno = '';
        $puin_otro = '';
        $der_INSA = '';
        $der_IMSS = '';
        $der_ISSS = '';
        $der_PEME = '';
        $der_SEDE = '';
        $der_otro = '';
        $num_pe = 0;
        $num_ga = 0;
        $num_ot = 0;
        $si_INSA = '';
        $si_IMSS = '';
        $si_ISSS = '';
        $si_PEME = '';
        $si_SEDE = '';
        $si_Otro = '';
        $si_Medi = '';
        $si_Clin = '';
        $si_Part = '';
        $si_Cura = '';
        $si_Yerb = '';
        $si_Hues = '';
        $si_Boti = '';
        $coment = '';
    }
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
            include '../sections/main_menu.php';
        ?>
        
        <div class='main-sections-container'>
            <div class='form-section-container' id='grid-PueInd'>
                <p class='title-form-section form-margin-top-5px'>¿PERTENECE A ALGÚN PUEBLO INDIGENA?</p>
                <form>
                    <div class='input-section-horizontal form-margin-bottom-10px'>
                        <input id='PueIndTarahumara' type='checkbox' <?php echo $puin_tara; ?>>
                        <label for='PueIndTarahumara' class='input-section-label'>Tarahumara</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-10px'>
                        <input id='PueIndTepehuan' type='checkbox' <?php echo $puin_tepe; ?>>
                        <label for='PueIndTepehuan' class='input-section-label'>Tepehuan</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-10px'>
                        <input id='PueIndWuarojio' type='checkbox' <?php echo $puin_wuar; ?>>
                        <label for='PueIndWuarojio' class='input-section-label'>Wuarojio</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-10px'>
                        <input id='PueIndPima' type='checkbox' <?php echo $puin_pima; ?>>
                        <label for='PueIndPima' class='input-section-label'>Pima</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-10px'>
                        <input id='PueIndMenonita' type='checkbox' <?php echo $puin_meno; ?>>
                        <label for='PueIndMenonita' class='input-section-label'>Menonita</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-10px'>
                        <input id='PueIndOtro' type='checkbox' <?php echo $puin_otro; ?>>
                        <label for='PueIndOtro' class='input-section-label'>Otro</label>
                    </div>
                </form>
            </div>

            <div class='form-section-container' id='grid-Dere'>
                <p class='title-form-section form-margin-top-5px'>DERECHOHABIENCIA</p>
                <form>
                    <div class='input-section-horizontal form-margin-bottom-10px'>
                        <input id='DereINSABI' type='checkbox' <?php echo $der_INSA; ?>>
                        <label for='DereINSABI' class='input-section-label'>INSABI</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-10px'>
                        <input id='DereIMSS' type='checkbox' <?php echo $der_IMSS; ?>>
                        <label for='DereIMSS' class='input-section-label'>IMSS</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-10px'>
                        <input id='DereISSSTE' type='checkbox' <?php echo $der_ISSS; ?>>
                        <label for='DereISSSTE' class='input-section-label'>ISSSTE</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-10px'>
                        <input id='DerePEMEX' type='checkbox' <?php echo $der_PEME; ?>>
                        <label for='DerePEMEX' class='input-section-label'>PEMEX</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-10px'>
                        <input id='DereSEDENA' type='checkbox' <?php echo $der_SEDE; ?>>
                        <label for='DereSEDENA' class='input-section-label'>SEDENA</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-10px'>
                        <input id='DereOtro' type='checkbox' <?php echo $der_otro; ?>>
                        <label for='DereOtro' class='input-section-label'>Otro</label>
                    </div>
                </form>
            </div>

            <div class='form-section-container' id='grid-Masc'>
                <p class='title-form-section form-margin-top-5px'>MASCOTAS</p>
                <form>
                    <div class='input-section-horizontal'>
                        <label for='MascotasPerros' class='single-input-form-section form-margin-bottom-5px'>Número de Perros</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <input class='single-input-form-section input-text' id='MascotasPerros' type='number' min='0' value='<?php echo $num_pe; ?>'>
                    </div>
                    <div class='input-section-horizontal'>
                        <label for='MascotasGatos' class='single-input-form-section form-margin-bottom-5px'>Número de Gatos</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <input class='single-input-form-section input-text' id='MascotasGatos' type='number' min='0' value='<?php echo $num_ga; ?>'>
                    </div>
                    <div class='input-section-horizontal'>
                        <label for='MascotasOtros' class='single-input-form-section form-margin-bottom-5px'>Número de  Otros</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <input class='single-input-form-section input-text' id='MascotasOtros' type='number' min='0' value='<?php echo $num_ot; ?>'>
                    </div>
                </form>
            </div>

            <div class='form-section-container' id='grid-SiSal'>
                <p class='title-form-section form-margin-top-5px'>¿UTILIZA ALGÚN SISTEMA DE SALUD?</p>
                <form>
                    <p class='form-margin-top-5px'>OFICIALES</p>
                    <div class='input-section-horizontal form-margin-bottom-0px form-margin-top-5px'>
                        <input id='SiSalINSABI' type='checkbox' <?php echo $si_INSA; ?>>
                        <label for='SiSalINSABI' class='input-section-label'>INSABI</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-0px form-margin-top-5px'>
                        <input id='SiSalIMSS' type='checkbox' <?php echo $si_IMSS; ?>>
                        <label for='SiSalIMSS' class='input-section-label'>IMSS</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-0px form-margin-top-5px'>
                        <input id='SiSalISSSTE' type='checkbox' <?php echo $si_ISSS; ?>>
                        <label for='SiSalISSSTE' class='input-section-label'>ISSSTE</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-0px form-margin-top-5px'>
                        <input id='SiSalPEMEX' type='checkbox' <?php echo $si_PEME; ?>>
                        <label for='SiSalPEMEX' class='input-section-label'>PEMEX</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-0px form-margin-top-5px'>
                        <input id='SiSalSEDENA' type='checkbox' <?php echo $si_SEDE; ?>>
                        <label for='SiSalSEDENA' class='input-section-label'>SEDENA</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-0px form-margin-top-5px'>
                        <input id='SiSalOtro' type='checkbox' <?php echo $si_Otro; ?>>
                        <label for='SiSalOtro' class='input-section-label'>Otro</label>
                    </div>
                    <p class='form-margin-top-5px'>PRIVADOS</p>
                    <div class='input-section-horizontal form-margin-bottom-0px form-margin-top-5px'>
                        <input id='SiSalMedico' type='checkbox' <?php echo $si_Medi; ?>>
                        <label for='SiSalMedico' class='input-section-label'>Médico Particular</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-0px form-margin-top-5px'>
                        <input id='SiSalClinica' type='checkbox' <?php echo $si_Clin; ?>>
                        <label for='SiSalClinica' class='input-section-label'>Clínica Particular</label>
                    </div>
                    <p class='form-margin-top-5px'>TRADICIONALES</p>
                    <div class='input-section-horizontal form-margin-bottom-0px form-margin-top-5px'>
                        <input id='SiSalPartera' type='checkbox' <?php echo $si_Part; ?>>
                        <label for='SiSalPartera' class='input-section-label'>Partera</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-0px form-margin-top-5px'>
                        <input id='SiSalCurandera' type='checkbox' <?php echo $si_Cura; ?>>
                        <label for='SiSalCurandera' class='input-section-label'>Curandera</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-0px form-margin-top-5px'>
                        <input id='SiSalYerbero' type='checkbox' <?php echo $si_Yerb; ?>>
                        <label for='SiSalYerbero' class='input-section-label'>Yerbero</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-0px form-margin-top-5px'>
                        <input id='SiSalHuesero' type='checkbox' <?php echo $si_Hues; ?>>
                        <label for='SiSalHuesero' class='input-section-label'>Huesero</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-0px form-margin-top-5px'>
                        <input id='SiSalBoticario' type='checkbox' <?php echo $si_Boti; ?>>
                        <label for='SiSalBoticario' class='input-section-label'>Boticario</label>
                    </div>
                </form>
            </div>

            <div class='form-section-container' id='grid-Coment'>
                <p class='title-form-section form-margin-top-5px'>COMENTARIO</p>
                <form>
                    <textarea class='form-input-text-comment' id='Comentario'><?php echo $coment; ?></textarea>
                </form>
            </div>

            <div class='form-section-container' id='grid-Buttons'>
                <div>
                    <p class='simple-paragraph font-weight-bold form-margin-top-5px'>CÉDULA</p>
                    <p class='simple-paragraph'>
                        <?php 
                            if (isset($_SESSION['CedulaId'])) {
                                echo $_SESSION['CedulaId'];
                            } else {
                                echo "-";
                            }
                            
                        ?>
                    </p>
                </div>
                <form>
                    <div class='input-section-horizontal'>
                        <input type='button' class='single-input-form-section input-button form-margin-top-20px form-margin-bottom-20px' id='button-general-siguiente' value='SIGUIENTE'>
                    </div>
                    <div class='input-section-horizontal'>
                        <input type='button' class='single-input-form-section input-button form-margin-top-40px form-margin-bottom-20px' id='button-general-limpiar-campos' value='LIMPIAR CAMPOS'>
                    </div>
                    <div class='input-section-horizontal'>
                        <input type='button' class='single-input-form-section input-button form-margin-top-20px form-margin-bottom-20px' id='button-general-anterior' value='ANTERIOR'>
                    </div>
                    <div class='input-section-horizontal'>
                        <input type='button' class='single-input-form-section input-button form-margin-top-20px form-margin-bottom-20px' id='button-general-cancelar-captura' value='CANCELAR CAPTURA'>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php
        include_once '../sections/modals.php';
    ?>
    <script src="../js/cedulas/general.js"></script>
</body>
</html>