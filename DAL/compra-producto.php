<?php

require_once "conexion_be.php";

function IngresarCompra($pDescripcion, $pPrecio, $pCantidad, $pTotalPagar)
{
    $retorno = false;
    $conexion = Conecta();
    //formato de dato utf8
    if(mysqli_set_charset($conexion, "utf8")){
    
        //2. Ejecutar la consulta (Inserción de datos)
        $stmt = $conexion->prepare("Insert into compras (articulo, precio, cantidad, total_pagar) value (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $iDescripcion, $iPrecio, $iCantidad, $iTotalPagar);

        //set parametros y ejecutar
        $iDescripcion = $pDescripcion;
        $iPrecio = $pPrecio;
        $iCantidad = $pCantidad;
        $iTotalPagar = $pTotalPagar;

        if($stmt->execute()){
            $retorno = true;
        }
    }

    Desconecta($conexion);

    return $retorno;
}

?>