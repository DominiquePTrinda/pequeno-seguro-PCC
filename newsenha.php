<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Redefinir Senha | Pequeno Seguro</title>
    <script src="https://kit.fontawesome.com/fbcc70bc24.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css'>
    <link rel="stylesheet" href="assets/CSS/header.css">
    <link rel="stylesheet" href="assets/CSS/novasenha.css">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/IMG/FAVICON/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/IMG/FAVICON/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/IMG/FAVICON/favicon-16x16.png">
    <link rel="manifest" href="./assets/IMG/FAVICON/site.webmanifest">
</head>
<?php
if (isset($_GET['hash']) && strlen($_GET['hash']) >= 1) { ?>

    <style>
        .botao-conteudo,
        .botao {
            display: contents;
        }

        #btnCancelar {
            display: none;
        }

        #btn {
            width: 90%;
        }

        #senha {
            height: 100%;
            width: 100%;
            margin: 0;
            padding-right: 40px;
        }

        .senha-user {
            position: relative;
            display: block;
            height: 50px;
            width: 90%;
            margin: 10px auto;

        }

        .senha-op {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 5px;
            cursor: pointer;
        }
    </style>

    <body>
        <?php
        $check = ["nav-item", "nav-item", "nav-item", "nav-item", "nav-item"];
        require_once('assets/PAGES/header.php');
        echo funheader($check);
        ?>

        <section id="conteudo">
            <section id="container">
                <div class="telacadastro">
                    <form method="POST" action="assets/PAGES/mudarSenhaTwo.php">
                        <div class="novasenha">
                            <h1 class="titulo-novasenha">Nova senha</h1>
                            <hr>
                            <p>Agora digite sua nova senha.</p>
                            <?= $_SESSION['erro'] ?>
                            <div class="senha-user">
                                <input type="password" placeholder="Senha" required autocomplete="off" name="senha" id="senha">
                                <i class="senha-op fa fa-eye-slash"></i>
                            </div>
                            <input type="hidden" name="hash" value="<?= $_GET['hash'] ?>">
                            <div class="botao-conteudo">
                                <div class="botao">
                                    <a href="login.php" id="btnCancelar">Cancelar</a>
                                    <input type="submit" id="btn" value="Mudar">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
            <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
            <script src="assets/JS/header.js"></script>
            <script>
                var btnSenha = document.querySelector('.senha-op');
                var input = document.getElementById("senha");
                btnSenha.addEventListener("click", () => {
                    input.type = input.type == 'text' ? 'password' : 'text';

                    if (btnSenha.classList[2] == "fa-eye-slash") {
                        btnSenha.classList.add("fa-eye");
                        btnSenha.classList.remove("fa-eye-slash");
                    } else {
                        btnSenha.classList.remove("fa-eye");
                        btnSenha.classList.add("fa-eye-slash");
                    }
                });
            </script>
    </body>

<?php } else { ?>

    <body>
        <?php
        $check = ["nav-item", "nav-item", "nav-item", "nav-item", "nav-item"];
        require_once('assets/PAGES/header.php');
        echo funheader($check);
        ?>
        <section id="conteudo">
            <section id="container">
                <div class="telacadastro">
                    <form method="POST" action="assets/PAGES/mudarSenha.php">
                        <div class="novasenha">
                            <h1 class="titulo-novasenha">Nova senha</h1>
                            <hr>
                            <p>Digite seu email para procurar a sua conta.</p>
                            <?= $_SESSION['erro'] ?>
                            <input type="email" placeholder="E-mail" required autocomplete="off" name="email" id="email">
                            <div class="botao-conteudo">
                                <div class="botao">
                                    <a href="login.php" id="btnCancelar">Cancelar</a>
                                    <input type="submit" id="btn" value="Enviar">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </section>
        <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
        <script src="assets/JS/header.js"></script>
    </body>
<?php
}
?>

</html>

<?php
unset($_SESSION['erro']);
