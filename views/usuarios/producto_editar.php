<?php

$id = $_GET['id'];
require_once ("../../includes/_db.php");
$consulta = "SELECT * FROM producto WHERE ID_PRODUCTO = $id";
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
<form action="../../includes/_functions/_update_producto.php" method="POST">

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="Codigo" class="form-label">Codigo *</label>
<input type="number"  id="Codigo" name="Codigo" value="<?php echo $productos ['ID_PRODUCTO']; ?>" class="form-control" readonly required>
</div>
</div>

<div class="col-sm-6">
<div class="mb-3">
<label for="Proveedor" class="form-label">Proveedor *</label>
<input type="number"  id="Proveedor" name="Proveedor" value="<?php echo $productos ['ID_PROVEEDOR']; ?>" class="form-control" readonly required>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="Nombre" class="form-label">Nombre *</label>
<input type="text"  id="Nombre" name="Nombre" value="<?php echo $productos ['NOMBRE_PRODUCTO']; ?>" class="form-control" required>
</div>
</div>

<div class="col-sm-6">
<div class="mb-3">
<label for="Tipo" class="form-label">Tipo *</label>
<input type="number"  id="Tipo" name="Tipo" value="<?php echo $productos ['TIPO_PRODUCTO']; ?>" class="form-control" readonly required>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="serie" class="form-label">Número de serie *</label>
<input type="number"  id="serie" name="serie" value="<?php echo $productos ['SERIE_PRODUCTO']; ?>" class="form-control" required>
</div>
</div>

<div class="col-sm-6">

<div class="mb-3">
<label for="Modelo" class="form-label">Modelo *</label>
<input type="text"  id="Modelo" name="Modelo" value="<?php echo $productos ['MODELO_PRODUCTO']; ?>" class="form-control" required> 
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="Marca" class="form-label">Marca *</label>
<input type="text"  id="Marca" name="Marca" value="<?php echo $productos ['MARCA_PRODUCTO']; ?>" class="form-control" required>
</div>
</div>

<div class="col-sm-6">
<div class="mb-3">
<label for="Cantidad" class="form-label">Cantidad *</label>
<input type="number"  id="Cantidad" name="Cantidad" value="<?php echo $productos ['CANTIDAD_STOCK']; ?>" class="form-control" required>
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