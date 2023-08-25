<?php

require_once ("../_db.php");

    global $conexion;   
    $Codigo=$_POST['Codigo'];
    $Proveedor=$_POST['Proveedor'];
    $Nombre=$_POST['Nombre'];
    $Tipo=$_POST['Tipo'];
    $serie=$_POST['serie'];
    $Modelo=$_POST['Modelo'];
    $Marca=$_POST['Marca'];
    $Cantidad=$_POST['Cantidad'];


    $consulta= "begin  InsertarProducto(Autoproductos.nextval, $Proveedor, '$Nombre', $Tipo, $serie ,'$Modelo', '$Marca', $Cantidad); End;";
    $stid = oci_parse($conexion, $consulta);
    oci_execute($stid);

    header('Location: ../../views/usuarios/Productos.php');
?>