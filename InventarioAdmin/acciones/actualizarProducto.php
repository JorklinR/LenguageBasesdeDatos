<?php
require_once '../../include/obtieneRequests.php';

$descripcion = recogePost("desc");
$precio = recogePost("precio");
$imagen = recogePost("imagen");

$descripcionOk = true;
$precioOk = true;
$imagenOk = true;

if($descripcionOk && $precioOk && $imagenOk){
     require_once '../../DAL/actualiza-producto.php';
     if (ActualizarDato($descripcion, $precio, $imagen)){
        header("Location: ../inventarioAdmin.php");
     }
}


?>