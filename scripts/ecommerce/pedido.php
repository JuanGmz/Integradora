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
            header("Location: ../../views/bolsas/Folio.php?id_pedido=" . $id_pedido);
            exit;
        } else {
?>
            <!DOCTYPE html>
            <html>

            <head>
                <title>Error en el Pedido</title>
                <link rel="stylesheet" href="../../css/style.css">
                <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
                <style>
                    html,
                    body {
                        height: 100%;
                        width: 100%;
                        margin: 0;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        background-color: #f8f9fa;
                    }

                    .container {
                        text-align: center;
                        padding: 20px;
                        background: #fff;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }
                </style>
            </head>

            <body class='d-flex flex-column justify-content-center bagr-cafe1 ' style='text-align: center;'>
                <!-- Botón de WhatsApp -->
                <button id="whatsappButton" class="btn btn-success position-fixed bottom-0 start-0 m-3 p-3 d-flex align-items-center justify-content-center z-3" type="button" onclick="window.open('https://wa.me/528711220994?text=%C2%A1Hola!%20Escribo%20desde%20la%20p%C3%A1gina%20web%20y%20quer%C3%ADa%20consultar%20por%3A', '_blank')">
                    <i class="fa-brands fa-whatsapp fa-2x"></i>
                </button>
                <div class="container">
                    <div class="p-3"><i class='fa-solid fa-circle-exclamation fa-5x text-muted'></i></div>
                    <p class="fw-bold"><?php echo htmlspecialchars($mensaje); ?></p>
                    <div class="p-3">
                        <a class="btn-cafe" href='javascript:history.back()'>Regresar</a>
                        <a href="../pedidos.php" class="btn-cafe">Mis pedidos</a>

                    </div>
                </div>
                <script src="https://kit.fontawesome.com/45ef8dbe96.js" crossorigin="anonymous"></script>
                <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            </body>

            </html>
<?php
        }
    } else {
        die("Error al obtener el ID del pedido.");
    }
}
?>
