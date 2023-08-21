<?php

require_once ("../_db.php");


    global $conexion;
    $id = $_POST['id']; 
    $Nombre=$_POST['Nombre'];
    $Correo=$_POST['Correo'];
    $password=$_POST['password'];

                
    $consulta="UPDATE Usuario SET NOMBRE_EMPLEADO = '$Nombre', CORREO = '$Correo', 
    PASSWORD_EMPLEADO = '$password' WHERE ID_EMPLEADO = $id";

    $resultado = oci_parse($conexion, $consulta); 
    oci_execute($resultado);

    header('Location: ../../views/usuarios/Usuarios.php');

    ?>