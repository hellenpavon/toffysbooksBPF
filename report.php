<!-- 
* Copyright 2024 Hellen Pavon
-->
<?php
    require_once "header_hp.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Reportes | Toffy's Books</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="ImagenesHP/Toffy’s-Books.png" />
    <script src="js/sweet-alert.min.js"></script>
    <link rel="stylesheet" href="css/sweet-alert.css">
    <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="css/timeline.css">
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
                <img src="ImagenesHP/Toffy’s-Books.png" alt="user-picture" width="50" height="40"> <h1 class="all-tittles">Toffy’s-Books <small>Reportes</small></h1>
            </div>
        </div>
        <div class="container-fluid">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="statistics">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="page-header">
                              <h2 class="all-tittles">Reportes <small>Generales</small></h2>
                            </div><br>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content">
                                    <a href="Libreria/fpdf/ReportEstudiantes.php" target="_blank" style="text-decoration: none; color: inherit;">
                                        <p class="text-center">
                                            <i class="zmdi zmdi-file-text zmdi-hc-5x"></i>
                                        </p>
                                        <h3 class="text-center">Ficha estudiante</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content">
                                    <a href="Libreria/fpdf/ReportDocentes.php" target="_blank" style="text-decoration: none; color: inherit;">
                                        <p class="text-center">
                                            <i class="zmdi zmdi-file-text zmdi-hc-5x"></i>
                                        </p>
                                        <h3 class="text-center">Ficha docente</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content text-center">
                                    <a href="Libreria/fpdf/ReportPersonal.php" target="_blank" style="text-decoration: none; color: inherit;">
                                        <p>
                                            <i class="zmdi zmdi-file-text zmdi-hc-5x"></i>
                                        </p>
                                        <h3>Ficha personal administrativo</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content">
                                    <a href="Libreria/fpdf/ReportProveedor.php" target="_blank" style="text-decoration: none; color: inherit;">
                                        <p class="text-center">
                                            <i class="zmdi zmdi-file-text zmdi-hc-5x"></i>
                                        </p>
                                        <h3 class="text-center">Ficha Proveedores</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content">
                                    <a href="Libreria/fpdf/ReportBooks.php" target="_blank" style="text-decoration: none; color: inherit;">
                                        <p class="text-center">
                                            <i class="zmdi zmdi-file-text zmdi-hc-5x"></i>
                                        </p>
                                        <h3 class="text-center">Ficha Libros</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="page-header">
                              <h2 class="all-tittles">reportes <small>generales</small></h2>
                            </div><br>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-trending-up zmdi-hc-5x"></i>
                                    </p>
                                    <h3 class="text-center">Reporte General de Inventario</h3>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-trending-up zmdi-hc-5x"></i>
                                    </p>
                                    <h3 class="text-center">Reporte Libros por Categoría</h3>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-trending-up zmdi-hc-5x"></i>
                                    </p>
                                    <h3 class="text-center">Préstamos entregados (por usuarios)</h3>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-trending-up zmdi-hc-5x"></i>
                                    </p>
                                    <h3 class="text-center">Préstamos entregados (por sección)</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="page-header">
                                <h2 class="all-tittles">reportes <small>devoluciones pendientes</small></h2>
                            </div><br>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-calendar-close zmdi-hc-5x"></i>
                                    </p>
                                    <h3 class="text-center">Docentes</h3>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-calendar-close zmdi-hc-5x"></i>
                                    </p>
                                    <h3 class="text-center">Personal Administrativo</h3>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-calendar-close zmdi-hc-5x"></i>
                                    </p>
                                    <h3 class="text-center">Estudiantes</h3>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="full-reset report-content">
                                    <p class="text-center">
                                        <i class="zmdi zmdi-calendar-close zmdi-hc-5x"></i>
                                    </p>
                                    <h3 class="text-center">Visitantes</h3>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
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