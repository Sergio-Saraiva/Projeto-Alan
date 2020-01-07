<?php
    include 'config.php';


    try {
        $empresa = new Empresa();

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
        foreach ($_POST['id'] as $idHtml) {
            $id[] = $idHtml;
        }
        $empresa->atualizaEnderecoEmpresa($id);
        header("Location: consultar.php");
    } catch (Exception $e){
        Erro::tratarErro($e);
    }
?>