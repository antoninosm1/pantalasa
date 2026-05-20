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
            include '../sections/main_menu.php';
        ?>
        
        <div class='main-sections-container'>
            <div class='form-section-container'>
                <p class='title-form-section form-margin-top-5px'>DATOS DE IDENTIDAD</p>
                <form>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section form-margin-bottom-0px' for='Apellido1'>Primer Apellido</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <input class='single-input-form-section input-text' name='Apellido1' id='Apellido1' type='text'>
                    </div>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section form-margin-bottom-0px' for='Apellido2'>Segundo Apellido</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <input class='single-input-form-section input-text' name='Apellido2' id='Apellido2' type='text'>
                    </div>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section form-margin-bottom-0px' for='Nombres'>Nombres</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <input class='single-input-form-section input-text' name='Nombres' id='Nombres' type='text'>
                    </div>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section form-margin-bottom-0px' for='Nacimiento'>Fecha de Nacimiento</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <input class='single-input-form-section input-text' name='Nacimiento' id='Nacimiento' type='date'>
                    </div>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section form-margin-bottom-0px' for='Edad'>Edad</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <input class='single-input-form-section input-text' name='Edad' id='Edad' type='number' value='0'>
                    </div>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section form-margin-bottom-0px'>Genero</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <div class='input-section-horizontal-inputs'>
                            <input type='radio' id='DIhombre' name='DIgenero' value='Hombre'>
                            <label for='DIhombre'>Hombre</label>
                        </div>
                        <div class='input-section-horizontal-inputs'>
                            <input type='radio' id='DImujer' name='DIgenero' value='Mujer'>
                            <label for='DImujer'>Mujer</label>
                        </div>
                        <input class='no-display' type='radio' id='DInd' name='DIgenero' value='ND' checked>
                    </div>
                </form>
            </div>

            <div class='form-section-container'>
            <p class='title-form-section form-margin-top-5px'>DATOS GENERALES</p>
                <form>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section form-margin-bottom-0px' for='EstadoNacimiento'>Estado en Donde Nace</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <select class='single-input-form-section input-text' name='EstadoNacimiento' id='EstadoNacimiento'>
                            <option value='ND'></option>
                            <option value='Aguascalientes'>Aguascalientes</option>
                            <option value='Baja California'>Baja California</option>
                            <option value='Baja California Sur'>Baja California Sur</option>
                            <option value='Campeche'>Campeche</option>
                            <option value='Chiapas'>Chiapas</option>
                            <option value='Chihuahua'>Chihuahua</option>
                            <option value='Ciudad de México'>Ciudad de México</option>
                            <option value='Coahuila'>Coahuila</option>
                            <option value='Colima'>Colima</option>
                            <option value='Durango'>Durango</option>
                            <option value='Guanajuato'>Guanajuato</option>
                            <option value='Guerrero'>Guerrero</option>
                            <option value='Hidalgo'>Hidalgo</option>
                            <option value='Jalisco'>Jalisco</option>
                            <option value='México'>México</option>
                            <option value='Michoacán'>Michoacán</option>
                            <option value='Morelos'>Morelos</option>
                            <option value='Nayarit'>Nayarit</option>
                            <option value='Nuevo León'>Nuevo León</option>
                            <option value='Oaxaca'>Oaxaca</option>
                            <option value='Puebla'>Puebla</option>
                            <option value='Querétaro'>Querétaro</option>
                            <option value='Quintana Roo'>Quintana Roo</option>
                            <option value='San Luis Potosí'>San Luis Potosí</option>
                            <option value='Sinaloa'>Sinaloa</option>
                            <option value='Sonora'>Sonora</option>
                            <option value='Tabasco'>Tabasco</option>
                            <option value='Tamaulipas'>Tamaulipas</option>
                            <option value='Tlaxcala'>Tlaxcala</option>
                            <option value='Veracruz'>Veracruz</option>
                            <option value='Yucatán'>Yucatán</option>
                            <option value='Zacatecas'>Zacatecas</option>
                        </select>
                    </div>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section form-margin-bottom-0px' for='LenguaMaterna'>Lengua Materna</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <select class='single-input-form-section input-text' name='LenguaMaterna' id='LenguaMaterna'>
                            <option value='ND'></option>
                            <option value='Español'>Español</option>
                            <option value='Tarahumara'>Tarahumara</option>
                            <option value='Tepehuan'>Tepehuan</option>
                            <option value='Wuarojio'>Wuarojio</option>
                            <option value='Pima'>Pima</option>
                            <option value='Menonita'>Menonita</option>
                            <option value='Otro'>Otro</option>
                        </select>
                    </div>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section form-margin-bottom-0px' for='EstadoCivil'>Estado Civil</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <select class='single-input-form-section input-text' name='EstadoCivil' id='EstadoCivil'>
                            <option value='ND'></option>
                            <option value='Casado'>Casado</option>
                            <option value='Soltero'>Soltero</option>
                            <option value='Unión libre'>Unión Libre</option>
                            <option value='Divorciado'>Divorciado</option>
                            <option value='Viudo'>Viudo</option>
                            <option value='Separado'>Separado</option>
                        </select>
                    </div>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section form-margin-bottom-0px' for='Parentesco'>Parentesco</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <select class='single-input-form-section input-text' name='Parentesco' id='Parentesco'>
                            <option value='ND'></option>
                            <option value='Padre'>Padre</option>
                            <option value='Madre'>Madre</option>
                            <option value='Hijo'>Hijo</option>
                            <option value='Pariente'>Pariente</option>
                            <option value='Otro'>Otro</option>
                        </select>
                    </div>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section  form-margin-bottom-0px' for='Escolaridad'>Escolaridad</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <select class='single-input-form-section input-text' name='Escolaridad' id='Escolaridad'>
                            <option value='ND'></option>
                            <option value='Preescolar'>Preescolar</option>
                            <option value='Primaria'>Primaria</option>
                            <option value='Secundaria'>Secundaria</option>
                            <option value='Preparatoria'>Preparatoria</option>
                            <option value='Técnico'>Técnico</option>
                            <option value='Profesional'>Profesional</option>
                            <option value='Posgrado'>Posgrado</option>
                            <option value='No asiste a la escuela'>No asiste a la escuela</option>
                            <option value='Sabe leer y escribir'>Sabe leer y escribir</option>
                            <option value='Analfabeta'>Analfabeta</option>
                        </select>
                    </div>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section  form-margin-bottom-0px' for='Ocupacion'>Ocupacion</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <select class='single-input-form-section input-text' name='Ocupacion' id='Ocupacion'>
                            <option value='ND'></option>
                            <option value='Hogar'>Hogar</option>
                            <option value='Estudiante'>Estudiante</option>
                            <option value='Empleado'>Empleado</option>
                            <option value='Desempleado'>Desempleado</option>
                            <option value='Por cuenta propia'>Por cuenta propia</option>
                        </select>
                    </div>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section  form-margin-bottom-0px' for='Ingresos'>Ingresos</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <select class='single-input-form-section input-text' name='Ingresos' id='Ingresos'>
                            <option value='ND'></option>
                            <option value='Menor al salario mínimo'>Menor al salario mínimo</option>
                            <option value='Igual al salario mínimo'>Igual al salario mínimo</option>
                            <option value='Mayor al salario mínimo'>Mayor al salario mínimo</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class='form-section-container'>
                <p class='title-form-section form-margin-top-5px'>PADECIMIENTOS</p>
                <form>
                    <div class='input-section-horizontal form-margin-bottom-20px'>
                        <input name='Padecimientos' id='PADpapan' type='checkbox'>
                        <label for='PADpapan' class='input-section-label'>Papanicolaou</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-20px'>
                        <input name='Padecimientos' id='PADhiper' type='checkbox'>
                        <label for='PADhiper' class='input-section-label'>Hipertensión</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-20px'>
                        <input name='Padecimientos' id='PADdiab' type='checkbox'>
                        <label for='PADdiab' class='input-section-label'>Diabetes</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-20px'>
                        <input name='Padecimientos' id='PADtube' type='checkbox'>
                        <label for='PADtube' class='input-section-label'>Tuberculosis</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-20px'>
                        <input name='Padecimientos' id='PADalco' type='checkbox'>
                        <label for='PADalco' class='input-section-label'>Alcoholismo</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-20px'>
                        <input name='Padecimientos' id='PADtaba' type='checkbox'>
                        <label for='PADtaba' class='input-section-label'>Tabaquismo</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-20px'>
                        <input name='Padecimientos' id='PADcanc' type='checkbox'>
                        <label for='PADcanc' class='input-section-label'>Cancer</label>
                    </div>
                </form>
            </div>

            <div class='form-section-container'>
                <p class='title-form-section form-margin-top-5px'>PLANIFICACIÓN FAMILIAR</p>
                <form>
                    <div class='input-section-horizontal form-margin-bottom-15px'>
                        <input name='Planificacion' id='PLAdiu' value='DIU' type='checkbox'>
                        <label for='PLAdiu' class='input-section-label'>DIU</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-15px'>
                        <input name='Planificacion' id='PLAora' value='Orales' type='checkbox'>
                        <label for='PLAora' class='input-section-label'>Orales</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-15px'>
                        <input name='Planificacion' id='PLApre' value='Preservativos' type='checkbox'>
                        <label for='PLApre' class='input-section-label'>Preservativos</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-15px'>
                        <input name='Planificacion' id='PLAinm' value='InyeccionMensual' type='checkbox'>
                        <label for='PLAinm' class='input-section-label'>Inyección Mensual</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-15px'>
                        <input name='Planificacion' id='PLAinb' value='InyeccionBimensual' type='checkbox'>
                        <label for='PLAinb' class='input-section-label'>Inyección Bimensual</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-15px'>
                        <input name='Planificacion' id='PLAsal' value='Salpingo' type='checkbox'>
                        <label for='PLAsal' class='input-section-label'>Salpingo /OTB</label>
                    </div>
                    <div class='input-section-horizontal form-margin-bottom-10px'>
                        <input name='Planificacion' id='PLAimp' value='Implantes' type='checkbox'>
                        <label for='PLAimp' class='input-section-label'>Implantes</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section form-margin-bottom-0px'>¿Embarazada?</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <div class='input-section-horizontal-inputs'>
                            <input name='input-embarazada' value='Sí' id='input-embarazada-si' type='radio'>
                            <label for='input-embarazada-si'>Sí</label>
                        </div>
                        <div class='input-section-horizontal-inputs'>
                            <input name='input-embarazada' value='En Control' id='input-embarazada-en-control' type='radio'>
                            <label for='input-embarazada-en-control'>En Control</label>
                        </div>
                        <input class='no-display' type='radio' id='input-embarazada-nd' name='input-embarazada' value='ND' checked>
                    </div>
                </form>
            </div>

            <div class='form-section-container'>
                <p class='title-form-section form-margin-top-5px'>HIGIENE</p>
                <form>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section' for='BaCaRo'>Baño y Cambio de Ropa</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <select class='single-input-form-section input-text' name='BaCaRo' id='BaCaRo'>
                            <option value='ND'></option>
                            <option value='Diario'>Diario</option>
                            <option value='Tres veces por semana'>Tres veces por semana</option>
                            <option value='Dos veces por semana'>Dos veces por semana</option>
                            <option value='Nunca'>Nunca</option>
                        </select>
                    </div>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section' for='LavaDi'>Lavado de Dientes</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <select class='single-input-form-section input-text' name='LavaDi' id='LavaDi'>
                            <option value='ND'></option>
                            <option value='Diario'>Diario</option>
                            <option value='Tres veces por semana'>Tres veces por semana</option>
                            <option value='Dos veces por semana'>Dos veces por semana</option>
                            <option value='Nunca'>Nunca</option>
                        </select>
                    </div>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section' for='LimVi'>Limpieza de Vivienda</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <select class='single-input-form-section input-text' name='LimVi' id='LimVi'>
                            <option value='ND'></option>
                            <option value='Diario'>Diario</option>
                            <option value='Tres veces por semana'>Tres veces por semana</option>
                            <option value='Dos veces por semana'>Dos veces por semana</option>
                            <option value='Nunca'>Nunca</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class='form-section-container'>
                <p class='title-form-section form-margin-top-5px'>TOXICOMANÍAS</p>
                <form>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section' for='BeAl'>Bebidas Alcohólicas</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <select class='single-input-form-section input-text' name='BeAl' id='BeAl'>
                            <option value='ND'></option>
                            <option value='Diario'>Diario</option>
                            <option value='Tres veces por semana'>Tres veces por semana</option>
                            <option value='Dos veces por semana'>Dos veces por semana</option>
                            <option value='Nunca'>Nunca</option>
                        </select>
                    </div>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section' for='Tabaco'>Tabaco</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <select class='single-input-form-section input-text' name='Tabaco' id='Tabaco'>
                            <option value='ND'></option>
                            <option value='Diario'>Diario</option>
                            <option value='Tres veces por semana'>Tres veces por semana</option>
                            <option value='Dos veces por semana'>Dos veces por semana</option>
                            <option value='Nunca'>Nunca</option>
                        </select>
                    </div>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section' for='Medic'>Medicamentos</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <select class='single-input-form-section input-text' name='Medic' id='Medic'>
                            <option value='ND'></option>
                            <option value='Diario'>Diario</option>
                            <option value='Tres veces por semana'>Tres veces por semana</option>
                            <option value='Dos veces por semana'>Dos veces por semana</option>
                            <option value='Nunca'>Nunca</option>
                        </select>
                    </div>
                    <div class='input-section-horizontal'>
                        <label class='single-input-form-section' for='Drogas'>Drogas</label>
                    </div>
                    <div class='input-section-horizontal'>
                        <select class='single-input-form-section input-text' name='Drogas' id='Drogas'>
                            <option value='ND'></option>
                            <option value='Diario'>Diario</option>
                            <option value='Tres veces por semana'>Tres veces por semana</option>
                            <option value='Dos veces por semana'>Dos veces por semana</option>
                            <option value='Nunca'>Nunca</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class='form-section-container'>
                <form>
                    <input type='button' class='single-input-form-section input-button' id='button-integrante-agregar' value='AGREGAR INTEGRANTE'>
                </form>
                <p class='title-form-section form-margin-top-5px'>COMPOSICIÓN FAMILIAR</p>
                <form>
                    <select name='Integrantes' class='form-select form-margin-bottom-10px' size='7' id='select-integrantes'>
                    </select>
                    <div class='input-section-horizontal'>
                        <input type='button' class='three-input-buttons input-button' id='button-integrante-copiar' value='COPIAR'>
                        <input type='button' class='three-input-buttons input-button' id='button-integrante-modificar' value='EDITAR'>
                        <input type='button' class='three-input-buttons input-button' id='button-integrante-eliminar' value='BORRAR'>
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
                        <input type='button' class='single-input-form-section input-button form-margin-top-20px form-margin-bottom-20px' id='button-folio-guardar' value='GUARDAR FOLIO'>
                    </div>
                    <div class='input-section-horizontal'>
                        <input type='button' class='single-input-form-section input-button form-margin-top-40px form-margin-bottom-20px' id='button-familia-limpiar-campos' value='LIMPIAR CAMPOS'>
                    </div>
                    <div class='input-section-horizontal'>
                        <input type='button' class='single-input-form-section input-button form-margin-top-20px form-margin-bottom-20px' id='button-familia-anterior' value='ANTERIOR'>
                    </div>
                    <div class='input-section-horizontal'>
                        <input type='button' class='single-input-form-section input-button form-margin-top-20px form-margin-bottom-20px' id='button-familia-cancelar-captura' value='CANCELAR CAPTURA'>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <?php
        include_once '../sections/modals.php';
    ?>
    <script src="../js/cedulas/familia.js"></script>
</body>
</html>