<?php
require_once "header_hp.php"; 
require_once "Libreria/fpdf/fpdf.php"; // Asegúrate de que la ruta sea correcta

// Verificar que se ha pasado un ID de libro
if (!isset($_GET['id'])) {
    echo "<script>alert('No se ha especificado un libro.'); window.location.href='catalog.php';</script>";
    exit;
}

$idLibro = $_GET['id'];

// Obtener los detalles del libro
$query = $db->prepare("SELECT * FROM libros_hp WHERE Id = :id");
$query->execute(['id' => $idLibro]);
$libro = $query->fetch(PDO::FETCH_ASSOC);

if (!$libro) {
    echo "<script>alert('Libro no encontrado.'); window.location.href='catalog.php';</script>";
    exit;
}

// Procesar el préstamo
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombrepersona = $_POST['nombrepersona']; // Asigna el valor del formulario
    $fechaPrestamo = date('Y-m-d');
    $fechaDevolucion = $_POST['fecha_devolucion'];

    // Guardar el nombre del libro en lugar del ID
    $tituloLibro = $libro['titulo']; // Obtiene el título del libro

    // Insertar el préstamo en la base de datos con el título del libro
    $insertQuery = $db->prepare("INSERT INTO prestamos_hp (nombre_libro, nombrepersona, fecha_prestamo, fecha_devolucion) VALUES (:nombre_libro, :nombrepersona, :fecha_prestamo, :fecha_devolucion)");
    $insertQuery->execute([
        'nombre_libro' => $tituloLibro, // Cambiar id_libro por nombre_libro
        'nombrepersona' => $nombrepersona,
        'fecha_prestamo' => $fechaPrestamo,
        'fecha_devolucion' => $fechaDevolucion
    ]);

    // Obtener el ID del préstamo registrado
    $prestamoId = $db->lastInsertId();

    if ($query->execute()) {
        echo '<div class="alert alert-success" role="alert">Datos actualizados correctamente.</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error al actualizar los datos.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Préstamo | Toffy's Books</title>
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
        <div class="page-header">
            <img src="ImagenesHP/Toffy’s-Books.png" alt="user-picture" width="50" height="40"> <h1 class="all-tittles">Toffy’s-Books <small>Préstamo</small></h1>
        </div>
    </div>
    <br><br><br>
    <div class="container" style="font-family: Arial, sans-serif">
        <h1>Generar Préstamo para: <?php echo $libro['titulo']; ?></h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nombrepersona">Nombre de la Persona:</label>
                <input type="text" class="form-control" id="nombrepersona" name="nombrepersona" required>
            </div>
            <div class="form-group">
                <label for="fecha_devolucion">Fecha de Devolución:</label>
                <input type="date" class="form-control" id="fecha_devolucion" name="fecha_devolucion" required>
            </div>
            <button type="submit" class="btn btn-success">Registrar Préstamo</button>
            <a href="catalog.php" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
</body>
<br><br><br><br><br>
<?php
    require_once "footer.php";
?>
</html>