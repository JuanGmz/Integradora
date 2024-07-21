<?php

    include("../../class/database.php");
    $conexion = new Database();
    $conexion->conectarDB();

    extract($_POST);

    $query = "call SP_Agregar_medida_bolsa_ecomerce(4,'1/2 Kg',160, 20)";
    $conexion->execute($query);

    $conexion->desconectarDB();


    