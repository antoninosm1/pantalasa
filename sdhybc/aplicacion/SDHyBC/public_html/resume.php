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
            <div class='form-section-container'>
                <div class='section-header height-50px'>
                    <p class='title-form-section'>RESUMEN DE REGISTROS</p>
                    <select class='form-margin-top-10px form-margin-bottom-10px' id='resume-municipios'>
                        <option value='ALL'>TODOS LOS MUNICIPIOS</option>
                        <?php
                            include "model/connection.php";
                            $result = mysqli_query($conn, "SELECT DISTINCT `MunicipioNum`, `MunicipioNom` FROM cedula;");
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['MunicipioNom'] . "'>" . $row['MunicipioNum'] . "-". $row['MunicipioNom'] . "</option>";
                            }
                            mysqli_close($conn);
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class='main-sections-container'>
            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>RESUMEN GENERAL</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-gen-ced'>XXX</span> Cédulas</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-gen-loc'>XXX</span> Localidades</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-gen-viv'>XXX</span> Viviendas</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-gen-pob'>XXX</span> Población</p>
                
                <form>
                    <select class='form-select form-margin-bottom-10px' id='resume-localidades' size='5'>
                    </select>
                </form>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>TECHO</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-techo-concreto'>XXX</span> Concreto</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-techo-galvanizada'>XXX</span> Laminia Galvanizada</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-techo-madera'>XXX</span> Madera</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-techo-carton'>XXX</span> Lamina Carton</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-techo-otro'>XXX</span> Otro</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-techo-nd'>XXX</span> No Hay Datos</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>PAREDES</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-pare-tabique'>XXX</span> Tabique</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-pare-adobe'>XXX</span> Adobe</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-pare-block'>XXX</span> Block</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-pare-madera'>XXX</span> Madera</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-pare-piedra'>XXX</span> Piedra</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-pare-carton'>XXX</span> Cartón</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-pare-nd'>XXX</span> No Hay Datos</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>PISO</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-piso-cemento'>XXX</span> Cemento</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-piso-madera'>XXX</span> Madera</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-piso-tierra'>XXX</span> Tierra</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-piso-piedra'>XXX</span> Piedra</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-piso-nd'>XXX</span> No Hay Datos</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>AGUA DE USO</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-aguauso-potable'>XXX</span> Potable</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-aguauso-noria'>XXX</span> Noria/Pozo</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-aguauso-rio'>XXX</span> Río</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-aguauso-lluvia'>XXX</span> Lluvia</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-aguauso-nd'>XXX</span> No Hay Datos</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>AGUA DE CONSUMO</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-aguacon-potable'>XXX</span> Potable</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-aguacon-purificada'>XXX</span> Purificada</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-aguacon-hervida'>XXX</span> Hervida</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-aguacon-clorada'>XXX</span> Clorada</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-aguacon-filtrada'>XXX</span> Filtrada</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-aguacon-nd'>XXX</span> No Hay Datos</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>EXCRETA</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-exc-fosa'>XXX</span> Fosa Séptica</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-exc-letrina'>XXX</span> Letrina</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-exc-ras'>XXX</span> Al ras del suelo</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-exc-nd'>XXX</span> No Hay Datos</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>COMBUSTIBLE</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-com-gas'>XXX</span> Gas</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-com-carbon'>XXX</span> Carbón</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-com-lena'>XXX</span> Leña</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-com-otros'>XXX</span> Otros</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-com-nd'>XXX</span> No Hay Datos</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>BASURA</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-bas-redmun'>XXX</span> Red Municipal</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-bas-enterramiento'>XXX</span> Enterramiento</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-bas-cielo'>XXX</span> Cielo Abierto</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-bas-incineración'>XXX</span> Incineración</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-bas-nd'>XXX</span> No Hay Datos</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>ALUMBRADO</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-alu-electrica'>XXX</span> Red Eléctrica</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-alu-velas'>XXX</span> Velas</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-alu-quinque'>XXX</span> Quinque</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-alu-placa'>XXX</span> Placa Solar</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-alu-nd'>XXX</span> No Hay Datos</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>DIST. HABITACIONAL</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-disthab-numhab'>XXX</span> Número de Habitaciones</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-disthab-recama'>XXX</span> Recamaras</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-disthab-estanc'>XXX</span> Estancias</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-disthab-comedo'>XXX</span> Comedores</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-disthab-multip'>XXX</span> Multiples</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-disthab-cocind'>XXX</span> Cocinas Independientes</p>
            </div>
            
            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>HABITACIONES POR VIVIENDA</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-habpviv-viv1hab'>XXX</span> Viviendas con 1 habitación</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-habpviv-viv2hab'>XXX</span> Viviendas con 2 habitación</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-habpviv-viv3hab'>XXX</span> Viviendas con 3 habitación</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-habpviv-viv4hab'>XXX</span> Viviendas con 4 habitación</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-habpviv-nd'>XXX</span> No Hay Datos</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>PUEBLO INDIGENA</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-pueind-tarahumara'>XXX</span> Tarahumara</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-pueind-tepehuan'>XXX</span> Tepehuan</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-pueind-wuarojio'>XXX</span> Wuarojio</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-pueind-pima'>XXX</span> Pima</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-pueind-menonita'>XXX</span> Menonita</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-pueind-otro'>XXX</span> Otro</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-pueind-nd'>XXX</span> No Hay Datos</p>
            </div>
            
            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>DERECHOHABIENCIA</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-dere-INSABI'>XXX</span> INSABI</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-dere-IMSS'>XXX</span> IMSS</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-dere-ISSSTE'>XXX</span> ISSSTE</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-dere-PEMEX'>XXX</span> PEMEX</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-dere-SEDENA'>XXX</span> SEDENA</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-dere-otro'>XXX</span> Otro</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-dere-nd'>XXX</span> No Hay Datos</p>
            </div>
            
            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>MASCOTAS</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-masc-perros'>XXX</span> Número de Perros</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-masc-gatos'>XXX</span> Número de Gatos</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-masc-otros'>XXX</span> Número de Otros</p>
            </div>
            
            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>SERVICIOS DE SALUD</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-result-INSABI'>XXX</span> INSABI</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-servsal-IMSS'>XXX</span> IMSS</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-servsal-ISSSTE'>XXX</span> ISSSTE</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-servsal-PEMEX'>XXX</span> PEMEX</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-servsal-SEDENA'>XXX</span> SEDENA</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-servsal-Otro'>XXX</span> Otro</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-servsal-Medico'>XXX</span> Médico Particular</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-servsal-Clinica'>XXX</span> Clínica Particular</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-servsal-Partera'>XXX</span> Partera</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-servsal-Curandera'>XXX</span> Curandera</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-servsal-Yerbero'>XXX</span> Yerbero</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-servsal-Huesero'>XXX</span> Huesero</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-servsal-Boticario'>XXX</span> Boticario</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-servsal-nd'>XXX</span> No Hay Datos</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>EDAD DE HOMBRES</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-edahom-5'>XXX</span> Menores de 4 años</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-edahom-5-9'>XXX</span> De 5 a 9 años</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-edahom-10-17'>XXX</span> De 10 a 17 años</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-edahom-18-59'>XXX</span> De 18 a 59 años</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-edahom-60'>XXX</span> 60 años y más</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-edahom-nd'>XXX</span> No Hay Datos</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>EDAD DE MUJERES</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-edamuj-5'>XXX</span> Menores de 4 años</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-edamuj-5-9'>XXX</span> De 5 a 9 años</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-edamuj-10-17'>XXX</span> De 10 a 17 años</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-edamuj-18-59'>XXX</span> De 18 a 59 años</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-edamuj-60'>XXX</span> 60 años y más</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-edamuj-nd'>XXX</span> No Hay Datos</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>LENGUA MATERNA</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-lenmat-espa'>XXX</span> Español</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-lenmat-tara'>XXX</span> Tarahumara</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-lenmat-tepe'>XXX</span> Tepehuan</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-lenmat-wuar'>XXX</span> Wuarojio</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-lenmat-pima'>XXX</span> Pima</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-lenmat-meno'>XXX</span> Menonita</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-lenmat-otro'>XXX</span> Otro</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-lenmat-nd'>XXX</span> No Hay Datos</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>SEXO</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-sexo-hombre'>XXX</span> Hombre</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-sexo-mujer'>XXX</span> Mujer</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-sexo-nd'>XXX</span> No Hay Datos</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>ESTADO CIVIL</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-estciv-cas'>XXX</span> Casado</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-estciv-sol'>XXX</span> Soltero</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-estciv-uni'>XXX</span> Unión Libre</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-estciv-div'>XXX</span> Divorciado</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-estciv-viu'>XXX</span> Viudo</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-estciv-sep'>XXX</span> Separado</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-estciv-nd'>XXX</span> No Hay Datos</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>PARENTESCO</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-paren-pad'>XXX</span> Padre</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-paren-mad'>XXX</span> Madre</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-paren-hij'>XXX</span> Hijo</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-paren-par'>XXX</span> Pariente</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-paren-otr'>XXX</span> Otro</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-paren-nd'>XXX</span> No Hay Datos</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>ESCOLARIDAD</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-esc-prees'>XXX</span> Preescolar</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-esc-prima'>XXX</span> Primaria</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-esc-secun'>XXX</span> Secundaria</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-esc-prepa'>XXX</span> Preparatoria</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-esc-tecni'>XXX</span> Técnico</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-esc-profe'>XXX</span> Profesional</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-esc-posgr'>XXX</span> Posgrado</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-esc-noasi'>XXX</span> No asiste a la escuela</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-esc-sabel'>XXX</span> Sabe leer y escribir</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-esc-analf'>XXX</span> Analfabeta</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-esc-nd'>XXX</span> No Hay Datos</p>
            </div>
            
            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>OCUPACIÓN</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-ocupa-hog'>XXX</span> Hogar</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-ocupa-est'>XXX</span> Estudiante</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-ocupa-emp'>XXX</span> Empleado</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-ocupa-des'>XXX</span> Desempleado</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-ocupa-cue'>XXX</span> Por cuenta propia</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-ocupa-nd'>XXX</span> No Hay Datos</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>INGRESOS</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-ingre-men'>XXX</span> Menor al SM</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-ingre-igu'>XXX</span> Igual al SM</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-ingre-may'>XXX</span> Mayor al SM</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-ingre-nd'>XXX</span> No Hay Datos</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>DETECCIONES Y PAD.</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-det-papanicolaou'>XXX</span> Papanicolaou</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-det-hipertensión'>XXX</span> Hipertensión</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-det-diabetes'>XXX</span> Diabetes</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-det-tuberculosis'>XXX</span> Tuberculosis</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-det-alcoholismo'>XXX</span> Alcoholismo</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-det-tabaquismo'>XXX</span> Tabaquismo</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-det-cancer'>XXX</span> Cancer</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>PLANIFICACIÓN FAMILIAR</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-plafam-diu'>XXX</span> DIU</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-plafam-ora'>XXX</span> Orales</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-plafam-pre'>XXX</span> Preservativos</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-plafam-inm'>XXX</span> Inyección Mensuales</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-plafam-inb'>XXX</span> Inyección Bimensual</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-plafam-sal'>XXX</span> Salpingo / OTB</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-plafam-imp'>XXX</span> Implantes</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>¿EMBARAZADA?</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-emba-si'>XXX</span> Sí</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-emba-ec'>XXX</span> En control</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>BAÑO Y CAMBIO DE ROPA</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-bcr-di'>XXX</span> Diario</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-bcr-tr'>XXX</span> Tres veces por semana</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-bcr-do'>XXX</span> Dos veces por semana</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-bcr-nu'>XXX</span> Nunca</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-bcr-nd'>XXX</span> No Hay Datos</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>LAVADO DE DIENTES</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-ld-di'>XXX</span> Diario</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-ld-tr'>XXX</span> Tres veces por semana</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-ld-do'>XXX</span> Dos veces por semana</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-ld-nu'>XXX</span> Nunca</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-ld-nd'>XXX</span> No Hay Datos</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>LIMPIEZA DE VIVIENDA</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-lv-di'>XXX</span> Diario</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-lv-tr'>XXX</span> Tres veces por semana</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-lv-do'>XXX</span> Dos veces por semana</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-lv-nu'>XXX</span> Nunca</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-lv-nd'>XXX</span> No Hay Datos</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>BEBIDAS ALCOHOLICAS</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-cba-di'>XXX</span> Diario</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-cba-tr'>XXX</span> Tres veces por semana</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-cba-do'>XXX</span> Dos veces por semana</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-cba-nu'>XXX</span> Nunca</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-cba-nd'>XXX</span> No Hay Datos</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>TABACO</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-tab-di'>XXX</span> Diario</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-tab-tr'>XXX</span> Tres veces por semana</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-tab-do'>XXX</span> Dos veces por semana</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-tab-nu'>XXX</span> Nunca</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-tab-nd'>XXX</span> No Hay Datos</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>MEDICAMENTOS</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-med-di'>XXX</span> Diario</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-med-tr'>XXX</span> Tres veces por semana</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-med-do'>XXX</span> Dos veces por semana</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-med-nu'>XXX</span> Nunca</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-med-nd'>XXX</span> No Hay Datos</p>
            </div>

            <div class='form-section-container'>
                <h5 class='resume-result resume-result-title'>DROGAS</h4>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-dro-di'>XXX</span> Diario</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-dro-tr'>XXX</span> Tres veces por semana</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-dro-do'>XXX</span> Dos veces por semana</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-dro-nu'>XXX</span> Nunca</p>
                <p class='resume-result'><span class='resume-result resume-value' id='resume-dro-nd'>XXX</span> No Hay Datos</p>
                
            </div>
        </div>
    </main>
    <?php
        include_once 'sections/modals.php';
    ?>
    <script src="js/in_session/resume.js"></script>
</body>
</html>