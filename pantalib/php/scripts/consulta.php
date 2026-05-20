<?php

	session_start();
	header( 'Content-type: text/html; charset=utf-8' );
	require_once("Bd2.php");
	$usuarioBD = "crosscfc_principal";
	$claveusuarioBD = "crosscfcabc_888";
	$BD = "pantalasa_software";


	$_SESSION['bd'] = new Bd($BD, $usuarioBD, $claveusuarioBD);

	$conexion = new mysqli("localhost", $_SESSION['bd']->usuarioBD, $_SESSION['bd']->claveusuarioBD, $_SESSION['bd']->BD);

	$consulta = $_POST['consulta'];	
	$resultado = $conexion -> query($consulta);

	$contador = 0;
	$primeravez = 0;
	$respuesta2 = "";
	$respuesta = "";
	while($row = $resultado -> fetch_array()) {

		if ($primeravez == 0) {
			$primeravez = 1;
			$respuesta = $respuesta.'{"item0":'.json_encode($row[0]).',"item1":'.json_encode($row[1]).',"item2":'.json_encode($row[2]).',"item3":'.json_encode($row[3]).',"item4":'.json_encode($row[4]).',"item5":'.json_encode($row[5]).'}';
		}
		else {
			$respuesta = $respuesta.',{"item0":'.json_encode($row[0]).',"item1":'.json_encode($row[1]).',"item2":'.json_encode($row[2]).',"item3":'.json_encode($row[3]).',"item4":'.json_encode($row[4]).',"item5":'.json_encode($row[5]).'}';
		}
		$contador = $contador + 1;
	}
	if ($contador==0) {
		$respuesta2 = '[{"registros":"'.$contador.'"}';
	}
	else {
		$respuesta2 = '[{"registros":"'.$contador.'"},';
	}
	$respuesta2 = $respuesta2.$respuesta.']';
	echo $respuesta2;
?> 
                                                                                                                                                                                                                                                            