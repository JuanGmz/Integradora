<?php

include ("../../class/database.php");
$conexion = new Database();
$conexion->conectarDB();

extract($_POST);

$estatus = isset($_POST['estatus']) ? 1 : 0;

$query = "UPDATE productos_menu SET nombre = '$nombre', descripcion = '$descripcion', id_categoria = $categoria WHERE id_pm = $id_pm";
$conexion->execute($query);

$conexion->desconectarDB();

header('Location: ../../views/adminMenu.php');
exit;