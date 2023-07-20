<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>

<div id= "content">
        <section>
        <div class="container mt-5">
<div class="row">
<div class="col-sm-12 mb-3">
<center><h1>Movimientos</h1></center>
<a href="producto_agregar.php"><input  class="btn btn-primary" type="button" value="Agregar movimiento"></a>
</div>
<div class="col-sm-12">
<div class="table-responsive">


<table class="table table-striped table-hover">
<thead>

<tr>
<th>Código de movimiento</th>
<th>Tipo de movimiento</th>
<th>Número de orden</th>
<th>Cliente</th>
<th>Fecha de movimiento</th>
<th>Producto</th>
<th>Cantidad</th>
<th>Empleado</th>

</tr>

</thead>

<tbody>

<?php
$consulta="SELECT * FROM MOVIMIENTO_INVENTARIO";
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
 echo "<td>".$row['ID_MOVIMIENTO']."</td>";
 echo "<td>".$row['ID_MOVIMIENTO']."</td>";
 echo "<td>".$row['NUM_ORDEN']."</td>";
 echo "<td>".$row['ID_CLIENTE']."</td>";
 echo "<td>".$row['FECHA_MOVIMIENTO']."</td>";
 echo "<td>".$row['ID_PRODUCTO']."</td>";
 echo "<td>".$row['CANTIDAD_MOVIMIENTO']."</td>";
 echo "<td>".$row['ID_EMPLEADO']."</td>";
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

