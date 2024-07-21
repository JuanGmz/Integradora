<?php
session_start();
include_once("../../class/database.php"); // Asegúrate de que este archivo incluye la lógica para conectar a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $telefono = $_POST['telefono'];



    // Conectar a la base de datos
    $database = new Database();
    $database->conectarDB();
    $conn = $database->getConnection();

    // Verificar si el número de teléfono existe en la base de datos
    $query = "SELECT correo FROM personas WHERE telefono = :telefono";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $codigo = rand(100000, 999999);
        // Insertar o actualizar el código en la tabla de restablecimiento de contraseñas
        $query = "INSERT INTO password_resets (telefono, codigo, created_at) VALUES (:telefono, :codigo, NOW())
                  ON DUPLICATE KEY UPDATE codigo = :codigo, created_at = NOW()";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->execute();
        header("Location: ../../views/codigo.php");
    } else {
        echo "El número de teléfono no existe.";
        header('refresh:3 ;url=../../views/login.php');
    }

    // Desconectar de la base de datos
    $database->desconectarDB();
}
