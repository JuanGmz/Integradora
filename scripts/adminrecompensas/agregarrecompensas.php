<?php
include '../../class/database.php';

$conexion = new Database();

$conexion->conectarDB();

extract($_POST);

// Directorio donde se guardarán las imágenes
$subirDir = "../../img/recompensas/";

// Nombre del archivo subido
$nombreImagen = basename($_FILES['imagen']['name']);

// Ruta completa del archivo a ser guardado
$imagen = $subirDir . $nombreImagen;

// Mover el archivo subido a la carpeta de destino
if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen)) {
    // Consulta para agregar la recompensa, con la URL de la imagen
    $consulta = "CALL sp_agregar_recompensa('$recompensa', '$condicion', '$fechainicio', '$fechafin', '$nombreImagen')";

    $conexion->execute($consulta);

} else {
    echo "Error al subir la imagen.";
}

$conexion->desconectarDB();

header('location: ../../views/adminRecompensas.php');
