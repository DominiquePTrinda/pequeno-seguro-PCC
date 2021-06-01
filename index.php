<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

require_once('assets/BD/conexao.php');
$con = conexao();
include('./assets/PAGES/verificarLogado.php');
$con->close();

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Pequeno Seguro - Fazendo um mundo melhor</title>
    <meta name="title" content="Pequeno Seguro - Fazendo um mundo melhor">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Junte-se ao Pequeno Seguro, uma plataforma onde você pode denúnciar, interagir com outras pessoas, debater formas de combater esse crime contra as crinças. Venha! conheça já o nosso sistema.">
    <meta name="author" content="Dominique Trindade">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Pequeno Seguro - Fazendo um mundo melhor">
    <meta property="og:description" content="Junte-se ao Pequeno Seguro, uma plataforma onde você pode denúnciar, interagir com outras pessoas, debater formas de combater esse crime contra as crinças. Venha! conheça já o nosso sistema.">
    <meta property="og:image" content="./assets/IMG/FAVICON/ICONE/logo.png">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="Pequeno Seguro - Fazendo um mundo melhor">
    <meta property="twitter:description" content="Junte-se ao Pequeno Seguro, uma plataforma onde você pode denúnciar, interagir com outras pessoas, debater formas de combater esse crime contra as crinças. Venha! conheça já o nosso sistema.">
    <meta property="twitter:image" content="./assets/IMG/FAVICON/ICONE/logo.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/IMG/FAVICON/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/IMG/FAVICON/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/IMG/FAVICON/favicon-16x16.png">
    <script src="https://kit.fontawesome.com/fbcc70bc24.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="./assets/CSS/style.css">
</head>

