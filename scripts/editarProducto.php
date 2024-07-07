<?php

    include("../class/database.php");
    $conexion = new Database();
    $conexion->conectarDB();

    $id_dpm = $_POST['id_dpm'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $imagen_nueva = $_POST['imagen_nueva'];
    $categoria = $_POST['categoria'];

    $query = 'UPDATE detalle_productos_menu SET nombre = :nombre, descripcion = :descripcion, img_url = :imagen, id_categoria = :categoria WHERE id_dpm = :id_dpm';
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':imagen', $imagen_nueva);
    $stmt->bindParam(':categoria', $categoria);
    $stmt->bindParam(':id_dpm', $_POST['id_dpm']);
    $stmt->execute();
    if ($stmt->errorCode() !== '00000') {
        $errorInfo = $stmt->errorInfo();
        die("Error en la ejecución de la consulta: " . $errorInfo[2]);
    }
    $conexion->desconectarDB();
    header('Location: ../views/adminMenu.php');
    exit;