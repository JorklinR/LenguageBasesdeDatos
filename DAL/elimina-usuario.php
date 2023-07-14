<?php

require_once "conexion_be.php";

function EliminarUsuario()
{
    $retorno = false;
    $conexion = Conecta();
    //formato de dato utf8
    if(mysqli_set_charset($conexion, "utf8")){
    
        //2. Ejecutar la consulta (Inserción de datos)
        $stmt = $conexion->prepare("Delete from usuarios where id_usuario = ' {$_POST['id_usuario']}'");

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