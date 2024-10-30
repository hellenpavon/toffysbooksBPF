<!-- 
* Copyright 2024 Hellen Pavon
-->
<?php
    require_once "header_hp.php"; 
    $criterio="";

    if(isset($_POST) && isset($_POST["Consulta"])){
        $criterio = $_POST["Consulta"];
    }

    $query = $db->prepare("SELECT * FROM docentes_hp where Nombres like '%".$criterio."%';");
    $query->execute();
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Docentes | Toffy's Books</title>
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
    <!-- Permite ingresar iconos desde bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
                <img src="ImagenesHP/Toffy’s-Books.png" alt="user-picture" width="50" height="40"> <h1 class="all-tittles">Toffy’s-Books <small>Docentes</small></h1>
            </div>
        </div>
        <div class="conteiner-fluid" style="font-family: Arial, sans-serif">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
                <li role="presentation"  class="active"><a href="listteacher.php">Docentes</a></li>
                <li role="presentation"><a href="liststudent.php" style="color: #9F6932;">Estudiantes</a></li>
                <li role="presentation"><a href="listpersonal.php" style="color: #9F6932;">Personal administrativo</a></li>
                <li role="presentation"><a href="provider.php" style="color: #9F6932;">Proveedores</a></li>
            </ul>
        </div>
        
        <div class="container-fluid" style="font-family: Arial, sans-serif">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                        <li class="active">Listado de docentes</li>
                        <li><a href="teacher.php" style="color: #9F6932;">Nuevo docente</a></li>  
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="font-family: Arial, sans-serif">
        <form class="pull-right" style="width: 30% !important;" method="post" action="">
            <div class="group-material">
                <input type="search" style="display: inline-block !important; width: 70%;" 
                       class="material-control tooltips-general" placeholder="Buscar docente" 
                       name="Consulta" required="" pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{1,50}" 
                       maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe los nombres">
                    <button type="submit" class="btn" style="margin: 0; height: 43px; background-color: transparent !important;">
                    <i class="zmdi zmdi-search" style="font-size: 25px;"></i>
                </button>
            </div>
        </form>

        <?php if (!empty($criterio)): // Verificar si hay criterio de búsqueda ?>
            <div class="pull-right" style="margin-top: 10px;">
                <a href="listteacher.php" class="btn btn-secondary">
                <i class="bi bi-x"></i>
                </a>
            </div>
        <?php endif; ?>
    </div>
        
        <div class="container-fluid" style="font-family: Arial, sans-serif">
            <h2 class="text-center all-tittles" style="clear: both; margin: 25px 0;">Listado de docentes</h2>
            <div>
                <a href="Libreria/fpdf/ReportDocentes.php" target="_blank" class="btn btn-warning btn-lg"><i class="bi bi-file-earmark-pdf-fill"></i></a>
            </div>
            <div class="div-table">
            <div class="div-table-row div-table-head">
                    <div class="div-table-cell">Id</div>
                    <div class="div-table-cell">Nombres</div>
                    <div class="div-table-cell">Apellidos</div>
                    <div class="div-table-cell">Identidad</div>
                    <div class="div-table-cell">Telefono</div>
                    <div class="div-table-cell">Editar</div>
                    <div class="div-table-cell">Eliminar</div>
                </div>
                    <tbody>
                    <?php
                        foreach($rows as $key => $value){
                            echo '
                                <div class="div-table-row">
                                    <div class="div-table-cell">'.$value["Id"].'</div>
                                    <div class="div-table-cell">'.$value["Nombres"].'</div>
                                    <div class="div-table-cell">'.$value["Apellidos"].'</div>
                                    <div class="div-table-cell">'.$value["Identidad"].'</div>
                                    <div class="div-table-cell">'.$value["Telefono"].'</div>
                                    <div class="div-table-cell">
                                        <a href="edtteacher_hp.php?id='.$value["Id"].'" class="btn btn-warning" >
                                        <i class="bi bi-pencil-square"></i>
                                        </a>
                                    </div>
                                    <div class="div-table-cell">
                                        <a href="dltteacher.php?id='.$value["Id"].'" class="btn btn-danger eliminar" >
                                        <i class="bi bi-trash3"></i>
                                        </a>
                                    </div>
                                </div>
                            ';
                        }
                    ?>
                    </tbody>
        </table>
        <script>
             $(".eliminar").on("click", function(e) {
                    e.preventDefault();

                    let op = confirm("¿Desea eliminar el registro?");
                    if(op) {
                        let url = $(this).attr("href");
                        let id = new URLSearchParams(url.split('?')[1]).get('id');
                        
                        fetch('dltteacher.php?id=' + id, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                            }
                        })
                        .then(response => {
                            if (response.ok) {
                                return response.json();
                            } else {
                                throw new Error("Error en la respuesta");
                            }
                        })
                        .then(data => {
                            if (data.success) {
                                // Remover la fila o elemento correspondiente después de la eliminación
                                $(this).closest(".div-table-row").fadeOut("normal", function() {
                                    $(this).remove();
                                });
                            } else {
                                console.log("No se pudo eliminar el registro");
                            }
                        })
                        .catch(error => {
                            console.error("Error:", error);
                        });
                    }
                });

        </script>
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