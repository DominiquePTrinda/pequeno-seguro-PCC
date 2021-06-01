<?php

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
$id;
$idDoUsuarioLogado = $id;
$seguidores = [];
$contSeguidor = 0;
$contSeguidor = $contSeguidor - 1;
$contSeguindo = 0;
$contSeguindo = $contSeguindo - 1;
$contadordeconteudo = 0;
if (!empty($_COOKIE["logado"])) {
    $sqlMySQL = "SELECT u.id_user, u.nome_user,  u.usuario_ativo, a.hash_user FROM user_pcc u JOIN usuario_ativo a ON u.usuario_ativo=a.id";
    $resposta = $con->query($sqlMySQL);
    $codlogado = $_COOKIE["codlogado"];
    $logado = $_COOKIE["logado"];
    foreach ($resposta as $row) :
        $idHash = password_verify($row['usuario_ativo'], $codlogado);
        if ($idHash) {
            $id = $row['id_user'];
            $sqlMySQL = "SELECT u.id_user, u.nome_user,u.foto_user,u.capa_user, a.hash_user FROM user_pcc u JOIN usuario_ativo a ON a.id=u.usuario_ativo WHERE u.id_user = '$id'";
            $resposta = $con->query($sqlMySQL) or die($con->error);
            $row = $resposta->fetch_assoc();
            $confirmHash = password_verify($row['hash_user'], $logado);
            $nomeUsuario = $row['nome_user'];
            $ftperfilUsuario = $row['foto_user'];
            $ftcapaUsuario = $row['capa_user'];

            $sqlMySQL = "SELECT * FROM seguidores";# ORDER BY id DESC";
            $resposta = $con->query($sqlMySQL);
            if ($resposta->num_rows > 0) {
                while ($row = $resposta->fetch_assoc()) {
                    $seguidores[] = $row;
                }
            }
            if (!$confirmHash) {
                header("location: index.php");
            }
            break;
        }
    endforeach;
    $sqlMySQL = "SELECT * FROM postagem";
    $respostaPostagem = $con->query($sqlMySQL);

    foreach ($respostaPostagem as $rowPostagem) :
        $id_UserPub = $rowPostagem["id_usuario"];
            if ($id_UserPub == $id) {
                $contadordeconteudo++;
            }
    endforeach;
} else {
    header("location: index.php");
}


foreach($seguidores as $seg):
    if($seg['id_usuario'] == "$id"){
        $contSeguidor++;
    }
    if($seg['id_seguidor'] == "$id"){
        $contSeguindo++;
    }
endforeach;