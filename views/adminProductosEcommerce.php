<?php
session_start();
require_once '../class/database.php';
include_once ("../scripts/funciones/funciones.php");
$db = new database();
$db->conectarDB();

$rolUsuario = "SELECT r.rol FROM roles r JOIN roles_usuarios ru ON r.id_rol = ru.id_rol JOIN personas p ON ru.id_usuario = p.id_usuario WHERE p.usuario = '$_SESSION[usuario]'";

$rol = $db->select($rolUsuario);

if ($rol[0]->rol !== 'administrador') {
    header('Location: ../index.php');
}

if (isset($_POST['btneditarstock'])) {

    extract($_POST);

    $query = "UPDATE detalle_bc SET stock = $stock WHERE id_dbc = '$id_dbc'";

    $db->execute($query);

    showAlert("Se actualizo el stock correctamente", "success");


}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Productos E-Commerce</title>
    <link rel="shortcut icon" href="../img/Sinfonía-Café-y-Cultura.webp">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body style="background: var(--color6);">
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
                    <h1 class="fw-bold text-light pt-2 me-auto">Productos</h1>
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
            <div class="col-lg-3 bagr-cafe4 h-100 position-fixed d-none d-lg-block shadow contenedor">
                <h4 class="text-center text-light m-3 fs-2 fw-bold">Administrar</h4>
                <div class="row">
                    <div class="col-12 text-center">
                    <img src="../img/Sinfonía-Café-y-Cultura blanco.webp" alt="" class="img-fluid" style="width: 300px;">
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
                <!-- AQUI VA EL CONTENIDO DE LA PAGINAAAAAAAAAAAA -->
                <div class="row p-0 m-0 bagr-cafe4">
                    <div class="row p-3 m-0 shadow-lg bagr-cafe4 d-none d-lg-flex">
                        <div class="col-3">
                            <h1 class="fw-bold text-light d-none d-lg-block">Productos</h1>
                        </div>
                        <div class="col-6 col-lg-9 d-flex justify-content-end align-items-center gap-3">
                            <!-- Aquí va el botón del modal para registrar productos -->
                            <div class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#agregarProducto">
                                Agregar Producto
                            </div>
                            <!-- Botón para volver atras -->
                            <a href="../index.php" class="text-decoration-none d-none d-lg-block">
                                <i class="fa-solid fa-house fa-2x text-light"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Modal para agregar publicación -->
                <div class="modal fade" id="agregarProducto" tabindex="-1" aria-labelledby="agregarProducto"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="agregarProducto">Agregar Producto</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <!-- Aquí va el contenido del modal -->
                            <div class="modal-body">
                                <form action="../scripts/adminecomerce/agregarbolsa.php" method="POST"
                                    enctype="multipart/form-data">
                                    <!-- Aquí va el formulario -->
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre"
                                            maxlength="100" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="años_cosecha" class="form-label">Año de Cosecha</label>
                                        <textarea class="form-control" id="años_cosecha" name="años_cosecha"
                                            maxlength="255" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="productor_finca" class="form-label">Productor/Finca</label>
                                        <input type="text" class="form-control" id="productor_finca"
                                            name="productor_finca" maxlength="150" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="proceso" class="form-label">Proceso</label>
                                        <select name="proceso" id="proceso" class="form-select" required>
                                            <option selected disabled value="">Seleccionar Proceso</option>
                                            <option value="Lavado">Lavado</option>
                                            <option value="Natural">Natural</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="variedad" class="form-label">Variedad</label>
                                        <input type="text" class="form-control" id="variedad" name="variedad"
                                            maxlength="200" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="altura" class="form-label">Altura</label>
                                        <input type="text" class="form-control" id="altura" name="altura"
                                            maxlength="100" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="aroma" class="form-label">Aroma</label>
                                        <input type="text" class="form-control" id="aroma" name="aroma" maxlength="150"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="acidez" class="form-label">Acidez</label>
                                        <input type="text" class="form-control" id="acidez" name="acidez"
                                            maxlength="150" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sabor" class="form-label">Sabor</label>
                                        <input type="text" class="form-control" id="sabor" name="sabor" maxlength="150"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="cuerpo" class="form-label">Cuerpo</label>
                                        <input type="text" class="form-control" id="cuerpo" name="cuerpo"
                                            maxlength="100" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="puntaje_catacion" class="form-label">Puntaje de Catación</label>
                                        <input type="number" step="0.1" min="0" class="form-control"
                                            id="puntaje_catacion" name="puntaje_catacion" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="imagen" class="form-label">Imagen</label>
                                        <input type="file" class="form-control" id="imagen" name="imagen" required
                                            accept="image/*">
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-6">
                                            <label for="medida" class="form-label">Medida</label>
                                            <select name="medida" id="medida" class="form-select" required>
                                                <option selected disabled value="">Seleccionar Peso</option>
                                                <option value="1/4 kg">1/4 kg</option>
                                                <option value="1/2 kg">1/2 kg</option>
                                                <option value="1 kg">1 kg</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label for="precio" class="form-label">Precio</label>
                                            <input type="number" step="0.01" min="0" class="form-control" id="precio"
                                                name="precio" required>
                                        </div>
                                        <div class="mb-3 col-6">
                                            <label for="stock" class="form-label">Stock</label>
                                            <input type="number" min="0" class="form-control" id="stock" name="stock"
                                                required>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-end">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-dark">Agregar Producto</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shadow-lg row p-0 m-0 p-3" style="background: var(--color6);">
                    <div class="row m-1">
                        <div class="col-12 col-lg-5">
                            <form method="post">
                                <div class="row">
                                    <div class="col-8">
                                        <select name="proceso" id="proceso" class="form-select">
                                            <option selected disabled value="">Seleccionar el Proceso</option>
                                            <!-- Aquí va el select de procesos -->
                                            <?php
                                            // Define an array with the measures
                                            $proceso = ['Natural', 'Lavado'];

                                            // Loop through the measures array and create an option for each
                                            foreach ($proceso as $procesos) {
                                                echo "<option value=\"$procesos\">$procesos</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <input type="submit" class="btn btn-dark w-100" value="Buscar">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 p-4 m-0">
                    <div class="d-lg-none w-100 mb-3 m-0 p-0">
                        <button type="button" class="btn w-100 btn-dark shadow-lg" data-bs-toggle="modal"
                            data-bs-target="#agregarProducto">
                            <i class="fa-solid fa-plus fa-2x"></i>
                        </button>
                    </div>
                    <!-- Tabla de productos AQUI -->
                    <?php
                    if (isset($_POST['proceso'])) {
                        extract($_POST);
                        $proceso = $_POST['proceso'];

                        $consulta = "CALL ObtenerDetallesPorProceso('$proceso');";
                        $bolsa = $db->select($consulta);

                        if (empty($procesos)) {
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

                            foreach ($bolsa as $bolsita) {
                                echo "<tr><td>" . $bolsita->nombre . "</td> 
                                    <td class='d-flex flex-row align-items-center justify-content-center gap-1'>
                                                <!-- Imagen -->
                                                <!-- Botón que activa el modal de ver la imagen  -->
                                                <button type='button' class='btn btn-dark' data-bs-toggle='modal' data-bs-target='#modalImagen_$bolsita->id_bolsa'>
                                                    <i class='fa-solid fa-image'></i>
                                                </button>
                                                <!-- Modal de ver imagen -->
                                                <div class='modal fade' id='modalImagen_$bolsita->id_bolsa' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                    <div class='modal-dialog'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h1 class='modal-title fs-5' id='exampleModalLabel'>$bolsita->nombre</h1>
                                                            </div>
                                                            <div class='modal-body mb-3'>
                                                                <!-- Aquí se está mostrando la imagen -->
                                                                <form action='../scripts/adminecomerce/editarimagen.php' method='POST' enctype='multipart/form-data'>
                                                                    <div class='col-12 mb-3'>
                                                                        <label for='imagen' class='form-label'>Imagen Actual</label><br>
                                                                        <img src='../img/bolsas/$bolsita->img_url' class='img-fluid' alt='imagen$bolsita->nombre'><br>
                                                                        <small>Selecciona una nueva imagen para actualizar, si es necesario.</small>
                                                                    </div>
                                                                    <div class='col-12 mb-3'>
                                                                        <label for='imagen_nueva' class='form-label'>Selecciona una nueva imagen</label>
                                                                        <input type='file' class='form-control' id='imagen_nueva' name='imagen_nueva' accept='image/*' required>
                                                                    </div>
                                                                    <input type='hidden' name='id_bolsa' value='$bolsita->id_bolsa'>
                                                                    <div class='col-12 mb-3 text-end'>
                                                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                                                        <button type='submit' class='btn btn-dark'>Actualizar</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Botón que activa el modal de ver detalles del bolsita -->
                                                <button type='button' class='btn btn-dark' data-bs-toggle='modal' data-bs-target='#detallebolsita_$bolsita->id_bolsa'>
                                                    <i class='fa-solid fa-bars'></i>
                                                </button>";

                                // Obtener las medidas existentes para la bolsa actual
                                $queryMedidasExistentes = "SELECT medida FROM detalle_bc WHERE id_bolsa = $bolsita->id_bolsa";
                                $medidasExistentes = $db->select($queryMedidasExistentes);
                                $medidasExistentesArray = array_map(function ($medida) {
                                    return $medida->medida;
                                }, $medidasExistentes);

                                // Todas las medidas posibles
                                $todasMedidas = ['1/4 Kg', '1/2 Kg', '1 Kg'];

                                // Filtrar las medidas disponibles
                                $medidasDisponibles = array_diff($todasMedidas, $medidasExistentesArray);

                                // Código del modal para mostrar detalles de la bolsa
                                echo "
                                        <div class='modal fade' id='detallebolsita_$bolsita->id_bolsa' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h1 class='modal-title fs-5' id='exampleModalLabel'>Información de Bolsa de Café y Medidas</h1>
                                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                    </div>
                                                    <!-- Aquí va el contenido del modal -->
                                                    <div class='modal-body'>
                                                        <h4 class='text-start fw-bold mb-3'>Nombre: <span class='fw-normal fs-5'>$bolsita->nombre</span></h4>
                                                        <h4 class='text-start fw-bold mb-3'>Año de Cosecha: <span class='fw-normal fs-5'>{$bolsita->años_cosecha}</span></h4>
                                                        <h4 class='text-start fw-bold mb-3'>Productor y/o Finca: <span class='fw-normal fs-5'>$bolsita->productor_finca</span></h4>
                                                        <h4 class='text-start fw-bold mb-3'>Proceso: <span class='fw-normal fs-5'>$bolsita->proceso</span></h4>
                                                        <h4 class='text-start fw-bold mb-3'>Variedad: <span class='fw-normal fs-5'>$bolsita->variedad</span></h4>
                                                        <h4 class='text-start fw-bold mb-3'>Altura: <span class='fw-normal fs-5'>$bolsita->altura</span></h4>
                                                        <hr class='my-4'>
                                                         <h4 class='text-start fw-bold mb-3'>Aroma: <span class='fw-normal fs-5'>$bolsita->aroma</span></h4>
                                                         <h4 class='text-start fw-bold mb-3'>Acidez: <span class='fw-normal fs-5'>$bolsita->acidez</span></h4>
                                                          <h4 class='text-start fw-bold mb-3'>Sabor: <span class='fw-normal fs-5'>$bolsita->sabor</span></h4>
                                                          <h4 class='text-start fw-bold mb-3'>Cuerpo: <span class='fw-normal fs-5'>$bolsita->cuerpo</span></h4>
                                                          <h4 class='text-start fw-bold mb-3'>Puntaje de Catación: <span class='fw-normal fs-5'>$bolsita->puntaje_catacion pts</span></h4>
                                                           <hr class='my-4'>
                                                           
                                                        <!-- Tabla de medidas de la bolsa -->
                                                        ";
                                $queryMedidas = "SELECT id_dbc,medida, precio,stock FROM detalle_bc WHERE id_bolsa = $bolsita->id_bolsa";
                                $medidas = $db->select($queryMedidas);
                                if (empty($medidas)) {
                                    echo "<h4 class='text-center'>No hay medidas registradas</h4>";
                                } else {
                                    echo "
                                                        <table class='table table-light border-3 border-black border-bottom border-start border-end table-striped text-center mt-4 table-hover'>
                                                            <thead class='table-dark'>
                                                            <th>id</th>
                                                                <th>Medida</th>
                                                                <th>Precio</th>
                                                                <th>Stock</th>
                                                                <th>Acciones</th>
                                                            </thead>
                                                            <tbody class='table-group-divider'>";
                                    foreach ($medidas as $medida_precio) {
                                        $stock = $medida_precio->stock;
                                        $precio = formatPrecio($medida_precio->precio);
                                        echo "
                                                                <tr>
                                                                    <td>$medida_precio->id_dbc</td>
                                                                    <td>$medida_precio->medida</td>
                                                                    <td>$$precio</td>
                                                                    <td>$medida_precio->stock</td>
                                                                    <td class='d-flex flex-row align-items-center justify-content-center gap-1'>
                                                                        <form action='../scripts/adminecomerce/eliminarMedida.php' method='POST' onsubmit='return confirmDelete()'>
                                                                            <input type='hidden' name='id_bolsa' value='$bolsita->id_bolsa'>
                                                                            <input type='hidden' name='medida' value='$medida_precio->medida'>
                                                                            <input type='hidden' name='precio' value='$medida_precio->precio'>
                                                                            <input type='hidden' name='stock' value='$medida_precio->stock'>
                                                                            <button type='submit' class='btn btn-danger'><i class='fa-solid fa-trash'></i></button>
                                                                        </form>
                                                                       <!-- Botón para abrir el modal de editar stock -->
                                <button type='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#editarStockModal_$medida_precio->id_dbc'>
                                    <i class='fa-solid fa-edit'></i>
                                </button>
        </td>
    </tr>
                                                                <script>
function confirmDelete() {
    return confirm('¿Está seguro que quiere eliminar esta medida? Esto también eliminará la medida de los carritos de los usuarios.');
}
</script>";
                                    }
                                    echo "
                                                            </tbody>
                                                        </table>";
                                }

                                if (!empty($medidasDisponibles)) {
                                    echo "
                        <!-- Botón para abrir el modal de agregar medida -->
                        <button type='button' class='btn btn-dark mt-3' data-bs-toggle='modal' data-bs-target='#agregarMedidaModal_$bolsita->id_bolsa'>
                            Agregar Medida
                        </button>";
                                }

                                echo "
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";

                                foreach ($medidas as $medida_precio) {
                                    echo "
                                            <!-- Modal para editar stock -->
                                            <div class='modal fade' id='editarStockModal_$medida_precio->id_dbc' tabindex='-1' aria-labelledby='editarStockModalLabel_$medida_precio->id_dbc' aria-hidden='true'>
                                                <div class='modal-dialog'>
                                                    <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h5 class='modal-title' id='editarStockModalLabel_$medida_precio->id_dbc'>Editar Stock</h5>
                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <form  method='post'>
                                                                <input type='hidden' name='id_dbc' value='$medida_precio->id_dbc'>
                                                                <div class='mb-3'>
                                                                    <label for='stock_$medida_precio->id_dbc' class='form-label'>Stock</label>
                                                                    <input type='number' name='stock' class='form-control' id='stock_$medida_precio->id_dbc' value='$medida_precio->stock' min='10' max='1000' required >
                                                                </div>
                                                                <div class='modal-footer'>
                                                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                                                                    <button type='submit' class='btn btn-dark' name='btneditarstock'>Guardar cambios</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            ";
                                }

                                // Modal para agregar nueva medida  
                                if (!empty($medidasDisponibles)) {
                                    echo "
                                        <div class='modal fade' id='agregarMedidaModal_$bolsita->id_bolsa' tabindex='-1' aria-labelledby='agregarMedidaLabel' aria-hidden='true'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h1 class='modal-title fs-5' id='agregarMedidaLabel'>Agregar Medida</h1>
                                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <form action='../scripts/adminecomerce/agregarmedida.php' method='POST'>
                                                            <input type='hidden' name='id_bolsa' value='$bolsita->id_bolsa'>
                                                            <div class='mb-3'>
                                                                <label for='medida' class='form-label'>Medida</label>
                                                                <select name='medida' id='medida' class='form-select' required>
                                                                    <option selected disabled value=''>Seleccionar Medida</option>";
                                    foreach ($medidasDisponibles as $medida) {
                                        echo "<option value='$medida'>$medida</option>";
                                    }
                                    echo "
                                                                </select>
                                                            </div>
                                                            <div class='mb-3'>
                                                                <label for='precio' class='form-label'>Precio</label>
                                                                <input type='number' step='0.01' min='0' class='form-control' id='precio' name='precio' required>
                                                            </div>
                                                            <div class='mb-3'>
                                                                <label for='stock' class='form-label'>Stock</label>
                                                                <input type='number' step='0.01' min='0' class='form-control' id='stock' name='stock' required>
                                                            </div>
                                                            <div class='mt-3 text-end'>
                                                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                                                <button type='submit' class='btn btn-dark'>Agregar Medida</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
                                }


                                echo "
                                                <!-- Botón que activa el modal de editar bolsita -->
                                                <button type='button' class='btn btn-dark' data-bs-toggle='modal' data-bs-target='#editarbolsita_$bolsita->id_bolsa'>
                                                    <i class='fa-solid fa-pen-to-square'></i>
                                                </button>
                                               <div class='modal fade' id='editarbolsita_$bolsita->id_bolsa' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                    <div class='modal-dialog'>
                                                        <div class='modal-content'>
                                                        <div class='modal-header'>
                                                            <h1 class='modal-title fs-5' id='exampleModalLabel'>Editar bolsita</h1>
                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                        </div>
                                                        <!-- Aquí va el contenido del modal -->
                                                        <div class='modal-body'>
                                                        <form class='text-start' action='../scripts/adminecomerce/editarbolsa.php' method='POST'>
                                                            <input type='hidden' name='id_bolsa' value='$bolsita->id_bolsa'>
                                                                <div class='row'>
                                                                    <div class=' mb-2'>
                                                                        <label class='form-label'>Nombre</label>
                                                                        <input type='text' maxlength='75' name='nombre' class='form-control' value='$bolsita->nombre' required>
                                                                    </div>
                                                                    <div class=' mb-2'>
                                                                        <label class='form-label'>Año de Cosecha</label>
                                                                        <textarea class='form-control' name='años_cosecha' maxlength='255' required>$bolsita->años_cosecha</textarea>
                                                                    </div>
                                                                    <div class=' mb-2'>
                                                                        <label class='form-label'>Productor/Finca</label>
                                                                        <input type='text' maxlength='150' name='productor_finca' class='form-control' value='$bolsita->productor_finca' required>
                                                                    </div>
                                                                    <div class=' mb-2'>
                                                                        <label class='form-label'>Proceso</label>
                                                                        <input type='text' maxlength='100' name='proceso' class='form-control' value='$bolsita->proceso' required>
                                                                    </div>
                                                                    <div class=' mb-2'>
                                                                        <label class='form-label'>Variedad</label>
                                                                        <input type='text' maxlength='200' name='variedad' class='form-control' value='$bolsita->variedad' required>
                                                                    </div>
                                                                    <div class=' mb-2'>
                                                                        <label class='form-label'>Altura</label>
                                                                        <input type='text' maxlength='100' name='altura' class='form-control' value='$bolsita->altura' required>
                                                                    </div>
                                                                    <div class=' mb-2'>
                                                                        <label class='form-label'>Aroma</label>
                                                                        <input type='text' maxlength='150' name='aroma' class='form-control' value='$bolsita->aroma' required>
                                                                    </div>
                                                                    <div class=' mb-2'>
                                                                        <label class='form-label'>Acidez</label>
                                                                        <input type='text' maxlength='150' name='acidez' class='form-control' value='$bolsita->acidez' required>
                                                                    </div>
                                                                    <div class=' mb-2'>
                                                                        <label class='form-label'>Sabor</label>
                                                                        <input type='text' maxlength='150' name='sabor' class='form-control' value='$bolsita->sabor' required>
                                                                    </div>
                                                                    <div class='mb-2'>
                                                                        <label class='form-label'>Cuerpo</label>
                                                                        <input type='text' maxlength='100' name='cuerpo' class='form-control' value='$bolsita->cuerpo' required>
                                                                    </div>
                                                                    <div class=' mb-2'>
                                                                        <label class='form-label'>Puntaje Catación</label>
                                                                        <div class=' mb-2'>
                                                                    <input type='number' step='0.01' name='puntaje_catacion' class='form-control' value='$bolsita->puntaje_catacion' required>
                                                                    </div>
                                                                    

                                                                        <input type='hidden' maxlength='255' name='img_url' class='form-control' value='$bolsita->img_url' required>
                                                                    
                                                                    <div class=' mt-2 text-end'>
                                                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                                                        <button type='submit' class='btn btn-dark'>Guardar Cambios</button>
                                                                    </div>
                                                                </div>
                                                        </form>
                                                        </div>
                                                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>       
                                        </td>
                                    </td>
                                </tr>";
                            }
                        }
                    } else {
                        echo "<div>Seleccione una medida</div>";
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Alerta -->
    <div class="alert floating-alert" id="floatingAlert"></div>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/b820f07375.js" crossorigin="anonymous"></script>
    <script src="../script/script.js"></script>
    <script src="../js/alertas.js"></script>
</body>

</html>