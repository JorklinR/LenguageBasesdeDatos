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


    $consulta="INSERT INTO PRODUCTO (ID_PRODUCTO, ID_PROVEEDOR, NOMBRE_PRODUCTO, TIPO_PRODUCTO, SERIE_PRODUCTO, MODELO_PRODUCTO, MARCA_PRODUCTO, CANTIDAD_STOCK)
    VALUES ($Codigo, $Proveedor, '$Nombre', $Tipo, $serie ,'$Modelo', '$Marca', $Cantidad)";

    $stid = oci_parse($conexion, $consulta);
    oci_execute($stid);

    header('Location: ../../views/usuarios/index.php');
?>