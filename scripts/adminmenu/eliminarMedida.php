<?php
    include("../../class/database.php");
    $conexion = new Database();
    $conexion->conectarDB();
    $id_dpm = $_POST['id_dpm'];
    $medida = $_POST['medida'];
    $precio = $_POST['precio'];

    $query = 'DELETE FROM productos_menu WHERE id_dpm = :id_dpm AND medida = :medida AND precio = :precio';
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id_dpm', $id_dpm);
    $stmt->bindParam(':medida', $medida);
    $stmt->bindParam(':precio', $precio);
    $stmt->execute();
    if ($stmt->errorCode() !== '00000') {
        $errorInfo = $stmt->errorInfo();
        die("Error en la ejecución de la consulta: " . $errorInfo[2]);
    }
    $conexion->desconectarDB();
    
    header('Location: ../../views/adminMenu.php');
    exit;