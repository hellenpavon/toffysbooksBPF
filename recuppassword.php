<?php
session_start();
require_once "Libreria/MySQLConn.php";
$conn = new MySQLConn("localhost", "root", "", "toffysbooks");
$db = $conn->Conectar();
$message = ""; // Variable para almacenar mensajes
$error = ""; // Variable para almacenar errores

// Verifica si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Verifica si el correo existe en la base de datos
    $sql = "SELECT * FROM login_hp WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Aquí va el código para enviar el correo
        // Por ejemplo, puedes usar PHPMailer para enviar el enlace de recuperación
        // Asigna un mensaje de éxito
        $message = "Se ha enviado un enlace de recuperación a su correo electrónico.";
    } else {
        $error = "El correo electrónico no está registrado.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Recuperar Contraseña</title>
  <!-- Incluye tus hojas de estilo y scripts aquí -->
</head>
<body>
    <h2>Recuperar Contraseña</h2>
    <form method="POST" action="">
        <input type="email" name="email" required placeholder="Ingrese su correo electrónico">
        <button type="submit">Enviar enlace de recuperación</button>
    </form>
    <?php if ($message): ?>
        <div><?php echo $message; ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
        <div style="color: red;"><?php echo $error; ?></div> <!-- Muestra mensaje de error en rojo -->
    <?php endif; ?>
</body>
</html>
