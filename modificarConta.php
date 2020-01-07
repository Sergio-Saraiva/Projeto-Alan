<?php

include 'config.php';

$cadastros = new Cadastros;

$id = $_POST['id'];
$operacao = $_POST['operacao'];

//Seguindo como orientação a função modificarCadastro(id do usuário, usuário ativo, nível de acesso)

if($id !='f'){
    echo "ID: ".$id." / Operação: ".$operacao;

    if($operacao == 1){
        $cadastros->modificarCadastro($id,1,1);
        header('Location: acessos.php?alerta=1');exit;
    }elseif($operacao == 2){
        $cadastros->modificarCadastro($id,1,2);
        header('Location: acessos.php?alerta=2');exit;
    }elseif($operacao == 3){
        $cadastros->modificarCadastro($id,1,2);
        header('Location: acessos.php?alerta=3');exit;
    }

}else{
    header('Location: acessos.php');exit;
}





?>