<?php
include("../../class/database.php");
$conexion = new Database();
$conexion->conectarDB();


$id_cliente = $_POST['id_cliente'];
$id_domicilio = $_POST['id_domicilio'];
$id_mp = $_POST['id_mp'];

$sql = "CALL SP_Realizar_Pedido($id_cliente, $id_domicilio, $id_mp)";
$stmt = $conexion->select($sql);
// Verificar si la preparación de la consulta fue exitosa
if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conn->error);
}else{
    echo "ok";
}
header("location: ../../views/bolsas/Folio.php");
exit;

?>