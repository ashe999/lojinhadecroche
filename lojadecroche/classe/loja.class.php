<?php //classe geral ( pai )

require_once("database.class.php");

abstract class Loja extends Database{ // abstrata porque é um modelo para as classes filhas

    private $id;
    private $nome;

    public function __construct($id, $nome){
        $this->setId($id); // chamando a função de setId
        $this->setNome($nome);
    }

    public function __toString(){ // não recebe variável
        // $str é de string
        $str = "ID: ". $this->getId();
        $str .= " <br><br> Nome: ". $this->getNome();

        return $str;
    }

    public function getId(){ return $this->id; } // pega e retorna o valor

    public function setId($id){ // define o valor
        $this->id = $id;
    }


    public function getNome(){ return $this->nome; }

    public function setNome($nome){
        $this->nome = $nome;
    }


    // define as funções o b r i g a t ó r i a s nas classes filhas
    public abstract function inserir(); // molde, então não vai ser completo
    public abstract function editar();
    public abstract function excluir();
    public abstract static function consulta($coluna, $info); 

}

?>