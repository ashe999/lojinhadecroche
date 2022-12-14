<?php

require("../classe/produto.class.php"); // conexão com a classe de usuário
require_once("../conf/default.inc.php"); // conexões
require_once("../conf/Conexao.php");

$img = isset($_FILES["imagem"]) ? $_FILES["imagem"] : NULL;
// O nome da variável não precisa ser igual ao que está dentro do isset

$id = isset($_POST['id']) ? $_POST['id'] : 0;
$produto = isset($_POST['produto']) ? $_POST['produto'] : "";
$preco = isset($_POST['preco']) ? $_POST['preco'] : 0; // se não for preenchido o preço é 0
$tamanho = isset($_POST['tamanho']) ? $_POST['tamanho'] : "";
$quantidade = isset($_POST['quantidade']) ?$_POST['quantidade'] : 0;
$cor = isset($_POST['cor']) ? $_POST['cor'] : "";

$acao = isset($_POST['acao']) ? $_POST['acao'] : ""; // veio do botão do cadastroproduto

$Produto = new Produto($id, $produto, $preco, $tamanho, $quantidade, $cor, $img['name']);
                                                            //queremos o name porque é um vetor

if($acao == "salvar"){
    if ($id != 0){
        $Produto->editar();
    } else {
        $Produto->inserir();          // img definiu no cadastroproduto ( o name )
            Produto::insereImagem($id, $img); // o objeto chama a função insereImagem
        header("location:../principal/indexP.php"); // redireciona para o indexP
        
    }
    
}

?>