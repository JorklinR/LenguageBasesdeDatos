<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>
<link rel="stylesheet" href="../../css/index.css">


<section>
        <div class="container mt-5">
            <center><h1>Clientes</h1></center>
        <a href="producto_agregar.php"><input  id="agregar" class=" btn btn-primary" type="button" value="Agregar clientes"></a>
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
<th>Código del cliente</th>
<th>Nombre del cliente</th>
<th>Dirección del cliente</th>
<th>Número del cliente</th>
<th>Correo del cliente</th>
<th>Acciones</th>

</tr>

</thead>

<tbody>

<?php
$consulta="SELECT * FROM CLIENTE";
$resultado=oci_parse($conexion,$consulta);
oci_execute($resultado);

?>
<style>
      .problema{
        background-color: <?php echo $color?>;
        color: #000000;
    }
</style>
<!-- empieza la tabla-->
<?php while ($row = oci_fetch_array($resultado, OCI_ASSOC+OCI_RETURN_NULLS)) {
 echo "<tr>";
 echo "<td>".$row['ID_CLIENTE']."</td>";
 echo "<td>".$row['NOMBRE_CLIENTE']."</td>";
 echo "<td>".$row['DIRECCION_CLIENTE']."</td>";
 echo "<td>".$row['NUMERO_TELEFONO_CLIENTE']."</td>";
 echo "<td>".$row['CORREO_ELECTRONICO_CLIENTE']."</td>";
 echo "<td>";
 echo "<ul class='action-list'>";
 echo '<li><a href="producto_editar.php?id=' . $row['ID_PRODUCTO'] . '" <div>Editar</div></a></li>';
 echo '<li><a href="producto_eliminar.php?id=' . $row['ID_PRODUCTO'] . '" <div>Eliminar</div></a></li>'; 
 echo "</ul>"; 
 echo "</td>"; 
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
</html

