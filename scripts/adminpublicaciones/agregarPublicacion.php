<?php
    include_once '../../class/database.php';
    $conexion = new Database();
    $conexion->conectarDB();

    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_POST['imagen'];
    $tipo = $_POST['tipo'];

    $query = "INSERT INTO publicaciones(titulo, descripcion, img_url, tipo) VALUES (:titulo, :descripcion, :imagen, :tipo)";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':titulo', $titulo); 
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':imagen', $imagen);
    $stmt->bindParam(':tipo', $tipo);

    $stmt->execute();

    if ($stmt->errorCode() !== '00000') {
        $errorInfo = $stmt->errorInfo();
        die("Error en la ejecución de la consulta: " . $errorInfo[2]);
    }
    $conexion->desconectarDB();

    header('Location: ../../views/adminPublicaciones.php');
    exit;


    