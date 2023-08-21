<?php

require_once ("../_db.php");


    global $conexion;
    $id = $_POST['id']; 
    $Proveedor=$_POST['Proveedor'];
    $Direccion=$_POST['Direccion'];
    $Numero=$_POST['Numero'];
    $Correo=$_POST['Correo'];

                
    $consulta="UPDATE Proveedor SET NOMBRE_PROVEEDOR = '$Proveedor', DIRECCION_PROVEEDOR = '$Direccion', 
    NUMERO_TELEFONO_PROVEEDOR = $Numero, CORREO_ELECTRONICO_PROVEEDOR = '$Correo' WHERE ID_PROVEEDOR = $id";

    $resultado = oci_parse($conexion, $consulta); 
    oci_execute($resultado);

    header('Location: ../../views/usuarios/Proveedor.php');

    ?>