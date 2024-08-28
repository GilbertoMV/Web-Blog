<?php
$conexion = mysqli_connect("localhost", "root", "", "gafia");

$id = $_GET['id'];
$eliminar = "DELETE FROM comentarios WHERE id_comentario='$id'";
$elimina = $conexion->query($eliminar);
header("location:ver_comentarios.php");
$conexion->close();
?>