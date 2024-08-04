<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Pedidos</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/Sinfonía-Café-y-Cultura.webp">
    <?php
    session_start();
    require_once '../class/database.php';
    include_once("../scripts/funciones/funciones.php");
    $db = new database();
    $db->conectarDB();

    if (isset($_SESSION["usuario"])) {
        $rolUsuario = "SELECT r.rol FROM roles r JOIN roles_usuarios ru ON r.id_rol = ru.id_rol JOIN personas p ON ru.id_usuario = p.id_usuario WHERE p.usuario = '$_SESSION[usuario]'";
        $rol = $db->select($rolUsuario);

        extract($_POST);

        if (isset($_POST['cancelarPedido'])) {
            $id_pedido = $_POST['id_pedido'];
            $cancelar = "UPDATE pedidos SET estatus = 'Cancelado' WHERE id_pedido = $id_pedido";
            $db->execute($cancelar);
            showAlert("El pedido ha sido cancelado con éxito!", "success");
        }

        $queryPedidos = "SELECT * FROM vw_pedidos_clientes WHERE usuario = '$_SESSION[usuario]' ORDER BY fecha_hora_pedido DESC";
        $pedidos = $db->select($queryPedidos);
    } else {
        header("location: ../index.php");
    }
    ?>
</head>

<body>
    <!-- Botón de WhatsApp -->
    <button id="whatsappButton" class="btn btn-success position-fixed bottom-0 start-0 m-3 p-3 d-flex align-items-center justify-content-center z-3" type="button" onclick="window.open('https://wa.me/528711220994?text=%C2%A1Hola!%20Escribo%20desde%20la%20p%C3%A1gina%20web%20y%20quer%C3%ADa%20consultar%20por%3A', '_blank')">
        <i class="fa-brands fa-whatsapp fa-2x"></i>
    </button>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg shadow-lg mb-lg-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">
                <img src="../img/Sinfonía-Café-y-Cultura.webp" alt="Logo" class="logo" loading="lazy">
            </a>
            <div class="offcanvas offcanvas-end" style="background: var(--primario);" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title text-light fw-bold" id="offcanvasNavbarLabel">SifoníaCafé&Cultura</h5>
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
                <a class="nav-link dropdown-toggle ms-auto" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-user"></i> <?php echo $_SESSION['usuario']; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="left: auto; right: 30px; top: 60px">
                    <a class="dropdown-item" href="perfil.php">Mi perfil</a>
                    <?php if ($rol[0]->rol === 'administrador') { ?>
                        <a class="dropdown-item" href="adminInicio.php">Administrar</a>
                        <div class="dropdown-divider"></div>
                    <?php } ?>
                    <a class="dropdown-item" href="../scripts/login/cerrarsesion.php">Cerrar sesión</a>
                </div>
            <?php
            } else {
            ?>
                <a href="../login.php" class="login-button ms-auto">Iniciar Sesión</a>
            <?php
            }
            ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
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
                <li class="breadcrumb-item active" aria-current="page">Pedidos</li>
            </ol>
        </nav>

        <h1>Mis Pedidos</h1>
        <hr>

        <div class="row">
            <?php
            if (empty($pedidos)) {
                ?>
                <div class="row p-0 m-0 d-flex justify-content-center align-items-center">
                    <div id="category-warning" class="alert text-center p-5 mt-4 mx-4" role="alert">
                        <div> 
                            <i class="fa-solid fa-mug-hot fa-4x text-muted"></i>
                        </div>
                        <div class='text-center mt-3'>
                            <h5>Aún no haz realizado ninguna compra.</h5> 
                        </div>
                    </div>
                    <div class="container text-center mb-5">
                        <a href="ecommerce.php" class="btn btn-cafe">Ver productos</a>
                    </div>
                 </div>
                <?php
            } else {
                foreach ($pedidos as $pedido) {
                    $id = $pedido->folio;
                    $queryProd = "SELECT * FROM vw_pedido_productos WHERE id_pedido = $id";
                    $productos = $db->select($queryProd);
            ?>
                    <div class="col-12 mb-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row p-3 d-flex flex-column justify-content-between">
                                    <div class="col-12 d-flex flex-column">
                                        <div class="card-title d-flex justify-content-between">
                                            <p class="card-title m-0 p-0">Fecha: <?= $pedido->fecha_hora_pedido ?></p>
                                            <p class="card-title m-0 p-0">Folio de Pedido: <?= $pedido->folio ?></p>
                                        </div>
                                        <hr>
                                        <div class="row d-block d-lg-flex flex-row justify-content-between">
                                            <div class="col-12 col-lg-10 m-0 ps-1">
                                                <h4 class="card-subtitle m-2 text-muted">
                                                    <?php
                                                    if ($pedido->estatus === "Cancelado") {
                                                    ?>
                                                        <span class="badge bg-danger">Cancelado</span>
                                                    <?php
                                                    } else if ($pedido->estatus === "Finalizado") {
                                                    ?>
                                                        <span class="badge bg-success">Finalizado</span>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <span class="badge bg-warning">Pendiente</span>
                                                    <?php
                                                    }
                                                    ?>
                                                </h4>
                                                <?php
                                                foreach ($productos as $producto) {
                                                    if (COUNT($productos) === 1) {
                                                ?>
                                                        <p class="m-3 m-lg-0 ms-lg-2"> <?= $producto->nombre ?> (<?= $producto->proceso ?>)</p>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <p class="m-3 p-0 m-lg-0 ms-lg-2 d-lg-inline"><?= $producto->nombre ?> (<?= $producto->proceso ?>).</p>
                                                <?php
                                                    }
                                                } ?>
                                            </div>
                                            <div class="col-lg-2 m-0 p-0 pe-3">
                                                <form method="post" enctype="multipart/form-data" class="m-1">
                                                    <?php
                                                    if ($pedido->estatus === "Cancelado" or $pedido->estatus === "Finalizado") {
                                                    ?>
                                                        <button disabled type="submit" class="btn btn-secondary btn-block m-2 mt-0 mb-0 w-100">Cancelar</button>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <input type="hidden" name="id_pedido" value="<?= $pedido->folio ?>" />
                                                        <!-- boton que activa modal de prevencion -->
                                                        <button type="button" class="btn btn-danger btn-block m-2 mt-0 mb-0 w-100" data-bs-toggle="modal" data-bs-target="#cancelarPedido<?= $pedido->folio ?>">
                                                            Cancelar Pedido
                                                        </button>
                                                        <!-- Modal de prevencion -->
                                                        <div class="modal fade" id="cancelarPedido<?= $pedido->folio ?>" tabindex="-1" aria-labelledby="cancelarModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="cancelarModalLabel">Cancelar pedido</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h5 class="mb-3">¿Estas seguro de que deseas cancelar este pedido?</h5>
                                                                        <div class="text-end">
                                                                            <button class="btn btn-secondary btn-block" data-bs-dismiss="modal">Cerrar</button></button>
                                                                            <button type="submit" class="btn btn-danger" name="cancelarPedido">Cancelar Pedido</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </form>
                                                <form action="detallePedido.php" method="post" enctype="multipart/form-data" class="m-1">
                                                    <input type="hidden" name="id_pedido" value="<?= $pedido->folio ?>" />
                                                    <button type="submit" class="btn btn-cafe m-2 mt-0 mb-0 w-100" name="verDetalles">
                                                        Ver Detalles
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
        <div class="alert floating-alert" id="floatingAlert">
            <span id="alertMessage">Mensaje de la alerta.</span>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container-fluid p-5 " style="background: var(--negroclaro);">
            <h2 class="text-center text-light mb-5">SinfoníaCafé&Cultura</h2>
            <hr class="text-light">
            <div class="container-fluid d-flex justify-content-center align-items-center flex-column p-4">
                <div class="row m-3 text-center">
                    <div class="col-3">
                        <a href="https://www.facebook.com/SinfoniaCoffee">
                            <i class="fa-brands fa-facebook text-light fa-2x text-center"></i>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="https://x.com/SinfoniaCoffee">
                            <i class="fa-brands fa-twitter text-light fa-2x text-center"></i>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="https://www.instagram.com/sinfoniacoffee/">
                            <i class="fa-brands fa-instagram text-light fa-2x text-center"></i>
                        </a>
                    </div>
                    <div class="col-3">
                        <i class="fa-brands fa-youtube text-light fa-2x text-center"></i>
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