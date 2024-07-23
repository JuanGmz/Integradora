<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/Sinfonía-Café-y-Cultura.webp">
    <?php
    session_start();
    ?>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/45ef8dbe96.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>

    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg shadow-lg ">
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
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../scripts/login/cerrarsesion.php">Cerrar sesión</a>
                </div>
            <?php
            } else {
            ?>
                <a href="login.php" class="login-button ms-auto">Iniciar Sesión</a>
            <?php
            }
            ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- NavBar End -->

    <!-- Contenido -->
    <div class="container mb-5">
        <div class="row p-0 m-0">
            <!-- E-Commerce-->
            <div class="container-fluid p-3">
                <nav aria-label="breadcrumb" class='col-12 '>
                    <ol class="breadcrumb mt-4">
                        <li class="breadcrumb-item fw-bold"><a href="../index.php">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page"></li>E-Commerce</li>
                    </ol>
                </nav>
                <!-- Título -->
                <div class="fw-bold fs-2 mt-3 mb-4">
            <h1 class="h1contact">E-Commerce</h1>
        </div>
                <!-- contenedor de productos -->
                <div class="row  d-flex justify-content-center">
                    <?php
                    include_once("../class/database.php");
                    $conexion = new Database();
                    $conexion->conectarDB();
                    $query = 'SELECT bolsas_cafe.id_bolsa,bolsas_cafe.nombre, bolsas_cafe.productor_finca ,bolsas_cafe.proceso,
                        bolsas_cafe.variedad,bolsas_cafe.altura,bolsas_cafe.aroma,bolsas_cafe.acidez,bolsas_cafe.sabor,
                        bolsas_cafe.cuerpo,bolsas_cafe.img_url
                        FROM bolsas_cafe;';

                    $bolsas = $conexion->select($query);
                    foreach ($bolsas as $bolsa) {
                        echo "<div class='col-10 col-sm-6 col-md-4 col-lg-4 p-4 m-0'>";
                        echo "<div class='card m-0 blog-card shadow-lg' style='border-radius: 5% 5% 0% 0%;'>";
                        echo "<a href='../views/bolsas/{$bolsa->id_bolsa}.php'>";
                        echo "<img src='../img/bolsas/{$bolsa->img_url}' class='coffee-image align-card-img-top' alt='{$bolsa->id_bolsa}'>";
                        echo "<div class='card-body product-card-body'>";
                        echo "<h5 class='card-title fw-bold product-title' style='letter-spacing: 1px;'>{$bolsa->nombre}</h5>";
                        echo "<p class='card-text product-subtitle'>{$bolsa->proceso}</p>";
                        echo "<form action='../views/bolsas/detallebolsa.php' method='post'>";
                        echo "<input type='hidden' name='id_bolsa' value='{$bolsa->id_bolsa}'>";
                        echo "<input type='submit' class='btn btn-cafe w-100' value='Ver Detalles'>";
                        echo "</form>";
                        echo "</div>";
                        echo "</a>";
                        echo "</div>";
                        echo "</div>";
                    }
                    $conexion->desconectarDB();
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Botón de Carrito -->
    <button id="floatingButton" class="btn btn-cafe position-fixed bottom-0 end-0 m-3 d-flex p-3 z-3 text-light fw-bold" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
        <i class="fa-solid fa-cart-shopping fa-2x"></i>
    </button>

    <!-- Offcanvas del Carrito -->
    <div class="offcanvas offcanvas-end text-light" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <!--Titulo--->
        <div class="fw-bold d-flex justify-content-center align-content-center m-0 " style="background: var(--primario);">
            <h5 class="offcanvas-title fs-3 mx-auto me-5" id="offcanvasRightLabel">Carrito <i class="fa-solid fa-bag-shopping m-3"></i></h5>
            <button type="button" class="btn-close text-reset m-3" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <!--Contenido-->
        <div class="offcanvas-body d-flex flex-column text-dark" style="background: var(--color6);">
            <!-- Producto 1-->
            <div class="container ">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center">
                        <img src="../img/cafes/bolsa2.webp" class="img-fluid rounded w-25 h-25" alt="Producto">
                        <div class="ms-3">
                            <h6 class="mb-0">Blend</h6>
                            <span>$95.00</span>
                        </div>
                    </div>
                    <button type="button" class="btn " aria-label="Close"><i class="fa-solid fa-trash"></i></button>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <button class="btn  btn-cafe">-</button>
                        <span class="mx-2">1</span>
                        <button class="btn  btn-cafe">+</button>
                    </div>
                </div>
                <hr class="border-dark">
            </div>
            <!-- Producto 2-->
            <div class="container ">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center">
                        <img src="../img/cafes/bolsa2.webp" class="img-fluid rounded w-25 h-25" alt="Producto">
                        <div class="ms-3">
                            <h6 class="mb-0">Blend</h6>
                            <span>$95.00</span>
                        </div>
                    </div>
                    <button type="button" class="btn " aria-label="Close"><i class="fa-solid fa-trash"></i></button>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <button class="btn  btn-cafe">-</button>
                        <span class="mx-2">1</span>
                        <button class="btn  btn-cafe">+</button>
                    </div>
                </div>
                <hr class="border-dark">
            </div>
            <!-- Producto 3-->
            <div class="container ">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center">
                        <img src="../img/cafes/bolsa2.webp" class="img-fluid rounded w-25 h-25" alt="Producto">
                        <div class="ms-3">
                            <h6 class="mb-0">Blend</h6>
                            <span>$95.00</span>
                        </div>
                    </div>
                    <button type="button" class="btn " aria-label="Close"><i class="fa-solid fa-trash"></i></button>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <button class="btn  btn-cafe">-</button>
                        <span class="mx-2">1</span>
                        <button class="btn  btn-cafe">+</button>
                    </div>
                </div>
                <hr class="border-dark">
            </div>
            <!-- Producto 4-->
            <div class="container ">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center">
                        <img src="../img/cafes/bolsa2.webp" class="img-fluid rounded w-25 h-25" alt="Producto">
                        <div class="ms-3">
                            <h6 class="mb-0">Blend</h6>
                            <span>$95.00</span>
                        </div>
                    </div>
                    <button type="button" class="btn " aria-label="Close"><i class="fa-solid fa-trash"></i></button>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <button class="btn  btn-cafe">-</button>
                        <span class="mx-2">1</span>
                        <button class="btn  btn-cafe">+</button>
                    </div>
                </div>
                <hr class="border-dark">
            </div>
        </div>
        <!--Subtotal-->
        <div class="mt-auto container" style="background: var(--negroclaro);">
            <hr>
            <div class="d-flex justify-content-between fs-4">
                <span>Subtotal</span>
                <span>$95.00</span>
            </div>
            <a href="./bolsas/Carrito.php" class="btn w-100 mt-3 fs-5 m-1 btn-dark p-1">Ver Carrito</a>
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
</body>

</html>