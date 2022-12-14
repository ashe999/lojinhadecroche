<!DOCTYPE html>
<html lang="pt-br">
<head>

<?php

include("../classe/produto.class.php");

$id = isset($_POST['id']) ? $_POST['id'] : 0;
$acao = isset($_POST['acao']) ? $_POST['acao'] : "";

?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Tela principal </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>

<script> alert("Bem-vindo!")</script>

<center><a href="../bemvindo/index.php" class="textinho" style="font-size: 20px;"> Ir para o Menu</a></center> 
<?php
// fazer uma listagem de produtos ( consulta + pesquisa [ tipo os cruds das aulas ])
?>

<center>
<br><br>
<fieldset>
<form method="POST">

</form>

<?php
    /* $variavel = 1;

    if($variavel == 1){
        echo "<a href='../cadastro/fazercadastro.php'>Exemplo</a>";
    } */
?>


</fieldset>



<fieldset>

<?php

$Produto = new Produto("","","","","","","");

$mostra = $Produto->consulta("", ""); // $info é nulo para não entrar na verificação 
// mostra vai chamar a função consulta ( e armazena a consulta )

           // -> pega
      // vetor -> cada linha
foreach($mostra as $linha){ // linha da tabela
   

$textoProduto = $linha['produto'] ."<br><br>";
echo "<div class='prods' ><p style='font-size: 30px; color: #8C1818;' class='textinhoP'>$textoProduto</p>";

echo "<img src='../img/".$linha['id']."/".$linha['img']."' class='imagemred'><br><br>";
                        //o que estiver dentro de [] é o nome do atributo ( vetor )

echo "<a href='viewP.php?id=".$linha['id']."'>View</a> <br><br><br></div>";
                    // ? passa um valor através da URL ( o GET )


}

?>
</fieldset>

</body>
</html>