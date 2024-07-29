<?php
include("../../class/database.php");
$conexion = new Database();
$conexion->conectarDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar los valores del formulario
    $id_bolsa = $_POST['id_bolsa'];
    $nombre = $_POST['nombre'];
    $años_cosecha = $_POST['años_cosecha'];
    $productor_finca = $_POST['productor_finca'];
    $proceso = $_POST['proceso'];
    $variedad = $_POST['variedad'];
    $altura = $_POST['altura'];
    $aroma = $_POST['aroma'];
    $acidez = $_POST['acidez'];
    $sabor = $_POST['sabor'];
    $cuerpo = $_POST['cuerpo'];
    $puntaje_catacion = $_POST['puntaje_catacion'];
    $img_url = $_POST['img_url'];


    // Preparar y ejecutar la llamada al procedimiento almacenado
    $stmt = "CALL SP_Editar_bolsa_ecomerce($id_bolsa, '$nombre', '$años_cosecha', '$productor_finca', '$proceso', '$variedad', '$altura', '$aroma', '$acidez', '$sabor', '$cuerpo', $puntaje_catacion, '$img_url')";

    // Ejecutar la llamada
    $stmt = $conexion->select($stmt);

        header('Location: ../../views/adminProductosEcommerce.php');
        exit;


    $conexion->desconectarDB();
}
?>