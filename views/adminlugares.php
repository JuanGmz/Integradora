<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar lugares</title>
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
                    <div class="row p-3 m-0 shadow-lg">
                        <div class="col-3">
                            <h1 class="text-light fw-bold">lugares</h1>
                        </div>
                        <div class="col-9 d-flex justify-content-end align-items-center gap-3">
                            <!-- Botón que activa el modal de agregar -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#agregarProducto">
                                Agregar nuevo lugar
                            </button>
                            <!-- Modal de agregar -->
                            <div class="modal fade" id="agregarProducto" tabindex="-1"
                                aria-labelledby="agregarProductoLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="agregarProductoLabel">Agregar lugar</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <!-- Aquí va el contenido del modal -->
                                        <div class="modal-body">
                                            <form action="../scripts/insertarlugares.php" method="POST"
                                                enctype="multipart/form-data">
                                                <!-- Aqui va el formulario -->
                                                <div class="mb-3">
                                                    <label for="nombre" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                                        maxlength="45" required>
                                                </div>
                                                <div class="row">
                                                <div class="col-6 mb-3">
                                                    <label for="descripcion" class="form-label">ciudad</label>
                                                    <input type="text" class="form-control" id="ciudad"
                                                        name="ciudad" maxlength="255" required>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label for="medida" class="form-label">Estado</label>
                                                    <input type="text" class="form-control" name="estado">
                                                </div>
                                                </div>
                                                <div class="row">
                                                    <div class="mb-3 col-4">
                                                        <label for="medida" class="form-label">Calle</label>
                                                        <input type="text" class="form-control" id="calle"
                                                            name="calle" maxlength="15" required>
                                                    </div>
                                                    <div class="mb-3 col-4">
                                                        <label for="colonia" class="form-label">Colonia</label>
                                                        <input type="text" min="0" class="form-control" id="precio"
                                                            name="colonia" required>
                                                    </div>
                                                    <div class="mb-3 col-4">
                                                        <label for="codigop" class="form-label">C.P</label>
                                                        <input type="text" class="form-control" id="CodigoP"
                                                            name="CodigoP">
                                                    </div>+
                                                    <div class="mb-3">
                                                        <label for="descripcion" class="form-label">Descripción</label>
                                                        <input type="text" class="form-control" name="descripcion">
                                                    </div>
                                                </div>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Agregar
                                                        evento</button>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Botón para volver atras -->
                            <a href="../index.php" class="text-decoration-none d-none d-lg-block">
                                <i class="fa-solid fa-house fa-2x text-light"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 p-4 m-0">
                    <?php
                    include ("../class/database.php");
                    $db = new Database();
                    $db->conectarDB();
                        $query = "SELECT * FROM ubicacion_lugares";
                        $productos = $db->select($query);
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
                                        <td>
                                                <!-- Botón que activa el modal de ver detalles del producto -->
                                                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#detalleProducto_$producto->id_lugar'>
                                                    <i class='fa-solid fa-bars'></i>
                                                </button>
                                                <div class='modal fade' id='detalleProducto_$producto->id_lugar' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                    <div class='modal-dialog'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h1 class='modal-title fs-5' id='exampleModalLabel'>Detalles del Producto</h1>
                                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                            </div>
                                                            <!-- Aquí va el contenido del modal -->
                                                            <div class='modal-body'>
                                                                <h4 class='text-start fw-bold mb-3'>Nombre: <span class='fw-normal fs-5'>$producto->nombre</span></h4>
                                                                <h4 class='text-start fw-bold mb-3'>Ciudad: <span class='fw-normal fs-5'>$producto->ciudad</span></h4>
                                                                <h4 class='text-start fw-bold mb-3'>Estado: <span class='fw-normal fs-5'>{$producto->estado}</span></h5>
                                                                <h4 class='text-start fw-bold mb-3'>Codigo Postal: <span class='fw-normal fs-5'>{$producto->codigo_postal}</span></h5>
                                                                <h4 class='text-start fw-bold mb-3'>calle: <span class='fw-normal fs-5'>{$producto->calle}</span></h5>
                                                                <h4 class='text-start fw-bold mb-3'>Colonia: <span class='fw-normal fs-5'>{$producto->colonia}</span></h5>
                                                                <h4 class='text-start fw-bold mb-3'>Descripcion: <span class='fw-normal fs-5'>{$producto->descripcion}</span></h5>

                                                                <!-- Tabla de productos -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Botón que activa el modal de editar producto -->
                                                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editarProducto_$producto->id_lugar'>
                                                    <i class='fa-solid fa-pen-to-square'></i>
                                                </button>
                                                <div class='modal fade' id='editarProducto_$producto->id_lugar' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                    <div class='modal-dialog'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h1 class='modal-title fs-5' id='exampleModalLabel'>Editar Producto</h1>
                                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                            </div>
                                                            <!-- Aquí va el contenido del modal -->
                                                            <div class='modal-body'>
                                                                <form class='text-start' action='../scripts/editarlugares.php' method='POST'>
                                                                    <input type='hidden' name='id_lugar' value='$producto->id_lugar'>
                                                                    <div class='row'>
                                                                        <div class='col-12 mb-3'>
                                                                            <label class='form-label'>Nombre</label>
                                                                            <input type='text' name='nombre' class='form-control' value='$producto->nombre'>
                                                                        </div>
                                                                        <div class='row'>
                                                                        <div class='col-6 mb-3'>
                                                                            <label class='form-label'>Ciudad</label>
                                                                            <input type='text' maxlength='15' name='ciudad' class='form-control' value='$producto->ciudad' >
                                                                        </div>
                                                                        <div class='col-6 mb-3'>
                                                                            <label class='form-label'>Estado</label>
                                                                            <input type='text' maxlength='15' name='estado' class='form-control' value='$producto->estado' >
                                                                        </div>
                                                                        </div>
                                                                        <div class='row'>
                                                                        <div class='col-4 mb-3'>
                                                                            <label class='form-label'>Calle</label>
                                                                            <input type='text' maxlength='15' name='calle' class='form-control' value='$producto->calle' >
                                                                        </div>
                                                                        <div class='col-4 mb-3'>
                                                                            <label class='form-label'>Colonia</label>
                                                                            <input type='text' maxlength='15' name='colonia' class='form-control' value='$producto->colonia' >
                                                                        </div>
                                                                        <div class='col-4 mb-3'>
                                                                            <label class='form-label'>C.P</label>
                                                                            <input type='text' maxlength='15' name='codigoP' class='form-control' value='$producto->codigo_postal' >
                                                                        </div>
                                                                        </div>
                                                                        <div class='col-12 mb-3'>
                                                                            <label class='form-label'>Descripción</label>
                                                                            <textarea class='form-control' name='descripcion' maxlength='255' >$producto->descripcion</textarea>
                                                                        </div>
                                                                        <div class='col-12 mt-3 text-end'>
                                                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                                                            <button type='submit' class='btn btn-primary'>Guardar Cambios</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tr>";
                            }
                            echo "</tbody></table>";
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