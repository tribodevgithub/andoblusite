<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST['enviar'])) {
    $mail = new PHPMailer(true);
    
try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP


    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'dariooosilvaaa@gmail.com';                     //SMTP username
    $mail->Password   = 'dwvoliwjdgsvxdkx';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('dariooosilvaaa@gmail.com', 'Mailer');
    $mail->addAddress('dariooosilvaaa@gmail.com', 'Dário Silva');     //Add a recipient
    $mail->addReplyTo('dariooosilvaaa@gmail.com', 'Information');
    $mail->isHTML(true);                                  
    $mail->Subject = 'Mensagem enviada do Site - Andoblu';

    $body = " Mensagem enviada através do site, segue informações abaixo: <br>
    
    Nome:". $_POST['nome'] ." <BR>
    E-mail: ". $_POST['email'] ." <BR>
    Telefone: ". $_POST['telefone'] ." <BR>
    Assunto: ".  $_POST['assunto'] ." <BR>
    Mensagem: <BR> ".  $_POST['msg'];

    $mail->Body = $body; 

    $enviado = $mail->send();
    echo 'E-mail enviado com Sucesso';
    
} catch (Exception $e) {
    echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
    }

}else{
    echo "Erro ao enviar e-mail, acesso não foi via formulário";
 
}

if ( $enviado ) {
    echo "<script>
        alert('E-mail enviado com Sucesso!');location.href='index.html';
    </script>";
    
}

