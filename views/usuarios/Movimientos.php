<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>
<link rel="stylesheet" href="../../css/index.css">


      <section>
        <div class="container mt-5">
            <center><h1>Movimientos</h1></center>
        <a href="producto_agregar.php"><input  id="agregar" class=" btn btn-primary" type="button" value="Agregar movimiento"></a>
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

