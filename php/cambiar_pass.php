<?php
    $conexion = mysqli_connect("localhost", "root", "", "gafia");
    
    session_start();
    $gmail = $_SESSION['emai'];

    $newpassword = strip_tags($_POST['password1']);
    $reppassword = strip_tags($_POST['password2']);

    if($newpassword == $reppassword){
    $hashead = hash('sha512',$newpassword);

    $cambio = "UPDATE users SET password ='$hashead' WHERE email ='$gmail'";
    
    $resultado = mysqli_query($conexion, $cambio);

    if($resultado = null){
        echo "error";
    }else{
        echo '<script>
        alert("se cambio la contraseña correctamente");
        window.location="../login.php";
        </script>';
    }
    }else {
        echo '<script>
        alert("ERROR: la contraseñas no coinciden, vuelva a intentarlo");
            window.location = "../recuperar_pass.php";
        </script>';
    }
?>