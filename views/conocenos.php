<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>conócenos</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/Sinfonía-Café-y-Cultura.webp">
    <style>
        .header-section {
            position: relative;
            background: url('../img/publicaciones/Bienvenidos.jpg') no-repeat center center;
            background-size: cover;
            color: white;
            text-align: center;
            padding: 100px 0;
        }

        .header-section2 {
            position: relative;
            background: url('../img/publicaciones/sinfo.webp') no-repeat center center;
            background-size: cover;
            color: white;
            text-align: center;
            padding: 100px 0;
        }


        .header-section::before,
        .header-section2::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            /* Ajusta el nivel de oscuridad cambiando el valor de opacidad */
            z-index: 1;
        }

        .header-section .container,
        .header-section2 .container {
            position: relative;
            z-index: 2;
        }

        .header-section h1,
        .header-section2 h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .header-section p {
            font-size: 1.2rem;
        }

        .content-section {
            padding: 50px 0;
        }

        .content-section img {
            width: 100%;
            height: auto;
        }
    </style>
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
    <!-- Botón de WhatsApp -->
    <button id="whatsappButton" class="btn btn-success position-fixed bottom-0 start-0 m-3 p-3 d-flex align-items-center justify-content-center z-3" type="button" onclick="window.open('https://wa.me/528711220994?text=%C2%A1Hola!%20Escribo%20desde%20la%20p%C3%A1gina%20web%20y%20quer%C3%ADa%20consultar%20por%3A', '_blank')">
        <i class="fa-brands fa-whatsapp fa-2x"></i>
    </button>
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


    <header class="header-section justify-content-center d-flex text-sm-center">
        <div class="container col-lg-6 col-12 text-center m-5 ">
            <h1 class="fw-bold p-1 text-small">El Legado del Buen Café</h1>
            <p class="p-3 fs-4">Nuestro legado del buen café comenzó en 2014 en la ciudad de Torreon, en donde se sirvieron nuestras primeras tazas de Café La Flor de Córdoba®. Nos hemos especializado en la selección de los mejores granos verdes mexicanos para llevarlos a un perfecto proceso de tueste para entregar a nuestros clientes el mejor café de altura con nuestro inconfundible sabor.</p>
        </div>
    </header>

    <header class="content-section">
        <div class="container-fluid container">
            <div class="row p-3">
                <div class="col-md-6 p-3">
                    <h1 class="fw-bold text-sm-center">Nuestro Café</h1>
                    <ul class="p-3 m-4">
                        <li class="p-1 fs-4">Café 100% de altura.</li>
                        <li class="p-1 fs-4">Grano arábico orgullosamente mexicano proveniente de las altas regiones de Veracruz y Chiapas.</li>
                        <li class="p-1 fs-4">Los caficultores recolectan los mejores frutos del café cuando han alcanzado el punto de madurez idóneo.</li>
                        <li class="p-1 fs-4">Manejamos 2 variedades de café arábico: plenchuela y caracolillo; de los que se derivan otras especialidades como: café torrefacto, café turco, café descafeinado y soluble.</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <img src="../img/eventos/charla.jpg" alt="Café">
                </div>
            </div>
        </div>
    </header>
    <header class="content-section header-section2 text-sm-center">
        <div class="container-fluid container">
            <div class="row p-1">
                <div class="col-md-6">
                    <img src="../img/maquina.webp" alt="Café">
                </div>
                <div class="col-md-6 text-white">

                    <h1 class="fw-bold p-2">Tostadores de Café Desde 1938</h1>
                    <p class="p-5 fs-4">A lo largo de los años, hemos perfeccionado nuestro proceso de tostado para acentuar los aromas y sabores de los diferentes perfiles de café.

                        Nuestros maestros tostadores tuestan diariamente nuestro café, monitoreando en todo momento, la temperatura y humedad del grano para brindar los estándares más altos de calidad.</p>
                </div>

            </div>
        </div>
    </header>
    <section class="content-section text-sm-center">
        <div class="container-fluid container">
            <div class="row p-3">
                <div class="col-md-6 p-3">
                    <h1 class="fw-bold p-3">Nuestros expendios de café</h1>
                    <p class="p-3 fs-4">En todas nuestras cafeterías podrás encontrar los expendios de café, donde podrás escoger el grano de café de tu preferencia o hasta crear tus propias mezclas para así solicitar el molido ideal para tu método de extracción favorito.
                        Llevarás hasta tu casa un café recién molido y fresco.</p>
                </div>
                <div class="col-md-6">
                    <img src="../img/atiende.webp" alt="Café">
                </div>
            </div>
        </div>
    </section>


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