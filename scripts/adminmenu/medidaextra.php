<?php
include_once("../../class/database.php");
$conexion = new Database();
$conexion->conectarDB();

extract($_POST);

$query3 = "INSERT INTO detalle_productos_menu(id_pm, medida, precio) VALUES ($id_pm, '$medidaExtra', '$precioExtra')";

$conexion->execute($query3);

header('Location: ../../views/adminMenu.php');
exit;