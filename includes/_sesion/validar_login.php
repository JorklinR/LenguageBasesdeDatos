<?php

/**
 * Validacion de datos para poder iniciar sesion
 */
require_once ("../_db.php");
$correo=$_POST['correo'];
$password=$_POST['password'];
session_start();
$_SESSION['correo']=$correo;


$conexion = oci_connect("Jorklin", "Jork1616", "//localhost:1521/orcl");
$consulta="SELECT * FROM USUARIO where CORREO ='$correo' and password='$password'";
$resultado=oci_parse($conexion,$consulta);
oci_execute($resultado);


if($resultado == true){
  
    header('Location: ../../views/usuarios/index.php');


}else{
    
    header('location: ../../index.php');
    session_destroy();
}
?>








