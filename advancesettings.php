<!-- 
* Copyright 2024 Hellen Pavon
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Configuracion | Toffy's Books</title>
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
<body>
    <div class="navbar-lateral full-reset">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile custom-scroll-containers">
            <div class="logo full-reset all-tittles">
                <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button" style="line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i> 
                <b>Toffy’s-Books</b>
            </div>
            <div class="full-reset" style="background-color:#282a2d; padding: 5px 0; color:#fff;">
                <figure>
                    <img src="ImagenesHP/Toffy’s Books (3).png" alt="Biblioteca" class="img-responsive center-box" style="width:50%;">
                </figure>
                <p class="text-center" style="font-family: Arial, sans-serif" style="padding-top: 5px;">admin</p>
            </div>
            <div class="full-reset nav-lateral-list-menu" style="background-color:#282a2d;">
                <ul class="list-unstyled" style="font-family: Arial, sans-serif;">
                    <li><a href="home.php"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Inicio</a></li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-case zmdi-hc-fw"></i>&nbsp;&nbsp; Administración <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="institution.php"><i class="zmdi zmdi-balance zmdi-hc-fw"></i>&nbsp;&nbsp; Datos institución</a></li>
                            <li><a href="provider.php"><i class="zmdi zmdi-truck zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo proveedor</a></li>
                            <li><a href="category.php"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Nueva categoría</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp; Usuarios <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="admin.php"><i class="zmdi zmdi-face zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo administrador</a></li>
                            <li><a href="teacher.php"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo docente</a></li>
                            <li><a href="student.php"><i class="zmdi zmdi-accounts zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo estudiante</a></li>
                            <li><a href="personal.php"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo personal administrativo</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i>&nbsp;&nbsp; Libros <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="book.php"><i class="zmdi zmdi-book zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo libro</a></li>
                            <li><a href="catalog.php"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Catálogo</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-alarm zmdi-hc-fw"></i>&nbsp;&nbsp; Préstamos<i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="loan.php"><i class="zmdi zmdi-calendar zmdi-hc-fw"></i>&nbsp;&nbsp; Todos los préstamos</a></li>
                            <li>
                                <a href="loanpending.php"><i class="zmdi zmdi-time-restore zmdi-hc-fw"></i>&nbsp;&nbsp; Devoluciones pendientes <span class="label label-danger pull-right label-mhover">7</span></a>
                            </li>
                            <li>
                                <a href="loanreservation.php"><i class="zmdi zmdi-timer zmdi-hc-fw"></i>&nbsp;&nbsp; Reservaciones <span class="label label-danger pull-right label-mhover">7</span></a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="report.php"><i class="zmdi zmdi-trending-up zmdi-hc-fw"></i>&nbsp;&nbsp; Reportes</a></li>
                    <li><a href="advancesettings.php"><i class="zmdi zmdi-wrench zmdi-hc-fw"></i>&nbsp;&nbsp; Configuraciones avanzadas</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers" style="font-family: Arial, sans-serif">
        <nav class="navbar-user-top full-reset" style="background-color:#282a2d;">
            <ul class="list-unstyled full-reset">
                <figure>
                   <img src="assets/img/user01.png" alt="user-picture" class="img-responsive img-circle center-box">
                </figure>
                <li style="color:#fff; cursor:default;">
                    <span class="all-tittles">Toffy’s-Books</span>
                </li>
                <li  class="tooltips-general exit-system-button" data-href="index.php" data-placement="bottom" title="Salir del sistema">
                    <i class="zmdi zmdi-power"></i>
                </li>
                <li  class="tooltips-general search-book-button" data-href="searchbook.php" data-placement="bottom" title="Buscar libro">
                    <i class="zmdi zmdi-search"></i>
                </li>
                <li  class="tooltips-general btn-help" data-placement="bottom" title="Ayuda">
                    <i class="zmdi zmdi-help-outline zmdi-hc-fw"></i>
                </li>
                <li class="mobile-menu-button visible-xs" style="float: left !important;">
                    <i class="zmdi zmdi-menu"></i>
                </li>
            </ul>
        </nav>
        <div class="container" style="font-family: Arial, sans-serif">
            <div class="page-header">
                <img src="ImagenesHP/Toffy’s-Books.png" alt="user-picture" width="50" height="40"> <h1 class="all-tittles">Toffy’s-Books <small>Configuracion</small></h1>
            </div>
        </div>
        <ul class="nav nav-tabs nav-justified" role="tablist" style="font-family: Arial, sans-serif">
            <li role="presentation" class="active"><a href="#security" aria-controls="security" role="tab" data-toggle="tab" style="color: chocolate;">Seguridad</a></li>
            <li role="presentation"><a href="#others" aria-controls="others" role="tab" data-toggle="tab">Otras opciones</a></li>
        </ul>
        <div class="tab-content" style="font-family: Arial, sans-serif">
            <div role="tabpanel" class="tab-pane fade in active" id="security">
                <div class="container-fluid"  style="margin: 50px 0;">
                    <div class="row">
                        
                    </div>
                </div>  
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="report-content">
                                <p class="text-center"><i class="zmdi zmdi-cloud-download zmdi-hc-4x"></i></p>
                                <h3 class="text-center all-tittles">realizar copia de seguridad</h3>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="report-content">
                                <p class="text-center"><i class="zmdi zmdi-cloud-upload zmdi-hc-4x"></i></p>
                                <h3 class="text-center all-tittles">restaurar el sistema</h3>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="report-content">
                                <p class="text-center"><i class="zmdi zmdi-cloud-off zmdi-hc-4x"></i></p>
                                <h3 class="text-center all-tittles">borrar copias de seguridad</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="others" style="font-family: Arial, sans-serif">
                <div class="container-fluid"  style="margin: 50px 0;">
                    <div class="row">
                        
                    </div>
                </div>
                <div class="container-fluid" style="font-family: Arial, sans-serif">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="report-content">
                                <p class="text-center"><i class="zmdi zmdi-calendar-close zmdi-hc-4x"></i></p>
                                <h3 class="text-center all-tittles">eliminar préstamos</h3>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="report-content">
                                <p class="text-center"><i class="zmdi zmdi-male-alt zmdi-hc-4x"></i></p>
                                <h3 class="text-center all-tittles">eliminar docentes</h3>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="report-content">
                                <p class="text-center"><i class="zmdi zmdi-accounts-alt zmdi-hc-4x"></i></p>
                                <h3 class="text-center all-tittles">eliminar estudiantes</h3>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="report-content">
                                <p class="text-center"><i class="zmdi zmdi-male-female zmdi-hc-4x"></i></p>
                                <h3 class="text-center all-tittles">eliminar personal ad.</h3>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="report-content">
                                <p class="text-center"><i class="zmdi zmdi-book zmdi-hc-4x"></i></p>
                                <h3 class="text-center all-tittles">eliminar libros</h3>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4" style="font-family: Arial, sans-serif">
                            <div class="report-content">
                                <p class="text-center"><i class="zmdi zmdi-time-restore-setting zmdi-hc-4x"></i></p>
                                <h3 class="text-center all-tittles">eliminar bitacora</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>      
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp" style="font-family: Arial, sans-serif">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                </div>
                <div class="modal-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore dignissimos qui molestias ipsum officiis unde aliquid consequatur, accusamus delectus asperiores sunt. Quibusdam veniam ipsa accusamus error. Animi mollitia corporis iusto.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                </div>
            </div>
          </div>
        </div>
        <br>
        <br>
        <br>
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