<?php
    include("../../class/database.php");
    $conexion = new Database();
    $conexion->conectarDB();

    extract($_POST);

    $query = "DELETE FROM detalle_productos_menu WHERE id_pm = '$id_pm' AND medida = '$medida' AND precio = '$precio'";

    $conexion->execute($query);

    $conexion->desconectarDB();
    
    header('Location: ../../views/adminMenu.php');
    exit;