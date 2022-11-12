<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == "OPTIONS") {
        die();
    }

    $mysqli = new mysqli("localhost","root","","videojuegos");

    if($mysqli -> connect_errno){
        printf("Error de conexión: %s\n", $mysqli -> connect_error);
        exit();
    }

    $mysqli -> set_charset("utf8");
?>