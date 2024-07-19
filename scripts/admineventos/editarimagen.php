<?php
include ("../../class/database.php");

$db = new Database();
$db->conectarDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);

    // Asegúrate de que id_evento es un número entero
    $id_evento = intval($id_evento);

    // Directorio donde se guardarán las imágenes
    $subirDir = "../../img/eventos/";

    // Nombre del archivo subido
    $nombreImagen = basename($_FILES['imagen_nueva']['name']);

    // Ruta completa del archivo a ser guardado
    $imagen = $subirDir . $nombreImagen;

    // Mover el archivo subido a la carpeta de destino
    if (move_uploaded_file($_FILES['imagen_nueva']['tmp_name'], $imagen)) {
        // Construir la consulta de actualización
        $consulta = "UPDATE EVENTOS SET img_url = '$nombreImagen' WHERE id_evento = '$id_evento'";
                        
        if ($db->execute($consulta)) {
            echo "Inserción exitosa.";
        } else {
            echo "Error al insertar evento.";
        }

    } else {
        echo "Error al subir la imagen.";
    }
}

$db->desconectarDB();
header("location: ../../views/adminEventos.php");
exit;