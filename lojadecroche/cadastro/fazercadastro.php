<!DOCTYPE html>
<html lang="pt-br">
<?php

// puxar os elementos de php
// ta criand variáveis xd
$id = isset($_POST['id']) ? $_POST['id'] : 0;
$nome_completo = isset($_POST['nome_completo']) ? $_POST['nome_completo'] : "";
$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "";
$email = isset ($_POST['email']) ? $_POST['email'] : "";
$senha = isset ($_POST['senha']) ? $_POST['senha'] : "";
// precisa do tipo?
?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazer cadastro</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
</head>
<body style="background-color: #F2EFC2;">
<center>
<a href="../bemvindo/index.php" class="textinho" style="font-size: 20px;"> Ir para o Menu</a>
<br><br>

<!--
form é um formulário ( folha de papel)
fieldset é um conjunto de coisas menores ( partes da folha de papel)
legend cria um texto no fieldset 

!-->
<fieldset><legend style="font-size: 30px;" class="textinho" style="font-size: 30px;"> Cadastre-se!</legend>
<form action="acao.php" method="POST">

<!--
label cria um campo novo
readonly não deixa a pessoa clicar para editar
o name -> php usa pra acessar o elemento
o id -> js usa pra acessar o elemento
value é o valor do treco
!-->
<label for="id"> ID </label>
<input type="text" readonly name="id" id="id" value="">

<br><br>

<label for="nome_completo"> Nome Completo </label>
<input type="text" name="nome_completo" id="nome_completo" value="" placeholder="Insira seu nome completo">

<br><br>

<label for="cpf"> CPF </label>
<input type="text" name="cpf" id="cpf" value="" maxlength="15" placeholder="Insira seu CPF">

<br><br>

<label for="email"> E-mail </label>
<input type="email" name="email" id="email" value="" placeholder="Insira seu e-mail">

<br><br>

<label for="senha"> Senha </label>
<input type="password" name="senha" id="senha" value="" placeholder="Insira sua senha">

<br><br>

<button type="submit" value="salvar" name="acao"> Confirmar </button>
<!-- name é acao porque vai dizer o que o formulário vai fazer no ação -->

</form>
</fieldset>
</center>   
</body>
</html>