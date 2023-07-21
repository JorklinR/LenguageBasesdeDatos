<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>

<div id= "content">
        <section>
        <div class="container mt-5">
<div class="row">
<div class="col-sm-12 mb-3">
<center><h1>Productos</h1></center>
<a href="producto_agregar.php"><input  class="btn btn-primary" type="button" value="Agregar producto"></a>
</div>
<div class="col-sm-12">
<div class="table-responsive">


<table class="table table-striped table-hover">
<thead>

<tr>
<th>Codigo</th>
<th>Nombre</th>
<th>Tipo de producto</th>
<th>Serie del producto</th>
<th>Modelo</th>
<th>Marca</th>
<th>Cantidad</th>
<th>Imagen</th>
<th>Acciones</th>


</tr>

</thead>

<tbody>

<?php
$conexion = oci_connect("owen", "owen1234", "//localhost:1521/orcl");  /*Apartado cambiable segun la maquina de ejecucion*/
$consulta="SELECT * FROM PRODUCTO"; /*Se debe cambiar por SP */
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
 echo "<td>".$row['ID_PRODUCTO']."</td>";
 echo "<td>".$row['NOMBRE_PRODUCTO']."</td>";
 echo "<td>".$row['TIPO_PRODUCTO']."</td>";
 echo "<td>".$row['SERIE_PRODUCTO']."</td>";
 echo "<td>".$row['MODELO_PRODUCTO']."</td>";
 echo "<td>".$row['MARCA_PRODUCTO']."</td>";
 echo "<td>".$row['CANTIDAD_STOCK']."</td>";
}?>

<td><img width="100" src="data:image;base64,<?php echo base64_encode($row['imagen']);  ?>" ></td>

<td>
  <a href="producto_editar.php?id=<?php echo $row['ID_PRODUCTO']?>">
    <div">
      Editar
    </div>
  </a>
  <a>|</a>
  <a href="producto_eliminar.php?id=<?php echo $row['ID_PRODUCTO']?>">
    <div">
    Eliminar
    </div>
  </a>
</td>
</tr>

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

