<?php
// Configuración de la conexión a la base de datos
$host = "localhost";
$dbname = "db6grkj7w2ygmv";
$username = "uyjjg45e2gxu3";
$password = "Delicias@Chihuahua1Mexico";

try {
    // Conexión a la base de datos usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crear tabla "apoyos"
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS apoyos (
            ID INT(11) AUTO_INCREMENT PRIMARY KEY,
            UsuarioId INT(11),
            Programa INT(11),
            CedulaId INT(11),
            Resp INT(11),
            Desco VARCHAR(200),
            FecEntr DATE,
            NumDeta INT(11),
            FecReg DATETIME
        );
    ");

    // Crear tabla "detalles"
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS detalles (
            ID INT(11) AUTO_INCREMENT PRIMARY KEY,
            ApoyoId INT(11),
            MaterialId INT(11),
            Cant DECIMAL(15,4)
        );
    ");

    // Crear tabla "materiales"
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS materiales (
            ID INT(11) AUTO_INCREMENT PRIMARY KEY,
            Desco VARCHAR(200),
            Unidad VARCHAR(25)
        );
    ");

    // Crear tabla "programas"
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS programas (
            ID INT(11) AUTO_INCREMENT PRIMARY KEY,
            UsuarioId INT(11),
            Nombre VARCHAR(100),
            FecInic DATE,
            FecTerm DATE,
            Desco VARCHAR(200),
            NumApoy INT(11),
            FecReg DATETIME
        );
    ");

    // Agregar columnas a la tabla "usuarios"
    $pdo->exec("
        ALTER TABLE usuarios 
        ADD COLUMN Firma TINYINT(1) DEFAULT 0, 
        ADD COLUMN Confirma TINYINT(1) DEFAULT 0;
    ");

    // Actualizar datos en la tabla "usuarios"
    $pdo->exec("UPDATE usuarios SET Confirma = 1;");
    $pdo->exec("UPDATE usuarios SET NumeroCedulas = 0;");

    // Consultar registros de la tabla "usuarios"
    $stmt = $pdo->query("SELECT ID FROM usuarios");
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Procesar cada usuario y actualizar el campo "NumeroCedulas"
    foreach ($usuarios as $usuario) {
        $usuarioId = $usuario['ID'];

        // Contar registros en la tabla "cedula" asociados al UsuarioId
        $stmtCount = $pdo->prepare("SELECT COUNT(*) FROM cedula WHERE UsuarioId = :usuarioId");
        $stmtCount->execute([':usuarioId' => $usuarioId]);
        $conteo = $stmtCount->fetchColumn();

        // Actualizar el valor de "NumeroCedulas" en la tabla "usuarios"
        $stmtUpdate = $pdo->prepare("UPDATE usuarios SET NumeroCedulas = :conteo WHERE ID = :usuarioId");
        $stmtUpdate->execute([':conteo' => $conteo, ':usuarioId' => $usuarioId]);
    }

    echo "Operaciones completadas exitosamente.";
} catch (PDOException $e) {
    echo "Error en la operación: " . $e->getMessage();
}
?>
