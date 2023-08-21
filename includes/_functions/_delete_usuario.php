<?php

require_once ("../_db.php");

    global $conexion; 
    $id = $_POST['id'];
    $consulta = "DELETE FROM Usuario WHERE ID_EMPLEADO = $id";
    $resultado=oci_parse($conexion, $consulta);
    oci_execute($resultado);
    header('Location: ../../views/usuarios/Usuarios.php');

?>