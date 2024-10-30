<!-- 
* Copyright 2024 Hellen Pavon
-->
<?php
    require_once "header_hp.php"; 
    $criterio="";

    if(!empty($_POST["Registrar"])) {
        if(empty($_POST["txtNombres_hp"])) {
            echo '<div class="alert alert-danger" role="alert">Favor digitar un Nombre!.</div>';
        } else {
            // Validación de longitud de "Identidad" y "Teléfono"
            $identidad = $_POST["txtIdentidad_hp"];
            $telefono = $_POST["txtTelefono_hp"];

            if(strlen($identidad) != 13) {
                echo '<div class="alert alert-danger" role="alert">El número de identidad debe tener exactamente 13 caracteres.</div>';
            } elseif(strlen($telefono) != 8) {
                echo '<div class="alert alert-danger" role="alert">El número de teléfono debe tener exactamente 8 dígitos.</div>';
            } else {
                $sqlQuery = "INSERT INTO personal_hp (Identidad, Nombres, Apellidos, Telefono, Cargo) VALUES (
                    '".$identidad."',
                    '".$_POST["txtNombres_hp"]."',
                    '".$_POST["txtApellidos_hp"]."',
                    '".$telefono."',
                    '".$_POST["txtCargo_hp"]."'
                );";
                
                $query = $db->prepare($sqlQuery);
                if($query->execute()) {
                    echo '<div class="alert alert-success">Datos Registrados</div>';
                } else {
                    echo '<div class="alert alert-danger">Error al registrar los datos.</div>';
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Personal | Toffy's Books</title>
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
    <script src="js/main.js"></script>
    <!-- Permite ingresar iconos desde bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
                <img src="ImagenesHP/Toffy’s-Books.png" alt="user-picture" width="50" height="40"> <h1 class="all-tittles">Toffy’s-Books <small>Personal</small></h1>
            </div>
        </div>

        <div class="container-fluid" style="font-family: Arial, sans-serif">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Registrar un nuevo personal</div>
                <form method="post">
                <div class="form-group">
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">

                           <legend>Datos de la persona</legend>
                           <br><br>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id="txtIdentidad_hp" value="" placeholder="Escribe el numero de identidad de la persona" pattern="[0-9-]{1,13}" required="" maxlength="13" data-toggle="tooltip" data-placement="top" title="Identidad del personal" name="txtIdentidad_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtIdentidad_hp">Número de Identidad</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general"  id="txtNombres_hp" value="" placeholder="Escribe los nombres del personal" required=""  pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" maxlength="50" data-toggle="tooltip" data-placement="top" title="Nombres del personal" name="txtNombres_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtNombres_hp" class="form-label">Nombres de la persona</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id="txtApellidos_hp" value="" placeholder="Escribe los apellidos del personal" required="" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" maxlength="50" data-toggle="tooltip" data-placement="top" title="Apellidos del personal" name="txtApellidos_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtApellidos_hp">Apellidos</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id="txtTelefono_hp" value="" placeholder="Escribe el número de teléfono del personal" pattern="[0-9]{8,8}" required="" maxlength="8" data-toggle="tooltip" data-placement="top" title="Solamente 8 números" name="txtTelefono_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtTelefono_hp">Teléfono</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id="txtCargo_hp" value="" placeholder="Escribe aquí el cargo del personal administrativo" required="" maxlength="30" data-toggle="tooltip" data-placement="top" title="Cargo del personal administrativo" name="txtCargo_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtCargo_hp">Cargo</label>
                            </div>
                            <input type="hidden" id="Registrar" name="Registrar" value="1">
                            <p class="text-center">
                                <button type="reset" class="btn" style="background-color: #ffbe3d; color: white; margin: 0 10px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                                <button type="submit" class="btn btn-warning" style="margin: 0 10px;"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                                <button type="button" class="btn" onclick="location.href='listpersonal.php'" style="background-color: #9F6932; color: white; margin: 0 10px;"><i class="bi bi-skip-backward-fill"></i> &nbsp;&nbsp; Regresar</button>
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