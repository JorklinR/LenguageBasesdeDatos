<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>
<link rel="stylesheet" href="../../css/index.css">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Auditoria</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

</head>

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Auditoria</h1>

                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Auditoria Cliente</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                          
                                            $consulta = "begin AuditCliente(:p_RESULTADO, :p_CURSOR); End;";
                                            $resultado = oci_parse($conexion, $consulta);
                                            $cursor = oci_new_cursor($conexion);
                                            oci_bind_by_name($resultado, ':p_CURSOR', $cursor, -1, OCI_B_CURSOR);
                                            oci_bind_by_name($resultado, ':p_RESULTADO', $valor, 32);

                                            oci_execute($resultado);
                                            oci_execute($cursor);

                            
                                            oci_fetch($cursor);
                                            $contador = oci_result($cursor, 1);

                                            print($contador);
                                            ?>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                        <a href="Auditoria_Clientes.php"><input  class=" btn btn-primary" type="button" value="Ir"></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Auditoria movimientos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                          
                                            $consulta = "begin AuditMovimientos(:p_RESULTADO, :p_CURSOR); End;";
                                            $resultado = oci_parse($conexion, $consulta);
                                            $cursor = oci_new_cursor($conexion);
                                            oci_bind_by_name($resultado, ':p_CURSOR', $cursor, -1, OCI_B_CURSOR);
                                            oci_bind_by_name($resultado, ':p_RESULTADO', $valor, 32);

                                            oci_execute($resultado);
                                            oci_execute($cursor);

                            
                                            oci_fetch($cursor);
                                            $contador = oci_result($cursor, 1);

                                            print($contador);
                                            ?>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                        <a href="Auditoria_movimientos.php"><input  class=" btn btn-primary" type="button" value="Ir"></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                          <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Auditoria productos</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                          
                                            $consulta = "begin AuditProductos(:p_RESULTADO, :p_CURSOR); End;";
                                            $resultado = oci_parse($conexion, $consulta);
                                            $cursor = oci_new_cursor($conexion);
                                            oci_bind_by_name($resultado, ':p_CURSOR', $cursor, -1, OCI_B_CURSOR);
                                            oci_bind_by_name($resultado, ':p_RESULTADO', $valor, 32);

                                            oci_execute($resultado);
                                            oci_execute($cursor);

                            
                                            oci_fetch($cursor);
                                            $contador = oci_result($cursor, 1);

                                            print($contador);
                                            ?>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                        <a href="Auditoria_productos.php"><input  class=" btn btn-primary" type="button" value="Ir"></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Auditoria proveedores</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                          
                                            $consulta = "begin AuditProveedor(:p_RESULTADO, :p_CURSOR); End;";
                                            $resultado = oci_parse($conexion, $consulta);
                                            $cursor = oci_new_cursor($conexion);
                                            oci_bind_by_name($resultado, ':p_CURSOR', $cursor, -1, OCI_B_CURSOR);
                                            oci_bind_by_name($resultado, ':p_RESULTADO', $valor, 32);

                                            oci_execute($resultado);
                                            oci_execute($cursor);

                            
                                            oci_fetch($cursor);
                                            $contador = oci_result($cursor, 1);

                                            print($contador);
                                            ?>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                        <a href="Auditoria_proveedores.php"><input  class=" btn btn-primary" type="button" value="Ir"></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                                                <!-- Earnings (Monthly) Card Example -->
                                                <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Auditoria Tipos de producto</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                          
                                          $consulta = "begin AuditTipo(:p_RESULTADO, :p_CURSOR); End;";
                                          $resultado = oci_parse($conexion, $consulta);
                                          $cursor = oci_new_cursor($conexion);
                                          oci_bind_by_name($resultado, ':p_CURSOR', $cursor, -1, OCI_B_CURSOR);
                                          oci_bind_by_name($resultado, ':p_RESULTADO', $valor, 32);

                                          oci_execute($resultado);
                                          oci_execute($cursor);

                          
                                          oci_fetch($cursor);
                                          $contador = oci_result($cursor, 1);

                                          print($contador);
                                          ?>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                        <a href="Auditoria_tipo.php"><input  class=" btn btn-primary" type="button" value="Ir"></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Auditoria Usuarios</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                          
                                          $consulta = "begin AuditUsuario(:p_RESULTADO, :p_CURSOR); End;";
                                          $resultado = oci_parse($conexion, $consulta);
                                          $cursor = oci_new_cursor($conexion);
                                          oci_bind_by_name($resultado, ':p_CURSOR', $cursor, -1, OCI_B_CURSOR);
                                          oci_bind_by_name($resultado, ':p_RESULTADO', $valor, 32);

                                          oci_execute($resultado);
                                          oci_execute($cursor);

                          
                                          oci_fetch($cursor);
                                          $contador = oci_result($cursor, 1);

                                          print($contador);
                                          ?>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                        <a href="Auditoria_usuarios.php"><input  class=" btn btn-primary" type="button" value="Ir"></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>
<?php require '../../includes/_footer.php' ?>
</html>