<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="shortcut icon" href="../../img/Sinfonía-Café-y-Cultura.webp">
    <?php
    session_start();
    require_once '../../class/database.php';
    include_once ("../../scripts/funciones/funciones.php");
    $db = new database();
    $db->conectarDB();

    if (isset($_SESSION['usuario'])) {
        $rolUsuario = "SELECT r.rol FROM roles r JOIN roles_usuarios ru ON r.id_rol = ru.id_rol JOIN personas p ON ru.id_usuario = p.id_usuario WHERE p.usuario = '$_SESSION[usuario]'";
        $rol = $db->select($rolUsuario);
    }
    ?>
</head>

<body>
    <!-- Botón de WhatsApp -->
    <button id="whatsappButton"
        class="btn btn-success position-fixed bottom-0 start-0 m-3 p-3 d-flex align-items-center justify-content-center z-3"
        type="button"
        onclick="window.open('https://wa.me/528711220994?text=%C2%A1Hola!%20Escribo%20desde%20la%20p%C3%A1gina%20web%20y%20quer%C3%ADa%20consultar%20por%3A', '_blank')">
        <i class="fa-brands fa-whatsapp fa-2x"></i>
    </button>
    <div class="content">

        <!-- NavBar -->
        <nav class="navbar navbar-expand-lg shadow-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="../../index.php">
                    <img src="../../img/Sinfonía-Café-y-Cultura.webp" alt="Logo" class="logo" loading="lazy">
                </a>
                <div class="offcanvas offcanvas-end" style="background: var(--primario);" tabindex="-1"
                    id="offcanvasNavbar" aria-labelledby="tituloOffcanvas">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title text-light" id="tituloOffcanvas">SinfoníaCafé&Cultura</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="../../views/menu.php">Menú</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="../../views/ecommerce.php">Comprar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="../../views/recompensas.php">Recompensas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="../../views/eventos.php">Eventos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="../../views/publicaciones.php">Publicaciones</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="../../views/contact.php">Contacto</a>
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
                        <a class="dropdown-item" href="../perfil.php">Mi perfil</a>
                        <a class="dropdown-item" href="../bolsas/Carrito.php">Mi carrito</a>
                        <?php if ($rol[0]->rol === 'administrador') { ?>
                            <a class="dropdown-item" href="../adminInicio.php">Administrar</a>
                            <div class="dropdown-divider"></div>
                        <?php } ?>
                        <a class="dropdown-item" href="../../scripts/login/cerrarsesion.php">Cerrar sesión</a>
                    </div>
                    <?php
                } else {
                    ?>
                    <a href="../login.php" class="login-button ms-auto">Iniciar Sesión</a>
                    <?php
                }
                ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <!-- NavBar End -->

        <div class="container mb-5">
            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-4">
                    <li class="breadcrumb-item"><a href="../../index.php">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="../publicaciones.php">Publicaciones</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                </ol>
            </nav>
            <div class="fw-bold fs-2 mb-5">
                <h1 class="h1contact">Blog</h1>
            </div>
            <div class="row">
                <?php
                include_once ("../../class/database.php");

                // Conectar a la base de datos
                $conexion = new Database();
                $conexion->conectarDB();

                // Configurar la paginación
                $results_per_page = 9; // Número de resultados por página
                $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
                $page = max($page, 1); // Asegurar que la página sea al menos 1
                
                // Contar el número total de publicaciones
                $total_query = 'SELECT COUNT(*) AS total FROM publicaciones WHERE tipo = "Blog"';
                $total_result = $conexion->select($total_query);
                $total_pages = ceil($total_result[0]->total / $results_per_page);

                // Calcular el desplazamiento (offset)
                $offset = ($page - 1) * $results_per_page;

                // Obtener las publicaciones para la página actual
                $query = 'SELECT 
                                titulo, 
                                descripcion, 
                                img_url,
                                fecha
                              FROM 
                                publicaciones
                              WHERE 
                                tipo = "blog"
                              ORDER BY
                                fecha DESC
                              LIMIT ' . $offset . ', ' . $results_per_page;
                $publicaciones = $conexion->select($query);
                ?>
                <div class="container mb-3">
                    <div class="row">
                        <?php foreach ($publicaciones as $publicacion): ?>
                            <div class="col-12 mb-4">
                                <div class="card shadow-lg">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src='../../img/publicaciones/<?php echo $publicacion->img_url; ?>'
                                                class='img-fluid' alt='<?php echo $publicacion->titulo ?>'
                                                style="height: 100%; width: 100%; object-fit: cover;">
                                        </div>
                                        <div class="col-md-8 d-flex flex-column justify-content-center p-3">
                                            <h5 class='card-title'><?php echo $publicacion->titulo; ?></h5>
                                            <p class='card-text' style="color:black;">
                                                <?php echo $publicacion->descripcion; ?></p>
                                            <h6 class='card-subtitle mb-2 text-muted'><?php echo $publicacion->fecha; ?>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="container mt-4">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination d-flex justify-content-center">
                            <!-- Botón de "Anterior" -->
                            <li class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <!-- Botones de páginas -->
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <!-- Botón de "Siguiente" -->
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <?php
                $conexion->desconectarDB();
                ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
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

    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/45ef8dbe96.js" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>