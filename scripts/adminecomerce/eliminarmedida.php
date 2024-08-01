<?php

include("../../class/database.php");
$conexion = new Database();
$conexion->conectarDB();

extract($_POST);

try {
    
    // Eliminar la medida de los carritos de los usuarios
    $query1 = "DELETE FROM carrito WHERE id_dbc IN (SELECT id_dbc FROM detalle_bc WHERE id_bolsa = $id_bolsa AND medida = '$medida' AND precio = $precio)";
    $stmt1 = $conexion->select($query1);

    // Eliminar la medida de la tabla detalle_bc
    $query2 = "DELETE FROM detalle_bc WHERE id_bolsa = $id_bolsa AND medida = '$medida' AND precio = $precio";
    $stmt2 = $conexion->select($query2);


} catch (Exception $e) {

    echo "Error: " . $e->getMessage();
}

$conexion->desconectarDB();

header('Location: ../../views/adminProductosEcommerce.php');
exit;
?>