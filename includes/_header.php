<?php
error_reporting(0);
session_start();
$actualsesion = $_SESSION['correo'];

if($actualsesion == null || $actualsesion == ''){

    echo 'acceso denegado';
    die();
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Base de datos</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="stylesheet" href="../../css/index.css">
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
</head>
    
<div class="barra" id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-info sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="Dashboard.php">
    <div class="sidebar-brand-icon rotate-n-15">
    </div>
    <div class="sidebar-brand-text mx-3">Inventario</div>
</a>
<hr class="sidebar-divider my-0">
<li class="nav-item active">
    <a class="nav-link" href="Dashboard.php">
        <i class="material-icons-outlined"></i>
        <span>Dashboard</span></a>
</li>
<hr class="sidebar-divider">
<div class="sidebar-heading">
    ADMINISTRADOR
</div>

<li class="nav-item">
    <a class="nav-link collapsed" href="Productos.php">
    <span class="material-icons">pattern</span>
        <span>Productos</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="Usuarios.php">
    <span class="material-icons">pattern</span>
        <span>Usuarios</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="Proveedor.php">
    <span class="material-icons">pattern</span>
        <span>Proveedor</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="Clientes.php">
    <span class="material-icons">pattern</span>
        <span>Clientes</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="Movimientos.php">
    <span class="material-icons">pattern</span>
        <span>Movimientos</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="Historico.php">
    <span class="material-icons">pattern</span>
        <span>Historico movimientos</span>
    </a>
</li>
<hr class="sidebar-divider">
<div class="sidebar-heading">
    PERFIL
</div>
<li class="nav-item">
    <a class="nav-link collapsed" href="usuariosindex.php">
        <span class="material-icons">people</span>
        <span>Información usuario</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="../../includes/_sesion/cerrarSesion.php">
    <span class="material-icons">logout</span>
        <span>Salir</span></a>
        
</li>

<hr class="sidebar-divider d-none d-md-block">

<div class="text-center d-none d-md-inline">
</div>
</ul>
<!-- EMPIEZA EL NAVBAR -->
       <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
                <nav class="navbar navbar-expand navbar-dark bg-info topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-white-600 small"><?php echo $actualsesion?> </span>
                                <span class="material-icons">account_circle</span>
                            </a>
                        </li>
                    </ul>
                </nav>


