<?php
session_start();
/*
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
*/
require_once('../BD/conexao.php');
$con = conexao();

if (!isset($_POST['senha'])) {
    header("location: ../../index.php");
}

function limpar($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
$hash = limpar($_POST['hash']);
$senha = limpar($_POST['senha']);
$senha = md5($senha);
$hash_senhaNova = "false";
$time = time();

$sqlMySQL = "SELECT * FROM user_pcc WHERE nova_senha_user='$hash'";
$resultado = $con->query($sqlMySQL);

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $validarHash = $row["nova_senha_user"];
    $id = $row['id_user'];
    if ($validarHash) {
        if ($validarHash != "false") {
            if ($row['id_user'] <= $time) {
                $sqlMySQL = "UPDATE user_pcc SET senha_user='$senha', nova_senha_user='$hash_senhaNova',nova_senha_time_user='$hash_senhaNova' WHERE id_user='$id'";
                $con->query($sqlMySQL);
                header("location: ../../newsenha.php");
                $_SESSION['erro'] = "<div class='alert alert-success' role='alert'><strong>Sucesso!</strong> Senha substituida com sucesso!</div>";
            }else {
                header("location: ../../newsenha.php?hash=true");
                $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'><strong>Falhou!</strong> Você demorou mais que 24h para mudar a senha</div>";
            }
        } else {
            header("location: ../../newsenha.php?hash=true");
            $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'><strong>Falhou!</strong> Seu e-mail não tem nenhum pedido para substituir a senha!</div>";
        }
    }
} else {
    header("location: ../../newsenha.php");
    $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'><strong>Falhou!</strong> Nenhum e-mail encontrado!</div>";
}
