<?php
$conexion = mysqli_connect("localhost", "root", "", "gafia");

    session_start();
    if(!isset($_SESSION['rol'])) {
            header('location: index.php');
    }else {
        if($_SESSION['rol'] != 1) {
            header('location: index.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" href="assets/css/styles-AdminPages.css">
    <link rel="stylesheet" href="assets/css/styles-AdminPages.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="icon" href="assets/images/logo.gif">
    <title>Administrador</title>
</head>
<body>
<main>
    <header>
        <a href="admin_index.php"><img src="assets/images/logo.gif" class="logo"></a>
        <nav class="nav-admin">
            <a href="index.php">Modo Usuario <i class="bi bi-person"></i></a>
            <a href="php/cerrar_sesion.php">Cerrar Sesión <i class="bi bi-box-arrow-left"></i></a>
        </nav>
    </header>

        <div class="contenedor">
            <div class="cards">
                <figure>
                    <img src="assets/images/icon_nuevaPubli.png" alt="">
                </figure>
                <div class="contenido">
                    <h1>Crear Articulo</h1>
                    <p>Crea una nueva publicación.</p>
                    <a href="crear_articulo.php">Ver Más</a>
                </div>
            </div>
            <div class="cards">
                <figure>
                    <img src="assets/images/icon_verPubli.png" alt="">
                </figure>
                <div class="contenido">
                    <h1>Publicaciones</h1>
                    <p>Ver todas las publicaciones.</p>
                    <a href="ver_articulos.php">Ver Más</a>
                </div>
            </div>
            <div class="cards">
                <figure>
                    <img src="assets/images/icon_borradorPubli.png" alt="">
                </figure>
                <div class="contenido">
                    <h1>Borradores</h1>
                    <p>Ver publicaciones en construcción.</p>
                    <a href="borradores.php">Ver Más</a>
                </div>
            </div>
            <div class="cards">
                <figure>
                    <img src="assets/images/icon_comentPubli.png" alt="">
                </figure>
                <div class="contenido">
                    <h1>Comentarios</h1>
                    <p>Administrar comentarios por publicación.</p>
                    <a href="php/ver_comentarios.php">Ver Más</a>
                </div>
            </div>
        </div>
</main>
<script src="assets/JS/sweetalert2.all.min.js"></script>
<script>
        Swal.fire({
            html: '<style> .title{font-size:15px; font-family:Arial;}</style> <span class="title "><b>!Bienvenido Administrador!<b></span>',
            background: '#871515',
            color: '#ffffff',
            width: 'auto',
            timer: 2000,
            grow: 'row',
            backdrop: false,
            showConfirmButton: false,
            toast: true,
            position:'bottom-end',
            
        });
</script>
</body>
</html>