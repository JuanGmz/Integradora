<?php
include ("../../class/database.php");

$db = new Database();
$db->conectarDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);

    // Asegúrate de que id_bolsa es un número entero
    $id_bolsa = intval($id_bolsa);

    // Directorio donde se guardarán las imágenes
    $subirDir = "../../img/bolsas/";

    // Nombre del archivo subido
    $nombreImagen = basename($_FILES['imagen_nueva']['name']);

    // Ruta completa del archivo a ser guardado
    $imagen = $subirDir . $nombreImagen;

    // Mover el archivo subido a la carpeta de destino
    if (move_uploaded_file($_FILES['imagen_nueva']['tmp_name'], $imagen)) {
        // Construir la consulta de actualización
        $consulta = "UPDATE bolsas_cafe SET img_url = '$nombreImagen' WHERE id_bolsa = '$id_bolsa'";

        if ($db->execute($consulta)) {
            echo "Actualización exitosa.";
        } else {
            echo "Error al actualizar la imagen.";
        }

    } else {
        echo "Error al subir la imagen.";
    }
}

$db->desconectarDB();
header("location: ../../views/adminProductosEcommerce.php");
exit;
?>