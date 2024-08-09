<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Reserva</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/Sinfonía-Café-y-Cultura.webp">
    <?php
    session_start();
    require_once '../class/database.php';
    include_once ("../scripts/funciones/funciones.php");
    $db = new database();
    $db->conectarDB();

    if (isset($_SESSION["usuario"])) {
        $rolUsuario = "SELECT r.rol FROM roles r JOIN roles_usuarios ru ON r.id_rol = ru.id_rol JOIN personas p ON ru.id_usuario = p.id_usuario WHERE p.usuario = '$_SESSION[usuario]'";
        $rol = $db->select($rolUsuario);

        extract($_POST);

        $queryReservas = "SELECT * FROM vw_reservas WHERE folio = $folio";
        $reserva = $db->select($queryReservas);

        $queryDetalle = "SELECT * FROM vw_detalle_reservas WHERE folio = $folio";
        $detalle = $db->select($queryDetalle);

        $queryComprobante = "SELECT * FROM comprobantes WHERE id_reserva = $folio";
        $comprobante = $db->select($queryComprobante);

        if (isset($_POST['subirComprobante'])) {
            $subirDir = "../img/comprobantes/";

            if (!file_exists($subirDir)) {
                mkdir($subirDir, 0777, true);
            }

            if (is_writable($subirDir)) {
                $nombreImagen = basename($_FILES['comprobante']['name']);
                $imagen = $subirDir . $nombreImagen;
                if (move_uploaded_file($_FILES['comprobante']['tmp_name'], $imagen)) {
                    $subirComprobante = "INSERT INTO comprobantes (id_reserva, concepto, folio_operacion, fecha, monto, banco_origen, imagen_comprobante) VALUES ($folio, '$concepto', '$folioOperacion', '$fecha', $monto, '$banco', '$nombreImagen')";
                    $db->execute($subirComprobante);
                    showAlert("El comprobante ha sido capturado con éxito!", "success");
                    header("refresh:2.5;reservas.php");
                } else {
                    showAlert("Error al subir el comprobante!", "error");
                    header("refresh:2.5;reservas.php");
                }
            } else {
                echo "El directorio $subirDir no tiene permisos de escritura.";
                echo "Permisos actuales: " . substr(sprintf('%o', fileperms($subirDir)), -4);
                echo "Usuario del script: " . get_current_user();
            }

        }

        if (isset($_POST['editarInfo'])) {
            $editarInfo = "UPDATE comprobantes SET concepto = '$concepto', folio_operacion = '$folioOperacion', fecha = '$fecha', monto = $monto, banco_origen = '$banco' WHERE id_reserva = $folio";
            $db->execute($editarInfo);
            showAlert("La información ha sido editada con éxito!", "success");
            header("refresh:2.5;reservas.php");
        }
    } else {
        header("location: ../index.php");
    }
    ?>
</head>

