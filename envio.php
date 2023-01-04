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


    $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'contato@andoblu.com.br';                     //SMTP username
    $mail->Password   = '3k|#a;Kl8O';                               //SMTP password
    $mail->SMTPSecure = 'SSL/TLS';            //Enable implicit TLS encryption
    $mail->Port       = 587;    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('contato@andoblu.com.br', 'Mailer');
    $mail->addAddress('contato@andoblu.com.br', 'Andoblu');     //Add a recipient
    $mail->addReplyTo('contato@andoblu.com.br', 'Information');
    $mail->isHTML(true);                                  
    $mail->Subject = 'Mensagem enviada do Site - Andoblu';

    $body = " Mensagem enviada do site, segue abaixo: <br>
    
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

