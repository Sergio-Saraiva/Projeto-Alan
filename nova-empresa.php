<?php 
    require_once 'classes/Empresa.php';

    $empresa = new Empresa();
    $empresa->cnpj = $_POST['cnpj'];
    $empresa->razao = $_POST['razao'];
    $empresa->endereco= $_POST['endereco'];
    $empresa->telefone = $_POST['telefone'];
    $empresa->estado = $_POST['estado'];
    $empresa->cidade = $_POST['cidade'];
    $empresa->cep = $_POST['cep'];

    // if($empresa->cnpjEstaVazio() OR $empresa->razaoEstaVazio()){
    //     header("Location: registro.php?v=2");
    // }
        if($empresa->validaCnpj() AND $empresa->validaRazao()){
        $empresa->novaEmpresa();
        header('Location: consulta.php?v=1');
    }else{
        header("Location: registro-pessoa.php?v=1");
    }
    
    // $empresa->cnpjEstaVazio();
    // $empresa->razaoEstaVazio();
    // if($empresa->validaCnpj() AND $empresa->validaRazao()){
    //         $empresa->novaEmpresa();
    //         header('Location: consulta.php?v=1');
    //     }else{
    //         header("Location: registro.php?v=1");
    //     }
?>