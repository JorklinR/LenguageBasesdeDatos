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

                
    $consulta="UPDATE producto SET ID_PROVEEDOR = $Proveedor, NOMBRE_PRODUCTO = '$Nombre', TIPO_PRODUCTO = $Tipo, 
    SERIE_PRODUCTO = $serie, MODELO_PRODUCTO = '$Modelo', MARCA_PRODUCTO = '$Marca', STOCK = $Cantidad WHERE ID_PRODUCTO = $id";

    $resultado = oci_parse($conexion, $consulta); 
    oci_execute($resultado);

    header('Location: ../../views/usuarios/Productos.php');

    ?>