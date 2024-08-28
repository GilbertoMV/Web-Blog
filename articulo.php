<?php
$conexion = mysqli_connect("localhost", "root", "", "gafia");

session_start();
error_reporting(E_ERROR);
$id_user = $_SESSION['rol'];
$max ="10";
//Publicaciones
$id = $_GET['id'];
$m="SELECT * FROM publicaciones WHERE id='$id'";
$mostrar = $conexion->query($m); 
$dato = $mostrar->fetch_array();
$query ="SELECT * FROM comentarios WHERE id_publicaciones='$id' ORDER BY fecha DESC";
$resultado=$conexion->query($query);
//Comentarios
if(isset($_POST['comentar'])){
    if($_SESSION['rol'] == null) {
        header('location: login.php');
    }else {
    if($_SESSION['rol'] == true ) {
        //Usuario
        $iduser=$_SESSION['id'];
        $sql= "SELECT * FROM users WHERE id='$iduser'";
        $id_resul=$conexion->query($sql);
        $row2=$id_resul->fetch_assoc(); 

        date_default_timezone_set('UTC');
        date_default_timezone_set("America/Mexico_City");
        $fecha = date("Y-m-d H:i:s");
        $id_p = $dato['id'];
        $name = $row2['name'];
        $comentario = strip_tags($_POST['comentario']);
        $query = "INSERT INTO comentarios(comentario, id_publicaciones , usuario, fecha) VALUES ('$comentario', '$id_p','$name','$fecha')";
        $result = mysqli_query($conexion, $query);
        header("location: articulo.php?id=$id_p");

    }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets\css\styles-pub.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="icon" href="assets/images/logo.gif">
    <title>Gafia Blog</title>
</head>
<body>
    <header id="header">
            <a href="index.php"><img src="assets/images/logo.gif" class="logo"></a>
            <nav class="nav-index">
                <?php
                if($id_user == '1') {
                    echo '<a href="admin_index.php">Administrador <i class="bi bi-person"></i></a>';
                }else {
                    echo '<a href="index.php">Inicio</a>';
                }
                ?>
                <?php 
                    if(isset($id_user)) {
                        echo '<a href="php/cerrar_sesion.php">Cerrar Sesión <i class="bi bi-box-arrow-left"></i></a>';
                    }else {
                        echo '<a href="login.php">Iniciar Sesión</a>';
                    }
                ?>
            </nav>
        </header>
        <main>
            <div class="row">
                <div class="container-portada">
                    <div class="capa-gradient">
                        <img src="data:image/png;base64,<?php echo base64_encode($dato['imagen']); ?>"></img>
                    </div>
                <div class="titulo">  
                    <h1><?php echo $dato['titulo'];?></h1>
                </div>
                <span class="subcontenido">
                    <p><?php echo $dato['autor'];?> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                </svg> (<?php $fecha = substr($dato['fecha'],0,$max).""; echo $fecha?>)</p>
                </span>

                <div class="contenido">
                    <p><?php echo $dato['contenido'];?></p>
                </div>
                <?php 
                if($_SESSION['rol'] == true) {
                    echo '<div class="comentarios">
                    <form action="" method="post">
                            <input type="text" name="comentario"id="comentario" placeholder="Escribe tu comentario..." maxlength="120" required>
                            <button type="submit" name="comentar">Comentar</button>
                    </form>
                    </div>';
                }else {
                    echo '<div class="comentarios">
                            <input type="text" name="comentario"id="comentario" placeholder="Escribe tu comentario..." maxlength="120">
                            <button onclick="comentarios();">Comentar</button>
                    </div>';
                }
                ?>       
                </div>
            </div>
            
            <section class="testimonios">
            <div class="testimonios__header">
                <span>『Comentarios』</span>
            </div>
            <?php 
                    while($row = $resultado->fetch_assoc()){?>
                    <!-- CONTENEDOR COMENTARIOS -->
                    <div class="testimonios__caja">
                        <div class="caja-top">
                            <div class="perfil">
                                <div class="perfil-img">
                                    <img src="assets/images/usuario.png" alt="">
                                </div>
                                <!-- NOMBRE Y FECHA  -->
                                <div class="name-user">
                                    <strong><?php echo $row['usuario']?></strong>
                                    <span><?php $fecha = substr($row['fecha'],0,$max).""; echo $fecha?></span>
                                </div>
                            </div>
                            <div class="reseñas">
                                <img src="assets/images/comillas.png" alt="">
                            </div>
                            
                        </div>
                        <hr noshade="noshade" size="3" color="#244ac9">
                        <!-- COMENTARIOS -->
                        <div class="comentarios_clientes">
                            <p><?php echo $row['comentario']?></p>
                        </div>
                    </div>
                    <?php
                        }
                        ?>
                </section>
        </main>
        
        <footer>
            <div class="datosFooter">
                <p>© Todos los derechos reservados GAFIA 2022.</p>
            </div>
            <div class="logoFooter">
                <img src="assets/images/logoFooter.png" class="imgF">
            </div>
        </footer>
    <script src="assets/JS/header.js"></script>
    <script src="assets/JS/jquery-3.6.0.min.js"></script>
    <script src="assets/JS/sweetalert2.all.min.js"></script>
    <script src="assets/JS/alerts.js"></script>
</body>
</html>