<?php

require_once ("../_db.php");


    global $conexion;
    $id = $_POST['id']; 
    $Cliente=$_POST['Cliente'];
    $Direccion=$_POST['Direccion'];
    $Numero=$_POST['Numero'];
    $Correo=$_POST['Correo'];

                
    $consulta="UPDATE Cliente SET NOMBRE_CLIENTE = '$Cliente', DIRECCION_CLIENTE = '$Direccion', 
    NUMERO_TELEFONO_CLIENTE = $Numero, CORREO_ELECTRONICO_CLIENTE = '$Correo' WHERE ID_CLIENTE = $id";

    $resultado = oci_parse($conexion, $consulta); 
    oci_execute($resultado);

    header('Location: ../../views/usuarios/Clientes.php');

    ?>