<?php
include_once("../class/database.php");
$db = new Database();
$db->conectarDB();
session_start();
if (isset($_SESSION["usuario"])) {
    $rolUsuario = "SELECT r.rol FROM roles r JOIN roles_usuarios ru ON r.id_rol = ru.id_rol JOIN personas p ON ru.id_usuario = p.id_usuario WHERE p.usuario = '$_SESSION[usuario]'";
    $rol = $db->select($rolUsuario);

    $nombres = "SELECT CONCAT_WS(' ', nombres, apellido_paterno, apellido_materno) AS nombre FROM personas WHERE usuario = '$_SESSION[usuario]'";
    $nombre = $db->select($nombres);
} else {
    $rol = null;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recompensas</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/Sinfonía-Café-y-Cultura.webp">
</head>

<body>
    <!-- Botón de WhatsApp -->
    <button id="whatsappButton" class="btn btn-success position-fixed bottom-0 start-0 m-3 p-3 d-flex align-items-center justify-content-center z-3" type="button" onclick="window.open('https://wa.me/528711220994?text=%C2%A1Hola!%20Escribo%20desde%20la%20p%C3%A1gina%20web%20y%20quer%C3%ADa%20consultar%20por%3A', '_blank')">
        <i class="fa-brands fa-whatsapp fa-2x"></i>
    </button>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg shadow-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">
                <img src="../img/Sinfonía-Café-y-Cultura.webp" alt="Logo" class="logo" loading="lazy">
            </a>
            <div class="offcanvas offcanvas-end" style="background: var(--primario);" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
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

    <!-- contenido -->
    <section class="subscription-section d-flex align-items-center justify-content-center m-0 p-0">
        <div class="subscription-content text-center m-0 p-0">
            <?php
            if (!isset($_SESSION["usuario"])) {
            ?>
                <h1 class="display-4 fw-bold "><span style="color: #fff;">SínfoniaCafé&Cultura</span></h1>
                <h2 class=" fw-bold "><span style="color: #fff;">Obtén recompensas íncreibles</span></h>
                <?php
            } else {
                ?>
                    <h1 class="display-4 fw-bold "><span style="color: #fff;">Hola <?php echo $nombre[0]->nombre ?></span></h1>
                    <h3>Comienza a ganar</h3>
                <?php
            }
                ?>
        </div>
    </section>

    <div class="row m-0 p-0 px-lg-4 px-1 mb-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item fw-bold"><a href="../index.php">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page"></li>Recompensas</li>
            </ol>
        </nav>

        <div class="row m-0 p-0">
            <?php
            if (isset($_SESSION["usuario"])) {
                $query = "SELECT
                            * 
                        FROM 
                            view_clientes_recompensas 
                        JOIN
                            clientes ON view_clientes_recompensas.id_cliente = clientes.id_cliente 
                        JOIN 
                            personas ON clientes.id_persona = personas.id_persona 
                        WHERE 
                            usuario = '" . $_SESSION["usuario"] . "'";

                $cliente = "SELECT 
                                c.id_cliente 
                            FROM 
                                clientes AS c 
                            JOIN
                                personas AS p ON c.id_persona = p.id_persona 
                            WHERE p.usuario = '" . $_SESSION["usuario"] . "'";
                $cliente = $db->select($cliente);
            ?>
                <h4>Tu ID de cliente es: <?php echo $cliente[0]->id_cliente ?></h4>
                <p>Muestra este ID para registrar asistencias con cada compra que realices</p>
                <?php
                $recompensas = $db->select($query);
                foreach ($recompensas as $recompensa) {

                $colors = ['#a18263', '#835d38', '#343434', '#bf9d60', '#e4ccb4', '#1c2338'];
                ?>

                    <div class="ag-courses_box col-12 col-md-6 col-lg-4">
                        <div class="ag-courses_item">
                            <a href="#" class="ag-courses-item_link">
                                <?php $random_color = $colors[array_rand($colors)]; ?>
                                <div class="ag-courses-item_bg" style="background-color: <?php echo $random_color; ?>;"></div>

                                <div class="ag-courses-item_image">
                                    <img src="../img/recompensas/<?= $recompensa->img_url ?>" alt="Descripción de la imagen">
                                </div>
                                <div class="ag-courses-item_title">
                                    <h3 class="card-title fw-bold text-center mt-2"><?php echo $recompensa->recompensa ?></h3>
                                </div>
                                <div class="ag-courses-item_date-box">
                                    <h5 class="card-text text-center">Asistencias completadas</h5>
                                    <h5 class="card-text text-center"><?php echo $recompensa->asistencias_completadas ?></h5>
                                    <h5 class="card-text text-center">Duración</h5>
                                    <span class="ag-courses-item_date">
                                        <h5 class="card-text text-center"><?php echo $recompensa->periodo ?></h5>
                                    </span>
                                    <div class="d-flex justify-content-center p-2">
                                        <?php
                                        if ($recompensa->progreso >= $recompensa->condicion) {
                                            if ($recompensa->canje == 0) {
                                        ?>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-cafe p-2 m-2" data-bs-toggle="modal" data-bs-target="#recompensa_<?php echo $recompensa->id_recompensa ?>">
                                                    Canjear
                                                </button>
                                            <?php
                                            } else {
                                            ?>
                                                <button disabled class="btn btn-secondary m-2 p-2">Recompensa Canjeada</button>
                                            <?php
                                            }
                                            ?>
                                            <!-- Modal -->
                                            <div class="modal fade" id="recompensa_<?php echo $recompensa->id_recompensa ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cupón para canjeo</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5 class="text-center m-2">Índica al cajero que este es tu cupón de canjeo</h5>
                                                            <h5 class="text-center fw-bold m-2"><?php echo $recompensa->canje_id ?></h5>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <button disabled class="btn btn-secondary m-2 p-2">Canjear recompensa</button>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>


                <?php
                }
                ?>
                <div class="col-12 mt-5">
                    <h3>Gracias por formar parte de la familia SínfoniaCafé&Cultura, <?php echo $nombre[0]->nombre ?></h3>
                </div>
            <?php
            } else {
            ?>
                <div class="text-center fw-bold mt-3">

                    <div class="row m-0 p-0">
                        <div class="col-12 mb-3">
                            <h1>Únete a SínfoniaCafé&Cultura y desbloquea recompensas increíbles por ser cliente</h1>
                        </div>
                        <div class="col-6 col-lg-3 m-0 p-0">
                            <img src="../img/cafes/coffee-cups.png" alt="cafe" style="height: 100px; width: 100px;">
                            <p>El mejor café gratis.</p>
                        </div>
                        <div class="col-6 col-lg-3 m-0 p-0">
                            <img src="../img/cafes/pastel.png" alt="pasteles" style="height: 100px; width: 100px;">
                            <p>Prueba nuestros deliciosos pasteles.</p>
                        </div>
                        <div class="col-6 col-lg-3 m-0 p-0">
                            <img src="../img/cafes/entradas.png" alt="boletos" style="height: 100px; width: 100px;">
                            <p>Asiste a nuestros eventos, una experiencia inolvidable.</p>
                        </div>
                        <div class="col-6 col-lg-3 m-0 p-0">
                            <img src="../img/cafes/cupones.png" alt="descuentos" style="height: 100px; width: 100px;">
                            <p>Tendrás descuentos exclusivos.</p>
                        </div>
                    </div>

                    <div class="row m-0 p-0 mt-3">
                        <div class="col-12 m-0 p-0">
                            <h1 class="text-center fw-bold shadow rounded p-2 mb-5" style="background: var(--color8);">Como funciona nuestro sistema de recompensas</h1>
                            <div class="row m-0 p-0">
                                <div class="col-12 col-lg-4 m-0 p-0">
                                    <img src="../img/cafes/telefono-inteligente.png" alt="telefono" style="height: 100px; width: 100px;">
                                    <p>Registrate o inicia sesión para comenzar a ganar.</p>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <img src="../img/cafes/puesto-de-comida.png" alt="local" style="height: 100px; width: 100px;">
                                    <p>Visita nuestro local, realiza una compra y solicita que sea registrada para obtener una asistencia.</p>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <img src="../img/cafes/compras.png" alt="compra" style="height: 100px; width: 100px;">
                                    <p>Reclama tus recompensas cuando tengas las asistencias necesarias.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- Footer -->
    <footer class="mt-auto">
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

    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/b820f07375.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>