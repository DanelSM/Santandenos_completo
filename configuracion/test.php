<?php
require_once "conexion.php";

try{
    $db = Database:: connect();

    echo "conexion exitosa";

}catch(PDOException $e){
    echo ("error de conexion".$e->getMessage());
}
?>
