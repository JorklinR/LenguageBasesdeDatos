<?php

require_once ("../_db.php");


    global $conexion;
    $id = $_POST['id']; 
    $Nombre=$_POST['Nombre'];
    $Correo=$_POST['Correo'];
    $password=$_POST['password'];

    $consulta= "begin  ActualizarUsuario($id,'$Nombre','$Correo', '$password'); End;";           
    $resultado = oci_parse($conexion, $consulta); 
    oci_execute($resultado);

    header('Location: ../../views/usuarios/Usuarios.php');

    ?>