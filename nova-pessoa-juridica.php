<?php 
    require_once 'config.php';
    require_once 'classes/Empresa.php';

    $empresa = new Empresa();

    // if($_POST['dono']!=NULL){
        
    // }
    // try{

    foreach($_POST['telefone'] as $elemento){
        $empresa->telefone[] = $elemento;
    }

    foreach($_POST['email'] as $elemento){
        $empresa->email[] = $elemento;
    }

    $qtdResp =  $_POST['qtdResp'];
    // echo $qtdResp;
    echo sizeof($_POST['emailcont'][1]);

    for($i = 1; $i<=$qtdResp; $i++){
        $nomeResp = $_POST['nomeResponsavel'][$i-1];
        $setor = $_POST['setor'][$i-1];
        $empresa->contato[$i-1] = array('nomeResp' => $nomeResp, 'setor' => $setor);
        for ($c = 0; $c<= sizeof($_POST['emailcont'][$i]); $c++) {
            $emailResp = $_POST['emailcont'][$i][$c];
            $telefoneResp = $_POST['telefonecont'][$i][$c];
            $empresa->contato[$i-1] += array('emailResp' => $emailResp, 'telefoneResp' => $telefoneResp);
        }
    }

    $tam = 0;
    $i = 0;

    echo $_POST['emailcont'][1][2];

    // foreach ($_POST['nomeResponsavel'] as $nomeResponsavel) {
    //     $nomeResp = $nomeResponsavel;
    //     $setor = $_POST['setor'][$tam];
    //     $tam++;
        
    // }
    
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

    var_dump($empresa);
    
        // $empresa->novaEmpresa();
        // header("Location: consultar.php");
    // }catch(Exception $e){
        // Erro::tratarErro($e);
    // }
    

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