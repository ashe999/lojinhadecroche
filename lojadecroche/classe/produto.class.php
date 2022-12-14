<?php

include("database.class.php");
include("../classe/loja.class.php");

class Produto extends Loja{

    // não tem id nem produto porque já tem na classe grandona 
    private $preco;
    private $tamanho;
    private $quantidade;
    private $cor;
    private $img;



    public function __construct($id, $produto, $preco, $tamanho, $quantidade, $cor, $img){

        parent::__construct($id, $produto); // define os valores na classe geral
        $this->setPreco($preco); // set para definir os valores
        $this->setQuantidade($quantidade);
        $this->setTamanho($tamanho);
        $this->setCor($cor);
        $this->setImg($img);

        //$this->preco = $preco;
        //$this->quantidade = $quantidade;
        //$this->tamanho = $tamanho;
        //$this->cor = $cor;

    }

    public function __toString(){
        
        $str = parent::__toString(); // chamar a __toString da classe pai
        $str .= "<br><br> Preço: ". $this->getPreco();
        $str .= "<br><br> Quantidade:  ". $this->getQuantidade();
        $str .= "<br><br> Tamanho: ". $this->getTamanho();
        $str .= "<br><br> Cor: ". $this->getCor();

        return $str;
    }

    // get e set do produto são retirados pois já tem na class da loja

    public function getPreco(){ return $this->preco; }

    public function setPreco($preco){
        $this->preco = $preco;
    }


    public function getTamanho(){ return $this->tamanho; }

    public function setTamanho($tamanho){
        $this->tamanho = $tamanho;
    }

    public function getQuantidade(){ return $this->quantidade; }

    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }


    public function getCor(){ return $this->cor; }

    public function setCor($cor){
        $this->cor = $cor;
    }

    public function getImg(){ return $this->img; }

    public function setImg($img){
        $this->img = $img;
    }
    
    public static function consulta($coluna=0, $info){ // info é o que precisa pesquisar
        $query = 'SELECT * FROM produtos';
        //adiciona os parâmetros
            if($info != ""){ // se $info não é nulo
                                        // : é o bindParam
                                        // like -> seja como tal coisa
                if($coluna == 0){
                $query .= " WHERE id = :info";   //$info é o que vai pesquisa
                } else {                                       // % fala que é incompleto ( deixa a pesquisa completar )
                $query .= " WHERE produto like :info";        // por exemplo "cav" -> caveira, cavalo...
                    $info = '%'.$info.'%';
            }
                    }          
                                $parametros = array( // ":coluna"=>$coluna, // garante que não dá erro no bdd
                                ":info"=>$info);                                     

            return Database::buscar($query, $parametros);
            // por conta do database

    }


    public function inserir(){
                                      // produto porque está assim no bdd
        $query = 'INSERT INTO produtos(produto, preco, tamanho, quantidade, cor, img) VALUES(:produto, :preco, :tamanho, :quantidade, :cor, :img)';
        $parametros = array(":produto"=>$this->getNome(),// getNome porque está na loja
                            ":preco"=>$this->getPreco(),
                            ":tamanho"=>$this->getTamanho(),
                            ":quantidade"=>$this->getQuantidade(),
                            ":cor"=>$this->getCor(),
                            ":img"=>$this->getImg());

        return Database::executaComando($query, $parametros);

    }

    public function editar(){
        $query = 'UPDATE produtos
            SET produto = :produto, preco = :preco, tamanho = :tamanho, quantidade = :quantidade,
            cor = :cor, img = :img WHERE id = :id';

        $parametros = array(":produto"=>$this->getNome(),// getNome porque está na loja
                            ":preco"=>$this->getPreco(),
                            ":tamanho"=>$this->getTamanho(),
                            ":quantidade"=>$this->getQuantidade(),
                            ":cor"=>$this->getCor(),
                            ":id"=>$this->getId(),
                            ":img"=>$this->getImg());

        // return var_dump($parametros);
        //return var_dump(Database::vinculaParametros($query,$parametros));
        return Database::executaComando($query, $parametros);
               // chama o executaComando, que inicia a conexão
    }

    public function excluir(){
        $query = 'DELETE from produtos WHERE id = :id';//deleta da tabela..
                                                      //..produtos pelo id
        
        $parametros = array(":id"=>$this->getId()); // estrutura de array     
        return Database::executaComando($query, $parametros);

    }

    public static function insereImagem($id, $img){
        if($id == 0){
            
            $conexao = Conexao::getInstance();
            $id = $conexao->lastInsertId(); // Recebe o último ID inserido
                        //valor da variável
            mkdir("../img/".$id); // Cria a pasta/diretório do produto
                           //id é o nome da pasta
            //mkdir(path, mode, recursive, context) -> os 3 últimos são opcionais
        }   
        $tmpName = $img["tmp_name"]; // Recebe o arquivo (com nome temporário)
        $destino = "../img/".$id."/".$img['name']; // Define o destino do arquivo (com nome a ser utilizado)
        move_uploaded_file($tmpName, $destino); // move para o destino
        // função para armazenar a imagem

    }

}

?>