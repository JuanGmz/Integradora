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
require_once '../class/database.php';
include_once ("../scripts/funciones/funciones.php");
$db = new database();
$db->conectarDB();

if (isset($_SESSION["usuario"])) {
    $queryDirecciones = "SELECT d.* FROM domicilios d JOIN clientes c ON d.id_cliente = c.id_cliente JOIN personas p ON c.id_persona = p.id_persona WHERE p.usuario = '$_SESSION[usuario]'";
    $direcciones = $db->select($queryDirecciones);

    $rolUsuario = "SELECT r.rol FROM roles r JOIN roles_usuarios ru ON r.id_rol = ru.id_rol JOIN personas p ON ru.id_usuario = p.id_usuario WHERE p.usuario = '$_SESSION[usuario]'";
    $rol = $db->select($rolUsuario);

    $cliente = "SELECT id_cliente FROM clientes c JOIN personas p ON c.id_persona = p.id_persona WHERE p.usuario = '$_SESSION[usuario]'";
    $id_cliente = $db->select($cliente);

    extract($_POST);

    if (isset($_POST["addDir"])) {
        if (strlen($codigo_postal) != 5) {
            showAlert("El código postal debe tener exactamente 5 caracteres", "error");
        } else if (strlen($telefono) !== 10) {
            showAlert("El teléfono debe tener exactamente 10 caracteres", "error");
        } else {
            $queryDir = "INSERT INTO domicilios VALUES (NULL, ". $id_cliente[0]->id_cliente .", '$referencia', '$estado', '$ciudad', '$codigo_postal', '$colonia', '$calle', $telefono)";
            $db->execute($queryDir);
            showAlert("¡Dirección registrada con éxito!", "success");
            header("refresh:2;direcciones.php");
        }
    }

    if (isset($_POST["editDir"])) {
        if (strlen($codigo_postal) === 5 && strlen($telefono) === 10) {
            $query = "UPDATE domicilios SET 
                    referencia = '$referencia',
                    estado = '$estado',
                    ciudad = '$ciudad',
                    codigo_postal = '$codigo_postal',
                    colonia = '$colonia',
                    calle = '$calle',
                    telefono = $telefono
                    WHERE id_domicilio = $id_domicilio";
            $db->execute($query);
            showAlert("¡Dirección actualizada con éxito!", "success");
            header("refresh:2;direcciones.php");
        } else if (strlen($codigo_postal) < 5) {
            showAlert("El código postal no puede tener menos de 5 caracteres", "error");
        } else if (strlen($codigo_postal) > 5) {
            showAlert("El código postal no puede tener más de 5 caracteres", "error");
        } else if (strlen($telefono) > 10) {
            showAlert("El teléfono no puede tener más de 10 caracteres", "error");
        } else if (strlen($telefono) < 10) {
            showAlert("El teléfono no puede tener menos de 10 caracteres", "error");
        } else {
            showAlert("Error al actualizar el domicilio", "error");
        }
    }

    if (isset($_POST["deleteDir"])) {
        $queryCheck = "SELECT id_domicilio FROM pedidos WHERE id_domicilio = $id_domicilio";
        $result = $db->select($queryCheck);

        if ($result) {
            showAlert("No se puede eliminar una dirección en uso", "error");
        } else {
            $query = "DELETE FROM domicilios WHERE id_domicilio = $id_domicilio";
            $db->execute($query);
            showAlert("¡Dirección eliminada con éxito!", "success");
            header("refresh:2;direcciones.php");
        }
    }

    // Verificación para deshabilitar el botón de eliminar
    function isDireccionEnUso($id_domicilio) {
        global $db;
        $queryCheck = "SELECT id_domicilio FROM pedidos WHERE id_domicilio = $id_domicilio";
        $result = $db->select($queryCheck);
        return !empty($result);
    }
} else {
    header("location: ../index.php");
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

    <div class="container rounded-3 mt-4 mt-lg-0 mb-4">
        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="perfil.php">Perfil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Direcciones</li>
            </ol>
        </nav>

        <h1>Mis Direcciones</h1>
        <hr>
                <div class="row">
            <?php
            foreach ($direcciones as $domicilio) {
                // Verificar si la dirección está en uso
                $direccionEnUso = isDireccionEnUso($domicilio->id_domicilio); 

                ?>
                <div class="col-lg-4">
                    <div class="card shadow-lg p-0 mb-5 bg-body rounded">
                        <div class="card-body">
                            <h5 class="card-title text-center fw-bold"><?php echo $domicilio->estado; ?></h5>
                            <hr>
                            <p class="card-text text-center mb-0"><i class="fa-solid fa-location-dot fa-3x rounded-circle"></i></p>
                            <p class="card-text text-center mb-0"><?php echo $domicilio->ciudad; ?></p>
                            <p class="card-text text-center mb-0"><?php echo $domicilio->calle; ?></p>
                            <p class="card-text text-center mb-0"><?php echo $domicilio->colonia; ?></p>
                            <p class="card-text text-center mb-0"><?php echo $domicilio->codigo_postal; ?></p>
                            <p class="card-text text-center mb-0"><?php echo $domicilio->referencia; ?></p>
                            <p class="card-text text-center mb-0"><?php echo $domicilio->telefono; ?></p>
                            <hr>
                            <div class="row d-flex justify-content-center">
                                <div class="col-5 m-0 p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="input-group">
                                            <button type="button" class="btn btn-danger <?php echo $direccionEnUso ? 'disabled' : ''; ?>"
                                                data-bs-toggle="modal"
                                                data-bs-target="#eliminarDireccion<?php echo $domicilio->id_domicilio; ?>"
                                                <?php echo $direccionEnUso ? 'aria-disabled="true"' : ''; ?>>
                                                Eliminar
                                            </button>
                                            <button type='button' class='btn btn-secondary' data-bs-toggle='popover' title='Información' data-bs-content='No se podrá eliminar si la dirección se encuentra en uso.'>
                                                <i class='fa-solid fa-info'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 m-0 p-0">
                                    <!-- Botón para editar dirección -->
                                    <div class="d-flex justify-content-center flex-column align-items-center">
                                        <button type="button" class="btn btn-dark btn-block shadow-lg m-0"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editarDireccion<?php echo $domicilio->id_domicilio; ?>">
                                            Editar
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal para editar dirección -->
                            <div class="modal fade" id="editarDireccion<?php echo $domicilio->id_domicilio; ?>"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Editar Dirección</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST">
                                                <input type="hidden" name="id_domicilio" value="<?php echo $domicilio->id_domicilio; ?>">
                                                <div class="mb-3">
                                                    <label for="estado" class="form-label">Estado</label>
                                                    <input type="text" class="form-control" id="estado"
                                                        value="<?php echo $domicilio->estado; ?>" name="estado">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="ciudad" class="form-label">Ciudad</label>
                                                    <input type="text" class="form-control" id="ciudad"
                                                        value="<?php echo $domicilio->ciudad; ?>" name="ciudad">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="calle" class="form-label">Calle</label>
                                                    <input type="text" class="form-control" id="calle"
                                                        value="<?php echo $domicilio->calle; ?>" name="calle">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="colonia" class="form-label">Colonia</label>
                                                    <input type="text" class="form-control" id="colonia"
                                                        value="<?php echo $domicilio->colonia; ?>" name="colonia">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="cp" class="form-label">Código Postal</label>
                                                    <input type="text" class="form-control" id="cp"
                                                        value="<?php echo $domicilio->codigo_postal; ?>" name="codigo_postal">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="referencia" class="form-label">Referencia</label>
                                                    <input type="text" class="form-control" id="referencia"
                                                        value="<?php echo $domicilio->referencia; ?>" name="referencia">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="telefono" class="form-label">Teléfono</label>
                                                    <input type="text" class="form-control" id="telefono"
                                                        value="<?php echo $domicilio->telefono; ?>" name="telefono">
                                                </div>
                                                <div class="text-end">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-dark" name="editDir">Guardar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal para eliminar dirección -->
                            <div class="modal fade" id="eliminarDireccion<?php echo $domicilio->id_domicilio; ?>"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Eliminar Dirección</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST">
                                                <input type="hidden" name="id_domicilio" value="<?php echo $domicilio->id_domicilio; ?>">
                                                <div class="mb-3">
                                                    <h5>¿Está seguro de que desea eliminar esta dirección?</h5>
                                                </div>
                                                <div class="text-end">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-danger <?php echo $direccionEnUso ? 'disabled' : ''; ?>"
                                                        name="deleteDir" <?php echo $direccionEnUso ? 'aria-disabled="true"' : ''; ?>>
                                                        Eliminar
                                                    </button>
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
                <!-- Botón para agregar dirección -->
                <div class="d-flex justify-content-center flex-column align-items-center mt-lg-5 mt-0">
                    <button type="button" class="btn btn-dark btn-block shadow-lg mt-0 mt-lg-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="fa-solid fa-plus fa-10x rounded"></i>
                    </button>
                    <h3 class="mt-3">Agregar Nueva Dirección</h3>
                </div>
                <!-- Modal para agregar dirección -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Añadir nueva dirección</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="estado" class="form-label">Estado</label>
                                        <input type="text" class="form-control" id="estado" name="estado" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ciudad" class="form-label">Ciudad</label>
                                        <input type="text" class="form-control" id="ciudad" name="ciudad" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="calle" class="form-label">Calle</label>
                                        <input type="text" class="form-control" id="calle" name="calle" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="colonia" class="form-label">Colonia</label>
                                        <input type="text" class="form-control" id="colonia" name="colonia" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="cp" class="form-label">Código Postal</label>
                                        <input type="text" class="form-control" id="cp" name="codigo_postal" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="referencia" class="form-label">Referencia</label>
                                        <input type="text" class="form-control" id="referencia" name="referencia" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="telefono" class="form-label">Teléfono</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                                    </div>
                                    <div class="text-end">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-dark" name="addDir">Añadir</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <div class="alert floating-alert" id="floatingAlert">
        <span id="alertMessage">Mensaje de la alerta.</span>
    </div>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/b820f07375.js" crossorigin="anonymous"></script>
    <script src="../script/script.js"></script>
    <script src="../js/alertas.js"></script>
    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/45ef8dbe96.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

</body>

</html>