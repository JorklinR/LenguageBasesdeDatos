<?php

require_once ("../_db.php");

    global $conexion;   
    $Codigo=$_POST['Codigo'];
    $Nombre=$_POST['Nombre'];
    $Correo=$_POST['Correo'];
    $password=$_POST['password'];


    $consulta="INSERT INTO Usuario (ID_EMPLEADO, NOMBRE_EMPLEADO, CORREO, PASSWORD_EMPLEADO)
    VALUES ($Codigo, '$Nombre', '$Correo', '$password')";

    $stid = oci_parse($conexion, $consulta);
    oci_execute($stid);

    header('Location: ../../views/usuarios/Usuarios.php');
?>