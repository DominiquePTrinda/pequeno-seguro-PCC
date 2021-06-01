<?php

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

require_once('../BD/conexao.php');
$con = conexao();

function cadastroSeguro($dados)
{
    $dados = addslashes($dados);
    $dados = htmlspecialchars($dados);
    $dados = trim($dados);
    return $dados;
}
$idCookie = $_COOKIE["codlogado"];
$id_publicao = cadastroSeguro($_GET['id_pub']);
$dir = $_GET['dir'];

if (!isset($id_publicao)) {
    header("location: ../../perfil.php");
}

if (!empty($idCookie)) {
    $sqlMySQL = "SELECT id_user, usuario_ativo FROM user_pcc";
    $resposta = $con->query($sqlMySQL);
    foreach ($resposta as $row) :
        $idHash = password_verify($row["usuario_ativo"], $idCookie);
        if ($idHash) {
            $id = $row['id_user'];
            $sql = "DELETE FROM postagem WHERE id_postagem = '$id_publicao' AND id_usuario = '$id' ";
            $res = $con->query($sql);
            if ($res) {
                if ($dir == "home") {
                    header("location: ../../home.php");
                } else {
                    header("location: ../../perfil.php");
                }
            } else {
                if ($dir == "home") {
                    header("location: ../../home.php");
                } else {
                    header("location: ../../perfil.php");
                }
            }
            break;
        }
    endforeach;
}



$con->close();
