<?php
    // Conectar base de datos
    include_once("../../class/database.php");
    $conexion = NEW database();
    $conexion->conectarDB();

    // Extraer datos
    extract($_POST);

    // Actualizar imagen
    $query = "UPDATE publicaciones SET img_url = '$imagen_nueva' WHERE id_publicacion = $id_publicacion";

    // Ejecutar consulta
    $conexion->execute($query);

    // Cerrar la conexión
    $conexion->desconectarDB(); 

    // Redireccionar
    header("Location: ../../views/adminPublicaciones.php");
    exit;
