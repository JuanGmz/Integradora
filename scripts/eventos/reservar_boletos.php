<?php
include("../../class/database.php");

$conexion = new Database();
$conexion->conectarDB();

$id_cliente = $_POST['id_cliente'];
$id_evento = $_POST['id_evento'];
$c_boletos = $_POST['c_boletos'];
$id_mp = $_POST['id_mp'];

// Llamamos al procedimiento almacenado para realizar la reserva
$sql = "CALL SP_reserva_evento($id_cliente, $id_evento, $c_boletos, $id_mp)";
$result = $conexion->select($sql);

// Verificamos si la llamada al procedimiento almacenado fue exitosa
if ($result !== false && is_array($result) && isset($result[0]->id_reserva)) {
    $id_reserva = $result[0]->id_reserva;

    // Redirigimos a la página de confirmación con el ID de la reserva
    header("Location: ../../views/eventos/confirmacion_reserva.php?id_reserva=" . $id_reserva);
    exit;
} else {
    die("Error al realizar la reserva.");
}
?>