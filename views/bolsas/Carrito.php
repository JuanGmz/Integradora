<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="shortcut icon" href="../../img/Sinfonía-Café-y-Cultura.webp">
    <?php
    session_start();
    ?>


</head>

<body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg shadow-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../index.php">
                <img src="../../img/Sinfonía-Café-y-Cultura.webp" alt="Logo" class="logo" loading="lazy">
            </a>
            <div class="offcanvas offcanvas-end" style="background: var(--primario);" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title text-light fw-bold" id="offcanvasNavbarLabel">SifoníaCafé&Cultura</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../menu.php">Menú</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="../ecommerce.php">Comprar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="../recompensas.php">Recompensas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="../eventos.php">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="../publicaciones.php">Publicaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="../contact.php">Contacto</a>
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
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../../scripts/login/cerrarsesion.php">Cerrar sesión</a>
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

    <!--Contenido-->
    <div class="container mt-5">
        <nav aria-label="breadcrumb" class='col-12 d-flex'>
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item fw-bold"><a href="../../index.php">Inicio</a></li>
                <li class="breadcrumb-item fw-bold"><a href="../../views/ecommerce.php">E-Commerce</a></li>
                <li class="breadcrumb-item active" aria-current="page"></li>Mi Carrito</li>
            </ol>
        </nav>
        <!-- Título -->
        <div class="fw-bold fs-3 mt-3 mb-4 ">
            <h1 class="h1contact">Mi Carrito</h1>
        </div>

        <!-- Dirección de envío -->
        <div class="row mb-4 my-5">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h4 class="fw-bold">Dirección de envío</h4>
                <a href="../../views/direcciones.php" class="text-decoration-none fw-bold blog-card-link">Cambiar <i class="fa-solid fa-pencil"></i></a>
            </div>
            <div class="col-12">
                <p class="m-1 p-0">Tobias Gabriel Rodriguez Lujan</P>
                <P class="m-1 p-0">Las lomas 80</P>
                <P class="m-1 p-0">Joyas del desierto</P>
                <P class="m-1 p-0">TORREON, COAHUILA DE ZARAGOZA, 27087</p>
            </div>
        </div>
        <hr>

        <!-- Pago -->

        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="fw-bold ">Pago</h4>
                    <p class="mb-0">Para completar tu compra, selecciona tu método de pago preferido y luego comunícate con nosotros para finalizar el proceso.</p>
                </div>
                <div class="dropdown">
                    <button class="btn btn-outline-dark dropdown-toggle" type="button" id="paymentMethodDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Transferencia
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="paymentMethodDropdown">
                        <li><a class="dropdown-item" href="#">Tarjeta de Crédito</a></li>
                        <li><a class="dropdown-item" href="#">PayPal</a></li>
                        <li><a class="dropdown-item" href="#">Efectivo</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>

        <!-- Productos y Confirmación del pedido -->
        <div class="row mb-4">
            <div class="col-md-8">
                <h4 class="fw-bold ">Productos</h4>
                <div class="d-flex mb-3">
                    <img src="../../img/cafes/bolsa2.webp" class="img-fluid rounded me-3 w-25 h-25" alt="Producto">
                    <div>
                        <h6>Jaltenango chiapas</h6>
                        <p>Peso: 1kg<br>
                            Cantidad: 2</p>
                    </div>
                    <div class="ms-auto">
                        <p>$462.42</p>
                    </div>
                </div>
                <div class="d-flex mb-3">
                    <img src="../../img/cafes/bolsa2.webp" class="img-fluid rounded me-3 w-25 h-25" alt="Producto">
                    <div>
                        <h6>Jaltenango chiapas</h6>
                        <p>Peso: 250gr<br>
                            Cantidad: 2</p>
                    </div>
                    <div class="ms-auto">
                        <p>$190</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <h3 class="fw-bold text-center m-0">Confirmación del pedido</h3>
                <p>Productos: <span class="float-end fw-bold">$652.00</span></p>
                <p>Envío: <span class="float-end">--</span></p>
                <hr>
                <p>Total: <span class="float-end fw-bold">$652.00</span></p>
                <p class="small text-muted">* No incluye los gastos de envío.</p>
                <a href="Folio.php" class="btn btn-dark w-100">Realizar pedido</a>
            </div>
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

    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/45ef8dbe96.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>