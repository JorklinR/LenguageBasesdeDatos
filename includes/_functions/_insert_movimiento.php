<?php

require_once ("../_db.php");

    global $conexion;   
    $Codigo=$_POST['Codigo'];
    $Tipo=$_POST['Tipo'];
    $orden=$_POST['orden'];
    $Cliente=$_POST['Cliente'];
    $fecha=$_POST['fecha'];
    $producto=$_POST['producto'];
    $Cantidad=$_POST['Cantidad'];
    $Empleado=$_POST['Empleado'];


    $consulta="INSERT INTO MOVIMIENTO_INVENTARIO (ID_MOVIMIENTO, ID_TIPO_MOVIMIENTO, NUM_ORDEN, ID_CLIENTE, FECHA_MOVIMIENTO, ID_PRODUCTO, CANTIDAD_MOVIMIENTO, ID_EMPLEADO)
    VALUES ($Codigo, $Tipo, $orden, $Cliente, TO_DATE('$fecha', 'yyyy/mm/dd') ,$producto, $Cantidad, $Empleado)";

    $stid = oci_parse($conexion, $consulta);
    oci_execute($stid);

    header('Location: ../../views/usuarios/Movimientos.php');
?>