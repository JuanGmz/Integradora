<?php

    include("../../class/database.php");
    $conexion = new Database();
    $conexion->conectarDB();

    extract($_POST);

    $query = "call SP_comprobante_reserva(1,'Reserva de un evento', 240,'ABC12345678', 'Banco azteca', 'comprobante.png')";
    $conexion->execute($query);

    $conexion->desconectarDB();

    header('Location: ../../views/adminMenu.php');
    exit;