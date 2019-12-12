<?php 
    require_once 'classes/Empresa.php';

    $empresa = new Empresa();

    foreach($_POST['telefone'] as $elemento){
        $empresa->telefone[] = $elemento;
    }
    // foreach($_POST['nome'] as $elemento){
    //     $empresa->nome[] = $elemento;
    // }

    // foreach($_POST['logradouro'] as $elemento){
    //     $empresa->logradouro[] = $elemento;
    // }

    // foreach($_POST['numero'] as $elemento){
    //     $empresa->numero[] = $elemento;
    // }

    // foreach($_POST['bairro'] as $elemento){
    //     $empresa->bairro[] = $elemento;
    // }

    // foreach($_POST['cidade'] as $elemento){
    //     $empresa->cidade[] = $elemento;
    // }

    // foreach($_POST['estado'] as $elemento){
    //     $empresa->estado[] = $elemento;
    // }

    // foreach($_POST['cep'] as $elemento){
    //     $empresa->cep[] = $elemento;
    // }

    foreach ($_POST['nome'] as $nome) {
        $empresa->endereco[] = array('nome' => $nome);
    }

    foreach ($_POST['logradouro'] as $logradouro) {
        $empresa->endereco[] = array('logradouro' => $logradouro);
    }
    
    foreach ($_POST['numero'] as $numero) {
        $empresa->endereco[] = array('numero' => $numero);
    }
    

    foreach ($_POST['bairro'] as $bairro) {
        $empresa->endereco[] = array('bairro' => $bairro);
    }


    foreach ($_POST['cidade'] as $cidade) {
        $empresa->endereco[] = array('cidade' => $cidade);
    }

    foreach ($_POST['estado'] as $estado) {
        $empresa->endereco[] = array('estado' => $estado);
    }

    foreach ($_POST['cep'] as $cep) {
        $empresa->endereco[] = array('cep' => $cep);
    }

    $empresa->cnpj = $_POST['cnpj'];
    $empresa->razao = $_POST['razao'];
    $empresa->fantasia = $_POST['fantasia'];
    $empresa->email = $_POST['email'];
    // $empresa->telefone = $_POST['telefone'];
    // $empresa->nome = $_POST['nome'];
    // $empresa->logradouro = $_POST['logradouro'];
    // $empresa->numero = $_POST['numero'];
    // $empresa->bairro = $_POST['bairro'];
    // $empresa->cidade = $_POST['cidade'];
    // $empresa->estado = $_POST['estado'];
    // $empresa->cep = $_POST['cep'];

        
    var_dump($empresa);
    
    $empresa->novaEmpresa();
    // header("Location: consultar.php");

    // if($empresa->cnpjEstaVazio() OR $empresa->razaoEstaVazio()){
    //     header("Location: registro.php?v=2");
    // }
        // $empresa->novaEmpresa();
        // header("Location: consulta.php");
    
    

    // $empresa->cnpjEstaVazio();
    // $empresa->razaoEstaVazio();
    // if($empresa->validaCnpj() AND $empresa->validaRazao()){
    //         $empresa->novaEmpresa();
    //         header('Location: consulta.php?v=1');
    //     }else{
    //         header("Location: registro.php?v=1");
    //     }
?>