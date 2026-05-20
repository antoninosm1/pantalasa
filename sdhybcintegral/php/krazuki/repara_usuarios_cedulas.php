<?php
// Configuración de la conexión a la base de datos
$host = 'localhost'; // Dirección del servidor MySQL
$dbname = 'pruebashost'; // Nombre de la base de datos
$username = 'uyjjg45e2gxu3'; // Usuario de la base de datos
$password = 'Delicias@Chihuahua1Mexico'; // Contraseña del usuario de la base de datos

try {
    // Crear una nueva conexión PDO a la base de datos
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Configurar PDO para lanzar excepciones en caso de errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SELECT para obtener todos los IDs de la tabla 'usuarios'
    $queryUsuarios = "SELECT ID FROM usuarios";
    $stmtUsuarios = $pdo->query($queryUsuarios);

    // Recorremos cada resultado de la consulta de usuarios
    foreach ($stmtUsuarios as $usuario) {
        $usuarioId = $usuario['ID']; // Extraemos el ID del usuario actual

        // Realizamos una consulta para contar registros en la tabla 'cedula' que correspondan al ID del usuario
        $queryCountCedulas = "SELECT COUNT(*) AS numeroCedulas FROM cedula WHERE UsuarioId = :usuarioId";
        $stmtCount = $pdo->prepare($queryCountCedulas);
        $stmtCount->execute(['usuarioId' => $usuarioId]);
        $cedulaData = $stmtCount->fetch(PDO::FETCH_ASSOC);
        $numeroCedulas = $cedulaData['numeroCedulas']; // Obtenemos el número de cédulas

        // Realizamos una consulta UPDATE para actualizar el campo NumeroCedulas en la tabla 'usuarios'
        $queryUpdateUsuario = "UPDATE usuarios SET NumeroCedulas = :numeroCedulas WHERE ID = :usuarioId";
        $stmtUpdate = $pdo->prepare($queryUpdateUsuario);
        $stmtUpdate->execute(['numeroCedulas' => $numeroCedulas, 'usuarioId' => $usuarioId]);
    }

    echo "Actualización completada exitosamente.";

} catch (PDOException $e) {
    // Capturamos cualquier error de conexión o ejecución de las consultas
    echo "Error en la conexión o en la ejecución de consultas: " . $e->getMessage();
}
?>
