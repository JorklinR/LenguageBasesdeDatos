<?php

include 'conexion_be.php';

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$password = $_POST['password'];

$query = "INSERT INTO usuario(NOMBRE_EMPLEADO, CORREO, PASSWORD) 
    VALUES('$nombre', '$correo', '$password')";

//Repeticion de datos

$verificar_correo = oci_parse($conexion, "SELECT * FROM usuario WHERE CORREO = '$correo' ");

if(oci_num_rows($verificar_correo) > 0){
    echo '
        <script>
            alert("Este correo ya existe, intenta con otro correo");
            window.location = "../index.php";
        </script>
    ';
    exit();
}

$ejecutar = oci_parse($conexion, $query);
oci_execute($ejecutar);

if($ejecutar){
    echo 
    '
        <script>
            alert("Usuario registrado exitosamente");
            window.location = "../index.php";
        </script>
    ';
}else{
    echo 
    '
        <script>
            alert("Ha ocurrido un error, intentalo de nuevo");
            window.location = "../index.php";
        </script>
    ';
}

oci_close($conexion);
