<?php
    include "../controller/session/verify.php";
    
    $unidad = "";
    $asistente_social = "";
    $municipio_num = "";
    $municipio_nom = "";
    $localidad_num = "";
    $localidad_nom = "";
    $tipo_localidad = "ND";
    $sede_vm = "0";
    $sede_vk = "0";
    $sede_pm = "0";
    $sede_pk = "0";
    $subsede_vm = "0";
    $subsede_vk = "0";
    $subsede_pm = "0";
    $subsede_pk = "0";

    if (isset($_SESSION['CedulaId'])) {
        include "../model/connection.php";
        $query = "SELECT MunicipioNum, MunicipioNom, LocalidadNum, LocalidadNom, Unidad, AsistSoc, TipoLoc, SedeVm, SedeVk, SedePm, SedePk, SubsVm, SubsVk, SubsPm, SubsPk FROM cedula WHERE ID = " . $_SESSION['CedulaId'];
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_array($result);
            $unidad = $row['Unidad'];
            $asistente_social = $row['AsistSoc'];
            $municipio_num = $row['MunicipioNum'];
            $municipio_nom = $row['MunicipioNom'];
            $localidad_num = $row['LocalidadNum'];
            $localidad_nom = $row['LocalidadNom'];
            $tipo_localidad = $row['TipoLoc'];
            $sede_vm = $row['SedeVm'];
            $sede_vk = $row['SedeVk'];
            $sede_pm = $row['SedePm'];
            $sede_pk = $row['SedePk'];
            $subsede_vm = $row['SubsVm'];
            $subsede_vk = $row['SubsVk'];
            $subsede_pm = $row['SubsPm'];
            $subsede_pk = $row['SubsPk'];

            mysqli_query($conn, $query);
            mysqli_free_result($result);
            mysqli_close($conn);
        }
    } elseif (isset($_SESSION['ContCapt'])) {
        include "../model/connection.php";
        $query = "SELECT MunicipioNum, MunicipioNom, LocalidadNum, LocalidadNom, Unidad, AsistSoc, TipoLoc, SedeVm, SedeVk, SedePm, SedePk, SubsVm, SubsVk, SubsPm, SubsPk FROM cedula WHERE ID = " . $_SESSION['ContCapt'] . ";";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_array($result);
            $unidad = $row['Unidad'];
            $asistente_social = $row['AsistSoc'];
            $municipio_num = $row['MunicipioNum'];
            $municipio_nom = $row['MunicipioNom'];
            $localidad_num = $row['LocalidadNum'];
            $localidad_nom = $row['LocalidadNom'];
            $tipo_localidad = $row['TipoLoc'];
            $sede_vm = $row['SedeVm'];
            $sede_vk = $row['SedeVk'];
            $sede_pm = $row['SedePm'];
            $sede_pk = $row['SedePk'];
            $subsede_vm = $row['SubsVm'];
            $subsede_vk = $row['SubsVk'];
            $subsede_pm = $row['SubsPm'];
            $subsede_pk = $row['SubsPk'];
            
            mysqli_query($conn, $query);
            mysqli_free_result($result);
            mysqli_close($conn);
        }
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

            <div class='form-section-container'>
                <p class='title-form-section form-margin-top-5px'>CAPTURA</p>
                <form>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section form-margin-bottom-0px' for='input-unidad'>UNIDAD</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <input class='single-input-form-section input-text' type='text' id='cedula-input-unidad' value='<?php echo $unidad; ?>'>
                    </div>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section form-margin-bottom-0px' for='input-asistente'>ASISTENTE SOCIAL</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <input class='single-input-form-section input-text' type='text' id='cedula-input-asistente' value='<?php echo $asistente_social; ?>'>
                    </div>
                </form>
            </div>

            <div class='form-section-container'>
                <p class='title-form-section form-margin-top-5px'>MUNICIPIO</p>
                <form>
                    <div class='input-section-horizontal'>
                        <input class='single-input-form-section input-text' type='text' id='input-municipio-buscar' name='input-municipio-buscar' placeholder='BUSCAR MUNICIPIO'>
                    </div>
                    <div class='input-section-horizontal'>
                        <input class='single-input-form-section three-input-buttons input-button' type='button' id='input-button-buscar-municipio' value='BUSCAR'>
                        <input class='single-input-form-section three-input-buttons input-button' type='button' id='input-button-borrar-municipio' value='BORRAR'>
                    </div>
                    <select class='form-select form-margin-bottom-10px' id='select-municipio' name='Municipios' size='7'>
                    </select>
                    <div class='input-section-horizontal'>
                        <input type='button' class='single-input-form-section three-input-buttons input-button' id='input-button-elegir-municipio' value='ELEGIR'>
                    </div>
                </form>
                <div class='input-section-horizontal'>
                    <p class='simple-paragraph form-margin-bottom-5px font-size-13px center' id='cedula-input-municipio'><?php echo $municipio_num . " - " . $municipio_nom; ?></p>
                </div>
            </div>

            <div class='form-section-container'>
                <p class='title-form-section form-margin-top-5px'>LOCALIDAD</p>
                <form>
                    <div class='input-section-horizontal'>
                        <input class='single-input-form-section input-text' type='text' id='input-localidad-buscar' name='input-localidad-buscar' placeholder='BUSCAR LOCALIDAD'>
                    </div>
                    
                    <div class='input-section-horizontal'>
                        <input type='button' class='single-input-form-section three-input-buttons input-button' id='input-button-buscar-localidad' value='BUSCAR'>
                        <input type='button' class='single-input-form-section three-input-buttons input-button' id='input-button-borrar-localidad' value='BORRAR'>
                    </div>

                    <select class='form-select form-margin-bottom-10px' id='select-localidad' name='Localidades' size='6'>
                    </select>

                    <div class='input-section-horizontal'>
                        <input type='button' class='single-input-form-section three-input-buttons input-button' id='input-button-elegir-localidad' value='ELEGIR'>
                    </div>

                    <div class='input-section-horizontal'>
                        <input class='single-input-form-section input-text' type='text' id='cedula-input-localidad' name='cedula-input-localidad' placeholder='LOCALIDAD' value='<?php echo $localidad_num . " - " . $localidad_nom; ?>'>
                    </div>

                    <div class='input-section-horizontal no-display'>
                        <p class='single-input-form-section form-margin-bottom-0px no-display'>TIPO DE LOCALIDAD</p>
                    </div>
                    <div class='input-section-horizontal no-display'>
                        <div class='input-section-horizontal-inputs no-display'>
                            <label for='input-tipo-localidad-s'>S</label>
                            <input type='radio' id='input-tipo-localidad-s' name='input-tipo-localidad' value='S'  <?php echo $tipo_localidad == 'S' ? 'checked' : '' ?>>
                        </div>
                        <div class='input-section-horizontal-inputs no-display'>
                            <label for='input-tipo-localidad-lai'>LAI</label>
                            <input type='radio' id='input-tipo-localidad-lai' name='input-tipo-localidad' value='LAI' <?php echo $tipo_localidad == 'LAI' ? 'checked' : '' ?>>
                        </div>
                        <input class='no-display' type='radio' id='input-tipo-localidad-none' name='input-tipo-localidad' value='ND' <?php echo $tipo_localidad == 'ND' ? 'checked' : '' ?>>
                    </div>
                </form>
            </div>

            <div class='form-section-container'>
                <p class='title-form-section form-margin-top-5px'>REGIÓN A LA SEDE OPERATIVA</p>
                <div class='div-section' id='section-cedula-tipo-localidad'>
                    <p>EN VEHICULO</p>
                    <form>
                        <div class='input-section-horizontal'>
                            <label class='single-input-form-section form-margin-bottom-0px' for='input-region-vehiculo-minutos'>MINUTOS</label>
                        </div>
                        <div class='input-section-horizontal'>
                            <input class='single-input-form-section input-text' type='number' id='input-region-vehiculo-minutos' name='input-region-vehiculo-minutos' placeholder='MINUTOS' min='0' value='<?php echo $sede_vm; ?>'>
                        </div>
                        <div class='input-section-horizontal'>
                            <label class='single-input-form-section form-margin-bottom-0px' for='input-region-vehiculo-kilometros'>KILOMETROS</label>
                        </div>
                        <div class='input-section-horizontal'>
                            <input class='single-input-form-section input-text' type='number' id='input-region-vehiculo-kilometros' name='input-region-vehiculo-kilometros' placeholder='KILOMETROS' min='0' value='<?php echo $sede_vk; ?>'>
                        </div>
                    </form>
                </div>
                <div class='div-section' id='section-cedula-tipo-localidad'>
                    <p>A PIE/SEMOVIENTE</p>
                    <form>
                        <div class='input-section-horizontal'>
                            <label class='single-input-form-section form-margin-bottom-0px' for='input-region-pie-minutos'>MINUTOS</label>
                        </div>
                        <div class='input-section-horizontal'>
                            <input class='single-input-form-section input-text' type='number' id='input-region-pie-minutos' name='input-region-pie-minutos' placeholder='MINUTOS' min='0' value='<?php echo $sede_pm; ?>'>
                        </div>
                        <div class='input-section-horizontal'>
                            <label class='single-input-form-section form-margin-bottom-0px' for='input-region-pie-kilometros'>KILOMETROS</label>
                        </div>
                        <div class='input-section-horizontal'>
                            <input class='single-input-form-section input-text' type='number' id='input-region-pie-kilometros' name='input-region-pie-kilometros' placeholder='KILOMETROS' min='0' value='<?php echo $sede_pk; ?>'>
                        </div>
                    </form>
                </div>
            </div>

            <div class='form-section-container no-display'>
                <p class='title-form-section form-margin-top-5px'>SEDE OPERATIVA A LA SUBSEDE OPERATIVA</p>
                <div class='div-section' id='section-cedula-tipo-localidad'>
                    <p>EN VEHICULO</p>
                    <form>
                        <div class='input-section-horizontal'>
                            <label class='single-input-form-section form-margin-bottom-0px' for='input-sede-vehiculo-minutos'>MINUTOS</label>
                        </div>
                        <div class='input-section-horizontal'>
                            <input class='single-input-form-section input-text' type='number' id='input-sede-vehiculo-minutos' name='input-sede-vehiculo-minutos' placeholder='MINUTOS' min='0' value='<?php echo $subsede_vm; ?>'>
                        </div>
                        <div class='input-section-horizontal'>
                            <label class='single-input-form-section form-margin-bottom-0px' for='input-sede-vehiculo-kilometros'>KILOMETROS</label>
                        </div>
                        <div class='input-section-horizontal'>
                            <input class='single-input-form-section input-text' type='number' id='input-sede-vehiculo-kilometros' name='input-sede-vehiculo-kilometros' placeholder='KILOMETROS' min='0' value='<?php echo $subsede_vk; ?>'>
                        </div>
                    </form>
                </div>
                <div class='div-section' id='section-cedula-tipo-localidad'>
                    <p>A PIE/SEMOVIENTE</p>
                    <form>
                        <div class='input-section-horizontal'>
                            <label class='single-input-form-section form-margin-bottom-0px' for='input-sede-pie-minutos'>MINUTOS</label>
                        </div>
                        <div class='input-section-horizontal'>
                            <input class='single-input-form-section input-text' type='number' id='input-sede-pie-minutos' name='input-sede-pie-minutos' placeholder='MINUTOS' min='0' value='<?php echo $subsede_pm; ?>'>
                        </div>
                        <div class='input-section-horizontal'>
                            <label class='single-input-form-section form-margin-bottom-0px' for='input-sede-pie-kilometros'>KILOMETROS</label>
                        </div>
                        <div class='input-section-horizontal'>
                            <input class='single-input-form-section input-text' type='number' id='input-sede-pie-kilometros' name='input-sede-pie-kilometros' placeholder='KILOMETROS' min='0' value='<?php echo $subsede_pk; ?>'>
                        </div>
                    </form>
                </div>
            </div>

            <div class='form-section-container'>
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
                        <input type='button' class='single-input-form-section input-button form-margin-top-20px form-margin-bottom-20px' id='button-cedula-siguiente' value='SIGUIENTE'>
                    </div>
                    <div class='input-section-horizontal'>
                        <input type='button' class='single-input-form-section input-button form-margin-top-40px form-margin-bottom-20px' id='button-cedula-limpiar-campos' value='LIMPIAR CAMPOS'>
                    </div>
                    <div class='input-section-horizontal'>
                        <input type='button' class='single-input-form-section input-button form-margin-top-20px form-margin-bottom-20px' id='button-cedula-cancelar-captura' value='CANCELAR CAPTURA'>
                    </div>
                </form>
            </div>

        </div>
    </main>
    <?php
        include_once '../sections/modals.php';
    ?>
    <script src="../js/cedulas/cedula.js"></script>
</body>
</html>