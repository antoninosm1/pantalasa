<?php
$servername = "localhost";
$username = "uyjjg45e2gxu3";
$password = "Delicias@Chihuahua1Mexico";
//$dbname = "pruebashost";
$dbname = "db6grkj7w2ygmv";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si existen tablas llamadas localidades_n, Localidades_n o localidades y eliminarlas si es así
$tables_to_check = ['localidades_n', 'Localidades_n', 'localidades'];

foreach ($tables_to_check as $table) {
    $sql_check = "SHOW TABLES LIKE '$table'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        $sql_drop = "DROP TABLE $table";
        if ($conn->query($sql_drop) === TRUE) {
            echo "Tabla $table eliminada correctamente.<br>";
        } else {
            echo "Error eliminando la tabla $table: " . $conn->error . "<br>";
        }
    }
}

// Crear tabla localidades
$sql_create = "CREATE TABLE localidades (
    MunicipioNum VARCHAR(5),
    MunicipioNom VARCHAR(60),
    LocalidadNum VARCHAR(5),
    LocalidadNom VARCHAR(100)
)";

if ($conn->query($sql_create) === TRUE) {
    echo "Tabla localidades creada correctamente.<br>";
} else {
    echo "Error creando la tabla localidades: " . $conn->error . "<br>";
}

// Generar consulta de la tabla inegi
$sql_inegi = "SELECT municipio_num, municipio_nom, localidad_num, localidad_nom 
              FROM inegi 
              ORDER BY municipio_num, municipio_nom, localidad_num, localidad_nom";
$result_inegi = $conn->query($sql_inegi);

if ($result_inegi->num_rows > 0) {
    // Recorrer el resultado de la consulta a la tabla inegi
    while($row = $result_inegi->fetch_assoc()) {
        $sql_insert = $conn->prepare("INSERT INTO localidades (MunicipioNum, MunicipioNom, LocalidadNum, LocalidadNom) VALUES (?, ?, ?, ?)");
        $sql_insert->bind_param("ssss", $row["municipio_num"], $row["municipio_nom"], $row["localidad_num"], $row["localidad_nom"]);
        if ($sql_insert->execute() === TRUE) {
            echo "Registro insertado correctamente en localidades: " . $row["municipio_num"] . ", " . $row["municipio_nom"] . ", " . $row["localidad_num"] . ", " . $row["localidad_nom"] . "<br>";
        } else {
            echo "Error insertando registro: " . $conn->error . "<br>";
        }
    }
} else {
    echo "No se encontraron registros en la tabla inegi.<br>";
}

// Obtener la collation de los campos de la tabla cedula y aplicarla a la tabla localidades
$fields = ["MunicipioNum", "MunicipioNom", "LocalidadNum", "LocalidadNom"];
foreach ($fields as $field) {
    $sql_collation = "SHOW FULL COLUMNS FROM cedula LIKE '$field'";
    $result_collation = $conn->query($sql_collation);
    if ($result_collation->num_rows > 0) {
        $row = $result_collation->fetch_assoc();
        $collation = $row['Collation'];
        $sql_modify = "ALTER TABLE localidades MODIFY $field VARCHAR(100) COLLATE $collation";
        if ($conn->query($sql_modify) === TRUE) {
            echo "Collation del campo $field transformada correctamente.<br>";
        } else {
            echo "Error transformando la collation del campo $field: " . $conn->error . "<br>";
        }
    }
}

// Generar consulta de la tabla cedula para obtener registros con MunicipioNom + LocalidadNom distintos
$sql_cedula = "SELECT MunicipioNum, MunicipioNom, LocalidadNum, LocalidadNom 
               FROM cedula 
               WHERE CONCAT(TRIM(MunicipioNom), TRIM(LocalidadNom)) 
                     NOT IN (SELECT CONCAT(TRIM(MunicipioNom), TRIM(LocalidadNom)) FROM localidades)";
$result_cedula = $conn->query($sql_cedula);

if ($result_cedula->num_rows > 0) {
    // Recorrer el resultado de la consulta a la tabla cedula
    while($row = $result_cedula->fetch_assoc()) {
        // Imprimir valores consultados
        echo "Valores consultados: MunicipioNum: " . $row["MunicipioNum"] . ", MunicipioNom: " . $row["MunicipioNom"] . ", LocalidadNum: " . $row["LocalidadNum"] . ", LocalidadNom: " . $row["LocalidadNom"] . "<br>";

        // Verificar si ya existe el registro en la tabla localidades
        $sql_check_exists = $conn->prepare("SELECT * FROM localidades WHERE TRIM(MunicipioNom) = TRIM(?) AND TRIM(LocalidadNom) = TRIM(?)");
        $sql_check_exists->bind_param("ss", $row["MunicipioNom"], $row["LocalidadNom"]);
        $sql_check_exists->execute();
        $result_check_exists = $sql_check_exists->get_result();

        if ($result_check_exists->num_rows == 0) {
            $sql_insert = $conn->prepare("INSERT INTO localidades (MunicipioNum, MunicipioNom, LocalidadNum, LocalidadNom) VALUES (?, ?, ?, ?)");
            $sql_insert->bind_param("ssss", $row["MunicipioNum"], $row["MunicipioNom"], $row["LocalidadNum"], $row["LocalidadNom"]);
            if ($sql_insert->execute() === TRUE) {
                // Imprimir valores a ingresar
                echo "Registro insertado correctamente en localidades: MunicipioNum: " . $row["MunicipioNum"] . ", MunicipioNom: " . $row["MunicipioNom"] . ", LocalidadNum: " . $row["LocalidadNum"] . ", LocalidadNom: " . $row["LocalidadNom"] . "<br>";
            } else {
                echo "Error insertando registro: " . $conn->error . "<br>";
            }
        }
    }
} else {
    echo "No se encontraron registros en la tabla cedula que cumplan con la condición.<br>";
}

// Cerrar conexión
$conn->close();
?>
