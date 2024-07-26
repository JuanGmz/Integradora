<?php
    include("../../class/database.php");
    $conexion = new Database();
    $conexion->conectarDB();

    extract($_POST);

    if (isset($_FILES['imagen']) && isset($_POST['medida']) && isset($_POST['precio']) && isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['categoria'])) {

        // Directorio donde se guardarán las imágenes
        

        // Nombre del archivo subido
        $nombreImagen = basename($_FILES['imagen']['name']);

        // Ruta completa del archivo a ser guardado
        $imagen = "../../img/menu/". $nombreImagen;

        // Mover el archivo subido a la carpeta de destino
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen)) {
            // Primera consulta
            $query1 = "INSERT INTO productos_menu(id_categoria, nombre, descripcion, img_url) VALUES ($categoria, '$nombre', '$descripcion', '$nombreImagen')";
            $conexion->execute($query1);

            // Segunda consulta
            $query2 = "INSERT INTO detalle_productos_menu(id_pm, medida, precio) VALUES (LAST_INSERT_ID(), '$medida', $precio)";
            $conexion->execute($query2);

        } else {
            echo "Error al subir la imagen.";
        }
        header('Location: ../../views/adminMenu.php');
    }
    else{
        header('Location: ../../views/adminInicio.php'); // si te manda al inicio, significa que tuviste un error al momento de recibir los datos
    }
    

    // Desconectar la base de datos
    $conexion->desconectarDB();

    // Redireccionar después de la inserción exitosa
    
    exit;