<?php

$id = $row['id_user'];
$usuarioInformacoesSeguidores = [];
$seguindoConteudoCorpo;
$seguindoTrue = false;
$sqlMySQL = "SELECT * FROM user_pcc";
$resposta = $con->query($sqlMySQL);
    if($resposta->num_rows > 0){
        while($row = $resposta->fetch_assoc()){
           $usuarioInformacoesSeguidores[] = $row; 
        }
    }

$sqlMySQL = "SELECT * FROM seguidores WHERE id_usuario<>'$id' AND id_seguidor='$id'";
$resposta = $con->query($sqlMySQL);
    if($resposta->num_rows > 0){
        $seguindoTrue = true;
        while($row = $resposta->fetch_assoc()){
        foreach($usuarioInformacoesSeguidores as $userSeg):
            if($userSeg['id_user'] == $row['id_usuario']){
            $seguindoConteudoCorpo .= 
            "<div class='amigos-foto-conteudo'>
                    <img src='{$userSeg['foto_user']}' alt=''>
                    <p>{$userSeg['nome_user']}</p>
            </div>";
            }
        endforeach;
        }
    }
if($seguindoTrue){
$seguindoConteudo = 
"<div class='amigos-conteudo'>
    <h4>Seguindo</h4><div class='amigos-foto flex-center'>
        <div class='amigos-conteudo-corpo'>
            ". $seguindoConteudoCorpo ."
        </div>
    </div>
</div>";
}