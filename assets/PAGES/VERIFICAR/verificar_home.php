<?php
$id;
$idDoUsuarioLogado = $id;
if (!empty($_COOKIE["logado"]) && !empty($_COOKIE["codlogado"])) {
    $resultset = [];
    $falseAcesso = false;
    $sqlMySQL = "SELECT u.id_user,u.usuario_ativo, d.hash_user FROM user_pcc u JOIN usuario_ativo d ON u.usuario_ativo=d.id";
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
        if ($idHash && $confirmHash){
            $falseAcesso = true;
            break;
        } 
    endforeach;
    if (!$falseAcesso) {
        header("location: index.php");
    }
}else{
    header("location: index.php");
}
