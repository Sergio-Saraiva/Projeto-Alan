<?php
    include 'config.php';

    $empresa = new Empresa();

    try {
        $id = $_POST['id'];
        $nomeResp = $_POST['nomeResponsavel'];
        $setor = $_POST['setor'];
        foreach ($_POST['emailcont'] as $email) {
            $emailResp[] = $email;
        }
        foreach ($_POST['telefonecont'] as $telefone) {
            $telefoneResp[] = $telefone;
        }

        foreach ($_POST['idEmail'] as $aux) {
            $idEmail[] = $aux;
        }
        foreach ($_POST['idTelefone'] as $aux) {
            $idTelefone[] = $aux;
        }

        $empresa->atualizaDadosContato($id, $idEmail, $idTelefone,$nomeResp, $setor, $emailResp, $telefoneResp);
        header("location: consultar.php");
    } catch (Exception $e){
        Erro::tratarErro($e);
    }


?>