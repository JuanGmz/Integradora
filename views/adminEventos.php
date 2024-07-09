<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas admin</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/scrollbar.css">
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

                                                <a href="adminInicio.html"
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
                                            <a href="adminMenu.html"
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
                                            <a href="adminEventos.html"
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
                                            <a href="adminPedidos.html"
                                                class="fw-bold fs-5 ms-5 text-light text-decoration-none"
                                                aria-current="true">
                                                Administrar Pedidos
                                            </a><br><br>
                                            <a href="adminProductosEcommerce.html"
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
                                            <a href="adminBlog.html"
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
                                            <a href="adminRecompensas.html"
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
                                <div class="accordion-item">
                                    <h2 class="accordion-header row">
                                        <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#flush-categories"
                                            aria-expanded="false" aria-controls="flush-categories">
                                            <div class="col-8">
                                                <i class="fa-solid fa-list me-3"></i>
                                                Categorías
                                            </div>
                                            <div class="col-4 text-end">
                                                <i class="fa-solid fa-chevron-down"></i>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="flush-categories" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body bg-dark">
                                            <a href="adminCategorias.html"
                                                class="fw-bold fs-5 ms-5 text-light text-decoration-none"
                                                aria-current="true">
                                                Administrar Categorías
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
                                <a href="adminMenu.html" class="ms-5 text-light fw-bold fs-6 text-decoration-none"
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
                                <a href="adminBlog.html" class="fw-bold fs-6 ms-5 text-light text-decoration-none"
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
                                <a href="adminRecompensas.html"
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
                <!-- AQUI VA EL CONTENIDO DE LA PAGINAAAAAAAAAAAA -->
                <!-- Título de la página -->
                <div class="container-fluid d-flex justify-content-between align-items-center p-2 border-bottom">
                    <h1 class="fw-bold">Eventos</h1>
                    <a class="text-decoration-none text-dark" href="../index.html">
                        <i class="fa-solid fa-house fa-2x ms-auto"></i>
                    </a>
                </div>
                <div class="container-fluid">
                    <div class="col bg-gradient p-3 rounded shadow-lg">
                        <form class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col">
                                <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                                <select class="form-select" id="inlineFormSelectPref">
                                    <option selected>Filtrar Por</option>
                                    <option value="1">Nombre</option>
                                    <option value="2">Categoría</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="visually-hidden" for="inlineFormInputGroupUsername">Buscar</label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="fa fa-search"></i></div>
                                    <input type="text" class="form-control" id="inlineFormInputGroupUsername"
                                        placeholder="Buscar">
                                </div>
                            </div>
                            <div class="ms-auto text-end">
                                <!-- Button Agregar Evento -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#agregarEvento">
                                    Agregar Evento
                                </button>
                            </div>
                            <!-- Modal Agregar Evento -->
                            <div class="modal fade" id="agregarEvento" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Evento</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Aqui va el contenido de el boton de agregar-->
                                            <form class="row g-3" method="" action="">
                                                <div class="col-12 mb-3">
                                                    <label for="titulo" class="form-label">
                                                        Titulo del Evento
                                                    </label>
                                                    <input type="text" class="form-control" id="titulo" name="evento">
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label for="descripcion" class="form-label">Descripción</label>
                                                    <input type="text" class="form-control" id="descripcion"
                                                        name="descripcion">
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label for="img" class="form-label">Imagen</label>
                                                    <input type="file" class="form-control" id="img" name="imgEvento"
                                                        required>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <h4 class="fw-bold">Fecha y Hora</h4>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label for="fecha" class="form-label">Fecha del Evento</label>
                                                    <input type="date" class="form-control" id="fecha"
                                                        name="fechaEvento">
                                                </div>
                                                <!-- Pendiente -->
                                                <div class="row">
                                                    <div class="col-6 mb-3">
                                                        <label for="horaIni" class="form-label">Hora de Inicio</label>
                                                        <input type="number" min="00:00:00" max="23:59:59"
                                                            class="form-control" id="horaIni" name="horaIni">
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label for="horaFin" class="form-label">Hora de Fin</label>
                                                        <input type="number" min="00:00:00" max="23:59:59"
                                                            class="form-control" id="horaFin" name="horaFin">
                                                    </div>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <h4 class="fw-bold">Ubicación</h4>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label for="lugar" class="form-label">Nombre del Lugar</label>
                                                    <input type="text" class="form-control" id="lugar" name="lugar">
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 mb-3">
                                                        <label for="ubicacion" class="form-label">Colonia</label>
                                                        <input type="text" class="form-control" id="ubicacion"
                                                            name="ubicacion">
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label for="calle" class="form-label">Calle</label>
                                                        <input type="text" class="form-control" id="calle" name="calle">
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-3 text-center">
                                                    <h4 class="fw-bold">Costo del Evento</h4>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label for="costo" class="form-label">Costo por boleto</label>
                                                    <input type="number" min="0" class="form-control" id="costo"
                                                        name="costo">
                                                </div>
                                                <div>
                                                    <label for="categoria" class="form-label">CATEGORIA</label><br>
                                                    <select name="categoria" id="">
                                                        <?php
                                                        include ("../class/database.php");
                                                        $db = new Database();
                                                        $db->conectarDB();
                                                        $consulta = "SELECT categorias.id_categoria, categorias.nombre
                                                         FROM categorias WHERE tipo = 'evento'";
                                                        $tabla=$db->select($consulta);
                                                        foreach ($tabla as $categoria) {
                                                            echo "<option value='".$categoria->id_categoria.">".$categoria->nombre."</option>";
                                                        }
                                                        ?>  
                                                    </select>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label for="cantidadBoletos" class="form-label">Cantidad de
                                                        boletos</label>
                                                    <input type="number" min="0" max="100" class="form-control"
                                                        id="cantidadBoletos" name="cantidadBoletos">
                                                </div>
                                                <div class="text-end mb-3">
                                                    <button class="btn btn-primary" type="submit"
                                                        id="btn-agregar">Agregar Evento</button>
                                                    </input>
                                                </div>
                                            </form>
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

                <!-- Aqui se mostrarán los eventos -->

            </div>
        </div>
    </div>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/b820f07375.js" crossorigin="anonymous"></script>
</body>

</html>