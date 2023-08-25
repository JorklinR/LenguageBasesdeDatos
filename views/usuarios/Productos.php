
<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>
<link rel="stylesheet" href="../../css/index.css">

        <section>
        <div class="container mt-5">
            <center><h1>Productos</h1></center>
        <a href="producto_agregar.php"><input  id="agregar" class=" btn btn-primary" type="button" value="Agregar producto"></a>
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
$consulta="SELECT * FROM VISTA_PRODUCTO_NM I 
JOIN PROVEEDOR P ON I.PROVEEDOR = P.ID_PROVEEDOR
JOIN TIPO_PRODUCTO TP ON I.TIPO_PRODUCTO = TP.ID_CATEGORIA";
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
 echo "<td>".$row['IDENTIFICADOR']."</td>";
 echo "<td>".$row['NOMBRE_PROVEEDOR']."</td>";
 echo "<td>".$row['NOMBRE']."</td>";
 echo "<td>".$row['DESCRIPCION_CATEGORIA_TIPO_PRODUCTO']."</td>";
 echo "<td>".$row['SERIE']."</td>";
 echo "<td>".$row['MODELO']."</td>";
 echo "<td>".$row['MARCA']."</td>";
 echo "<td>".$row['CANTIDAD']."</td>";
 echo "<td>";
 echo "<ul class='action-list'>";
 echo '<li><a href="producto_editar.php?id=' . $row['IDENTIFICADOR'] . '" <div>Editar</div></a></li>';
 echo '<li><a href="producto_eliminar.php?id=' . $row['IDENTIFICADOR'] . '" <div>Eliminar</div></a></li>'; 
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

