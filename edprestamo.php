<?php
    require_once "header_hp.php";

    // Proceso de actualización
    if ($_POST && !empty($_POST["Registrar"])) {
        if (empty($_POST["txtLibro_hp"])) {
            echo '<div class="alert alert-danger" role="alert">¡Favor digite un libro!</div>';
        } elseif (empty($_POST["txtNombre_hp"])) {
            echo '<div class="alert alert-danger" role="alert">¡Favor digite un nombre!</div>';
        } else {
            // Consulta segura utilizando parámetros
            $sqlQuery = "UPDATE prestamos_hp SET Libro = :libro, Usuario = :usuario, Tipo = :tipo, Solicitud = :solicitud, Entrega = :entrega WHERE Id = :id";
            $query = $db->prepare($sqlQuery);
            $query->bindParam(':libro', $_POST["txtLibro_hp"], PDO::PARAM_STR);
            $query->bindParam(':usuario', $_POST["txtUsuario_hp"], PDO::PARAM_STR);
            $query->bindParam(':tipo', $_POST["txtTipo_hp"], PDO::PARAM_STR);
            $query->bindParam(':solicitud', $_POST["txtSolicitud_hp"], PDO::PARAM_STR);
            $query->bindParam(':entrega', $_POST["txtEntrega_hp"], PDO::PARAM_STR);
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
    $query = $db->prepare("SELECT * FROM prestamos_hp WHERE Id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $rows = $query->fetch(PDO::FETCH_ASSOC);
?>
        <div class="modal fade" id="modalRegistroEstudiante" tabindex="-1" aria-labelledby="modalRegistroEstudianteLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <form method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="txtLibro_hp">Libro</label>
                                <input type="text" class="form-control" value="<?php echo $rows["Libro"]; ?>" id="txtLibro_hp" name="txtLibro_hp" required>
                            </div>
                            <div class="form-group">
                                <label for="txtUsuario_hp">Usuario</label>
                                <input type="text" class="form-control" value="<?php echo $rows["Usuario"]; ?>" id="txtUsuario_hp" name="txtUsuario_hp" required>
                            </div>
                            <div class="form-group">
                                <label for="txtTipo_hp">Tipo</label>
                                <input type="text" class="form-control" value="<?php echo $rows["Tipo"]; ?>" id="txtTipo_hp" name="txtTipo_hp" required>
                            </div>
                            <div class="form-group">
                                <label for="txtSolicitud_hp">Fecha de Solicitud</label>
                                <input type="date" class="form-control" value="<?php echo $rows["Solicitud"]; ?>" id="txtSolicitud_hp" name="txtSolicitud_hp" required>
                            </div>
                            <div class="form-group">
                                <label for="txtEntrega_hp">Fecha de Entrega</label>
                                <input type="date" class="form-control" value="<?php echo $rows["Entrega"]; ?>" id="txtEntrega_hp" name="txtEntrega_hp" required>
                            </div>
                        </div>
                        <input type="hidden" id="Registrar" name="Registrar" value="1">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>

                    </div>
                </div>
            </div>