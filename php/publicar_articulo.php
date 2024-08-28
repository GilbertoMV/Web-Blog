<?php
    $conexion = mysqli_connect("localhost", "root", "", "gafia");
    $id = $_GET['id'];
    $m="SELECT * FROM publicaciones WHERE id='$id'";
    $modificar = $conexion->query($m); 
    $dato = $modificar->fetch_array();
    $actualiza="UPDATE publicaciones SET status = '1' WHERE id ='$id'";
    $actualizar = $conexion->query($actualiza);
    header("location:../borradores.php");
?>