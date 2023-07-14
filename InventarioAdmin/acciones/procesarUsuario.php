<?php
require_once '../../include/obtieneRequests.php';

$nombre = recogePost("nombre");
$correo = recogePost("correo");
$usuario = recogePost("usuario");
$rol = recogePost("rol");

$nombreOK = false;
$correoOK = false;
$usuarioOK = false;
$rolOK = false;

if ($nombre == ""){
   echo "<p>No se digito la descripcion del producto</p> <br>";
   echo "\n";
}else {
   $nombreOK = true;
}

$correoOK = true;
$usuarioOK = true;
$rolOK = true;

if($nombreOK && $correoOK && $usuarioOK && $rolOK){
     require_once '../../DAL/ingresa-usuario.php';
     if (IngresarUsuario($nombre, $correo, $usuario, $rol)){
        header("Location: ../usuariosAdmin.php");
     }
}


?>