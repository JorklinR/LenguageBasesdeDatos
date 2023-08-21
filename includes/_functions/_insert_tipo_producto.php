<?php

require_once ("../_db.php");

    global $conexion;   
    $Codigo=$_POST['Codigo'];
    $Descripcion=$_POST['Descripcion'];

    $consulta="INSERT INTO TIPO_PRODUCTO (ID_CATEGORIA, DESCRIPCION_CATEGORIA_TIPO_PRODUCTO)
    VALUES ($Codigo, '$Descripcion')";

    $stid = oci_parse($conexion, $consulta);
    oci_execute($stid);

    header('Location: ../../views/usuarios/Dashboard.php');
?>