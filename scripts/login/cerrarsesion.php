<?php
include '../../class/database.php';

$obj = new database();

$obj->cerrarSesion();

header("location: ../../index.php");
exit;