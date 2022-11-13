<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");

    include("db.php");

    $id=$_GET["id"];
    $nombre=$_POST["nombre"];
    $precio=$_POST["precio"];

    $dir_subida='portadas/';

    if(isset($_FILES['foto'])){
        $fichero_subido = $dir_subida.basename($_FILES['foto']['name']);
        if(move_uploaded_file($_FILES['foto']['tmp_name'],$fichero_subido)){
        $subido='SI'; 
        }else{
            $subido='NO'; 
        }
    }else{
        $subido='NO';   
    }

    if($nombre!=""){
        $sqlUpdateVideojuego="UPDATE `videojuegos` SET ";

        $sqlUpdateVideojuego.="`nombre`='".$nombre."'";
        $sqlUpdateVideojuego.=", `precio`='".$precio."'";

        if($subido=="SI"){
            $sqlUpdateVideojuego.=",`portada`='".$fichero_subido."'";
        }

        $sqlUpdateVideojuego.=" WHERE `id`=".$id;

        if($mysqli->query($sqlUpdateVideojuego)){
            echo 1;    
        }else{
            echo 0;
        }
    }else{
        echo 0;
    }
?>