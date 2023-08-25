<!DOCTYPE html>
<html lang="es-MX">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>
<link rel="stylesheet" href="../../css/index.css">
<body>

<div class="container">
<div class="col-sm-6 offset-3 mt-5">
<form action="../../includes/_functions/_insert_tipo_producto.php" method="POST">

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="Codigo" class="form-label">Codigo *</label>
<input type="number"  id="Codigo" name="Codigo" class="form-control" readonly>
</div>
</div>

<div class="col-sm-6">
<div class="mb-3">
<label for="Descripcion" class="form-label">Descripcion *</label>
<input type="text"  id="Descripcion" name="Descripcion" class="form-control" required>
</div>
</div>
</div>

<div class="mb-3">
<input type="hidden" name="accion" value="insertar_tipo_producto">
<button type="submit" name="accion" class="btn btn-success">Guardar</button>
</div>
</form>
</div>
</div>
</body>
<?php require '../../includes/_footer.php' ?>
</html>