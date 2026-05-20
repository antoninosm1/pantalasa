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

// Consulta SELECT en la tabla 'cedula'
$queryCedula = 'SELECT ID, MunicipioNum, MunicipioNom FROM cedula ORDER BY MunicipioNum';

// Ejecutar la consulta SELECT en la tabla 'cedula'
$resultadoCedula = $conexion->query($queryCedula);

// Verificar si hay resultados
if ($resultadoCedula->num_rows > 0) {
    // Iterar a través de los resultados
    while ($filaCedula = $resultadoCedula->fetch_assoc()) {
        // Obtener valores de la fila de 'cedula'
        echo 'ESTE ES EL MUNICIPIO PRIMERA VEZ SIN CAMBIOS: '.$filaCedula['MunicipioNum'].' '.$filaCedula['MunicipioNom'].' '.$filaCedula['ID'].'<BR>';
        if (trim($filaCedula['MunicipioNum']) != '-' && trim($filaCedula['MunicipioNum']) != '- -') {
            $puente_numero = (int)trim($filaCedula['MunicipioNum']);
            $puente_numero_cadena = strval($puente_numero + 1000);
            $municipioNum = substr($puente_numero_cadena, 1, 3);
        }
        else {
            $municipioNum = $filaCedula['MunicipioNum'];
        }
        $municipioNom = $filaCedula['MunicipioNom'];

        echo 'ESTE ES EL MUNICIPIO: '.$municipioNum.' '.$municipioNom.'<BR>';

        // Consulta SELECT en la tabla 'municipios'
        $queryMunicipios = 'SELECT clave FROM municipios WHERE clave = "'.$municipioNum.'"';

        echo 'ESTA ES LA CONSULTA POR CADA MUNICIPIO: '.$queryMunicipios.'<BR>'; 

        // Ejecutar la consulta SELECT en la tabla 'municipios'
        $resultadoMunicipios = $conexion->query($queryMunicipios);

        // Verificar si hay resultados en la tabla 'municipios'
        if ($resultadoMunicipios->num_rows == 0) {
            // Consulta INSERT en la tabla 'municipios'
            $queryInsert = 'INSERT INTO municipios (clave, nombre) VALUES ("'.$municipioNum.'", "'.$municipioNom.'")';

            // Ejecutar la consulta INSERT
            if ($conexion->query($queryInsert) === TRUE) {
                echo 'Registro insertado con éxito en municipios: Municipio '.$municipioNum.' - '.$municipioNom.'<br>';
            } else {
                echo 'Error al insertar el registro en municipios: '.$conexion->error;
            }
        }
    }
} else {
    echo 'No se encontraron resultados en la consulta SELECT de cedula.';
}

// Cerrar la conexión
$conexion->close();
?> 
                                                                                                                                                                                                                                                            