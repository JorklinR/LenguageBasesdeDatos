<?php
require_once '../../include/obtieneRequests.php';

$nombre = recogePost("nombre");
$correo = recogePost("correo");
$usuario = recogePost("usuario");
$rol = recogePost("rol");

$nombreOK = true;
$correoOK = true;
$usuarioOK = true;
$rolOK = true;

if($nombreOK && $correoOK && $usuarioOK && $rolOK){
     require_once '../../DAL/elimina-usuario.php';
     if (EliminarUsuario($nombre, $correo, $usuario, $rol)){
        header("Location: ../usuariosAdmin.php");
     }
}


?>