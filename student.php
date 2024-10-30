<!-- 
* Copyright 2024 Hellen Pavon
-->
<?php
require_once "header_hp.php"; 
$criterio="";

if (!empty($_POST["Registrar"])) {
    // Verifica que el campo de Nombre no esté vacío o contenga solo espacios
    if (empty(trim($_POST["txtNombre_hp"]))) {
        echo '<div class="alert alert-danger" role="alert">Favor digitar un Nombre válido.</div>';
    } elseif (empty(trim($_POST["txtApellido_hp"]))) {
        echo '<div class="alert alert-danger" role="alert">Favor digitar un Apellido válido.</div>';
    } else {
        $sqlQuery = "INSERT INTO estudiante_hp
            (
             Identidad,
             Nombre,
             Apellido,
             Telefono
            )
            VALUES (
                '" . $_POST["txtIdentidad_hp"] . "',
                '" . $_POST["txtNombre_hp"] . "',
                '" . $_POST["txtApellido_hp"] . "',
                '" . $_POST["txtTelefono_hp"] . "'
            );";
            
        $query = $db->prepare($sqlQuery);
        if ($query->execute()) {
            echo '<div class="alert alert-success">Datos Registrados</div>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Estudiantes | Toffy's Books</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="ImagenesHP/Toffy’s-Books.png" />
    <script src="js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="css/sweet-alert.css">
    <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Permite ingresar iconos desde bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="js/main.js"></script>
    <style>
        img, h1 {
            display: inline-block;
            vertical-align: middle; /* Alinea ambos elementos al centro verticalmente */
        }

        h1 {
            margin-left: 10px; /* Espacio entre la imagen y el texto */
        }
    </style>
</head>

        <div class="container" style="font-family: Arial, sans-serif">
            <div class="page-header">
                <img src="ImagenesHP/Toffy’s-Books.png" alt="user-picture" width="50" height="40"> <h1 class="all-tittles">Toffy’s-Books <small>Estudiantes</small></h1>
            </div>
        </div>
        
         <div class="container-fluid" style="font-family: Arial, sans-serif">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Registrar un nuevo estudiante</div>
                <form method="post">
                <div class="form-group">
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">

                           <legend>Datos del estudiante</legend>
                           <br><br>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id="txtIdentidad_hp" value="" placeholder="Escribe el numero de identidad del alumno" pattern="[0-9-]{1,13}" required="" maxlength="13" data-toggle="tooltip" data-placement="top" title="Identidad del estudiante" name="txtIdentidad_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtIdentidad_hp">Número de Identidad</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general"  id="txtNombre_hp" value="" placeholder="Escribe los nombres del alumno" required=""  pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" maxlength="50" data-toggle="tooltip" data-placement="top" title="Nombres del estudiante" name="txtNombre_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtNombre_hp" class="form-label">Nombres del alumno</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id="txtApellido_hp" value="" placeholder="Escribe los apellidos del alumno" required="" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" maxlength="50" data-toggle="tooltip" data-placement="top" title="Apellidos del estudiante" name="txtApellido_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtApellido_hp">Apellidos</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id="txtTelefono_hp" value="" placeholder="Escribe el número de teléfono del alumno" pattern="[0-9]{8,8}" required="" maxlength="8" data-toggle="tooltip" data-placement="top" title="Solamente 8 números" name="txtTelefono_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtTelefono_hp">Teléfono</label>
                            </div>
                            <input type="hidden" id="Registrar" name="Registrar" value="1">
                            <p class="text-center">
                                <button type="reset" class="btn" style="background-color: #ffbe3d; color: white; margin: 0 10px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                                <button type="submit" class="btn btn-warning" style="margin: 0 10px;"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                                <button type="button" class="btn" onclick="location.href='liststudent.php'" style="background-color: #9F6932; color: white; margin: 0 10px;"><i class="bi bi-skip-backward-fill"></i> &nbsp;&nbsp; Regresar</button>
                            </p>

                            </div>
                       </div>
                    </div>
                </form>
            </div>
        </div>
        <footer class="footer full-reset">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <h4 class="all-tittles">Desarrollador</h4>
                        <ul class="list-unstyled">
                            <li><i class="zmdi zmdi-check zmdi-hc-fw"></i>&nbsp; Hellen Pavón <i class="zmdi zmdi-facebook zmdi-hc-fw footer-social"></i><i class="zmdi zmdi-twitter zmdi-hc-fw footer-social"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright full-reset all-tittles">© 2024 Hellen Pavón</div>
        </footer>
    </div>
</body>
</html>