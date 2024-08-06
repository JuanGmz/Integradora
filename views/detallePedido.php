<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Pedido</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/Sinfonía-Café-y-Cultura.webp">
    <?php
    session_start();
    require_once '../class/database.php';
    include_once ("../scripts/funciones/funciones.php");
    $db = new database();
    $db->conectarDB();

    if (isset($_SESSION["usuario"])) {
        $rolUsuario = "SELECT r.rol FROM roles r JOIN roles_usuarios ru ON r.id_rol = ru.id_rol JOIN personas p ON ru.id_usuario = p.id_usuario WHERE p.usuario = '$_SESSION[usuario]'";
        $rol = $db->select($rolUsuario);

        extract($_POST);

        if (isset($_POST['verDetalles'])) {
            $queryPed = "SELECT * FROM vw_pedidos_clientes WHERE folio = $id_pedido";
            $pedido = $db->select($queryPed);

            $queryProductos = "SELECT * FROM vw_pedido_productos WHERE id_pedido = $id_pedido";
            $productos = $db->select($queryProductos);

            $queryPedido = "SELECT id_pedido FROM pedidos WHERE id_pedido = $id_pedido";
            $pedProd = $db->select($queryPedido);
        }
    } else {
        header("location: ../index.php");
    }
    ?>
</head>

