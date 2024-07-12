<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SínfoniaCafé&Cultura</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
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
                            <a class="nav-link mx-lg-2" href="html/ecommerce.html">Comprar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="html/recompensas.html">Recompensas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="html/eventos.html">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="html/blog.html">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="html/contact.html">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="html/login.html" class="login-button ms-auto">Iniciar Sesión</a>
            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
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
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-light text-center" style="letter-spacing: 1px;">Prueba el mejor café de la
                            ciudad</h1>
                    </div>
                </div>
                <div class="row mb-3 p-2">
                    <div class="col-12">
                        <h5 class="text-light">La mejor calidad para ti</h5>
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
                        <div class="col-12">
                            <h1 class="fw-bold text-center">SinfoníaCafé&Cultura</h1>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-12 text-center p-2 ">
                            <p class="text-light text-dark p-3">
                                La mejor manera de preparar tu cafe
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus provident ex
                                impedit
                                facere, aut earum sapiente voluptate officia soluta explicabo quaerat nihil officiis
                                commodi animi. In deserunt culpa provident pariatur.
                            </p>

                            <a href="#" class="btn btn-cafe ">Ver mas</a>

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
                    <ul class="nav nav-tabs row col-12 m-0" id="menuTabs" role="tablist" style="border-bottom: none;">
                        <li class="nav-item  mb-2 col-6 col-sm-6 col-md-4 col-lg-3 " role="presentation">
                            <!--Clasicos-->
                            <button class="btn-categorias   active w-100" id="clasicos-tab" data-bs-toggle="tab" data-bs-target="#clasicos" type="button" role="tab" aria-controls="clasicos" aria-selected="true">Clasicos</button>
                        </li>
                        <li class="nav-item  mb-2 col-6 col-sm-6 col-md-4 col-lg-3  " role="presentation">
                            <!--Cool and Dark-->
                            <button class=" btn-categorias   w-100" id="Cool-tab" data-bs-toggle="tab" data-bs-target="#Cool" type="button" role="tab" aria-controls="Cool" aria-selected="false">Cool and Dark</button>
                        </li>
                        <li class="nav-item  mb-2 col-6 col-sm-6 col-md-4 col-lg-3  " role="presentation">
                            <!--Around The World-->
                            <button class=" btn-categorias  w-100" id="Around-tab" data-bs-toggle="tab" data-bs-target="#Around" type="button" role="tab" aria-controls="Around" aria-selected="false">Around The World</button>
                        </li>
                        <li class="nav-item  mb-2 col-6 col-sm-6 col-md-4 col-lg-3  " role="presentation">
                            <!--Frappes-->
                            <button class=" btn-categorias   w-100" id="Frappes-tab" data-bs-toggle="tab" data-bs-target="#Frappes" type="button" role="tab" aria-controls="Frappes" aria-selected="false">Frappes</button>
                        </li>

                    </ul>
                </div>
                <!-- Contenido de las categorias -->
                <div class="tab-content col-12 p-1" id="menuTabsContent">
                    <!--Contenido para Clasicos -->
                    <div class="tab-pane fade show active" id="clasicos" role="tabpanel" aria-labelledby="clasicos-tab">
                        <div class="row justify-content-center mb-5">
                            <div class="col-12 col-md-8 d-flex align-items-center">
                                <div class="d-flex flex-wrap w-100 d-flex justify-content-center">
                                    <div class="col-10 col-md-6 p-2 col-sm-10">
                                        <img src="./img/cafes/cafe11.webp" class="card-img-top img-fluid" alt="..." style="height: 250px; object-fit: cover; width: 300px;">
                                    </div>
                                    <div class="col-10 col-sm-10 col-md-6 p-2 d-flex flex-column justify-content-cente p-lg-2">
                                        <h5 class="fw-bold mb-3" style="letter-spacing: 1px;">Menu Clasicos</h5>
                                        <p class="text-dark-emphasis mb-4 ">Explora nuestro Menú Clásico de Café, donde
                                            cada taza es una experiencia única y reconfortante. Desde el espresso
                                            intenso hasta el cappuccino cremoso, cada bebida se prepara con gran
                                            atención al detalle para ofrecerte el mejor sabor y aroma.</p>
                                        <a href="html/menu.html" class="btn text-light shadow-lg align-self-start col-12 col-sm-12 col-md-6 col-lg-6" style="background: var(--primario);">Ver Menú</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Cool" role="tabpanel" aria-labelledby="Cool-tab">
                        <!-- Contenido para Cool and Dark -->
                        <div class="row justify-content-center mb-5">
                            <div class="col-12 col-md-8 d-flex align-items-center">
                                <div class="d-flex flex-wrap w-100 d-flex justify-content-center">
                                    <div class="col-10 col-md-6 p-2 col-sm-10">
                                        <img src="./img/cafes/cafe12.webp" class="card-img-top img-fluid" alt="..." style="height: 300px; object-fit: cover;">
                                    </div>
                                    <div class="col-9 col-sm-9  col-md-6 p-2 d-flex flex-column justify-content-cente p-lg-2">
                                        <h5 class="fw-bold mb-3" style="letter-spacing: 1px;">Menu Cool and Dark</h5>
                                        <p class="text-dark-emphasis mb-4">Déjate cautivar por nuestro exclusivo Menú
                                            Cool and Dark de Café, donde cada sorbo es una experiencia de sabor intensa
                                            y sofisticada. Disfruta de una selección de bebidas que combinan el rico
                                            aroma del café con notas profundas y indulgentes</p>
                                        <a href="html/menu.html" class="btn text-light shadow-lg align-self-start col-12 col-sm-12 col-md-6 col-lg-6" style="background: var(--primario);">Ver Menú</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Around" role="tabpanel" aria-labelledby="Around-tab">
                        <!-- Contenido para Around The World -->
                        <div class="row justify-content-center mb-5">
                            <div class="col-12 col-md-8 d-flex align-items-center">
                                <div class="d-flex flex-wrap w-100 d-flex justify-content-center">
                                    <div class="col-10 col-md-6 p-2 col-sm-10">
                                        <img src="./img/cafes/cafe3.webp" class="card-img-top img-fluid" alt="..." style="height: 300px; object-fit: cover;">
                                    </div>
                                    <div class="col-9 col-sm-9  col-md-6 p-2 d-flex flex-column justify-content-cente p-lg-2">
                                        <h5 class="fw-bold mb-3" style="letter-spacing: 1px;">Around The World</h5>
                                        <p class="text-dark-emphasis mb-4">Embárcate en un viaje culinario con nuestro
                                            Menú Around The World, donde cada plato te transporta a sabores únicos y
                                            exóticos de diferentes rincones del mundo. Descubre una variedad de delicias
                                            internacionales cuidadosamente seleccionadas para satisfacer tu curiosidad
                                            gastronómica</p>
                                        <a href="html/menu.html" class="btn text-light shadow-lg align-self-start col-12 col-sm-12 col-md-6 col-lg-6" style="background: var(--primario);">Ver Menú</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Frappes" role="tabpanel" aria-labelledby="Frappes-tab">
                        <!-- Contenido para frappes -->
                        <div class="row justify-content-center mb-5">
                            <div class="col-12 col-md-8 d-flex align-items-center">
                                <div class="d-flex flex-wrap w-100 d-flex justify-content-center">
                                    <div class="col-10 col-md-6 p-2 col-sm-10">
                                        <img src="./img/cafes/cafe6.webp" class="card-img-top img-fluid" alt="..." style="height: 300px; object-fit: cover;">
                                    </div>
                                    <div class="col-9 col-sm-9  col-md-6 p-2 d-flex flex-column justify-content-cente p-lg-2">
                                        <h5 class="fw-bold mb-3" style="letter-spacing: 1px;">Frappes</h5>
                                        <p class="text-dark-emphasis mb-4">Descubre nuestro irresistible menú de
                                            frappés, donde cada sorbo es una fusión perfecta de café, cremosidad y
                                            refrescante hielo. </p>

                                        <a href="html/menu.html" class="btn text-light shadow-lg align-self-start col-12 col-sm-12 col-md-6 col-lg-6" style="background: var(--primario);">
                                            Ver Menú
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                        <span class="fw-bold">Envio a tu Servicio</span>
                                        <p>En pedido superior a $150</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tarjeta regalo especial-->
                        <div class="col-8 col-sm-6 col-sm-5 col-lg-4 m-0 p-0 text-center justify-content-center d-flex card-feature p-1">
                            <a href="./html/recompensas.html">
                                <div class="">
                                    <div class="col-12">
                                        <div class="">
                                            <i class="fa-solid fa-gift"></i>
                                        </div>
                                        <div class="">
                                            <span class="fw-bold">Recompensas especial</span>
                                            <p>Ofrece bonos especiales</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Servicio al cliente-->
                        <div class="col-8 col-sm-6 col-sm-5 col-lg-4 m-0 p-0 text-center justify-content-center d-flex card-feature p-1">
                            <a href="./html/contact.html">
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
                    <h1 class="fw-bold text-center" style="letter-spacing: 1px;">E-Commerce</h1>
                </div>
                <div class="row justify-content-center d-flex ">
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 p-3 ">
                        <div class="card product-card">
                            <img src="./img/cafes/bolsa2.webp" class=" coffee-image " alt="Cappucino">
                            <div class="card-body product-card-body">
                                <h5 class="card-title fw-bold " style="letter-spacing: 1px;">Cappucino</h5>
                                <p class="card-text">Hot Cappucino</p>
                            </div>
                            <div class="card-footer product-card-footer">

                                <button class="btn btn-light float-right btn-cafe"><i class="fa fa-shopping-cart"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 p-3">
                        <div class="card product-card">
                            <img src="./img/cafes/bolsa1.webp" class=" coffee-image " alt="Moccacino">
                            <div class="card-body product-card-body">
                                <h5 class="card-title fw-bold " style="letter-spacing: 1px;">Moccacino</h5>
                                <p class="card-text">Hot Moccacino</p>
                            </div>
                            <div class="card-footer product-card-footer">

                                <button class="btn btn-light float-right btn-cafe"><i class="fa fa-shopping-cart"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 p-3 d-none d-md-block">
                        <div class="card product-card">
                            <img src="./img/cafes/bolsa3.webp" class=" coffee-image" alt="Waffle Ice Cream">
                            <div class="card-body product-card-body">
                                <h5 class="card-title fw-bold" style="letter-spacing: 1px;">Waffle Ice Cream</h5>
                                <p class="card-text">Waffle with Ice Cream</p>

                            </div>
                            <div class="card-footer product-card-footer">

                                <button class="btn btn-light float-right btn-cafe"><i class="fa fa-shopping-cart"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 p-3 d-none d-md-block">
                        <div class="card product-card">
                            <img src="./img/cafes/bolsa1.webp" class=" coffee-image" alt="Waffle Ice Cream">
                            <div class="card-body product-card-body">
                                <h5 class="card-title fw-bold" style="letter-spacing: 1px;">Waffle Ice Cream</h5>
                                <p class="card-text">Waffle with Ice Cream</p>

                            </div>
                            <div class="card-footer product-card-footer">

                                <button class="btn btn-light float-right btn-cafe"><i class="fa fa-shopping-cart"></i></button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Recompensas-->
            <section class="subscription-section d-flex align-items-center justify-content-center p-2">
                <div class="subscription-content text-center">
                    <h1 class="display-4">Recibe grandes <span style="color: #d4a373;">RECOMPENSAS</span> facil</h1>
                    <p class="lead">Mediante asistencias recibe grandes recompensas</p>
                    <a href="./html/recompensas.html" class="btn subscription-btn">Echar un vistazo</a>
                </div>
            </section>

            <!-- Blog-->
            <div class="container-fluid bagr-cafe3 p-3">
                <div class="col-12 text-center p-3">
                    <h1 class="fw-bold text-center" style="letter-spacing: 1px;">Blog</h1>
                </div>

                <div class="row  justify-content-center d-flex">
                    <!-- Blog Card 1 -->
                    <div class="col-md-4 p-3 col-6 col-sm-6  col-sm-6">
                        <div class="card blog-card">
                            <img src="./img/cafes/lugar1.webp" class="card-img-top coffee-image" alt="Image 1">
                            <div class="card-body">
                                <h5 class="blog-card-title">MAKE IT SIMPLE</h5>
                                <h6 class="blog-card-subtitle mb-2 text-muted">20/20/2020
                                </h6>
                                <p class="blog-card-text  d-none d-md-block">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Aenean feugiat dictum lacus, ut hendrerit mi pulvinar vel. Fusce id nibh at neque
                                    eleifend tristique...</p>
                                <a href="#" class="blog-card-link">READ MORE <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Card 2 -->
                    <div class="col-md-4 p-3 col-6 col-sm-6  col-sm-6">
                        <div class="card blog-card">
                            <img src="./img/cafes/cafe8.webp" class="card-img-top coffee-image" alt="Image 2">
                            <div class="card-body">
                                <h5 class="blog-card-title">COFFEE SHOP</h5>
                                <h6 class="blog-card-subtitle mb-2 text-muted">20/20/2020
                                </h6>
                                <p class="blog-card-text  d-none d-md-block">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Aenean feugiat dictum lacus, ut hendrerit mi pulvinar vel. Fusce id nibh at neque
                                    eleifend tristique...</p>
                                <a href="#" class="blog-card-link">READ MORE <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Card 3 -->
                    <div class="col-md-4 p-3 col-6 col-sm-6  col-sm-6 d-none d-md-block">
                        <div class="card blog-card">
                            <img src="./img/cafes/cafe4.webp" class="card-img-top coffee-image" alt="Image 3">
                            <div class="card-body">
                                <h5 class="blog-card-title">COFFEE BAR</h5>
                                <h6 class="blog-card-subtitle mb-2 text-muted">20/20/2020
                                </h6>
                                <p class="blog-card-text  d-none d-md-block">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Aenean feugiat dictum lacus, ut hendrerit mi pulvinar vel. Fusce id nibh at neque
                                    eleifend tristique...</p>
                                <a href="#" class="blog-card-link">READ MORE <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
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