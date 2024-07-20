<?php
date_default_timezone_set('America/Monterrey');
if ($_POST) {
    include '../class/database.php';
    include '../scripts/funciones/funciones.php';
    $conexion = new Database();

    $conexion->conectarDB();

    extract($_POST);

    if (isset($_POST['agRecompensa'])) {

        if ($fechainicio < date('Y-m-d') || $fechafin < date('Y-m-d') || $fechainicio > $fechafin || $fechafin < $fechainicio || $fechainicio == $fechafin) {
            showAlert("¡Los campos de fecha no son válidos!", "error");
        } else {
            // Directorio donde se guardarán las imágenes
            $subirDir = "../img/recompensas/";

            // Nombre del archivo subido
            $nombreImagen = basename($_FILES['imagen']['name']);

            // Ruta completa del archivo a ser guardado
            $imagen = $subirDir . $nombreImagen;

            // Mover el archivo subido a la carpeta de destino
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen)) {
                // Consulta para agregar la recompensa, con la URL de la imagen
                $consulta = "CALL sp_agregar_recompensa('$recompensa', '$condicion', '$fechainicio', '$fechafin', '$nombreImagen')";

                $conexion->execute($consulta);
                showAlert("¡Recompensa registrada con éxito!", "success");

            } else {
                showAlert("Hubo un error al subir la imagen", "error");
            }
        }
        $conexion->desconectarDB();
    } else if (isset($_POST['regAsistencia'])) {

        $verficausuario = "select * from personas where id_persona = $userid";
        $consulta = "insert into asistencias (id_cliente) values ($userid)";

        $resultado = $conexion->select($verficausuario);

        if (!empty($resultado)) {
            $conexion->execute($consulta);
            showAlert("¡Asistencia registrada con éxito!", "success");
        } else {
            showAlert("¡El usuario no existe!", "error");
        }
        $conexion->desconectarDB();
    } else if (isset($_POST['canjebtn'])) {

        $canjeproc = "call SP_canjear_recompensa($canjeid)";

        $resultado = $conexion->select($canjeproc);

        if ($resultado[0]->mensaje == "No cumple con la condición de la recompensa.") {
            showAlert("¡{$resultado[0]->mensaje}!", "error");
        } else if (
            $resultado[0]->mensaje == "El cupón de canje no existe."
        ) {
            showAlert("¡{$resultado[0]->mensaje}!", "error");

        } else if ($resultado[0]->mensaje == "Recompensa canjeada correctamente.") {
            showAlert("¡{$resultado[0]->mensaje}!", "success");
        }

    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Recompensas</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../img/Sinfonía-Café-y-Cultura.webp">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/scrollbar.css">
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
                    <h1 class="fw-bold text-light pt-2 me-auto">Recompensas</h1>
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
                                    class="fw-bold fs-6 ms-5 text-light text-decoration-none">
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
                            <h1 class="fw-bold text-light d-none d-lg-block">Recompensas</h1>
                        </div>
                        <div class="col-9 d-flex justify-content-end align-items-center gap-1 gap-lg-3">
                            <!-- Aquí va el botón del modal para registrar asistencias -->
                            <!-- Botón para registrar -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#canjearRecompensa">
                                Canjear recompensa
                            </button>
                            <!-- Aquí va el botón del modal para registrar asistencias -->
                            <!-- Botón para registrar -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#registrarAsistencias">
                                Registrar Asistencia
                            </button>
                            <!-- Aquí va el botón del modal para registrar recompensas -->
                            <!-- Botón para agregar -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#agregarRecompensa">
                                Agregar Recompensa
                            </button>
                            <!-- Botón para volver atras -->
                            <a href="../index.php" class="text-decoration-none d-none d-lg-block">
                                <i class="fa-solid fa-house fa-2x text-light"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Modal para agregar recompensa -->
                <div class="modal fade" id="agregarRecompensa" tabindex="-1" aria-labelledby="agregarRecompensaLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="agregarRecompensaLabel">Agregar Recompensa</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="recompensa" class="form-label">Recompensa</label>
                                        <input type="text" class="form-control" id="titulo" name="recompensa"
                                            maxlength="60" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="condicion" class="form-label">Condicion</label>
                                        <input type="number" class="form-control" id="condicion" name="condicion"
                                            max="20" min="1" required>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-6">
                                            <label for="fechainicio" class="form-label">Fecha Inicio</label>
                                            <input type="date" class="form-control" id="fechainicio" name="fechainicio"
                                                required>
                                        </div>
                                        <div class="col-6">
                                            <label for="fechafin" class="form-label">Fecha Expiracion</label>
                                            <input type="date" class="form-control" id="fechafin" name="fechafin"
                                                required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="imagen" class="form-label">Imagen</label>
                                        <input type="file" class="form-control" id="imagen" name="imagen"
                                            accept="image/*" required>
                                    </div>
                                    <div class="mt-3 text-end">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <!-- Botón para agregar -->
                                        <button type="submit" class="btn btn-primary" name="agRecompensa">Agregar
                                            recompensa</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal para registrar asistencias -->
                <div class="modal fade" id="registrarAsistencias" tabindex="-1"
                    aria-labelledby="registrarAsistenciasLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="registrarAsistenciasLabel">Registrar Asistencias</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="userid" class="form-label">Usuario id</label>
                                        <input type="number" class="form-control" id="userid" name="userid" min="1"
                                            required>
                                    </div>
                                    <div class="mt-3 text-end">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <!-- Botón para agregar -->
                                        <button type="submit" class="btn btn-primary" name="regAsistencia">Registrar
                                            Asistencia</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal para canjear recompensas -->
                <div class="modal fade" id="canjearRecompensa" tabindex="-1" aria-labelledby="canjearRecompensasLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="canjearRecompensasLabel">Canjear Recompensa</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="userid" class="form-label">Canje ID</label>
                                        <input type="number" class="form-control" id="userid" name="canjeid" min="1"
                                            required>
                                    </div>
                                    <div class="mt-3 text-end">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <!-- Botón para agregar -->
                                        <button type="submit" class="btn btn-primary" name="canjebtn">Canjear
                                            Recompensa</button>
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
                                <div class="row mb-3">
                                    <!-- Fecha Inicio -->
                                    <div class="col-md-4 mb-3">
                                        <label for="fechaInicio" class="form-label">Fecha Inicio</label>
                                        <input class="form-control" type="date" name="fechaInicio" id="fechaInicio">
                                    </div>

                                    <!-- Fecha Expiración -->
                                    <div class="col-md-4 mb-3">
                                        <label for="fechaExpiracion" class="form-label">Fecha Expiración</label>
                                        <input class="form-control" type="date" name="fechaExpiracion"
                                            id="fechaExpiracion">
                                    </div>

                                    <!-- Botón Buscar -->
                                    <div class="col-md-4 d-flex align-items-end">
                                        <input type="submit" class="btn btn-primary w-100" value="Buscar">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="alert floating-alert" id="floatingAlert">
                    <span id="alertMessage">Mensaje de la alerta.</span>
                </div>
            </div>
        </div>
    </div>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/b820f07375.js" crossorigin="anonymous"></script>
    <script src="../script/script.js"></script>
    <script src="../js/alertas.js"></script>
</body>

</html>