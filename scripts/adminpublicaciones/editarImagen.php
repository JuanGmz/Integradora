<?php

    include "../../class/database.php";
    $conexion = new Database();
    $conexion->conectarDB();

    extract($_POST);

    // Directorio donde se guardarán las imágenes
    $subirDir = "../../img/publicaciones/";

    // Nombre del archivo subido
    $nombreImagen = basename($_FILES['imagen_nueva']['name']);

    // Ruta completa del archivo a ser guardado
    $imagen_nueva = $subirDir . $nombreImagen;

    // Mover el archivo subido a la carpeta de destino
    if (move_uploaded_file($_FILES['imagen_nueva']['tmp_name'], $imagen_nueva)) {
        $query = "UPDATE publicaciones SET img_url = '$nombreImagen' WHERE id_publicacion = $id_publicacion";
        $conexion->execute($query);

    } else {
        echo "Error al subir la imagen.";
    }

    $conexion->desconectarDB();

    header('Location: ../../views/adminPublicaciones.php');
    exit();