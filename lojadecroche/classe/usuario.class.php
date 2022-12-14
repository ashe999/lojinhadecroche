<?php

include("database.class.php"); // não precisa colocar "classe/" pq eles estão na mesma pasta ( classe )
include("loja.class.php");

class Usuario extends Loja{ // crio uma classe pro usuário

    // não tem mais id nem nome_completo porque já tem na loja ( classe geral )
    private $cpf;         
    private $email;
    private $senha;
    private $tipo;

    // não tem uma ordem certa, mas fica mais bonitinho com o  construtor primeiro :D
    // construtor, ela executa automaticamente quando cria um obj ( new )
    public function __construct($id, $nome_completo, $cpf, $email, $senha){
                               // parâmetros que precisa ter pra criar um obj 
                               // ( tipo usuário )
        $this->id = $id; // atribui um valor do parâmetro ao atributo agora 
                         //( vai ficar salvo)
        $this->nome_completo = $nome_completo;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->senha = $senha;
        $this->tipo = 0; // padrão do tipo é 0

    }
    //set 
    //get não precisa passar parâmetro porque está devolvendo o lacinho só

    // método ( função ) -> função de colocar (set) e tirar (get) o grampo
    public function getId(){ return $this->id; } // função de catar o id ( retorna ele )
    
    public function setId($id){ // setar o id | não pode usar $this porque ainda não tenho o lacinho
        $this->id = $id; // aqui recebe o lacinho pra colocar na cabeça
    }

    
    public function getNome(){ return $this->nome_completo; }

    public function setNome($nome_completo){
        $this->nome = $nome_completo;
    }


    public function getCpf(){ return $this->cpf; }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }


    public function getEmail(){ return $this->email; }

    public function setEmail($email){
        $this->email = $email;
    }


    public function getSenha(){ return $this->senha; }

    public function setSenha($senha){
        $this->senha = $senha;
    }


    public function getTipo(){ return $this->tipo; } // precisa colocar porque tem no banco de dados

    public function setTipo($tipo){
        $this->tipo = $tipo;
    }

#    public function __toString(){
#        return 
#
#   }

    public function inserir(){ # query -> é uma variável ( pode ser outro, tipo sql )
                               # que tem o comando sql ( nesse caso a função é 
                               # inserir os dados na tabela usuario )

                 // inserir   // nome da tabela e atributos                    // valores | : significa que depois o valor vai ser substituído
        $query = 'INSERT INTO usuario (nome_completo, cpf, email, senha, tipo) VALUES(:nome_completo, :cpf, :email, :senha, :tipo)';
                              // é pra colocar as informações de acordo com o nome
                              // na tabela ( atributos ) -> especifica os atributos e preenche com as values

                              // as informações da tabela precisam ser na mesma ordem da value
                              // porque se colocar tipo "nome_completo" e "cpf", ele vai preencher com o número
                              // do cpf no espaço do nome
        $parametros = array(":nome_completo"=>$this->getNome(), // a substituição acontece aqui
                            // aqui tem Asher    aqui pega o nome (Asher) e substitui 
                            // parâmetros é uma array, que é uma caixa com caixnhas
                            // então, é uma variável que armazena mais de um valor
                            ":cpf"=>$this->getCpf(),        // aqui...
                            //tem o número   ↑ que foi catado por aqui
                            ":email"=>$this->getEmail(),  // ...tem
                            ":senha"=>$this->getSenha(), // os
                            ":tipo"=>$this->getTipo()); // valores
                            //seta dupla ( => ) atribui um valor a uma chave no array 
                            
        return Database::executaComando($query, $parametros);
        // retorna, chamando a função executaComando da classe Database
    }

    public function editar(){

        $conexao = Conexao::getInstance(); //verificando se tem uma conexão com o banco de dados
        // ↓ quando chamar a query, ela vai atualizar o banco de dados, no caso na tabela usuario
        $query = 'UPDATE usuario 
        SET nome_completo = :nome_completo, cpf = :cpf, email = :email, senha = :senha, tipo = :tipo
        WHERE id = :id';

    // seta ( -> ) chama um método ou variável da classe
        // stmt = prepared statement ( pré-pronto ) 
        $stmt = $conexao->prepare($query);  //bindValue -> vincular com o retorno de uma função ??
                                            //bindParam -> vincula somente com variável ??
        $stmt->bindValue(':id', $this->id, PDO::PARAM_STR);
        $stmt->bindValue('nome_completo', $this->nome_completo, PDO::PARAM_STR);
        $stmt->bindValue('cpf', $this->cpf, PDO::PARAM_STR);
        $stmt->bindValue('email', $this->email, PDO::PARAM_STR);
        $stmt->bindValue('senha', $this->senha, PDO::PARAM_STR);
        $stmt->bindValue('tipo', $this->tipo, PDO::PARAM_STR);
                                              //PDO::PARAM_STR PDO statement
        return $stmt->execute(); // executa o código

    }

    public function excluir(){ // função para excluir

        $conexao = Conexao::getInstance();
        $stmt = $conexao->prepare('DELETE from usuario WHERE id = :id');//deleta da tabela..
                                                                        //..usuario pelo id
        
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT); // PARAM_INT é um PDO statement     
        return $stmt->execute(); // execução do método excluir

    }

    public static function consulta($tipo = 0, $info = ""){ // info é o que precisa pesquisar
        $query = 'SELECT * FROM usuario';
        //adiciona os parâmetros
            if($tipo>0)
                switch ($tipo){      // .= é pra contatenar strings
                    case '1': $query .= "";
                }

    }


    public function efetuarLogin($email, $senha){ //precisa das duas variáveis pra verificar
        require_once("../conf/Conexao.php");
    $query = "SELECT email, senha, tipo from usuario"; // define o que vai pegar no bdd
    $pdo = Conexao::getInstance(); // conectando
    $consulta = $pdo->query($query); // consulta com a string do query ( o comando )
    while ($conta = $consulta->fetch(PDO::FETCH_BOTH)) { //enquanto tiver um resultado vai pro if
        if($email == $conta["email"] && $senha == $conta["senha"]){ // ↲ | aqui verifica se o login é igual o do bdd
            return $conta["tipo"];
        }
    }
}




    }

// fazer métodos: inserir, excluir, editar, listar


?>