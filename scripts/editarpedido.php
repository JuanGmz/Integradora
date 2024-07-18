<?php
include("../class/database.php");

$db = new Database();
$db->conectarDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);

    // Construir la consulta de actualización con comillas alrededor de los valores
    $consulta = "UPDATE pedidos SET 
    estatus = '$estatus',
    costo_envio = '$costo',
    guia_de_envio= '$guia',
    documento_url = '$documento'
    WHERE id_pedido = '$id_pedido'";
    $db->execute($consulta);
    $db->desconectarDB();
    header("location: ../views/adminpedidos.php");
    exit;
}
?>
