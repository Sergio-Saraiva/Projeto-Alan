<?php 
    require_once 'Conexao.php';

    class PessoaFisica{
        public $nomepf;
        public $cpf;
        public $datanasc;
        public $sexo;
        public $email;
        public $telefone;
        public $endereco;

        //WG Edit

        public function listar(){
            $conexao = Conexao::getConexao();

            $query = "SELECT * FROM pessoa";

            $lista_sql = $conexao->query($query);

            $lista = $lista_sql->fetchAll();

            return $lista;
        }

        public function novaPessoaFisica(){
            $conexao = Conexao::getConexao();
            //insere a pessoa fisica na tabela pessoa
            $query = "INSERT INTO pessoa(Nome, cpf, dataDeNasc, sexo, email) VALUES (:nomepf, :cpf, :datanasc, :sexo, :email)";
            $stmt = $conexao->prepare($query);
            $stmt->bindValue(":nomepf", $this->nomepf);
            $stmt->bindValue(":cpf", $this->cpf);
            $stmt->bindValue(":datanasc", $this->datanasc);
            $stmt->bindValue(":sexo", $this->sexo);
            $stmt->bindValue(":email", $this->email);
            $stmt->execute();

            //pega id da pessoa inserida
            $query = "SELECT idPessoa FROM pessoa WHERE cpf='$this->cpf'";
            $id_sql = $conexao->query($query);
            $idV = $id_sql->fetchAll();
            foreach ($idV as $elemento) {
                $id = $elemento['idPessoa'];
            }

            //insere na tabela endereco
            foreach ($this->endereco as $elemento) {
                $query = "INSERT INTO endereco_pessoa(nome, logradouro, bairro, numero, cidade, estado, CEP, pessoa_idPessoa) VALUES(:nome, :logradouro, :bairro, :numero, :cidade, :estado, :cep, :id)";
                $stmt = $conexao->prepare($query);
                $nome = $elemento['nome'];
                $stmt->bindValue(":nome", $nome);
                $logradouro = $elemento['logradouro'];
                $stmt->bindValue(":logradouro", $logradouro);
                $bairro = $elemento['bairro'];
                $stmt->bindValue(":bairro", $bairro);
                $numero = $elemento['numero'];
                $stmt->bindValue(":numero", $numero);
                $cidade = $elemento['cidade'];
                $stmt->bindValue(":cidade", $cidade);
                $estado = $elemento['estado'];
                $stmt->bindValue(":estado", $estado);
                $cep = $elemento['cep'];
                $stmt->bindValue(":cep", $cep);
                $stmt->bindValue(":id", $id);
                $stmt->execute();                
            }

            //insere na tabela telefone
            foreach($this->telefone as $tel){
                $query = $query = "INSERT INTO telefone_pessoa(telefone_pessoa, pessoa_idPessoa) VALUES(:tel, :id)";
                $stmt = $conexao->prepare($query);
                $stmt->bindValue(":tel", $tel);
                $stmt->bindValue(":id", $id);
                $stmt->execute();
            }
        }

        //WG Edit

        public function consultaPessoasFisicas($razao){
            $conexao = Conexao::getConexao();
            
            $sql = "SELECT * FROM pessoa WHERE Nome LIKE '%$razao%'";
            $resultado_sql = $conexao->query($sql);

            $resultado = $resultado_sql->fetchAll();

            return $resultado;

        }

        public function listarPessoasFisicas($inicio,$maximo){
            $conexao = Conexao::getConexao();

            $query_juridica = "SELECT * FROM pessoa";
            $lista_sql = $conexao->query($query_juridica);
            $lista[2] = $lista_sql->fetchAll();

            $query_juridica_2 = "SELECT * FROM pessoa ORDER BY idPessoa LIMIT $inicio,$maximo";
            $lista_sql_2 = $conexao->query($query_juridica_2);
            $lista[1] = $lista_sql_2->fetchAll();
         

            return $lista;
        }


        
    }
?>