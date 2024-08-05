<?php
include_once ("../class/database.php");
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
    <style>
        .thank-you-section {
            position: relative;
            padding: 20px;
            background: url('../img/cafes/cafe14.webp') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            border-radius: 10px;
            text-align: center;
            overflow: hidden;
        }

        .thank-you-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            z-index: 0;
        }

        .thank-you-content {
            position: relative;
            z-index: 1;
            color: #fff;
        }

        .thank-you-section h3 {
            font-size: 1.75rem;
            color: #fff;
            margin-bottom: 1rem;
        }

        .thank-you-section p {
            color: #ddd;
        }

        .thank-you-section .btn {
            margin-top: 1rem;
            background-color: #c29b50;
            border-color: #c29b50;
        }
    </style>

</head>

<body>
    <!-- Botón de WhatsApp -->
    <button id="whatsappButton"
        class="btn btn-success position-fixed bottom-0 start-0 m-3 p-3 d-flex align-items-center justify-content-center z-3"
        type="button"
        onclick="window.open('https://wa.me/528711220994?text=%C2%A1Hola!%20Escribo%20desde%20la%20p%C3%A1gina%20web%20y%20quer%C3%ADa%20consultar%20por%3A', '_blank')">
        <i class="fa-brands fa-whatsapp fa-2x"></i>
    </button>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg shadow-lg ">
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
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
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
                <h1 class="display-4 fw-bold"><span style="color: #fff;">Descubre SínfoniaCafé&Cultura</span></h1>
                <h2><span style="color: #fff;">¡Recompensas y experiencias únicas te esperan!</span></h2>
                <?php
            } else {
                ?>
                <h1 class="display-4 fw-bold">
                    <span>¡Bienvenido, </span>
                    <span style="color: #c29b50;"><?php echo htmlspecialchars($nombre[0]->nombre); ?><span class="text-light">!</span></span>
                </h1>
                <h3>Empieza a disfrutar de nuestras exclusivas recompensas</h3>
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
                echo "
    <div class='container my-1'>
        <div class='row'>
            <div class='col-12 text-center'>
                <div class='bg-light p-4 rounded-3 shadow-sm'>
                    <h4 class='mb-2' style='font-size: 1.25rem; color: #333;'>Tu ID de cliente es: 
                        <span style='color: #ca3f42'>" . htmlspecialchars($cliente[0]->id_cliente) . "</span>
                    </h4>
                    <p class='text-muted'>
                        Muestra este ID para registrar tu asistencia a nuestra cafetería. 
                        <br>Recuerda que para registrar una asistencia es necesario realizar una compra mínima en nuestra cafetería. <br>¡Gracias por ser parte de nuestra comunidad!
                    </p>
                </div>
            </div>
        </div>
    </div>
";
                $recompensas = $db->select($query);
                if ($recompensas == null) {

                    echo "
        <div class='row my-3 justify-content-center m-0'>
            <div class='col-12 text-center my-3'>
                <h3 class='mb-3'>¡Actualmente no tienes recompensas disponibles!</h3>
                <div  style='
                    display: inline-block;
                    border-bottom: 4px solid #252525;
                    width: 120px; 
                    border-radius: 10px;
                    margin-top: 10px;'>
                </div>
            </div>
            <div class='col-lg-3 d-flex flex-column text-center gap-3 mt-3'>
                <div class='bg-white rounded-3 p-3 shadow-sm'>
                    <i class='fa-solid fa-mug-saucer fa-3x mb-2' style='color: #c29b50;'></i>
                    <h4 class='mb-2'>Conoce Nuestras Bebidas</h4>
                    <p>Descubre el extenso catálogo de bebidas para ti. Siempre hay algo nuevo y emocionante para explorar y disfrutar.</p>
                    <a href='menu.php' class='btn btn-primary' style='background-color: #c29b50; border-color: #c29b50;'>Explorar Menú</a>
                </div>
            </div>
            <div class='col-lg-3 d-flex flex-column text-center gap-3 mt-3'>
                <div class='bg-white rounded-3 p-3 shadow-sm'>
                    <i class='fa-solid fa-heart fa-3x mb-2' style='color: #c29b50;'></i>
                    <h4 class='mb-2'>¡Novedades a la Vista!</h4>
                    <p>Estamos preparando emocionantes novedades y recompensas para ti. ¡No te pierdas nuestras próximas actualizaciones!</p>
                    <a href='publicaciones.php' class='btn btn-primary' style='background-color: #c29b50; border-color: #c29b50;'>Explorar Publicaciones</a>
                </div>
            </div>
            <div class='col-lg-3 d-flex flex-column text-center gap-3 mt-3'>
                <div class='bg-white rounded-3 p-3 shadow-sm'>
                    <i class='fa-solid fa-hand-holding-heart fa-3x mb-2' style='color: #c29b50;'></i>
                    <h4 class='mb-2'>Próximamente</h4>
                    <p>Estamos trabajando en nuevas recompensas especiales para ti. Mantente atento a nuestras actualizaciones.</p>
                    <a href='ecommerce.php' class='btn btn-primary' style='background-color: #c29b50; border-color: #c29b50;'>Explorar Comprar</a>
                </div>
            </div>
            <div class='col-lg-3 d-flex flex-column text-center gap-3 mt-3'>
                <div class='bg-white rounded-3 p-3 shadow-sm'>
                    <i class='fa-solid fa-award fa-3x mb-2' style='color: #c29b50;'></i>
                    <h4 class='mb-2'>Recompensas en camino</h4>
                    <p>Explora nuestros premios actuales y aprende cómo puedes ganarlos. ¡Visita nuestra cafetería para más detalles!</p>
                    <a href='eventos.php' class='btn btn-primary' style='background-color: #c29b50; border-color: #c29b50;'>Explorar Eventos</a>
                </div>
            </div>
        </div>";

                } else {
                    foreach ($recompensas as $recompensa) {

                        $colors = ['#a18263', '#835d38', '#343434', '#bf9d60', '#e4ccb4', '#1c2338'];
                        ?>
                        <style>
                            .ag-courses_box {
                                padding: 50px 0;
                            }

                            .ag-courses-item_image {
                                position: absolute;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                opacity: 0;
                                transition: opacity .5s ease;
                                border-radius: 28px;
                                /* Asegura que la imagen tenga los mismos bordes redondeados */
                                overflow: hidden;
                                /* Asegura que la imagen no desborde */
                                z-index: 1;
                            }

                            .ag-courses-item_image img {
                                width: 100%;
                                height: 100%;
                                object-fit: cover;
                                filter: blur(1px);
                            }

                            .ag-courses-item_link:hover .ag-courses-item_image {
                                opacity: 1;
                            }


                            .ag-courses_item {
                                -ms-flex-preferred-size: calc(33.33333% - 30px);
                                flex-basis: calc(33.33333% - 30px);
                                margin: 0 15px 30px;
                                overflow: hidden;
                                border-radius: 28px;
                            }

                            /* Este selector define cada ítem del curso con un ancho calculado del 33.33% menos 30px, agrega márgenes y bordes redondeados, y oculta el desbordamiento */

                            .ag-courses-item_link {
                                display: block;
                                padding: 30px 20px;
                                background-color: var(--blanco);
                                overflow: hidden;
                                position: relative;
                            }

                            /* Este selector define el enlace de cada ítem del curso como un bloque, con relleno, fondo oscuro y posición relativa para contener elementos posicionales hijos */

                            .ag-courses-item_link:hover,
                            .ag-courses-item_link:hover .ag-courses-item_date {
                                text-decoration: none;
                                color: #FFF;
                            }

                            .ag-courses-item_link:hover,
                            .ag-courses-item_link:hover .ag-courses-item_title,
                            .ag-courses-item_link:hover .ag-courses-item_date-box {
                                text-decoration: none;
                                color: #FFF;
                            }

                            /* Este selector elimina la decoración del texto y cambia el color del enlace y la fecha al pasar el mouse */

                            .ag-courses-item_link:hover .ag-courses-item_bg {
                                -webkit-transform: scale(10);
                                -ms-transform: scale(10);
                                transform: scale(10);
                            }

                            /* Este selector escala el fondo del ítem del curso al pasar el mouse */

                            .ag-courses-item_title {
                                min-height: 30px;
                                margin: 0;
                                overflow: hidden;
                                font-weight: bold;
                                font-size: 10px;
                                color: var(--negro);
                                z-index: 2;
                                position: relative;
                            }

                            /* Este selector define el título del ítem del curso con un alto mínimo, márgenes, fuente en negrita y tamaño grande, color blanco y posición relativa con un z-index para estar sobre otros elementos */

                            .ag-courses-item_date-box {
                                font-size: 18px;
                                color: var(--negro);
                                z-index: 2;
                                position: relative;
                            }

                            /* Este selector define el contenedor de la fecha del ítem del curso con un tamaño de fuente y color específico, y posición relativa */

                            .ag-courses-item_date {
                                font-weight: bold;
                                color: var(--color1);
                                -webkit-transition: color .5s ease;
                                -o-transition: color .5s ease;
                                transition: color .5s ease;
                            }

                            /* Este selector define la fecha del ítem del curso con fuente en negrita y un color específico, y una transición suave al cambiar el color */

                            .ag-courses-item_bg {
                                height: 150px;
                                width: 150px;
                                background-color: #f9b234;
                                z-index: 1;
                                position: absolute;
                                top: -75px;
                                right: -75px;
                                border-radius: 50%;
                                -webkit-transition: all .5s ease;
                                -o-transition: all .5s ease;
                                transition: all .5s ease;
                            }
                        </style>
                        <div class="ag-courses_box col-12 col-md-6 col-lg-4 p-3">
                            <div class="ag-courses_item m-0 p-0">
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
                                                    <button type="button" class="btn btn-cafe p-2 m-2" data-bs-toggle="modal"
                                                        data-bs-target="#recompensa_<?php echo $recompensa->id_recompensa ?>">
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
                                                <div class="modal fade" id="recompensa_<?php echo $recompensa->id_recompensa ?>"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Cupón para canjeo
                                                                </h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h5 class="text-center m-2">Índica al cajero que este es tu cupón de
                                                                    canjeo</h5>
                                                                <h5 class="text-center fw-bold m-2"><?php echo $recompensa->canje_id ?>
                                                                </h5>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cerrar</button>
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
                }
                ?>
                <div class='container mt-3'>
                    <div class='row'>
                        <div class='col-12 text-center'>
                            <div class='thank-you-section p-4 rounded-3 shadow-sm'>
                                <div class='thank-you-content'>
                                    <h3 class='mb-3'>
                                        Gracias por formar parte de la familia SínfoniaCafé&Cultura,
                                        <span
                                            style="color:   burlywood;"><?php echo htmlspecialchars($nombre[0]->nombre); ?></span>
                                    </h3>
                                    <p class='lead'>
                                        Nos alegra tenerte con nosotros. ¡Estamos emocionados por las experiencias y
                                        momentos increíbles que compartiremos!
                                    </p>
                                    <a href='../index.php' class='btn btn-primary mt-3'>Explorar Inicio</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            } else {
                ?>
                <div class="row m-0">
                    <!-- Recompensas -->
                    <div class='col-12 text-center my-3'>
                        <h3 class='mb-3'>¡Únete a SínfoniaCafé&Cultura y desbloquea recompensas increíbles por ser cliente
                            frecuente!</h3>
                        <div style='
                    display: inline-block;
                    border-bottom: 4px solid #252525;
                    width: 120px; 
                    border-radius: 10px;
                    margin-top: 10px;'>
                        </div>
                    </div>
                    <div class="col-lg-3 d-flex flex-column text-center gap-3 mt-3">
                        <div class='bg-white rounded-3 p-3 shadow-sm h-100'>
                            <i class="fa-solid fa-mug-saucer fa-3x mb-2" style="color: #c29b50;"></i>
                            <h4 class='mb-2'>Café Delicioso.</h4>
                            <p>El mejor café de la región, preparado para ti.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 d-flex flex-column text-center gap-3 mt-3">
                        <div class='bg-white rounded-3 p-3 shadow-sm h-100'>
                            <i class="fa-solid fa-cake-candles fa-3x mb-2" style="color: #c29b50;"></i>
                            <h4 class='mb-2'>Postres Deliciosos</h4>
                            <p>Prueba nuestros deliciosos postres.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 d-flex flex-column text-center gap-3 mt-3">
                        <div class='bg-white rounded-3 p-3 shadow-sm h-100'>
                            <i class="fa-solid fa-ticket fa-3x" style="color: #c29b50;"></i>
                            <h4 class='mb-2'>Eventos Inolvidables</h4>
                            <p>Asiste a nuestros eventos, una experiencia inolvidable.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 d-flex flex-column text-center gap-3 mt-3">
                        <div class='bg-white rounded-3 p-3 shadow-sm  h-100'>
                            <i class="fa-solid fa-tag fa-3x mb-2" style="color: #c29b50;"></i>
                            <h4 class='mb-2'>Descuentos Exclusivos</h4>
                            <p>Tendrás descuentos exclusivos en tus compras.</p>
                        </div>
                    </div>
                    <!-- Cómo funciona -->
                    <div class="col-12 text-center thank-you-section mt-5 mb-4">
                        <div class="thank-you-content">
                            <h1 class="color-white fw-bold">Cómo funciona nuestro sistema de recompensas?</h1>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex flex-column text-center gap-3 mt-3">
                        <div class='bg-white rounded-3 p-3 shadow-sm h-100'>
                            <i class="fa-solid fa-user-plus fa-3x mb-2" style="color: #c29b50;"></i>
                            <h4 class='mb-2'>Regístrate</h4>
                            <p>Regístrate o inicia sesión para comenzar a ganar increíbles recompensas.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex flex-column text-center gap-3 mt-3">
                        <div class='bg-white rounded-3 p-3 shadow-sm h-100'>
                            <i class="fa-solid fa-store fa-3x mb-2" style="color: #c29b50;"></i>
                            <h4 class='mb-2'>Visitanos, compra y registra.</h4>
                            <p>Visita nuestro local, realiza una compra y solicita que tu asistencia sea registrada para que
                                puedas obtener tus recompensas.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex flex-column text-center gap-3 mt-3">
                        <div class='bg-white rounded-3 p-3 shadow-sm h-100'>
                            <i class="fa-solid fa-award fa-3x mb-2" style="color: #c29b50;"></i>
                            <h4 class='mb-2'>Reclama tus Recompensas</h4>
                            <p>Reclama tus recompensas cuando tengas las asistencias necesarias.</p>
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
    <script src="https://kit.fontawesome.com/b820f07375.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>