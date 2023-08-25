<?php

require_once ("../_db.php");

    global $conexion; 
    $id = $_POST['id'];
    $consulta= "begin  BorrarProducto($id); End;";
    $resultado=oci_parse($conexion, $consulta);
    oci_execute($resultado);
    header('Location: ../../views/usuarios/Productos.php');

?>