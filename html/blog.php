<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="content">
        <!-- NavBar -->
        <nav class="navbar navbar-expand-lg shadow-lg mb-lg-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.html">
                    <img src="../img/Sinfonía-Café-y-Cultura.webp" alt="Logo" class="logo" loading="lazy">
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
                                <a class="nav-link" aria-current="page" href="menu.html">Menú</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="ecommerce.html">Comprar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="recompensas.html">Recompensas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="eventos.html">Eventos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="blog.html">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="contact.html">Contacto</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a href="login.html" class="login-button ms-auto">Iniciar Sesión</a>
                <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <!-- NavBar End -->
        <div class="container mb-5">
            <div class="text-center fw-bold fs-2 mt-5 mb-3">
                <h1 class="h1contact">Blog</h1>
            </div>
        </div>

        <div class="col-12 p-5">
            <div class="row g-4 ">

                <?php
                include_once("../class/database.php");

                // Conectar a la base de datos
                $conexion = new Database();
                $conexion->conectarDB();

                // Configurar la paginación
                $results_per_page = 6; // Número de resultados por página
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
                img_url
                FROM 
                publicaciones
                WHERE 
                tipo = "Blog"
                LIMIT ' . $offset . ', ' . $results_per_page;

                $publicaciones = $conexion->select($query);
                ?>

                <div class="container">
                    <div class="row g-4 p-3">
                        <?php foreach ($publicaciones as $publicacion) : ?>
                            <div class='col-md-4 col-12 col-sm-6' style="height: 550px;">
                                <div class='card blog-card'>
                                    <img src='<?php echo $publicacion->img_url; ?>' class='card-img-top' alt='Image'>
                                    <div class='card-body ' style="height: 190px;">
                                        <h5 class='blog-card-title'><?php echo $publicacion->titulo; ?></h5>
                                        <h6 class='blog-card-subtitle mb-2 text-muted'>by Jane Doe / Competition / 23.02.2016</h6>
                                        <p class='blog-card-text'><?php echo $publicacion->descripcion; ?></p>
                                        
                                    </div>
                                    <a href='#' class='blog-card-link p-3'>Mas detalles <i class='fa-solid fa-arrow-right'></i></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination d-flex justify-content-center">
                        <li class="page-item<?php if ($page <= 1) {
                                                echo ' disabled';
                                            } ?>">
                            <a class="page-link custom-page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                            <li class="page-item custom-page-item<?php if ($page == $i) {
                                                                        echo ' active';
                                                                    } ?>">
                                <a class="page-link custom-page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>
                        <li class="page-item<?php if ($page >= $total_pages) {
                                                echo ' disabled';
                                            } ?>">
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

    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/45ef8dbe96.js" crossorigin="anonymous"></script>
</body>

</html>