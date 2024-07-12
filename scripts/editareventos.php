<?php
include ("../class/database.php");

$db = new Database();
$db->conectarDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);

    $consulta = "UPDATE EVENTOS SET  
   id_lugar = '$lugar', id_categoria = '$categoria', nombre = '$evento',tipo = '$tipo', descripcion = '$descripcion', fecha_evento = '$fechaEvento', hora_inicio = '$horaIni', hora_fin = '$horaFin', capacidad = '$cap', precio_boleto = '$costo', disponibilidad = '$cap', img_url = '$imgEvento', fecha_publicacion = '$fechaPub'";

    if ($db->execute($consulta)) {
        echo "Edicion exitosa.";
    } else {
        echo "Error al Editar evento.";
    }
}

$db->desconectarDB();
header("location: ../views/adminEventos.php");
?>