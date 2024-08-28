<?php

$conexion = mysqli_connect("localhost", "root", "", "gafia");


    if (isset($_POST['subir_info'])) {
        
        $titulo = $_POST['titulo'];
        $contenido = $_POST['contenido'];
        $fecha = date("Y-m-d H:i:s");
        $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $autor = $_POST['autor'];

        $query = "INSERT INTO publicaciones(titulo, contenido, fecha, imagen,autor) VALUES ('$titulo', '$contenido','$fecha', '$imagen','$autor')";
        $result = mysqli_query($conexion, $query);

        if ($query){
            header('location: ../borradores.php');
        }else{
            header('location: ../crear_articulo.php');
        }

    }

?>