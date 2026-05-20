<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "uyjjg45e2gxu3";
$password = "Delicias@Chihuahua1Mexico";
$dbname = "pruebashost";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar la estructura de la tabla 'familia'
$sql = "DESCRIBE familia";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Abrir archivo de texto para escritura
    $file = fopen("estructura_familia.txt", "w");

    // Crear cabeceras para la hoja de Excel
    fwrite($file, "Campo\tTipo\tLongitud\tCaracterísticas Especiales\r\n");

    // Recorrer los resultados y generar el texto
    while ($row = $result->fetch_assoc()) {
        // Separar el tipo de dato y la longitud
        if (preg_match('/(\w+)\((\d+)\)/', $row['Type'], $matches)) {
            $type = $matches[1];
            $length = $matches[2];
        } else {
            $type = $row['Type'];
            $length = '';
        }

        // Características especiales (si existen)
        $special = '';
        if ($row['Null'] == 'NO') {
            $special .= 'NOT NULL ';
        }
        if ($row['Key'] == 'PRI') {
            $special .= 'PRIMARY KEY ';
        }
        if ($row['Default'] !== NULL) {
            $special .= 'DEFAULT ' . $row['Default'] . ' ';
        }
        if ($row['Extra']) {
            $special .= $row['Extra'];
        }

        // Escribir la línea para cada campo en el archivo
        fwrite($file, $row['Field'] . "\t" . $type . "\t" . $length . "\t" . $special . "\r\n");
    }

    // Cerrar el archivo
    fclose($file);
    echo "Estructura exportada a 'estructura_familia.txt'";
} else {
    echo "No se encontraron resultados.";
}

// Cerrar conexión
$conn->close();
?>
