<?php 
    require_once 'config.php';
    require_once 'classes/Empresa.php';

    $empresa = new Empresa();
    try{

    foreach($_POST['telefone'] as $elemento){
        $empresa->telefone[] = $elemento;
    }

    foreach($_POST['email'] as $elemento){
        $empresa->email[] = $elemento;
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

    $qtdResp =  $_POST['qtdResp'];

    $empresa->novaEmpresa();
    $idEmpresa = $empresa->selecionaEmpresaIdPorCnpj($empresa->cnpj);



    for($i = 1; $i<=$qtdResp; $i++){
        $nomeResp = $_POST['nomeResponsavel'][$i-1];
        $setor = $_POST['setor'][$i-1];
        $empresa->contato[$i] = array('nomeResp' => $nomeResp, 'setor' => $setor);
        for ($c = 0; $c< sizeof($_POST['emailcont'][$i]); $c++) {
            $emailResp = $_POST['emailcont'][$i][$c];
            $empresa->contato[$i] += array('emailResp'.$c => $emailResp);
        }
        for ($c = 0; $c< sizeof($_POST['telefonecont'][$i]); $c++) {
            $telefoneResp = $_POST['telefonecont'][$i][$c];
            $empresa->contato[$i] += array('telefoneResp'.$c => $telefoneResp);
        }
        $empresa->adicionaRespContato($idEmpresa, $i);
        $idResp = $empresa->selecionaIdRespContato($empresa->contato[$i]['nomeResp']); 
        $empresa->adicionaEmailContato($idResp, sizeof($_POST['emailcont'][$i]), $i);
        $empresa->adicionaTelefoneContato($idResp, sizeof($_POST['telefonecont'][$i]), $i);
    }
    header("Location: consultar.php?alerta=3");
    }catch(Exception $e){
        Erro::tratarErro($e);
    }
    

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