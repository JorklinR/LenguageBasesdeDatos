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
  
  <?php

  /**
   * Parte de registro de usuarios
   */
 if(isset ($_POST['registrar'])){
if (strlen($_POST['nombre']) >= 1 && strlen($_POST['correo']) >= 1 && strlen($_POST['password']) >= 1) {
$nombre = trim($_POST['nombre']);
      $correo = trim($_POST['correo']);
      $password = trim($_POST['password']);

      $consulta = "INSERT INTO USUARIO (ID_EMPLEADO, ID_TIPO_USUARIO, NOMBRE_EMPLEADO, CORREO, PASSWORD)
      VALUES (auto.nextval, 1,'$nombre', '$correo','$password')";

   $stid = oci_parse($conexion, $consulta);
   oci_execute($stid);
     oci_close($conexion);

 }
}
?>







