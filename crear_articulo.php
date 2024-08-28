<?php
    session_start();
    if(!isset($_SESSION['rol'])) {
            header('location: index.php');
    }else {
        if($_SESSION['rol'] != 1) {
            header('location: index.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="assets/css/styles-formPubli.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="assets/images/logo.gif">
    <title>Nuevo Artículo</title>
</head>
<body>
    <div class="container p-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <form action="./php/subir_articulo.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="titulo" class="form-control" placeholder="Ingrese el titulo del artículo" maxlength="30" required>
                        </div>
                        <div class="form-group">
                            <textarea name="contenido" rows="10" class="form-control" placeholder="Ingrese el contenido del artículo" required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <input type="file" name="imagen" class="form-control p-1 " required>
                        </div>
                        <div class="form-group">
                            <select name="autor" class="form-control">
                                <option value="Anónimo">Opciones de Autor</option>
                                <option value="Gilberto Valenzuela">Gilberto Valenzuela</option>
                                <option value="Isaac López">Isaac López</option>
                                <option value="Javier Flores"> Javier Flores</option>
                                <option value="Alfredo Ochoa">Alfredo Ochoa</option>
                                <option value="Alfredo Gaona">Alfredo Gaona</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <?php 
                            date_default_timezone_set('UTC');
                            date_default_timezone_set("America/Mexico_City");
                            $date = date("Y-m-d");
                            ?>
                            <input type="date" name="fecha" class="form-control" value="<?php echo $date;?>" disabled>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="imagen" class="form-control p-1" value="0">
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="subir_info" value="Guardar Borrador">
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- BOOTSTRAP 4 SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


</body>
</html>