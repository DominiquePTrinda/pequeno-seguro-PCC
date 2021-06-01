<?php
/*
require_once('../../BD/conexao.php');
$con = conexao();*/

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

$publicacao;
$publicacaoDados = [];
$usuarioDados = [];
$deleteP = "";
$FotoPublicacaoUsuario;
$nomeUsuarioPublicacao;
$nomeUserPublicacao;
/*
$idUsuarioPublicacao = $rows["id_usuario"];
$FotoPublicacaoUsuario = $rows['foto_user'];
$nomeUsuarioPublicacao = $rows['nome_user'];
$nomeUserPublicacao = $rows['usuario_user'];
*/

if (!empty($_COOKIE["logado"]) && !empty($_COOKIE["codlogado"])) {


    $sqlMySQLL = "SELECT * FROM user_pcc";
    $resposta = $con->query($sqlMySQLL);
    if ($resposta->num_rows > 0) {
        while ($rows = $resposta->fetch_assoc()) {
            $usuarioDados[] = $rows;
        }
    }

    $sqlMySQL = "SELECT * FROM postagem ORDER BY id_postagem DESC";
    $respostaPostagem = $con->query($sqlMySQL);

    foreach ($respostaPostagem as $rowPostagem) :
        $id_UserPub = $rowPostagem["id_usuario"];
        $id_pub = $rowPostagem["id_postagem"];
        $deleteP = "";
        $conteudoPub = "";
        foreach ($usuarioDados as $userDados) :
            if ($userDados['id_user'] == $id_UserPub) {
                $FotoPublicacaoUsuario = $userDados['foto_user'];
                $nomeUsuarioPublicacao = $userDados['nome_user'];
                $nomeUserPublicacao = $userDados['usuario_user'];
            }
        endforeach;

        $tz = new DateTimeZone('America/Sao_Paulo');
        $agora = new DateTime(null, $tz);
        $horaBD1 = $agora->format(date("H", strtotime($rowPostagem['hora'])));
        $horaBD2 = $agora->format(date("i", strtotime($rowPostagem['hora'])));
        $horaBD3 = $agora->format(date("d", strtotime($rowPostagem['hora'])));
        $horaBD4 = $agora->format(date("m", strtotime($rowPostagem['hora'])));
        $horaBD5 = $agora->format(date("Y", strtotime($rowPostagem['hora'])));
        $hora = $horaBD1 . "h" . $horaBD2 . "m em " . $horaBD3 . "-" . $horaBD4 . "-" . $horaBD5;
        $img = "assets/IMG/POSTAGEM/FOTOS/" . $rowPostagem['img_postagem'];

        if (strlen($rowPostagem['titulo_postagem']) > 1 && strlen($rowPostagem['img_postagem']) > 1) {
            $conteudoPub = "<p class='titulo-postagem'>{$rowPostagem['titulo_postagem']}</p>";
            $conteudoPub .= "<div class='postagem-foto'><img src='$img'></div>";
        }
        if (strlen($rowPostagem['titulo_postagem']) < 1) {
            $conteudoPub = "<div class='postagem-foto'><img src='$img'></div>";
        } else if (strlen($rowPostagem['img_postagem']) < 1) {
            $conteudoPub = "<p class='titulo-postagem'>{$rowPostagem['titulo_postagem']}</p>";
        }

        $conteudoPub .= "<div class='postagem-reacoes flex-center'>
        <input type='hidden' id='pub{$id_pub}' name='curtida' value='{$id_pub}'>
        <button type='submit' class='flex-center'><i class='far fa-heart'></i><label for='pub{$id_pub}'>Curtir</label></button>
        <button type='submit' class='flex-center'><i class='far fa-comment'></i>Comentar</button>
        <button type='submit' class='flex-center'><i class='far fa-bookmark'></i>Favoritar</button></div>
        <div class='horas-postagem'><p>Curtida por {$rowPostagem['curtida_postagem']} pessoas</p><p>Às {$hora}</p></div>";
       
        if (strlen($rowPostagem['comentario_postagem']) > 0) {
            $conteudoPub .= "<div class='postagem-comentariosRecentes'>
        <p><strong>José Antônio&nbsp;</strong>Muito bom, gostei bastante do resultado
            Lorem
            ipsum dolor sit amet, consectetur adipisicing elit. Iure alias nam ea
            architecto
            possimus vel eius reprehenderit totam, aut ullam corporis fugiat nostrum
            laudantium distinctio? Perferendis deserunt fugit rerum sapiente?</p></div>
            <div class='horas-postagem'><p>José Antonio e outras {$rowPostagem['comentario_postagem']} pessoas comentários</p></div>";
        }
        if ($id_UserPub == $id) {
            $deleteP = "<i class='delete-pub fas fad fa-angle-down'>
                <div class='corpo-delete-pub'><a href='assets/PAGES/deletarPostagensPerfil.php?id_pub=$id_pub&dir=home'>Deletar</a></div> 
             </i>";
        } else {
            $deleteP = "<div class='delete-pub'>
            <a href='assets/PAGES/seguirPerfil.php?id_perfil=$nomeUserPublicacao&dir=home'><button>Seguir</button></a> 
         </div>";
        }
        echo "<div class='postagens'>$deleteP<div class='postagem-corpo'><div class='postagem-conteudo'><img class='fotoPerfil-postagem' src='$FotoPublicacaoUsuario' alt='' srcset=''><div class='top-NomeTexto'><span>$nomeUsuarioPublicacao</span><p>@$nomeUserPublicacao</p></div><div class='postagem-cell'>" . $conteudoPub .
            "<form method='post' action='#' class='postagem-addComentarios flex-center'><textarea placeholder='Adicionar comentário' name='' id=''></textarea><button type='submit'>Publicar</button></form></div></div></div></div>";
    endforeach;
}
