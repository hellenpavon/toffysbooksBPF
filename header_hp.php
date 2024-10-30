<?php
    session_start();
    require_once "Libreria/MySQLConn.php";
    $conn = new MySQLConn("localhost", "root", "", "toffysbooks");
    $db = $conn->Conectar();
?>
<!-- Permite ingresar iconos desde bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="Shortcut Icon" type="image/x-icon" href="ImagenesHP/Toffy’s-Books.png" />
<body>
    <div class="navbar-lateral full-reset">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset container-menu-movile custom-scroll-containers">
            <div class="logo full-reset all-tittles">
                <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button" style="line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;"></i> 
                <b>Toffy’s-Books</b>
            </div>
            <div class="full-reset" style="background-color:#482E1D; padding: 5px 0; color:#fff;">
                <figure>
                    <img src="ImagenesHP/ToffysBooks.png" alt="Biblioteca" class="img-responsive center-box" style="width:50%;">
                </figure>
                <p class="text-center" style="font-family: Arial, sans-serif" style="padding-top: 5px;">admin</p>
            </div>
            <div class="full-reset nav-lateral-list-menu" style="background-color:#482E1D;">
                <ul class="list-unstyled" style="font-family: Arial, sans-serif;">
                    <li><a href="home.php"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Inicio</a></li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp; Usuarios <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="listteacher.php"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo docente</a></li>
                            <li><a href="liststudent.php"><i class="zmdi zmdi-accounts zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo estudiante</a></li>
                            <li><a href="listpersonal.php"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo personal administrativo</a></li>
                            <li><a href="provider.php"><i class="zmdi zmdi-truck zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo proveedor</a></li>
                        </ul>
                    </li>
                    <!-- <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i>&nbsp;&nbsp; Libros <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="book.php"><i class="zmdi zmdi-book zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo libro</a></li>
                        </ul>
                    </li> -->
                    <li><a href="category.php"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Nueva categoría</a></li>
                    <li><a href="catalog.php"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Catálogo</a></li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-alarm zmdi-hc-fw"></i>&nbsp;&nbsp; Préstamos<i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="loan.php"><i class="zmdi zmdi-calendar zmdi-hc-fw"></i>&nbsp;&nbsp; Todos los préstamos</a></li>
                            <!-- <li>
                                <a href="loanpending.php"><i class="zmdi zmdi-time-restore zmdi-hc-fw"></i>&nbsp;&nbsp; Devoluciones</a>
                            </li> -->
                        </ul>
                    </li>
                    <li><a href="report.php"><i class="zmdi zmdi-trending-up zmdi-hc-fw"></i>&nbsp;&nbsp; Reportes</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-page-container full-reset custom-scroll-containers">
        <nav class="navbar-user-top full-reset" style="background-color:#482E1D;">
            <ul class="list-unstyled full-reset">
                <figure>
                   <img src="ImagenesHP/ToffysBooks.png" alt="user-picture" class="img-responsive img-circle center-box">
                </figure>
                <li style="color:#fff; cursor:default;">
                    <span class="all-tittles">Toffy’s-Books</span>
                </li>
                <li class="tooltips-general exit-system-button" data-href="index.php" data-placement="bottom" title="Salir del sistema" style="color: white;">
                    <i class="zmdi zmdi-power"></i>
                </li>
                <li class="mobile-menu-button visible-xs" style="float: left !important;">
                    <i class="zmdi zmdi-menu" style="color: white;"></i>
                </li>

            </ul>
        </nav>