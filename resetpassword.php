<?php
session_start();
require_once "Libreria/MySQLConn.php";
$conn = new MySQLConn("localhost", "root", "", "toffysbooks");
$db = $conn->Conectar();
$message = ""; // Mensaje de éxito o error
$error = ""; // Mensaje de error

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Verifica si el token existe en la base de datos y está asociado con un correo
    $sql = "SELECT * FROM password_resets WHERE token = :token AND created_at > NOW() - INTERVAL 1 HOUR"; // El token es válido por 1 hora
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':token', $token, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Si el token es válido, permite al usuario establecer una nueva contraseña
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT); // Hashear la nueva contraseña

            // Actualiza la contraseña en la tabla login_hp
            $sql = "UPDATE login_hp SET clave = :clave WHERE email = (SELECT email FROM password_resets WHERE token = :token)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':clave', $new_password, PDO::PARAM_STR);
            $stmt->bindParam(':token', $token, PDO::PARAM_STR);
            $stmt->execute();

            // Elimina el token utilizado
            $sql = "DELETE FROM password_resets WHERE token = :token";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':token', $token, PDO::PARAM_STR);
            $stmt->execute();

            $message = "Tu contraseña ha sido restablecida exitosamente.";
        }
    } else {
        $error = "El enlace de restablecimiento es inválido o ha expirado.";
    }
} else {
    $error = "No se proporcionó un token.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Restablecer Contraseña</title>
</head>
<body>
    <h2>Restablecer Contraseña</h2>
    <?php if ($error): ?>
        <div style="color: red;"><?php echo $error; ?></div>
    <?php endif; ?>
    <?php if ($message): ?>
        <div><?php echo $message; ?></div>
    <?php else: ?>
        <form method="POST" action="">
            <input type="password" name="new_password" required placeholder="Nueva Contraseña">
            <button type="submit">Restablecer Contraseña</button>
        </form>
    <?php endif; ?>
</body>
</html>
