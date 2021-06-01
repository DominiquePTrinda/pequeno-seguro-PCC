<?php

// Verificar se o usuário tem permissão para permanecer dentro do sistema, caso não tenha, ele sera direcionado para fora
if (!empty($_COOKIE["logado"]) && !empty($_COOKIE["codlogado"])) {
    $sqlMySQL = "SELECT id_user FROM user_pcc";
    $resposta = $con->query($sqlMySQL);
    $linhas = $resposta->num_rows;
    $codlogado = $_COOKIE["codlogado"];
    $logado = $_COOKIE["logado"];

    for ($i = 1; $i <= $linhas; $i++) {
        $idHash = password_verify($i, $codlogado);
        if ($idHash) {
            $sqlMySQL = "SELECT id_user, hash_user FROM user_pcc WHERE id_user = '$i'";
            $resposta = $con->query($sqlMySQL);
            $row = $resposta->fetch_assoc();
            $confirmHash = password_verify($row['hash_user'], $logado);
            if (!$confirmHash) {
                header("location: index.php");
            }
            break;
        }
    }
}else{
    header("location: index.php"); 
}