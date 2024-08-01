<?php
include ("../../class/database.php");

$db = new Database();
$db->conectarDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);

    // Asegúrate de que id_evento es un número entero
    $id_evento = intval($id_evento);

    // Construir la consulta de actualización
    $consulta = "UPDATE EVENTOS SET  
        nombre = '$titulo',
        tipo = '$tipo', 
        descripcion = '$descripcion',
        fecha_evento = '$fecha', 
        hora_inicio = '$horainicio', 
        hora_fin = '$horafin',
        capacidad = '$capacidad',
        boletos = '$boletos', 
        precio_boleto = '$costo', 
        fecha_publicacion = '$fechaPub'
        WHERE id_evento = '$id_evento'";
    $db->execute($consulta);
}

$db->desconectarDB();
header("location: ../../views/adminEventos.php");
exit;