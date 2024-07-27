<?php
include_once '../../class/database.php';

$conexion = new Database();

$conexion->conectarDB();

// Extraer datos
extract($_POST);

// Directorio donde se guardarán las imágenes
$subirDir = "/var/www/html/img/publicaciones/";

if (!file_exists($subirDir)) {
    mkdir($subirDir, 0775, true);
}

if (is_writable($subirDir)) {
    $nombreImagen = basename($_FILES['imagen']['name']);
    $imagen = $subirDir . $nombreImagen;
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen)) {
        $query = "INSERT INTO publicaciones(titulo, descripcion, img_url, tipo) VALUES ('$titulo', '$descripcion', '$nombreImagen', '$tipo')";
        $conexion->execute($query);
    } else {
        echo "Error al mover el archivo. Detalles: " . error_get_last()['message'];
    }
} else {
    echo "El directorio $subirDir no tiene permisos de escritura.";
    echo "Permisos actuales: " . substr(sprintf('%o', fileperms($subirDir)), -4);
    echo "Usuario del script: " . get_current_user();
}

$conexion->desconectarDB();

header('Location: ../../views/adminPublicaciones.php');
exit;

