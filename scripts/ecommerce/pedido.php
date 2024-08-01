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
    die("Error en la preparación de la consulta.");
} else {
    if (is_array($stmt) && count($stmt) > 0) {
        $pedido = $stmt[0];
        $id_pedido = $pedido->id_pedido;
        $mensaje = $pedido->mensaje;

        if ($id_pedido) {
            // Redirigir a la página Folio.php con el ID del pedido
            header("Location: ../../views/bolsas/Folio.php?id_pedido=" . $id_pedido);
            exit;
        } else {
            // Mostrar mensaje HTML si hay 5 pedidos pendientes
            // Cierre del bloque PHP y apertura de HTML
            ?>
            <!DOCTYPE html>
            <html>
            <head>
                <title>Mensaje</title>
                <link rel="stylesheet" href="../../css/style.css">
                <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
                <style>
                    html, body {
                        height: 100%;
                        width: 100%;
                        margin: 0;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        background-color: #f8f9fa; /* Ajusta el color de fondo si es necesario */
                    }
                    .container {
                        text-align: center;
                        padding: 20px;
                        background: #fff; /* Ajusta el color de fondo del contenedor si es necesario */
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }
                </style>
                   
            </head>
            <body class='d-flex flex-column justify-content-center bagr-cafe1 ' style='text-align: center;'>
                <div class="container">
                <div class="p-3"><i class='fa-solid fa-circle-exclamation fa-5x text-muted'></i></div>
                    <p class="fw-bold"> <?php echo htmlspecialchars($mensaje); ?></p>
                    <div class="p-3">
                        <a class=" btn-cafe" href='javascript:history.back()'>Regresar</a>
                    </div>
                
                </div>
                <script src="https://kit.fontawesome.com/45ef8dbe96.js" crossorigin="anonymous"></script>

            </body>
            </html>
            <?php
        }
    } else {
        die("Error al obtener el ID del pedido.");
    }
}
?>