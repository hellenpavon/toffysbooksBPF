<?php
    require_once "header_hp.php";

    // Proceso de actualización
    if ($_POST && !empty($_POST["Registrar"])) {
        if (empty($_POST["txtNombres_hp"])) {
            echo '<div class="alert alert-danger" role="alert">¡Favor digite un nombre!</div>';
        } elseif (empty($_POST["txtIdentidad_hp"])) {
            echo '<div class="alert alert-danger" role="alert">¡Favor digite un número de identidad!</div>';
        } else {
            // Consulta segura utilizando parámetros
            $sqlQuery = "UPDATE docentes_hp SET Nombres = :nombres, Identidad = :identidad, Apellidos = :apellidos, Telefono = :telefono WHERE Id = :id";
            $query = $db->prepare($sqlQuery);
            $query->bindParam(':nombres', $_POST["txtNombres_hp"], PDO::PARAM_STR);
            $query->bindParam(':identidad', $_POST["txtIdentidad_hp"], PDO::PARAM_STR);
            $query->bindParam(':apellidos', $_POST["txtApellidos_hp"], PDO::PARAM_STR);
            $query->bindParam(':telefono', $_POST["txtTelefono_hp"], PDO::PARAM_STR);
            $query->bindParam(':id', $_POST["txtId_hp"], PDO::PARAM_INT);

            if ($query->execute()) {
                echo '<div class="alert alert-success" role="alert">Datos actualizados correctamente.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error al actualizar los datos.</div>';
            }
        }
    }

    // Proceso de consulta
    $id = "";
    if ($_GET && isset($_GET["id"])) {
        $id = $_GET["id"];
    }

    // Evitar inyección SQL en la consulta
    $query = $db->prepare("SELECT * FROM docentes_hp WHERE Id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $rows = $query->fetch(PDO::FETCH_ASSOC);
?>