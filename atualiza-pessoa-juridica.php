<?php
    include 'config.php';

    try{
        $empresa = new Empresa();
        $empresa->cnpj = $_POST['cnpj'];
        $empresa->razao = $_POST['razao'];
        $empresa->fantasia = $_POST['fantasia'];

        $empresa->atualizaDadosEmpresa($_POST['id']);

        header("Location: consultar.php");
    }catch(Exception $e){
        Erro::tratarErro($e);
    }

?>