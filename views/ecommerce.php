<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recompensas</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
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
            <a href="login.php" class="login-button ms-auto">Iniciar Sesión</a>
            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- NavBar End -->

    <!-- Contenido -->
    <div class="container-fluid m-0 p-0" style="background: var(--color2);">
        <div class="row p-0 m-0">
            <!-- E-Commerce-->
            <div class="container-fluid bagr-cafe3 p-3">
                <!-- Título -->
                <div class="col-12 text-center p-3">
                    <h1 class="fw-bold text-center" style="letter-spacing: 1px;">E-Commerce</h1>
                </div>
                <!-- contenedor de productos -->
                <div class="row  d-flex justify-content-center">
                    <!--
                    <div class="col-12 d-md-none">
                        <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#filterOffcanvas" aria-controls="filterOffcanvas" style="border: none;">
                            <i class="fa-solid fa-filter filter-icon"></i>
                        </button>


                    </div>
                    <div class="col-6 col-md-2 col-lg-3 col-xl-3 d-none d-md-block">
                        <h5>TIPO DE PRODUCTO</h5>
                        <hr>
                        <ul class="list-unstyled">
                            <li><a href="#" class="blog-card-link p-lg-3">Proceso Natural</a></li>
                            <li><a href="#" class="blog-card-link p-lg-3">Proceso Lavado</a></li>
                            <li><a href="#" class="blog-card-link p-lg-3">Aroma Cacao, Vinilla</a></li>
                            <li><a href="#" class="blog-card-link p-lg-3">Aroma Citrico, Florales</a></li>
                            <li><a href="#" class="blog-card-link p-lg-3">Aroma Dulce de Leche, Nuez</a></li>
                            <li><a href="#" class="blog-card-link p-lg-3">Cuerpo Alto</a></li>
                            <li><a href="#" class="blog-card-link p-lg-3">Cuerpo Medio</a></li>
                            <li><a href="#" class="blog-card-link p-lg-3">Cuerpo Ligero</a></li>
                        </ul>
                        <h5>DISPONIBILIDAD</h5>
                        <hr>
                        <ul class="list-unstyled">
                            <li><a href="#" class="blog-card-link p-lg-3">En existencia</a></li>
                            <li><a href="#" class="blog-card-link p-lg-3">Agotado</a></li>
                        </ul>
                        <h5>PRECIO</h5>
                        <hr>
                        <div>
                            <input type="range" class="custom-range col-12" id="priceRange" min="0" max="850">
                            <div class="d-flex justify-content-between">
                                <span>0</span>
                                <span>850</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-10 col-lg-9 row justify-content-center">
-->
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
                        echo "<div class='card product-card m-0' style='border-radius: 5% 5% 0% 0%;'>";
                        echo "<a href='../views/bolsas/{$bolsa->id_bolsa}.php'>";
                        echo "<img src='../{$bolsa->img_url}' class='coffee-image align-card-img-top' alt='{$bolsa->id_bolsa}'>";
                        echo "<div class='card-body product-card-body'>";
                        echo "<h5 class='card-title fw-bold product-title' style='letter-spacing: 1px;'>{$bolsa->nombre}</h5>";
                        echo "<p class='card-text product-subtitle'>{$bolsa->proceso}</p>";
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
    </div>
    <!-- Offcanvas -->
    <!--
    <div class="offcanvas offcanvas-start bagr-cafe1" tabindex="-1" id="filterOffcanvas" aria-labelledby="filterOffcanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="filterOffcanvasLabel">Filtros</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <h5>TIPO DE PRODUCTO</h5>
            <hr>
            <ul class="list-unstyled">
                <li><a href="#" class="blog-card-link p-lg-3">Proceso Natural</a></li>
                <li><a href="#" class="blog-card-link p-lg-3">Proceso Lavado</a></li>
                <li><a href="#" class="blog-card-link p-lg-3">Aroma Cacao, Vinilla</a></li>
                <li><a href="#" class="blog-card-link p-lg-3">Aroma Citrico, Florales</a></li>
                <li><a href="#" class="blog-card-link p-lg-3">Aroma Dulce de Leche, Nuez</a></li>
                <li><a href="#" class="blog-card-link p-lg-3">Cuerpo Alto</a></li>
                <li><a href="#" class="blog-card-link p-lg-3">Cuerpo Medio</a></li>
                <li><a href="#" class="blog-card-link p-lg-3">Cuerpo Ligero</a></li>
            </ul>
            <h5>DISPONIBILIDAD</h5>
            <hr>
            <ul class="list-unstyled">
                <li><a href="#" class="blog-card-link p-3">En existencia</a></li>
                <li><a href="#" class="blog-card-link p-3">Agotado</a></li>
            </ul>
            <h5>PRECIO</h5>
            <hr>
            <div>
                <input type="range" class="custom-range col-12" id="priceRangeOffcanvas" min="0" max="850">
                <div class="d-flex justify-content-between">
                    <span>0</span>
                    <span>850</span>
                </div>
            </div>
        </div>
    </div>


                -->




    <!-- Botón de Carrito -->
    <button id="floatingButton" class="btn btn-cafe position-fixed bottom-0 end-0 m-3 d-flex p-3 z-3 text-light fw-bold" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
        <i class="fa-solid fa-cart-shopping fa-2x"></i>
    </button>
    <div class="offcanvas offcanvas-end text-light" style="background: var(--primario);" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="mt-3 fw-bold d-flex justify-content-center">
            <h5 class="offcanvas-title fs-3 mx-auto" id="offcanvasRightLabel">
                <i class="fa-solid fa-bag-shopping"></i>
            </h5>
        </div>
        <div class="offcanvas-body">
            <div class="d-flex justify-content-center fs-5">
                <div class="text-center">
                    <p>Su Carrito esta vacio</p>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="offcanvas" aria-label="Close">Regresar a
                        la tienda</button>
                </div>
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

    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/b820f07375.js" crossorigin="anonymous"></script>
</body>

</html>