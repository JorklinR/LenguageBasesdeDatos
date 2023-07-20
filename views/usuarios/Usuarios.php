<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>

<div id= "content">
        <section>
        <div class="container mt-5">
<div class="row">
<div class="col-sm-12 mb-3">
<center><h1>Usuarios</h1></center>
<a href="producto_agregar.php"><input  class="btn btn-primary" type="button" value="Agregar usuario"></a>
</div>
<div class="col-sm-12">
<div class="table-responsive">


<table class="table table-striped table-hover">
<thead>

<tr>
<th>Código de empleado</th>
<th>Nombre del empleado</th>
<th>Correo</th>

</tr>

</thead>

<tbody>

<?php
$consulta="SELECT * FROM USUARIO";
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
 echo "<td>".$row['ID_EMPLEADO']."</td>";
 echo "<td>".$row['NOMBRE_EMPLEADO']."</td>";
 echo "<td>".$row['CORREO']."</td>";
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

