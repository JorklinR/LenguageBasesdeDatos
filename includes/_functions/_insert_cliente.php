<?php

require_once ("../_db.php");

    global $conexion;   
    $Codigo=$_POST['Codigo'];
    $Cliente=$_POST['Cliente'];
    $Direccion=$_POST['Direccion'];
    $Numero=$_POST['Numero'];
    $Correo=$_POST['Correo'];

    $consulta= "begin  InsertarCliente(Autocliente.nextval, '$Cliente', '$Direccion', $Numero, '$Correo'); End;";

    $stid = oci_parse($conexion, $consulta);
    oci_execute($stid);

    header('Location: ../../views/usuarios/Clientes.php');
?>