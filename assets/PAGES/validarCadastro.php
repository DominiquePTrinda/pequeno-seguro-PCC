<?php
session_start();
require_once('../BD/conexao.php');
$con = conexao();

if (empty($_POST) || empty($_GET)) {
    header("location: ../../index.php");
}

function cadastroSeguro($dados)
{
    $dados = addslashes($dados);
    $dados = htmlspecialchars($dados);
    $dados = trim($dados);
    return $dados;
}
function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
}

$nome = cadastroSeguro($_POST['nome']);
$usuario = strtolower(str_replace(" ", "", $nome));
$usuario = tirarAcentos($usuario);
$email = filter_var(cadastroSeguro($_POST['email']), FILTER_VALIDATE_EMAIL);
$senha = md5(cadastroSeguro($_POST['senha']));
$sexo = cadastroSeguro($_POST['sexo']);
$data = cadastroSeguro($_POST['date']);
$bio = " ";
$cidade = " ";
$ensino = " ";
$hashSeguranca = rand(1, 10000);
$hash_senhaNova = "false";
$confirma = true;
$respostaFinal = false;
$perfil = "assets/IMG/PERFIL/foto_do_perfil.png";
$capaFoto = rand(1, 3);
$capa = "assets/IMG/CAPA/" . $capaFoto.".png";
$id_ativo;
$cod = rand(1, 100);
$sqlMySQL = "SELECT * FROM user_pcc";
$resposta = $con->query($sqlMySQL);
if ($resposta->num_rows > 0) {
    while ($row = $resposta->fetch_assoc()) {
        $validarEmail = $row['email_user'] === $email;
        $validarUsuario = $row['usuario_user'] === $usuario;
        if ($validarUsuario) {
            $usuario = $usuario . "_" . $cod;
        }
        if ($validarEmail) {
            $confirma = false;
            break;
        } else {
            $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'><strong>Desculpa!</strong> Esse e-mail já está cadastrado.</div>";
            header("location: ../../cadastro.php");
        }
    }
}
if ($confirma) {
    if (strlen($senha) >= 8) {
        if ($sexo == "M" || $sexo == "F") {
            if ($email) {
                $sqlMySQLID = "INSERT INTO usuario_ativo (hash_user,nova_senha_user,nova_senha_time_user) VALUES ('$hashSeguranca','$hash_senhaNova','$hash_senhaNova')";
                $respostaID = $con->query($sqlMySQLID);
                if ($respostaID) {
                    $sqlMySQLID = "SELECT * FROM usuario_ativo ORDER BY id DESC LIMIT 1";
                    $respostaID2 = $con->query($sqlMySQLID);
                    $rowID2 = $respostaID2->fetch_assoc();
                    $id_ativo = $rowID2['id'];
                    $sqlMySQL = "INSERT INTO user_pcc (nome_user,usuario_user,email_user,senha_user,foto_user, capa_user,sexo_user, usuario_ativo, bio_user, nascimento_user, cidade_user, ensino_user)
                    VALUES ('$nome','$usuario','$email','$senha','$perfil','$capa','$sexo','$id_ativo','$bio','$data','$cidade','$ensino')";
                    $respostaFinal = $con->query($sqlMySQL);
                }
                if ($respostaFinal) {
                    ////////////////////////-LOGAR USUARIO-///////////////
                    $sqlMySQL = "SELECT * FROM user_pcc";
                    $resposta = $con->query($sqlMySQL);
                    while ($row = $resposta->fetch_assoc()) {
                        $validarEmail = $row['email_user'] == $email;
                        $validarSenha = $row['senha_user'] == $senha;
                        if ($validarEmail && $validarSenha) {
                            $id = $row['usuario_ativo'];
                            $sqlMySQLID = "INSERT INTO seguidores (id_usuario,id_seguidores) VALUES ('$id','$id')";
                            $con->query($sqlMySQLID);
                            $sqlMySQL = "UPDATE usuario_ativo SET hash_user='$hashSeguranca' WHERE id = $id";
                            $con->query($sqlMySQL);
                            $hashSeguranca = password_hash($hashSeguranca, PASSWORD_DEFAULT);
                            setcookie("logado", "$hashSeguranca", time() + 3600 * 60 * 60 * 60, "/");
                            $hashId = password_hash($id, PASSWORD_DEFAULT);
                            setcookie("codlogado", "$hashId", time() + 3600 * 60 * 60 * 60, "/");
                            header("location: ../../home.php");
                            break;
                        }
                    }
                    ////////////////////////////////////////////////////// 
                }
            } else {
                $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> Esse e-mail está inválido.</div>";
                header("location: ../../cadastro.php");
            }
        } else {
            $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> Sexo Inválido, você precisa ativar o JavaScript.</div>";
            header("location: ../../cadastro.php");
        }
    } else {
        $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> A senha precisa ter no minimo 8 letras.</div>";
        header("location: ../../cadastro.php");
    }
} else {
    $_SESSION['erro'] = "<div class='alert alert-danger' role='alert'><strong>Erro!</strong> Chefe E-mail já cadastrado.</div>";
    header("location: ../../cadastro.php");
}
$con->close();
