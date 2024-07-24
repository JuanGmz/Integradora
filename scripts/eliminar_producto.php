<?php
include_once("../class/database.php");
$db = new Database();
$db->conectarDB();
session_start();


// Obtén el ID del producto desde la solicitud AJAX
$id_cliente = $_POST['id_cliente'];
$id_carrito = $_POST['id_carrito'];
$link = $_POST['link'];

// Prepara y ejecuta la consulta SQL para eliminar el producto
$sql = "DELETE FROM carrito WHERE id_carrito = $id_carrito and id_cliente = $id_cliente";
$stmt = $db->select($sql);

if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

header("location: $link");
exit;

