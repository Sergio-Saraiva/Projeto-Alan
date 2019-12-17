<?php
    require_once 'classes/PessoaFisica.php';

    $pfisica = new PessoaFisica();

    $pfisica->nomepf = $_POST['nomepf'];
    $pfisica->cpf = $_POST['cpf'];
    $pfisica->datanasc = $_POST['datanasc'];
    $pfisica->sexo = $_POST['sexo'];
    $pfisica->email = $_POST['email'];

    foreach($_POST['telefone'] as $elemento){
        $pfisica->telefone[] = $elemento;
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
        $pfisica->endereco[] = array('nome' => $nome, 'logradouro' => $logradouro, 'numero'=> $numero, 'bairro' => $bairro, 'cidade' => $cidade, 'estado'=> $estado, 'cep'=> $cep);
        $tam++;
    }


    $pfisica->novaPessoaFisica();
    header("Location: consultar.php");


?>