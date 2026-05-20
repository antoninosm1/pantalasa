<?php
// Datos de conexión
$host = "localhost";
$usuario = "uyjjg45e2gxu3";
$contraseña = "Delicias@Chihuahua1Mexico";
$baseDatos = "pruebashost";

// Conectar a la base de datos
$conexion = new mysqli($host, $usuario, $contraseña, $baseDatos);

// Verificar la conexión
if ($conexion->connect_error) {
    die('Error de conexión a la base de datos: ' . $conexion->connect_error);
}

// Consulta SELECT en la tabla 'inegi'
$querySelect = "SELECT municipio_num, municipio_nom FROM inegi ORDER BY municipio_num";

// Ejecutar la consulta SELECT
$resultado = $conexion->query($querySelect);

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
    // Inicializar variable para comparar el cambio de municipio_num
    $municipioNumAnterior = null;

    // Iterar a través de los resultados
    while ($fila = $resultado->fetch_assoc()) {
        // Obtener valores de la fila
        $municipioNum = $fila['municipio_num'];
        $municipioNom = $fila['municipio_nom'];

        // Verificar si el municipio_num ha cambiado
        if ($municipioNum != $municipioNumAnterior) {
            // Consulta INSERT en la tabla 'municipios'
            $queryInsert = "INSERT INTO municipios (clave, nombre) VALUES ('$municipioNum', '$municipioNom')";

            // Ejecutar la consulta INSERT
            if ($conexion->query($queryInsert) === TRUE) {
                echo "Registro insertado con éxito: Municipio $municipioNum - $municipioNom<br>";
            } else {
                echo "Error al insertar el registro: " . $conexion->error;
            }

            // Actualizar el valor de municipioNumAnterior
            $municipioNumAnterior = $municipioNum;
        }
    }
} else {
    echo "No se encontraron resultados en la consulta SELECT.";
}

// Cerrar la conexión
$conexion->close();

?> 
                                                                                                                                                                                                                                                            