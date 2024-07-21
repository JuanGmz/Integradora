<?php

    include("../../class/database.php");
    $conexion = new Database();
    $conexion->conectarDB();

    extract($_POST);

    $query = "call SP_Editar_precio_stock_bolsa_ecomerce(11,4,170, 25)";
    $conexion->execute($query);

    $conexion->desconectarDB();


    