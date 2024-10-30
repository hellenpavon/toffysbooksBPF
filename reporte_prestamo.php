<?php
require_once "header_hp.php"; 

// Asegúrate de que se ha pasado el ID del préstamo
if (!isset($_GET['id'])) {
    echo "<script>alert('No se ha especificado un préstamo.'); window.location.href='catalog.php';</script>";
    exit;
}

$idPrestamo = $_GET['id'];

// Obtener los detalles del préstamo
$query = $db->prepare("SELECT * FROM prestamos_hp WHERE id = :id");
$query->execute(['id' => $idPrestamo]);
$prestamo = $query->fetch(PDO::FETCH_ASSOC);

if (!$prestamo) {
    echo "<script>alert('Préstamo no encontrado.'); window.location.href='catalog.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Reporte de Préstamo | Toffy's Books</title>
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
    <div class="container">
        <h1>Reporte de Préstamo</h1>
        <p><strong>Título del Libro:</strong> <?php echo $prestamo['titulo']; ?></p>
        <p><strong>Nombre de la Persona:</strong> <?php echo $prestamo['nombrepersona']; ?></p>
        <p><strong>Fecha de Préstamo:</strong> <?php echo $prestamo['fecha_prestamo']; ?></p>
        <p><strong>Fecha de Devolución:</strong> <?php echo $prestamo['fecha_devolucion']; ?></p>
        <a href="catalog.php" class="btn btn-danger">Volver al Catálogo</a>
    </div>
</body>
</html>
