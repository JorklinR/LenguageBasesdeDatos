<?php

session_start();

if (!isset($_SESSION['usuario'])) {
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Ferreteria/ferreteria.css">
    <link rel="stylesheet" href="../../Ferreteria/navbar.css">
    <title>Administrador</title>
</head>

<body>

    <?php
    include("../../Ferreteria/navBar.php");
    ?>


    <!-- Inicio de Carrousel para muestro de ofertas -->
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../../Ferreteria/images/llaves.png" class="d-block w-100" style="height: 650px;" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../../Ferreteria/images/tornillos.png" class="d-block w-100" style="height: 650px;" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../../Ferreteria/images/alicates.png" class="d-block w-100" style="height: 650px;" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    </div>
    </div>
    </div>
    </nav>

    <h2 id='titulo'>Productos</h2>


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
                echo '<form method="post" action="cart.php?id_producto=<?=$row["id_producto"] ?>';
                echo '<img id="producto" src="' . $row['imagen'] . '" alt="Imagen del producto">';
                echo '<h2>' . $row["descripcion"] . '</h2>';
                echo '<p>Precio: $' . $row["precio"] . '</p>';
                echo '<input type="hidden" name="descripcion" value="<?= $row["descripcion"] ?>';
                echo '<input type="hidden" name="precio" value="<?= $row["precio"] ?>';
                echo '<input type="number" name="quantity" value="1" class="form-control" style="text-align:center;" id="">';
                echo '<input type="submit" name="add_to_cart" class="btn btn-warning btn-block my-2" value="Add To Cart" id="boton">';
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

<?php
include("../../Ferreteria/footer.php");
?>

</html>