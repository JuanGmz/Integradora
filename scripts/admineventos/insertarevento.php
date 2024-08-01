<?php
include ("../../class/database.php");
include ("../funciones/funciones.php");

$db = new Database();
$db->conectarDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);

    // Directorio donde se guardarán las imágenes
    $subirDir = "../../img/eventos/";

    // Nombre del archivo subido
    $nombreImagen = basename($_FILES['imgEvento']['name']);

    // Ruta completa del archivo a ser guardado
    $imagen = $subirDir . $nombreImagen;

    if (move_uploaded_file($_FILES['imgEvento']['tmp_name'], $imagen)) {
        $consulta = "INSERT INTO EVENTOS (id_lugar, id_categoria, nombre, tipo, descripcion, fecha_evento, hora_inicio, hora_fin, capacidad, precio_boleto, boletos, img_url, fecha_publicacion)
        VALUES ('$lugar', '$categoria', '$evento', '$tipo', '$descripcion', '$fechaEvento', '$horaIni', '$horaFin', '$capacidad', '$costo', '$cantidadBoletos', '$nombreImagen', '$fechaPub')";

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