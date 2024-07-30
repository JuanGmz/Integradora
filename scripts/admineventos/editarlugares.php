<?php
include ("../../class/database.php");

$db = new Database();
$db->conectarDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);

    // Construir la consulta de actualización con comillas alrededor de los valores
    $consulta = "UPDATE ubicacion_lugares SET  
    nombre = '$nombre', 
    ciudad = '$ciudad', 
    estado = '$estado',
    codigo_postal = '$codigoP',
    calle = '$calle', 
    colonia = '$colonia',
    descripcion = '$descripcion',
    lat = $lat,
    lng = $lng
    WHERE id_lugar = '$id_lugar'";

    $db->execute($consulta);

    $db->desconectarDB();
    header("location: ../../views/adminlugares.php");
    exit;
}
?>