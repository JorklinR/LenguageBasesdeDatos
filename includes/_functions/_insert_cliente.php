<?php

require_once ("../_db.php");

    global $conexion;   
    $Codigo=$_POST['Codigo'];
    $Cliente=$_POST['Cliente'];
    $Direccion=$_POST['Direccion'];
    $Numero=$_POST['Numero'];
    $Correo=$_POST['Correo'];


    $consulta="INSERT INTO Cliente (ID_CLIENTE, NOMBRE_CLIENTE, DIRECCION_CLIENTE, NUMERO_TELEFONO_CLIENTE, CORREO_ELECTRONICO_CLIENTE)
    VALUES ($Codigo, '$Proveedor', '$Direccion', $Numero, '$Correo')";

    $stid = oci_parse($conexion, $consulta);
    oci_execute($stid);

    header('Location: ../../views/usuarios/Clientes.php');
?>