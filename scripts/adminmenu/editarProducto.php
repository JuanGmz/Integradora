<?php

    include("../../class/database.php");
    $conexion = new Database();
    $conexion->conectarDB();

    extract($_POST);

    $query = "UPDATE detalle_productos_menu SET nombre = '$nombre', descripcion = '$descripcion', id_categoria = $categoria WHERE id_dpm = $id_dpm";
    $conexion->execute($query);

    $conexion->desconectarDB();

    header('Location: ../../views/adminMenu.php');
    exit;