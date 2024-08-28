<?php

$id = $_GET['id'];
$eliminar = "DELETE FROM publicaciones WHERE id='$id'";
$elimina = $conexion->query($eliminar);
header("location:../ver_articulos.php");
$conexion->close();
?>