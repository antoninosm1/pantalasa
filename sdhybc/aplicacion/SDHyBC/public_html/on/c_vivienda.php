<?php
    include "../controller/session/verify.php";

    if (isset($_SESSION['CedulaId'])) {
        include "../model/connection.php";
        $query = "SELECT TechoConc, TechoGalv, TechoMade, TechoCart, TechoOtro, PareTabiq, PareAdobe, PareBlock, PareMader, ParePiedr, PareCarto, PisoCemen, PisoMader, PisoTierr, PisoPiedr, AgUsoPota, AgUsoNori, AgUsoRio, AgUsoLluv, AgConPota, AgConPuri, AgConHerv, AgConClor, AgConFilt, ExcFoSep, ExcLetri, ExcRasSu, CombGas, CombCar, CombLen, CombOtr, BasRedM, BasEnte, BasCieAb, BasInci, AlumRedE, AlumVela, AlumQuin, AlumPlaS, NumHab, Recam, Estan, Comed, Multi, Cocin FROM cedula WHERE ID = " . $_SESSION['CedulaId'];
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_array($result);
            $tech_co = $row['TechoConc'] == 1 ? 'checked' : '';
            $tech_ga = $row['TechoGalv'] == 1 ? 'checked' : '';
            $tech_ma = $row['TechoMade'] == 1 ? 'checked' : '';
            $tech_ca = $row['TechoCart'] == 1 ? 'checked' : '';
            $tech_ot = $row['TechoOtro'] == 1 ? 'checked' : '';
            $pare_ta = $row['PareTabiq'] == 1 ? 'checked' : '';
            $pare_ad = $row['PareAdobe'] == 1 ? 'checked' : '';
            $pare_bl = $row['PareBlock'] == 1 ? 'checked' : '';
            $pare_ma = $row['PareMader'] == 1 ? 'checked' : '';
            $pare_pi = $row['ParePiedr'] == 1 ? 'checked' : '';
            $pare_ca = $row['PareCarto'] == 1 ? 'checked' : '';
            $piso_ce = $row['PisoCemen'] == 1 ? 'checked' : '';
            $piso_ma = $row['PisoMader'] == 1 ? 'checked' : '';
            $piso_ti = $row['PisoTierr'] == 1 ? 'checked' : '';
            $piso_pi = $row['PisoPiedr'] == 1 ? 'checked' : '';
            $auso_po = $row['AgUsoPota'] == 1 ? 'checked' : '';
            $auso_no = $row['AgUsoNori'] == 1 ? 'checked' : '';
            $auso_ri = $row['AgUsoRio'] == 1 ? 'checked' : '';
            $auso_ll = $row['AgUsoLluv'] == 1 ? 'checked' : '';
            $acon_po = $row['AgConPota'] == 1 ? 'checked' : '';
            $acon_pu = $row['AgConPuri'] == 1 ? 'checked' : '';
            $acon_he = $row['AgConHerv'] == 1 ? 'checked' : '';
            $acon_cl = $row['AgConClor'] == 1 ? 'checked' : '';
            $acon_fi = $row['AgConFilt'] == 1 ? 'checked' : '';
            $excr_fo = $row['ExcFoSep'] == 1 ? 'checked' : '';
            $excr_le = $row['ExcLetri'] == 1 ? 'checked' : '';
            $excr_ra = $row['ExcRasSu'] == 1 ? 'checked' : '';
            $comb_ga = $row['CombGas'] == 1 ? 'checked' : '';
            $comb_ca = $row['CombCar'] == 1 ? 'checked' : '';
            $comb_le = $row['CombLen'] == 1 ? 'checked' : '';
            $comb_ot = $row['CombOtr'] == 1 ? 'checked' : '';
            $basu_re = $row['BasRedM'] == 1 ? 'checked' : '';
            $basu_en = $row['BasEnte'] == 1 ? 'checked' : '';
            $basu_ci = $row['BasCieAb'] == 1 ? 'checked' : '';
            $basu_in = $row['BasInci'] == 1 ? 'checked' : '';
            $alum_re = $row['AlumRedE'] == 1 ? 'checked' : '';
            $alum_ve = $row['AlumVela'] == 1 ? 'checked' : '';
            $alum_qu = $row['AlumQuin'] == 1 ? 'checked' : '';
            $alum_pl = $row['AlumPlaS'] == 1 ? 'checked' : '';
            $num_hab = $row['NumHab'];
            $rec = $row['Recam'] == 1 ? 'checked' : '';
            $est = $row['Estan'] == 1 ? 'checked' : '';
            $com = $row['Comed'] == 1 ? 'checked' : '';
            $mul = $row['Multi'] == 1 ? 'checked' : '';
            $coc = $row['Cocin'] == 1 ? 'checked' : '';
            mysqli_query($conn, $query);
            mysqli_free_result($result);
            mysqli_close($conn);
        }
    } else {
        $tech_co = "";
        $tech_ga = "";
        $tech_ma = "";
        $tech_ca = "";
        $tech_ot = "";
        $pare_ta = "";
        $pare_ad = "";
        $pare_bl = "";
        $pare_ma = "";
        $pare_pi = "";
        $pare_ca = "";
        $piso_ce = "";
        $piso_ma = "";
        $piso_ti = "";
        $piso_pi = "";
        $auso_po = "";
        $auso_no = "";
        $auso_ri = "";
        $auso_ll = "";
        $acon_po = "";
        $acon_pu = "";
        $acon_he = "";
        $acon_cl = "";
        $acon_fi = "";
        $excr_fo = "";
        $excr_le = "";
        $excr_ra = "";
        $comb_ga = "";
        $comb_ca = "";
        $comb_le = "";
        $comb_ot = "";
        $basu_re = "";
        $basu_en = "";
        $basu_ci = "";
        $basu_in = "";
        $alum_re = "";
        $alum_ve = "";
        $alum_qu = "";
        $alum_pl = "";
        $num_hab = "0";
        $rec = "";
        $est = "";
        $com = "";
        $mul = "";
        $coc = "";
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
                <p class='title-form-section form-margin-top-5px'>TECHO</p>
                <form>
                    <div class='input-section-horizontal form-margin-bottom-10px'>
                        <input id='TechoConcreto' type='checkbox' <?php echo $tech_co; ?>>
                        <label for='TechoConcreto' class='input-section-label'>Concreto</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-10px'>
                        <input id='TechoGalvanizada' type='checkbox' <?php echo $tech_ga; ?>>
                        <label for='TechoGalvanizada' class='input-section-label'>Lámina Galvanizada</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-10px'>
                        <input id='TechoMadera' type='checkbox' <?php echo $tech_ma; ?>>
                        <label for='TechoMadera' class='input-section-label'>Madera</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-10px'>
                        <input id='TechoCarton' type='checkbox' <?php echo $tech_ca; ?>>
                        <label for='TechoCarton' class='input-section-label'>Lámina Cartón</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-0px'>
                        <input id='TechoOtro' type='checkbox' <?php echo $tech_ot; ?>>
                        <label for='TechoOtro' class='input-section-label'>Otro</label>
                    </div>
                </form>
            </div>

            <div class='form-section-container'>
                <p class='title-form-section form-margin-top-5px'>PAREDES</p>
                <form>
                    <div class='input-section-horizontal form-margin-bottom-5px'>
                        <input id='ParedTabique' type='checkbox' <?php echo $pare_ta; ?>>
                        <label for='ParedTabique' class='input-section-label'>Tabique</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-5px'>
                        <input id='ParedAdobe' type='checkbox' <?php echo $pare_ad; ?>>
                        <label for='ParedAdobe' class='input-section-label'>Adobe</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-5px'>
                        <input id='ParedBlock' type='checkbox' <?php echo $pare_bl; ?>>
                        <label for='ParedBlock' class='input-section-label'>Block</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-5px'>
                        <input id='ParedMadera' type='checkbox' <?php echo $pare_ma; ?>>
                        <label for='ParedMadera' class='input-section-label'>Madera</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-5px'>
                        <input id='ParedPiedra' type='checkbox' <?php echo $pare_pi; ?>>
                        <label for='ParedPiedra' class='input-section-label'>Piedra</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-0px'>
                        <input id='ParedCarton' type='checkbox' <?php echo $pare_ca; ?>>
                        <label for='ParedCarton' class='input-section-label'>Cartón</label>
                    </div>
                </form>
            </div>

            <div class='form-section-container'>
                <p class='title-form-section form-margin-top-5px'>PISO</p>
                <form>
                    <div class='input-section-horizontal form-margin-bottom-20px'>
                        <input id='PisoCemento' type='checkbox' <?php echo $piso_ce; ?>>
                        <label for='PisoCemento' class='input-section-label'>Cemento</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-20px'>
                        <input id='PisoMadera' type='checkbox' <?php echo $piso_ma; ?>>
                        <label for='PisoMadera' class='input-section-label'>Madera</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-20px'>
                        <input id='PisoTierra' type='checkbox' <?php echo $piso_ti; ?>>
                        <label for='PisoTierra' class='input-section-label'>Tierra</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-0px'>
                        <input id='PisoPiedra' type='checkbox' <?php echo $piso_pi; ?>>
                        <label for='PisoPiedra' class='input-section-label'>Piedra</label>
                    </div>
                </form>
            </div>

            <div class='form-section-container'>
                <p class='title-form-section form-margin-top-5px'>AGUA DE USO</p>
                <form>
                    <div class='input-section-horizontal form-margin-bottom-20px'>
                        <input id='AgUsoPotable' type='checkbox' <?php echo $auso_po; ?>>
                        <label for='AgUsoPotable' class='input-section-label'>Potable</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-20px'>
                        <input id='AgUsoNoria' type='checkbox' <?php echo $auso_no; ?>>
                        <label for='AgUsoNoria' class='input-section-label'>Noria / Pozo</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-20px'>
                        <input id='AgUsoRio' type='checkbox' <?php echo $auso_ri; ?>>
                        <label for='AgUsoRio' class='input-section-label'>Río</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-0px'>
                        <input id='AgUsoLluvia' type='checkbox' <?php echo $auso_ll; ?>>
                        <label for='AgUsoLluvia' class='input-section-label'>Lluvia</label>
                    </div>
                </form>
            </div>

            <div class='form-section-container'>
                <p class='title-form-section form-margin-top-5px'>AGUA DE CONSUMO</p>
                <form>
                    <div class='input-section-horizontal form-margin-bottom-5px'>
                        <input id='AgConPotable' type='checkbox' <?php echo $acon_po; ?>>
                        <label for='AgConPotable' class='input-section-label'>Potable</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-5px'>
                        <input id='AgConPurificada' type='checkbox' <?php echo $acon_pu; ?>>
                        <label for='AgConPurificada' class='input-section-label'>Purificada</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-5px'>
                        <input id='AgConHervida' type='checkbox' <?php echo $acon_he; ?>>
                        <label for='AgConHervida' class='input-section-label'>Hervida</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-5px'>
                        <input id='AgConClorada' type='checkbox' <?php echo $acon_cl; ?>>
                        <label for='AgConClorada' class='input-section-label'>Clorada</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-0px'>
                        <input id='AgConFiltrada' type='checkbox' <?php echo $acon_fi; ?>>
                        <label for='AgConFiltrada' class='input-section-label'>Filtrada</label>
                    </div>
                </form>
            </div>

            <div class='form-section-container'>
                <p class='title-form-section form-margin-top-5px'>EXCRETA</p>
                <form>
                    <div class='input-section-horizontal form-margin-bottom-20px'>
                        <input id='ExcFosa' type='checkbox' <?php echo $excr_fo; ?>>
                        <label for='ExcFosa' class='input-section-label'>Fosa Séptica</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-20px'>
                        <input id='ExcLetrina' type='checkbox' <?php echo $excr_le; ?>>
                        <label for='ExcLetrina' class='input-section-label'>Letrina</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-0px'>
                        <input id='ExcRas' type='checkbox' <?php echo $excr_ra; ?>>
                        <label for='ExcRas' class='input-section-label'>Al ras de suelo</label>
                    </div>
                </form>
            </div>

            <div class='form-section-container'>
                <p class='title-form-section form-margin-top-5px'>COMBUSTIBLE</p>
                <form>
                    <div class='input-section-horizontal form-margin-bottom-15px'>
                        <input id='CombGas' type='checkbox' <?php echo $comb_ga; ?>>
                        <label for='CombGas' class='input-section-label'>Gas</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-15px'>
                        <input id='CombCarbon' type='checkbox' <?php echo $comb_ca; ?>>
                        <label for='CombCarbon' class='input-section-label'>Carbón</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-15px'>
                        <input id='CombLena' type='checkbox' <?php echo $comb_le; ?>>
                        <label for='CombLena' class='input-section-label'>Leña</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-0px'>
                        <input id='CombOtros' type='checkbox' <?php echo $comb_ot; ?>>
                        <label for='CombOtros' class='input-section-label'>Otros</label>
                    </div>
                </form>
            </div>

            <div class='form-section-container'>
                <p class='title-form-section form-margin-top-5px'>BASURA</p>
                <form>
                    <div class='input-section-horizontal form-margin-bottom-15px'>
                        <input id='BasuMunicipal' type='checkbox' <?php echo $basu_re; ?>>
                        <label for='BasuMunicipal' class='input-section-label'>Red Municipal</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-15px'>
                        <input id='BasuEnterramiento' type='checkbox' <?php echo $basu_en; ?>>
                        <label for='BasuEnterramiento' class='input-section-label'>Enterramiento</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-15px'>
                        <input id='BasuAbierto' type='checkbox' <?php echo $basu_ci; ?>>
                        <label for='BasuAbierto' class='input-section-label'>Cielo Abierto</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-0px'>
                        <input id='BasuIncineracion' type='checkbox' <?php echo $basu_in; ?>>
                        <label for='BasuIncineracion' class='input-section-label'>Incineracion</label>
                    </div>
                </form>
            </div>

            <div class='form-section-container'>
                <p class='title-form-section form-margin-top-5px'>ALUMBRADO</p>
                <form>
                    <div class='input-section-horizontal form-margin-bottom-15px'>
                        <input id='AlumElectrica' type='checkbox' <?php echo $alum_re; ?>>
                        <label for='AlumElectrica' class='input-section-label'>Red Eléctrica</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-15px'>
                        <input id='AlumVelas' type='checkbox' <?php echo $alum_ve; ?>>
                        <label for='AlumVelas' class='input-section-label'>Velas</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-15px'>
                        <input id='AlumQuinque' type='checkbox' <?php echo $alum_qu; ?>>
                        <label for='AlumQuinque' class='input-section-label'>Quinque</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-0px'>
                        <input id='AlumPlaca' type='checkbox' <?php echo $alum_pl; ?>>
                        <label for='AlumPlaca' class='input-section-label'>Placa Solar</label>
                    </div>
                </form>
            </div>

            <div class='form-section-container'>
                <p class='title-form-section form-margin-top-5px'>DISTRIBUCIÓN HABITACIONAL</p>
                <form>
                    <div class='input-section-horizontal'>
                        <label for='Habitaciones' class='single-input-form-section form-margin-bottom-0px'>Número de Habitaciones</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <input class='single-input-form-section input-text' id='Habitaciones' type='number' value = '<?php echo $num_hab; ?>'>
                    </div>
                    
                    <div class='input-section-horizontal form-margin-bottom-5px'>
                        <input id='Recamara' type='checkbox' <?php echo $rec; ?>>
                        <label for='Recamara' class='input-section-label'>Recamara</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-5px'>
                        <input id='Estancia' type='checkbox' <?php echo $est; ?>>
                        <label for='Estancia' class='input-section-label'>Estancia</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-5px'>
                        <input id='Comedor' type='checkbox' <?php echo $com; ?>>
                        <label for='Comedor' class='input-section-label'>Comedor</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-5px'>
                        <input id='Multiple' type='checkbox' <?php echo $mul; ?>>
                        <label for='Multiple' class='input-section-label'>Multiple</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-0px'>
                        <input id='Cocina' type='checkbox' <?php echo $coc; ?>>
                        <label for='Cocina' class='input-section-label'>Cocina Independiente</label>
                    </div>
                </form>
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
                        <input type='button' class='single-input-form-section input-button form-margin-top-20px form-margin-bottom-20px' id='button-vivienda-siguiente' value='SIGUIENTE'>
                    </div>
                    <div class='input-section-horizontal'>
                        <input type='button' class='single-input-form-section input-button form-margin-top-40px  form-margin-bottom-20px' id='button-vivienda-limpiar-campos' value='LIMPIAR CAMPOS'>
                    </div>
                    <div class='input-section-horizontal'>
                        <input type='button' class='single-input-form-section input-button form-margin-top-20px form-margin-bottom-20px' id='button-vivienda-anterior' value='ANTERIOR'>
                    </div>
                    <div class='input-section-horizontal'>
                        <input type='button' class='single-input-form-section input-button form-margin-top-20px form-margin-bottom-20px' id='button-vivienda-cancelar-captura' value='CANCELAR CAPTURA'>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php
        include_once '../sections/modals.php';
    ?>
    <script src="../js/cedulas/vivienda.js"></script>
</body>
</html>