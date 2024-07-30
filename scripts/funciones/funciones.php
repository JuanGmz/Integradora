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
    // Crear un objeto DateTime a partir de la fecha dada
    $date = DateTime::createFromFormat('Y-m-d', $fecha);

    // Definir los nombres de los días y meses en español
    $dias = array('domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado');
    $meses = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');

    // Obtener el día de la semana y el mes en español
    $diaSemana = $dias[$date->format('w')];
    $mes = $meses[$date->format('n') - 1];

    // Formatear la fecha en el formato deseado
    return ucfirst($diaSemana) . ', ' . $date->format('d') . ' de ' . $mes . ' de ' . $date->format('Y');
}

function formatPrecio($precio)
{
    // Convierte el precio a un formato con dos decimales y separador de miles
    return number_format($precio, 2, '.', ',');
}
