<!DOCTYPE html>
<html lang="es-MX">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>
<link rel="stylesheet" href="../../css/index.css">
<body>

<div class="container">
<div class="col-sm-6 offset-3 mt-5">
<form action="../../includes/_functions/_insert_producto.php" method="POST">

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="Codigo" class="form-label">Codigo *</label>
<input type="number"  id="Codigo" name="Codigo" class="form-control" required>
</div>
</div>

<?php
/** */
$consulta="SELECT * FROM PROVEEDOR";
$resultado=oci_parse($conexion,$consulta);
oci_execute($resultado);
?>
<div class="col-sm-6">
<div class="mb-3">
<label for="Proveedor" class="form-label">Proveedor *</label>
<select name="Proveedor" id="Proveedor" class="form-control" required>
<?php while ($row = oci_fetch_array($resultado, OCI_ASSOC+OCI_RETURN_NULLS)) {
 echo '<option value="'.$row['ID_PROVEEDOR'].'">'.$row['NOMBRE_PROVEEDOR'].'</option>';
}?>
  </select>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="Nombre" class="form-label">Nombre *</label>
<input type="text"  id="Nombre" name="Nombre" class="form-control" required>
</div>
</div>


<?php
$consulta="SELECT * FROM TIPO_PRODUCTO";
$resultado=oci_parse($conexion,$consulta);
oci_execute($resultado);
?>
<div class="col-sm-6">
<div class="mb-3">
<label for="Tipo" class="form-label">Tipo *</label>
<select name="Tipo" id="Tipo" class="form-control" required>
<?php while ($row = oci_fetch_array($resultado, OCI_ASSOC+OCI_RETURN_NULLS)) {
 echo '<option value="'.$row['ID_CATEGORIA'].'">'.$row['DESCRIPCION_CATEGORIA_TIPO_PRODUCTO'].'</option>';
}?>
  </select>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="serie" class="form-label">Número de serie *</label>
<input type="number"  id="serie" name="serie" class="form-control" required>
</div>
</div>

<div class="col-sm-6">

<div class="mb-3">
<label for="Modelo" class="form-label">Modelo *</label>
<input type="text"  id="Modelo" name="Modelo" class="form-control" required> 
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="Marca" class="form-label">Marca *</label>
<input type="text"  id="Marca" name="Marca" class="form-control" required>
</div>
</div>

<div class="col-sm-6">
<div class="mb-3">
<label for="Cantidad" class="form-label">Cantidad *</label>
<input type="number"  id="Cantidad" name="Cantidad" class="form-control" required>
</div>
</div>
</div>

<div class="mb-3">
<input type="hidden" name="accion" value="insertar_productos">
<button type="submit" name="accion" class="btn btn-success">Guardar</button>
</div>
</form>
</div>
</div>
</body>
<?php require '../../includes/_footer.php' ?>
</html>