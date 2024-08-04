<?php
include("../../class/database.php");

$conexion = new Database();
$conexion->conectarDB();

$id_cliente = $_POST['id_cliente'];
$id_domicilio = $_POST['id_domicilio'];
$id_mp = $_POST['id_mp'];


?>