<body>
    <!-- Botón de WhatsApp -->
    <button id="whatsappButton"
        class="btn btn-success position-fixed bottom-0 start-0 m-3 p-3 d-flex align-items-center justify-content-center z-3"
        type="button"
        onclick="window.open('https://wa.me/528711220994?text=%C2%A1Hola!%20Escribo%20desde%20la%20p%C3%A1gina%20web%20y%20quer%C3%ADa%20consultar%20por%3A', '_blank')">
        <i class="fa-brands fa-whatsapp fa-2x"></i>
    </button>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg shadow-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">
                <img src="../img/Sinfonía-Café-y-Cultura.webp" alt="Logo" class="logo" loading="lazy">
            </a>
            <div class="offcanvas offcanvas-end" style="background: var(--primario);" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title text-light fw-bold" id="offcanvasNavbarLabel">SifoníaCafé&Cultura
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="menu.php">Menú</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="ecommerce.php">Comprar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="recompensas.php">Recompensas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="eventos.php">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="publicaciones.php">Publicaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="contact.php">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php
            if (isset($_SESSION["usuario"])) {
                ?>
                <!-- Navbar con dropdown -->
                <a class="nav-link dropdown-toggle ms-auto" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-user"></i> <?php echo $_SESSION['usuario']; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                    style="left: auto; right: 30px; top: 60px">
                    <a class="dropdown-item" href="perfil.php">Mi perfil</a>
                    <a class="dropdown-item" href="bolsas/Carrito.php">Mi carrito</a>
                    <?php if ($rol[0]->rol === 'administrador') { ?>
                        <a class="dropdown-item" href="../views/adminInicio.php">Administrar</a>
                        <div class="dropdown-divider"></div>
                    <?php } ?>
                    <a class="dropdown-item" href="../scripts/login/cerrarsesion.php">Cerrar sesión</a>
                </div>
                <?php
            } else {
                ?>
                <a href="login.php" class="login-button ms-auto">Iniciar Sesión</a>
                <?php
            }
            ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

    </nav>
    <!-- NavBar End -->

    <div class="container rounded-3 mt-4 mt-lg-0 mb-4">
        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="perfil.php">Perfil</a></li>
                <li class="breadcrumb-item"><a href="pedidos.php">Pedidos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalle del Pedido</li>
            </ol>
        </nav>

        <div class="row m-3 m-lg-0">
            <div class="col-12 col-lg-7 me-5">
                <?php
                foreach ($productos as $producto) {
                    $v_monto = formatPrecio($producto->monto);
                    ?>
                    <div class="row p-3 mb-3 bg-body rounded shadow-lg d-lg-flex justify-content-center align-items-center">
                        <div class="col-8">
                            <p>Producto: <?= $producto->nombre ?> (<?= $producto->proceso ?>)</p>
                            <p>Cantidad: <?= $producto->cantidad ?></p>
                            <p>Medida: <?= $producto->medida ?></p>
                            <p>Costo: $<?= $v_monto ?></p>
                        </div>
                        <div class="col-4 text-end">
                            <img src="../img/bolsas/<?php echo $producto->img_url; ?>" class="img-fluid rounded"
                                alt="Producto" style="width: 100px; height: 100px;">
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="col-lg-4">
                <div class="row bg-body rounded shadow-lg p-3">
                    <div class="col-12">
                        <div class="row mb-0">
                            <div class="col-7">
                                <h4>Detalles del pedido</h4>
                            </div>
                            <div class="col-5 text-end">
                                <?php
                                if ($pedido[0]->estatus === 'Cancelado') {
                                    ?>
                                    <span class="badge bg-danger fs-6 fw-bold">Cancelado</span>
                                    <?php
                                } else if ($pedido[0]->estatus === 'Finalizado') {
                                    ?>
                                        <span class="badge bg-success fs-6 fw-bold">Finalizado</span>
                                    <?php
                                } else {
                                    ?>
                                        <span class="badge bg-warning fs-6 fw-bold">Pendiente</span>
                                    <?php

                                }
                                ?>
                            </div>
                            <div class="row mb-0">
                                <div class="col-9">
                                    <p>Fecha Pedido: <?= $pedido[0]->fecha_hora_pedido ?></p>
                                </div>
                                <div class="col-3 mb-0">
                                    <p>Folio <?= $pedido[0]->folio ?></p>
                                </div>
                            </div>
                        </div>
                        <hr class="m-0">
                        <?php
                        $v_monto_total = formatPrecio($pedido[0]->monto_total);
                        $v_costo_envio = formatPrecio($pedido[0]->costo_envio);
                        ?>
                        <div class="row mt-3">
                            <div class="col-12">
                                <p>Productos: $<?= $v_monto_total ?></p>
                                <?php
                                if ($pedido[0]->costo_envio > 0) {
                                    ?>
                                    <p>Envío: $<?= $v_costo_envio ?></p>
                                    <?php
                                } else {
                                    ?>
                                    <p>Envío: Aún no se registra el costo de envío</p>
                                    <?php
                                }
                                ?>
                                <?php
                                $total = $pedido[0]->monto_total + $pedido[0]->costo_envio;
                                $v_total = formatPrecio($total);
                                ?>
                            </div>
                        </div>
                        <hr class="m-0">
                        <div class="row mt-3">
                            <div class="col-12">
                                <p>Total: $<?= $v_total ?></p>
                            </div>
                        </div>
                        <hr class="m-0">
                        <div class="row mt-3">
                            <div class="col-12">
                                <?php
                                if ($pedido[0]->envio === null) {
                                    ?>
                                    <p>Paquetería de envío: Aún no se registra la paquetería de envío.</p>
                                    <?php
                                } else {
                                    ?>
                                    <p>Paquetería de envío: <?= $pedido[0]->envio ?></p>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="col-12">
                                <?php
                                if ($pedido[0]->guia_de_envio === null) {
                                    ?>
                                    <p>Guía de Envío: Aún no se registra la guía de envío</p>
                                    <?php
                                } else {
                                    ?>
                                    <p>Guía de Envío: <?= $pedido[0]->guia_de_envio ?></p>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="col-12">
                                <?php
                                if ($pedido[0]->documento_url === null) {
                                    ?>
                                    <p>Archivo de Envío: Aún no se registra el archivo de envío</p>
                                    <?php
                                } else {
                                    ?>
                                    <p>Documento de envió: <a href='../pdf/<?php echo $pedido[0]->documento_url; ?>'
                                            download='<?php echo $pedido[0]->documento_url ?>'
                                            class="text-decoration-none text-info fw-bold fs-5 p-2    rounded">Descargar
                                            PDF</a></p>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <hr class="m-0">
                        <div class="row my-1">
                            <div class="col-12">
                                <h4 class="m-0">Dirección de Envío</h4>
                            </div>
                        </div>
                        <hr class="m-0">
                        <div class="row mt-3">
                            <div class="col-12">
                                <p>Referencía: <?= $pedido[0]->referencia ?></p>
                            </div>
                            <div class="col-12">
                                <p>Ciudad: <?= $pedido[0]->ciudad ?></p>
                            </div>
                            <div class="col-12">
                                <p>Estado: <?= $pedido[0]->estado ?></p>
                            </div>
                            <div class="col-12">
                                <p>Colonia: <?= $pedido[0]->colonia ?></p>
                            </div>
                            <div class="col-12">
                                <p>C.P: <?= $pedido[0]->codigo_postal ?></p>
                            </div>
                            <div class="col-12">
                                <p>Calle: <?= $pedido[0]->calle ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Alerta -->
        <div class="alert floating-alert" id="floatingAlert">
            <span id="alertMessage">Mensaje de la alerta.</span>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-auto">
        <div class="container-fluid p-5" style="background: var(--negroclaro);">
            <h2 class="text-center text-light mb-5">SinfoníaCafé&Cultura</h2>
            <hr class="text-light">
            <div class="container-fluid d-flex justify-content-center align-items-center flex-column p-4">
                <div class="row m-3 text-center">
                    <div class="col-4">
                        <a href="https://www.facebook.com/SinfoniaCoffee">
                            <i class="fa-brands fa-facebook text-light fa-2x text-center"></i>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="https://x.com/SinfoniaCoffee">
                            <i class="fa-brands fa-twitter text-light fa-2x text-center"></i>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="https://www.instagram.com/sinfoniacoffee/">
                            <i class="fa-brands fa-instagram text-light fa-2x text-center"></i>
                        </a>
                    </div>
                </div>
                <div class="row m-3">
                    <p class="text-center fw-bold text-light">Copyright © 2024 SinfoníaCafé&Cultura</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/45ef8dbe96.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="../js/alertas.js"></script>
</body>

</html>