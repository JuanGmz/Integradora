<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Pedidos</title>
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
                            <button class="row accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-inicio" aria-expanded="false"
                                aria-controls="flush-inicio">
                                <div class="col-6">
                                    <a href="adminInicio.php" class="text-light fw-bold text-decoration-none">
                                        <i class="fa-solid fa-house-laptop me-1"></i>
                                        Inicio
                                    </a>
                                </div>
                            </button>
                        </h2>
                        <div class="accordion-item row m-0 p-0">
                            <div class="accordion-header">
                                <div class="collapsed fw-bold fs-3 bg-dark text-light p-3 ">
                                    Componentes
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Componentes -->
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-menu" aria-expanded="false"
                                aria-controls="flush-menu">
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
                                <a href="adminMenu.php" class="ms-5 text-light fw-bold fs-5 text-decoration-none"
                                    aria-current="true">
                                    Administrar Menú
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-events" aria-expanded="false"
                                aria-controls="flush-events">
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
                                <a href="adminEventos.php" class="text-light fw-bold fs-5 text-decoration-none ms-5"
                                    aria-current="true">
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
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-ecommerce" aria-expanded="false"
                                aria-controls="flush-ecommerce">
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
                                <a href="adminPedidos.php" class="fw-bold fs-5 ms-5 text-light text-decoration-none"
                                    aria-current="true">
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
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-blog" aria-expanded="false"
                                aria-controls="flush-blog">
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
                                <a href="adminPublicaciones.php"
                                    class="fw-bold fs-5 ms-5 text-light text-decoration-none" aria-current="true">
                                    Administrar Publicaciones
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item row m-0 p-0">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-rewards" aria-expanded="false"
                                aria-controls="flush-rewards">
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
                                <a href="adminRecompensas.php" class="fw-bold fs-5 ms-5 text-light text-decoration-none"
                                    aria-current="true">
                                    Administrar Recompensas
                                </a><br><br>
                                <a href="adminAsistencias.php" class="fw-bold fs-5 ms-5 text-light text-decoration-none"
                                    aria-current="true">
                                    Administrar Asistencias
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                        aria-expanded="false" aria-label="Toggle navigation">
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
                    <div class="fw-bold fs-5 ms-2 mb-3 bg-dark text-light">
                        Componentes
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-menu" aria-expanded="false"
                                aria-controls="flush-menu">
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
                                <a href="adminMenu.php" class="ms-5 text-light fw-bold fs-6 text-decoration-none"
                                    aria-current="true">
                                    Administrar Menú
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-events" aria-expanded="false"
                                aria-controls="flush-events">
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
                                <a href="adminEventos.php" class="text-light fw-bold fs-6 text-decoration-none ms-5"
                                    aria-current="true">
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
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-ecommerce" aria-expanded="false"
                                aria-controls="flush-ecommerce">
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
                                <a href="adminPedidos.php" class="fw-bold fs-6 ms-5 text-light text-decoration-none"
                                    aria-current="true">
                                    Administrar Pedidos
                                </a><br><br>
                                <a href="adminProductosEcommerce.php"
                                    class="fw-bold fs-6 ms-5 text-light text-decoration-none">
                                    Administrar Productos
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-blog" aria-expanded="false"
                                aria-controls="flush-blog">
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
                                <a href="adminPublicaciones.php" class="fw-bold fs-6 ms-5 text-light text-decoration-none"
                                    aria-current="true">
                                    Administrar Publicaciones
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header row">
                            <button class="accordion-button collapsed fw-bold fs-4 bg-dark text-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-rewards" aria-expanded="false"
                                aria-controls="flush-rewards">
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
                                <a href="adminRecompensas.php" class="fw-bold fs-6 ms-5 text-light text-decoration-none"
                                    aria-current="true">
                                    Administrar Recompensa
                                </a><br><br>
                                <a href="adminAsistencias.php" class="fw-bold fs-6 ms-5 text-light text-decoration-none" aria-current="true">
                                    aria-current="true">
                                    Administrar Asistencias
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
                <div class="shadow-lg bg-light container p-3">
                    <div class="row m-2">
                        <div class="col-12">
                        <form method="post">
                                <div class="row">
                                    <div class="col-8">
                                        <input type="text" class="form-control" name="busqueda" placeholder="Ingresa folio, usuario o teléfono" value="<?php echo isset($_POST['busqueda']) ? htmlspecialchars($_POST['busqueda']) : ''; ?>">
                                    </div>
                                    <div class="col-4">
                                        <input type="submit" class="btn btn-primary w-100" value="Buscar">
                                    </div>
                                </div>
                        </form>
                        </div>
                    </div>
            </div>
                <div class="row">
                    <!-- Tabla de pedidos AQUI -->
                    <div class="row mt-lg-3 p-3 p-lg-4 m-0">
                    <div class="d-lg-none w-100 mb-3 m-0 p-0">
                        <button type="button" class="btn w-100 btn-primary shadow-lg" data-bs-toggle="modal" data-bs-target="#agregarEvento">
                            <i class="fa-solid fa-plus fa-2x"></i>
                        </button>
                    </div>
                            <?php
                                include("../class/database.php");

                                $db = new Database();

                                $db->conectarDB();
                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    $busqueda = $_POST['busqueda'];

                                    $query = "CALL SP_filtrar_pedidos('%$busqueda%')";

                                    $productos = $db->select($query);

                                    if (empty($productos)) {
                                        echo "<div role='alert'>No hay pedidos registrados con este folio, usuario o teléfono.</div>";
                                    } else {
                                        echo "
                                        <table class='table table-striped table-hover table-dark text-center border-3 border-black border-bottom border-start border-end'>
                                            <thead>
                                                <tr>
                                                    <th scope='col'>Folio</th>
                                                    <th scope='col'>Nombre</th>
                                                    <th scope='col'>Domicilio</th>
                                                    <th scope='col'>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody class='table-group-divider table-light'>";
                                        
                                        // Recorrer los productos y mostrar cada uno en una fila de la tabla
                                        foreach ($productos as $producto) {
                                            echo "
                                                <tr>
                                                    <td>$producto->id_pedido</td>
                                                    <td>$producto->cliente</td>
                                                    <td>$producto->domicilio</td>
                                                    <td class='d-flex flex-row align-items-center justify-content-center gap-1'>
                                                        <!-- Botón para ver detalles del producto -->
                                                        <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#detalleProducto_$producto->id_pedido'>
                                                            <i class='fa-solid fa-bars'></i>
                                                        </button>
                                                        <!-- Modal para mostrar los detalles del producto -->
                                                        <div class='modal fade' id='detalleProducto_$producto->id_pedido' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                            <div class='modal-dialog'>
                                                                <div class='modal-content'>
                                                                    <div class='modal-header'>
                                                                        <h1 class='modal-title fs-5' id='exampleModalLabel'>Detalles del pedido</h1>
                                                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                                    </div>
                                                                    <div class='modal-body'>
                                                                        <h4 class='text-start fw-bolder mb-3'>Bolsa: <span class='fw-normal fs-4'><br>$producto->bolsa</span></h4>
                                                                        <h4 class='text-start fw-bolder mb-3'>Medida: <span class='fw-normal fs-4'>$producto->medida</span></h4>
                                                                        <h4 class='text-start fw-bolder mb-3'>Cantidad: <span class='fw-normal fs-4'>$producto->cantidad</span></h4>
                                                                        <h4 class='text-start fw-bolder mb-3'>Método de pago: <span class='fw-normal fs-4'>$producto->metodo_pago</span></h4>
                                                                        <h4 class='text-start fw-bolder mb-3'>Telefono: <span class='fw-normal fs-4'>$producto->telefono</span></h4>
                                                                        <h4 class='text-start fw-bolder mb-3'>Fecha y hora: <span class='fw-normal fs-4'>$producto->fecha_hora_pedido</span></h4>
                                                                        <h4 class='text-start fw-bolder mb-3'>Estatus: <span class='fw-normal fs-4'>$producto->estatus</span></h4>                                                                    
                                                                        <h4 class='text-start fw-bolder mb-3'>Monto total: <span class='fw-normal fs-4'>$producto->monto_total</span></h4>
                                                                        <h4 class='text-start fw-bolder mb-3'>Envío: <span class='fw-normal fs-4'>$producto->envio</span></h4>
                                                                        <h4 class='text-start fw-bolder mb-3'>Costo envío: <span class='fw-normal fs-4'>$producto->costo_envio</span></h4>
                                                                        <h4 class='text-start fw-bolder mb-3'>Guía de envío: <span class='fw-normal fs-4'>$producto->guia_de_envio</span></h4>
                                                                        <h4 class='text-start fw-bolder mb-3'>Documento: <span class='fw-normal fs-4'>$producto->documento_url</span></h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editarProducto_$producto->id_pedido'>
                                                    <i class='fa-solid fa-pen-to-square'></i>
                                                    </button>
                                                        <div class='modal fade' id='editarProducto_$producto->id_pedido' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                            <div class='modal-dialog'>
                                                                <div class='modal-content'>
                                                                    <div class='modal-header'>
                                                                            <h1 class='modal-title fs-5' id='exampleModalLabel'>Editar pedido</h1>
                                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                                    </div>
                                                                        <!-- Aquí va el contenido del modal -->
                                                                    <div class='modal-body text-start'>
                                                                            <form action='../scripts/editarpedido.php' method='post'>
                                                                                <input type='hidden' name='id_pedido' value='$producto->id_pedido' readonly>
                                                                    <div>
                                                                        <label for='titulo' class='form-label'>Cliente: </label>
                                                                        <input type='text' class='form-control' id='titulo' name='cliente' value='$producto->cliente' readonly >
                                                                    </div>
                                                                    <div>
                                                                    <label for='descripcion' class='form-label'>Bolsa</label>
                                                                    <input type='text' class='form-control' id='descripcion' name='bolsa' value='$producto->bolsa' readonly>
                                                                    </div>
                                                                    <div class='row'>
                                                                    <div class='col-4'>
                                                                        <label for='cap' class='form-label'>Monto total</label>
                                                                        <input type='text' min='1' class='form-control' id='cap' name='montototal' value='$producto->monto_total' readonly>
                                                                    </div>

                                                                    <div class='col-4'>
                                                                        <label for='costo' class='form-label'>Costo de envio</label>
                                                                        <input type='number' min='0' class='form-control' id='costo' name='costo' value=$producto->costo_envio>                                                                        
                                                                    </div>
                                                                    <div class='col-4'>
                                                                    <label for='estatus' class='form-label'>Estatus</label>
                                                                    <select name='estatus' id='estatus' class='form-select'>
                                                                        <option value='{$producto->id_pedido}'>{$producto->estatus}</option>
                                                                        <option value='Pendiente' " . ($producto->estatus == 'Cancelado' ? 'disabled' : '') . ">Pendiente</option>
                                                                        <option value='Finalizado' " . ($producto->estatus == 'Cancelado' ? 'disabled' : '') . ">Finalizado</option>
                                                                    </select>
                                                                    </div>
                                                                    </div>
                                                                    <div>
                                                                        <label for='imagen' class='form-label'>Guia de envío</label>
                                                                        <input type='file' class='form-control' id='imagen' name='guia' value=$producto->guia_de_envio>
                                                                     </div> 
                                                                
                                                                    <div >
                                                                        <label for='fecha' class='form-label'>Documento</label>
                                                                        <input type='file' class='form-control' id='fecha' name='documento' value=$producto->documento_url>  
                                                                    </div>
                                                                    <div class='row'>
                                                                    <div class='col-12 text-end'>
                                                                        <button type='submit' class='btn btn-primary mt-3'>Actualizar</button>
                                                                    </div>
                                                                    </div> 
                                                                 </form>
                                                             </div>
                                                         </div>
                                                    /div>
                                                </div>
                                            </td>
                                    </tr>";
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