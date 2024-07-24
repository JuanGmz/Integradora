<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direcciones</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/Sinfonía-Café-y-Cultura.webp">
    <?php
    session_start();
    include_once ("../class/database.php");
    include_once ("../scripts/funciones/funciones.php");
    $db = new database();
    $db->conectarDB();

    $query = "SELECT 
                d.id_domicilio,
                d.referencia,
                d.estado,
                d.ciudad,
                d.codigo_postal,
                d.colonia,
                d.calle,
                d.id_cliente,
                d.telefono
            FROM
                domicilios AS d
            JOIN
                clientes AS c ON d.id_cliente = c.id_cliente
            JOIN
                personas AS p ON c.id_persona = p.id_persona
            WHERE
                p.usuario = '$_SESSION[usuario]'";



    // Example of checking if a variable is set before using it
    if (isset($dir)) {
        echo $dir;
    } else {
        echo "Variable is not set.";
    }


    if (!isset($_SESSION["usuario"])) {
        header("Location: ../index.php");
        exit;
    }

    extract($_POST);

    if (isset($_POST["addDir"])) {
        if (strlen($codigo_postal === 5)) {
            showAlert("El código postal no puede tener más de 5 caracteres", "error");
        } else if (strlen($codigo_postal) < 5) {
            showAlert("El código postal no puede tener menos de 5 caracteres", "error");
        } else if (strlen($telefono) > 10) {
            showAlert("El teléfono no puede tener más de 10 caracteres", "error");
        } else if (strlen($telefono) < 10) {
            showAlert("El teléfono no puede tener menos de 10 caracteres", "error");
        } else {
            $queryDir = "INSERT INTO domicilios VALUES (NULL, $id, '$referencia', '$estado', '$ciudad', '$codigo_postal', '$colonia', '$calle', $telefono)";
            $db->execute($queryDir);
            showAlert("¡Dirección registrada con éxito!", "success");
            header("refresh:2;direcciones.php");
        }
    }

    if (isset($_POST["editDir"])) {
        if (strlen($cp) === 5 && strlen($telefono) === 10) {
            $query = "UPDATE domicilios SET 
                    referencia = '$referencia',
                    estado = '$estado',
                    ciudad = '$ciudad',
                    codigo_postal = '$cp',
                    colonia = '$colonia',
                    calle = '$calle',
                    telefono = $telefono
                    WHERE id_domicilio = $id_domicilio";
            $db->execute($query);
            showAlert("¡Dirección actualizada con éxito!", "success");
            header("refresh:2;direcciones.php");
        } else if (strlen($cp) < 5) {
            showAlert("El código postal no puede tener menos de 5 caracteres", "error");
        } else if (strlen($cp) > 5) {
            showAlert("El código postal no puede tener más de 5 caracteres", "error");
        } else if (strlen($telefono) > 10) {
            showAlert("El teléfono no puede tener más de 10 caracteres", "error");
        } else if (strlen($telefono) < 10) {
            showAlert("El teléfono no puede tener menos de 10 caracteres", "error");
        } else {
            showAlert("Error al actualizar el domicilio", "error");
        }
    }

    if (isset($_POST["deleteDir"])) {
        $query = "DELETE FROM domicilios WHERE id_domicilio = $id_domicilio";
        $db->execute($query);
        showAlert("¡Dirección eliminada con éxito!", "success");
        header("refresh:2;direcciones.php");
    }

    ?>
</head>

