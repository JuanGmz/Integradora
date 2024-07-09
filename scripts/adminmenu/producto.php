<?php
    include("../../class/database.php");
    $conexion = new Database();
    $conexion->conectarDB();

    $id_pm = $_POST['id_pm'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_POST['imagen'];
    $categoria = $_POST['categoria'];
    $medidas = $_POST['medida'];
    $precio = $_POST['precio'];
    $medidaExtra = $_POST['medidaExtra'];
    $precioExtra = $_POST['precioExtra'];

    // Primera consulta
    $query1 = 'INSERT INTO detalle_productos_menu(img_url, nombre, descripcion, id_categoria) VALUES (:imagen, :nombre, :descripcion, :categoria)';

    $conexion->execute($query1);

    // Segunda consulta
    $query2 = 'INSERT INTO productos_menu(id_pm, medida, precio) VALUES (LAST_INSERT_ID(), :medida, :precio)';

    $conexion->execute($query2);

    // Desconectar la base de datos
    $conexion->desconectarDB();

    // Redireccionar después de la inserción exitosa
    header('Location: ../../views/adminMenu.php');
    exit;