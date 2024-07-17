<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg shadow-lg mb-lg-5">
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
            <a href="login.php" class="login-button ms-auto">Iniciar Sesión</a>
            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- NavBar End -->
    <!-- NavBar End -->

    <div class="container mb-5">
            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-4">
                    <li class="breadcrumb-item"><a href="../../index.php">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="../menu.php">Menu</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Around The World</li>
                </ol>
            </nav>
            <div class="fw-bold fs-2 mb-5">
                <h1 class="h1contact">Productos</h1>
            </div>
            <div class="row">
                <?php
                    include_once("../../class/database.php");

                    // Conectar a la base de datos
                    $conexion = new Database();
                    $conexion->conectarDB();

                    // Obtener las publicaciones para la página actual
                    $query = 'SELECT productos_menu.nombre, count(medida) as m, productos_menu.id_pm from productos_menu
                                join categorias on productos_menu.id_categoria = categorias.id_categoria
                                join detalle_productos_menu on productos_menu.id_pm = detalle_productos_menu.id_pm
                                where categorias.nombre = "Around The World"
                                group by nombre';
                    $productos = $conexion->select($query);
                ?>
                <div class="container mb-3">


                    <div class="row">
                        <?php foreach ($productos as $producto) : ?>
                            
                            <div class='col-md-6 col-12 col-sm-6 mb-3 col-lg-3' >
                                <a href= '<?php echo 'detalle_producto/detalles.php?id_pm='.$producto->id_pm; ?>'>
                                <div class='card blog-card h-100 shadow-lg' >
                                    <img src='../../img/menu/<?php echo $producto->img_url; ?>' class='card-img-top' alt='<?php echo $producto->nombre ?>'>
                                    <div class='card-body'>
                                        <h5 class='blog-card-title' ><?php echo $producto->nombre; ?></h5>
                                        <h6 class='blog-card-subtitle mb-2 text-muted'><?php if ($producto->m >= 2)
                                        {
                                            echo '+ Con varios tamaños'; 
                                        }
                                        else
                                        {
                                            echo '- En un tamaño';  
                                        }
                                        ?></h6>
                                    </div>
                                </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
               
                <?php
                    $conexion->desconectarDB();
                ?>
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
    <script src="https://kit.fontawesome.com/b820f07375.js" crossorigin="anonymous"></script>
</body>

</html>