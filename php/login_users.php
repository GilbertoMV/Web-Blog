<?php
    session_start();
    include 'conexion.php';

    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    $password = hash('sha512',$password);
    //$password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);

    //$validar_login = mysqli_query($conexion, "SELECT * FROM users WHERE email = '$email' and password= '$password' ");

    if(isset($email) && isset($password)) {
    
        $db = new Database();
        $query = $db->connect()->prepare('SELECT * FROM users WHERE email = :email and password = :password');
        $query->execute(['email' => $email, 'password' => $password]);
        
        $row = $query->fetch(PDO::FETCH_NUM);
        
        if($row == true) {
            $rol = $row[1];
            $id= $row[0];
            $_SESSION['rol'] = $rol; 
            $_SESSION['id'] = $id;   
            switch ($_SESSION['rol']) {
                case '1':
                    header('location: ../index.php');
                    break;
                case '2':
                    header('location: ../index.php');
                    break;
                default:
            }
        }else {
            
            echo '
            <script type="text/javascript">
                alert("NO EXISTE EL USUARIO");
                window.location = "../login.php";
            </script>
            ';
            exit();
        }
}
?>
