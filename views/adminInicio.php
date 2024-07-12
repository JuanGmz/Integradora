<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Administración</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg-light">
    <div class="container-fluid m-0 h-100">
        <!-- navbar mobile -->
        <div class="row bg-dark d-block d-lg-none">
            <div class="collapse m-0 p-0" id="navbarToggleExternalContent" data-bs-theme="dark">
                <div class="bg-dark p-4">
                    <h5 class="text-body-emphasis h4">Administrar</h5>
                </div>
                <div class="accordion accordion-flush" id="accordionMobile">
                    <div class="accordion-item m-0 p-0 row">
                        <h2 class="accordion-header">
                            <button class="row accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-inicio" aria-expanded="false"
                                aria-controls="flush-inicio">
                                <div class="col-6">
                                    <a href="adminInicio.php" class="text-light fw-bold text-decoration-none">
                                        <i class="fa-solid fa-house-laptop me-1"></i>
                                        Inicio
                                    </a>
                                </div>
                            </button>
                        </h2>
                        <div class="accordion-item row m-0 p-0">
                            <div class="accordion-header">
                                <div class="collapsed fw-bold fs-3 bg-dark text-light p-3 ">
                                    Componentes
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Componentes -->
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-menu" aria-expanded="false"
                                aria-controls="flush-menu">
                                <div class="col-8">
                                    <i class="fa-solid fa-table me-3"></i>
                                    Menú
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-menu" class="accordion-collapse collapse" data-bs-parent="#accordionMobile">
                            <div class="accordion-body bg-dark">
                                <a href="adminMenu.php" class="ms-5 text-light fw-bold fs-5 text-decoration-none"
                                    aria-current="true">
                                    Administrar Menú
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-events" aria-expanded="false"
                                aria-controls="flush-events">
                                <div class="col-8">
                                    <i class="fa-solid fa-bullhorn me-3"></i>
                                    Eventos
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-events" class="accordion-collapse collapse" data-bs-parent="#accordionMobile">
                            <div class="accordion-body bg-dark">
                                <a href="adminEventos.php" class="text-light fw-bold fs-5 text-decoration-none ms-5"
                                    aria-current="true">
                                    Administrar Eventos
                                </a><br><br>
                                <a href="adminReservas.php" class="text-light fw-bold fs-5 text-decoration-none ms-5">
                                    Administar Reservas
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-ecommerce" aria-expanded="false"
                                aria-controls="flush-ecommerce">
                                <div class="col-8">
                                    <i class="fa-solid fa-cart-arrow-down me-3"></i>
                                    E-Commerce
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-ecommerce" class="accordion-collapse collapse" data-bs-parent="#accordionMobile">
                            <div class="accordion-body bg-dark">
                                <a href="adminPedidos.php" class="fw-bold fs-5 ms-5 text-light text-decoration-none"
                                    aria-current="true">
                                    Administrar Pedidos
                                </a><br><br>
                                <a href="adminProductosEcommerce.php"
                                    class="fw-bold fs-4 ms-5 text-light text-decoration-none">
                                    Administrar Productos
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-blog" aria-expanded="false"
                                aria-controls="flush-blog">
                                <div class="col-8">
                                    <i class="fa-solid fa-blog me-3"></i>
                                    Publicaciones
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-blog" class="accordion-collapse collapse" data-bs-parent="#accordionMobile">
                            <div class="accordion-body bg-dark">
                                <a href="adminPublicaciones.php"
                                    class="fw-bold fs-5 ms-5 text-light text-decoration-none" aria-current="true">
                                    Administrar Publicaciones
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-rewards" aria-expanded="false"
                                aria-controls="flush-rewards">
                                <div class="col-8">
                                    <i class="fa-solid fa-medal me-3"></i>
                                    Recompensas
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-rewards" class="accordion-collapse collapse" data-bs-parent="#accordionMobile">
                            <div class="accordion-body bg-dark">
                                <a href="adminRecompensas.php" class="fw-bold fs-5 ms-5 text-light text-decoration-none"
                                    aria-current="true">
                                    Administrar Recompensas
                                </a><br><br>
                                <a href="adminAsistencias.php" class="fw-bold fs-5 ms-5 text-light text-decoration-none"
                                    aria-current="true">
                                    Administrar Asistencias
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
        </div>

        <div class="row">
            <!-- navbar pc -->
            <div class="col-lg-3 border-end border-black bg-dark h-100 position-fixed d-none d-lg-block">
                <h4 class="text-center text-light m-3 fs-2 fw-bold">Administrar</h4>
                <div class="row">
                    <div class="col-12 text-center">
                        <i class="fa-solid fa-user fa-10x text-light"></i>
                    </div>
                </div>
                <div class="accordion accordion-flush" id="accordionPc">
                    <div class=" ms-2 fs-3 mt-4 mb-3">
                        <a class="fw-bold bg-dark text-light text-decoration-none" href="adminInicio.php"
                            aria-expanded="false">
                            <i class="fa-solid fa-house-laptop"></i>
                            Inicio
                        </a>
                    </div>
                    <div class="fw-bold fs-5 ms-2 mb-3 bg-dark text-light">
                        Componentes
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-menu" aria-expanded="false"
                                aria-controls="flush-menu">
                                <div class="col-6">
                                    <i class="fa-solid fa-table me-1"></i>
                                    Menú
                                </div>
                                <div class="col-6 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-menu" class="accordion-collapse collapse" data-bs-parent="#accordionPc">
                            <div class="accordion-body bg-dark">
                                <a href="adminMenu.php" class="ms-5 text-light fw-bold fs-6 text-decoration-none"
                                    aria-current="true">
                                    Administrar Menú
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-events" aria-expanded="false"
                                aria-controls="flush-events">
                                <div class="col-6">
                                    <i class="fa-solid fa-bullhorn me-1"></i>
                                    Eventos
                                </div>
                                <div class="col-6 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-events" class="accordion-collapse collapse" data-bs-parent="#accordionPc">
                            <div class="accordion-body bg-dark">
                                <a href="adminEventos.php" class="text-light fw-bold fs-6 text-decoration-none ms-5"
                                    aria-current="true">
                                    Administrar Eventos
                                </a><br><br>
                                <a href="adminReservas.php" class="text-light fw-bold fs-6 text-decoration-none ms-5">
                                    Administar Reservas
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-ecommerce" aria-expanded="false"
                                aria-controls="flush-ecommerce">
                                <div class="col-8">
                                    <i class="fa-solid fa-cart-arrow-down me-1"></i>
                                    E-Commerce
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-ecommerce" class="accordion-collapse collapse" data-bs-parent="#accordionPc">
                            <div class="accordion-body bg-dark">
                                <a href="adminPedidos.php" class="fw-bold fs-6 ms-5 text-light text-decoration-none"
                                    aria-current="true">
                                    Administrar Pedidos
                                </a><br><br>
                                <a href="adminProductosEcommerce.php"
                                    class="fw-bold fs-6 ms-5 text-light text-decoration-none">
                                    Administrar Productos
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-blog" aria-expanded="false"
                                aria-controls="flush-blog">
                                <div class="col-8">
                                    <i class="fa-solid fa-blog me-1"></i>
                                    Publicaciones
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-blog" class="accordion-collapse collapse" data-bs-parent="#accordionPc">
                            <div class="accordion-body bg-dark">
                                <a href="adminBlog.php" class="fw-bold fs-6 ms-5 text-light text-decoration-none"
                                    aria-current="true">
                                    Administrar Publicaciones
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-rewards" aria-expanded="false"
                                aria-controls="flush-rewards">
                                <div class="col-8">
                                    <i class="fa-solid fa-medal me-1"></i>
                                    Recompensas
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-rewards" class="accordion-collapse collapse" data-bs-parent="#accordionPc">
                            <div class="accordion-body bg-dark">
                                <a href="adminRecompensas.php" class="fw-bold fs-6 ms-5 text-light text-decoration-none"
                                    aria-current="true">
                                    Administrar Recompensa
                                </a><br><br>
                                <a href="adminAsistencias.php" class="fw-bold fs-6 ms-5 text-light text-decoration-none" aria-current="true">
                                    aria-current="true">
                                    Administrar Asistencias
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 offset-lg-3 p-0">
                <!-- AQUI VA EL CONTENIDO DE LA PAGINAAAAAAAAAAAA -->
                <div class="container p-0 m-0 bg-light">
                    <div class="row p-3 m-0 shadow-lg">
                        <div class="col-3">
                            <h1>Inicio</h1>
                        </div>
                        <div class="col-9 d-flex justify-content-end align-items-center gap-3">
                            <!-- Botón para volver atras -->
                            <a href="../index.php" class="text-decoration-none">
                                <i class="fa-solid fa-house fa-2x"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 p-4 m-0">
                    <div class="">
                        <div class="p-3">
                            <div class="container">
                                <div class="d-flex flex-column align-items-center bg-dark-subtle p-3 rounded">
                                    <i class="fa-solid fa-user-tie fa-5x"></i>
                                    <h1 class="fw-bold">Bienvenido</h1>
                                </div>
                            </div>
                        </div>
                        <!-- Accesos Rápidos -->
                        <div class="container text-center">
                            <p class="border shadow rounded p-2 fs-4">
                                Accesos Rápidos
                            </p>
                        </div>
                    </div>
                    <!-- Tabla -->
                    <div class="table-responsive container">
                        <table class="table table-borderless">
                            <tbody>
                                <!--Contenido-->
                                <tr class="row">
                                    <!--1-->
                                    <td class="col col-lg-4 col-md-4 ">
                                        <!--Accesos rapidos 1 roles-->
                                        <div class="container mt-2 d-flex justify-content-center align-items-center">
                                            <div class="" style="width: 18rem;">
                                                <div class="card mb-3">
                                                    <a href=""
                                                        class="btn btn-secondary d-flex align-items-center justify-content-center align-items-center justify-content-center"
                                                        style="height: 180px;">
                                                        <i class="fa-solid fa-user-tag fa-4x text-dark"></i>
                                                    </a>
                                                </div>
                                                <div class="card-body text-center">
                                                    <h5 class="card-title fw-bold">Roles</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <!--2-->
                                    <td class="col col-lg-4 col-md-4 ">
                                        <!--Accesos rapidos 2 usuarios -->
                                        <div class="container mt-2 d-flex justify-content-center align-items-center">
                                            <div class="" style="width: 18rem;">
                                                <div class="card mb-3">
                                                    <a href="adminUsuarios.html"
                                                        class="btn btn-secondary d-flex align-items-center justify-content-center align-items-center justify-content-center"
                                                        style="height: 180px;">
                                                        <i class="fa-solid fa-users text-dark fa-4x"></i>
                                                    </a>
                                                </div>
                                                <div class="card-body text-center">
                                                    <h5 class="card-title fw-bold">Usuarios</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <!--3-->
                                    <td class="col col-lg-4 col-md-4 ">
                                        <!--Accesos rapidos 3 Administracion Inicio -->
                                        <div class="container mt-2 d-flex justify-content-center align-items-center">
                                            <div class="" style="width: 18rem;">
                                                <div class="card mb-3">
                                                    <a href="adminAdministrarInicio.html"
                                                        class="btn btn-secondary d-flex align-items-center justify-content-center align-items-center justify-content-center"
                                                        style="height: 180px;">
                                                        <i class="fa-solid fa-house-laptop text-dark  fa-4x"></i>

                                                    </a>
                                                </div>
                                                <div class="card-body text-center">
                                                    <h5 class="card-title fw-bold">Administracion Inicio</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <!--4-->
                                    <td class="col col-lg-4 col-md-4 ">
                                        <!--Accesos rapidos 4 pedidos -->
                                        <div class="container mt-2 d-flex justify-content-center align-items-center">
                                            <div class="" style="width: 18rem;">
                                                <div class="card mb-3">
                                                    <a href="adminPedidos.html"
                                                        class="btn btn-secondary d-flex align-items-center justify-content-center align-items-center justify-content-center"
                                                        style="height: 180px;">
                                                        <i class="fa-solid fa-basket-shopping fa-4x text-dark"></i>
                                                    </a>
                                                </div>
                                                <div class="card-body text-center">
                                                    <h5 class="card-title fw-bold">Pedidos</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <!--5-->
                                    <td class="col col-lg-4 col-md-4 ">
                                        <!--Accesos rapidos 4 categorias -->
                                        <div class="container mt-2 d-flex justify-content-center align-items-center">
                                            <div class="" style="width: 18rem;">
                                                <div class="card mb-3">
                                                    <a href="adminCategorias.html"
                                                        class="btn btn-secondary d-flex align-items-center justify-content-center align-items-center justify-content-center"
                                                        style="height: 180px;">
                                                        <i class="fa-solid fa-list fa-4x text-dark"></i>
                                                    </a>
                                                </div>
                                                <div class="card-body text-center">
                                                    <h5 class="card-title fw-bold">categorias</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <!--6-->
                                    <td class="col col-lg-4 col-md-4 ">
                                        <!--Accesos rapidos 4 eventos -->
                                        <div class="container mt-2 d-flex justify-content-center align-items-center">
                                            <div class="" style="width: 18rem;">
                                                <div class="card mb-3">
                                                    <a href="adminEventos.html"
                                                        class="btn btn-secondary d-flex align-items-center justify-content-center align-items-center justify-content-center"
                                                        style="height: 180px;">
                                                        <i class="fa-solid fa-bell fa-4x text-dark"></i>
                                                    </a>
                                                </div>
                                                <div class="card-body text-center">
                                                    <h5 class="card-title fw-bold">Eventos</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <!--7-->
                                    <td class="col col-lg-4 col-md-4 ">
                                        <!--Accesos rapidos 7 blog -->
                                        <div class="container mt-2 d-flex justify-content-center align-items-center">
                                            <div class="" style="width: 18rem;">
                                                <div class="card mb-3">
                                                    <a href="adminBlog.html"
                                                        class="btn btn-secondary d-flex align-items-center justify-content-center align-items-center justify-content-center"
                                                        style="height: 180px;">
                                                        <i class="fa-solid fa-newspaper fa-4x text-dark"></i>
                                                    </a>
                                                </div>
                                                <div class="card-body text-center">
                                                    <h5 class="card-title fw-bold">Blog</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <!--8-->
                                    <td class="col col-lg-4 col-md-4 ">
                                        <!--Accesos rapidos 8 menu -->
                                        <div class="container mt-2 d-flex justify-content-center align-items-center">
                                            <div class="" style="width: 18rem;">
                                                <div class="card mb-3">
                                                    <a href="adminMenu.html"
                                                        class="btn btn-secondary d-flex align-items-center justify-content-center align-items-center justify-content-center"
                                                        style="height: 180px;">
                                                        <i class="fa-solid fa-store fa-4x text-dark"></i>
                                                    </a>
                                                </div>
                                                <div class="card-body text-center">
                                                    <h5 class="card-title fw-bold">Menú</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <!--9-->
                                    <td class="col col-lg-4 col-md-4 ">
                                        <!--Accesos rapidos 8 Recompensas -->
                                        <div class="container mt-2 d-flex justify-content-center align-items-center">
                                            <div class="" style="width: 18rem;">
                                                <div class="card mb-3">
                                                    <a href="adminRecompensas.html"
                                                        class="btn btn-secondary d-flex align-items-center justify-content-center align-items-center justify-content-center"
                                                        style="height: 180px;">
                                                        <i class="fa-solid fa-gift fa-4x text-dark"></i>
                                                    </a>
                                                </div>
                                                <div class="card-body text-center">
                                                    <h5 class="card-title fw-bold">Recompensas</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/b820f07375.js" crossorigin="anonymous"></script>
    <script src="../script/script.js"></script>
</body>

</html>