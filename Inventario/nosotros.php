<?php

    session_start();

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

<?php

    include('navBar.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="nosotros.css">
    <title>Sobre nosotros</title>
</head>
<body>
    <h1 id="titulo">Sobre nosotros</h1>
    
    <section>
    <!-- Contenido principal de la página "Acerca de nosotros" -->
    <h2>Nuestra Empresa</h2>

    <div class="center">
    <p>En Nuestra Ferretería, encontrarás una amplia variedad de herramientas y suministros para cualquier tipo de proyecto, </p>
    <p>  desde proyectos de construcción y remodelación, hasta reparaciones en el hogar y mejoras del jardín. Nuestro inventario incluye todo, </p>
    <p>  desde herramientas eléctricas y manuales, productos de plomería y electricidad, materiales de construcción como madera, cemento y yeso, </p>
    <p>  hasta productos de pintura, ferretería de seguridad, productos de jardinería y mucho más.</p>
    

    <h2>Nuestro Equipo</h2>
    <p>Nuestros empleados son expertos en la industria de la ferretería y tienen una amplia experiencia en herramientas, </p>
    <p>  materiales de construcción y suministros para el hogar. Están constantemente actualizados con las últimas tendencias </p>
    <p> y novedades en el mercado, lo que nos permite ofrecer un servicio de asesoramiento técnico confiable y actualizado.</p>
    

    <h2>Nuestra Experiencia</h2>
    <p>Nuestra experiencia se basa en un profundo conocimiento de la industria de la ferretería, respaldado por </p>
    <p> relaciones sólidas con los principales fabricantes y proveedores en el mercado. Nos aseguramos de que </p>
    <p> todos los productos que ofrecemos en nuestras estanterías sean de marcas reconocidas y de confianza, garantizando </p>
    <p> así su calidad y durabilidad.
    
</div>
  </section>
</body>
</html>


<?php

    include('footer.php');

?>