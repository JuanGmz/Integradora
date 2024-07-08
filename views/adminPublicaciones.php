<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/scrollbar.css">
    <title>Document</title>
</head>

<body>
    <div class="row m-0 p-0 d-block d-lg-none border-black border-bottom border-3 bg-dark">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold text-light" href="adminInicio.html">Administrar</a>
                <button class="navbar-toggler border-0 text-light bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon rounded p-2"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="p-2">
                        <div class="accordion accordion-flush" id="accordionMobile">
                            <div class="accordion-item">
                                <h2 class="accordion-header row">
                                    <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-inicio" aria-expanded="false" aria-controls="flush-inicio">
                                        <div class="col-8">

                                            <a href="adminInicio.html" class="text-light fw-bold text-decoration-none">
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
                                        <a href="adminMenu.html" class="ms-5 text-light fw-bold fs-5 text-decoration-none" aria-current="true">
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
                                        <a href="adminEventos.html" class="text-light fw-bold fs-5 text-decoration-none ms-5" aria-current="true">
                                            Administrar Eventos
                                        </a><br><br>
                                        <a href="adminReservas.html" class="text-light fw-bold fs-5 text-decoration-none ms-5">
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
                                        <a href="adminPedidos.html" class="fw-bold fs-5 ms-5 text-light text-decoration-none" aria-current="true">
                                            Administrar Pedidos
                                        </a><br><br>
                                        <a href="adminProductosEcommerce.html" class="fw-bold fs-4 ms-5 text-light text-decoration-none">
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
                                    <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-blog" aria-expanded="false" aria-controls="flush-blog">
                                        <div class="col-8">
                                            <i class="fa-solid fa-blog me-3"></i>
                                            Blog
                                        </div>
                                        <div class="col-4 text-end">
                                            <i class="fa-solid fa-chevron-down"></i>
                                        </div>
                                    </button>
                                </h2>
                                <div id="flush-blog" class="accordion-collapse collapse" data-bs-parent="#accordionMobile">
                                    <div class="accordion-body bg-dark">
                                        <a href="adminBlog.html" class="fw-bold fs-5 ms-5 text-light text-decoration-none" aria-current="true">
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
                                        <a href="adminRecompensas.html" class="fw-bold fs-5 ms-5 text-light text-decoration-none" aria-current="true">
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
                                    <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-categories" aria-expanded="false" aria-controls="flush-categories">
                                        <div class="col-8">
                                            <i class="fa-solid fa-list me-3"></i>
                                            Categorías
                                        </div>
                                        <div class="col-4 text-end">
                                            <i class="fa-solid fa-chevron-down"></i>
                                        </div>
                                    </button>
                                </h2>
                                <div id="flush-categories" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body bg-dark">
                                        <a href="adminCategorias.html" class="fw-bold fs-5 ms-5 text-light text-decoration-none" aria-current="true">
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

    <div class="row m-0 p-0">
        <!-- navbar pc -->
        <div class="contenedor col-lg-3 m-0 p-0 border-end border-black bg-dark h-100 position-fixed d-none d-lg-block">
            <h4 class="text-center text-light m-3 fs-2 fw-bold">Administrar</h4>
            <div class="row">
                <div class="col-12 text-center m-0">
                    <i class="fa-solid fa-user fa-10x text-light"></i>
                </div>
            </div>
            <div class="accordion accordion-flush" id="accordionPc">
                <div class=" ms-2 fs-3 mt-4 mb-3">
                    <a class="fw-bold bg-dark text-light text-decoration-none" href="adminInicio.html" aria-expanded="false">
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
                            <a href="adminMenu.html" class="ms-5 text-light fw-bold fs-6 text-decoration-none" aria-current="true">
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
                            <a href="adminEventos.html" class="text-light fw-bold fs-6 text-decoration-none ms-5" aria-current="true">
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
                            <a href="adminPedidos.html" class="fw-bold fs-6 ms-5 text-light text-decoration-none" aria-current="true">
                                Administrar Pedidos
                            </a><br><br>
                            <a href="adminProductosEcommerce.html" class="fw-bold fs-6 ms-5 text-light text-decoration-none">
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
                        <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-blog" aria-expanded="false" aria-controls="flush-blog">
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
                            <a href="adminBlog.html" class="fw-bold fs-6 ms-5 text-light text-decoration-none" aria-current="true">
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
                            <a href="adminRecompensas.html" class="fw-bold fs-6 ms-5 text-light text-decoration-none" aria-current="true">
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
                        <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-categories" aria-expanded="false" aria-controls="flush-categories">
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
                            <a href="adminCategorias.html" class="fw-bold fs-6 ms-5 text-light text-decoration-none" aria-current="true">
                                Administrar Categorías
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- aca va todo el contenido -->
        <div class="col-lg-9 offset-lg-3 p-3">
            <!-- Título de la página -->
            <div class="container-fluid d-flex justify-content-between align-items-center p-2">
                <h1 class="fw-bold">Publicaciones</h1>
                <a class="text-decoration-none text-dark" href="../index.html">
                    <i class="fa-solid fa-house fa-2x ms-auto"></i>
                </a>
            </div>
            <hr>
            <div class="container-fluid">
                <div class="col bg-body-tertiary p-3 rounded shadow-lg">
                    <form class="row row-cols-lg-auto g-3 align-items-center">
                        <div class="col">
                            <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                            <select class="form-select" id="inlineFormSelectPref">
                                <option value="1">Flitrar por</option>
                                <option value="2">ID</option>
                                <option value="3">Nombre</option>
                                <option value="3">Asunto </option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="visually-hidden" for="inlineFormInputGroupUsername">Buscar</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="fa fa-search"></i></div>
                                <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Buscar">
                            </div>
                        </div>
                        <!-- Botón agregar publicación -->
                        <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#agregarPublicacion">
                            Agregar Publicación
                        </button>
                    </form>
                    <!-- Modal -->
                    <div class="modal fade" id="agregarPublicacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title fw-bold" id="exampleModalLabel">Agregar Publicación</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="../scripts/adminpublicaciones/agregarPublicacion.php" method="post">
                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <label for="titulo" class="form-label">Título de la Publicación</label>
                                                <input type="text" class="form-control" id="titulo" name="titulo" maxlength="50" required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <label for="descripcion" class="form-label">Descripción de la Publicación</label>
                                                <textarea name="descripcion" id="descripcion" name="descripcion" class="form-control" maxlength="750" required></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <label for="imagen" class="form-label">Imagen</label>
                                                <input type="file" class="form-control" id="imagen" name="imagen" accept='image/*' required>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <label for="tipo" class="form-label">Tipo de Publicación</label>
                                                <select name="tipo" id="tipo" class="form-select" required>
                                                    <option selected disabled value="">Seleccionar Tipo de Publicación</option>
                                                    <?php
                                                        include_once '../class/database.php';
                                                        $conexion = new Database();
                                                        $conexion->conectarDB();

                                                        $query = 'SELECT DISTINCT tipo FROM publicaciones';
                                                        $t_publicaciones = $conexion->select($query);
                                                        foreach($t_publicaciones as $t_publicacion){
                                                            echo "<option value='{$t_publicacion->tipo}'>{$t_publicacion->tipo}</option>";
                                                        }


                                                        $conexion->desconectarDB();
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 text-end">
                                            <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Cancelar</button>
                                            <input type="submit" class="btn btn-primary mt-3" value="Agregar Publicación">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container-fluid m-0 p-0">
                <div class="row m-0 p-0">
                    <table class="table table-striped text-center" border="1">
                        <thead class="table-dark">
                            <tr>
                                <th>Título</th>
                                <th class="d-none d-lg-table-cell">Tipo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                        <?php
                            include_once '../class/database.php';
                            $conexion = new Database();
                            $conexion->conectarDB();
                            $query = 'SELECT id_publicacion, titulo, descripcion, img_url, tipo, fecha FROM publicaciones ORDER BY titulo ASC';
                            $publicaciones = $conexion->select($query);
                            foreach ($publicaciones as $publicacion) {
                                echo "
                                    <tr>
                                        <td class='m-0 p-0'>{$publicacion->titulo}</td>
                                        <td class='d-none d-lg-table-cell'>{$publicacion->tipo}</td>
                                        <td class='m-0 d-flex flex-row justify-content-center gap-1'>
                                            <!-- Botón para ver imagen de la publicación -->
                                            <button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#imagen_{$publicacion->id_publicacion}'>
                                                <i class='fa-solid fa-image'></i>
                                            </button>
                                            <!-- Modal de ver imagen de la publicación -->
                                            <div class='modal fade' id='imagen_{$publicacion->id_publicacion}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h1 class='modal-title fs-5' id='exampleModalLabel'>{$publicacion->titulo}</h1>
                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <form action='../scripts/adminpublicaciones/editarImagen.php' method='post'>
                                                                <div class='col-12 mb-3'>
                                                                    <label for='imagen' class='form-label'>Imagen Actual</label><br>
                                                                    <img src='../img/" .$publicacion->img_url. "' class='img-fluid rounded' alt='Imagen Actual'><br>
                                                                    <small>Selecciona una nueva imagen para actualizar, si es necesario.</small>
                                                                </div>
                                                                <div class='col-12 mb-3'>
                                                                    <label for='imagen_nueva' class='form-label'>Selecciona una nueva imagen:</label>
                                                                    <input type='file' class='form-control' id='imagen_nueva' name='imagen_nueva' accept='image/*' required>
                                                                </div>
                                                                <input type='hidden' name='id_publicacion' value='$publicacion->id_publicacion'>
                                                                <div class='col-12 mb-3 text-end'>
                                                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                                                    <button type='submit' class='btn btn-primary'>Actualizar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Botón para ver detalles de la publicación -->
                                            <button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#publicacion{$publicacion->id_publicacion}'>
                                                <i class='fa-solid fa-bars'></i>
                                            </button>
                                            <!-- Modal de ver detalles de la publicación -->
                                            <div class='modal fade' id='publicacion{$publicacion->id_publicacion}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h3 class='modal-title fw-bold' id='exampleModalLabel'>Detalles de la Publicación</h3>
                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                        </div>
                                                        <div class='modal-body text-start'>
                                                            <h4 class='fw-bold'>Titulo de la Publicación: <span class='fw-normal fs-5'>{$publicacion->titulo}</span></h4>
                                                            <h4 class='fw-bold'>Descripción: <span class='fw-normal fs-5'>{$publicacion->descripcion}</span></h4>
                                                            <h4 class='fw-bold'>Tipo: <span class='fw-normal fs-5'>{$publicacion->tipo}</span></h4>
                                                            <h4 class='fw-bold'>Fecha: <span class='fw-normal fs-5'>{$publicacion->fecha}</span></h4>
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Botón para editar la publicación -->
                                            <button class='btn btn-primary' data-bs-toggle='modal' 
                                                    data-bs-target='#editarPublicacion{$publicacion->id_publicacion}'
                                            >
                                                <i class='fa fa-pen-to-square'></i>
                                            </button>
                                            <!-- Modal para editar la publicación -->
                                            <div class='modal fade' id='editarPublicacion{$publicacion->id_publicacion}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h3 class='modal-title fw-bold' id='exampleModalLabel'>Editar Publicación</h3>
                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                        </div>
                                                        <div class='modal-body text-start'>
                                                            <form action='../scripts/adminpublicaciones/editarPublicacion.php' method='post'>
                                                                <div class='col-12 mb-3'>
                                                                    <label for='titulo' class='form-label'>Título de la Publicación</label>
                                                                    <input class='form-control' id='titulo' name='titulo' maxlength='50' required value='$publicacion->titulo'>
                                                                </div>  
                                                                <div class='col-12 mb-3'>
                                                                    <label for='descripcion' class='form-label'>Descripción de la Publicación</label>
                                                                    <textarea class='form-control' id='descripcion' name='descripcion' maxlength='750' required>$publicacion->descripcion</textarea>
                                                                </div>
                                                                <div class='col-12 mb-3'>
                                                                    <label for='tipo' class='form-label'>Tipo de Publicación</label>
                                                                    <select name='tipo' id='tipo' class='form-select' required>
                                                                        <option selected disabled value=''>Seleccionar Tipo de Publicación</option>"; ?>
                                                                        <?php
                                                                            $conexion = new Database();
                                                                            $conexion->conectarDB();
                        
                                                                            $query = 'SELECT DISTINCT tipo FROM publicaciones';
                                                                            $t_publicaciones = $conexion->select($query);
                                                                            foreach($t_publicaciones as $t_publicacion){
                                                                                echo "<option value='{$t_publicacion->tipo}'>{$t_publicacion->tipo}</option>";
                                                                            }
                        
                                                                            $conexion->desconectarDB();
                                                                        echo "
                                                                <input type='hidden' name='id_publicacion' value='$publicacion->id_publicacion'>
                                                                <div class='col-12 mt-3 text-end'>
                                                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                                                    <button type='submit' class='btn btn-primary'>Actualizar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                ";
                            }
                            $conexion->desconectarDB();
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/b820f07375.js" crossorigin="anonymous"></script>
</body>

</html>