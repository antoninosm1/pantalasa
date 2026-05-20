<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "uyjjg45e2gxu3";
$password = "Delicias@Chihuahua1Mexico";
$dbname = "pruebashost";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Inspeccionar si existe la tabla 'programas'
$tableExists = $conn->query("SHOW TABLES LIKE 'programas'")->num_rows > 0;

if (!$tableExists) {
    // Crear tabla 'programas'
    $sql = "CREATE TABLE programas (
        ID int(11) AUTO_INCREMENT PRIMARY KEY,
        UsuarioId int(11) DEFAULT 35,
        Nombre varchar(100),
        FecInic date,
        FecTerm date,
        Desco varchar(200),
        NumApoy int(11),
        FecReg datetime
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Tabla 'programas' creada exitosamente.<br>";

        // Insertar registros de prueba en la tabla 'programas'
        $conn->query("INSERT INTO programas (Nombre, FecInic, FecTerm, `Desc`, NumApoy, FecReg) VALUES
            ('Programa 1', '2024-08-01', '2024-08-10', 'Descripción 1', 1, NOW()),
            ('Programa 2', '2024-08-11', '2024-08-20', 'Descripción 2', 2, NOW()),
            ('Programa 3', '2024-08-21', '2024-08-30', 'Descripción 3', 3, NOW())");

        echo "Registros insertados en 'programas'.<br>";
    } else {
        echo "Error al crear la tabla 'programas': " . $conn->error . "<br>";
    }
}

// Obtener los IDs insertados en la tabla 'programas'
$programaIds = [];
$result = $conn->query("SELECT ID FROM programas");
while ($row = $result->fetch_assoc()) {
    $programaIds[] = $row['ID'];
}

// Inspeccionar si existe la tabla 'apoyos'
$tableExists = $conn->query("SHOW TABLES LIKE 'apoyos'")->num_rows > 0;

if (!$tableExists) {
    // Crear tabla 'apoyos'
    $sql = "CREATE TABLE apoyos (
        ID int(11) AUTO_INCREMENT PRIMARY KEY,
        UsuarioId int(11) DEFAULT 35,
        Programa int(11),
        CedulaId int(11),
        Resp int(11),
        `Desc` varchar(200),
        FecEntr date,
        NumMate int(11),
        FecReg datetime
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Tabla 'apoyos' creada exitosamente.<br>";

        // Insertar registros de prueba en la tabla 'apoyos'
        $conn->query("INSERT INTO apoyos (Programa, CedulaId, Resp, `Desc`, FecEntr, NumMate, FecReg) VALUES
            ($programaIds[0], 17282, 49019, 'Apoyo 1', '2024-08-05', 2, NOW()),
            ($programaIds[1], 17281, 49017, 'Apoyo 2', '2024-08-15', 2, NOW()),
            ($programaIds[1], 17280, 49015, 'Apoyo 3', '2024-08-16', 2, NOW()),
            ($programaIds[2], 17279, 49014, 'Apoyo 4', '2024-08-25', 2, NOW()),
            ($programaIds[2], 17278, 49009, 'Apoyo 5', '2024-08-26', 2, NOW()),
            ($programaIds[2], 17275, 49000, 'Apoyo 6', '2024-08-27', 2, NOW())");

        echo "Registros insertados en 'apoyos'.<br>";
    } else {
        echo "Error al crear la tabla 'apoyos': " . $conn->error . "<br>";
    }
}

// Obtener los IDs insertados en la tabla 'apoyos'
$apoyoIds = [];
$result = $conn->query("SELECT ID FROM apoyos");
while ($row = $result->fetch_assoc()) {
    $apoyoIds[] = $row['ID'];
}

// Inspeccionar si existe la tabla 'materiales'
$tableExists = $conn->query("SHOW TABLES LIKE 'materiales'")->num_rows > 0;

if (!$tableExists) {
    // Crear tabla 'materiales'
    $sql = "CREATE TABLE materiales (
        ID int(11) AUTO_INCREMENT PRIMARY KEY,
        `Desc` varchar(200),
        Unidad varchar(25)
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Tabla 'materiales' creada exitosamente.<br>";

        // Insertar registros de prueba en la tabla 'materiales'
        $conn->query("INSERT INTO materiales (`Desc`, Unidad) VALUES
            ('LAMINA 2 X 3', 'PZA.'),
            ('SANITARIO PORCELANA', 'PZA.'),
            ('SOGA', 'MTS.'),
            ('CLAVOS', 'KG.'),
            ('PINTURA', 'LTS.'),
            ('BLOCK', 'PZA.'),
            ('LADRILLOS', 'PZA.'),
            ('TUBO 15 PULGADAS', 'MTS.'),
            ('MADERA 2 X 3', 'PZA.'),
            ('AZULEJO 30 X 30', 'PZA.')");

        echo "Registros insertados en 'materiales'.<br>";
    } else {
        echo "Error al crear la tabla 'materiales': " . $conn->error . "<br>";
    }
}

// Obtener los IDs insertados en la tabla 'materiales'
$materialIds = [];
$result = $conn->query("SELECT ID FROM materiales");
while ($row = $result->fetch_assoc()) {
    $materialIds[] = $row['ID'];
}

// Inspeccionar si existe la tabla 'detalles'
$tableExists = $conn->query("SHOW TABLES LIKE 'detalles'")->num_rows > 0;

if (!$tableExists) {
    // Crear tabla 'detalles'
    $sql = "CREATE TABLE detalles (
        Num int(11),
        ApoyoId int(11),
        MaterialId int(11),
        Cant int(11)
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Tabla 'detalles' creada exitosamente.<br>";

        // Insertar registros de prueba en la tabla 'detalles'
        $conn->query("INSERT INTO detalles (Num, ApoyoId, MaterialId, Cant) VALUES
            (1, $apoyoIds[0], $materialIds[0], 1),
            (2, $apoyoIds[0], $materialIds[1], 2),
            (1, $apoyoIds[1], $materialIds[2], 3),
            (2, $apoyoIds[1], $materialIds[3], 4),
            (1, $apoyoIds[2], $materialIds[4], 5),
            (2, $apoyoIds[2], $materialIds[5], 6),
            (1, $apoyoIds[3], $materialIds[6], 7),
            (2, $apoyoIds[3], $materialIds[7], 8),
            (1, $apoyoIds[4], $materialIds[8], 9),
            (2, $apoyoIds[4], $materialIds[9], 10),
            (1, $apoyoIds[5], $materialIds[0], 11),
            (2, $apoyoIds[5], $materialIds[1], 12)");

        echo "Registros insertados en 'detalles'.<br>";
    } else {
        echo "Error al crear la tabla 'detalles': " . $conn->error . "<br>";
    }
}

// Cerrar conexión
$conn->close();
?>
