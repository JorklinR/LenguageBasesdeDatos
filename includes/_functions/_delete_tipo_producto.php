<?php

require_once ("../_db.php");

    global $conexion; 
    $id = $_POST['id'];
    $consulta = "DELETE FROM TIPO_PRODUCTO WHERE ID_CATEGORIA = $id";
    $resultado=oci_parse($conexion, $consulta);
    oci_execute($resultado);
    header('Location: ../../views/usuarios/Dashboard.php');

?>