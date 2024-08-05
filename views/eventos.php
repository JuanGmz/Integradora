<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/Sinfonía-Café-y-Cultura.webp">

    <?php
    include_once("../class/database.php");
    $db = new Database();
    $db->conectarDB();
    session_start();
    if (isset($_SESSION["usuario"])) {
        $rolUsuario = "SELECT r.rol FROM roles r JOIN roles_usuarios ru ON r.id_rol = ru.id_rol JOIN personas p ON ru.id_usuario = p.id_usuario WHERE p.usuario = '$_SESSION[usuario]'";
        $rol = $db->select($rolUsuario);
    } else {
        $rol = null;
    }
    ?>
</head>

<body>
    <div class="">
        <!-- Botón de WhatsApp -->
        <button id="whatsappButton" class="btn btn-success position-fixed bottom-0 start-0 m-3 p-3 d-flex align-items-center justify-content-center z-3" type="button" onclick="window.open('https://wa.me/528711220994?text=%C2%A1Hola!%20Escribo%20desde%20la%20p%C3%A1gina%20web%20y%20quer%C3%ADa%20consultar%20por%3A', '_blank')">
            <i class="fa-brands fa-whatsapp fa-2x"></i>
        </button>
        <!-- NavBar -->
        <nav class="navbar navbar-expand-lg shadow-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img src="../img/Sinfonía-Café-y-Cultura.webp" alt="Logo" class="logo" loading="lazy">
                </a>
                <div class="offcanvas offcanvas-end" style="background: var(--primario);" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
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
    </div>
    </nav>
    <!-- NavBar End -->

    <!-- Contenido -->

    <div class="container">
        <div class="row p-0 m-0">
            <!--NavBar EventosCategorias-->
            <div class="p-2">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-4">
                        <li class="breadcrumb-item fw-bold"><a href="../index.php">Inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page"></li>Eventos</li>
                    </ol>
                </nav>

                <div class="fw-bold fs-3 mt-3 mb-4">
                    <h1 class="h1contact">Eventos</h1>
                </div>
                <!-- Botones de categorías -->
                <div class="d-flex justify-content-center">
                    <ul class="nav nav-tabs justify-content-center gap-2 m-0 p-0" id="ex1" role="tablist" style="border-bottom: none;">
                        <?php
                        include_once("../class/database.php");
                        $conexion = new Database();
                        $conexion->conectarDB();
                        $query = 'SELECT categorias.id_categoria, categorias.nombre FROM categorias WHERE categorias.tipo = "Evento"';
                        $categorias = $conexion->select($query);
                        $tru = "true";
                        $active = "active";
                        foreach ($categorias as $categoria) {
                            $isActive = (isset($_GET['categoria']) && $_GET['categoria'] == $categoria->id_categoria) ? 'active' : '';
                            echo "<li class='rounded row nav-item col-5 col-sm-5 col-md-3 col-lg-auto mb-2 mb-lg-0 me-0 text-center justify-content-center d-flex m-0 p-0 p-md-1 me-md-2' role='presentation'>";
                            echo "<a data-mdb-tab-init class='rounded btn-categorias w-100 h-100' id='ex1-tabs-{$categoria->id_categoria}' href='#ex1-tabs-{$categoria->id_categoria}' role='tab' aria-controls='ex1-tabs-{$categoria->id_categoria}' aria-selected='$tru'>{$categoria->nombre}</a>";
                            echo "</li>";
                            $tru = "false";
                            $active = "";
                        }
                        $conexion->desconectarDB();
                        ?>
                    </ul>
                </div>
                <!-- Contenedor para la advertencia -->
                <div id="category-warning" class="alert text-center p-5 m-4" role="alert" style="display: none;">
                    <div> <i class="fa-solid fa-mug-hot fa-4x text-muted"></i></div>
                    <div class='text-center mt-3'><h5>Por favor, seleccione una categoría para ver los eventos.</h5> </div>
                </div>

                <!-- Contenido de las categorías -->
                <div class="tab-content col-12 p-1" id="ex1-content">
                    <?php
                    $conexion->conectarDB();
                    $eventosPorCategoria = [];

                    // Verificar si se ha seleccionado una categoría
                    $categoriaSeleccionada = isset($_GET['categoria']) ? (int) $_GET['categoria'] : null;


                    foreach ($categorias as $categoria) {
                        $categoria_id = $categoria->id_categoria;
                        $page = isset($_GET['page_' . $categoria_id]) ? (int) $_GET['page_' . $categoria_id] : 1;
                        $perPage = 3;
                        $offset = ($page - 1) * $perPage;

                        $query = "SELECT 
                        SQL_CALC_FOUND_ROWS 
                        eventos.id_evento, eventos.nombre, eventos.descripcion, eventos.img_url, eventos.fecha_evento, eventos.hora_inicio, eventos.hora_fin,eventos.boletos, eventos.fecha_publicacion
                        FROM 
                        eventos 
                        WHERE 
                        eventos.id_categoria = $categoria_id AND eventos.fecha_publicacion <= NOW() 
                        LIMIT $perPage OFFSET $offset";
                        $eventos = $conexion->select($query);
                        $eventosPorCategoria[$categoria_id] = $eventos;

                        // Obtener el total de registros
                        $totalQuery = "SELECT FOUND_ROWS() as total";
                        $totalResult = $conexion->select($totalQuery);
                        $totalEventos = $totalResult[0]->total;
                        $totalPages = ceil($totalEventos / $perPage);

                        // Establecer la pestaña activa
                        $active = ($categoriaSeleccionada == $categoria_id) ? 'active show' : '';

                        echo "<div class='tab-pane fade $active' id='ex1-tabs-{$categoria_id}' role='tabpanel' aria-labelledby='ex1-tab-{$categoria_id}'>";

                        if (!empty($eventos)) {
                            foreach ($eventos as $evento) {
                                echo "  <div class='row justify-content-center mb-4 p-2'>";
                                echo "      <div class='col-12 col-md-8 d-flex align-items-center bg-body shadow-lg rounded m-0 p-0'>";
                                echo "          <div class='d-flex flex-wrap w-100 d-flex justify-content-center p-0 m-0'>";
                                echo "              <div class='col-12 col-md-11 col-sm-10 col-lg-6'>";
                                echo "                  <img src='../img/eventos/{$evento->img_url}' class='card-img-top img-fluid' alt='...' style='height: 300px; object-fit: cover;'>";
                                echo "              </div>";
                                echo "              <div class='col-12 col-sm-9 col-md-11 col-lg-6 p-2 d-flex flex-column justify-content-center align-items-center p-lg-2'>";
                                echo "                  <h3 class='fw-bold mb-3 text-center'>{$evento->nombre}</h3>";
                                echo "                  <p class='text-dark-emphasis mb-4 '>{$evento->fecha_publicacion}</p>";
                                echo "                  <span class='text-dark-emphasis mb-4 text-center'>{$evento->descripcion}</span>";
                                echo "                  <form action='../views/eventos/detalle_eventos.php?id={$evento->id_evento}' method='post'>";
                                echo "                      <input type='hidden' name='id_evento' value='{$evento->id_evento}'>";
                                echo "                      <input type='submit' class='btn btn-cafe w-100' value='Ver Detalles'>";
                                echo "                  </form>";
                                echo "              </div>";
                                echo "          </div>";
                                echo "      </div>";
                                echo "  </div>";
                            }

                            // Paginación
                            echo "<nav aria-label='Page navigation example'>";
                            echo "  <ul class='pagination d-flex justify-content-center'>";
                            echo "      <li class='page-item" . ($page <= 1 ? ' disabled' : '') . "'>";
                            echo "          <a class='page-link custom-page-link' href='?categoria=$categoria_id&page_$categoria_id=" . ($page - 1) . "#ex1-tabs-$categoria_id' aria-label='Previous'>";
                            echo "              <span aria-hidden='true'>&laquo;</span>";
                            echo "          </a>";
                            echo "      </li>";
                            for ($i = 1; $i <= $totalPages; $i++) {
                                echo "<li class='page-item custom-page-item" . ($page == $i ? ' active' : '') . "'>";
                                echo "  <a class='page-link custom-page-link' href='?categoria=$categoria_id&page_$categoria_id=$i#ex1-tabs-$categoria_id'>$i</a>";
                                echo "</li>";
                            }
                            echo "      <li class='page-item" . ($page >= $totalPages ? ' disabled' : '') . "'>";
                            echo "          <a class='page-link custom-page-link' href='?categoria=$categoria_id&page_$categoria_id=" . ($page + 1) . "#ex1-tabs-$categoria_id' aria-label='Next'>";
                            echo "              <span aria-hidden='true'>&raquo;</span>";
                            echo "          </a>";
                            echo "      </li>";
                            echo "  </ul>";
                            echo "</nav>";
                        } else {
                            echo "<div class='d-flex flex-column align-items-center justify-content-center' style='height: 300px;'>";
                            echo "  <div><i class='fa-solid fa-circle-exclamation fa-3x text-muted'></i></div>";
                            echo "  <div class='text-center mt-3'>No hay eventos disponibles en esta categoría.</div>";
                            echo "</div>";
                        }

                        echo "</div>";
                    }

                    $conexion->desconectarDB();
                    ?>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const warningElement = document.getElementById('category-warning');
                        const tabLinks = document.querySelectorAll('.btn-categorias');

                        if (!window.location.search.includes('categoria')) {
                            warningElement.style.display = 'block';
                        }

                        tabLinks.forEach(link => {
                            link.addEventListener('click', function() {
                                warningElement.style.display = 'none';
                            });
                        });
                    });
                </script>

            </div>

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
    <script src="../js/tabs.js"></script>
</body>

</html>