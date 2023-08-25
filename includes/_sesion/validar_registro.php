<?php

/**
 * Validacion de datos para poder iniciar sesion
 */
require_once ("../_db.php");
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$password=$_POST['password'];


$consulta= "begin  p_insert_usuario('$nombre', '$correo','$password'); End;"; 
$resultado=oci_parse($conexion,$consulta);
oci_execute($resultado);


if($resultado == true){
  
  header('location: ../../index.php');


}else{
    
    header('location: ../../index.php');
    session_destroy();
}
?>
  







