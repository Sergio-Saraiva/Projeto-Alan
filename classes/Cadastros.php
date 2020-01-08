<?php 
    require_once 'Conexao.php';

    class Cadastros{

        public $id;
        public $nome;
        public $funcao;
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
            
            $query = "INSERT INTO usuarios( nome, email, senha, nivel, ativo, funcao) VALUES (:nome, :email, :senha, :nivel, :ativo, :funcao)";
            
            $envio = $conexao->prepare($query);
            $envio->bindValue(":nome", $this->nome);
            $envio->bindValue(":email", $this->email);
            $envio->bindValue(":senha", $this->senha);
            $envio->bindValue(":nivel", $this->nivel);
            $envio->bindValue(":ativo", $this->ativo);
            $envio->bindValue(":funcao", $this->funcao);
            $envio->execute();
                
                return 0;
            }else{
                return 1;
            }
            
        }

        public function listarCadastros($ativo,$acesso){
            
            $conexao = Conexao::getConexao();

            $sql = "SELECT * FROM `usuarios` WHERE (`ativo` = '".$ativo."') AND (`nivel` = '".$acesso."')";
            $resultado_1 = $conexao->query($sql);

            $resultado = $resultado_1->fetchAll();

            return $resultado;

        }

        public function modificarCadastro($id,$ativo,$acesso){
            $conexao = Conexao::getConexao();
            
            $sql = "UPDATE `usuarios` SET `ativo` = ? , `nivel` = ? WHERE `id` = ?";

            $status = $conexao->prepare($sql);

            $status->bindParam(1, $ativo);
            $status->bindParam(2, $acesso);
            $status->bindParam(3, $id);

            $status->execute();
            
            return 0;

        }

    }

?>
