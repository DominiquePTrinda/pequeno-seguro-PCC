<?php

require_once('../BD/conexao.php');
$con = conexao();

if (!isset($_POST['email'])) {
    header("location: ../../index.php");
}

function limpar($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
//Email
$email_pequenoSeguro = "mailto:ja291588@gmail.com";
//link do twitter
$twitter_pequenoSeguro = "";
//facebook
$facebook_pequenoSeguro = "";

$email = limpar($_POST['email']);
$nomeUser;
$enviar = false;
$confirmeResposta = false;
$id_usuario;
$resposta_final;
$time = time() + 3600 * 24;

$sqlMySQL = "SELECT * FROM user_pcc";
$resposta = $con->query($sqlMySQL);

if ($resposta->num_rows > 0) {
    while ($row = $resposta->fetch_assoc()) {
        $validarEmail = $row['email_user'] == $email;
        if ($validarEmail) {
            $nomeUser = $row['nome_user'];
            $id_usuario = $row['id_user'];
            $enviar = true;
        }
    }
}

$atual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$hash = bin2hex(openssl_random_pseudo_bytes(64));
$subject = "Pequeno Seguro - Resertar Senha";
require_once('layoutEmail.php');
$body = corpo($hash, $atual_link, $nomeUser, $email_pequenoSeguro, $twitter_pequenoSeguro, $facebook_pequenoSeguro);

use PHPMailer\PHPMailer\PHPMailer;

if ($enviar) {

    require_once "../PHPMailer/PHPMailer.php";
    require_once "../PHPMailer/SMTP.php";
    require_once "../PHPMailer/Exception.php";

    $mail = new PHPMailer();
    $mail->CharSet = "UTF-8";

    //SMTP settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "email";
    $mail->Password = "senha";
    $mail->Port = 465; //465 - 587
    $mail->SMTPSecure = "ssl"; //ssl - tls

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom($email, "Pequeno Seguro");
    $mail->addAddress($email);
    $mail->Subject = $subject;
    $mail->Body = $body;

    if ($mail->send()) {
        $sqlMySQL = "UPDATE user_pcc SET nova_senha_user='$hash', nova_senha_time_user='$time' WHERE id_user='$id_usuario'";
        $con->query($sqlMySQL);
        $resposta_final =  "Enviamos um link para seu e-mail, entre por ele para mudar sua senha. Estamos aguardando.";
    } else {
        $resposta_final = "Houve algum problema no algoritmo do site, tente novamente mais tarde.";
    }
} else {
    $resposta_final = "Bom, não conseguimos enviar o e-mail, usuário não se encontra cadastrado no nosso sistema.";
}
$con->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nova Senha | Pequeno Seguro</title>
    <script src="https://kit.fontawesome.com/fbcc70bc24.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css'>
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/IMG/FAVICON/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/IMG/FAVICON/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/IMG/FAVICON/favicon-16x16.png">
</head>
<style>
    * {
        user-select: none;
    }
    body{
        width: 100%;
        height: 100%;
        text-align: center;
        font-family: sans-serif, Verdana, Geneva, Tahoma, sans-serif;
        background-color: #f8f5f1;
        color: #2b2b2b;
    }
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .conteudo{
        margin-top: 40px;
    }
    button {
        padding: 10px;
        font-size: 1rem;
        background-color: #3da2f0;
        color: #ffffff;
        border: 0;
        cursor: pointer;
    }

    .hori-selector {
        display: none;
    }
</style>

<body>
    <?php
    $check = ["nav-item", "nav-item", "nav-item", "nav-item", "nav-item"];
    require_once('header.php');
    echo funheader($check);
    ?>

    <div class="container">
        <div class="conteudo">
        <h1>Pequeno Seguro</h1>
        <p><?= $resposta_final ?></p>
        <a href="../../index.php"><button>Voltar pra página inicial</button></a>
        </div>
    </div>
    <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
    <script src="../JS/header.js"></script>
</body>

</html>