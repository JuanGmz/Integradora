<?php
    include_once '../../class/database.php';
    $conexion = new Database();
    $conexion->conectarDB();

    // Extraer datos
    extract($_POST);

    $query = "INSERT INTO publicaciones(titulo, descripcion, img_url, tipo) VALUES ('$titulo', '$descripcion', '$imagen', '$tipo')";
    $conexion->execute($query);

    $conexion->desconectarDB();

    header('Location: ../../views/adminPublicaciones.php');
    exit;


    