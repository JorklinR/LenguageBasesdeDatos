<?php

require_once ("../_db.php");

    global $conexion;   
    $Codigo=$_POST['Codigo'];
    $Proveedor=$_POST['Proveedor'];
    $Direccion=$_POST['Direccion'];
    $Numero=$_POST['Numero'];
    $Correo=$_POST['Correo'];

    $consulta= "begin  InsertarProveedor(Autoproveedor.nextval, '$Proveedor', '$Direccion', $Numero, '$Correo'); End;";

    $stid = oci_parse($conexion, $consulta);
    oci_execute($stid);

    header('Location: ../../views/usuarios/Proveedor.php');
?>