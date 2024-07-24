<?php
include("../class/database.php");

$db = new Database();
$db->conectarDB();

// Obtener los datos del cliente, producto y cantidad desde el formulario
$id_cliente = $_POST['id_cliente'];
$id_dbc = $_POST['id_dbc'];
$cantidad = $_POST['cantidad'];
$peso=$_POST['peso'];

// Preparar la llamada al procedimiento almacenado
$query = "CALL SP_Insert_Update_Carrito( $id_cliente, $id_dbc, $cantidad,$peso)";
$stmt = $db->select($query);

// Verificar si la preparación de la consulta fue exitosa
if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conn->error);
}
header("location: ../views/bolsas/1.php");
exit;
