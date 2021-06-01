<?php
session_start();
require_once('assets/BD/conexao.php');
$con = conexao();
include('./assets/PAGES/verificarLogado.php');
$con->close();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css'>
    <link rel="stylesheet" href="assets/CSS/header.css">
    <title>Entrar | Pequeno Seguro</title>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/IMG/FAVICON/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assetsIMG/FAVICON/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/IMG/FAVICON/favicon-16x16.png">
    <script src="https://kit.fontawesome.com/fbcc70bc24.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/CSS/login.css">
</head>

<body>
    <?php
    $check = ["nav-item", "nav-item", "nav-item", "nav-item active", "nav-item"];
    require_once('assets/PAGES/header.php');
    echo funheader($check);
    ?>

    <section id="conteudo">
        <section id="container">
            <div class="telacadastro">
                <form method="POST" action="assets/PAGES/validarLogir.php">
                    <div class="login">
                        <h1 class="titulo-login">Entrar</h1>
                        <?= $_SESSION['erro'] ?>
                        <input type="email" placeholder="E-mail" autocomplete="off" name="email" id="email">
                        <div class="senha-user">
                            <input type="password" placeholder="Senha" autocomplete="off" name="senha" id="senha">
                            <i class="senha-op fa fa-eye-slash"></i>
                        </div>
                        <input type="submit" id="btn" onclick="validateMyForm()" value="Entrar">
                        <p class="esqueceu"><a href="newsenha.php">Esqueceu a senha?</a></p>
                        <hr>
                        <a class="entrar" href="cadastro.php">
                            <p>Não tem uma conta? crie agora mesmo?</p>
                        </a>
                    </div>
                </form>
            </div>
        </section>
    </section>
    <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/JS/header.js"></script>
    <script type="text/javascript" src="assets/JS/login.js"></script>
</body>

</html>
<?php
unset($_SESSION['erro']);