<body>

    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg shadow-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">
                <img src="../img/Sinfonía-Café-y-Cultura.webp" alt="Logo" class="logo" loading="lazy">
            </a>
            <div class="offcanvas offcanvas-end" style="background: var(--primario);" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title text-light fw-bold" id="offcanvasNavbarLabel">SifoníaCafé&Cultura
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="menu.php">Menú</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="ecommerce.php">Comprar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="recompensas.php">Recompensas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="eventos.php">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="publicaciones.php">Publicaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="contact.php">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php
            if (isset($_SESSION["usuario"])) {
                ?>
                <!-- Navbar con dropdown -->
                <a class="nav-link dropdown-toggle ms-auto" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-user"></i> <?php echo $_SESSION['usuario']; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                    style="left: auto; right: 30px; top: 60px">
                    <a class="dropdown-item" href="perfil.php">Mi perfil</a>
                    <a class="dropdown-item" href="bolsas/Carrito.php">Mi carrito</a>
                    <?php if ($rol[0]->rol === 'administrador') { ?>
                        <a class="dropdown-item" href="../views/adminInicio.php">Administrar</a>
                        <div class="dropdown-divider"></div>
                    <?php } ?>
                    <a class="dropdown-item" href="../scripts/login/cerrarsesion.php">Cerrar sesión</a>
                </div>
                <?php
            } else {
                ?>
                <a href="login.php" class="login-button ms-auto">Iniciar Sesión</a>
                <?php
            }
            ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

    </nav>
    <!-- NavBar End -->

    <div class="container rounded-3 mt-4 mt-lg-0 mb-4">
        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="perfil.php">Perfil</a></li>
                <li class="breadcrumb-item"><a href="reservas.php">Reservas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalle de la reserva</li>
            </ol>
        </nav>

        <div class="row m-3 m-lg-0">
            <div class="col-12 col-lg-7 me-5">
                <div class="row p-3 mb-3 bg-body rounded shadow-lg d-lg-flex justify-content-center align-items-center">
                    <div class="col-8">
                        <p>Evento: <?= $reserva[0]->evento ?></p>
                        <p>Descripción: <?= $detalle[0]->descripcion ?></p>
                        <p>Cantidad de Boletos: <?= $detalle[0]->c_boletos ?></p>
                    </div>
                    <div class="col-4 text-end">
                        <img src="../img/eventos/<?= $detalle[0]->img_url; ?>" class="img-fluid rounded" alt="evento"
                            style="width: 100px; height: 100px;">
                    </div>
                </div>
                <div class="row bg-body rounded shadow-lg p-3 mb-3">
                    <div class="col-12">
                        <?php
                        ?>
                        <div class="row">

                            <?php
                            if (empty($comprobante)) {
                                ?>
                                <div class="col-12 col-lg-9">
                                    <p class=" p-0 m-0 pt-lg-2">Aparte sus boletos.</p>
                                </div>
                                <div class="col-12 col-lg-3 mt-3 text-end m-lg-0 p-0">
                                    <!-- Botón que abre el modal para subir comprobante de pago -->
                                    <button type="button" class="btn btn-cafe w-100" data-bs-toggle="modal"
                                        data-bs-target="#subirComprobante">
                                        Subir comprobante
                                    </button>
                                    <div class="modal fade" id="subirComprobante" tabindex="-1"
                                        aria-labelledby="subirComprobanteLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="subirComprobanteLabel">Subir comprobante de
                                                        pago</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    <form method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="folio" value="<?= $reserva[0]->folio ?>">
                                                        <p>Realiza una transferencía bancaria a este número de cuenta para
                                                            apartar tus boletos.</p>
                                                        <p>Banco: Bancomer</p>
                                                        <p>Titular: Héctor Armando Caballero Serna</p>
                                                        <p>CLABE: 012345678901234567</p>
                                                        <p>Cuenta: 1234567890</p>
                                                        <p>Monto a transferir: $<?= $detalle[0]->monto_total ?></p>
                                                        <p>Todos los campos deben de coincidir con la imagen del
                                                            comprobante.</p>
                                                        <div class="mb-3 mt-3">
                                                            <label for="concepto" class="form-label">Concepto de
                                                                pago</label>
                                                            <input type="text" class="form-control" id="concepto"
                                                                name="concepto" required maxlength="50"
                                                                pattern="[A-Za-z0-9\s\-\.]{1,50}" placeholder="Concepto">
                                                        </div>
                                                        <div class="mb-3 mt-3">
                                                            <label for="folioOperacion" class="form-label">Folio de
                                                                operación</label>
                                                            <input type="text" class="form-control" id="folioOperacion"
                                                                name="folioOperacion" required maxlength="50"
                                                                pattern="[A-Za-z0-9]{1,50}"
                                                                placeholder="Folio de operación">
                                                        </div>
                                                        <div class="mb-3 mt-3">
                                                            <label for="banco" class="form-label">Banco de origen</label>
                                                            <input type="text" class="form-control" id="banco" name="banco"
                                                                pattern="[A-Za-z\s]{1,50}" required maxlength="50"
                                                                placeholder="Banco de origen">
                                                        </div>
                                                        <div class="mb-3 mt-3">
                                                            <label for="fecha" class="form-label">Fecha del pago</label>
                                                            <input type="date" class="form-control" id="fecha" name="fecha"
                                                                required placeholder="fecha" min="<?= date('Y-m-d') ?>">
                                                        </div>
                                                        <div class="mb-3 mt-3">
                                                            <label for="monto" class="form-label">Monto del pago</label>
                                                            <input type="number" min="1" class="form-control" id="monto"
                                                                name="monto" required placeholder="Monto del pago" min="1"
                                                                step="0.01">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="comprobante" class="form-label">Comprobante de
                                                                pago</label>
                                                            <input type="file" class="form-control" id="comprobante"
                                                                name="comprobante" required accept="image/*">
                                                        </div>
                                                        <div class="text-end">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn btn-cafe"
                                                                name="subirComprobante">Subir Comprobante</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            } else if ($reserva[0]->estatus === 'Apartada') {
                                ?>
                                    <div class="col-12">
                                        <p class=" p-0 m-0">Sus boletos fueron apartados, favor de enseñar esta ventana al
                                            administrador.</p>
                                    </div>
                                <?php
                            } else if ($reserva[0]->estatus === 'Cancelada') {
                                ?>
                                        <div class="col-12">
                                            <p class=" p-0 m-0">Su reserva fue cancelada.</p>
                                        </div>
                                <?php

                            } else {
                                ?>
                                        <div class="col-12 col-lg-8 p-0 m-0 d-md-flex align-items-center">
                                            <p class="p-0 m-0 pt-lg-2">Su reserva esta en revisión, favor de esperar.</p>
                                        </div>
                                        <div class="col-12 col-lg-4 mt-3 text-lg-end text-center">
                                            <div class="modal fade" id="editarComprobante" aria-hidden="true"
                                                aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Editar
                                                                Información</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-start">
                                                            <form method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="folio" value="<?= $reserva[0]->folio ?>">
                                                                <p>Realiza una transferencía bancaria a este número de cuenta para
                                                                    apartar tus boletos.</p>
                                                                <p>Banco: Bancomer</p>
                                                                <p>Titular: Héctor Armando Caballero Serna</p>
                                                                <p>CLABE: 012345678901234567</p>
                                                                <p>Cuenta: 1234567890</p>
                                                                <p>Monto a transferir: $<?= $detalle[0]->monto_total ?></p>
                                                                <p>Todos los campos deben de coincidir con la imagen del
                                                                    comprobante.</p>
                                                                <div class="mb-3 mt-3">
                                                                    <label for="concepto" class="form-label">Concepto de
                                                                        pago</label>
                                                                    <input type="text" class="form-control" id="concepto"
                                                                        name="concepto" required maxlength="50"
                                                                        placeholder="Concepto"
                                                                        value="<?= $comprobante[0]->concepto ?>">
                                                                </div>
                                                                <div class="mb-3 mt-3">
                                                                    <label for="folioOperacion" class="form-label">Folio de
                                                                        operación</label>
                                                                    <input type="text" class="form-control" id="folioOperacion"
                                                                        name="folioOperacion" required maxlength="50"
                                                                        placeholder="Folio de operación"
                                                                        value="<?= $comprobante[0]->folio_operacion ?>">
                                                                </div>
                                                                <div class="mb-3 mt-3">
                                                                    <label for="banco" class="form-label">Banco de origen</label>
                                                                    <input type="text" class="form-control" id="banco" name="banco"
                                                                        required maxlength="50" placeholder="Banco de origen"
                                                                        value="<?= $comprobante[0]->banco_origen ?>">
                                                                </div>
                                                                <div class="mb-3 mt-3">
                                                                    <label for="fecha" class="form-label">Fecha del pago</label>
                                                                    <input type="date" class="form-control" id="fecha" name="fecha"
                                                                        required placeholder="fecha"
                                                                        value="<?= $comprobante[0]->fecha ?>">
                                                                </div>
                                                                <div class="mb-3 mt-3">
                                                                    <label for="monto" class="form-label">Monto del pago</label>
                                                                    <input type="number" min="1" class="form-control" id="monto"
                                                                        name="monto" required placeholder="Monto del pago"
                                                                        value="<?= $comprobante[0]->monto ?>">
                                                                </div>
                                                                <div class="text-end mt-3">
                                                                    <button class="btn btn-secondary"
                                                                        data-bs-target="#editarComprobante"
                                                                        data-bs-dismiss="modal">Cerrar</button>
                                                                    <button type="button" class="btn btn-cafe"
                                                                        data-bs-target="#exampleModalToggle2"
                                                                        data-bs-toggle="modal">Actualizar Imagen</button>
                                                                    <button type="submit" class="btn btn-cafe"
                                                                        name="editarInfo">Guardar Cambios</button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="exampleModalToggle2" aria-hidden="true"
                                                aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Comprobante
                                                                de pago</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-start">
                                                            <form method='POST' enctype='multipart/form-data'
                                                                action="../scripts/eventos/editarComprobante.php">
                                                                <div class='mb-3'>
                                                                    <label for='imagen' class='form-label'>Imagen Actual</label><br>
                                                                    <img src='../img/comprobantes/<?= $comprobante[0]->imagen_comprobante ?>'
                                                                        class='img-fluid' alt='comprobante'><br>
                                                                    <small>Selecciona una nueva imagen para actualizar, si es
                                                                        necesario.</small>
                                                                </div>
                                                                <div class='mb-3'>
                                                                    <label for='imagen_nueva' class='form-label'>Selecciona una
                                                                        nueva imagen</label>
                                                                    <input type='file' class='form-control' id='imagen_nueva'
                                                                        name='imagen_nueva' accept='image/*' required>
                                                                </div>
                                                                <input type='hidden' name='folio' value='<?= $reserva[0]->folio ?>'>
                                                                <div class='mb-3 text-end'>
                                                                    <button type='button' class='btn btn-secondary'
                                                                        data-bs-dismiss='modal'>Cancelar</button>
                                                                    <button type='submit' class='btn btn-cafe'>Guardar
                                                                        Cambios</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-cafe w-100" data-bs-target="#editarComprobante"
                                                data-bs-toggle="modal">Cambiar Comprobante</button>
                                        </div>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row bg-body rounded shadow-lg p-3">
                    <div class="col-12">
                        <div class="row mb-0">
                            <div class="col-7">
                                <h4>Detalle reserva</h4>
                            </div>
                            <div class="col-5 text-end">
                                <?php
                                if ($reserva[0]->estatus === 'Cancelada') {
                                    ?>
                                    <span class="badge bg-danger fs-6 fw-bold">Cancelada</span>
                                    <?php
                                } else if ($reserva[0]->estatus === 'Apartada') {
                                    ?>
                                        <span class="badge bg-success fs-6 fw-bold">Apartada</span>
                                    <?php
                                } else {
                                    ?>
                                        <span class="badge bg-warning fs-6 fw-bold">Pendiente</span>
                                    <?php

                                }
                                ?>
                            </div>
                            <div class="row mb-0">
                                <div class="col-9">
                                    <p>Fecha Reserva: <?= $reserva[0]->fecha_hora_reserva ?></p>
                                </div>
                                <div class="col-3 mb-0 text-end">
                                    <p>Folio <?= $reserva[0]->folio ?></p>
                                </div>
                            </div>
                        </div>
                        <hr class="m-0">
                        <?php
                        ?>
                        <div class="row mt-3">
                            <div class="col-12">
                                <p>Boletos: $<?= $detalle[0]->monto_total ?></p>
                            </div>
                        </div>
                        <hr class="m-0">
                        <div class="row mt-3">
                            <div class="col-12">
                                <p>Total: $<?= $detalle[0]->monto_total ?></p>
                            </div>
                        </div>
                        <hr class="m-0">
                        <div class="row my-1">
                            <div class="col-12">
                                <h4 class="m-0">Dirección del evento</h4>
                            </div>
                        </div>
                        <hr class="m-0">
                        <div class="row mt-3">
                            <div class="col-12">
                                <p>Lugar: <?= $detalle[0]->lugar ?></p>
                            </div>
                            <div class="col-12">
                                <p>Ciudad: <?= $detalle[0]->ciudad ?></p>
                            </div>
                            <div class="col-12">
                                <p>Estado: <?= $detalle[0]->estado ?></p>
                            </div>
                            <div class="col-12">
                                <p>Colonia: <?= $detalle[0]->colonia ?></p>
                            </div>
                            <div class="col-12">
                                <p>C.P: <?= $detalle[0]->codigo_postal ?></p>
                            </div>
                            <div class="col-12">
                                <p>Calle: <?= $detalle[0]->calle ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alerta -->
        <div class="alert floating-alert" id="floatingAlert">
            <span id="alertMessage">Mensaje de la alerta.</span>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-auto">
        <div class="container-fluid p-5" style="background: var(--negroclaro);">
            <h2 class="text-center text-light mb-5">SinfoníaCafé&Cultura</h2>
            <hr class="text-light">
            <div class="container-fluid d-flex justify-content-center align-items-center flex-column p-4">
                <div class="row m-3 text-center">
                    <div class="col-4">
                        <a href="https://www.facebook.com/SinfoniaCoffee">
                            <i class="fa-brands fa-facebook text-light fa-2x text-center"></i>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="https://x.com/SinfoniaCoffee">
                            <i class="fa-brands fa-twitter text-light fa-2x text-center"></i>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="https://www.instagram.com/sinfoniacoffee/">
                            <i class="fa-brands fa-instagram text-light fa-2x text-center"></i>
                        </a>
                    </div>
                </div>
                <div class="row m-3">
                    <p class="text-center fw-bold text-light">Copyright © 2024 SinfoníaCafé&Cultura</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/45ef8dbe96.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="../js/alertas.js"></script>
</body>

</html>