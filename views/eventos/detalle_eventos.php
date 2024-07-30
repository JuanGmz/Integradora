<?php
session_start();

include ("../../class/database.php");
include ("../../scripts/funciones/funciones.php");

// Crear una nueva instancia de la clase Database y conectar a la base de datos
$conexion = new Database();
$conexion->conectarDB();

// Obtener el ID del evento desde la URL
$id_evento = $_GET['id'];
// Consultar los detalles del evento desde la base de datos
$sql = "SELECT e.*,
        ul.nombre as lugar, 
        ul.descripcion as ul_desc,
        ul.colonia,
        ul.ciudad,
        ul.estado,
        ul.codigo_postal,
        ul.calle,
        ul.lat,
        ul.lng
        from eventos e 
        join ubicacion_lugares ul on e.id_lugar = ul.id_lugar 
        where e.id_evento = $id_evento";
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
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <style>
            #map {
                height: 450px;
                width: 600px;
            }
        </style>
    </head>

    <body>
        <!-- NavBar -->
        <nav class="navbar navbar-expand-lg shadow-lg ">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img src="../../img/Sinfonía-Café-y-Cultura.webp" alt="Logo" class="logo" loading="lazy">
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
                    <a class="nav-link dropdown-toggle ms-auto" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-user"></i> <?php echo $_SESSION['usuario']; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                        style="left: auto; right: 30px; top: 60px">
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
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                    aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <!-- NavBar End -->

        <?php
        if (isset($_SESSION["usuario"])) {
            $cliente = "SELECT 
                c.id_cliente 
            FROM 
                clientes AS c 
            JOIN
                personas AS p ON c.id_persona = p.id_persona 
            WHERE p.usuario = '" . $_SESSION["usuario"] . "'";
            $cliente = $conexion->select($cliente);
        } else {
            $cliente = null;
        }
        ?>
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
            <?php
            $horaInicio = formatHora($evento->hora_inicio);
            $horaFin = formatHora($evento->hora_fin);
            $precio_boleto = formatPrecio($evento->precio_boleto);
            if ($evento->tipo == "De Pago" && $evento->disponibilidad > 0) {
                $labelText_precio = " <h4 class='text-center'>Precio por boleto: {$precio_boleto} $</h4>";
            } else if ($evento->tipo == "De Pago" && $evento->disponibilidad == 0) {
                $labelText_precio = "<h4 class='text-center'> ¡Lo sentimos, los boletos se han agotado! </h4>";
            } else if ($evento->tipo == "Gratuito") {
                $labelText_precio = "";
            }
            ?>
            <div class="row">
                <div class="col-6">
                    <img src="../../img/eventos/<?php echo $evento->img_url; ?>" class="img-fluid mb-5" alt="...">
                </div>
                <div class="col-6">
                    <div>
                        <h1 class="fw-bold mt-3"><?php echo $evento->nombre; ?></h1>
                        <p class="lead my-4 text-center"><?php echo $evento->descripcion; ?></p>
                    </div>
                    <hr class=" my-4">
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-circle-info fa-2x me-2"></i>
                        <h2 class="mb-0">Detalles</h2>
                    </div>
                    <div class="d-flex justify-content-center flex-column">
                        <h4 class="text-center">Tipo de evento: <?php echo $evento->tipo; ?></h4>
                        <?php echo $labelText_precio; ?>
                    </div>
                    <hr class=" my-4">
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-calendar-days fa-2x me-2"></i>
                        <h2 class="mb-0">Horario </h2>
                    </div>
                    <div class="d-flex justify-content-center flex-column">
                        <h4 class="text-center m-3"><?php echo formatFecha($evento->fecha_evento); ?></h4>
                        <h4 class="text-center""><?php echo "De " . $horaInicio . " a " . $horaFin; ?></h4>
                    </div>
                    <hr class=" my-4">
                            <?php
                            $lat = $evento->lat; // Reemplaza con la latitud de la dirección
                            $lng = $evento->lng; // Reemplaza con la longitud de la dirección
                            ?>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fa-solid fa-location-dot fa-2x me-2"></i>
                                <h2 class="mb-0">Ubicación</h2>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="text-center">
                                    <h5>
                                        <?php
                                        echo "{$evento->calle}, {$evento->colonia}, {$evento->ciudad}, {$evento->estado}, C.P. {$evento->codigo_postal}";
                                        ?>
                                    </h5>
                                    <!-- Insertar el mapa aquí -->
                                    <div id="map"></div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae voluptatem nam dolor
                        inventore, nesciunt laborum doloribus eius repellendus omnis magni iure autem consequatur
                        nihil ducimus minima nemo rerum libero ratione!</p>
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
                            <p class="text-center fw-bold text-light">Copyright © 2024
                                SinfoníaCafé&Cultura</p>
                        </div>
                    </div>
                </div>
            </footer>
            <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://kit.fontawesome.com/45ef8dbe96.js" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var map = L.map('map').setView([<?php echo $evento->lat; ?>, <?php echo $evento->lng; ?>], 13);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '© OpenStreetMap contributors'
                    }).addTo(map);

                    var popupContent = `
                        <b><?php echo $evento->lugar; ?></b><br>
                        <?php echo $evento->calle; ?><br>
                        <?php echo $evento->ciudad; ?><br>
                        <?php echo $evento->estado; ?>             <?php echo $evento->codigo_postal; ?>
                    `;

                    L.marker([<?php echo $evento->lat; ?>, <?php echo $evento->lng; ?>]).addTo(map)
                        .bindPopup(popupContent)
                        .openPopup();
                });
            </script>


    </body>

    </html>
    <?php
} else {
    echo "Producto no encontrado.";
}
