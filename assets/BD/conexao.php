<?php
function conexao(){
    $server_url = "localhost";
    $server_usuario = "root";
    $server_senha = "";
    $server_banco = "pcc_bii";
    
    $conexao = new mysqli($server_url,$server_usuario,$server_senha,$server_banco);
    if($conexao->connect_errno){
        die("Erro na conexão". $conexao->connect_error);
    }
    else{
        return $conexao;
    }
}
?>