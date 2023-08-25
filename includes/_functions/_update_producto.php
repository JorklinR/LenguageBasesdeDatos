<?php

require_once ("../_db.php");


    global $conexion;
    $id = $_POST['id'];
    $Proveedor=$_POST['Proveedor'];
    $Nombre=$_POST['Nombre'];
    $Tipo=$_POST['Tipo'];
    $serie=$_POST['serie'];
    $Modelo=$_POST['Modelo'];
    $Marca=$_POST['Marca'];
    $Cantidad=$_POST['Cantidad'];

    $consulta= "begin  ActualizarProducto($id,$Proveedor,'$Nombre',$Tipo,$serie,'$Modelo','$Marca',$Cantidad); End;";
    $resultado = oci_parse($conexion, $consulta); 
    oci_execute($resultado);
    header('Location: ../../views/usuarios/Productos.php');


    ?>