<?php

$id = isset($_GET['id']) ? $_GET['id'] : 0;
// é GET por causa que está na URL

include('../classe/produto.class.php');
        // Produto nesse caso é a classe, não o objeto
$mostra = Produto::consulta("id", $id); // na verificação, a string id é igual o valor do id
// como o método consulta() é estático, dá de chamar ele sem criar objeto, 
// mas não pode usar $this
var_dump($mostra);


?>