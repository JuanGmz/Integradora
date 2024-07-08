<?php

    include '../../class/database.php';
    $conexion = new Database();
    $conexion->conectarDB();

    extract($_POST);

    $query = "UPDATE publicaciones SET titulo = '$titulo', tipo = '$tipo', descripcion = '$descripcion' WHERE id_publicacion = $id_publicacion";

    $conexion->execute($query);

    $conexion->desconectarDB();

    header("Location: ../../views/adminPublicaciones.php");
    exit;