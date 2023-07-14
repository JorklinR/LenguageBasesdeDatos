
<?php

    session_start();
    require_once "conexion.php";

    if (isset($_POST['add_to_cart'])) {
        if (isset($_SESSION['cart'])) {
           $session_array_id = array_column($_SESSION['cart'], "id_producto");
            if (!in_array($_GET['id_producto'], $session_array_id)) {
                $session_array = array(
                    "id_producto" => $_GET['id_producto'],
                    "descripcion" => $_POST['descripcion'],
                    "precio" => $_POST['precio'],
                    "quantity" => $_POST['quantity']
                 );
     
                 $_SESSION['cart'][] = $session_array;
            }


        }else {
            $session_array = array(
                "id_producto" => $_GET['id_producto'],
                "descripcion" => $_POST['descripcion'],
                "precio" => $_POST['precio'],
                "quantity" => $_POST['quantity']
             );

            $_SESSION['cart'][] = $session_array;
        }
    }


    if(!isset($_SESSION['usuario'])){
        echo
        '
            <script>
                alert("Debe iniciar sesion para ingresar a esta pagina");
                window.location = "../Login/index.php";
            </script>
        ';
        session_destroy();
        die();
    }
?>



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<title>Shopping Cart</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="cart.css">

</head>
<body>

<?php
    include("navBar.php");
?>



<div>
                        <h2 class="text-center" name="titulo">CARRITO DE COMPRAS</h2>


                        <?php
                            $total = 0;
                            
                            $output = "";
                            $output .= "
                            <table class='table table-bordered table-striped'>
                                <tr>
                                    
                                    <th>Nombre de articulo</th>
                                    <th>Precio de articulo</th>
                                    <th>Cantidad de articulos</th>
                                    <th>Precio Total</th>
                                    <th>Accion</th>
                                </tr>
                            ";

                            if (!empty($_SESSION['cart'])){

                                    foreach ($_SESSION['cart'] as $key => $value){

                                        $output .="
                                        <tr>
                                            
                                            <td>".$value['descripcion']."</td>
                                            <td>".$value['precio']."</td>
                                            <td>".$value['quantity']."</td>
                                            <td>".number_format($value['precio'] * $value['quantity'],2)."</td>
                                            <td>
                                                    <a href='cart.php?action=remove&id_producto=".$value['id_producto']."'>
                                                    <button class='btn btn-danger btn-block'>Eliminar</button>
                                                    </a>
                                            </td>
                                        </tr>    
                                        ";

                                       $total  = $total + $value['quantity'] * $value['precio'];

                                    }

                                                            

                                       


                                $output .="
                                <tr> 
                                    <td colspan='3'></td>
                                    <td></b>Monto total a Pagar</b></td>
                                    <td>".number_format($total,2)."                                   
                                    <form  id='borrar' action='../FerreteriaAdmin/acciones/procesarCompra.php?action=clearall' method='post'>
                                    <input type='hidden' name='descripcion' id='descripcion' value='". $value['descripcion'] ."'>
                                    <input type='hidden' name='precio' id='precio' value='". $value['precio'] ."'>
                                    <input type='hidden' name='quantity' id='quantity' value='". $value['quantity'] ."'>
                                    <input type='hidden' name='total' id='total' value='".$total."'>
                                    <button name='borrar' type='submit'  class='btn btn-success btn-block'>Pagar</button>
                                 
                                    </form>
                                    </td>
                                </tr>



                                ";

                                

                            }

                            


                        echo $output;
                        ?>

                 </div> 



                 <?php 


#Espacio para guardar las compras en la DB


if (isset($_POST['action'])) {
    if ($_POST['action'] == "clearall"){
        unset($_SESSION['cart']);    
    }

    if ($_GET['action'] == "remove"){
      foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['id_producto'] == $_GET['id_producto']) {
            unset($_SESSION['cart'][$key]);    
        }
      }    
    }



}

?>

</body>
</html>

