<?php
session_start();

include("../../class/database.php");

// Crear una nueva instancia de la clase Database y conectar a la base de datos
$conexion = new Database();
$conexion->conectarDB();

// Obtener el ID del evento desde la URL
$id_evento = $_GET['id'];
// Consultar los detalles del evento desde la base de datos
$sql = "SELECT * FROM eventos WHERE id_evento = $id_evento ";
$result = $conexion->select($sql);

if ($result) {
    // Si se encontró el evento, mostrar sus detalles
    $evento = $result[0]; // Asumimos que select devuelve una matriz de resultados
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detañe tu evento</title>
        <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="shortcut icon" href="../../img/Sinfonía-Café-y-Cultura.webp">

    </head>

    <body>
        <!-- NavBar -->
        <nav class="navbar navbar-expand-lg shadow-lg ">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
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
                        <a class="dropdown-item" href="../../views/perfil.php">Mi perfil</a>
                        <?php if ($_SESSION['usuario'] == 'ADMIN') { ?>
                            <a class="dropdown-item" href="../../views/adminInicio.php">Administrar</a>
                            <div class="dropdown-divider"></div>
                        <?php } ?>
                        <a class="dropdown-item" href="../../scripts/login/cerrarsesion.php">Cerrar sesión</a>
                    </div>
                <?php
                } else {
                ?>
                    <a href="../../views/login.php" class="login-button ms-auto">Iniciar Sesión</a>
                <?php
                }
                ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <!-- NavBar End -->

        <div class="container my-5">
            <nav aria-label="breadcrumb" class='col-12 d-flex'>
                <ol class="breadcrumb mt-4">
                    <li class="breadcrumb-item fw-bold"><a href="../../index.php">Inicio</a></li>
                    <li class="breadcrumb-item fw-bold"><a href="../../views/eventos.php">Eventos</a></li>
                    <?php
                    echo "  <li class='breadcrumb-item active' aria-current='page'>" . $evento->nombre . "</li>"
                    ?>

                </ol>
            </nav>
            <!-- Título -->
            <div class="fw-bold fs-3 mt-3 mb-4">
                <?php
                echo "  <h1 class='h1contact'>" . $evento->nombre . "</h1>"
                ?>
            </div>
            <div class="row">
                <!-- Imagen y descripción del evento -->
                <div class="col-md-7">
                    <div class="text-white d-flex align-items-center">
                        <?php
                        echo "  <img src='../../" . $evento->img_url . "' class='w-100' loading='lazy'>"
                        ?>
                    </div>
                    <?php
                    echo "<p class='mt-3'>" . $evento->fecha_publicacion . "</p>";
                    echo "<p class='mt-3'>" . $evento->descripcion . "</p>"
                    ?>
                </div>
                <!-- Detalles del evento -->
                <div class="col-md-4 border-start">
                    <?php
                    echo "<h3 class='text-center text-cafe fw-bold'>Detalles del evento</h3>";
                    echo "<hr>";
                    echo "<h4 class=' fw-bold'>Nombre:</h4>";
                    echo "<p>" . $evento->nombre . "</p>";
                    echo "<h4 class=' fw-bold'>Fecha de evento:</h4>";
                    echo "<p>" . $evento->fecha_evento . "</p>";
                    echo "<h4 class=' fw-bold'>Hora de inicio:</h4>";
                    echo "<p>" . $evento->hora_inicio . "</p>";
                    echo "<h4 class=' fw-bold'>Hora de fin:</h4>";
                    echo "<p>" . $evento->hora_fin . "</p>";
                    echo "<h4 class=' fw-bold'>Capacidad:</h4>";
                    echo "<p>" . $evento->capacidad . "</p>";
                    echo "<hr>";

                    echo "<h3 class='text-center text-cafe fw-bold'>Reservar</h3>";

                    if ($evento->capacidad <= 0) {
                        echo "<p class='fw-bold'>Cupo disponible: <span>" . $evento->capacidad . "</span></p>";
                        echo "<p class='fw-bold text-danger'>No se pueden realizar más reservas. El evento está completo.</p>";
                    } else {
                        echo "<p class='fw-bold'>Cupo disponible: <span>" . $evento->capacidad . "</span></p>";
                        
                        if ($evento->tipo != "Gratuito") {
                            echo "<p class='fw-bold'>Costo por persona: <span>$" . $evento->precio_boleto . "</span></p>";
                            echo "<p class='fw-bold'>Tipo de evento: <span>" . $evento->tipo . "</span></p>";
                            
                            // Aquí puedes agregar el botón de reservar si lo deseas
                            echo "<button type='button' class='btn btn-cafe w-100'>Realizar reserva</button>";
                        } else {
                            echo "<p class='fw-bold'>Tipo de evento: <span>" . $evento->tipo . "</span></p>";
                        }
                    }

                    ?>
                    
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
        <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/45ef8dbe96.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>

    </html>
<?php
} else {
    echo "Producto no encontrado.";
}
