

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/Sinfonía-Café-y-Cultura.webp">
</head>

<body style="background: var(--color5)">
     <!-- Botón de WhatsApp -->
     <button id="whatsappButton" class="btn btn-success position-fixed bottom-0 start-0 m-3 p-3 d-flex align-items-center justify-content-center z-3" type="button" onclick="window.open('https://wa.me/528711220994?text=%C2%A1Hola!%20Escribo%20desde%20la%20p%C3%A1gina%20web%20y%20quer%C3%ADa%20consultar%20por%3A', '_blank')">
        <i class="fa-brands fa-whatsapp fa-2x"></i>
    </button>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg shadow-lg mb-lg-5">
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
            <a href="login.php" class="login-button ms-auto">Iniciar Sesión</a>
            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- NavBar End -->

    <!-- Recuperar Contraseña 
    <div class="container-fluid mt-5 d-flex flex-column justify-content-center align-items-center">
        <form action="../scripts/login/reset_password.php" method="post" class="bg-light p-5 rounded shadow-lg">
            <legend class="text-center fw-bold mb-4">Recuperar Contraseña</legend>
            <div class="row text-center mb-4">
                <div class="col-12">
                    <i class="fa-solid fa-lock fa-6x"></i>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control form-control-bb" id="correo" name="correo" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-cafe w-100 text-light fw-bold fs-5">Recuperar Contraseña</button>
                </div>
            </div>
        </form>
    </div>-->
    <!-- Recuperar Contraseña -->
<div class="container-fluid mt-5 d-flex flex-column justify-content-center align-items-center">
    <form action="../scripts/login/send_code.php" method="post" class="bg-light p-5 rounded shadow-lg">
        <legend class="text-center fw-bold mb-4">Recuperar Contraseña</legend>
        <div class="row text-center mb-4">
            <div class="col-12">
                <i class="fa-solid fa-lock fa-6x"></i>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <label for="telefono" class="form-label">Número de Teléfono</label>
                <input type="tel" class="form-control form-control-bb" id="telefono" name="telefono" required>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-cafe w-100 text-light fw-bold fs-5">Enviar Código</button>
            </div>
        </div>
    </form>
</div>
    

    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/b820f07375.js" crossorigin="anonymous"></script>
</body>

</html>