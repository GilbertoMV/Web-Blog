<?php
    session_start();
    if(!isset($_SESSION['rol'])) {
            header('location: index.php');
    }else {
        if($_SESSION['rol'] != 1) {
            header('location: index.php');
        }
    }
    $conexion = mysqli_connect("localhost", "root", "", "gafia");
    $gafia = "SELECT * FROM gafia";
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
    <title>Artículos</title>
</head>
<body>
    <header>
        <a href="admin_index.php"><img src="assets/images/logo.gif" class="logo"></a>
        <nav class="nav-admin">
            <a href="index.php">Modo Usuario <i class="bi bi-person"></i></a>
            <a href="php/cerrar_sesion.php">Cerrar Sesión <i class="bi bi-box-arrow-left icons"></i></a>
        </nav>
    </header>
    <main>
        
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Fecha/Hora</th>
                        <th>Autor</th>
                        <th>Estado</th>
                        <th>Visualizar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                    <?php
                    $sql="SELECT * from publicaciones ORDER by fecha desc";
                    $resultado=mysqli_query($conexion,$sql);
                    while($row=mysqli_fetch_assoc($resultado)){ ?>
                    <tr>
                        <td> <?php echo $row["id"]?></td>
                        <td><?php echo $row["titulo"]?></td>
                        <td><?php echo $row["fecha"]?></td>
                        <td><?php echo $row['autor']?></td>
                        <td><?php 
                            if($row['status'] == '0') {
                                echo '<i class="bi bi-eye-slash-fill"></i>';
                            }else {
                                echo '<i class="bi bi-eye-fill"></i>';
                            }
                            ?></td>
                        <td><a href="articulo.php?id=<?php echo $row['id'];?>"><i class="bi bi-eye ver"></i></a></td>
                        <td><a href="php/eliminar_articulo.php?id=<?php echo $row['id'];?>" id="eliminar"><i class="bi bi-trash ver"></i></a></td>
                    </tr>
                        <?php } ?>
            </table>
    </main>

    <script src="assets/JS/jquery-3.6.0.min.js"></script>
    <script src="assets/JS/sweetalert2.all.min.js"></script>
    <script src="assets/JS/alerts.js"></script>
</body>
</html>