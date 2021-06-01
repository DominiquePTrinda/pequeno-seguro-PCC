<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);
require_once('../BD/conexao.php');
$con = conexao();

function envioSeguro($dados)
{
    $dados = addslashes($dados);
    $dados = htmlspecialchars($dados);
    $dados = trim($dados);
    return $dados;
}
$name = envioSeguro($_POST['idUS']);
$usuarioID;
$sql = "SELECT * FROM user_pcc WHERE usuario_user='$name'";
$respostaUser = $con->query($sql);
if ($respostaUser->num_rows > 0) {
    while ($row = $respostaUser->fetch_assoc()) {
        $usuarioID = $row['id_user'];
    }
} else {
    header("location: ../../index.php");
}
if (!empty($_COOKIE["logado"]) && !empty($_COOKIE["codlogado"])) {
    $sqlMySQL = "SELECT u.id_user, u.nome_user,  u.usuario_ativo, a.hash_user FROM user_pcc u JOIN usuario_ativo a ON u.usuario_ativo=a.id";
    $resposta = $con->query($sqlMySQL);
    $codlogado = $_COOKIE["codlogado"];
    $logado = $_COOKIE["logado"];
    foreach ($resposta as $row) :
        $idHash = password_verify($row['usuario_ativo'], $codlogado);
        if ($idHash) {
            $id = $row["id_user"];
            $sqle = "SELECT * FROM seguidores WHERE id_usuario='$id' AND id_seguidor='$usuarioID')";
            $resultadoe = $con->query($sqle);
            var_dump($resultadoe);
        
            if ($resultado->num_rows <= 0) {
                if (strlen($name) > 1) {
                    $sql = "INSERT INTO seguidores (id_usuario, id_seguidor) VALUES ('$id','$usuarioID')";
                    $resultado = $con->query($sql);
                    if ($resultado) {
                        header("location: ../../home.php");
                    } else {
                        header("location: ../../home.php");
                    }
                }
            } else {
                header("location: ../../home.php");
            }
            break;
        }
    endforeach;
} else {
    header("location: ../../index.php");
}
