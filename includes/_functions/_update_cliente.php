<?php

require_once ("../_db.php");


    global $conexion;
    $id = $_POST['id']; 
    $Cliente=$_POST['Cliente'];
    $Direccion=$_POST['Direccion'];
    $Numero=$_POST['Numero'];
    $Correo=$_POST['Correo'];

    $consulta= "begin  ActualizarClientes($id,'$Cliente','$Direccion', $Numero,'$Correo'); End;";           

    $resultado = oci_parse($conexion, $consulta); 
    oci_execute($resultado);

    header('Location: ../../views/usuarios/Clientes.php');

    ?>