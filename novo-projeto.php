<?php
    require_once 'classes/Empresa.php';
    require_once 'classes/Projeto.php';

    $projeto = new Projeto();
    $empresa = new Empresa();
    $empresa->razao = $_POST['rsocial'];
    $id = $empresa->selecionaEmpresaId(); 
    
    $projeto->id_empresa = $id; 
    $projeto->tipo = $_POST['tipo'];
    $projeto->data_entrega = $_POST['data_entrega'];
    $projeto->protocolo = $_POST['protocolo'];
    $projeto->cidade = $_POST['cidade'];
    $projeto->qtd_postes = $_POST['qtd_postes'];
    $projeto->andamento = $_POST['status'];

    // var_dump($projeto);
    $projeto->novoProjeto();
    // header("Location")
    // $empresa->cep = $_POST['cep'];

    // if($empresa->cnpjEstaVazio() OR $empresa->razaoEstaVazio()){
    //     header("Location: registro.php?v=2");
    // }
    //     if($empresa->validaCnpj() AND $empresa->validaRazao()){
    //     $empresa->novaEmpresa();
    //     header('Location: consulta.php?v=1');
    // }else{
    //     header("Location: registro.php?v=1");
    // }
    
    // $empresa->cnpjEstaVazio();
    // $empresa->razaoEstaVazio();
    // if($empresa->validaCnpj() AND $empresa->validaRazao()){
    //         $empresa->novaEmpresa();
    //         header('Location: consulta.php?v=1');
    //     }else{
    //         header("Location: registro.php?v=1");
    //     }
?>