<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");

    include("db.php");

    $sqlEliminarVideojuego = "DELETE FROM `videojuegos` WHERE `id`=".$_GET["id"];

    if($mysqli->query($sqlEliminarVideojuego)){
        echo 1;    
    }else{
        echo 0;
    }
?>