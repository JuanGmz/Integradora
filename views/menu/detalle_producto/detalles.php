<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/HTML/Repositorios/Integradora/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/HTML/Repositorios/Integradora/css/style.css">
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
     

    <!-- Contenidillo-->
    <?php
    include_once("../../../class/database.php");

    // Conectar a la base de datos
    $conexion = new Database();
    $conexion->conectarDB();

    $nombre = $_GET['nom'];
    $descripcion = $_GET['desc'];
    $img_url = $_GET['img'];
    $id_pm = $_GET['id_pm'];


    // Obtener las publicaciones para la página actual
    $query = 'SELECT detalle_productos_menu.medida, detalle_productos_menu.precio 
              from detalle_productos_menu 
              where id_pm = "'.$id_pm.'"
              group by medida;';
    $DETALLES = $conexion->select($query);



    ?>
    <?php
    ?>
    <!--

    -->
    <div class="container mb-5">
        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-4">
                    <li class="breadcrumb-item"><a href="../../../index.php">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="../../menu.php">Menu</a></li>
                    <li class="breadcrumb-item"><a href="../aroundtheworld.php">Around The World</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detalles</li>
                </ol>
            </nav>
            <div class="fw-bold fs-2 mb-5">
                <h1 class="h1contact">Productos</h1>
            </div>
            <!-- Breadcrumbs End-->
        <div class="row mb-0">
            <div class=" col-6 img-fluid w-50 mt-0">
                <img src="../../../img/cafe2.webp" class="img-fluid" alt="">
            </div>
            <div class="col-6">
                <div>
                    <h1 class="fw-bold text-center mt-0"><?php echo $nombre; ?></h1>
                </div>
                <div>
                    <p class="fw-bold text-center mt-3">
                        <?php echo $descripcion; ?>
                    </p>
                </div>
                <?php foreach ($DETALLES as $detalle) : ?>
                    <div class="row mt-4">
                        <div class="container col-3 ">
                            <h2 class="fw-bold "> <?php echo $detalle->medida;?></h2>
                        </div>
                        <div class="container col-6">
                            <h2  class="fw-bold"><?php echo $detalle->precio;?></h2>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>

    <?php
    $conexion->desconectarDB();
    ?>



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