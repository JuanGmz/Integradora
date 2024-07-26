<?php
include("../../class/database.php");

$conexion = new Database();
$conexion->conectarDB();

$id_cliente = $_POST['id_cliente'];
$id_domicilio = $_POST['id_domicilio'];
$id_mp = $_POST['id_mp'];

$sql = "CALL SP_Realizar_Pedido($id_cliente, $id_domicilio, $id_mp)";
$stmt = $conexion->select($sql);

if ($stmt === false) {
    die("Error en la preparación de la consulta: ");
} else {
    // Verificamos si `select` devuelve un array de resultados
    if (is_array($stmt) && count($stmt) > 0) {
        $pedido = $stmt[0]; // Primer resultado
        $id_pedido = $pedido->id_pedido;
        $mensaje = $pedido->mensaje;

        if ($id_pedido) {
            // Redirigir a la página Folio.php con el ID del pedido
            header("Location: ../../views/bolsas/Folio.php?id_pedido=" . $id_pedido);
            exit;
        } else {
            // Manejar el caso donde el carrito está vacío
            echo $mensaje;
        }
    } else {
        die("Error al obtener el ID del pedido.");
    }
}
?>