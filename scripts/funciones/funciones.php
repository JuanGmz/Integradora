<?php
function showAlert($message, $type = 'success')
{
    echo "<script> document.addEventListener('DOMContentLoaded', function() { showAlert('$message', '$type'); }); </script>";
}