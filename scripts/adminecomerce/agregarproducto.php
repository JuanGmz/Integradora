<?php

    include("../../class/database.php");
    $conexion = new Database();
    $conexion->conectarDB();

    extract($_POST);

    $query = "CALL SP_Agregar_producto_ecomerce('Cafesin Dantin','2023 - 2024','Basurto Saucedin', 'Natural', 'Colinas, San Taloban, La Cresta', '1,220 msnm',
 'Cacao, Fresa', 'Cítrica, Apagada', 'Choc. Oscuro, Fresas', 'Medio - Ligero',99, 'CafeBonito(LAV)T.webp','1/4 Kg', 85, 10)";
    $conexion->execute($query);

    $conexion->desconectarDB();


    