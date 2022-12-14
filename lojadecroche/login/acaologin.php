<?php 

require("../classe/usuario.class.php");
require_once("../conf/default.inc.php");
require_once("../conf/Conexao.php");

$acao = isset($_POST['acao']) ? $_POST['acao'] : "";
$id = isset($_POST['id']) ? $_POST['id'] : 0;
$nome_completo = isset($_POST['nome_completo']) ? $_POST['nome_completo'] : "";
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : 0;

if($acao == "logar"){ // por conta do value do botão no fazerlogin
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $senha = isset($_POST["senha"]) ? $_POST["senha"] : "";
    
    // == verifica valor
    // === verifica valor e tipo de variável

    // "" ou '' é string [ varchar ]
    // int é número
    // boleano é true ou false

    // $funciona é pra quando o login e feito
    $Usuario = new Usuario($id, $nome_completo, $cpf, $email, $senha); // instância de objeto
    $funciona = $Usuario->efetuarLogin($email, $senha); // efetua o login e vai pro if
    if($funciona != ""){ // se $funciona é diferente de nulo | !== verifica o tipo 
                  // 
        if($funciona == 1){ // = é apenas pra definir valor
       header("location:../cadastroProduto/cadastroproduto.php"); // se o tipo for 1 ( adm = true lol ) vai pra cá
    } else if ($funciona == 0) {
        header("location:../principal/indexP.php"); // se for usuario normal vai pra cá
        }   
    } else { // se deu errado
        header("location:../login/fazerlogin.php?errado=true"); // volta pra página de login
    }                                           // ↑ quer dizer que deu errado mesmo
}
?>