<?php
    include "../session/verify.php";
    include "../../model/connection.php";

    $table = $conn -> real_escape_string($_GET['type']);
    $mun = $conn -> real_escape_string($_GET['from']);
    $data = $conn -> real_escape_string($_GET['data']);

    $title = "";
    $o = "";
    $query = "";
    $result = "";

    if($table == "Ced") {
        $title = "cedulas.txt";
        $mun == "ALL" ? $mun = " WHERE (MunicipioNom != '')" : $mun = " WHERE (MunicipioNom = '$mun')";
        $query = "SELECT * FROM cedula" . $mun . getArgs($data) . ";";
        $result = mysqli_query($conn, $query);
        $o = 'ID' . "\t" . 'UsuarioId' . "\t" . 'MunicipioNum' . "\t" . 'MunicipioNom' . "\t" . 'LocalidadNum' . "\t" . 'LocalidadNom' . "\t" . 'Unidad' . "\t" . 'AsistSoc' . "\t" . 'TipoLoc' . "\t" . 'SedeVm' . "\t" . 'SedeVk' . "\t" . 'SedePm' . "\t" . 'SedePk' . "\t" . 'SubsVm' . "\t" . 'SubsVk' . "\t" . 'SubsPm' . "\t" . 'SubsPk' . "\t" . 'FecRegCed' . "\t" . 'TechoConc' . "\t" . 'TechoGalv' . "\t" . 'TechoMade' . "\t" . 'TechoCart' . "\t" . 'TechoOtro' . "\t" . 'PareTabiq' . "\t" . 'PareAdobe' . "\t" . 'PareBlock' . "\t" . 'PareMader' . "\t" . 'ParePiedr' . "\t" . 'PareCarto' . "\t" . 'PisoCemen' . "\t" . 'PisoMader' . "\t" . 'PisoTierr' . "\t" . 'PisoPiedr' . "\t" . 'AgUsoPota' . "\t" . 'AgUsoNori' . "\t" . 'AgUsoRio' . "\t" . 'AgUsoLluv' . "\t" . 'AgConPota' . "\t" . 'AgConPuri' . "\t" . 'AgConHerv' . "\t" . 'AgConClor' . "\t" . 'AgConFilt' . "\t" . 'ExcFoSep' . "\t" . 'ExcLetri' . "\t" . 'ExcRasSu' . "\t" . 'CombGas' . "\t" . 'CombCar' . "\t" . 'CombLen' . "\t" . 'CombOtr' . "\t" . 'BasRedM' . "\t" . 'BasEnte' . "\t" . 'BasCieAb' . "\t" . 'BasInci' . "\t" . 'AlumRedE' . "\t" . 'AlumVela' . "\t" . 'AlumQuin' . "\t" . 'AlumPlaS' . "\t" . 'NumHab' . "\t" . 'Recam' . "\t" . 'Estan' . "\t" . 'Comed' . "\t" . 'Multi' . "\t" . 'Cocin' . "\t" . 'FecRegViv' . "\t" . 'PueIndTara' . "\t" . 'PueIndTepe' . "\t" . 'PueIndWuar' . "\t" . 'PueIndPima' . "\t" . 'PueIndMeno' . "\t" . 'PueIndOtro' . "\t" . 'DerechINSABI' . "\t" . 'DerechIMSS' . "\t" . 'DerechISSSTE' . "\t" . 'DerechPEMEX' . "\t" . 'DerechSEDENA' . "\t" . 'DerechOtro' . "\t" . 'NumPerros' . "\t" . 'NumGatos' . "\t" . 'NumOtros' . "\t" . 'SisSalINSABI' . "\t" . 'SisSalIMSS' . "\t" . 'SisSalISSSTE' . "\t" . 'SisSalPEMEX' . "\t" . 'SisSalSEDENA' . "\t" . 'SisSalOtro' . "\t" . 'SisSalMedPar' . "\t" . 'SisSalCliPar' . "\t" . 'SisSalParter' . "\t" . 'SisSalCurand' . "\t" . 'SisSalYerber' . "\t" . 'SisSalHueser' . "\t" . 'SisSalBotica' . "\t" . 'Comentario' . "\t" . 'FecRegGen' . "\t" . 'NumInteg' . "\t" . 'OrigCapt' . "\n";
        foreach ($result as $row) {
            $o = $o . $row['ID'] . "\t" . $row['UsuarioId'] . "\t" . $row['MunicipioNum'] . "\t" . $row['MunicipioNom'] . "\t" . $row['LocalidadNum'] . "\t" . $row['LocalidadNom'] . "\t" . $row['Unidad'] . "\t" . $row['AsistSoc'] . "\t" . $row['TipoLoc'] . "\t" . $row['SedeVm'] . "\t" . $row['SedeVk'] . "\t" . $row['SedePm'] . "\t" . $row['SedePk'] . "\t" . $row['SubsVm'] . "\t" . $row['SubsVk'] . "\t" . $row['SubsPm'] . "\t" . $row['SubsPk'] . "\t" . $row['FecRegCed'] . "\t" . $row['TechoConc'] . "\t" . $row['TechoGalv'] . "\t" . $row['TechoMade'] . "\t" . $row['TechoCart'] . "\t" . $row['TechoOtro'] . "\t" . $row['PareTabiq'] . "\t" . $row['PareAdobe'] . "\t" . $row['PareBlock'] . "\t" . $row['PareMader'] . "\t" . $row['ParePiedr'] . "\t" . $row['PareCarto'] . "\t" . $row['PisoCemen'] . "\t" . $row['PisoMader'] . "\t" . $row['PisoTierr'] . "\t" . $row['PisoPiedr'] . "\t" . $row['AgUsoPota'] . "\t" . $row['AgUsoNori'] . "\t" . $row['AgUsoRio'] . "\t" . $row['AgUsoLluv'] . "\t" . $row['AgConPota'] . "\t" . $row['AgConPuri'] . "\t" . $row['AgConHerv'] . "\t" . $row['AgConClor'] . "\t" . $row['AgConFilt'] . "\t" . $row['ExcFoSep'] . "\t" . $row['ExcLetri'] . "\t" . $row['ExcRasSu'] . "\t" . $row['CombGas'] . "\t" . $row['CombCar'] . "\t" . $row['CombLen'] . "\t" . $row['CombOtr'] . "\t" . $row['BasRedM'] . "\t" . $row['BasEnte'] . "\t" . $row['BasCieAb'] . "\t" . $row['BasInci'] . "\t" . $row['AlumRedE'] . "\t" . $row['AlumVela'] . "\t" . $row['AlumQuin'] . "\t" . $row['AlumPlaS'] . "\t" . $row['NumHab'] . "\t" . $row['Recam'] . "\t" . $row['Estan'] . "\t" . $row['Comed'] . "\t" . $row['Multi'] . "\t" . $row['Cocin'] . "\t" . $row['FecRegViv'] . "\t" . $row['PueIndTara'] . "\t" . $row['PueIndTepe'] . "\t" . $row['PueIndWuar'] . "\t" . $row['PueIndPima'] . "\t" . $row['PueIndMeno'] . "\t" . $row['PueIndOtro'] . "\t" . $row['DerechINSABI'] . "\t" . $row['DerechIMSS'] . "\t" . $row['DerechISSSTE'] . "\t" . $row['DerechPEMEX'] . "\t" . $row['DerechSEDENA'] . "\t" . $row['DerechOtro'] . "\t" . $row['NumPerros'] . "\t" . $row['NumGatos'] . "\t" . $row['NumOtros'] . "\t" . $row['SisSalINSABI'] . "\t" . $row['SisSalIMSS'] . "\t" . $row['SisSalISSSTE'] . "\t" . $row['SisSalPEMEX'] . "\t" . $row['SisSalSEDENA'] . "\t" . $row['SisSalOtro'] . "\t" . $row['SisSalMedPar'] . "\t" . $row['SisSalCliPar'] . "\t" . $row['SisSalParter'] . "\t" . $row['SisSalCurand'] . "\t" . $row['SisSalYerber'] . "\t" . $row['SisSalHueser'] . "\t" . $row['SisSalBotica'] . "\t" . $row['Comentario'] . "\t" . $row['FecRegGen'] . "\t" . $row['NumInteg'] . "\t" . $row['OrigCapt'] . "\n";
        }
    }elseif($table == "Int") {
        $title = "integrantes.txt";
        $mun == "ALL" ? $mun = " WHERE (cedula.MunicipioNom != '')" : $mun = " WHERE (cedula.MunicipioNom = '$mun')";
        $query = "SELECT * FROM cedula, familia" . $mun . " AND cedula.ID = familia.CedulaId" . getArgs($data) . " ORDER BY familia.ID ASC;";
        $result = mysqli_query($conn, $query);
        $o = "ID" . "\t" . "CedulaId" . "\t" . "NumInt" . "\t" . "Apelli1" . "\t" . "Apelli2" . "\t" . "Nombres" . "\t" . "FecNac" . "\t" . "Edad" . "\t" . "Genero" . "\t" . "EstOrig" . "\t" . "LenMat" . "\t" . "EstCiv" . "\t" . "Parente" . "\t" . "Escola" . "\t" . "Ocupa" . "\t" . "Ingres" . "\t" . "Papani" . "\t" . "Hipert" . "\t" . "Diabet" . "\t" . "Tuberc" . "\t" . "Alcoho" . "\t" . "Tabaqu" . "\t" . "Cancer" . "\t" . "Diu" . "\t" . "Orales" . "\t" . "Preser" . "\t" . "InyMens" . "\t" . "InyBien" . "\t" . "Salping" . "\t" . "Implant" . "\t" . "Embaraz" . "\t" . "Bacamro" . "\t" . "LavDien" . "\t" . "LimVivi" . "\t" . "BebAlco" . "\t" . "Tabaco" . "\t" . "Medica" . "\t" . "Drogas" . "\t" . "FecRegInt" . "\n";
        foreach ($result as $row) {
            $o = $o . $row["ID"] . "\t" . $row["CedulaId"] . "\t" . $row["NumInt"] . "\t" . $row["Apelli1"] . "\t" . $row["Apelli2"] . "\t" . $row["Nombres"] . "\t" . $row["FecNac"] . "\t" . $row["Edad"] . "\t" . $row["Genero"] . "\t" . $row["EstOrig"] . "\t" . $row["LenMat"] . "\t" . $row["EstCiv"] . "\t" . $row["Parente"] . "\t" . $row["Escola"] . "\t" . $row["Ocupa"] . "\t" . $row["Ingres"] . "\t" . $row["Papani"] . "\t" . $row["Hipert"] . "\t" . $row["Diabet"] . "\t" . $row["Tuberc"] . "\t" . $row["Alcoho"] . "\t" . $row["Tabaqu"] . "\t" . $row["Cancer"] . "\t" . $row["Diu"] . "\t" . $row["Orales"] . "\t" . $row["Preser"] . "\t" . $row["InyMens"] . "\t" . $row["InyBien"] . "\t" . $row["Salping"] . "\t" . $row["Implant"] . "\t" . $row["Embaraz"] . "\t" . $row["Bacamro"] . "\t" . $row["LavDien"] . "\t" . $row["LimVivi"] . "\t" . $row["BebAlco"] . "\t" . $row["Tabaco"] . "\t" . $row["Medica"] . "\t" . $row["Drogas"] . "\t" . $row["FecRegInt"] . "\n";
        }
    }elseif($table == "Cid") {
        $title = "cedulas-integrantes.txt";
        $mun == "ALL" ? $mun = " WHERE (cedula.MunicipioNom != '')" : $mun = " WHERE (cedula.MunicipioNom = '$mun')";
        //SELECT DISTINCT(cedula.ID), familia.ID FROM cedula, familia WHERE cedula.ID = familia.CedulaId;
        $query = "SELECT * FROM cedula, familia" . $mun . " AND cedula.ID = familia.CedulaId" . getArgs($data) . " ORDER BY familia.ID ASC;";
        $result = mysqli_query($conn, $query);
        $o = 'CeID' . "\t" . 'UsuarioId' . "\t" . 'MunicipioNum' . "\t" . 'MunicipioNom' . "\t" . 'LocalidadNum' . "\t" . 'LocalidadNom' . "\t" . 'Unidad' . "\t" . 'AsistSoc' . "\t" . 'TipoLoc' . "\t" . 'SedeVm' . "\t" . 'SedeVk' . "\t" . 'SedePm' . "\t" . 'SedePk' . "\t" . 'SubsVm' . "\t" . 'SubsVk' . "\t" . 'SubsPm' . "\t" . 'SubsPk' . "\t" . 'FecRegCed' . "\t" . 'TechoConc' . "\t" . 'TechoGalv' . "\t" . 'TechoMade' . "\t" . 'TechoCart' . "\t" . 'TechoOtro' . "\t" . 'PareTabiq' . "\t" . 'PareAdobe' . "\t" . 'PareBlock' . "\t" . 'PareMader' . "\t" . 'ParePiedr' . "\t" . 'PareCarto' . "\t" . 'PisoCemen' . "\t" . 'PisoMader' . "\t" . 'PisoTierr' . "\t" . 'PisoPiedr' . "\t" . 'AgUsoPota' . "\t" . 'AgUsoNori' . "\t" . 'AgUsoRio' . "\t" . 'AgUsoLluv' . "\t" . 'AgConPota' . "\t" . 'AgConPuri' . "\t" . 'AgConHerv' . "\t" . 'AgConClor' . "\t" . 'AgConFilt' . "\t" . 'ExcFoSep' . "\t" . 'ExcLetri' . "\t" . 'ExcRasSu' . "\t" . 'CombGas' . "\t" . 'CombCar' . "\t" . 'CombLen' . "\t" . 'CombOtr' . "\t" . 'BasRedM' . "\t" . 'BasEnte' . "\t" . 'BasCieAb' . "\t" . 'BasInci' . "\t" . 'AlumRedE' . "\t" . 'AlumVela' . "\t" . 'AlumQuin' . "\t" . 'AlumPlaS' . "\t" . 'NumHab' . "\t" . 'Recam' . "\t" . 'Estan' . "\t" . 'Comed' . "\t" . 'Multi' . "\t" . 'Cocin' . "\t" . 'FecRegViv' . "\t" . 'PueIndTara' . "\t" . 'PueIndTepe' . "\t" . 'PueIndWuar' . "\t" . 'PueIndPima' . "\t" . 'PueIndMeno' . "\t" . 'PueIndOtro' . "\t" . 'DerechINSABI' . "\t" . 'DerechIMSS' . "\t" . 'DerechISSSTE' . "\t" . 'DerechPEMEX' . "\t" . 'DerechSEDENA' . "\t" . 'DerechOtro' . "\t" . 'NumPerros' . "\t" . 'NumGatos' . "\t" . 'NumOtros' . "\t" . 'SisSalINSABI' . "\t" . 'SisSalIMSS' . "\t" . 'SisSalISSSTE' . "\t" . 'SisSalPEMEX' . "\t" . 'SisSalSEDENA' . "\t" . 'SisSalOtro' . "\t" . 'SisSalMedPar' . "\t" . 'SisSalCliPar' . "\t" . 'SisSalParter' . "\t" . 'SisSalCurand' . "\t" . 'SisSalYerber' . "\t" . 'SisSalHueser' . "\t" . 'SisSalBotica' . "\t" . 'Comentario' . "\t" . 'FecRegGen' . "\t" . 'NumInteg' . "\t" . 'OrigCapt' . "\t" . 
        "FamiliaID" . "\t" . "CedulaId" . "\t" . "NumInt" . "\t" . "Apelli1" . "\t" . "Apelli2" . "\t" . "Nombres" . "\t" . "FecNac" . "\t" . "Edad" . "\t" . "Genero" . "\t" . "EstOrig" . "\t" . "LenMat" . "\t" . "EstCiv" . "\t" . "Parente" . "\t" . "Escola" . "\t" . "Ocupa" . "\t" . "Ingres" . "\t" . "Papani" . "\t" . "Hipert" . "\t" . "Diabet" . "\t" . "Tuberc" . "\t" . "Alcoho" . "\t" . "Tabaqu" . "\t" . "Cancer" . "\t" . "Diu" . "\t" . "Orales" . "\t" . "Preser" . "\t" . "InyMens" . "\t" . "InyBien" . "\t" . "Salping" . "\t" . "Implant" . "\t" . "Embaraz" . "\t" . "Bacamro" . "\t" . "LavDien" . "\t" . "LimVivi" . "\t" . "BebAlco" . "\t" . "Tabaco" . "\t" . "Medica" . "\t" . "Drogas" . "\t" . "FecRegInt" . "\n";
        foreach ($result as $row) {
            $o = $o . $row['CedulaId'] . "\t" . $row['UsuarioId'] . "\t" . $row['MunicipioNum'] . "\t" . $row['MunicipioNom'] . "\t" . $row['LocalidadNum'] . "\t" . $row['LocalidadNom'] . "\t" . $row['Unidad'] . "\t" . $row['AsistSoc'] . "\t" . $row['TipoLoc'] . "\t" . $row['SedeVm'] . "\t" . $row['SedeVk'] . "\t" . $row['SedePm'] . "\t" . $row['SedePk'] . "\t" . $row['SubsVm'] . "\t" . $row['SubsVk'] . "\t" . $row['SubsPm'] . "\t" . $row['SubsPk'] . "\t" . $row['FecRegCed'] . "\t" . $row['TechoConc'] . "\t" . $row['TechoGalv'] . "\t" . $row['TechoMade'] . "\t" . $row['TechoCart'] . "\t" . $row['TechoOtro'] . "\t" . $row['PareTabiq'] . "\t" . $row['PareAdobe'] . "\t" . $row['PareBlock'] . "\t" . $row['PareMader'] . "\t" . $row['ParePiedr'] . "\t" . $row['PareCarto'] . "\t" . $row['PisoCemen'] . "\t" . $row['PisoMader'] . "\t" . $row['PisoTierr'] . "\t" . $row['PisoPiedr'] . "\t" . $row['AgUsoPota'] . "\t" . $row['AgUsoNori'] . "\t" . $row['AgUsoRio'] . "\t" . $row['AgUsoLluv'] . "\t" . $row['AgConPota'] . "\t" . $row['AgConPuri'] . "\t" . $row['AgConHerv'] . "\t" . $row['AgConClor'] . "\t" . $row['AgConFilt'] . "\t" . $row['ExcFoSep'] . "\t" . $row['ExcLetri'] . "\t" . $row['ExcRasSu'] . "\t" . $row['CombGas'] . "\t" . $row['CombCar'] . "\t" . $row['CombLen'] . "\t" . $row['CombOtr'] . "\t" . $row['BasRedM'] . "\t" . $row['BasEnte'] . "\t" . $row['BasCieAb'] . "\t" . $row['BasInci'] . "\t" . $row['AlumRedE'] . "\t" . $row['AlumVela'] . "\t" . $row['AlumQuin'] . "\t" . $row['AlumPlaS'] . "\t" . $row['NumHab'] . "\t" . $row['Recam'] . "\t" . $row['Estan'] . "\t" . $row['Comed'] . "\t" . $row['Multi'] . "\t" . $row['Cocin'] . "\t" . $row['FecRegViv'] . "\t" . $row['PueIndTara'] . "\t" . $row['PueIndTepe'] . "\t" . $row['PueIndWuar'] . "\t" . $row['PueIndPima'] . "\t" . $row['PueIndMeno'] . "\t" . $row['PueIndOtro'] . "\t" . $row['DerechINSABI'] . "\t" . $row['DerechIMSS'] . "\t" . $row['DerechISSSTE'] . "\t" . $row['DerechPEMEX'] . "\t" . $row['DerechSEDENA'] . "\t" . $row['DerechOtro'] . "\t" . $row['NumPerros'] . "\t" . $row['NumGatos'] . "\t" . $row['NumOtros'] . "\t" . $row['SisSalINSABI'] . "\t" . $row['SisSalIMSS'] . "\t" . $row['SisSalISSSTE'] . "\t" . $row['SisSalPEMEX'] . "\t" . $row['SisSalSEDENA'] . "\t" . $row['SisSalOtro'] . "\t" . $row['SisSalMedPar'] . "\t" . $row['SisSalCliPar'] . "\t" . $row['SisSalParter'] . "\t" . $row['SisSalCurand'] . "\t" . $row['SisSalYerber'] . "\t" . $row['SisSalHueser'] . "\t" . $row['SisSalBotica'] . "\t" . $row['Comentario'] . "\t" . $row['FecRegGen'] . "\t" . $row['NumInteg'] . "\t" . $row['OrigCapt'] . "\t" . 
            $row["ID"] . "\t" . $row["NumInt"] . "\t" . $row["Apelli1"] . "\t" . $row["Apelli2"] . "\t" . $row["Nombres"] . "\t" . $row["FecNac"] . "\t" . $row["Edad"] . "\t" . $row["Genero"] . "\t" . $row["EstOrig"] . "\t" . $row["LenMat"] . "\t" . $row["EstCiv"] . "\t" . $row["Parente"] . "\t" . $row["Escola"] . "\t" . $row["Ocupa"] . "\t" . $row["Ingres"] . "\t" . $row["Papani"] . "\t" . $row["Hipert"] . "\t" . $row["Diabet"] . "\t" . $row["Tuberc"] . "\t" . $row["Alcoho"] . "\t" . $row["Tabaqu"] . "\t" . $row["Cancer"] . "\t" . $row["Diu"] . "\t" . $row["Orales"] . "\t" . $row["Preser"] . "\t" . $row["InyMens"] . "\t" . $row["InyBien"] . "\t" . $row["Salping"] . "\t" . $row["Implant"] . "\t" . $row["Embaraz"] . "\t" . $row["Bacamro"] . "\t" . $row["LavDien"] . "\t" . $row["LimVivi"] . "\t" . $row["BebAlco"] . "\t" . $row["Tabaco"] . "\t" . $row["Medica"] . "\t" . $row["Drogas"] . "\t" . $row["FecRegInt"] . "\n";
        }
    }

    createFile($title, $o);
    exit();

    function createFile($txt_title, $txt_content){
        $file = "test.txt";
        $txt = fopen($txt_title, "w") or die("Unable to open file!");
        fwrite($txt, $txt_content);
        fclose($txt);
        
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename='.basename($txt_title));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($txt_title));
        header("Content-Type: text/plain");
        readfile($txt_title);
    }

    function getArgs($d){
        if($d == "gen_ced" || $d == "NumHab"){
            $d = "";
        }elseif($d == "Techo") { 
            $d = " AND (TechoConc IS NULL OR TechoConc = 0) AND (TechoGalv IS NULL OR TechoGalv = 0) AND (TechoMade IS NULL OR TechoMade = 0) AND (TechoCart IS NULL OR TechoCart = 0) AND (TechoOtro IS NULL OR TechoOtro = 0)";
        }elseif($d == "Pare") { 
            $d = " AND (PareTabiq IS NULL OR PareTabiq = 0) AND (PareAdobe IS NULL OR PareAdobe = 0) AND (PareBlock IS NULL OR PareBlock = 0) AND (PareMader IS NULL OR PareMader = 0) AND (ParePiedr IS NULL OR ParePiedr = 0) AND (PareCarto IS NULL OR PareCarto = 0)";
        }elseif($d == "Piso") { 
            $d = " AND (PisoCemen IS NULL OR PisoCemen = 0) AND (PisoMader IS NULL OR PisoMader = 0) AND (PisoTierr IS NULL OR PisoTierr = 0) AND (PisoPiedr IS NULL OR PisoPiedr = 0)";
        }elseif($d == "AgUso") { 
            $d = " AND (AgUsoPota IS NULL OR AgUsoPota = 0) AND (AgUsoNori IS NULL OR AgUsoNori = 0) AND (AgUsoRio IS NULL OR AgUsoRio = 0) AND (AgUsoLluv IS NULL OR AgUsoLluv = 0)";
        }elseif($d == "AgCon") { 
            $d = " AND (AgConPota IS NULL OR AgConPota = 0) AND (AgConPuri IS NULL OR AgConPuri = 0) AND (AgConHerv IS NULL OR AgConHerv = 0) AND (AgConClor IS NULL OR AgConClor = 0) AND (AgConFilt IS NULL OR AgConFilt = 0)";
        }elseif($d == "Exc") { 
            $d = " AND (ExcFoSep IS NULL OR ExcFoSep = 0) AND (ExcLetri IS NULL OR ExcLetri = 0) AND (ExcRasSu IS NULL OR ExcRasSu = 0)";
        }elseif($d == "Comb") { 
            $d = " AND (CombGas IS NULL OR CombGas = 0) AND (CombCar IS NULL OR CombCar = 0) AND (CombLen IS NULL OR CombLen = 0) AND (CombOtr IS NULL OR CombOtr = 0)";
        }elseif($d == "Bas") { 
            $d = " AND (BasRedM IS NULL OR BasRedM = 0) AND (BasEnte IS NULL OR BasEnte = 0) AND (BasCieAb IS NULL OR BasCieAb = 0) AND (BasInci IS NULL OR BasInci = 0)";
        }elseif($d == "Alum") { 
            $d = " AND (AlumRedE IS NULL OR AlumRedE = 0) AND (AlumVela IS NULL OR AlumVela = 0) AND (AlumQuin IS NULL OR AlumQuin = 0) AND (AlumPlaS IS NULL OR AlumPlaS = 0)";
        }elseif($d == "Recam") { 
            $d = " AND Recam = 1";
        }elseif($d == "Estan") { 
            $d = " AND Estan = 1";
        }elseif($d == "Comed") { 
            $d = " AND Comed = 1";
        }elseif($d == "Multi") { 
            $d = " AND Multi = 1";
        }elseif($d == "Cocin") { 
            $d = " AND Cocin = 1";
        }elseif($d == "Hab1") { 
            $d = " AND NumHab = 1";
        }elseif($d == "Hab2") { 
            $d = " AND NumHab = 2";
        }elseif($d == "Hab3") { 
            $d = " AND NumHab = 3";
        }elseif($d == "Hab4") { 
            $d = " AND NumHab = 4";
        }elseif($d == "HabN") { 
            $d = " AND NumHab > 4";
        }else{
            $d = " AND $d=1";
        }
        return $d;
    }
?>