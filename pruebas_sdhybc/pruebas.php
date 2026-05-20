<?php
	require_once "Sistema.php";
	require_once "Log.php";
	require_once "Conexion_sdhybc.php";
	header('Content-Type: text/html; charset=UTF-8');
	session_start();

// INICIA PROCESO PARA ESTABLECER SISTEMA
	$configuraciones = [10, 'sdhybc', 1, 'https://localhost/pantalasa/pruebas_sdhybc/', 1];
	$_SESSION['Sistema'] = new Sistema($configuraciones);

// INICIA PROCESO PARA ESTABLECER LOG DE PHP
	$archivo_log = 'karmela.txt';
	$mensaje_log = date('Y-m-d H:i:s').' ESTABLECEMOS LOG PHP EN FLUJO PRINCIPAL';
	$ruta_log = '';
	$sistema_log = $_SESSION['Sistema'];
	$configuraciones = [$archivo_log, $mensaje_log, $ruta_log, $sistema_log];
	$_SESSION['logPhp'] = new Log($configuraciones);
	$_SESSION['logPhp']->escribe_log();

// INICIA PROCESO PARA ESTABLECER CONEXIÓN DE BD
	$_SESSION['bd'] = new Conexion_sdhybc();

?>
<!DOCTYPE html>
<html lang="es_MX">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>PRUEBA ERROR</title>
        <link rel="icon" href="icons8-favicon.gif" type="image/x-icon">
    </head>
    <body class="maqueta_base" id="ID_SDHYBC_CAPTURA_BODY">
        PRUEBA ERROR
    </body>
</html>
<script>
    consultar = function() {
        let DatosFormulario = new FormData();
        DatosFormulario.append('dato_0', 'TODOS_REGISTROS');
        DatosFormulario.append('dato_1', 'TODOS_REGISTROS_L');
        DatosFormulario.append('dato_2', 0);
        DatosFormulario.append('dato_3', 5000);
        DatosFormulario.append('dato_4', 0);
        fetch('pruebas_php.php', {
            method: 'POST',
            body: DatosFormulario,
        })
        .then(res => res.json())
        .then(datax => generadatos_consulta_2(datax))
        .catch(err => json_error(err))
    };	   						
    generadatos_consulta_2 = function(datax) {
        alert('ESTE ES EL RESULTADO: '+datax);
    };	   						
    json_error = function(err) {
        alert('ESTE ES EL ERROR: '+err);
    };	   						
    consultar();
</script>


