<?php 
    require_once 'Conexao.php';

    class Validacao{

        public function validar($email,$senha){
            $conexao = Conexao::getConexao();

            $sql = "SELECT `id`, `nome`, `nivel` FROM `usuarios` WHERE (`email` = '".$email ."') AND (`senha` = '". sha1($senha) ."') AND (`ativo` = 1) LIMIT 1";

            $query = $conexao->query($sql);

            return $query;
        }


    }

?>