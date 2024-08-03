<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Personales</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/Sinfonía-Café-y-Cultura.webp">
    <?php
    include_once("../class/database.php");
    include_once("../scripts/funciones/funciones.php");
    $db = new database();
    $db->conectarDB();
    session_start();

    if (isset($_SESSION["usuario"])) {
        extract($_POST);
        $query = "SELECT CONCAT_WS(' ', nombres, apellido_paterno, apellido_materno) AS nombre, correo, telefono, contrasena, id_persona FROM personas WHERE usuario = '$_SESSION[usuario]'";
        $datos = $db->select($query);
        $rolUsuario = "SELECT r.rol FROM roles r JOIN roles_usuarios ru ON r.id_rol = ru.id_rol JOIN personas p ON ru.id_usuario = p.id_usuario WHERE p.usuario = '$_SESSION[usuario]'";
        $rol = $db->select($rolUsuario);

        $queryCel = "SELECT telefono FROM personas";

        if (isset($_POST['actTelefono'])) {
            if ($tel === '') {
                showAlert("El teléfono no puede estar vacío", "error");
            } else if (strlen($tel) > 10) {
                showAlert("El teléfono no puede tener más de 10 caracteres", "error");
            } else {
                $query = "UPDATE personas SET telefono = $tel WHERE id_persona = $id";
                $db->execute($query);
                showAlert("¡Teléfono actualizado con éxito!", "success");
                header("refresh:2;datosPersonales.php");
            }
        }

        // PENDIENTEEEEEEEEEEEEEE
        if (isset($_POST['actPassword'])) {
            if ($password != $password2) {
                showAlert("Las contraseñas no coinciden", "error");
            } else {
                $query = "UPDATE personas SET contrasena = '$password' WHERE id_persona = $id";
                $db->execute($query);
                showAlert("¡Contraseña actualizada con éxito!", "success");
            }
        }
    } else {
        header("Location: ../index.php");
        exit;
    }
    ?>
</head>

<body>
    <!-- Botón de WhatsApp -->
    <button id="whatsappButton" class="btn btn-success position-fixed bottom-0 start-0 m-3 p-3 d-flex align-items-center justify-content-center z-3" type="button" onclick="window.open('https://wa.me/528711220994?text=%C2%A1Hola!%20Escribo%20desde%20la%20p%C3%A1gina%20web%20y%20quer%C3%ADa%20consultar%20por%3A', '_blank')">
        <i class="fa-brands fa-whatsapp fa-2x"></i>
    </button>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg shadow-lg mb-lg-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">
                <img src="../img/Sinfonía-Café-y-Cultura.webp" alt="Logo" class="logo" loading="lazy">
            </a>
            <div class="offcanvas offcanvas-end" style="background: var(--primario);" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title text-light fw-bold" id="offcanvasNavbarLabel">SifoníaCafé&Cultura</h5>
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
                <a class="nav-link dropdown-toggle ms-auto" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-user"></i> <?php echo $_SESSION['usuario']; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="left: auto; right: 30px; top: 60px">
                    <a class="dropdown-item" href="perfil.php">Mi perfil</a>
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
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- NavBar End -->

    <div class="container rounded-3 mt-lg-4 mt-lg-0 mb-lg-4">
        <div class="row d-lg-flex flex-column align-items-center">
            <div class="col-12 col-lg-6 p-5 rounded shadow-lg bg-body">
                <!-- Breadcrumbs -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-4">
                        <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="perfil.php">Perfil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Datos Personales</li>
                    </ol>
                </nav>
                <!-- Titulo -->
                <div class="fw-bold fs-2 mt-3 mb-4">
                    <h1 class="fw-bold">Datos Personales</h1>
                    <hr>
                </div>
                <?php
                ?>
                <div class="mb-3">
                    <h3>Nombre</h3>
                    <h5><?php echo $datos[0]->nombre; ?></h5>
                </div>
                <div class="mb-3">
                    <h3>Usuario</h3>
                    <h5><?php echo $_SESSION['usuario']; ?> </h5>
                </div>
                <div class="row mb-3">
                    <h3>Correo</h3>
                    <h5><?php echo $datos[0]->correo; ?></h5>
                </div>
                <div class="row mb-3">
                    <div class="col-8">
                        <h3>Teléfono</h3>
                        <h5><?php echo $datos[0]->telefono; ?></h5>
                    </div>
                    <div class="col-4 d-flex align-items-center justify-content-start">
                        <!-- Botón para abrir el modal de editar el telefono -->
                        <button data-bs-toggle="modal" data-bs-target="#modalEditarTel" class="btn btn-cafe">Editar</button>
                        <!-- Modal para editar el telefono -->
                        <div class="modal fade" id="modalEditarTel" tabindex="-1" aria-labelledby="modalEditarTelLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEditarTelLabel">Editar Número de Télefono</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-start">
                                        <form method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo $datos[0]->id_persona; ?>">
                                            <div class="mb-3">
                                                <label for="tel" class="form-label">Teléfono</label>
                                                <input type="number" class="form-control" id="tel" name="tel" value="<?php echo $datos[0]->telefono; ?>" required>
                                            </div>
                                            <div class="text-end">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary" name="actTelefono">Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-8">
                        <h3>Contraseña</h3>
                        <h5>*************</h5>
                    </div>
                    <div class="col-4 d-flex justify-content-start align-items-center">
                        <!-- Botón para abrir el modal de editar el password -->
                        <button data-bs-toggle="modal" data-bs-target="#modalEditarPass" class="btn btn-cafe">Editar</button>
                        <!-- Modal para editar el password -->
                        <div class="modal fade" id="modalEditarPass" tabindex="-1" aria-labelledby="editarPass" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editarPass">Cambiar contraseña</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-start">
                                        <form method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo $datos[0]->id_persona; ?>">
                                            <div class="mb-3">
                                                <label for="pass" class="form-label">Ingresar Nueva Contraseña</label>
                                                <input type="password" class="form-control" id="pass" name="password" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pass" class="form-label">Confirmar Contraseña</label>
                                                <input type="password" class="form-control" id="pass" name="password2" required>
                                            </div>
                                            <div class="text-end">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary" name="actPassword">Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert floating-alert" id="floatingAlert">
            <span id="alertMessage">Mensaje de la alerta.</span>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container-fluid p-5 " style="background: var(--negroclaro);">
            <h2 class="text-center text-light mb-5">SinfoníaCafé&Cultura</h2>
            <hr class="text-light">
            <div class="container-fluid d-flex justify-content-center align-items-center flex-column p-4">
                <div class="row m-3 text-center">
                    <div class="col-3">
                        <a href="https://www.facebook.com/SinfoniaCoffee">
                            <i class="fa-brands fa-facebook text-light fa-2x text-center"></i>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="https://x.com/SinfoniaCoffee">
                            <i class="fa-brands fa-twitter text-light fa-2x text-center"></i>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="https://www.instagram.com/sinfoniacoffee/">
                            <i class="fa-brands fa-instagram text-light fa-2x text-center"></i>
                        </a>
                    </div>
                    <div class="col-3">
                        <i class="fa-brands fa-youtube text-light fa-2x text-center"></i>
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
    <script src="../script/script.js"></script>
</body>

</html>