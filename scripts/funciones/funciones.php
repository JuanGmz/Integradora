<?php
function showAlert($message, $type = 'success')
{
    echo "<script> document.addEventListener('DOMContentLoaded', function() { showAlert('$message', '$type'); }); </script>";
}

function formatHora($hora)
{
    $date = DateTime::createFromFormat('H:i:s', $hora);
    return $date->format('g:i A'); // 'g:i A' es el formato para 12 horas con AM/PM
}

function formatFecha($fecha)
{
    $date = DateTime::createFromFormat('Y-m-d', $fecha); // Ajusta el formato según sea necesario
    return $date->format('d M Y'); // '10 sep 2024'
}

function formatPrecio($precio)
{
    // Convierte el precio a un formato con dos decimales y separador de miles
    return number_format($precio, 2, '.', ',');
}
