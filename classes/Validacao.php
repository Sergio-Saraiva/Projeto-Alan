<?php 
    require_once 'Conexao.php';

    class Validacao{

        public function validar($email,$senha){
            $conexao = Conexao::getConexao();

            $sql = "SELECT `id`, `nome`, `nivel`, `ativo`, `funcao` FROM `usuarios` WHERE (`email` = '".$email ."') AND (`ativo` = 1) AND (`senha` = '". sha1($senha) ."') LIMIT 1";
            // AND (`ativo` = 1)

            $query = $conexao->query($sql);

            return $query;
        }


    }

?>