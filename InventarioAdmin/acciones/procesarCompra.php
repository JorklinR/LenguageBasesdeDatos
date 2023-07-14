<?php
require_once '../../include/obtieneRequests.php';

$descripcion = recogePost("descripcion");
$precio = recogePost("precio");
$quantity = recogePost("quantity");
$total = recogePost("total");

$descripcionOk = false;
$precioOk = false;
$quantityOk = false;
$totalOk = false;

if ($descripcion == ""){
   echo "<p>No se ingreso un articulo</p> <br>";
   echo "\n";
}else {
   $descripcionOk = true;
}

$precioOk = true;
$quantityOk = true;
$totalOk = true;

if($descripcionOk && $precioOk && $quantityOk && $totalOk){
     require_once '../../DAL/compra-producto.php';
     if (IngresarCompra($descripcion, $precio, $quantity, $total)){
      header("Location: ../../Ferreteria/ferreteria.php");
          
     }
}


?>