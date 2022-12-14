<?php

require_once("../classe/usuario.class.php");
require_once("../conf/default.inc.php");
require_once("../conf/Conexao.php");

$id = isset($_POST['id']) ? $_POST['id'] : 0; // variáveis pra pegar os dados
$nome_completo = isset($_POST['nome_completo']) ? $_POST['nome_completo'] : "";
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$senha = isset($_POST['senha']) ? $_POST['senha'] : "";

$acao = isset($_POST['acao']) ? $_POST['acao'] : ""; //ação serve para os ifs dos métodos

    if($acao == "excluir"){
        $Usuario = new Usuario($id, "", "", "", ""); // pega as informações do usuário
        $Usuario->excluir(); // entre aspas porque pra excluir só precisa do id             
        // ↑ checa a ação e exclui do banco
    } else if($acao == "salvar"){ // caso a ação seja salvar
        if($id>0){ //para editar precisa do id
            echo $id;
            $Usuario = new Usuario($id, $nome_completo, $cpf, $email, $senha);
            $Usuario->editar();
        } else { // se o id não for maior que 0 entra no else
            $Usuario = new Usuario($id, $nome_completo, $cpf, $email, $senha);
            if($Usuario->inserir()){ // a seta chama o método inserir
                header("location:../login/fazerlogin.php?cad=ok"); // aqui deu certo
            } else {
                header("location:../cadastro/fazercadastro.php?cad=error"); // aqui deu errado
            }
        }
    }

?>