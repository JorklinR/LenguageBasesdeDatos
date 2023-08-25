<!DOCTYPE html>
<html lang="es-MX">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>
<link rel="stylesheet" href="../../css/index.css">
<body>

<div class="container">
<div class="col-sm-6 offset-3 mt-5">
<form action="../../includes/_functions/_insert_movimiento.php" method="POST">

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="Codigo" class="form-label">Codigo *</label>
<input type="number"  id="Codigo" name="Codigo" class="form-control" readonly>
</div>
</div>

<?php
/** */
$consulta="SELECT * FROM TIPOS_MOVIMIENTOS";
$resultado=oci_parse($conexion,$consulta);
oci_execute($resultado);
?>

<div class="col-sm-6">
<div class="mb-3">
<label for="Tipo" class="form-label">Tipo de movimiento *</label>
<select name="Tipo" id="Tipo" class="form-control" required>
<?php while ($row = oci_fetch_array($resultado, OCI_ASSOC+OCI_RETURN_NULLS)) {
 echo '<option value="'.$row['ID_TIPO_MOVIMIENTO'].'">'.$row['CATEGORIA'].'</option>';}?>
</select>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="orden" class="form-label">Numero de orden *</label>
<input type="number"  id="orden" name="orden" class="form-control" readonly>
</div>
</div>

<?php
/** */
$consulta="SELECT * FROM CLIENTE";
$resultado=oci_parse($conexion,$consulta);
oci_execute($resultado);
?>

<div class="col-sm-6">
<div class="mb-3">
<label for="Cliente" class="form-label">Cliente *</label>
<select name="Cliente" id="Cliente" class="form-control" required>
<?php while ($row = oci_fetch_array($resultado, OCI_ASSOC+OCI_RETURN_NULLS)) {
 echo '<option value="'.$row['ID_CLIENTE'].'">'.$row['NOMBRE_CLIENTE'].'</option>';}?>
</select>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="fecha" class="form-label">Fecha de movimiento *</label>
<input type="date"  id="fecha" name="fecha" class="form-control" required>
</div>
</div>

<?php
/** */
$consulta="SELECT * FROM PRODUCTO";
$resultado=oci_parse($conexion,$consulta);
oci_execute($resultado);
?>

<div class="col-sm-6">
<div class="mb-3">
<label for="producto" class="form-label">Producto *</label>
<select name="producto" id="producto" class="form-control" required>
<?php while ($row = oci_fetch_array($resultado, OCI_ASSOC+OCI_RETURN_NULLS)) {
 echo '<option value="'.$row['ID_PRODUCTO'].'">'.$row['NOMBRE_PRODUCTO'].'</option>';}?>
</select>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="Cantidad" class="form-label">Cantidad *</label>
<input type="number"  id="Cantidad" name="Cantidad" class="form-control" required>
</div>
</div>

<?php
/** */
$consulta="SELECT * FROM USUARIO";
$resultado=oci_parse($conexion,$consulta);
oci_execute($resultado);
?>

<div class="col-sm-6">
<div class="mb-3">
<label for="Empleado" class="form-label">Empleado *</label>
<select name="Empleado" id="Empleado" class="form-control" required>
<?php while ($row = oci_fetch_array($resultado, OCI_ASSOC+OCI_RETURN_NULLS)) {
 echo '<option value="'.$row['ID_EMPLEADO'].'">'.$row['NOMBRE_EMPLEADO'].'</option>';}?>
</select>
</div>
</div>
</div>

<div class="mb-3">
<input type="hidden" name="accion" value="insertar_movimiento">
<button type="submit" name="accion" class="btn btn-success">Guardar</button>
</div>
</form>
</div>
</div>
</body>
<?php require '../../includes/_footer.php' ?>
</html>