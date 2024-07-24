<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolsa de Café</title>
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
            <?php
            if (isset($_SESSION["usuario"])) {
            ?>
                <!-- Navbar con dropdown -->
                <a class="nav-link dropdown-toggle ms-auto" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-user"></i> <?php echo $_SESSION['usuario']; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="left: auto; right: 30px; top: 60px">
                    <a class="dropdown-item" href="../../perfil.php">Mi perfil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../../scripts/login/cerrarsesion.php">Cerrar sesión</a>
                </div>
            <?php
            } else {
            ?>
                <a href="../login.php" class="login-button ms-auto">Iniciar Sesión</a>
            <?php
            }
            ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
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
            if (isset($_SESSION["usuario"])) {
                $cliente = "SELECT 
                                c.id_cliente 
                            FROM 
                                clientes AS c 
                            JOIN
                                personas AS p ON c.id_persona = p.id_persona 
                            WHERE p.usuario = '" . $_SESSION["usuario"] . "'";
                $cliente = $conexion->select($cliente);
            }


            $query = 'SELECT bolsas_cafe.id_bolsa,bolsas_cafe.nombre,bolsas_cafe.años_cosecha,bolsas_cafe.productor_finca,bolsas_cafe.proceso,
                        bolsas_cafe.variedad,bolsas_cafe.altura,bolsas_cafe.aroma,bolsas_cafe.acidez,bolsas_cafe.sabor,
                        bolsas_cafe.cuerpo,bolsas_cafe.puntaje_catacion,bolsas_cafe.img_url
                        FROM bolsas_cafe 
                        where bolsas_cafe.id_bolsa=2;';

            $query2 = "SELECT detalle_bc.id_dbc, bolsas_cafe.id_bolsa,bolsas_cafe.nombre, bolsas_cafe.productor_finca ,bolsas_cafe.proceso,
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
                <li class='breadcrumb-item fw-bold'><a href='../../index.php'>Inicio</a></li>
                <li class='breadcrumb-item fw-bold'><a href='../ecommerce.php'>Ecommerce</a></li>
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
                                <p class='product-price' id='productPrice'>85$</p>
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
                            <form action='../../scripts/agregar_carrito.php' method='POST' class='form-inline'>";
            if (isset($_SESSION['usuario'])) {
                echo "  <input type='hidden' name='id_cliente' value='{$cliente[0]->id_cliente}'> <!-- ID del cliente -->";
            }


            echo "  <input type='hidden' name='id_dbc' value='{$bolsacafe[0]->id_bolsa}'> <!-- ID del producto -->
                                <div class='row d-flex p-4'>
                                    <div class='col-6'>
                                     <label for='peso' class='form-label fw-bold'>Peso</label>
                                        <select class='form-select' id='peso' name='peso'>";


            foreach ($peso as $pesos) {

                echo "<option value='{$pesos->precio}'>{$pesos->medida}</option>";
            };
            echo "</select>
                                        </div>
                                    <div class='col-6'>
                                        <label for='cantidad' class='form-label fw-bold'>Cantidad</label>
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
                                    <div class='col-12 mt-3 d-block'>
                                        <button type='submit' class='btn w-100 btn-cafe'>Agregar al carrito</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";


            ?>

        </div>
    </div>




    <!-- Botón de Carrito -->
    <button id="floatingButton" class="btn btn-cafe position-fixed bottom-0 end-0 m-3 d-flex p-3 z-3 text-light fw-bold" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
        <i class="fa-solid fa-cart-shopping fa-2x"></i>
    </button>

    <!-- Offcanvas del Carrito -->
    <div class="offcanvas offcanvas-end text-light" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <!--Titulo--->
        <div class="fw-bold d-flex justify-content-center align-content-center m-0" style="background: var(--primario);">
            <h5 class="offcanvas-title fs-3 mx-auto me-5" id="offcanvasRightLabel">Carrito <i class="fa-solid fa-bag-shopping m-3"></i></h5>
            <button type="button" class="btn-close text-reset m-3" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <!--Contenido-->

        <?php
        include_once("../../class/database.php");
        $db = new Database();
        $db->conectarDB();

        if (isset($_SESSION["usuario"])) {
            $cliente = "SELECT 
                                c.id_cliente 
                            FROM 
                                clientes AS c 
                            JOIN
                                personas AS p ON c.id_persona = p.id_persona 
                            WHERE p.usuario = '" . $_SESSION["usuario"] . "'";
            $cliente = $db->select($cliente);
            $query = "SELECT * FROM view_carrito WHERE cliente = '" . $cliente[0]->id_cliente . "'";
            $consulta = $db->select($query);

            // Aquí puedes agregar más código para mostrar los productos del carrito, por ejemplo:

            echo ' <div class="offcanvas-body d-flex flex-column text-dark m-0 p-2" style="background: var(--color6);">';
            if (count($consulta) > 0) {

                foreach ($consulta as $item) {
                    echo '<div class="container p-0">';
                    echo '<div class="d-flex justify-content-between align-items-center mb-3">';
                    echo '  <div class="d-flex align-items-center">';
                    echo '      <img src="../../img/cafes/bolsa2.webp" class="img-fluid rounded w-25 h-25" alt="Producto">';
                    echo '      <div class="ms-1 w-25">';
                    echo '          <h6 class="mb-0 fw-bold">' . $item->producto . '</h6>';
                    echo '          <span>$' . $item->precio . '</span>';
                    echo '          <span class="text-muted d-block">' . $item->proceso . '</span>';
                    echo '      </div>';
                    echo '      <div class="ms-3">';
                    echo '          <form action="../../scripts/actualizar_carrito.php" method="POST" style="display: inline;">';
                    echo '              <input type="hidden" name="id_cliente" value="' . $cliente[0]->id_cliente  . '">';
                    echo '              <input type="hidden" name="peso" value="' . $item->precio . '">';
                    echo '              <input type="hidden" name="id_carrito" value="' . $item->id_carrito . '">';
                    echo '              <input type="hidden" name="id_dbc" value="' . $item->id_dbc . '">';
                    echo '              <input type="hidden" name="link" value="../views/bolsas/1.php">';
                    echo '              <input type="hidden" name="operacion" value="decrementar">';
                    echo '              <button type="submit" class="btn fw-bold btn-dark fs-5 p-0" style="height: 35px; width: 35px">-</button>';
                    echo '          </form>';
                    echo '          <span class="mx-2 p-1">' . $item->cantidad . '</span>';
                    echo '          <form action="../../scripts/actualizar_carrito.php" method="POST" style="display: inline;">';
                    echo '              <input type="hidden" name="id_cliente" value="' . $cliente[0]->id_cliente . '">';
                    echo '              <input type="hidden" name="peso" value="' . $item->precio . '">';
                    echo '              <input type="hidden" name="id_carrito" value="' . $item->id_carrito . '">';
                    echo '              <input type="hidden" name="id_dbc" value="' . $item->id_dbc . '">';
                    echo '              <input type="hidden" name="link" value="../views/bolsas/1.php">';
                    echo '              <input type="hidden" name="operacion" value="incrementar">';
                    echo '              <button type="submit" class="btn fw-bold btn-dark fs-5 p-0" style="height: 35px; width: 35px">+</button>';
                    echo '          </form>';
                    echo '      </div>';
                    echo '  </div>';
                    echo '   <form action="../../scripts/eliminar_producto.php" method="POST" style="display:inline;">
                                <input type="hidden" name="item_id" value="' . $item->id_dbc . '">
                                <input type="hidden" name="id_carrito" value="' . $item->id_carrito . '">
                                <input type="hidden" name="id_cliente" value="' . $cliente[0]->id_cliente . '">
                                <input type="hidden" name="link" value="../views/bolsas/3.php">
                                    <button type="submit" class="btn" aria-label="Close"><i class="fa-solid fa-trash"></i></button>
                            </form>';
                    echo '</div>';
                    echo '<hr class="border-dark">';
                    echo '</div>';
                }
                $subotal="SELECT sum(monto) as subtotal from carrito where id_cliente='" . $cliente[0]->id_cliente . "';";
                $subtotal=$db->select($subotal);
                echo '</div>';
                echo '<div class="mt-auto container" style="background: var(--negroclaro);">';
                echo '  <hr>';
                echo '  <div class="d-flex justify-content-between fs-4">';
                echo '      <span>Subtotal</span>';
                echo '      <span>$' . $subtotal[0]->subtotal . '</span>';
                echo '  </div>';
                echo '  <a href="Carrito.php" class="btn w-100 mt-3 fs-5 m-1 btn-dark p-1">Ver Carrito</a>';
                echo '</div>';
            } else {
                echo '<div class="d-flex flex-column justify-content-center align-items-center vh-100">';
                echo '<h3 class="text-center">Tu carrito está vacío</h3>';
                echo '<div class="d-flex justify-content-center col-12">';
                echo '<i class="fa-solid fa-mug-hot fa-4x text-dark-emphasis"></i>';
                echo '</div>';
                echo '<div class="d-flex justify-content-center col-12">';
                echo ' <a href="../ecommerce.php" class="btn w-50 mt-3 fs-5 m-1 btn-dark p-1">Ver Tienda</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

                echo '<div class="mt-auto container" style="background: var(--negroclaro);">';
                echo '  <hr>';
                echo '  <div class="d-flex justify-content-between fs-4">';
                echo '      <span>Subtotal</span>';
                echo '      <span>0</span>';
                echo '  </div>';
                echo '  <a href="Carrito.php" class="btn w-100 mt-3 fs-5 m-1 btn-dark p-1">Ver Carrito</a>';
                echo '</div>';
            }
        } else {
            echo '<div class="d-flex flex-column justify-content-center align-items-center vh-100">';
            echo '<h3 class="text-center text-dark">Crea una cuenta o inicia sesión para disponer de un carrito</h3>';
            echo '<div class="d-flex justify-content-center col-12">';
            echo '<i class="fa-solid fa-mug-hot fa-4x text-dark-emphasis"></i>';
            echo '</div>';
            echo '<div class="d-flex justify-content-center col-12">';
            echo ' <a href="../login.php" class="btn w-50 mt-3 fs-5 m-1 btn-dark p-1">Iniciar sesión</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>

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
    <script src="../../js/Carrito.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/45ef8dbe96.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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