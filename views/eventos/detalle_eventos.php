<?php
session_start();

include ("../../class/database.php");
include ("../../scripts/funciones/funciones.php");
// Crear una nueva instancia de la clase Database y conectar a la base de datos
$conexion = new Database();
$conexion->conectarDB();

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

if (isset($_POST["btnReservar"])) {

    extract($_POST);
    // Verificar disponibilidad
    $query_disponibilidad = "select * from eventos where id_evento = $id_evento and boletos >= $cantidad";
    $consulta_disponibilidad = $conexion->select($query_disponibilidad);

    // Validar disponibilidad
    if (!empty($consulta_disponibilidad)) {
        // Realizar la reserva
        $query = "call SP_reserva_evento(" . $cliente[0]->id_cliente . ",$id_evento,$cantidad,'1')";
        $conexion->execute($query);
        // Obtener el ID de la reserva
        $consulta_reserva = "SELECT  id_reserva FROM eventos_reservas where id_cliente = (select c.id_cliente from personas p join clientes c on c.id_persona = p.id_persona where p.usuario = '" . $_SESSION["usuario"] . "') ORDER BY eventos_reservas.fecha_hora_reserva DESC LIMIT 1";
        $select_reserva = $conexion->select($consulta_reserva);
        $id_reserva = $select_reserva[0]->id_reserva;
        // Redirigir a la página de confirmación de reserva enviando el id de la reserva
        header("Location: confirmacion_reserva.php?id=$id_reserva");
        exit;
    } else {
        showAlert("¡Imagen actualizada con éxito!", "success");
    }
}

