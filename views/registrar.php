<?php
$alerta = "";
if ($_POST) {
    include '../class/database.php';
    $db = new Database();
    $db->conectarDB();

    extract($_POST);

    $usuarioExistente = "select count(*) as count from personas where usuario = '$usuario'";
    $resultado = $db->select($usuarioExistente);
    if (!$resultado[0]->count > 0) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "call SP_Registrar_usuariosClientes('$nombres','$aPaterno','$aMaterno','$usuario','$email','$hashedPassword','$telefono')";
        $db->execute($query);
        $alerta = "<div class='alert alert-success' role='alert'>¡Usuario registrado!</div>";
        header('refresh:3;url=./login.php');
    } else {
        $alerta = "<div class='alert alert-danger' role='alert'>¡El usuario ya existe!</div>";
    }
    $db->desconectarDB();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body style="background: var(--color5)">
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg shadow-lg mb-md-2 mb-lg-5">
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
            <a href="login.php" class="login-button ms-auto">Iniciar Sesión</a>
            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- NavBar End -->

    <!-- Registrar -->
    <div class="container bg-light rounded-3 lg lg-0 lg-0">
        <div class="row">

            <!-- Formulario -->
            <div class="col-lg-6 col-md-6 col-md-6 p-5 d-flex justify-content-center">
                <form action="#" method="post" class="p-0 p-lg-5" onsubmit="return validarPassword()">
                    <legend class="fw-bold fs-1">Crear Cuenta</legend>
                    <div class="row p-2">
                        <div class="col-12 mb-2">
                            <label for="nombres" class="form-label fs-5">Nombres</label>
                            <input type="text" class="form-control form-control-bb" id="nombres" name="nombres"
                                required>
                        </div>
                        <div class="row m-0 p-0">
                            <div class="col-6 mb-2">
                                <label for="aPaterno" class="form-label fs-5">Apellido Paterno</label>
                                <input type="text" class="form-control form-control-bb" id="aPaterno" name="aPaterno"
                                    required>
                            </div>
                            <div class="col-6 mb-2">
                                <label for="aMaterno" class="form-label fs-5">Apellido Materno</label>
                                <input type="text" class="form-control form-control-bb" id="aMaterno" name="aMaterno"
                                    required>
                            </div>
                        </div>
                        <div class="col-12 mb-2">
                            <label for="email" class="form-label fs-5">Email</label>
                            <input type="email" class="form-control form-control-bb" id="email" name="email" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="email" class="form-label fs-5">Telefono</label>
                            <input type="te" class="form-control form-control-bb" id="telefono" name="telefono"
                                pattern="[0-9]{10}" required>
                        </div>
                        <hr>
                        <div class="col-12 mb-2">
                            <label for="nombres" class="form-label fs-5">Usuario</label>
                            <input type="text" class="form-control form-control-bb" id="usuario" name="usuario"
                                required>
                        </div>

                        <div class="col-12 mb-2">
                            <label for="password" class="form-label fs-5">Crear Contraseña</label>
                            <input type="password" class="form-control form-control-bb" id="password" name="password"
                                required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="password2" class="form-label fs-5">Repetir Contraseña</label>
                            <input type="password" class="form-control form-control-bb" id="password2" name="password2" " required>
                        </div>
                        <div class=" col-12 mb-3 ">
                            <a href=" ./login.php">
                            <p for="password2" class="blog-card-link ">¿Ya tienes cuenta? Click aqui</p>
                            </a>

                        </div>
                        <?php
                        echo $alerta;
                        ?>
                        <div class="col-12 mb-2 text-end d-flex justify-content-cente text-center">
                            <button type="submit"
                                class="btn btn-cafe w-100 text-light fw-bold fs-5 m-5">Registrarse</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Imagen -->
            <div class="col-lg-6 col-6  p-0 m-0 d-none d-md-block">
                <img src="../img/cafes/cafe16.webp" class="img-fluid h-100 rounded coffee-image" alt="">
            </div>
        </div>
    </div>
    <script>
        function validarPassword() {
            var password = document.getElementById("password").value;
            var password2 = document.getElementById("password2").value;
            if (password != password2) {
                alert("Las contraseñas no coinciden");
                return false;
            }
            return true;
        }
    </script>
    
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/45ef8dbe96.js" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>