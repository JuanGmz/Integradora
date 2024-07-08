<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu admin</title>
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
                                <a href="" class="fw-bold fs-6 ms-5 text-light text-decoration-none">
                                    Ver Recompensas
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 offset-lg-3 p-3">
                <!-- AQUI VA EL CONTENIDO DE LA PAGINAAAAAAAAAAAA -->

                <!-- Título de la página -->
                <div class="container-fluid d-flex justify-content-between align-items-center p-2">
                    <h1 class="fw-bold">Menú</h1>
                    <a class="text-decoration-none text-dark" href="../index.html">
                        <i class="fa-solid fa-house fa-2x ms-auto"></i>
                    </a>
                </div>
                <hr>
                <div class="container-fluid">
                    <div class="col bg-body-tertiary p-3 rounded shadow-lg">
                        <form method="post" action="../scripts/filtrarMenu.php" class="row row-cols-lg-auto g-3 align-items-center">
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
                            <div class="ms-auto text-end">
                                <!--Botón para agregar producto -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarProducto">
                                    Agregar producto
                                </button>
                            </div>
                        </form>
                        <!-- Modal -->
                        <div class="modal fade" id="agregarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Producto</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Aqui va el contenido de el boton de agregar-->
                                        <form method="post" action="../scripts/adminmenu/producto.php">
                                            <div class="col-12 mb-3">
                                                <label for="nombre" class="form-label">Nombre del Producto</label>
                                                <input type="text" maxlength="30" class="form-control" id="nombre" name="nombre" required>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="descripcion" class="form-label">Descripción</label>
                                                <textarea class="form-control" maxlength="150" id="descripcion" name="descripcion" rows="3" required></textarea>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="imagen" class="form-label">Imagen</label>
                                                <input type="file" class="form-control" id="imagen" name="imagen" accept='image/*' required>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="categoria" class="form-label">Categoría</label>
                                                <select name="categoria" id="categoria" class="form-select" required>
                                                    <option value="" selected disabled>Seleccionar Categoría</option>
                                                    <!-- Aqui va el select de categorías -->
                                                    <?php
                                                        include_once("../class/database.php");
                                                        $conexion = new Database();
                                                        $conexion->conectarDB();
                                                        $query = 'SELECT 
                                                                        id_categoria,
                                                                        nombre
                                                                    FROM 
                                                                        categorias
                                                                    WHERE 
                                                                        tipo = "menu"';
                                                        $categorias = $conexion->select($query);
                                                        foreach ($categorias as $categoria) {
                                                            echo "<option value='{$categoria->id_categoria}'>{$categoria->nombre}</option>";
                                                        }
                                                        $conexion->desconectarDB();
                                                    ?>
                                                </select>
                                            </div>
                                            <div id="medidas-container">
                                                <div class="row">
                                                    <div class="col-6 mb-3">
                                                        <label for="precio" class="form-label">Precio</label>
                                                        <input type="number" min="0" class="form-control" id="precio" name="precio" required>
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label for="medida" class="form-label">Medida</label>
                                                        <input type="text" maxlength="15" class="form-control" id="medida" name="medida" required>
                                                    </div>
                                                    <div class="ms-auto mt-3">
                                                        <div class="col-12 text-end">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                            <input type="submit" class="btn btn-primary" value="Agregar Producto">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- TABLA DE PRODUCTO -->
                <div class="container-fluid m-0 p-0 mt-5">
                    <?php
                    $conexion = new database();
                    $conexion->conectarDB();
                    $consulta = "SELECT     
                                        dpm.id_dpm, 
                                        dpm.img_url, 
                                        dpm.nombre, 
                                        dpm.descripcion, 
                                        c.nombre AS categoria_nombre
                                    FROM
                                        detalle_productos_menu AS dpm
                                    JOIN
                                        categorias AS c ON dpm.id_categoria = c.id_categoria
                                    ";
                    $tabla = $conexion->select($consulta);
                    echo "
                            <table class='table table-striped text-center'>
                            <thead class='table-dark'>
                                <tr>
                                    <th>Nombre</th>
                                    <th class='d-none d-lg-table-cell'>Descripción</th>
                                    <th colspan='2'>Acciones</th>
                                </tr>
                            </thead>
                            <tbody class='table-group-divider'>
                        ";
                    foreach ($tabla as $regi) {
                        echo "<tr>
                                <td class='m-0 p-0'>$regi->nombre</td>
                                <td class='m-0 p-0 d-none d-lg-table-cell'>$regi->descripcion</td>
                                <td class='m-0 p-1 d-flex flex-row align-items-center justify-content-center gap-1'>
                                    <!-- Imagen -->
                                    <!-- Botón que activa el modal de ver la imagen  -->
                                    <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalImagen_$regi->id_dpm'>
                                        <i class='fa-solid fa-image'></i>
                                    </button>
                                    <!-- Modal de ver imagen -->
                                    <div class='modal fade' id='modalImagen_$regi->id_dpm' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                                <div class='modal-body mb-3'>
                                                    <!-- Aquí se está mostrando la imagen -->
                                                    <form action='../scripts/adminmenu/editarImagen.php' method='POST'>
                                                        <div class='col-12 mb-3'>
                                                            <label for='imagen' class='form-label'>Imagen Actual</label><br>
                                                            <img src='../img/" . htmlspecialchars($regi->img_url) . "' class='img-fluid' alt='Imagen Actual'><br>
                                                                <small>Selecciona una nueva imagen para actualizar, si es necesario.</small>
                                                            </div>
                                                            <div class='col-12 mb-3'>
                                                                <label for='imagen_nueva' class='form-label'>Selecciona una nueva imagen:</label>
                                                                <input type='file' class='form-control' id='imagen_nueva' name='imagen_nueva' accept='image/*' required>
                                                            </div>
                                                            <input type='hidden' name='id_dpm' value='$regi->id_dpm'>
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
                                    <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#detalleProducto_$regi->id_dpm'>
                                        <i class='fa-solid fa-bars'></i>
                                    </button>
                                    <div class='modal fade' id='detalleProducto_$regi->id_dpm' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h1 class='modal-title fs-5' id='exampleModalLabel'>Detalles del Producto</h1>
                                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                </div>
                                                <!-- Aquí va el contenido del modal -->
                                                <div class='modal-body'>
                                                    <h5 class='text-start fw-bold mb-3'>Nombre: <span class='fw-normal'>$regi->nombre</span></h5>
                                                    <h5 class='text-start fw-bold mb-3'>Descripción: <span class='fw-normal'>$regi->descripcion</span></h5>
                                                    <h5 class='text-start fw-bold mb-3'>Categoría: <span class='fw-normal'>$regi->categoria_nombre</span></h5>
                                                    <!-- Tabla de productos -->
                                                    <table class='table table-light table-striped text-center mt-4' border='1'>
                                                        <thead class='table-dark'>
                                                            <th>Medida</th>
                                                            <th>Precio</th>
                                                            <th>Acciones</th>
                                                        </thead>
                                                        <tbody class='table-group-divider'>";
                                                        // Consulta de productos_menu relacionados con este detalle
                                                        $query2 = 'SELECT medida, precio FROM productos_menu WHERE id_dpm = ' . $regi->id_dpm;
                                                        $medidas = $conexion->select($query2);
                                                        foreach ($medidas as $medida_precio) {
                                                            echo "<tr>
                                                                    <td>$medida_precio->medida</td>
                                                                    <td>$medida_precio->precio</td>
                                                                    <td>
                                                                        <form action='../scripts/adminmenu/eliminarMedida.php' method='POST'>
                                                                            <input type='hidden' name='id_dpm' value='$regi->id_dpm'>
                                                                            <input type='hidden' name='medida' value='$medida_precio->medida'>
                                                                            <input type='hidden' name='precio' value='$medida_precio->precio'>
                                                                            <button type='submit' class='btn btn-danger'><i class='fa-solid fa-trash'></i></button>
                                                                        </form>
                                                                  </tr>";
                                                        }
                                                        echo "
                                                        </tbody>
                                                    </table>
                                                    <div class='row'>
                                                        <div class='col-12'>
                                                            <form class='text-start' action='../scripts/adminmenu/medidaextra.php' method='POST'>
                                                                <div class='row'>
                                                                    <div class='col-6'>
                                                                        <label class='form-label'>Medida extra</label>
                                                                        <input type='text' maxlength='15' name='medidaExtra' class='form-control' required>
                                                                    </div>
                                                                    <div class='col-6'>
                                                                        <label class='form-label'>Precio extra</label>
                                                                        <input type='number' name='precioExtra' class='form-control' required>
                                                                        <input type='hidden' name='id_dpm' value='$regi->id_dpm'>
                                                                    </div>
                                                                    <div class='col-12 text-end mt-3'>
                                                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                                                                        <button type='submit' class='btn btn-primary'>Agregar</button>
                                                                    </div>
                                                                </div>
                                                            </form>  
                                                        </div>
                                                    </div>       
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Botón que activa el modal de editar el producto -->
                                    <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editarProducto_$regi->id_dpm'>
                                        <i class='fa-solid fa-pen-to-square'></i>
                                    </button>
                                    <div class='modal fade text-start p-0 m-0' id='editarProducto_$regi->id_dpm' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true' style='line-height: 1;'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h1 class='modal-title fs-5' id='exampleModalLabel'>Editar Producto</h1>
                                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                </div>
                                                <div class='modal-body'>
                                                    <!-- Aquí va el contenido del modal de editar -->
                                                    <form method='post' action='../scripts/adminMenu/editarProducto.php'>
                                                    <input type='hidden' name='id_dpm' value='$regi->id_dpm'>
                                                        <div class='col-12 mb-3'>
                                                            <label for='nombre' class='form-label'>Nombre del Producto</label>
                                                            <input value='$regi->nombre' type='text' class='form-control' id='nombre' name='nombre' required>
                                                        </div>
                                                        <div class='col-12 mb-3'>
                                                            <label for='descripcion' class='form-label'>Descripción</label>
                                                            <textarea class='form-control text-start' id='descripcion' name='descripcion' required>
                                                                $regi->descripcion
                                                            </textarea>
                                                        </div>
                                                        <div class='col-12 mb-3'>
                                                            <label for='categoria' class='form-label'>Categoría</label>
                                                            <select name='categoria' id='categoria' class='form-select' required>";
                                                                foreach ($categorias as $categoria) {
                                                                    echo "<option value='{$categoria->id_categoria}'>{$categoria->nombre}</option>";
                                                                }
                                                            echo"
                                                            </select>
                                                        </div>
                                                        <div class='row mt-3'>
                                                            <div class='col-12 text-end'>
                                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                                                                <input type='submit' class='btn btn-primary' value='Guardar cambios'>
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
                    $conexion->desconectarDB();
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