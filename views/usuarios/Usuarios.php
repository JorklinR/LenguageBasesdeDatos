<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>
<link rel="stylesheet" href="../../css/index.css">


        <section>
        <div class="container mt-5">
            <center><h1>Usuarios</h1></center>
        <a href="usuario_agregar.php"><input  id="agregar" class=" btn btn-primary" type="button" value="Agregar usuario"></a>
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
<th>Nombre del empleado</th>
<th>Correo</th>
<th>Acciones</th>

</tr>

</thead>

<tbody>

<?php
$consulta="SELECT * FROM VISTA_USUARIOS_NM";
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
 echo "<td>".$row['NOMBRE_COMPLETO']."</td>";
 echo "<td>".$row['CORREO_ELECTRONICO']."</td>";
 echo "<td>";
 echo "<ul class='action-list'>";
 echo '<li><a href="usuario_editar.php?id=' . $row['IDENTIFICADOR'] . '" <div>Editar</div></a></li>';
 echo '<li><a href="usuario_eliminar.php?id=' . $row['IDENTIFICADOR'] . '" <div>Eliminar</div></a></li>'; 
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

