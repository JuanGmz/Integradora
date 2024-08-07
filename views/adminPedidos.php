<?php
session_start();
require_once '../class/database.php';
include_once ("../scripts/funciones/funciones.php");
$db = new database();
$db->conectarDB();

$rolUsuario = "SELECT r.rol FROM roles r JOIN roles_usuarios ru ON r.id_rol = ru.id_rol JOIN personas p ON ru.id_usuario = p.id_usuario WHERE p.usuario = '$_SESSION[usuario]'";

$rol = $db->select($rolUsuario);

if ($rol[0]->rol !== 'administrador') {
    header('Location: ../index.php');
}



// Inicializar el estado del botón
$disabled = '';
if (isset($_SESSION['form_submitted']) && $_SESSION['form_submitted']) {
    $disabled = 'disabled';
}

if (isset($_POST['btnactualizar'])) {
    extract($_POST);
    // Directorio donde se guardarán los pdfs
    $subirDir = "../pdf/";

    // Nombre del archivo subido
    $nombrePdf = basename($_FILES['pdf']['name']);

    // Ruta completa del archivo a ser guardado
    $pdf = $subirDir . $nombrePdf;

    // Verificar tamaño del archivo
    $maxFileSize = 5 * 1024 * 1024; // 5 MB

    if ($_FILES['pdf']['size'] > $maxFileSize) {
        showAlert("El archivo es demasiado grande. El tamaño máximo permitido es 5 MB.", "error");
        exit;
    }

    // Mover el archivo subido a la carpeta de destino
    if (move_uploaded_file($_FILES['pdf']['tmp_name'], $pdf)) {
        $consulta_estado = "SELECT estatus FROM pedidos WHERE id_pedido = $id_pedido";
        $pedido_estatus = $db->select($consulta_estado);
        if ($pedido_estatus[0]->estatus == 'Pendiente') {
            // Consulta para agregar la recompensa, con la URL de la imagen
            $consulta = "UPDATE pedidos SET documento_url = '$nombrePdf', estatus = '$estatus', costo_envio = '$costo', guia_de_envio = '$guia', envio = '$envio' where id_pedido = $id_pedido";

            $db->execute($consulta);
            showAlert("¡Cambios realizados con éxito!", "success");
        }
    } else {
        showAlert("Hubo un error al subir el pdf", "error");
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Pedidos</title>
    <link rel="shortcut icon" href="../img/Sinfonía-Café-y-Cultura.webp">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body style="background: var(--color6);">
    <div class="container-fluid m-0 h-100">
        <!-- navbar mobile -->
        <div class="row bagr-cafe4 d-block d-lg-none">
            <div class="collapse m-0 p-0" id="navbarToggleExternalContent" data-bs-theme="dark">
                <div class="bagr-cafe4 p-4 pb-1">
                    <h5 class="text-body-emphasis h4">Administrar</h5>
                </div>
                <div class="accordion accordion-flush" id="accordionMobile">
                    <div class="accordion-item m-0 p-0 row">
                        <a href="adminInicio.php">
                            <h2 class="accordion-header">
                            <button class="row accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-inicio" aria-expanded="false"
                                aria-controls="flush-inicio">
                                <div class="col-6">
                                    <i class="fa-solid fa-house-laptop me-1"></i>
                                    Inicio
                                </div>
                            </button>
                            </h2>
                        </a>
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-menu" aria-expanded="false"
                                aria-controls="flush-menu">
                                <div class="col-8">
                                    <i class="fa-solid fa-table me-3"></i>
                                    Menú
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-menu" class="accordion-collapse collapse" data-bs-parent="#accordionMobile">
                            <div class="accordion-body bagr-cafe4">
                                <a href="adminMenu.php" class="ms-5 text-light fw-bold fs-5 text-decoration-none"
                                    aria-current="true">
                                    Administrar Menú
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-events" aria-expanded="false"
                                aria-controls="flush-events">
                                <div class="col-8">
                                    <i class="fa-solid fa-bullhorn me-3"></i>
                                    Eventos
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-events" class="accordion-collapse collapse" data-bs-parent="#accordionMobile">
                            <div class="accordion-body bagr-cafe4">
                                <a href="adminEventos.php" class="text-light fw-bold fs-5 text-decoration-none ms-5"
                                    aria-current="true">
                                    Administrar Eventos
                                </a><br><br>
                                <a href="adminReservas.php" class="text-light fw-bold fs-5 text-decoration-none ms-5">
                                    Administar Reservas
                                </a><br><br>
                                <a href="adminlugares.php" class="text-light fw-bold fs-5 text-decoration-none ms-5">
                                    Administar Lugares
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-ecommerce" aria-expanded="false"
                                aria-controls="flush-ecommerce">
                                <div class="col-8">
                                    <i class="fa-solid fa-cart-arrow-down me-3"></i>
                                    E-Commerce
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-ecommerce" class="accordion-collapse collapse" data-bs-parent="#accordionMobile">
                            <div class="accordion-body bagr-cafe4">
                                <a href="adminPedidos.php" class="fw-bold fs-5 ms-5 text-light text-decoration-none"
                                    aria-current="true">
                                    Administrar Pedidos
                                </a><br><br>
                                <a href="adminProductosEcommerce.php"
                                    class="fw-bold fs-5 ms-5 text-light text-decoration-none">
                                    Administrar Productos
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-blog" aria-expanded="false"
                                aria-controls="flush-blog">
                                <div class="col-8">
                                    <i class="fa-solid fa-blog me-3"></i>
                                    Publicaciones
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-blog" class="accordion-collapse collapse" data-bs-parent="#accordionMobile">
                            <div class="accordion-body bagr-cafe4">
                                <a href="adminPublicaciones.php"
                                    class="fw-bold fs-5 ms-5 text-light text-decoration-none" aria-current="true">
                                    Administrar Publicaciones
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-rewards" aria-expanded="false"
                                aria-controls="flush-rewards">
                                <div class="col-8">
                                    <i class="fa-solid fa-medal me-3"></i>
                                    Recompensas
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-rewards" class="accordion-collapse collapse" data-bs-parent="#accordionMobile">
                            <div class="accordion-body bagr-cafe4">
                                <a href="adminRecompensas.php" class="fw-bold fs-5 ms-5 text-light text-decoration-none"
                                    aria-current="true">
                                    Administrar Recompensas
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-dark bagr-cafe4">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <h1 class="fw-bold text-light pt-2 me-auto">Pedidos</h1>
                    <!-- Botón para volver atras -->
                    <button class="btn bagr-cafe4">
                        <a href="../index.php" class="text-decoration-none">
                            <i class="fa-solid fa-house text-light fa-2x"></i>
                        </a>
                    </button>
                </div>
            </nav>
        </div>

        <div class="row">
            <!-- navbar pc -->
            <div class="col-lg-3 bagr-cafe4 h-100 position-fixed d-none d-lg-block shadow contenedor">
                <h4 class="text-center text-light m-3 fs-2 fw-bold">Administrar</h4>
                <div class="row">
                    <div class="col-12 text-center">
                    <img src="../img/Sinfonía-Café-y-Cultura blanco.webp" alt="" class="img-fluid" style="width: 300px;">
                    </div>
                </div>
                <div class="accordion accordion-flush" id="accordionPc">
                    <div class=" ms-2 fs-3 mt-4 mb-3">
                        <a class="fw-bold bagr-cafe4 text-light text-decoration-none" href="adminInicio.php"
                            aria-expanded="false">
                            <i class="fa-solid fa-house-laptop"></i>
                            Inicio
                        </a>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-menu" aria-expanded="false"
                                aria-controls="flush-menu">
                                <div class="col-6">
                                    <i class="fa-solid fa-table me-1"></i>
                                    Menú
                                </div>
                                <div class="col-6 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-menu" class="accordion-collapse collapse" data-bs-parent="#accordionPc">
                            <div class="accordion-body bagr-cafe4">
                                <a href="adminMenu.php" class="ms-5 text-light fw-bold fs-6 text-decoration-none"
                                    aria-current="true">
                                    Administrar Menú
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-events" aria-expanded="false"
                                aria-controls="flush-events">
                                <div class="col-6">
                                    <i class="fa-solid fa-bullhorn me-1"></i>
                                    Eventos
                                </div>
                                <div class="col-6 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-events" class="accordion-collapse collapse" data-bs-parent="#accordionPc">
                            <div class="accordion-body bagr-cafe4">
                                <a href="adminEventos.php" class="text-light fw-bold fs-6 text-decoration-none ms-5"
                                    aria-current="true">
                                    Administrar Eventos
                                </a><br><br>
                                <a href="adminReservas.php" class="text-light fw-bold fs-6 text-decoration-none ms-5">
                                    Administar Reservas
                                </a><br><br>
                                <a href="adminlugares.php" class="text-light fw-bold fs-6 text-decoration-none ms-5">
                                    Administar Lugares
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-ecommerce" aria-expanded="false"
                                aria-controls="flush-ecommerce">
                                <div class="col-8">
                                    <i class="fa-solid fa-cart-arrow-down me-1"></i>
                                    E-Commerce
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-ecommerce" class="accordion-collapse collapse" data-bs-parent="#accordionPc">
                            <div class="accordion-body bagr-cafe4">
                                <a href="adminPedidos.php" class="fw-bold fs-6 ms-5 text-light text-decoration-none"
                                    aria-current="true">
                                    Administrar Pedidos
                                </a><br><br>
                                <a href="adminProductosEcommerce.php"
                                    class="fw-bold fs-6 ms-5 text-light text-decoration-none">
                                    Administrar Productos
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-blog" aria-expanded="false"
                                aria-controls="flush-blog">
                                <div class="col-8">
                                    <i class="fa-solid fa-blog me-1"></i>
                                    Publicaciones
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-blog" class="accordion-collapse collapse" data-bs-parent="#accordionPc">
                            <div class="accordion-body bagr-cafe4">
                                <a href="adminPublicaciones.php"
                                    class="fw-bold fs-6 ms-5 text-light text-decoration-none" aria-current="true">
                                    Administrar Publicaciones
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-rewards" aria-expanded="false"
                                aria-controls="flush-rewards">
                                <div class="col-8">
                                    <i class="fa-solid fa-medal me-1"></i>
                                    Recompensas
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-rewards" class="accordion-collapse collapse" data-bs-parent="#accordionPc">
                            <div class="accordion-body bagr-cafe4">
                                <a href="adminRecompensas.php" class="fw-bold fs-6 ms-5 text-light text-decoration-none"
                                    aria-current="true">
                                    Administrar Recompensa
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 offset-lg-3 p-0">
                <!-- AQUI VA EL CONTENIDO DE LA PAGINAAAAAAAAAAAA -->
                <div class="row p-0 m-0 bagr-cafe4">
                    <div class="row p-3 m-0 shadow-lg d-none d-lg-flex">
                        <div class="col-3">
                            <h1 class="text-light fw-bold">Pedidos</h1>
                        </div>
                        <div class="col-9 d-flex justify-content-end align-items-center gap-3">
                            <!-- Botón para volver atras -->
                            <a href="../index.php" class="text-decoration-none d-none d-lg-block">
                                <i class="fa-solid fa-house fa-2x text-light"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="shadow-lg row p-0 m-0 p-3" style="background: var(--color6);">
                    <div class="row m-1">
                        <div class="col-12">
                            <form method="post">
                                <div class="row">
                                    <div class="col-8 col-lg-4">
                                        <input type="text" class="form-control" name="busqueda" required
                                            placeholder="Ingresa Folio, Usuario o Teléfono">
                                    </div>
                                    <div class="col-4 col-lg-2">
                                        <input type="submit" class="btn btn-dark w-100" value="Buscar" name="btnBuscar">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row p-0 m-0">
                    <!-- Tabla de pedidos AQUI -->
                    <div class="row mt-lg-3 p-3 p-lg-4 m-0">
                        <?php

                        if (!isset($_POST['busqueda'])) {
                            echo "<div class='p-3 pt-0'>Busca un usuario para poder ver sus pedidos.</div>";
                        }

                        if (isset($_POST['btnBuscar'])) {
                            $busqueda = $_POST['busqueda'];
                            $query = "CALL SP_filtrar_pedidos('$busqueda')";
                            $result = $db->select($query);

                            if (empty($result)) {
                                echo "<div>No hay pedidos registrados con este folio, usuario o teléfono.</div>";
                            } else {
                                echo "
                                <table class='table table-striped table-hover table-dark text-center border-3 border-black border-bottom border-start border-end'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>Folio</th>
                                            <th scope='col'>Cliente</th>
                                            <th scope='col' class='d-none d-md-table-cell'>Domicilio</th>
                                            <th scope='col' class='d-none d-md-table-cell'>Estatus</th>
                                            <th scope='col'>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class='table-group-divider table-light'>";

                                // Variable para mantener el seguimiento de los pedidos ya mostrados
                                $pedidosMostrados = [];

                                // Recorrer los resultados y mostrar cada uno en una fila de la tabla
                                foreach ($result as $pedido) {
                                    $total_productos = formatPrecio($pedido->monto_total);
                                    $costo_envio = formatPrecio($pedido->costo_envio);
                                    $fecha_hora = new DateTime($pedido->fecha_hora_pedido);
                                    $fecha = $fecha_hora->format('Y-m-d'); // Formato de fecha: 01-08-2024
                                    $hora = $fecha_hora->format('H:i:s'); // Formato de hora: 14:30
                                    $horapedido = formatHora($hora);
                                    $fechapedido = formatFecha($fecha);
                                    $v_monto_total = $pedido->monto_total + $pedido->costo_envio;
                                    $monto_total = formatPrecio($v_monto_total);
                                    // Si el pedido es nuevo, mostramos una nueva fila
                                    if (!in_array($pedido->id_pedido, $pedidosMostrados)) {

                                        echo "
                                        <tr>
                                            <td>{$pedido->id_pedido}</td>
                                            <td>{$pedido->cliente}</td>
                                            <td class='d-none d-md-table-cell'>{$pedido->domicilio}</td>
                                            <td class='d-none d-md-table-cell'>{$pedido->estatus}</td>
                                            <td class='d-flex flex-row align-items-center justify-content-center gap-1'>
                                                <!-- Botón para ver detalles del pedido -->
                                                <button type='button' class='btn btn-dark' data-bs-toggle='modal' data-bs-target='#detalleProducto_{$pedido->id_pedido}'>
                                                    <i class='fa-solid fa-bars'></i>
                                                </button>
                                                <!-- Modal para mostrar los detalles del pedido -->
                                                <div class='modal fade' id='detalleProducto_{$pedido->id_pedido}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                    <div class='modal-dialog modal-lg modal-dialog-centered'>
                                                        <div class='modal-content '>
                                                            <div class='modal-header'>
                                                                <h1 class='modal-title fs-5' id='exampleModalLabel'>Detalles del pedido</h1>
                                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                            </div>
                                                            <div class='modal-body'>
                                                            <div class='row'>
                                                                 <div class='col-12 mt-3'>
                                                                    <h4 class='text-start fw-bolder mb-3'>Cliente: <span class='fw-normal fs-4'>{$pedido->cliente}</span></h4>
                                                                 </div>
                                                                 <div class='col-12 mb-3'>
                                                                    <hr class='my-4'>
                                                                 </div>
                                                                 <div class='col-lg-6 mb-3'>
                                                                    <h4 class='text-start fw-bolder mb-3'>Referencia: <span class='fw-normal fs-4'>{$pedido->referencia}</span></h4>
                                                                 </div>
                                                                 <div class='col-lg-6 mb-3'>
                                                                    <h4 class='text-start fw-bolder mb-3'>Teléfono: <span class='fw-normal fs-4'>{$pedido->telefono}</span></h4>
                                                                 </div>
                                                                 <div class='col-lg-6 mb-3'>
                                                                    <h4 class='text-start fw-bolder mb-3'>Calle: <span class='fw-normal fs-4'>{$pedido->calle}</span></h4>
                                                                 </div>
                                                                  <div class='col-lg-6 mb-3'>
                                                                    <h4 class='text-start fw-bolder mb-3'>Colonia: <span class='fw-normal fs-4'>{$pedido->colonia}</span></h4>
                                                                 </div>
                                                                 <div class='col-lg-6 mb-3'>
                                                                    <h4 class='text-start fw-bolder mb-3'>Ciudad: <span class='fw-normal fs-4'>{$pedido->ciudad}</span></h4>
                                                                 </div>
                                                                  <div class='col-6 mb-3'>
                                                                    <h4 class='text-start fw-bolder mb-3'>Estado: <span class='fw-normal fs-4'>{$pedido->estado}</span></h4>
                                                                 </div>
                                                                 <div class='col-12 mb-3'>
                                                                    <h4 class='text-start fw-bolder mb-3'>Codigo Postal: <span class='fw-normal fs-4'>{$pedido->codigo_postal}</span></h4>
                                                                 </div>
                                                                 <div class='col-12 mb-3'>
                                                                    <hr class='my-4'>
                                                                 </div>
                                                                 <div class='col-12 mb-3'>
                                                                    <h4 class='text-start fw-bolder mb-3'>Método de pago: <span class='fw-normal fs-4'>{$pedido->metodo_pago}</span></h4>
                                                                 </div>
                                                                 <div class='col-12 mb-3'>
                                                                    <h4 class='text-start fw-bolder mb-3'>Fecha y hora: <span class='fw-normal fs-4'>{$fechapedido} a las {$horapedido}</span></h4>
                                                                 </div>
                                                                 <div class='col-12 mb-3'>
                                                                    <h4 class='text-start fw-bolder mb-3'>Estatus: <span class='fw-normal fs-4'>{$pedido->estatus}</span></h4>
                                                                 </div>
                                                                 <div class='col-lg-6 mb-3'>
                                                                    <h4 class='text-start fw-bolder mb-3'>Total productos: <span class='fw-normal fs-4'>$$total_productos</span></h4>
                                                                 </div>
                                                                 <div class='col-lg-6'>
                                                                     <h4 class='text-start fw-bolder mb-3'>Monto total: <span class='fw-normal fs-4'>$$monto_total</span></h4>
                                                                 </div>
                                                                  <div class='col-12 mb-3'>
                                                                    <hr class='my-4'>
                                                                 </div>";
                                        if (!($pedido->envio == null || $pedido->costo_envio == null || $pedido->guia_de_envio == null || $pedido->documento_url == null)) {
                                            echo "
                                                                 <div class='col-lg-6 mb-3'>
                                                                     <h4 class='text-start fw-bolder mb-3'>Envío: <span class='fw-normal fs-4'>{$pedido->envio}</span></h4>
                                                                 </div>
                                                                 <div class='col-lg-6 mb-3'>
                                                                    <h4 class='text-start fw-bolder mb-3'>Costo envío: <span class='fw-normal fs-4'>$$costo_envio</span></h4>
                                                                 </div>
                                                                 <div class='col-12 mb-3'>
                                                                    <h4 class='text-start fw-bolder mb-3'>Guía de envío: <span class='fw-normal fs-4'>{$pedido->guia_de_envio}</span></h4>
                                                                 </div>
                                                                 <div class='col-12'>
                                                                    <h4 class='text-start fw-bolder mb-3'>Documento de envió: <a href='../pdf/$pedido->documento_url' download='$pedido->documento_url'>Descargar PDF</a></h4>
                                                                 </div>";
                                        } else {
                                            echo "
                                            <div class='col-12n d-flex justify-content-center align-items-center'>
                                            <i class='fa-solid fa-circle-info me-3 fa-2x'></i>
                                                                    <h4 class='text-start fw-bolder mb-0'>No se ha proporcionado información de envío.</h4>
                                                                 </div>";
                                        }
                                        echo "
                                                                <div class='col-12'>
                                                                    <hr class='my-4'>
                                                                 </div>
                                                            </div>
                                                                <!-- Tabla para mostrar detalles del pedido -->
                                                                <div class='table-responsive'>
                                                                <table class='table table-striped table-hover mt-3 border border-2'>
                                                                    <thead class='table-dark'>
                                                                        <tr>
                                                                            <th scope='col'>Bolsa</th>
                                                                            <th scope='col'>Proceso</th>
                                                                            <th scope='col'>Variedad</th>
                                                                            <th scope='col'>Sabor</th>
                                                                            <th scope='col'>Medida</th>
                                                                            <th scope='col'>Precio</th>
                                                                            <th scope='col'>Cantidad</th>
                                                                            <th scope='col'>Subtotal</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>";
                                        foreach ($result as $detalle) {
                                            $subotal = formatPrecio($detalle->subtotal);
                                            $precio = formatPrecio($detalle->precio);
                                            if ($detalle->id_pedido == $pedido->id_pedido) {
                                                echo "
                                                                                    <tr>
                                                                                        <td>{$detalle->bolsa}</td>
                                                                                        <td>{$detalle->proceso}</td>
                                                                                        <td>{$detalle->variedad}</td>
                                                                                        <td>{$detalle->sabor}</td>
                                                                                        <td>{$detalle->medida}</td>
                                                                                        <td>$$precio</td>
                                                                                        <td>{$detalle->cantidad}</td>
                                                                                        <td>$$subotal</td>
                                                                                    </tr>";
                                            }
                                        }

                                        echo "
                                                                    </tbody>
                                                                </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                ";
                                        if ($pedido->estatus == 'Cancelado') {
                                            echo "
                                                    <button disabled type='submit' class='btn btn-secondary btn-block'><i class='fa-solid fa-pen-to-square'></i></button>
                                                    ";
                                        } else {
                                            echo "
                                                <!-- Botón para editar el pedido -->
                                                <button type='button' class='btn btn-dark' data-bs-toggle='modal' data-bs-target='#editarProducto_{$pedido->id_pedido}'>
                                                    <i class='fa-solid fa-pen-to-square'></i>
                                                </button>
                                                <!-- Modal para editar el pedido -->
                                                <div class='modal fade' id='editarProducto_{$pedido->id_pedido}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                    <div class='modal-dialog modal-dialog-centered'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h1 class='modal-title fs-5' id='exampleModalLabel'>Editar Información de Envío y Pedido</h1>
                                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                            </div>
                                                            <div class='modal-body text-start'>
                                                                <form  method='post' enctype='multipart/form-data' >
                                                                    <div class='row'>
                                                                        <div class='col-6 mb-3'>
                                                                        <input type='hidden' name='id_pedido' value='{$pedido->id_pedido}'>
                                                                            <label for='costo' class='form-label'>Costo de envio</label>
                                                                            <input type='number' min='0' class='form-control' id='costo' name='costo' value='{$pedido->costo_envio}' required>                                                                        
                                                                        </div>
                                                                        <div class='col-6 mb-3'>
                                                                            <label for='estatus' class='form-label'>Estatus</label>
                                                                            <div class='input-group'>";
                                            $estados = array('Finalizado', 'Pendiente', 'Cancelado');

                                            if ($pedido->estatus == 'Finalizado' || $pedido->estatus == 'Cancelado') {
                                                // Si el pedido está Finalizado o Cancelado, solo muestra el estado actual
                                                echo "<select class='form-select' disabled>";
                                                echo "<option selected>{$pedido->estatus}</option>";
                                                echo "</select>";
                                                $disabled = 'disabled';
                                            } else {
                                                // Si el pedido está Pendiente, permite cambiar el estado
                                                echo "<select class='form-select' name='estatus'>";
                                                foreach ($estados as $estado) {
                                                    $selected = ($estado == $pedido->estatus) ? 'selected' : '';
                                                    echo "<option value='{$estado}' {$selected}>{$estado}</option>";
                                                    $disabled = '';
                                                }
                                                echo "</select>";
                                            }
                                            echo "<button type='button' class='btn btn-secondary' data-bs-toggle='popover' title='Información' data-bs-content='Solo podrás actualizar el estatus del pedido a Finalizado o Cancelado una vez.'>
                    <i class='fa-solid fa-info'></i>
                </button>";
                                            echo "</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class='mb-3'>
                                                                        <label for='guia' class='form-label'>Guia de envío</label>
                                                                        <input type='text' class='form-control' maxlength='50' id='guia' name='guia' value='{$pedido->guia_de_envio}' required>
                                                                    </div>
                                                                    <div class='mb-3'>
                                                                        <label for='envio' class='form-label'>Paqueteria de envío</label>
                                                                        <input type='text' class='form-control' maxlength='50' id='envio' name='envio' value='{$pedido->envio}' required>
                                                                    </div>
                                                                    <div class='mb-3'>
                                                                        <label for='fecha' class='form-label'>Documento de envío</label>
                                                                        <input type='file' class='form-control' id='pdf' name='pdf' accept='.pdf' required/>
                                                                    </div>
                                                                    <div class='d-flex justify-content-center align-items-center'>
                                                                    <i class='fa-solid fa-circle-info me-2'></i>
                                                                    <p class='mb-0 fs-6'>Solo se puede modificar el pedido mientras esté Pendiente.</p>
                                                                    </div>
                                                                    <div class='row'>
                                                                        <div class='col-12 text-end'>
                                                                            <button type='button' class='btn btn-secondary mt-3' data-bs-dismiss='modal'>Cancelar</button>
                                                                            ";
                                            ?>
                                            <button type='submit' class='btn btn-dark mt-3' name='btnactualizar' <?php echo $disabled; ?>>Guardar Cambios</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        <?php
                                        }
                                        echo "
                                            </td>
                                        </tr>";
                                        $pedidosMostrados[] = $pedido->id_pedido;
                                    }
                                }

                                echo "</tbody></table>";
                            }
                        }
                        ?>
    </div>
    </div>
    </div>
    </div>
    <!-- Alerta -->
    <div class="alert floating-alert" id="floatingAlert">
        <span id="alertMessage">Mensaje de la alerta.</span>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const estado = document.getElementById('estado');
            const form = document.getElementById('pedidoForm');

            function toggleForm(disabled) {
                const inputs = form.querySelectorAll('input, select, textarea, button:not([type="submit"])');
                inputs.forEach(input => input.disabled = disabled);
            }

            estado.addEventListener('change', function () {
                toggleForm(estado.value === 'cancelado');
            });

            // Verificar el estado inicial al cargar la página
            toggleForm(estado.value === 'cancelado');
        });
    </script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/b820f07375.js" crossorigin="anonymous"></script>
    <script src="../script/script.js"></script>
    <script src="../js/alertas.js"></script>
    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
</body>

</html>