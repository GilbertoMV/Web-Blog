<?php
    $conexion = mysqli_connect("localhost", "root", "", "gafia");
    session_start();
    error_reporting(E_ERROR);
    $id_user = $_SESSION['rol'];
    $sql = "SELECT rol_id, FROM users WHERE rol_id = '$id_user'";
    $max = "10";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="assets/css/styles-index.css" rel="stylesheet" type="text/css">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="icon" href="assets/images/logo.gif">
    <title>Gafia Blog</title>
</head>
<body>
        <header id="header">
            <a href="index.php"><img src="assets/images/logo.gif" class="logo"></a>
            <ul class="nav-index">
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
            </ul>
        </header>
        <section class="banner">
            <div class="banner-hover">
                <a href="https://www.youtube.com/watch?v=RJ4b1ZQxPmE&ab_channel=UniversalSpain" target="_blank">
                <h1>ESTRENO DE LA SEMANA</h1>
                <h2>Jurassic World: <br> Dominion</h2></a>
            </div>
        </section>
        <main>
        <?php
            if(!empty($_REQUEST["num"])){$_REQUEST["num"] = $_REQUEST["num"];}else{ $_REQUEST["num"] = '1';}
            if($_REQUEST["num"] == "" ){$_REQUEST["num"] = "1";}
            $articulos = mysqli_query($conexion, "SELECT * FROM publicaciones WHERE status = '1' ORDER BY fecha DESC;");
            $num_registros=@mysqli_num_rows($articulos);
            $registros ='4'; //cantidad de publiaciones que quieres ver por pagina
            $pagina =$_REQUEST["num"];
            if(is_numeric($pagina))
                $inicio = (($pagina-1)*$registros);
            else
                $inicio = 0;
                $busqueda=mysqli_query($conexion,"SELECT * FROM publicaciones WHERE status = '1' ORDER BY fecha DESC LIMIT $inicio,$registros; ");
                $paginas = ceil($num_registros / $registros);
                $maximo = "220";
        ?>
            <section class="main">
            <?php while ($resultado = mysqli_fetch_assoc($busqueda)){?>
                <div class="card">
                <div class="imagen">
                    <img src="data:image/png;base64,<?php echo base64_encode($resultado['imagen']); ?>" class="img-card">
                        </div>
                            <div class="contenido">
                                <h1 class="titulo"> <?php echo  $resultado['titulo']?></h1>
                                <p class="informacion"> <?php $contenido=substr($resultado['contenido'],0,$maximo)."..."; echo $contenido; ?> </p>
                                <div class="pie">
                                    <p class="autor"><i class="bi bi-person"> <?php echo $resultado['autor'];?> </i></p>
                                    <p class="fecha"><i class="bi bi-calendar"> <?php $fecha = substr($resultado['fecha'],0,$max).""; echo $fecha?> </i></p>
                                    <div class="vermas">
                                    <a href="articulo.php?id=<?php echo $resultado['id'];?>"><i class="bi bi-arrow-right icon-mas"></i></a>
                                    </div>    
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                        ?>
                        <div class="paginado">
                            <?php
                            if($_REQUEST["num"] == "1"){ $_REQUEST["num"] == "0";
                                echo "";
                            }else{
                                if($pagina > 1)
                                $ant = $_REQUEST["num"] -1;
                                    echo "<a style=' border-radius:5px; padding: 1rem 1.4rem; background-color: #343434; margin-top: 30px; margin-bottom: 10px; text-decoration: none; color: white; aria-label='Previous'padding:10px 15px; href='index.php?num=1'><span >Inicio</span></a>";
                                    echo "<li style='border-radius:5px;margin-left:5px; margin-top: 30px; margin-bottom: 10px;padding: 1rem 1.4rem; background-color: #343434;'><a style=' text-decoration: none; color: white; padding:10px 5px;' href='index.php?num=". ($pagina-1) ."' >". $ant ."</a></li>";}
                                    echo "<li style='border-radius:5px;margin-left:5px;margin-top: 30px; margin-bottom: 10px; padding: 1rem 1.4rem; background-color: #343434;'><a style=' text-decoration: none; color: white;padding:10px 5px;'>".$_REQUEST["num"]."</a></li>";
                            $sigui = $_REQUEST["num"] + 1;
                            $ultima = $num_registros / $registros;
                            if ($ultima == $_REQUEST["num"] + 1){
                                $ultima == "";}
                            if ($pagina < $paginas && $paginas > 1)
                                echo "<li style='border-radius:5px; margin-left:5px;margin-top: 30px; margin-bottom: 10px; padding: 1rem 1.4rem; background-color: #343434;'><a style=' text-decoration: none; color: white;padding:10px 5px;' href='index.php?num=". ($pagina + 1) ."'>" .$sigui."</a></li>";
                            if ($pagina < $paginas && $paginas > 1)
                                echo "<li style='margin-left:5px;margin-top: 30px; border-radius:5px;margin-bottom: 10px; padding: 1rem 1.4rem; background-color: #343434;'><a style=' text-decoration: none; color: white; padding:10px 15px;' href='index.php?num=". ceil($ultima) ."'><span class='sr-only'>Final</span></a></li>";
                            ?>
                            </div>
                        </section>

            <section class="sidebar"> 
                <h1>『Artículos Aleatorios』</h1>
                <?php 
                    $conexion1 = mysqli_connect("localhost", "u414904001_gafia1", "I+7TN4:Df", "u414904001_gafia");
                    $query1 ="SELECT * FROM publicaciones WHERE status = '1' ORDER BY rand() LIMIT 4";
                    $resultado1=$conexion1->query($query1);
                    $maximo1 = "20";
                while($row1 = $resultado1->fetch_assoc()){
                ?>
                <div class="contenedor1">
                    <a href="articulo.php?id=<?php echo $row1['id'];?>">
                    <figure>
                        <img src="data:image/png;base64,<?php echo base64_encode($row1['imagen']); ?>">
                        <div class="capa">
                            <h3><?php echo $row1['titulo'];?></h3>
                            <p><?php echo $row1['autor'];?></p>
                        </div>
                    </figure>
                <?php
                }
                ?>
                </a>
                </div>

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
    <script src="assets/JS/sweetalert2.all.min.js"></script>
    <script>
        Swal.fire({
            html: '<style> .title{font-size:15px; font-family:Arial; text-align: center;}</style> <span class="title"><b>!Bienvenido Usuario!<b></span>',
            background: '#2054ff',
            color: '#ffffff',
            width:'auto',
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