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

if (isset($_POST['btnactualizar'])) {

    extract($_POST);

    $cantidadBoletos = isset($_POST["cantidadBoletos"]) ? $_POST["cantidadBoletos"] : 0;
    $costo = isset($_POST["costo"]) ? $_POST["costo"] : 0;

    // Asegúrate de que id_evento es un número entero
    $id_evento = intval($id_evento);

    // Construir la consulta de actualización
    $consultapago = "UPDATE eventos SET  
        nombre = '$nombre',
        descripcion = '$descripcion',
        fecha_evento = '$fechaEvento', 
        hora_inicio = '$horaIni', 
        hora_fin = '$horaFin',
        capacidad = '$capacidad',
        boletos = '$cantidadBoletos', 
        precio_boleto = '$costo', 
        fecha_publicacion = '$fechaPub'
        WHERE id_evento = '$id_evento'";

    $consultagratuito = "UPDATE eventos SET  
        nombre = '$nombre',
        descripcion = '$descripcion',
        fecha_evento = '$fechaEvento', 
        hora_inicio = '$horaIni', 
        hora_fin = '$horaFin',
        capacidad = '$capacidad',  
        fecha_publicacion = '$fechaPub'
        WHERE id_evento = '$id_evento'";

    if ($fechaEvento < $fechaPub) {
        showAlert("La fecha del evento no puede ser anterior a la fecha de publicación.", "error");
    } else if ($horaFin <= $horaIni) {
        showAlert("La hora de fin no puede ser menor o igual a la hora de inicio.", "error");
    } else if ($tipo == "De Pago") {
        if ($cantidadBoletos > $capacidad) {
            showAlert("La cantidad de boletos no puede ser mayor a la capacidad.", "error");
        } else if ($horaFin <= $horaIni) {
            showAlert("La hora de fin no puede ser menor o igual a la hora de inicio.", "error");
        } else {
            $db->execute($consultapago);
            showAlert("Actualización exitosa.", "success");
        }
    } else {
        $db->execute($consultagratuito);
        showAlert("Actualización exitosa.", "success");
    }
}

