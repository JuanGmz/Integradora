<?php
    include("../../class/database.php");
    $conexion = new Database();
    $conexion->conectarDB();

    extract($_POST);

    // Primera consulta
    $query1 = "INSERT INTO productos_menu(id_categoria, nombre, descripcion, img_url) VALUES ($categoria, '$nombre', '$descripcion', '$imagen')";

    $conexion->execute($query1);

    // Segunda consulta
    $query2 = "INSERT INTO detalle_productos_menu(id_pm, medida, precio) VALUES (LAST_INSERT_ID(), '$medida', $precio)";

    $conexion->execute($query2);

    // Desconectar la base de datos
    $conexion->desconectarDB();

    // Redireccionar después de la inserción exitosa
    header('Location: ../../views/adminMenu.php');
    exit;