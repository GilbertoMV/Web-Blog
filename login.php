<?php
   session_start();

   if(isset($_GET['cerrar_sesion'])) {
       session_unset();

       session_destroy();
   }
   if(isset($_SESSION['rol'])) {
       switch ($_SESSION['rol']) {
           case '1':
                    header('location: index.php');
                break;
           case '2':
                    header('location: index.php');
                break;
       }
   }
?> 
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/images/logo.gif">
    <title>INICIO DE SESIÓN</title>
    <link href="assets/css/styles-login.css" rel="stylesheet" type="text/css">
</head>
<body>
    <main>

        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>¡Inicia sesión para disfrutar!</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Regístrarse</button>
                </div>
            </div>

            <!--Formulario de Login y registro-->
            <div class="contenedor__login-register">
                <!--Login-->
                <form action="./php/login_users.php" method="POST" class="formulario__login">
                    <h2>Iniciar Sesión</h2>
                    <input type="email" placeholder="Correo Electrónico" name="email" required>
                    <input type="password" placeholder="Contraseña" name="password" required>
                    <button>Entrar</button><br><br>
                    <a href="olvido_pass.php">¿Olvidaste la contraseña?</a><br>
                </form>

                <!--Register-->
                <form action="./php/registro_user.php" method="POST" class="formulario__register">
                    <h2>¡Regístrate!</h2>
                    <input type="text" placeholder="Nombre completo" name="name" required>
                    <input type="email" placeholder="Correo Electrónico" name="email" required>
                    <!--<input type="text" placeholder="Nombre de usuario" name="users" required>-->
                    <input type="password" placeholder="Contraseña" name="password" required>
                    <button>Registrarse</button>
                    
                </form>

                
            </div>
        </div>

    </main>
    <script src="assets/JS/sweetalert2.all.min.js"></script>
    <script src="assets/JS/scrip-login.js"></script>
</body>
</html>