?>
<!DOCTYPE html>
<html lang="es">

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
            const cantidadBoletosInput = document.getElementById('cantidadBoletos');


            function toggleCostoInput() {
                if (tipoSelect.value === 'Gratuito') {
                    costoInput.value = 'NULL';
                    costoInput.disabled = true;
                    cantidadBoletosInput.disabled = true;
                } else {
                    costoInput.disabled = false;
                    cantidadBoletosInput.disabled = false;
                }
            }

            tipoSelect.addEventListener('change', toggleCostoInput);
            toggleCostoInput();
        });
    </script>
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
                        <a href="adminInicio.php">
                            <h2 class="accordion-header">
                                <button class="row accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#flush-inicio"
                                    aria-expanded="false" aria-controls="flush-inicio">
                                    <div class="col-6">
                                        <a href="adminInicio.php" class="text-light fw-bold text-decoration-none">
                                            <i class="fa-solid fa-house-laptop me-1"></i>
                                            Inicio
                                        </a>
                                    </div>
                                </button>
                            </h2>
                        </a>
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
                                    class="fw-bold fs-5 ms-5 text-light text-decoration-none">
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
                    <h1 class="fw-bold text-light pt-2 me-auto">Eventos</h1>
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
            <div class="col-lg-3 bagr-cafe4 shadow h-100 position-fixed d-none d-lg-block contenedor">
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
                            <h1 class="fw-bold text-light d-none d-lg-block">Eventos</h1>
                        </div>
                        <div class="col-9 d-flex justify-content-end align-items-center gap-3">
                            <!-- Botón que activa el modal de agregar -->
                            <div class="ms-auto text-end col">
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
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
                <div class="modal fade" id="agregarEvento" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 w-3" id="exampleModalLabel">Agregar Evento</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Aqui va el contenido de el boton de agregar-->
                                <form id="eventForm" action="../scripts/admineventos/insertarevento.php" method="post"
                                    enctype="multipart/form-data" onsubmit="return validateForm()">
                                    <div class="col-12 mb-3">
                                        <label for="titulo" class="form-label">Titulo del Evento</label>
                                        <input type="text" maxlength="50" class="form-control" id="titulo" name="evento"
                                            required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="descripcion" class="form-label">Descripción</label>
                                        <input type="text" class="form-control" id="descripcion" name="descripcion"
                                            required>
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
                                        <label for="img" class="form-label">Imagen</label>
                                        <input type="file" class="form-control" id="img" name="imgEvento">
                                    </div>
                                    <div class="col-12 text-center">
                                        <h4 class="fw-bold">Fecha y Hora</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="fechaEvento" class="form-label">Fecha del Evento</label>
                                            <input type="date" class="form-control" id="fechaEvento" name="fechaEvento" min="<?= date('Y-m-d') ?>"
                                                required>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="fechaPub" class="form-label">Fecha de publicación</label>
                                            <input type="date" class="form-control" id="fechaPub" name="fechaPub" min="<?= date('Y-m-d') ?>"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="horaIni" class="form-label">Hora de Inicio</label>
                                            <input type="time" min="11:00" max="21:00" class="form-control" id="horaIni"
                                                name="horaIni" required>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="horaFin" class="form-label">Hora de Fin</label>
                                            <input type="time" min="11:00" max="21:00" class="form-control" id="horaFin"
                                                name="horaFin" required>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <h4 class="fw-bold">Ubicación</h4>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="lugar" class="form-label">Lugar</label>
                                        <select name="lugar" id="lugar" class="form-select" required>
                                            <option selected disabled value="">Seleccionar Lugar</option>
                                            <?php
                                            $consulta = "SELECT id_lugar, nombre FROM ubicacion_lugares";
                                            $lugares = $db->select($consulta);
                                            foreach ($lugares as $lugar) {
                                                echo "<option value='{$lugar->id_lugar}'>{$lugar->nombre}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-12 mb-3 text-center">
                                        <h4 class="fw-bold">Detalles del evento</h4>
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
                                            <label for="capacidad" class="form-label">Capacidad</label>
                                            <input type="number" min="1" max="300" class="form-control" id="capacidad"
                                                name="capacidad" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="costo" class="form-label">Costo por boleto</label>
                                            <input type="number" min="1" max="5000" class="form-control" id="costo"
                                                name="costo" required>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <label for="cantidadBoletos" class="form-label">Cantidad de boletos</label>
                                            <input type="number" min="1" max="300" class="form-control"
                                                id="cantidadBoletos" name="cantidadBoletos" required>
                                        </div>
                                    </div>
                                    <div class='mt-3 text-end'>
                                        <button type='button' class='btn btn-secondary'
                                            data-bs-dismiss='modal'>Cancelar</button>
                                        <button type='submit' class='btn btn-dark'>Agregar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shadow-lg row p-0 m-0 p-3" style="background: var(--color6);">
                    <div class="row m-1">
                        <div class="col-lg-5 col-12">
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
                                        <button type="submit" class="btn btn-dark w-100" value="Buscar">Buscar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row mt-lg-3 p-3 p-lg-4 m-0">
                    <div class="d-lg-none w-100 mb-3 m-0 p-0">
                        <button type="button" class="btn w-100 btn-dark shadow-lg" data-bs-toggle="modal"
                            data-bs-target="#agregarEvento">
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
                        WHERE e.id_categoria = '$categoria' order by e.fecha_evento desc limit 10";

                        $eventos = $db->select($query);

                        if (empty($eventos)) {
                            echo "<div role='alert'>No hay productos registrados en esta categoría.</div>";
                        } else {
                            echo "
                                    <table class='table table-striped table-hover table-dark text-center border-3 border-black border-bottom border-start border-end'>
                                        <thead>
                                            <tr>
                                                <th scope='col'>Nombre</th>
                                                <th scope='col' class='d-none d-lg-table-cell'>Fecha</th>
                                                <th scope='col' class='d-none d-lg-table-cell'>Horario</th>
                                                <th scope='col' class='d-none d-lg-table-cell'>Tipo</th>
                                                <th scope='col' class='d-none d-lg-table-cell'>Capacidad</th>
                                                <th scope='col'>Acciones</th>
                                            </tr>
                                    </thead>
                                    <tbody class='table-group-divider table-light'>";
                            foreach ($eventos as $evento) {
                                $horaInicio = formatHora($evento->hora_inicio);
                                $horaFin = formatHora($evento->hora_fin);
                                $fechaEvento = formatFecha($evento->fecha_evento);
                                $precio_boleto = formatPrecio($evento->precio_boleto);
                                echo "
                                <tr>
                                        <td>$evento->nombre</td>
                                        <td class='d-none d-lg-table-cell'>$fechaEvento</td>
                                        <td class='d-none d-lg-table-cell'>$horaInicio - $horaFin</td>
                                        <td class='d-none d-lg-table-cell'>$evento->tipo</td>
                                        <td class='d-none d-lg-table-cell'>$evento->capacidad</td>
                                            <td class='d-flex flex-row align-items-center justify-content-center gap-1'>
                                                <!-- Imagen -->
                                                <!-- Botón que activa el modal de ver la imagen  -->
                                                <button type='button' class='btn btn-dark' data-bs-toggle='modal' data-bs-target='#modalImagen_$evento->id_evento'>
                                                    <i class='fa-solid fa-image'></i>
                                                </button>
                                                <!-- Modal de ver imagen -->
                                                <div class='modal fade' id='modalImagen_$evento->id_evento' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                    <div class='modal-dialog modal-dialog-centered'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h1 class='modal-title fs-5' id='exampleModalLabel'>$evento->nombre</h1>
                                                            </div>
                                                            <div class='modal-body mb-3'>
                                                                <!-- Aquí se está mostrando la imagen -->
                                                                <form action='../scripts/admineventos/editarimagen.php' method='POST' enctype='multipart/form-data'>
                                                                    <div class='col-12 mb-3'>
                                                                        <label for='imagen' class='form-label'>Imagen Actual</label><br>
                                                                        <img src='../img/eventos/$evento->img_url' class='img-fluid' alt='imagen$evento->nombre'><br>
                                                                            <small>Selecciona una nueva imagen para actualizar, si es necesario.</small>
                                                                        </div>
                                                                        <div class='col-12 mb-3'>
                                                                            <label for='imagen_nueva' class='form-label'>Selecciona una nueva imagen</label>
                                                                            <input type='file' class='form-control' id='imagen_nueva' name='imagen_nueva' accept='image/*' required>
                                                                        </div>
                                                                        <input type='hidden' name='id_evento' value='$evento->id_evento'>
                                                                        <div class='col-12 mb-3 text-end'>
                                                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                                                            <button type='submit' class='btn btn-dark'>Actualizar</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Botón que activa el modal de ver detalles del producto -->
                                                <button type='button' class='btn btn-dark' data-bs-toggle='modal' data-bs-target='#detalleProducto_$evento->id_evento'>
                                                    <i class='fa-solid fa-bars'></i>
                                                </button>
                                                <div class='modal fade' id='detalleProducto_$evento->id_evento' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                    <div class='modal-dialog modal-dialog-centered'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h1 class='modal-title fs-5' id='exampleModalLabel'>Detalles del evento</h1>
                                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                            </div>
                                                            <!-- Aquí va el contenido del modal -->
                                                            ";
                                

                                
                                if ($evento->tipo == "De Pago") {

                                    $labelText_precio = " <h4 class='text-start fw-bold mb-3'>Costo boleto: <span class='fw-normal fs-5'>" . htmlspecialchars($precio_boleto) . "$</span></h5>";
                                    $labelText_boletos_disponibles = " <h4 class='text-start fw-bold mb-3'>Boletos: <span class='fw-normal fs-5'>" . htmlspecialchars($evento->boletos) . "</span></h5>";
                                    $inputs_evento_pago = "
                                    <div class='col-6'>
                                        <label for='cantidadboletos' class='form-label'>Boletos</label>
                                        <input type='number' min='1' max='300' class='form-control' id='cantidadBoletos' name='cantidadBoletos' value='$evento->boletos'>
                                    </div>
                                    <div class='col-6'>
                                        <label for='costo' class='form-label'>Costo por boleto</label>
                                        <input type='number' min='1' max='5000' class='form-control' id='costo' name='costo' value='$evento->precio_boleto'>
                                     </div>
                                    ";
                                } else {
                                    $labelText_precio = "";
                                    $labelText_boletos_disponibles = "";
                                    $inputs_evento_pago = "";
                                }
                                echo "
                                <div class='modal-body'>
                                    <h4 class='text-start fw-bold mb-3'>Nombre: <span class='fw-normal fs-5'>$evento->nombre</span></h4>
                                    <h4 class='text-start fw-bold mb-3'>Descripción: <span class='fw-normal fs-5'>$evento->descripcion</span></h4>
                                    <h4 class='text-start fw-bold mb-3'>Categoria: <span class='fw-normal fs-5'>$evento->categoria</span></h5>
                                        <h4 class='text-start fw-bold mb-3'>Lugar: <span class='fw-normal fs-5'>$evento->lugar_nombre</span></h5>
                                            <hr class='my-4'>
                                            <h4 class='text-start fw-bold mb-3'>Fecha evento: <span
                                                    class='fw-normal fs-5'> $fechaEvento</span></h5>
                                                <h4 class='text-start fw-bold mb-3'>Hora: <span class='fw-normal fs-5'>$horaInicio
                                                     " . " - " . " $horaFin</span></h5>
                                                    <hr class='my-4'>
                                                    <div class='row'>
                                                        <div class='col-6'>
                                                            <h4 class='text-start fw-bold mb-3'>Tipo: <span
                                                                    class='fw-normal fs-5'> $evento->tipo</span></h5>
                                                        </div>
                                                        <div class='col-6'>
                                                            <h4 class='text-start fw-bold mb-3'>Capacidad: <span
                                                                    class='fw-normal fs-5'>$evento->capacidad</span></h5>
                                                        </div>
                                                        <div class='col-6'> $labelText_precio</div>
                                                        <div class='col-6'> $labelText_boletos_disponibles</div>
                                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Botón que activa el modal de editar producto -->
                    <button type='button' class='btn btn-dark' data-bs-toggle='modal'
                        data-bs-target='#editarProducto_$evento->id_evento'>
                        <i class='fa-solid fa-pen-to-square'></i>
                    </button>
                    <div class='modal fade' id='editarProducto_$evento->id_evento' tabindex='-1' aria-labelledby='exampleModalLabel'
                        aria-hidden='true'>
                        <div class='modal-dialog modal-dialog-centered'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h1 class='modal-title fs-5' id='exampleModalLabel'>Editar Evento</h1>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <!-- Aquí va el contenido del modal -->
                                <div class='modal-body text-start'>
                                    <form method='post' enctype='multipart/form-data'>
                                        <input type='hidden' name='id_evento' value=$evento->id_evento>
                                        <input type='hidden' name='tipo' value='$evento->tipo'>
                                        <div class='mb-3'>
                                            <label for='nombre' class='form-label'>Editar Titulo</label>
                                            <input type='text' maxlength='50' class='form-control' id='nombre' name='nombre'
                                                value='$evento->nombre'>
                                        </div>
                                        <div class='mb-3'>
                                            <label for='descripcion' class='form-label'>Descripcion</label>
                                            <textarea name='descripcion' id='descripcion' name='descripcion'
                                                class='form-control'>$evento->descripcion</textarea>
                                        </div>
                                        <div class='row'>
                                            <div class='col-6 mb-3'>
                                                <label for='categoria' class='form-label'>Categoría</label>
                                                <select name='categoria' id='categoria' class='form-select'>
                                                    <?php
                                                    $consulta = 'SELECT id_categoria, nombre FROM categorias WHERE tipo = 'evento'";
                                $categorias = $db->select($consulta);
                                foreach ($categorias as $categoria) {
                                    echo "<option value='{$categoria->id_categoria}'>{$categoria->nombre}</option>";
                                }
                                echo "</select>
                                                </div>
                                                <div class='col-6 mb-3'>
                                                    <label for='lugar' class='form-label'>Lugar</label>
                                                    <select name='lugar' id='lugar' class='form-select'> ";
                                $consulta = "SELECT id_lugar, nombre FROM ubicacion_lugares";
                                $lugares = $db->select($consulta);
                                foreach ($lugares as $lugar) {
                                    echo "<option value='{$lugar->id_lugar}'>{$lugar->nombre}</option>";
                                }
                                echo "
                                </select>
                            </div>
                        </div>
                        <hr class='my-4'>
                        <div class='row'>
                            <div class='col-6 mb-3'>
                                <label for='fecha' class='form-label '>Fecha del Evento</label>
                                <input type='date' class='form-control' id='fechaEvento' name='fechaEvento'
                                    value='$evento->fecha_evento' required>
                            </div>
                            <div class='col-6'>
                                <label for='fechaPub' class='form-label'>Fecha de publicación</label>
                                <input type='date' class='form-control' id='fechaPub' name='fechaPub'
                                    value='$evento->fecha_publicacion' required>
                            </div>
                        </div>
                        <div class='row mb-3'>
                            <div class='col-6'>
                                <label for='horaFin' class='form-label'>Hora de Inicio</label>
                                <input type='time' min='11:00' max='21:00' class='form-control' id='horaIni' name='horaIni'
                                    value='$evento->hora_inicio' required>
                            </div>
                            <div class='col-6'>
                                <label for='horaFin' class='form-label'>Hora de Fin</label>
                                <input type='time' min='11:00' max='21:00' class='form-control' id='horaFin' name='horaFin'
                                    value='$evento->hora_fin' required>
                            </div>
                        </div>
                        <hr class='my-4'>
                        <div class='row'>
                            <div class='col-12 mb-3'>
                                <label for='cap' class='form-label'>Capacidad</label>
                                <input type='number' min='1' max='300' class='form-control' id='capacidad' name='capacidad'
                                    value='$evento->capacidad' required>
                            </div>
                        </div>
                        <div class='row'>
                         $inputs_evento_pago
                                </div>
                        <div class='mt-3 text-end'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                            <button type='submit' class='btn btn-dark' name='btnactualizar'
                                id='btnactualizar'>Actualizar</button>
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
                    $db->desconectarDB()
                        ?>
                </div>
            </div>
        </div>
    </div>
    <div id="floatingAlert" class="floating-alert" style="display: none;"></div>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/b820f07375.js" crossorigin="anonymous"></script>
    <script src="../js/alertas.js"></script>
    <script>
        function validateForm() {
            var capacidad = parseInt(document.getElementById('capacidad').value, 10);
            var tipoEvento = document.getElementById('tipo').value;

            console.log('capacidad:', capacidad); // Para depurar
            console.log('tipo:', tipoEvento); // Para depurar

            // Validar capacidad vs cantidad de boletos
            if (tipoEvento == 'De Pago') {
                var cantidadBoletos = parseInt(document.getElementById('cantidadBoletos').value, 10);
                if (cantidadBoletos > capacidad) {
                    showAlert('La cantidad de boletos no puede ser mayor que la capacidad del evento.', 'error');
                    return false; // Evita que el formulario se envíe
                }
            }

            // Validar fecha de publicación vs fecha del evento
            var fechaPub = new Date(document.getElementById('fechaPub').value);
            var fechaEvento = new Date(document.getElementById('fechaEvento').value);

            console.log('fechaPub:', fechaPub); // Para depurar
            console.log('fechaEvento:', fechaEvento);

            if (fechaPub > fechaEvento) {
                showAlert('La fecha de publicación no puede ser posterior a la fecha del evento.', 'error');
                return false; // Evita que el formulario se envíe
            }

            // Validar hora de fin vs hora de inicio
            var horaIni = document.getElementById('horaIni').value;
            var horaFin = document.getElementById('horaFin').value;

            console.log('horaIni:', horaIni); // Para depurar
            console.log('horaFin:', horaFin);

            if (horaFin <= horaIni) {
                showAlert('La hora de fin no puede ser menor o igual a la hora de inicio.', 'error');
                return false; // Evita que el formulario se envíe
            }

            return true; // Permite que el formulario se envíe
        }
    </script>
</body>

</html>
<?php
$db->desconectarDB();