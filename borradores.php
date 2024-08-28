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
    
    //Funcion para traer los datos a las tarjetas
    $query ="SELECT * FROM publicaciones WHERE status = '0' ORDER BY fecha desc";
    $resultado=$conexion->query($query);
    $max="10";
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
    <title>Borradores</title>
</head>
<body>
<main>
    <header>
        <a href="admin_index.php"><img src="assets/images/logo.gif" class="logo"></a>
        <nav class="nav-admin">
            <a href="index.php">Modo Usuario <i class="bi bi-person"></i></a>
            <a href="php/cerrar_sesion.php">Cerrar Sesión <i class="bi bi-box-arrow-left icons"></i></a>
        </nav>
    </header>

    <div class="contenedor1">
    <?php
        while($row = $resultado->fetch_assoc()){
    ?>
        <div class="cards1">
            <img src="data:image/png;base64,<?php echo base64_encode($row['imagen']); ?>">
            <div class="contenido1">
                <h1> <?php $titulo=substr($row['titulo'],0,$max )." ..."; echo $titulo; ?> </h1>
                <p> <?php $fecha = substr($row['fecha'],0,$max).""; echo $fecha?> </p>
                <p> <?php echo $row['autor'];?> </p>
                <p><?php echo $row['id'];?></p>
                <a href="articulo.php?id=<?php echo $row['id'];?>"><i class="bi bi-eye"></i></a>
                <a href="editar_articulo.php?id=<?php echo $row['id'];?>" id="editar"><i class="bi bi-pencil-square"></i></a>
                <a href="php/publicar_articulo.php?id=<?php echo $row['id'];?>" id="publicar"><i class="bi bi-cloud-upload"></i></a>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
<script src="assets/JS/jquery-3.6.0.min.js"></script>
<script src="assets/JS/sweetalert2.all.min.js"></script>
<script src="assets/JS/alerts.js"></script>
</body>
</html>