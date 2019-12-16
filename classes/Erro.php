<?php

    require_once './config.php';

    class Erro{
        public static function tratarErro($e){
            if(DEBUG){
                echo '<pre>';//configura a quebra de linhas automática
                print_r($e);//exibe todos os elementos de erro
                echo '</pre>';
                exit;
            }else{
                echo "Erro no sistema";
                exit;
            }
        }
    }