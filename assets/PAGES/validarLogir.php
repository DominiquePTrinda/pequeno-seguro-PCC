<?php
session_start();
require_once('../BD/conexao.php');
$con = conexao();

if (isset($_POST) || isset($_GET)) {
    header("location: ../../index.php");
}

function loginSeguro($dados)
{
    $dados = addslashes($dados);
    $dados = htmlspecialchars($dados);
    $dados = trim($dados);
    return $dados;
}

$email = loginSeguro($_POST['email']);
$senha = md5(loginSeguro($_POST['senha']));
$hashSeguranca = rand(1, 10000);
$nova_senha_null = "false";

$sqlMySQL = "SELECT * FROM user_pcc";
$resposta = $con->query($sqlMySQL);

if ($resposta->num_rows > 0) {
    while ($row = $resposta->fetch_assoc()) {
        $validarEmail = $row['email_user'] == $email;
        $validarSenha = $row['senha_user'] == $senha;
        if ($validarEmail && $validarSenha) {
            $id = $row['usuario_ativo'];
            $sqlMySQL = "UPDATE usuario_ativo SET hash_user='$hashSeguranca',nova_senha_user='$nova_senha_null',nova_senha_time_user='$nova_senha_null' WHERE id = $id";
            $con->query($sqlMySQL);
            $hashSeguranca = password_hash($hashSeguranca, PASSWORD_DEFAULT);
            setcookie("logado", "$hashSeguranca", time() + 3600 * 60 * 60 * 60, "/");
            $hashId = password_hash($id, PASSWORD_DEFAULT);
            setcookie("codlogado", "$hashId", time() + 3600 * 60 * 60 * 60, "/");
            header("location: ../../home.php");
            unset($_SESSION['erro']);
            break;
        }else{
            $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> O e-mail ou a senha está incorreto!</div>";
            header("location: ../../login.php");
        }
    }
}else{
    $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> Nenhum cadastro encontrado!</div>";
    header("location: ../../login.php");
}
exit(json_encode(array("response" => $_SESSION['erro'])));

$con->close();
