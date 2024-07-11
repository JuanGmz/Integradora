<?php

include("../../class/database.php");
$conexion = new Database();
$conexion->conectarDB();

extract($_POST);

$query = "UPDATE productos_menu SET img_url = '$imagen_nueva' WHERE id_pm = $id_pm";
$conexion->execute($query);

$conexion->desconectarDB();
header('Location: ../../views/adminMenu.php');
exit();