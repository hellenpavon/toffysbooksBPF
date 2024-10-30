<?php
session_start();
require_once "Libreria/MySQLConn.php";
$conn = new MySQLConn("localhost", "root", "", "toffysbooks");
$db = $conn->Conectar();
$error = ""; // Variable para almacenar el mensaje de error

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario_hp'];
    $clave = $_POST['clave_hp'];

    // Consulta SQL con PDO
    $sql = "SELECT * FROM login_hp WHERE usuario = :usuario AND clave = :clave";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);
    $stmt->bindParam(':clave', $clave, PDO::PARAM_STR);
    $stmt->execute();

    // Verificar resultados
    if ($stmt->rowCount() > 0) {
        $_SESSION['usuario'] = $usuario; // Guarda el usuario en la sesión
        header("Location: home.php"); // Redirige a la página de inicio
        exit();
    } else {
        $error = "Acceso denegado"; // Asigna el mensaje de error
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Iniciar | Sesión</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- icono en la barra de navegación -->
  <link rel="icon" href="ImagenesHP/Toffy’s-Books.png" width="200" height="200" type="image/x-icon">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="css/sweet-alert.css">
  <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/login.css"/>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
  <script src="js/modernizr.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="js/main.js"></script>
  <!-- Permite ingresar iconos desde bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    .swal-btn-yellow {
      background-color: #FFD700 !important;
      color: #fff;
    }
    /* Estilo personalizado para el mensaje de error */
    .error-message {
      color: red; /* Color del texto */
      text-align: center; /* Centra el texto */
      margin-top: 10px; /* Espacio superior */
      font-weight: bold; /* Negrita para mayor énfasis */
    }
    /* Estilo para el botón de mostrar/ocultar contraseña */
    .toggle-password {
      cursor: pointer; /* Cursor tipo puntero */
      position: absolute; /* Posicionamiento absoluto */
      right: 10px; /* Espaciado desde la derecha */
      top: 50%; /* Centrar verticalmente */
      transform: translateY(-80%); /* Ajuste para centrar */
      color: white; /* Color del ícono */
    }
  </style>
</head>
<body class="full-cover-background" style="background-image: url('ImagenesHP/_F.-Jousseaume-3-@Yuka-Toyoshima.webp'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="form-container" style="font-family: Arial, sans-serif">
       <div class="login-container">
        <div class="login-box">
            <p class="text-center" style="margin-top: 17px;">
                <img src="ImagenesHP/Toffy’s-Books.png" style="width:20%;">
           </p>
            <h2>Toffy's Books</h2>
            <form method="POST" action="">
                <div class="user-box">
                    <input type="text" name="usuario_hp" id="usuario_hp" required style="background-color: transparent; color: white; border: none; border-bottom: 1px solid white;">
                    <label for="usuario_hp">Usuario</label>
                </div>
                <div class="user-box">
                    <div style="position: relative;">
                        <input type="password" name="clave_hp" id="clave_hp" required style="background-color: transparent; color: white; border: none; border-bottom: 1px solid white;">
                        <label for="clave_hp">Contraseña</label>
                        <span class="toggle-password" onclick="togglePassword()"><i class="bi bi-eye-fill"></i></span> <!-- Icono para mostrar/ocultar -->
                    </div>
                </div>
                <!-- <div class="text-right enlaces-derecha">
                    <a class="enlace" href="recuppassword.php">Olvidé mi contraseña</a><br>
                    <a class="enlace" href="">Registrarse</a>
                </div> -->
                <br>
                <div class="text-center">
                    <button type="submit" style="
                        background-color: #bac26f;
                        color: white; /* Color del texto */
                        padding: 10px 20px; /* Espaciado interno */
                        border: none; /* Sin borde */
                        border-radius: 25px; /* Bordes redondeados */
                        cursor: pointer; /* Cursor tipo puntero */
                        font-size: 16px; /* Tamaño de fuente */
                        transition: background-color 0.3s; /* Transición suave */
                    " onmouseover="this.style.backgroundColor='#bac26f'" onmouseout="this.style.backgroundColor='#bac26f'">
                        Ingresar al sistema
                    </button>
                </div>
            </form>
            <?php if ($error): ?>
                <div class="error-message"><?php echo $error; ?></div> <!-- Mensaje de error sin cuadro -->
            <?php endif; ?>
        </div>
    </div>
    <script>
        function togglePassword() {
            const passwordField = document.getElementById('clave_hp');
            const passwordToggle = document.querySelector('.toggle-password');
            if (passwordField.type === "password") {
                passwordField.type = "text";
                passwordToggle.innerHTML = '<i class="bi bi-eye-slash-fill"></i>'; // Cambia el ícono a "ojo cerrado"
            } else {
                passwordField.type = "password";
                passwordToggle.innerHTML = '<i class="bi bi-eye-fill"></i>'; // Cambia el ícono a "ojo abierto"
            }
        }
    </script>
</body>
</html>