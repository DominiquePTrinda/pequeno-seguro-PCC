<?php
if (!empty($_COOKIE["logado"])) {
    $sqlMySQL = "SELECT u.id_user, u.nome_user,  u.usuario_ativo, a.hash_user FROM user_pcc u JOIN usuario_ativo a ON u.usuario_ativo=a.id";
    $resposta = $con->query($sqlMySQL);
    $codlogado = $_COOKIE["codlogado"];
    $logado = $_COOKIE["logado"];

    foreach ($resposta as $row) :
        $idHash = password_verify($row['usuario_ativo'], $codlogado);
        if ($idHash) {

            $id = $row['id_user'];
            $sqlMySQL = "SELECT u.id_user, u.nome_user,u.foto_user,u.capa_user,u.bio_user,u.cidade_user,u.ensino_user,u.nascimento_user, a.hash_user FROM user_pcc u JOIN usuario_ativo a ON a.id=u.usuario_ativo WHERE u.id_user = '$id'";
            $resposta = $con->query($sqlMySQL);
            $row = $resposta->fetch_assoc();
            $confirmHash = password_verify($row['hash_user'], $logado);
            $nomeUsuario = $row['nome_user'];
            $nomeUser = $row['usuario_user'];
            $ftperfilUsuario = $row['foto_user'];
            $ftcapaUsuario = $row['capa_user'];
            $bioUsuario = $row['bio_user'];
            $cityUsuario = $row['cidade_user'];
            $ensinoUsuario = $row['ensino_user'];
            $nascimentoUsuario = $row['nascimento_user'];
            $dia =  date('d', strtotime($nascimentoUsuario));
            $mes =  date('m', strtotime($nascimentoUsuario));

            switch ($mes) {
                case 1:
                    $mes = "Janeiro";
                    break;
                case 2:
                    $mes = "Fevereiro";
                    break;
                case 3:
                    $mes =  "Março";
                    break;
                case 4:
                    $mes = "Abril";
                    break;
                case 5:
                    $mes = "Maio";
                    break;
                case 6:
                    $mes = "Junho";
                    break;
                case 7:
                    $mes = "Julho";
                    break;
                case 8:
                    $mes = "Agosto";
                    break;
                case 9:
                    $mes = "Setembro";
                    break;
                case 10:
                    $mes = "Outubro";
                    break;
                case 12:
                    $mes = "Novembro";
                    break;
                case 12:
                    $mes = "Dezembro";
                    break;
            }
            $ano =  date('Y', strtotime($nascimentoUsuario));
            $nascimentoUsuario = "$dia de $mes de $ano";
            $descricaoAdd;
            if ((strlen($bioUsuario) == 0 || strlen($bioUsuario) == 1) && ($bioUsuario == "" || $bioUsuario == " ")) {
                $descricaoAdd .= "<div><div class='bio-conteudo-span' style='display: none'></div>
                <div class='add-desc'><span class='fa fa-plus'></span>&nbsp;<span class='add-texto add-texto-bio'>Adicionar Biografia</span></div>  
                <div class='add-desc-oculto'>
                <textarea name='bio-add' placeholder='Adicionar Biografia'></textarea>   
                <button>Salvar</button> 
                </div>        
                </div>";
            } else {
                $descricaoAdd .= "<div class='editar-descricao'><p><span class='bio-conteudo-span'>$bioUsuario</span><i class='edite-desc add-desc fas fa-angle-double-down'></i></p>
                <div class='add-desc-oculto'>
                <input type='hidden' name='true'>
                <textarea name='bio-add' placeholder='Adicionar Biografia'>$bioUsuario</textarea>   
                <button>Salvar</button>
                </div></div>";
            }
            if ((strlen($cityUsuario) == 0 || strlen($cityUsuario) == 1) && ($cityUsuario == "" || $cityUsuario == " ")) {
                $descricaoAdd .= "<div><div class='city-conteudo-span' style='display: none'></div>
                <div class='add-desc-city'><span class='fa fa-plus'></span>&nbsp;<span class='add-texto add-texto-city'>Adicionar Cidade</span></div>  
                <div class='add-desc-oculto-city'>
                <textarea name='city-add' placeholder='Adicionar Cidade'></textarea>   
                <button>Salvar</button> 
                </div>        
               </div>";
            } else {
                $descricaoAdd .= "<div class='editar-descricao'>
                <span class='bio-span'>
                <i class='fa fa-building-o'>&nbsp;</i>
                <span class='city-conteudo-span'>$cityUsuario</span>
                <i class='edite-desc add-desc-city fas fa-angle-double-down'></i>
                </span>
                <div class='add-desc-oculto-city'>
                <input type='hidden' name='true'>
                <textarea name='city-add' placeholder='Adicionar Biografia'>$cityUsuario</textarea>   
                <button>Salvar</button>
                </div>
                </div>";
            }
            if ((strlen($ensinoUsuario) == 0 || strlen($ensinoUsuario) == 1) && ($ensinoUsuario == "" || $ensinoUsuario == " ")) {
                $descricaoAdd .= "<div><div class='ensino-conteudo-span' style='display: none'></div>
                <div class='add-desc-ensino'><span class='fa fa-plus'></span>&nbsp;<span class='add-texto  add-texto-ensino'>Adicionar Ensino</span></div>  
                <div class='add-desc-oculto-ensino'>
                <select name='ensino-add'>
                <option value='' selected disabled>Selecione seu ensino</option>
                <option value='Ensino Fundamental'>Ensino Fundamental</option>
                <option value='Ensino Médio'>Ensino Médio</option>
                <option value='Ensino Médio Técnico'>Ensino Médio Técnico</option>
                <option value='Ensino superiorl'>Ensino superior</option>
                </select>   
                <button>Salvar</button> 
                </div>        
               </div>";
            } else {
                $descricaoAdd .= "<div class='editar-descricao'>
                <span class='bio-span'>
                <i class='fas fa-user-graduate'>&nbsp;</i>
                <span class='ensino-conteudo-span'>$ensinoUsuario</span>
                <i class='edite-desc add-desc-ensino fas fa-angle-double-down'></i>
                </span>
                <div class='add-desc-oculto-ensino'>
                <input type='hidden' name='true'>
                <select name='ensino-add'>
                <option value='Ensino Fundamental'>Ensino Fundamental</option>
                <option value='Ensino Médio'>Ensino Médio</option>
                <option value='Ensino Médio Técnico'>Ensino Médio Técnico</option>
                <option value='Ensino superiorl'>Ensino superior</option>
                </select>   
                <button>Salvar</button>
                </div>
                </div>";
            }
            $descricaoAdd .= "<span class='bio-span'><i class='far fa-calendar-alt'>&nbsp;</i>$nascimentoUsuario</span>";
            $descricao .= "<form method='post' action='assets/PAGES/EDITAR_BIO_PERFIL/descricaoPerfil.php'>" . $descricaoAdd . " </form>";

            if (!$confirmHash) {
                header("location: index.php");
            }
            break;
        }
    endforeach;
} else {
    header("location: index.php");
}
