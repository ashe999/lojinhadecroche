<!DOCTYPE html>
<html lang="pt-br">
<head>

<?php
$cad = isset($_GET['cad']) ? $_GET['cad'] : "";
$errado = isset($_GET['errado']) ? $_GET['errado'] : false; // é pra receber o resultado errado

    if ($cad != ""){
        echo "<script> alert('Cadastro efetuado com sucesso! Agora efetue login.') </script>";
    } else {
        echo "<script> alert('Página de login.') </script>";
    }
?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Fazer login </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="icon" type="image/x-icon" href="../img/favicon.png">
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    
<center> <a href="../bemvindo/index.php" class="textinho"> Ir para o menu</a><br><br>
<a href="../cadastro/fazercadastro.php" class="textinho"> Fazer cadastro </a> <br>

<fieldset> <legend style="font-size: 30px;" class="textinho"> Efetuar login </legend>
<form action="acaologin.php" method="POST">
<br>

<label for="email"> E-mail </label>
<input type="email" name="email" id="email" value="" placeholder="Insira seu e-mail">

<br><br>

<label for="senha"> Senha </label>
<input type="password" name="senha" id="senha" value="" placeholder="Insira sua senha"><br>
<?php if($errado){ echo "<p style='
                            border-style: dotted;
                            width: 200px;
                            color: blue'>
                            Dados inseridos incorretamente. </p>"; }  //escreve que deu errado ?>
<br><br>

<button type="submit" value="logar" name="acao"> Confirmar </button> <br>
<!-- name é acao porque vai dizer o que o formulário vai fazer no ação -->

</form>
</fieldset>

</center>
</body>
</html>

