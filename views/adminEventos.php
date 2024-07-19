<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Eventos</title>
    <link rel="shortcut icon" href="../img/Sinfonía-Café-y-Cultura.webp">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tipoSelect = document.getElementById('tipo');
            const costoInput = document.getElementById('costo');

            function toggleCostoInput() {
                if (tipoSelect.value === 'Gratuito') {
                    costoInput.value = '';
                    costoInput.disabled = true;
                } else {
                    costoInput.disabled = false;
                }
            }

            tipoSelect.addEventListener('change', toggleCostoInput);
            toggleCostoInput();
        });
    </script>
</head>

<body class="bg-light">
    <div class="container-fluid m-0 h-100">
        <!-- navbar mobile -->
        <div class="row bg-dark d-block d-lg-none">
            <div class="collapse m-0 p-0" id="navbarToggleExternalContent" data-bs-theme="dark">
                <div class="bg-dark p-4 pb-1">
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
                    <h1 class="fw-bold text-light pt-2 me-auto">Eventos</h1>
                    <!-- Botón para volver atras -->
                    <button class="btn btn-dark">
                        <a href="../index.php" class="text-decoration-none">
                            <i class="fa-solid fa-house text-light fa-2x"></i>
                        </a>
                </div>
            </nav>
        </div>

        <div class="row">
            <!-- navbar pc -->
            <div class="col-lg-3 bg-dark h-100 position-fixed d-none d-lg-block">
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
                                <a href="adminPublicaciones.php"
                                    class="fw-bold fs-6 ms-5 text-light text-decoration-none" aria-current="true">
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
                                <a href="adminAsistencias.php" class="fw-bold fs-6 ms-5 text-light text-decoration-none"
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
                <div class="row p-0 m-0 bg-dark">
                    <div class="row p-3 m-0 shadow-lg bg-dark d-none d-lg-flex">
                        <div class="col-3">
                            <h1 class="fw-bold text-light d-none d-lg-block">Eventos</h1>
                        </div>
                        <div class="col-9 d-flex justify-content-end align-items-center gap-3">
                            <!-- Botón que activa el modal de agregar -->
                            <div class="ms-auto text-end col">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#agregarEvento">
                                    Agregar Evento
                                </button>
                            </div>
                            <!-- Botón para volver atras -->
                            <a href="../index.php" class="text-decoration-none d-none d-lg-block">
                                <i class="fa-solid fa-house fa-2x text-light"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="agregarEvento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 w-3" id="exampleModalLabel">Agregar Evento</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Aqui va el contenido de el boton de agregar-->
                                <form action="../scripts/insertarevento.php" method="post" enctype="multipart/form-data">
                                    <div class="col-12 mb-3">
                                        <label for="titulo" class="form-label">Titulo del Evento</label>
                                        <input type="text" maxlength="50"  class="form-control" id="titulo" name="evento" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="descripcion" class="form-label">Descripción</label>
                                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="cap" class="form-label">Capacidad</label>
                                        <input type="number" min="1" max="80" class="form-control" id="cap" name="cap" required>
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
                                        <input type="date" class="form-control" id="fecha" name="fechaEvento" required>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="horaIni" class="form-label">Hora de Inicio</label>
                                            <input type="time" min="11:00" max="21:00" class="form-control" id="horaIni" name="horaIni" required>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="horaFin" class="form-label">Hora de Fin</label>
                                            <input type="time" min="11:00" max="21:00" class="form-control" id="horaFin" name="horaFin" required>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <h4 class="fw-bold">Ubicación</h4>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="lugar" class="form-label">Nombre del Lugar</label>
                                        <select name="lugar" id="lugar" class="form-select" required>
                                        <option selected disabled value="">Seleccionar Categoria</option>
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
                                            <input type="number" min="1" class="form-control" id="costo" name="costo" required>
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
                                        <label for="cantidadBoletos" class="form-label">Cantidad de boletos</label>
                                        <input type="number" min="1" max="100" class="form-control" id="cantidadBoletos" name="cantidadBoletos" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="fechaPub" class="form-label">Fecha de publicación</label>
                                        <input type="date" class="form-control" id="fechaPub" name="fechaPub" required>
                                    </div>
                                    <div class="text-end mb-3">
                                        <button class="btn btn-primary" type="submit" id="btn-agregar">
                                            Agregar Evento
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shadow-lg bg-light row p-0 m-0 p-3">
                    <div class="row m-1">
                        <div class="col-12">
                            <form method="post">
                                <div class="row">
                                <?php
                                $selectedCategoria = isset($_POST['categoria']) ? $_POST['categoria'] : '';
                                ?>

                                <div class="col-8">
                                <select name="categoria" id="categoria" class="form-select" required>
                                 <option selected disabled value="">Seleccionar Categoria</option>
                                <?php
                                 $consulta = "SELECT id_categoria, nombre FROM categorias WHERE tipo = 'evento'";
                                $tabla = $db->select($consulta);
                                foreach ($tabla as $categoria) {
                                $selected = $categoria->id_categoria == $selectedCategoria ? 'selected' : '';
                                 echo "<option value='{$categoria->id_categoria}' {$selected}>{$categoria->nombre}</option>";
                                 }
                                 ?>
                                </select>
                                </div>

                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary w-100" value="Buscar">Buscar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row mt-lg-3 p-3 p-lg-4 m-0">
                    <div class="d-lg-none w-100 mb-3 m-0 p-0">
                        <button type="button" class="btn w-100 btn-primary shadow-lg" data-bs-toggle="modal" data-bs-target="#agregarEvento">
                            <i class="fa-solid fa-plus fa-2x"></i>
                        </button>
                    </div>
                    <?php
                    if (isset($_POST["categoria"])) {
                        extract($_POST);

                        $query = "SELECT e.*, l.nombre AS lugar_nombre, c.nombre AS categoria
                        FROM eventos e
                        JOIN ubicacion_lugares l ON e.id_lugar = l.id_lugar
                        JOIN categorias c ON e.id_categoria = c.id_categoria
                        WHERE e.id_categoria = '$categoria'";
              
                        $productos = $db->select($query);

                        if (empty($productos)) {
                            echo "<div role='alert'>No hay productos registrados en esta categoría.</div>";
                        } else {
                            echo "
                                    <table class='table table-striped table-hover table-dark text-center border-3 border-black border-bottom border-start border-end'>
                                        <thead>
                                            <tr>
                                            <th scope='col'>Nombre</th>
                                            <th scope='col'>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class='table-group-divider table-light'>";
                            foreach ($productos as $producto) {
                                echo "
                                        <tr>
                                        <td>$producto->nombre</td>
                                            <td class='d-flex flex-row align-items-center justify-content-center gap-1'>
                                                <!-- Imagen -->
                                                <!-- Botón que activa el modal de ver la imagen  -->
                                                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalImagen_$producto->id_evento'>
                                                    <i class='fa-solid fa-image'></i>
                                                </button>
                                                <!-- Modal de ver imagen -->
                                                <div class='modal fade' id='modalImagen_$producto->id_evento' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                    <div class='modal-dialog'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h1 class='modal-title fs-5' id='exampleModalLabel'>$producto->nombre</h1>
                                                            </div>
                                                            <div class='modal-body mb-3'>
                                                                <!-- Aquí se está mostrando la imagen -->
                                                                <form action='../scripts/admineventos/editarimagen.php' method='POST' enctype='multipart/form-data'>
                                                                    <div class='col-12 mb-3'>
                                                                        <label for='imagen' class='form-label'>Imagen Actual</label><br>
                                                                        <img src='../img/eventos/$producto->img_url' class='img-fluid' alt='imagen$producto->nombre'><br>
                                                                            <small>Selecciona una nueva imagen para actualizar, si es necesario.</small>
                                                                        </div>
                                                                        <div class='col-12 mb-3'>
                                                                            <label for='imagen_nueva' class='form-label'>Selecciona una nueva imagen</label>
                                                                            <input type='file' class='form-control' id='imagen_nueva' name='imagen_nueva' accept='image/*' required>
                                                                        </div>
                                                                        <input type='hidden' name='id_evento' value='$producto->id_evento'>
                                                                        <div class='col-12 mb-3 text-end'>
                                                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                                                            <button type='submit' class='btn btn-primary'>Actualizar</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Botón que activa el modal de ver detalles del producto -->
                                                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#detalleProducto_$producto->id_evento'>
                                                    <i class='fa-solid fa-bars'></i>
                                                </button>
                                                <div class='modal fade' id='detalleProducto_$producto->id_evento' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                    <div class='modal-dialog'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h1 class='modal-title fs-5' id='exampleModalLabel'>Detalles del evento</h1>
                                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                            </div>
                                                            <!-- Aquí va el contenido del modal -->
                                                            <div class='modal-body'>
                                                                <h4 class='text-start fw-bold mb-3'>Nombre: <span class='fw-normal fs-5'>$producto->nombre</span></h4>
                                                                <h4 class='text-start fw-bold mb-3'>Descripción: <span class='fw-normal fs-5'>$producto->descripcion</span></h4>
                                                                <h4 class='text-start fw-bold mb-3'>Fecha evento: <span class='fw-normal fs-5'>{$producto->fecha_evento}</span></h5>
                                                                <h4 class='text-start fw-bold mb-3'>Hora inicio: <span class='fw-normal fs-5'>{$producto->hora_inicio}</span></h5>
                                                                <h4 class='text-start fw-bold mb-3'>Hora final: <span class='fw-normal fs-5'>{$producto->hora_fin}</span></h5>
                                                                <h4 class='text-start fw-bold mb-3'>Tipo: <span class='fw-normal fs-5'>{$producto->tipo}</span></h5>
                                                                <h4 class='text-start fw-bold mb-3'>Costo boleto: <span class='fw-normal fs-5'>{$producto->precio_boleto}</span></h5>
                                                                <h4 class='text-start fw-bold mb-3'>Lugar: <span class='fw-normal fs-5'>{$producto->lugar_nombre}</span></h5>
                                                                <h4 class='text-start fw-bold mb-3'>Categoria: <span class='fw-normal fs-5'>{$producto->categoria}</span></h5>

                                                                <!-- Tabla de productos -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Botón que activa el modal de editar producto -->
                                                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editarProducto_$producto->id_evento'>
                                                    <i class='fa-solid fa-pen-to-square'></i>
                                                </button>
                                                <div class='modal fade' id='editarProducto_$producto->id_evento' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                    <div class='modal-dialog'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h1 class='modal-title fs-5' id='exampleModalLabel'>Editar Evento</h1>
                                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                            </div>
                                                            <!-- Aquí va el contenido del modal -->
                                                            <div class='modal-body text-start'>
                                                                <form action='../scripts/editareventos.php' method='post'>
                                            <input type='hidden' name='id_evento' value='$producto->id_evento'>
                                                <div>
                                                    <label for='titulo' class='form-label'>Editar Titulo</label>
                                                    <input type='text' maxlength='50'  class='form-control' id='titulo' name='titulo' value=$producto->nombre>
                                                </div>
                                                <div>
                                                    <label for='lugar' class='form-label'>Lugar</label>
                                                    <select name='lugar' id='lugar' class='form-select'> ";
                                $consulta = "SELECT id_lugar, nombre FROM ubicacion_lugares";
                                $lugares = $db->select($consulta);
                                foreach ($lugares as $lugar) {
                                    echo "<option value='{$lugar->id_lugar}'>{$lugar->nombre}</option>";
                                }
                                echo " </select>
                                                    </div>
                                                <div>
                                                    <label for='descripcion' class='form-label'>Descripcion</label>
                                                    <textarea name='descripcion' id='descripcion' name='descripcion' class='form-control'>$producto->descripcion</textarea>
                                                </div>
                                                <div class='row'>
                                                <div class='col-6'>
                                                    <label for='cap' class='form-label'>Capacidad</label>
                                                    <input type='number' min='1' max='80' class='form-control' id='cap' name='cap' value=$producto->capacidad>
                                                </div>
                                                <div class='col-6'>
                                                    <label for='costo' class='form-label'>Costo por boleto</label>
                                                    <input type='number' min='1' class='form-control' id='costo' name='costo' value=$producto->precio_boleto>
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
                                                    <option value=$producto->tipo>$producto->tipo</option>
                                                    <option value='Gratuito'>Gratuito</option>
                                                    <option value='De Pago'>De Pago</option>
                                                </select>
                                                </div>
                                                 </div>         
                                                 <div>
                                                    <label for='imagen' class='form-label'>Imagen</label>
                                                    <input type='file' class='form-control' id='imagen' name='imagen' value=$producto->img_url>
                                               </div> 
                                               <div class='row'>
                                                <div class='col-6'>
                                                    <label for='fecha' class='form-label '>Fecha del Evento</label>
                                                    <input type='date' class='form-control' id='fecha' name='fecha' value=$producto->fecha_evento>
                                                </div>
                                                <div class='col-6'>
                                                    <label for='fechaPub' class='form-label'>Fecha de publicación</label>
                                                    <input type='date' class='form-control' id='fechaPub' name='fechaPub' value=$producto->fecha_publicacion>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                <div class='col-6'>
                                                    <label for='hora' class='form-label'>Hora de Inicio</label>
                                                    <input type='time' min='11:00' max='21:00' class='form-control' id='horainicio' name='horainicio' value=$producto->hora_inicio>
                                                </div>
                                                <div class='col-6'>
                                                    <label for='hora' class='form-label'>Hora de Fin</label>
                                                    <input type='time' min='11:00' max='21:00' class='form-control' id='horafin' name='horafin' value=$producto->hora_fin>
                                                    </div>
                                                </div>

                                                <div class='row'>
                                                <div class='col-12 text-end'>
                                                    <button type='submit' class='btn btn-primary mt-3'>Actualizar</button>
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
                            echo "</tbody></table>";
                        }
                    } else {
                        echo "<div role='alert'>Seleccione una categoria</div>";
                    }
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