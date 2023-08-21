<?php

$id = $_GET['id'];
require_once ("../../includes/_db.php");
$consulta = "SELECT * FROM Cliente WHERE ID_CLIENTE = $id";
$resultado = oci_parse($conexion, $consulta);
oci_execute($resultado);
$cliente = oci_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>
<link rel="stylesheet" href="../../css/index.css">
<body>

<div class="container">
<div class="col-sm-6 offset-3 mt-5">
<form action="../../includes/_functions/_update_cliente.php" method="POST">

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="Codigo" class="form-label">Codigo *</label>
<input type="number"  id="Codigo" name="Codigo" value="<?php echo $cliente ['ID_CLIENTE']; ?>" class="form-control" readonly required>
</div>
</div>

<div class="col-sm-6">
<div class="mb-3">
<label for="Cliente" class="form-label">Cliente *</label>
<input type="Text"  id="Cliente" name="Cliente" value="<?php echo $cliente ['NOMBRE_CLIENTE']; ?>" class="form-control"  required>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="Direccion" class="form-label">Direccion *</label>
<input type="text"  id="Direccion" name="Direccion" value="<?php echo $cliente ['DIRECCION_CLIENTE']; ?>" class="form-control" required>
</div>
</div>

<div class="col-sm-6">
<div class="mb-3">
<label for="Numero" class="form-label">Numero *</label>
<input type="number"  id="Numero" name="Numero" value="<?php echo $cliente ['NUMERO_TELEFONO_CLIENTE']; ?>" class="form-control" required>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="Correo" class="form-label">Correo *</label>
<input type="text"  id="Correo" name="Correo" value="<?php echo $cliente ['CORREO_ELECTRONICO_CLIENTE']; ?>" class="form-control" required>
</div>
</div>
</div>

<div class="mb-3">
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
<button type="submit" class="btn btn-success">Guardar</button>
</div>
</form>
</div>
</div>
</body>
<?php require '../../includes/_footer.php' ?>
</html>