<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>

    <div class="content">
        <!-- NavBar -->
        <nav class="navbar navbar-expand-lg shadow-lg mb-lg-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="../../index.php">
                    <img src="../../img/Sinfonía-Café-y-Cultura.webp" alt="Logo" class="logo" loading="lazy">
                </a>
                <div class="offcanvas offcanvas-end" style="background: var(--primario);" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title text-light fw-bold" id="offcanvasNavbarLabel">SifoníaCafé&Cultura
                        </h5>
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
                <a href="../login.php" class="login-button ms-auto">Iniciar Sesión</a>
                <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
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
                    include_once("../../class/database.php");

                    // Conectar a la base de datos
                    $conexion = new Database();
                    $conexion->conectarDB();

                    // Configurar la paginación
                    $results_per_page = 9; // Número de resultados por página
                    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
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
                              LIMIT ' . $offset . ', ' . $results_per_page;
                    $publicaciones = $conexion->select($query);
                ?>
                <div class="container mb-3 ">
                    <div class="row justify-content-center d-flex">
                        <?php foreach ($publicaciones as $publicacion) : ?>
                            <div class='col-md-6 p-2 col-10 col-sm-6 col-lg-4 '>
                                <div class='card blog-card shadow-lg' style="border-radius: 5% 5% 0% 0%;">
                                    <img src='../../img/publicaciones/<?php echo $publicacion->img_url; ?>' class='coffee-image' alt='<?php echo $publicacion->titulo ?>'>
                                    <div class='cblog-card product-card-body'>
                                        <h5 class='blog-card-title'><?php echo $publicacion->titulo; ?></h5>
                                        <h6 class='blog-card-subtitle mb-2 text-muted'><?php echo $publicacion->fecha; ?></h6>
                                        <p class='blog-card-text  d-none d-md-block'><?php echo $publicacion->descripcion; ?></p>
                                    </div>
                                   
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <nav aria-label="Page navigation example">
                    <ul class="pagination d-flex justify-content-center">
                        <li class="page-item<?php if ($page <= 1) {
                            echo ' disabled'; } ?>"
                        >
                            <a class="page-link custom-page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                        <li class="page-item custom-page-item<?php if ($page == $i) {
                            echo ' active'; } ?>"
                        >
                            <a class="page-link custom-page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                        <?php endfor; ?>
                        <li class="page-item<?php if ($page >= $total_pages) {
                            echo ' disabled'; } ?>"
                        >
                            <a class="page-link custom-page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <?php
                    $conexion->desconectarDB();
                ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container-fluid p-5 footer-content" style="background: var(--negroclaro);">
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
    <script src="https://kit.fontawesome.com/45ef8dbe96.js" crossorigin="anonymous"></script>
</body>

</html>