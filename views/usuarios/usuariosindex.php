<?php
error_reporting(0);
session_start();
$actualsesion = $_SESSION['correo'];

if($actualsesion == null || $actualsesion == ''){

    echo 'acceso denegado';
    die();
}?>
<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>
<link rel="stylesheet" href="../../css/index.css">

<body>
  

        <section>
        <div class="container mt-5">
            <center><h1>Información de usuario actual</h1></center>
        <div class="row">
<div class="col-md-offset-1 col-md-10">


</div>
<div class="panel">
                <div class="panel-heading">
                    <div class="row">
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table">
                        <thead>

<tr>
<th>Código de empleado</th>
<th>Nombre</th>
<th>Correo</th>
<th>Contraseña</th>


</tr>

</thead>

<tbody>

<?php

$consulta="SELECT * FROM USUARIO where correo = '$actualsesion'";
$resultado=oci_parse($conexion,$consulta);
oci_execute($resultado);

while ($row = oci_fetch_array($resultado, OCI_ASSOC+OCI_RETURN_NULLS)) {
    echo "<tr>";
    echo "<td>".$row['ID_EMPLEADO']."</td>";
    echo "<td>".$row['NOMBRE_EMPLEADO']."</td>";
    echo "<td>".$row['CORREO']."</td>";
    echo "<td>".$row['PASSWORD_EMPLEADO']. "</td>";
    echo "</tr>";
}?>
</tbody>

</table>
</div>
</div>
</div>
</div>
        </section>


        <section>
            <div class= "container">
                <div class= "row">
                    <div class= "col-lg-9">
            </div>
        </section>
    </div>
    
    <?php require '../../includes/_footer.php' ?>
    </body>
</html>