<?php
    class Conexao{
        public static function getConexao(){
            //abre conexão com o banco
            $conexao = new PDO('mysql:host=127.0.0.1;dbname=estagio','root','123456789');
            return $conexao;
        }
    }
?>