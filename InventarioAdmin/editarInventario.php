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
    <title>Inventario</title>
</head>
<body>
    <h1 id="titulo">Editar</h1>

    <form action="acciones/actualizarProducto.php" method="post">
    <input type="text" name="id" value="<?= $_GET['id'] ?>" hidden>

<?php
$conexion = mysqli_connect("localhost", "root", "", "ferreteria_db");
// Consulta a la base de datos para obtener los productos
$sql = "SELECT * FROM productos where id_producto = {$_GET['id']}";
$resultado = $conexion->query($sql);

// Mostramos cada producto en una tarjeta
if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        echo '<div>
        <label id="titulo2" for="descripcion">Descripcion:</label>
        <input type="text" name="desc" id="desc" placeholder="Digite la descripcion del producto" value="' . $row['descripcion'] . '">
    </div>
    
    <div>
        <label id="titulo2" for="precio">Precio:</label>
        <input type="text" name="precio" id="precio" placeholder="Digite el precio" value="' . $row["precio"] . '">
    </div>
    
    <div>
        <label id="titulo2" for="telefono">Imagen:</label>
        <input type="text" name="imagen" id="imagen" placeholder="Digite la url de la imagen" value="' . $row['imagen'] . '">
    </div>
    
    <button id="boton" type="submit">Actualizar datos</button>';
    


    }
} else {
    echo 'No se encontraron productos';
}

$conexion->close();
?>


</form>


</body>
</html>


<?php

    include('footerAdmin.php');

?>