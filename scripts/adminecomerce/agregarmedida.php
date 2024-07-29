<?php
include("../../class/database.php");
$conexion = new Database();
$conexion->conectarDB();

if (isset($_POST['id_bolsa']) && isset($_POST['medida']) && isset($_POST['precio']) && isset($_POST['stock'])) {
    $id_bolsa = $_POST['id_bolsa'];
    $medida = $_POST['medida'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    // echo $id_bolsa . " ". $medida ." ". $precio . " ". $stock;

    // Preparar y ejecutar la llamada al procedimiento almacenado
    $query1 ="CALL SP_Agregar_medida_bolsa_ecomerce($id_bolsa, '$medida', $precio, $stock)";
    $conexion->execute($query1);

    

    header('Location: ../../views/adminProductosEcommerce.php');
} else {
    header('Location: ../../views/adminInicio.php');
    exit;
}

// Desconectar la base de datos
$conexion->desconectarDB();
?>