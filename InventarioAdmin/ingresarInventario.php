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

    <form action="acciones/procesarProducto.php" method="post">


        <div>
        <label id="titulo2" for="descripcion">Descripcion:</label>
        <input type="text" name="desc" id="desc" placeholder="Digite la descripcion del producto">
    </div>
    
    <div>
        <label id="titulo2" for="precio">Precio:</label>
        <input type="text" name="precio" id="precio" placeholder="Digite el precio">
    </div>
    
    <div>
        <label id="titulo2" for="telefono">Imagen:</label>
        <input type="text" name="imagen" id="imagen" placeholder="Digite la url de la imagen">
    </div>
    
    <button id="boton" type="submit">Ingresar datos</button>
    


</form>


</body>
</html>


<?php

    include('footerAdmin.php');

?>