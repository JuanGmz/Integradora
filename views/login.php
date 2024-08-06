<?php
session_start();
$alerta = "";
if ($_POST) {
    include '../class/database.php';
    include '../scripts/funciones/funciones.php';
    $db = new Database();
    $db->conectarDB();

    extract($_POST);
    $db->verifica($usuario, $password);

    if (!isset($_SESSION["usuario"])) {
        showAlert("Usuario o contraseña incorrectos.", "error");
    }
    $db->desconectarDB();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/Sinfonía-Café-y-Cultura.webp">
</head>

<body style="background: var(--color5)">
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
    <div class="container bg-light rounded-3 my-5">
        <div class="row">
            <!-- Formulario -->
            <div class="col-lg-6 col-md-6 col-md-6 p-5 d-flex justify-content-center">
                <form action="" method="post" class="p-0 p-lg-5">
                    <legend class="fw-bold fs-1 text-center">Iniciar Sesión</legend>
                    <div class="row p-2">
                        <div class="col-12 mb-2">
                            <label for="usuario" class="form-label fs-5">Usuario</label>
                            <input type="text" class="form-control form-control-bb" id="usuario" name="usuario"
                                required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="password" class="form-label fs-5">Contraseña</label>
                            <input type="password" class="form-control form-control-bb" id="password" name="password"
                                required>
                        </div>
                        <div class="col-12 mb-3 text-center my-2">
                            <a href="recuperar.php" class="blog-card-link">
                                <p class="m-0">Olvidaste tu contraseña?</p>
                            </a>
                        </div>
                        <div class="col-12 mb-3 text-center">
                            <a href="registrar.php" class="blog-card-link">
                                <p class="m-0">Registrar cuenta</p>
                            </a>
                        </div>
                        <div class="col-12 mb-2 text-end d-flex justify-content-cente text-center">
                            <button type="submit" class="btn btn-cafe w-100 text-light fw-bold fs-5">Iniciar
                                Sesión</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Imagen -->
            <div class="col-lg-6 col-6  p-0 m-0 d-none d-md-block">
                <img src="../img/cafes/cafe17.webp" class="img-fluid h-100 rounded coffee-image" alt="img_login">
            </div>
        </div>
    </div>
    <div class="alert floating-alert" id="floatingAlert">
        <span id="alertMessage">Mensaje de la alerta.</span>
    </div>
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
    <script src="../js/alertas.js"></script>

</body>

</html>