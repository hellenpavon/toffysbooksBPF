<!-- 
* Copyright 2024 Hellen Pavon
-->
<?php
    require_once "header_hp.php";
    $criterio="";

    
    if (!empty($_POST["Registrar"])) {
        // Verificar si el nombre del usuario está vacío como ejemplo
        if (empty($_POST["nombre_libro"])) {
            echo '<div class="alert alert-danger" role="alert">Favor digitar un Nombre!.</div>';
        } else {
            $sqlQuery = "INSERT INTO prestamos_hp (nombre_libro, nombrepersona, fecha_prestamo, fecha_devolucion)
                         VALUES (
                             :nombre_libro,
                             :nombrepersona,
                             :fecha_prestamo,
                             :fecha_devolucion
                         );";
            
            $query = $db->prepare($sqlQuery);
            $query->bindParam(':nombre_libro', $_POST["txtLibro_hp"]);
            $query->bindParam(':nombrepersona', $_POST["txtUsuario_hp"]);
            $query->bindParam(':fecha_prestamo', $_POST["txtTipo_hp"]);
            $query->bindParam(':fecha_devolucion', $_POST["txtEntrega_hp"]);
            
            if ($query->execute()) {
                echo '<div class="alert alert-success d-flex justify-content-between align-items-center">
                        <span>Datos Registrados</span>
                        <a href="loan.php" class="btn btn-link align-items-rigth" style="color: red; text-decoration: none;" aria-label="Close">
                            <i class="bi bi-x-lg"></i>
                        </a>
                      </div>';
            }
                        
        }
    }
    

    if(isset($_POST) && isset($_POST["Consulta"])){
        $criterio = $_POST["Consulta"];
    }
    $query = $db->prepare("SELECT * FROM prestamos_hp WHERE nombre_libro LIKE :criterio");
    $query->execute(['criterio' => '%' . $criterio . '%']);
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Prestamos | Toffy's Books</title>
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
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
                <img src="ImagenesHP/Toffy’s-Books.png" alt="user-picture" width="50" height="40"> <h1 class="all-tittles">Toffy’s-Books <small>Prestamos</small></h1>
            </div>
        </div>
        <div class="container-fluid"  style="margin: 50px 0;">
        <div class="container-fluid" style="font-family: Arial, sans-serif">
            <!-- Botón para abrir el modal -->
            <h2 class="text-center all-tittles" style="clear: both; margin: 25px 0;">Listado de préstamos</h2>
            <div>
                <a href="Libreria/fpdf/ReportPrestamo.php" target="_blank" class="btn btn-warning"><i class="bi bi-file-earmark-pdf-fill"></i> PDF</a>
            </div>
                <div style="display: flex; justify-content: space-between; align-items: center;">
            <br><br>
        <!-- Tabla -->
        <div class="div-table" style="font-family: Arial, sans-serif">
            <div class="div-table-row div-table-head">
                <div class="div-table-cell">Nombre del Libro</div>
                <div class="div-table-cell">Nombre Usuario</div>
                <div class="div-table-cell">Fecha Solicitud</div>
                <div class="div-table-cell">Fecha Entrega</div>
                <div class="div-table-cell">Devuelto</div>
            </div>
            <tbody>
                    <?php
                        foreach($rows as $key => $value){
                            echo '
                                <div class="div-table-row">
                                    <div class="div-table-cell">'.$value["nombre_libro"].'</div>
                                    <div class="div-table-cell">'.$value["nombrepersona"].'</div>
                                    <div class="div-table-cell">'.$value["fecha_prestamo"].'</div>
                                    <div class="div-table-cell">'.$value["fecha_devolucion"].'</div>
                                    <div class="div-table-cell">
                                        <a href="dltprestamo.php?id='.$value["id"].'" class="btn btn-success eliminar" >
                                        <i class="bi bi-box-seam"></i>
                                        </a>
                                    </div>
                                </div>
                            ';
                        }
                    ?>
                    </tbody>
                    <script>
                 $(".eliminar").on("click", function(e) {
                    e.preventDefault();  // Evita que el enlace siga su acción por defecto

                    let op = confirm("¿Desea eliminar el registro?");
                    if(op) {
                        // Obteniendo el ID de la URL del enlace de eliminar
                        let url = $(this).attr("href");
                        let id = new URLSearchParams(url.split('?')[1]).get('id');
                        
                        fetch('dltprestamo.php?id=' + id, {
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
        </div>
        </div>
        <br>
        <br>
        <br><br><br>
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