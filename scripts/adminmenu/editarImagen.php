<?php

include("../../class/database.php");
$conexion = new Database();
$conexion->conectarDB();

$imagen = $_POST["imagen_nueva"];

$query = "UPDATE detalle_productos_menu SET img_url = :imagen_nueva WHERE id_dpm = :id_dpm";
$stmt = $conexion->prepare($query);
$stmt->bindParam(':imagen_nueva', $imagen);
$stmt->bindParam(':id_dpm', $_POST['id_dpm']);
$stmt->execute();
if ($stmt->errorCode() !== '00000') {
    $errorInfo = $stmt->errorInfo();
    die("Error en la ejecución de la consulta: " . $errorInfo[2]);
}
$conexion->desconectarDB();
header('Location: ../../views/adminMenu.php');
exit();