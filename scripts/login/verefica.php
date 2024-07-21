<?php
session_start();
include_once("../../class/database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST['codigo'];
    $telefono = $_POST['telefono']; // Asegúrate de que el número de teléfono también se envíe desde el formulario

    // Conectar a la base de datos
    $database = new Database();
    $database->conectarDB();
    $conn = $database->getConnection();

    // Verificar si el código es correcto y el número de teléfono coincide
    $query = "SELECT * FROM password_resets WHERE codigo = :codigo AND telefono = :telefono AND created_at >= NOW() - INTERVAL 1 HOUR";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':codigo', $codigo);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $_SESSION['telefono'] = $result['telefono'];
        //  header("Location: reset_password.php");
        $telefono = $_POST['telefono'];
        $codigo = $_POST['codigo'];
        $newPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $query = "UPDATE personas SET contrasena = :newPassword WHERE telefono = :telefono";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':newPassword', $newPassword);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->execute();

        // Eliminar el registro de la tabla de restablecimiento de contraseñas
        $query = "DELETE FROM password_resets WHERE telefono = :telefono";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->execute();

        echo "Contraseña restablecida con éxito.";
        header('refresh:3 ;url=../../views/login.php');
        exit(); // Asegúrate de terminar el script aquí de redirigir
    } else {
        echo "Código de autenticación incorrecto, expirado o el número de teléfono no coincide.";
         // Eliminar registros expirados
         $delete_query = "DELETE FROM password_resets WHERE created_at < NOW() - INTERVAL 1 HOUR";
         $delete_stmt = $conn->prepare($delete_query);
         $delete_stmt->execute();
         header('refresh:3 ; url=../../views/codigo.php');
    }

    // Desconectar de la base de datos
    $database->desconectarDB();
}
