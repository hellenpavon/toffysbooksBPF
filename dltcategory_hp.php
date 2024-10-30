<?php
 require_once "Libreria/MySQLConn.php";
 header('Content-Type: application/json; charset=utf-8');
  
    $json =array("success"=>false, "message"=>"");

   

    $conn = new MySQLConn("localhost", "root", "", "toffysbooks");
    $db = $conn->Conectar();
    $sqlQuery="DELETE FROM categoria_hp WHERE Id = '".$_GET["id"]."';";
    $query = $db->prepare($sqlQuery);
    
    if($query->execute()){
        $json["success"]=true;
        $json["message"]="Registro eliminado.";
    }else{
        $json["message"]="Registro no se elimino.";
    }

    echo json_encode($json);
 
?>