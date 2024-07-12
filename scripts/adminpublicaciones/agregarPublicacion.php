<?php
    include_once '../../class/database.php';

    $conexion = new Database();

    $conexion->conectarDB();

    // Extraer datos
    extract($_POST);

    // Directorio donde se guardarán las imágenes
    $subirDir = "../../img/publicaciones/";

    // Nombre del archivo subido
    $nombreImagen = basename($_FILES['imagen']['name']);

    // Ruta completa del archivo a ser guardado
    $imagen = $subirDir . $nombreImagen;

    // Mover el archivo subido a la carpeta de destino
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen)) {
        $query = "INSERT INTO publicaciones(titulo, descripcion, img_url, tipo) VALUES ('$titulo', '$descripcion', '$nombreImagen', '$tipo')";
        $conexion->execute($query);

    } else {
        echo "Error al subir la imagen.";
    }

    $conexion->desconectarDB();

    header('Location: ../../views/adminPublicaciones.php');
    exit;


    