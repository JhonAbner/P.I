<?php
extract($_POST);
$result = "";
$status_user= "";
if (isset($enviar))
{
    if ($status== "aprovado"){
        $status_user = "Aprovado";
    }
    if ($status== "andamento"){
        $status_user = "Em andamento";
    }
    if ($status== "negado"){
        $status_user = "Negado";
    }
    $assunto = "Status do requerimento";
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset-utf-8;';
    $headers .= "Return-Path: sem retorno \r\n";
    $headers .= "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . " \r\n";

    $body_mail = true;
    $body_mail .="<html lang=pt-br>";
    $body_mail .="<body style='background-color:#f7f9fc'>";
    $body_mail .= "<h2>Olá $nome, </h2><br>";
    $body_mail .= "<h3>O status do seu requerimento é: $status_user</h3><br>";
    $body_mail .= "<p>$mensagem</p>";
    $body_mail .="</body>";
    $body_mail .= "</html>";

    if ($status == "aprovado"){
        if (mail($email, $assunto, $body_mail, $headers)) {
            $result = "<h3 style='color:green;'>E-mail enviado!</h3>";
        } else {
            $result = "<h3 style='color:red;'>E-mail não enviado!</h3>";
        }
    }

    if ($status == "andamento"){
        if (mail($email, $assunto, $body_mail, $headers)) {
            $result = "<h3 style='color:green;'>E-mail enviado!</h3>";
        } else {
            $result = "<h3 style='color:red;'>E-mail não enviado!</h3>";
        }
    }

    if ($status == "negado"){
        if (mail($email, $assunto, $body_mail, $headers)) {
            $result = "<h3 style='color:green;'>E-mail enviado!</h3>";
        } else {
            $result = "<h3 style='color:red;'>E-mail não enviado!</h3>";
        }
    }
    
}


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação de Requerimentos</title>
    <link rel="shortcut icon" href="o-email.png" type="image/x-icon">
   <style>
     body{
        margin:0;
        padding:0;
        background-origin: border-box;
        background-image: url(foto.png);
        background-repeat: no-repeat;
        background-size: cover;
     }
     form{
        height:50vh;
        width: 25vw;
        position: absolute;
        top: 5%;
        right: 8rem;
        padding: 10px;
     } label{
         display: flex;
         gap:0.5rem;
         font-family: Arial, Helvetica, sans-serif;
         font-size: 15px;
         align-items: center;
         color:white;
         font-weight: bold;
     }
     h1{
        font-size:40px;
        font-family:Arial, Helvetica, sans-serif;
        color:white;
     }
     h3{
        font-size:20px;
        font-family:Arial, Helvetica, sans-serif;
        color:white;
        
     }
     input[type="text"], input[type='email']{
        background-color: rgba(255, 255, 255, 0.205);
        width: 100%;
        padding: 10px;
        border:none;
        outline: none;
        color: white;
    }
    
     button{
        background-color: #4CAF50;
        padding: 10px;
        border-radius: 5px;
        border: none;
        border-top: 1rem; 
        padding-left: 20px;
        padding-right: 20px;
        color: #fff;
        cursor: pointer;
     }
     
     
   </style>
</head>
<body>
    <form action="email_pi.php" method="POST">
        <h1>Envio de email</h1>
        <h3>Validação de Requerimento</h3>
        <label>Nome:<input type="text" name="nome"></label> 
        <p></p>
        <label>Email:<input type="email" name="email"></label>
        <p></p>
        <h3>Status do requerimento</h3>                
            <label><input type="radio" name="status" value="aprovado"> Aprovado</label><br>
            <label><input type="radio" name="status"  value="andamento"> Em andamento</label><br>
            <label><input type="radio" name="status"  value="negado"> Negado</label><br><br>
        <label>Mensagem adicinonal:<input type="text" name="mensagem"></label>
        <p></p>
        <button type="submit" name='enviar'>Enviar</button>
    
    <div>
        <?php
        echo $result;

        ?>

</div>
</form>
</body>

</html>