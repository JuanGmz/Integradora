<?php
include("../class/database.php");

// Crear una nueva instancia de la clase Database y conectar a la base de datos
$db = new Database();
$db->conectarDB();

// Obtener los datos del cliente, producto y operación desde el formulario
$id_cliente = $_POST['id_cliente'];
$id_carrito = $_POST['id_carrito'];
$id_dbc = $_POST['id_dbc'];
$operacion = $_POST['operacion'];
$peso = $_POST['peso'];
$link = $_POST['link'];

// Determinar la cantidad a actualizar
$cantidad = ($operacion == 'incrementar') ? 1 : -1;


// Obtener la cantidad actual del producto en el carrito
$sql = "SELECT cantidad FROM carrito WHERE id_cliente = $id_cliente AND id_carrito = $id_carrito";
$result = $db->select($sql);

// Inicializar cantidad actual
$current_quantity = 0;

// Verificar si se obtuvo un resultado
if ($result) {
    // Si el resultado es una matriz asociativa
    $current_quantity = $result[0]->cantidad;
} else {
    // Imprimir mensaje de depuración si no hay resultados
    echo "No se encontraron resultados.<br>";
    die("Error: No se obtuvo la cantidad actual.");
}

echo "current_quantity: " . $current_quantity . "<br>";

// Calcular la nueva cantidad
$new_quantity = $current_quantity + $cantidad;

echo "cantidad a agregar o quitar: " . $cantidad . "<br>";
echo "new_quantity: " . $new_quantity . "<br>";

if ($new_quantity <= 0) {
    // Si la nueva cantidad es 0 o menor, eliminar el registro
    $sql = "DELETE FROM carrito WHERE id_cliente = $id_cliente AND id_carrito = $id_carrito";
    $stmt = $db->execute($sql); // Ejecutar la consulta de eliminación
    echo "Registro eliminado";
} else {
    // Si la nueva cantidad es mayor a 0, actualizar el registro
    $sql = "CALL SP_Insert_Update_Carrito($id_cliente, $id_dbc, $cantidad, $peso)";
    $stmt = $db->select($sql); // Ejecutar la consulta
    echo "Registro actualizado";
}



// Redirigir
header("location: $link");
exit;
?>
