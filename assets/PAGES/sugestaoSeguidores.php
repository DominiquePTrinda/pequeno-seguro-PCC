<?php

$usuarios = [];
$sugestaoConteudo = "";
$cont = 0;
$sql = "SELECT * FROM user_pcc";
$respostaUser = $con->query($sql);
if ($respostaUser->num_rows > 0) {
    while ($row = $respostaUser->fetch_assoc()) {
        $usuarios[] = $row;
    }
}
$sql = "SELECT * FROM seguidores WHERE id_usuario<>$idDoUsuarioLogado";
$respostaSeg = $con->query($sql);
foreach ($respostaSeg as $conteudoResposta) :
    foreach ($usuarios as $conteudoUsuarios) :
        if ($idDoUsuarioLogado !== $conteudoUsuarios['id_user']) {
                if ($conteudoUsuarios['id_user'] == $conteudoResposta['id_seguidor']) {
                    if ($cont < 2) {
                        $sugestaoConteudo .= "
                        <div class='sugestoes-conteudo flex-center'>
                            <div class='sugestoes-img flex-center'>
                                <img src='{$conteudoUsuarios['foto_user']}' alt='' srcset=''>
                            </div>
                            <div class='sugestao-Nonebtn'>
                                <span>{$conteudoUsuarios['nome_user']}</span>
                                <form class='btnseguir' method='POST' action='assets/PAGES/seguidor.php'>
                                <input type='hidden' name='idUS' value='{$conteudoUsuarios['usuario_user']}'>
                                <button type='submit'>Seguir</button>
                                </form>
                                <p>{$conteudoUsuarios['usuario_user']}</p>
                            </div>
                        </div>";
                        $cont++;
                    }
                } 
        }
    endforeach;
endforeach;

$sugestao = "<div class='sugestoes-seguidores'> <h4>Sugestões para seguir</h4>" . $sugestaoConteudo . "</div>";
