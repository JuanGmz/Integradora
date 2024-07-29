<?php
include("../../class/database.php");
$conexion = new Database();
$conexion->conectarDB();


    extract($_POST);

    if (isset($_FILES['imagen']) && isset($_POST['nombre']) && isset($_POST['años_cosecha']) && isset($_POST['productor_finca']) && isset($_POST['proceso']) && isset($_POST['variedad']) && isset($_POST['altura']) && isset($_POST['aroma']) && isset($_POST['acidez']) && isset($_POST['sabor']) && isset($_POST['cuerpo']) && isset($_POST['puntaje_catacion']) && isset($_POST['medida']) && isset($_POST['precio']) && isset($_POST['stock'])) {

        // Configuración de la imagen
        $uploadDir = "../../img/bolsas/";
        $imageName = basename($_FILES['imagen']['name']);
        $uploadFile = $uploadDir . $imageName;

        // Mover el archivo subido a la carpeta de destino
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $uploadFile)) {
            // Captura los valores del formulario
            $nombre = $_POST['nombre'];
            $años_cosecha = $_POST['años_cosecha'];
            $productor_finca = $_POST['productor_finca'];
            $proceso = $_POST['proceso'];
            $variedad = $_POST['variedad'];
            $altura = $_POST['altura'];
            $aroma = $_POST['aroma'];
            $acidez = $_POST['acidez'];
            $sabor = $_POST['sabor'];
            $cuerpo = $_POST['cuerpo'];
            $puntaje_catacion = $_POST['puntaje_catacion'];
            $img_url = $imageName; // Usa el nombre de la imagen subida
            $medida = $_POST['medida'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];
            // echo " Nombre:". $nombre."/  anos de cosecha:". $años_cosecha ."/  productor de la finca:". $productor_finca ."/  proceso:". $proceso ."/ variado:". $variedad ."/  altura:". $altura ."/ aroma:". $aroma ."/  acidez:". $acidez ."/  sabor:". $sabor ."/  cuerpo:". $cuerpo ."/   puntaje de catacion:". $puntaje_catacion ."/  imagen url:". $img_url ."/  medida:". $medida ." / precio:". $precio ."/  stock:". $stock;



            // Preparar y ejecutar la llamada al procedimiento almacenado
            $query1 ="CALL SP_Agregar_producto_ecomerce('$nombre', '$años_cosecha', '$productor_finca', '$proceso', '$variedad', '$altura', '$aroma', '$acidez', '$sabor', '$cuerpo', $puntaje_catacion, '$img_url', '$medida', $precio, $stock)";
            $conexion->execute($query1);

            header('Location: ../../views/adminProductosEcommerce.php');
           

        } else {
            echo "Error al subir la imagen.";
        }
        exit;
    } else {
        header('Location: ../../views/adminInicio.php');
        exit;
    }

    // Desconectar la base de datos
    $conexion->desconectarDB();

?>