<?php

require_once ("../_db.php");


    global $conexion;
    $id = $_POST['id'];
    $Descripcion=$_POST['Descripcion'];

                
    $consulta="UPDATE TIPO_PRODUCTO SET DESCRIPCION_CATEGORIA_TIPO_PRODUCTO = '$Descripcion' WHERE ID_PRODUCTO = $id";

    $resultado = oci_parse($conexion, $consulta); 
    oci_execute($resultado);

    header('Location: ../../views/usuarios/Dashboard.php');

    ?>