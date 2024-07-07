<?php
include_once("../../class/database.php");
$conexion = new Database();
$conexion->conectarDB();

$id_dpm = $_POST['id_dpm'];
$medidaExtra = $_POST['medidaExtra'];
$precioExtra = $_POST['precioExtra'];

$query3 = "INSERT INTO productos_menu(id_dpm, medida, precio) VALUES (:id_dpm, :medidaExtra, :precioExtra)";
$stmt3 = $conexion->prepare($query3);
$stmt3->bindParam(":id_dpm", $id_dpm);
$stmt3->bindParam(':medidaExtra', $medidaExtra);
$stmt3->bindParam(':precioExtra', $precioExtra);
$stmt3->execute();

header('Location: ../../views/adminMenu.php');
exit;