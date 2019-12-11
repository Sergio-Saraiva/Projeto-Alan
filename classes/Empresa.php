<?php
    require_once 'Conexao.php';

    class Empresa{
        public $cnpj;
        public $razao;
        public $endereco;
        public $telefone;
        public $estado;
        public $cidade;
        public $cep;

        public function listar(){
            $conexao = Conexao::getConexao();

            $query = "SELECT * FROM empresas";

            $lista_sql = $conexao->query($query);

            $lista = $lista_sql->fetchAll();

            return $lista;
        }

        public function novaEmpresa(){

            $query = "INSERT INTO empresas(cnpj, razao, endereco, telefone, estado, cidade, cep) VALUES ('".$this->cnpj."', '".$this->razao."', '".$this->endereco."', '".$this->telefone."', '".$this->estado."', '".$this->cidade."', '".$this->cep."')";
            echo $query;

            $conexao = Conexao::getConexao();
            
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
        
        //WG Edit

        public function listarPessoasJuridicas(){
            $conexao = Conexao::getConexao();

            $query_juridica = "SELECT * FROM juridica";
            $lista_sql = $conexao->query($query_juridica);
            $lista[1] = $lista_sql->fetchAll();
         

            return $lista;
        }


        public function consultaPessoasJuridicas($razao){
            $conexao = Conexao::getConexao();
            $sql = "SELECT * FROM juridica WHERE razao LIKE '%$razao%'";
            $resultado_sql = $conexao->query($sql);

            $resultado = $resultado_sql->fetchAll();

            return $resultado;

        }

        public function maisInformacoesPessoaJuridica($id){
            $conexao = Conexao::getConexao();
            $sql = "SELECT * FROM juridica WHERE id_juridica = '$id'";
            $resultado_sql = $conexao->query($sql);

            $sql_2 = "SELECT * FROM telefone_juridica WHERE id_juridica = '$id'";
            $resultado_sql_2 = $conexao->query($sql_2);

            $resultado[1] = $resultado_sql->fetchAll();
            $resultado[2] = $resultado_sql_2->fetchAll();


            return $resultado;

        }

        /*
        public function consultaEmpresaServicos(){
            $conexao = Conexao::getConexao();

            $sql = "SELECT * FROM empresas WHERE id = '$id'";
            $resultado_sql = $conexao->query($sql);

            $resultado[1] = $resultado_sql->fetchAll();

            $sql_2="SELECT * FROM projetos WHERE id_empresa = '$id'";
            $resultado_sql_2 = $conexao->query($sql_2);

            $resultado[2] = $resultado_sql_2->fetchAll();

            return $resultado;

        }
        */

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