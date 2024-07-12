<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>

    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg shadow-lg mb-lg-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.html">
                <img src="../../img/Sinfonía-Café-y-Cultura.webp" alt="Logo" class="logo" loading="lazy">
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
                        <div class="justify-content-end d-flex p-2 ">
                            <div class="dropdown ">
                                <i class="fa-solid fa-user" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"></i>
                                <div class="dropdown-menu dropdown-itemcolor" aria-labelledby="userDropdown">
                                    <a class="dropdown-item dropdown-itemcolor" href="#account">Cuenta</a>
                                    <a class="dropdown-item dropdown-itemcolor" href="#logout">Cerrar Sesión</a>
                                    <a class="dropdown-item dropdown-itemcolor" href="#cart">Carrito</a>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>





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
                <li class="breadcrumb-item"><a href="../menu.php">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Perfil</li>
            </ol>
        </nav>

        <!-- Titulo -->
        <h1 class="fw-bold">Perfil</h1>
        <div class="container mt-5">

            <hr class="section-divider">

            <!-- Order History Section -->
            <h4>Historial de pedidos</h4>
            <p>No hay historial de pedidos</p>

            <!-- Account Details Section -->
            <h4 class="mt-4">Detalles de la cuenta</h4>
            <table class="table table-striped table-warning">
                <tbody>
                    <tr>
                        <th scope="row">Nombre:</th>
                        <td>Dante Raziel Basurto Saucedo</td>
                    </tr>
                    <tr>
                        <th scope="row">Email:</th>
                        <td>bune_assassin@hotmail.com</td>
                    </tr>
                    <tr>
                        <th scope="row">Dirección:</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">Dirección 2:</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">País:</th>
                        <td>México</td>
                    </tr>
                    <tr>
                        <th scope="row">Código postal:</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">Teléfono:</th>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <!-- View Addresses Button -->
            <button class="btn btn-danger">Ver Direcciones (1)</button>
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




    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/45ef8dbe96.js" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>