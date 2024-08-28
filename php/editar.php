<?php

$conexion = mysqli_connect("localhost", "root", "", "gafia");
$id = $_GET['id'];
$m="SELECT * FROM publicaciones WHERE id='$id'";
$modificar = $conexion->query($m); 
$dato = $modificar->fetch_array();
if(isset($_POST['modificar'])){
    //recuperar datos de los imputs
    $id = $_POST['id'];
    $titulo = $conexion->real_escape_string($_POST['titulo']);
    $contenido = $conexion->real_escape_string($_POST['contenido']);
    $fecha = $conexion->real_escape_string($_POST['fecha']);
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $autor = $_POST['autor'];


    $actualiza="UPDATE publicaciones SET titulo = '$titulo', contenido = '$contenido',fecha ='$fecha',imagen ='$imagen', autor ='$autor'
    WHERE id ='$id'";
    $actualizar = $conexion->query($actualiza);
    header("location: ../ver_articulos.php");
}
?>