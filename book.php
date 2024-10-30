<!-- 
* Copyright 2024 Hellen Pavon
-->
<?php
    require_once "header_hp.php"; 
    $criterio = "";
    
    // Verificación de formulario
    if (!empty($_POST["Registrar"])) {
        if (empty($_POST["txttitulo_hp"])) {
            echo '<div class="alert alert-danger" role="alert">Favor digitar un Nombre!.</div>';
        } else {
            // Manejo de la imagen
            $target_dir = "uploads/";
            
            // Verifica si la carpeta existe y crea si es necesario
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true); // Crea la carpeta si no existe
            }
    
            $target_file = $target_dir . basename($_FILES["imagen_hp"]["name"]);
            $uploadOk = 1;
    
            // Verifica si el archivo es una imagen
            $check = getimagesize($_FILES["imagen_hp"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                echo '<div class="alert alert-danger">El archivo no es una imagen.</div>';
                $uploadOk = 0;
            }
    
            // Mueve el archivo cargado a la carpeta destino
            if ($uploadOk == 1 && move_uploaded_file($_FILES["imagen_hp"]["tmp_name"], $target_file)) {
                // Inserta los datos en la base de datos si la carga de la imagen fue exitosa
                $sqlQuery = "INSERT INTO libros_hp (
                                categoria, 
                                codigo, 
                                titulo, 
                                imagen, 
                                autor, 
                                proveedor, 
                                anio, 
                                editorial, 
                                ejemplares, 
                                cargo
                            ) VALUES (
                                '".$_POST["categoria_hp"]."',
                                '".$_POST["txtcodigo_hp"]."',
                                '".$_POST["txttitulo_hp"]."',
                                '".$target_file."',
                                '".$_POST["txtautor_hp"]."',
                                '".$_POST["proveedor_hp"]."',
                                '".$_POST["txtanio_hp"]."',
                                '".$_POST["txteditorial_hp"]."',
                                '".$_POST["txtejemplares_hp"]."',
                                '".$_POST["cargo"]."'
                            );";
    
                $query = $db->prepare($sqlQuery);
                if ($query->execute()) {
                    echo '<div class="alert alert-success">Datos Registrados</div>';
                } else {
                    echo '<div class="alert alert-danger">Error al registrar los datos en la base de datos.</div>';
                }
            } else {
                echo '<div class="alert alert-danger">Hubo un error al subir la imagen.</div>';
            }
        }
    }
    
    // Consulta para obtener categorías
    $query = $db->prepare("SELECT id, nombre FROM categoria_hp");
    $query->execute();
    $categorias = $query->fetchAll(PDO::FETCH_ASSOC);
    // Consulta para obtener proveedores
    $queryProveedores = $db->prepare("SELECT id, nombre FROM proveedores");
    $queryProveedores->execute();
    $proveedores = $queryProveedores->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Libros | Toffy's Books</title>
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
                <img src="ImagenesHP/Toffy’s-Books.png" alt="user-picture" width="50" height="40"> <h1 class="all-tittles">Toffy’s-Books <small>Libros</small></h1>
            </div>
        </div>
        <!-- <div class="container-fluid"  style="font-family: Arial, sans-serif">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
                <li role="presentation"  class="active"><a href="book.php">Libros</a></li>
                <li role="presentation"><a href="category.php">Categorías</a></li>
            </ul>
        </div> -->


        <div class="container-fluid" style="font-family: Arial, sans-serif">
         <form method="post" enctype="multipart/form-data">
                <div class="container-flat-form">
                    <div class="title-flat-form title-flat-blue">Nuevo libro</div>
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <legend><strong>Información básica</strong></legend><br>
                            <div class="group-material">
                                <span>Categoría</span>
                                <select for="categoria_hp" class="tooltips-general material-control" id="categoria_hp" value="" data-toggle="tooltip" data-placement="top" title="Elige la categoría del libro" name="categoria_hp">
                                <option value="" disabled selected>Selecciona una categoría</option>
                                <?php foreach ($categorias as $categoria): ?>
                                    <option value="<?php echo $categoria['id']; ?>">
                                        <?php echo htmlspecialchars($categoria['nombre']); ?>
                                    </option>
                                <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="group-material">
                                <input type="text" class="tooltips-general material-control" id="txtcodigo_hp" value="" placeholder="Escribe aquí el código correlativo del libro" pattern="[0-9]{1,13}" required="" maxlength="13" data-toggle="tooltip" data-placement="top" title="Escribe el código correlativo del libro, solamente números" name="txtcodigo_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtcodigo_hp">Código correlativo</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="tooltips-general material-control" id="txttitulo_hp" value="" placeholder="Escribe aquí el título o nombre del libro" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Escribe el título o nombre del libro" name="txttitulo_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txttitulo_hp">Título</label>
                            </div>
                            <div class="group-material">
                                <label>Imagen</label>
                                <br><br>
                                <input type="file" class="form-control" name="imagen_hp" required style="display: block;">
                            </div>
                            <div class="group-material">
                                <input type="text" class="tooltips-general material-control" id="txtautor_hp" value=""  placeholder="Escribe aquí el autor del libro" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Escribe el nombre del autor del libro" name="txtautor_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtautor_hp">Autor</label>
                            </div>
                            <legend><strong>Otros datos</strong></legend><br>
                            <div class="group-material">
                                <span>Proveedor</span>
                                <select name="proveedor_hp" class="tooltips-general material-control" id="proveedor_hp" value="" data-toggle="tooltip" data-placement="top" title="Elige el proveedor del libro" name="proveedor_hp">
                                    <option value="" disabled="" selected="">Selecciona un proveedor</option>
                                    <?php foreach ($proveedores as $proveedor): ?>
                                        <option value="<?php echo $proveedor['id']; ?>">
                                            <?php echo htmlspecialchars($proveedor['nombre']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                           <div class="group-material">
                               <input type="text" class="material-control tooltips-general" id="txtanio_hp" value=""  placeholder="Escribe aquí el año del libro" required="" pattern="[0-9]{1,4}" maxlength="4" data-toggle="tooltip" data-placement="top" title="Solamente números, sin espacios" name="txtanio_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtanio_hp">Año</label>
                           </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id="txteditorial_hp" value="" placeholder="Escribe aquí la editorial del libro" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Editorial del libro" name="txteditorial_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txteditorial_hp">Editorial</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id="txtedicion_hp" value="" placeholder="Escribe aquí la edición del libro" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Edición del libro">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtedicion_hp">Edición</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" name="txtejemplares_hp" placeholder="Escribe aquí la cantidad de libros que registraras" required=" "pattern="[0-9]{1,7}" maxlength="7" data-toggle="tooltip" data-placement="top" title="¿Cuántos libros registraras?" name="txtejemplares_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtejemplares_hp">Ejemplares</label>
                            </div>
                            <div class="group-material">
                                <span>Cargo</span>
                                <select name="cargo" class="tooltips-general material-control" data-toggle="tooltip" data-placement="top" title="Elige el cargo del libro">
                                    <option value="" disabled="" selected="">Selecciona el cargo del libro</option>
                                    <option value="1-1">Entrega del ministerio</option>
                                    <option value="1-2">Donaciones</option>
                                    <option value="1-5">Otros</option>
                                </select>
                            </div>
                            <input type="hidden" id="Registrar" name="Registrar" value="1">
                            <p class="text-center">
                                <button type="reset" class="btn" style="background-color: #ffbe3d; color: white; margin: 0 10px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                                <button type="submit" class="btn btn-warning" style="margin: 0 10px;"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                                <button type="button" class="btn" onclick="location.href='catalog.php'" style="background-color: #9F6932; color: white; margin: 0 10px;"><i class="bi bi-skip-backward-fill"></i> &nbsp;&nbsp; Regresar</button>
                            </p>
                       </div>
                   </div>
                </div>
            </form>
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