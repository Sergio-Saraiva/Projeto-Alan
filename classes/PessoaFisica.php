<?php 
    require_once 'Conexao.php';

    class pFisica{


        //WG Edit

        public function listar(){
            $conexao = Conexao::getConexao();

            $query = "SELECT * FROM pessoa";

            $lista_sql = $conexao->query($query);

            $lista = $lista_sql->fetchAll();

            return $lista;
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