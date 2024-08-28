<?php
    session_start();
    if(!isset($_SESSION['rol'])) {
            header('location: ../index.php');
    }else {
        if($_SESSION['rol'] != 1) {
            header('location: ../index.php');
        }
    }
$conexion = mysqli_connect("localhost", "root", "", "gafia");
    
    $com = "SELECT * FROM comentarios ORDER BY id_publicaciones ASC";
    $maximo = "40";
    $resultado=mysqli_query($conexion,$com);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preload" href="../assets/css/styles-AdminPages.css">
    <link rel="stylesheet" href="../assets/css/styles-AdminPages.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Comentarios-Lista</title>
</head>
<body>
    <header>
        <a href="../admin_index.php"><img src="../assets/images/logo.gif" class="logo"></a>
        <nav class="nav-admin">
            <a href="../index.php">Modo Usuario <i class="bi bi-person"></i></a>
            <a href="cerrar_sesion.php">Cerrar Sesión <i class="bi bi-box-arrow-left icons"></i></a>
        </nav>
    </header>
    <main>
        
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Comentario</th>
                        <th>Publicación</th>
                        <th>Usuario</th>
                        <th>Fecha</th>
                        <th>Visualizar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                    <?php
                    while($row=mysqli_fetch_assoc($resultado)){ ?>
                    <tr>
                        <td> <?php echo $row["id_comentario"]?></td>
                        <td><?php $comentario=substr($row['comentario'],0,$maximo)."..."; echo $comentario; ?></td>
                        <td><?php $id_publicaciones= $row['id_publicaciones'];
                                      $p ="SELECT titulo FROM publicaciones WHERE id='$id_publicaciones'";
                                      $mostrar = $conexion->query($p); 
                                      $dato = $mostrar->fetch_array();
                                      echo $dato['titulo']?></td>
                        <td><?php echo $row['usuario']?></td>
                        <td><?php echo $row['fecha']?></td>
                        <td><a href="../articulo.php?id=<?php echo $row['id_publicaciones'];?>"><i class="bi bi-eye ver"></i></a></td>
                        <td><a href="eliminar_comentario.php?id=<?php echo $row['id_comentario'];?>"id="eliminar"><i class="bi bi-trash ver"></i></a></td>
                    </tr>
                        <?php } ?>
            </table>
    </main> 
    <script src="../assets/JS/jquery-3.6.0.min.js"></script>
    <script src="../assets/JS/sweetalert2.all.min.js"></script>
    <script src="../assets/JS/alerts.js"></script>
</body>
</html>