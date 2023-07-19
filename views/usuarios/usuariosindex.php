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

<body>
  
<div id= "content">
        <section>
        <div class="container mt-5">
<div class="row">
<div class="col-sm-12 mb-3">
<center><h1>Información de sesion actual</h1></center>
</div>
<div class="col-sm-12">
<div class="table-responsive">


<table class="table table-striped table-hover">
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
    echo "<td>".$row['PASSWORD']."</td>";
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