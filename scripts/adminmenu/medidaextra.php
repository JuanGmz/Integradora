<?php
include_once("../../class/database.php");
$conexion = new Database();
$conexion->conectarDB();

extract($_POST);

$query3 = "INSERT INTO productos_menu(id_dpm, medida, precio) VALUES ($id_dpm, '$medidaExtra', '$precioExtra')";

$conexion->execute($query3);

header('Location: ../../views/adminMenu.php');
exit;