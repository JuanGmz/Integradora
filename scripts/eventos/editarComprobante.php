<?php

include "../../class/database.php";

$db = new Database();
$db->conectarDB();

extract($_POST);

$subirDir = "../../img/comprobantes/";

if (!file_exists($subirDir)) {
    mkdir($subirDir, 0777, true);
}

if (is_writable($subirDir)) {
    $nombreImagen = basename($_FILES['imagen_nueva']['name']);
    $imagen = $subirDir . $nombreImagen;
    if (move_uploaded_file($_FILES['imagen_nueva']['tmp_name'], $imagen)) {
        $editarComprobante = "UPDATE comprobantes SET imagen_comprobante = '$nombreImagen' WHERE id_reserva = $folio";
        $db->execute($editarComprobante);
        header("location: ../../views/reservas.php");
    } else {
        header("location: ../../views/reservas.php");
    }
} else {
    echo "El directorio $subirDir no tiene permisos de escritura.";
    echo "Permisos actuales: " . substr(sprintf('%o', fileperms($subirDir)), -4);
    echo "Usuario del script: " . get_current_user();
}
exit;