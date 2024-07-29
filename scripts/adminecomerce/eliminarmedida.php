<?php

    include("../../class/database.php");
    $conexion = new Database();
    $conexion->conectarDB();

    extract($_POST);

    $query = "DELETE FROM detalle_bc WHERE id_bolsa = '$id_bolsa' AND medida = '$medida' AND precio = '$precio'";

    $conexion->execute($query);

    $conexion->desconectarDB();
    
    header('Location: ../../views/adminProductosEcommerce.php');
    exit;