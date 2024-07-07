<?php
    include("../class/database.php");
    $conexion = new Database();
    $conexion->conectarDB();

    $id_dpm = $_POST['id_dpm'];
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
    $stmt1 = $conexion->prepare($query1);
    $stmt1->bindParam(':imagen', $imagen);
    $stmt1->bindParam(':nombre', $nombre);
    $stmt1->bindParam(':descripcion', $descripcion);
    $stmt1->bindParam(':categoria', $categoria);

    $stmt1->execute();
    if ($stmt1->errorCode() !== '00000') {
        $errorInfo = $stmt1->errorInfo();
        die("Error en la ejecución de la primera consulta: " . $errorInfo[2]);
    }

    // Segunda consulta
    $query2 = 'INSERT INTO productos_menu(id_dpm, medida, precio) VALUES (LAST_INSERT_ID(), :medida, :precio)';
    $stmt2 = $conexion->prepare($query2);
    $stmt2->bindParam(':medida', $medidas);
    $stmt2->bindParam(':precio', $precio);

    $stmt2->execute();
    if ($stmt2->errorCode() !== '00000') {
        $errorInfo = $stmt2->errorInfo();
        die("Error en la ejecución de la segunda consulta: " . $errorInfo[2]);
    }

    // Desconectar la base de datos
    $conexion->desconectarDB();

    // Redireccionar después de la inserción exitosa
    header('Location: ../views/adminMenu.php');
    exit;