<?php
session_start();


ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

require_once('../../BD/conexao.php');
$con = conexao();

function envioSeguro($dados)
{
    $dados = addslashes($dados);
    $dados = htmlspecialchars($dados);
    $dados = trim($dados);
    return $dados;
}
$titulo = envioSeguro($_POST['postar_titulo']);
$diretorio = envioSeguro($_POST['dir']);
$img = $_FILES['postar_us']['name'] ?? "";
$zero = 0;

$tz = new DateTimeZone('America/Sao_Paulo');
$agora = new DateTime(null, $tz);
$hora = $agora->format('Y:m:d H:i:s');

if (!empty($_COOKIE["logado"])) {
    $sqlMySQL = "SELECT u.id_user, u.nome_user,  u.usuario_ativo, a.hash_user FROM user_pcc u JOIN usuario_ativo a ON u.usuario_ativo=a.id";
    $resposta = $con->query($sqlMySQL);
    $codlogado = $_COOKIE["codlogado"];
    $logado = $_COOKIE["logado"];

    foreach ($resposta as $row) :
        $idHash = password_verify($row['usuario_ativo'], $codlogado);
        if ($idHash) {
            $id = $row["id_user"];
            if (strlen($img) > 1) {

                //Pasta onde o arquivo vai ser salvo
                $_UP['pasta'] = '../../../assets/IMG/POSTAGEM/FOTOS/';
                //Tamanho máximo do arquivo em Bytes
                $_UP['tamanho'] = 1024 * 1024 * 100; //5mb

                //Array com a extensões permitidas
                $_UP['extensoes'] = array('png', 'jpg', 'jpeg');

                //Renomeiar
                $_UP['renomeia'] = false;

                //Array com os tipos de erros de upload do PHP
                $_UP['erros'][0] = 'Não houve erro';
                $_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
                $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
                $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
                $_UP['erros'][4] = 'Não foi feito o upload do arquivo';

                //Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
                if ($_FILES['postar_us']['error'] != 0) {
                    die("Não foi possivel fazer o upload, erro: <br />" . $_UP['erros'][$_FILES['postar_us']['error']]);
                    exit; //Para a execução do script
                }

                //Faz a verificação da extensao do arquivo
                $extensao = strtolower(end(explode('.', $_FILES['postar_us']['name'])));
                if (array_search($extensao, $_UP['extensoes']) === false) {
                    $status = "failed";
                    $response = "A imagem não foi cadastrada extesão inválida";
                }

                //Faz a verificação do tamanho do arquivo
                else if ($_UP['tamanho'] < $_FILES['postar_us']['size']) {
                    $status = "failed";
                    $response = "Arquivo muito grande";
                }

                //O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
                else {
                    //Primeiro verifica se deve trocar o nome do arquivo
                    if ($UP['renomeia'] == true) {
                        //Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
                        $nome_final = time() . '.jpg';
                    } else {
                        //mantem o nome original do arquivo
                        $nome_final = time() . $_FILES['postar_us']['name'];
                    }
                    //Verificar se é possivel mover o arquivo para a pasta escolhida
                    if (move_uploaded_file($_FILES['postar_us']['tmp_name'], $_UP['pasta'] . $nome_final)) {
                        //Upload efetuado com sucesso, exibe a mensagem
                        $arquivo = $_UP['pasta'] . '/' . $nome_final;

                        $sql = "INSERT INTO postagem (id_usuario, titulo_postagem,img_postagem,curtida_postagem,comentario_postagem,hora)
            VALUES ('$id','$titulo','$nome_final','$zero','$zero','$hora')";
                        $resultado = $con->query($sql);
                        if ($diretorio == "home") {
                            if ($resultado) {
                                header("location: ../../../home.php");
                            } else {
                                header("location: ../../../home.php");
                            }
                        } else {
                            if ($resultado) {
                                header("location: ../../../perfil.php");
                            } else {
                                header("location: ../../../perfil.php");
                            }
                        }
                        $status = "Success";
                        $response = "Foto enviada com sucesso";
                    } else {
                        //Upload não efetuado com sucesso, exibe a mensagem
                        $status = "failed";
                        $response = "Não foi possivel enviar essa foto";
                    }
                }
            } else if (strlen($titulo) > 1) {
                $sql = "INSERT INTO postagem (id_usuario, titulo_postagem,img_postagem,curtida_postagem,comentario_postagem,hora)
            VALUES ('$id','$titulo','$nome_final','$zero','$zero','$hora')";
                $resultado = $con->query($sql);
                if ($diretorio == "home") {
                    if ($resultado) {
                        header("location: ../../../home.php");
                    } else {
                        header("location: ../../../home.php");
                    }
                } else {
                    if ($resultado) {
                        header("location: ../../../perfil.php");
                    } else {
                        header("location: ../../../perfil.php");
                    }
                }
            }else{
                if ($diretorio == "home") {
                    if ($resultado) {
                        header("location: ../../../home.php");
                    } else {
                        header("location: ../../../home.php");
                    }
                } else {
                    if ($resultado) {
                        header("location: ../../../perfil.php");
                    } else {
                        header("location: ../../../perfil.php");
                    }
                }  
            }
            break;
        }
    endforeach;
} else {
    header("location: index.php");
}
