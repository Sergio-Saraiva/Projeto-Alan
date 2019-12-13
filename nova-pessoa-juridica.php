<?php 
    require_once 'classes/Empresa.php';

    $empresa = new Empresa();

    // if($_POST['dono']!=NULL){
        
    // }

    $empresa->dono = $_POST['dono'];

    foreach($_POST['telefone'] as $elemento){
        $empresa->telefone[] = $elemento;
    }
    
    $tam = 0;
    foreach ($_POST['nome'] as $nomepost) {
        $nome = $nomepost;
        $logradouro = $_POST['logradouro'][$tam];
        $numero = $_POST['numero'][$tam];
        $bairro = $_POST['bairro'][$tam];
        $cidade = $_POST['cidade'][$tam];
        $estado = $_POST['estado'][$tam];
        $cep = $_POST['cep'][$tam];  
        $empresa->endereco[] = array('nome' => $nome, 'logradouro' => $logradouro, 'numero'=> $numero, 'bairro' => $bairro, 'cidade' => $cidade, 'estado'=> $estado, 'cep'=> $cep);
        $tam++;
    }

    $empresa->cnpj = $_POST['cnpj'];
    $empresa->razao = $_POST['razao'];
    $empresa->fantasia = $_POST['fantasia'];
    $empresa->email = $_POST['email'];
    
    $empresa->novaEmpresa();
    header("Location: consultar.php");

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