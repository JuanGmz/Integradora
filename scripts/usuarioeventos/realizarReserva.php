<?php

    include("../../class/database.php");
    $conexion = new Database();
    $conexion->conectarDB();

    extract($_POST);

    $query = "call SP_reserva_evento (1,4,6,1);";
    $conexion->execute($query);

    $conexion->desconectarDB();

    header('Location: ../../views/adminMenu.php');
    exit;