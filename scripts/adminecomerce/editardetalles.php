<?php

    include("../../class/database.php");
    $conexion = new Database();
    $conexion->conectarDB();

    extract($_POST);

    $query = "call SP_Editar_bolsa_ecomerce(4,'El mocacino','2023 - 2024','Tapurto siñor', 'Lavado', 'Alan de la Cruz, Saquito', '1,300 msnm',
 'Cacao Oscuro', 'Saudino', 'Gallino, nutela', 'Suave - Pesado',87, 'CafeOscuro.webp')";
    $conexion->execute($query);

    $conexion->desconectarDB();
