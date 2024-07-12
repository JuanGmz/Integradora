<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos admin</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container-fluid h-100">
        <!-- navbar mobile -->
        <div class="row d-block d-lg-none border-black border-3 bg-dark">
            <nav class="navbar navbar-expand-lg admin">
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
                            </div>
                        </div>
                    </div>
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
                                <a href="" class="fw-bold fs-6 ms-5 text-light text-decoration-none">
                                    Ver Recompensas
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
                            <h1>Eventos</h1>
                        </div>
                        <div class="ms-auto text-end col">
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
                                        <h1 class="modal-title fs-5 w-3" id="exampleModalLabel">Agregar Evento</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Aqui va el contenido de el boton de agregar-->
                                        <form action="..\scripts\insertarevento.php" method="post">
                                            <div class="col-12 mb-3">
                                                <label for="titulo" class="form-label">Titulo del Evento</label>
                                                <input type="text" class="form-control" id="titulo" name="evento"
                                                    required>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="descripcion" class="form-label">Descripción</label>
                                                <input type="text" class="form-control" id="descripcion"
                                                    name="descripcion" required>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="cap" class="form-label">Capacidad</label>
                                                <input type="number" min="1" max="80" class="form-control" id="cap"
                                                    name="cap" required>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="img" class="form-label">Imagen</label>
                                                <input type="file" class="form-control" id="img" name="imgEvento">
                                            </div>
                                            <div class="col-12 text-center">
                                                <h4 class="fw-bold">Fecha y Hora</h4>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="fecha" class="form-label">Fecha del Evento</label>
                                                <input type="date" class="form-control" id="fecha" name="fechaEvento"
                                                    required>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 mb-3">
                                                    <label for="horaIni" class="form-label">Hora de Inicio</label>
                                                    <input type="time" min="11:00" max="21:00" class="form-control"
                                                        id="horaIni" name="horaIni" required>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label for="horaFin" class="form-label">Hora de Fin</label>
                                                    <input type="time" min="11:00" max="21:00" class="form-control"
                                                        id="horaFin" name="horaFin" required>
                                                </div>
                                            </div>
                                            <div class="col-12 text-center">
                                                <h4 class="fw-bold">Ubicación</h4>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="lugar" class="form-label">Nombre del Lugar</label>
                                                <select name="lugar" id="lugar" class="form-select" required>
                                                    <?php
                                                    include ("../class/database.php");
                                                    $db = new Database();
                                                    $db->conectarDB();

                                                    $consulta = "SELECT id_lugar, nombre FROM ubicacion_lugares";
                                                    $lugares = $db->select($consulta);
                                                    foreach ($lugares as $lugar) {
                                                        echo "<option value='{$lugar->id_lugar}'>{$lugar->nombre}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-12 mb-3 text-center">
                                                <h4 class="fw-bold">Costo del Evento</h4>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 mb-3">
                                                    <label for="tipo" class="form-label">Tipo</label>
                                                    <select name="tipo" id="tipo" class="form-select" required>
                                                        <option value="Gratuito">Gratuito</option>
                                                        <option value="De Pago">De Pago</option>
                                                    </select>

                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label for="costo" class="form-label">Costo por boleto</label>
                                                    <input type="number" min="0" class="form-control" id="costo"
                                                        name="costo" required>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="categoria" class="form-label">CATEGORIA</label><br>
                                                <select name="categoria" id="categoria" class="form-select" required>
                                                    <?php
                                                    $consulta = "SELECT id_categoria, nombre FROM categorias WHERE tipo = 'evento'";
                                                    $tabla = $db->select($consulta);
                                                    foreach ($tabla as $categoria) {
                                                        echo "<option value='{$categoria->id_categoria}'>{$categoria->nombre}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="cantidadBoletos" class="form-label">Cantidad de
                                                    boletos</label>
                                                <input type="number" min="0" max="100" class="form-control"
                                                    id="cantidadBoletos" name="cantidadBoletos" required>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="fechaPub" class="form-label">Fecha de
                                                    publicación</label>
                                                <input type="date" class="form-control" id="fechaPub" name="fechaPub"
                                                    required>
                                            </div>
                                            <div class="text-end mb-3">
                                                <button class="btn btn-primary" type="submit" id="btn-agregar">Agregar
                                                    Evento</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="shadow-lg bg-light container p-3 ">
                    <div class="row m-1">
                        <div class="col-12">
                            <form method="post">
                                <div class="row">
                                    <div class="col-8">
                                        <select name="categoria" id="categoria" class="form-select" required>
                                            <option selected disabled value="">Seleccionar Categoria</option>
                                            <?php
                                            $consulta = "SELECT id_categoria, nombre FROM categorias WHERE tipo = 'evento'";
                                            $tabla = $db->select($consulta);
                                            foreach ($tabla as $categoria) {
                                                echo "<option value='{$categoria->id_categoria}'>{$categoria->nombre}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary w-100"
                                            value="Buscar">Buscar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 p-4 m-0">
                    <?php

                    if (isset($_POST['categoria'])) {
                        echo "<table class='table table-striped text-center'>
                                <thead class='table-dark'>
                                    <tr>
                                        <th>Nombre</th>
                                        <th class='d-none d-lg-table-cell'>tipo</th>
                                        <th>acciones</th>
                                    <tr>
                                </thead>
                            <tbody class='table-group-divider'>";

                        $categoria = $_POST['categoria'];
                        extract($_POST);
                        $consultas = "SELECT * FROM eventos WHERE id_categoria = $categoria";
                        $eventos = $db->select($consultas);
                        foreach ($eventos as $evento) {
                            echo "<tr>
                                <td>{$evento->nombre}</td>
                                <td>{$evento->tipo}</td> 
                                <td>
                                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modaEditar_$evento->id_evento'>
                                    <i class='fa-solid fa-pen-to-square'></i></button>
                                    <div class='modal fade' id='modaEditar_$evento->id_evento' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                         <div class='modal-header'>
                                            <h1 class='modal-title fs-5' id='modaEditar_$evento->id_evento'>$evento->nombre</h1>
                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                        </div>
                                        <div class='modal-body'>
                                            <form action='../scripts/editarevento.php' method='post'>
                                                <div>
                                                    <label for='titulo' class='form-label'>Editar Titulo</label>
                                                    <input type='text' class='form-control' id='titulo' name='titulo' value=$evento->nombre>
                                                </div>
                                                <div>
                                                    <label for='lugar' class='form-label'>Lugar</label>
                                                    <select name='lugar' id='lugar' class='form-select'>
                                                        <option value=$evento->id_lugar>$evento->nombre</option> ";

                            $consulta = "SELECT id_lugar, nombre FROM ubicacion_lugares";
                            $lugares = $db->select($consulta);
                            foreach ($lugares as $lugar) {
                                echo "<option value='{$lugar->id_lugar}'>{$lugar->nombre}</option>";
                            }
                            echo " </select>
                                                    </div>
                                                <div>
                                                    <label for='descripcion' class='form-label'>Descripcion</label>
                                                    <textarea name='descripcion' id='descripcion' name='descripcion' class='form-control'>$evento->descripcion</textarea>
                                                </div>
                                                <div class='row'>
                                                <div class='col-6'>
                                                    <label for='cap' class='form-label'>Capacidad</label>
                                                    <input type='number' min='1' max='80' class='form-control' id='cap' name='cap' value=$evento->capacidad>
                                                </div>
                                                <div class='col-6'>
                                                    <label for='costo' class='form-label'>Costo por boleto</label>
                                                    <input type='number' min='0' class='form-control' id='costo' name='costo' value=$evento->precio_boleto>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                <div class='col-6'>
                                                <label for='categoria' class='form-label'>Categoría</label>
                                                <select name='categoria' id='categoria' class='form-select'>";
                            $consulta = "SELECT id_categoria, nombre FROM categorias WHERE tipo = 'evento'";
                            $categorias = $db->select($consulta);
                            foreach ($categorias as $categoria) {
                                echo "<option value='{$categoria->id_categoria}'>{$categoria->nombre}</option>";
                            }

                            echo "</select>
                                                </div>
                                                <div class='col-6'>
                                                <label for='tipo' class='form-label'>Tipo</label>
                                                <select name='tipo' id='tipo' class='form-select'>
                                                    <option value=$evento->tipo>$evento->tipo</option>
                                                    <option value='Gratuito'>Gratuito</option>
                                                    <option value='De Pago'>De Pago</option>
                                                </select>
                                                </div>
                                                 </div>         
                                                 <div>
                                                    <label for='imagen' class='form-label'>Imagen</label>
                                                    <input type='file' class='form-control' id='imagen' name='imagen' value=$evento->img_url>
                                               </div> 
                                               <div class='row'>
                                                <div class='col-6'>
                                                    <label for='fecha' class='form-label'>Fecha del Evento</label>
                                                    <input type='date' class='form-control' id='fecha' name='fecha' value=$evento->fecha_evento>
                                                </div>
                                                <div class='col-6'>
                                                    <label for='fechaPub' class='form-label'>Fecha de publicación</label>
                                                    <input type='date' class='form-control' id='fechaPub' name='fechaPub' value=$evento->fecha_publicacion>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                <div class='col-6'>
                                                    <label for='hora' class='form-label'>Hora de Inicio</label>
                                                    <input type='time' min='11:00' max='21:00' class='form-control' id='hora' name='hora' value=$evento->hora_inicio>
                                                </div>
                                                <div class='col-6'>
                                                    <label for='hora' class='form-label'>Hora de Fin</label>
                                                    <input type='time' min='11:00' max='21:00' class='form-control' id='hora' name='hora' value=$evento->hora_fin>
                                                    </div>
                                                </div>
                                                <input type='hidden' name='id' value=$evento->id_evento>
                                                <div class='row'>
                                                <div class='col-12 text-end'>
                                                    <button type='submit' class='btn btn-primary'>Actualizar</button>
                                                </div>
                                                </div> 
                                            </form>
                                        </div>

                              </div>
                         </div>
                    </div>

                 </td>
                        </tr>";
                        }
                    } else {
                        echo "<div class='alert alert-warning' role='alert'>Selecciona una categoria</div>";
                    }
                    echo " 
                    </tbody>
                    </table>";
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/b820f07375.js" crossorigin="anonymous"></script>
    <script src="../script/script.js"></script>
</body>

</html>