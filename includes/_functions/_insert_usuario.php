<?php

require_once ("../_db.php");

    global $conexion;   
    $Codigo=$_POST['Codigo'];
    $Nombre=$_POST['Nombre'];
    $Correo=$_POST['Correo'];
    $password=$_POST['password'];

    $consulta= "begin  InsertarUsuario(Autocliente.nextval, '$Nombre', '$Correo', '$password'); End;";

    $stid = oci_parse($conexion, $consulta);
    oci_execute($stid);

    header('Location: ../../views/usuarios/Usuarios.php');
?>