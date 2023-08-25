<?php

require_once ("../_db.php");

    global $conexion;   
    $Codigo=$_POST['Codigo'];
    $Descripcion=$_POST['Descripcion'];

    $consulta= "begin  InsertarTipoProducto(Autotipo.nextval, '$Descripcion'); End;";

    $stid = oci_parse($conexion, $consulta);
    oci_execute($stid);

    header('Location: ../../views/usuarios/Dashboard.php');
?>