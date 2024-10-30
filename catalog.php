<?php
    session_start();
    require_once "header_hp.php";
    $criterio="";
    if(isset($_POST) && isset($_POST["Consulta"])){
        $criterio = $_POST["Consulta"];
    }
    $imagenDirectorio = 'uploads/';
    $query = $db->prepare("SELECT * FROM libros_hp WHERE titulo LIKE :criterio");
    $query->execute(['criterio' => '%' . $criterio . '%']);
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Catalago | Toffy's Books</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
<body>
    <div class="container" style="font-family: Arial, sans-serif">
        <div class="page-header" style="font-family: Arial, sans-serif">
            <img src="ImagenesHP/Toffy’s-Books.png" alt="user-picture" width="50" height="40">
            <h1 class="all-tittles">Toffy’s-Books <small>Catálogo</small></h1>
        </div>
    </div>
    <div class="container-fluid" style="font-family: Arial, sans-serif">
        <form class="pull-right" style="width: 30% !important;" method="post" action="">
            <div class="group-material">
                <input type="search" style="display: inline-block !important; width: 70%;" 
                       class="material-control tooltips-general" placeholder="Buscar libro" 
                       name="Consulta" required="" pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{1,50}" 
                       maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe los nombres">
                    <button type="submit" class="btn" style="margin: 0; height: 43px; background-color: transparent !important;">
                    <i class="zmdi zmdi-search" style="font-size: 25px;"></i>
                </button>
            </div>
        </form style="font-family: Arial, sans-serif">
        <?php if (!empty($criterio)): // Verificar si hay criterio de búsqueda ?>
            <div class="pull-right" style="margin-top: 10px;">
                <a href="catalog.php" class="btn btn-secondary">
                <i class="bi bi-x"></i>
                </a>
            </div>
        <?php endif; ?>
        </div>
        </form>
        <h2 class="text-center all-tittles" style="clear: both; margin: 25px 0;">Catálogo</h2>
        <div style="display: flex; justify-content: space-between; align-items: center;">
        <!-- Botón de agregar libro a la izquierda -->
        <a href="book.php" class="btn btn-warning btn-lg">
            <i class="bi bi-journal-plus"></i>
        </a>
        <br><br>
        <!-- Botón de reporte PDF a la derecha -->
        <div>
            <a href="Libreria/fpdf/ReportBooks.php" target="_blank" class="btn btn-warning btn-lg">
                <i class="bi bi-file-earmark-pdf-fill"></i>
            </a>
        </div>
    </div>
    <table class="table">
    <thead style="background-color: #dca73fe7; color: white;">
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Libro</th>
            <th scope="col">Título</th>
            <th scope="col">Autor</th>
            <th scope="col">Ejemplares</th>
            <th scope="col">Eliminar</th>
            <th scope="col">Préstamo</th>
        </tr>
    </thead>
    <?php
    foreach ($rows as $key => $value) {
        echo '
            <tr>
                <td>' . $value["codigo"] . '</td>
                <td><img src="' . $value["imagen"] . '" alt="Imagen de ' . $value["titulo"] . '" width="90" height="120"></td>
                <td>' . $value["titulo"] . '</td>
                <td>' . $value["autor"] . '</td>
                <td>' . $value["ejemplares"] . '</td>
                <td>
                    <a href="dltteacher.php?id=' . $value["Id"] . '" class="btn btn-danger eliminar">
                        <i class="bi bi-trash3"></i>
                    </a>
                </td>
                <td>
                    <a href="prestamo.php?id=' . $value["Id"] . '" class="btn btn-success">
                        <i class="bi bi-files"></i>
                    </a>
                </td> <!-- Botón para generar préstamo -->
            </tr>
        ';
    }
    ?>
</table>

    </div>
</body>
</html>
