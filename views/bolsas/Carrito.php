<?php
session_start();

include("../../class/database.php");

// Crear una nueva instancia de la clase Database y conectar a la base de datos
$conexion = new Database();
$conexion->conectarDB();


if (isset($_SESSION["usuario"])) {
    $rolUsuario = "SELECT r.rol FROM roles r JOIN roles_usuarios ru ON r.id_rol = ru.id_rol JOIN personas p ON ru.id_usuario = p.id_usuario WHERE p.usuario = '$_SESSION[usuario]'";
    $rol = $conexion->select($rolUsuario);
} else {
    $rol = null;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="shortcut icon" href="../../img/Sinfonía-Café-y-Cultura.webp">
</head>

<body>
     <!-- Botón de WhatsApp -->
     <button id="whatsappButton" class="btn btn-success position-fixed bottom-0 start-0 m-3 p-3 d-flex align-items-center justify-content-center z-3" type="button" onclick="window.open('https://wa.me/528711220994?text=%C2%A1Hola!%20Escribo%20desde%20la%20p%C3%A1gina%20web%20y%20quer%C3%ADa%20consultar%20por%3A', '_blank')">
        <i class="fa-brands fa-whatsapp fa-2x"></i>
    </button>
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
                    <a class="dropdown-item" href="../perfil.php">Mi perfil</a>
                    <?php if ($rol[0]->rol === 'administrador') { ?>
                        <a class="dropdown-item" href="../../views/adminInicio.php">Administrar</a>
                        <div class="dropdown-divider"></div>
                    <?php } ?>
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

    <!--Contenido-->
    <div class="container">
        <nav aria-label="breadcrumb" class='col-12 d-flex'>
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item fw-bold"><a href="../../index.php">Inicio</a></li>
                <li class="breadcrumb-item fw-bold"><a href="../../views/ecommerce.php">E-Commerce</a></li>
                <li class="breadcrumb-item active" aria-current="page"></li>Mi Carrito</li>
            </ol>
        </nav>
        <!-- Título -->
        <div class="fw-bold fs-3 mt-3 mb-4 ">
            <h1 class="h1contact">Mi Carrito</h1>
        </div>
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
            if (count($consulta) > 0) {
        ?>
                <!-- Carrito -->
                <div>
                    <!-- Dirección de envío -->
                    <div class="row mb-4 my-5">

                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <h4 class="fw-bold">Dirección de envío</h4>
                            <a href="../../views/direcciones.php" class="text-decoration-none fw-bold blog-card-link">Agregar <i class="fa-solid fa-pencil"></i></a>
                        </div>
                        <div class="col-12 col-md-6">
                            <?php
                            $query = "SELECT * from domicilios join clientes on clientes.id_cliente=domicilios.id_cliente join personas on personas.id_persona=clientes.id_persona where domicilios.id_cliente='" . $cliente[0]->id_cliente . "'";
                            $result = $db->select($query);

                            // Verificar si se obtuvieron resultados
                            if ($result) {
                                echo "<label for='direccion'>Selecciona una dirección:</label>";
                                echo "<select class='form-select' name='direccion' id='direccion' required>";
                                $DOMICIOLIO = $result[0]->id_domicilio;
                                // Recorrer los resultados y crear opciones en el dropdown
                                foreach ($result as $domicilio) {
                                    echo "<option value='" . $domicilio->id_domicilio . "' 
                                    data-id_domicilio='" . $domicilio->id_domicilio . "'
                                    data-referencia='" . $domicilio->referencia . "' 
                                    data-ciudad='" . $domicilio->ciudad . "' 
                                    data-estado='" . $domicilio->estado . "' 
                                    data-colonia='" . $domicilio->colonia . "' 
                                    data-calle='" . $domicilio->calle . "' 
                                    data-codigo_postal='" . $domicilio->codigo_postal . "'>" . $domicilio->referencia . "</option>";
                                }

                                echo "</select>";
                                echo "<br>";


                                // Contenedores para mostrar los detalles de la dirección
                                echo "<div class='card-body'>";
                                echo "<h5 class='card-title fw-bold'>Detalles de la dirección</h5>";
                                echo "<div>";
                                echo "<p class='m-1 p-0 fw-bold d-inline'>Referencia:</p><p id='referencia' class='m-1 p-0 d-inline'></p>";
                                echo "</div>";
                                echo "<div>";
                                echo "<p class='m-1 p-0 fw-bold d-inline'>Ciudad:</p><p id='ciudad' class='m-1 p-0 d-inline'></p>";
                                echo "</div>";
                                echo "<div>";
                                echo "<p class='m-1 p-0 fw-bold d-inline'>Estado:</p><p id='estado' class='m-1 p-0 d-inline'></p>";
                                echo "</div>";
                                echo "<div>";
                                echo "<p class='m-1 p-0 fw-bold d-inline'>Colonia:</p><p id='direccion_completa' class='m-1 p-0 d-inline'></p>";
                                echo "</div>";
                                echo "</div>";
                            } else {
                                $DOMICIOLIO = '';
                                echo "No se encontraron direcciones para el usuario.";
                            }
                            ?>

                        </div>
                    </div>
                    <hr>
                    <!-- Pago -->

                    <div class="row mb-4">
                        <div class="col-12 d-flex justify-content-between align-items-center row">
                            <div class="col-12 col-md-9">
                                <h4 class="fw-bold ">Pago</h4>
                                <p class="mb-0">Para completar tu compra, selecciona tu método de pago preferido y luego comunícate con nosotros para finalizar el proceso.</p>
                            </div>
                            <?php
                            // Archivo para obtener métodos de pago

                            $query = "SELECT id_mp, metodo_pago FROM metodos_pago";
                            $result = $db->select($query);
                            ?>
                            <div class="form-group text-center col-12 col-md-3 p-md-0 p-2">
                                <label class="form-label fw-bold" for="paymentMethodSelect">Método de Pago</label>
                                <select class="form-control form-select" id="paymentMethodSelect" name="id_mp">
                                    <?php
                                    if ($result) {
                                        foreach ($result as $mp) {
                                            echo "<option value='" . $mp->id_mp . "'>" . $mp->metodo_pago . "</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No se encontraron métodos de pago</option>";
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- Productos y Confirmación del pedido -->

                    <div class="row">

                        <div class="col-md-8">
                            <h4 class="fw-bold ">Productos</h4>

                            <?php


                            foreach ($consulta as $item) {
                                echo '<div class="container p-0">';
                                echo '<div class="d-flex justify-content-between align-items-center mb-3">';
                                echo '  <div class="d-flex align-items-center">';
                                echo '  <div class="carousel-item-wrapper w-25 h-25">';
                                echo '      <img src="../../img/bolsas/' . $item->img_url . '" class="img-fluid rounded w-100 h-100" alt="Producto">';
                                echo '      <div class="overlay">';
                                echo '      <h4 class="medida text-white">' . $item->medida . '</h4>';
                                echo '      </div>';
                                echo '  </div>';
                                echo '      <div class="ms-3 w-25">';
                                echo '          <h6 class="mb-0 fw-bold">' . $item->producto . '</h6>';
                                echo '          <span>$' . $item->precio . '</span>';
                                echo '          <span class="text-muted d-block">' . $item->proceso . '</span>';
                                echo '          <span class="text-muted d-block">' . $item->sabor . '</span>';
                                echo '          <span class="text-muted d-block">' . $item->variedad . '</span>';
                                echo '      </div>';
                                echo '      <div class="ms-3">';
                                echo '          <form action="../../scripts/actualizar_carrito.php" method="POST" style="display: inline;">';
                                echo '              <div class="d-none">';
                                echo '              <input type="hidden" name="id_cliente" value="' . $cliente[0]->id_cliente  . '">';
                                echo '              <input type="hidden" name="peso" value="' . $item->precio . '">';
                                echo '              <input type="hidden" name="id_carrito" value="' . $item->id_carrito . '">';
                                echo '              <input type="hidden" name="id_dbc" value="' . $item->id_dbc . '">';
                                echo '              <input type="hidden" name="link" value="../views/bolsas/Carrito.php">';
                                echo '              <input type="hidden" name="operacion" value="decrementar">';
                                echo '              </div>';
                                echo '              <button type="submit" class="btn fw-bold btn-dark fs-5 p-0" style="height: 35px; width: 35px">-</button>';
                                echo '          </form>';
                                echo '          <span class="mx-1 p-1">' . $item->cantidad . '</span>';
                                echo '          <form action="../../scripts/actualizar_carrito.php" method="POST" style="display: inline;">';
                                echo '              <div class="d-none">';
                                echo '              <input type="hidden" name="id_cliente" value="' . $cliente[0]->id_cliente . '">';
                                echo '              <input type="hidden" name="peso" value="' . $item->precio . '">';
                                echo '              <input type="hidden" name="id_carrito" value="' . $item->id_carrito . '">';
                                echo '              <input type="hidden" name="id_dbc" value="' . $item->id_dbc . '">';
                                echo '              <input type="hidden" name="link" value="../views/bolsas/Carrito.php">';
                                echo '              <input type="hidden" name="operacion" value="incrementar">';
                                echo '              </div>';
                                echo '              <button type="submit" class="btn fw-bold btn-dark fs-5 p-0" style="height: 35px; width: 35px">+</button>';
                                echo '          </form>';
                                echo '          <div class="text-center mt-2 d-md-none">';  // Mostrar en resoluciones medianas hacia abajo
                                echo '             <h6 class="mb-0 fw-bold">subtotal</h6>';
                                echo '             <p class="mb-0 ">$' . $item->subtotal . '</p>';
                                echo '          </div>';
                                echo '      </div>';
                                echo '          <div class="text-center w-25 mt-1 p-lg-4 d-none d-lg-block">';  // Mostrar solo en resoluciones grandes
                                echo '             <h6 class="mb-0 fw-bold">subtotal</h6>';
                                echo '             <p class="mb-0 ">$' . $item->subtotal . '</p>';
                                echo '          </div>';
                                echo '  </div>';
                                echo '  <form action="../../scripts/eliminar_producto.php" method="POST" style="display:inline;">
                                                <div class="d-none">
                                                    <input type="hidden" name="item_id" value="' . $item->id_dbc . '">
                                                    <input type="hidden" name="id_carrito" value="' . $item->id_carrito . '">
                                                    <input type="hidden" name="id_cliente" value="' . $cliente[0]->id_cliente . '">
                                                    <input type="hidden" name="link" value="../views/bolsas/Carrito.php">
                                                </div>
                                                <button type="submit" class="btn" aria-label="Close"><i class="fa-solid fa-trash"></i></button>
                                            </form>';
                                echo '</div>';
                                echo '<hr class="border-dark">';
                                echo '</div>';
                            }

                            ?>


                        </div>
                        <?php
                        $subotal = "SELECT sum(monto) as subtotal from carrito where id_cliente='" . $cliente[0]->id_cliente . "';";
                        $subtotal = $db->select($subotal);

                        $iva = $subtotal[0]->subtotal * 0.16;

                        $total = $subtotal[0]->subtotal + $iva;

                        echo '<div class="col-md-4 p-4">';
                        echo '<h3 class="fw-bold text-center m-0">Confirmación del pedido</h3>';
                        echo '<p>Productos: <span class="float-end fw-bold">$' . $subtotal[0]->subtotal . '</span></p>';
                        echo '<p>Envío: <span class="float-end">--</span></p>';
                        echo '<hr>';
                        $iva = $subtotal[0]->subtotal * 0.16;
                        $total = $subtotal[0]->subtotal + $iva;

                        echo '
                          
                        <form id="pedidoForm" action="../../scripts/ecommerce/pedido.php" method="POST" onsubmit="return confirmarPedido()">
                        <div class="d-none">
                                 <input type="hidden" name="id_mp" value="' . $mp->id_mp . '">
                                <input type="hidden" id="hiddenIdDomicilio" name="id_domicilio" value="' .  $DOMICIOLIO . '">
                               <input type="hidden" name="id_cliente" value="' . $cliente[0]->id_cliente . '">
                                <p>Total: <span class="float-end fw-bold">$' . $total . '</span></p>
                                </div>
                                <p class="small text-muted">* No incluye los gastos de envío.</p>
                                <button type="submit" class="btn btn-dark w-100">Realizar pedido</button>
                        </form>';
                        echo '</div>';
                        ?>

                    </div>

                </div>
                
                <!-- Script para actualizar el campo oculto con el ID del domicilio -->
                <script>
                    document.getElementById('direccion').addEventListener('change', function(event) {
                        // Obtener el ID del domicilio seleccionado
                        const selectedDomicilioId = event.target.value;

                        // Actualizar el campo oculto con el ID del domicilio
                        document.getElementById('hiddenIdDomicilio').value = selectedDomicilioId;
                    });
                </script>
                <!-- sCRIP PARA ACTUALIZAR LOS DETALLES DE LA DIRECCION -->
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Obtener el elemento select
                        const selectDireccion = document.getElementById('direccion');

                        // Función para actualizar los detalles de la dirección
                        function actualizarDetalles() {
                            const selectedOption = selectDireccion.options[selectDireccion.selectedIndex];

                            // Actualizar los detalles de la dirección
                            document.getElementById('referencia').textContent = selectedOption.getAttribute('data-referencia');
                            document.getElementById('ciudad').textContent = selectedOption.getAttribute('data-ciudad');
                            document.getElementById('estado').textContent = selectedOption.getAttribute('data-estado');
                            document.getElementById('direccion_completa').textContent = selectedOption.getAttribute('data-colonia') + " " +
                                selectedOption.getAttribute('data-calle') + " " +
                                selectedOption.getAttribute('data-codigo_postal');
                        }

                        // Escuchar cambios en el elemento select
                        selectDireccion.addEventListener('change', actualizarDetalles);

                        // Actualizar los detalles de la dirección cuando se carga la página
                        actualizarDetalles();
                    });
                </script>
                <!-- script para habilitar el botón de envío cuando se seleccione un domicilio -->
                
<script>
function confirmarPedido() {
    // Obtén el valor del domicilio
    var domicilio = document.getElementById('hiddenIdDomicilio').value;

    // Si no hay domicilio seleccionado, muestra un mensaje y previene el envío
    if (!domicilio) {
        alert('Por favor, selecciona o crea un domicilio antes de realizar el pedido.');
        return false; // Previene el envío del formulario
    }

    // Muestra la confirmación de pedido
    return confirm("¿Realmente desea realizar el pedido?");
}

// Función para habilitar el botón de envío cuando se seleccione un domicilio
function seleccionarDomicilio(idDomicilio) {
    document.getElementById('hiddenIdDomicilio').value = idDomicilio;
    document.getElementById('submitButton').disabled = false; // Habilita el botón
}

// Puedes tener un evento o lógica para llamar a seleccionarDomicilio con el id del domicilio
</script>

        <?php
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
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/45ef8dbe96.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>