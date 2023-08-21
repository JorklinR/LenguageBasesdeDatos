<?php

require_once ("../_db.php");

    global $conexion;   
    $Codigo=$_POST['Codigo'];
    $Proveedor=$_POST['Proveedor'];
    $Direccion=$_POST['Direccion'];
    $Numero=$_POST['Numero'];
    $Correo=$_POST['Correo'];


    $consulta="INSERT INTO Proveedor (ID_PROVEEDOR, NOMBRE_PROVEEDOR, DIRECCION_PROVEEDOR, NUMERO_TELEFONO_PROVEEDOR, CORREO_ELECTRONICO_PROVEEDOR)
    VALUES ($Codigo, '$Proveedor', '$Direccion', $Numero, '$Correo')";

    $stid = oci_parse($conexion, $consulta);
    oci_execute($stid);

    header('Location: ../../views/usuarios/Proveedor.php');
?>