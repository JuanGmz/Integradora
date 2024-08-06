<?php
session_start();
include_once("../../class/database.php");

$db = new Database();
$db->conectarDB();
if (isset($_SESSION["usuario"])) {
    $rolUsuario = "SELECT r.rol FROM roles r JOIN roles_usuarios ru ON r.id_rol = ru.id_rol JOIN personas p ON ru.id_usuario = p.id_usuario WHERE p.usuario = '$_SESSION[usuario]'";
    $rol = $db->select($rolUsuario);
} else {
    $rol = null;
}
$id_reserva = $_GET['id'];

// Obtener el ID del cliente autenticado
$cliente_query = "SELECT c.id_cliente 
                  FROM clientes AS c 
                  JOIN personas AS p ON c.id_persona = p.id_persona 
                  WHERE p.usuario = '" . $_SESSION["usuario"] . "'";

$cliente_result = $db->select($cliente_query);

if (is_array($cliente_result) && count($cliente_result) > 0) {
    $id_cliente_autenticado = $cliente_result[0]->id_cliente;

    // Verificar que el pedido pertenece al cliente autenticado
    $reserva_query = "SELECT id_cliente FROM eventos_reservas WHERE id_reserva = $id_reserva";
    $reserva_result = $db->select($reserva_query);

    if (is_array($reserva_result) && count($reserva_result) > 0) {
        $id_cliente_reserva = $reserva_result[0]->id_cliente;

        if ($id_cliente_autenticado == $id_cliente_reserva) {
            // El pedido pertenece al cliente autenticado, mostrar el folio
?>

            <!DOCTYPE html>
            <html lang="es">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Confirmación de Reserva</title>
                <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
                <link rel="stylesheet" href="../../css/style.css">
                <link rel="shortcut icon" href="../../img/Sinfonía-Café-y-Cultura.webp">
                <?php
                include_once("../../scripts/funciones/funciones.php");

                if (isset($_SESSION['usuario'])) {
                    $rolUsuario = "SELECT r.rol FROM roles r JOIN roles_usuarios ru ON r.id_rol = ru.id_rol JOIN personas p ON ru.id_usuario = p.id_usuario WHERE p.usuario = '$_SESSION[usuario]'";
                    $rol = $db->select($rolUsuario);
                }
                ?>
            </head>
            <style>
                .card {
                    border-radius: 10px;
                }

                .card img {
                    width: 100%;
                    height: auto;
                    border-radius: 10px;
                }

                .position-relative {
                    position: relative;
                }

                .image-wrapper {
                    position: relative;
                    overflow: hidden;
                }

                .gradient-overlay {
                    position: absolute;
                    top: 0;
                    left: 0;
                    right: 0;
                    bottom: 0;
                    background: linear-gradient(to left, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 1) 100%);
                    pointer-events: none;
                    /* Ensures the overlay doesn't interfere with any interactions */
                    z-index: 1;
                    /* Makes sure the gradient overlay is on top of the image */
                }


                /* Media query para resoluciones medias y pequeñas */
                @media (max-width: 992px) {
                    .gradient-overlay {
                        background: linear-gradient(to top, rgba(255, 255, 255, 0) 50%, rgba(255, 255, 255, 1) 100%);
                    }
                }

                .card-no-border {
                    border: none;
                }

                .card-custom-shadow {
                    box-shadow: 0 8px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19);
                }
            </style>

            <body>
                <!-- Botón de WhatsApp -->
                <button id="whatsappButton" class="btn btn-success position-fixed bottom-0 start-0 m-3 p-3 d-flex align-items-center justify-content-center z-3" type="button" onclick="window.open('https://wa.me/528711220994?text=%C2%A1Hola!%20Escribo%20desde%20la%20p%C3%A1gina%20web%20y%20quer%C3%ADa%20consultar%20por%3A', '_blank')">
                    <i class="fa-brands fa-whatsapp fa-2x"></i>
                </button>
                <!-- NavBar -->
                <nav class="navbar navbar-expand-lg shadow-lg ">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="../../index.php">
                            <img src="../../img/Sinfonía-Café-y-Cultura.webp" alt="Logo" class="logo" loading="lazy">
                        </a>
                        <div class="offcanvas offcanvas-end" style="background: var(--primario);" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
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
                                        <a class="nav-link mx-lg-2" href="../ecommerce.php">Comprar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mx-lg-2" href="../recompensas.php">Recompensas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mx-lg-2" href="../eventos.php">Eventos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mx-lg-2" href="../publicaciones.php">Publicaciones</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mx-lg-2" href="../contact.php">Contacto</a>
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
                                <a class="dropdown-item" href="../perfil.php">Mi perfil</a>
                                <a class="dropdown-item" href="../bolsas/Carrito.php">Mi carrito</a>

                                <?php if ($rol[0]->rol === 'administrador') { ?>
                                    <a class="dropdown-item" href="../../views/adminInicio.php">Administrar</a>
                                    <div class="dropdown-divider"></div>
                                <?php } ?>
                                <a class="dropdown-item" href="../../scripts/login/cerrarsesion.php">Cerrar sesión</a>
                            </div>
                        <?php
                        } else {
                        ?>
                            <a href="../login.php" class="login-button ms-auto">Iniciar Sesión</a>
                        <?php
                        }
                        ?>
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </nav>
                <!-- NavBar End -->
                <div class="container mt-5">
                    <nav aria-label="breadcrumb" class='col-12 d-flex'>
                        <ol class="breadcrumb mt-4">
                            <li class="breadcrumb-item fw-bold"><a href="../../index.php">Inicio</a></li>
                            <li class="breadcrumb-item fw-bold"><a href="../../views/eventos.php">Eventos</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Mi Reserva</li>
                        </ol>
                    </nav>
                    <!-- Título -->
                    <div class="fw-bold">
                        <h1 class="h1contact">Mi reserva</h1>
                    </div>

                    <!-- Contenido -->
                    <?php
                    if (isset($_SESSION["usuario"])) {
                        $id_reserva = htmlspecialchars($id_reserva);
                        echo '
<div class="p-4 m-0">
    <div class="card card-no-border card-custom-shadow">
        <div class="row g-0">
            <div class="col-md-12 col-lg-6">
                <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                    <h5 class="card-title fw-bold">¡Gracias por su reserva!</h5>
                    <i class="fa-solid fa-champagne-glasses fa-2x"></i>
                    <p class="card-text">Su folio es: <strong>' . htmlspecialchars($id_reserva) . '</strong></p>
                    <span class="card-text">Para completar su reserva, deberá realizar un depósito o transferencia a la siguiente cuenta:</s>

                </div>
                    <ul class="list-unstyled p-2 p-lg-4">
                        <li><strong>Banco:</strong> Bancomer</li>
                        <li><strong>Cuenta:</strong> 1234567890 </li>
                        <li><strong>CLABE:</strong> 012345678901234567</li>
                        <li><strong>Nombre del Titular:</strong> Héctor Armando Caballero Serna</li>
                    </ul>
                    <div class="d-flex justify-content-center text-center p-1">
                                            <span class="card-text">Después de realizar el pago, por favor suba el comprobante de pago a través de su perfil en "Reservas":</s>
</div>
                    <div class="mt-4 justify-content-center d-flex">
                        <a href="../reservas.php" class="btn btn-categorias">Ir a mis reservas</a>
                        <a href="../eventos.php" class="btn btn-categorias ms-2">Volver a Eventos</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 position-relative ">
                <div class="image-wrapper w-100 h-100">
                    <img src="../../img/background_reservas.jpg" class="img-fluid rounded-start coffee-image " alt="Imagen de Reserva">
                    <div class="gradient-overlay"></div>
                </div>
            </div>
        </div>
    </div>
</div>
';
                    }
                    ?>
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
                <!-- jQuery -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <!-- Bootstrap JS -->
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
                <script src="https://kit.fontawesome.com/45ef8dbe96.js" crossorigin="anonymous"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            </body>

            </html>
<?php
        } else {
            echo "<p>La reserva no pertenece al cliente autenticado.</p>";
        }
    } else {
        echo "<p>Reserva no encontrada.</p>";
    }
} else {
    echo "<p>Cliente no autenticado.</p>";
}
?>