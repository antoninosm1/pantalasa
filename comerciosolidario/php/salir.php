<?php
// session_cleanup.php
session_start(); // Inicia la sesión para poder manipularla

// Comprueba si el usuario ha solicitado cerrar sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    // 1. Limpia todas las variables de sesión
    $_SESSION = [];

    // 2. Elimina la cookie de sesión si existe
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // 3. Destruye la sesión en el servidor
    session_destroy();

    // Respuesta para confirmar que la sesión ha sido cerrada
    echo json_encode(["status" => "session_destroyed"]);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>CERRAR SESION SDHYBC</title>
    </head>
    <body>
        SESIÓN SDHYBC CERRADA
    </body>
</html>
<script>
// Configura los datos de la solicitud POST para notificar al servidor
const data = new FormData();
data.append('logout', true);

// Envía la solicitud AJAX al script PHP para limpiar la sesión
fetch('session_cleanup.php', {
    method: 'POST',
    body: data
})
.then(response => response.json())
.then(result => {
    console.log("Respuesta del servidor:", result);  // Agrega esta línea para verificar la respuesta
    if (result.status === "session_destroyed") {
        console.log("Sesión cerrada correctamente.");
                
        // Intenta redirigir a la página "sesion_cerrada.html"
        window.location.href = "sesion_cerrada.html";        
    } else {
        console.error("Error al cerrar la sesión: Estado incorrecto.");
    }
})
.catch(error => console.error("Error en la solicitud AJAX:", error));
</script>
