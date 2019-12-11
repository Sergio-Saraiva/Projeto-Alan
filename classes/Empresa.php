<?php
    require_once 'Conexao.php';

    class Empresa{
        public $cnpj;
        public $razao;
        public $fantasia;
        public $email;
        public $telefone;
        public $nome;
        public $logradouro;
        public $numero;
        public $bairro;
        public $cidade;
        public $estado;
        public $cep;

        public function listar(){
            $conexao = Conexao::getConexao();

            $query = "SELECT * FROM juridica";

            $lista_sql = $conexao->query($query);

            $lista = $lista_sql->fetchAll();

            return $lista;
        }

        public function novaEmpresa(){
            $conexao = Conexao::getConexao();
            //insere empresa na tabela juridica
            $query = "INSERT INTO juridica(cnpj, razao, fantasia, email) VALUES ('".$this->cnpj."', '".$this->razao."', '".$this->fantasia."', '".$this->email."')";
            $conexao->exec($query);
            //pega id da empresa inserida
            $query = "SELECT id FROM juridica WHERE cnpj='$this->cnpj'";
            $id_sql = $conexao->query($query);
            $idV = $id_sql->fetchAll();
            foreach ($idV as $elemento) {
                $id = $elemento['id'];
            }
            //inserir na tabela endereco e telefone 
            $query = "INSERT INTO endereco_juridica(nome, logradouro, bairro, numero, cidade, estado, CEP, juridica_id_juridica) VALUES ('".$this->nome."','".$this->logradouro."','".$this->bairro."','".$this->numero."','".$this->cidade."', '".$this->estado."', '".$this->CEP."', '".$id."')";
            $conexao->exec($query);
            
            $query = "INSERT INTO telefone_juridica(telefone_juridica, juridica_id_juridica) VALUES ('".$this->telefone."', '".$id."')";
            $conexao->exec($query);
        }

        public function validaCnpj(){
            $conexao = Conexao::getConexao();

            $query = "SELECT cnpj FROM empresas";

            $lista_sql = $conexao->query($query);

            $lista = $lista_sql->fetchAll();
            $cont = 0;
            var_dump($lista);
            foreach($lista as $elemento){
                if($elemento['cnpj']==$this->cnpj){
                    return false;
                }else{
                    $cont = $cont + 1;
                    
                }
            }
            if($cont != 0){
                return true;
            }
        }

        // public function cnpjEstaVazio(){
        //     if($this->cnpj == ""){
        //         header("Location: registro.php?v=2");
        //     }else{
        //         return;
        //     }
        // }

        public function validaRazao(){
            $conexao = Conexao::getConexao();

            $query = "SELECT razao FROM empresas";

            $lista_sql = $conexao->query($query);

            $lista = $lista_sql->fetchAll();

            
            $cont = 0;
        
            foreach($lista as $elemento){
                if($elemento['razao']==$this->razao){
                    return false;
                }else{
                    $cont = $cont + 1;
                }
            }
            if($cont != 0){
                return true;
            }
        }

        public function selecionaEmpresaId(){
            $query = "SELECT id FROM empresas WHERE razao='$this->razao'";
            $conexao = Conexao::getConexao();
            $id_sql = $conexao->query($query);
            $id = $id_sql->fetchAll();

            foreach ($id as $elemento) {
                return $elemento['id'];
            }
        }

        public function selecionaEmpresaNome($id){
            $query = "SELECT razao FROM empresas WHERE id= '$id'";
            $conexao = Conexao::getConexao();
            $id_sql = $conexao->query($query);
            $id = $id_sql->fetchAll();

            foreach ($id as $elemento) {
                return $elemento['razao'];
            }
        }

        public function consultaPessoas($razao){
            $conexao = Conexao::getConexao();
            $sql = "SELECT * FROM empresas WHERE razao LIKE '%$razao%'";
            $resultado_sql = $conexao->query($sql);

            $resultado = $resultado_sql->fetchAll();

            return $resultado;

        }

        public function consultaProjetos($id){
            $conexao = Conexao::getConexao();
            $sql = "SELECT * FROM empresas WHERE id = '$id'";
            $resultado_sql = $conexao->query($sql);

            $resultado[1] = $resultado_sql->fetchAll();

            $sql_2="SELECT * FROM projetos WHERE id_empresa = '$id'";
            $resultado_sql_2 = $conexao->query($sql_2);

            $resultado[2] = $resultado_sql_2->fetchAll();

            return $resultado;

        }




        // public function razaoEstaVazio(){
        //     if($this->razao == ""){
        //         header("Location: registro.php?v=2");
        //     }else{
        //         return;
        //     }
        // }
}
?>