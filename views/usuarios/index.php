
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
<th>Codigo producto</th>
<th>Proveedor</th>
<th>Nombre de producto</th>
<th>Tipo de producto</th>
<th>Serie del producto</th>
<th>Modelo</th>
<th>Marca</th>
<th>Cantidad</th>
<th>Acciones</th>


</tr>

</thead>

<tbody>

<?php
$conexion = oci_connect("Jorklin", "Jork1616", "//localhost:1521/orcl"); 
$consulta="SELECT * FROM PRODUCTO";
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
 echo "<td>".$row['ID_PROVEEDOR']."</td>";
 echo "<td>".$row['NOMBRE_PRODUCTO']."</td>";
 echo "<td>".$row['TIPO_PRODUCTO']."</td>";
 echo "<td>".$row['SERIE_PRODUCTO']."</td>";
 echo "<td>".$row['MODELO_PRODUCTO']."</td>";
 echo "<td>".$row['MARCA_PRODUCTO']."</td>";
 echo "<td>".$row['CANTIDAD_STOCK']."</td>";
 echo "<td>";
   echo '<a href="producto_editar.php?id=' . $row['ID_PRODUCTO'] . '">';
  echo "<div>Editar</div>";
   echo "</a>";
 echo '<a href="producto_eliminar.php?id=' . $row['ID_PRODUCTO']. '">'; 
 echo "<div>Eliminar</div>"; 
 echo "</a>"; 
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

