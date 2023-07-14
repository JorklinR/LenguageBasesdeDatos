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
    <link rel="stylesheet" href="inventario.css">
    <title>Usuarios</title>
</head>
<body>
    <h1 id="titulo">Usuarios</h1>

    <div class="center">
    <a id='boton' class='btn btn-warning btn-block my-2' href=ingresarUsuario.php>Añadir usuario</a>
    </div>

    <div id="productos" class="productos-container">

<?php
$conexion = mysqli_connect("localhost", "root", "", "ferreteria_db");
// Consulta a la base de datos para obtener los productos
$sql = "SELECT * FROM usuarios";
$resultado = $conexion->query($sql);

// Mostramos cada producto en una tarjeta
if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
		echo '<div class="card">';
    echo '<img id="producto" src="../Ferreteria/images/usuario.png" alt="Imagen del producto">';
		echo '<h2>' . $row["nombre_completo"] . '</h2>';
		echo '<p>Correo: ' . $row["correo"] . '</p>';
        echo '<p>Usuario: ' . $row["usuario"] . '</p>';
        echo '<p>Permisos: ' . $row["rol_id"] . '</p>';
        echo '<form action="actualizarUsuario.php" method="post">';
        echo "<a id='boton' class='btn btn-warning btn-block my-2' href=\"editarUsuario.php?id={$row['id_usuario']}\">Editar</a>";
		echo '</form>';
        echo '<form action="eliminarUsuario.php" method="post">';
        echo "<a id='boton' class='btn btn-warning btn-block my-2' href=\"eliminarUsuarios.php?id={$row['id_usuario']}\">Eliminar</a>";
        echo '</form>';
        echo '</div>';
    }
} else {
    echo 'No se encontraron productos';
}

$conexion->close();
?>
</div>
</body>
</html>


<?php

    include('footerAdmin.php');

?>