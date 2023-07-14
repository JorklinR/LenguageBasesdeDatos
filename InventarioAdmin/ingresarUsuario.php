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

    <form action="acciones/procesarUsuario.php" method="post">


    <div>
        <label id="titulo2" for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" placeholder="Digite el nombre completo">
    </div>
    
    <div>
        <label id="titulo2" for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" placeholder="Digite el correo">
    </div>
    
    <div>
        <label id="titulo2" for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" placeholder="Digite el usuario">
    </div>

    <div>
        <label id="titulo2" for="rol">Rol:</label>
        <input type="number" name="rol" id="rol" placeholder="Digite el rol que posee">
    </div>
    
    <button id="boton" type="submit">Ingresar usuario</button>


</form>


</body>
</html>


<?php

    include('footerAdmin.php');

?>