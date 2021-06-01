<?php
/*
require_once('../../BD/conexao.php');
$con = conexao();*/

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);


$publicacao;
$deleteP;
$conteudoPub = "";
if (!empty($_COOKIE["logado"])) {
    $sqlMySQL = "SELECT u.id_user, u.nome_user,u.usuario_user,u.foto_user,  u.usuario_ativo, a.hash_user FROM user_pcc u JOIN usuario_ativo a ON u.usuario_ativo=a.id";
    $resposta = $con->query($sqlMySQL);
    $codlogado = $_COOKIE["codlogado"];
    $logado = $_COOKIE["logado"];

    foreach ($resposta as $row) :
        $idHash = password_verify($row['usuario_ativo'], $codlogado);
        if ($idHash) {
            $id = $row["id_user"];
            $ftperfilUsuario = $row["foto_user"];
            $nomeUsuario = $row["nome_user"];
            $nomeUser = $row["usuario_user"];
            $sql = "SELECT * FROM postagem WHERE id_usuario='$id' ORDER BY id_postagem DESC";
            $resultado = $con->query($sql);
            if ($resultado->num_rows > 0) {
                while ($rows = $resultado->fetch_assoc()) {

                    $tz = new DateTimeZone('America/Sao_Paulo');
                    $agora = new DateTime(null, $tz);
                    $horaBD1 = $agora->format(date("H", strtotime($rows['hora'])));
                    $horaBD2 = $agora->format(date("i", strtotime($rows['hora'])));
                    $horaBD3 = $agora->format(date("d", strtotime($rows['hora'])));
                    $horaBD4 = $agora->format(date("m", strtotime($rows['hora'])));
                    $horaBD5 = $agora->format(date("Y", strtotime($rows['hora'])));
                    $hora = $horaBD1 . "h" . $horaBD2 . "m em " . $horaBD3 . "-" . $horaBD4 . "-" . $horaBD5;
                    $id_pub = $rows["id_postagem"];
                    $id_UserPub = $rows["id_usuario"];
                    $img = "assets/IMG/POSTAGEM/FOTOS/".$rows['img_postagem'];

                    if (strlen($rows['titulo_postagem']) > 0) {
                        $conteudoPub = "<p class='titulo-postagem'>{$rows['titulo_postagem']}</p>";
                    } else {
                        if (strlen($rows['img_postagem']) > 1) {
                            $conteudoPub = "<div class='postagem-foto'>
                        <img src='$img' alt=''>
                    </div>";
                        }
                    }
                    if (strlen($rows['img_postagem']) > 1) {
                        $conteudoPub .= "<div class='postagem-foto'>
                    <img src='$img' alt=''>
                </div>";
                    }
                    $conteudoPub .= "<div class='postagem-reacoes flex-center'>
                <button type='submit' class='flex-center'><i class='far fa-heart'></i>Curtir</button>
                <button type='submit' class='flex-center'><i class='far fa-comment'></i>Comentar</button>
            </div>
            <p>Curtida por {$rows['curtida_postagem']} pessoas</p>";
                    if (strlen($rows['comentario_postagem']) > 1) {
                        $conteudoPub .= "<div class='postagem-comentariosRecentes'>
                <p><strong>José Antônio&nbsp;</strong>Muito bom, gostei bastante do resultado
                    Lorem
                    ipsum dolor sit amet, consectetur adipisicing elit. Iure alias nam ea
                    architecto
                    possimus vel eius reprehenderit totam, aut ullam corporis fugiat nostrum
                    laudantium distinctio? Perferendis deserunt fugit rerum sapiente?</p>
            </div>";
                    }
                    if($id_UserPub == $id){
                       $deleteP = "<i class='delete-pub fas fad fa-angle-down'>
                       <div class='corpo-delete-pub'><a href='assets/PAGES/deletarPostagensPerfil.php?id_pub=$id_pub'>Deletar</a></div> 
                    </i>";
                    }

                    echo "<div class='postagens'>$deleteP<div class='postagem-corpo'><div class='postagem-conteudo'><img class='fotoPerfil-postagem' src='$ftperfilUsuario' alt='' srcset=''><div class='top-NomeTexto'><span>$nomeUsuario</span><p>@$nomeUser</p></div><div class='postagem-cell'>" . $conteudoPub .
                        "<p>Às {$hora}</p><form method='post' action='#' class='postagem-addComentarios flex-center'><textarea placeholder='Adicionar comentário' name='' id=''></textarea><button type='submit'>Publicar</button></form></div></div></div></div>";
                }
            } /*else {
                echo "
                <div class='postagens'>
                <div class='postagem-corpo'>
                    <div class='postagem-conteudo'><img class='fotoPerfil-postagem' src='$ftperfilUsuario' alt='' srcset=''>
                        <div class='top-NomeTexto'><span>$nomeUsuario</span>
                            <p>@joseantonion</p>
                        </div>
                        <div class='postagem-cell'>
                            <p>Nenhuma publicação foi encontrada</p>
                        </div>
                    </div>
                </div>
            </div>";;
            }*/
            break;
        }
    endforeach;
}
