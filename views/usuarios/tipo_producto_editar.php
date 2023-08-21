<?php

$id = $_GET['id'];
require_once ("../../includes/_db.php");
$consulta = "SELECT * FROM TIPO_PRODUCTO WHERE ID_CATEGORIA = $id";
$resultado = oci_parse($conexion, $consulta);
oci_execute($resultado);
$productos = oci_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>
<link rel="stylesheet" href="../../css/index.css">
<body>

<div class="container">
<div class="col-sm-6 offset-3 mt-5">
<form action="../../includes/_functions/_update_tipo_producto.php" method="POST">

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="Codigo" class="form-label">Codigo *</label>
<input type="number"  id="Codigo" name="Codigo" value="<?php echo $productos ['ID_CATEGORIA']; ?>" class="form-control" readonly required>
</div>
</div>

<div class="col-sm-6">
<div class="mb-3">
<label for="Nombre" class="form-label">Nombre *</label>
<input type="text"  id="Nombre" name="Nombre" value="<?php echo $productos ['DESCRIPCION_CATEGORIA_TIPO_PRODUCTO']; ?>" class="form-control" required>
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