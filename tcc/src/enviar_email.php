<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        require 'vendor/autoload.php';

        $from = new SendGrid\Email(null, "tefagh@hotmail.com");
        $subject = "Mensagem de contato";
        $to = new SendGrid\Email(null, "estefan.hense@possible.com");
        $content = new SendGrid\Content("text/html", "Olá Estefan, <br><br>Nova mensagem de contato
        <br><br>Nome: $name<br>Email: $email<br>Telefone: $phone<br>Mensagem: $message");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = 'SG.wVZdgdfM6eQdaKsuvCN5Iddg.Q6n-9PmspvMAIymVjj-4578frrhkERjtrt';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->post($mail);
        echo "Mensagem enviada com sucesso";
        
        ?>
    </body>
</html>
