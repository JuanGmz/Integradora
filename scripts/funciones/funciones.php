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
    if ($precio == 0) {
        return '0.00';
    } else {
        return number_format($precio, 2, '.', ',');
    }
}
function convertTo24Hour($time12)
{
    $time = DateTime::createFromFormat('h:i A', $time12);
    return $time ? $time->format('H:i') : $time12;
}

function validateImage($file)
{
    // Tipos de archivo permitidos
    $allowedTypes = ['image/png', 'image/jpeg', 'image/webp', 'image/bmp', 'image/tiff'];
    // Tamaño máximo permitido (en bytes)
    $maxSize = 5 * 1024 * 1024; // 5 MB

    if (isset($file)) {
        // Verificar el tipo MIME
        if (!in_array($file['type'], $allowedTypes)) {
            return 'Tipo de archivo no permitido. Por favor, selecciona una imagen.';
        }

        // Verificar el tamaño del archivo
        if ($file['size'] > $maxSize) {
            return 'El archivo es demasiado grande. El tamaño máximo permitido es 5 MB.';
        }

        // Verificar si el archivo es una imagen válida
        $check = getimagesize($file['tmp_name']);
        if ($check === false) {
            return 'El archivo no es una imagen válida.';
        }

        // Archivo válido
        return 'Imagen válida.';
    }

    return 'No se ha enviado ningún archivo.';
}