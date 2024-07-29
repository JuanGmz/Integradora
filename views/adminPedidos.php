<?php
    session_start();
    require_once '../class/database.php';
    include_once ("../scripts/funciones/funciones.php");
    $db = new database();
    $db->conectarDB();

    $rolUsuario = "SELECT r.rol FROM roles r JOIN roles_usuarios ru ON r.id_rol = ru.id_rol JOIN personas p ON ru.id_usuario = p.id_usuario WHERE p.usuario = '$_SESSION[usuario]'";

    $rol = $db->select($rolUsuario);

    if ($rol[0]->rol !== 'administrador') {
        header('Location: ../index.php');
    } 
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Pedidos</title>
    <link rel="shortcut icon" href="../img/Sinfonía-Café-y-Cultura.webp">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="bg-light">
    <div class="container-fluid m-0 h-100">
                <!-- navbar mobile -->
                <div class="row bg-dark d-block d-lg-none">
            <div class="collapse m-0 p-0" id="navbarToggleExternalContent" data-bs-theme="dark">
                <div class="bg-dark p-4 pb-1">
                    <h5 class="text-body-emphasis h4">Administrar</h5>
                </div>
                <div class="accordion accordion-flush" id="accordionMobile">
                    <div class="accordion-item m-0 p-0 row">
                        <h2 class="accordion-header">
                            <button class="row accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button"data-bs-toggle="collapse" data-bs-target="#flush-inicio" aria-expanded="false" aria-controls="flush-inicio">
                                <div class="col-6">
                                    <a href="adminInicio.php" class="text-light fw-bold text-decoration-none">
                                        <i class="fa-solid fa-house-laptop me-1"></i>
                                        Inicio
                                    </a>
                                </div>
                            </button>
                        </h2>
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-menu" aria-expanded="false" aria-controls="flush-menu">
                                <div class="col-8">
                                    <i class="fa-solid fa-table me-3"></i>
                                   Menú
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-menu" class="accordion-collapse collapse" data-bs-parent="#accordionMobile">
                            <div class="accordion-body bg-dark">
                                <a href="adminMenu.php" class="ms-5 text-light fw-bold fs-5 text-decoration-none" aria-current="true">
                                    Administrar Menú
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-events" aria-expanded="false" aria-controls="flush-events">
                                <div class="col-8">
                                    <i class="fa-solid fa-bullhorn me-3"></i>
                                    Eventos
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-events" class="accordion-collapse collapse" data-bs-parent="#accordionMobile">
                            <div class="accordion-body bg-dark">
                                <a href="adminEventos.php" class="text-light fw-bold fs-5 text-decoration-none ms-5" aria-current="true">
                                    Administrar Eventos
                                </a><br><br>
                                <a href="adminReservas.php" class="text-light fw-bold fs-5 text-decoration-none ms-5">
                                    Administar Reservas
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-ecommerce" aria-expanded="false" aria-controls="flush-ecommerce">
                                <div class="col-8">
                                    <i class="fa-solid fa-cart-arrow-down me-3"></i>
                                    E-Commerce
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-ecommerce" class="accordion-collapse collapse" data-bs-parent="#accordionMobile">
                            <div class="accordion-body bg-dark">
                                <a href="adminPedidos.php" class="fw-bold fs-5 ms-5 text-light text-decoration-none" aria-current="true">
                                    Administrar Pedidos
                                </a><br><br>
                                <a href="adminProductosEcommerce.php"
                                    class="fw-bold fs-4 ms-5 text-light text-decoration-none">
                                    Administrar Productos
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-blog" aria-expanded="false" aria-controls="flush-blog">
                                <div class="col-8">
                                    <i class="fa-solid fa-blog me-3"></i>
                                    Publicaciones
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-blog" class="accordion-collapse collapse" data-bs-parent="#accordionMobile">
                            <div class="accordion-body bg-dark">
                                <a href="adminPublicaciones.php" class="fw-bold fs-5 ms-5 text-light text-decoration-none"
                                    aria-current="true">
                                    Administrar Publicaciones
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-rewards" aria-expanded="false" aria-controls="flush-rewards">
                                <div class="col-8">
                                    <i class="fa-solid fa-medal me-3"></i>
                                    Recompensas
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-rewards" class="accordion-collapse collapse" data-bs-parent="#accordionMobile">
                            <div class="accordion-body bg-dark">
                                <a href="adminRecompensas.php" class="fw-bold fs-5 ms-5 text-light text-decoration-none" aria-current="true">
                                    Administrar Recompensas
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <h1 class="fw-bold text-light pt-2 me-auto">Pedidos</h1>
                    <!-- Botón para volver atras -->
                    <button class="btn btn-dark">
                        <a href="../index.php" class="text-decoration-none">
                            <i class="fa-solid fa-house text-light fa-2x"></i>
                        </a>
                    </button>
                </div>
            </nav>
        </div>

        <div class="row">
            <!-- navbar pc -->
            <div class="col-lg-3 bg-dark h-100 position-fixed d-none d-lg-block">
                <h4 class="text-center text-light m-3 fs-2 fw-bold">Administrar</h4>
                <div class="row">
                    <div class="col-12 text-center">
                        <i class="fa-solid fa-user fa-10x text-light"></i>
                    </div>
                </div>
                <div class="accordion accordion-flush" id="accordionPc">
                    <div class=" ms-2 fs-3 mt-4 mb-3">
                        <a class="fw-bold bg-dark text-light text-decoration-none" href="adminInicio.php"
                            aria-expanded="false">
                            <i class="fa-solid fa-house-laptop"></i>
                            Inicio
                        </a>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-menu" aria-expanded="false" aria-controls="flush-menu">
                                <div class="col-6">
                                    <i class="fa-solid fa-table me-1"></i>
                                    Menú
                                </div>
                                <div class="col-6 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-menu" class="accordion-collapse collapse" data-bs-parent="#accordionPc">
                            <div class="accordion-body bg-dark">
                                <a href="adminMenu.php" class="ms-5 text-light fw-bold fs-6 text-decoration-none" aria-current="true">
                                    Administrar Menú
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-events" aria-expanded="false" aria-controls="flush-events">
                                <div class="col-6">
                                    <i class="fa-solid fa-bullhorn me-1"></i>
                                    Eventos
                                </div>
                                <div class="col-6 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-events" class="accordion-collapse collapse" data-bs-parent="#accordionPc">
                            <div class="accordion-body bg-dark">
                                <a href="adminEventos.php" class="text-light fw-bold fs-6 text-decoration-none ms-5" aria-current="true">
                                    Administrar Eventos
                                </a><br><br>
                                <a href="adminReservas.php" class="text-light fw-bold fs-6 text-decoration-none ms-5">
                                    Administar Reservas
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-ecommerce" aria-expanded="false" aria-controls="flush-ecommerce">
                                <div class="col-8">
                                    <i class="fa-solid fa-cart-arrow-down me-1"></i>
                                    E-Commerce
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-ecommerce" class="accordion-collapse collapse" data-bs-parent="#accordionPc">
                            <div class="accordion-body bg-dark">
                                <a href="adminPedidos.php" class="fw-bold fs-6 ms-5 text-light text-decoration-none" aria-current="true">
                                    Administrar Pedidos
                                </a><br><br>
                                <a href="adminProductosEcommerce.php" class="fw-bold fs-6 ms-5 text-light text-decoration-none">
                                    Administrar Productos
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-blog" aria-expanded="false" aria-controls="flush-blog">
                                <div class="col-8">
                                    <i class="fa-solid fa-blog me-1"></i>
                                    Publicaciones
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-blog" class="accordion-collapse collapse" data-bs-parent="#accordionPc">
                            <div class="accordion-body bg-dark">
                                <a href="adminPublicaciones.php" class="fw-bold fs-6 ms-5 text-light text-decoration-none" aria-current="true">
                                    Administrar Publicaciones
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#flush-rewards" aria-expanded="false" aria-controls="flush-rewards">
                                <div class="col-8">
                                    <i class="fa-solid fa-medal me-1"></i>
                                    Recompensas
                                </div>
                                <div class="col-4 text-end">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                            </button>
                        </h2>
                        <div id="flush-rewards" class="accordion-collapse collapse" data-bs-parent="#accordionPc">
                            <div class="accordion-body bg-dark">
                                <a href="adminRecompensas.php" class="fw-bold fs-6 ms-5 text-light text-decoration-none" aria-current="true">
                                    Administrar Recompensa
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 offset-lg-3 p-0">
                <!-- AQUI VA EL CONTENIDO DE LA PAGINAAAAAAAAAAAA -->
                <div class="row p-0 m-0 bg-dark">
                    <div class="row p-3 m-0 shadow-lg d-none d-lg-flex">
                        <div class="col-3">
                            <h1 class="text-light fw-bold">Pedidos</h1>
                        </div>
                        <div class="col-9 d-flex justify-content-end align-items-center gap-3">
                            <!-- Botón para volver atras -->
                            <a href="../index.php" class="text-decoration-none d-none d-lg-block">
                                <i class="fa-solid fa-house fa-2x text-light"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="shadow-lg bg-light row p-0 m-0 p-3">
                <div class="row m-1">
                <div class="col-12">
                            <form method="post">
                                <div class="row">
                                <div class="col-8 col-lg-4">
                                <input type="text" class="form-control" name="busqueda" placeholder="Ingresa folio, usuario o teléfono" value="<?php echo isset($_POST['busqueda']) ? htmlspecialchars($_POST['busqueda']) : ''; ?>">
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <input type="submit" class="btn btn-primary w-100" value="Buscar">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row p-0 m-0">
                    <!-- Tabla de pedidos AQUI -->
                    <div class="row mt-lg-3 p-3 p-lg-4 m-0">
                        <?php

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $busqueda = $_POST['busqueda'];
                            $query = "CALL SP_filtrar_pedidos('$busqueda')";
                            $result = $db->select($query);

                            if (empty($result)) {
                                echo "<div>No hay pedidos registrados con este folio, usuario o teléfono.</div>";
                            } else {
                                echo "
                                <table class='table table-striped table-hover table-dark text-center border-3 border-black border-bottom border-start border-end'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>Folio</th>
                                            <th scope='col'>Nombre</th>
                                            <th scope='col' class='d-none d-lg-table-cell'>Domicilio</th>
                                            <th scope='col'>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class='table-group-divider table-light'>";

                                // Variable para mantener el seguimiento de los pedidos ya mostrados
                                $pedidosMostrados = [];

                                // Recorrer los resultados y mostrar cada uno en una fila de la tabla
                                foreach ($result as $pedido) {
                                    // Si el pedido es nuevo, mostramos una nueva fila
                                    if (!in_array($pedido->id_pedido, $pedidosMostrados)) {
                                        echo "
                                        <tr>
                                            <td>{$pedido->id_pedido}</td>
                                            <td>{$pedido->cliente}</td>
                                            <td class='d-none d-lg-table-cell'>{$pedido->domicilio}</td>
                                            <td class='d-flex flex-row align-items-center justify-content-center gap-1'>
                                                <!-- Botón para ver detalles del pedido -->
                                                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#detalleProducto_{$pedido->id_pedido}'>
                                                    <i class='fa-solid fa-bars'></i>
                                                </button>
                                                <!-- Modal para mostrar los detalles del pedido -->
                                                <div class='modal fade' id='detalleProducto_{$pedido->id_pedido}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                    <div class='modal-dialog'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h1 class='modal-title fs-5' id='exampleModalLabel'>Detalles del pedido</h1>
                                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                            </div>
                                                            <div class='modal-body'>
                                                                <h4 class='text-start fw-bolder mb-3'>Método de pago: <span class='fw-normal fs-4'>{$pedido->metodo_pago}</span></h4>
                                                                <h4 class='text-start fw-bolder mb-3'>Telefono: <span class='fw-normal fs-4'>{$pedido->telefono}</span></h4>
                                                                <h4 class='text-start fw-bolder mb-3'>Fecha y hora: <span class='fw-normal fs-4'>{$pedido->fecha_hora_pedido}</span></h4>
                                                                <h4 class='text-start fw-bolder mb-3'>Estatus: <span class='fw-normal fs-4'>{$pedido->estatus}</span></h4>                                                                    
                                                                <h4 class='text-start fw-bolder mb-3'>Monto total: <span class='fw-normal fs-4'>{$pedido->monto_total}</span></h4>
                                                                <h4 class='text-start fw-bolder mb-3'>Envío: <span class='fw-normal fs-4'>{$pedido->envio}</span></h4>
                                                                <h4 class='text-start fw-bolder mb-3'>Costo envío: <span class='fw-normal fs-4'>{$pedido->costo_envio}</span></h4>
                                                                <h4 class='text-start fw-bolder mb-3'>Guía de envío: <img src='{$pedido->guia_de_envio}' alt='Guía de envío' class='img-fluid'></h4>
                                                                <h4 class='text-start fw-bolder mb-3'>Documento: <img src='{$pedido->documento_url}' alt='Documento' class='img-fluid'></h4>


                                                                <!-- Tabla para mostrar detalles del pedido -->
                                                                <table class='table table-striped table-hover mt-3 border border-2'>
                                                                    <thead class='table-dark'>
                                                                        <tr>
                                                                            <th scope='col'>Bolsa</th>
                                                                            <th scope='col'>Medida</th>
                                                                            <th scope='col'>Cantidad</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>";
                                                                        foreach ($result as $detalle) {
                                                                            if ($detalle->id_pedido == $pedido->id_pedido) {
                                                                                echo "
                                                                                    <tr>
                                                                                        <td>{$detalle->bolsa}</td>
                                                                                        <td>{$detalle->medida}</td>
                                                                                        <td>{$detalle->cantidad}</td>
                                                                                    </tr>";
                                                                            }
                                                                        }

                                                                        echo "
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Botón para editar el pedido -->
                                                <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editarProducto_{$pedido->id_pedido}'>
                                                    <i class='fa-solid fa-pen-to-square'></i>
                                                </button>
                                                <!-- Modal para editar el pedido -->
                                                <div class='modal fade' id='editarProducto_{$pedido->id_pedido}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                    <div class='modal-dialog'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h1 class='modal-title fs-5' id='exampleModalLabel'>Editar pedido</h1>
                                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                            </div>
                                                            <div class='modal-body text-start'>
                                                                <form action='../scripts/editarpedido.php' method='post' enctype='multipart/form-data'>
                                                                    <input type='hidden' name='id_pedido' value='{$pedido->id_pedido}'>
                                                                    <div class='row'>
                                                                        <div class='col-6'>
                                                                            <label for='costo' class='form-label'>Costo de envio</label>
                                                                            <input type='number' min='0' class='form-control' id='costo' name='costo' value='{$pedido->costo_envio}' required>                                                                        
                                                                        </div>
                                                                        <div class='col-6'>
                                                                            <label for='estatus' class='form-label'>Estatus</label>
                                                                            <select name='estatus' id='estatus' class='form-select'>";
                                                                                $estados = array('Finalizado', 'Pendiente', 'Cancelado');
                                                                                foreach ($estados as $estado) {
                                                                                    if ($estado == $pedido->estatus) {
                                                                                        echo "<option value='{$estado}' " . (($pedido->estatus == 'Cancelado' || $pedido->estatus == 'Finalizado') ? 'disabled' : '')  . " selected>{$estado}</option>";

                                                                                    } else {
                                                                                        echo "<option value='{$estado}' " . ($pedido->estatus == 'Cancelado' || $pedido->estatus == 'Finalizado' ? 'disabled' : '') . ">{$estado}</option>";
                                                                                    }
                                                                                }
                                                                                echo "
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <label for='imagen' class='form-label'>Guia de envío</label>
                                                                        <input type='text' class='form-control' maxlength='50' id='imagen' name='guia' value='{$pedido->guia_de_envio}'>
                                                                    </div>
                                                                    <div>
                                                                        <label for='fecha' class='form-label'>Documento</label>
                                                                        <input type='file' class='form-control' id='fecha' name='documento' value='{$pedido->documento_url}' required>
                                                                    </div>
                                                                    <div class='row'>
                                                                        <div class='col-12 text-end'>
                                                                            <button type='button' class='btn btn-secondary mt-3' data-bs-dismiss='modal'>Cancelar</button>
                                                                            <button type='submit' class='btn btn-primary mt-3'>Actualizar</button>
                                                                        </div>
                                                                    </div> 
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>";
                                        $pedidosMostrados[] = $pedido->id_pedido;
                                    }
                                }

                                echo "</tbody></table>";
                            }
                        }
                        ?>
                </div>
            </div>
        </div>
     </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const estado = document.getElementById('estado');
        const form = document.getElementById('pedidoForm');
        
        function toggleForm(disabled) {
            const inputs = form.querySelectorAll('input, select, textarea, button:not([type="submit"])');
            inputs.forEach(input => input.disabled = disabled);
        }

        estado.addEventListener('change', function() {
            toggleForm(estado.value === 'cancelado');
        });

        // Verificar el estado inicial al cargar la página
        toggleForm(estado.value === 'cancelado');
    });
</script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/b820f07375.js" crossorigin="anonymous"></script>
        <script src="../script/script.js"></script>
</body>

</html>