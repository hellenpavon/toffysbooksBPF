<?php
    require_once "header_hp.php";

    // Proceso de actualización
    if ($_POST && !empty($_POST["Registrar"])) {
        if (empty($_POST["txtNombres_hp"])) {
            echo '<div class="alert alert-danger" role="alert">¡Favor digite un nombre!</div>';
        } elseif (empty($_POST["txtIdentidad_hp"])) {
            echo '<div class="alert alert-danger" role="alert">¡Favor digite un número de identidad!</div>';
        } else {
            // Consulta segura utilizando parámetros
            $sqlQuery = "UPDATE docentes_hp SET Nombres = :nombres, Identidad = :identidad, Apellidos = :apellidos, Telefono = :telefono WHERE Id = :id";
            $query = $db->prepare($sqlQuery);
            $query->bindParam(':nombres', $_POST["txtNombres_hp"], PDO::PARAM_STR);
            $query->bindParam(':identidad', $_POST["txtIdentidad_hp"], PDO::PARAM_STR);
            $query->bindParam(':apellidos', $_POST["txtApellidos_hp"], PDO::PARAM_STR);
            $query->bindParam(':telefono', $_POST["txtTelefono_hp"], PDO::PARAM_STR);
            $query->bindParam(':id', $_POST["txtId_hp"], PDO::PARAM_INT);

            if ($query->execute()) {
                echo '<div class="alert alert-success" role="alert">Datos actualizados correctamente.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error al actualizar los datos.</div>';
            }
        }
    }

    // Proceso de consulta
    $id = "";
    if ($_GET && isset($_GET["id"])) {
        $id = $_GET["id"];
    }

    // Evitar inyección SQL en la consulta
    $query = $db->prepare("SELECT * FROM docentes_hp WHERE Id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $rows = $query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Categorías | Toffy's Books</title>
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
    .btn-custom {
        font-size: 3em; /* Aumenta el tamaño de la fuente */
        padding: 30px 40px; /* Ajusta el padding para hacer el botón más grande */
    }
</style>
</head>

       <br>
       <br>
        <div class="container-fluid" style="font-family: Arial, sans-serif">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Editar docente</div>
                <form method="post">
                <div class="form-group">
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <div class="group-material" style="display: none;">
                                <input type="text" class="material-control tooltips-general" id="txtId_hp" value="<?php echo $rows["Id"]; ?>" placeholder="Id del docente" maxlength="50" title="Escribe el codigo de la categoria" name="txtId_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtId_hp" class="form-label">Id</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id="txtNombres_hp" value="<?php echo $rows["Nombres"]; ?>" placeholder="Escribe aquí los nombres del docente" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe los nombres del docente, solamente letras" name="txtNombres_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtNombres_hp" class="form-label">Nombres del docente</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id="txtApellidos_hp" value="<?php echo $rows["Apellidos"]; ?>" placeholder="Escribe aquí los apellidos del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe los apellidos del docente, solamente letras" name="txtApellidos_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtApellidos_hp">Apellidos</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id="txtIdentidad_hp" value="<?php echo $rows["Identidad"]; ?>" placeholder="Escribe aquí el número de Identidad del docente" pattern="[0-9-]{1,13}" required="" maxlength="13" data-toggle="tooltip" data-placement="top" title="Solamente números y guiones, 13 dígitos" name="txtIdentidad_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtIdentidad_hp">Número de Identidad</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id="txtTelefono_hp" value="<?php echo $rows["Telefono"]; ?>" placeholder="Escribe aquí el número de teléfono del docente" pattern="[0-9]{8,8}" required="" maxlength="8" data-toggle="tooltip" data-placement="top" title="Solamente 8 números" name="txtTelefono_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtTelefono_hp">Teléfono</label>
                            </div>
                   
                            <input type="hidden" id="Registrar" name="Registrar" value="1">
                            <p class="text-center">
                                <button type="button" onclick="location.href='listteacher.php'" class="btn" style="background-color: #9F6932;; color: white;"><i class="bi bi-skip-backward-fill"></i> &nbsp;&nbsp; Regresar</button>
                                <button type="submit" class="btn btn-warning"><i class="bi bi-floppy"></i> &nbsp;&nbsp; Guardar</button>
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