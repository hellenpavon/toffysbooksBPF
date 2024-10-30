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
            $sqlQuery = "UPDATE libros_hp SET categoria = :categoria, codigo = :codigo, titulo = :titulo, imagen = :imagen, autor = :autor, proveedor = :proveedor, anio = :anio, editorial = :editorial, ejemplares = :ejemplares, cargo = :cargo, WHERE Id = :id";
            $query = $db->prepare($sqlQuery);
            $query->bindParam(':categoria', $_POST["categoria_hp"], PDO::PARAM_STR);
            $query->bindParam(':codigo', $_POST["txtcodigo_hp"], PDO::PARAM_STR);
            $query->bindParam(':titulo', $_POST["txttitulo_hp"], PDO::PARAM_STR);
            $query->bindParam(':imagen', $target_file, PDO::PARAM_STR);
            $query->bindParam(':autor', $_POST["txtautor_hp"], PDO::PARAM_STR);
            $query->bindParam(':proveedor', $_POST["proveedor_hp"], PDO::PARAM_STR);
            $query->bindParam(':anio', $_POST["txtanio_hp"], PDO::PARAM_STR);
            $query->bindParam(':editorial', $_POST["txteditorial_hp"], PDO::PARAM_STR);
            $query->bindParam(':ejemplares', $_POST["txtejemplares_hp"], PDO::PARAM_STR);
            $query->bindParam(':cargo', $_POST["cargo"], PDO::PARAM_STR);
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
    $query = $db->prepare("SELECT * FROM libros_hp WHERE Id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $rows = $query->fetch(PDO::FETCH_ASSOC);
?>
        <div class="container-fluid" style="font-family: Arial, sans-serif">
         <form method="post" enctype="multipart/form-data">
                <div class="container-flat-form">
                    <div class="title-flat-form title-flat-blue">Nuevo libro</div>
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <legend><strong>Información básica</strong></legend><br>
                            <div class="group-material">
                                <span>Categoría</span>
                                <select for="categoria_hp" class="tooltips-general material-control" id="categoria_hp" value="<?php echo $rows["categoria"]; ?>" data-toggle="tooltip" data-placement="top" title="Elige la categoría del libro" name="categoria_hp">
                                <option value="" disabled selected>Selecciona una categoría</option>
                                <?php foreach ($categorias as $categoria): ?>
                                    <option value="<?php echo $categoria['id']; ?>">
                                        <?php echo htmlspecialchars($categoria['nombre']); ?>
                                    </option>
                                <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="group-material">
                                <input type="text" class="tooltips-general material-control" id="txtcodigo_hp" value="<?php echo $rows["codigo"]; ?>" placeholder="Escribe aquí el código correlativo del libro" pattern="[0-9]{1,13}" required="" maxlength="13" data-toggle="tooltip" data-placement="top" title="Escribe el código correlativo del libro, solamente números" name="txtcodigo_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtcodigo_hp">Código correlativo</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="tooltips-general material-control" id="txttitulo_hp" value="<?php echo $rows["titulo"]; ?>" placeholder="Escribe aquí el título o nombre del libro" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Escribe el título o nombre del libro" name="txttitulo_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txttitulo_hp">Título</label>
                            </div>
                            <div class="group-material">
                                <label>Imagen</label>
                                <br><br>
                                <input type="file" class="form-control" name="imagen_hp" required style="display: block;">
                            </div>
                            <div class="group-material">
                                <input type="text" class="tooltips-general material-control" id="txtautor_hp" value="<?php echo $rows["autor"]; ?>"  placeholder="Escribe aquí el autor del libro" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Escribe el nombre del autor del libro" name="txtautor_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtautor_hp">Autor</label>
                            </div>
                            <legend><strong>Otros datos</strong></legend><br>
                            <div class="group-material">
                                <span>Proveedor</span>
                                <select name="proveedor_hp" class="tooltips-general material-control" id="proveedor_hp" value="<?php echo $rows["proveedor"]; ?>" data-toggle="tooltip" data-placement="top" title="Elige el proveedor del libro" name="proveedor_hp">
                                    <option value="" disabled="" selected="">Selecciona un proveedor</option>
                                    <?php foreach ($proveedores as $proveedor): ?>
                                        <option value="<?php echo $proveedor['id']; ?>">
                                            <?php echo htmlspecialchars($proveedor['nombre']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                           <div class="group-material">
                               <input type="text" class="material-control tooltips-general" id="txtanio_hp" value="<?php echo $rows["anio"]; ?>"  placeholder="Escribe aquí el año del libro" required="" pattern="[0-9]{1,4}" maxlength="4" data-toggle="tooltip" data-placement="top" title="Solamente números, sin espacios" name="txtanio_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtanio_hp">Año</label>
                           </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id="txteditorial_hp" value="<?php echo $rows["editorial"]; ?>" placeholder="Escribe aquí la editorial del libro" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Editorial del libro" name="txteditorial_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txteditorial_hp">Editorial</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" id="txtedicion_hp" value="<?php echo $rows["edicion"]; ?>" placeholder="Escribe aquí la edición del libro" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Edición del libro">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtedicion_hp">Edición</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" name="txtejemplares_hp" value="<?php echo $rows["ejemplares"]; ?>" placeholder="Escribe aquí la cantidad de libros que registraras" required=" "pattern="[0-9]{1,7}" maxlength="7" data-toggle="tooltip" data-placement="top" title="¿Cuántos libros registraras?" name="txtejemplares_hp">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="txtejemplares_hp">Ejemplares</label>
                            </div>
                            <div class="group-material">
                                <span>Cargo</span>
                                <select name="cargo" class="tooltips-general material-control" value="<?php echo $rows["cargo"]; ?>" data-toggle="tooltip" data-placement="top" title="Elige el cargo del libro">
                                    <option value="" disabled="" selected="">Selecciona el cargo del libro</option>
                                    <option value="1-1">Entrega del ministerio</option>
                                    <option value="1-2">Donaciones</option>
                                    <option value="1-5">Otros</option>
                                </select>
                            </div>
                            <input type="hidden" id="Registrar" name="Registrar" value="1">
                            <p class="text-center">
                                <button type="reset" class="btn" style="background-color: #ffbe3d; color: white; margin: 0 10px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                                <button type="submit" class="btn btn-warning" style="margin: 0 10px;"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                                <button type="button" class="btn" onclick="location.href='catalog.php'" style="background-color: #9F6932; color: white; margin: 0 10px;"><i class="bi bi-skip-backward-fill"></i> &nbsp;&nbsp; Regresar</button>
                            </p>
                       </div>
                   </div>
                </div>
            </form>
        </div>
    </div>
    </div>