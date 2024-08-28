<?php

$conexion = mysqli_connect("localhost", "root", "", "gafia");
if(isset($_POST['env'])) {

    $gmail = strip_tags($_POST['gmail']);
    session_start();  
    $_SESSION['emai'] = $gmail;
}
else {
    echo '
    <script>
    alert("Error");
    window.location = "login.php";
</script>
';
}
use PHPMailer\PHPMailer\PHPMailer; //llamar a las funciones que estamos usando
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //ver los errores, si lo quieres desactivar poner 0
    $mail->isSMTP();                                            //protocolo para enviar (SMTP)
    $mail->Host       = 'smtp.gmail.com';                     //Servidor que vamos a utilizar
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'soportegafia@gmail.com';   //SMTP acceso para entrar a la cuenta del gmail.
    $mail->Password   = 'SoporteAdmin#$';                               //SMTP contraseña del correo
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('soportegafia@gmail.com', 'Admin'); //desde donde se va a enviar 
    $mail->addAddress($gmail);     //a quien se la va enviar, todos los addAddres son los que se los van a enviar
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information'); mandar con copia
    //$mail->addCC('cc@example.com'); para responder
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');       enviar archivos
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg'); enviar imagenes,jpg

    //Content
    $mail->isHTML(true);                                  //el correo que se envie permite a html
    $mail->Subject = 'restablece tu password'; //asunto 
    $mail->CharSet = 'UTF-8'; //para cuando envias un mensaje se pueda aceptar los acentos
    $mail->Body    = /*inicio del header*/'<header style="height: auto; width: 100%; top: 0; left: 0; background-color: rgba(0, 0, 0, 0.623);">
    <center><img src="cid:logo" style="width: 120px;"></center></header>'. /*parte final del header*/
    '<center><img style=" width: 380px;" src="cid:password"></center> 
    <center><h1 style="color: #22222a; margin-top: 10px; font-weight: 900;">¿Haz olvidado tu contraseña?</h1></center> 
    <center><p style=" color: #22222a; font-weight: 1000; font-size: 13px;">Hola, hemos recibido que requieres cambiar tu contraseña <br style="margin-top: 5px;">si tu no solicitaste esto, omite este mensaje</br>
    <br style="margin-top: 5px;">Para cambiar tu contraseña has click en el boton de "Recuperar Contraseña"</br></p></center>
    <center><a href="https://gafia.software/recuperar_pass.php" style="padding: 10px 24px; background-color: #157bb6;  border-radius: 20px; text-decoration: none; color: #ffffff;">Recuperar Contraseña</a></center><br><br>'; //cuerpo 
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; mensaje alternativo
    $mail->AddEmbeddedImage(dirname(__FILE__) . '/assets/images/logo.gif', 'logo', 'logo.gif');
    $mail->AddEmbeddedImage(dirname(__FILE__) . '/assets/images/password.jpg', 'password', 'password.jpg');//insertar una imagen en el cuerpo 
    $validar_correo = mysqli_query($conexion, "SELECT * FROM users WHERE email = '$gmail' ");
    if(mysqli_num_rows($validar_correo) > 0){
        $mail->send();
        echo '<script>
            alert("se envio las instrucciones correctamente, revisa tu gmail");
                window.location = "login.php";
            </script>
        ';
    }else {
        echo '
            <script>
                alert("ESTE CORREO NO ESTÁ REGISTRADO");
                window.location = "../login.php";
            </script>
            ';
            exit();
    }
} catch (Exception $e) {
    echo 'error al enviar el correo:', $mail->ErrorInfo;
}