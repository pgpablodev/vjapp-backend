<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");

    include("db.php");

    $sqlSelectVideojuego="SELECT `id`, `nombre`, `precio`, `portada` FROM `videojuegos`";
    $videojuegos = array();

    $result = $mysqli->query($sqlSelectVideojuego);
    if($result->num_rows>0){
        while($fila=$result->fetch_assoc()){
            $id=$fila["id"];
            $nombre=$fila["nombre"];
            $precio=$fila["precio"];
            $portada=$fila["portada"];
            $videojuegos[] = array($id,$nombre,$precio,$portada);
        }
    }

    echo json_encode($videojuegos);
?>