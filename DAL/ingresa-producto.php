<?php

require_once "conexion_be.php";

function IngresarProducto($pDescripcion, $pPrecio, $pImagen)
{
    $retorno = false;
    $conexion = Conecta();
    //formato de dato utf8
    if(mysqli_set_charset($conexion, "utf8")){
    
        //2. Ejecutar la consulta (Inserción de datos)
        $stmt = $conexion->prepare("Insert into productos (descripcion, precio, imagen) value (?, ?, ?)");
        $stmt->bind_param("sss", $iDescripcion, $iPrecio, $iImagen);

        //set parametros y ejecutar
        $iDescripcion = $pDescripcion;
        $iPrecio = $pPrecio;
        $iImagen = $pImagen;

        if($stmt->execute()){
            $retorno = true;
        }
    }

    Desconecta($conexion);

    return $retorno;
}

?>