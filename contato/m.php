<?php 



    // POST variables
    $name = stripslashes($_POST['name']);
    $phone = stripslashes($_POST['phone']);
    $email = trim($_POST['email']);
    $phone = stripslashes($_POST['phone']);
    $website = stripslashes($_POST['website']);
    $message = stripslashes($_POST['message']);


    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "sac@cdl.med.br";
    $to = "sac@cdl.med.br";
    $subject = "[site_cdl] Mensagem Recebida de ".$name;
    $message = $message;
    $headers = "From:" . $email;
    mail($to,$subject,$message, $headers);
    echo "Seu email foi enviado com sucesso!";
?>