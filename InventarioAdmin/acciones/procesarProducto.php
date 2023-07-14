<?php
require_once '../../include/obtieneRequests.php';

$descripcion = recogePost("desc");
$precio = recogePost("precio");
$imagen = recogePost("imagen");

$descripcionOk = false;
$precioOk = false;
$imagenOk = false;

if ($descripcion == ""){
   echo "<p>No se digito la descripcion del producto</p> <br>";
   echo "\n";
}else {
   $descripcionOk = true;
}

$precioOk = true;
$imagenOk = true;

if($descripcionOk && $precioOk && $imagenOk){
     require_once '../../DAL/ingresa-producto.php';
     if (IngresarProducto($descripcion, $precio, $imagen)){
        header("Location: ../inventarioAdmin.php");
     }
}


?>