<?php

require_once ("../_db.php");


    global $conexion;
    $id = $_POST['id'];
    $Descripcion=$_POST['Descripcion'];

    $consulta= "begin  ActualizarTipoProducto($id,'$Descripcion'); End;";

    $resultado = oci_parse($conexion, $consulta); 
    oci_execute($resultado);

    header('Location: ../../views/usuarios/Dashboard.php');

    ?>