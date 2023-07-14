<?php

session_start();

include 'conexion_be.php';

$correo = $_POST['correo'];
$password = $_POST['password'];
$password = hash('sha512', $password);

if (isset($_SESSION['rol'])) {
    switch ($_SESSION['rol']) {
        case 0:
            header("location: ../../Ferreteria/ferreteria.php");

            break;

        case 1:
            header("location: ../../FerreteriaAdmin/admin.php");

            break;

        default:
    }
}


$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' 
    AND password = '$password' ");

$row = $validar_login -> fetch_array(PDO::FETCH_NUM); 

if (mysqli_num_rows($validar_login) > 0) {
    $_SESSION['usuario'] = $correo;
    $rol = $row[5];
    $_SESSION['rol'] = $rol;
    
    switch ($_SESSION['rol']) {
        case 0:
            header("location: ../../Ferreteria/ferreteria.php");

            break;

        case 1:
            header("location: ../../FerreteriaAdmin/admin.php");

            break;

        default:
    }

    exit();
} else {
    echo
    '
            <script>
                alert("El usuario no existe, inténtelo de nuevo");
                window.location = "../index.php";
            </script>
        ';
    exit();
}

