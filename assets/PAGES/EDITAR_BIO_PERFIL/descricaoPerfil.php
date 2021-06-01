<?php
session_start();

/*
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
*/
require_once('../../BD/conexao.php');
$con = conexao();

function cadastroSeguro($dados)
{
    $dados = addslashes($dados);
    $dados = htmlspecialchars($dados);
    $dados = trim($dados);
    return $dados;
}
$idCookie = $_COOKIE["codlogado"];
$bio = cadastroSeguro($_POST['bio-add']);
$city = cadastroSeguro($_POST['city-add']);
$ensino = cadastroSeguro($_POST['ensino-add']);
$editar = cadastroSeguro($_POST['true']);

if (!empty($idCookie)) {
    $sqlMySQL = "SELECT usuario_ativo FROM user_pcc";
    $resposta = $con->query($sqlMySQL);
    foreach ($resposta as $row) :
        $idHash = password_verify($row["usuario_ativo"], $idCookie);
        if ($idHash) {
            $id = $row['usuario_ativo'];
            if (!empty($editar)) {
                if (strlen($bio) > 1 || strlen($city) > 1 || strlen($ensino) > 1) {
                    $sqlMySQL = "UPDATE user_pcc SET bio_user='$bio', cidade_user='$city',ensino_user='$ensino' WHERE usuario_ativo=$id";
                    $resposta = $con->query($sqlMySQL);
                    if ($resposta) {
                        $_SESSION['erro'] = "<div class='alert flex-center alert-success' role='alert'><strong>Sucesso!</strong>&nbsp;Biografia adicionada.</div>";
                        header("location: ../../../perfil.php");
                    } else {
                        $_SESSION['erro'] = "<div class='alert flex-center alert-danger' role='alert'><strong>Erro!</strong>&nbsp;Houve um erro.</div>";
                        header("location: ../../../perfil.php");
                    }
                } else {
                    $_SESSION['erro'] = "<div class='alert flex-center alert-danger' role='alert'><strong>Erro!</strong>&nbsp;Houve um erro.</div>";
                    header("location: ../../../perfil.php");
                }
                break;
            } else {
                if (strlen($bio) > 1 || strlen($city) > 1 || strlen($ensino) > 1) {
                    $sqlMySQL = "UPDATE user_pcc SET bio_user='$bio', cidade_user='$city',ensino_user='$ensino'  WHERE usuario_ativo=$id";
                    $resposta = $con->query($sqlMySQL);
                    if ($resposta) {
                        $_SESSION['erro'] = "<div class='alert flex-center alert-success' role='alert'><strong>Sucesso!</strong>&nbsp;Dados modificado.</div>";
                        header("location: ../../../perfil.php");
                    } else {
                        $_SESSION['erro'] = "<div class='alert flex-center alert-danger' role='alert'><strong>Erro!</strong>&nbsp;Houve um erro.</div>";
                        header("location: ../../../perfil.php");
                    }
                } else {
                    $_SESSION['erro'] = "<div class='alert flex-center alert-danger' role='alert'><strong>Erro!</strong>&nbsp;Houve um erro.</div>";
                    header("location: ../...///perfil.php");
                }
                break;
            }
        }
    endforeach;
}



$con->close();
