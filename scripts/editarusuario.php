<?php
session_start();
include_once("../class/database.php");
$db = new database();
$db->conectarDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_POST['id_usuario'];
    
    // Sirve para eliminar un rol
    if (isset($_POST['eliminar_rol'])) {
        $rol_a_eliminar = $_POST['eliminar_rol'];
        $query_eliminar_rol = "DELETE FROM roles_usuarios WHERE id_usuario = ? AND id_rol = (SELECT id_rol FROM roles WHERE rol = ?)";
        $stmt = $db->prepare($query_eliminar_rol);
        $stmt->execute([$id_usuario, $rol_a_eliminar]);
        $_SESSION['last_user_id'] = $id_usuario;
    }

    // Sirve para agregar un nuevo rol
    if (isset($_POST['rol_nuevo']) && !empty($_POST['rol_nuevo'])) {
        $rol_nuevo = $_POST['rol_nuevo'];
        $query_agregar_rol = "INSERT INTO roles_usuarios (id_usuario, id_rol) VALUES (?, ?)";
        $stmt = $db->prepare($query_agregar_rol);
        $stmt->execute([$id_usuario, $rol_nuevo]);
        $_SESSION['last_user_id'] = $id_usuario;
    }

    header("Location: ../views/adminUsuarios.php");
    exit();
}
?>
