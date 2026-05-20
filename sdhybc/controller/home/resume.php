<?php
    include "../session/verify.php";
    include "../../model/connection.php";

    //$mun = 'ALL';
    $mun = $conn -> real_escape_string($_POST['from']);
    if ($mun == "ALL") {
        $rl = mysqli_query($conn, "SELECT DISTINCT `LocalidadNum`, `LocalidadNom` FROM cedula;");
        $localidades = mysqli_fetch_all ($rl, MYSQLI_ASSOC);

        $cedulas = $conn -> query("SELECT COUNT(*) FROM cedula;") -> fetch_row()[0];
        $cantidad_localidades = $conn -> query("SELECT COUNT(DISTINCT LocalidadNom) FROM cedula;") -> fetch_row()[0];
        $viviendas = $conn -> query("SELECT COUNT(DISTINCT CedulaId) FROM familia;") -> fetch_row()[0];
        $poblacion = $conn -> query("SELECT COUNT(*) FROM familia;") -> fetch_row()[0];

        $techo_conc = $conn -> query("SELECT COUNT(*) FROM cedula WHERE TechoConc = 1;") -> fetch_row()[0];
        $techo_galv = $conn -> query("SELECT COUNT(*) FROM cedula WHERE TechoGalv = 1;") -> fetch_row()[0];
        $techo_made = $conn -> query("SELECT COUNT(*) FROM cedula WHERE TechoMade = 1;") -> fetch_row()[0];
        $techo_cart = $conn -> query("SELECT COUNT(*) FROM cedula WHERE TechoCart = 1;") -> fetch_row()[0];
        $techo_otro = $conn -> query("SELECT COUNT(*) FROM cedula WHERE TechoOtro = 1;") -> fetch_row()[0];
        $techo_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (TechoConc IS NULL OR TechoConc = 0) AND (TechoGalv IS NULL OR TechoGalv = 0) AND (TechoMade IS NULL OR TechoMade = 0) AND (TechoCart IS NULL OR TechoCart = 0) AND (TechoOtro IS NULL OR TechoOtro = 0);") -> fetch_row()[0];

        $pared_tabi = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PareTabiq = 1;") -> fetch_row()[0];
        $pared_adob = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PareAdobe = 1;") -> fetch_row()[0];
        $pared_bloc = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PareBlock = 1;") -> fetch_row()[0];
        $pared_made = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PareMader = 1;") -> fetch_row()[0];
        $pared_pied = $conn -> query("SELECT COUNT(*) FROM cedula WHERE ParePiedr = 1;") -> fetch_row()[0];
        $pared_cart = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PareCarto = 1;") -> fetch_row()[0];
        $pared_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (PareTabiq IS NULL OR PareTabiq = 0) AND (PareAdobe IS NULL OR PareAdobe = 0) AND (PareBlock IS NULL OR PareBlock = 0) AND (PareMader IS NULL OR PareMader = 0) AND (ParePiedr IS NULL OR ParePiedr = 0) AND (PareCarto IS NULL OR PareCarto = 0);") -> fetch_row()[0];

        $piso_ceme = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PisoCemen = 1;") -> fetch_row()[0];
        $piso_made = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PisoMader = 1;") -> fetch_row()[0];
        $piso_tier = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PisoTierr = 1;") -> fetch_row()[0];
        $piso_pied = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PisoPiedr = 1;") -> fetch_row()[0];
        $piso_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (PisoCemen IS NULL OR PisoCemen = 0) AND (PisoMader IS NULL OR PisoMader = 0) AND (PisoTierr IS NULL OR PisoTierr = 0) AND (PisoPiedr IS NULL OR PisoPiedr = 0);") -> fetch_row()[0];

        $agus_pot = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AgUsoPota = 1;") -> fetch_row()[0];
        $agus_nor = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AgUsoNori = 1;") -> fetch_row()[0];
        $agus_rio = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AgUsoRio = 1;") -> fetch_row()[0];
        $agus_llu = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AgUsoLluv = 1;") -> fetch_row()[0];
        $agus_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (AgUsoPota IS NULL OR AgUsoPota = 0) AND (AgUsoNori IS NULL OR AgUsoNori = 0) AND (AgUsoRio IS NULL OR AgUsoRio = 0) AND (AgUsoLluv IS NULL OR AgUsoLluv = 0);") -> fetch_row()[0];

        $agco_pot = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AgConPota = 1;") -> fetch_row()[0];
        $agco_pur = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AgConPuri = 1;") -> fetch_row()[0];
        $agco_her = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AgConHerv = 1;") -> fetch_row()[0];
        $agco_clo = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AgConClor = 1;") -> fetch_row()[0];
        $agco_fil = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AgConFilt = 1;") -> fetch_row()[0];
        $agco_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (AgConPota IS NULL OR AgConPota = 0) AND (AgConPuri IS NULL OR AgConPuri = 0) AND (AgConHerv IS NULL OR AgConHerv = 0) AND (AgConClor IS NULL OR AgConClor = 0) AND (AgConFilt IS NULL OR AgConFilt = 0);") -> fetch_row()[0];

        $exc_fo = $conn -> query("SELECT COUNT(*) FROM cedula WHERE ExcFoSep = 1;") -> fetch_row()[0];
        $exc_le = $conn -> query("SELECT COUNT(*) FROM cedula WHERE ExcLetri = 1;") -> fetch_row()[0];
        $exc_ra = $conn -> query("SELECT COUNT(*) FROM cedula WHERE ExcRasSu = 1;") -> fetch_row()[0];
        $exc_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (ExcFoSep IS NULL OR ExcFoSep = 0) AND (ExcLetri IS NULL OR ExcLetri = 0) AND (ExcRasSu IS NULL OR ExcRasSu = 0);") -> fetch_row()[0];

        $comb_ga = $conn -> query("SELECT COUNT(*) FROM cedula WHERE CombGas = 1;") -> fetch_row()[0];
        $comb_ca = $conn -> query("SELECT COUNT(*) FROM cedula WHERE CombCar = 1;") -> fetch_row()[0];
        $comb_le = $conn -> query("SELECT COUNT(*) FROM cedula WHERE CombLen = 1;") -> fetch_row()[0];
        $comb_ot = $conn -> query("SELECT COUNT(*) FROM cedula WHERE CombOtr = 1;") -> fetch_row()[0];
        $comb_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (CombGas IS NULL OR CombGas = 0) AND (CombCar IS NULL OR CombCar = 0) AND (CombLen IS NULL OR CombLen = 0) AND (CombOtr IS NULL OR CombOtr = 0);") -> fetch_row()[0];

        $bas_re = $conn -> query("SELECT COUNT(*) FROM cedula WHERE BasRedM = 1;") -> fetch_row()[0];
        $bas_en = $conn -> query("SELECT COUNT(*) FROM cedula WHERE BasEnte = 1;") -> fetch_row()[0];
        $bas_ci = $conn -> query("SELECT COUNT(*) FROM cedula WHERE BasCieAb = 1;") -> fetch_row()[0];
        $bas_in = $conn -> query("SELECT COUNT(*) FROM cedula WHERE BasInci = 1;") -> fetch_row()[0];
        $bas_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (BasRedM IS NULL OR BasRedM = 0) AND (BasEnte IS NULL OR BasEnte = 0) AND (BasCieAb IS NULL OR BasCieAb = 0) AND (BasInci IS NULL OR BasInci = 0);") -> fetch_row()[0];

        $alu_re = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AlumRedE = 1;") -> fetch_row()[0];
        $alu_ve = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AlumVela = 1;") -> fetch_row()[0];
        $alu_qu = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AlumQuin = 1;") -> fetch_row()[0];
        $alu_pl = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AlumPlaS = 1;") -> fetch_row()[0];
        $alu_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (AlumRedE IS NULL OR AlumRedE = 0) AND (AlumVela IS NULL OR AlumVela = 0) AND (AlumQuin IS NULL OR AlumQuin = 0) AND (AlumPlaS IS NULL OR AlumPlaS = 0);") -> fetch_row()[0];

        $dh_numhab = $conn -> query("SELECT SUM(NumHab) FROM cedula;") -> fetch_row()[0];
        $dh_rec = $conn -> query("SELECT COUNT(*) FROM cedula WHERE Recam = 1;") -> fetch_row()[0];
        $dh_est = $conn -> query("SELECT COUNT(*) FROM cedula WHERE Estan = 1;") -> fetch_row()[0];
        $dh_com = $conn -> query("SELECT COUNT(*) FROM cedula WHERE Comed = 1;") -> fetch_row()[0];
        $dh_mul = $conn -> query("SELECT COUNT(*) FROM cedula WHERE Multi = 1;") -> fetch_row()[0];
        $dh_coc = $conn -> query("SELECT COUNT(*) FROM cedula WHERE Cocin = 1;") -> fetch_row()[0];

        $habviv_1 = $conn -> query("SELECT COUNT(*) FROM cedula WHERE NumHab = 1;") -> fetch_row()[0];
        $habviv_2 = $conn -> query("SELECT COUNT(*) FROM cedula WHERE NumHab = 2;") -> fetch_row()[0];
        $habviv_3 = $conn -> query("SELECT COUNT(*) FROM cedula WHERE NumHab = 3;") -> fetch_row()[0];
        $habviv_4 = $conn -> query("SELECT COUNT(*) FROM cedula WHERE NumHab >= 4;") -> fetch_row()[0];
        $habviv_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (NumHab IS NULL OR NumHab = 0);") -> fetch_row()[0];

        $pueind_tara = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PueIndTara = 1;") -> fetch_row()[0];
        $pueind_tepe = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PueIndTepe = 1;") -> fetch_row()[0];
        $pueind_wuar = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PueIndWuar = 1;") -> fetch_row()[0];
        $pueind_pima = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PueIndPima = 1;") -> fetch_row()[0];
        $pueind_meno = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PueIndMeno = 1;") -> fetch_row()[0];
        $pueind_otro = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PueIndOtro = 1;") -> fetch_row()[0];
        $pueind_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (PueIndTara IS NULL OR PueIndTara = 0) AND (PueIndTepe IS NULL OR PueIndTepe = 0) AND (PueIndWuar IS NULL OR PueIndWuar = 0) AND (PueIndPima IS NULL OR PueIndPima = 0) AND (PueIndMeno IS NULL OR PueIndMeno = 0) AND (PueIndOtro IS NULL OR PueIndOtro = 0);") -> fetch_row()[0];

        $dere_INSABI = $conn -> query("SELECT COUNT(*) FROM cedula WHERE DerechINSABI = 1;") -> fetch_row()[0];
        $dere_IMSS = $conn -> query("SELECT COUNT(*) FROM cedula WHERE DerechIMSS = 1;") -> fetch_row()[0];
        $dere_ISSSTE = $conn -> query("SELECT COUNT(*) FROM cedula WHERE DerechISSSTE = 1;") -> fetch_row()[0];
        $dere_PEMEX = $conn -> query("SELECT COUNT(*) FROM cedula WHERE DerechPEMEX = 1;") -> fetch_row()[0];
        $dere_SEDENA = $conn -> query("SELECT COUNT(*) FROM cedula WHERE DerechSEDENA = 1;") -> fetch_row()[0];
        $dere_Otro = $conn -> query("SELECT COUNT(*) FROM cedula WHERE DerechOtro = 1;") -> fetch_row()[0];
        $dere_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (DerechINSABI IS NULL OR DerechINSABI = 0) AND (DerechIMSS IS NULL OR DerechIMSS = 0) AND (DerechISSSTE IS NULL OR DerechISSSTE = 0) AND (DerechPEMEX IS NULL OR DerechPEMEX = 0) AND (DerechSEDENA IS NULL OR DerechSEDENA = 0) AND (DerechOtro IS NULL OR DerechOtro = 0);") -> fetch_row()[0];

        $masc_pe = $conn -> query("SELECT SUM(NumPerros) FROM cedula;") -> fetch_row()[0];
        $masc_ga = $conn -> query("SELECT SUM(NumGatos) FROM cedula;") -> fetch_row()[0];
        $masc_ot = $conn -> query("SELECT SUM(NumOtros) FROM cedula;") -> fetch_row()[0];

        $sisa_INSABI = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalINSABI = 1;") -> fetch_row()[0];
        $sisa_IMSS = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalIMSS = 1;") -> fetch_row()[0];
        $sisa_ISSSTE = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalISSSTE = 1;") -> fetch_row()[0];
        $sisa_PEMEX = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalPEMEX = 1;") -> fetch_row()[0];
        $sisa_SEDENA = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalSEDENA = 1;") -> fetch_row()[0];
        $sisa_Otro = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalOtro = 1;") -> fetch_row()[0];
        $sisa_Medico = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalMedPar = 1;") -> fetch_row()[0];
        $sisa_Clinica = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalCliPar = 1;") -> fetch_row()[0];
        $sisa_Partera = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalParter = 1;") -> fetch_row()[0];
        $sisa_Curandera = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalCurand = 1;") -> fetch_row()[0];
        $sisa_Yerbero = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalYerber = 1;") -> fetch_row()[0];
        $sisa_Huesero = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalHueser = 1;") -> fetch_row()[0];
        $sisa_Boticario = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalBotica = 1;") -> fetch_row()[0];
        $sisa_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (SisSalINSABI IS NULL OR SisSalINSABI = 0) AND " .
        "(SisSalIMSS IS NULL OR SisSalIMSS = 0) AND (SisSalISSSTE IS NULL OR SisSalISSSTE = 0) AND (SisSalPEMEX IS NULL OR SisSalPEMEX = 0) AND " .
        "(SisSalSEDENA IS NULL OR SisSalSEDENA = 0) AND (SisSalOtro IS NULL OR SisSalOtro = 0) AND (SisSalMedPar IS NULL OR SisSalMedPar = 0) AND " .
        "(SisSalCliPar IS NULL OR SisSalCliPar = 0) AND (SisSalParter IS NULL OR SisSalParter = 0) AND (SisSalCurand IS NULL OR SisSalCurand = 0) AND " .
        "(SisSalYerber IS NULL OR SisSalYerber = 0) AND (SisSalHueser IS NULL OR SisSalHueser = 0) AND (SisSalBotica IS NULL OR SisSalBotica = 0);") -> fetch_row()[0];

        $edho_4 = $conn -> query("SELECT COUNT(*) FROM familia WHERE Genero = 'Hombre' AND Edad <= 4;") -> fetch_row()[0];
        $edho_59 = $conn -> query("SELECT COUNT(*) FROM familia WHERE Genero = 'Hombre' AND Edad >= 4 AND Edad <= 9;") -> fetch_row()[0];
        $edho_1017 = $conn -> query("SELECT COUNT(*) FROM familia WHERE Genero = 'Hombre' AND Edad >= 10 AND Edad <= 17;") -> fetch_row()[0];
        $edho_1859 = $conn -> query("SELECT COUNT(*) FROM familia WHERE Genero = 'Hombre' AND Edad >= 18 AND Edad <= 59;") -> fetch_row()[0];
        $edho_60 = $conn -> query("SELECT COUNT(*) FROM familia WHERE Genero = 'Hombre' AND Edad >= 60;") -> fetch_row()[0];
        $edho_nd = $conn -> query("SELECT COUNT(*) FROM familia WHERE Genero = 'Hombre' AND Edad IS NULL;") -> fetch_row()[0];
        
        $edmu_4 = $conn -> query("SELECT COUNT(*) FROM familia WHERE Genero = 'Mujer' AND Edad <= 4;") -> fetch_row()[0];
        $edmu_59 = $conn -> query("SELECT COUNT(*) FROM familia WHERE Genero = 'Mujer' AND Edad >= 4 AND Edad <= 9;") -> fetch_row()[0];
        $edmu_1017 = $conn -> query("SELECT COUNT(*) FROM familia WHERE Genero = 'Mujer' AND Edad >= 10 AND Edad <= 17;") -> fetch_row()[0];
        $edmu_1859 = $conn -> query("SELECT COUNT(*) FROM familia WHERE Genero = 'Mujer' AND Edad >= 18 AND Edad <= 59;") -> fetch_row()[0];
        $edmu_60 = $conn -> query("SELECT COUNT(*) FROM familia WHERE Genero = 'Mujer' AND Edad >= 60;") -> fetch_row()[0];
        $edmu_nd = $conn -> query("SELECT COUNT(*) FROM familia WHERE Genero = 'Mujer' AND Edad IS NULL;") -> fetch_row()[0];

        $lenmat_espa = $conn -> query("SELECT COUNT(*) FROM familia WHERE LenMat = 'Español';") -> fetch_row()[0];
        $lenmat_tara = $conn -> query("SELECT COUNT(*) FROM familia WHERE LenMat = 'Tarahumara';") -> fetch_row()[0];
        $lenmat_tepe = $conn -> query("SELECT COUNT(*) FROM familia WHERE LenMat = 'Tepehuan';") -> fetch_row()[0];
        $lenmat_wuar = $conn -> query("SELECT COUNT(*) FROM familia WHERE LenMat = 'Wuarojio';") -> fetch_row()[0];
        $lenmat_pima = $conn -> query("SELECT COUNT(*) FROM familia WHERE LenMat = 'Pima';") -> fetch_row()[0];
        $lenmat_meno = $conn -> query("SELECT COUNT(*) FROM familia WHERE LenMat = 'Menonita';") -> fetch_row()[0];
        $lenmat_otro = $conn -> query("SELECT COUNT(*) FROM familia WHERE LenMat = 'Otro';") -> fetch_row()[0];
        $lenmat_nd = $conn -> query("SELECT COUNT(*) FROM familia WHERE (LenMat IS NULL OR LenMat = '' OR LenMat = 'ND');") -> fetch_row()[0];

        $sexo_ho = $conn -> query("SELECT COUNT(*) FROM familia WHERE Genero = 'Hombre';") -> fetch_row()[0];
        $sexo_mu = $conn -> query("SELECT COUNT(*) FROM familia WHERE Genero = 'Mujer';") -> fetch_row()[0];
        $sexo_nd = $conn -> query("SELECT COUNT(*) FROM familia WHERE (Genero IS NULL OR Genero = '' OR Genero = 'ND');") -> fetch_row()[0];

        $estciv_cas = $conn -> query("SELECT COUNT(*) FROM familia WHERE EstCiv = 'Casado';") -> fetch_row()[0];
        $estciv_sol = $conn -> query("SELECT COUNT(*) FROM familia WHERE EstCiv = 'Soltero';") -> fetch_row()[0];
        $estciv_uni = $conn -> query("SELECT COUNT(*) FROM familia WHERE EstCiv = 'Unión Libre';") -> fetch_row()[0];
        $estciv_div = $conn -> query("SELECT COUNT(*) FROM familia WHERE EstCiv = 'Divorviado';") -> fetch_row()[0];
        $estciv_viu = $conn -> query("SELECT COUNT(*) FROM familia WHERE EstCiv = 'Viudo';") -> fetch_row()[0];
        $estciv_sep = $conn -> query("SELECT COUNT(*) FROM familia WHERE EstCiv = 'Separado';") -> fetch_row()[0];
        $estciv_nd = $conn -> query("SELECT COUNT(*) FROM familia WHERE (EstCiv IS NULL OR EstCiv = '' OR EstCiv = 'ND');") -> fetch_row()[0];

        $pare_pad = $conn -> query("SELECT COUNT(*) FROM familia WHERE Parente = 'Padre';") -> fetch_row()[0];
        $pare_mad = $conn -> query("SELECT COUNT(*) FROM familia WHERE Parente = 'Madre';") -> fetch_row()[0];
        $pare_hij = $conn -> query("SELECT COUNT(*) FROM familia WHERE Parente = 'Hijo';") -> fetch_row()[0];
        $pare_par = $conn -> query("SELECT COUNT(*) FROM familia WHERE Parente = 'Pariente';") -> fetch_row()[0];
        $pare_otr = $conn -> query("SELECT COUNT(*) FROM familia WHERE Parente = 'Otro';") -> fetch_row()[0];
        $pare_nd = $conn -> query("SELECT COUNT(*) FROM familia WHERE (Parente IS NULL OR Parente = '' OR Parente = 'ND');") -> fetch_row()[0];

        $esco_pree = $conn -> query("SELECT COUNT(*) FROM familia WHERE Escola = 'Preescolar';") -> fetch_row()[0];
        $esco_prim = $conn -> query("SELECT COUNT(*) FROM familia WHERE Escola = 'Primaria';") -> fetch_row()[0];
        $esco_secu = $conn -> query("SELECT COUNT(*) FROM familia WHERE Escola = 'Secundaria';") -> fetch_row()[0];
        $esco_prep = $conn -> query("SELECT COUNT(*) FROM familia WHERE Escola = 'Preparatoria';") -> fetch_row()[0];
        $esco_tecn = $conn -> query("SELECT COUNT(*) FROM familia WHERE Escola = 'Técnico';") -> fetch_row()[0];
        $esco_prof = $conn -> query("SELECT COUNT(*) FROM familia WHERE Escola = 'Profesional';") -> fetch_row()[0];
        $esco_posg = $conn -> query("SELECT COUNT(*) FROM familia WHERE Escola = 'Posgrado';") -> fetch_row()[0];
        $esco_noas = $conn -> query("SELECT COUNT(*) FROM familia WHERE Escola = 'No asiste a la escuela';") -> fetch_row()[0];
        $esco_sale = $conn -> query("SELECT COUNT(*) FROM familia WHERE Escola = 'Sabe leer y escribir';") -> fetch_row()[0];
        $esco_anal = $conn -> query("SELECT COUNT(*) FROM familia WHERE Escola = 'Analfabeta';") -> fetch_row()[0];
        $esco_nd = $conn -> query("SELECT COUNT(*) FROM familia WHERE (Escola IS NULL OR Escola = '' OR Escola = 'ND');") -> fetch_row()[0];

        $ocu_hog = $conn -> query("SELECT COUNT(*) FROM familia WHERE Ocupa = 'Hogar';") -> fetch_row()[0];
        $ocu_est = $conn -> query("SELECT COUNT(*) FROM familia WHERE Ocupa = 'Estudiante';") -> fetch_row()[0];
        $ocu_emp = $conn -> query("SELECT COUNT(*) FROM familia WHERE Ocupa = 'Empleado';") -> fetch_row()[0];
        $ocu_des = $conn -> query("SELECT COUNT(*) FROM familia WHERE Ocupa = 'Desempleado';") -> fetch_row()[0];
        $ocu_por = $conn -> query("SELECT COUNT(*) FROM familia WHERE Ocupa = 'Por cuenta propia';") -> fetch_row()[0];
        $ocu_nd = $conn -> query("SELECT COUNT(*) FROM familia WHERE (Ocupa IS NULL OR Ocupa = '' OR Ocupa = 'ND');") -> fetch_row()[0];

        $ingre_menor = $conn -> query("SELECT COUNT(*) FROM familia WHERE Ingres = 'Menor al salario mínimo';") -> fetch_row()[0];
        $ingre_igual = $conn -> query("SELECT COUNT(*) FROM familia WHERE Ingres = 'Igual al salario mínimo';") -> fetch_row()[0];
        $ingre_mayor = $conn -> query("SELECT COUNT(*) FROM familia WHERE Ingres = 'Mayor al salario mínimo';") -> fetch_row()[0];
        $ingre_nd = $conn -> query("SELECT COUNT(*) FROM familia WHERE (Ingres IS NULL OR Ingres = '' OR Ingres = 'ND');") -> fetch_row()[0];

        $det_pap = $conn -> query("SELECT COUNT(*) FROM familia WHERE Papani = 1;") -> fetch_row()[0];
        $det_hip = $conn -> query("SELECT COUNT(*) FROM familia WHERE Hipert = 1;") -> fetch_row()[0];
        $det_dia = $conn -> query("SELECT COUNT(*) FROM familia WHERE Diabet = 1;") -> fetch_row()[0];
        $det_tub = $conn -> query("SELECT COUNT(*) FROM familia WHERE Tuberc = 1;") -> fetch_row()[0];
        $det_alc = $conn -> query("SELECT COUNT(*) FROM familia WHERE Alcoho = 1;") -> fetch_row()[0];
        $det_tab = $conn -> query("SELECT COUNT(*) FROM familia WHERE Tabaqu = 1;") -> fetch_row()[0];
        $det_can = $conn -> query("SELECT COUNT(*) FROM familia WHERE Cancer = 1;") -> fetch_row()[0];

        $plan_diu = $conn -> query("SELECT COUNT(*) FROM familia WHERE Diu = 1;") -> fetch_row()[0];
        $plan_ora = $conn -> query("SELECT COUNT(*) FROM familia WHERE Orales = 1;") -> fetch_row()[0];
        $plan_pre = $conn -> query("SELECT COUNT(*) FROM familia WHERE Preser = 1;") -> fetch_row()[0];
        $plan_inm = $conn -> query("SELECT COUNT(*) FROM familia WHERE InyMens = 1;") -> fetch_row()[0];
        $plan_inb = $conn -> query("SELECT COUNT(*) FROM familia WHERE InyBien = 1;") -> fetch_row()[0];
        $plan_sal = $conn -> query("SELECT COUNT(*) FROM familia WHERE Salping = 1;") -> fetch_row()[0];
        $plan_imp = $conn -> query("SELECT COUNT(*) FROM familia WHERE Implant = 1;") -> fetch_row()[0];

        $emb_si = $conn -> query("SELECT COUNT(*) FROM familia WHERE Genero = 'Mujer' AND (Embaraz = 'Sí' OR Embaraz = 'En Control');") -> fetch_row()[0];
        $emb_ec = $conn -> query("SELECT COUNT(*) FROM familia WHERE Genero = 'Mujer' AND Embaraz = 'En Control';") -> fetch_row()[0];

        $bcr_di = $conn -> query("SELECT COUNT(*) FROM familia WHERE Bacamro = 'Diario';") -> fetch_row()[0];
        $bcr_tr = $conn -> query("SELECT COUNT(*) FROM familia WHERE Bacamro = 'Tres veces por semana';") -> fetch_row()[0];
        $bcr_do = $conn -> query("SELECT COUNT(*) FROM familia WHERE Bacamro = 'Dos veces por semana';") -> fetch_row()[0];
        $bcr_nu = $conn -> query("SELECT COUNT(*) FROM familia WHERE Bacamro = 'Nunca';") -> fetch_row()[0];
        $bcr_nd = $conn -> query("SELECT COUNT(*) FROM familia WHERE (Bacamro IS NULL OR Bacamro = '' OR Bacamro = 'ND');") -> fetch_row()[0];
        
        $ld_di = $conn -> query("SELECT COUNT(*) FROM familia WHERE LavDien = 'Diario';") -> fetch_row()[0];
        $ld_tr = $conn -> query("SELECT COUNT(*) FROM familia WHERE LavDien = 'Tres veces por semana';") -> fetch_row()[0];
        $ld_do = $conn -> query("SELECT COUNT(*) FROM familia WHERE LavDien = 'Dos veces por semana';") -> fetch_row()[0];
        $ld_nu = $conn -> query("SELECT COUNT(*) FROM familia WHERE LavDien = 'Nunca';") -> fetch_row()[0];
        $ld_nd = $conn -> query("SELECT COUNT(*) FROM familia WHERE (LavDien IS NULL OR LavDien = '' OR LavDien = 'ND');") -> fetch_row()[0];

        $lv_di = $conn -> query("SELECT COUNT(*) FROM familia WHERE LimVivi = 'Diario';") -> fetch_row()[0];
        $lv_tr = $conn -> query("SELECT COUNT(*) FROM familia WHERE LimVivi = 'Tres veces por semana';") -> fetch_row()[0];
        $lv_do = $conn -> query("SELECT COUNT(*) FROM familia WHERE LimVivi = 'Dos veces por semana';") -> fetch_row()[0];
        $lv_nu = $conn -> query("SELECT COUNT(*) FROM familia WHERE LimVivi = 'Nunca';") -> fetch_row()[0];
        $lv_nd = $conn -> query("SELECT COUNT(*) FROM familia WHERE (LimVivi IS NULL OR LimVivi = '' OR LimVivi = 'ND');") -> fetch_row()[0];

        $ba_di = $conn -> query("SELECT COUNT(*) FROM familia WHERE BebAlco = 'Diario';") -> fetch_row()[0];
        $ba_tr = $conn -> query("SELECT COUNT(*) FROM familia WHERE BebAlco = 'Tres veces por semana';") -> fetch_row()[0];
        $ba_do = $conn -> query("SELECT COUNT(*) FROM familia WHERE BebAlco = 'Dos veces por semana';") -> fetch_row()[0];
        $ba_nu = $conn -> query("SELECT COUNT(*) FROM familia WHERE BebAlco = 'Nunca';") -> fetch_row()[0];
        $ba_nd = $conn -> query("SELECT COUNT(*) FROM familia WHERE (BebAlco IS NULL OR BebAlco = '' OR BebAlco = 'ND');") -> fetch_row()[0];

        $ta_di = $conn -> query("SELECT COUNT(*) FROM familia WHERE Tabaco = 'Diario';") -> fetch_row()[0];
        $ta_tr = $conn -> query("SELECT COUNT(*) FROM familia WHERE Tabaco = 'Tres veces por semana';") -> fetch_row()[0];
        $ta_do = $conn -> query("SELECT COUNT(*) FROM familia WHERE Tabaco = 'Dos veces por semana';") -> fetch_row()[0];
        $ta_nu = $conn -> query("SELECT COUNT(*) FROM familia WHERE Tabaco = 'Nunca';") -> fetch_row()[0];
        $ta_nd = $conn -> query("SELECT COUNT(*) FROM familia WHERE (Tabaco IS NULL OR Tabaco = '' OR Tabaco = 'ND');") -> fetch_row()[0];

        $med_di = $conn -> query("SELECT COUNT(*) FROM familia WHERE Medica = 'Diario';") -> fetch_row()[0];
        $med_tr = $conn -> query("SELECT COUNT(*) FROM familia WHERE Medica = 'Tres veces por semana';") -> fetch_row()[0];
        $med_do = $conn -> query("SELECT COUNT(*) FROM familia WHERE Medica = 'Dos veces por semana';") -> fetch_row()[0];
        $med_nu = $conn -> query("SELECT COUNT(*) FROM familia WHERE Medica = 'Nunca';") -> fetch_row()[0];
        $med_nd = $conn -> query("SELECT COUNT(*) FROM familia WHERE (Medica IS NULL OR Medica = '' OR Medica = 'ND');") -> fetch_row()[0];
        
        $dro_di = $conn -> query("SELECT COUNT(*) FROM familia WHERE Drogas = 'Diario';") -> fetch_row()[0];
        $dro_tr = $conn -> query("SELECT COUNT(*) FROM familia WHERE Drogas = 'Tres veces por semana';") -> fetch_row()[0];
        $dro_do = $conn -> query("SELECT COUNT(*) FROM familia WHERE Drogas = 'Dos veces por semana';") -> fetch_row()[0];
        $dro_nu = $conn -> query("SELECT COUNT(*) FROM familia WHERE Drogas = 'Nunca';") -> fetch_row()[0];
        $dro_nd = $conn -> query("SELECT COUNT(*) FROM familia WHERE (Drogas IS NULL OR Drogas = '' OR Drogas = 'ND');") -> fetch_row()[0];
    } else {
        
        $rl = mysqli_query($conn, "SELECT DISTINCT `LocalidadNum`, `LocalidadNom` FROM cedula WHERE MunicipioNom = '" . $mun . "';");
        $localidades = mysqli_fetch_all ($rl, MYSQLI_ASSOC);

        $cedulas = $conn -> query("SELECT COUNT(*) FROM cedula WHERE MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $cantidad_localidades = $conn -> query("SELECT COUNT(DISTINCT LocalidadNom) FROM cedula WHERE MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $viviendas = $conn -> query("SELECT COUNT(DISTINCT familia.CedulaId) FROM familia INNER JOIN cedula ON familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $poblacion = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];

        $techo_conc = $conn -> query("SELECT COUNT(*) FROM cedula WHERE TechoConc = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $techo_galv = $conn -> query("SELECT COUNT(*) FROM cedula WHERE TechoGalv = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $techo_made = $conn -> query("SELECT COUNT(*) FROM cedula WHERE TechoMade = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $techo_cart = $conn -> query("SELECT COUNT(*) FROM cedula WHERE TechoCart = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $techo_otro = $conn -> query("SELECT COUNT(*) FROM cedula WHERE TechoOtro = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $techo_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (MunicipioNom = '" . $mun . "') AND (TechoConc IS NULL OR TechoConc = 0) AND (TechoGalv IS NULL OR TechoGalv = 0) AND (TechoMade IS NULL OR TechoMade = 0) AND (TechoCart IS NULL OR TechoCart = 0) AND (TechoOtro IS NULL OR TechoOtro = 0);") -> fetch_row()[0];
        
        $pared_tabi = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PareTabiq = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $pared_adob = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PareAdobe = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $pared_bloc = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PareBlock = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $pared_made = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PareMader = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $pared_pied = $conn -> query("SELECT COUNT(*) FROM cedula WHERE ParePiedr = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $pared_cart = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PareCarto = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $pared_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (MunicipioNom = '" . $mun . "') AND (PareTabiq IS NULL OR PareTabiq = 0) AND (PareAdobe IS NULL OR PareAdobe = 0) AND (PareBlock IS NULL OR PareBlock = 0) AND (PareMader IS NULL OR PareMader = 0) AND (ParePiedr IS NULL OR ParePiedr = 0) AND (PareCarto IS NULL OR PareCarto = 0);") -> fetch_row()[0];

        $piso_ceme = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PisoCemen = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $piso_made = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PisoMader = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $piso_tier = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PisoTierr = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $piso_pied = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PisoPiedr = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $piso_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (MunicipioNom = '" . $mun . "') AND (PisoCemen IS NULL OR PisoCemen = 0) AND (PisoMader IS NULL OR PisoMader = 0) AND (PisoTierr IS NULL OR PisoTierr = 0) AND (PisoPiedr IS NULL OR PisoPiedr = 0);") -> fetch_row()[0];

        $agus_pot = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AgUsoPota = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $agus_nor = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AgUsoNori = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $agus_rio = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AgUsoRio = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $agus_llu = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AgUsoLluv = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $agus_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (MunicipioNom = '" . $mun . "') AND (AgUsoPota IS NULL OR AgUsoPota = 0) AND (AgUsoNori IS NULL OR AgUsoNori = 0) AND (AgUsoRio IS NULL OR AgUsoRio = 0) AND (AgUsoLluv IS NULL OR AgUsoLluv = 0);") -> fetch_row()[0];

        $agco_pot = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AgConPota = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $agco_pur = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AgConPuri = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $agco_her = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AgConHerv = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $agco_clo = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AgConClor = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $agco_fil = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AgConFilt = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $agco_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (MunicipioNom = '" . $mun . "') AND (AgConPota IS NULL OR AgConPota = 0) AND (AgConPuri IS NULL OR AgConPuri = 0) AND (AgConHerv IS NULL OR AgConHerv = 0) AND (AgConClor IS NULL OR AgConClor = 0) AND (AgConFilt IS NULL OR AgConFilt = 0);") -> fetch_row()[0];

        $exc_fo = $conn -> query("SELECT COUNT(*) FROM cedula WHERE ExcFoSep = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $exc_le = $conn -> query("SELECT COUNT(*) FROM cedula WHERE ExcLetri = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $exc_ra = $conn -> query("SELECT COUNT(*) FROM cedula WHERE ExcRasSu = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $exc_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (MunicipioNom = '" . $mun . "') AND (ExcFoSep IS NULL OR ExcFoSep = 0) AND (ExcLetri IS NULL OR ExcLetri = 0) AND (ExcRasSu IS NULL OR ExcRasSu = 0);") -> fetch_row()[0];

        $comb_ga = $conn -> query("SELECT COUNT(*) FROM cedula WHERE CombGas = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $comb_ca = $conn -> query("SELECT COUNT(*) FROM cedula WHERE CombCar = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $comb_le = $conn -> query("SELECT COUNT(*) FROM cedula WHERE CombLen = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $comb_ot = $conn -> query("SELECT COUNT(*) FROM cedula WHERE CombOtr = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $comb_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (MunicipioNom = '" . $mun . "') AND (CombGas IS NULL OR CombGas = 0) AND (CombCar IS NULL OR CombCar = 0) AND (CombLen IS NULL OR CombLen = 0) AND (CombOtr IS NULL OR CombOtr = 0);") -> fetch_row()[0];

        $bas_re = $conn -> query("SELECT COUNT(*) FROM cedula WHERE BasRedM = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $bas_en = $conn -> query("SELECT COUNT(*) FROM cedula WHERE BasEnte = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $bas_ci = $conn -> query("SELECT COUNT(*) FROM cedula WHERE BasCieAb = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $bas_in = $conn -> query("SELECT COUNT(*) FROM cedula WHERE BasInci = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $bas_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (MunicipioNom = '" . $mun . "') AND (BasRedM IS NULL OR BasRedM = 0) AND (BasEnte IS NULL OR BasEnte = 0) AND (BasCieAb IS NULL OR BasCieAb = 0) AND (BasInci IS NULL OR BasInci = 0);") -> fetch_row()[0];

        $alu_re = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AlumRedE = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $alu_ve = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AlumVela = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $alu_qu = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AlumQuin = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $alu_pl = $conn -> query("SELECT COUNT(*) FROM cedula WHERE AlumPlaS = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $alu_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (MunicipioNom = '" . $mun . "') AND (AlumRedE IS NULL OR AlumRedE = 0) AND (AlumVela IS NULL OR AlumVela = 0) AND (AlumQuin IS NULL OR AlumQuin = 0) AND (AlumPlaS IS NULL OR AlumPlaS = 0);") -> fetch_row()[0];

        $dh_numhab = $conn -> query("SELECT SUM(NumHab) FROM cedula WHERE MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $dh_rec = $conn -> query("SELECT COUNT(*) FROM cedula WHERE Recam = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $dh_est = $conn -> query("SELECT COUNT(*) FROM cedula WHERE Estan = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $dh_com = $conn -> query("SELECT COUNT(*) FROM cedula WHERE Comed = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $dh_mul = $conn -> query("SELECT COUNT(*) FROM cedula WHERE Multi = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $dh_coc = $conn -> query("SELECT COUNT(*) FROM cedula WHERE Cocin = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];

        $habviv_1 = $conn -> query("SELECT COUNT(*) FROM cedula WHERE NumHab = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $habviv_2 = $conn -> query("SELECT COUNT(*) FROM cedula WHERE NumHab = 2 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $habviv_3 = $conn -> query("SELECT COUNT(*) FROM cedula WHERE NumHab = 3 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $habviv_4 = $conn -> query("SELECT COUNT(*) FROM cedula WHERE NumHab >= 4 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $habviv_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (MunicipioNom = '" . $mun . "') AND (NumHab IS NULL OR NumHab = 0);") -> fetch_row()[0];

        $pueind_tara = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PueIndTara = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $pueind_tepe = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PueIndTepe = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $pueind_wuar = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PueIndWuar = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $pueind_pima = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PueIndPima = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $pueind_meno = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PueIndMeno = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $pueind_otro = $conn -> query("SELECT COUNT(*) FROM cedula WHERE PueIndOtro = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $pueind_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (MunicipioNom = '" . $mun . "') AND (PueIndTara IS NULL OR PueIndTara = 0) AND (PueIndTepe IS NULL OR PueIndTepe = 0) AND (PueIndWuar IS NULL OR PueIndWuar = 0) AND (PueIndPima IS NULL OR PueIndPima = 0) AND (PueIndMeno IS NULL OR PueIndMeno = 0) AND (PueIndOtro IS NULL OR PueIndOtro = 0);") -> fetch_row()[0];

        $dere_INSABI = $conn -> query("SELECT COUNT(*) FROM cedula WHERE DerechINSABI = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $dere_IMSS = $conn -> query("SELECT COUNT(*) FROM cedula WHERE DerechIMSS = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $dere_ISSSTE = $conn -> query("SELECT COUNT(*) FROM cedula WHERE DerechISSSTE = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $dere_PEMEX = $conn -> query("SELECT COUNT(*) FROM cedula WHERE DerechPEMEX = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $dere_SEDENA = $conn -> query("SELECT COUNT(*) FROM cedula WHERE DerechSEDENA = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $dere_Otro = $conn -> query("SELECT COUNT(*) FROM cedula WHERE DerechOtro = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $dere_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (MunicipioNom = '" . $mun . "') AND (DerechINSABI IS NULL OR DerechINSABI = 0) AND (DerechIMSS IS NULL OR DerechIMSS = 0) AND (DerechISSSTE IS NULL OR DerechISSSTE = 0) AND (DerechPEMEX IS NULL OR DerechPEMEX = 0) AND (DerechSEDENA IS NULL OR DerechSEDENA = 0) AND (DerechOtro IS NULL OR DerechOtro = 0);") -> fetch_row()[0];

        $masc_pe = $conn -> query("SELECT SUM(NumPerros) AS Total FROM cedula WHERE MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $masc_ga = $conn -> query("SELECT SUM(NumGatos) AS Total FROM cedula WHERE MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $masc_ot = $conn -> query("SELECT SUM(NumOtros) AS Total FROM cedula WHERE MunicipioNom = '" . $mun . "';") -> fetch_row()[0];

        $sisa_INSABI = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalINSABI = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $sisa_IMSS = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalIMSS = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $sisa_ISSSTE = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalISSSTE = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $sisa_PEMEX = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalPEMEX = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $sisa_SEDENA = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalSEDENA = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $sisa_Otro = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalOtro = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $sisa_Medico = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalMedPar = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $sisa_Clinica = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalCliPar = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $sisa_Partera = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalParter = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $sisa_Curandera = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalCurand = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $sisa_Yerbero = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalYerber = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $sisa_Huesero = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalHueser = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $sisa_Boticario = $conn -> query("SELECT COUNT(*) FROM cedula WHERE SisSalBotica = 1 AND MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $sisa_nd = $conn -> query("SELECT COUNT(*) FROM cedula WHERE (MunicipioNom = '" . $mun . "') AND (SisSalINSABI IS NULL OR SisSalINSABI = 0) AND " .
        "(SisSalIMSS IS NULL OR SisSalIMSS = 0) AND (SisSalISSSTE IS NULL OR SisSalISSSTE = 0) AND (SisSalPEMEX IS NULL OR SisSalPEMEX = 0) AND " .
        "(SisSalSEDENA IS NULL OR SisSalSEDENA = 0) AND (SisSalOtro IS NULL OR SisSalOtro = 0) AND (SisSalMedPar IS NULL OR SisSalMedPar = 0) AND " .
        "(SisSalCliPar IS NULL OR SisSalCliPar = 0) AND (SisSalParter IS NULL OR SisSalParter = 0) AND (SisSalCurand IS NULL OR SisSalCurand = 0) AND " .
        "(SisSalYerber IS NULL OR SisSalYerber = 0) AND (SisSalHueser IS NULL OR SisSalHueser = 0) AND (SisSalBotica IS NULL OR SisSalBotica = 0);") -> fetch_row()[0];

        $edho_4 = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Genero = 'Hombre' AND familia.Edad <= 4 AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $edho_59 = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Genero = 'Hombre' AND familia.Edad >= 4 AND familia.Edad <= 9 AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $edho_1017 = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Genero = 'Hombre' AND familia.Edad >= 10 AND familia.Edad <= 17 AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $edho_1859 = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Genero = 'Hombre' AND familia.Edad >= 18 AND familia.Edad <= 59 AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $edho_60 = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Genero = 'Hombre' AND familia.Edad >= 60 AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $edho_nd = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Genero = 'Hombre' AND familia.Edad IS NULL AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        
        $edmu_4 = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Genero = 'Mujer' AND familia.Edad <= 4 AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $edmu_59 = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Genero = 'Mujer' AND familia.Edad >= 4 AND familia.Edad <= 9 AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $edmu_1017 = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Genero = 'Mujer' AND familia.Edad >= 10 AND familia.Edad <= 17 AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $edmu_1859 = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Genero = 'Mujer' AND familia.Edad >= 18 AND familia.Edad <= 59 AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $edmu_60 = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Genero = 'Mujer' AND familia.Edad >= 60 AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $edmu_nd = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Genero = 'Mujer' AND familia.Edad IS NULL AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        
        $lenmat_espa = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.LenMat = 'Español' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $lenmat_tara = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.LenMat = 'Tarahumara' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $lenmat_tepe = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.LenMat = 'Tepehuan' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $lenmat_wuar = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.LenMat = 'Wuarojio' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $lenmat_pima = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.LenMat = 'Pima' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $lenmat_meno = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.LenMat = 'Menonita' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $lenmat_otro = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.LenMat = 'Otro' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $lenmat_nd = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON (familia.LenMat IS NULL OR familia.LenMat = '' OR familia.LenMat = 'ND') AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];

        $sexo_ho = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Genero = 'Hombre' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $sexo_mu = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Genero = 'Mujer' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $sexo_nd = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON (familia.Genero IS NULL OR familia.Genero = '' OR familia.Genero = 'ND') AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];

        $estciv_cas = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.EstCiv = 'Casado' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $estciv_sol = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.EstCiv = 'Soltero' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $estciv_uni = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.EstCiv = 'Unión Libre' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $estciv_div = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.EstCiv = 'Divorviado' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $estciv_viu = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.EstCiv = 'Viudo' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $estciv_sep = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.EstCiv = 'Separado' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $estciv_nd = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON (familia.EstCiv IS NULL OR familia.EstCiv = '' OR familia.EstCiv = 'ND') AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];

        $pare_pad = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Parente = 'Padre' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $pare_mad = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Parente = 'Madre' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $pare_hij = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Parente = 'Hijo' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $pare_par = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Parente = 'Pariente' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $pare_otr = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Parente = 'Otro' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $pare_nd = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON (familia.Parente IS NULL OR familia.Parente = '' OR familia.Parente = 'ND') AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];

        $esco_pree = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Escola = 'Preescolar' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $esco_prim = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Escola = 'Primaria' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $esco_secu = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Escola = 'Secundaria' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $esco_prep = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Escola = 'Preparatoria' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $esco_tecn = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Escola = 'Técnico' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $esco_prof = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Escola = 'Profesional' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $esco_posg = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Escola = 'Posgrado' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $esco_noas = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Escola = 'No asiste a la escuela' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $esco_sale = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Escola = 'Sabe leer y escribir' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $esco_anal = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Escola = 'Analfabeta' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $esco_nd = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON (familia.Escola IS NULL OR familia.Escola = '' OR familia.Escola = 'ND') AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];

        $ocu_hog = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Ocupa = 'Hogar' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $ocu_est = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Ocupa = 'Estudiante' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $ocu_emp = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Ocupa = 'Empleado' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $ocu_des = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Ocupa = 'Desempleado' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $ocu_por = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Ocupa = 'Por cuenta propia' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $ocu_nd = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON (familia.Ocupa IS NULL OR familia.Ocupa = '' OR familia.Ocupa = 'ND') AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];

        $ingre_menor = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Ingres = 'Menor al salario mínimo' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $ingre_igual = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Ingres = 'Igual al salario mínimo' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $ingre_mayor = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Ingres = 'Mayor al salario mínimo' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $ingre_nd = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON (familia.Ingres IS NULL OR familia.Ingres = '' OR familia.Ingres = 'ND') AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];

        $det_pap = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Papani = 1 AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $det_hip = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Hipert = 1 AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $det_dia = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Diabet = 1 AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $det_tub = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Tuberc = 1 AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $det_alc = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Alcoho = 1 AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $det_tab = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Tabaqu = 1 AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $det_can = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Cancer = 1 AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];

        $plan_diu = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Diu = 1 AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $plan_ora = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Orales = 1 AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $plan_pre = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Preser = 1 AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $plan_inm = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.InyMens = 1 AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $plan_inb = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.InyBien = 1 AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $plan_sal = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Salping = 1 AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $plan_imp = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Implant = 1 AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];

        $emb_si = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Genero = 'Mujer' AND (familia.Embaraz = 'Sí' OR Embaraz = 'En Control') AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $emb_ec = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Genero = 'Mujer' AND familia.Embaraz = 'En Control' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];

        $bcr_di = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Bacamro = 'Diario' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $bcr_tr = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Bacamro = 'Tres veces por semana' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $bcr_do = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Bacamro = 'Dos veces por semana' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $bcr_nu = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Bacamro = 'Nunca' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $bcr_nd = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON (familia.Bacamro IS NULL OR familia.Bacamro = '' OR familia.Bacamro = 'ND') AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        
        $ld_di = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.LavDien = 'Diario' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $ld_tr = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.LavDien = 'Tres veces por semana' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $ld_do = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.LavDien = 'Dos veces por semana' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $ld_nu = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.LavDien = 'Nunca' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $ld_nd = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON (familia.LavDien IS NULL OR familia.LavDien = '' OR familia.LavDien = 'ND') AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];

        $lv_di = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.LimVivi = 'Diario' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $lv_tr = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.LimVivi = 'Tres veces por semana' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $lv_do = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.LimVivi = 'Dos veces por semana' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $lv_nu = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.LimVivi = 'Nunca' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $lv_nd = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON (familia.LimVivi IS NULL OR familia.LimVivi = '' OR familia.LimVivi = 'ND') AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];

        $ba_di = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.BebAlco = 'Diario' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $ba_tr = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.BebAlco = 'Tres veces por semana' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $ba_do = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.BebAlco = 'Dos veces por semana' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $ba_nu = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.BebAlco = 'Nunca' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $ba_nd = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON (familia.BebAlco IS NULL OR familia.BebAlco = '' OR familia.BebAlco = 'ND') AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];

        $ta_di = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Tabaco = 'Diario' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $ta_tr = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Tabaco = 'Tres veces por semana' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $ta_do = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Tabaco = 'Dos veces por semana' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $ta_nu = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Tabaco = 'Nunca' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $ta_nd = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON (familia.Tabaco IS NULL OR familia.Tabaco = '' OR familia.Tabaco = 'ND') AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];

        $med_di = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Medica = 'Diario' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $med_tr = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Medica = 'Tres veces por semana' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $med_do = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Medica = 'Dos veces por semana' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $med_nu = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Medica = 'Nunca' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $med_nd = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON (familia.Medica IS NULL OR familia.Medica = '' OR familia.Medica = 'ND') AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        
        $dro_di = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Drogas = 'Diario' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $dro_tr = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Drogas = 'Tres veces por semana' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $dro_do = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Drogas = 'Dos veces por semana' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $dro_nu = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON familia.Drogas = 'Nunca' AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
        $dro_nd = $conn -> query("SELECT COUNT(*) FROM familia INNER JOIN cedula ON (familia.Drogas IS NULL OR familia.Drogas = '' OR familia.Drogas = 'ND') AND familia.CedulaId = cedula.ID AND cedula.MunicipioNom = '" . $mun . "';") -> fetch_row()[0];
    }

    mysqli_close($conn);
    
    //'municipios' => $municipios, 
    echo json_encode(
        array('localidades' => $localidades, 'cedulas' => $cedulas, 'cantidad_localidades' => $cantidad_localidades, 'viviendas' => $viviendas, 'poblacion' => $poblacion, 
        'techo_conc' => $techo_conc, 'techo_galv' => $techo_galv, 'techo_made' => $techo_made, 'techo_cart' => $techo_cart, 'techo_otro' => $techo_otro, 'techo_nd' => $techo_nd, 
        'pared_tabi' => $pared_tabi, 'pared_adob' => $pared_adob, 'pared_bloc' => $pared_bloc, 'pared_made' => $pared_made, 'pared_pied' => $pared_pied, 'pared_cart' => $pared_cart, 'pared_nd' => $pared_nd, 
        'piso_ceme' => $piso_ceme, 'piso_made' => $piso_made, 'piso_tier' => $piso_tier, 'piso_pied' => $piso_pied, 'piso_nd' => $piso_nd, 
        'agus_pot' => $agus_pot, 'agus_nor' => $agus_nor, 'agus_rio' => $agus_rio, 'agus_llu' => $agus_llu, 'agus_nd' => $agus_nd, 
        'agco_pot' => $agco_pot, 'agco_pur' => $agco_pur, 'agco_her' => $agco_her, 'agco_clo' => $agco_clo, 'agco_fil' => $agco_fil, 'agco_nd' => $agco_nd, 
        'exc_fo' => $exc_fo, 'exc_le' => $exc_le, 'exc_ra' => $exc_ra, 'exc_nd' => $exc_nd, 
        'comb_ga' => $comb_ga, 'comb_ca' => $comb_ca, 'comb_le' => $comb_le, 'comb_ot' => $comb_ot, 'comb_nd' => $comb_nd, 
        'bas_re' => $bas_re, 'bas_en' => $bas_en, 'bas_ci' => $bas_ci, 'bas_in' => $bas_in, 'bas_nd' => $bas_nd, 
        'alu_re' => $alu_re, 'alu_ve' => $alu_ve, 'alu_qu' => $alu_qu, 'alu_pl' => $alu_pl, 'alu_nd' => $alu_nd, 
        'dh_numhab' => $dh_numhab, 'dh_rec' => $dh_rec, 'dh_est' => $dh_est, 'dh_com' => $dh_com, 'dh_mul' => $dh_mul, 'dh_coc' => $dh_coc, 
        'habviv_1' => $habviv_1, 'habviv_2' => $habviv_2, 'habviv_3' => $habviv_3, 'habviv_4' => $habviv_4, 'habviv_nd' => $habviv_nd, 
        'pueind_tara' => $pueind_tara, 'pueind_tepe' => $pueind_tepe, 'pueind_wuar' => $pueind_wuar, 'pueind_pima' => $pueind_pima, 'pueind_meno' => $pueind_meno, 'pueind_otro' => $pueind_otro, 'pueind_nd' => $pueind_nd, 
        'dere_INSABI' => $dere_INSABI, 'dere_IMSS' => $dere_IMSS, 'dere_ISSSTE' => $dere_ISSSTE, 'dere_PEMEX' => $dere_PEMEX, 'dere_SEDENA' => $dere_SEDENA, 'dere_Otro' => $dere_Otro, 'dere_nd' => $dere_nd, 
        'masc_pe' => $masc_pe, 'masc_ga' => $masc_ga, 'masc_ot' => $masc_ot, 
        'sisa_INSABI' => $sisa_INSABI, 'sisa_IMSS' => $sisa_IMSS, 'sisa_ISSSTE' => $sisa_ISSSTE, 'sisa_PEMEX' => $sisa_PEMEX, 'sisa_SEDENA' => $sisa_SEDENA, 'sisa_Otro' => $sisa_Otro, 'sisa_Medico' => $sisa_Medico, 'sisa_Clinica' => $sisa_Clinica, 'sisa_Partera' => $sisa_Partera, 'sisa_Curandera' => $sisa_Curandera, 'sisa_Yerbero' => $sisa_Yerbero, 'sisa_Huesero' => $sisa_Huesero, 'sisa_Boticario' => $sisa_Boticario, 'sisa_nd' => $sisa_nd, 
        'edho_4' => $edho_4, 'edho_59' => $edho_59, 'edho_1017' => $edho_1017, 'edho_1859' => $edho_1859, 'edho_60' => $edho_60, 'edho_nd' => $edho_nd, 
        'edmu_4' => $edmu_4, 'edmu_59' => $edmu_59, 'edmu_1017' => $edmu_1017, 'edmu_1859' => $edmu_1859, 'edmu_60' => $edmu_60, 'edmu_nd' => $edmu_nd, 
        'lenmat_espa' => $lenmat_espa, 'lenmat_tara' => $lenmat_tara, 'lenmat_tepe' => $lenmat_tepe, 'lenmat_wuar' => $lenmat_wuar, 'lenmat_pima' => $lenmat_pima, 'lenmat_meno' => $lenmat_meno, 'lenmat_otro' => $lenmat_otro, 'lenmat_nd' => $lenmat_nd, 
        'sexo_ho' => $sexo_ho, 'sexo_mu' => $sexo_mu, 'sexo_nd' => $sexo_nd, 
        'estciv_cas' => $estciv_cas, 'estciv_sol' => $estciv_sol, 'estciv_uni' => $estciv_uni, 'estciv_div' => $estciv_div, 'estciv_viu' => $estciv_viu, 'estciv_sep' => $estciv_sep, 'estciv_nd' => $estciv_nd, 
        'pare_pad' => $pare_pad, 'pare_mad' => $pare_mad, 'pare_hij' => $pare_hij, 'pare_par' => $pare_par, 'pare_otr' => $pare_otr, 'pare_nd' => $pare_nd, 
        'esco_pree' => $esco_pree, 'esco_prim' => $esco_prim, 'esco_secu' => $esco_secu, 'esco_prep' => $esco_prep, 'esco_tecn' => $esco_tecn, 'esco_prof' => $esco_prof, 'esco_posg' => $esco_posg, 'esco_noas' => $esco_noas, 'esco_sale' => $esco_sale, 'esco_anal' => $esco_anal, 'esco_nd' => $esco_nd, 
        'ocu_hog' => $ocu_hog, 'ocu_est' => $ocu_est, 'ocu_emp' => $ocu_emp, 'ocu_des' => $ocu_des, 'ocu_por' => $ocu_por, 'ocu_nd' => $ocu_nd, 
        'ingre_menor' => $ingre_menor, 'ingre_igual' => $ingre_igual, 'ingre_mayor' => $ingre_mayor, 'ingre_nd' => $ingre_nd, 
        'det_pap' => $det_pap, 'det_hip' => $det_hip, 'det_dia' => $det_dia, 'det_tub' => $det_tub, 'det_alc' => $det_alc, 'det_tab' => $det_tab, 'det_can' => $det_can, 
        'plan_diu' => $plan_diu, 'plan_ora' => $plan_ora, 'plan_pre' => $plan_pre, 'plan_inm' => $plan_inm, 'plan_inb' => $plan_inb, 'plan_sal' => $plan_sal, 'plan_imp' => $plan_imp, 
        'emb_si' => $emb_si, 'emb_ec' => $emb_ec, 
        'bcr_di' => $bcr_di, 'bcr_tr' => $bcr_tr, 'bcr_do' => $bcr_do, 'bcr_nu' => $bcr_nu, 'bcr_nd' => $bcr_nd, 
        'ld_di' => $ld_di, 'ld_tr' => $ld_tr, 'ld_do' => $ld_do, 'ld_nu' => $ld_nu, 'ld_nd' => $ld_nd, 
        'lv_di' => $lv_di, 'lv_tr' => $lv_tr, 'lv_do' => $lv_do, 'lv_nu' => $lv_nu, 'lv_nd' => $lv_nd, 
        'ba_di' => $ba_di, 'ba_tr' => $ba_tr, 'ba_do' => $ba_do, 'ba_nu' => $ba_nu, 'ba_nd' => $ba_nd, 
        'ta_di' => $ta_di, 'ta_tr' => $ta_tr, 'ta_do' => $ta_do, 'ta_nu' => $ta_nu, 'ta_nd' => $ta_nd, 
        'med_di' => $med_di, 'med_tr' => $med_tr, 'med_do' => $med_do, 'med_nu' => $med_nu, 'med_nd' => $med_nd, 
        'dro_di' => $dro_di, 'dro_tr' => $dro_tr, 'dro_do' => $dro_do, 'dro_nu' => $dro_nu, 'dro_nd' => $dro_nd)
    );
    exit();

?>