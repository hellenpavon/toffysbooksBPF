<!-- 
* Copyright 2024 Hellen Pavon
-->
<?php
    require_once "header_hp.php"; 
    $criterio = "";

    // Consultas de conteo
    // Estudiantes
    $resultEstudiantes = $db->query("SELECT COUNT(*) AS total FROM estudiante_hp");
    $totalEstudiantes = $resultEstudiantes->fetch(PDO::FETCH_ASSOC)['total'];

    // Proveedores
    $resultProveedores = $db->query("SELECT COUNT(*) AS total FROM proveedores");
    $totalProveedores = $resultProveedores->fetch(PDO::FETCH_ASSOC)['total'];

    // Docentes
    $resultDocentes = $db->query("SELECT COUNT(*) AS total FROM docentes_hp");
    $totalDocentes = $resultDocentes->fetch(PDO::FETCH_ASSOC)['total'];

    // Personal
    $resultPersonal = $db->query("SELECT COUNT(*) AS total FROM personal_hp");
    $totalPersonal = $resultPersonal->fetch(PDO::FETCH_ASSOC)['total'];

    // Libros
    $resultLibros = $db->query("SELECT COUNT(*) AS total FROM libros_hp");
    $totalLibros = $resultLibros->fetch(PDO::FETCH_ASSOC)['total'];

    // Categorias
    $resultCategorias = $db->query("SELECT COUNT(*) AS total FROM categoria_hp");
    $totalCategorias = $resultCategorias->fetch(PDO::FETCH_ASSOC)['total'];

    // Prestamos
    $resultPrestamos = $db->query("SELECT COUNT(*) AS total FROM prestamos_hp");
    $totalPrestamos = $resultPrestamos->fetch(PDO::FETCH_ASSOC)['total'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Toffy's Books | Biblioteca</title>
    <meta charset="UTF-8">
    <link rel="Shortcut Icon" type="image/x-icon" href="ImagenesHP/Toffy’s-Books.png" />
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
        <div class="container">
            <div class="page-header">
                <img src="ImagenesHP/Toffy’s-Books.png" alt="user-picture" width="50" height="40"> <h1 class="all-tittles">Toffy’s-Books <small>Inicio</small></h1>
        </div> 
<body>
    <section class="full-reset text-center" style="padding: 40px 0;">
        <article class="tile" style="display: inline-block; width: 220px; height: auto; border: 1px solid #E1E1E1; position: relative; cursor: pointer; margin: 10px;">
                <div class="tile-icon" style="color: #ffbe3d; border-bottom: 1px solid #E1E1E1; font-size: 50px; height: 110px; line-height: 110px;">
                    <i class="zmdi zmdi-accounts" style="transition: all .3s ease-in-out;"></i>
                </div>
                <div class="tile-name" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); z-index: 7; padding: 0 10px; border-radius: 15px; background-color: #fff; border: 1px solid #E1E1E1; max-width: 95%; min-width: 60%; width: auto;">
                    Estudiantes
                </div>
                <div class="tile-num" style="background-color: #F5F5F5; font-size: 40px; height: 110px; line-height: 110px;">
                    <?php echo $totalEstudiantes; ?>
                </div>
            </article>

            <article class="tile" style="display: inline-block; width: 220px; height: auto; border: 1px solid #E1E1E1; position: relative; cursor: pointer; margin: 10px;">
                <div class="tile-icon" style="color: #ffbe3d; border-bottom: 1px solid #E1E1E1; font-size: 50px; height: 110px; line-height: 110px;">
                    <i class="zmdi zmdi-truck" style="transition: all .3s ease-in-out;"></i>
                </div>
                <div class="tile-name" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); z-index: 7; padding: 0 10px; border-radius: 15px; background-color: #fff; border: 1px solid #E1E1E1; max-width: 95%; min-width: 60%; width: auto;">
                    Proveedores
                </div>
                <div class="tile-num" style="background-color: #F5F5F5; font-size: 40px; height: 110px; line-height: 110px;">
                    <?php echo $totalProveedores; ?>
                </div>
            </article>

            <article class="tile" style="display: inline-block; width: 220px; height: auto; border: 1px solid #E1E1E1; position: relative; cursor: pointer; margin: 10px;">
                <div class="tile-icon" style="color: #ffbe3d; border-bottom: 1px solid #E1E1E1; font-size: 50px; height: 110px; line-height: 110px;">
                    <i class="zmdi zmdi-male-alt" style="transition: all .3s ease-in-out;"></i>
                </div>
                <div class="tile-name" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); z-index: 7; padding: 0 10px; border-radius: 15px; background-color: #fff; border: 1px solid #E1E1E1; max-width: 95%; min-width: 60%; width: auto;">
                    Docentes
                </div>
                <div class="tile-num" style="background-color: #F5F5F5; font-size: 40px; height: 110px; line-height: 110px;">
                    <?php echo $totalDocentes; ?>
                </div>
            </article>

            <article class="tile" style="display: inline-block; width: 220px; height: auto; border: 1px solid #E1E1E1; position: relative; cursor: pointer; margin: 10px;">
                <div class="tile-icon" style="color: #ffbe3d; border-bottom: 1px solid #E1E1E1; font-size: 50px; height: 110px; line-height: 110px;">
                    <i class="zmdi zmdi-male-female" style="transition: all .3s ease-in-out;"></i>
                </div>
                <div class="tile-name" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); z-index: 7; padding: 0 10px; border-radius: 15px; background-color: #fff; border: 1px solid #E1E1E1; max-width: 95%; min-width: 60%; width: auto;">
                    Personal Administrativo
                </div>
                <div class="tile-num" style="background-color: #F5F5F5; font-size: 40px; height: 110px; line-height: 110px;">
                    <?php echo $totalPersonal; ?>
                </div>
            </article>

            <article class="tile" style="display: inline-block; width: 220px; height: auto; border: 1px solid #E1E1E1; position: relative; cursor: pointer; margin: 10px;">
                <div class="tile-icon" style="color: #ffbe3d; border-bottom: 1px solid #E1E1E1; font-size: 50px; height: 110px; line-height: 110px;">
                    <i class="zmdi zmdi-book" style="transition: all .3s ease-in-out;"></i>
                </div>
                <div class="tile-name" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); z-index: 7; padding: 0 10px; border-radius: 15px; background-color: #fff; border: 1px solid #E1E1E1; max-width: 95%; min-width: 60%; width: auto;">
                    Libros
                </div>
                <div class="tile-num" style="background-color: #F5F5F5; font-size: 40px; height: 110px; line-height: 110px;">
                    <?php echo $totalLibros; ?>
                </div>
            </article>

            <article class="tile" style="display: inline-block; width: 220px; height: auto; border: 1px solid #E1E1E1; position: relative; cursor: pointer; margin: 10px;">
                <div class="tile-icon" style="color: #ffbe3d; border-bottom: 1px solid #E1E1E1; font-size: 50px; height: 110px; line-height: 110px;">
                    <i class="zmdi zmdi-bookmark-outline" style="transition: all .3s ease-in-out;"></i>
                </div>
                <div class="tile-name" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); z-index: 7; padding: 0 10px; border-radius: 15px; background-color: #fff; border: 1px solid #E1E1E1; max-width: 95%; min-width: 60%; width: auto;">
                    Categorías
                </div>
                <div class="tile-num" style="background-color: #F5F5F5; font-size: 40px; height: 110px; line-height: 110px;">
                    <?php echo $totalCategorias; ?>
                </div>
            </article>
        </section>
        <br>
        <br>
        <br>
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