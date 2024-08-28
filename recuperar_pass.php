<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/styles-recuperar.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="assets/images/logo.gif">
        <title>Restablecer Contraseña</title>
<body>
    <div class="pof">
        <h1>Recuperar Contraseña</h1>
        <p>Actualice su contraseña</p>
        <form class="form1" action="php/cambiar_pass.php"  method="POST">
            <input type="password" name="password1" class="btn1" placeholder="Nueva Contraseña" required/><br>
            <input type="password" name="password2" class ="btn1" placeholder="Repite la Contraseña" required/>
            <div class="b">
                <button type="submit" class="boton" name="env" >Cambiar Contraseña</button></div>
        </form>
        <div class="footer">
            <p>Ya tengo cuenta.</p>
        </div>
            <a href="login.php">Iniciar sesión </a></a>
        </div>
    </head>

    
</body>
</html>