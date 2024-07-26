<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conozcanos</title>
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

        .header-section::before {
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

        .header-section .container {
            position: relative;
            z-index: 2;
        }

        .header-section h1 {
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


    <header class="header-section justify-content-center d-flex">
        <div class="container col-6  text-center m-5 ">
            <h1>El Legado del Buen Café</h1>
            <p>Nuestro legado del buen café comenzó en 1938 en la ciudad de Guadalajara, justo en la esquina de las calles Santa Mónica e Independencia, en donde se sirvieron nuestras primeras tazas de Café La Flor de Córdoba®. Por generaciones nos hemos especializado en la selección de los mejores granos verdes mexicanos para llevarlos a un perfecto proceso de tueste para entregar a nuestros clientes el mejor café de altura con nuestro inconfundible sabor.</p>
        </div>
    </header>

    <section class="content-section">
        <div class="container-fluid container">
            <div class="row p-3">
                <div class="col-md-6 p-3">
                    <h2 class="fw-bold">Nuestro Café</h2>
                    <ul class="p-3 m-4">
                        <li class="p-1">Café 100% de altura.</li>
                        <li class="p-1">Grano arábico orgullosamente mexicano proveniente de las altas regiones de Veracruz y Chiapas.</li>
                        <li class="p-1">Los caficultores recolectan los mejores frutos del café cuando han alcanzado el punto de madurez idóneo.</li>
                        <li class="p-1">Manejamos 2 variedades de café arábico: plenchuela y caracolillo; de los que se derivan otras especialidades como: café torrefacto, café turco, café descafeinado y soluble.</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <img src="../img/charla.jpg" alt="Café">
                </div>
            </div>
        </div>
    </section>
    <section class="content-section header-section">
        <div class="container-fluid container">
            <div class="row p-1">
                <div class="col-md-6">
                    <img src="../img/inicio.webp" alt="Café">
                </div>
                <div class="col-md-6">

                    <h2>Nuestro Café</h2>
                    <ul>
                        <li>Café 100% de altura.</li>
                        <li>Grano arábico orgullosamente mexicano proveniente de las altas regiones de Veracruz y Chiapas.</li>
                        <li>Los caficultores recolectan los mejores frutos del café cuando han alcanzado el punto de madurez idóneo.</li>
                        <li>Manejamos 2 variedades de café arábico: plenchuela y caracolillo; de los que se derivan otras especialidades como: café torrefacto, café turco, café descafeinado y soluble.</li>
                    </ul>
                </div>

            </div>
        </div>
    </section>
    <section class="content-section">
        <div class="container-fluid container">
            <div class="row p-3">
                <div class="col-md-6 p-3">
                    <h2 class="fw-bold">Nuestro Café</h2>
                    <ul class="p-3 m-4">
                        <li class="p-1">Café 100% de altura.</li>
                        <li class="p-1">Grano arábico orgullosamente mexicano proveniente de las altas regiones de Veracruz y Chiapas.</li>
                        <li class="p-1">Los caficultores recolectan los mejores frutos del café cuando han alcanzado el punto de madurez idóneo.</li>
                        <li class="p-1">Manejamos 2 variedades de café arábico: plenchuela y caracolillo; de los que se derivan otras especialidades como: café torrefacto, café turco, café descafeinado y soluble.</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <img src="../img/inicio.webp" alt="Café">
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