<?php
    require_once 'Conexao.php';

    class Projeto{
        public $id_empresa;
        public $tipo;
        public $data_entrega;
        public $protocolo;
        public $cidade;
        public $qtd_postes;
        public $andamento;

        public function listarProjetos(){
            $conexao = Conexao::getConexao();

            $query = "SELECT * FROM projetos";

            $lista_sql = $conexao->query($query);

            $lista = $lista_sql->fetchAll();

            return $lista;
        }

        public function novoProjeto(){
            $query = "INSERT INTO projetos(id_empresa, tipo, data_entrega, protocolo, cidade, qtd_postes, andamento) VALUES ('".$this->id_empresa."', '".$this->tipo."', '".$this->data_entrega."', '".$this->protocolo."', '".$this->cidade."', '".$this->qtd_postes."', '".$this->andamento."')";
            echo $query;

            $conexao = Conexao::getConexao();
            
            $conexao->exec($query);
        }

        
    }

?>