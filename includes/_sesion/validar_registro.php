<?php

/**
 * Validacion de datos para poder iniciar sesion
 */
require_once ("../_db.php");
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$password=$_POST['password'];



$conexion = oci_connect("Jorklin", "Jork1616", "//localhost:1521/orcl");
$consulta = "INSERT INTO USUARIO (ID_EMPLEADO, NOMBRE_EMPLEADO, CORREO, PASSWORD)
VALUES (auto.nextval, '$nombre', '$correo','$password')";
$resultado=oci_parse($conexion,$consulta);
oci_execute($resultado);


if($resultado == true){
  
  header('location: ../../index.php');


}else{
    
    header('location: ../../index.php');
    session_destroy();
}
?>
  







