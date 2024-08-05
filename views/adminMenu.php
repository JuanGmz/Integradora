<?php
session_start();
require_once '../class/database.php';
include_once ("../scripts/funciones/funciones.php");
$db = new database();
$db->conectarDB();

if (isset($_SESSION["usuario"])) {
    $rolUsuario = "SELECT r.rol FROM roles r JOIN roles_usuarios ru ON r.id_rol = ru.id_rol JOIN personas p ON ru.id_usuario = p.id_usuario WHERE p.usuario = '$_SESSION[usuario]'";
    $rol = $db->select($rolUsuario);

    if ($rol[0]->rol !== 'administrador') {
        header('Location: ../index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Menú</title>
    <link rel="shortcut icon" href="../img/Sinfonía-Café-y-Cultura.webp">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg-light">
    <div class="container-fluid m-0 h-100">
        <!-- navbar mobile -->
        <div class="row bagr-cafe4 d-block d-lg-none">
            <div class="collapse m-0 p-0" id="navbarToggleExternalContent" data-bs-theme="dark">
                <div class="bagr-cafe4 p-4 pb-1">
                    <h5 class="text-body-emphasis h4">Administrar</h5>
                </div>
                <div class="accordion accordion-flush" id="accordionMobile">
                    <div class="accordion-item m-0 p-0 row">
                        <h2 class="accordion-header">
                            <button class="row accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button"
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
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button"
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
                            <div class="accordion-body bagr-cafe4">
                                <a href="adminMenu.php" class="ms-5 text-light fw-bold fs-5 text-decoration-none"
                                    aria-current="true">
                                    Administrar Menú
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button"
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
                            <div class="accordion-body bagr-cafe4">
                                <a href="adminEventos.php" class="text-light fw-bold fs-5 text-decoration-none ms-5"
                                    aria-current="true">
                                    Administrar Eventos
                                </a><br><br>
                                <a href="adminReservas.php" class="text-light fw-bold fs-5 text-decoration-none ms-5">
                                    Administar Reservas
                                </a><br><br>
                                <a href="adminlugares.php" class="text-light fw-bold fs-5 text-decoration-none ms-5">
                                    Administar Lugares
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button"
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
                            <div class="accordion-body bagr-cafe4">
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
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button"
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
                            <div class="accordion-body bagr-cafe4">
                                <a href="adminPublicaciones.php"
                                    class="fw-bold fs-5 ms-5 text-light text-decoration-none" aria-current="true">
                                    Administrar Publicaciones
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button"
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
                            <div class="accordion-body bagr-cafe4">
                                <a href="adminRecompensas.php" class="fw-bold fs-5 ms-5 text-light text-decoration-none"
                                    aria-current="true">
                                    Administrar Recompensas
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-dark bagr-cafe4">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <h1 class="fw-bold text-light pt-2 me-auto">Menú</h1>
                    <!-- Botón para volver atras -->
                    <button class="btn bagr-cafe4">
                        <a href="../index.php" class="text-decoration-none">
                            <i class="fa-solid fa-house text-light fa-2x"></i>
                        </a>
                    </button>
                </div>
            </nav>
        </div>

        <div class="row">
            <!-- navbar pc -->
            <div class="col-lg-3 bagr-cafe4 h-100 position-fixed d-none d-lg-block shadow">
                <h4 class="text-center text-light m-3 fs-2 fw-bold">Administrar</h4>
                <div class="row">
                    <div class="col-12 text-center">
                        <i class="fa-solid fa-user fa-10x text-light"></i>
                    </div>
                </div>
                <div class="accordion accordion-flush" id="accordionPc">
                    <div class=" ms-2 fs-3 mt-4 mb-3">
                        <a class="fw-bold bagr-cafe4 text-light text-decoration-none" href="adminInicio.php"
                            aria-expanded="false">
                            <i class="fa-solid fa-house-laptop"></i>
                            Inicio
                        </a>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button"
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
                            <div class="accordion-body bagr-cafe4">
                                <a href="adminMenu.php" class="ms-5 text-light fw-bold fs-6 text-decoration-none"
                                    aria-current="true">
                                    Administrar Menú
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button"
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
                            <div class="accordion-body bagr-cafe4">
                                <a href="adminEventos.php" class="text-light fw-bold fs-6 text-decoration-none ms-5"
                                    aria-current="true">
                                    Administrar Eventos
                                </a><br><br>
                                <a href="adminReservas.php" class="text-light fw-bold fs-6 text-decoration-none ms-5">
                                    Administar Reservas
                                </a><br><br>
                                <a href="adminlugares.php" class="text-light fw-bold fs-6 text-decoration-none ms-5">
                                    Administar Lugares
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button"
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
                            <div class="accordion-body bagr-cafe4">
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
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button"
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
                            <div class="accordion-body bagr-cafe4">
                                <a href="adminPublicaciones.php"
                                    class="fw-bold fs-6 ms-5 text-light text-decoration-none" aria-current="true">
                                    Administrar Publicaciones
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button"
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
                            <div class="accordion-body bagr-cafe4">
                                <a href="adminRecompensas.php" class="fw-bold fs-6 ms-5 text-light text-decoration-none"
                                    aria-current="true">
                                    Administrar Recompensa
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 offset-lg-3 p-0">
                <!-- AQUI VA EL CONTENIDO DE LA PAGINA -->
                <div class="row p-0 m-0 bagr-cafe4">
                    <div class="row p-3 m-0 shadow-lg bagr-cafe4 d-none d-lg-flex">
                        <div class="col-3">
                            <h1 class="fw-bold text-light d-none d-lg-block">Menú</h1>
                        </div>
                        <div class="col-9 d-flex justify-content-end align-items-center gap-3">
                            <!-- Botón que activa el modal de agregar -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#agregarProducto">
                                Agregar Producto
                            </button>
                            <!-- Botón para volver atras -->
                            <a href="../index.php" class="text-decoration-none d-none d-lg-block">
                                <i class="fa-solid fa-house fa-2x text-light"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Modal de agregar -->
                <div class="modal fade" id="agregarProducto" tabindex="-1" aria-labelledby="agregarProductoLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="agregarProductoLabel">Agregar Producto</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <!-- Aquí va el contenido del modal -->
                            <div class="modal-body">
                                <form action="../scripts/adminmenu/producto.php" method="POST"
                                    enctype="multipart/form-data">
                                    <!-- Aqui va el formulario -->
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" maxlength="45"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="descripcion" class="form-label">Descripción</label>
                                        <textarea class="form-control" id="descripcion" name="descripcion"
                                            maxlength="255" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="medida" class="form-label">Categoria</label>
                                        <select name="categoria" id="categoria" class="form-select" required>
                                            <option selected disabled value="">Seleccionar Categoría </option>
                                            <!-- Aqui va el select de categorías -->
                                            <?php
                                            $queryCate = "SELECT * FROM categorias WHERE tipo = 'Menu'";
                                            $categorias = $db->select($queryCate);
                                            foreach ($categorias as $categoria) {
                                                echo "<option value='{$categoria->id_categoria}'>{$categoria->nombre}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="imagen" class="form-label">Imagen</label>
                                        <input type="file" class="form-control" id="imagen" name="imagen" required
                                            accept="image/*">
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-6">
                                            <label for="medida" class="form-label">Medida</label>
                                            <input type="text" class="form-control" id="medida" name="medida"
                                                maxlength="15" required>
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label for="precio" class="form-label">Precio</label>
                                            <input type="number" min="0" class="form-control" id="precio" name="precio"
                                                required>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-end">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Agregar Producto</button>
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
                                    <div class="col-8 col-lg-4">
                                        <select name="categoria" id="categoria" class="form-select">
                                            <option selected disabled value="">Seleccionar Categoria</option>
                                            <!-- Aqui va el select de categorías -->
                                            <?php
                                            $query = "SELECT id_categoria, nombre FROM categorias WHERE tipo = 'Menu'";
                                            $categorias = $db->select($query);
                                            foreach ($categorias as $categoria) {
                                                $selected = (isset($_POST['categoria']) && $_POST['categoria'] == $categoria->id_categoria) ? 'selected' : '';
                                                echo "<option value='" . htmlspecialchars($categoria->id_categoria) . "' $selected>" . htmlspecialchars($categoria->nombre) . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-4 col-lg-2">
                                        <input type="submit" class="btn btn-primary w-100" value="Buscar">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 p-4 m-0">
                    <!-- Botón para agregar -->
                    <div class="d-lg-none w-100 mb-3 m-0 p-0">
                        <button type="button" class="btn w-100 btn-primary shadow-lg" data-bs-toggle="modal"
                            data-bs-target="#agregarProducto">
                            <i class="fa-solid fa-plus fa-2x"></i>
                        </button>
                    </div>
                    <?php
                    if (isset($_POST["categoria"])) {
                        extract($_POST);

                        $query = "SELECT 
                                        pm.id_pm, 
                                        pm.img_url, 
                                        pm.nombre, 
                                        pm.descripcion,  
                                        pm.estatus,
                                        c.nombre AS categoria
                                      FROM 
                                        productos_menu AS pm 
                                      JOIN 
                                        categorias AS c ON pm.id_categoria = c.id_categoria WHERE c.id_categoria = $categoria";
                        $productos = $db->select($query);

                        if (empty($productos)) {
                            echo "<div>No hay productos registrados en esta categoría.</div>";
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
                                echo /*html*/ "
                                        <tr>
                                        <td>$producto->nombre</td>
                                            <td class='d-flex flex-row align-items-center justify-content-center gap-1'>
                                                <!-- Imagen -->
                                                <!-- Botón que activa el modal de ver la imagen  -->
                                                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalImagen_$producto->id_pm'>
                                                    <i class='fa-solid fa-image'></i>
                                                </button>
                                                <!-- Modal de ver imagen -->
                                                <div class='modal fade' id='modalImagen_$producto->id_pm' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                    <div class='modal-dialog'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h1 class='modal-title fs-5' id='exampleModalLabel'>$producto->nombre</h1>
                                                            </div>
                                                            <div class='modal-body mb-3'>
                                                                <!-- Aquí se está mostrando la imagen -->
                                                                <form action='../scripts/adminmenu/editarImagen.php' method='POST' enctype='multipart/form-data'>
                                                                    <div class='col-12 mb-3'>
                                                                        <label for='imagen' class='form-label'>Imagen Actual</label><br>
                                                                        <img src='../img/menu/$producto->img_url' class='img-fluid' alt='imagen$producto->nombre'><br>
                                                                            <small>Selecciona una nueva imagen para actualizar, si es necesario.</small>
                                                                        </div>
                                                                        <div class='col-12 mb-3'>
                                                                            <label for='imagen_nueva' class='form-label'>Selecciona una nueva imagen</label>
                                                                            <input type='file' class='form-control' id='imagen_nueva' name='imagen_nueva' accept='image/*' required>
                                                                        </div>
                                                                        <input type='hidden' name='id_pm' value='$producto->id_pm'>
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
                                                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#detalleProducto_$producto->id_pm'>
                                                    <i class='fa-solid fa-bars'></i>
                                                </button>
                                                <div class='modal fade' id='detalleProducto_$producto->id_pm' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                    <div class='modal-dialog'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h1 class='modal-title fs-5' id='exampleModalLabel'>Detalles del Producto</h1>
                                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                            </div>
                                                            <!-- Aquí va el contenido del modal -->
                                                            <div class='modal-body'>
                                                                <h4 class='text-start fw-bold mb-3'>Nombre: <span class='fw-normal fs-5'>$producto->nombre</span></h4>
                                                                <h4 class='text-start fw-bold mb-3'>Descripción: <span class='fw-normal fs-5'>$producto->descripcion</span></h4>
                                                                <h4 class='text-start fw-bold mb-3'>Categoría: <span class='fw-normal fs-5'>{$producto->categoria}</span></h5>
                                                                <!-- Tabla de productos -->
                                                                <table class='table table-light border-3 border-black border-bottom border-start border-end table-striped text-center mt-4 table-hover'>
                                                                    <thead class='table-dark'>
                                                                        <th>Medida</th>
                                                                        <th>Precio</th>
                                                                        <th>Acciones</th>
                                                                    </thead>
                                                                    <tbody class='table-group-divider'>";
                                //Consulta de productos_menu relacionados con este detalle
                                $queryMedidas = "SELECT medida, precio FROM detalle_productos_menu WHERE id_pm = $producto->id_pm";
                                $medidas = $db->select($queryMedidas);
                                foreach ($medidas as $medida_precio) {
                                    echo /*html*/ "<tr>
                                                                                    <td>$medida_precio->medida</td>
                                                                                    <td>$medida_precio->precio</td>
                                                                                    <td>
                                                                                        <form action='../scripts/adminmenu/eliminarMedida.php' method='POST'>
                                                                                            <input type='hidden' name='id_pm' value='$producto->id_pm'>
                                                                                            <input type='hidden' name='medida' value='$medida_precio->medida'>
                                                                                            <input type='hidden' name='precio' value='$medida_precio->precio'>
                                                                                            <button type='submit' class='btn btn-danger'><i class='fa-solid fa-trash'></i></button>
                                                                                        </form>
                                                                                </tr>";
                                }
                                echo /*html*/ "
                                                                    </tbody>
                                                                </table>
                                                                <div class='row'>
                                                                    <div class='col-12'>
                                                                        <form class='text-start' method='POST' action='../scripts/adminmenu/medidaextra.php'>
                                                                            <div class='row'>
                                                                                <div class='col-6'>
                                                                                    <label class='form-label'>Medida extra</label>
                                                                                    <input type='text' maxlength='15' name='medidaExtra' class='form-control' required>
                                                                                </div>
                                                                                <div class='col-6'>
                                                                                    <label class='form-label'>Precio extra</label>
                                                                                    <input type='number' name='precioExtra' class='form-control' required>
                                                                                    <input type='hidden' name='id_pm' value='$producto->id_pm'>
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
                                                <!-- Botón que activa el modal de editar producto -->
                                                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editarProducto_$producto->id_pm'>
                                                    <i class='fa-solid fa-pen-to-square'></i>
                                                </button>
                                                <div class='modal fade' id='editarProducto_$producto->id_pm' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                    <div class='modal-dialog'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h1 class='modal-title fs-5' id='exampleModalLabel'>Editar Producto</h1>
                                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                            </div>
                                                            <!-- Aquí va el contenido del modal -->
                                                            <div class='modal-body'>
                                                                    <form class='text-start' action='../scripts/adminmenu/editarProducto.php' method='POST'>
                                                                        <input type='hidden' name='id_pm' value='$producto->id_pm'>
                                                                        <div class='row'>
                                                                            <div class='col-12 mb-3'>
                                                                                <label class='form-label'>Nombre</label>
                                                                                <input type='text' maxlength='75' name='nombre' class='form-control' value='$producto->nombre' required>
                                                                            </div>
                                                                            <div class='col-12 mb-3'>
                                                                                <label class='form-label'>Descripción</label>
                                                                                <textarea class='form-control' name='descripcion' maxlength='255' required>$producto->descripcion</textarea>
                                                                            </div>
                                                                            <div class='col-12 mb-3'>
                                                                                <label class='form-label'>Categoría</label>
                                                                                <select type='text' maxlength='30' name='categoria' class='form-control' value='$producto->categoria' required>";
                                foreach ($categorias as $categoria) {
                                    $selected = (isset($_POST['categoria']) && $_POST['categoria'] == $categoria->id_categoria) ? 'selected' : '';
                                    echo "<option value='" . htmlspecialchars($categoria->id_categoria) . "' $selected>" . htmlspecialchars($categoria->nombre) . "</option>";
                                }
                                $checked = ($producto->estatus == 1) ? 'checked' : '';
                                $labelText = ($producto->estatus == 1) ? 'Activo' : 'Inactivo';
                                echo /*html*/ "</select>
                                                                            </div>
                                                                            <div class='col-12 mb-3'>
                                                                            <div class='form-check form-switch'>
                                                                                <input class='form-check-input' type='checkbox' role='switch' name='estatus' id='estatus' value='1' {$checked}>
                                                                                <label for='estatus' class='form-check-label'>{$labelText}</label>
                                                                            </div>
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
                                        </tr>";
                            }
                            echo "</tbody></table>";
                        }
                    } else {
                        echo "<div>Seleccione una categoria</div>";
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/b820f07375.js" crossorigin="anonymous"></script>
</body>

</html>