<?php
    class Conexao{
        public static function getConexao(){
            //abre conexão com o banco
            $conexao = new PDO('mysql:host=br796.hostgator.com.br;dbname=alana486_testeProjeto','alana486_sergio','senhaelegal');
            return $conexao;
        }
    }
?>