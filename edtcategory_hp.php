<?php
    require_once "header_hp.php";

    // Proceso de actualización
    if ($_POST && !empty($_POST["Registrar"])) {
        if (empty($_POST["txtCodigo_hp"])) {
            echo '<div class="alert alert-danger" role="alert">¡Código no válido!</div>';
        } elseif (empty($_POST["txtNombre_hp"])) {
            echo '<div class="alert alert-danger" role="alert">¡Favor digite un nombre!</div>';
        } else {
            // Consulta segura utilizando parámetros
            $sqlQuery = "UPDATE categoria_hp SET Codigo = :codigo, Nombre = :nombre WHERE Id = :id";
            $query = $db->prepare($sqlQuery);
            $query->bindParam(':codigo', $_POST["txtCodigo_hp"], PDO::PARAM_STR);
            $query->bindParam(':nombre', $_POST["txtNombre_hp"], PDO::PARAM_STR);
            $query->bindParam(':id', $_POST["txtId"], PDO::PARAM_INT);

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
    $query = $db->prepare("SELECT * FROM categoria_hp WHERE Id = :id");
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

<div class="container">
            <div class="page-header">
                <img src="ImagenesHP/Toffy’s-Books.png" alt="user-picture" width="50" height="40"> <h1 class="all-tittles">Toffy’s-Books <small>Categorías</small></h1>
            </div>
        </div>
<div class="container-fluid" style="font-family: Arial, sans-serif">
        <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Editar categoria</div>
                <form method="post">
                            <div class="form-group">
                                <div class="row">
                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                        <div class="group-material">
                                            <input type="text" class="material-control tooltips-general" id="txtId" value="<?php echo $rows["Id"]; ?>" placeholder="Id de la categoria"  maxlength="50" title="Escribe el codigo de la categoria" name="txtId" >
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label for="txtId" class="form-label">Id</label>
                                        </div>
                                        <div class="group-material">
                                            <input type="text" class="material-control tooltips-general" id="txtCodigo_hp" value="<?php echo $rows["Codigo"]; ?>" placeholder="Nombre de proveedor" required="" maxlength="4" data-toggle="tooltip" data-placement="top" title="Escribe el codigo de la categoria" name="txtCodigo_hp" >
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label for="txtCodigo_hp">Código</label>
                                        </div>
                                        <div class="group-material">
                                            <input type="text" class="material-control tooltips-general" id="txtNombre_hp" value="<?php echo $rows["Nombre"]; ?>" placeholder="Dirección de proveedor" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Escribe el nombre de la categoria" name="txtNombre_hp">
                                            <span class="highlight"></span>
                                            <span class="bar"></span>
                                            <label for="txtNombre_hp" class="form-label">Nombre</label>
                                        </div>
                                        
                                        <input type="hidden" id="Registrar" name="Registrar" value="1">
                                        <p class="text-center">
                                            <button type="button" onclick="location.href='category.php'" class="btn btn-success">Regresar<i class="bi bi-skip-backward-fill"></i></button>
                                            <button type="submit" class="btn btn-warning">Guardar<i class="bi bi-floppy"></i></button>
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