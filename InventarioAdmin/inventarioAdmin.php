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
    <title>Inventario</title>
</head>
<body>
    <h1 id="titulo">Inventario</h1>
    

    <div class="center">
    <a id='boton' class='btn btn-warning btn-block my-2' href=ingresarInventario.php>Añadir productos</a>
    </div>

    <div id="productos" class="productos-container">

<?php
$conexion = mysqli_connect("localhost", "root", "", "ferreteria_db");
// Consulta a la base de datos para obtener los productos
$sql = "SELECT * FROM productos";
$resultado = $conexion->query($sql);

// Mostramos cada producto en una tarjeta
if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
		echo '<div class="card">';
    echo '<img id="producto" src="' . $row['imagen'] . '" alt="Imagen del producto">';
		echo '<h2>' . $row["descripcion"] . '</h2>';
		echo '<p>Precio: $'. number_format($row["precio"], 2) . '</p>';
    echo '<input type="hidden" name="descripcion" value="<?= $row["descripcion"] ?>';
    echo '<input type="hidden" name="precio" value="<?= $row["precio"] ?>';
    echo '<form action="actualizarProducto.php" method="post">';
    echo "<a id='boton' class='btn btn-warning btn-block my-2' href=\"editarInventario.php?id={$row['id_producto']}\">Editar</a>";
    echo '</form>';
    echo '<form action="eliminarProducto.php" method="post">';
    echo "<a id='boton' class='btn btn-warning btn-block my-2' href=\"eliminarInventario.php?id={$row['id_producto']}\">Eliminar</a>";
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