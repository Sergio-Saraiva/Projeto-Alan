<?php

spl_autoload_register('carregarClasse');//registra a função como autoload

function carregarClasse($nomeClasse){//cria função para carregar automaticamente
    if(file_exists('classes/' . $nomeClasse. '.php')){//verifica se arquivo existe
        require_once 'classes/' . $nomeClasse . '.php';//require caso exista o arquivo
    }
}