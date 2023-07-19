<?php

$conexion = oci_connect("owen", "owen1234", "//localhost:1521/orcl"); /*Apartado cambiable segun la maquina de ejecucion*/
$consulta="SELECT * FROM USUARIO where correo = 'owenlda252@gmailcom' and password = 'prueba123'";
$resultado=oci_parse($conexion,$consulta);
oci_execute($resultado);

while ($row = oci_fetch_array($resultado, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>";
    echo "<td>".$row['NOMBRE_EMPLEADO']."</td>";
    echo "<td>".$row['CORREO']."</td>";
    echo "<td>".$row['PASSWORD']."</td>";
    echo "</tr>";
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../../css/login.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<form  action="validar.php" method="POST">
<div id="login" >
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center">Login</h3>
                            <div class="form-group">
                                <label for="username">Correo:</label><br>
                                <input type="text" name="correo" id="correo" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                             <br>
                                <input type="submit"class="btn btn-success btn-md space" value="ingresar">
                                <div id="register-link" class="text-right">
                                    <br>
                                <a href="registros.php"><input type="button"  class="btn btn-primary space" value="registrarse"></a>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>