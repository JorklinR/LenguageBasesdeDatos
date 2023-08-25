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

    $consulta= "begin  InsertarMovimientoInventario(Automovimiento.nextval, $Tipo, AUTOORDEN.nextval, $Cliente, TO_DATE('$fecha', 'yyyy/mm/dd') ,$producto, $Cantidad, $Empleado); End;";

    $stid = oci_parse($conexion, $consulta);
    if (!oci_execute($stid)) {
        $e = oci_error($stid);
        echo "Error: " . htmlentities($e['message'], ENT_QUOTES);
        header('Location: ../../views/usuarios/Error_stock.php');
    }
    else{
        header('Location: ../../views/usuarios/Movimientos.php');
    }

    
?>