<?php

require_once "conexion_be.php";

function IngresarUsuario($pNombre, $pCorreo, $pUsuario, $pRol)
{
    $retorno = false;
    $conexion = Conecta();
    //formato de dato utf8
    if(mysqli_set_charset($conexion, "utf8")){
    
        //2. Ejecutar la consulta (Inserción de datos)
        $stmt = $conexion->prepare("Insert into usuarios (nombre_completo, correo, usuario, rol_id) value (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $iNombre, $iCorreo, $iUsuario, $iRol );

        //set parametros y ejecutar
        $iNombre = $pNombre;
        $iCorreo = $pCorreo;
        $iUsuario = $pUsuario;
        $iRol = $pRol;

        if($stmt->execute()){
            $retorno = true;
        }
    }

    Desconecta($conexion);

    return $retorno;
}

?>