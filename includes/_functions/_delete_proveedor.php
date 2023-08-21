<?php

require_once ("../_db.php");

    global $conexion; 
    $id = $_POST['id'];
    $consulta = "DELETE FROM Proveedor WHERE ID_PROVEEDOR = $id";
    $resultado=oci_parse($conexion, $consulta);
    oci_execute($resultado);
    header('Location: ../../views/usuarios/Proveedor.php');

?>