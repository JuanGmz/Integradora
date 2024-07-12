<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg shadow-lg mb-lg-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.html">
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
                            <a class="nav-link" aria-current="page" href="menu.html">Menú</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="ecommerce.html">Comprar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="recompensas.html">Recompensas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="eventos.html">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="blog.html">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="contact.html">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="login.html" class="login-button ms-auto">Iniciar Sesión</a>
            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- NavBar End -->

    <div class="container mb-5">
        <div class="fw-bold fs-2 mt-3 mb-4">
            <h1 class="h1contact">Menu</h1>
        </div>
        <h2>Conoce Nuestras Bebidas y Alimentos</h2>
        <hr>
            <h4 class="fw-bold">Bebidas</h4>
        <hr>

        <div class="row mb-3">
            <div class="col-6 col-lg-3">
                <a href="menu/aroundtheworld.php">
                    <div class="card border-0" style="background: var(--color6)">
                        <img src="../img/cafes/bolsa1.webp" class="card-img-top rounded-5" alt="aroundtheworld">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-center">Around The World</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a href="menu/clasicos.php">
                    <div class="card border-0" style="background: var(--color6)">
                        <img src="../img/cafes/bolsa1.webp" class="card-img-top rounded-5" alt="clasicos">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-center">Clásicos</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a href="menu/coldbrew.php">
                    <div class="card border-0" style="background: var(--color6)">
                        <img src="../img/cafes/coldbrew.webp" class="card-img-top rounded-5" alt="coldbrew">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-center">Cold Brew</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a href="menu/coolanddark.php">
                    <div class="card border-0" style="background: var(--color6)">
                        <img src="../img/cafes/bolsa1.webp" class="card-img-top rounded-5" alt="coolanddark">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-center">Cool And Dark</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6 col-lg-3">
                <a href="menu/frappes.php">
                    <div class="card border-0" style="background: var(--color6);">
                        <img src="../img/cafes/frappes.webp" class="card-img-top rounded-5" alt="frappes">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-center">Frappes</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a href="menu/jazzband.php">
                    <div class="card border-0" style="background: var(--color6)">
                        <img src="../img/cafes/bolsa1.webp" class="card-img-top rounded-5" alt="jazzband">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-center">Jazz Band</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a href="menu/metalcoffee.php">
                    <div class="card border-0" style="background: var(--color6)">
                        <img src="../img/cafes/bolsa1.webp" class="card-img-top rounded-5" alt="metalcoffee">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-center">Metal Coffe</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a href="menu/sodasitalianas.php">
                    <div class="card border-0" style="background: var(--color6)">
                        <img src="../img/cafes/bolsa1.webp" class="card-img-top rounded-5" alt="sodasitalianas">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-center">Sodas Italianas</h5>
                        </div>
                    </div>
                </a>
            </div>
            
        </div>
        <div class="row mb-3">
            <div class="col-6 col-lg-3">
                <a href="menu/tetisanas.php">
                    <div class="card border-0" style="background: var(--color6)">
                        <img src="../img/cafes/bolsa1.webp" class="card-img-top rounded-5" alt="teytisanas">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-center">Té y Tisanas</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <hr>
            <h3 class="fw-bold">Alimentos</h3>
        <hr>

        <div class="row mb-3">
            <div class="col-6 col-lg-3">
                <a href="menu/sweetblue.php">
                    <div class="card border-0" style="background: var(--color6)">
                        <img src="../img/cafes/bolsa1.webp" class="card-img-top rounded-5" alt="sweetblue">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-center">Sweet Blue</h5>
                        </div>
                    </div>
                </a>
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