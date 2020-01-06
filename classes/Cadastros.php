<?php 
    require_once 'Conexao.php';

    class Cadastros{

        public $id;
        public $nome;
        public $email;
        public $senha;
        public $nivel;
        public $ativo;
        public $cadastro;

        public function inserirNovoCadastro(){
        
            $conexao = Conexao::getConexao();

            //verificar se já existe usuário, senão, acrescentar
         
            $sql_2 = "SELECT * FROM usuarios WHERE email = '$this->email'";
            $resultado_sql_2 = $conexao->query($sql_2);

            $resultado = $resultado_sql_2->fetchAll();

            if(count($resultado)<1){
            
            $query = "INSERT INTO usuarios( nome, email, senha, nivel, ativo) VALUES (:nome, :email, :senha, :nivel, :ativo)";
            
            $envio = $conexao->prepare($query);
            $envio->bindValue(":nome", $this->nome);
            $envio->bindValue(":email", $this->email);
            $envio->bindValue(":senha", $this->senha);
            $envio->bindValue(":nivel", $this->nivel);
            $envio->bindValue(":ativo", $this->ativo);
            $envio->execute();
                
                return 0;
            }else{
                return 1;
            }
            
        }

    }

?>
