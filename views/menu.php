<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
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
    } else {
        $rol = null;
    }
    ?>
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
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- NavBar End -->

    <div class="container mb-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                <li class="breadcrumb-item active">Menú</li>
            </ol>
        </nav>

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
                        <div class="cblog-card p-2">
                            <h5 class="card-title fw-bold text-center">Around The World</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a href="menu/clasicos.php">
                    <div class="card border-0" style="background: var(--color6)">
                        <img src="../img/cafes/cafe11.webp" class="card-img-top rounded-5" alt="clasicos">
                        <div class="cblog-card p-2">
                            <h5 class="card-title fw-bold text-center">Clásicos</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a href="menu/coldbrew.php">
                    <div class="card border-0" style="background: var(--color6)">
                        <img src="../img/cafes/coldbrew.webp" class="card-img-top rounded-5" alt="coldbrew">
                        <div class="cblog-card p-2">
                            <h5 class="card-title fw-bold text-center">Cold Brew</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a href="menu/coolanddark.php">
                    <div class="card border-0" style="background: var(--color6)">
                        <img src="../img/categorias/cool.webp" class="card-img-top rounded-5" alt="coolanddark">
                        <div class="cblog-card p-2">
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
                        <div class="cblog-card p-2">
                            <h5 class="card-title fw-bold text-center">Frappes</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a href="menu/losmetodosdejazzband.php">
                    <div class="card border-0" style="background: var(--color6)">
                        <img src="../img/categorias/jazz.webp" class="card-img-top rounded-5" alt="jazzband">
                        <div class="cblog-card p-2">
                            <h5 class="card-title fw-bold text-center">Jazz Band</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a href="menu/metalcoffee.php">
                    <div class="card border-0" style="background: var(--color6)">
                        <img src="../img/categorias/metal.webp" class="card-img-top rounded-5" alt="metalcoffee">
                        <div class="cblog-card p-2">
                            <h5 class="card-title fw-bold text-center">Metal Coffe</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a href="menu/sodasitalianas.php">
                    <div class="card border-0" style="background: var(--color6)">
                        <img src="../img/cafes/sodas.webp" class="card-img-top rounded-5" alt="sodasitalianas">
                        <div class="cblog-card p-2">
                            <h5 class="card-title fw-bold text-center">Sodas Italianas</h5>
                        </div>
                    </div>
                </a>
            </div>
            
        </div>
        <div class="row mb-3">
            <div class="col-6 col-lg-3">
                <a href="menu/teytisanas.php">
                    <div class="card border-0" style="background: var(--color6)">
                        <img src="../img/cafes/bolsa1.webp" class="card-img-top rounded-5" alt="teytisanas">
                        <div class="cblog-card p-2">
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
                <a href="menu/sweetblues.php">
                    <div class="card border-0" style="background: var(--color6)">
                        <img src="../img/cafes/cafe3.webp" class="card-img-top rounded-5" alt="sweetblue">
                        <div class="cblog-card p-2">
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
    <script src="https://kit.fontawesome.com/45ef8dbe96.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>