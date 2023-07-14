<?php

require_once "conexion_be.php";

function ActualizarUsuario($pNombre, $pCorreo, $pUsuario, $pRol)
{
    $retorno = false;
    $conexion = Conecta();
    //formato de dato utf8
    if(mysqli_set_charset($conexion, "utf8")){
    
        //2. Ejecutar la consulta (Inserción de datos)
        $stmt = $conexion->prepare("update usuarios
        set nombre_completo = '{$_POST['nombre']}', 
        correo = '{$_POST['correo']}', 
        usuario = '{$_POST['usuario']}',
        rol_id = '{$_POST['rol']}'
        where id_usuario = ' {$_POST['id_usuario']}'");


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