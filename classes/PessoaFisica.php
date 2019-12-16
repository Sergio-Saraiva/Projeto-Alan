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
            $query = "INSERT INTO pessoa(Nome, cpf, dataDeNasc, sexo, email) VALUES ('".$this->nomepf."', '".$this->cpf."', '".$this->datanasc."', '".$this->sexo."','".$this->email."')";

            $conexao->exec($query);

            //pega id da pessoa inserida
            $query = "SELECT idPessoa FROM pessoa WHERE cpf='$this->cpf'";
            $id_sql = $conexao->query($query);
            $idV = $id_sql->fetchAll();
            foreach ($idV as $elemento) {
                $id = $elemento['idPessoa'];
            }

            //insere na tabela endereco
            $query = "INSERT INTO endereco_pessoa(nome, logradouro, bairro, numero, cidade, estado, CEP, pessoa_idPessoa) VALUES";

            foreach ($this->endereco as $elemento) {
                $nome = $elemento['nome'];
                $logradouro = $elemento['logradouro'];
                $bairro = $elemento['bairro'];
                $numero = $elemento['numero'];
                $cidade = $elemento['cidade'];
                $estado = $elemento['estado'];
                $cep = $elemento['cep'];
                $query = $query."('".$nome."','".$logradouro."','".$bairro."','".$numero."','".$cidade."', '".$estado."', '".$cep."', '".$id."'),";
            }
            $query = substr($query, 0, -1);
            $conexao->exec($query);

            //insere na tabela telefone
            $query = "INSERT INTO telefone_pessoa(telefone_pessoa, pessoa_idPessoa) VALUES";
            foreach($this->telefone as $tel){
                $query = $query."('".$tel."', '".$id."'),";
            }
            $query = substr($query, 0, -1);
            $conexao->exec($query);
        }

        public function consultaPessoasFisicas($razao){
            $conexao = Conexao::getConexao();
            
            $sql = "SELECT * FROM pessoa WHERE Nome LIKE '%$razao%'";
            $resultado_sql = $conexao->query($sql);

            $resultado = $resultado_sql->fetchAll();

            return $resultado;

        }
        
    }
?>