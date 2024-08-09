<?php
date_default_timezone_set('America/Monterrey');
if ($_POST) {
    session_start();
    require_once '../class/database.php';
    include_once("../scripts/funciones/funciones.php");
    $db = new database();
    $db->conectarDB();

    $rolUsuario = "SELECT r.rol FROM roles r JOIN roles_usuarios ru ON r.id_rol = ru.id_rol JOIN personas p ON ru.id_usuario = p.id_usuario WHERE p.usuario = '$_SESSION[usuario]'";
    $rol = $db->select($rolUsuario);

    if ($rol[0]->rol !== 'administrador') {
        header('Location: ../index.php');
    }

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

                $db->execute($consulta);
                showAlert("¡Recompensa registrada con éxito!", "success");
            } else {
                showAlert("Hubo un error al subir la imagen", "error");
            }
        }
        $db->desconectarDB();
    } else if (isset($_POST['regAsistencia'])) {

        $verficausuario = "select * from personas where id_persona = $userid";
        $consulta = "insert into asistencias (id_cliente) values ($userid)";

        $resultado = $db->select($verficausuario);

        if (!empty($resultado)) {
            $db->execute($consulta);
            showAlert("¡Asistencia registrada con éxito!", "success");
        } else {
            showAlert("¡El usuario no existe!", "error");
        }
        $db->desconectarDB();
    } else if (isset($_POST['canjebtn'])) {

        $canjeproc = "call SP_canjear_recompensa($canjeid)";

        $resultado = $db->select($canjeproc);

        if ($resultado[0]->mensaje == "No cumple con la condición de la recompensa.") {
            showAlert("¡{$resultado[0]->mensaje}!", "error");
        } else if (
            $resultado[0]->mensaje == "El cupón de canje no existe."
        ) {
            showAlert("¡{$resultado[0]->mensaje}!", "error");
        } else if ($resultado[0]->mensaje == "Recompensa canjeada correctamente.") {
            showAlert("¡{$resultado[0]->mensaje}!", "success");
        } else if ($resultado[0]->mensaje == "La recompensa ya ha sido canjeada previamente.") {
            showAlert("¡{$resultado[0]->mensaje}!", "error");
        }
    } else if (isset($_POST["actRecompensa"])) {
        if (isset($_FILES["imagen_nueva"]["name"])) {
            $subirDir = "../img/recompensas/";
            $nombreImagen = basename($_FILES['imagen_nueva']['name']);
            $imagen_nueva = $subirDir . $nombreImagen;
            move_uploaded_file($_FILES['imagen_nueva']['tmp_name'], $imagen_nueva);

            $queryAct = "UPDATE recompensas SET img_url = '$nombreImagen' WHERE id_recompensa = $id_recompensa";
            $db->execute($queryAct);
            showAlert("¡Imagen actualizada con éxito!", "success");
        } else
            showAlert("¡Hubo un error al subir la imagen!", "error");
    } else if (isset($_POST['btnestatus'])) {
        extract($_POST);
        $consulta = "UPDATE recompensas SET mostrar = $estatus WHERE id_recompensa = $id;";

        $db->select($consulta);

        showAlert("Se actualizo el estatus correctamente", "success");
    }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Recompensas</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../img/Sinfonía-Café-y-Cultura.webp">
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
                        <a href="adminInicio.php">
                            <h2 class="accordion-header">
                                <button class="row accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-inicio" aria-expanded="false" aria-controls="flush-inicio">
                                    <div class="col-6">
                                        <i class="fa-solid fa-house-laptop me-1"></i>
                                        Inicio
                                    </div>
                                </button>
                            </h2>
                        </a>
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-menu" aria-expanded="false" aria-controls="flush-menu">
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
                                <a href="adminMenu.php" class="ms-5 text-light fw-bold fs-5 text-decoration-none" aria-current="true">
                                    Administrar Menú
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-events" aria-expanded="false" aria-controls="flush-events">
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
                                <a href="adminEventos.php" class="text-light fw-bold fs-5 text-decoration-none ms-5" aria-current="true">
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
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-ecommerce" aria-expanded="false" aria-controls="flush-ecommerce">
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
                                <a href="adminPedidos.php" class="fw-bold fs-5 ms-5 text-light text-decoration-none" aria-current="true">
                                    Administrar Pedidos
                                </a><br><br>
                                <a href="adminProductosEcommerce.php" class="fw-bold fs-5 ms-5 text-light text-decoration-none">
                                    Administrar Productos
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-blog" aria-expanded="false" aria-controls="flush-blog">
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
                                <a href="adminPublicaciones.php" class="fw-bold fs-5 ms-5 text-light text-decoration-none" aria-current="true">
                                    Administrar Publicaciones
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-rewards" aria-expanded="false" aria-controls="flush-rewards">
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
                                <a href="adminRecompensas.php" class="fw-bold fs-5 ms-5 text-light text-decoration-none" aria-current="true">
                                    Administrar Recompensas
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-dark bagr-cafe4">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <h1 class="fw-bold text-light pt-2 me-auto">Recompensas</h1>
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
                        <a class="fw-bold bagr-cafe4 text-light text-decoration-none" href="adminInicio.php" aria-expanded="false">
                            <i class="fa-solid fa-house-laptop"></i>
                            Inicio
                        </a>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-menu" aria-expanded="false" aria-controls="flush-menu">
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
                                <a href="adminMenu.php" class="ms-5 text-light fw-bold fs-6 text-decoration-none" aria-current="true">
                                    Administrar Menú
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-events" aria-expanded="false" aria-controls="flush-events">
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
                                <a href="adminEventos.php" class="text-light fw-bold fs-6 text-decoration-none ms-5" aria-current="true">
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
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-ecommerce" aria-expanded="false" aria-controls="flush-ecommerce">
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
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-blog" aria-expanded="false" aria-controls="flush-blog">
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
                                <a href="adminPublicaciones.php" class="fw-bold fs-6 ms-5 text-light text-decoration-none" aria-current="true">
                                    Administrar Publicaciones
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bagr-cafe4 text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-rewards" aria-expanded="false" aria-controls="flush-rewards">
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
                                <a href="adminRecompensas.php" class="fw-bold fs-6 ms-5 text-light text-decoration-none" aria-current="true">
                                    Administrar Recompensas
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
                            <h1 class="fw-bold text-light d-none d-lg-block">Recompensas</h1>
                        </div>
                        <div class="col-9 d-flex justify-content-end align-items-center gap-1 gap-lg-3">
                            <!-- Aquí va el botón del modal para registrar asistencias -->
                            <!-- Botón para registrar -->
                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#canjearRecompensa">
                                Canjear recompensa
                            </button>
                            <!-- Aquí va el botón del modal para registrar asistencias -->
                            <!-- Botón para registrar -->
                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#registrarAsistencias">
                                Registrar Asistencia
                            </button>
                            <!-- Aquí va el botón del modal para registrar recompensas -->
                            <!-- Botón para agregar -->
                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#agregarRecompensa">
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
                <div class="modal fade" id="agregarRecompensa" tabindex="-1" aria-labelledby="agregarRecompensaLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="agregarRecompensaLabel">Agregar Recompensa</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="recompensa" class="form-label">Recompensa</label>
                                        <input type="text" class="form-control" id="titulo" name="recompensa" maxlength="60" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="condicion" class="form-label">Condicion</label>
                                        <input type="number" class="form-control" id="condicion" name="condicion" max="20" min="1" required>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-6">
                                            <label for="fechainicio" class="form-label">Fecha Inicio</label>
                                            <input type="date" class="form-control" id="fechainicio" name="fechainicio" min="<?= date('Y-m-d') ?>" required>
                                        </div>
                                        <?php
                                        // Calcula la fecha de hoy
                                        $today = date('Y-m-d');

                                        // Calcula la fecha del siguiente día
                                        $next_day = date('Y-m-d', strtotime('+1 day', strtotime($today)));
                                        ?>
                                        <div class="col-6">
                                            <label for="fechafin" class="form-label">Fecha Expiracion</label>
                                            <input type="date" class="form-control" id="fechafin" name="fechafin" min="<?= $next_day ?>" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class='d-flex justify-content-center align-items-center'>
                                            <i class='fa-solid fa-circle-info me-2'></i>
                                            <p class='mb-0'>El periodo de tiempo no
                                                podrá modificarse
                                                posteriormente.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="imagen" class="form-label">Imagen</label>
                                        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" required>
                                    </div>
                                    <div class="mt-3 text-end">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <!-- Botón para agregar -->
                                        <button type="submit" class="btn btn-dark" name="agRecompensa">Agregar
                                            Recompensa</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal para registrar asistencias -->
                <div class="modal fade" id="registrarAsistencias" tabindex="-1" aria-labelledby="registrarAsistenciasLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="registrarAsistenciasLabel">Registrar Asistencias</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="userid" class="form-label">Id del cliente</label>
                                        <input type="number" class="form-control" id="userid" name="userid" min="1" required>
                                    </div>
                                    <div class="mt-3 text-end">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <!-- Botón para agregar -->
                                        <button type="submit" class="btn btn-dark" name="regAsistencia">Registrar
                                            Asistencia</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal para canjear recompensas -->
                <div class="modal fade" id="canjearRecompensa" tabindex="-1" aria-labelledby="canjearRecompensasLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="canjearRecompensasLabel">Canjear Recompensa</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="userid" class="form-label">Cupón de Canjeo</label>
                                        <input type="number" class="form-control" id="userid" name="canjeid" min="1" required>
                                    </div>
                                    <div class="mt-3 text-end">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <!-- Botón para agregar -->
                                        <button type="submit" class="btn btn-dark" name="canjebtn">Canjear
                                            Recompensa</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row bagr-cafe3 d-lg-none py-3 d-flex justify-content-center m-0 p-0">
                    <div class="col-6 text-center">
                        <!-- Aquí va el botón del modal para registrar asistencias -->
                        <!-- Botón para registrar -->
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#canjearRecompensa">
                            Canjear recompensa
                        </button>
                    </div>
                    <div class="col-6 text-center">
                        <!-- Aquí va el botón del modal para registrar asistencias -->
                        <!-- Botón para registrar -->
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#registrarAsistencias">
                            Registrar Asistencia
                        </button>
                    </div>
                </div>
                <div class="shadow-lg row p-0 m-0 p-2" style="background: var(--color6);">
                    <div class="row m-1">
                        <div class="col-12">
                            <form method="post">
                                <div class="row mb-3">
                                    <!-- Fecha Inicio -->
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="fechaInicio" class="form-label">Fecha Inicio</label>
                                        <input class="form-control" type="date" name="fechaInicio" id="fechaInicio" required value="<?= isset($_SESSION['fechaInicio']) ? $_SESSION['fechaInicio'] : '' ?>">
                                    </div>
                                    <!-- Fecha Expiración -->
                                    <div class="col-12 col-lg-4 mb-3">
                                        <label for="fechaExpiracion" class="form-label">Fecha Expiración</label>
                                        <input class="form-control" type="date" name="fechaExpiracion" id="fechaExpiracion" required value="<?= isset($_SESSION['fechaExpiracion']) ? $_SESSION['fechaExpiracion'] : '' ?>">
                                    </div>
                                    <!-- Botón Buscar -->
                                    <div class="col-12 col-lg-4 mb-2 d-flex justify-content-center align-items-center mt-4">
                                        <input type="submit" class="btn btn-dark w-100" value="Buscar" name="btnBuscar">
                                    </div>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['btnBuscar'])) {
                                extract($_POST);
                                $_SESSION['fechaInicio'] = $_POST['fechaInicio'];
                                $_SESSION['fechaExpiracion'] = $_POST['fechaExpiracion'];
                            
                                $fechaInicio = $_SESSION['fechaInicio'];
                                $fechaExpiracion = $_SESSION['fechaExpiracion'];
                            
                                $query = "SELECT * FROM recompensas WHERE (fecha_inicio BETWEEN '$fechaInicio' AND '$fechaExpiracion') OR (fecha_expiracion BETWEEN '$fechaInicio' AND '$fechaExpiracion') ORDER BY fecha_inicio ASC";
                                $recompensas = $db->select($query);
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <div class="d-lg-none mb-3 m-3 m-0 p-0">
                    <button type="button" class="btn w-100 btn-dark shadow-lg" data-bs-toggle="modal" data-bs-target="#agregarRecompensa">
                        <i class="fa-solid fa-plus fa-2x"></i>
                    </button>
                </div>
                <div class="row mt-3 p-4 m-0">
                    <?php
                    if (isset($recompensas)) {
                        if (empty($recompensas)) {
                    ?>
                            <div class="text-center row m-0 p-0 p-2">No hay recompensas registradas en este periodo de tiempo.
                            </div>
                            <table class="table table-dark table-striped table-hover text-center border-3 border-black border-bottom border-end border-start d-none">
                            <?php
                        } else {
                            ?>
                                <table class="table table-dark table-striped table-hover text-center border-3 border-black border-bottom border-end border-start">
                                    <thead>
                                        <th>Recompensa</th>
                                        <th class="d-none d-lg-table-cell">Condición</th>
                                        <th class="d-none d-lg-table-cell">Fecha Inicio</th>
                                        <th class="d-none d-lg-table-cell">Fecha Expiración</th>
                                        <th>Estatus</th>
                                        <th>Acciones</th>
                                    </thead>
                                    <tbody class="table-group-divider table-light">
                                        <?php
                                        foreach ($recompensas as $recompensa) {
                                        ?>
                                            <tr>
                                                <td><?= $recompensa->recompensa ?></td>
                                                <td class="d-none d-lg-table-cell"><?= $recompensa->condicion ?></td>
                                                <td class="d-none d-lg-table-cell"><?= $recompensa->fecha_inicio ?></td>
                                                <td class=" d-none d-lg-table-cell">
                                                    <?= $recompensa->fecha_expiracion ?>
                                                </td>
                                                <td><?= $recompensa->estatus ?></td>
                                                <td class="d-flex flex-row align-items-center justify-content-center gap-1">
                                                    <!-- Botón para detalle recompensa -->
                                                    <button type="button" class="btn btn-dark d-table-cell d-lg-none" data-bs-toggle="modal" data-bs-target="#detalleRecompensa<?= $recompensa->id_recompensa ?>">
                                                        <i class="fa-solid fa-bars"></i>
                                                    </button>
                                                    <!-- modal de recompensa -->
                                                    <div class="modal fade" id="detalleRecompensa<?= $recompensa->id_recompensa ?>" tabindex="-1" aria-labelledby="detalleRecompensaLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="detalleRecompensaLabel">Recompensa
                                                                    </h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body text-start">
                                                                    <h2 class="d-inline fw-bold my-3">Recompensa: <span>
                                                                            <h4 class="d-inline fw-normal">
                                                                                <?= $recompensa->recompensa ?>
                                                                            </h4>
                                                                        </span></h2><br>
                                                                    <h2 class="d-inline fw-bold my-3">Condición: <span>
                                                                            <h4 class="d-inline fw-normal">
                                                                                <?= $recompensa->condicion ?>
                                                                            </h4>
                                                                        </span></h2><br>
                                                                    <h2 class="d-inline fw-bold my-3">Fecha de Inicio: <span>
                                                                            <h4 class="d-inline fw-normal">
                                                                                <?= $recompensa->fecha_inicio ?>
                                                                            </h4>
                                                                        </span></h2><br>
                                                                    <h2 class="d-inline fw-bold my-3">Fecha de Expiración: <span>
                                                                            <h4 class="d-inline fw-normal">
                                                                                <?= $recompensa->fecha_expiracion ?>
                                                                            </h4>
                                                                        </span></h2><br>
                                                                    <h2 class="d-inline fw-bold my-3">Estatus: <span>
                                                                            <h4 class="d-inline fw-normal">
                                                                                <?= $recompensa->estatus ?>
                                                                            </h4>
                                                                        </span></h2><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Botón para editar imagen -->
                                                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#editarRecompensa<?= $recompensa->id_recompensa ?>">
                                                        <i class="fa-solid fa-image"></i>
                                                    </button>
                                                    <!-- Modal de editar recompensa -->
                                                    <div class="modal fade" id="editarRecompensa<?= $recompensa->id_recompensa ?>" tabindex="-1" aria-labelledby="editarRecompensaLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editarRecompensaLabel">
                                                                        <?= $recompensa->recompensa ?>
                                                                    </h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body text-start">
                                                                    <form method="post" enctype="multipart/form-data">
                                                                        <div class='col-12 mb-3'>
                                                                            <label for='imagen' class='form-label'>Imagen
                                                                                Actual</label><br>
                                                                            <img src='../img/recompensas/<?= $recompensa->img_url ?>' class='img-fluid' alt='imagen<?= $recompensa->recompensa ?>'><br>
                                                                            <small>Selecciona una nueva imagen para actualizar, si
                                                                                es necesario.</small>
                                                                        </div>
                                                                        <div class='col-12 mb-3'>
                                                                            <label for='imagen_nueva' class='form-label'>Selecciona
                                                                                una nueva imagen</label>
                                                                            <input type='file' class='form-control' id='imagen_nueva' name='imagen_nueva' accept='image/*' required>
                                                                        </div>
                                                                        <input type='hidden' name='id_recompensa' value='<?= $recompensa->id_recompensa ?>'>
                                                                        <div class='col-12 mb-3 text-end'>
                                                                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                                                            <button type='submit' class='btn btn-dark' name='actRecompensa'>Actualizar</button>
                                                                        </div>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form method='POST'>

                                                        <?php

                                                        if ($recompensa->mostrar == false) {
                                                        ?>
                                                            <input type="hidden" name="estatus" value="true" required>
                                                            <button type="submit" name="btnestatus" class="btn btn-danger"><i class="fa-solid fa-eye-slash"></i></button>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <input type="hidden" name="estatus" value="false" required>
                                                            <button type="submit" name="btnestatus" class="btn btn-success"><i class="fa-solid fa-eye"></i></button>
                                                        <?php
                                                        }
                                                        ?>
                                                        <input type='hidden' name='id' value='<?= $recompensa->id_recompensa ?>' required>
                                                    </form>
                </div>
                </td>
                </tr>
            <?php
                                        }
            ?>
            </tbody>
            </table>
        <?php
                        }
                    } else {
        ?>
        <div class="text-center row m-0 p-0 p-2">Selecciona un periodo de tiempo para ver las recompensas.</div>
    <?php
                    }
    ?>
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