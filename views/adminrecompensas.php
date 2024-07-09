<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Recompensas</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid h-100">
        <!-- navbar mobile -->
        <div class="row d-block d-lg-none border-black border-bottom border-3 bg-dark">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand fw-bold text-light" href="adminInicio.html">Administrar</a>
                    <button class="navbar-toggler border-0 text-light bg-dark" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon rounded p-2"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="p-2">
                            <div class="accordion accordion-flush" id="accordionMobile">
                                <div class="accordion-item">
                                    <h2 class="accordion-header row">
                                        <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#flush-inicio"
                                            aria-expanded="false" aria-controls="flush-inicio">
                                            <div class="col-8">

                                                <a href="#"
                                                    class="text-light fw-bold text-decoration-none">
                                                    <i class="fa-solid fa-house-laptop me-1"></i>
                                                    Inicio
                                                </a>
                                            </div>

                                        </button>
                                    </h2>
                                    <div class="accordion-item">
                                        <div class="accordion-header row">
                                            <div class="collapsed fw-bold fs-3 bg-dark text-light p-3 ">
                                                Componentes
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header row">
                                        <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#flush-menu"
                                            aria-expanded="false" aria-controls="flush-menu">
                                            <div class="col-8">
                                                <i class="fa-solid fa-table me-3"></i>
                                                Menú
                                            </div>
                                            <div class="col-4 text-end">
                                                <i class="fa-solid fa-chevron-down"></i>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="flush-menu" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionMobile">
                                        <div class="accordion-body bg-dark">
                                            <a href="#"
                                                class="ms-5 text-light fw-bold fs-5 text-decoration-none"
                                                aria-current="true">
                                                Administrar Menú
                                            </a>
                                            <br><br>
                                            <a href="#" class="ms-5 text-light fw-bold fs-5 text-decoration-none">Ver
                                                Menú</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header row">
                                        <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#flush-events"
                                            aria-expanded="false" aria-controls="flush-events">
                                            <div class="col-8">
                                                <i class="fa-solid fa-bullhorn me-3"></i>
                                                Eventos
                                            </div>
                                            <div class="col-4 text-end">
                                                <i class="fa-solid fa-chevron-down"></i>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="flush-events" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionMobile">
                                        <div class="accordion-body bg-dark">
                                            <a href="#"
                                                class="text-light fw-bold fs-5 text-decoration-none ms-5"
                                                aria-current="true">
                                                Administrar Eventos
                                            </a><br><br>
                                            <a href="adminReservas.html"
                                                class="text-light fw-bold fs-5 text-decoration-none ms-5">
                                                Administar Reservas
                                            </a><br><br>
                                            <a href="#" class="text-light fw-bold fs-5 text-decoration-none ms-5">Ver
                                                Eventos
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header row">
                                        <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#flush-ecommerce"
                                            aria-expanded="false" aria-controls="flush-ecommerce">
                                            <div class="col-8">
                                                <i class="fa-solid fa-cart-arrow-down me-3"></i>
                                                E-Commerce
                                            </div>
                                            <div class="col-4 text-end">
                                                <i class="fa-solid fa-chevron-down"></i>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="flush-ecommerce" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionMobile">
                                        <div class="accordion-body bg-dark">
                                            <a href="#"
                                                class="fw-bold fs-5 ms-5 text-light text-decoration-none"
                                                aria-current="true">
                                                Administrar Pedidos
                                            </a><br><br>
                                            <a href="#"
                                                class="fw-bold fs-4 ms-5 text-light text-decoration-none">
                                                Administrar Productos
                                            </a><br><br>
                                            <a href="#" class="fw-bold fs-5 ms-5 text-light text-decoration-none">
                                                Ver E-Commerce
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header row">
                                        <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#flush-blog"
                                            aria-expanded="false" aria-controls="flush-blog">
                                            <div class="col-8">
                                                <i class="fa-solid fa-blog me-3"></i>
                                                Blog
                                            </div>
                                            <div class="col-4 text-end">
                                                <i class="fa-solid fa-chevron-down"></i>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="flush-blog" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionMobile">
                                        <div class="accordion-body bg-dark">
                                            <a href="#"
                                                class="fw-bold fs-5 ms-5 text-light text-decoration-none"
                                                aria-current="true">
                                                Administrar Blog
                                            </a><br><br>
                                            <a href="#" class="fw-bold fs-5 ms-5 text-light text-decoration-none">Ver
                                                Blog
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header row">
                                        <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#flush-rewards"
                                            aria-expanded="false" aria-controls="flush-rewards">
                                            <div class="col-8">
                                                <i class="fa-solid fa-medal me-3"></i>
                                                Recompensas
                                            </div>
                                            <div class="col-4 text-end">
                                                <i class="fa-solid fa-chevron-down"></i>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="flush-rewards" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionMobile">
                                        <div class="accordion-body bg-dark">
                                            <a href="#"
                                                class="fw-bold fs-5 ms-5 text-light text-decoration-none"
                                                aria-current="true">
                                                Administrar Recompensa
                                            </a>
                                            <br><br>
                                            <a href="#" class="fw-bold fs-5 ms-5 text-light text-decoration-none">Ver
                                                Recompensas
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row">
            <!-- navbar pc -->
            <div class="contenedor col-lg-3 border-end border-black bg-dark h-100 position-fixed d-none d-lg-block">
                <h4 class="text-center text-light m-3 fs-2 fw-bold">Administrar</h4>
                <div class="row">
                    <div class="col-12 text-center">
                        <i class="fa-solid fa-user fa-10x text-light"></i>
                    </div>
                </div>
                <div class="accordion accordion-flush" id="accordionPc">
                    <div class=" ms-2 fs-3 mt-4 mb-3">
                        <a class="fw-bold bg-dark text-light text-decoration-none" href="adminInicio.html"
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
                                <br><br>
                                <a href="#" class="ms-5 text-light fw-bold fs-6 text-decoration-none">
                                    Ver Menú
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
                                <a href="adminEventos.html" class="text-light fw-bold fs-6 text-decoration-none ms-5"
                                    aria-current="true">
                                    Administrar Eventos
                                </a><br><br>
                                <a href="adminReservas.html" class="text-light fw-bold fs-6 text-decoration-none ms-5">
                                    Administar Reservas
                                </a><br><br>
                                <a href="#" class="text-light fw-bold fs-6 text-decoration-none ms-5">
                                    Ver Eventos
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
                                <a href="adminPedidos.html" class="fw-bold fs-6 ms-5 text-light text-decoration-none"
                                    aria-current="true">
                                    Administrar Pedidos
                                </a><br><br>
                                <a href="adminProductosEcommerce.html"
                                    class="fw-bold fs-6 ms-5 text-light text-decoration-none">
                                    Administrar Productos
                                </a><br><br>
                                <a href="#" class="fw-bold fs-6 ms-5 text-light text-decoration-none">Ver
                                    E-Commerce
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
                                    Blog
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-blog" class="accordion-collapse collapse" data-bs-parent="#accordionPc">
                            <div class="accordion-body bg-dark">
                                <a href="#" class="fw-bold fs-6 ms-5 text-light text-decoration-none"
                                    aria-current="true">
                                    Administrar Blog
                                </a><br><br>
                                <a href="#" class="fw-bold fs-6 ms-5 text-light text-decoration-none">Ver
                                    Blog
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
                                <a href="#"
                                    class="fw-bold fs-6 ms-5 text-light text-decoration-none" aria-current="true">
                                    Administrar Recompensa
                                </a>
                                <br><br>
                                <a href="#" class="fw-bold fs-6 ms-5 text-light text-decoration-none">Ver
                                    Recompensas
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-categories" aria-expanded="false"
                                aria-controls="flush-categories">
                                <div class="col-8">
                                    <i class="fa-solid fa-list me-1"></i>
                                    Categorías
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-categories" class="accordion-collapse collapse" data-bs-parent="#accordionPc">
                            <div class="accordion-body bg-dark">
                                <a href="adminCategorias.html" class="fw-bold fs-6 ms-5 text-light text-decoration-none"
                                    aria-current="true">
                                    Administrar Categorías
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 offset-lg-3 p-3">
                <!-- AQUI VA EL CONTENIDOOOOOOOO -->
                <div class="container-fluid d-flex justify-content-between align-items-center p-2 border-bottom">
                    <h1 class="fw-bold">Administrar Recompensas</h1>
                    <a class="text-decoration-none text-dark" href="../index.html">
                        <i class="fa-solid fa-house fa-2x ms-auto"></i>
                    </a>
                </div>
        
                <div class="container-fluid">
                    <div class="col bg-body-tertiary p-3 rounded">
                        <form class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col">
                                <select class="form-select" id="filtrar">
                                    <option selected>Filtrar Por</option>
                                    <option value="1">Nombre</option>
                                    <option value="2">Categoría</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="visually-hidden" for="buscar">Buscar</label>
                                <input type="text" class="form-control" id="buscar" placeholder="Buscar" name="buscar">
                            </div>
                            <div class="col">
                                <!--Botón para buscar-->
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                            <!-- Botón para agregar producto -->
                            <div class="col-lg-4 ms-auto">
                                <!-- Botón de modal agregar producto-->
                                <div class="text-end">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="agregarrecompensa">
                                        Agregar Recompensa
                                    </button>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="agregarrecompensa" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Recompensa
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Formulario para agregar producto -->
                                                <form>
                                                    <div class="mb-3">
                                                        <label for="nombreProducto" class="form-label">Nombre del
                                                            Producto</label>
                                                        <input type="text" class="form-control" id="nombreProducto"
                                                            aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="descripcionProducto" class="form-label">Descripción
                                                            del
                                                            Producto</label>
                                                        <input type="text" class="form-control"
                                                            id="descripcionProducto">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="imgProducto" class="form-label">Imágen del
                                                            Producto</label>
                                                        <input type="file" class="form-control" id="imgProducto">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="precioProducto" class="form-label">Costo del
                                                                    Producto</label>
                                                                <input type="number" min="0" class="form-control"
                                                                    id="precioProducto">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label"
                                                                    for="medidaProducto">Medidas</label>
                                                                <select class="form-select" id="medidaProducto">
                                                                    <option selected>1/4 kg</option>
                                                                    <option value="1">1/2 kg</option>
                                                                    <option value="2">1 kg</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Detalles del producto -->
                                                    <h4 class="fw-bold">Detalles del Producto</h4>
                                                    <div class="row">
                                                        <!-- Productor o Finca -->
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="productorFinca" class="form-label">Productor
                                                                    y/o
                                                                    Finca</label>
                                                                <input type="text" class="form-control"
                                                                    id="productorFinca">
                                                            </div>
                                                        </div>
                                                        <!-- Proceso -->
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="proceso">Proceso</label>
                                                                <input type="text" class="form-control" id="proceso">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <!-- Variedad -->
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="variedad"
                                                                    class="form-label">Variedad</label>
                                                                <input type="text" class="form-control" id="variedad">
                                                            </div>
                                                        </div>
                                                        <!-- Altura -->
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="altura">Altura</label>
                                                                <input type="text" class="form-control" id="altura">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Perfil de la Taza -->
                                                    <h4 class="fw-bold">Perfil de la Taza</h4>
                                                    <div class="row">
                                                        <!-- Aroma -->
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="aroma" class="form-label">Aroma</label>
                                                                <input type="text" class="form-control" id="aroma">
                                                            </div>
                                                        </div>
                                                        <!-- Acídez -->
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="acidez">Acídez</label>
                                                                <input type="text" class="form-control" id="acidez">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <!-- Sabor -->
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label for="sabor" class="form-label">Sabor</label>
                                                                <input type="text" class="form-control" id="sabor">
                                                            </div>
                                                        </div>
                                                        <!-- Cuerpo -->
                                                        <div class="col-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="cuerpo">Cuerpo</label>
                                                                <input type="text" class="form-control" id="cuerpo">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-2 text-end">
                                                        <button type="submit" class="btn btn-primary">Agregar
                                                            Producto</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>  

<script scr="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>