<body>

    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg shadow-lg mb-lg-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">
                <img src="../img/Sinfonía-Café-y-Cultura.webp" alt="Logo" class="logo" loading="lazy">
            </a>
            <div class="offcanvas offcanvas-end" style="background: var(--primario);" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
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
                <a class="nav-link dropdown-toggle ms-auto" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-user"></i> <?php echo $_SESSION['usuario']; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                    style="left: auto; right: 30px; top: 60px">
                    <a class="dropdown-item" href="perfil.php">Mi perfil</a>
                    <div class="dropdown-divider"></div>
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
                <li class="breadcrumb-item active" aria-current="page">Direcciones</li>
            </ol>
        </nav>

        <div class="row">
            <?php
            $direcciones = $db->select($query);
            foreach ($direcciones as $dir) {
                ?>
                <div class="col-lg-4">
                    <div class="card shadow-lg p-0 mb-5 bg-body rounded">
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold"><?php echo $dir->estado; ?></h5>
                            <hr>
                            <p class="card-text text-center mb-0"><i
                                    class="fa-solid fa-location-dot fa-3x rounded-circle"></i></p>
                            <p class="card-text text-center mb-0"><?php echo $dir->ciudad; ?></p>
                            <p class="card-text text-center mb-0"><?php echo $dir->calle; ?></p>
                            <p class="card-text text-center mb-0"><?php echo $dir->colonia; ?></p>
                            <p class="card-text text-center mb-0"><?php echo $dir->codigo_postal; ?></p>
                            <p class="card-text text-center mb-0"><?php echo $dir->referencia; ?></p>
                            <p class="card-text text-center mb-0"><?php echo $dir->telefono; ?></p>
                            <hr>
                            <div class="row d-flex justify-content-center">
                                <div class="col-3 m-0 p-0">
                                    <!-- Boton para eliminar direccion -->
                                    <div class="d-flex justify-content-center flex-column align-items-center">
                                        <button type="button" class="btn btn-danger btn-block shadow-lg m-0"
                                            data-bs-toggle="modal"
                                            data-bs-target="#eliminarDireccion<?php echo $dir->id_domicilio; ?>">
                                            Eliminar
                                        </button>
                                    </div>
                                </div>
                                <div class="col-3 m-0 p-0">
                                    <!-- Boton para editar direccion -->
                                    <div class="d-flex justify-content-center flex-column align-items-center">
                                        <button type="button" class="btn btn-dark btn-block shadow-lg m-0"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editarDireccion<?php echo $dir->id_domicilio; ?>">
                                            Editar
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal para editar direccion -->
                            <div class="modal fade" id="editarDireccion<?php echo $dir->id_domicilio; ?>"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Editar Direccion</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST">
                                                <input type="hidden" name="id_domicilio"
                                                    value="<?php echo $dir->id_domicilio; ?>">
                                                <div class="mb-3">
                                                    <label for="estado" class="form-label">Estado</label>
                                                    <input type="text" class="form-control" id="estado"
                                                        value="<?php echo $dir->estado; ?>" name="estado">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="ciudad" class="form-label">Ciudad</label>
                                                    <input type="text" class="form-control" id="ciudad"
                                                        value="<?php echo $dir->ciudad; ?>" name="ciudad">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="calle" class="form-label">Calle</label>
                                                    <input type="text" class="form-control" id="calle"
                                                        value="<?php echo $dir->calle; ?>" name="calle">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="colonia" class="form-label">Colonia</label>
                                                    <input type="text" class="form-control" id="colonia"
                                                        value="<?php echo $dir->colonia; ?>" name="colonia">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="cp" class="form-label">Código Postal</label>
                                                    <input type="text" class="form-control" id="cp"
                                                        value="<?php echo $dir->codigo_postal; ?>" name="cp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="referencia" class="form-label">Referencia</label>
                                                    <input type="text" class="form-control" id="referencia"
                                                        value="<?php echo $dir->referencia; ?>" name="referencia">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="telefono" class="form-label">Telefono</label>
                                                    <input type="text" class="form-control" id="telefono"
                                                        value="<?php echo $dir->telefono; ?>" name="telefono">
                                                </div>
                                                <div class="text-end ">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-dark"
                                                        name="editDir">Guardar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal para eliminar direccion -->
                            <div class="modal fade" id="eliminarDireccion<?php echo $dir->id_domicilio; ?>"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Editar Direccion</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST">
                                                <input type="hidden" name="id_domicilio"
                                                    value="<?php echo $dir->id_domicilio; ?>">
                                                <div class="mb-3">
                                                    <h5>Esta seguro de que desea eliminar esta dirección?</h5>
                                                </div>
                                                <div class="text-end ">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-danger"
                                                        name="deleteDir">Eliminar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="col-lg-4">
                <!-- Boton para agregar direccion -->
                <div class="d-flex justify-content-center flex-column align-items-center mt-lg-5 mt-0">
                    <button type="button" class="btn btn-dark btn-block shadow-lg mt-0 mt-lg-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="fa-solid fa-plus fa-10x rounded"></i>
                    </button>
                    <h3 class="mt-3">Agregar Nueva Dirección</h3>
                </div>
                <!-- Modal para agregar direccion -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Añadir nueva dirección</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $dir->id_cliente; ?>">
                                    <div class="mb-3">
                                        <label for="estado" class="form-label">Estado</label>
                                        <input type="text" class="form-control" id="estado" name="estado" maxlength="50"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ciudad" class="form-label">Ciudad</label>
                                        <input type="text" class="form-control" id="ciudad" name="ciudad" maxlength="50"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="referencia" class="form-label">Referencia</label>
                                        <input type="text" class="form-control" id="referencia" name="referencia"
                                            maxlength="50" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="calle" class="form-label">Calle</label>
                                        <input type="text" class="form-control" id="calle" name="calle" maxlength="50"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="colonia" class="form-label">Colonia</label>
                                        <input type="text" class="form-control" id="colonia" name="colonia"
                                            maxlength="50" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="codigo_postal" class="form-label">Código Postal</label>
                                        <input type="number" class="form-control" id="codigo_postal"
                                            name="codigo_postal" maxlength="5" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telefono" class="form-label">Teléfono</label>
                                        <input type="number" class="form-control" id="telefono" name="telefono"
                                            required>
                                    </div>
                                    <div class="text-end mt-4">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-dark" name="addDir">Agregar
                                            Dirección</button>
                                    </div>
                                </form>
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
</body>

</html>