if ($result) {
    // Si se encontró el evento, mostrar sus detalles
    $evento = $result[0]; // Asumimos que select devuelve una matriz de resultados
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detalle evento</title>
        <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="shortcut icon" href="../../img/Sinfonía-Café-y-Cultura.webp">
        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
        <style>
            #map {
                height: 450px;
                width: 100%;
            }

            .empty-side {
                background-image: url('../../img/background.jpg');
                /* Ruta a la imagen de fondo */
                background-size: cover;
                /* Ajusta el tamaño de la imagen al contenedor */
                background-position: center;
                /* Centra la imagen en el contenedor */
                background-repeat: no-repeat;
                /* Evita que la imagen se repita */
                border-radius: 5px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                position: relative;
                /* Necesario para el pseudo-elemento */
                overflow: hidden;
                /* Oculta el desbordamiento del pseudo-elemento */
            }

            .empty-side::before {
                content: "";
                /* Necesario para mostrar el pseudo-elemento */
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.1);
                /* Color blanco semi-transparente para desvanecer */
                backdrop-filter: blur(8px);
                /* Desenfoque de fondo */
                z-index: 1;
                /* Asegura que el desenfoque esté por encima de la imagen */
            }

            .empty-side img {
                position: relative;
                z-index: 2;
                /* Asegura que la imagen esté por encima del pseudo-elemento */
            }
        </style>
    </head>

    <body>
        <!-- NavBar -->
        <nav class="navbar navbar-expand-lg shadow-lg ">
            <div class="container-fluid">
                <a class="navbar-brand" href="../../index.php">
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
            $labelText_botonreservar = "";
            $total = 0;
            if ($evento->tipo == "De Pago" && $evento->boletos > 0) {
                if (isset($_SESSION["usuario"])) {
                    $labelText_precio = " <h4>Precio por boleto: {$precio_boleto} $</h4>";
                    $labelText_botonreservar = "<button type='button' class='btn btn-cafe fs-4 col-12' data-bs-toggle='modal'
                            data-bs-target='#exampleModal'>
                            Reservar Boletos
                        </button>
                        <!-- Modal -->
                        <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel'
                            aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <form action='' method='POST'>
                                    <div class='modal-header'>
                                        <h1 class='modal-title fs-5' id='exampleModalLabel'>Reservar Boletos</h1>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal'
                                            aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body'>
                                        <div class='row'>
                                            <div class='col-6'>
                                                <label for='' class='form-label'>Cantidad de boletos</label>
                                                <select class='form-select' id='cantidad' name='cantidad'>
                                                    <option value='1' selected>1</option>
                                                    <option value='2'>2</option>
                                                    <option value='3'>3</option>
                                                    <option value='4'>4</option>
                                                    <option value='5'>5</option>
                                                    <option value='6'>6</option>
                                                    <option value='7'>7</option>
                                                    <option value='8'>8</option>
                                                    <option value='9'>9</option>
                                                    <option value='10'>10</option>
                                                </select>
                                            </div>
                                            <div class='col-6 text-center'>
                                                <h6>Precio por boleto: {$precio_boleto}$</h6>
                                                <h6>Total: <span id='total'>$0</span>$</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary'
                                            data-bs-dismiss='modal'>Cerrar</button>
                                        <button type='submit' class='btn btn-cafe' name='btnReservar'>Realizar reserva</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>";
                } else {
                    $labelText_botonreservar = "<h4 class='text-center'> ¡Iniciar Sesión para reservar boletos! </h4>";
                }
                $labelText_precio = " <h4>Precio por boleto: {$precio_boleto} $</h4>";
            } else if ($evento->tipo == "De Pago" && $evento->boletos == 0) {
                $labelText_precio = "<h4 class='text-center'> ¡Lo sentimos, los boletos se han agotado! </h4>";
            } else if ($evento->tipo == "Gratuito") {
                $labelText_precio = "";
            }
            ?>
            <!-- Imagen -->
            <div class="row">
                <div class="col mb-lg-0 text-center empty-side">
                    <img src="../../img/eventos/<?php echo $evento->img_url; ?>" class="img-fluid w-50"
                        alt="Imagen del evento.">
                </div>
            </div>
            <!-- Nombre y descripción -->
            <div class="row justify-content-center col-12">
                <div class="col-md-6 text-center">
                    <div>
                        <h1 class="fw-bold mt-3"><?php echo $evento->nombre; ?></h1>
                        <p class="lead my-4 text-center"><?php echo $evento->descripcion; ?></p>
                    </div>
                </div>
            </div>

            <hr class="my-4">
            <!-- Ubicación -->
            <div class="row ">
                <!-- Mapa -->
                <div class="col-12 col-md-7 col-lg-6 ">
                    <!-- Ubicación -->
                    <div class="d-flex align-items-center mb-3 justify-content-center">
                        <i class="fa-solid fa-location-dot fa-2x me-2"></i>
                        <h2 class="mb-0">Ubicación</h2>
                    </div>
                    <!-- Mapa -->
                    <div class="d-flex justify-content-center">
                        <div class="text-center">
                            <h5 class="text-center mb-3 p-1">
                                <?php
                                echo "{$evento->lugar}, {$evento->calle}, {$evento->colonia}, {$evento->ciudad}, {$evento->estado}, C.P. {$evento->codigo_postal}";
                                ?>
                            </h5>
                            <!-- Insertar el mapa aquí -->
                            <?php
                            $lat = $evento->lat; // Reemplaza con la latitud de la dirección
                            $lng = $evento->lng; // Reemplaza con la longitud de la dirección
                            ?>
                            <div class="map-container" id="map"></div>
                        </div>
                    </div>
                </div>
                <hr class="my-4 d-block d-md-none">
                <!-- Horario y Detalles -->
                <div class="col-12 col-md-5 col-lg-6">
                    <!-- Horario -->
                    <div class="row">
                        <div class="d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-calendar-days fa-2x me-2"></i>
                            <h2 class="mb-0">Horario </h2>
                        </div>
                        <div class="d-flex justify-content-center flex-column align-items-center">
                            <h4 class="m-4"><?php echo formatFecha($evento->fecha_evento); ?></h4>
                            <h4 class=" m-4"><?php echo "De " . $horaInicio . " a " . $horaFin; ?></h4>
                        </div>
                    </div>
                    <hr class=" my-4">
                    <!-- Detalles -->
                    <div class="row justify-content-center gap-md-5 gap-2 ">
                        <div class="d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-circle-info fa-2x me-2"></i>
                            <h2 class="mb-0">Detalles</h2>
                        </div>
                        <div class="text-center">
                            <h4>Tipo de evento: <?php echo $evento->tipo; ?></h4>
                        </div>
                        <div class="text-center">
                            <?php echo $labelText_precio; ?>
                        </div>
                        <div class="d-flex justify-content-center col-12">
                            <?php echo $labelText_botonreservar; ?>
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
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <?php echo $evento->estado; ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             <?php echo $evento->codigo_postal; ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    `;

                L.marker([<?php echo $evento->lat; ?>, <?php echo $evento->lng; ?>]).addTo(map)
                    .bindPopup(popupContent)
                    .openPopup();
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var precioBoleto = <?php echo $precio_boleto; ?>; // Asegúrate de que esto sea un número
                // Obtener elementos del DOM
                var cantidadSelect = document.getElementById('cantidad');
                var totalSpan = document.getElementById('total');

                // Función para actualizar el total
                function actualizarTotal() {
                    var cantidad = parseInt(cantidadSelect.value);
                    var total = cantidad * precioBoleto;
                    totalSpan.textContent = total.toFixed(2); // Actualiza el total
                }

                // Inicializar el total al cargar la página
                actualizarTotal();

                // Escuchar cambios en la selección
                cantidadSelect.addEventListener('change', actualizarTotal);
            });
        </script>


    </body>

    </html>
    <?php
} else {
    echo "Producto no encontrado.";
}
