<?php
session_start();
require_once("assets/BD/conexao.php");
$con = conexao();
require_once("assets/PAGES/VERIFICAR/verificar_perfil.php");
require_once("assets/PAGES/VERIFICAR/verificar_perfilSeguindo.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de <?= $nomeUsuario ?> | Pequeno Seguro</title>
    <script src="https://kit.fontawesome.com/fbcc70bc24.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/CSS/header2.css">
    <link rel="stylesheet" href="assets/CSS/perfil.css">
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
                            <p><span class="fa fa-home"></span>Home</p>
                        </a>
                        <a class="notificacoes">
                            <p><span class="fa fa-bell"></span>Notificações
                                <div class="notificacoes-conteudo">
                                    <div class="notificacoes-parte">
                                        <img src="assets/IMG/PERFIL/foto_do_perfil.png" alt="">
                                        <div class="notificacoes-texto">
                                            <span>José Antônio</span>
                                            <p class="notificacao-commets">Comentou na públicação de Maria</p>
                                        </div>
                                    </div>
                                    <div class="notificacoes-parte">
                                        <img src="assets/IMG/PERFIL/foto_do_perfil.png" alt="">
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
                                        <img src="assets/IMG/PERFIL/foto_do_perfil.png" alt="">
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
                        <a class="foto-perfil flex-center" href="perfil.php"><img src="<?= $ftperfilUsuario ?>" class="perfil-foto-icone" alt="">
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
        <div class="container">
            <div class="capa">
                <img class="imagem2" src="<?= $ftcapaUsuario ?>" accept="image/" alt="">
                <div class="perfil-capa-upload flex-center">
                    <form id="myForm2" action="foto_capa.php" method="post" encType="multipart/form-data">
                        <input id="file2" style="display: none;" name="capa_us" type="file" value="Adicionar foto">
                        <label for="file2"><i class="icone-upload-foto-capa fas fa-upload"></i></label>
                    </form>
                    <div class="buttonSalvarCapa flex-center">
                        <div class="buttonSalvarCapa2">
                            <h3>Deseja salvar está foto?</h3>
                            <button class="btnEnviar-capa" onclick="sendFoto2()">Salvar</button>
                            <button class="btnEnviar-capac" onclick="sendFotoClose()">Fechar</button>
                        </div>
                    </div>
                </div>
                <div class="perfil-foto">
                    <img class="imagem" src="<?= $ftperfilUsuario ?>" accept="image/" alt="">
                    <form id="myForm" class="form-foto flex-center" action="foto_perfil.php" method="post" encType="multipart/form-data">
                        <input id="file" style="display: none;" name="foto_us" type="file" value="Adicionar foto">
                        <label for="file"><i class="icone-upload-foto fas fa-upload"></i></label>
                    </form>
                    <button class="btnEnviar-perfil" onclick="sendFoto()">Salvar</button>
                </div>
                <div class="perfil-dir">
                    <div class="perfil-dir-conteudo check-dir none-cell">
                        <span>Conteúdo</span>
                        <p>0</p>
                    </div>
                    <div class="perfil-dir-conteudo">
                        <span>Seguidores</span>
                        <p>0</p>
                    </div>
                    <div class="perfil-dir-conteudo">
                        <span>Seguindo</span>
                        <p>0</p>
                    </div>
                    <div class="perfil-dir-conteudo none-cell">
                        <span>Fotos</span>
                        <p>0</p>
                    </div>
                    <div class="perfil-dir-conteudo">
                        <span>Favoritos</span>
                        <p>0</p>
                    </div>
                </div>
            </div>
            <div class="container-list">
                <div class="conteudo-left">
                    <div class="bio-conteudo">
                        <h1><?= $nomeUsuario ?></h1>
                        <h4>Biografia</h4>
                        <div class="bio-conteudo-parte">
                            <?= $descricao ?>
                        </div>
                    </div>
                        <?= $seguindoConteudo ?>   
                </div>
                <div class="conteudo-center">
                    <div class="postar flex-center">
                        <form id="myFormPostar" method="POST" action="assets/PAGES/ENVIAR/postar.php" class="postar-corpo" encType="multipart/form-data">
                            <img class="perfil-foto-icone2" src="<?= $ftperfilUsuario ?>" alt="">
                            <div class="postar-conteudo">
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
                    <?php include_once("./assets/PAGES/postagem-perfil.php"); ?>
                </div>
            </div>
        </div>
    </section>
    <?php
    if (!empty($_SESSION['erro'])) {
        echo "<div class='erroSucess'>$_SESSION[erro]</div>";
        unset($_SESSION['erro']);
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/JS/header2.js"></script>
    <script src="assets/JS/perfil.js"></script>
</body>

</html>
<?php
$con->close();
