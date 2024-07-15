<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
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
                            <a class="nav-link" aria-current="page" href="../menu.php">Menú</a>
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

            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- NavBar End -->

    <div class="container rounded-3 mt-4 mt-lg-0 mb-4">
        <div class="row d-lg-flex flex-column align-items-center">
            <div class="col-12 col-lg-6 p-5 rounded shadow-lg" style="background: var(--color5);">
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
                <div class="mb-3">
                    <h3>Nombre</h3>
                    <h5>Nombre del usuario aquí</h5>
                </div>
                <div class="mb-3">
                    <h3>Usuario</h3>
                    <h5>Usuario va aquí</h5>
                </div>
                <div class="row mb-3">
                    <h3>Correo</h3>
                    <h5>Correo del usuario aquí</h5>
                </div>
                <div class="row mb-3">
                    <div class="col-8">
                        <h3>Teléfono</h3>
                        <h5>Teléfono del usuario aquí</h5>
                    </div>
                    <div class="col-4 d-flex justify-content-center align-items-center flex-column">
                        <!-- Botón para abrir el modal de editar el telefono -->
                        <button data-bs-toggle="modal" data-bs-target="#modalEditarTel" class="btn btn-primary">Editar</button>
                        <!-- Modal para editar el telefono -->
                        <div class="modal fade" id="modalEditarTel" tabindex="-1" aria-labelledby="modalEditarTelLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEditarTelLabel">Cambiar Télefono</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="mb-3">
                                                <label for="tel" class="form-label">Teléfono</label>
                                                <input type="tel" class="form-control" id="tel" name="tel" required>
                                            </div>
                                            <div class="text-end">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Guardar</button>
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
                        <h5>Contaseña del usuario aquí</h5>
                    </div>
                    <div class="col-4 d-flex justify-content-center align-items-center flex-column">
                        <!-- Botón para abrir el modal de editar el password -->
                        <button data-bs-toggle="modal" data-bs-target="#modalEditarPass" class="btn btn-primary">Editar</button>
                        <!-- Modal para editar el password -->
                        <div class="modal fade" id="modalEditarPass" tabindex="-1" aria-labelledby="editarPass"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editarPass">Cambiar contraseña</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="mb-3">
                                                <label for="pass" class="form-label">Ingresar Nueva Contraseña</label>
                                                <input type="password" class="form-control" id="pass" name="pass" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="pass" class="form-label">Confirmar Contraseña</label>
                                                <input type="password" class="form-control" id="pass" name="passConfirmada" required>
                                            </div>
                                            <div class="text-end">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Guardar</button>
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
</body>

</html>