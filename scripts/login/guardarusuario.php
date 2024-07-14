<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <?php
    include '../../class/database.php';
    $db = new Database();
    $db->conectarDB();

    extract($_POST);


    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "call SP_Registrar_usuariosClientes('$nombres','$aPaterno','$aMaterno','$usuario','$email','$hashedPassword','$telefono');";
    $query2 = "select * from usuarios where usuario = '$usuario' or correo = '$email'";

    $fila = $db->select($query);

    if (count($fila) > 0) {
        echo "<div class='alert alert-danger' role='alert'>El usuario ya existe</div>";
    } else {
        $db->execute($query);
        echo "<div class='alert alert-success' role='alert'>Usuario registrado con exito</div>";
    }
    header("refresh:3; url=../../views/login.php");
    ?>
</body>

</html>