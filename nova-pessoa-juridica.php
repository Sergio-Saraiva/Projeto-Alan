<?php 
    require_once 'classes/Empresa.php';

    $empresa = new Empresa();
    $empresa->cnpj = $_POST['cnpj'];
    $empresa->razao = $_POST['razao'];
    $empresa->fantasia = $_POST['fantasia'];
    $empresa->email = $_POST['email'];
    $empresa->telefone = $_POST['telefone'];
    $empresa->nome = $_POST['nome'];
    $empresa->logradouro = $_POST['logradouro'];
    $empresa->numero = $_POST['numero'];
    $empresa->bairro = $_POST['bairro'];
    $empresa->cidade = $_POST['cidade'];
    $empresa->estado = $_POST['estado'];
    $empresa->cep = $_POST['cep'];

    // if($empresa->cnpjEstaVazio() OR $empresa->razaoEstaVazio()){
    //     header("Location: registro.php?v=2");
    // }
        $empresa->novaEmpresa();
        
    
    // $empresa->cnpjEstaVazio();
    // $empresa->razaoEstaVazio();
    // if($empresa->validaCnpj() AND $empresa->validaRazao()){
    //         $empresa->novaEmpresa();
    //         header('Location: consulta.php?v=1');
    //     }else{
    //         header("Location: registro.php?v=1");
    //     }
?>