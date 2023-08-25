<?php

require_once ("../_db.php");


    global $conexion;
    $id = $_POST['id']; 
    $Proveedor=$_POST['Proveedor'];
    $Direccion=$_POST['Direccion'];
    $Numero=$_POST['Numero'];
    $Correo=$_POST['Correo'];

    $consulta= "begin  ActualizarProveedor($id,'$Proveedor','$Direccion', $Numero, '$Correo'); End;";
    $resultado = oci_parse($conexion, $consulta); 
    oci_execute($resultado);

    header('Location: ../../views/usuarios/Proveedor.php');

    ?>