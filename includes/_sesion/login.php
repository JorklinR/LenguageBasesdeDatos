


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio sesion</title>
        <link
            href="https://fonts.googleapis.com/css2?family=Noto+Sans+Mono:wght@100&family=Open+Sans:wght@400;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet">
            <link rel="stylesheet" href="../../css/login.css">

    </head>
    <body>
        <main>

            <div class="container_all">
                <div class="box1">
                    <div class="box1-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para ingresar a la página</p>
                        <button id="btn_login">Iniciar Sesión</button>
                    </div>
                    <div class="box1-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn_register">Registrarse</button>
                    </div>
                </div>

                <!-- Formulario  -->
                <div class="container_login-register">

                    <!-- Login -->
                    <form action="validar_login.php" class="formulario_login" method="POST">
                        <h2>Iniciar Sesión</h2>
                        <input type="email" placeholder="Correo Electronico" name="correo">
                        <input type="password" placeholder="Contraseña" name="password">
                        <button>Ingresar</button>
                    </form>

                    <!-- Register -->
                    <form action="validar_registro.php" class="formulario_register" method="POST">
                        <h2>Regístrate</h2>
                        <input type="text" placeholder="Nombre Completo" name="nombre">
                        <input type="email" placeholder="Correo Electronico" name="correo">
                        <input type="password" placeholder="Contraseña" name="password">
                        <button>Registrarse</button>
                    </form>
                </div>
            </div>
        </main>
        <script src="login.js"></script>
    </body>
</html>