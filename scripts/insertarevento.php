<?php
include("../class/database.php");

$db = new Database();
$db->conectarDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);

    $consulta = "INSERT INTO EVENTOS (id_lugar, id_categoria, nombre, tipo, descripcion, fecha_evento, hora_inicio, hora_fin, capacidad, precio_boleto, disponibilidad, img_url, fecha_publicacion)
    VALUES ('$lugar', '$categoria', '$evento', '$tipo', '$descripcion', '$fechaEvento', '$horaIni', '$horaFin', '$cap', '$costo', '$cap', '$imgEvento', '$fechaPub')";

    if ($db->execute($consulta)) {
        echo "Inserción exitosa.";
    } else {
        echo "Error al insertar evento.";
    }
}

$db->desconectarDB();
header("location: ../views/adminEventos.php");
