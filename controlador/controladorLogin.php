<?php
    if(!empty($_POST["btningresar"])){
        if(!empty($_POST["usuario"]) and !empty($_POST["clave"])){
            $usuario=$_POST["usuario"];
            $usuario=$_POST["clave"];
            $query = $db->prepare("SELECT * FROM login_hp WHERE usuario='$usuario' and clave='$clave'");
            if ($datos=$query->fetch_object()){
                header("location: home.php");
            }else{
                echo "<div class='alert alert-danger'>Acceso denegado</div>";
            }
        }else{
            echo "Campos vacios";
        }
    }
?>