<?php

$conexion = mysqli_connect("localhost", "root", "", "gafia");


    $name = strip_tags($_POST['name']);
    $users = strip_tags($_POST['users']);
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    $password = hash('sha512',$password);
    //$password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);

    $consulta = "INSERT INTO users(name, users, email, password) VALUES('$name','$users','$email','$password')";

    $validar_correo = mysqli_query($conexion, "SELECT * FROM users WHERE email = '$email' ");
    
    if(mysqli_num_rows($validar_correo) > 0) {
        echo '
            <script>
                alert("ESTE CORREO YA ESTÁ REGISTRADO");
                window.location = "../login.php";
            </script>
            ';
            exit();
    }

    // $validar_usuario = mysqli_query($conexion, "SELECT * FROM users WHERE users = '$users' ");

    // if(mysqli_num_rows($validar_usuario) > 0) {
    // echo '
    //     <script>
    //         alert("ESTE USUARIO YA ESTÁ REGISTRADO");
    //         window.location = "../login.php";
    //     </script>
    //     ';
    //     exit();
    // }

        $ejecutar = mysqli_query($conexion, $consulta);

        if($ejecutar){
            header('location: ../login.php');
        } else {
            header('location: ../index.php');
        }  
    mysqli_close($conexion);
?>