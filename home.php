<?php
require_once("assets/BD/conexao.php");
$con = conexao();
require_once("assets/PAGES/VERIFICAR/verificar_home.php");
require_once("assets/PAGES/conteudo_home.php");
require_once("assets/PAGES/sugestaoSeguidores.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pequeno Seguro</title>
    <script src="https://kit.fontawesome.com/fbcc70bc24.js" crossorigin="anonymous"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/IMG/FAVICON/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/IMG/FAVICON/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/IMG/FAVICON/favicon-16x16.png">
    <link rel="stylesheet" href="./assets/CSS/header2.css">
    <link rel="stylesheet" href="./assets/CSS/home.css">
</head>

<body>
    <header>
        <nav>
            <div class="navegacao flex-space-between">
                <a class="menu" href="#">
                    <p><span class="fa fas fa-align-justify"></span>Pequeno Seguro</p>
                </a>
                <div class="navegacao-conteudo">
                    <a class="menu-cell" href="#">
                        <p><span class="fa fas fa-align-justify"></span></p>
                    </a>
                    <div class="navegacao-a flex-space-evenly">
                        <a href="home.php">
                            <p class="check-nav"><span class="fa fa-home"></span>Home</p>
                        </a>
                        <a class="notificacoes">
                            <p><span class="fa fa-bell"></span>Notificações
                                <div class="notificacoes-conteudo">
                                    <div class="notificacoes-parte">
                                        <img src="./assets/IMG/PERFIL/foto_do_perfil.png" alt="">
                                        <div class="notificacoes-texto">
                                            <span>José Antônio</span>
                                            <p class="notificacao-commets">Comentou na públicação de Maria</p>
                                        </div>
                                    </div>
                                    <div class="notificacoes-parte">
                                        <img src="./assets/IMG/PERFIL/foto_do_perfil.png" alt="">
                                        <div class="notificacoes-texto">
                                            <span>José Antônio</span>
                                            <p class="ntf-texto-yesornot">Te enviou um pedido de solicitação</p>
                                            <div class="ntf-button">
                                                <button>Aceitar</button>
                                                <button>Recursar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </p>
                        </a>
                        <a class="mensagem">
                            <p><span class="fa fa-envelope"></span>Mensagens
                                <div class="mensagem-conteudo">
                                    <div class="mensagem-parte">
                                        <img src="./assets/IMG/PERFIL/foto_do_perfil.png" alt="">
                                        <div class="mensagem-texto">
                                            <span>José Antônio</span>
                                            <p>Disse: <span>Oie! tudo bem? queria te ver, será que tem como?<span></p>
                                        </div>
                                    </div>
                                </div>
                            </p>
                        </a>
                        <a class="cell" href="#">
                            <p><span class="fa fa-cog"></span>Configurações</p>
                        </a>
                        <a class="cell" href="assets/PAGES/sair.php">
                            <p><span class="fa fas fas fa-sign-in-alt"></span>Sair</p>
                        </a>
                    </div>
                    <div class="navegacao-b flex-space-evenly">
                        <h3>Pequeno Seguro</h3>
                    </div>
                    <div class="navegacao-c flex-space-evenly">
                        <form action="#" method="get">
                            <input type="text" name="PSQpublicacao" placeholder="Pesquisar" id="PSQpublicacao">
                            <button type="submit"><span class="fa fas fa-search"></span></button>
                        </form>
                        <a class="foto-perfil flex-center" href="perfil.php"><img src="<?= $ftperfilUsuario ?>" alt="">
                            <p class="foto-perfil-nome">José Antônio</p>
                        </a>
                        <a class="configuracoes flex-center">
                            <p><span class="fa fa-cog"></span>
                                <div class="configuracoes-conteudo">
                                    <a href="#">
                                        <p>Configurações</p>
                                    </a>
                                    <a href="assets/PAGES/sair.php">
                                        <p>Sair</p>
                                    </a>
                                </div>
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <section id="container">
        <div class="container-list">
            <div class="conteudo-left">
                <div class="perfil-conteudo">
                    <div class="perfil-capa">
                        <img src="<?= $ftcapaUsuario ?>" alt="" srcset="">
                        <div class="perfil-foto flex-center">
                            <img src="<?= $ftperfilUsuario ?>" alt="" srcset="">
                            <span><?= $nomeUsuario ?></span>
                        </div>
                    </div>
                    <div class="perfil-informacoes flex-center">
                        <div class="perfil-informacoes-a">
                            <span>Conteudo</span>
                            <p><?= $contadordeconteudo ?></p>
                        </div>
                        <div class="perfil-informacoes-b">
                            <span>Seguindores</span>
                            <p><?= $contSeguidor ?></p>
                        </div>
                        <div class="perfil-informacoes-c">
                            <span>Seguindo</span>
                            <p><?= $contSeguindo ?></p>
                        </div>
                    </div>
                </div>
                <div class="indicacoes-conteudo">
                    <h4>Indicações para você</h4>
                    <form action="" method="get" class="indicacoes-conteudo-parte">
                        <input type="hidden" name="">
                        <button type="submit">#Pedofilia</button>
                        <p>Mais de 1005 postagens</p>
                    </form>
                    <form action="" method="get" class="indicacoes-conteudo-parte">
                        <button type="submit">#Agressão</button>
                        <p>Mais de 1005 postagens</p>
                    </form>
                    <form action="" method="get" class="indicacoes-conteudo-parte">
                        <button type="submit">#Bullyng</button>
                        <p>Mais de 1005 postagens</p>
                    </form>
                </div>
            </div>
            <div class="conteudo-center">
                <div class="postagens postagens-cell">
                    <div class="perfil-conteudo">
                        <div class="perfil-capa">
                            <img src="<?= $ftcapaUsuario ?>" alt="" srcset="">
                            <div class="perfil-foto flex-center">
                                <img src="<?= $ftperfilUsuario ?>" alt="" srcset="">
                                <span><?= $nomeUsuario ?></span>
                            </div>
                        </div>
                        <div class="perfil-informacoes flex-center">
                            <div class="perfil-informacoes-a">
                                <span>Conteudo</span>
                                <p><?= $contadordeconteudo ?></p>
                            </div>
                            <div class="perfil-informacoes-b">
                                <span>Seguindores</span>
                                <p><?= $contSeguidor ?></p>
                            </div>
                            <div class="perfil-informacoes-c">
                                <span>Seguindo</span>
                                <p><?= $contSeguindo ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="postar flex-center">
                    <form id="myFormPostar" method="POST" action="assets/PAGES/ENVIAR/postar.php" class="postar-corpo" encType="multipart/form-data">
                        <img src="<?= $ftperfilUsuario ?>" alt="" srcset="">
                        <div class="postar-conteudo">
                            <input name="dir" style="display: none;" value="home" type="text">
                            <textarea name="postar_titulo" placeholder="Faça uma postagem" id=""></textarea>
                            <img id="postar-img" class="imagempostar" src="<?= $ftcapaUsuario ?>" accept="image/" alt="">
                            <div class="postar-conteudo-btn flex-space-between">
                                <button type="submit">Postar</button>
                                <input id="filePostar" name="postar_us" style="display: none;" type="file">
                                <label for="filePostar"><span class="postar-img fa far fa-image"></span></label>
                                <span class="postar-img far fa-grin"></span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="postagens postagens-cell">
                    <div class="indicacoes-conteudo">
                        <h4>Indicações para você</h4>
                        <form action="" method="get" class="indicacoes-conteudo-parte">
                            <input type="hidden" name="">
                            <button type="submit">#Pedofilia</button>
                            <p>Mais de 1005 postagens</p>
                        </form>
                        <form action="" method="get" class="indicacoes-conteudo-parte">
                            <button type="submit">#Agressão</button>
                            <p>Mais de 1005 postagens</p>
                        </form>
                        <form action="" method="get" class="indicacoes-conteudo-parte">
                            <button type="submit">#Bullyng</button>
                            <p>Mais de 1005 postagens</p>
                        </form>
                    </div>
                </div>
                <div class="postagens postagens-cell">
                    <?= $sugestao ?>
                </div>
                <?php require_once("assets/PAGES/postagem-home.php") ?>
            </div>
            <div class="conteudo-right">
                <?= $sugestao ?>
                <div class="amigos-ativo">
                    <h4>Amigos on-line</h4>
                
                    <!--
                        require("online.php");
                    -->

                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="./assets/JS/header2.js"></script>
    <script src="./assets/JS/home.js"></script>
</body>

</html>

<?php
$con->close();

if (isset($_SESSION['erro'])) {
    unset($_SESSION['erro']);
}
