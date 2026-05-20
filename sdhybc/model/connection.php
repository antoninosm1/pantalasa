<?php

$contenidoNuevo = "ESTOY EN conexion";
$archivo = 'mensajes.txt';
$gestor = fopen($archivo, 'a');

if ($gestor === false) {
    error_log("Error al abrir o crear el archivo '$archivo' para escritura.");
} else {
    ini_set('error_log', $archivo);
    $resultado = fwrite($gestor, $contenidoNuevo . PHP_EOL);
    if ($resultado === false) {
        error_log("Error al escribir en el archivo '$archivo'.");
    } else {
        echo "El nuevo contenido se ha agregado al archivo.";
    }
    fclose($gestor); // Cerrar el archivo
}

    $HOST = "localhost";

    $USERDB = "uyjjg45e2gxu3";

    $PASSDB = "Delicias@Chihuahua1Mexico";

    $DATABASE = "db6grkj7w2ygmv";



    $conn = mysqli_connect($HOST, $USERDB, $PASSDB, $DATABASE);

    if($conn -> connect_errno){

        echo json_encode(array('ERROR' => $conn -> connect_error));

        exit();

    }

?>