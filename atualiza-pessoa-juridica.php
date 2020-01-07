<?php
    include 'config.php';

    try{
        $empresa = new Empresa();
        $empresa->cnpj = $_POST['cnpj'];
        $empresa->razao = $_POST['razao'];
        $empresa->fantasia = $_POST['fantasia'];
        foreach($_POST['email'] as $elemento){
            $empresa->email[] = $elemento;
        }

        foreach($_POST['telefone'] as $elemento){
            $empresa->telefone[] = $elemento;
        }

        foreach($_POST['emailAntigo'] as $elemento){
            $emailAntigo[] = $elemento;
        }
        foreach($_POST['telefoneAntigo'] as $elemento){
            $telefoneAntigo[] = $elemento;
        }
        
        $empresa->atualizaDadosEmpresa($_POST['id'], $emailAntigo, $telefoneAntigo);

        header("Location: consultar.php");
    }catch(Exception $e){
        Erro::tratarErro($e);
    }

?>