<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

require_once('../BD/conexao.php');
$con = conexao();

$id;
$total = 0;
if (!empty($_COOKIE["logado"]) && !empty($_COOKIE["codlogado"])) {
    $resultset = [];
    $sqlMySQL = "SELECT u.id_user,u.nome_user,u.foto_user,u.usuario_ativo, d.hash_user FROM user_pcc u JOIN usuario_ativo d ON u.usuario_ativo=d.id";
    $resposta = $con->query($sqlMySQL);
    $codlogado = $_COOKIE["codlogado"];
    $logado = $_COOKIE["logado"];

    if ($resposta->num_rows > 0) {
        while ($row = $resposta->fetch_assoc()) {
            $resultset[] = $row;
        }
    }
    foreach ($resultset as $cod) :
        $idCod = $cod["usuario_ativo"];
        $hashDados = $cod['hash_user'];
        $id = $cod['id_user'];
        $idHash = password_verify($idCod, $codlogado);
        $confirmHash = password_verify($hashDados, $logado);
        if ($idHash && $confirmHash) {
            echo online($con, $id, $total, $resultset);
            break;
        }
    endforeach;
}

/* ///////////////////////////////////////////////////////////////////// */

function addOnline($con, $id)
{
    $time = time() + 60;
    $ip = $_SERVER['REMOTE_ADDR'];
    $sql = "INSERT INTO user_online (id_usuario, ip, time) VALUES ('$id','$ip','$time')";
    $con->query($sql);
}

function deleteUsuario($con, $id)
{
    $timeAtual = time();
    $sql = "SELECT * FROM user_online";
    $resultado = $con->query($sql);
    $resultOnline = [];
    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $resultOnline[] = $row;
        }
    }
    foreach ($resultOnline as $cod) :
        $ipUser = $cod["ip"];
        $timeUser = $cod['time'];
        if ($timeAtual >= $timeUser) {
            $sql = "DELETE FROM user_online WHERE ip='$ipUser'";
            $con->query($sql);
        }
    endforeach;
}
function usuarioOnline($con, $id)
{
    $time = time() + 60;
    $sql = "SELECT * FROM user_online WHERE id_usuario='$id'";
    $resultado = $con->query($sql);
    if ($resultado->num_rows > 0) {
        $sql = "UPDATE user_online SET time='$time' WHERE id_usuario='$id'";
        $resultado = $con->query($sql);
    } else {
        addOnline($con, $id);
    }
    deleteUsuario($con, $id);
}


function online($con, $id, $total, $dados)
{
    $amigo = "";
    $sql = "SELECT * FROM user_online";
    $resultado = $con->query($sql);
    $total = $resultado->num_rows;
    usuarioOnline($con, $id, $total);
    foreach ($dados as $cod) :
        $nome = $cod["nome_user"];
        $foto = $cod["foto_user"];
        $amigo .= "<div class='amigos-conteudo flex-center'>
    <div class='amigos-img flex-center'>
        <img src='{$foto}'>
        <p>.</p>
    </div>
    <span>{$nome}</span>
    </div>";

    endforeach;
    return $amigo;
}
