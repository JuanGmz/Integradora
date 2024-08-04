<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SínfoniaCafé&Cultura</title>
    <link rel="shortcut icon" href="img/Sinfonía-Café-y-Cultura.webp">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <?php
    session_start();
    require_once 'class/database.php';
    include_once("scripts/funciones/funciones.php");
    $db = new database();
    $db->conectarDB();

    if (isset($_SESSION["usuario"])) {
        $rolUsuario = "SELECT r.rol FROM roles r JOIN roles_usuarios ru ON r.id_rol = ru.id_rol JOIN personas p ON ru.id_usuario = p.id_usuario WHERE p.usuario = '$_SESSION[usuario]'";
        $rol = $db->select($rolUsuario);
    } else {
        $rol = null;
    }
    ?>
</head>

<body>
    <!-- Botón de WhatsApp -->
    <button id="whatsappButton" class="btn btn-success position-fixed bottom-0 start-0 m-3 p-3 d-flex align-items-center justify-content-center z-3" type="button" onclick="window.open('https://wa.me/528711220994?text=%C2%A1Hola!%20Escribo%20desde%20la%20p%C3%A1gina%20web%20y%20quer%C3%ADa%20consultar%20por%3A', '_blank')">
        <i class="fa-brands fa-whatsapp fa-2x"></i>
    </button>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg shadow-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="./img/Sinfonía-Café-y-Cultura.webp" alt="Logo" class="logo" loading="lazy">
            </a>
            <div class="offcanvas offcanvas-end" style="background: var(--primario);" tabindex="-1" id="offcanvasNavbar" aria-labelledby="tituloOffcanvas">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title text-light" id="tituloOffcanvas">SinfoníaCafé&Cultura</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="views/menu.php">Menú</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="views/ecommerce.php">Comprar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="views/recompensas.php">Recompensas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="views/eventos.php">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="views/publicaciones.php">Publicaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="views/contact.php">Contacto</a>
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
                    <?php if ($rol[0]->rol === 'administrador') { ?>
                        <a class="dropdown-item" href="views/adminInicio.php">Administrar</a>
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
    </nav>

    <!-- Inicio -->
    <div style="max-width: 100%;">
        <div class="row p-0 m-0">
            <div class="col-lg-8 m-0 p-0">
                <img src="img/sinfo.webp" class="img-fluid p-0 m-0" alt="imginicio" lazy="loading">
            </div>
            <div class="col-lg-4 d-flex flex-column justify-content-center align-items-center p-5" style="background: var(--color3);">
                <div class="row ">
                    <div class="col-12">
                        <h1 class="text-light text-center" style="letter-spacing: 1px;">Prueba el mejor café de la
                            ciudad</h1>
                    </div>
                </div>
                <div class="row mb-3 p-2 ">
                    <div class="col-12 d-flex justify-content-center">
                        <h5 class="text-light text-center">La mejor calidad para ti</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="views/menu.php" class="btn text-light shadow-lg " style="background: var(--primario);">Ver Menú</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenido -->
    <div class="container-fluid m-0 p-0" style="background: var(--color2);">

        <div class="row p-0 m-0">
            <!--Introducción-->
            <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center">
                <div class="container-fluid p-5 ">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <h1 class="fw-bold text-center">SinfoníaCafé&Cultura</h1>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-12 text-center p-2 ">
                            <p class="text-light text-dark p-3">
                                La primera barra y expendio de café de especialidad en la laguna.
                                Café 100% Mexicano seleccionado por nuestro maestro catador y tostador. ☕️♥️
                            </p>
                            <a href="views/conocenos.php" class="btn btn-cafe ">Ver mas</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="container">
                    <div class="row story-section justify-content-center d-flex">
                        <div class="col-md-8 col-12 col-sm-8">
                            <div class="row justify-content-center d-flex">
                                <!-- imagen 1 -->
                                <div class="col-md-6 mb-4 col-4 col-sm-6 col-6">
                                    <img src="./img/cafes/dino1.webp" alt="Coffee Image 3" class="img-thumbnail">
                                </div>
                                <!-- imagen 2 -->
                                <div class="col-md-6 mb-4 col-4 col-sm-6 col-6">
                                    <img src="./img/cafes/cafe9.webp" alt="Coffee Image 2" class="img-thumbnail">
                                </div>
                                <!-- imafen 3 -->
                                <div class="col-md-6 mb-4 col-4 col-sm-5 d-none d-md-block ">
                                    <img src="./img/cafes/cafe7.webp" alt="Coffee Image 1" class="img-thumbnail">
                                </div>
                                <!-- imagen 4 -->
                                <div class="col-md-6 mb-4 col-4 col-sm-5 d-none d-md-block">
                                    <img src="./img/cafes/dino2.webp" alt="Coffee Image 4" class="img-thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin introducción-->

            <!-- Menu especial para ti -->
            <div class="container p-3 bagr-cafe2">
                <div class="col-12 text-center ">
                    <h1 class="fw-bold text-center">Menu especial para ti</h1>
                </div>
                <!--botónes de categorias-->
                <div class="d-flex justify-content-center p-3 m-0">
                    <ul class="nav nav-tabs row col-12 m-0 d-flex justify-content-center" id="menuTabs" role="tablist" style="border-bottom: none;">
                        <?php
                        include_once("./class/database.php");
                        $conexion = new Database();
                        $conexion->conectarDB();
                        $query = 'SELECT 
                        categorias.id_categoria,categorias.nombre,categorias.descripcion,categorias.tipo,categorias.img_url
                        FROM 
                        categorias 
                        WHERE 
                        categorias.tipo = "Menu" limit 4';

                        $categorias = $conexion->select($query);

                        $tr = "true"; // Inicializa la variable fuera del ciclo
                        $active = "active";
                        foreach ($categorias as $categoria) {
                            echo "<li class='nav-item mb-2 col-6 col-sm-6 col-md-4 col-lg-3' role='presentation'>";
                            echo "<button class='btn-categorias $active w-100 h-100' id='{$categoria->id_categoria}-tab' data-bs-toggle='tab' data-bs-target='#{$categoria->id_categoria}' type='button' role='tab' aria-controls='{$categoria->id_categoria}' aria-selected='$tr'>{$categoria->nombre}</button>";
                            echo "</li>";
                            $tr = "false"; // Cambia el valor después de la primera iteración
                            $active = "";
                        }
                        $conexion->desconectarDB();
                        ?>


                    </ul>
                </div>
                <!-- Contenido de las categorias -->
                <div class="tab-content col-12 p-1" id="menuTabsContent">
                    <?php
                    $conexion->conectarDB();
                    $query = 'SELECT 
                        categorias.id_categoria,categorias.nombre,categorias.descripcion,categorias.tipo,categorias.img_url
                        FROM 
                        categorias 
                        WHERE 
                        categorias.tipo = "Menu" limit 4';

                    $categorias = $conexion->select($query);

                    $active = "show active";
                    foreach ($categorias as $categoria) {
                        echo "<div class='tab-pane fade $active' id='{$categoria->id_categoria}' role='tabpanel' aria-labelledby='{$categoria->id_categoria}-tab'>";
                        echo "<div class='row justify-content-center'>";
                        echo "<div class='col-12 col-md-10 col-lg-9 row justify-content-center'>";
                        echo "<div class='col-10 col-md-6 p-2 col-sm-10'>";
                        echo "<img src='img/categorias/{$categoria->img_url}' class='card-img-top img-fluid' alt='...' style='height: 280px; object-fit: cover;'>";
                        echo "</div>";
                        echo "<div class='col-9 col-sm-9  col-md-6 p-2 d-flex flex-column justify-content-cente p-lg-2'>";
                        echo "<h5 class='fw-bold mb-3' style='letter-spacing: 1px;'>{$categoria->nombre}</h5>";
                        echo "<p class='text-dark-emphasis mb-4 '>{$categoria->descripcion}</p>";
                        echo "<a href='views/menu/" . str_replace(' ', '', $categoria->nombre) . ".php' class='btn text-light shadow-lg align-self-start col-12 col-sm-12 col-md-6 col-lg-6 ' style='background: var(--primario);'>Ver Menú</a>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        $active = "";
                    }

                    ?>


                </div>
            </div>

            <!-- Selectores-->
            <div class=" m-0 p-0 ">
                <div class="col-12 row d-block p-3">
                    <div class="col-12">
                        <h1 class="fw-bold text-center mt-3">Servicios a tu medida</h1>
                    </div>
                </div>
                <!--seccion de servicios-->
                <div class="d-flex justify-content-center p-2">
                    <section class="col-12 row justify-content-center p-2">

                        <!-- Envio a tu Servicio-->
                        <div class="col-8 col-sm-6 col-sm-5 col-lg-4 m-0 p-0 text-center justify-content-center d-flex card-feature p-1">
                            <div class="">
                                <div class="row">
                                    <div class="col-12">
                                        <i class="fa-solid fa-truck"></i>
                                    </div>
                                    <div class="col-12">
                                        <span class="fw-bold">Envíos a tu Servicio</span>
                                        <p>En pedido superior a $150</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tarjeta regalo especial-->
                        <div class="col-8 col-sm-6 col-sm-5 col-lg-4 m-0 p-0 text-center justify-content-center d-flex card-feature p-1">
                            <a href="./views/recompensas.php">
                                <div class="">
                                    <div class="col-12">
                                        <div class="">
                                            <i class="fa-solid fa-gift"></i>
                                        </div>
                                        <div class="">
                                            <span class="fw-bold">Recompensas especiales</span>
                                            <p>Ofrece bonos especiales</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Servicio al cliente-->
                        <div class="col-8 col-sm-6 col-sm-5 col-lg-4 m-0 p-0 text-center justify-content-center d-flex card-feature p-1">
                            <a href="./views/contact.php">
                                <div class="">
                                    <div class="col-12">
                                        <i class="fa-solid fa-headset"></i>
                                    </div>
                                    <div class="col-12">
                                        <span class="fw-bold">Servicio al cliente 24/7</span>
                                        <p>Llamenos 24/7 al 871-454-7870</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </section>
                </div>

            </div>
            <!-- E-Commerce-->
            <div class="container-fluid bagr-cafe3 p-3">
                <div class="col-12 text-center p-2">
                    <h1 class="fw-bold text-center" style="letter-spacing: 1px;">Nuestras bolsas de café</h1>
                </div>
                <div class="row justify-content-center d-flex ">

                    <?php
                    include_once("./class/database.php");
                    $conexion = new Database();
                    $conexion->conectarDB();
                    $query = 'SELECT bolsas_cafe.id_bolsa,bolsas_cafe.nombre, bolsas_cafe.productor_finca ,bolsas_cafe.proceso,
                        bolsas_cafe.variedad,bolsas_cafe.altura,bolsas_cafe.aroma,bolsas_cafe.acidez,bolsas_cafe.sabor,
                        bolsas_cafe.cuerpo,bolsas_cafe.img_url
                        FROM bolsas_cafe limit 3; ';

                    $bolsas = $conexion->select($query);
                    $counter = 1;
                    foreach ($bolsas as $bolsa) {
                        $counter++;
                        $additionalClass = ($counter > 3) ? 'd-none' : ''; // Cambia la clase después del tercer ciclo
                        $additionalClass2 = ($counter > 3) ? 'd-md-block' : ''; // Cambia la clase después del tercer ciclo

                        // Debugging
                        echo "<!-- Counter: $counter, Class: $additionalClass -->";

                        echo "<div class='col-md-6 p-2 col-6 col-sm-6 col-lg-4 p-md-4 p-0 m-0 {$additionalClass} {$additionalClass2}'>";
                        echo "<div class='card m-0 blog-card shadow-lg' style='border-radius: 5% 5% 0% 0%;'>";
                        echo "<img src='img/bolsas/{$bolsa->img_url}' class='coffee-image align-card-img-top' alt='{$bolsa->id_bolsa}'>";
                        echo "<div class='card-body product-card-body'>";
                        echo "<h5 class='card-title fw-bold product-title' style='letter-spacing: 1px;'>{$bolsa->nombre}</h5>";
                        echo "<p class='card-text product-subtitle'>{$bolsa->proceso}</p>";
                        echo "<form action='views/bolsas/bolsas.php?id={$bolsa->id_bolsa}' method='post'>";
                        echo "<input type='hidden' name='id_bolsa' value='{$bolsa->id_bolsa}'>";
                        echo "<input type='submit' class='btn btn-cafe w-100' value='Ver Detalles'>";
                        echo "</div>";
                        echo "</a>";
                        echo "</div>";
                        echo "</div>";
                    }
                    $conexion->desconectarDB();
                    ?>

                </div>

            </div>

            <!-- Recompensas-->
            <section class="subscription-section d-flex align-items-center justify-content-center p-2">
                <div class="subscription-content text-center">
                    <h1 class="display-4">Obtén <span style="color: #d4a373;">RECOMPENSAS</span> increíbles
                    </h1>
                    <p class="lead">Para nuestros más fieles clientes</p>
                    <a href="views/recompensas.php" class="btn subscription-btn">Empezar a ganar</a>
                </div>
            </section>

            <!-- Blog-->
            <div class="container-fluid bagr-cafe3 p-3">

                <div class="col-12 text-center p-3">
                    <h1 class="fw-bold text-center" style="letter-spacing: 1px;">Publicaciones</h1>
                </div>

                <div class="row  justify-content-center d-flex">

                    <?php
                    $conexion->conectarDB();

                    // Obtener las publicaciones para la página actual
                    $query = 'SELECT 
                                titulo, 
                                descripcion, 
                                img_url,
                                fecha
                              FROM 
                                publicaciones
                              ORDER BY
                                fecha DESC
                              LIMIT 3';
                    $publicaciones = $conexion->select($query);

                    $countes = 1;

                    ?>
                    <div class="container mb-3 ">
                        <div class="row justify-content-center d-flex">
                            <?php foreach ($publicaciones as $publicacion) :
                                $countes++;
                                $additionalClass = ($countes > 3) ? 'd-none' : ''; // Cambia la clase después del tercer ciclo
                                $additionalClass2 = ($countes > 3) ? 'd-md-block' : ''; // Cambia la clase después del tercer ciclo
                            ?>
                                <div class='col-md-6 p-2 col-6 col-sm-6 col-lg-4<?php echo ' ' . $additionalClass . ' ' . $additionalClass2 ?>'>

                                    <a href="views/publicaciones/blog.php">
                                        <div class='card blog-card shadow-lg' style="border-radius: 5% 5% 0% 0%;">
                                            <img src='img/publicaciones/<?php echo $publicacion->img_url; ?>' class='coffee-image' alt='<?php echo $publicacion->titulo ?>'>
                                            <div class='cblog-card product-card-body'>
                                                <h5 class='blog-card-title'><?php echo $publicacion->titulo; ?></h5>
                                                <h6 class='blog-card-subtitle mb-2 text-muted'>
                                                    <?php echo $publicacion->fecha; ?></h6>
                                                <p class='blog-card-text  d-none d-md-block'>
                                                    <?php echo $publicacion->descripcion; ?></p>
                                                <a href='views/publicaciones.php' class='blog-card-link'>Mas detalles <i class="fa-solid fa-arrow-right"></i></a>
                                            </div>

                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <?php
                    $conexion->desconectarDB();
                    ?>

                </div>
                </a>
            </div>


            <!-- Conocenos-->
            <div class="container bagr-cafe1 p-4">
                <div class="col-12 text-center p-2 ">
                    <h1 class="fw-bold text-center" style="letter-spacing: 1px;">Conócenos</h1>
                </div>
                <!-- Carousel -->
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <!-- primer seccion-->
                        <div class="carousel-item active">
                            <div class="row">
                                <!-- imagen 1 -->
                                <div class="col-4 col-md-2">
                                    <a href=" https://www.facebook.com/sinfoniacafeycultura">
                                        <div class="carousel-item-wrapper">
                                            <img src="./img/cafes/cafe1.webp" class="d-block w-100" alt="...">
                                            <div class="overlay">
                                                <i class="fa-brands fa-facebook"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!-- imagen 2 -->
                                <div class="col-4 col-md-2">
                                    <a href="https://www.facebook.com/photo.php?fbid=1098191388477112&set=pb.100048587835727.-2207520000&type=3">
                                        <div class="carousel-item-wrapper">
                                            <img src="./img/cafes/cafe2.webp" class="d-block w-100" alt="...">
                                            <div class="overlay">
                                                <i class="fa-brands fa-facebook"></i>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                                <!-- imagen 3 -->
                                <div class="col-4 col-md-2">
                                    <a href="https://www.facebook.com/photo.php?fbid=1089403459355905&set=pb.100048587835727.-2207520000&type=3">
                                        <div class="carousel-item-wrapper">
                                            <img src="./img/cafes/cafe3.webp" class="d-block w-100" alt="...">
                                            <div class="overlay">
                                                <i class="fa-brands fa-facebook"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!-- imagen 4 -->
                                <div class="col-4 col-md-2 d-none d-md-block">
                                    <a href="https://www.facebook.com/photo.php?fbid=1088035302826054&set=pb.100048587835727.-2207520000&type=3">
                                        <div class="carousel-item-wrapper">
                                            <img src="./img/cafes/cafe4.webp" class="d-block w-100" alt="...">
                                            <div class="overlay">
                                                <i class="fa-brands fa-facebook"></i>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                                <!-- imagen 5 -->
                                <div class="col-4 col-md-2 d-none d-md-block">
                                    <a href="https://www.facebook.com/photo.php?fbid=1083951893234395&set=pb.100048587835727.-2207520000&type=3">
                                        <div class="carousel-item-wrapper">
                                            <img src="./img/cafes/cafe5.webp" class="d-block w-100" alt="...">
                                            <div class="overlay">
                                                <i class="fa-brands fa-facebook"></i>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                                <!-- imagen 6 -->
                                <div class="col-4 col-md-2 d-none d-md-block">
                                    <a href="https://www.facebook.com/photo.php?fbid=1081126390183612&set=pb.100048587835727.-2207520000&type=3">
                                        <div class="carousel-item-wrapper">
                                            <img src="./img/cafes/cafe6.webp" class="d-block w-100" alt="...">
                                            <div class="overlay">
                                                <i class="fa-brands fa-facebook"></i>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            </div>
                        </div>
                        <!-- segunda seccion-->
                        <div class="carousel-item">
                            <div class="row ">
                                <!-- imagen 7 -->
                                <div class="col-4 col-md-2">
                                    <a href="https://www.facebook.com/photo.php?fbid=1075046007458317&set=pb.100048587835727.-2207520000&type=3">
                                        <div class="carousel-item-wrapper">
                                            <img src="./img/cafes/cafe7.webp" class="d-block w-100" alt="...">
                                            <div class="overlay">
                                                <i class="fa-brands fa-facebook"></i>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                                <!-- imagen 8 -->
                                <div class="col-4 col-md-2">
                                    <a href="https://www.facebook.com/photo.php?fbid=789497972679790&set=pb.100048587835727.-2207520000&type=3">
                                        <div class="carousel-item-wrapper">
                                            <img src="./img/cafes/cafe8.webp" class="d-block w-100" alt="...">
                                            <div class="overlay">
                                                <i class="fa-brands fa-facebook"></i>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                                <!-- imagen 9 -->
                                <div class="col-4 col-md-2">
                                    <a href="https://www.facebook.com/photo.php?fbid=1021787422784176&set=pb.100048587835727.-2207520000&type=3">
                                        <div class="carousel-item-wrapper">
                                            <img src="./img/cafes/cafe9.webp" class="d-block w-100" alt="...">
                                            <div class="overlay">
                                                <i class="fa-brands fa-facebook"></i>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                                <!-- imagen 10 -->
                                <div class="col-4 col-md-2 d-none d-md-block">
                                    <a href="https://www.facebook.com/photo.php?fbid=1013628096933442&set=pb.100048587835727.-2207520000&type=3">
                                        <div class="carousel-item-wrapper">
                                            <img src="./img/cafes/cafe10.webp" class="d-block w-100" alt="...">
                                            <div class="overlay">
                                                <i class="fa-brands fa-facebook"></i>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                                <!-- imagen 11 -->
                                <div class="col-4 col-md-2 d-none d-md-block">
                                    <a href="https://www.facebook.com/photo.php?fbid=999156661713919&set=pb.100048587835727.-2207520000&type=3">
                                        <div class="carousel-item-wrapper">
                                            <img src="./img/cafes/cafe11.webp" class="d-block w-100" alt="...">
                                            <div class="overlay">
                                                <i class="fa-brands fa-facebook"></i>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                                <!-- imagen 12 -->
                                <div class="col-4 col-md-2 d-none d-md-block d-lg-block">
                                    <a href="https://www.facebook.com/photo.php?fbid=728966215399633&set=pb.100048587835727.-2207520000&type=3">
                                        <div class="carousel-item-wrapper">
                                            <img src="./img/cafes/cafe13.webp" class="d-block w-100" alt="...">
                                            <div class="overlay">
                                                <i class="fa-brands fa-facebook"></i>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
        </div>
    </div>

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

    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/45ef8dbe96.js" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>