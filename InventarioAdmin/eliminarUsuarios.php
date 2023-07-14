<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        echo
        '
            <script>
                alert("Debe iniciar sesion para ingresar a esta pagina");
                window.location = "../Login/index.php";
            </script>
        ';
        session_destroy();
        die();
    }
?>

<?php

    include('navBarAdmin.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editar.css">
    <title>Usuarios</title>
</head>
<body>
    <h1 id="titulo">Editar</h1>

    <form action="acciones/eliminarUsuario.php" method="post">
    <input type="text" name="id_usuario" value="<?= $_GET['id'] ?>" hidden>

<?php
$conexion = mysqli_connect("localhost", "root", "", "ferreteria_db");
// Consulta a la base de datos para obtener los productos
$sql = "SELECT * FROM usuarios where id_usuario = {$_GET['id']}";
$resultado = $conexion->query($sql);

// Mostramos cada producto en una tarjeta
if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        echo '<div>
        <label id="titulo2" for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" readonly onmousedown="return false;" placeholder="Digite el nombre completo" value="' . $row['nombre_completo'] . '">
    </div>
    
    <div>
        <label id="titulo2" for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" readonly onmousedown="return false;" placeholder="Digite el correo" value="' . $row["correo"] . '">
    </div>
    
    <div>
        <label id="titulo2" for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" readonly onmousedown="return false;" placeholder="Digite el usuario" value="' . $row['usuario'] . '">
    </div>

    <div>
        <label id="titulo2" for="rol">Rol:</label>
        <input type="number" name="rol" id="rol"  readonly onmousedown="return false;" placeholder="Digite el rol que posee" value="' . $row['rol_id'] . '">
    </div>
    
    <button id="boton" type="submit" onclick="return validaEliminacion();">Eliminar datos</button>';
    


    }
} else {
    echo 'No se encontraron usuarios';
}

$conexion->close();
?>


</form>
<script src="JS/validacionEliminacion.js"></script>

</body>
</html>


<?php

    include('footerAdmin.php');

?>