<?php
    include_once("../class/database.php");
    $db = new Database();
    $db->conectarDB();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Publicaciones</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
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
                            <button class="row accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button"data-bs-toggle="collapse" data-bs-target="#flush-inicio" aria-expanded="false" aria-controls="flush-inicio">
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
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-menu" aria-expanded="false" aria-controls="flush-menu">
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
                                <a href="adminMenu.php" class="ms-5 text-light fw-bold fs-5 text-decoration-none" aria-current="true">
                                    Administrar Menú
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-events" aria-expanded="false" aria-controls="flush-events">
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
                                <a href="adminEventos.php" class="text-light fw-bold fs-5 text-decoration-none ms-5" aria-current="true">
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
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-ecommerce" aria-expanded="false" aria-controls="flush-ecommerce">
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
                                <a href="adminPedidos.php" class="fw-bold fs-5 ms-5 text-light text-decoration-none" aria-current="true">
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
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-blog" aria-expanded="false" aria-controls="flush-blog">
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
                                <a href="adminPublicaciones.php" class="fw-bold fs-5 ms-5 text-light text-decoration-none"
                                    aria-current="true">
                                    Administrar Publicaciones
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-rewards" aria-expanded="false" aria-controls="flush-rewards">
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
                                <a href="adminRecompensas.php" class="fw-bold fs-5 ms-5 text-light text-decoration-none" aria-current="true">
                                    Administrar Recompensas
                                </a><br><br>
                                <a href="adminAsistencias.php" class="fw-bold fs-5 ms-5 text-light text-decoration-none" aria-current="true">
                                    Administrar Asistencias
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <h1 class="fw-bold text-light pt-2 me-auto">Publicaciones</h1>
                    <!-- Botón para volver atras -->
                    <button class="btn btn-dark">
                        <a href="../index.php" class="text-decoration-none">
                            <i class="fa-solid fa-house text-light fa-2x"></i>
                        </a>
                    </button>
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
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-menu" aria-expanded="false" aria-controls="flush-menu">
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
                                <a href="adminMenu.php" class="ms-5 text-light fw-bold fs-6 text-decoration-none" aria-current="true">
                                    Administrar Menú
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-events" aria-expanded="false" aria-controls="flush-events">
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
                                <a href="adminEventos.php" class="text-light fw-bold fs-6 text-decoration-none ms-5" aria-current="true">
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
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-ecommerce" aria-expanded="false" aria-controls="flush-ecommerce">
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
                                <a href="adminPedidos.php" class="fw-bold fs-6 ms-5 text-light text-decoration-none" aria-current="true">
                                    Administrar Pedidos
                                </a><br><br>
                                <a href="adminProductosEcommerce.php" class="fw-bold fs-6 ms-5 text-light text-decoration-none">
                                    Administrar Productos
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-blog" aria-expanded="false" aria-controls="flush-blog">
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
                                <a href="adminPublicaciones.php" class="fw-bold fs-6 ms-5 text-light text-decoration-none">
                                    Administrar Publicaciones
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-rewards" aria-expanded="false" aria-controls="flush-rewards">
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
                                <a href="adminRecompensas.php" class="fw-bold fs-6 ms-5 text-light text-decoration-none" aria-current="true">
                                    Administrar Recompensa
                                </a><br><br>
                                <a href="adminAsistencias.php" class="fw-bold fs-6 ms-5 text-light text-decoration-none" aria-current="true">
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
                            <h1 class="fw-bold text-light d-none d-lg-block">Publicaciones</h1>
                        </div>
                        <div class="col-9 d-flex justify-content-end align-items-center gap-1 gap-lg-3">
                            <!-- Aquí va el botón del modal para registrar publicaciones -->
                            <!-- Botón para agregar -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarPublicacion">
                                Agregar Publicación
                            </button>
                            <!-- Botón para volver atras -->
                            <a href="../index.php" class="text-decoration-none d-none d-lg-block">
                                <i class="fa-solid fa-house fa-2x text-light"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Modal para agregar publicación -->
                <div class="modal fade" id="agregarPublicacion" tabindex="-1" aria-labelledby="agregarPublicacionLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="agregarPublicacionLabel">Agregar Publicación</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="../scripts/adminpublicaciones/agregarPublicacion.php" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="titulo" class="form-label">Título</label>
                                        <input type="text" class="form-control" id="titulo" name="titulo" maxlength="60" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="descripcion" class="form-label">Descripción</label>
                                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" maxlength="255" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="imagen" class="form-label">Imagen</label>
                                        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tipo" class="form-label">Tipo</label>
                                        <select name="tipo" id="tipo" class="form-select" required>
                                            <option selected disabled value="">Seleccionar Tipo</option>
                                            <!-- Aqui va el select de categorías -->
                                            <?php
                                                $queryTipo = "SELECT DISTINCT tipo FROM publicaciones";
                                                $tipos = $db->select($queryTipo);
                                                foreach ($tipos as $tipo) {
                                                    echo "<option value='{$tipo->tipo}'>{$tipo->tipo}</option>";
                                                }
                                            ?>
                                         </select>
                                    </div>
                                    <div class="mt-3 text-end">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <!-- Botón para agregar -->
                                        <button type="submit" class="btn btn-primary">Agregar Publicación</button>
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
                                    <div class="col-8">
                                        <select name="tipo" id="tipo" class="form-select">
                                            <option selected disabled value="">Seleccionar Tipo</option>
                                            <!-- Aqui va el select de categorías -->
                                            <?php
                                                foreach ($tipos as $tipo) {
                                                    $selected = (isset($_POST['tipo']) && $_POST['tipo'] == $tipo->tipo) ? 'selected' : '';
                                                    echo "<option value='{$tipo->tipo}' {$selected}>{$tipo->tipo}</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <input type="submit" class="btn btn-primary w-100" value="Buscar">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row mt-lg-3 p-3 p-lg-4 m-0">
                    <div class="d-lg-none w-100 mb-3 m-0 p-0">
                        <button type="button" class="btn w-100 btn-primary shadow-lg" data-bs-toggle="modal" data-bs-target="#agregarPublicacion">
                            <i class="fa-solid fa-plus fa-2x"></i>
                        </button>
                    </div>
                    <!-- Tabla de publicaciones AQUI -->
                    <?php
                        if (isset($_POST['tipo'])) {
                            $query = "SELECT * FROM publicaciones WHERE tipo = '{$_POST['tipo']}'";
                            $publicaciones = $db->select($query);
                            if (empty($publicaciones)) {
                                echo "<div class='alert alert-danger' role='alert'>No hay publicaciones registradas en este tipo de publicación.</div>";
                            } else {
                                echo "<table class='table table-striped table-hover table-dark text-center border-3 border-start border-bottom border-end border-black'>
                                        <thead>
                                            <tr>
                                                <th scope='col'>Título</th>
                                                <th scope='col'>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody class='table-light table-group-divider'>";
                                foreach ($publicaciones as $publicacion) {
                                    echo "<tr>
                                            <td>{$publicacion->titulo}</td>
                                            <td class='d-flex justify-content-center gap-2'>
                                                <!-- Botón para ver y editar imágen -->
                                                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#imgPublicacion{$publicacion->id_publicacion}'>
                                                    <i class='fa-solid fa-image'></i>
                                                </button>
                                                <!-- Modal para ver y editar imágen -->
                                                <div class='modal fade' id='imgPublicacion{$publicacion->id_publicacion}' tabindex='-1' aria-labelledby='imgPublicacion{$publicacion->id_publicacion}Label' aria-hidden='true'>
                                                    <div class='modal-dialog modal-dialog-centered'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h5 class='modal-title' id='imgPublicacion{$publicacion->id_publicacion}Label'>{$publicacion->titulo}</h5>
                                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                            </div>
                                                            <div class='modal-body mb-3'>
                                                                <!-- Aquí se está mostrando la imagen -->
                                                                <form action='../scripts/adminpublicaciones/editarImagen.php' method='POST' enctype='multipart/form-data'>
                                                                    <div class='col-12 mb-3'>
                                                                        <label for='imagen' class='form-label'>Imagen Actual</label><br>
                                                                        <img src='../img/publicaciones/$publicacion->img_url' class='img-fluid rounded' alt='imagen$publicacion->titulo'><br>
                                                                            <small>Selecciona una nueva imagen para actualizar, si es necesario.</small>
                                                                        </div>
                                                                        <div class='col-12 mb-3'>
                                                                            <label for='imagen_nueva' class='form-label'>Selecciona una nueva imagen</label>
                                                                            <input type='file' class='form-control' id='imagen_nueva' name='imagen_nueva' accept='image/*' required>
                                                                        </div>
                                                                        <input type='hidden' name='id_publicacion' value='$publicacion->id_publicacion'>
                                                                        <div class='col-12 mt-3 text-end'>
                                                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                                                            <button type='submit' class='btn btn-primary'>Actualizar</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Botón de ver detalles -->
                                                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#detallePublicacion{$publicacion->id_publicacion}'>
                                                    <i class='fa-solid fa-bars'></i>
                                                </button>
                                                <!-- Modal para ver detalles -->
                                                <div class='modal fade' id='detallePublicacion{$publicacion->id_publicacion}' tabindex='-1' aria-labelledby='detallePublicacion{$publicacion->id_publicacion}Label' aria-hidden='true'>
                                                    <div class='modal-dialog modal-dialog-centered'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h5 class='modal-title' id='detallePublicacion{$publicacion->id_publicacion}Label'>{$publicacion->titulo}</h5>
                                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                            </div>
                                                            <div class='modal-body text-start'>
                                                                <h5 class='fs-4 fw-bold mb-2'>Título: <span class='fw-normal fs-5'>{$publicacion->titulo}</span></h3>
                                                                <h5 class='fs-4 fw-bold mb-2'>Descripción: <span class='fw-normal fs-5'>{$publicacion->descripcion}</span></h3>
                                                                <h5 class='fs-4 fw-bold mb-2'>Tipo: <span class='fw-normal fs-5'>{$publicacion->tipo}</span></h3>
                                                                <h5 class='fs-4 fw-bold mb-2'>Fecha de creación: <span class='fw-normal fs-5'>{$publicacion->fecha}</span></h3>
                                                                <div class='text-end mt-4'>
                                                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Botón de editar -->
                                                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editarPublicacion{$publicacion->id_publicacion}'>
                                                    <i class='fa-solid fa-pen-to-square'></i>
                                                </button>
                                                <!-- Modal para editar -->
                                                <div class='modal fade' id='editarPublicacion{$publicacion->id_publicacion}' tabindex='-1' aria-labelledby='editarPublicacion{$publicacion->id_publicacion}Label' aria-hidden='true'>
                                                    <div class='modal-dialog modal-dialog-centered'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h5 class='modal-title' id='editarPublicacion{$publicacion->id_publicacion}Label'>{$publicacion->titulo}</h5>
                                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                            </div>
                                                            <div class='modal-body text-start'>
                                                                <form action='../scripts/adminpublicaciones/editarPublicacion.php' method='POST'>
                                                                    <div class='col-12 mb-3'>
                                                                        <label for='titulo' class='form-label'>Título</label>
                                                                        <input type='text' class='form-control' id='titulo' name='titulo' value='$publicacion->titulo' required>
                                                                    </div>
                                                                    <div class='col-12 mb-3 text-start'>
                                                                        <label for='descripcion' class='form-label'>Descripción</label>
                                                                        <textarea class='form-control' id='descripcion' name='descripcion' rows='3' maxlength='255' required>$publicacion->descripcion
                                                                        </textarea>
                                                                    </div>
                                                                    <div class='col-12 mb-3 text-start'>
                                                                        <label for='tipo' class='form-label'>Tipo</label>
                                                                        <select class='form-select' id='tipo' name='tipo' required>
                                                                            <option selected disabled value=''>Seleccionar Tipo</option>'
                                                                            <!-- Aqui va el select de categorías -->";
                                                                                foreach ($tipos as $tipo) {
                                                                                    $selected = (isset($_POST['tipo']) && $_POST['tipo'] == $tipo->tipo) ? 'selected' : '';
                                                                                    echo "<option value='{$tipo->tipo}' {$selected}>{$tipo->tipo}</option>";
                                                                                }
                                                                                    echo "
                                                                        </select>
                                                                    </div>
                                                                    <input type='hidden' name='id_publicacion' value='$publicacion->id_publicacion'>
                                                                    <div class='col-12 mt-3 text-end'>
                                                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                                                        <button type='submit' class='btn btn-primary'>Guardar Cambios</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>";
                                }
                                echo "</tbody>
                                    </table>";
                            }
                        } else {
                            echo"<div class='alert alert-danger' role='alert'>
                                Seleccione un tipo de publicación
                            </div>";
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