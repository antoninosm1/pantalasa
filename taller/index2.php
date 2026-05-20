<?php
	require_once("../pantalib/php/objetos/Sistema.php");
	header('Content-Type: text/html; charset=UTF-8');
	session_start();
	
	// INICIA PROCESO PARA ESTABLECER IDIOMA DE SISTEMA
	
	if (isset($_SESSION['Sistema'])) {
	}
	else {
		$_SESSION['Sistema'] = new Sistema(1, "laboratorio", 0);
	}
?>
<HTML>
	<HEAD>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title></title>
	</HEAD>
	<BODY class="pantalasa_maqueta" id="maqueta_formulario_filelist">
		LABORATORIO DE FORMULARIO Y VARIOS FILELIST
	</BODY>
</HTML>

<script>
    alert("aqui estoy");
	var prueba = 2;
    if (1==prueba) {
        alert("La variable es igual a "+prueba);
    }
	else {
        alert("La variable es igual a "+prueba);
	}
</script>
 