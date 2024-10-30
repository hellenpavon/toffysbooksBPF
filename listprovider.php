<!-- 
* Copyright 2024 Hellen Pavon
-->
<?php
    require_once "header_hp.php"; 

    if(isset($_POST)){

        if(!empty($_POST["Registrar"])){
             if(empty($_POST["txtNombre"])){
                echo '<div class="alert alert-danger" role="alert">Favor digitar un Nombre!.</div>';
             }else{
                $sqlQuery ="INSERT INTO proveedores
                (Nombre,
                 Email,
                 Direccion,
                 Telefono)
                    VALUES ('".$_POST["txtNombre"]."',
                            '".$_POST["txtEmail"]."',
                            '".$_POST["txtDireccion"]."',
                            '".$_POST["txtTelefono"]."');";
                                
                $query = $db->prepare($sqlQuery);
                if($query->execute()){
                   echo '<div class="alert alert-succes" role="alert">Datos Registrados!</div>';
                }
                 
             }
        }
    }    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Proveedores | Toffy's Books</title>
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
        <div class="container">
            <div class="page-header">
                <img src="ImagenesHP/Toffy’s-Books.png" alt="user-picture" width="50" height="40"> <h1 class="all-tittles">Toffy’s-Books <small>Proveedores</small></h1>
            </div>
        </div>
        
        <div class="container-fluid" style="font-family: Arial, sans-serif">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Agregar un nuevo proveedor</div>
                <form method="post">
                <div class="form-group">
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id="txtNombre" value="" placeholder="Nombre de proveedor" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe el nombre del proveedor" name="txtNombre">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtNombre" class="form-label">Nombre del proveedor</label>
                            </div>
                            <div class="group-material">
                                <input type="email" class="material-control tooltips-general" id="txtEmail" value="" placeholder="Email de proveedor" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe el Email del proveedor" name="txtEmail">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtEmail">Email</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id="txtDireccion" value="" placeholder="Dirección de proveedor" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Escribe la dirección del proveedor" name="txtDireccion">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtDireccion">Dirección</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id="txtTelefono" value="" placeholder="Teléfono de proveedor" required="" pattern="[0-9]{8,8}" maxlength="8" data-toggle="tooltip" data-placement="top" title="Solo números, mínimo 8 dígitos" name="txtTelefono">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtTelefono">Teléfono</label>
                            </div>
                   
                            <input type="hidden" id="Registrar" name="Registrar" value="1">
                            <p class="text-center">
                                <button type="reset" class="btn" style="background-color: #ffbe3d; color: white; margin: 0 10px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                                <button type="submit" class="btn btn-warning" style="margin: 0 10px;"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                                <button type="button" class="btn" onclick="location.href='provider.php'" style="background-color: #9F6932; color: white; margin: 0 10px;"><i class="bi bi-skip-backward-fill"></i> &nbsp;&nbsp; Regresar</button>
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