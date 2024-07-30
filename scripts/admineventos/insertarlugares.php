<?php
include ("../../class/database.php");

$db = new Database();
$db->conectarDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);

    $consulta = "INSERT INTO ubicacion_lugares (nombre, ciudad, estado, codigo_postal, calle, colonia, descripcion,lat,lng)
    VALUES ('$nombre', '$ciudad', '$estado', '$CodigoP', '$calle', '$colonia', '$descripcion', $lat, $lng)";

    if ($db->execute($consulta)) {
        echo "Inserción exitosa.";
    } else {
        echo "Error al insertar evento.";
    }
}

$db->desconectarDB();
header("location: ../../views/adminlugares.php");
?>