<body>
    <div id="container" class="flex-display">
        <header>
            <nav>
                <div class="logo-nav">
                    <p><i class="OpenNav-nav fa fa-align-justify"></i>Pequeno Seguro</p>
                </div>
                <div class="grup-nav">
                    <div class="logoTwo-nav">
                        <i class="CloseNav-nav fa fa-align-justify"></i>
                        <p>Pequeno Seguro</p>
                    </div>
                    <div class="caminho-nav">
                        <a href="#"><span>Home</span></a>
                        <a href="#"><span>Sobre</span></a>
                        <a href="#"><span>Contato</span></a>
                    </div>
                    <div class="acesso-nav">
                        <a href="login.php"><button>Entrar</button></a>
                    </div>
                </div>
            </nav>
            <div class="container-header flex-display">
                <div class="container-header-conteudo flex-display">
                    <i class="voltar-foto  flex-display fa fa-chevron-left"></i>
                    <div class="grup-header">
                        <h1>Junte-se com outras pessoas.</h1>
                        <p>Faça parte do Pequeno Seguro e debata com outras pessoas esse assunto que é muito importante.</p>
                        <a href="cadastro.php"><button class="btnaccount">Criar Conta</button></a>
                    </div>
                    <i class="proxima-foto flex-display fa fa-chevron-right"></i>
                </div>
            </div>
        </header>
        <section class="container">
            <div class="textoinicial flex-display">
                <div class="textoinicial-conteudo">
                    <h2>Por que o pequeno seguro?</h2>
                    <p>Somos uma comunidade cujo objetivo é fazer a diferença no mundo, conscientizando pessoas e quebrando esse tabu, por meio de postagens, denúncias e debate. Podendo então, mandar ideias para que outras pessoas possa visualizar e agir com essa base</p>
                </div>
            </div>
            <div class="objetivo flex-display">
                <div class="objetivo-conteudo flex-inline-display">
                    <div class="objetivo-conteudo-a flex-display">
                        <h3>Pedofilia</h3>
                        <p class="objetivo-p1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut ducimus officia, neque commodi nam in perferendis delectus. Veniam explicabo exercitationem, soluta hic, facere culpa perferendis quidem delectus officiis, laudantium tempore.</p>
                    </div>
                    <div class="objetivo-conteudo-b flex-display">
                        <h3>Agressão</h3>
                        <p class="objetivo-p2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut ducimus officia, neque commodi nam in perferendis delectus. Veniam explicabo exercitationem, soluta hic, facere culpa perferendis quidem delectus officiis, laudantium tempore.</p>
                    </div>
                    <div class="objetivo-conteudo-c flex-display">
                        <h3>Bullying</h3>
                        <p class="objetivo-p3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut ducimus officia, neque commodi nam in perferendis delectus. Veniam explicabo exercitationem, soluta hic, facere culpa perferendis quidem delectus officiis, laudantium tempore.</p>
                    </div>
                </div>
            </div>
            <div class="projeto flex-display">
                <div class="projeto-conteudo flex-inline-display">
                    <div class="projeto-conteudo-a">
                        <h1>Seja bem-vindo(a) ao Pequeno Seguro</h1>
                        <p class="projeto-texto-a">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis possimus fugiat veniam adipisci </p>
                        <p class="projeto-texto-b">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis possimus fugiat veniam adipisci officia eligendi, voluptate porro. Ducimus dolorem delectus id voluptas quas, voluptatum quibusdam praesentium, tempore, alias sequi animi!</p>
                        <a href="cadastro.php"><button>Cadastrar-se</button></a>
                    </div>
                    <div class="projeto-conteudo-b">
                        <img src="./assets/IMG/index-4.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="video-yt flex-display">
                <div class="video flex-display">
                    <div class="video-conteudo flex-display">
                        <h1>Veja um vídeo sobre o tema</h1>
                        <div class="openVideo">
                            <i class="fa fa-play"></i>
                        </div>
                        <div class="video-youtube">
                            <div class="video-youtube-conteudo">
                                <iframe class="videoYoutube" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <i class="closeVideo fa fa-close"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="comentarios">
                <div class="heading"><b>Sobre</b> Pequeno Seguro</div>
                <div class="wrapper">
                    <div class="container">
                        <div class="profile">
                            <div class="imgBox">
                                <img src="https://i.postimg.cc/QdtnpwBn/img1.jpg">
                            </div>
                            <h2>Person 1</h2>
                        </div>
                        <p><span class="fa fa-quote-left left"></span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam neque reiciendis sit. Incidunt tempore vitae aliquam alias voluptatem accusantium magnam eos harum ipsam modi, quisquam illo facilis suscipit maxime obcaecati laboriosam cum blanditiis ducimus ut consectetur id mollitia aperiam rerum.<span class="fa fa-quote-right right"></span></p>
                        <div class="social">
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-youtube"></i>
                            <i class="fab fa-instagram"></i>
                        </div>
                    </div>

                    <div class="container">
                        <div class="profile">
                            <div class="imgBox">
                                <img src="https://i.postimg.cc/NFqWDDh2/img2.jpg">
                            </div>
                            <h2>Person 2</h2>
                        </div>
                        <p><span class="fa fa-quote-left left"></span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam neque reiciendis sit. Incidunt tempore vitae aliquam alias voluptatem accusantium magnam eos harum ipsam modi, quisquam illo facilis suscipit maxime obcaecati laboriosam cum blanditiis ducimus ut consectetur id mollitia aperiam rerum.<span class="fa fa-quote-right right"></span></p>
                        <div class="social">
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-youtube"></i>
                            <i class="fab fa-instagram"></i>
                        </div>
                    </div>

                    <div class="container">
                        <div class="profile">
                            <div class="imgBox">
                                <img src="https://i.postimg.cc/L8bQvDL4/img3.jpg">
                            </div>
                            <h2>Person 3</h2>
                        </div>
                        <p><span class="fa fa-quote-left left"></span>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quam neque reiciendis sit. Incidunt tempore vitae aliquam alias voluptatem accusantium magnam eos harum ipsam modi, quisquam illo facilis suscipit maxime obcaecati laboriosam cum blanditiis ducimus ut consectetur id mollitia aperiam rerum.<span class="fa fa-quote-right right"></span></p>
                        <div class="social">
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-youtube"></i>
                            <i class="fab fa-instagram"></i>
                        </div>
                    </div>
                </div>
            </section>

            <footer class="flex-display">
                <div class="footer flex-display">
                    <div class="footer-conteudo-a">
                        <div class="footer-conteudo-a-one flex-display"><i class="fa fa-map-marker"></i>
                            <p>Guanambi, Avenida,<br> Praça do Feijão</p>
                        </div>
                        <div class="footer-conteudo-a-two flex-display"><i class="fa fa-phone"></i>
                            <p>77991292464</p>
                        </div>
                        <div class="footer-conteudo-a-three flex-display"><i class="fa fa-envelope"></i>
                            <p>ja2915588@gmail.com</p>
                        </div>
                    </div>
                    <div class="footer-conteudo-b">
                        <div class="footer-conteudo-b-one">
                            <p>Pequeno seguro</p>
                        </div>
                        <div class="footer-conteudo-b-two">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non incidunt optio dolores inventore rem? Alias accusamus debitis numquam dolorem distinctio quis aliquam, modi blanditiis hic ducimus, rem, voluptates quaerat! Quibusdam.</p>
                        </div>
                        <div class="footer-conteudo-b-three flex-inline-display">
                            <p><a href="#"><i class="fa fa-facebook"></i></a></p>
                            <p><a href="#"><i class="fa fa-instagram"></i></a></p>
                            <p><a href="#"><i class="fa fa-twitter"></i></a></p>
                            <p><a href="#"><i class="fa fa-whatsapp"></i></a></p>
                        </div>
                    </div>
                </div>
            </footer>
        </section>
    </div>
    <script src="./assets/JS/main.js"></script>
</body>

</html>