<?php
    include("../../class/database.php");
    $conexion = new Database();
    $conexion->conectarDB();

    extract($_POST);

    $query = "DELETE FROM productos_menu WHERE id_dpm = '$id_dpm' AND medida = '$medida' AND precio = '$precio'";

    $conexion->execute($query);

    $conexion->desconectarDB();
    
    header('Location: ../../views/adminMenu.php');
    exit;