<?php
    include("../class/database.php");
    $conexion = new Database();
    $conexion->contectarDB();

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_POST['imagen'];
    $categoria = $_POST['categoria'];
    $medidas = $_POST['medidas'];
    $precio = $_POST['precio'];

    $query = 'INSERT INTO 
                productos (nombre, descripcion, imagen, categoria, precio) 
              VALUES 
                ()';

    $conexion->desconectarDB();
    header("location: ../views/adminMenu.php");
    exit;