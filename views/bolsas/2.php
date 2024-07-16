<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recompensas</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg shadow-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../index.php">
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
            <a href="../login.php" class="login-button ms-auto">Iniciar Sesión</a>
            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- NavBar End -->

    <!-- Contenido -->
    <div class="container-fluid m-0 p-0" style="background: var(--color2);">
        <div class="row p-0 m-0">
            <!-- E-Commerce-->

            <?php
            include '../../class/database.php';
            $conexion = new Database();
            $conexion->conectarDB();
            $query = 'SELECT bolsas_cafe.id_bolsa,bolsas_cafe.nombre,bolsas_cafe.años_cosecha,bolsas_cafe.productor_finca,bolsas_cafe.proceso,
                        bolsas_cafe.variedad,bolsas_cafe.altura,bolsas_cafe.aroma,bolsas_cafe.acidez,bolsas_cafe.sabor,
                        bolsas_cafe.cuerpo,bolsas_cafe.puntaje_catacion,bolsas_cafe.img_url
                        FROM bolsas_cafe 
                        where bolsas_cafe.id_bolsa=2;';

            $query2 = "SELECT bolsas_cafe.id_bolsa,bolsas_cafe.nombre, bolsas_cafe.productor_finca ,bolsas_cafe.proceso,
            bolsas_cafe.variedad,bolsas_cafe.altura,bolsas_cafe.aroma,bolsas_cafe.acidez,bolsas_cafe.sabor,
            bolsas_cafe.cuerpo,bolsas_cafe.img_url,detalle_bc.medida,detalle_bc.precio,detalle_bc.stock
            FROM bolsas_cafe join detalle_bc on bolsas_cafe.id_bolsa=detalle_bc.id_bolsa
            where bolsas_cafe.id_bolsa=2;";



            $peso = $conexion->select($query2);

            $bolsacafe = $conexion->select($query);

            echo "
            <div class='container-fluid bagr-cafe3 p-3'>
                <!-- Título -->
                <div class='row align-items-center'>
                    <nav aria-label='breadcrumb' class='col-12 justify-content-center d-flex col-lg-4 col-md-7 col-sm-10'>
            <ol class='breadcrumb mt-4'>
                <li class='breadcrumb-item'><a href='../../index.php'>Inicio</a></li>
                <li class='breadcrumb-item'><a href='../ecommerce.php'>Ecommerce</a></li>
                <li class='breadcrumb-item active' aria-current='page'>{$bolsacafe[0]->nombre}</li>
            </ol>
        </nav>
                    <div class='col-12 text-center'>
                        <h1 class='product-title mb-0'>{$bolsacafe[0]->nombre}</h1>
                        <h2 class='product-subtitle'>CH I A P A S</h2>
                    </div>
                </div>
                <div class='container mt-5'>
                    <div class='row d-flex justify-content-center'>
                        <div class='col-9 col-md-6 col-lg-4 text-sm-center'>
                            <img src='../../img/cafes/bolsa3.webp' class='img-fluid rounded coffee-image' alt='Producto'>
                            <p class='mt-3'><strong>Puntaje de catacion:</strong>{$bolsacafe[0]->puntaje_catacion}<pts</p>
                            <div class='col-12 text-center'>
                                <p class='product-price' id='productPrice'>0$</p>
                            </div>
                        </div>
                        <div class='col-12 col-md-6'>
                            <div class='row text-center'>
                                <div class='col-6'>
                                    <p class='product-detail m-0'>Productor y/o Finca:</p>
                                    <p class='product-text fw-bold'>{$bolsacafe[0]->productor_finca}</p>
                                </div>
                                <div class='col-6'>
                                    <p class='product-detail m-0'>Proceso:</p>
                                    <p class='product-text fw-bold'>{$bolsacafe[0]->proceso}</p>
                                </div>
                                <div class='col-6'>
                                    <p class='product-detail m-0'>Variedad:</p>
                                    <p class='product-text fw-bold'>{$bolsacafe[0]->variedad}</p>
                                </div>
                                <div class='col-6'>
                                    <p class='product-detail m-0'>Altura:</p>
                                    <p class='product-text fw-bold'>{$bolsacafe[0]->altura}</p>
                                </div>
                                <div class='col-12 p-3 text-center'>
                                    <h3 class='product-title'>Perfil de taza</h3>
                                </div>
                                <div class='col-6 text-center'>
                                    <p class='product-detail m-0'>Aroma:</p>
                                    <p class='product-text fw-bold'>{$bolsacafe[0]->aroma}</p>
                                </div>
                                <div class='col-6 text-center'>
                                    <p class='product-detail m-0'>Acidez:</p>
                                    <p class='product-text fw-bold'>{$bolsacafe[0]->acidez}</p>
                                </div>
                                <div class='col-6 text-center'>
                                    <p class='product-detail m-0'>Sabor:</p>
                                    <p class='product-text fw-bold'>{$bolsacafe[0]->sabor}</p>
                                </div>
                                <div class='col-6 text-center'>
                                    <p class='product-detail m-0'>Cuerpo:</p>
                                    <p class='product-text fw-bold'>{$bolsacafe[0]->cuerpo}</p>
                                </div>
                                <div class='row d-flex p-4'>
                                    <div class='col-6'>
                                     <label for='peso' class='form-label fw-bold'>Peso</label>
                                        <select class='form-select' id='peso'>
                                            <option value='0' selected>0kg</option>";


            foreach ($peso as $pesos) {

                echo "<option value='{$pesos->precio}'>{$pesos->medida}</option>";
            };
            echo "</select>
                                        </div>
                                    <div class='col-6'>
                                        <label for='cantidad' class='form-label fw-bold'>Cantidad</label>
                                        <select class='form-select' id='cantidad'>
                                            <option selected>1</option>
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
                                    <div class='col-12 mt-3 d-block'>
                                        <button class='btn w-100 btn-cafe'>Agregar al carrito</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";


            ?>

        </div>
    </div>
    </div>



    <!-- Botón de Carrito -->
    <button id="floatingButton" class="btn btn-cafe position-fixed bottom-0 end-0 m-3 d-flex p-3 z-3 text-light fw-bold" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
        <i class="fa-solid fa-cart-shopping fa-2x"></i>
    </button>
    <div class="offcanvas offcanvas-end text-light" style="background: var(--primario);" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="mt-3 fw-bold d-flex justify-content-center">
            <h5 class="offcanvas-title fs-3 mx-auto" id="offcanvasRightLabel">
                <i class="fa-solid fa-bag-shopping"></i>
            </h5>
        </div>
        <div class="offcanvas-body">
            <div class="d-flex justify-content-center fs-5">
                <div class="text-center">
                    <p>Su Carrito esta vacio</p>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="offcanvas" aria-label="Close">Regresar a
                        la tienda</button>
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
                    <p class="text-center fw-bold text-light">Copyright © 2024 SinfoníaCafé&Cultura</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/b820f07375.js" crossorigin="anonymous"></script>
    <!--script para actualizar precio-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pesoSelect = document.getElementById('peso');
            const cantidadSelect = document.getElementById('cantidad');
            const productPrice = document.getElementById('productPrice');

            function updatePrice() {
                const selectedPrice = parseFloat(pesoSelect.value);
                const selectedQuantity = parseInt(cantidadSelect.value);
                const totalPrice = selectedPrice * selectedQuantity;
                productPrice.innerText = '$' + totalPrice.toFixed(2);
            }

            pesoSelect.addEventListener('change', updatePrice);
            cantidadSelect.addEventListener('change', updatePrice);
        });
    </script>
</body>

</html>