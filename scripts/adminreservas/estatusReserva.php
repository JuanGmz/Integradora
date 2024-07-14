<?php
    include_once '../../class/database.php';
    $db = new Database();
    $db->conectarDB();

    extract($_POST);

    $query = "UPDATE eventos_reservas SET estatus = '$estatus' WHERE id_reserva = '$id_reserva'";
    $db->execute($query);
    $db->desconectarDB();

    header('Location: ../../views/adminReservas.php');
    exit;