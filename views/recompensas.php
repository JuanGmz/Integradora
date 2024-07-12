<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recompensas</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
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

    <!-- contenido -->

    <section class="subscription-section d-flex align-items-center justify-content-center p-2">
        <div class="subscription-content text-center">
            <h1 class="display-4 fw-bold "><span style="color: #d4a373;">RECOMPENSAS</span></h1>
        </div>
    </section>

    <div class=" p-3">
        <div class="row">
            <!-- Recompensa 1 -->
            <div class="col-12 col-sm-6 col-md-6 col-lg-4  p-4 d-flex justify-content-center ">
                <div class="relative flex w-80 flex-col rounded-xl bg-white  text-gray-700 shadow-md col-12 col-sm-6 col-md-4 col-lg-4">
                    <!-- Imagen superior -->
                    <div class="relative mx-4 -mt-6 h-55 overflow-hidden rounded-xl bg-clip-border text-white shadow-lg">
                        <img src="../img/cafes/dino2.webp" alt="Placeholder Image" class="object-cover h-full w-full">
                    </div>
                    <div class="p-6">
                        <h5 class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                            Cafe gratis
                        </h5>
                        <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                            Consigue tu cafe gratis a traves de nuestra recompensas.
                        </p>
                    </div>
                    <div class="p-6 pt-0 d-flex justify-content-between align-items-center">
                        <button type="button" class="btn bg-dark-subtle">
                            Reclamar
                        </button>
                        <p class="font-sans text-base font-light leading-relaxed">
                            1/10
                        </p>
                    </div>
                </div>
            </div>
            <?php
            include_once("../class/database.php");
            $conexion = new Database();
            $conexion->conectarDB();
            $query = 'SELECT * from view_clientes_recompensas';
            $recompensas = $conexion->select($query);

            foreach ($recompensas as $categoria) {
                echo " <div class='col-12 col-sm-6 col-md-6 col-lg-4  p-4 d-flex justify-content-center '>";
                echo "  <div class='relative flex w-80 flex-col rounded-xl bg-white  text-gray-700 shadow-md col-12 col-sm-6 col-md-4 col-lg-4'>";
                echo "  <div class='relative mx-4 -mt-6 h-55 overflow-hidden rounded-xl bg-clip-border text-white shadow-lg'>";
                echo "  <img src='../img/cafes/" . $categoria['imagen'] . "' alt='Placeholder Image' class='object-cover h-full w-full'>";
                echo "  </div>";
                echo "  <div class='p-6'>";
                echo "  <h5 class='mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased'>";
                echo "  " . $categoria['nombre'] . "";
                echo "  </h5>";
                echo "  <p class='block font-sans text-base font-light leading-relaxed text-inherit antialiased'>";
                echo "  " . $categoria['descripcion'] . "";
                echo "  </p>";
                echo "  </div>";
                echo "  <div class='p-6 pt-0 d-flex justify-content-between align-items-center'>";
                echo "  <button type='button' class='btn bg-dark-subtle'>";
                echo "  Reclamar";
                echo "  </button>";
                echo "  <p class='font-sans text-base font-light leading-relaxed'>";
                echo "  " . $categoria['porcentaje'] . "";
                echo "  </p>";
                echo "  </div>";
                echo "  </div>";
                echo "  </div>";
            }
            $conexion->desconectarDB();

            ?>
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