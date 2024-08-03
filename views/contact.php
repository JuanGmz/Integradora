<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/Sinfonía-Café-y-Cultura.webp">
    <?php
    include_once("../class/database.php");
    $db = new Database();
    $db->conectarDB();
    session_start();
    if (isset($_SESSION["usuario"])) {
        $rolUsuario = "SELECT r.rol FROM roles r JOIN roles_usuarios ru ON r.id_rol = ru.id_rol JOIN personas p ON ru.id_usuario = p.id_usuario WHERE p.usuario = '$_SESSION[usuario]'";
        $rol = $db->select($rolUsuario);
    } else {
        $rol = null;
    }
    ?>
</head>

<body>
    <div class="content">
        <!-- Botón de WhatsApp -->
        <button id="whatsappButton" class="btn btn-success position-fixed bottom-0 start-0 m-3 p-3 d-flex align-items-center justify-content-center z-3" type="button" onclick="window.open('https://wa.me/528711220994?text=%C2%A1Hola!%20Escribo%20desde%20la%20p%C3%A1gina%20web%20y%20quer%C3%ADa%20consultar%20por%3A', '_blank')">
            <i class="fa-brands fa-whatsapp fa-2x"></i>
        </button>
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
                    <li class="breadcrumb-item fw-bold"><a href="../index.php">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page"></li>Contacto</li>
                </ol>
            </nav>

            <div class="fw-bold fs-3 mt-3 mb-4">
                <h1 class="h1contact">Contacto</h1>
            </div>
            <!-- Contacto -->
            <div class="container mb-5 d-flex justify-content-center">



                <div class="row justify-content-center">

                    <div class="col-12 col-sm-10 col-md-9 col-lg-4 p-3">
                        <!-- Horario en grande -->
                        <div class="d-none d-lg-block bagr-cafe1 p-3 rounded">
                            <h4 class="text-uppercase font-weight-bold border-bottom pb-3 mb-4">Horario</h4>
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <span>Lunes</span><span class="text-dark-emphasis">CERRADO</span>
                            </div>
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <span>Martes</span><span>11:00a.m. - 9:00p.m.</span>
                            </div>
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <span>Miércoles</span><span>11:00a.m. - 9:00p.m.</span>
                            </div>
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <span>Jueves</span><span>11:00a.m. - 9:00p.m.</span>
                            </div>
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <span>Viernes</span><span>11:00a.m. - 9:00p.m.</span>
                            </div>
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <span>Sábado</span><span>11:00a.m. - 9:00p.m.</span>
                            </div>
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <span>Domingo</span><span class="text-dark-emphasis">CERRADO</span>
                            </div>
                            <div class="mt-4 text-dark-emphasis font-weight-bold p-3">
                                <i class="fa-solid fa-phone fa-1x"></i>: +871 506 6618
                            </div>
                        </div>

                        <!-- Horario en acordeón -->
                        <div class="d-lg-none">
                            <div class="accordion " id="accordionExample">
                                <div class="accordion-item ">

                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed btn-categorias" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="border-radius: 0;">
                                            Horario
                                        </button>
                                    </h2>

                                    <div id="collapseOne" class="accordion-collapse collapse bagr-cafe1 container" data-bs-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between border-bottom py-2">
                                                <span>Lunes</span><span class="text-dark-emphasis">CERRADO</span>
                                            </div>
                                            <div class="d-flex justify-content-between border-bottom py-2">
                                                <span>Martes</span><span>11:00a.m. - 9:00p.m.</span>
                                            </div>
                                            <div class="d-flex justify-content-between border-bottom py-2">
                                                <span>Miércoles</span><span>11:00a.m. - 9:00p.m.</span>
                                            </div>
                                            <div class="d-flex justify-content-between border-bottom py-2">
                                                <span>Jueves</span><span>11:00a.m. - 9:00p.m.</span>
                                            </div>
                                            <div class="d-flex justify-content-between border-bottom py-2">
                                                <span>Viernes</span><span>11:00a.m. - 9:00p.m.</span>
                                            </div>
                                            <div class="d-flex justify-content-between border-bottom py-2">
                                                <span>Sábado</span><span>11:00a.m. - 9:00p.m.</span>
                                            </div>
                                            <div class="d-flex justify-content-between border-bottom py-2">
                                                <span>Domingo</span><span class="text-dark-emphasis">CERRADO</span>
                                            </div>
                                            <div class="mt-4 text-dark-emphasis font-weight-bold p-3">
                                                <i class="fa-solid fa-phone fa-1x"></i>: +871 506 6618
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Redes Sociales -->
                    <div class="col-sm-10 col-md-10 col-lg-8 ">
                        <!-- Titulo -->
                        <div class="col-12 text-center fs-3">
                            <h1>Redes Sociales <i class="fa-solid fa-share-nodes"></i></h1>
                        </div>
                        <!-- Redes Sociales -->
                        <div class="row justify-content-center">

                            <!-- Twitter -->
                            <div class="col-6 row col-sm-6 col-md-5 col-lg-4 mb-4 ">
                                <div>
                                    <div class="social-card">
                                        <img src="../img/portada.webp" class="img-fluid" alt="Twitter">
                                        <div class="overlay">
                                            <a href="https://x.com/SinfoniaCoffee" class="social-icon">
                                                <i class="fa-brands fa-x-twitter"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="social-footer">
                                        <div class="blog-card-link">
                                            <a href="https://x.com/SinfoniaCoffee">
                                                <span>TWITTER</span>
                                                <i class="fas fa-arrow-right d-none d-md-inline"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Facebook -->
                            <div class="col-6 row col-sm-6 col-md-5 col-lg-4 mb-4 ">
                                <div>
                                    <div class="social-card">
                                        <img src="../img/portada.webp" class="img-fluid" alt="Facebook">
                                        <div class="overlay">
                                            <a href="https://www.facebook.com/SinfoniaCoffee" class="social-icon">
                                                <i class="fab fa-facebook-f fa-2x"></i>
                                            </a>
                                        </div>

                                    </div>
                                    <div class="social-footer ">
                                        <div class="blog-card-link">
                                            <a href="https://www.facebook.com/SinfoniaCoffee">
                                                <span>FACEBOOK</span>
                                                <i class="fas fa-arrow-right d-none d-md-inline"></i>
                                            </a>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Instagram -->
                            <div class="col-6 row col-sm-6 col-md-5 col-lg-4 mb-4 ">
                                <div>
                                    <div class="social-card">
                                        <img src="../img/portada.webp" class="img-fluid " alt="Instagram">
                                        <div class="overlay">
                                            <a href="https://www.instagram.com/sinfoniacoffee/" class="social-icon">
                                                <i class="fab fa-instagram fa-2x"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="social-footer ">
                                        <div class="blog-card-link">
                                            <a href="https://www.instagram.com/sinfoniacoffee/">
                                                <span>INSTAGRAM</span>
                                                <i class="fas fa-arrow-right d-none d-md-inline"></i>
                                            </a>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- Email -->
                        <div class="row p-md-3 m-4">
                            <div class="col-12 text-center fs-3">
                                <h1>Email</h1>
                            </div>
                            <div class="col-12 mt-2">
                                <p class="text-center">SinfoniaCR@gmail.com </i></p>
                            </div>
                        </div>
                    </div>

                    <!-- Dirección -->
                    <div class="col-12">
                        <div class="container">
                            <div class="col-12 text-center fs-3">
                                <h1>Dirección</h1>
                            </div>
                            <div class="col-12">
                                <p class="text-center">Av. Matamoros 1102, Primitivo Centro, 27000 Torreón, Coah.</p>
                            </div>
                            <div class="col-12">
                                <div class="map-container">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3599.942241846107!2d-103.46392352476505!3d25.540300777491737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x868fd917e93cf38d%3A0x54314456df70dcfd!2zU2luZm9uw61hIC0gQ2Fmw6kgJiBDdWx0dXJh!5e0!3m2!1ses-419!2smx!4v1720232035701!5m2!1ses-419!2smx" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


    </div>

    <!-- Footer -->
    <footer>
        <div class="container-fluid p-5" style="background: var(--negroclaro);">
            <h2 class="text-center text-light mb-5">Sinfonía&CaféCultura</h2>
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
                    <p class="text-center fw-bold text-light">Copyright © 2024 Sinfonía&CaféCultura</p>
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