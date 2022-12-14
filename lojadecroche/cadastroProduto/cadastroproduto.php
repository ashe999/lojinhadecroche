<!DOCTYPE html>
<html lang="pt-br">
<head>

<?php

$id = isset($_POST['id']) ? $_POST['id'] : 0;
$produto = isset($_POST['produto']) ? $_POST['produto'] : "";
$preco = isset($_POST['preco']) ? $_POST['preco'] : 0; // se não for preenchido o preço é 0
$tamanho = isset($_POST['tamanho']) ? $_POST['tamanho'] : "";
$cor = isset($_POST['cor']) ? $_POST['cor'] : "";

?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
    <title>Cadastro de produtos</title>    

</head>
<body>
    <center>
    <a href="../bemvindo/index.php" class="textinho" style="font-size: 20px;"> Ir para o Menu</a> <br><br>
    <a href="../principal/indexP.php" class="textinho" style="font-size: 20px;"> Ir para a Tela Principal</a>

    <fieldset> <legend class="textinho" style="font-size: 30px;"> Cadastre um novo produto! </legend>
    <form action="../cadastroProduto/acaoProduto.php" method="POST" enctype="multipart/form-data"> <!-- o action vai direcionar pro ação depois de apertar o botão -->
                                                                <!-- enctype é para poder usar o $_FILES -->

    <label for="id"> ID </label>
    <input type="text" readonly name="id" id="id" value="">

    <br><br>

    <label for="produto"> Produto </label>
    <input type="text" name="produto" id="produto" placeholder="Insira o nome">

    <br><br>

    <label for="preco"> Preço </label>
    <input type="text" name="preco" id="preco" placeholder="Insira o preço">

    <br><br>

    <label for="tamanho"> Tamanho em cm </label>
    <input type="text" name="tamanho" id="tamanho" placeholder="Insira o tamanho em cm">

    <br><br>

    <label for="quantidade"> Quantidade </label>
    <input type="text" name="quantidade" id="quantidade" placeholder="Insira a quantidade">

    <br><br>

    <label for="cor"> Cor </label>
    <input type="text" name="cor" id="cor" placeholder="Insira a cor">

    <br><br>

    <label for="imagem"> Insira uma imagem </label>
    <input type="file" name="imagem" id="imagem">

    <br><br>

    <button type="submit" value="salvar" name="acao"> Confirmar </button>
<!-- name é acao porque vai dizer o que o formulário vai fazer no ação -->

    </form>
    </fieldset>
    </center>
</body>
</html>