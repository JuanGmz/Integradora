<?php
    session_start();
    include_once ("../../../class/database.php");
    $db = new Database();
    $db->conectarDB();


    if (isset($_SESSION['usuario'])) {
        $rolUsuario = "SELECT r.rol FROM roles r JOIN roles_usuarios ru ON r.id_rol = ru.id_rol JOIN personas p ON ru.id_usuario = p.id_usuario WHERE p.usuario = '$_SESSION[usuario]'";
        $rol = $db->select($rolUsuario);
    }

    extract($_POST);

    $query = "SELECT 
                productos_menu.*, 
                categorias.nombre AS categoria,
                detalle_productos_menu.medida,
                detalle_productos_menu.precio 
                FROM 
                    productos_menu 
                JOIN
                    detalle_productos_menu ON detalle_productos_menu.id_pm = productos_menu.id_pm
                JOIN 
                    categorias ON categorias.id_categoria = productos_menu.id_categoria
                WHERE
                    c.nombre = 'Sweet Blues'
                WHERE productos_menu.id_pm = $id_pm";

    $producto = $db->select($query);

    $queryMedidas = "SELECT medida, precio FROM detalle_productos_menu WHERE id_pm = $id_pm";

    $medidas = $db->select($queryMedidas);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $producto[0]->nombre ?></title>
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="shortcut icon" href="../../../img/Sinfonía-Café-y-Cultura.webp">
</head>

<body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg shadow-lg mb-lg-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../../index.php">
                <img src="../../../img/Sinfonía-Café-y-Cultura.webp" alt="Logo" class="logo" loading="lazy">
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
                            <a class="nav-link" aria-current="page" href="../../menu.php">Menú</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="../../ecommerce.php">Comprar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="../../recompensas.php">Recompensas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="../../eventos.php">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="../../publicaciones.php">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="../../contact.php">Contacto</a>
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
                        <a class="dropdown-item" href="../../perfil.php">Mi perfil</a>
                        <?php if ($rol[0]->rol === 'administrador') { ?>
                            <a class="dropdown-item" href="../../adminInicio.php">Administrar</a>
                            <div class="dropdown-divider"></div>
                        <?php } ?>
                        <a class="dropdown-item" href="../../../scripts/login/cerrarsesion.php">Cerrar sesión</a>
                    </div>
                <?php
                } else {
                ?>
                    <a href="../../login.php" class="login-button ms-auto">Iniciar Sesión</a>
                <?php
                }
                ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>
    <!-- NavBar End -->

    <div class="container mb-lg-5 mb-3">

        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item"><a href="../../../index.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="../../menu.php">Menú</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="../<?php echo str_replace(' ', '', $producto[0]->categoria)?>.php"><?php echo $producto[0]->categoria?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $producto[0]->nombre?></li>
            </ol>
        </nav>

        <div class="row m-0 p-0 mb-3 shadow-lg rounded">
            <!-- Imagen -->
            <div class="col-lg-4 m-0 p-0">
                <img src="../../../img/menu/<?php echo $producto[0]->img_url?>" alt="Imagen del producto" class="img-fluid rounded coffee-image">
            </div>
            <div class="col-lg-8 m-0 p-3">
                <!-- Nombre -->
                <h1><?php echo $producto[0]->nombre?></h1>
                <!-- Descripción -->
                <h3><?php echo $producto[0]->descripcion?></h3>

                <table>
                    <tbody>
                <!-- medidas -->
                <?php
                    foreach($medidas as $medida) {
                        echo "<tr class='text-center'>
                                <td class='fs-2 p-2 ps-0'>$medida->medida</td>
                                <td class='fs-2 p-2'>-</td>
                                <td class='fs-2 p-2'>$$medida->precio</td>
                            </tr>";
                    }
                ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container-fluid p-5" style="background: var(--negroclaro);">
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

    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/45ef8dbe96.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>