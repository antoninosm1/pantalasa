<?php
// Datos de conexión
$username = "uyjjg45e2gxu3";
$password = "Delicias@Chihuahua1Mexico";
$dbname = "pruebashost";

// Crear conexión
$conn = new mysqli('localhost', $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener la estructura de la tabla 'cedula'
$sql_describe = "DESCRIBE cedula";
$result = $conn->query($sql_describe);

if ($result->num_rows > 0) {
    // Crear un archivo TXT
    $filename = 'estructura_tabla_cedula.txt';
    $file = fopen($filename, 'w');
    
    // Escribir los encabezados en el archivo
    $headers = "Posición\tNombre del Campo\tTipo de Campo\tDimensión del Campo\tOtra Información\n";
    fwrite($file, $headers);

    // Añadir los datos de la estructura de la tabla
    $position = 1;
    while ($row = $result->fetch_assoc()) {
        $type = $row['Type'];
        $dimension = '';
        if (preg_match('/\((.*?)\)/', $type, $matches)) {
            $dimension = $matches[1];
        }

        $line = $position . "\t" . $row['Field'] . "\t" . strtok($type, '(') . "\t" . $dimension . "\t" . $row['Null'] . ' ' . $row['Key'] . ' ' . $row['Default'] . ' ' . $row['Extra'] . "\n";
        fwrite($file, $line);

        $position++;
    }

    // Cerrar el archivo
    fclose($file);

    echo "Archivo TXT generado exitosamente: " . $filename;
} else {
    echo "No se pudo obtener la estructura de la tabla 'cedula'.";
}

// Cerrar conexión
$conn->close();
?>
