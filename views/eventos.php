<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/Sinfonía-Café-y-Cultura.webp">
    <?php
    session_start();
    ?>
</head>

<body>
    <div class="">
        <!-- NavBar -->
        <nav class="navbar navbar-expand-lg shadow-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img src="../img/Sinfonía-Café-y-Cultura.webp" alt="Logo" class="logo" loading="lazy">
                </a>
                <div class="offcanvas offcanvas-end" style="background: var(--primario);" tabindex="-1"
                    id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
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
                    <a class="dropdown-item" href="views/perfil.php">Mi perfil</a>
                    <?php if ($_SESSION['usuario'] == 'ADMIN') { ?>
                        <a class="dropdown-item" href="../views/adminInicio.php">Administrar</a>
                        <div class="dropdown-divider"></div>
                    <?php } ?>
                    <a class="dropdown-item" href="scripts/login/cerrarsesion.php">Cerrar sesión</a>
                </div>
            <?php
            } else {
            ?>
                <a href="views/login.php" class="login-button ms-auto">Iniciar Sesión</a>
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

    <div class="container mb-5">
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
                <!--botónes de categorias-->
                <div class="d-flex justify-content-center">
                    <ul class="nav nav-tabs justify-content-center  " id="ex1" role="tablist"
                        style="border-bottom: none;">

                        <?php
                        include_once ("../class/database.php");
                        $conexion = new Database();
                        $conexion->conectarDB();
                        $query = 'SELECT 
                        categorias.id_categoria,
                        categorias.nombre
                        FROM 
                        categorias 
                        WHERE 
                        categorias.tipo = "Evento"';
                        $categorias = $conexion->select($query);
                        $tru = "true";
                        $active = "active";
                        foreach ($categorias as $categoria) {
                            echo "<li class='row nav-item col-5 col-sm-5 col-md-3 col-lg-auto mb-2 mb-lg-0  me-0 text-center justify-content-center d-flex m-2 p-0 p-md-1 me-md-2' role='presentation'>";
                            echo "<a data-mdb-tab-init class='btn-categorias w-100 h-100' id='ex1-tabs-{$categoria->id_categoria}' href='#ex1-tabs-{$categoria->id_categoria}' role='tab' aria-controls='ex1-tabs-{$categoria->id_categoria}' aria-selected='$tru'>{$categoria->nombre}</a>";
                            echo "</li>";
                            $tru = "false";
                            $active = "";

                            /*
                        echo " <li class='mx-3 nav-item col-5 col-sm-5 col-md-4 col-lg-auto mb-2 mb-lg-0' role='presentation'>";
                        echo "<button class='btn-categorias w-100' id='{$categoria->id_categoria}-tab' data-bs-toggle='tab' data-bs-target='#{$categoria->id_categoria}' type='button' role='tab' aria-controls='{$categoria->id_categoria}' aria-selected='true'>{$categoria->nombre}</button>";
                        echo "</li>";
                        */
                        }
                        $conexion->desconectarDB();
                        ?>

                    </ul>
                </div>
                <!-- Contenido de las categorias -->
                <div class="tab-content col-12 p-1" id="ex1-content">

                    <?php
                    $conexion->conectarDB();
                    $query = 'SELECT 
                    categorias.id_categoria as cat_id, eventos.nombre, eventos.tipo, eventos.descripcion, eventos.img_url, eventos.fecha_evento, eventos.hora_inicio, eventos.hora_fin
                    FROM 
                     categorias 
                    JOIN 
                    eventos ON categorias.id_categoria = eventos.id_categoria
                    WHERE 
                    categorias.tipo = "Evento"';
                    $categorias = $conexion->select($query);
                    $active = "active";
                    foreach ($categorias as $categoria) {
                        echo " <div class='tab-pane fade $active' id='ex1-tabs-{$categoria->cat_id}' role='tabpanel' aria-labelledby='ex1-tab-{$categoria->cat_id}'>";
                        echo "  <div class='row justify-content-center mb-5'>";
                        echo "      <div class='col-12 col-md-8 d-flex align-items-center'>";
                        echo "          <div class='d-flex flex-wrap w-100 d-flex justify-content-center'>";
                        echo "              <div class='col-12 col-md-6 p-2 col-sm-6'>";
                        echo "                  <img src='../img/eventos/{$categoria->img_url}' class='card-img-top img-fluid' alt='...' style='height: 300px; object-fit: cover;'>";
                        echo "              </div>";
                        echo "              <div class='col-9 col-sm-9 col-md-6 p-2 d-flex flex-column justify-content-cente p-lg-2'>";
                        echo "                  <h5 class='fw-bold mb-3' style='letter-spacing: 1px;'>{$categoria->nombre}</h5>";
                        echo "                  <p class='text-dark-emphasis mb-4 '>{$categoria->descripcion}</p>";
                        echo "                  <a href='html/eventos.html' class='btn text-light shadow-lg align-self-start col-12 col-sm-12 col-md-6 col-lg-6' style='background: var(--primario);'>Ver Eventos</a>";
                        echo "              </div>";
                        echo "          </div>";
                        echo "      </div>";
                        echo "  </div>";
                        echo "</div>";
                        $active = "";
                    }

                    $conexion->desconectarDB();
                    ?>

                </div>

            </div>

        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
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
    <script src="../js/tabs.js"></script>
</body>

</html>